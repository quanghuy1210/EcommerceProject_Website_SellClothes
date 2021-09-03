<?php

function postIndex($index,$value = "")
{
    $data = isset($_POST[$index])? trim($_POST[$index]) : $value;
    return $data ;
}
  

function checksdt($string)
{
    if(preg_match("/^0+\d{9}$/",$string)){
        return true;
    }
    return false;
}
function checkEmail($string)
{
    if(preg_match("/^[a-zA-Z0-9._-]+@[a-zA-Z0-9-]+\.[a-zA-Z]{2,5}$/",$string))
        return true;
    return false;
}


?>