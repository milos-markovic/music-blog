<?php

 class User extends Query{

    public static $table = 'users';
    public static $temp_name;
    public static $path;
    public $id;
    public $name;
    public $email;
    public $img;
    public $password;
    public $usertype_id;


    public static function find_user($inputs){

        $email = trim($inputs['email']);
        $password = md5(trim($inputs['password']));

        $query = "SELECT * FROM users WHERE email = :email AND password = :password";
        $array = [
          ':email' => $email,
          ':password' => $password
        ];
        $user = self::returnRows($query, $array, true);

        return $user ? $user : [];
    }

    public static function user_type(){

      $query = "SELECT roles.name FROM roles JOIN users ON users.usertype_id = roles.id WHERE users.id = :sessionId";
      $array = [
        ':sessionId' => $_SESSION['userId']
      ];
      $usertype = self::returnRows($query,$array,true);
      return $usertype;
    }

    public static function getUsers(){

      $query = "SELECT u.id,u.name,u.email,u.password,u.img,r.name as usertype FROM users AS u JOIN roles AS r ON r.id = u.usertype_id";
      return self::returnRows($query);
    }

    public static function auth_user(){
      $query = "SELECT * FROM users WHERE id = :sessionId";
      $array = [
        ':sessionId' => $_SESSION['userId']
      ];
      return self::returnRows($query, $array, true);
    }

    public function upload(){

        static::$path = $_SERVER['DOCUMENT_ROOT'].'/music_blog/asets/user_img';

        if(isset($this->img)){

          if(move_uploaded_file(static::$temp_name, static::$path."/".$this->img)){

            if($this->id){

              $user = User::find($this->id);

              if($user->img != $this->img ){
                unlink(static::$path.'/'.$user->img);
              }

            }

          }

        }

        return $this;
    }
    public function delete_user_image(){
        static::$path = $_SERVER['DOCUMENT_ROOT'].'/music_blog/asets/user_img';

        unlink(static::$path.'/'.$this->img);
        return true;
    }
    public static function getUserByName($name){
        $query = "SELECT * FROM users WHERE name = :name";
        $array = [
          ':name' => $name
        ];
        return self::returnRows($query, $array, true);
    }
    public function get_all_from_user($userId){

      $user = User::find($userId);
      $user->posts = Post::user_posts($userId);

      if($user->posts){
        foreach($user->posts as $post){
            $user->comments = Comment::get_post_comments($post->id);
        }
      }

      if($user->posts){
        foreach($user->comments as $comment){
          $user->comment_replies = Reply_Comment::get_Replys($comment->id);
        }
      }

      return $user;
    }
    public static function delete_all_from_user($userId){

        $user = self::get_all_from_user($userId);

        if(!empty($user->comment_replies)){
          foreach($user->comment_replies as $reply){
              Reply_Comment::deleteCommentReplies($reply->comment_id);
          }
        }

        if(!empty($user->comments)){
          foreach($user->comments as $comment){
            Comment::delete_Post_Comments($comment->post_id);
          }
        }

        if(!empty($user->posts)){
          foreach($user->posts as $post){
            Post::delete_user_posts($post->user_id);
            unlink($_SERVER['DOCUMENT_ROOT'].'/music_blog/asets/img/'.$post->img);
          }
        }

        $findUser = User::find($userId);
        $deleteUser = $findUser->delete();
        unlink($_SERVER['DOCUMENT_ROOT'].'/music_blog/asets/user_img/'.$user->img);


        return $deleteUser ? true : false;
    }
 }
