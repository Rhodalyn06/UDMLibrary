<html>
<head>
	<title>Barcode</title>
	<style type="text/css">
		td{
			padding: 20px;
			text-align: center;
		}
	</style>
</head>
<body>
	<center><h1><?php 
	session_start();
	echo $_SESSION['book']; ?></h1></center>
	<table>
		<tr>
			<td><canvas id="barcode1"></canvas></td>
			<td><canvas id="barcode2"></canvas></td>
			<td><canvas id="barcode3"></canvas></td>
		</tr>
		<tr>
			<td><canvas id="barcode4"></canvas></td>
			<td><canvas id="barcode5"></canvas></td>
			<td><canvas id="barcode6"></canvas></td>
		</tr>
		<tr>
			<td><canvas id="barcode7"></canvas></td>
			<td><canvas id="barcode8"></canvas></td>
			<td><canvas id="barcode9"></canvas></td>
		</tr>
		<tr>
			<td><canvas id="barcode10"></canvas></td>
			<td><canvas id="barcode11"></canvas></td>
			<td><canvas id="barcode12"></canvas></td>
		</tr>
		<tr>
			<td><canvas id="barcode13"></canvas></td>
			<td><canvas id="barcode14"></canvas></td>
			<td><canvas id="barcode15"></canvas></td>
		</tr>
		<tr>
			<td><canvas id="barcode16"></canvas></td>
			<td><canvas id="barcode17"></canvas></td>
			<td><canvas id="barcode18"></canvas></td>
		</tr>
		<tr>
			<td><canvas id="barcode19"></canvas></td>
			<td><canvas id="barcode20"></canvas></td>
			<td><canvas id="barcode21"></canvas></td>
		</tr>
		<tr>
			<td><canvas id="barcode22"></canvas></td>
			<td><canvas id="barcode23"></canvas></td>
			<td><canvas id="barcode24"></canvas></td>
		</tr>
		<tr>
			<td><canvas id="barcode25"></canvas></td>
			<td><canvas id="barcode26"></canvas></td>
			<td><canvas id="barcode27"></canvas></td>
		</tr>
		<tr>
			<td><canvas id="barcode28"></canvas></td>
			<td><canvas id="barcode29"></canvas></td>
			<td><canvas id="barcode30"></canvas></td>
		</tr>
		<tr>
			<td><canvas id="barcode31"></canvas></td>
			<td><canvas id="barcode32"></canvas></td>
			<td><canvas id="barcode33"></canvas></td>
		</tr>
		<tr>
			<td><canvas id="barcode34"></canvas></td>
			<td><canvas id="barcode35"></canvas></td>
			<td><canvas id="barcode36"></canvas></td>
		</tr>
		<tr>
			<td><canvas id="barcode37"></canvas></td>
			<td><canvas id="barcode38"></canvas></td>
			<td><canvas id="barcode39"></canvas></td>
		</tr>
		<tr>
			<td><canvas id="barcode40"></canvas></td>
			<td><canvas id="barcode41"></canvas></td>
			<td><canvas id="barcode42"></canvas></td>
		</tr>
		<tr>
			<td><canvas id="barcode43"></canvas></td>
			<td><canvas id="barcode44"></canvas></td>
			<td><canvas id="barcode45"></canvas></td>
		</tr>
	<table>

	<!-- jQuery Version 2.1.3 -->
    <script src="../../assets/js/jquery-2.1.3.min.js"></script>
    <script src="../../assets/js/JsBarcode.js"></script>
	<script src="../../assets/js/Code128.js"></script>
	<script type="text/javascript">


			<?php

				$arrBarcode = explode(',', rtrim($_GET['barcodes'], ','));

				for ($x = 1; $x <= count($arrBarcode); $x++){
					echo '$("#barcode'.$x.'").JsBarcode("'.$arrBarcode[$x-1].'", {width:1,height:100,displayValue:true});';
				}
			?>


	</script>
</body>
</html>