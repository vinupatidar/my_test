<?php

if ( ! defined('BASEPATH') )
    exit( 'No direct script access allowed' );

class Wikyfeed
{
    public function __construct()
    {
        //ini_set('session.gc_maxlifetime', 60*60*24);
        //session_start();
    }

	function format_interval($interval) {
		$result_y = 0;
		$result_m = 0;
		$result_d = 0;
		$result_h = 0;
		$result_i = 0;
		$result_s = 0;
	
		if ($interval->y) { $result_y = $interval->format("%y"); }
		if ($interval->m) { $result_m = $interval->format("%m"); }
		if ($interval->d) { $result_d = $interval->format("%d"); }
		if ($interval->h) { $result_h = $interval->format("%h"); }
		if ($interval->i) { $result_i = $interval->format("%i"); }
		if ($interval->s) { $result_s = $interval->format("%s"); }

		if($result_y != 0){ 
                    return $result_y.' years '; exit;
                }elseif($result_m != 0){ 
                    return $result_m.' months'; exit;
                }elseif($result_d != 0){ 
                    return $result_d.' days'; exit;
                }elseif($result_h != 0){ 
                    return $result_h.' hours'; exit;
                }elseif($result_i != 0){ 
                    return $result_i.' minutes'; exit;
                }elseif($result_s != 0){ 
                    return $result_s.' seconds'; exit;
                }else{ 
                    return '0 second'; exit;
                }
           
           // return $result;
	}

   
}

?>