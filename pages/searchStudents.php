<?php
include_once 'functions.php';
$search_for_name="";
if(isset($_GET['s'])){
    $search_for_name=$_GET['s'];
}
view_all_students($search_for_name);
?>
