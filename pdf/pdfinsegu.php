


<?php
	//include 'plantilla.php';// 
	require '../funcs/conexion.php';
	require 'fpdf/fpdf.php';
	
	class PDF extends FPDF
	{
		function Header()
		{
			$this->Image('../img/logo_empresa.jpg', 5, 5, 20 ); 
			$this->SetFont('Arial','B',15);
			$this->Cell(30);
			$this->Cell(120,10, 'Reporte De Zonas Inseguras',0,0,'C'); //la letra c es si va a ser centrada
			$this->Ln(30);
		}
		
		function Footer()
		{
			$this->SetY(-15);
			$this->SetFont('Arial','I', 8);
			$this->Cell(0,10, 'Pagina '.$this->PageNo().'/{nb}',0,0,'C' );
		}		
	}
	// de aqui para abajo es la consulta sql y el que la recore //
	$query = "SELECT * from tb_con_ins";
	$resultado = $mysqli->query($query);
	
	$pdf = new PDF();
	$pdf->AliasNbPages();
	$pdf->AddPage();
	
	$pdf->SetFillColor(200,220,255);
	$pdf->SetFont('Arial','B',12);
	$pdf->Cell(20,6,'CODIGO ',1,0,'C',1);
	$pdf->Cell(40,6,'NOMBRE AREA',1,0,'C',1);
	$pdf->Cell(50,6,'DESCRICION',1,0,'C',1);
	$pdf->Cell(30,6,'IMAGEN',1,0,'C',1);
	$pdf->Cell(20,6,'FECHA ',1,0,'C',1);
	$pdf->Cell(30,6,'ESTADO',1,1,'C',1);
	 
	
	
	
	$pdf->SetFont('Arial','',10);
	
	while($row = $resultado->fetch_assoc())
	{
		$pdf->Cell(20,6,utf8_decode($row['ID_Con_ins']),1,0,'C');
		$pdf->Cell(40,6,utf8_decode($row['Con_Nombre']),1,0,'C');
		$pdf->Cell(50,6,utf8_decode($row['Con_Desc']),1,0,'C');
		$pdf->Cell(20,6,utf8_decode($row['Con_img']),1,0,'C');
		$pdf->Cell(30,6,utf8_decode($row['Con_Fecha']),1,0,'C');
		$pdf->Cell(30,6,utf8_decode($row['Con_estado']),1,1,'C');

	}
	$pdf->Output();
?>