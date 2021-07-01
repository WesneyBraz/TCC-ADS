<?php 

require_once './php/vendor/autoload.php';

use Dompdf\Dompdf;

$dompdf = new Dompdf();

ob_start();
require_once './gerarPdf.php';
$dompdf->loadHtml(ob_get_clean());

$dompdf->setPaper('A4','portrait');

$dompdf->render();

$dompdf->stream( "relatorio.pdf",

   array(
       "Attachment" => false
   )
);