<?php
include "banco.php";

if (isset($_SESSION['carrinho']))
$carrinho = explode("|", $_SESSION['carrinho']);
else
	$carrinho = [];

?>

<html>
	<head>
		<title>Finalizar compra</title>
		<link rel="shortcut icon" href="images/brasil.ico" />
		<link rel="stylesheet" type="text/css" href="css/layout.css?2"/>
		<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
		<?php include "banco.php" ?>
	</head>
	
	
	<body>
		<div id="topo">
		<div id="logo"><img src="images/logo.png" /></div>
		<div id="titulo"><img src="images/titulo.png" /></div>
		</div>
		
		<div id="separador">
			<a href="index.php">HOME</a>
			<a href="index.php#container">PRODUTOS</a>
			<a href="carrinho.php"><i class="fas fa-shopping-cart" color="white"></i> CARRINHO
				<?php 
				if (isset($_SESSION['carrinho'])){
				$carrinho = explode("|", $_SESSION['carrinho']);
				}else{
					$carrinho = [];
				}
				if (isset($_SESSION['carrinho']))
					echo "<a href='carrinho.php' style='background:#134395; border-radius:30% ; padding: 2px 3px; font-style:bold; font-size:12px; color:#fcc24f; margin-left:4px; transition: all .3s ease-out;'>+".sizeof($carrinho)."</a>";
				?>
			</a>
		</div>

		<div id="loja">
			<h1 style="text-align: left">
				<?php 
				if (isset($_SESSION['carrinho']))
				echo "Finalizar compra:";
				else
				echo "Carrinho Vazio!";
				?></h1>
		</div>

		<div id="container" style="font-family:Verdana">

		<div id=separador2></div>	
		<?php

		$total = 0;
		for($i = 0; $i < sizeof($carrinho); $i++)
		{	
			$dados = explode("-", $carrinho[$i]);
				echo "<table style=width:100%>";
				echo "<tr><td width=350px>"; echo $produtos[$dados[0]]["nome"]; echo "</td>";
				echo "<td width=150px> Qtd.: "; echo $dados[1]; echo "</td>";
				echo "<td width=250px> Valor Un.: R$ ".number_format($produtos[$dados[0]]["valor"], 2, ",", "."); echo"</td>";
				echo "<td>Valor: <b>"; echo "R$ ".number_format($produtos[$dados[0]]["valor"]*$dados[1], 2, ",", "."); echo "</b></td>";
				echo "</table>";
				$total +=($produtos[$dados[0]]["valor"]*$dados[1]);
		} 

		if ($_POST) {
			$tempTotal = $total;

			$forma_pgto = $_POST["forma_pgto"];
			$parcelas = (int)$_POST["parcelas"];

			if (isset($_POST["frete"])) {
				$tempTotal += 60;
			}

			if ($forma_pgto == "d") {
				$tempTotal -= $tempTotal*0.1;
			} else {
				if ($parcelas == 1) {
					$tempTotal -= $tempTotal*0.1;
				} else {
					$valorParc = $tempTotal/$parcelas;
				}
			}
			$cupom_total = 0;
			$cupom = "CONTRUARTE - Materias de construção\n\n";
			$cupom .= "Cliente: ".$_POST["nome"]."\n"."Jundiaí, ".strftime('%d de %B de %Y', time())." - Horário: ".date("H:i")."h\n\n"."CUPOM FISCAL\n";
			$cupom .= "------------------------------------------------------------------------------\n";
			
			for ($j = 0; $j < sizeof($carrinho); $j++) { 
				$dados_cupom = explode("-", $carrinho[$j]);
				$cupom .= $produtos[$dados_cupom[0]]["nome"]." | Qtd.: ".$dados_cupom[1]." | Valor Un.: R$".number_format($produtos[$dados_cupom[0]]["valor"], 2, ",", ".")." | Valor: R$ ".number_format($produtos[$dados_cupom[0]]["valor"]*$dados_cupom[1], 2, ",", ".");
				$cupom_total +=($produtos[$dados[0]]["valor"]*$dados_cupom[1]);
				if ($j < sizeof($carrinho)-1) {
					$cupom .= "\n\n";
				} else {
					$cupom .= "\n";
				}
			}
			$cupom .= "------------------------------------------------------------------------------\n\n";
			$cupom .= "Total: R$ ".number_format($tempTotal, 2, ",", ".");
			if ($_POST["parcelas"] > 1) {
				$cupom .= " - (Em ".$_POST["parcelas"]." parcelas de: R$ ".number_format($valorParc, 2, ",", ".").")\n\n";
			} else {
				$cupom .= " - (À vista com 10% de desconto.)"."\nDesconto: R$ ".number_format($tempTotal*.1, 2, ",", ".")."\n\n";
			}
			$cupom .= "Este cupom tem validade de 5 dias. \n (Válido até: ".date("d/m/Y",strtotime('+5 days')).")";
			$orcamento = fopen("cupom_".date("d_m_Y_H_i_s").".txt", "w");
			fwrite($orcamento, $cupom);
			fclose($orcamento);

		}
		?>
		<div id=separador2></div>
		
		<div id="container" style="font-family:Verdana">
			<h1 style="text-align: right">
			<a style = "font-size:20px; color: #393939">Subtotal: </a><a style="color:#393939; font-size:20px">R$ <?php echo number_format($total, 2, ",", "."); ?></a>
			</h1>
		</div>
	<div style="overflow:auto">
		<div style="float:left">
			<h4>Forma de pagamento: </h4>
		<form method="post">
			<input type="radio" name="forma_pgto" value="c" onclick="cartao(true)" required>
			Cartão <br>
			<input type="radio" name="forma_pgto" value="d" onclick="cartao(false)" required>
			Dinheiro 
		</div>

		<div id="forma-cartao" style="display:none; float:left; margin-left:60px">
			<h4>Parcelamento: </h4>
			<select name="parcelas" id="parcelas" onchange="calcTotal()">
				<option value="1">À vista</option>
				<option value="2">2X</option>
				<option value="3">3X</option>
				<option value="4">4X</option>
				<option value="5">5X</option>
				<option value="6">6X</option>
			</select>
		</div>
	</div>
		<hr>
		<input type="checkbox" id="frete" name="frete" value="1" onclick="calcTotal()"> Incluir frete (+ R$ 60,00)

		<div style="font-family:Verdana; text-align: right">
			<h2 style="color:#393939; font-size:20px">Total: <span id="total" style="color:blue; font-size:34px">R$ -</span></h2>
			<span id="info"></span>
		</div>
			Nome:<br>
			<input type="text" name="nome" placeholder="Insira seu nome para gerar o cupom fiscal." required>
		<button type="submit" style="margin-left:10px"> Finalizar compra</button>

		</form>

		<script type="text/javascript"> 
			<?php if($_POST) { echo "alert('Compra finalizada com sucesso!')"; }?> 
			var subtotal = <?=$total;?>;
		</script>
		<script type="text/javascript" src="js/calctotal.js"></script>


	</div>
		
		<div id="fim">
			<a href="index.php">HOME</a>
			<p>©2019</p>
			<p>Fabio Nascimento | Guilherme Alvarez | Samuel</p>
			
		</div>
		
	</body>
</html>
