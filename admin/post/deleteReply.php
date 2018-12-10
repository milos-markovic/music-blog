<?php
  require '../../bootstrap.php';

  if(!Session::isLogedIn()){
      redirect('../../login');
  }


  $reply = Reply_Comment::find($_GET['id']);

  $reply->delete();

  redirect('commentReplies','You have successfully deleted the reply to the comment',$reply->comment_id);
