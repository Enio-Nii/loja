<?php
setlocale(LC_TIME, 'pt_BR', 'pt_BR.utf-8', 'pt_BR.utf-8', 'portuguese');
date_default_timezone_set("America/Sao_Paulo");

if(!isset($_SESSION)) 
    { 
        session_start(); 
    } 
 

$produtos = [
			"001" => ["nome" => "Bloco Cerâmico 14x19x29cm", "valor" => 1.29, "ico" => "images/tijolo01_ico.webp", "img" => "images/tijolo01.webp", "desc" => "Bloco Cerâmico 14x19x29cm Nova Conquista. Características Técnicas: 1,5 MPA"],

			"002" => ["nome" => "Bloco Cerâmico 09x19x19cm", "valor" => 0.56, "ico" => "images/tijolo02_ico.webp", "img" => "images/tijolo02.webp", "desc" => "Bloco Cerâmico 14x19x29cm Nova Conquista. Características Técnicas: 1,5 MPA"],

			"003" => ["nome" => "Bloco De Cimento 09x19x39cm", "valor" => 1.59, "ico" => "images/tijolo03_ico.webp", "img" => "images/tijolo03.webp", "desc" => "Bloco De Cimento 09x19x39cm Vedação Com Fundo Ramos. Material: Concreto."],

			"004" => ["nome" => "Bloco 09X19X39cm", "valor" => 2.19, "ico" => "images/tijolo04_ico.webp", "img" => "images/tijolo04.webp", "desc" => "Bloco 09X19X39cm Vedação Aparente Com Fundo Ramos. Material: Concreto."],

			"005" => ["nome" => "Bloco rústico 19x19x39cm", "valor" => 2.19, "ico" => "images/tijolo05_ico.webp", "img" => "images/tijolo05.webp", "desc" => "Bloco De Cimento 19x19x39cm Vedação Rústico Com Fundo Ramos. Material: Concreto."],

			"006" => ["nome" => "Vergalhão 16mm 12 Metros Reto", "valor" => 109.90, "ico" => "images/aco01_ico.webp", "img" => "images/aco01.webp", "desc" => "Aço CA50."],

			"007" => ["nome" => "Estribo nervurado 12X27cm", "valor" => 0.99, "ico" => "images/aco02_ico.webp", "img" => "images/aco02.webp", "desc" => "Aço CA60."],

			"008" => ["nome" => "Malha Reforçada 15x15cm 2x3m", "valor" => 0.99, "ico" => "images/aco03_ico.webp", "img" => "images/aco03.webp", "desc" => "Indicada para lajes e pisos, a Malha Pop Gerdau já vem pronta para uso. É produzida com aço CA-60 Nervurado Gerdau e soldada em todos os pontos de cruzamento, garantindo maior segurança e evitando trincas, fissuras e embarrigamentos."],

			"009" => ["nome" => "Cimento 25kgs Votoran", "valor" => 11.90, "ico" => "images/cimento01_ico.webp", "img" => "images/cimento01.webp", "desc" => "Cimento para uso geral, com secagem rápida e alta resistência. Cimento produzido de acordo com a Norma técnica brasileira. Muito versátil, pode ser utilizado da fundação ao acabamento na obra. Ideal para: reboco, concreto convencional, contrapiso e lajes."],

			"010" => ["nome" => "Cimento 25kg Nacional", "valor" => 10.90, "ico" => "images/cimento02_ico.webp", "img" => "images/cimento02.webp", "desc" => "Cimento nacional CP II 32 proporciona um reboco com menor risco de fissuração e com a secagem mais rápida da sua categoria, ele é ideal para ambientes quimicamente agressivos. Cimento de alta resistências, conta com uma secagem rápida para uma menor tempo de mão de obra e um alto desempenho."],

			"011" => ["nome" => "Cimento 50kgs Votoran", "valor" => 20.40, "ico" => "images/cimento03_ico.webp", "img" => "images/cimento03.webp", "desc" => "Cimento para uso geral, com secagem rápida e alta resistência. Cimento produzido de acordo com a Norma técnica brasileira. Muito versátil, pode ser utilizado da fundação ao acabamento na obra. Ideal para: reboco, concreto convencional, contrapiso e lajes."],

			"012" => ["nome" => "Cimento 50kgs Nacional", "valor" => 18.90, "ico" => "images/cimento04_ico.webp", "img" => "images/cimento04.webp", "desc" => "Com o CP II-32 da Cimento Nacional, desenvolvido com baixo teor de adição de pozolana, garante ao produto resistências iniciais superiores, coloração escura e pega rápida. Rapidez na execução, redução de custos e mais produtividade."],

			"013" => ["nome" => "Areia Fina 20Kg AB Areias", "valor" => 3.19, "ico" => "images/areia01_ico.webp", "img" => "images/areia01.webp", "desc" => "O saco de areia fina 20 kg AB Areias é utilizado para produzir argamassas para revestimento. Com granulometria fina, esse produto resulta em acabamento fino-liso (menos áspero). Benefícios: Facilidade de armazenamento. Sem sujeira e sem preocupação com espaço. Muito mais economia e o fim do desperdício. O cliente leva apenas a quantidade que precisa."],

			"014" => ["nome" => "Areia Media 20Kg AB Areias", "valor" => 3.19, "ico" => "images/areia02_ico.webp", "img" => "images/areia02.webp", "desc" => "Material utilizado em obras da construção civil para produção de argamassas de assentamento e revestimento de paredes. Garantia indeterminada."],

			"015" => ["nome" => "Pedra Ensacada 20Kg AB Areias", "valor" => 3.39, "ico" => "images/pedra01_ico.webp", "img" => "images/pedra01.webp", "desc" => "Material utilizado em obras da construção civil para produção de concretos e para drenagem. Garantia indeterminada."],

			"016" => ["nome" => "Pedrisco Ensacado 20Kg AB", "valor" => 3.19, "ico" => "images/pedra02_ico.webp", "img" => "images/pedra02.webp", "desc" => "Facilidade de armazenamento. Sem sujeira e sem preocupação com espaço. Muito mais economia e o fim do desperdício. O cliente leva apenas a quantidade que precisa."],

			"017" => ["nome" => "Selador Vedacit 18 Litros", "valor" => 62.60, "ico" => "images/vedacit01_ico.webp", "img" => "images/vedacit01.webp", "desc" => "Desenvolvidas com a tecnologia CRFS (Cimento Reforçado com Fios Sintéticos). São utilizadas em obras residenciais, comerciais, etc. Fácil de instalar, maior durabilidade e rendimento por M². Material mais flexível e apresenta um melhor custo x benefício."],

			"018" => ["nome" => "Telha Brasilit 244x110cm", "valor" => 49.90, "ico" => "images/telha01_ico.webp", "img" => "images/telha01.webp", "desc" => "Desenvolvidas com a tecnologia CRFS (Cimento Reforçado com Fios Sintéticos). São utilizadas em obras residenciais, comerciais, etc. Fácil de instalar, maior durabilidade e rendimento por M². Material mais flexível e apresenta um melhor custo x benefício."],

			"019" => ["nome" => "Telha Brasilit 244x50,6cm", "valor" => 13.41, "ico" => "images/telha02_ico.webp", "img" => "images/telha02.webp", "desc" => "A Telha Fibrotex é uma opção prática e economica para a utilização em canteiros de obras e outros tipos de coberturas provisórios. Fácil de instalar é a escolha ideal para construçoes econômicas."],

			"020" => ["nome" => "Telha de Cerâmica 40,6x24,2cm", "valor" => 1.09, "ico" => "images/telha03_ico.webp", "img" => "images/telha03.webp", "desc" => "Fácil de instalar, maior durabilidade e rendimento."],

			"021" => ["nome" => "Escada de alumínio 5 degr.", "valor" => 120.16, "ico" => "images/escada01_ico.webp", "img" => "images/escada01.webp", "desc" => "A escada de alumínio Botafogo 5 degraus é leve e resistente, indicada para o uso exclusivo doméstico. Com ela, você consegue alcançar prateleiras, armários e outros locais mais altos em sua casa .Material 100 por cento reciclável, o que mostra o comp."],

			"022" => ["nome" => "Parafuso para telha", "valor" => 23.90, "ico" => "images/parafuso01_ico.webp", "img" => "images/parafuso01.webp", "desc" => "Parafuso Para Telha 5/16 X 230mm Com 10 Unidades Urgenfix."],

			"023" => ["nome" => "Tela de impermeabilização", "valor" => 104.40, "ico" => "images/tela01_ico.webp", "img" => "images/tela01.webp", "desc" => "Tela constituída de fios 100 poliéster. Colocar o Vedatex entre a primeira e a segunda camada da impermeabilização e cobrir posteriormente com as camadas subsequentes, de modo que a tela não fique aparente. Em lajes transpassar 10 cm entre as emendas. Em trincas e fissuras colocar a tela ultrapassando pelo menos 5 cm para cadalado."],

			"024" => ["nome" => "Cola para madeira Cascola", "valor" => 6.50, "ico" => "images/cola01_ico.webp", "img" => "images/cola01.webp", "desc" => "Adesivo vinílico, indicado para colagens de madeira, laminados plásticos, aglomerado, MDF e HDF e reparos de madeira em geral. Uso profissional e doméstico."],

			"025" => ["nome" => "Cola para azulejo Pulvitec", "valor" => 13.50, "ico" => "images/cola02_ico.webp", "img" => "images/cola02.webp", "desc" => "Produto já vem pronto para uso, proporciona alta resistência, economia e rapidez."],

			"026" => ["nome" => "Gesso ensacado 20kg Argos", "valor" => 20.50, "ico" => "images/gesso01_ico.webp", "img" => "images/gesso01.webp", "desc" => "Revestimento para paredes de alvenaria, blocos cerâmicos ou de concreto. Também para lajes e pilares, proporcionando um belo acabamento. Indicado para pequenos projetos artesanais (placas, molduras, estatuetas, etc.) e pequenos reparos gerais."],

			"027" => ["nome" => "Manta Asfaltica Vedamax", "valor" => 231.50, "ico" => "images/manta01_ico.webp", "img" => "images/manta01.webp", "desc" => "Proteção contra umidade com alta resistência. Material de qualidade, proporcionando maior durabilidade."],

			"028" => ["nome" => "Adesivo plastico 700g MAZA", "valor" => 14.50, "ico" => "images/adesivo01_ico.webp", "img" => "images/adesivo01.webp", "desc" => "Indicado para diluição de tintas e vernizes à base de resina alquídica e limpeza dos acessórios de pintura. É um produto puro sem misturas, ideal para a diluição de esmaltes sintéticos e alguns tipos de vernizes."],
			



			


			];
?>