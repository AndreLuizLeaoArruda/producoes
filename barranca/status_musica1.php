<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<title> STATUS DAS APRESENTA&Ccedil;&Otilde;ES </title>
<link rel="stylesheet" href="style.css" type="text/css" media="screen">
</head>
<body>
<center>
<?php
header("refresh: 3;");
	include "conectar.php";
	session_start();

		echo "<center><h1><br> RELA&Ccedil;&Atilde;O DOS JURADOS";
		
		$juizes= mysqli_query($con, "Select usuario FROM login WHERE nivel=3 ORDER BY usuario");
	
		while ($relacao = mysqli_fetch_object($juizes))
		{
		echo "<h2>" . $relacao->usuario . "<br>";
		}
$listaj=mysqli_query($con, "SELECT * FROM login WHERE nivel='3'");
		     $jurados=mysqli_num_rows($listaj);

		echo "<center><h1><br> STATUS DAS APRESENTA&Ccedil;&Otilde;ES MUSICAIS - TEMA LIVRE";


		echo "<br>";
		echo "<table width='900px'><tr>";
		echo "<td colspan='2'><h2><br>";
		echo " ORDEM DAS M&Uacute;SICAS A SEREM JULGADAS:</td></tr>";

		echo "<br>";

		echo "<table width='900px'><tr>";
		echo "<td width=15%><h2><br> ORDEM DE SORTEIO</td>";
		echo "<td width=30%><h2><br> NOME DA M&Uacute;SICA</td>";
		echo "<td width=15%><h2><br> C&Oacute;DIGO DE CADASTRO </td>";
		echo "<td width=15%><h2><br> QUANTIDADE DE NOTAS </td>";
		echo "<td width=25%><h2><br> STATUS </td>";
		echo "</tr></table>";
		
	
	$linhas='3';
	$ativo= mysqli_query($con, "Select ativo, codigo, titulo, voto FROM musica ORDER BY ativo");
	while ($lista = mysqli_fetch_object($ativo))
	{
		echo "<table width='900px'><tr>";
		echo "<td width=15%><h2><br>";
		echo $at=$lista->ativo;
		echo "</td>";
		echo "<td width=30%><h2><br>";
		echo $lista->titulo;
		echo "<td width=15%><h2><br>";
		echo $status=$lista->codigo;
		echo "<td width=15%><h2><br>";
		$trinca=mysqli_query($con, "SELECT * FROM votamus WHERE codigo_musica=$status");
		$linhas=mysqli_num_rows($trinca);	
		echo $linhas;
		echo "<td  width=25%><h2><br>";
		
		IF ($linhas==3) 
		{
		mysqli_query($con, "UPDATE musica SET voto='1' WHERE ativo=$at");
		$y=$at+1;
		mysqli_query($con, "UPDATE musica SET voto='2' WHERE ativo=$y");
		}

		$x=$lista->voto;

		IF ($x == '0')
		{
		echo 'AGUARDANDO LIBERA&Ccedil;&Atilde;O';
		} elseif ($x == '1')
		{
		echo 'VOTA&Ccedil;&Atilde;O CONCLUIDA';
		} elseif ($x == '2')
		{
		echo 'EM VOTA&Ccedil;&Atilde;O';
		}
		echo "</td></tr></table>";
	}
?>

</form>
	<br><a href="admin.php"><input type="button" value="Voltar"></a>

<?php include('rodape.php'); ?>

</body></html>