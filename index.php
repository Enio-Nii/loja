<html>
	<head>
		<title>Materiais de construção</title>
		<link rel="shortcut icon" href="images/brasil.ico" />
		<link rel="stylesheet" type="text/css" href="css/layout.css?1"/>
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
				include "banco.php"; 
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
		
		<div id="descricao">
		<p>Encontre somente aqui os melhores preços da região!!!</p>
		</div>
		
		<div id="loja">
			<h1 style="text-align: left">PRODUTOS:</h1>
		</div>
		
		<div id="container">

		<?php
		foreach($produtos as $index => $produto):
		?>
		<a href="produto.php?id=<?=$index?>" style = "text-decoration: none;">
			<div class="chamada">
				<img src="<?=$produto['ico'];?>"/>
				<h1><?=$produto['nome'];?></h1>
				<p>R$ <?=number_format($produto['valor'], 2, ",", ".");?></p>
			</div>
		</a>
		<?php endforeach; ?>
		</div>
		
		<div id="fim">
			<a href="index.php">HOME</a>
			<p>©2019</p>
			<p>Fabio Nascimento | Guilherme Alvarez | Samuel</p>
			
		</div>
		
	</body>
</html>