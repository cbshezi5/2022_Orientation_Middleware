<?Php
require('fpdf.php');
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Headers: *');
header('Access-Control-Allow-Methods: POST, GET, OPTIONS');
header('Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept');

class PdfEncode extends FPDF{
    
  
   function header()
   {
            $body = file_get_contents('php://input');
            $data = json_decode($body)->{'data'};

            $this->Image('R.jpg',10,10,30,10);

            $this->SetFont('Courier','B',16);
		    $this->SetTextColor(0, 0, 0);
        
            $this->Ln(30);


            $this->Cell(0,0,"Online Orientation",2,0,'C');
            $this->SetFont('Courier','B',12);
		    $this->SetTextColor(0, 0, 0);
        
            $this->Ln(30);

            $this->Cell(0,0,"Hi admin your requested survey report for student ".$data->Firstname." ".$data->Lastname ,2,0,'C');
//             $this->Ln(6);
//             $this->Cell(0,0,$data->Email.", ".$data->StudentNo. " replied as follows on the survey stage of the online orintation" ,2,0,'C');
//             $this->SetFont('Arial','B',13);

            $this->Ln(20);

            $this->SetTextColor(13, 71, 148);
            $x = $this->GetX();

            $this->Cell(180,6,'Question', 1,0);
            $this->Cell(90,6,'Answer', 1,1);

            $this->SetTextColor(0, 0, 0);

            $this->SetFont('Arial','B',7);
//         for($i = 0; $i < count($data->Survey); $i++)
//         { 
//             $this->SetX($x);
//             $this->Cell(180,6,$data->Survey[$i]->question, 1,0);
            
//             $this->Cell(90,6,$data->Survey[$i]->answer, 1,1);
//         }

        

   
        
        $this->Cell(0,180,"This document was generated by the Tshwane University of Technology for admin" ,2,0,'C');
        
       
   }
}


$printOut = new PdfEncode();
$printOut->AliasNbPages();
$printOut->AddPage('L','A4',0);
$printOut->Output("I","survey-report.pdf");



?>