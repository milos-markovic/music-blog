<?php
  require '../../bootstrap.php';


  $title = $_GET['name'];

  $post = new Post();

  $findPost = $post->find_post_by_name($title);

  echo json_encode($findPost);
