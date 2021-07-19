<?php
session_start();
if(isset($_SESSION['USER_NAME'])){
    $_SESSION['USER_NAME']=NULL;
    unset($_SESSION['USER_NAME']);
}
header("Location: login.php");
die;