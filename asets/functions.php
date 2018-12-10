<?php

   function redirect($url, $message = null, $id = null){

      if(isset($message) && isset($id)){
        header("location:$url.php?message=$message&id=$id");
      }elseif(isset($message)){

        header("location:$url.php?message=$message");
      }elseif(isset($id)){

        header("location:$url.php?id=$id");
      }else{
        header("location: $url.php");
      }

   }

   // function back($url, $id = null){
   //   //var_dump($id);exit;
   //
   //   if(isset($id)){
   //
   //     header("location:$url.php?id=$id");
   //     exit;
   //   }else{
   //     header("location:$url.php");
   //     exit;
   //   }
   //
   // }

   function showMessage(){

      if(isset($_GET['message'])){

          return "<p class='alert alert-success mb-5'>". $_GET['message']. "</p>";
      }else{
         return '';
      }

   }
