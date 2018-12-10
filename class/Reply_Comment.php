<?php
  class Reply_Comment extends Query {

    public static $table = 'reply_comments';
    public $id;
    public $name;
    public $reply;
    public $created_at;
    public $approve;
    public $comment_id;

    public static function get_Replys($commentId){
      //  var_dump($commentId);exit;

        $query = "SELECT * FROM reply_comments WHERE comment_id = :commentId";
        $array = [
          ':commentId' => $commentId
        ];
        return self::returnRows($query,$array);
    }
    public static function deleteCommentReplies($commentId){
        $query = "DELETE FROM reply_comments WHERE comment_id = :commentId";
        $array = [
          ':commentId' => $commentId
        ];
        return self::runQuery($query, $array);
    }
  }
