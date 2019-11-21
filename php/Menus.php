<div id='page-wrap'>
<header class='main' id='h1'>
	
	<?php
	if (isset($_GET['email'])){
	echo"<span class='right'><a href='Layout.php'>Logout</a></span>";
	echo "&nbsp";
	echo "&nbsp";
        echo $_GET['email'];
	}else{
  	echo"<span class='right'><a href='SignUp.php'>Registro</a></span>";
	echo "&nbsp";
	echo "&nbsp";
	echo"<span class='right'><a href='LogIn.php'>Login</a></span>";		
	}
	?>

</header>
<nav class='main' id='n1' role='navigation'>
	


  	<?php
	if (isset($_GET['email'])){
		$email=$_GET['email'];
		echo"<span><a href='Layout.php?email=$email'>Inicio</a></span>";
		echo"<span><a href='Credits.php?email=$email'>Cr&eacute;ditos</a></span>";
		echo"<span><a href='HandlingQuizesAjax.php?email=$email'>Gestionar Preguntas</a></span>";
		echo"<span><a href='GetQuestion.php?email=$email'>Obtener preguntas</a></span>";
	}else{
		echo"<span><a href='Layout.php'>Inicio</a></span>";  		
		echo"<span><a href='Credits.php'>Cr&eacute;ditos</a></span>";
	}
	?>
	
</nav>