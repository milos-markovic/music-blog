<?php
  require '../../bootstrap.php';


  $asidePost = Aside::find($_GET['id']);


  if($_POST){

    if(Validate::check_fields($_POST)){

        $asidePost = Aside::find($_GET['id']);

        $asidePost->title = $_POST['title'];
        $asidePost->content = $_POST['content'];

        if(!$_FILES['img']['error']){
          $asidePost->img = $_FILES['img']['name'];
          Aside::$tmp_name =  $_FILES['img']['tmp_name'];
        }

        $asidePost->upload()->update();

        return redirect('aside','Post was updated',null);

    }


  }


  require '../view/aside/updateAsidePost.php';
