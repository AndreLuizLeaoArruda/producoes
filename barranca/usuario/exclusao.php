<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<title> EXCLUS&Atilde;O DE USU&Aacute;RIO </title>
<link rel="stylesheet" href="..\style.css" type="text/css" media="screen">
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
		if (form1.nome1.value=="")
		{
		alert ("Por favor selecione o Usuário a ser excluído");
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
<center><h1> EXCLUS&Atilde;O DE USU&Aacute;RIO: </h1> 
<H5> Selecione o usu&aacute;rio a ser exclu&iacute;do </h5>

<form name="form1" method="post" action="sql_exclusao.php" onSubmit="return valida_dados(this)">
<center>

<table width="560px">
  <tr>
    <td colspan="2"><h2></td>
  </tr>
  <tr>
    <td colspan="2"><h2><br> &nbsp; Selecione um Usu&aacute;rio: 

		<?php
				include "..\conectar.php";

				$query = "SELECT * FROM login WHERE usuario<>'admin'";
				$result = mysqli_query($con, $query) or die(mysqli_error());
				$dropdown = "<select name='nome1'>";

				while($row = mysqli_fetch_assoc($result)) {
				$dropdown .= "\r\n<option value='{$row['usuario']}'>{$row['usuario']}</option>";
				}
				$dropdown .= "\r\n</select>";
				echo $dropdown;
				?>
	<p>
	  </td>
  </tr>
	<tr>
  	<td colspan="2">
			<input type="submit" value="Excluir"> &nbsp; &nbsp;  &nbsp; 
			<a href="..\index.php"><input type="button" value="Voltar"></a>
		</td>
  </tr>    
</table>
</form>


<center><h1><br> USU&Aacute;RIOS CADASTRADOS: <br>

<?php
		echo "<table width='600px' border=1><tr>";
		echo "<td width=60%><h2>NOME </b></td>";
		echo "<td width=40%><h2>N&Iacute;VEL DE ACESSO </b></td>";
		echo "</tr></table>";

	$comandoSql = ("SELECT login.usuario, nivel.descricao FROM login, nivel WHERE login.nivel=nivel.cod_nivel AND login.usuario<>'admin' AND login.usuario<>'' ORDER BY nivel.descricao");

	$consulta = mysqli_query($con, $comandoSql);
	while ($cliente = mysqli_fetch_object($consulta))
	{
		echo "<table width='600px' border=1><tr>";
		echo "<td width=60%><h7> $cliente->usuario </h7></td>";
		echo "<td width=40%><h7> $cliente->descricao </h7></td>";
		echo "</tr></table>";
	}
		echo "</body>";
		include('..\rodape.php');
		echo "</html>"
?>