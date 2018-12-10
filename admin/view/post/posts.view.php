<?php require '../../tamplate/header.php';?>



<div class="row">

  <div class="col-md-12 m-auto">

    <h2>Posts:</h2><hr>

    <?php echo showMessage(); ?>

    <a href="createPost.php" class="btn btn-outline-success btn-success mb-3" >Create</a>

    <table class="table table-bordered table-hover">
      <thead class="bg-success text-white">
        <tr>
          <th>Image</th>
          <th>Title</th>
          <th>Content</th>
        </tr>
      </thead>
      <tbody class="bg-dark text-white">
        <?php foreach($posts as $post):?>
          <tr>
            <td><img width="150" src="../../asets/img/<?php echo $post->img;?>" /></td>
            <td><?php echo $post->title;?></td>
            <td><?php echo $post->content;?></td>
            <td><a href="postDetails.php?id=<?php echo $post->id;?>">Details</a></td>

            <?php if(User::user_type()->name == 'admin'):?>

              <td><a href="upprovePost.php?id=<?php echo $post->id;?>">

                  <?php if($post->approve == true):?>
                     Do not approve
                  <?php else:?>
                     Approve
                  <?php endif;?>

                </a>
              </td>

            <?php endif;?>


            <td><a href="editPost.php?id=<?php echo $post->id;?>">Update</a></td>
            <td><a href="deletePost.php?id=<?php echo $post->id;?>">delete</a></td>
          </tr>
        <?php endforeach;?>
      </tbody>
    </table>
  </div>

</div>


<?php require '../../tamplate/footer.php';?>
