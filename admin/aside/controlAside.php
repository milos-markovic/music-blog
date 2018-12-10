<?php
 require '../../bootstrap.php';


if(!isset($_SESSION['aside'])){

    $_SESSION['aside'] = true;

}else{

    unset($_SESSION['aside']); 

}


redirect('aside','The look is changed on the indes page',null);
