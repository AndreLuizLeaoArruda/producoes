<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<title> CADASTRO DE M&Uacute;SICA </title>
<link rel="stylesheet" href="..\style.css" type="text/css" media="screen">

<!-- VERIFICAR SE OS CAMPOS FORAM PREENCHIDOS  -->
<script src="..\mascara.js"></script><!--Utilizado para digita somente n&Uacute;meros -->
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
		alert("Por favor digite o Título da M&uacute;sica.");
		form1.titulo.focus();
		return false;
		}

		if (form1.genero.value=="")
		{
		alert("Por favor Selecione um Gênero.");
		form1.genero.focus();
		return false;
		}

		if (form1.letra1.value=="")
		{
		alert("Por favor selecione pelo menos um autor da Letra.");
		form1.letra1.focus();
		return false;
		}

		if (form1.musica1.value=="")
		{
		alert("Por favor selecione pelo menos um autor da M&uacute;sica.");
		form1.musica1.focus();
		return false;
		}

		if (form1.cantor1.value=="")
		{
		alert("Por favor selecione pelo menos um intérprete da M&uacute;sica.");
		form1.cantor1.focus();
		return false;
		}
		else {
	return true;
	}
}
</script>
</head>

<body>
<center><h1> CADASTRO DE M&Uacute;SICA: 

<form name="form1" method="post" action="confere_cadastro.php" onSubmit="return valida_dados(this)">
<center>

<table width="1000px">
  <tr>
    <td colspan="2"><h2><br> PREENCHA OS CAMPOS: <p></td>
  </tr>
  <tr>
    <td colspan="2">
	<h2> &nbsp; T&iacute;tulo da M&uacute;sica: <input type="text" class="maiuscula" name="titulo" size="48" value="">

	&nbsp; G&ecirc;nero: 

<select id="genero" name="genero">                      
<option value="">  </option>
<option value="RASGUIDO"> RASGUIDO </option>
<option value="CHACARERA"> CHACARERA </option>
<option value="POLCA"> POLCA </option>
<option value="GUAR&Acirc;NIA"> GUAR&Acirc;NIA </option>
<option value="CHAMARRA"> CHAMARRA </option>
<option value="NATIVISTA"> NATIVISTA </option>
<option value="MILONGA PAMPEANA"> MILONGA PAMPEANA </option>
<option value="MILONG&Atilde;O"> MILONG&Atilde;O </option>
<option value="CAN&Ccedil;&Atilde;O TROPEIRA"> CAN&Ccedil;&Atilde;O TROPEIRA </option>
<option value="TOADA"> TOADA </option>
<option value="MILONGEADO"> MILONGEADO </option>
<option value="BUGIO"> BUGIO </option>
<option value="CHAMAM&Eacute;"> CHAMAM&Eacute; </option>
<option value="CHOTE"> CHOTE </option>
<option value="MARCHA"> MARCHA </option>
<option value="MILONGA"> MILONGA </option>
<option value="RANCHEIRA"> RANCHEIRA </option>
<option value="VALSA"> VALSA </option>
<option value="VANEIRA"> VANEIRA </option>
</select>

<P>
	&nbsp; Autor(es) da Letra:  &nbsp;&nbsp; 
<?php			
				include "..\conectar.php";
								
				$query = "SELECT * FROM artista ORDER BY nome";
				$result = mysqli_query($con, $query);
				$dropdown = "<select name='letra1'>";

				while($row = mysqli_fetch_assoc($result)) {
				$dropdown .= "\r\n<option value='{$row['nome']}'>{$row['nome']}</option>";
				}
				$dropdown .= "\r\n</select>";
				echo $dropdown;
				?>
&nbsp; &nbsp; &nbsp;

<?php			
				$query = "SELECT * FROM artista ORDER BY nome";
				$result = mysqli_query($con, $query);
				$dropdown = "<select name='letra2'>";

				while($row = mysqli_fetch_assoc($result)) {
				$dropdown .= "\r\n<option value='{$row['nome']}'>{$row['nome']}</option>";
				}
				$dropdown .= "\r\n</select>";
				echo $dropdown;
				?>
<P>
	&nbsp; Autor(es) da M&uacute;sica:
<?php				
				$query = "SELECT * FROM artista ORDER BY nome";
				$result = mysqli_query($con, $query);
				$dropdown = "<select name='musica1'>";

				while($row = mysqli_fetch_assoc($result)) {
				$dropdown .= "\r\n<option value='{$row['nome']}'>{$row['nome']}</option>";
				}
				$dropdown .= "\r\n</select>";
				echo $dropdown;
				?>
&nbsp; &nbsp; &nbsp;

<?php
				$query = "SELECT * FROM artista ORDER BY nome";
				$result = mysqli_query($con, $query);
				$dropdown = "<select name='musica2'>";

				while($row = mysqli_fetch_assoc($result)) {
				$dropdown .= "\r\n<option value='{$row['nome']}'>{$row['nome']}</option>";
				}
				$dropdown .= "\r\n</select>";
				echo $dropdown;
				?>
<P>
	&nbsp; Interpretada por: &nbsp; &nbsp; &nbsp;&nbsp;
<?php
				$query = "SELECT * FROM artista ORDER BY nome";
				$result = mysqli_query($con, $query);
				$dropdown = "<select name='cantor1'>";

				while($row = mysqli_fetch_assoc($result)) {
				$dropdown .= "\r\n<option value='{$row['nome']}'>{$row['nome']}</option>";
				}
				$dropdown .= "\r\n</select>";
				echo $dropdown;
				?>
&nbsp; &nbsp; &nbsp;

<?php
				$query = "SELECT * FROM artista ORDER BY nome";
				$result = mysqli_query($con, $query);
				$dropdown = "<select name='cantor2'>";

				while($row = mysqli_fetch_assoc($result)) {
				$dropdown .= "\r\n<option value='{$row['nome']}'>{$row['nome']}</option>";
				}
				$dropdown .= "\r\n</select>";
				echo $dropdown;
				?>
<P>

	&nbsp; Instrumentista(as):  &nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp;

<br><h2> &nbsp; Instrumento 1: 

<?php
				$query = "SELECT * FROM instrumento";
				$result = mysqli_query($con, $query);
				$dropdown = "<select name='inst1'>";

				while($row = mysqli_fetch_assoc($result)) {
				$dropdown .= "\r\n<option value='{$row['descricao']}'>{$row['descricao']}</option>";
				}
				$dropdown .= "\r\n</select>";
				echo $dropdown;
				?>

&nbsp; &nbsp; &nbsp;

Tocado por:
<?php
				$query = "SELECT * FROM artista ORDER BY nome";
				$result = mysqli_query($con, $query);
				$dropdown = "<select name='toc1'>";

				while($row = mysqli_fetch_assoc($result)) {
				$dropdown .= "\r\n<option value='{$row['nome']}'>{$row['nome']}</option>";
				}
				$dropdown .= "\r\n</select>";
				echo $dropdown;
				?>
<br><h2> &nbsp; Instrumento 2: 

<?php
				$query = "SELECT * FROM instrumento";
				$result = mysqli_query($con, $query);
				$dropdown = "<select name='inst2'>";

				while($row = mysqli_fetch_assoc($result)) {
				$dropdown .= "\r\n<option value='{$row['descricao']}'>{$row['descricao']}</option>";
				}
				$dropdown .= "\r\n</select>";
				echo $dropdown;
				?>
&nbsp; &nbsp; &nbsp;

Tocado por:
<?php
				$query = "SELECT * FROM artista ORDER BY nome";
				$result = mysqli_query($con, $query);
				$dropdown = "<select name='toc2'>";

				while($row = mysqli_fetch_assoc($result)) {
				$dropdown .= "\r\n<option value='{$row['nome']}'>{$row['nome']}</option>";
				}
				$dropdown .= "\r\n</select>";
				echo $dropdown;
				?>

<br><h2> &nbsp; Instrumento 3: 
<?php
				$query = "SELECT * FROM instrumento";
				$result = mysqli_query($con, $query);
				$dropdown = "<select name='inst3'>";

				while($row = mysqli_fetch_assoc($result)) {
				$dropdown .= "\r\n<option value='{$row['descricao']}'>{$row['descricao']}</option>";
				}
				$dropdown .= "\r\n</select>";
				echo $dropdown;
				?>

&nbsp; &nbsp; &nbsp;
Tocado por:
<?php
				$query = "SELECT * FROM artista ORDER BY nome";
				$result = mysqli_query($con, $query);
				$dropdown = "<select name='toc3'>";

				while($row = mysqli_fetch_assoc($result)) {
				$dropdown .= "\r\n<option value='{$row['nome']}'>{$row['nome']}</option>";
				}
				$dropdown .= "\r\n</select>";
				echo $dropdown;
				?>

<br><h2> &nbsp; Instrumento 4: <?php
				$query = "SELECT * FROM instrumento";
				$result = mysqli_query($con, $query);
				$dropdown = "<select name='inst4'>";

				while($row = mysqli_fetch_assoc($result)) {
				$dropdown .= "\r\n<option value='{$row['descricao']}'>{$row['descricao']}</option>";
				}
				$dropdown .= "\r\n</select>";
				echo $dropdown;
				?>

&nbsp; &nbsp; &nbsp;
Tocado por:
<?php
				$query = "SELECT * FROM artista ORDER BY nome";
				$result = mysqli_query($con, $query);
				$dropdown = "<select name='toc4'>";

				while($row = mysqli_fetch_assoc($result)) {
				$dropdown .= "\r\n<option value='{$row['nome']}'>{$row['nome']}</option>";
				}
				$dropdown .= "\r\n</select>";
				echo $dropdown;
				?>

<br><h2> &nbsp; Instrumento 5: 
<?php
				$query = "SELECT * FROM instrumento";
				$result = mysqli_query($con, $query);
				$dropdown = "<select name='inst5'>";

				while($row = mysqli_fetch_assoc($result)) {
				$dropdown .= "\r\n<option value='{$row['descricao']}'>{$row['descricao']}</option>";
				}
				$dropdown .= "\r\n</select>";
				echo $dropdown;
				?>

&nbsp; &nbsp; &nbsp;
Tocado por:
<?php
				$query = "SELECT * FROM artista ORDER BY nome";
				$result = mysqli_query($con, $query);
				$dropdown = "<select name='toc5'>";

				while($row = mysqli_fetch_assoc($result)) {
				$dropdown .= "\r\n<option value='{$row['nome']}'>{$row['nome']}</option>";
				}
				$dropdown .= "\r\n</select>";
				echo $dropdown;
				?>
<br>

		</td>
	</tr>
	<tr>
    <td colspan="2">
			<input type="submit" value="Cadastrar"> &nbsp;  
			<input type="reset"  value="Limpar" name="limpar"> &nbsp; 
			<a href="..\index.php"><input type="button" value="Voltar"></a>
		</td>
  </tr>    
</table>
</form>

<center><h1><br> M&Uacute;SICAS J&Aacute; CADASTRADAS: 

<?php
		echo "<table width='1000px'><tr>";
		echo "<td width=40%><h2><br> T&Iacute;TULO </b><p></td>";
		echo "<td width=15%><h2><br> G&Eacute;NERO </b><p></td>";
		echo "<td width=30%><h2><br> INT&Eacute;PRETE PRINCIPAL </b><p></td>";
		echo "<td width=15%><h2><br> A&Ccedil;&Otilde;ES </b><p></td>";
		echo "</tr></table>";

	$comandoSql = "SELECT musica.codigo, musica.genero, musica.titulo, artista.nome FROM barranca.musica, barranca.artista WHERE artista.cod_artista=musica.cantor1 and musica.titulo<> '' ORDER BY musica.titulo";

	$consulta = mysqli_query($con, "$comandoSql");
	while ($cliente = mysqli_fetch_object($consulta))
	{
		echo "<table width='1000px' border=1><tr>";
		echo "<td width=40%> $cliente->titulo </td>";
		echo "<td width=15%> $cliente->genero </td>";
		echo "<td width=30%> $cliente->nome </td>";
		echo "<td width=15%>";
		echo "<br><form name='form2' method='post' action='deleta_musica.php'>";
		echo "<input type='hidden' name='deleta' value='$cliente->codigo'>"	;
		echo "<center><input type='submit' value='Excluir'></form>";

		echo "<form name='form3' method='post' action='altera_musica.php'>";
		echo "<input type='hidden' name='altera' value='$cliente->codigo'>"	;
		echo "<center><input type='submit' value='Alterar'></form>";
		echo "</td></tr></table>";
	}
		echo "</body>";
		include('..\rodape.php');
		echo "</html>";
?>