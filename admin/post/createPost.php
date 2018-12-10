<?php
   require '../../bootstrap.php';

   if(!Session::isLogedIn()){
       redirect('../../login');
   }



    if($_POST){


      if(Validate::validate_inputs($_POST, $_FILES['img'])){

          $post = new Post();

          $post->title = $_POST['title'];
          $post->content = $_POST['content'];
          $post->img = $_FILES['img']['name'];
          $post->approve = false;
          $post->created_at = date('Y-m-d H:i:s');
          $post->updated_at = null;
          $post->user_id = $_SESSION['userId'];
          POST::$temp_name = $_FILES['img']['tmp_name'];


          $post->upload()->create();

          redirect('posts','Post is created',null);

      }

    }



   require '../view/post/createPost.view.php';
