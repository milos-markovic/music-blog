<?php
 require 'bootstrap.php';

 if( Session::logout() ){
    redirect('login');
 }
