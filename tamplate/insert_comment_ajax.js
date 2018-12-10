
    //  console.log(window.location.href);



      /* comments hide */

      let comments = document.querySelectorAll("#article_post .comments");

      let commentsArray = Array.from(comments);

      commentsArray.forEach(function(comment){

          comment.style.display = 'none';

      });



      /* comments button */

      var commentsBtn = document.querySelectorAll("#comment_button");

      var BtnArray = Array.from(commentsBtn);

      BtnArray.forEach(function(btn){

          btn.addEventListener('click', function(e){

            if (e.target.nextElementSibling.style.display === "none") {
                e.target.nextElementSibling.style.display = "block";
                e.target.textContent = 'Hide Comments';
            } else {
                e.target.nextElementSibling.style.display = "none";
                e.target.textContent = 'Show Comments';
            }

          });

      });


        /* leave comment button */

      const buttonComments = document.querySelectorAll("#LeaveComment");

      const buttonCommentsArray = Array.from(buttonComments);

      buttonCommentsArray.forEach(function(button_comment){

            button_comment.addEventListener('click', function(e){

                  const formElements = button_comment.parentElement.children;

                  const name = formElements[1].children.name;
                  const comment = formElements[2].children.comment;


                  let postId_value = formElements[0].value;
                  let name_value = formElements[1].children.name.value;
                  let comment_value = formElements[2].children.comment.value;

                  if(name_value !== '' &&  comment_value !== ''){

                            var xhttp = new XMLHttpRequest();

                            xhttp.onreadystatechange = function() {
                              if (this.readyState == 4 && this.status == 200) {

                                //document.getElementById("demo").innerHTML = this.responseText;
                                var insertComment = JSON.parse(this.responseText);

                                const newComment = `<div class="media my-2 d-none">
                                                    <img class="mr-3" src="https://via.placeholder.com/64" alt="Generic placeholder image">
                                                    <div class="media-body">
                                                      <h5 class="mt-0">${insertComment.name}</h5>
                                                      ${insertComment.comment}
                                                    </div>
                                                  </div>`

                                 /*insert new comment */

                                 //  let displayComments = document.querySelector(".display-comments");
                                  const  displayComments = button_comment.parentElement.parentElement.parentElement.children[0];

                                  displayComments.insertAdjacentHTML('beforeend',newComment);

                                  name.value = '';
                                  comment.value = '';


                                     /* insert text message */

                                  const div = document.createElement('div');

                                  div.classList = 'alert alert-success p-2 my-4 commentMessage';

                                  div.textContent = 'Your comment has been successfully entered, please wait for the administrator to approve it';

                                  const leveComments = item.parentElement.parentElement;
                                  const form = item.parentElement;

                                  leveComments.insertBefore(div, form);

                                  setTimeout(function(){
                                    document.querySelector(".commentMessage").remove();
                                  }, 3000);

                                }
                              };

                              xhttp.open("POST", "sentAjax.php", true);
                              xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");

                              xhttp.send(`postId=${postId_value}&name=${name_value}&comment=${comment_value}`);
                         }else{

                              let div = document.createElement('div');

                              div.classList = "alert alert-danger";

                              div.textContent = 'All fields are required';

                              const leveComments = button_comment.parentElement.parentElement;
                              const form = item.parentElement;

                              leveComments.insertBefore(div, form);

                              setTimeout(function(){
                                document.querySelector('div.alert').remove();
                              }, 3000);

                              name.value = '';
                              comment.value = '';
                         }

                e.preventDefault();
            });

      });
