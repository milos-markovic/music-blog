<?php require '../../tamplate/header.php';?>

<div class="row">

    <div class="col-md-4">
      <h4 class="text-center mb-4">Comment:</h4>

      <blockquote class="blockquote text-center mb-5">
        <p class="mb-0 lead"><?php echo $comment->comment;?></p>
        <footer class="blockquote-footer"><cite title="Source Title"><?php echo $comment->name; ?></cite></footer>
      </blockquote>
    </div>

    <div class="col-md-8">
        <h3 class="display-4">Comment Replies:</h3><hr>

        <?php echo showMessage(); ?>

        <?php foreach($replies as $comReply):?>

          <div class="card my-4 text-white bg-dark">
            <div class="card-header">
                <?php echo $comReply->name;?>
            </div>
            <div class="card-body">
              <p class="card-text"><?php echo $comReply->reply; ?></p>

              <?php if($usertype->name == 'admin'):?>
              <a href="approveReply.php?id=<?php echo $comReply->id;?>" class="btn btn-outline-success">
                <?php if(!$comReply->approve):?>
                      Approve
                <?php else:?>
                      Do not approve
                <?php endif;?>
              </a>
            <?php endif;?>

              <a href="deleteReply.php?id=<?php echo $comReply->id;?>" class="btn btn-outline-danger">Delete</a>
            </div>
          </div>


        <?php endforeach;?>

    </div>

</div>











<?php require '../../tamplate/footer.php';?>
