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

     <form action="LogIn.php" method="post">
		<h1>Login</h1>

			<div>
			Email: <input type="text" name="email" >
			</div>
			<br>

			<div>
			Contrasenia: <input type="password" name="pass">
			</div>
			<br>
			
			
			<input type="submit" value="Enviar" name="boton" >			
			
			<br>
	</form>
	
		<?php
			if (isset($_POST['email'])){	
				
				$mysqli=mysqli_connect($server,$user,$pass,$basededatos);
				
				if(!$mysqli){
					echo"HOLAAAA";
						die("Fallo al establecer conexion" .mysqli_connect_error());
				}

					$email = $_POST['email'];
					$pass = $_POST['pass'];										
					
					$user = mysqli_query( $mysqli,"select nombre from usuarios where email ='$email' and contraseña='$pass'");
					$cont=  mysqli_num_rows($user); 
					$columna= mysqli_fetch_array($user);
					$name=$columna['nombre'];
					mysqli_close( $mysqli);
					
					if($cont==1){
						echo("<script> alert ('BIENVENIDO AL SISTEMA')</script>");
						
						header("Location: Layout.php?email=$email");					} 
					else {
						echo("Par&aacute;metros de login incorrectos ");
					} 
					
				
			}
		?>
    
    </div>
  </section>
  <?php include '../html/Footer.html' ?>
</body>
</html>