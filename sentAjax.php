<?php
  require 'bootstrap.php';

 if($_POST){

    $postId = $_POST['postId'];
    $name = $_POST['name'];
    $comment = $_POST['comment'];


    $com = new Comment();
    $com->name = $name;
    $com->comment = $comment;
    $com->created_at = date('Y-m-d H:i:s');
    $com->post_id = $postId;
    $com->create();


//    $comments = Comment::get_post_comments($postId);

    echo json_encode($com);

 }
