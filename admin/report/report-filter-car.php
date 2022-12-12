<?php
session_start();
error_reporting(0);
include('config.php');
require('fpdf/fpdf.php');

function rupiah($angka){
    
                                   $hasil_rupiah = "Rp." . number_format($angka,2,',','.');
                                    return $hasil_rupiah;
 
                                    }

date_default_timezone_set('Asia/Jakarta');// change according timezone

$currentTime = date( 'd-m-Y h:i:s A', time () );


$pdf = new FPDF("L","cm","A4");

$pdf->SetMargins(0.5,1,1);
$pdf->AliasNbPages();
$pdf->AddPage();
$pdf->SetFont('Times','B',11);
$pdf->Image('images/logo.jpg',1,1,2,2);
$pdf->SetX(4);            
$pdf->MultiCell(19.5,0.5,'PT. KORAL TIGA MAS',0,'L');
$pdf->SetX(4);
$pdf->MultiCell(19.5,0.5,'Telepon : +62 81524737292',0,'L');    
$pdf->SetFont('Arial','B',10);
$pdf->SetX(4);
$pdf->MultiCell(19.5,0.5,'Jl. Prof. M. Yamin, S.H, No. 02, Kecamatan Salo, Kab. Kampar. Riau',0,'L');
$pdf->SetX(4);
$pdf->Line(1,3.1,28.5,3.1);
$pdf->SetLineWidth(0.1);      
$pdf->Line(1,3.2,28.5,3.2);   
$pdf->SetLineWidth(0);
$pdf->ln(1);
$pdf->SetFont('Arial','B',14);
$pdf->Cell(25.5,0.7,"Laporan Pengiriman Barang",0,10,'C');
$pdf->ln(1);
$pdf->SetFont('Arial','B',10);
$pdf->Cell(5,0.7,"Printed On : ".date("d F Y"),0,0,'C');
$pdf->ln(1);
$pdf->SetFont('Arial','B',9);
$pdf->Cell(1, 0.8, 'NO', 1, 0, 'C');
$pdf->Cell(2, 0.8, 'ID', 1, 0, 'C');
$pdf->Cell(3, 0.8, 'Tanggal', 1, 0, 'C');
$pdf->Cell(2.5, 0.8, 'No Polisi', 1, 0, 'C');
$pdf->Cell(2.5, 0.8, 'Supir', 1, 0, 'C');
$pdf->Cell(2, 0.8, 'Material', 1, 0, 'C');
$pdf->Cell(1, 0.8, 'RIT', 1, 0,'C');
$pdf->Cell(2, 0.8, 'Sumber', 1, 0,'C');
$pdf->Cell(2, 0.8, 'Tujuan', 1, 0,'C');
$pdf->Cell(2, 0.8, 'Muat', 1, 0,'C');
$pdf->Cell(2, 0.8, 'Bongkar', 1, 0,'C');
$pdf->Cell(3, 0.8, 'Uang Jalan', 1, 1,'C');
// $pdf->Cell(10, 0.8, 'Keterangan', 1, 1,'C');
$pdf->SetFont('Arial','',9);
$no=1;

$from=$_POST['from'];
$end=$_POST['end'];
$query=mysqli_query($link,"SELECT * FROM tb_platno INNER JOIN tb_pengiriman_barang ON tb_platno.id_pol = tb_pengiriman_barang.no_plat WHERE (tanggal BETWEEN '$from' AND '$end') order by id_pengiriman desc");
while($lihat=mysqli_fetch_array($query)){

	$pdf->Cell(1, 0.8, $no, 1, 0, 'C');
	$pdf->Cell(2, 0.8, $lihat['id_pengiriman'], 1, 0,'C');
	$pdf->Cell(3, 0.8, date('d F Y',(strtotime($lihat['tanggal']))), 1, 0,'C');
	$pdf->Cell(2.5, 0.8, $lihat['noplat'],1, 0, 'C');
	$pdf->Cell(2.5, 0.8, $lihat['sopir'],1, 0, 'C');
	$pdf->Cell(2, 0.8, $lihat['material'], 1, 0,'C');
	$pdf->Cell(1, 0.8, $lihat['rit'], 1, 0,'C');
	$pdf->Cell(2, 0.8, $lihat['sumber_material'], 1, 0,'C');
	$pdf->Cell(2, 0.8, $lihat['tujuan'], 1, 0,'C');
	$pdf->Cell(2, 0.8, $lihat['ton_muat'], 1, 0,'C');
	$pdf->Cell(2, 0.8, $lihat['ton_bongkar'], 1, 0,'C');
	$pdf->Cell(3, 0.8, rupiah($lihat['uang_jalan']), 1, 1,'C');
	// $pdf->Cell(3, 0.8, $lihat['keterangan'], 1, 1,'C');


	$no++;
}
$pdf->ln(1);
$pdf->SetFont('Arial','B',11);
$pdf->Cell(40.5,0.7,"Disetujui Oleh Direktur",0,10,'C');
$pdf->Cell(40.5,0.7,"",0,10,'C');

$pdf->ln(1);
$pdf->SetFont('Arial','B',9);
$pdf->Cell(40.5,0.7,"IMUS",0,10,'C');

$pdf->Output("laporan_buku.pdf","I");

?>