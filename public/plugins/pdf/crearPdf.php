<?php 

require_once 'dompdf\autoload.inc.php';
// reference the Dompdf namespace
use Dompdf\Dompdf;

	ob_start();
	include('public\plugins\pdf\factura.php');
	$html = ob_get_clean();
	$nombre = "Factura #".$data['ventas']['id_venta'] ;

// instantiate and use the dompdf class
$dompdf = new Dompdf();

$dompdf->loadHtml($html);
// (Optional) Setup the paper size and orientation
$dompdf->setPaper('A4', 'portrait');

// Render the HTML as PDF
$dompdf->render();

// Output the generated PDF to Browser
$dompdf->stream($nombre);

?>