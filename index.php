<?php

include_once ('core/ini.php');
try{
    $user = new Users\user();
    $post = new Posts\post();

}catch(Exception $e){

    echo $e->getMessage();

}


?>
<?php
include_once ("GUI/head.php");
?>
<body>
<?php

include_once ("GUI/header.php");

?>
<div class="cover-2" style="height: 300px;">

</div>
<div class="w3-container w3-light-grey">

    <div class="w3-content w3-round " style="margin-top: -200px;">
        <div class="w3-row-padding">
            <div class="w3-col m8">
        <div class="w3-container w3-white w3-margin-top">
            <h2 class="da-tit">
                FEATURED
            </h2>
            <div class="w3-row-padding">

                <!--Featured Posts here-->

                <?php
                //get all featured posts
                try{


                    $post->get_posts(0,10,"featured");

                    while($key = $post->posts->fetch_assoc()){
                        $post_title = prepare(substr($key['PostTitle'],0,60));
                        $post_body = prepare(substr($key['PostBody'],0,150));
                        $post_img = extract_img($key['PostBody']);
                        $post_id = $key['ID'];
                        echo "<div class=\"w3-col m6\">
                    <img src=\"".$post_img."\" style=\"width: 100%; height: 200px;\" class='post-img'>
                    <div class=\"w3-container w3-light-gray\">
                        <a class='w3-text-blue' href='posts/read.php?id=".$post_id. "'><h4>".$post_title."</h4></a>
                        <p>
                           ".$post_body."
                          ... <a class='w3-text-blue' href='posts/read.php?id=".$post_id. "'>Continue reading..</a>
                        </p>
                    </div>



                </div>
";

                    }

                }catch(Exception $e){

                    echo $e->getMessage();
                }
                ?>

            </div>


            <h2>
               LATEST TOPICS
            </h2>


            <!--latest posts are left here-->
            <div class="w3-row-padding">
                <?php
                //get all latest posts
                try{


                $post->get_posts(0,10,"latest");

                while($key = $post->posts->fetch_assoc()){
                $post_title = prepare(substr($key['PostTitle'],0,60));
                $post_body = prepare(substr($key['PostBody'],0,150));
                $post_img = extract_img($key['PostBody']);
                $post_id = $key['ID'];
                echo "<div class=\"w3-col m6\">
                <img src=\"".$post_img."\" style=\"width: 100%; height: 200px;\" class='post-img'>
                <div class=\"w3-container w3-light-gray\">
                <a class='w3-text-blue' href='posts/read.php?id=".$post_id. "'><h4>".$post_title."</h4></a>
                <p>
                    ".$post_body."
                    ... <a class='w3-text-blue' href='posts/read.php?id=".$post_id. "'>Continue reading..</a>
                </p>
            </div>



        </div>
        ";

        }

        }catch(Exception $e){

        echo $e->getMessage();
        }
        ?>
            </div>
            <br>
        </div>



    </div>

        <div class="w3-col m4 w3-margin-top">
            <div class="w3-container w3-white" >
<h2>
    SPONSORED
</h2>

<!--Other stuffs here-->

                <?php
                try{


                $post->get_posts(0,1,"sponsored");

                if($post->posts->num_rows < 1){
                    echo "<div class='w3-light-grey w3-padding-24 w3-container'>
<center><h6>Sorry, No sponsored Post yet.</h6></center>
</div> ";
                }else {
                    while ($key = $post->posts->fetch_assoc()) {
                        $post_title = prepare(substr($key['PostTitle'], 0, 60));
                        $post_body = prepare(substr($key['PostBody'], 0, 150));
                        $post_img = extract_img($key['PostBody']);
                        $post_id = $key['ID'];
                        echo "<div class=\"\">
                <img src=\"" . $post_img . "\" style=\"width: 100%; height: 200px;\" class='post-img'>
                <div class=\"w3-container w3-light-gray\">
                <a class='w3-text-blue' href='posts/read.php?id=" . $post_id . "'><h4>" . $post_title . "</h4></a>
                <p>
                    " . $post_body . "
                    ... <a class='w3-text-blue' href='posts/read.php?id=" . $post_id . "'>Continue reading..</a>
                </p>
            </div>



        </div>
        ";

                    }
                }
                }catch(Exception $e){

                        echo $e->getMessage();
                    }




                ?>

                <h2>ADVERT</h2>
        <a href="#"> <img src="assets/images/advertise-here.jpg" style="width: 100%; height: auto;"></a>

            </div>

        </div>
        </div>
    </div>
    </div>
    <br>
</div>

</body>

</html>

