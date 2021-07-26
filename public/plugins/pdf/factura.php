<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Document</title>
	<style>
		* {
			margin: 0;
			padding: 0;
		}

		h2 {
			padding: 4px 0;
			font-size: 18px;
			text-align: center;
		}

		div.main {
			max-width: 640px;
			margin: auto;
		}

		p {
			font-size: 16px;
		}

		.M {
			margin-top: 8px;
		}

		span {
			font-weight: 700;
		}

		.borde {
			border-top: 3px solid rgb(232, 241, 244);
			padding: 3px 0;
		}

		s

		div.padre {
			position: relative;

		}

		.tot {
			height: 150px;
		}

		.Tob2 {
			height: 90px;
		}

		div.iz {
			float: left;
			/* background-color: red; */
			width: 50%;
			margin-left: 5px;
		}

		div.de {
			float: right;
			width: 46%;
			/* background-color: blueviolet; */
		}

		div.estado {
			margin-top: 10px;
			margin-bottom: 20px;
			width: 100%;
			text-align: center;
			font-weight: 700;
			background-color: rgb(6, 195, 147);
			color: rgb(255, 255, 255);
			border-radius: 1rem;
		}

		div.info {
			margin-left: 8px;
			margin-top: 3px;
		}



		/* Tabla */

		table.Table {
			border: 5px solid rgb(238, 242, 243);
			width: 100%;
			text-align: left;
			
		}

		thead.thead {
			background-color: rgb(238, 242, 243);

		}

		tr {
			border-bottom: 2px solid rgb(206, 228, 233);
		}

		.Titel {
			margin: 10px 0;
			text-align: center;
		}

		.producto {
			margin-left: 10px;
		}

		.center {
			text-align: center;
		}

		.padinL {
			padding-left: 10px;
		}
	</style>
</head>
<?php 
	$productos = json_decode($data['ventas']['productos']);
	$SupTotal= 0;
	$Descuento = 0;
	$Total = 0;
	
	
?>
<body>
	<div class="main">
		<section>
			<div class="estado">
				<?php 
					if ($data['ventas']['tipo_pago'] == 'Credito') {
						?> 
						<h2>A Credito</h2>
						<?php
						
					} else {
						?> 
							<h2>Pagado</h2>
						<?php
						
					}
				?>
				
			</div>
		</section>

		<section>
			<div class="padre Tob2">
				<div class="iz ">
					<h2>Larense<span>Supermarket</span></h2>					
				</div>
				<div class="de">
					<div>
						<h3>Comprobante de pago # <span> <?php echo $data['ventas']['id_venta'] ?> </span> </h3>
						<p>fecha emisión <span> <?php echo $data['ventas']['fecha'] ?> </span></p>
						<!-- <p>Fecha vencimiento <span>28/05/2021 10:20:51</span></p> -->
					</div>
				</div>
			</div>

		</section>


		<section>
			<div class="padre borde tot">

				<div class="iz bordeL M">
					<p><span>De</span></p>
					<div class="info">
						<p>Larense Supermarket C.A</p>
						<p>RIF: J-40537521-3</p>
						<p>Av Florencio Jiménez, kilómetro 10 vías a Quibor</p>
						<p>Barquisimeto, Lara, 3001</p>
						<p>Teléfono 02519855490</p>
					</div>

				</div>

				<div class="de M">
					<p><span>Para</span></p>
					<div class="info">
						<p><?php echo $data['ventas']['Nc'] . " ". $data['ventas']['Ac'] ?></p>
						<p><?php echo $data['ventas']['Cc'] ?></p>
						<p><?php echo $data['ventas']['Dc'] ?></p>
						<p><?php echo $data['ventas']['Tc'] ?></p>
					</div>

				</div>
			</div>

		</section>


		<div class="lista M borde">
			<table class="Table">
				<thead class="thead">
					<tr class="Titel">
						<th>Nombre</th>
						<th>Cantidad</th>
						<th>Precio</th>
						<th>SubTotal</th>
					</tr>
				</thead>
				<tbody>
					<?php 
						foreach ($productos as $key => $value) {
						?> 
							<tr class="producto ">
								<th class="padinL borde"><?php echo $value->nombre ?></th>
								<th class="center borde"><?php echo $value->can	." " .  $retVal = ($value->Tipo_unidad== "Cantidad") ? "" : $value->Tipo_unidad ; ?></th>
								<th class="center borde"><?php echo $value->precio ?></th>
								<th class="center borde"><?php echo $value->Total ?></th>
							</tr>
						<?php
							$SupTotal += $value->Total;			
						}
					?>

				</tbody>
				
				
				<tfoot class="center">
					<tr>
						<td></td>
						<td></td>
						<td class="borde" ><span>SUBTOTAL :</span></td>
						<td class="borde" ><span>$ <?php echo $SupTotal ?></span></td>
					</tr>
				</tfoot>
				<tfoot class="center">
					<tr>
					<td></td>
						<td></td>
						<td class="borde" ><span> DESCUENTO :</span></td>
						<td class="borde" ><span>$ <?php echo $Descuento ?></span></td>
					</tr>
				</tfoot>
				<tfoot class="center">
					<tr>
						<td></td>
						<td></td>
						<td class="borde"><span>TOTAL :</span></td>
						<td class="borde"><span>$ <?php echo ($SupTotal - $Descuento) ?></span></td>
					</tr>
				</tfoot>
			</table>
		</div>

		<div>
			<h2>Transacciones</h2>
			<table class="Table">
				<thead class="thead">
					<tr class="Titel">
						<th>Forma pago</th>
						<th>descripción</th>						
						<th>Total</th>
					</tr>
				</thead>
				<tbody>
					<tr>
						<th class="center">
							<span>
								<?php echo $data['ventas']['tipo_pago'] ?>
							</span>
						</th>
						<th><?php echo $data['ventas']['descripcion'] ?></th>
						<th class="center"><span>$ <?php echo ($SupTotal - $Descuento) ?></span></th>
					</tr>
				</tbody>
			</table>
		</div>
	</div>
</body>

</html>

<!-- 
<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Document</title>
	<style>
		* {
			margin: 0;
			padding: 0;
		}

		h2 {
			padding: 4px 0;
			font-size: 18px;
			text-align: center;
		}

		div.main {
			max-width: 640px;
			margin: auto;
		}

		p {
			font-size: 16px;
		}

		.M {
			margin-top: 8px;
		}

		span {
			font-weight: 700;
		}

		.borde {
			border-top: 3px solid rgb(232, 241, 244);
			padding: 3px 0;
		}

		s

		div.padre {
			position: relative;

		}

		.tot {
			height: 150px;
		}

		.Tob2 {
			height: 90px;
		}

		div.iz {
			float: left;
			/* background-color: red; */
			width: 50%;
			margin-left: 5px;
		}

		div.de {
			float: right;
			width: 46%;
			/* background-color: blueviolet; */
		}

		div.estado {
			margin-top: 10px;
			margin-bottom: 20px;
			width: 100%;
			text-align: center;
			font-weight: 700;
			background-color: rgb(6, 195, 147);
			color: rgb(255, 255, 255);
			border-radius: 1rem;
		}

		div.info {
			margin-left: 8px;
			margin-top: 3px;
		}



		/* Tabla */

		table.Table {
			border: 5px solid rgb(238, 242, 243);
			width: 100%;
			text-align: left;
			
		}

		thead.thead {
			background-color: rgb(238, 242, 243);

		}

		tr {
			border-bottom: 2px solid rgb(206, 228, 233);
		}

		.Titel {
			margin: 10px 0;
			text-align: center;
		}

		.producto {
			margin-left: 10px;
		}

		.center {
			text-align: center;
		}

		.padinL {
			padding-left: 10px;
		}
	</style>
</head>

<body>
	<div class="main">
		<section>
			<div class="estado">
				<h2>Pagado</h2>
			</div>
		</section>

		<section>
			<div class="padre Tob2">
				<div class="iz ">
					<h1>holas</h1>
				</div>
				<div class="de">
					<div>
						<h3>Comprobante de pago # <span> 2 </span> </h3>
						<p>fecha emisión <span> 26/05/2021 10:20:51 </span></p>
						<p>Fecha vencimiento <span>28/05/2021 10:20:51</span></p>
					</div>
				</div>
			</div>

		</section>


		<section>
			<div class="padre borde tot">

				<div class="iz bordeL M">
					<p><span>De</span></p>
					<div class="info">
						<p>BOOM SOLUTIONS C.A</p>
						<p>RIF: J-40537521-3</p>
						<p>Av Lara, C.C Churun Meru,Nivel Sótano Local S-1</p>
						<p>Barquisimeto, Lara, 003001</p>
						<p>Teléfono 0251-3350930</p>
					</div>

				</div>

				<div class="de M">
					<p><span>Para</span></p>
					<div class="info">
						<p>JAIME ARTURO GARCIA</p>
						<p>9611145</p>
						<p>Urb. La Orquidea Calle 6 Casa S/N</p>
						<p>Teléfono 4245366490</p>
					</div>

				</div>
			</div>

		</section>


		<div class="lista M borde">
			<table class="Table">
				<thead class="thead">
					<tr class="Titel">
						<th>Nombre</th>
						<th>Cantidad</th>
						<th>Precio</th>
						<th>SubTotal</th>
					</tr>
				</thead>
				<tbody>
					<tr class="producto ">
						<th class="padinL borde">Internet 50Mb</th>
						<th class="center borde">1</th>
						<th class="center borde">$ 59.99</th>
						<th class="center borde">$ 59.99</th>
					</tr>
				</tbody>
				<tfoot class="center">
					<tr>
						<td></td>
						<td></td>
						<td class="borde" ><span>SUBTOTAL :</span></td>
						<td class="borde" >$180</td>
					</tr>
				</tfoot>
				<tfoot class="center">
					<tr>
					<td></td>
						<td></td>
						<td class="borde" ><span> DESCUENTO :</span></td>
						<td class="borde" >$180</td>
					</tr>
				</tfoot>
				<tfoot class="center">
					<tr>
						<td></td>
						<td></td>
						<td class="borde"><span>TOTAL :</span></td>
						<td class="borde">$180</td>
					</tr>
				</tfoot>
			</table>
		</div>

		<div>
			<h2>Transacciones</h2>
			<table class="Table">
				<thead class="thead">
					<tr class="Titel">
						<th>Forma pago</th>
						<th>descripción</th>						
						<th>Total</th>
					</tr>
				</thead>
				<tbody>
					<tr>
						<th class="center">Credito</th>
						<th></th>
						<th class="center">$80</th>
					</tr>
				</tbody>
			</table>
		</div>
	</div>
</body>

</html>

 -->