<h1 id='stu_search_title'>All Students Record</h1>
<div class="well well-large" style="color: #563D7C;">
    <h3>
        You May Refine The Search
        <input class=''type='text' onkeyup='stu_search(this.value);' placeholder='Enter Name to Search'/> <i style='border: 1px solid #563D7C' class='icon-search icon-border'></i>
    </h3>
    <div id='view_all_stu_result'>
    <?php
        if(isset($_GET['s'])){
            echo "<br/>".$_GET['s'];
        }
        view_all_students();
    ?>
    </div>
</div>
<script type='text/javascript'>
    function stu_search(val){
        //$('#view_all_stu_result').text(val);
        $.ajax({
            type: 'GET',
            url: 'pages/searchStudents.php?s='+val,
            dataType: 'html',
            success: function(data, textStatus){
                $('#view_all_stu_result').html("Search Results : (Ajax Suported)"+data);
                $('#stu_search_title').text("Student Search By Name Enabled");
            }
        });
    }
</script>