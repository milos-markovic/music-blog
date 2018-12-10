
<?php if(count(Validate::$errors)):?>

  <ul class="alert alert-danger p-4">

    <?php

        foreach(Validate::$errors as $error){

            echo "<li>$error</li>";

        }

    ?>

  </ul>

<?php endif;?>
