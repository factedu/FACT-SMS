<?php 

    include'pages/functions.php';
    init();
?>
<?php include 'template/header.php';?>
<?php include 'template/top_menu.php';?>

<?php 
    if(!isset($_GET[page])){
        include 'template/masthead.php';
    }else{
        $page=$_GET['page'].'.php';
        if(file_exists("pages/$page")){
            echo "<div class='container'>";
            echo "<div class='col-3'>";
            include 'template/l_menu.php';
            echo "</div>";
            echo "<div class='col-9'>";
            include"pages/$page";
            echo "</div>";
            echo"</div";
        }else{
            echo "<div class='container'>";
            echo "<div class='col-3'>";
            include 'template/l_menu.php';
            echo "</div>";
            echo "<div class='col-9'>";
            include"template/404.php";
            echo "</div>";
            echo"</div";
        }
    }
    
    
?>

<?php include 'template/developer_note.php';?>
<?php include 'template/footer.php';?>