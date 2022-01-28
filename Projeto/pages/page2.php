<!DOCTYPE html>
<html>
<head>
	<title>IFRN-Lib.</title>
	<link rel="stylesheet" type="text/css"  href="../estiloUser/estilo.css" media="screen"/>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">	
    <meta charset="utf-8">
</head>
<body>
	<header>
		<h1>IFRN-Lib.</h1>
	</header>
	<nav>
		<ul>
			<li><a href="inicio.php">Início</a></li>
			<li><a href="emprestimo.php">Meus empréstimos</a></li>
			<li class="sair"><a href="../index.php">Logout</a></li>
		</ul>
	</nav>
	<main>
		<h2>Títulos disponíveis:</h2>
		<div class="img-item">
			<img src="../img/nsn.jpg" alt="E não sobrou nenhum cover">
			<h3>E não sobrou nenhum</h3>
			<p>Autor: Agatha Christie.</p>
			<button class="emprestimo" onclick="funcao1()" value="Exibir Alert">Solicitar empréstimo</button>
			<p>Gênero: Suspense, Mistério.</p>
			<button class="accordion">Ver detalhes</button>
			<div class="panel">
				<p>Descrição: Na ilha do Soldado, antiga propriedade de um milionário norte-americano, dez pessoas sem nenhuma ligação aparente são confrontadas por uma voz misteriosa com fatos marcantes de seus passados.</p>
				<p>Convidados pelo misterioso mr. Owen, nenhum dos presentes tem muita certeza de por que estão ali, a despeito de conjecturas pouco convincentes que os leva a crer que passariam um agradável período de descanso em mordomia. Entretanto, já na primeira noite, o mistério e o suspense se abatem sobre eles e, num instante, todos são suspeitos, todos são vítimas e todos são culpados.</p>
				<p>É neste clima de tensão e desconforto que as mortes inexplicáveis começam e, sem comunicação com o continente devido a uma forte tempestade, a estadia transforma-se em um pesadelo. Todos se perguntam: quem é o misterioso anfitrião, mr. Owen? Existe mais alguém na ilha? O assassino pode ser um dos convidados? Que mente ardilosa teria preparado um crime tão complexo? E, sobretudo, por quê?</p>
				<p>São essas e outras perguntas que o leitor será desafiado a resolver neste fabuloso romance de Agatha Christie, que envolve os espíritos mais perspicazes num complexo emaranhado de situações, lembranças e acusações na busca deste sagaz assassino. Medo, confinamento e angústia: que o leitor descubra por si mesmo porque E não sobrou nenhum foi eleito o melhor romance policial de todos os tempos.</p>
				<p>ISBN: 8525057010.</p>
				<p>Páginas: 400.</p>
				<p>Quantidade: 5.</p>
			</div>		
		</div>
		<div class="img-item">
			<img src="../img/lupin.jpg" alt="Arsène Lupin: O Ladrão de Casaca cover">
			<h3>Arsène Lupin: O Ladrão de Casaca</h3>
			<p>Autor: Maurice Leblanc.</p>
			<button class="emprestimo" onclick="funcao1()" value="Exibir Alert">Solicitar empréstimo</button>
			<p>Gênero: Mistério.</p>
			<button class="accordion">Ver detalhes</button>
			<div class="panel">
				<p>Descrição: Arsène Lupin, o ladrão de Casaca é uma coletânea de nove histórias do escritor francês Maurice Leblanc que constituem as primeiras aventuras de Arsène Lupin. O editor da revista francesa Je sais tout encomendou a Maurice uma novela policial, cujo herói fosse para França o que era para a Inglaterra o detetive Sherlock Holmes, de Sir Arthur Conan Doyle. Nasceu assim Arsène Lupin, personagem vivo, audacioso, impertinente, desafiando sem cessar o Inspetor Ganimard, arrastando corações atrás de si, zombando das posições conquistadas e ridicularizando os burgueses, socorrendo os fracos, Arsène Lupin é um Robin Hood da Belle Époque. Nessa edição especial em capa dura, o leitor encontrará a versão integral do texto, traduzido diretamente do francês.</p>
				<p>ISBN: 6555790687.</p>
				<p>Páginas: 320.</p>
				<p>Quantidade: 1.</p>
			</div>
		</div>
		<a class="caps" href="inicio.php">Página anterior</button></a>
		<p class="caps"> | </p>
		<a class="caps">Próxima página</button></a>
		<div style="clear:both;"></div>
	</main>
	<footer>
		<div>
			<div id="sobre">
				<h2 class="h2">Sobre:</h2>
				<p class="info">Projeto integrador - Sistema de gerenciamento para auxiliar na administração de uma biblioteca universitária.</p>
			</div>
			<div id="lib">
				<h2 class="h2">IFRN-Lib. 2022</h2>
				<p class="info">IFRN - Campus Pau dos Ferros.</p>
			</div>
		</div>
	</footer>
	<script src="../js/alertEmp.js"></script>
	<script>
		var acc = document.getElementsByClassName("accordion");
		var i;
		for (i = 0; i < acc.length; i++) {
		  acc[i].addEventListener("click", function() {
			this.classList.toggle("active");
			var panel = this.nextElementSibling;
			if (panel.style.display === "block") {
			  panel.style.display = "none";
			} else {
			  panel.style.display = "block";
			}
		  });
		}
		</script>
</body>
</html>