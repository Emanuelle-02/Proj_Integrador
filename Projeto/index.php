<?php
    require('bdconex.php');
?>

<!DOCTYPE html>
<html>
    <head>
	    <title>IFRN-Lib.</title>
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
		<meta name="keywords" content="Library Member Login Form Widget Responsive, Login Form Web Template, Flat Pricing Tables, Flat Drop-Downs, Sign-Up Web Templates, Flat Web Templates, Login Sign-up Responsive Web Template, Smartphone Compatible Web Template, Free Web Designs for Nokia, Samsung, LG, Sony Ericsson, Motorola Web Design" />
		<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script> 
        <!-- Estilo css -->
        <link rel="stylesheet" href="css/estilo.css" type="text/css" media="all">
	    <!-- Fontes -->
		<link href="//fonts.googleapis.com/css?family=Roboto:100,300,400,500,700,900" rel="stylesheet">
    </head>
    <body>
	    <h1>IFRN-Lib.</h1>
		<div class="container">
			<div class="login">
				<h2>Login</h2>
				<!--<formulário>-->
				<form action="index.php" method="post">
					<input type="text" Name="Matricula" placeholder="Matricula" required="">
					<input type="password" Name="Senha" placeholder="Senha" required="">
				    <div class="send-button">
					<input type="submit" name="signin"; value="Sign In">
				</form>
			</div>
			<div class="clear"></div>
		</div>
		
		<div class="clear"></div>
		</div>
		
		<div class="footer w3layouts agileits">
			<p> &copy; 2022 IFRN-Lib.</a></p>	
		</div>

	<?php
	if(isset($_POST['signin'])){
		$u=$_POST['Matricula'];
		$p=$_POST['Senha'];
		$c=$_POST['Categoria'];

		$sql="select * from PROJLIB.usuario where Matricula='$u'";

		$result = $conn->query($sql);
		$row = $result->fetch_assoc();
		$x=$row['Senha'];
		$y=$row['Tipo'];
		
		if(strcasecmp($x,$p)==0 && !empty($u) && !empty($p)){
			$_SESSION['Matricula']=$u;
		if($y=='Admin')
			header('location:admin/home.php');
		if($y=='Bibliotecario')
			header('location:bibliotecario/home.php');
		if($y=='Usuario')
			header('location:usuario/home.php');  
		}
		else { echo "<script type='text/javascript'>alert('Acesso negado! Matrícula ou senha incorreta.')</script>";
		}
	}
	?>
	</body>
</html>