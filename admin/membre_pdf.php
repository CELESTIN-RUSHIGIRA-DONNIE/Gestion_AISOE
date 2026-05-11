<?php

error_reporting(0);

include('conf/dbcon.php');
require('assets/fpdf/fpdf.php');

$result = $con->query("SELECT * FROM membre WHERE status=1");
$rows = [];
while ($row = $result->fetch_assoc()) {
    $rows[] = $row;
}
$con->close();

class PDF extends FPDF
{
    var $rows;

    function SetRows($r)
    {
        $this->rows = $r;
    }

    function Header()
    {
        if ($this->PageNo() != 1) {
            return;
        }

        //$this->Image('assets/images/lg-et.jpg', 10, 8, 0, 30);

        $this->SetXY(15, 8);

        $this->SetFont('times', 'B', 18);
        $this->Cell(0, 8, utf8_decode('Aide Sociale Étudiants'), 0, 1, 'C');

        $this->SetFont('times', 'B', 16);
        $this->Cell(0, 6, utf8_decode('AISOE'), 0, 1, 'C');

        $this->SetFont('times', 'i', 10);
        $this->Cell(0, 5, utf8_decode('aidesocialeetudiantaisoe@gmail.com'), 0, 1, 'C');
        $this->Cell(0, 5, utf8_decode('Tél: +243 974 291 271'), 0, 1, 'C');

        $this->Ln(12);
    }

    function Footer()
    {
        $this->SetY(-15);
        $this->SetFont('Arial', 'I', 8);
        $this->Cell(0, 10, utf8_decode('Liste de chantre ' . $this->PageNo()), 0, 0, 'C');
    }

    function TableauBureau()
    {
        $this->SetFont('times', 'B', 9);
        $this->SetFillColor(200, 220, 255);
        $this->Cell(10, 8, utf8_decode('N°'), 1, 0, 'C', true);
        $this->Cell(60, 8, utf8_decode('Nom et Prénom'), 1, 0, 'C', true);
        $this->Cell(10, 8, utf8_decode('Genre'), 1, 0, 'C', true);
        $this->Cell(45, 8, utf8_decode('Fonction'), 1, 0, 'C', true);
        $this->Cell(23, 8, utf8_decode('Téléphone'), 1, 0, 'C', true);
        $this->Cell(55, 8, utf8_decode('Email'), 1, 1, 'C', true);

        $this->SetFont('Arial', '', 8);

        if (empty($this->rows)) {
            $this->Cell(0, 10, utf8_decode('Aucun membre trouvé'), 1, 1, 'C');
            return;
        }

        $fill = false;
        $numero = 1;

        foreach ($this->rows as $row) {
            if ($fill) {
                $this->SetFillColor(245, 245, 255);
            } else {
                $this->SetFillColor(255, 255, 255);
            }

            $this->Cell(10, 6, $numero++, 1, 0, 'C', $fill);
            $this->Cell(60, 6, utf8_decode(($row['nom'] ?? '') . ' ' . ($row['prenom'] ?? '')), 1, 0, 'L', $fill);
            $this->Cell(10, 6, utf8_decode($row['sexe'] ?? ''), 1, 0, 'L', $fill);
            $this->Cell(45, 6, utf8_decode($row['fonction'] ?? ''), 1, 0, 'L', $fill);
            $this->Cell(23, 6, utf8_decode($row['telephone'] ?? ''), 1, 0, 'C', $fill);
            $this->Cell(55, 6, utf8_decode($row['email'] ?? ''), 1, 1, 'L', $fill);

            $fill = !$fill;
        }
    }
}

$pdf = new PDF('L', 'mm', 'A4');
$pdf->SetRows($rows);
$pdf->AddPage();
$pdf->TableauBureau();
$pdf->Output();
exit;

