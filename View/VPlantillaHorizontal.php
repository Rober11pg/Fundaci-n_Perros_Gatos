<?php
include_once(__DIR__.'/../fpdf182/fpdf.php');

class PDF extends FPDF
{
    // Cabecera de página
    function Header()
    {
        // Logo
        $this->Image(__DIR__.'/../View/img/LogoEmpresa.png', 10, 8, 33);
        // Arial bold 15
        $this->SetFont('Arial', 'B', 15);
        // Movernos a la derecha
        $this->Cell(165);
        // Título
        $this->Cell(30, 20, 'REFUGIO DE ANIMALES', 0, 0, 'C');
        // Salto de línea
        $this->Ln(20);
    }

    // Pie de página
    function Footer()
    {
        // Posición: a 1,5 cm del final
        $this->SetY(-15);
        // Arial italic 8
        $this->SetFont('Arial', 'I', 8);
        // Número de página
        $this->Cell(0, 10, 'Page ' . $this->PageNo() . '/{nb}', 0, 0, 'C');
    }
    
    function setHorizontalLandscape()
    {
        $this->SetLeftMargin(30); // Adjust left margin for A3
        $this->SetRightMargin(30); // Adjust right margin for A3
        $this->SetAutoPageBreak(true, 20); // Enable auto-page break with adjusted bottom margin
        $this->AddPage('L', 'A3'); // Set landscape orientation and A3 page size
    }

    
}
?>
