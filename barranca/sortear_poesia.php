<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<title> SORTEAR APRESENTA&Ccedil;&Atilde;O </title>
<link rel="stylesheet" href="style.css" type="text/css" media="screen">
</head>
<body>
<center>

<?php
	include "conectar.php";
	session_start();

	$linhas=mysqli_query($con, "SELECT * FROM poesia");
	$rand=mysqli_num_rows($linhas);
	$iguais=mysqli_query($con, "SELECT * FROM poesia WHERE ativo=codigo");
	$result=mysqli_num_rows($iguais);

if ($rand == $result) {

		echo "<center><h1><br> ORDENA&Ccedil;&Atilde;O DAS APRESENTA&Ccedil;&Otilde;ES</h1>";
		echo "<br>";
		$y = '0';

		echo "<center><table width='1200px' border=1><tr>";
		echo "<td colspan='2'><h2><B><br>";
		echo " ORDEM DAS POESIAS A SEREM JULGADAS:</td></tr></table>";

		echo "<table width='1200px' border=1><tr><td width=30% ALIGN=center>";
		echo "<h2><br> T&Iacute;TULO DA POESIA </b><p>";
		echo "</td><td width=20% ALIGN=center>";
		echo "<h2><br> DECLAMADOR </b><p>";
		echo "</td><td width=20% ALIGN=center>";
		echo "<h2><br> ORDEM DE APRESENTA&Ccedil;&Atilde;O </b><p>";
		echo "</td></tr></table>";

		$y = '0';

	$comandoSql2 = "SELECT poesia.titulo, artista.nome FROM barranca.poesia, barranca.artista WHERE artista.cod_artista=poesia.declamador AND poesia.titulo<> '' ORDER by rand()";
	
	$consulta2 = mysqli_query($con, $comandoSql2);
	while ($cliente = mysqli_fetch_object($consulta2))
	{

		echo "<table width='1200px' border=1><tr>";
		echo "<td width=30%> $cliente->titulo </td>";
		echo "<td width=20%> $cliente->nome </td>";
		echo "<td width=20%>";
		$y = $y + 1;
		echo $y . "&deg ";
		$lista=mysqli_query($con, "UPDATE poesia SET ativo='$y', voto='0' WHERE titulo='$cliente->titulo'");
		mysqli_query ($con, "UPDATE poesia SET voto='2' WHERE ativo='1'");
		echo "</td></tr></table>";

	}


$rand='500';
}
else {

	echo	"<h2><br> SORTEIO J&Aacute; EFETUADO ! ";

		echo "<center><h1><br> ORDENA&Ccedil;&Atilde;O DAS APRESENTA&Ccedil;&Otilde;ES";


		$y = '0';


		echo "<BR><center><table width='1200px'><tr>";
		echo "<td colspan='2'><h2><B><br>";
		echo " ORDEM DAS POESIAS A SEREM JULGADAS:</td></tr></table>";

		echo "<table width='1200px' border=1><tr>";
		echo "<td width=30%><h2><br> T&Iacute;TULO DA POESIA </b><p></td>";
		echo "<td width=20%><h2><br> DECLAMADOR </b><p></td>";
		echo "<td width=20%><h2><br> ORDEM DE APRESENTA&Ccedil;&Atilde;O </b><p></td>";
		echo "</tr></table>";



	$comandoSql2 = "SELECT poesia.titulo, artista.nome FROM barranca.poesia, barranca.artista WHERE artista.cod_artista=poesia.declamador AND poesia.titulo<> '' ORDER by ativo";
	
	$consulta2 = mysqli_query($con, $comandoSql2);
	while ($cliente = mysqli_fetch_object($consulta2))
	{

		echo "<table width='1200px' border='1'><tr>";
		echo "<td width=30%> $cliente->titulo </td>";
		echo "<td width=20%> $cliente->nome </td>";
		echo "<td width=20%>";
			$y=$y+1;
		echo $y . "&deg ";
		echo "</td></tr></table>";
	}
}
?>
</form>

<br><a href="JavaScript: window.history.back(-1);"><input type="button" value="Voltar"></a>

<?php include('rodape.php'); ?>

</body></html>