<?php include '../../tamplate/header.php';?>


<div class="col-md-6 mx-auto">

  <h2>Update Aside Post:</h2><hr>


  <?php include '../../asets/validateErrors.php';?>

  <form action="updateAsidePost.php?id=<?php echo $asidePost->id; ?>" method="post" enctype="multipart/form-data">
    <div class="form-group">
      <label for="name">Title:</label>
      <input type="text" name="title" id="" value="<?php echo $asidePost->title;?>" class="form-control">
    </div>
    <div class="form-group">
      <label for="">Content:</label>
      <textarea name="content" id="" cols="30" rows="10" class="form-control"><?php echo $asidePost->content;?></textarea>
    </div>
    <div class="form-group">
      <label for="">Pick profile picture:</label>
      <input type="file" name="img" id="" class="form-control-file">
    </div>
    <div class="form-group">
      <input type="submit" value="Update" class="btn btn-success">
    </div>
  </form>


</div>




<?php include '../../tamplate/footer.php';?>
