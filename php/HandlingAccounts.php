
  <?php include '../html/Head.html'?>
  <script src="../js/jquery-3.4.1.min.js"></script>
  <?php include 'DbConfig.php'?>
  <style>
  #errores{
  color: red;
  }
  </style>
</head>
<body>

    <?php include '../php/Menus.php' ?>

  
    <section class="main" id="s1">
        <?php 
        if(!isset($_SESSION['tipo']) || strcmp($_SESSION['tipo'],"admin")!==0){
          echo("No tienes permisos para acceder a esta pagina.");
        }else{
        ?>
        <div>
        
	<div align="center">Estos son los usuarios almacenados en la base de datos </div>

	<br>
        <table border=1 align="center">
	    <tr>
    		<td><strong>Correo</strong></td>	
		    <td><strong>Nombre y Apellido&nbsp</strong></td>	
			
		    <td><strong>Contraseña&nbsp</strong></td>
			
		    <td><strong>Estado&nbsp</strong></td>			
        <td><strong>Cambiar Estado</strong></td>		
        <td><strong>Eliminar Uusario</strong></td>			
	    </tr>
        
        <?php

            $conexion=mysqli_connect($server,$user,$pass,$basededatos);
            $sql= "SELECT * FROM usuarios";
            $resultado= mysqli_query($conexion,$sql);

            while($usuario=mysqli_fetch_array($resultado)){
        ?>
        
        <tr>
	        <td align="center"><br>&nbsp;&nbsp;<?php echo $usuario['email'] ?>&nbsp;&nbsp;<br></td>
	        <td align="center" ><br>&nbsp;&nbsp;<?php echo $usuario['nombre']?>&nbsp;&nbsp;<br></td>
        	<td align="center"><br>&nbsp;&nbsp;<?php echo $usuario['pass']?>&nbsp;&nbsp;<br></td>
	        <td align="center"><br>&nbsp;&nbsp;<?php echo $usuario['estado']?>&nbsp;&nbsp;<br></td>   
   
          <td align="center"><input type="button" value="Cambiar Estado" onclick="ChangeState('<?php echo $usuario['email'];?>');"></td>
          <td align="center"><input type="button" id="EliminarUsuario" value="Eliminar" onclick="RemoveUser('<?php echo $usuario['email'];?>');"></td>
        </tr>
		<?php
			};
		?>
		</table>
		<p>Si no se visualizan cambios autom&aacute;ticamente por favor recargue la pagina</p>
        </div>


      <?php
        }
      ?>  

    </section>

<script>
    function ChangeState(email){      
        if(	confirm("Estas seguro de que quieres cambiar de estado a "+email+"")==true){
          $.ajax({
          url: 'ChangeState.php?email='+email+'',
          });
          window.location.replace("");
        }
    }

    function RemoveUser(email){
        if(	confirm("Estas seguro de que quieres eliminar a "+email+"")==true){
          $.ajax({
          url: 'RemoveUser.php?email='+email+'',  
          });
          window.location.replace("");    
        }
    }
</script>



  
  <?php include '../html/Footer.html' ?>
</body>
</html>