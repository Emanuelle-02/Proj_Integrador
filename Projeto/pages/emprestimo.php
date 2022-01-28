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
			<li><a href="">Meus empréstimos</a></li>
			<li class="sair"><a href="../index.php">Logout</a></li>
		</ul>
	</nav>
	<main>
		<h2>Empréstimos:</h2>
		<div class="img-item">
			<h3>Título: Não conte a ningúem</h3>
			<p>Autor: Harlan Coben.</p>
			<button class="aprov">Status: Aprovado.</button>
			<p>Gênero: Thriller, Suspense.</p>	
			<button class="renovacao" onclick="funcao2()" value="Exibir Alert">Solicitar renovação</button>
			<p>Data de empréstimo: 21-01-2022.</p>
			<p>Data de devolução: 28-01-2022.</p>
		</div>
		<div class="img-item">
			<h3>Título: O guia do mochileiro das galáxias</h3>
			<p>Autor: Douglas Adams.</p>
			<button class="status">Status: Aguardando aprovação.</button>
			<p>Gênero: Ficção.</p>
		</div>
		<a class="caps" href="inicio.php">Página inicial</button></a>
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
	<script src="../js/alertDev.js"></script>
</body>
</html>