<?php
   require '../../bootstrap.php';

   if(!Session::isLogedIn()){
       redirect('../../login');
   }



   $post = Post::find($_GET['id']);

   if( Comment::delete_Post_Comments($post->id) ){

     if($post->removeImage()->delete()){
       redirect('posts','Post is deleted',null);
     }

   }
