<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/*
| -------------------------------------------------------------------------
| URI ROUTING
| -------------------------------------------------------------------------
| This file lets you re-map URI requests to specific controller functions.
|
| Typically there is a one-to-one relationship between a URL string
| and its corresponding controller class/method. The segments in a
| URL normally follow this pattern:
|
|	example.com/class/method/id/
|
| In some instances, however, you may want to remap this relationship
| so that a different class/function is called than the one
| corresponding to the URL.
|
| Please see the user guide for complete details:
|
|	http://codeigniter.com/user_guide/general/routing.html
|
| -------------------------------------------------------------------------
| RESERVED ROUTES
| -------------------------------------------------------------------------
|
| There area two reserved routes:
|
|	$route['default_controller'] = 'welcome';
|
| This route indicates which controller class should be loaded if the
| URI contains no data. In the above example, the "welcome" class
| would be loaded.
|
|	$route['404_override'] = 'errors/page_missing';
|
| This route will tell the Router what URI segments to use if those provided
| in the URL cannot be matched to a valid route.
|
*/

$route['default_controller'] = "home";
$route['404_override'] = '';

$route['([a-zA-Z0-9._]+)']                      = "user/user_profile/$1";

$route['add_feed.html']							= "home/add_feed";	
$route['add_story.html']                        = "home/add_story";
$route['([a-zA-Z0-9]+)-story_preview.html']                        = "home/story_preview/$1";
$route['save_setting.html']                        = "home/save_setting";
$route['registration.html']                        = "home/registration";
$route['validate_user.html']                        = "home/validate_user";
$route['logout.html']                               = "home/logout";

$route['account_setting.html']                   = "home/account_setting";
$route['change_password.html']                   = "home/change_password";

$route['c/([a-zA-Z0-9]+)']                          = "home/category_search/$1";
$route['c/home/get_category_listings/([a-zA-Z0-9]+)/([a-zA-Z0-9]+)']    = "home/get_category_listings/$1/$2";
$route['feed-([a-zA-Z0-9]+)-([a-zA-Z0-9-_-]+)']         = "home/feed_details/$1/$2";
$route['([a-zA-Z0-9]+)/more_similar_feeds.html']   = "home/similar_feed/$1";
$route['new_feed.html']                          = "home/new_feed";

/************************   Admin Panel  *****************************/

//$route['backend_login.html']                        = "admin/admin_login/login";
//$route['check_user.html']                           = "admin/admin_login/check_user";





/* End of file routes.php */
/* Location: ./application/config/routes.php */
