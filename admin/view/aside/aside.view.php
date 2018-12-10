<?php include '../../tamplate/header.php';?>



<div class="row">

<?php if($user_type->name == 'admin'):?>


    <div class="col-md-7 mr-auto">

    <h2>Aside Posts:</h2><hr>

     <?php echo showMessage(); ?>

      <table class="table table-bordered table-hover">
        <thead class="bg-success text-white">
          <tr>
            <th>Image</th>
            <th>Title</th>
            <th>Content</th>
          </tr>
        </thead>
        <tbody class="bg-dark text-white">
          <?php foreach($asidePosts as $post):?>
            <tr>
              <td><img src="../../asets/aside_img/<?php echo $post->img;?>" height="100" /></td>
              <td><?php echo $post->title;?></td>
              <td><?php echo $post->content;?></td>
              <td><a href="updateAsidePost.php?id=<?php echo $post->id;?>">Update</a></td>
              <td><a href="deleteAsidePost.php?id=<?php echo $post->id;?>">Delete</a></td>
            </tr>
          <?php endforeach;?>
        </tbody>
      </table>

      <a href="controlAside.php" class="<?php echo isset($_SESSION['aside']) ? 'btn btn-outline-danger' : 'btn btn-outline-success' ?> mt-4"
        data-toggle="tooltip" data-html="true" data-placement="right" title="Click to change view on <b>INDEX</b> page"
      >

          <?php if(isset($_SESSION['aside'])): ?>
              Hide Aside
          <?php else:?>
              Show Aside
          <?php endif;?>

      </a>


    </div>

    <?php if(User::user_type()->name == 'admin'):?>

      <div class="col-md-4">

        <h2>Create Aside Post:</h2><hr>

        <?php include '../../asets/validateErrors.php';?>

        <form action="" method="post" enctype="multipart/form-data">
          <div class="form-group">
            <label for="name">Title:</label>
            <input type="text" name="title" id="" class="form-control">
          </div>
          <div class="form-group">
            <label for="">Content:</label>
            <textarea name="content" id="" cols="30" rows="10" class="form-control"></textarea>
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


<?php else:?>

      <div class="col-md-12">

      <div class="jumbotron jumbotron-fluid text-center bg-dark text-light">
        <div class="container">
          <h1 class="display-4">Aside</h1>
          <p class="lead">Only <span class="font-weight-bold">admin</span> users can modify the aside fields</p>
        </div>
      </div>

    </div>

<?php endif;?>


</div>








<?php include '../../tamplate/footer.php';?>
