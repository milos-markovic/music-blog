<?php
    require 'bootstrap.php';



    var_dump($_POST);

    if($_POST){

        $comment = new Comment();
        $comment->name = $_POST['name'];
        $comment->comment = $_POST['comment'];
        $comment->created_at = date('Y-m-d H:i:s');
        $comment->approve = '0';
        $comment->post_id = $_POST['postId'];
        $comment->create();

        return redirect('index','Comment has been entered',null);
    }

  ?>
