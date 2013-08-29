<h1>Student's Record</h1>
<div class="well well-large" style="color: #563D7C;">
    <h2>
        You are viewing Student ID : <?php echo $_GET['s_id']; ?>
    </h2>
    <?php
        if(isset($_GET['s_id'])){
            view_student_by_id($_GET['s_id']);
        }else{
            echo "<p class='alert alert-danger'>No Search Criteria Mentioned</p>";
        }
    ?>
</div>