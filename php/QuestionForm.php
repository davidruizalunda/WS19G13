<!DOCTYPE html>
<html>
<head>
  <?php include '../html/Head.html'?>
  <script src="../js/jquery-3.4.1.min.js"></script>
  <script type="text/javascript" src="../js/ValidateFieldsQuesti.js"></script>
  <style>
  #errores{
  color: red;
  }
  </style>
</head>
<body>

  <?php include '../php/Menus.php' ?>
  
  
  <section class="main" id="s1">
    <div>

      
    <br>
	<br>

	<form id="forma" action="AddQuestion.php">
		
        <h3> Formulario Insertar Preguntas </h3>
		<br>
        Enunciado:
		<input type="text" id="enunciado" class="field" placeholder="Enunciado de la pregunta"> <br/>
		<br>
        Respuesta Correcta: 
		<input type="text" id="correcta" class="field" placeholder="Campo obligatorio"> <br/>
		<br>
        Respuesta Incorrecta 1: 
		<input type="text" id="incorrecta1" class="field" placeholder="Campo obligatorio"> <br/>
        <br>
        Respuesta Incorrecta 2: 
		<input type="text" id="incorrecta2" class="field" placeholder="Campo obligatorio"> <br/>
        <br>
        Respuesta Incorrecta 3: 
		<input type="text" id="incorrecta3" class="field" placeholder="Campo obligatorio"> <br/>
		<br>
      	Tema: 
		<input type="text" id="tema" class="field" size="15" placeholder="Campo obligatorio">  &nbsp &nbsp
        Dificultad:
       	<select>
        	<option> Baja </option>
            <option> Media </option>
            <option> Alta </option>
        </select>
		<br>
		<br>
       	<br>	
		<p id="errores"> Introduce <strong>TODOS</strong> los datos. </p>	
		<br>
		<br>
        <p> Tu correo: </p>
		<input type="text" id="correo" class="field" size="49" placeholder="Direccion de correo del autor de la pregunta"> 
        <br>


        <input type="submit" value="Enviar" id="botonEnviar">
        <input type="reset" value="Restablecer" id="botonReset" >
        <br>
        <br>
        
		

	</form>
    </div>
  </section>
  
  <?php include '../html/Footer.html' ?>
</body>
</html>
