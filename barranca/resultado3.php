<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<title> RESULTADO FINAL DO FESTIVAL DA BARRANCA </title>
<link rel="stylesheet" href="style.css" type="text/css" media="screen">
<style media="print">
.botao {
display: none;
}
</style>
</head>

<body onLoad='if (domok) initTable("table0")'>
<center>

<?php
	include "conectar.php";
	session_start();
	
mysqli_query($con, "DROP TABLE resultado3");

mysqli_query($con, "CREATE TEMPORARY TABLE resultado3 ( titulo varchar(50), declamador varchar (40), media_final text, media_declamacao text, media_apresentacao text, media_letra text)");

$poesias=mysqli_query($con, "SELECT * FROM poesia");
$sql_poesias=mysqli_num_rows($poesias);

$listaj=mysqli_query($con, "SELECT * FROM login WHERE nivel='3'");
$jurados=mysqli_num_rows($listaj);

$total=$jurados * $sql_poesias;

$votapoe=mysqli_query($con, "SELECT * FROM votapoe");
$sql_votapoe=mysqli_num_rows($votapoe);

If ($total > $sql_votapoe) {

echo "<br><br><br><br>";
echo "<h6> Ainda n&atilde;o encerraram-se todas as vota&ccedil;&otilde;es.";
echo "<br><br>";
echo "Por favor volte e aguarde!";
echo "<br><br>";

}  else   {


echo "<h2> CLASSIFICA&Ccedil;&Atilde;O FINAL DAS POESIAS";
echo "<br>";

$f = $sql_poesias;
$d = 0;
$w = 0;
$x = 1;

while ($d < $f) {
	$w = $w + 1;
	$n = 0;
	$nl = 0;
	$nm = 0;
	$np = 0;

	$media=mysqli_query($con, "SELECT poesia.titulo, media_final, media_letra, media_declama, media_presenta, artista.nome FROM artista, poesia, votapoe WHERE votapoe.codigo_poesia=poesia.codigo AND codigo_poesia='$w' AND artista.cod_artista=poesia.declamador");
	

		
	while ($cliente = mysqli_fetch_object($media))
	{
	$y= "Media" . $x;
	$y . " = "; 

	$titulo=$cliente->titulo;
	$cantor=$cliente->nome;
	$x=$x+1;

	$m=$cliente->media_final;
	$n=$n+$m;

	$ml=$cliente->media_letra;
	$nl=$nl+$ml;

	$mm=$cliente->media_declama;
	$nm=$nm+$mm;

	$mp=$cliente->media_presenta;
	$np=$np+$mp;
	}

$media_final = $n / 3;
$media_letra = $nl / 3;
$media_declama = $nm / 3;
$media_presenta = $np / 3;

$d = $d + 1;

	     $ff = number_format($media_final, 2, ',', '.');

	     $aa = number_format($media_presenta, 2, ',', '.');

	     $dd = number_format($media_declama, 2, ',', '.');

	     $ll = number_format($media_letra, 2, ',', '.');

mysqli_query($con, "INSERT INTO resultado3 (titulo, declamador, media_final, media_declamacao, media_apresentacao, media_letra) VALUES ('$titulo', '$cantor', '$dd', '$ll', '$aa', '$ll')");

}

	echo "<table width='1250px' class='sortable' border=1><tr><td width=30% ALIGN=center>";
	echo "<h2><B><br> T&Iacute;TULO </b>";
	echo "</td><td width=30% ALIGN=center>";
	echo "<h2><br> DECLAMADOR </b>";
	echo "</td><td width=10% ALIGN=center>";
	echo "<h2><br> M&Eacute;DIA FINAL </b>";
	echo "</td><td width=10% ALIGN=center>";
	echo "<h2> M&Eacute;DIA<BR>DECLA-<BR>MA&Ccedil;&Atilde;O </b>";
	echo "</td><td width=10% ALIGN=center>";
	echo "<h2> M&Eacute;DIA<BR>APRESEN-<BR>TA&Ccedil;&Atilde;O </b>";
	echo "</td><td width=10% ALIGN=center>";
	echo "<h2><br> M&Eacute;DIA LETRA </b>";
	echo "</td></tr></table>";

$fim=mysqli_query($con, "SELECT * FROM resultado3 ORDER BY media_final DESC, media_apresentacao DESC, media_declamacao DESC, media_letra DESC");
	
	while ($cliente = mysqli_fetch_object($fim))
	{
	echo "<table width='1250px' class='sortable' border=1><tr><td width=30% ALIGN=center>";
	echo "<br><h8>" . $cliente->titulo	;
	echo "</td><td align=center width=30%>";
	echo "<br><h8>" . $cliente->declamador;
	echo "</td><td align=center width=10%>";
	echo "<br><h8>" . $cliente->media_final;
	echo "</td><td align=center width=10%>";
	echo "<br><h8>" . $cliente->media_declamacao;
	echo "</td><td align=center width=10%>";
	echo "<br><h8>" . $cliente->media_apresentacao;
	echo "</td><td align=center width=10%>";
	echo "<br><h8>" . $cliente->media_letra;
	echo "</td></tr></table>";
	}
}
	echo "<br><input type='button' class='botao' name='imprimir' value='Imprimir' onclick='window.print();'>";
	echo "</body>";
	include('rodape.php');	
	echo "</html>";
?>