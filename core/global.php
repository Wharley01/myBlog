<?php
/*
 * @Author Sulaiman Adewale
 *
 * @Desc This file contains needed global variables
 *
 */

define("SITE_URL",$_SERVER['DOCUMENT_ROOT']);//defines the site url

define("ROOT",dirname(__FILE__). "/");//the root directory

define("ROOT_FOLDER","/myBlog/");
if (@$_SERVER['REMOTE_ADDR']){
    define('CL_IP',@$_SERVER['REMOTE_ADDR']);
}else{
    define("CL_IP",@$_SERVER['HTTP_X_FORWARDED_FOR']);
}






