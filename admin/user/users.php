<?php
   require '../../bootstrap.php';

   if(!Session::isLogedIn()){
       redirect('../../login');
   }


   if($_POST){

    //var_dump($_FILES['tmp_name']);exit;

      if( Validate::validate_inputs($_POST,$_FILES['img']) ){

          $user = new User();
          $user->name = $_POST['name'];
          $user->email = $_POST['email'];
          $user->password = $_POST['password'];
          $user->img = $_FILES['img']['name'];
          $user->usertype_id = $_POST['usertype'];

          User::$temp_name = $_FILES['img']['tmp_name'];

          $user->upload()->create();


          redirect('users','You have successfully entered a new user',null);

      }
   }


    $users = User::getUsers();
// var_dump($users);exit;

   require '../view/user/users.view.php';
