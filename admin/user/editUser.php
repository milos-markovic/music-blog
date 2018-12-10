<?php
   require '../../bootstrap.php';

   if(!Session::isLogedIn()){
       redirect('../../login');
   }



   $user = User::find($_GET['id']);



    if($_POST){

      //var_dump($_FILES['img']['name']);exit;

      if(Validate::check_fields($_POST)){

            $user = User::find($_GET['id']);

            $user->name = $_POST['name'];
            $user->email = $_POST['email'];
            $user->password = $_POST['password'];
            $user->usertype_id = $_POST['usertype'];

            if(empty($_FILES['img']['error'])){
              $user->img = $_FILES['img']['name'];
              User::$temp_name = $_FILES['img']['tmp_name'];
            }


            $user->upload()->update();

            redirect('users','The user is edit', null);
        }
    }


   require '../view/user/editUser.view.php';
