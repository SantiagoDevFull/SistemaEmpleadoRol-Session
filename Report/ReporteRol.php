<?php
require("../modelDAO/RolDAO.php");
require('../fpdf185/fpdf.php');
$daoRol = new RolDAO();
class PDF extends FPDF
{
    // Cabecera de página
    function Header()
    {
        // Logo
        $this->Image('../image/logoReporte.png', 10, 8, 35);
        // Arial bold 15
        $this->SetFont('Courier', 'B', 20);
        // Movernos a la derecha
        $this->Cell(50);
        // Título
        $this->Cell(90, 30, 'Reporte de Rol de Usuarios', 0, 0, 'C');
        // Salto de línea
        $this->Ln(40);

        $this->SetFont('Arial', 'B', 12);
        $this->SetFillColor(100, 100, 255);
        $this->SetTextColor(255, 255, 255);
        $this->Cell(50, 15, "CODIGO", 1, 0, "C", 1);
        $this->Cell(90, 15, "ROL", 1, 0, "C", 1);
        $this->Cell(50, 15, "#USUARIO REG.", 1, 1, "C", 1);
    }

    // Pie de página
    function Footer()
    {
        // Posición: a 1,5 cm del final
        $this->SetY(-15);
        // Arial italic 8
        $this->SetFont('Arial', 'I', 8);
        // Número de página
        $this->Cell(0, 10, utf8_decode('Página ') . $this->PageNo() . '/{nb}', 0, 0, 'C');
    }
}

$listaRol = $daoRol->ListarRol();

$pdf = new PDF();
$pdf->AliasNbPages();
$pdf->AddPage();
$pdf->SetFont('Arial', '', 12);
//$pdf->Cell(40, 10, utf8_decode('¡Hola, Munddo!'));

foreach ($listaRol as $rol) :
    $pdf->Cell(50, 10, $rol->getId(), 1, 0, "C", 0);
    $pdf->Cell(90, 10, $rol->getNomRol(), 1, 0, "C", 0);
    $pdf->Cell(50, 10, $rol->getNumUsuReg(), 1, 1, "C", 0);
endforeach;
$pdf->Output();
