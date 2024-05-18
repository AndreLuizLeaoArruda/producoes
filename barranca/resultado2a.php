<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<title> RESULTADO FINAL DO FESTIVAL DA BARRANCA </title>
<link rel="stylesheet" href="style.css" type="text/css" media="screen">
<meta name="GENERATOR" content="Microsoft FrontPage 4.0">
<meta name="ProgId" content="FrontPage.Editor.Document">
<script src="sorttable.js" type="text/javascript"></script>
<style media="print">
.botao {
display: none;
}
</style>

</head>

<body onLoad='if (domok) initTable("table0")'>
<!-- <form name="form1" method="post" action="sql_ativar.php" onSubmit="return valida_dados(this)"> -->

<center>

<?php
	include "conectar.php";
	session_start();
mysqli_query($con, "DROP TABLE resultadoa");

mysqli_query($con, "CREATE TEMPORARY TABLE resultadoa ( titulo varchar(50), interprete1 varchar (40), interprete2 varchar (40), media_final text, media_melodia text, media_apresentacao text, media_letra text)");



$musicas=mysqli_query($con, "SELECT * FROM musica");
$sql_musicas=mysqli_num_rows($musicas);


$listaj=mysqli_query($con, "SELECT * FROM login WHERE nivel='3'");
$jurados=mysqli_num_rows($listaj);


$total=$jurados * $sql_musicas;


$votamus=mysqli_query($con, "SELECT * FROM votamus");
$sql_votamus=mysqli_num_rows($votamus);
//echo $sql_votamus . "<br>";


//$sql_votamus='30';

If ($total > $sql_votamus) {

echo "<br><br><br><br>";
echo "<h6> Ainda n&atilde;o encerraram-se todas as vota&ccedil;&otilde;es.";
echo "<br><br>";
echo "Por favor volte e aguarde!";
echo "<br><br>";

}  else   {

echo "<h2> CLASSIFICA&Ccedil;&Atilde;O FINAL DAS M&Uacute;SICAS";



$f = $sql_musicas;
$d = 0;
$w = 0;
$x = 1;

while ($d < $f) {
	$w = $w + 1;
	$n = 0;
	$nl = 0;
	$nm = 0;
	$np = 0;


	$ct=mysqli_query($con, "SELECT musica.titulo, media_final, media_letra, media_melodia, media_presenta, artista.nome FROM artista, musica, votamus WHERE votamus.codigo_musica=musica.codigo AND codigo_musica='$w' AND artista.cod_artista=musica.cantor2");
	while ($cliente= mysqli_fetch_object($ct))
	{
	if (empty($cliente->nome)){
	$cantor2='';
	}else{	
	$cantor2= ", " . $cliente->nome;
	}
	}




	$media=mysqli_query($con, "SELECT musica.titulo, media_final, media_letra, media_melodia, media_presenta, artista.nome FROM artista, musica, votamus WHERE votamus.codigo_musica=musica.codigo AND codigo_musica='$w' AND artista.cod_artista=musica.cantor1");
	

		
	while ($cliente = mysqli_fetch_object($media))
	{
	$y= "Media" . $x;
	$y . " = "; 

	$titulo=$cliente->titulo;
	$cantor1=$cliente->nome;
	$x=$x+1;

	$m=$cliente->media_final;
	$n=$n+$m;

	$ml=$cliente->media_letra;
	$nl=$nl+$ml;

	$mm=$cliente->media_melodia;
	$nm=$nm+$mm;

	$mp=$cliente->media_presenta;
	$np=$np+$mp;


	
	
	}
$media_final = $n / 3;
$media_letra = $nl / 3;
$media_melodia = $nm / 3;
$media_apresentacao = $np / 3;


$d = $d + 1;

//echo "A música " . $titulo  . ", interpretada por " . $cantor;
//echo ", recebeu a nota final " .  number_format($media_final, 2, ',', '.');
//echo "<br>";

//echo $cantor1 . "<br>";
//echo $cantor2 . "<br>";
//	echo "<table width='1000px' class='sortable' border=1><tr><td width=30% ALIGN=center>";
//	echo $titulo;
//	echo "</td><td align=center width=30%>";
//	echo $cantor;
//	echo "</td><td align=center width=10%>";
	     $ff = number_format($media_final, 2, ',', '.');
//	echo "</td><td align=center width=10%>";
	     $ll = number_format($media_melodia, 2, ',', '.');
//	echo "</td><td align=center width=10%>";
	     $mmm = number_format($media_apresentacao, 2, ',', '.');
//	echo "</td><td align=center width=10%>";
	     $aa = number_format($media_letra, 2, ',', '.');

//	echo "</td></tr></table>";
		
mysqli_query($con, "INSERT INTO resultadoa (titulo, interprete1, interprete2, media_final, media_melodia, media_apresentacao, media_letra) VALUES ('$titulo', '$cantor1', '$cantor2' , '$ff', '$ll', '$mmm', '$aa')");

//($titulo, $cantor, $media_final, $media_letra, $media_melodia, $media_apresentacao)");
//	echo $titulo;
}

	
	echo "<table width='1250px' class='sortable' border=1><tr><td width=25% ALIGN=center>";
	echo "<h8><B><br> T&Iacute;TULO </b><p>";
	echo "</td><td width=35% ALIGN=center>";
	echo "<h8><br> INT&Eacute;RPRETES </b><p>";
	echo "</td><td width=8% ALIGN=center>";
	echo "<h8><br> M&Eacute;DIA FINAL </b><p>";
	echo "</td><td width=12% ALIGN=center>";
	echo "<h8><br> M&Eacute;DIA<BR>APRESENTA&Ccedil;&Atilde;O </b>";
	echo "</td><td width=10% ALIGN=center>";
	echo "<h8><br> M&Eacute;DIA LETRA </b><p>";
	echo "</td><td width=10% ALIGN=center>";
	echo "<h8><br> M&Eacute;DIA<BR>MELODIA </b><p>";
	echo "</td></tr></table>";

$fim=mysqli_query($con, "SELECT * FROM resultadoa WHERE titulo<>'DESTERRO' ORDER BY media_final DESC, media_apresentacao DESC, media_letra DESC, media_melodia DESC");
	

		
	while ($cliente = mysqli_fetch_object($fim))
	{
	echo "<table width='1250px' class='sortable' border=1><tr><td width=25% ALIGN=center>";
	echo "<br><h8>" . $cliente->titulo . "</h6>";
	echo "</td><td align=center width=35%>";
	echo "<br><h8>" . $cliente->interprete1 . $cliente->interprete2;
	echo "</td><td align=center width=8%>";
	echo "<br><h8>" . $cliente->media_final;
	echo "</td><td align=center width=12%>";
	echo "<br><h8>" . $cliente->media_apresentacao;
	echo "</td><td align=center width=10%>";
	echo "<br><h8>" . $cliente->media_letra;
	echo "</td><td align=center width=10%>";
	echo "<br><h8>" . $cliente->media_melodia;
	echo "</td></tr></table>";
	}
}
	echo "<br><input type='button' class='botao' name='imprimir' value='Imprimir' onclick='window.print();'>";
	echo "</body>";
	include('rodape.php');	
	echo "</html>";
?>