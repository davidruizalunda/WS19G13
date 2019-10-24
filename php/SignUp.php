<!DOCTYPE html>
<html>
<head>
  <?php include '../html/Head.html'?>
  <script src="jquery.min.js"></script>
  
  
</head>
<body>
  <?php include '../php/Menus.php' ?>
  <section class="main" id="s1">
    <div>
	<script>
		function filePreview(input) {
  		  if (input.files && input.files[0]) {
 		       var reader = new FileReader();
 		       reader.onload = function (e) {
 		           $('#uploadForm + img').remove();
   		         $('#uploadForm').after('<img src="'+e.target.result+'" width="450" height="300"/>');
   		     }
    		    reader.readAsDataURL(input.files[0]);
   		 }
		}
	</script>


     <form action="SignUp.php" method="post" enctype="multipart/form-data">
		<h1>Register</h1>        
			Tipo: <select name="tipo" >
				<option default value="Alumno">Alumno</option>
				<option value="Profesor">Profesor</option>
				</select>
			<br>
			Email: <input type="text" name="email" required>
			<br>
			Nombre y Apellido: <input type="text" name="name" pattern="^.+ .+$" required>
			<br>		
			Contrase&ntilde;a: <input type="password" name="pass" pattern=".+"/ required>  
			<br>
			Repetir Contrase&ntilde;a: <input type="password" name="pass2" pattern=".+"/ required> 
         		<br>
			<input id="file-input" name="file-input" type="file"/>
           		<br>          			
			<input type="submit" value="Enviar" name="boton" >						
	</form>
	<script>
		$("#file-input").change(function () {
  	  		filePreview(this);
		});
	</script>
	
	
		<?php
		
		$emailProfe="/^[a-z]+(\.[a-z]+)?@ehu\.(eus|es)$/";
		$emailAlumno="/^[a-z]+[0-9]{3}@ikasle\.ehu\.(eus|es)$/";


		$logeado="false";
		
  
				
				

			if (isset($_POST['email'])){

				$pass= $_POST['pass'];
				$rpass= $_POST['pass2'];
 				$tipo=$_POST['tipo'];
               			$email=$_POST['email'];
                		$name=$_POST['name'];

				if(($tipo=="Alumno")&&(preg_match($emailAlumno,$_POST['email'])==0)){
					echo "El correo no es valido ";
				}
			
				else if(($tipo=="Profesor")&&(preg_match($emailProfe,$_POST['email'])==0)){
					echo "El correo no es valido ";
				}

				
				

				else if(strlen($pass)<6){
					echo"La contrase&ntilde;a debe contener al menos 6 caracteres";
					
				}else if($pass!=$_POST['pass2']){
					echo"Las contrase&ntilde;as no coinciden";
					echo "<br>";
					
					
				}else{

					$server="localhost";
    					$user="root";
    					$pass="";
    					$basededatos="quiz";
					
					$nombreFoto=$_FILES['file-input']['name'];
					$rutaImg="../images/".$nombreFoto;
					move_uploaded_file($_FILES['file-input']['tmp_name'],$rutaImg);

					$mysqli=mysqli_connect($server,$user,$pass,$basededatos);
				
					if(!$mysqli){
						
						die("Fallo al establecer conexion" .mysqli_connect_error());
					}


				
				 	mysqli_query( $mysqli,"insert into usuarios (nombre, contraseña, email, tipo,rutaImg) values ('$name', '$rpass','$email','$tipo','$rutaImg')");
                			mysqli_close( $mysqli);
					
					echo '<script language="javascript">
							alert("Usuario registrado correctamente");
							window.location.href="Layout.php";
					</script>';
				}
			}



        

		?>
    
    </div>
  </section>
  <?php include '../html/Footer.html' ?>
</body>
</html>