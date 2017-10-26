<?php
/*
 * @Author Sulaiman Adewale <hackerslord96@gmail.com>
 *
 * @Desc This includes all classes
 *
 */
/*
 * @GlobalVar ROOT was defined in core/global.php
 *
 */
include_once ('global.php');
include_once (ROOT . 'db/connect.php');
include_once (ROOT . 'setup/setup.php');
include_once (ROOT . 'users/user.php');
include_once (ROOT . 'posts/post.php');
include_once (ROOT . 'views/view.php');
include_once (ROOT . 'misc.php');

//try{
//    $conn = new Connect\connect();
//}catch (Exception $e){
//    echo $e->getMessage();
//    die();
//}
