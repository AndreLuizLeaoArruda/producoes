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

	$linhas=mysqli_query($con, "SELECT * FROM musica");
	$rand=mysqli_num_rows($linhas);
	$iguais=mysqli_query($con, "SELECT * FROM musica WHERE ativo=codigo");
	$result=mysqli_num_rows($iguais);

if ($rand == $result) {

		echo "<center><h1><br> ORDENA&Ccedil;&Atilde;O DAS APRESENTA&Ccedil;&Otilde;ES";
		echo "<br>";
		echo "<table width='1200px' border='1'><tr>";
		echo "<td colspan='2'><h2><br> ORDEM DAS M&Uacute;SICAS A SEREM JULGADAS:</td>";
		echo "</tr></table>";

		echo "<table width='1200px' border=1><tr>";
		echo "<td width=30%><h2><br> T&Iacute;TULO DA M&Uacute;SICA </b><p></td>";
		echo "<td width=20%><h2><br> G&Ecirc;NERO </b><p></td>";
		echo "<td width=30%><h2><br> INT&Eacute;PRETE PRINCIPAL </b><p></td>";
		echo "<td width=20%><h2><br> ORDEM DE APRESENTA&Ccedil;&Atilde;O</b><p></td>";
		echo "</tr></table>";

		$x = '0';
		$y = '0';

$comandoSql = "SELECT musica.genero, musica.titulo, artista.nome FROM barranca.musica, barranca.artista WHERE artista.cod_artista=musica.cantor1 and musica.titulo<>'' order by rand()";  //limit 1
	

	$consulta = mysqli_query($con, "$comandoSql");
	while ($cliente = mysqli_fetch_object($consulta))
	{
		echo "<table width='1200px' border=1><tr>";
		echo "<td width=30%> $cliente->titulo </td>";
		echo "<td width=20%> $cliente->genero </td>";
		echo "<td width=30%> $cliente->nome; </td>";
		echo "<td width=20%>";
			$x = $x + 1;
		echo $x  . "&deg; ";

		$lista=mysqli_query($con, "UPDATE musica SET ativo='$x', voto='0' WHERE titulo='$cliente->titulo'");
		mysqli_query ("UPDATE musica SET voto='2' WHERE ativo='1'");
		echo "</td></tr></table>";
	}

$rand='500';

}
else {

	echo	"<h2><br> SORTEIO J&Aacute; EFETUADO ! ";

		echo "<center><h1><br> ORDENA&Ccedil;&Atilde;O DAS APRESENTA&Ccedil;&Otilde;ES";


		echo "<br>";
		echo "<table width='1200px'><tr>";
		echo "<td colspan='2'><h2><br>";
		echo " ORDEM DAS M&Uacute;SICAS A SEREM JULGADAS:</td></tr>";

		echo "<table width='1200px' border=1><tr>";
		echo "<td width=30%><h2><br> T&Iacute;TULO DA M&Uacute;SICA </b><p></td>";
		echo "<td width=20%><h2><br> G&Ecirc;NERO </b><p></td>";
		echo "<td width=30%><h2><br> INT&Eacute;PRETE PRINCIPAL </b><p></td>";
		echo "<td width=20%><h2><br> ORDEM DE APRESENTA&Ccedil;&Atilde;O</b><p></td>";
		echo "</tr></table>";

		$x = 0;
		$y = 0;

$comandoSql = "SELECT musica.genero, musica.titulo, artista.nome FROM barranca.musica, barranca.artista WHERE artista.cod_artista=musica.cantor1 and musica.titulo<>'' order by ativo";  //limit 1
	

	$consulta = mysqli_query($con, "$comandoSql");
	while ($cliente = mysqli_fetch_object($consulta))
	{
		echo "<table width='1200px' border=1><tr>";
		echo "<td width=30%> $cliente->titulo </td>";
		echo "<td width=20%> $cliente->genero </td>";
		echo "<td width=30%> $cliente->nome </td>";
		echo "<td width=20%>";
			$x = $x + 1;
		echo $x  . "&deg; ";
		echo "</td></tr></table>";
	}
}

?>
</form>

<br><a href="JavaScript: window.history.back(-1);"><input type="button" value="Voltar"></a>

<?php include('rodape.php'); ?>

</body></html>