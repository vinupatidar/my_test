<?php

if ( ! defined('BASEPATH') )
    exit( 'No direct script access allowed' );

class Nativesession
{
    public function __construct()
    {
        //ini_set('session.gc_maxlifetime', 60*60*24);
        session_start();
    }

    public function set( $key, $value = '' )
    {
        
        if($value != '')
        { 
            $_SESSION[$key] = $value;
        }else{
            
            foreach($key as $keys => $values)
            {
                $_SESSION[$keys] = $values;
               
            }
        }
    }

    public function get( $key )
    {
        return isset( $_SESSION[$key] ) ? $_SESSION[$key] : null;
    }

    public function regenerateId( $delOld = false )
    {
        session_regenerate_id( $delOld );
    }

    public function delete( $key )
    {
        unset( $_SESSION[$key] );
    }
    
    public function destroy()
    {
        session_destroy();
    }
}

?>