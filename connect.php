<?php
$connect = mysqli_connect('127.0.0.1:3307','root','','tintuc'); 


if(mysqli_connect_errno()!==0){
    die("Error: Could not connect. ".mysqli_connect_error());
}
mysqli_set_charset($connect,'utf8');
?>

