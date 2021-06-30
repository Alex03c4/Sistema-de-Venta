<?php 
require 'vendor/autoload.php';
$html = '
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
</head>
<body>
<h1>Hola mundo</h1>
<p>
Lorem ipsum, dolor sit amet consectetur adipisicing elit. Aliquam itaque possimus soluta eos ipsum tempore eaque, harum blanditiis at cupiditate aspernatur facilis maxime incidunt quo laboriosam odio sint accusantium molestiae!
</p>
</body>
</html>
';
use Dompdf\Dompdf;
$dompdf= new Dompdf();
$dompdf->load_html($html);
$dompdf->render();
$dompdf->stram("documento.pdf",array('attachment'=>'0'));

?>
