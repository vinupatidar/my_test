<?php   if ( ! defined('BASEPATH')) exit('No direct script access allowed');
    class Home_Model extends CI_Model{
        
        public function login_user($id_user) {
            return $this->db->select("*")
                            ->from("user")
                            ->where("id_user",$id_user)
                            ->get()
                            ->result();
        }
        
        
        
       
		
		public function get_user_data($id_user)
		{
			return $this->db->select("*")
                            ->from("user")
                            ->where("id_user",$id_user)
                            ->get()
                            ->result();
		}
		
		public function add_table($table,$array){
			$this->db->insert($table,$array);
			return $this->db->insert_id();
        }
        
        public function update_table($table,$array,$where,$value){
			$this->db->where($where,$value);
			$this->db->update($table,$array);
		}
		
		public function get_category()
		{
			return $this->db->select("*")
					->from("category")
					->order_by('category_name','ASC')
					->get()
					->result();
		}
		
		public function get_story_details_by_id($id)
		{
			return $this->db->select("*")
					->from("story")
					->join('story_content','story_content.id_story=story.id_story')
                    ->join('user','user.id_user=story.id_user')
					->where('story.id_story',$id)
					->where('story.delete',0)
					->get()
					->result();
		}
                
        public function get_story_details()
		{
			return $this->db->select("*")
					->from("story")
					->join('story_content','story_content.id_story=story.id_story')
                    ->join('user','user.id_user=story.id_user')
					->where('story.delete',0)
					->order_by('story.posted_date_time','asc')
					->group_by('story.id_story')
					//->limit(9,0)
					->get()
					->result();
		}
            
		public function get_similar_stories($id)
		{
			return $this->db->select("*")
					->from("story")
					->join('story_content','story_content.id_story=story.id_story')
                    ->join('user','user.id_user=story.id_user')
					->where('story.category',$id)
					->where('story.delete',0)
					->order_by('story.posted_date_time','random')
					->group_by('story.id_story')
					->limit(3,0)
					->get()
					->result();
		}
	
		public function get_user_stories($user_name)
		{
                    return $this->db->select("*")
                                    ->from("story")
                                    ->join('story_content','story_content.id_story=story.id_story')
                                    ->join('user','user.id_user=story.id_user')
                                    ->where('user.user_name',$user_name)
                                    ->where('story.delete',0)
                                    ->order_by('story.posted_date_time','asc')
                                    ->group_by('story.id_story')
                                    ->get()
                                    ->result();
		}
			
		public function get_story_by_category($cate_id)
		{
			return $this->db->select("*")
					->from("story")
					->join('story_content','story_content.id_story=story.id_story')
					->join('user','user.id_user=story.id_user')
					->where('story.category',$cate_id)
					->where('story.delete',0)
					->order_by('story.posted_date_time','asc')
					->group_by('story.id_story')
					->limit(9,0)
					->get()
					->result();
		}
                
                
        function runQuery($query) {
            $result = mysql_query($query);
            while($row=mysql_fetch_assoc($result)) {
                    $resultset[] = $row;
            }		
            if(!empty($resultset))
			return $resultset;
	}
        
        function numRows($query) {
            $result  = mysql_query($query);
            $rowcount = mysql_num_rows($result);
            return $rowcount;	
	}
        
        public function check_username($username)
        {
            return $this->db->select("*")
                    ->from("user")
                    ->where('user_name',$username)
                    ->get()
                    ->result();
        }
        
        public function check_email($username)
        {
            return $this->db->select("*")
                    ->from("user")
                    ->where('email',$username)
                    ->get()
                    ->result();
        }
        
        public function login_by_username($email,$password) {
            return $this->db->select("*")
                    ->from("user")
                    ->where('user_name',$email)
                    ->where('password',$password)
                    ->where('account_active',0)
                    ->get()
                    ->result();
        }
        
        public function login_by_email($email,$password) {
            return $this->db->select("*")
                    ->from("user")
                    ->where('email',$email)
                    ->where('password',$password)
                    ->where('account_active',0)
                    ->get()
                    ->result();
        }
   
        public function update_stat_story_view_counts($id_story) {
            mysql_query("UPDATE story SET view_counts = view_counts + 1 WHERE id_story = '".$id_story."'");
        }
        
        public function update_stat_profile_view_counts($id_user) {
            mysql_query("UPDATE user SET profile_count = profile_count + 1 WHERE id_user = '".$id_user."'");
        }
        
        public function add_subscribe_newsletter($email) {
            $array = array('email'=>$email);
            $this->db->insert('newsletter',$array);
            return $this->db->insert_id();
        
        }
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        }
?>
