<?php

class Aside extends Query {

    public static $table = "aside";
    public $id;
    public $title;
    public $content;
    public $img;

    public static $tmp_name;
    public static $path;

    public function upload(){

        self::$path = $_SERVER['DOCUMENT_ROOT'].'/music_blog/asets/aside_img';


        if(isset($this->img)){

            if(move_uploaded_file(self::$tmp_name, self::$path. '/' .$this->img)){

                if( isset($this->id) ){

                    $asidePost = Aside::find($this->id);

                    if($asidePost->img !== $this->img){

                          unlink(self::$path.'/'. $asidePost->img);
                    }
                }
            }

        }
        return $this;
    }
}
