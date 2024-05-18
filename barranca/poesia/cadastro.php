<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<title> CADASTRO DE POESIA </title>
<link rel="stylesheet" href="..\style.css" type="text/css" media="screen">

<!-- VERIFICAR SE OS CAMPOS FORAM PREENCHIDOS  -->
<script src="..\mascara.js"></script><!--Utilizado para digita somente números -->
<style type="text/css">
		input.maiuscula {
		text-transform: uppercase;
	}

		input.minuscula {
		text-transform: lowercase;
	}
</style>

<script language="JavaScript">

	function valida_dados(form1)
	{
		if (form1.titulo.value=="")
		{
		alert("Por favor digite o Título da Música.");
		form1.titulo.focus();
		return false;
		}

		if (form1.letra.value=="")
		{
		alert("Por favor selecione o autor da Poesia.");
		form1.letra.focus();
		return false;
		}

		if (form1.declamador.value=="")
		{
		alert("Por favor selecione o Declamador da Poesia.");
		form1.poesia.focus();
		return false;
		}

		if (form1.amadrinhador.value=="")
		{
		alert("Por favor selecione o Amadranhador da Poesia.");
		form1.poesia.focus();
		return false;
		}

		else {

	return true;
	}
}
</script>
</head>
<body>
<center><h1> CADASTRO DE POESIA: 

<form name="form1" method="post" action="confere_cadastro.php" onSubmit="return valida_dados(this)">
<center>

<table width="800px">
  <tr>
    <td colspan="2"><h2><br> PREENCHA OS CAMPOS: <p></td>
  </tr>
  <tr>
    <td colspan="2"><h2> &nbsp; T&iacute;tulo da Poesia: <input type="text" class="maiuscula" onkeyup="this.value=retira_acentos(this.value);"  name="titulo" size="80" value="">


<P>
	&nbsp; Autor da Letra:  &nbsp;&nbsp; 
<?php
			
				include "..\conectar.php";
				
				$query = "SELECT * FROM artista";
				$result = mysqli_query($con, $query) or die(mysqli_error());
				$dropdown = "<select name='letra'>";

				while($row = mysqli_fetch_assoc($result)) {
				$dropdown .= "\r\n<option value='{$row['nome']}'>{$row['nome']}</option>";
				}
				$dropdown .= "\r\n</select>";
				echo $dropdown;
				?>

<br><br>
	&nbsp; Declamador: &nbsp;&nbsp; &nbsp; &nbsp; 
<?php
			
				$query = "SELECT * FROM artista";
				$result = mysqli_query($con, $query) or die(mysqli_error());
				$dropdown = "<select name='declamador'>";

				while($row = mysqli_fetch_assoc($result)) {
				$dropdown .= "\r\n<option value='{$row['nome']}'>{$row['nome']}</option>";
				}
				$dropdown .= "\r\n</select>";
				echo $dropdown;
				?>
<br><br>

	&nbsp; Amadrinhador: &nbsp; &nbsp;  
<?php
				$query = "SELECT * FROM artista";
				$result = mysqli_query($con, $query) or die(mysqli_error());
				$dropdown = "<select name='amadrinhador'>";

				while($row = mysqli_fetch_assoc($result)) {
				$dropdown .= "\r\n<option value='{$row['nome']}'>{$row['nome']}</option>";
				}
				$dropdown .= "\r\n</select>";
				echo $dropdown;
				?>

		<tr>
    	<td align=center colspan="2" bgcolor="#dffcaa">
    		<input type="submit" value="Cadastrar"> &nbsp;  
    		<input type="reset"  value="Limpar" name="limpar"> &nbsp; 
    		<a href="..\index.php"><input type="button" value="Voltar"></a>
			</td>
  	</tr>    
	</table>
</form>

<center><h1><br> POESIAS J&Aacute; CADASTRADAS: 
<?php
		echo "<table width='1200px' border=1><tr>";
		echo "<td width=20%><h2><br> T&Iacute;TULO </b><p></td>";
		echo "<td width=20%><h2><br> AUTOR </b><p></td>";
		echo "<td width=20%><h2><br> DECLAMADOR </b><p></td>";
		echo "<td width=20%><h2><br> AMADRINHADOR </b><p></td>";
		echo "<td width=20%><h2><br> A&Ccedil;&Otilde;ES </b><p></td>";
		echo "</tr></table>";
 
mysqli_query($con, "CREATE TEMPORARY TABLE teste (codigo int (11), titulo varchar(50), letra varchar(40), declamador int(2), amadrinhador int(2))");

mysqli_query($con, "INSERT INTO teste (codigo, titulo, letra, declamador, amadrinhador) (SELECT codigo, titulo, nome, declamador, amadrinhador FROM poesia, artista WHERE artista.cod_artista=poesia.letra)");

mysqli_query($con, "CREATE TEMPORARY TABLE teste2 (codigo int (11), titulo varchar(50), letra varchar(40), declamador varchar(40), amadrinhador int(2))");

mysqli_query($con, "INSERT INTO teste2 (codigo, titulo, letra, declamador, amadrinhador) (SELECT codigo, titulo, letra, nome, amadrinhador FROM teste, artista WHERE artista.cod_artista=teste.declamador)");

mysqli_query($con, "CREATE TEMPORARY TABLE teste3 (codigo int (11), titulo varchar(50), letra varchar(40), declamador varchar(40), amadrinhador varchar(40))");

mysqli_query($con, "INSERT INTO teste3 (codigo, titulo, letra, declamador, amadrinhador) (SELECT codigo, titulo, letra, declamador, nome FROM teste2, artista WHERE artista.cod_artista=teste2.amadrinhador)");

$comandoSql = "SELECT * FROM teste3";

	$consulta = mysqli_query($con, "$comandoSql");
	while ($cliente = mysqli_fetch_object($consulta))
	{
		echo "<table width='1200px' border=1><tr>";
		echo "<td width=20%> $cliente->titulo </td>";
		echo "<td width=20%> $cliente->letra </td>";
		echo "<td width=20%> $cliente->declamador </td>";
		echo "<td width=20%> $cliente->amadrinhador </td>";
		echo "<td width=20%>";
		echo "<br><form name='form2' method='post' action='deleta_poesia.php'>";
		echo "<input type='hidden' name='deleta' value='$cliente->codigo'>"	;
		echo "<center><input type='submit' value='Excluir'></form>";
		echo "<form name='form3' method='post' action='altera_poesia.php'>";
		echo "<input type='hidden' name='altera' value='$cliente->codigo'>"	;
		echo "<center><input type='submit' value='Alterar'></form></td>";
		echo "</tr></table>";
	}
		echo "</body>";
		include ('..\rodape.php');
		echo "</html>";
?>