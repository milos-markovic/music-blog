<?php require '../../tamplate/header.php';?>



<div class="row">

  <div class="col-md-6 mx-auto">

    <h2>Update User:</h2><hr>

    <?php include '../../asets/validateErrors.php';?>

    <form action="editUser.php?id=<?php echo $user->id;?>" method="post" enctype="multipart/form-data">
      <div class="form-group">
        <label for="name">Name:</label>
        <input type="text" name="name" id="" value="<?php echo $user->name;?>" class="form-control">
      </div>
      <div class="form-group">
        <label for="">Email:</label>
        <input type="text" name="email" id="" value="<?php echo $user->email;?>" class="form-control">
      </div>
      <div class="form-group">
        <label for="">Password:</label>
        <input type="password" name="password" id="" value="<?php echo $user->password;?>" class="form-control">
      </div>

      <?php if(User::user_type()->name === 'admin'):?>
      <div class="form-group">
        <label for="">User type:</label>
        <select name="usertype" id="" class="form-control">
          <option value="1" <?php if($user->usertype_id == 1)echo 'selected'; ?>  >Admin</option>
          <option value="2" <?php if($user->usertype_id == 2)echo 'selected'; ?>  >User</option>
        </select>
      </div>
      <?php endif;?>

      <div class="form-group">
        <label for="">Pick image for upload:</label>
        <input type="file" name="img" id="" class="form-control-file">
      </div>
      <div class="form-group">
        <input type="submit" value="Update" class="btn btn-success">
      </div>
    </form>

  </div>
</div>


<?php require '../../tamplate/footer.php';?>
