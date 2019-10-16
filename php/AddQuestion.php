<!DOCTYPE html>
<html>
<head>
  <?php include '../html/Head.html'?>
  <?php include 'DbConfig.php'?>
</head>
<body>
  <?php include '../php/Menus.php' ?>
  <section class="main" id="s1">
    <div>
	<?php
		$mysqli=mysqli_connect($server,$user, $pass, $basededatos);
		if(!$mysqli){
				die("Fallo al establecer conexión" .mysqli_connect_error());
		}
		
		$sql="INSERT INTO preguntas (email, enunciado, correcta, incorrecta1, incorrecta2, incorrecta3, tema, dificultad ) 
		VALUES ('$_POST[correo]','$_POST[enunciado]','$_POST[correcta]','$_POST[incorrecta1]',
		'$_POST[incorrecta2]','$_POST[incorrecta3]', '$_POST[tema]', '$_POST[dificultad]')";

		if(!mysqli_query($mysqli,$sql)){
			echo "CUIDADO!";
			die('Error: ' .mysqli_error($sql));
				
		}	
		echo " Tu pregunta ha sido añadida correctamente.";
		echo "<a href='ShowQuestions.php'> Visualizar preguntas </a>";
		
		
		mysqli_close($mysqli);
	?>
    </div>
  </section>
  <?php include '../html/Footer.html' ?>
</body>
</html>
