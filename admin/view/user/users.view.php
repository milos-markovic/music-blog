<?php require '../../tamplate/header.php';?>



<div class="row">
  <div class="col-md-7 mr-auto">

  <h2>Users:</h2><hr>

   <?php echo showMessage(); ?>

    <table class="table table-bordered table-hover">
      <thead class="bg-success text-white">
        <tr>
          <th></th>
          <th>Name</th>
          <th>Email</th>
          <th>User type</th>
        </tr>
      </thead>
      <tbody class="bg-dark text-white">
        <?php foreach($users as $user):?>
          <tr>
            <td><img src="../../asets/user_img/<?php echo $user->img;?>" width="50" /></td>
            <td><?php echo $user->name;?></td>
            <td><?php echo $user->email;?></td>
            <td><?php echo $user->usertype;?></td>

            <?php if(User::user_type()->name == 'admin'):?>

              <td><a href="editUser.php?id=<?php echo $user->id;?>">Update</a></td>
              <td><a href="deleteUser.php?id=<?php echo $user->id;?>">delete</a></td>

            <?php elseif($_SESSION['userId'] === $user->id):?>

              <td><a href="editUser.php?id=<?php echo $user->id;?>">Update</a></td>
              <!-- <td><a href="deleteUser.php?id=<?php echo $user->id;?>">delete</a></td> -->

            <?php endif;?>
          </tr>
        <?php endforeach;?>
      </tbody>
    </table>

  </div>

<?php if(User::user_type()->name == 'admin'):?>

  <div class="col-md-4">

    <h2>Create User:</h2><hr>

    <?php include '../../asets/validateErrors.php';?>

    <form action="" method="post" enctype="multipart/form-data">
      <div class="form-group">
        <label for="name">Name:</label>
        <input type="text" name="name" id="" class="form-control">
      </div>
      <div class="form-group">
        <label for="">Email:</label>
        <input type="text" name="email" id="" class="form-control">
      </div>
      <div class="form-group">
        <label for="">Password:</label>
        <input type="password" name="password" id="" class="form-control">
      </div>
      <div class="form-group">
        <label for="">User type:</label>
        <select name="usertype" id="" class="form-control">
          <option value="1">Admin</option>
          <option value="2">User</option>
        </select>
      </div>
      <div class="form-group">
        <label for="">Pick profile picture:</label>
        <input type="file" name="img" id="" class="form-control-file">
      </div>
      <div class="form-group">
        <input type="submit" value="Create" class="btn btn-success">
      </div>
    </form>

  </div>

<?php endif;?>
</div>


<?php require '../../tamplate/footer.php';?>
