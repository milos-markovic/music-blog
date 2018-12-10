<?php
   require '../../bootstrap.php';

   if(!Session::isLogedIn()){
       redirect('../../login');
   }


  if( $user = User::delete_all_from_user($_GET['id']) ){

    redirect('users','The user is delete',null);
  }
