<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<title> ACESSO AO SISTEMA DE CADASTRO DE VISITANTES </title>
<link rel="stylesheet" href="style.css" type="text/css" media="screen">


<!-- VERIFICAR SE OS CAMPOS FORAM PREENCHIDOS  -->

<script language="JavaScript">


	function valida_dados(form1)
	{
		if (form1.usuario.value=="")
		{
		alert("Por favor selecione um Usu&aacute;rio.");
		form1.usuario.focus();
		return false;
		
		}

		if (form1.password1.value=="")
		{
		alert("Por favor digite uma senha.");
		form1.descricao.focus();
		return false;
		}

		else {
	
	return true;

	}
	
}
</script>
</head>

<body>


<center><h1> ACESSO AO SISTEMA DE CADASTRO DE VISITANTES: 

<form name="form1" method="post" action="validacao.php" onSubmit="return valida_dados(this)">
<center>

<table width="800px">

  <tr>
    <td colspan="2" bgcolor="#dffccc" align=center><h2><br> PREENCHA OS CAMPOS: </td>
  </tr>
  <tr>
    <td align="center" colspan="2" bgcolor="#dffcaa"><br>


	<h3> Usu&aacute;rio: 

<?php
	include "conectar.php";
	session_start(); 

		$query = "SELECT * FROM login where usuario <> 'admin' and acesso <> '1' ORDER BY usuario";
		$result = mysqli_query($con, $query);
		$dropdown = "<select name='usuario'>";

				while($row = mysqli_fetch_assoc($result)) {
				$dropdown .= "\r\n<option value='{$row['usuario']}'>{$row['usuario']}</option>";
				}
				$dropdown .= "\r\n</select>";
				echo $dropdown;
				?>


	<h3> Senha:   &nbsp; &nbsp;<input type="password" name="password1" size="34"><p>
<p>


	<input type="submit" value="Confirmar" > <input type="reset"  value="Limpar" name="limpar">
    </td>
  </tr>
</table>
</form>

<?php include('rodape.php'); ?>

</body></html>