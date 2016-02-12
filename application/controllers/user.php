<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class User extends CI_Controller {

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
           
   	}
	
	public function user_profile($id)
	{
        
		$data['user_stories'] = $this->home_model->get_user_stories($id);
		//echo "<pre>";  print_r($data['user_stories']); exit;
		$this->load->view('user_profile',$data);
	}
        
	public function delete_story()
	{
		$id_story = $this->input->post('id_story');
		$array = array('delete'=>1);
		$this->home_model->update_table('story',$array,'id_story',$id_story);
		echo 1;
	}
	
	
	
	
	
	
	
	
	
	
	
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */