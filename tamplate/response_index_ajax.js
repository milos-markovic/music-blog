
// console.log(window.location.href);


/* message alert */
var message = document.querySelector(".alert");

if(message){
  setTimeout(function(){
     message.remove();
  }, 3000);
 }

 /* enable tooltip */
 $(function () {
    $('[data-toggle="tooltip"]').tooltip()
 })

/* searc post */

const search_field = document.querySelector("#search");

search_field.addEventListener('keyup',function(e){


 let search_field_value = e.target.value;


  if( search_field_value !== '' ){

        var xhttp = new XMLHttpRequest();

        xhttp.onreadystatechange = function() {
          if (this.readyState == 4 && this.status == 200) {

          const response_object = JSON.parse(this.responseText);

        

      if(response_object){



                    let post = `<div class="card bg-dark text-light">
                                       <div class="card-header d-flex">
                                         <div class="title mr-auto">
                                           <h5 class="mb-0" style="color:gold;" >${response_object.title}</h5>
                                           <small>Created at: ${response_object.created_at}</small>
                                         </div>
                                         <div class="create align-self-start">
                                             <p>Article wrote: ${response_object.user_name}</p>
                                         </div>
                                       </div>
                                       <img class="card-img-top" src="asets/img/${response_object.img}" alt="Card image cap">
                                       <div class="card-body">
                                         <p class="card-text">${response_object.content}</p>
                                       </div>
                                 </div>`;

                    let commentButton = '<button id="comment_button" class="btn btn-light border border-dark  mt-3 mb-4">Show Comments</button>';

                    let comments = `<div id="comments" class="comments">
                                       <div class="display-comments mt-3 col-md-8 mx-auto">`;

                                            response_object.comments.forEach(function(comment){

                                              if(comment.approve == "1"){

                                                    comments  += `<div class="media mb-3">
                                                                      <img class="mr-3" src="https://via.placeholder.com/64" alt="Generic placeholder image">
                                                                      <div class="media-body">
                                                                        <h5 class="mt-0">${comment.name}</h5>
                                                                        ${comment.comment}`;



                                                                        comment.replies.forEach(function(reply){

                                                                          if(reply.approve == "1"){

                                                                                comments +=`<div class="media mt-3">
                                                                                                    <a class="pr-3" href="#">
                                                                                                      <img src="asets/user_img/${response_object.user_img}" width="64" height="64" alt="Generic placeholder image">
                                                                                                    </a>
                                                                                                    <div class="media-body">
                                                                                                      <h5 class="mt-0">${reply.name}</h5>
                                                                                                      ${reply.reply}
                                                                                                    </div>
                                                                                                  </div>`;

                                                                            }

                                                                        });


                                                        comments +=  `</div>
                                                                  </div>`;

                                                }

                                            });

                          comments +=  `</div>

                                          <div class="leave-comments col-md-8 mx-auto mb-4">

                                            <h4 class="mt-4 mb-3" id="headerLeaveComments">Leave comment:</h4>


                                            <form action="insertComment.php" method="post">
                                              <input type="hidden" id="post_id" name="postId" value="${response_object.id}" />

                                              <div class="form-group">
                                                <input type="text" name="name" id="name" placeholder="Name:" class="form-control w-50">
                                              </div>
                                              <div class="form-group">
                                                <textarea name="comment" rows="3" cols="80" id="comment" placeholder="Leave a comment" class="form-control"></textarea>
                                              </div>
                                              <input type="submit" value="Leave comment" name="InsertComment" id="LeaveComment" class="btn btn-outline-success">
                                            </form>

                                          </div>

                                      </div>`;


              post += commentButton;
              post += comments;

              document.querySelector('#article_post').innerHTML = post;


              commentBtn = document.querySelector("#comment_button");

              const coments  = document.querySelector("#comments");
              coments.style.display = 'none';

              commentBtn.addEventListener('click',function(e){


                  if(coments.style.display == 'none'){
                      coments.style.display = 'block'
                  }else{
                      coments.style.display = 'none'
                  }


                e.preventDefault();
              });

            }

          }
        };
        xhttp.open("GET", `admin/post/searchAjax.php?name=${search_field_value}`, true);
        xhttp.send();

  }

  e.preventDefault();
})
