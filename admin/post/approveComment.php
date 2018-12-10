<?php
    require '../../bootstrap.php';

    if(!Session::isLogedIn()){
        redirect('../../login');
    }



    $comment = Comment::find($_GET['id']);


    if($comment->approve){
      $comment->approve = false;
    }else{
      $comment->approve = true;
    }

    $comment->update();

    redirect('postDetails',null,$comment->post_id);
