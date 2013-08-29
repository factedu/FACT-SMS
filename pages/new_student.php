<h1>New Admission</h1>
<div class="well well-large" style="color: #563D7C;">
    <h2>
        New Admission-Process
    </h2>
    <?php
    //Set global variable form_error
    $form_error=FALSE;//there is no error
    $err_msg=array("");
    //php code to handle New Student Input is submit button is clicked
    //check if submit button is clicked
    if(isset($_POST['submit'])){
        //process the form
        //Get all the Posted Data
        $name=$_POST['name'];
        $f_name=$_POST['f_name'];
        $gender=$_POST['gender'];
        $dob=$_POST['dob'];
        $ph=$_POST['ph'];
        $email=$_POST['email'];
        $add=$_POST['add'];
        print_r($_POST);
        //echo "Name: $name, Father's Name: $f_name, Gender: $gender";
        if(empty($name)||empty($f_name)||empty($gender)||empty($dob)||empty($ph)||empty($add)){
            $form_error=TRUE;//set the form error to true
            //generate a error message
            $err_msg=array("Blank Values are Not allowed");
        }else{
            //more validations goes here//
            
            //try to save the record//
            $result=save_student($name, $f_name, $gender, $dob, $ph, $email, $add);
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
          <label for="name" class="col-lg-2 control-label" >*Name</label>
          <div class="col-lg-10">
            <input type="text" class="form-control" name="name" id="name" placeholder="Student's Name" required>
          </div>
        </div>
        
        <div class="form-group">
          <label for="fname" class="col-lg-2 control-label" >*Father's Name</label>
          <div class="col-lg-10">
            <input type="text" class="form-control" name="f_name" id="fname" placeholder="Father's Name" required>
          </div>
        </div>
        
        <div class="form-group">
          <label for="gender" class="col-lg-2 control-label" >*Gender</label>
          <div class="col-lg-10">
              <select name="gender">
                  <option>Male</option>
                  <option>Female</option>
              </select>
          </div>
        </div>
        
        <div class="form-group">
          <label for="dob" class="col-lg-2 control-label" >*Date of Birth</label>
          <div class="col-lg-10">
            <input type="date" class="form-control" name="dob" id="dob" placeholder="YYYY-MM-DD" required>
          </div>
        </div>
        
        <div class="form-group">
          <label for="ph" class="col-lg-2 control-label" >*Phone Number</label>
          <div class="col-lg-10">
            <input type="text" class="form-control" name="ph" id="ph" placeholder="Contact Number" required>
          </div>
        </div>
        
        <div class="form-group">
          <label for="email" class="col-lg-2 control-label" >Email</label>
          <div class="col-lg-10">
            <input type="text" class="form-control" name="e_mail" id="email" placeholder="Email Address">
          </div>
        </div>
        
        <div class="form-group">
          <label for="add" class="col-lg-2 control-label" >*Address</label>
          <div class="col-lg-10">
            <textarea type="text" class="form-control" name="add" id="add" placeholder="Vaild Residential Adddress" required></textarea>
          </div>
        </div>
        
        <div class="form-group">
          <div class="col-lg-offset-2 col-lg-10">
            <button type="submit" class="btn btn-default pull-right" name='submit'>Take Admission <i class='icon-signin'></i></button>
            <button type="reset" class="btn btn-danger pull-left">Cancel Admission <i class='icon-bug'></i></button>
          </div>
        </div>
    </form>
</div>
<?php
    } //close the else block 
?>