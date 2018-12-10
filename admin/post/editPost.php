<?php
   require '../../bootstrap.php';

   if(!Session::isLogedIn()){
       redirect('../../login');
   }



   $post = Post::find($_GET['id']);


    if($_POST){


          if(empty($_FILES['img']['error'])){

              if(Validate::validate_inputs($_POST, $_FILES['img'])){

                $post = Post::find($_GET['id']);

                $post->title = $_POST['title'];
                $post->content = $_POST['content'];
                $post->img = $_FILES['img']['name'];
                $post->updated_at = date('Y-m-d H:i:s');
                POST::$temp_name = $_FILES['img']['tmp_name'];

                $post->upload()->update();

                redirect('posts','Post is edit',null);
              }

          }else{

              if( Validate::check_fields($_POST)){

                $post = Post::find($_GET['id']);

                $post->title = $_POST['title'];
                $post->content = $_POST['content'];
                $post->updated_at = date('Y-m-d H:i:s');

                $post->update();

                redirect('posts','Post is edit',null);
              }
          }



    }



   require '../view/post/editPost.view.php';
