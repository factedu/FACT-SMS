<?php
require('fpdf.php');
require('../pages/functions.php');
//set global variables
if(!isset($_GET['p_id'])){
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
        $this->Cell(30,10,'Payment Receipt');
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

function generate_receipt($p_id){
    if(connect()){
        $s_id=0;
        
        $p_id=  senetize($p_id);
        $query="Select * From payments where p_id=$p_id";
        $result=  mysql_query($query);
        if($result){
            if(mysql_num_rows($result)>0){
                //code to generate the receipt
                
                //get all records from fetched data and assign it to a variable
                while($row=mysql_fetch_array($result)){
                    $s_id=$row['s_id'];
                    $data['amount']=$row['amount'];
                    $data['p_id']=$row['p_id'];
                    $data['date']=$row['date'];
                    $data['remarks']=$row['remarks'];
                }
                
                //now once we got the s_id fetch the student's detail
                $query2="Select * from students where s_id=$s_id";
                $result2=  mysql_query($query2);
                if($result2){
                    //set varialbles for studets details
                    while ($row2=  mysql_fetch_array($result2)){
                        $data['name']=$row2['name'];
                        $data['f_name']=$row2['f_name'];
                    }
                }
                return $data;
            }
        }
    }
    
}





// Instanciation of inherited class
$pdf = new PDF('P', 'mm', 'A4');
$pdf->AliasNbPages();
$pdf->AddPage();
$getData=generate_receipt($_GET['p_id']);
$pdf->SetFont('Times','B',13);
$pdf->Cell(0,10,"Receipt No. : ".$getData['p_id'],'T',1,'R');
$pdf->SetFont('Times','',12);
$pdf->Cell(30);
$pdf->Cell(0,10,"Name : ".$getData['name']."    Father's Name : ".$getData['f_name'],0,1);
$pdf->Cell(30);
$pdf->Cell(0,10,"Date of Receipt (yyyy-mm-dd) Format : ".$getData['date'],0,1);
$pdf->Cell(30);
$pdf->Cell(0,10,"Amount in Figure : Rs.".$getData['amount'],0,1);
$pdf->Cell(30);
$pdf->Cell(0,10,"Remarks (if any) :- ",0,1);
$pdf->Cell(30);
$pdf->Cell(0,10,$getData['remarks'],0,1);
$pdf->SetFont('Times','B',13);
$pdf->Ln(20);
$pdf->Cell(0,10,"__________________________",'',1,'R');
$pdf->Cell(0,10,"Authorised Signatory      ",'',1,'R');
$pdf->Output();
?>