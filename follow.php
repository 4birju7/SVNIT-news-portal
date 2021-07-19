<?php
session_start();
include("classes/connect.php");
include("classes/login.php");
include("classes/user.php");
include("classes/news.php");
include("classes/tags.php");
if(isset($_SESSION['USER_NAME'])){
    $uname = $_SESSION['USER_NAME'];
    $login = new Login($uname);
    $result = $login->check_login($uname);
    if($result){
        $user = new User();
        $user_data = $user->get_data($uname);
        if(!$user_data){
            header("Location: login.php");
            die;
        }
    }
    else{
        header("Location: login.php");
        die;
    }
}
else{
    header("Location: login.php");
        die;
}


if(isset($_SERVER['HTTP_REFERER'])){
    $return_to = $_SERVER['HTTP_REFERER'];
}
else{
    $return_to = "homepage.php";
}

if(isset($_GET['id'])){
    
    $news = new News();
    $news->follow_tag($_GET['id'],$_SESSION['USER_ID']);
}

header("Location: ".$return_to);
die;
