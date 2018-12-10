<?php require '../../tamplate/header.php';?>



<div class="row">

  <div class="col-md-6 mx-auto">


    <h2>Create Post:</h2><hr>

    <?php include '../../asets/validateErrors.php';?>

    <form action="" method="post" enctype="multipart/form-data">
      <div class="form-group">
        <label for="name">Title:</label>
        <input type="text" name="title" id="" class="form-control">
      </div>
      <div class="form-group">
        <label for="">Content:</label>
        <textarea name="content" rows="6" class="form-control" ></textarea>
      </div>
      <div class="form-group">
        <label for="">Pick image for upload:</label>
        <input type="file" name="img" id="" class="form-control-file">
      </div>
      <div class="form-group">
        <input type="submit" value="Create" class="btn btn-success">
      </div>
    </form>

  </div>

</div>


<?php require '../../tamplate/footer.php';?>
