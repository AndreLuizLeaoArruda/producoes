<?php
	include "conectar.php";
	session_start();
	$us = $_COOKIE["usuario"]; 
	$p = $_COOKIE["senha"];
	$sql = "SELECT * FROM barranca.login Where usuario='$us' and senha=$p";

	$consulta = mysqli_query($con, $sql);
	$qregistro = mysqli_num_rows($consulta);

if($qregistro<'1')
	{
		echo "<br><center><b><font size=+2 color=red>";
		echo 'ACESSO NEGADO.';
		header("Location: bloqueado.php");
	}
else 
	{
		echo "<br><center><b><font size=+1 color=red>";
		$teste1 = "SELECT nivel FROM barranca.login WHERE usuario='$us'";
		$teste2 = mysqli_query($con, $teste1);
		$teste3 = $teste2->fetch_array()[0] ?? '';
		echo $teste3;
		if ($teste3 == 1)
		{
		header("Location:admin.php");
		}
		else if
		($teste3 == 3) {
		header("Location:jurado/index.php");
		}
		else if
		($teste3 == 2) {
		header("Location:usupa.php");
		}
		else
		{	
		header("Location:press.php");
		}
	}
	include('rodape.php');
?>
