<?php

/**
 * Created by PhpStorm.
 * User: HP
 * Date: 6/22/2017
 * Time: 2:46 PM
 */
namespace Setups {

    use Connect\connect;

    class setup
    {
        public $conn;
        public  $guest_post;
        public  $verify_email;
        public  $verify_comments;
        public  $verify_posts;
        public  $guest_read_post;
        public  $temp_ban_days;//number of days to ban user for
        public  $filter_spams;
        public  $enable_email_notification;
        public  $enable_hashtag;
        public  $xss_secure;
        public  $enable_simily;
        public  $enable_bbcodes;
        public  $verify_user;
        public  $disable_comments;
        public  $index_post;//type of post to display in the index
        public  $enable_mention;
//set environment variables

        /**
         * setup constructor.
         */
        function __construct()
{
    $this->conn = new connect();



}

        function set($column,$value){
    $setups = $this->conn->query("SELECT * FROM `wblog_setups`");
    if(func_num_args() < 2){

        throw new \Exception("Invalid number off argument parsed to the \"set\" method in setup Class ",1);

    }else if($setups->num_rows < 1){
         throw new \Exception("Admin Setup not initialized yet,please insert at least one row in \"wblog_setups\" table. ");

    }else{
        $query = $this->conn->query("UPDATE `wblog_setups` SET `{$column}` = '{$value}'");
        if(!$query){
            throw  new \Exception("Unable to execute the sql query, Sql Error: " . $this->conn->error,1);
        }else{

            return true;
        }
    }
}

        /**
         * @param $column
         * @return mixed
         */
        function get($column){
            if(func_num_args() != 1){
                throw new \Exception(" \"get\" method gotten an invalid number of arguments ");
            }
$query = $this->conn->query("SELECT `{$column}` FROM `wblog_setups` LIMIT 1");
while ($key = $query->fetch_assoc()){
    return $key[$column];
}

}


    }
}