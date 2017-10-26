<?php
/**
 * Created by PhpStorm.
 * User: HP
 * Date: 6/22/2017
 * Time: 2:50 PM
 */

$setup = new Setups\setup();

/**
 * @param $string
 * @return mixed
 */
function prepare($string){
//convert BBcodes to HTML


//convert simily to images


//disable XSS attack


//format mention system


//
    return $string;

}

/**
 * @param $url
 * @return mixed
 */
function clean_URL($url){

    return $url;
}

function extract_img($string){
$pattern = "/\[img\](.*)\[\/img\]/";
if(preg_match_all($pattern,$string,$matches)){

 return $matches[1][0];

}else{
    return "/myBlog/site-content/post-img-captions/default.jpg";
}
    return $string;

}