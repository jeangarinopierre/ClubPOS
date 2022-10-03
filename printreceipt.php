
<?php
require('fpdf.php');




$pdf = new FPDF('P','mm',$dim);
$pdf->AddPage();
$pdf->SetFont('Arial','B',16);
$pdf->Cell(40,10,'Hello World!',0,1,'C');
$pdf->Ln(5);
$pdf->Cell(60,10,'Hello World!');
$pdf->Output();
?>