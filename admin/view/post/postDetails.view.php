<?php require '../../tamplate/header.php';?>


<h1>Details of post:</h1>

<table class="table table-bordered mt-5">
  <thead class="bg-success text-light">
    <tr>
      <th>Created at</th>
      <th>Updated at</th>
      <th>Post wrote</th>
    </tr>
  </thead>
  <tbody class="bg-dark text-light">
    <tr>
      <td><?php echo $post->created_at; ?></td>
      <td><?php echo $post->updated_at; ?></td>
      <td><?php echo $post->name;?></td>
    </tr>
  </tbody>
</table>



<?php if(!empty($postComments)):?>

  <h3 class="mt-5 mb-3">Comments of post:</h3>

  <?php echo showMessage(); ?>

  <div class="row">

      <div class=" col-md-2 img ">
          <img src="../../asets/img/<?php echo $post->img;?>" class="img-fluid img-thumbnail" />
      </div>
      <div class=" col-md-10 adminComments">

          <table class="table table-hover">
            <thead>
              <tr>
                <th>Name</th>
                <th>Comment</th>
                <th>Created at</th>
              </tr>
            </thead>
            <tbody>
              <?php foreach($postComments as $com):?>
                <tr>
                  <td><?php echo $com->name;?></td>
                  <td><?php echo $com->comment?></td>
                  <td><?php echo $com->created_at;?></td>
                  <td><a class="btn btn-link" href="commentReplies.php?id=<?php echo $com->id;?>">Replies</a></td>
                  <td>
                    <button type="button" class="btn btn-dark" id="reply" data-toggle="modal" data-target="#exampleModalCenter" value="<?php echo $com->id;?>">
                        Reply
                    </button>
                  </td>

                  <?php if($usertype->name == 'admin'):?>
                  <td><a href="approveComment.php?id=<?php echo $com->id;?>" class="btn btn-dark">

                          <?php if($com->approve == true):?>
                             Do not approve
                          <?php else:?>
                             Approve
                          <?php endif;?>

                      </a>
                  </td>
                  <?php endif;?>

                  <td><a href="deleteComment.php?id=<?php echo $com->id;?>" class="btn btn-danger">Delete</a></td>
                </tr>
              <?php endforeach;?>
            </tbody>
          </table>

      </div>
  </div>

  <!-- reply comment dialog -->

  <!-- <div class="reply-comment col-md-3">
    <div class="card">
      <div class="card-header bg-success text-white">
        <h5 class="m-0">Reply to comment</h5>
        <button type="button" class="close" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="card-body bg-dark">

        <form action="" method="post">
          <input type="hidden" id="commentId" name="commentId">

          <div class="form-group">
            <label for="" class="text-white">Reply:</label>
            <textarea name="reply" id=""  rows="5" class="form-control"></textarea>
          </div>

          <div class="form-group">
            <input type="submit" value="Reply" class="btn btn-outline-success">
          </div>
        </form>

      </div>
    </div>
  </div> -->


  <!-- Modal -->

  <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalCenterTitle">Modal title</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">

          <form action="" method="post">
            <input type="hidden" id="commentId" name="commentId">

            <div class="form-group">
              <label for="" class="text-white">Reply:</label>
              <textarea name="reply" id=""  rows="5" class="form-control"></textarea>
            </div>

            <div class="form-group">
              <input type="submit" value="Reply" class="btn btn-outline-success">
            </div>
          </form>

        </div>
      </div>
    </div>
  </div>




<?php endif?>




<?php require '../../tamplate/footer.php';?>




<script>

      /* show reply button*/

      const reply = document.querySelectorAll('#reply');
      const replyArray =  Array.from(reply);

      replyArray.forEach(function(item){

          item.addEventListener('click',function(e){

              /* get Id of comment from button*/

              let comment_id = item.value;

              /* insert value of id in hidden field of  REPLY form */

               const commentId = document.querySelector("#commentId");
               commentId.value = comment_id;

              e.preventDefault();
          });

      });


</script>
