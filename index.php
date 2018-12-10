<?php require 'bootstrap.php'; ?>

<?php include 'tamplate/header.php';?>


  <?php $posts = Post::getPosts(); ?>

<?php //echo $_SERVER["DOCUMENT_ROOT"];?>
  <!-- show or hide aside content on the index page -->

  <?php if( isset($_SESSION['aside']) ):?>

    <?php  $asidePosts = Aside::all(); ?>

  <?php endif;?>

  <!--  -->

  <div class="d-flex align-items-end">
    <h1 class="display-4 mr-4 mb-0">Music Blog</h1>
    <p class="lead mb-0">See what's new on the music scene</p>
  </div>
  <hr>


  <div class="row py-4">

      <?php if(isset($asidePosts)):?>

        <!-- main-posts -->

          <div class="col-md-8 mr-auto" id="article_post">

            <?php foreach($posts as $post):?>

                  <?php if($post->approve):?>

                    <div class="mb-5">

                        <div class="card bg-dark text-light">

                          <div class="card-header d-flex">
                            <div class="title mr-auto">
                              <h5 class="mb-0" style="color:gold;" ><?php echo $post->title;?></h5>
                              <small>Created at: <?php echo $post->created_at;?></small>
                            </div>
                            <div class="create align-self-start">
                                <p>Article wrote: <?php echo $post->name;?></p>
                            </div>
                          </div>
                          <img class="card-img-top" src="asets/img/<?php echo $post->img;?>" alt="Card image cap">
                          <div class="card-body">
                            <p class="card-text"><?php echo $post->content;?></p>
                          </div>

                        </div>




                      <button id="comment_button" class="btn btn-light border border-dark  mt-3">Show Comments</button>

                      <div class="comments">


                          <?php  $postComments = POST::post_comments($post->id); ?>

                          <div class="display-comments mt-3 col-md-8 mx-auto">

                            <?php if(!empty($postComments)):?>


                                  <?php foreach($postComments as $com):?>

                                        <?php if($com->approve):?>
                                          <div class="media my-2">
                                            <img class="mr-3" src="https://via.placeholder.com/64" alt="Generic placeholder image">
                                            <div class="media-body">
                                              <h5 class="mt-0"><?php echo $com->name;?></h5>
                                              <?php echo $com->comment;?>

                                              <?php $commentReplys = Reply_Comment::get_Replys($com->id);?>

                                              <?php foreach($commentReplys as $reply):?>
                                                <?php $user = User::getUserByName($reply->name);?>

                                                <?php if($reply->approve):?>

                                                  <div class="media mt-3 mb-2">
                                                    <a class="pr-3" href="#">
                                                      <?php if($user->img):?>
                                                        <img src="asets/user_img/<?php echo $user->img;?>" width="64" height="64"  alt="Generic placeholder image">
                                                      <?php else:?>
                                                        <img src="https://via.placeholder.com/64" alt="Generic placeholder image">
                                                      <?php endif;?>
                                                    </a>
                                                    <div class="media-body">
                                                      <h5 class="mt-0"><?php echo $reply->name;?></h5>
                                                      <?php echo $reply->reply;?>
                                                    </div>
                                                  </div>

                                                <?php endif;?>

                                              <?php endforeach;?>

                                            </div>
                                          </div>
                                        <?php endif;?>

                                  <?php endforeach;?>


                          <?php endif;?>


                          </div>



                          <div class="leave-comments col-md-8 mx-auto">

                              <h4 class="mt-4 mb-3" id="headerLeaveComments">Leave comment:</h4>


                              <form action="" method="post">
                                <input type="hidden" id="post_id" value="<?php echo $post->id;?>" />

                                <div class="form-group">
                                  <input type="text" name="name" id="name" placeholder="Name:" class="form-control w-50">
                                </div>
                                <div class="form-group">
                                  <textarea name="comment" rows="3" cols="80" id="comment" placeholder="Leave a comment" class="form-control"></textarea>
                                </div>
                                <input type="submit" value="Leave comment" name="submit" id="LeaveComment" class="btn btn-outline-success">
                              </form>

                          </div>


                      </div>

                </div>



                <?php endif;?>

            <?php endforeach;?>


          </div>

        <!--  -->

        <!-- aside -->

          <div class="col-md-3">

            <?php foreach($asidePosts as $post):?>

              <div class="card border border-dark mb-3">
                  <div class="card-header bg-dark text-uppercase " style="color:gold;letter-spacing:3px;">
                    <?php echo $post->title;?>
                  </div>
                  <img class="card-img-top " src="asets/aside_img/<?php echo $post->img;?>" height="300" alt="Card image cap">
                  <div class="card-body bg-dark text-light">
                    <p class="card-text"><?php echo $post->content;?></p>
                  </div>
              </div>



            <?php endforeach;?>

          </div>

        <!--  -->

      <?php else:?>

        <!-- main-post -->

          <div class="col-md-10 mx-auto" id="article_post">

            <?php foreach($posts as $post):?>



                  <?php if($post->approve):?>

                    <div class="mb-5">

                    <!-- posts -->

                        <div id="main-posts" class="card bg-dark text-light">
                          <div class="card-header d-flex">
                            <div class="title mr-auto">
                              <h5 class="mb-0" style="color:gold;" ><?php echo $post->title;?></h5>
                              <small>Created at: <?php echo $post->created_at;?></small>
                            </div>
                            <div class="create align-self-start">
                                <p>Article wrote: <?php echo $post->name;?></p>
                            </div>
                          </div>
                          <img class="card-img-top" src="asets/img/<?php echo $post->img;?>" alt="Card image cap">
                          <div class="card-body">
                            <p class="card-text"><?php echo $post->content;?></p>
                          </div>
                        </div>

                    <!--  -->

                    <!-- comments -->

                        <button id="comment_button" class="btn btn-light border border-dark  mt-3">Show Comments</button>

                        <div id="comments" class="comments">


                            <?php  $postComments = POST::post_comments($post->id); ?>

                            <div class="display-comments mt-3 col-md-8 mx-auto">

                            <?php if(!empty($postComments)):?>


                                  <?php foreach($postComments as $com):?>

                                        <?php if($com->approve):?>
                                          <div class="media my-2">
                                            <img class="mr-3" src="https://via.placeholder.com/64" alt="Generic placeholder image">
                                            <div class="media-body">
                                              <h5 class="mt-0"><?php echo $com->name;?></h5>
                                              <?php echo $com->comment;?>

                                              <?php $commentReplys = Reply_Comment::get_Replys($com->id);?>

                                              <?php foreach($commentReplys as $reply):?>
                                                <?php $user = User::getUserByName($reply->name);?>

                                                <?php if($reply->approve):?>

                                                  <div class="media mt-3 mb-2">
                                                    <a class="pr-3" href="#">
                                                      <?php if($user->img):?>
                                                        <img src="asets/user_img/<?php echo $user->img;?>" width="64" height="64"  alt="Generic placeholder image">
                                                      <?php else:?>
                                                        <img src="https://via.placeholder.com/64" alt="Generic placeholder image">
                                                      <?php endif;?>
                                                    </a>
                                                    <div class="media-body">
                                                      <h5 class="mt-0"><?php echo $reply->name;?></h5>
                                                      <?php echo $reply->reply;?>
                                                    </div>
                                                  </div>

                                                <?php endif;?>

                                              <?php endforeach;?>

                                            </div>
                                          </div>
                                        <?php endif;?>

                                  <?php endforeach;?>


                          <?php endif;?>

                            </div>

                            <div class="leave-comments col-md-8 mx-auto">

                              <h4 class="mt-4 mb-3" id="headerLeaveComments">Leave comment:</h4>


                              <form action="" method="post">
                                <input type="hidden" id="post_id" value="<?php echo $post->id;?>" />

                                <div class="form-group">
                                  <input type="text" name="name" id="name" placeholder="Name:" class="form-control w-50">
                                </div>
                                <div class="form-group">
                                  <textarea name="comment" rows="3" cols="80" id="comment" placeholder="Leave a comment" class="form-control"></textarea>
                                </div>
                                <input type="submit" value="Leave comment" name="submit" id="LeaveComment" class="btn btn-outline-success">
                              </form>

                            </div>


                        </div>

                    <!--  -->

                    </div>



                <?php endif;?>



            <?php endforeach;?>


          </div>

        <!--  -->

      <?php endif;?>

  </div>



<?php include 'tamplate/footer.php';?>
