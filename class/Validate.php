<?php

class Validate {

    public static $errors = [];
    public static $error = true;

    public static function validate_inputs($inputs, $file = null){

        if(array_key_exists ( 'email', $inputs )){
            $check_fields = self::check_fields($inputs);
            $check_email = self::check_email($inputs);
            $check_file_upload = self::check_file_field($file);

            if( !$check_fields || !$check_email || !$check_file_upload ){
                return false;
            }else{
                return true;
            }

        }else{
            $check_fields = self::check_fields($inputs);
            $check_file_upload = self::check_file_field($file);

            if( !$check_fields || !$check_file_upload ){
                return false;
            }else{
                return true;
            }
        }

    }
    public static function check_email($inputs){

        if(!filter_var($inputs['email'], FILTER_VALIDATE_EMAIL)){
              array_push(self::$errors, 'Field email is not valid format');
              return false;
        }
        return true;
    }

    public static function check_fields($inputs){

        foreach($inputs as $key => $value){

            if($inputs[$key] == ''){
              array_push(self::$errors,"Field $key is required field");
              self::$error = false;
            }

        }
        return self::$error;
    }

    public static function check_file_field($file){

        if( $file['error']  !==  0 ){
          array_push(self::$errors,'Pick image for upload');
          return false;
        }
        return true;
    }


}
//$validate = new Validate();
