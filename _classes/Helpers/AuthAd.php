<?php 

namespace Helpers;

class AuthAd {
    
    static $loginUrl = '/admin/login.php';

    static function check(){

        session_start();

        if(isset($_SESSION['user'])){

            return $_SESSION['user'];

        } else {

            HTTP::redirect(static::$loginUrl);
        }
    }
}