<?php require 'tamplate/header.php';?>



<div class="row">

  <div class="col-md-4 mx-auto">

    <h2>Login:</h2><hr>

    <?php include 'asets/validateErrors.php';?>

    <form action="" method="post">
      <div class="form-group">
        <label for="name">Email:</label>
        <input type="text" name="email" id="" class="form-control">
      </div>
      <div class="form-group">
        <label for="">Password:</label>
        <input type="password" name="password" id="" class="form-control">
      </div>
      <div class="form-group text-center">
        <input type="submit" value="Login" class="btn btn-primary">
      </div>
    </form>

  </div>

</div>


<?php require 'tamplate/footer.php';?>
