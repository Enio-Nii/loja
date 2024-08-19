<?php
include "banco.php";

if (isset($_SESSION['carrinho']))
	$carrinho = explode("|", $_SESSION['carrinho']);
else
	$carrinho = [];
?>

<html>
	<head>
		<title>Carrinho</title>
		<link rel="shortcut icon" href="images/brasil.ico" />
		<link rel="stylesheet" type="text/css" href="css/layout.css?2"/>
		<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
	</head>
	
	
	<body>
		<div id="topo">
		<div id="logo"><img src="images/logo.png" /></div>
		<div id="titulo"><img src="images/titulo.png" /></div>
		</div>
		
		<div id="separador">
			<a href="index.php">HOME</a>
			<a href="index.php#container">PRODUTOS</a>
		</div>

		<div id="loja">
			<h1 style="text-align: left">
				<?php 
				if (isset($_SESSION['carrinho']))
				echo "Carrinho de compras:";
				else
				echo "Carrinho Vazio!";
				?>	
			</h1>
			<h1 style="text-align: right"><a style=" color:#134395; text-decoration: none; font-size: 20px;"	 
			href="encerrar.php"><i class="fas fa-trash"></i> Limpar carrinho</a></h1>
		</div>
		
		<div id="container" style="font-family:Verdana">
		<div id=separador2></div>
		<?php
		$total = 0;
		for($i = 0; $i < sizeof($carrinho); $i++)
		{	
			$dados = explode("-", $carrinho[$i]);
				echo "<table width=100%>";
				echo "<tr><td>"; echo "<img src="; echo $produtos[$dados[0]]["ico"]; echo "	width=120px height=120px />";
				echo "<td>"; echo $produtos[$dados[0]]["nome"]; echo "</td>";
				echo "<td> | </td>";
				echo "<td> Valor Un.: </td>";
				echo "<td> R$"; echo number_format($produtos[$dados[0]]['valor'], 2, ",", "."); echo "</td>";
				echo "<td> | </td>";
				echo "<td> Qtd. </td>";
				echo "<td>"; echo $dados[1]; "</td></tr>";
				echo "<td> | </td>";
				echo "<td><b> Total comprado:</b></td>"; echo "<td><b>R$ "; echo number_format($produtos[$dados[0]]["valor"]*$dados[1], 2, ",", "."); echo "</b></td>";
				echo "</table>";
				if ($i < sizeof($carrinho)-1) {
					echo "<div id=separador2></div>";
				}
				$total += ($produtos[$dados[0]]["valor"]*$dados[1]);
		} ?>
		<div id=separador2></div>
		</div>

		<div id="loja">
			<a href="index.php#container" style="float: left"><button type="button" style="background:#fcc24f; color:#134395">Continuar comprando</button></a>
			<h1 style="text-align: right">
				<a style = "font-size:20px">Subtotal:</a> <a style = "color:blue">R$ <?php echo number_format($total, 2, ",", "."); 
			?></a></h1>

			<a href="compra.php" style="float: right"><button type="button">Finalizar compra</button></a>
		</div>

	</div>
		
		<div id="fim">
			<a href="index.php">HOME</a>
			<p>©2019</p>
			<p>Fabio Nascimento | Guilherme Alvarez | Samuel</p>
			
		</div>
		
	</body>
</html>