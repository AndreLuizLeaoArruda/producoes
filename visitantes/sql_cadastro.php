<?php

include ("conectar.php");
session_start(); 

$cod_finalidade = $_POST["cod_finalidade"];

echo "<link rel='stylesheet' href='style.css' type='text/css' media='screen'>";

$sql = "INSERT INTO acesso (cod_visitante, dia, hora, cod_finalidade, id_usuario, data)  VALUES ('".($_SESSION['cod_visitante'])."','".($_SESSION['dia'])."','".($_SESSION['hora'])."', $cod_finalidade, '".($_SESSION['id_usuario'])."','".($_SESSION['data_desc'])."')";

mysqli_query($con, $sql);

	echo "<htm><head><title> CONCLU&Iacute;DO </title></head><body><br><p><p><p>";
	echo "<p align=center><font color='#ff0055' face='garamond' size='+2'> Cadastro Realizado com Sucesso! </p><br>";
	echo "<BR><BR><p align=center><a href='index.php'><font color='#ff0055' face='garamond' size='+1'> VOLTAR PARA A TELA PRINCIPAL </a>";
	echo "</body></html>";
?>