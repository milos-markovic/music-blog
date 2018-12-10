<?php

    class Post extends Query {

      public static $table = 'posts';
      public $id;
      public $title;
      public $content;
      public $img;
      public $approve;
      public $created_at;
      public $updated_at;
      public $user_id;

      public static $temp_name;
      public static $path;



      public function upload(){

          static::$path = $_SERVER['DOCUMENT_ROOT'].'/music_blog/asets/img';

          if(isset($this->img)){

             if(move_uploaded_file(static::$temp_name, static::$path."/".$this->img)){

               if($this->id){

                 $post = POST::find($this->id);

                 if($post->img != $this->img ){
                   unlink(static::$path.'/'.$post->img);
                 }

               }
             }

         }

         return $this;
      }
      public function removeImage(){

          $post = Post::find($this->id);

          static::$path = $_SERVER['DOCUMENT_ROOT'].'/music_blog/asets/img';

          unlink(static::$path.'/'.$post->img);

          return $this;
      }
      public static function posts(){

          $usertype = User::user_type();

          if($usertype->name == 'admin'){
            $posts = self::getPosts();

          }elseif($usertype->name == 'user'){
            $posts = self::getUserPosts();

          }
          return $posts;
      }
      public static function getPosts(){

        $query = "SELECT p.id,p.title,p.content,p.img,p.approve,p.created_at,p.updated_at,u.name,r.name AS usertype FROM users AS u";
        $query .=" JOIN posts AS p ON p.user_id = u.id";
        $query .=" JOIN roles AS r ON r.id = u.usertype_id";

        return self::returnRows($query);

      }
      public static function getUserPosts(){

          $query = "SELECT p.id,p.title,p.content,p.img,p.approve,p.created_at,p.updated_at,u.name,r.name AS usertype FROM users AS u";
          $query .=" JOIN posts AS p ON p.user_id = u.id";
          $query .=" JOIN roles AS r ON r.id = u.usertype_id WHERE u.id = :sessionId ";

          $array = [
            ':sessionId' => $_SESSION['userId']
          ];
          return self::returnRows($query, $array);
      }
      public static function post_detail($id){

        $query = "SELECT posts.id,posts.created_at,posts.updated_at,posts.img,users.name FROM posts JOIN users ON posts.user_id = users.id WHERE posts.id = :id";
        $array = [
          ':id' => $id
        ];
        return self::returnRows($query, $array, true);
      }

      public static function post_comments($id){

        $query = "SELECT c.id,c.name,c.comment,c.created_at,c.approve,p.img FROM posts AS p JOIN comments AS c ON c.post_id = p.id WHERE p.id = :postId";
        $array = [
          ':postId' => $id
        ];
        $postComments = self::returnRows($query, $array);
        return $postComments;
      }
      public static function user_posts($userId){

        $query = "SELECT * FROM posts WHERE user_id = :userId";
        $array = [
          ':userId' => $userId
        ];
        return self::returnRows($query, $array);
      }
      public static function delete_user_posts($userId){

        $query = "DELETE FROM posts WHERE user_id = :userId";
        $array = [
          ':userId' => $userId
        ];
        return self::runQuery($query,$array);
      }
      public function find_post_by_name($title){

        $query = "SELECT posts.id,posts.title,posts.content,posts.img,users.name as user_name,users.img as user_img FROM posts JOIN users ON users.id = posts.user_id
                  WHERE posts.title LIKE :title";
        $array = [
          ':title' => $title."%"
        ];
        $post = self::returnRows($query,$array,true);
        $post->comments = Comment::get_post_comments($post->id);

        foreach($post->comments as $comment){
          $comment->replies = Reply_Comment::get_Replys($comment->id);
        }

        return $post;
      }
      public function getPostReplys($commentId){

        $query = "SELECT name as reply_name,reply FROM reply_comments WHERE comment_id = :commentId";
        $array = [
          ':commentId' => $commentId
        ];
        return self::returnRows($query,$array);
      }


    }
