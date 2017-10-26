<?php

include_once ('../core/ini.php');
try{
    $user = new Users\user();
    $post = new Posts\post();

}catch(Exception $e){

    echo $e->getMessage();

}


?>
<?php
include_once ("../GUI/head.php");
?>
    <body class="w3-light-grey">
<?php

include_once ("../GUI/header.php");

?><div style="height: 300px;" class="cover-3">

</div>
<div class="w3-container " style="margin-top: -200px">

    <div class="w3-content w3-white " style="height: 1000px;">


    </div>


</div>
