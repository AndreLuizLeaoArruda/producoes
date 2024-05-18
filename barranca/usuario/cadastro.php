<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<title> CADASTRO DE USU&Aacute;RIO </title>
<link rel="stylesheet" href="..\style.css" type="text/css" media="screen">

<!-- VERIFICAR SE OS CAMPOS FORAM PREENCHIDOS  -->
<script src="..\mascara.js"></script><!--Utilizado para digita somente números -->
<style type="text/css">
		input.maiuscula {
		text-transform: uppercase;
	}
</style>


<style type="text/css">
		input.minuscula {
		text-transform: lowercase;
	}
</style>

<script language="JavaScript">


	function valida_dados(form1)
	{
		if (form1.nome.value=="")
		{
		alert("Por favor digite o Nome do Usuário.");
		form1.nome.focus();
		return false;
		}

		if (form1.senha1.value=="")
		{
		alert("Por favor digite a Senha.");
		form1.senha1.focus();
		return false;
		}

		if (form1.senha2.value=="")
		{
		alert("Por favor re-digite a Senha.");
		form1.senha2.focus();
		return false;
		}

		
		var $senha11 = form1.senha1.value;
		if (form1.senha2.value != $senha11)
		{
		alert("As senhas devem ser iguais, por favor tente novamente");
		form1.senha1.value='';
		form1.senha2.value='';
		form1.senha1.focus();
		return false;
		}

		if (form1.nivel.value=="0")
		{	
		alert("Por favor selecione o Nível de Acesso.");
		return false;
		}
		else 
		{
		return true;
	}
}
</script>
</head>

<body>
<center><h1> CADASTRO DE USU&Aacute;RIO: 

<form name="form1" method="post" action="sql_cadastro.php" onSubmit="return valida_dados(this)">
<center>

<table width="600px">
  <tr>
    <td colspan="2"><h2><br> PREENCHA OS CAMPOS: <p></td>
  </tr>
  <tr>
    <td colspan="2">


	<h2> &nbsp; Nome Completo: <input type="text" class="maiuscula" onkeyup="this.value=retira_acentos(this.value);" name="nome" size="50">

	<h2> &nbsp; Digitar Senha: &nbsp;&nbsp; &nbsp;<input type="password" name="senha1" size="50">

	<h2> &nbsp; Repetir Senha: &nbsp;&nbsp; &nbsp;<input type="password" name="senha2" size="50">

<P>
	&nbsp; N&iacute;vel de Acesso:&nbsp;
<?php
				include "conectar.php";

				$result = mysqli_query($conexao, "SELECT * FROM nivel ORDER BY cod_nivel") or die (mysqli_error($conexao));
				$dropdown = "<select name='nivel' value='0'>";

				while($row = mysqli_fetch_assoc($result)) {
				$dropdown .= "\r\n<option value='{$row['cod_nivel']}'>{$row['descricao']}</option>";
				}
				$dropdown .= "\r\n</select>";
				echo $dropdown;
				
				?>
&nbsp; &nbsp; &nbsp;
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

<center><h1><br> USU&Aacute;RIOS J&Aacute; CADASTRADOS: <br>

<?php
		echo "<table width='600px' border=1><tr>";
		echo "<td width=60%><h2>NOME </b></td>";
		echo "<td width=40%><h2>N&Iacute;VEL DE ACESSO </b></td>";
		echo "</tr></table>";

	$comandoSql = ("SELECT login.usuario, nivel.descricao FROM login, nivel WHERE login.nivel=nivel.cod_nivel AND login.usuario <> '' AND login.usuario<> 'admin' ORDER BY nivel.descricao");

	$consulta = mysqli_query($conexao, "$comandoSql");
	while ($cliente = mysqli_fetch_object($consulta))
	{
		echo "<table width='600px' border=1><tr>";
		echo "<td width=60%><h7> $cliente->usuario </h7></td>";
		echo "<td width=40%><h7> $cliente->descricao </h7></td>";
		echo "</tr></table>";
	}
		echo "</body>";
		include ('..\rodape.php');
		echo "</html>";
?>