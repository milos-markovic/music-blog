<?php
   require '../../bootstrap.php';

   if(!Session::isLogedIn()){
       redirect('../../login');
   }



   $posts = Post::posts();
  // var_dump($posts);




   require '../view/post/posts.view.php';
