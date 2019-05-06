<?php

ob_start();

include dirname(__FILE__) . '\..\..\fpdf\fpdf.php';
include  dirname(__FILE__).'\creationTableauPdf.php';
//var_dump(dirname(__FILE__));

$pdf = new PDF();
$header = array('ID','NOM','PRIX','QTE','QTE*PRIX');
// Chargement des données
$data = $pdf->LoadData('mes_commandes.txt');
$pdf->SetFont('Arial','',14);
$pdf->AddPage();
$pdf->FancyTable($header,$data);
$pdf->Output();

ob_end_flush(); 