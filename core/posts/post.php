<?php

/*
 * @Author Sulaiman Adewale <hackerslord96@gmail.com>
 *
 * @Desc This the file that manage posts
 *
 * @
 *
 */
namespace Posts {


    use Connect\connect;

    class post
    {
        protected $conn;
        public $categories;
        public $sub_categories;
        public $posts;
function __construct()
{
    try
    {
        $conn = new connect();
        $this->conn = $conn->connection;
    }catch (\Exception $e)
    {
        throw new \Exception($e->getMessage(),1);
    }



}

        /**
         * @return mixed
         * @throws \Exception
         */
public function categories(){
    $query = $this->conn->query("SELECT * FROM `wblog_post_cat`");
    if(!$query){
        throw  new \Exception("Unable to fetch sub categories from the database, SQL error: " . $this->conn->error,1);
    }else{
        $this->categories = $query;
    }
}


function sub_categories($parent_cat_ID){
    $args = func_num_args();
if($args < 1){

    $query = $this->conn->query("SELECT * FROM `wblog_post_sub_cat`");

}else{

    $query = $this->conn->query("SELECT * FROM `wblog_post_sub_cat` WHERE `ParentCatID` = $parent_cat_ID");
}
//check if there was an error during the mysqli querU
if(!$query){

    throw  new \Exception("Unable to fetch sub categories from the database, SQL error: " . $this->conn->error,1);

    }else if($query->num_rows < 1){

        return false;

    }else{

        $this->sub_categories = $query;
        return true;

    }
}

        /**
         * @param $start
         * @param $stop
         * @throws \Exception
         */
public function get_posts($start, $stop, $type){
    //get all posts
    $arg = func_num_args();
if($arg == 2){


       $limit = "LIMIT " . $start ."," . $stop ;


}else if($arg == 1){
        $limit = "";
        $type = $start;//if one argument was passed, let it be type now start
}else if($arg == 3){


        $limit = "LIMIT " . $start ."," . $stop ;
        $type = $type;

}else{
        //if invalid number of argument was passed into the function, throw new error
        throw new \Exception("Invalid number of argument parsed to the \"get_post\" method ",1);

    }


    switch ($type){

        case "trending":

            $this->posts = $this->conn->query("SELECT * FROM `wblog_posts` ORDER BY `PostComments` " . $limit);


            break;

        case "featured":

            $this->posts = $this->conn->query("SELECT * FROM `wblog_posts` WHERE `PostFeatured` = 1 " . $limit);

            break;
        case "sponsored":

if(!$limit){

    $limit = 1;

}
            $this->posts = $this->conn->query("SELECT * FROM `wblog_posts` WHERE `PostSponsored` = 1 ORDER BY rand() " . $limit);

            break;
        default:

            $this->posts = $this->conn->query("SELECT * FROM `wblog_posts` ORDER BY `ID` DESC " . $limit);

            break;


    }



}

        /**
         * @param $ID
         * @throws \Exception
         */
        public function get_posts_by_ID($ID){
    //get posts by ID
    if(func_num_args() < 1){
        throw new \Exception("No ID parsed to the \"get_post_by_ID\" method  ",1);
    }else{
        $this->posts =  $this->conn->query("SELECT * FROM `wblog_posts` WHERE `ID` = " . $ID);
    }

}
public function get_post_by_user($user_ID){
    //get posts be USer
    if(func_num_args() < 1){
        throw new \Exception("No user ID parsed to the \"get_post_by_user\" Method");
    }else{

        $this->posts = $this->conn->query("SELECT * FROM `wblog_posts` WHERE `PostUserId` = " . $user_ID);
    }

}
    }
}