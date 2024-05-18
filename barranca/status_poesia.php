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


		echo "<center><h1><br> STATUS DAS APRESENTA&Ccedil;&Otilde;ES PO&Eacute;TICAS <br>";



		echo "<br>";
		echo "<table width='900px'><tr>";
		echo "<td colspan='2'><h2><br> ORDEM DAS POESIAS A SEREM JULGADAS: <br></td></tr>";

		echo "<table width='900px'><tr>";
		echo "<td width=15%><h2><br> ORDEM DE SORTEIO </td>";
		echo "<td width=30%><h2><br> NOME DA POESIA </td>";
		echo "<td width=15%><h2><br> C&Oacute;DIGO DE CADASTRO </td>";
		echo "<td width=15%><h2><br> QUANTIDADE DE NOTAS </td>";
		echo "<td width=25%><h2><br> STATUS </td>";
		echo "</tr></table>";


		$linhasp='3';
	$ativop= mysqli_query($con, "Select ativo, codigo, titulo, voto FROM poesia ORDER BY ativo");
	while ($listap = mysqli_fetch_object($ativop))
	{
		echo "<table width='900px'><tr>";
		echo "<td width=15%><h2><br>";
		echo $atp=$listap->ativo;
		echo "</td>";
		echo "<td width=30%><h2><br>";
		echo $listap->titulo;
		echo "<td width=15%><h2><br>";
		echo $statusp=$listap->codigo;
		echo "<td width=15%><h2><br>";
		$trincap=mysqli_query($con, "SELECT * FROM votapoe WHERE codigo_poesia=$statusp");
		$linhasp=mysqli_num_rows($trincap);	
		echo $linhasp;
		echo "<td width=25%><h2><br>";
		
		IF ($linhasp==3) 
		{
		mysqli_query($con, "UPDATE poesia SET voto='1' WHERE ativo=$atp");
		$yp=$atp+1;
		mysqli_query($con, "UPDATE poesia SET voto='2' WHERE ativo=$yp");
		}


		$x=$listap->voto;
		
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

	<br><a href="index.php"><input type="button" value="Voltar"></a>

<?php include('rodape.php'); ?>

</body></html>