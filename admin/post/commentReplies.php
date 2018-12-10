<?php
 require '../../bootstrap.php';

 if(!Session::isLogedIn()){
     redirect('../../login');
 }


 $comment = Comment::find($_GET['id']);



 $replies = Reply_Comment::get_Replys($comment->id);

 $usertype = User::user_type();



  require '../view/post/commentReplies.view.php';
