<?php
require('fpdf/fpdf.php');

class PDF extends FPDF
{
// Cabecera de página
function Header()
{
    // Arial bold 15
    $this->SetFont('Arial','B',11);
    // Movernos a la derecha
    $this->Cell(80);
    // Título
    $this->Cell(30,10,'Productos',0,0,'C');
    // Salto de línea
    $this->Ln(20);

    $this->Cell(30,10,utf8_decode('Descripción'),1,0,'C',0);
    $this->Cell(25,10,'Categoria',1,0,'C',0);
    $this->Cell(30,10,'Stocks',1,0,'C',0);
    $this->Cell(35,10,'Precio de compra',1,0,'C',0);
    $this->Cell(35,10,'Precio de venta',1,0,'C',0);
    $this->Cell(30,10,'Fecha',1,1,'C',0);
}

// Pie de página
function Footer()
{
    // Posición: a 1,5 cm del final
    $this->SetY(-15);
    // Arial italic 8
    $this->SetFont('Arial','I',8);
    // Número de página
    $this->Cell(0,10,utf8_decode('Página ').$this->PageNo().'/{nb}',0,0,'C');
}
}

require ("cn.php");
$consulta="SELECT * FROM products";
$resultado = mysqli_query($conexion, $consulta);

$pdf = new PDF();
$pdf-> AliasNbPages();
$pdf->AddPage();
$pdf->SetFont('Arial','B',8);

while ($row = $resultado->fetch_assoc()) {
  $pdf->Cell(30, 10, $row['name'], 1, 0, 'C', 0);
  $pdf->Cell(25, 10, $row['categorie_id'], 1, 0, 'C', 0);
  $pdf->Cell(30, 10, $row['quantity'], 1, 0, 'C', 0);
  $pdf->Cell(35, 10, $row['buy_price'], 1, 0, 'C', 0);
  $pdf->Cell(35, 10, $row['sale_price'], 1, 0, 'C', 0);
  $pdf->Cell(30, 10, $row['date'], 1, 1, 'C', 0);
}



$pdf->Output();
?>