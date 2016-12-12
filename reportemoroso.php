<?php

require('fpdf/fpdf.php');
require('conexion.php');
class PDF extends FPDF
{
    var $widths;
    var $aligns;

    function SetWidths($w)
    {
        //Set the array of column widths
        $this->widths=$w;
    }

    function SetAligns($a)
    {
        //Set the array of column alignments
        $this->aligns=$a;
    }

    function Row($data)
    {
        //Calculate the height of the row
        $nb=0;
        for($i=0;$i<count($data);$i++)
            $nb=max($nb,$this->NbLines($this->widths[$i],$data[$i]));
        $h=5*$nb;
        //Issue a page break first if needed
        $this->CheckPageBreak($h);
        //Draw the cells of the row
        for($i=0;$i<count($data);$i++)
        {
            $w=$this->widths[$i];
            $a=isset($this->aligns[$i]) ? $this->aligns[$i] : 'L';
            //Save the current position
            $x=$this->GetX();
            $y=$this->GetY();
            //Draw the border

            $this->Rect($x,$y,$w,$h);

            $this->MultiCell($w,5,$data[$i],0,$a,'true');
            //Put the position to the right of the cell
            $this->SetXY($x+$w,$y);
        }
        //Go to the next line
        $this->Ln($h);
    }

    function CheckPageBreak($h)
    {
        //If the height h would cause an overflow, add a new page immediately
        if($this->GetY()+$h>$this->PageBreakTrigger)
            $this->AddPage($this->CurOrientation);
    }

    function NbLines($w,$txt)
    {
        //Computes the number of lines a MultiCell of width w will take
        $cw=&$this->CurrentFont['cw'];
        if($w==0)
            $w=$this->w-$this->rMargin-$this->x;
        $wmax=($w-2*$this->cMargin)*1000/$this->FontSize;
        $s=str_replace("\r",'',$txt);
        $nb=strlen($s);
        if($nb>0 and $s[$nb-1]=="\n")
            $nb--;
        $sep=-1;
        $i=0;
        $j=0;
        $l=0;
        $nl=1;
        while($i<$nb)
        {
            $c=$s[$i];
            if($c=="\n")
            {
                $i++;
                $sep=-1;
                $j=$i;
                $l=0;
                $nl++;
                continue;
            }
            if($c==' ')
                $sep=$i;
            $l+=$cw[$c];
            if($l>$wmax)
            {
                if($sep==-1)
                {
                    if($i==$j)
                        $i++;
                }
                else
                    $i=$sep+1;
                $sep=-1;
                $j=$i;
                $l=0;
                $nl++;
            }
            else
                $i++;
        }
        return $nl;
    }

    function Header()
    {
        $this->SetFont('Arial','b',20);
        $this->Text(30,15,'School Bus System',0,'C', 0);
        $this->Text(25,30,'Reporte de Morosidad',0,'C', 0);
        $this->Ln(30);
    }

    function body()    {
        $this->Text(20,14,'School Bus System',0,'C', 0);
    }

    function Footer()
    {
        $this->SetY(-25);
        $this->SetFont('Arial','B',10);
        $this->Cell(100,10,'    ',0,0,'L');

    }

}

$con = new DB;
$pacientes = $con->conectar();

$strConsulta = "SELECT * from asistente where estado='ACTIVO'";

$pacientes = mysql_query($strConsulta);

$fila = mysql_fetch_array($pacientes);

$pdf=new PDF('L','mm','Letter');
$pdf->Open();
$pdf->AddPage();
$pdf->SetMargins(20,20,20);
$pdf->Ln(10);


$pdf->SetFont('Arial','',16);
$pdf->Cell(0,6,'Generado por: Carola Mora',0,1);
$pdf->Cell(0,6,'Rut: 11.981.570-3  ',0,1);
$pdf->Cell(0,6,'Fecha del Reporte: '.date('d-m-Y'),0,1);





$pdf->Ln(10);

$pdf->SetWidths(array(30, 40, 35,40,30,40,40));
$pdf->SetFont('Arial','b',17);
$pdf->SetFillColor(64,64,64);
$pdf->SetTextColor(255);

for($i=0;$i<1;$i++)
{
    $pdf->Row(array('RUT','NOMBRE', 'APELLIDO', 'TELEFONO', 'PAGO', 'ABONO', 'DEUDA'));
}

$historial = $con->conectar();
$strConsulta = "select rut, nombre, apellido,telefono,pago,abono,estado,(pago-abono) from apoderados where estado='ACTIVO' and pago>abono";

$historial = mysql_query($strConsulta);
$numfilas = mysql_num_rows($historial);


for ($i=0; $i<$numfilas; $i++)
{
    $fila = mysql_fetch_array($historial);
    $pdf->SetFont('Arial','',10);

    if($i%2 == 1)
    {
        $pdf->SetFillColor(11,39,71);
        $pdf->SetTextColor(255,255,255);
        $pdf->Row(array($fila['0'], $fila['1'], $fila['2'], $fila['3'], $fila['4'], $fila['5'], $fila['7']));
    }
    else
    {
        $pdf->SetFillColor(12,58,111);
        $pdf->SetTextColor(255,255,255);
        $pdf->Row(array($fila['0'], $fila['1'], $fila['2'], $fila['3'], $fila['4'], $fila['5'], $fila['7']));
    }
}
$pdf->Output();
?>

