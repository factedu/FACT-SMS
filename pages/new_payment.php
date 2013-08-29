<?php
    //check that student is selected before receiving payment either by GET or POST
    if(!isset($_GET['s_id'])){
        //if s_id is not set using GET Method Check for POST method
        if(!isset($_POST['s_id'])){
            //if s_id is not set even using POST Method Make the program die
            die("<h3 class='alert alert-danger'><strong>Error!</strong> You Should Fist Select the Student Before making payment!!</h3>");
        }else{
            //if s_id is set using post method initiate variable $s_id
            $s_id=$_POST['s_id'];
        }
    }else{
        //if s_id is set using get method initiate variable $s_id
        $s_id=$_GET['s_id'];
    }
?>
<h1>New Payment</h1>
<div class="well well-large" style="color: #563D7C;">
    <h2>
        Payment Receipt Process - Student's ID : <?php echo $s_id ?>
    </h2>
    <?php
    //Set global variable form_error
    $form_error=FALSE;//there is no error
    $err_msg=array("");
    //check if submit button is clicked
    if(isset($_POST['submit'])){
        //process the form
        //Get all the Posted Data
        $amount=$_POST['amount'];
        $date=$_POST['date'];
        $remarks=$_POST['remarks'];
        if(empty($amount)){
            $form_error=TRUE;//set the form error to true
            //generate a error message
            $err_msg=array("Blank Amount is Not Allowed");
        }else{
            //more validations goes here//
            
            //try to save the record//
            $result=  save_payment($s_id, $amount, $date, $remarks);
            //if save is ok
            if($result){
                echo"Saved";
            }else{
                echo 'failed';
            }
            
            //else if saving failed
        }
    }
    
    if(!isset($_POST['submit'])||$form_error){
        //let the user fill up the form
        if($form_error){
            foreach ($err_msg as $e){
                echo "<p class='alert alert-danger'>$e</p>";
            }
        }
    
    ?>
    <form class="form-horizontal" action="" method="post">
        <div class="form-group">
          <label for="amount" class="col-lg-2 control-label" >*Amount</label>
          <div class="col-lg-10">
            <input type="hidden" name="s_id" value="<?php echo $s_id; ?>"/>
            <input type="text" class="form-control" name="amount" id="amount" placeholder="Amount in INR" required>
          </div>
        </div>
        
        <div class="form-group">
          <label for="date" class="col-lg-2 control-label" >Date</label>
          <div class="col-lg-10">
            <input type="date" class="form-control" name="date" value='<?php echo date('Y-m-d'); ?>' id="date" placeholder="YYYY-MM-DD or Leave Blank for Today's Collection">
          </div>
        </div>
        
        <div class="form-group">
          <label for="remarks" class="col-lg-2 control-label" >Remarks</label>
          <div class="col-lg-10">
            <textarea type="text" class="form-control" name="remarks" id="remarks" placeholder="Any Remarks that you want to add"></textarea>
          </div>
        </div>
        
        <div class="form-group">
          <div class="col-lg-offset-2 col-lg-10">
            <button type="submit" class="btn btn-default pull-right" name='submit'>Accept Payment <i class='icon-signin'></i></button>
            <button type="reset" class="btn btn-danger pull-left">Cancel Payment <i class='icon-bug'></i></button>
          </div>
        </div>
    </form>
    <h4>Payment History of Student :-</h4>
    <?php
        //display Payment History of Student
        view_payment_by_id($_GET['s_id']);
    ?>
</div>
<?php
    
    } //close the else block 
?>