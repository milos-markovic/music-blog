<?php
 require '../../bootstrap.php';

 if(!Session::isLogedIn()){
     redirect('../../login');
 }


  $comment = Comment::find($_GET['id']);

  if($comment){

    if($comment->delete()){
      Reply_Comment::deleteCommentReplies($comment->id);
    }

    redirect('postDetails',null, $comment->post_id);

  }
