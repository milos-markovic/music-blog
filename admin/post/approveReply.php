<?php
    require '../../bootstrap.php';

    if(!Session::isLogedIn()){
        redirect('../../login');
    }



    $reply = Reply_Comment::find($_GET['id']);


    if($reply->approve){
      $reply->approve = false;
    }else{
      $reply->approve = true;
    }
    $reply->update();


    redirect('commentReplies',null, $reply->comment_id);
