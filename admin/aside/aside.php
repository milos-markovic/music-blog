<?php
    require '../../bootstrap.php';

    if(!Session::isLogedIn()){
        redirect('../../login');
    }


    $asidePosts = Aside::all();

    $user_type = User::user_type();



    if($_POST){

      if(Validate::check_fields($_POST)){

        $aside = new Aside();
        $aside->title = $_POST['title'];
        $aside->content = $_POST['content'];
        $aside->img = $_FILES['img']['name'];

        Aside::$temp_name = $_FILES['img']['tmp_name'];

        $aside->upload()->create();

        redirect( 'aside','You have entered a new post',null );

      }

    }



    require '../view/aside/aside.view.php';
