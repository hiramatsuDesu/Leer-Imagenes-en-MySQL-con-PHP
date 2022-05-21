<?php
/// Powered by Evilnapsis go to http://evilnapsis.com
require("fpdf.php");

$pdf = new FPDF($orientation='P',$unit='mm');
$pdf->AddPage();
$pdf->SetFont('Arial','B',20);    
$textypos = 5;
$pdf->setY(12);
$pdf->setX(10);

// Agregamos los datos de la empresa
$pdf->Cell(5,$textypos,"Carrito de Compras");
$pdf->SetFont('Arial','B',10);    
$pdf->setY(30);$pdf->setX(10);
$pdf->Cell(5,$textypos,"Su compra: ");
$pdf->SetFont('Arial','',10);    
$pdf->setY(35);$pdf->setX(10);
$pdf->Cell(5,$textypos,"Colon 1785 CP:5000");
$pdf->setY(40);$pdf->setX(10);
$pdf->Cell(5,$textypos,"Argentina - Cordoba");
$pdf->setY(45);$pdf->setX(10);
$pdf->Cell(5,$textypos,"Tel: 0351 - 852 xxx");
$pdf->setY(50);$pdf->setX(10);
$pdf->Cell(5,$textypos,"mail@mail.com");

// Agregamos los datos del cliente
$pdf->SetFont('Arial','B',10);    
$pdf->setY(30);$pdf->setX(75);
$pdf->Cell(5,$textypos,"Cajero:");
$pdf->SetFont('Arial','',10);    
$pdf->setY(35);$pdf->setX(75);
$pdf->Cell(5,$textypos,"Nro: 8");
$pdf->setY(40);$pdf->setX(75);
$pdf->Cell(5,$textypos,"Nombre Cajero");
$pdf->setY(45);$pdf->setX(75);

include("../recursos.php");
$mostrar = $operacion->mostrarVenta();
date_default_timezone_set('America/Argentina/Cordoba');
$fecha=date('d-m-Y');
$hora=date('H:i:s');
$total = 0;

// Agregamos los datos del cliente
$pdf->SetFont('Arial','B',10);    
$pdf->setY(30);$pdf->setX(135);
$pdf->Cell(5,$textypos,"FACTURA #12345");
$pdf->SetFont('Arial','',10);    
$pdf->setY(35);$pdf->setX(135);
$pdf->Cell(5,$textypos,"Fecha: ".$fecha);
$pdf->setY(40);$pdf->setX(135);
$pdf->Cell(5,$textypos,"Hora: ".$hora."hs");
$pdf->setY(45);$pdf->setX(135);
$pdf->Cell(5,$textypos,"");
$pdf->setY(50);$pdf->setX(135);
$pdf->Cell(5,$textypos,"");

/// Apartir de aqui empezamos con la tabla de productos
$pdf->setY(60);$pdf->setX(135);
    $pdf->Ln();
/////////////////////////////
//// Array de Cabecera
$header = array("Cod.", "Descripcion","Cant.","Precio","Total");
//// Arrar de Productos
$products = array(
	array("0010", "Producto 1",2,120,0),
	array("0024", "Producto 2",5,80,0),
	array("0001", "Producto 3",1,40,0),
	array("0001", "Producto 3",5,80,0),
	array("0001", "Producto 3",4,30,0),
	array("0001", "Producto 3",7,80,0),
);
    // Column widths
    $w = array(20, 95, 20, 25, 25);
    // Header
    for($i=0;$i<count($header);$i++)
        $pdf->Cell($w[$i],7,$header[$i],1,0,'C');
    $pdf->Ln();
    // Data
    $total = 0;
    foreach($products as $row)
    {
        $pdf->Cell($w[0],6,$row[0],1);
        $pdf->Cell($w[1],6,$row[1],1);
        $pdf->Cell($w[2],6,number_format($row[2]),'1',0,'R');
        $pdf->Cell($w[3],6,"$ ".number_format($row[3],2,".",","),'1',0,'R');
        $pdf->Cell($w[4],6,"$ ".number_format($row[3]*$row[2],2,".",","),'1',0,'R');

        $pdf->Ln();
        $total+=$row[3]*$row[2];

    }
/////////////////////////////
//// Apartir de aqui esta la tabla con los subtotales y totales
$yposdinamic = 60 + (count($products)*10);

$pdf->setY($yposdinamic);
$pdf->setX(235);
    $pdf->Ln();
/////////////////////////////
$header = array("", "");
$data2 = array(
	array("Subtotal",$total),
	array("Descuento", 0),
	array("Impuesto", 0),
	array("Total", $total),
);
    // Column widths
    $w2 = array(40, 40);
    // Header

    $pdf->Ln();
    // Data
    foreach($data2 as $row)
    {
$pdf->setX(115);
        $pdf->Cell($w2[0],6,$row[0],1);
        $pdf->Cell($w2[1],6,"$ ".number_format($row[1], 2, ".",","),'1',0,'R');

        $pdf->Ln();
    }
/////////////////////////////

$yposdinamic += (count($data2)*10);
$pdf->SetFont('Arial','B',10);    

$pdf->setY($yposdinamic);
$pdf->setX(10);
$pdf->Cell(5,$textypos,"TERMINOS Y CONDICIONES");
$pdf->SetFont('Arial','',10);    

$pdf->setY($yposdinamic+10);
$pdf->setX(10);
$pdf->Cell(5,$textypos,"El cliente se compromete a pagar la factura.");
$pdf->setY($yposdinamic+20);
$pdf->setX(10);
$pdf->Cell(5,$textypos,"Powered by Evilnapsis");


$pdf->output();