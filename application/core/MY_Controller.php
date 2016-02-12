<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

    class MY_Controller extends CI_Controller {
        
        //array with list of public pages where admin login is not required
        private $notsecured = array('');
        
        public function __construct() {            
           parent::__construct();
           
           $this->load->library('nativesession');
           
           $controllerMethod = $this->router->fetch_class().'/'.$this->router->fetch_method();
           
           //chkcing whether requested url contains any of the notsecured urls
           if(!in_array($controllerMethod, $this->notsecured)){               
                $this->_is_secure();
           }
           
        }
        
        private function _is_secure(){            
           
            //getting emulateur session value
            $emulateur = $this->nativesession->get('emulateur');    
            if(isset($emulateur) && $emulateur != NULL)
            {
                if($emulateur['loggedin'] != 1){                
                  
                }else { 
                  
                    //get current controller
                    $controller         = $this->router->fetch_class();
               }
            }else{ 
                 redirect('backend_login.html');
            }
        }
    }
?>