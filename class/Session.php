<?php

 class Session{


    public static function login($inputs){
        $findUser = User::find_user($inputs);
      ///  var_dump($findUser);exit;

        if(!empty($findUser)){

            return self::set_Session($findUser);
        }
    }
    public static function set_Session($findUser){
        if(is_object($findUser)){

            $_SESSION["userId"] = $findUser->id;
            $_SESSION['isLogedIn'] = true;

            return true;
        }
        return false;
    }
    public static function logout(){
      if(isset($_SESSION['userId'])){

          $_SESSION = [];
          return true;
      }
      return false;
    }
    public static function isLogedIn(){
      if(isset($_SESSION['userId'])){
        return true;
      }
      return false;
    }
    public static function setMessage($test){

        $_SESSION['message'] = $test;
    }


 }
