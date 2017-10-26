<?php
/*
 * @Author Sulaiman Adewale
 *
 * @Desc Database connection file
 *
 * @NameSpace connect
 */


namespace Connect {


    class connect
    {
        protected  $db_user = "root";//database username
        protected $db_server = "localhost";//""   "" Server
        protected $db_password = "";//"" "" Password

        public  $connection;
        protected $db_name = "wblog";//Database name


        function __construct()
        {//connect to database when the class is initiated
            $this->connection = new \mysqli($this->db_server,$this->db_user,$this->db_password);
            if(!$this->connection){

                throw new \Exception("Unable to connect to mysql database, please check connection variable in \"core/db/connect\"",1);
            }else if(!$this->connection->select_db($this->db_name)){
                throw new \Exception("Unable to reach the selected database, please check connection variable in \"core/db/connect\".",1);
            }else{
                return $this->connection;
            }
        }

    }
}