<?php
  require '../../bootstrap.php';



  $asidePost = Aside::find($_GET['id']);

  $asidePost->delete();

  redirect( 'aside','Post was deleted',null );
