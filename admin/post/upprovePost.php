<?php
   require '../../bootstrap.php';

   if(!Session::isLogedIn()){
       redirect('../../login');
   }

   

   $post = Post::find($_GET['id']);




   if($post->approve){
      $post->approve = false;
   }else{
      $post->approve = true;
   }

   $post->update();

   return redirect('posts');
