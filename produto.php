<?php
$codigo = $_GET['id'];

include "banco.php";

$produto = $produtos[$codigo];

if($_POST) {
	$qtde = (int)$_POST['qtde'];

	if($qtde < 1)
		$status = "<h1 style='color:#393939; font-size:18px'>Quantidade inválida!</h1>";
	else {
		$status = "<h1 style='display:inline-block; color:#393939; font-size:18px'>Adicionado com sucesso! </h1>"."<a href=index.php#container><button type='button' style='background:#fcc24f; color:#134395; font-size:14px; margin-left:12px; padding: 10px;'>Continuar comprando</button></a>";

		if (isset($_SESSION['carrinho']))
		{
			$string ="|".$codigo."-".$qtde;
			$_SESSION['carrinho'] = $_SESSION['carrinho'].$string;
		} else {
			$string =$codigo."-".$qtde;
			$_SESSION['carrinho'] = $string;
		}
	}
}
?>
<html>
	<head>
		<title><?=$produto['nome'];?></title>
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
			<h1 style="text-align: left"><?=$produto['nome'];?></h1>
			<span>Código ref.: <?=$codigo?></span>
		</div>

		<!--<?php if (isset($_SESSION['carrinho'])) echo $_SESSION['carrinho'];?>-->
		<div id="container" style="text-align: left;overflow: auto">
			<img class="img-produto" src="<?=$produto['img'];?>" width="350px" heigth="350px">
			<div id="desc">
				<p><?=$produto['desc'];?></p>
				<h2 vstyle="text-align: left">R$<?=number_format($produto['valor'], 2, ",", ".");?></h2>
				<?php
				if(isset($status)){
					echo "<h2>".$status."</h2>";
				}
				?>
				<form method="post">
					<input type="number" name="qtde" value="0" style="margin-top:22px">
					<button type="submit" style="margin-top:22px; margin-left:24px">Adicionar</button>
				</form>
			</div>
		</div>

		
		<div id="fim">
			<a href="index.php">HOME</a>
			<p>©2019</p>
			<p>Fabio Nascimento | Guilherme Alvarez | Samuel</p>
			
		</div>
		
	</body>
</html>