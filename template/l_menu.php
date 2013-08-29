<div class="container rav-popup" style="margin-top: 30px; border: 1px solid white; padding: 12px; border-radius: 20px;"> 
<?php
    if(!isset($_SESSION['logged_in'])){
        echo"<ul class='nav nav-stacked'>
                <h5 class='text-center'>You are not logged in</h5><hr/>
                <li><a href='?page=login_ui' class='btn btn-outline btn-block'><i class='icon-signin pull-right'></i> Login</a></li>
             </ul>";
    }else if($_SESSION['logged_in']==TRUE && $_SESSION['u_status']=='admin'){
        
        //generate Admin Menu//
        $u_name=$_SESSION['u_name'];
        //echo $u_name;
        echo"<ul class='nav nav-stacked'>
                <h5 class='text-center'>Welcome $u_name!</h5><hr/>
                    <li><a href='?page=notice_board' class='btn btn-outline btn-block'><i class='icon-info-sign icon-2x'></i> Notice Board</a></li>
                <h6>Personal Account Management<h6>
                <li><a href='?page=logout' class='btn btn-outline btn-block'><i class='icon-signout icon-2x'></i> Logout</a></li>
                <li><a href='#' class='btn btn-outline btn-block' title='Change your password, profile picture, contact information etc.'><i class='icon-edit icon-2x'></i> Edit Profile</a></li>
                <hr/>
                <h6>Student Management<h6>
                <li><a href='?page=new_student' class='btn btn-outline btn-block'><i class='icon-user icon-2x'></i> New Admission</a></li>
                <li><a href='?page=view_all_students' class='btn btn-outline btn-block''><i class='icon-file-text icon-2x'></i> View Student's Record</a></li>
                <h6>Accounts Management<h6>
                <li><a href='?page=new_payment' class='btn btn-outline btn-block'><i class='icon-inr icon-2x'></i> Payment Recept</a></li>
             </ul>";
    }else if($_SESSION['logged_in']==TRUE && $_SESSION['u_status']=='manager'){
        //generate Manager Menu//
        $u_name=$_SESSION['u_name'];
        //echo $u_name;
        echo"<ul class='nav nav-stacked'>
                <h5 class='text-center'>Welcome $u_name!</h5><hr/>
                <h6>Personal Account Management<h6>
                <li><a href='?page=logout' class='btn btn-outline btn-block'>Logout</a></li>
                <li><a href='#' class='btn btn-outline btn-block' title='Change your password, profile picture, contact information etc.'>Edit Profile</a></li>
                <hr/>
                <h6>Report Management<h6>
                <li><a href='?page=newReport' class='btn btn-outline btn-block'>Create New Report</a></li>
                <li><a href='?page=view_all_report' class='btn btn-outline btn-block'>View Existitng Report</a></li>
                <li><a href='?page=a' class='btn btn-outline btn-block'>Search For Report</a></li>
             </ul>";
        
    }else if($_SESSION['logged_in']==TRUE && $_SESSION['u_status']=='registered'){
        //generate Registered User Menu//
        $u_name=$_SESSION['u_name'];
        //echo $u_name;
        echo"<ul class='nav nav-stacked'>
                <h5 class='text-center'>Welcome $u_name!</h5><hr/>
                <h6>Personal Account Management<h6>
                <li><a href='?page=logout' class='btn btn-outline btn-block'>Logout</a></li>
                <li><a href='#' class='btn btn-outline btn-block' title='Change your password, profile picture, contact information etc.'>Edit Profile</a></li>
                <h6>Submit Reports<h6>
                <li><a href='?page=newReport' class='btn btn-outline btn-block'>Create New Report</a></li>
                <li><a href='?page=view_all_report' class='btn btn-outline btn-block'>View Existitng Report</a></li>
             </ul>";
    }else{
        //generate Registered User Menu//
        $u_name=$_SESSION['u_name'];
        //echo $u_name;
        echo"<ul class='nav nav-stacked'>
                <h5 class='text-center'>Welcome $u_name!</h5><hr/>
                <h6>Personal Account Management<h6>
                <li><a href='?page=logout' class='btn btn-outline btn-block'>Logout</a></li>
                <li><a href='#' class='btn btn-outline btn-block' title='Change your password, profile picture, contact information etc.'>Edit Profile</a></li>
                
             </ul>";
    }
?>
</div>
