<?php

require 'OPTOMETRISTAS_PHP/profesional/add-info.php'; // Asegúrate de que la ruta sea correcta
use FPDF\FPDF;

class PDF extends FPDF {
  // Contenido del PDF
  function Header() {
      // Cabecera
      $this->SetFont('Arial', 'B', 12);
      $this->Cell(0, 10, 'Mi PDF Personalizado', 0, 1, 'C');
  }

  function Footer() {
      // Pie de página
      $this->SetY(-15);
      $this->SetFont('Arial', 'I', 8);
      $this->Cell(0, 10, 'Página ' . $this->PageNo(), 0, 0, 'C');
  }

  function ChapterTitle($title) {
      // Título del capítulo
      $this->SetFont('Arial', 'B', 12);
      $this->Cell(0, 6, $title, 0, 1);
  }

  function ChapterBody($body) {
      // Contenido del capítulo
      $this->SetFont('Arial', '', 12);
      $this->MultiCell(0, 10, $body);
  }
}

$pdf = new PDF();
$pdf->AddPage();
$pdf->ChapterTitle('Capítulo 1');
$pdf->ChapterBody('Este es el contenido del capítulo 1. Puedes agregar más texto y elementos aquí.');
// Agrega más contenido si es necesario

$pdf->Output();

?>
