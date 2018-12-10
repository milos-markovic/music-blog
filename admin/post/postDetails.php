<?php
  require '../../bootstrap.php';

  if(!Session::isLogedIn()){
      redirect('../../login');
  }



  $post = Post::post_detail($_GET['id']);

  $postComments = POST::post_comments($_GET['id']);

  $usertype = User::user_type();




  if($_POST){

      //var_dump($_POST['commentId']);exit;

      $new_Reply = new Reply_Comment();
      $new_Reply->name = User::auth_user()->name;
      $new_Reply->reply = $_POST['reply'];
      $new_Reply->created_at = date('Y-m-d H:i:s');
      $new_Reply->approve = false;
      $new_Reply->comment_id = $_POST['commentId'];

      $new_Reply->create();



      redirect('postDetails','you have entered the reply',$post->id);

  }



  require '../view/post/postDetails.view.php';
