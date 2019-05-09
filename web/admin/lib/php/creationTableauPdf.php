<?php
//ficheir qui permet de creer un PDF et presenter les donneés sous forme d'un tableau
class PDF extends FPDF {

// Chargement des données
    function LoadData($file) {
        // Lecture des lignes du fichier
        $lines = file($file);
        $data = array();
        foreach ($lines as $line)
            $data[] = explode(';', trim($line));
        return $data;
    }

// Tableau coloré
    function FancyTable($header, $data) {
        // Couleurs, épaisseur du trait et police grasse
        $this->SetFillColor(255, 0, 0);
        $this->SetTextColor(255);
        $this->SetDrawColor(128, 0, 0);
        $this->SetLineWidth(.3);
        $this->SetFont('', 'B');
        // En-tête
        $w = array(20, 80, 35, 20, 35);
        for ($i = 0; $i < count($header); $i++)
            $this->Cell($w[$i], 7, $header[$i], 1, 0, 'C', true);
        $this->Ln();
        // Restauration des couleurs et de la police
        $this->SetFillColor(224, 235, 255);
        $this->SetTextColor(0);
        $this->SetFont('');
        // Données
        $fill = false;
        foreach ($data as $row) {
            $this->Cell($w[0], 6, $row[0], 'LR', 0, 'L', $fill);
            $this->Cell($w[1], 6, $row[1], 'LR', 0, 'L', $fill);
            $this->Cell($w[2], 6, number_format($row[2], 0, ',', ' '), 'LR', 0, 'R', $fill);
            $this->Cell($w[3], 6, number_format($row[3], 0, ',', ' '), 'LR', 0, 'R', $fill);
            $this->Cell($w[4], 6, number_format($row[4], 0, ',', ' '), 'LR', 0, 'R', $fill);
            $this->Ln();
            $fill = !$fill;
        }
        // Trait de terminaison
        $this->Cell(array_sum($w), 0, '', 'T');
    }

}
