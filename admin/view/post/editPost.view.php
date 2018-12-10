<?php require '../../tamplate/header.php';?>



<div class="row">

  <div class="col-md-6 mx-auto">

    <h2>Update Post:</h2><hr>

  
    <?php include '../../asets/validateErrors.php';?>

    <form action="editPost.php?id=<?php echo $post->id;?>" method="post" enctype="multipart/form-data">
      <div class="form-group">
        <label for="title">Title:</label>
        <input type="text" name="title" id="" value="<?php echo $post->title;?>" class="form-control">
      </div>
      <div class="form-group">
        <label for="">Content:</label>
        <textarea name="content" rows="8"  class="form-control"><?php echo $post->content;?></textarea>
      </div>
      <div class="form-group">
        <label for="">Pick Image for upload:</label>
        <input type="file" name="img" id=""  class="form-control-file">
      </div>
      <div class="form-group">
        <input type="submit" value="Update" class="btn btn-success">
      </div>
    </form>

  </div>
</div>


<?php require '../../tamplate/footer.php';?>
