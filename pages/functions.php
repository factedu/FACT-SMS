<?php

    
    function init(){
        session_start();
    }
    
    function connect(){
        $host="localhost";
        $user="root";
        $pwd="";
        $db="fact_sms";
        $con=  mysql_connect($host,$user,$pwd);
        //echo $host;
        if($con){
            $db1=  mysql_select_db("$db");
            if($db1){
                return TRUE;
            }
        }else{
            return FALSE;
        }
    }
    function senetize($val){
        return mysql_real_escape_string($val);
    }
    
    function authenticate($u_name,$pwd){
        $u_name=senetize($u_name);
        $pwd=  senetize($pwd);
        if(connect()){
            $result=  mysql_query("Select * from users where uname='$u_name' and pwd='$pwd'");
            if(mysql_num_rows($result)>0){
                while($row=  mysql_fetch_array($result)){
                    $_SESSION['u_id']=$row['id'];
                    $_SESSION['u_name']=$row['uname'];
                    $_SESSION['u_status']=$row['status'];
                    
                }
                $_SESSION['logged_in']=TRUE;
                /*echo "D";
                print_r($_SESSION);
                exit();*/
                return TRUE;
            }
        }
    }
    
    //function to save new student requires data value
    function save_student($name,$f_name,$gender,$dob,$ph,$email,$add){
        //senetize user data for sql injection attack
        $name= senetize($name);
        $f_name=  senetize($f_name);
        $gender=  senetize($gender);
        $dob=  senetize($dob);
        $ph=  senetize($ph);
        $email=  senetize($email);
        $add=  senetize($add);
        /*
        $sql="insert into students (name, f_name, gender, dob, ph, e_mail, add)
            values ('$name','$f_name','$gender',$dob,'$ph','$email','$add')";
         * 
         */
        $sql = "INSERT INTO `students` (`name`, `f_name`, `gender`, `dob`, `ph`, `e_mail`, `add`) VALUES ('$name','$f_name', '$gender', '$dob', '$ph', '$email','$add')";
        if(connect()){
            $result=mysql_query($sql);
            if($result){
                return TRUE;
            }else{
                echo mysql_error();
                return FALSE;
            }
        }
    }
    
    
    //function to view all student record
    
    function view_all_students($search_for_name){
        if(connect()){
            if($search_for_name==""){
                $query="Select * from students order by name";
            }else{
                $query="Select * from students where name like '$search_for_name%'";
            }
            
            $result=  mysql_query($query);
            if($result){
                if(mysql_num_rows($result)>0){
                    //if there is result to display
                    //create a table to display all the students with ID and name
                    echo "<h4 class='alert alert-info'>Total: ".mysql_num_rows($result)." Students Found</h4>";
                    echo "<table class='table table-hovered'>";
                    echo"<tr><th>Student ID</th><th>Name</th><th>Father's Name</th><th>Take Action</th></tr>";
                    while($row=mysql_fetch_array($result)){
                        $s_id=$row['s_id'];
                        $name=$row['name'];
                        echo"<tr><td>".$s_id."</td><td>".$row['name']."</td>
                            <td>".$row['f_name']."</td>
                            <td>
                            <a class='btn btn-success' title='View Record of $name'
                            href='?page=view_student&s_id=$s_id'><i class='icon-eye-open icon-border'></i> View</a>
                                <a class='btn btn-default btn-warning' href='?page=edit_student&s_id=$s_id'><i class='icon-edit icon-border'></i> Edit</a>
                            </td></tr>";
                    }
                    echo '</table>';
                }else{
                    //as no result is found so echo error
                    echo "<p class='alert alert-danger'><strong>No Result Found! </strong>Sorry No Student found
                        as per your Search Criteria. You may have typed the name incorrectly. please delete few 
                        letter from the search from back to see if it works or you may delete all the letters and
                        trust your eye .. as it will display you all the student's entry!!<br/><br/> If you think that there
                        is something wrong.. you may consult the 'Help & Support' by clicking on the top menu.
                        </p>";
                }
                
            }
        }
    }
    
    //function to view student record by ID 
    //function to view all student record
    
    function view_student_by_id($s_id){
        if(connect()){
            $s_id=  senetize($s_id);
            $query="Select * from students where s_id='$s_id'";
            $result=  mysql_query($query);
            if($result){
                //create a table to display all the students with ID and name
                //echo date('Y');
                echo "<table class='table'>";
                echo"<tr><th>Particulars</th><th>Record</th></tr>";
                
                while($row=mysql_fetch_array($result)){
                    $s_id=$row['s_id'];
                    $name=$row['name'];
                    $f_name=$row['f_name'];
                    $gender=$row['gender'];
                    $dob=$row['dob'];
                    $ph=$row['ph'];
                    $email=$row['e_mail'];
                    $add=$row['add'];
                    $c_id=$row['c_id'];
                    $b_id=$row['b_id'];
                    //$dob=date('F j Y',$dob);
                    echo"
                        <tr><td>Enrollment No.</td><td>FACT201301$s_id</td></tr>
                        <tr><td>Name</td><td>$name</td></tr>
                        <tr><td>Father's Name</td><td>$f_name</td></tr>
                        <tr><td>Gender</td><td>$gender</td></tr>
                        <tr><td>Date of Birth</td><td>$dob (Format: YYYY-MM-DD)</td></tr>
                        <tr><td>Contact Number</td><td>$ph</td></tr>
                        <tr><td>Address</td><td>$add</td></tr>
                        <tr>
                        <td colspan='2'>
                            <a class='btn btn-success' href='?page=new_payment&s_id=$s_id'><i class='icon-rupee icon-border'></i> Payment Receipt</a>
                            <a class='btn btn-default' href='?page=view_payment&s_id=$s_id'><i class='icon-rupee icon-border'></i> Payment History</a>
                        </td>
                        </tr>
                        ";
                }
                echo '</table>';
            }else{
                echo "<h1 class='alert alert-danger'>Error! Can't Find the record 
                    <a href='?page=view_all_students' class='btn btn-default'>Search Student</a>
                    </h1>";
            }
        }
    }
    
    
    //payment Receipt segment
    //function to save payment
    function save_payment($s_id, $amount, $date, $remarks){
        //echo $date;
        //first senetise all data
        $s_id=  senetize($s_id);
        $amount=  senetize($amount);
        $date=  senetize($date);
        $remarks=  senetize($remarks);
        if(connect()){
            /*(
            if($date=""){//prepare a different query is date is blank SQL will use current timestamp default
                $query="INSERT INTO `payments` (`p_id`, `s_id`, `amount`,`date`, `remarks`) VALUES (NULL, '$s_id', '$amount' ,CURRENT_TIMESTAMP, '$remarks');";
            }else{//prepare query to overide SQL Default CurrentTimeStamp
                $query="INSERT INTO `payments` (`p_id`, `s_id`, `amount`, `date`, `remarks`) VALUES (NULL, '$s_id', '$amount', '$date', '$remarks');";
            }
            */
            $query="Insert into payments (s_id, amount, date, remarks) values($s_id,$amount,'$date','$remarks')";
            $result=  mysql_query($query);
            if($result){
                //Query Executed successfully
                return TRUE;
            }else{
                //there was some problem with sql echo that
                echo mysql_error();
            }
        }else{
            //retun false if connection to db failed
            return FALSE;
        }
    }
    
    function view_payment_by_id($s_id){
        if(connect()){
            $s_id=  senetize($s_id);
            $query="Select * from payments where s_id='$s_id' order by date DESC";
            $result=  mysql_query($query);
            if($result){
                //if No payment history found
                if(mysql_num_rows($result)<1){
                    echo"<h3 class='alert alert-warning'>No Payment Record Found</h3";
                    exit();
                }
                //create a table to display all the students with ID and name
                //echo date('Y');
                echo "<table class='table'>";
                echo"<tr><th>Payment ID</th><th>Date</th><th>Amount</th><th>Remarks</th><th>Take Action</th></tr>";
                
                while($row=mysql_fetch_array($result)){
                    $p_id=$row['p_id'];
                    $s_id=$row['s_id'];
                    $amount=$row['amount'];
                    $date=$row['date'];
                    $remarks=$row['remarks'];
                    //$dob=date('F j Y',$dob);
                    echo"
                        <tr>
                        <td>$p_id</td><td>$date</td><td>$amount</td><td>$remarks</td>
                            <td>
                            <a href='?page=view_payment_receipt_pdf&p_id=$p_id'><i class='icon-print'></i> Receipt</a>
                            </td>
                        </tr>
                        ";
                }
                echo '</table>';
                echo "<a href='?page=view_payment_history_pdf&s_id=$s_id' class='btn btn-default'><i class='icon-print'></i> Payment History</a>";
            }else{
                echo "<h1 class='alert alert-danger'>Error! Can't Find the record 
                    <a href='?page=view_all_students' class='btn btn-default'>Search Student</a>
                    </h1>";
            }
        }
    }
    
?>
