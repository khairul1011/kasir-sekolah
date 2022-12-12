<?php

$content="
<page>
<h1>contoh</h1>
<br>
contoh <b>contoh</b>
<a href='index.php'></a>
</page>";

require_once('../html2pdf/html2pdf.class.php');
$html2pdf=new HTML2PDF('P','A4','en');
$html2pdf->WriteHTML($content);
$html2pdf->Output('example.pdf');
?>