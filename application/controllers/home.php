<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Home extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -  
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in 
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see http://codeigniter.com/user_guide/general/urls.html
	 */
    
    
        public function __construct() {
            parent::__construct();        
            $this->load->helper('form');
            $this->load->library('nativesession');
            $this->load->library('wikyfeed');
            $this->load->library('form_validation');
            $this->load->helper('cookie');
            $this->load->model('home_model');
        }

    
	public function index()
	{
            //$this->load->library('nativesession');
            $myfeed = $this->nativesession->get('myfeed');
         
			$data['top_stories'] = $this->home_model->get_top_story_details();
			$data['stories'] = $this->home_model->get_story_details();
			
            if($myfeed['loggedin'] == 1) {
                $data['signup_msg'] = '';
              
                //echo '<pre>'; print_r($data['stories']); exit;
                $this->load->view('index',$data);

            } else {

                $url = @$_SERVER['HTTP_REFERER'];

                //check if the cookie exist
                $this->login_from_cookie($url);

                $data['signup_msg'] = '';
                $signup_msg = $this->session->flashdata('signup_msg');
                if(isset($signup_msg))
                {
                    $data['signup_msg'] = $this->session->flashdata('signup_msg');
                }


                
                
                
                /*$first_date = new DateTime("2016-01-13 9:01:24");
                $second_date = new DateTime(date('Y-m-d h:m:s'));
                $difference = $first_date->diff($second_date);
                echo $this->format_interval($difference); exit;*/
                //echo '<pre>'; print_r($data['stories']); exit;
                $this->load->view('index',$data);
            }
   	}
	
        public function stories_json()
	{
            header('Content-type: application/json');
            
            $stories = $this->home_model->get_story_details();
            //echo '<pre>'; print_r($data['stories']); exit;
            
            echo  '{ "result": ', json_encode($stories), '}';
         
           // echo { "total": 20,"result": $vi };
        
           // $this->load->view('index',$data);
	}
        
	public function add_feed()
	{
		$data['category'] = $this->home_model->get_category();
		$this->load->view('account',$data);
	}
	public function user_profile()
	{
		$data['user_data'] = $this->home_model->get_user_data(1);
		//echo '<pre>'; print_r($data['user_data']); exit;
		$this->load->view('account_setting',$data);
	}
	
	public function add_story()
	{
		$category = $this->input->post('category');
		$title = $this->input->post('title');
		$description = $this->input->post('description');
		
		$totalcontent = $this->input->post('totalcontent');
		
		$array = array(
			'category' 		=> $category,
			'title' 		=> $title,
			'description' 	=> $description,
			'totalcontent' 	=> $totalcontent,
			'posted_date'	=> date('Y-m-d H:m:s'),
			'id_user' 		=> 1
		);
		
		$insert_id = $this->home_model->add_table('story',$array);
		
		
		for($m=0; $m < $totalcontent; $m++){
		
			$headline = $this->input->post('headline_'.$m);
		
			if($headline != ''){
				$desc = $this->input->post('desc_'.$m);
				$source = $this->input->post('source_'.$m);
				$upload_type = $this->input->post('upload_type_'.$m);
				$video_url = '';
				$img_name = '';
				$video_upload_img = '';
				if($upload_type == 'picture'){
				
					$dir_name = 'assets/listing_photos/'.$insert_id;
					if (!is_dir($dir_name)) 
					{
						mkdir($dir_name , 0777);
					}
					
					$target_dir = $dir_name;
					$target_file = $target_dir.'/' . basename($_FILES["image_".$m]["name"]);
					//echo $target_file; exit;
					$img_url = $target_file;
					$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
					$check = getimagesize($_FILES["image_".$m]["tmp_name"]);
					if($check !== false) {
					
						if (move_uploaded_file($_FILES["image_".$m]["tmp_name"], $target_file)) {
							//echo "The file ". basename( $_FILES["image_".$m]["name"]). " has been uploaded.";
						} else {
							//echo "Sorry, there was an error uploading your file.";
						}
					}
				}
				if($upload_type == 'video'){
					$video_url = $this->input->post('video_upload_'.$m);
					$img_url = $this->input->post('video_upload_img_'.$m);
				}
				
				$array_content = array(
					'headline' 			=> $headline,
					'desc' 				=> $desc,
					'source' 			=> $source,
                                        'upload_type'                   => $upload_type,
                                        'video_url'                     => $video_url,
                                        'img_url'                       => $img_url,
                                        'id_story' 			=> $insert_id
				);
			
			
				$this->home_model->add_table('story_content',$array_content);
			
			}
			
			
		}
		
	
		redirect(site_url($insert_id.'-story_preview.html'));
		
		
		
	}
	
	
	public function story_preview($id)
	{
		$data['story_det'] = $this->home_model->get_story_details_by_id($id);
		$this->load->view('story_preview',$data);
	}
	
	public function account_setting()
	{
		$data['user_data'] = $this->home_model->get_user_data(1);
		//echo '<pre>'; print_r($data['user_data']); exit;
		$this->load->view('account_setting',$data);
	}
        
        public function change_password() {
         
            if(isset($_POST['pass'])) { 
                $pass = $this->input->post('pass');
		
                $array = array(
                    'password' => $pass
                );
                $myfeed = $this->nativesession->get('myfeed');
                $id_user = $myfeed['id_user'];
                $this->home_model->update_table('user',$array,'id_user',$id_user);
                $this->session->set_flashdata('pass_changed',1);
                redirect(site_url('change_password.html'));
            }else{
                $data['pass_changed'] = '';
                $pass_changed = $this->session->flashdata('pass_changed');
                if(isset($pass_changed))
                {
                    $data['pass_changed'] = $this->session->flashdata('pass_changed');
                }
                $this->load->view('change_password',$data);
            }
           
        }
	
	
	public function save_setting()
	{
           	$username = $this->input->post('username');
		$email = $this->input->post('email');
		$description = $this->input->post('txtEditor');
		$facebook = $this->input->post('facebook');
		$google = $this->input->post('google');
		$twitter = $this->input->post('twitter');
		//echo $description; exit;
                $myfeed = $this->nativesession->get('myfeed');
                $id_user = $myfeed['id_user'];
          
                $dir_name = 'assets/images/profile_pics/'.$id_user;
                if (!is_dir($dir_name)) 
                {
                        mkdir($dir_name , 0777);
                }

                $target_dir = $dir_name;
                $target_file = $target_dir.'/' . basename($_FILES["profile_img"]["name"]);
                $img_name = $target_file;
                $img_url = $target_file;
                $imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
                $check = getimagesize($_FILES["profile_img"]["tmp_name"]);
                if($check !== false) {

                        if (move_uploaded_file($_FILES["profile_img"]["tmp_name"], $target_file)) {
                                //echo "The file ". basename( $_FILES["image_".$m]["name"]). " has been uploaded.";
                        } else {
                                //echo "Sorry, there was an error uploading your file.";
                        }
                }
                
                
                
		$array = array(
                        'profile_pic'     => $img_url,
			//'username' 		=> $username,
			//'email' 		=> $email,
			'about_desc'                    => $description,
			'facebook_profile' 		=> $facebook,
			'google_profile' 		=> $google,
			'twitter_profile' 		=> $twitter
		);
		
		$this->home_model->update_table('user',$array,'id_user',1);
		
                redirect(site_url('account_setting.html'));
	}
	
	
	public function get_all_data($num)
	{
            $perPage = 10;
            $sql = "SELECT * from story join story_content on story_content.id_story=story.id_story join user on user.id_user=story.id_user GROUP BY story.id_story ORDER BY story.posted_date ASC";
            $page = 1;
            
            if(!empty($num)) {
                $page = $num;
            }

            $start = ($page-1)*$perPage;
            if($start < 0) $start = 0;

            $query =  $sql . " limit " . $start . "," . $perPage; 
            $faq = $this->home_model->runQuery($query);
            
            if(empty($rowcount)) {
                $rowcount = $this->home_model->numRows($sql);
            }
            
            $pages  = ceil($rowcount/$perPage);
            $output = 'No more Stotires';
          
            if(!empty($faq)) {
                $output .= '<input type="hidden" class="pagenum" value="' . $page . '" /><input type="hidden" class="total-page" value="' . $pages . '" />';
                foreach($faq as $k=>$v) {
                 
                    $first_date = new DateTime($v['posted_date_time']);
                    $second_date = new DateTime(date('Y-m-d h:m:s'));
                    $difference = $first_date->diff($second_date);
                    $posted = $this->wikyfeed->format_interval($difference);
                            
                    $output .=  '<article class="white-panel">';
                    $output .=  '<div class="col-lg-12">';
                    $output .=  '<div class="row">';
                    $output .=  '<div class="col-lg-12  no-padding">';
                    $output .=  '<img class="img-responsive" src="'.site_url($v['img_url']).'" style=""/>';
                    $output .=  '</div></div>';
                    $output .=  '<div class="row m-t">';
                    $output .=  '<span class="feed_statics m-t"><i class="fa fa-user"></i> <a href="'.site_url($v['user_name']).'">'.$v['user_name'].'</a> <i class="fa fa-clock-o"></i> '.$posted.' ago</span>';
                    $output .=  '<div class="">';
                    $output .=  '<h2 class=""><a href="">'.$v['title'].'</a></h2>';
                    $output .=  '</div></div></div>';
                    $output .=  '</article>';
          
                }
            }
            echo $output;
            
            //$data['stories'] = $this->home_model->get_story_details();
            //echo '<pre>'; print_r($data['stories']); exit;
            //$this->load->view('index',$data);
	}
	
        public function get_category_listings($cate_id,$num)
	{
            $perPage = 10;
            $sql = "SELECT * from story join story_content on story_content.id_story=story.id_story join user on user.id_user=story.id_user where story.category=".$cate_id." GROUP BY story.id_story ORDER BY story.posted_date ASC";
            $page = 1;
            
            if(!empty($num)) {
                $page = $num;
            }

            $start = ($page-1)*$perPage;
            if($start < 0) $start = 0;

            $query =  $sql . " limit " . $start . "," . $perPage; 
            $faq = $this->home_model->runQuery($query);
            
            if(empty($rowcount)) {
                $rowcount = $this->home_model->numRows($sql);
            }
            
            $pages  = ceil($rowcount/$perPage);
            $output = 'No more Stotires';
          
            if(!empty($faq)) {
                $output .= '<input type="hidden" class="pagenum" value="' . $page . '" /><input type="hidden" class="total-page" value="' . $pages . '" />';
                foreach($faq as $k=>$v) {
                 
                    $first_date = new DateTime($v['posted_date_time']);
                    $second_date = new DateTime(date('Y-m-d h:m:s'));
                    $difference = $first_date->diff($second_date);
                    $posted = $this->wikyfeed->format_interval($difference);
                    
                    $output .=  '<article class="white-panel">';
                    $output .=  '<div class="col-lg-12">';
                    $output .=  '<div class="row">';
                    $output .=  '<div class="col-lg-12  no-padding">';
                    $output .=  '<img class="img-responsive" src="'.site_url($v['img_url']).'" style=""/>';
                    $output .=  '</div></div>';
                    $output .=  '<div class="row m-t">';
                    $output .=  '<span class="feed_statics m-t"><i class="fa fa-user"></i> <a href="'.site_url($v['user_name']).'">'.$v['user_name'].'</a> <i class="fa fa-clock-o"></i> '.$posted.' ago</span>';
                    $output .=  '<div class="">';
                    $output .=  '<h2 class=""><a href="">'.$v['title'].'</a></h2>';
                    $output .=  '</div></div></div>';
                    $output .=  '</article>';
          
                }
            }
            echo $output;
            
            //$data['stories'] = $this->home_model->get_story_details();
            //echo '<pre>'; print_r($data['stories']); exit;
            //$this->load->view('index',$data);
	}
	
	
	public function signin()
        {
			//echo 'vi'; exit;
            echo $this->load->view('sign_in');
        }
	
	public function signup()
        {
            echo $this->load->view('sign_up');
        }
	
	public function check_username()
        {
            $username = $this->input->post('username');
           
            $check_user = $this->home_model->check_username($username);
            if(isset($check_user) && $check_user != NULL)
            {
                echo 0;
            }else{
                $check_user_email = $this->home_model->check_email($username);
                if(isset($check_user_email) && $check_user_email != NULL)
                {
                    echo 0;
                }else{
                    echo 1;
                }
            }
        }
        
        
        
        
        public function registration() {
            $username = $this->input->post('username');
            $email = $this->input->post('email');
            $password = $this->input->post('pass');
            
            $array = array(
                'user_name' => $username,
                'email' => $email,
                'password'  => $password,
                'account_created' => date('Y-m-d'),
                'account_active' => 1
            );
            
            $insert_id = $this->home_model->add_table('user',$array);
            if($insert_id != '')
            {
                $msg = 'Hi '.$username.', Congratuation Your registration is completed. We sent you verification link on your email address, Please verified your email address before login';
                $this->session->set_flashdata('signup_msg',$msg);
                
                
                redirect(site_url());
            }
            
        }
        
        
    public function login_from_cookie($url) {
        
        if(isset($_COOKIE['myfeed']) && $_COOKIE['myfeed'] != '') {
            $id_user = $_COOKIE['myfeed'];      
            $validate   =    $this->home_model->login_user($id_user);

                if($validate != NULL) { 

                    $myfeed=array(
                                    "loggedin"              => 1,
                                    "user_name"             => $validate[0]->user_name,
                                    "email"                 => $validate[0]->email,                                 
                                );
                    $this->nativesession->set('myfeed',$myfeed);
                    ini_set('session.gc_maxlifetime', 60*60*24);
                    $filter = array('checked' => 0);
                    if(isset($url) && $url != '') {
                        redirect($url);
                    } else {
                        redirect(site_url());
                    }


                }
        }
    }
    
    public function validate_user() {        
        
        if(isset($_POST['email']))
        {           
            $this->form_validation->set_rules('email',"Username",'trim|required|xss_clean|encode_php_tags');
            $this->form_validation->set_rules('pass',"Password",'trim|required|xss_clean|encode_php_tags');

            if($this->form_validation->run() == TRUE)
            {
                $email = $this->input->post('email');
                $password = $this->input->post('pass');
           
                $validate   =   $this->home_model->login_by_username($email,$password);
                if(isset($validate) && $validate != NULL)
                {
                    //we set the cookie with the contact id
                    $cookie = array(
                        'name'   => 'myfeed',
                        'value'  => $validate[0]->id_user,
                        'expire' => 60*60*24*365
                    );
                    set_cookie($cookie);
                    $myfeed=array(
                        "loggedin"              => 1,
                        "name"                  => $validate[0]->user_name,
                        "id_user"            => $validate[0]->id_user,
                        "email"                 => $validate[0]->email,                                 
                    );
                    $this->nativesession->set('myfeed',$myfeed);
                    
                    $filter = array('checked' => 0);
              
                    ini_set('session.gc_maxlifetime', 60*60*24);
                    redirect(site_url());
                }else{
                    $validate   =   $this->home_model->login_by_email($email,$password);
                    if(isset($validate) && $validate != NULL)
                    {
                        //we set the cookie with the contact id
                        $cookie = array(
                            'name'   => 'myfeed',
                            'value'  => $validate[0]->id_user,
                            'expire' => 60*60*24*365
                        );
                        set_cookie($cookie);
                        $myfeed=array(
                            "loggedin"              => 1,
                            "name"                  => $validate[0]->user_name,
                            "id_user"            => $validate[0]->id_user,
                            "email"                 => $validate[0]->email,                                 
                        );
                        $this->nativesession->set('myfeed',$myfeed);

                        $filter = array('checked' => 0);

                        ini_set('session.gc_maxlifetime', 60*60*24);
                        redirect(site_url());
                    }
                }
            }
        }   
        redirect(site_url());        
    }
    
    public function logout() {
        $this->nativesession->destroy();
        
        //we delete the cookie
        $this->load->helper('cookie');
        delete_cookie("myfeed");
        redirect(site_url());
    }
	
    
    public function category_id($category) {
        if($category == 'celebrity')
        {
            return 1;
        }
        if($category == 'entertainment')
        {
            return 4;
        }
    }
    
    function category_search($category){
       
		$data['cate_name'] = $category;
        $cate_id = $this->category_id($category);
        $data['cate_id'] = $cate_id;
        $data['stories'] = $this->home_model->get_story_by_category($cate_id);
        //echo '<pre>'; print_r($data['stories']); exit;
        $this->load->view('category_result',$data);

    }
    
    public function feed_details($id_story,$title)
	{
		$data['site_url_path'] = site_url('feed-'.$id_story.'-'.$title);
		$data['id_story'] = $id_story;
		//echo $id_story; exit;
		$data['story'] = $this->home_model->get_story_details_by_id($id_story);
		//echo '<pre>'; print_r($data['story']); exit;
		
		$total_views = $this->count_views($data['story'][0]->view_counts);
		//echo '<pre>'; print_r($total_views); exit;
		$data['story_views'] = $total_views;
            
		//$this->load->view('feed_details',$data);
		$this->load->view('feed_story_new',$data);
	}
	
	public function count_views($value) {
		if ($value > 999 && $value <= 999999) {
			$result = number_format($value / 1000, 1, '.', ' '). ' K';
		} elseif ($value > 999999) {
			$result = number_format($value / 1000000, 1, '.', ' '). ' M';
		} else {
			$result = $value;
		}
		return $result;
	}
	
	public function stat_counts() {
		$id_story = $this->input->post('id_story');
		$this->home_model->update_stat_story_view_counts($id_story);
	}

	public function subscribe_newsletter() {
		$email = $this->input->post('email');
		$this->home_model->add_subscribe_newsletter($email);
		echo 1;
	}
	
	public function similar_feeds($story_id,$category_id)
	{
		$data['similar_stories'] = $this->home_model->get_similar_stories($story_id,$category_id);
        //echo '<pre>'; print_r($data['similar_stories']); exit;
        echo $this->load->view('similar_stories',$data);
	}
    
    public function likefeed($id_story)
	{
		//$id_story = $this->input->post('id_story');
		$this->home_model->likefeed($id_story);
        echo 1;
	}
	
	public function unlikefeed()
	{
		$id_story = $this->input->post('id_story');
		$this->home_model->unlikefeed($id_story);
        echo 1;
	}
	
	public function test()
	{
		
		//$this->load->view('feed_details',$data);
		$this->load->view('test');
	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */