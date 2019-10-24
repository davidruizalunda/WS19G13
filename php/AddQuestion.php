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

		$emailProfe="/^[a-z]+(\.[a-z]+)?@ehu\.(eus|es)$/";
		$emailAlumno="/^[a-z]+[0-9]{3}@ikasle\.ehu\.(eus|es)$/";
		$expNotEmpty="/^.+/"; 
		$expEnun="/^.{10,}/";
		
		$email=$_POST['correo'];
		$enunciado=$_POST['enunciado'];
		$tema=$_POST['tema'];
		$correcta=$_POST['correcta'];
		$incorrecta1=$_POST['incorrecta1'];
		$incorrecta2=$_POST['incorrecta2'];
		$incorrecta3=$_POST['incorrecta3'];
		$dificultad=$_POST['dificultad'];
		
		if((preg_match($emailAlumno,$email)==0) && (preg_match($emailProfe,$email)==0)){
			echo "El servidor dice que el correo no es valido ";
		}else if(!preg_match($expEnun,$enunciado)){
			echo "El enunciado debe contener al menos 10 caracteres ";
		}else if(!preg_match($expNotEmpty, $tema)){
			echo "El servidor dice que hay campos vacíos ";
		}else if(!preg_match($expNotEmpty,$correcta)){
			echo "El servidor dice que hay campos vacíos ";
		
		}else if(!preg_match($expNotEmpty,$incorrecta1)){
			echo "El servidor dice que hay campos vacíos ";
		}else if(!preg_match($expNotEmpty,$incorrecta2)){
			echo "El servidor dice que hay campos vacíos ";
		}else if(!preg_match($expNotEmpty,$incorrecta3)){
			echo "El servidor dice que hay campos vacíos ";
		}else{

		
			$mysqli=mysqli_connect($server,$user,$pass,$basededatos);
			
			if(!$mysqli){
					die("Fallo al establecer conexion" .mysqli_connect_error());
			}
			
			$sql="INSERT INTO preguntas (email, enunciado, correcta, incorrecta1, incorrecta2, incorrecta3, tema, dificultad ) 
			VALUES ('$email','$enunciado','$correcta','$incorrecta1',
			'$incorrecta2','$incorrecta3', '$tema', '$dificultad')";

			if(!mysqli_query($mysqli,$sql)){
				echo "CUIDADO!";
				die('Error: ' .mysqli_error($sql));
					
			}	
			echo " Tu pregunta ha sido añadida correctamente.";
			$email=$_GET['email'];
			echo "<a href='ShowQuestions.php?email=$email'> Visualizar preguntas </a>";
			
			
			mysqli_close($mysqli);
		}	
	?>
    </div>
  </section>
  <?php include '../html/Footer.html' ?>
</body>
</html>
