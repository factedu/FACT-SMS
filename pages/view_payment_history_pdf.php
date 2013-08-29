

<?php

if(isset($_GET['s_id'])){
    $s_id=$_GET['s_id'];
}else{
    die("<h3 class='alert alert-danger'>No Student Select</h3>");
}
?>
<h1>Payment History</h1>
<div class="well well-large" style="color: #563D7C;">
    <h2>
        Payment History of Student ID : <?php echo "$s_id";?>
    </h2>
    <object data="<?php echo "reports/payment_history_pdf.php?s_id=$s_id"; ?>" type="application/pdf" width="100%" height="1200px">
 
        <p>It appears you don't have a PDF plugin for this browser.
        No biggie... you can <a href="<?php echo "reports/payment_history_pdf.php?s_id=$s_id"; ?>">click here to
        download the PDF file.</a></p>
  
    </object>
</div>
