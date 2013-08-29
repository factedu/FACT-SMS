

<?php

if(isset($_GET['p_id'])){
    $p_id=$_GET['p_id'];
}else{
    die("<h3 class='alert alert-danger'>No Payment Select</h3>");
}
?>
<h1>Payment History</h1>
<div class="well well-large" style="color: #563D7C;">
    <h2>
        Payment Receipt No. <?php echo "$p_id";?>
    </h2>
    <object data="<?php echo "reports/payment_receipt_pdf.php?p_id=$p_id"; ?>" type="application/pdf" width="100%" height="1200px">
 
        <p>It appears you don't have a PDF plugin for this browser.
        No biggie... you can <a href="<?php echo "reports/payment_receipt_pdf.php?p_id=$p_id"; ?>">click here to
        download the PDF file.</a></p>
  
    </object>
</div>
