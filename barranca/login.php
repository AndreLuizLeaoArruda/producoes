<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<title> ACESSO AO SISTEMA </title>
<link rel="stylesheet" href="style3.css" type="text/css">


<!-- VERIFICAR SE OS CAMPOS FORAM PREENCHIDOS  -->

<script language="JavaScript">


	function valida_dados(form1)
	{
		if (form1.usuario.value=="")
		{
		alert("Por favor selecione um Usu\u00e1rio.");
		form1.usuario.focus();
		return false;
		
		}

		if (form1.password1.value=="")
		{
		alert("Por favor digite uma senha.");
		form1.password1.focus();
		return false;
		}

		else {
	
	return true;

	}
	
}
</script>
</head>

<body>

<center><h1> ACESSO AO SISTEMA: </h1>

<form name="form1" method="post" action="validacao.php" onSubmit="return valida_dados(this)">
<center>

<table width="800px">

  <tr>
    <td colspan="2"><h2 align=center> PREENCHA OS CAMPOS: </h2></td>
  </tr>
  <tr>
    <td align="center" colspan="2">


	<h3> Usu&aacute;rio: 

<?php
	include "conectar.php";
	session_start(); 

		$query = "SELECT * FROM login where usuario <> 'admin'";
		$result = mysqli_query($con, $query);
		$dropdown = "<select name='usuario'>";

				while($row = mysqli_fetch_assoc($result)) {
				$dropdown .= "\r\n<option value='{$row['usuario']}'>{$row['usuario']}</option>";
				}
				$dropdown .= "\r\n</select>";
				echo $dropdown;
				?>


	<h3> Senha:   &nbsp; &nbsp;<input type="password" name="password1" size="28"><p>
<p>


	<input type="submit" value="Confirmar" > <input type="reset"  value="Limpar" name="limpar">
    </td>
  </tr>
</table>
</form>
<?php include('rodape.php'); ?>

</body></html>