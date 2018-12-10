<?php

class Comment extends Query{

    public static $table = 'comments';
    public $id;
    public $name;
    public $comment;
    public $created_at;
    public $approve;
    public $post_id;

    public static function get_post_comments($postId){
      $query = "SELECT * FROM comments WHERE post_id = :postId";
      $array = [
        ':postId' => $postId
      ];
      return self::returnRows($query, $array);
    }
    public static function delete_Post_Comments($post_id){

      $comments = self::get_post_comments($post_id);

      foreach($comments as $comment){
        if(Reply_Comment::deleteCommentReplies($comment->id)){
          $comment = Comment::find($comment->id);

          $comment->delete();
        }
      }
      $comments = self::get_post_comments($post_id);
      return empty($comments) ? true : false;
    }
}
