<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<title> CADASTRO DE ARTISTA </title>
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
		if (form1.nome.value=="")
		{
		alert("Por favor digite o Nome do Artista.");
		form1.nome.focus();
		return false;
		}

		if (form1.cidade.value=="")
		{
		alert("Por favor digite a Cidade de Origem do Artista.");
		form1.cidade.focus();
		return false;
		}

		if (form1.estado.value=="")
		{
		alert("Por favor digite a sigla do Estado.");
		form1.estado.focus();
		return false;
		}
		else {

	return true;
	}
}
</script>
</head>

<body>
<center><h1> CADASTRO DE ARTISTA: 

<form name="form1" method="post" action="confere_cadastro.php" onSubmit="return valida_dados(this)">
<center>

<table width="700px">
  <tr>
    <td colspan="2"><h2><br> PREENCHA OS CAMPOS: <p></td>
  </tr>
  <tr>
    <td colspan="2">
	<h2> &nbsp; Nome: <input type="text" class="maiuscula" onkeyup="this.value=retira_acentos(this.value);" name="nome" size="79" value=""><p> 

	<h2> &nbsp; Cidade: <input type="text" class="maiuscula" onkeyup="this.value=retira_acentos(this.value);"  name="cidade" size="30">

	&nbsp; Estado: <input type="text" maxlength="2" class="maiuscula" onkeyup="this.value=retira_acentos(this.value);" name="estado" size="2" value=""><p> 

	<h2> &nbsp; Telefone Fixo: <input type="text" onkeyup="this.value=Telefone(this.value);"  name="fone_fixo" size="18">

	     &nbsp; Telefone M&oacute;vel: <input type="text"onkeyup="this.value=Telefone(this.value);" name="fone_movel" size="18">
<p> 

	<h2> &nbsp; E-mail: <input type="text" class="minuscula" name="email" size="78"><p>

		</td>
	</tr>
	<tr>
    <td align=center colspan="2" bgcolor="#dffcaa">
			<input type="submit" value="Cadastrar"> &nbsp;  
			<input type="reset"  value="Limpar" name="limpar"> &nbsp; 
			<a href="../index.php"><input type="button" value="Voltar"></a>
		</td>
  </tr>    
</table>
</form>

<center><h1><br> ARTISTAS J&Aacute; CADASTRADOS: 

<?php
		echo "<table width='1000px' border=1><tr><td width=35% ALIGN=center>";
		echo "<h2><br> NOME </b><p>";
		echo "</td><td width=30% ALIGN=center>";
		echo "<h2><br> CIDADE </b><p>";
		echo "</td><td width=25% ALIGN=center>";
		echo "<h2><br> E-MAIL </b><p>";
		echo "</td><td width=10% ALIGN=center>";
		echo "<h2><br> A&Ccedil;&Otilde;ES </b><p>";
		echo "</td></tr></table>";

	include "..\conectar.php";

	$comandoSql = "SELECT * FROM barranca.artista WHERE nome <> '' ORDER BY nome";

	$consulta = mysqli_query($con,"$comandoSql");
	while ($cliente = mysqli_fetch_object($consulta))
	{
		echo "<table width='1000px' border=1><tr>";
		echo "<td width=35%>$cliente->nome</td>";
		echo "<td width=30%>$cliente->cidade</td>";
		echo "<td width=25%>$cliente->email</td>";
		echo "<td width=10%>";
		echo "<br><form name='form2' method='post' action='deleta_artista.php'>";
		echo "<input type='hidden' name='nome2' value='$cliente->cod_artista'>"	;
		echo "<center><input type='submit' value='Excluir'></form>";
		echo "<form name='form3' method='post' action='altera_artista.php'>";
		echo "<input type='hidden' name='nome3' value='$cliente->cod_artista'>"	;
		echo "<center><input type='submit' value='Alterar'></form>";
		echo "</td></tr></table>";
	}
?>
</body>

<?php include('..\rodape.php'); ?>

</html>