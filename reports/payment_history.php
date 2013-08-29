<?php
require('fpdf.php');
require('../pages/functions.php');
//set global variables
if(!isset($_GET['s_id'])){
    die("Sorry! No Payment has been select to print the receipt for!!");
}

class PDF extends FPDF
{
    // Page header
    function Header()
    {
        
        $this->Image('logo.png',70,12,70);
        $this->SetFont('Arial','B',15);
        $this->Ln(40);
        // Move to the right
        $this->Cell(40);
        // SubTitle
        $this->Cell(30,10,'Faculty of Advance Computation Technology');
        // Line break
        $this->Ln(6);
        $this->SetFont('Arial','',12);
        // Move to the right
        $this->Cell(30);
        // SubTitle
        $this->Cell(30,10,'Branch : Chittaranjan | Website : www.Fact-Edu.com | Ph. 8972925825');
        // Line break
        $this->Ln(20);
        $this->SetFont('Arial','B',17);
        $this->Cell(70);
        $this->Cell(30,10,'Payment History');
        $this->Ln(20);
       
    }

    // Page footer
    function Footer()
    {
        // Position at 1.5 cm from bottom
        $this->SetY(-15);
        // Arial italic 8
        $this->SetFont('Arial','I',8);
        // Page number
        $this->Cell(0,10,'Page '.$this->PageNo().'/{nb}',0,0,'C');
    }
}

function generate_history($pdf,$s_id){
        $s_id=  senetize($s_id);
        if(connect()){
            $query="Select * from payments where s_id=$s_id";
            $result=  mysql_query($query);
            if($result){
                if(mysql_num_rows($result)>0){
                    
                    //display student's Brief information in PDF
                    $query2="Select * from students where s_id=$s_id";
                    $result2=  mysql_query($query2);
                    if($result2){
                        if(mysql_num_rows($result2)>0){
                            while($row=mysql_fetch_array($result2)){
                                $pdf->SetFont('Times','B',14);
                                $pdf->Cell(30);
                                $pdf->Cell(0,10,"Name : ".$row['name']."    Father's Name : ".$row['f_name'],0,1);
                            }
                        }
                    }
                    
                    //display student's payment history
                    $pdf->SetFont('Times','',12);
                    $pdf->Cell(20);
                    $pdf->Cell(25,7,"Payment ID",1);
                    $pdf->Cell(25,7,"Date (y-m-d)",1);
                    $pdf->Cell(25,7,"Amount",1);
                    $pdf->Cell(80,7,"Remarks",1);
                    $pdf->Ln();
                    while($row=  mysql_fetch_array($result)){
                        $pdf->SetFont('Times','',12);
                        $pdf->Cell(20);
                        $pdf->Cell(25,7,$row['p_id'],1);
                        $pdf->Cell(25,7,$row['date'],1);
                        $pdf->Cell(25,7,$row['amount']."/- Rs.",1);
                        $pdf->Cell(80,7,  substr($row['remarks'],0,40)."...",1);
                        $pdf->Ln();
                    }
                }else{
                    die("No Payment History Found");
                }
            }else{
                die(mysql_error());
            }
        }else{
            die(mysql_error());
        }
        $pdf->SetFont('Times','B',13);
        //$pdf->Cell(0,10,"Receipt No. : ".$getData['p_id'],'T',1,'R');
        $pdf->Cell(30);
        $pdf->Ln(20);
        $pdf->Cell(0,10,"__________________________",'',1,'R');
        $pdf->Cell(0,10,"Authorised Signatory      ",'',1,'R');
}





// Instanciation of inherited class
$pdf = new PDF('P', 'mm', 'A4');
$pdf->AliasNbPages();
$pdf->AddPage();
$s_id=$_GET['s_id'];
generate_history($pdf,$s_id);

$pdf->Output();
?>