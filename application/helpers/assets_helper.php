<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

if ( ! function_exists('css_url'))
{
	function css_url($nom)
	{
		return base_url() . 'assets/css/' . $nom . '.css';
	}
}

if ( ! function_exists('js_url'))
{
	function js_url($nom)
	{
		return base_url() . 'assets/js/' . $nom . '.js';
	}
}

if ( ! function_exists('img_url'))
{
	function img_url($nom)
	{
		return base_url() . 'assets/images/' . $nom;
	}
}

if ( ! function_exists('logo_url'))
{
	function logo_url($nom)
	{
		return base_url() . 'assets/img/logos/' . $nom . '.jpg';
	}
}

if ( ! function_exists('visuel_url'))
{
	function visuel_url($nom)
	{
		return base_url() . 'assets/img/visuels/' . $nom . '.jpg';
	}
}

if ( ! function_exists('plugin_url'))
{
	function plugin_url($nom)
	{
		return base_url() . 'assets/plugins/' . $nom;
	}
}

if ( ! function_exists('reg_string')) {
	function reg_string ($string) {
		$result = preg_replace('([{}\(\)\^$&._%#!@=<>:;,~`\�"\'\*\?\/\+\|\[\\\\]|\]|\-)', '', $string);
		$result = removeAccents($result);
		$result = strtolower($result);
		return str_replace(" ", "_", $result);
	}
	function removeAccents($str) {
		$a = array('�', '�', '�', '�', '�', '�', '�', '�', '�', '�', '�', '�', '�', '�', '�', '�', '�', '�', '�', '�', '�', '�', '�', '�', '�', '�', '�', '�', '�', '�', '�', '�', '�', '�', '�', '�', '�', '�', '�', '�', '�', '�', '�', '�', '�', '�', '�', '�', '�', '�', '�', '�', '�', '�', '�', '�', '�', '�', '�', 'A', 'a', 'A', 'a', 'A', 'a', 'C', 'c', 'C', 'c', 'C', 'c', 'C', 'c', 'D', 'd', '�', 'd', 'E', 'e', 'E', 'e', 'E', 'e', 'E', 'e', 'E', 'e', 'G', 'g', 'G', 'g', 'G', 'g', 'G', 'g', 'H', 'h', 'H', 'h', 'I', 'i', 'I', 'i', 'I', 'i', 'I', 'i', 'I', 'i', '?', '?', 'J', 'j', 'K', 'k', 'L', 'l', 'L', 'l', 'L', 'l', '?', '?', 'L', 'l', 'N', 'n', 'N', 'n', 'N', 'n', '?', 'O', 'o', 'O', 'o', 'O', 'o', '�', '�', 'R', 'r', 'R', 'r', 'R', 'r', 'S', 's', 'S', 's', 'S', 's', '�', '�', 'T', 't', 'T', 't', 'T', 't', 'U', 'u', 'U', 'u', 'U', 'u', 'U', 'u', 'U', 'u', 'U', 'u', 'W', 'w', 'Y', 'y', '�', 'Z', 'z', 'Z', 'z', '�', '�', '?', '�', 'O', 'o', 'U', 'u', 'A', 'a', 'I', 'i', 'O', 'o', 'U', 'u', 'U', 'u', 'U', 'u', 'U', 'u', 'U', 'u', '?', '?', '?', '?', '?', '?');
	  	$b = array('A', 'A', 'A', 'A', 'A', 'A', 'AE', 'C', 'E', 'E', 'E', 'E', 'I', 'I', 'I', 'I', 'D', 'N', 'O', 'O', 'O', 'O', 'O', 'O', 'U', 'U', 'U', 'U', 'Y', 's', 'a', 'a', 'a', 'a', 'a', 'a', 'ae', 'c', 'e', 'e', 'e', 'e', 'i', 'i', 'i', 'i', 'n', 'o', 'o', 'o', 'o', 'o', 'o', 'u', 'u', 'u', 'u', 'y', 'y', 'A', 'a', 'A', 'a', 'A', 'a', 'C', 'c', 'C', 'c', 'C', 'c', 'C', 'c', 'D', 'd', 'D', 'd', 'E', 'e', 'E', 'e', 'E', 'e', 'E', 'e', 'E', 'e', 'G', 'g', 'G', 'g', 'G', 'g', 'G', 'g', 'H', 'h', 'H', 'h', 'I', 'i', 'I', 'i', 'I', 'i', 'I', 'i', 'I', 'i', 'IJ', 'ij', 'J', 'j', 'K', 'k', 'L', 'l', 'L', 'l', 'L', 'l', 'L', 'l', 'l', 'l', 'N', 'n', 'N', 'n', 'N', 'n', 'n', 'O', 'o', 'O', 'o', 'O', 'o', 'OE', 'oe', 'R', 'r', 'R', 'r', 'R', 'r', 'S', 's', 'S', 's', 'S', 's', 'S', 's', 'T', 't', 'T', 't', 'T', 't', 'U', 'u', 'U', 'u', 'U', 'u', 'U', 'u', 'U', 'u', 'U', 'u', 'W', 'w', 'Y', 'y', 'Y', 'Z', 'z', 'Z', 'z', 'Z', 'z', 's', 'f', 'O', 'o', 'U', 'u', 'A', 'a', 'I', 'i', 'O', 'o', 'U', 'u', 'U', 'u', 'U', 'u', 'U', 'u', 'U', 'u', 'A', 'a', 'AE', 'ae', 'O', 'o');
	  	return str_replace($a, $b, $str);
	}
}

if(! function_exists("days_difference")) {
    function days_difference($day1,$day2){
        $datetime1 = new DateTime($day1);
 
        $datetime2 = new DateTime($day2);

        $difference = $datetime1->diff($datetime2);
        
        return $difference->days;
    }
}

if(! function_exists("get_diff_percentage")) {
    function get_diff_percentage($spend,$total){
        if($total!=0){
           return ($spend/$total)*100;
        }
        else
            return 0;        
    }
}

if ( ! function_exists('get_time1'))
{
	function get_time1($now){
            if($now < 60){
            return $now.' seconde(s)';
        }
        else if($now >=60 && $now < 3600){
            $minute = intval($now/60);
            $sec = $now - (60 * $minute);
            return $minute.' minute(s) '.$sec.' seconde(s)';
        }
        else if($now >=3600 && $now<86400){
            $hour = intval($now/3600);
            $sec = $now - (3600 * $hour);
            if($sec >=60 && $sec < 3600 ){
                $minute = intval($sec/60);
                $second = $sec - (60 * $minute);
                return $hour.' heure(s) et '.$minute.' minute(s)';
            }
        }
        else if($now >= 86400 && $now < 172800){
            $day = intval($now/86400);
            $sec = $now - (86400 * $day);
            if($sec >= 3600 && $sec < 86400){
                $hour = intval($sec/3600);
                $second =  $sec - (3600 * $hour);
            }
            else if(@$second >=60 && @$second < 3600 ){
                $minute = intval($second/60);
                $seconds = $second - (60 * $minute);
            }
            else if(@$seconds < 60){
                $sec = $now;
            }
            return $day.' jour(s)';
        }
        else if($now >= 172800){
            $time = date("Y-m-d H:i:s",time()-$now);
            $date = date('d/m/Y', strtotime($time));
            $t = date('H:i', strtotime($time));
            
            return $date;
           // return $date.' '.$mont.' '.$year;
        }
    }
    
}

if ( ! function_exists('get_time'))
{
    function get_time($now){
        if($now < 60){
            return 'il y a '.$now.' seconde(s) à ';
        }
        else if($now >=60 && $now < 3600){
            $minute = intval($now/60);
            $sec = $now - (60 * $minute);
            return 'il y a '.$minute.' minute(s) et '.$sec.' seconde(s) à ';
        }
        else if($now >=3600 && $now<86400){
            $hour = intval($now/3600);
            $sec = $now - (3600 * $hour);
            if($sec >=60 && $sec < 3600 ){
                $minute = intval($sec/60);
                $second = $sec - (60 * $minute);
                return 'il y a '.$hour.' heure(s) et '.$minute.' minute(s) à ';
            }
        }
        else if($now >= 86400 ){///&& $now < (3*86400)
            $day = intval($now/86400);
            $sec = $now - (86400 * $day);
            if($sec >= 3600 && $sec < 86400){
                $hour = intval($sec/3600);
                $second =  $sec - (3600 * $hour);
            }
            else if(@$second >=60 && @$second < 3600 ){
                $minute = intval($second/60);
                $seconds = $second - (60 * $minute);
            }
            else if(@$seconds < 60){
                $sec = $now;
            }
            return 'il y a '.$day.' jour(s) à ';
        }
        else if($now >= (3*86400)){
            $time = date("Y-m-d H:i:s",time()-$now);
            $date = date('d/m/Y', strtotime($time));
            $t = date('H:i', strtotime($time));
            
            return ' à ';
           // return $date.' '.$mont.' '.$year;
        }
    }
    
}

if ( ! function_exists('get_time_facebook'))
{
    function get_time_facebook($now){
        if($now < 60){
            if($now == 1){
                return $now.' seconde';
            }
            else{
                return $now.' secondes';
            }
        }
        else if($now >=60 && $now < 3600){
            $minute = intval($now/60);
            $sec = $now - (60 * $minute);
            if($minute == 1){
                $sig_min = $minute.' minute et ';
            }
            else{
                $sig_min = $minute.' minutes et ';
            }
            if($sec == 1){
                $sig_sec = $sec.' seconde';
            }
            else{
                $sig_sec = $sec.' secondes';
            }
            return $sig_min.$sig_sec;
        }
        else if($now >=3600 && $now<86400){
            $hour = intval($now/3600);
            $sec = $now - (3600 * $hour);
            if($sec >=60 && $sec < 3600 ){
                $minute = intval($sec/60);
            }
            if($hour == 1){
                $sig_hr = $hour.' heure et ';
            }
            else{
                $sig_hr = $hour.' heures et ';
            }
            if(@$minute == 1){
                $sig_min = $minute.' minute';
            }
            else{
                $sig_min = $minute.' minutes';
            }
            return $sig_hr.$sig_min;
        }
        else if($now >= 86400 ){///&& $now < (3*86400)
            $day = intval($now/86400);
            $sec = $now - (86400 * $day);
            if($sec >= 3600 && $sec < 86400){
                $hour = intval($sec/3600);
            }
            if($day == 1){
                $sig_day = $day.' jour et ';
            }
            else{
                $sig_day = $day.' jours et ';
            }
            if(@$hour == 1){
                $sig_hr = $hour.' heure';
            }
            else{
                $sig_hr = $hour.' heures';
            }
            return $sig_day.$sig_hr;
        }
        else if($now >= (3*86400)){
            return 'date';
        }
    }
    
}

if ( ! function_exists('ca_prop')) {
    
    function ca_prop($budget, $chance){
        
        return $amount = (($budget * $chance)/100);
    }
}

if ( ! function_exists('get_ca_opt')) {
    
    function get_ca_opt($remise, $budget){
        
        $ca_opt = $budget - (($remise/100) * $budget);
        return $ca_opt;
    }
}

if ( ! function_exists('get_com_Marge')) {
    
    function get_com_Marge($Marge,$ca_opt,$tot_med_cost,$comm_ca){
        
        $com_Marge = ($Marge/100) * ($ca_opt - ($tot_med_cost + $comm_ca) );
        return $com_Marge;
    }
}

if ( ! function_exists('get_com_CA')) {
    
    function get_com_CA($CA, $ca_opt){
        
        $com_CA = $ca_opt * ($CA/100);
        return $com_CA;
    }
}

if ( ! function_exists('get_Marge')) {
    
    function get_Marge($ca_opt,$tot_med_cost,$commision){
        
        $Marge = $ca_opt - ($tot_med_cost + $commision);
        return $Marge;
    }
}

if ( ! function_exists('get_total_CA_prop')) {
    
    function get_total_CA_prop($budget,$remise){
        
        $ca_prop_after_remise = $budget-(($remise/100)*$budget); // Calculate Remis for all campaigns
        //$ca_prop_after_chance = $ca_prop_after_remise * ($chance/100); // Calculate Chance for all campaigns that is applied on the remise
        return $ca_prop_after_remise;
    }
}

if ( ! function_exists('phpThumb_url'))
{
	function phpThumb_url($width,$height,$url)
	{
		return base_url() . 'assets/plugins/php_dump/thumb.php?width='.$width.'&height='.$height.'&url='.$url;
	}
}

?>