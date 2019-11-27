<?php 
	//$server="localhost";
	//$user="id11248270_bereruiz";
	//$pass="ibiricu";
	//$basededatos="id11248270_sw13";

	$server="localhost";
   $user="root";
   $pass="";
   $basededatos="quiz";

   $email= $_GET['email'];
   $mysqli=mysqli_connect($server,$user,$pass,$basededatos);
   $resultado= mysqli_query($mysqli,"DELETE FROM usuarios WHERE email='$email'");
   mysqli_close( $mysqli);
   echo "<script>Usuario eliminado </script>";

 ?>