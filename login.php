<?php
    require 'bootstrap.php';


    if($_POST){

        if( Session::login($_POST) ){
            redirect('admin/user/users');
        }

    }


    require 'view/login.view.php';
