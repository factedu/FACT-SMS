<?php
include 'functions.php';
init();
$u_name=$_POST['u_name'];
$pwd=$_POST['pwd'];
if(authenticate($u_name,$pwd)){
    header("Location: ../");
}else{
    header("Location: ../?page=login_ui");
}
?>
