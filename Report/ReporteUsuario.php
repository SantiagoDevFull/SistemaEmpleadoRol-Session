<?php
require("../modelDAO/UsuarioDAO.php");
require('../fpdf185/fpdf.php');
$daoUsuario = new UsuarioDAO();
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
        $this->Cell(100);
        // Título
        $this->Cell(90, 30, 'Reporte de Usuarios', 0, 0, 'C');
        // Salto de línea
        $this->Ln(40);

        $this->SetFont('Arial', 'B', 12);
        $this->SetFillColor(100, 100, 255);
        $this->SetTextColor(255, 255, 255);
        $this->Cell(30, 15, "CODIGO", 1, 0, "C", 1);
        $this->Cell(45, 15, "CORREO", 1, 0, "C", 1);
        $this->Cell(45, 15, utf8_decode("CONTRASEÑA"), 1, 0, "C", 1);
        $this->Cell(60, 15, "NOMBRE", 1, 0, "C", 1);
        $this->Cell(45, 15, "FEC. CONTRATO", 1, 0, "C", 1);
        $this->Cell(55, 15, "ROL", 1, 1, "C", 1);
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

$listarUsuario = $daoUsuario->ListarUsuario();

$pdf = new PDF('L', 'mm', 'A4');
$pdf->AliasNbPages();
$pdf->AddPage();
$pdf->SetFont('Arial', '', 12);
//$pdf->Cell(40, 10, utf8_decode('¡Hola, Munddo!'));

foreach ($listarUsuario as $usu) :
    $pdf->Cell(30, 10, $usu->getIdUsu(), 1, 0, "C", 0);
    $pdf->Cell(45, 10, $usu->getCorreoUsu(), 1, 0, "C", 0);
    $pdf->Cell(45, 10, $usu->getPassUsu(), 1, 0, "C", 0);
    $pdf->Cell(60, 10, $usu->getNomUsu(), 1, 0, "C", 0);
    $pdf->Cell(45, 10, $usu->getFechContUsu(), 1, 0, "C", 0);
    $pdf->Cell(55, 10, $usu->getRol()->getNomRol(), 1, 1, "C", 0);
endforeach;
$pdf->Output();
