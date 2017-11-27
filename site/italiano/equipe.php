<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>TEIXEIRA RIBEIRO ADVOGADOS</title>
<link href="style.css" rel="stylesheet" type="text/css" />
<link href="reset.css" rel="stylesheet" type="text/css" />
<link rel="stylesheet" href="css/nivostyle.css" type="text/css" media="screen" />

<script src="cufon-yui.js"></script>
<script type="text/javascript" src="TraditionellSans_400-TraditionellSans_700.font.js"></script>
<script type="text/javascript">
Cufon.replace('.tit', {
	hover: true
});
Cufon.replace('.tit2', {
	hover: true
});
</script>

    <script type="text/javascript" src="js/jquery-1.7.1.min.js"></script>
	<script type="text/javascript" src="jquery-accordion/jquery.accordion.js"></script> 
    <script type="text/javascript"> 
$(function(){ 
    $('#efeito').accordion({ 
    autoheight:false 
    }); 
}); 
</script>
</head>

<body id="ita">
<!--inicio header-->
<div class="fundo_header">
<div class="container_16">
<div id="logo"><a name="topo" id="topo"></a><a href="index.php"><img src="img/logo_tra.png" alt="Teixeira Ribeiro Advogados" border="0" /></a></div>
<ul id="idiomas">
<li>
<a href="../index.php" id="portnav">Português</a>
</li>
<li>
<a href="../ingles/index.php" id="engnav">English</a>
</li>
<li>
<a href="../espanhol/index.php" id="espnav">Español</a>
</li>
<li>
<a href="index.php" id="itanav">Italiano</a>
</li>
</ul>
</div>
</div>
<!--fim header-->
<!--inicio menu-->
  <div class="fundo_menu">
 <div class="container_16"><iframe width="960" height="44" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="menu.htm"></iframe>
 </div>
 </div>
 <!--fim menu-->
<!--inicio conteudo-->
<div class="fundo_conteudo">
<div class="container_16">
<div id="titulo1" class="tit">STUDIO</div>
<div class="fundo_menu_internas"><div id="menu_int">
  <p class="menu_internas"><a href="escritorio.php" target="_top" class="menu_internas">PRESENTAZIONE</a>  |  <a href="visao.php" target="_top" class="menu_internas">MISSIONE, VISIONE E CODICE DI ETICA </a>  |  <a href="equipe.php" target="_top" class="menu_internas">EQUIPE</a>  |  <a href="parcerias.php" target="_top" class="menu_internas">PARTNERSHIP STRATEGICHE </a><a href="linha.htm" target="_top" class="menu_internas"></a></p>
</div></div>
<div class="conteudo">
<div id="texto_int3">
<p class="tit2">Equipe</p><br /><br />
  <p class="texto">Cliccate sul nome di ogni professionista per vederne il curriculum.</p>
  <br /><br />
  <div id="geral"> 
<div id="efeito"> 
<?php

include ("conexao_teste.php");

//Consulta com a tabela
//Selecione tudo de nomedatabela em ordem crescente pelo nome 
$consulta=mysql_query("SELECT * FROM equipe_ita where equipe_socio='1' order by id_equipe asc"); 

?>
                    <?
//Fazendo o looping para exibição de todos registros que contiverem em nomedatabela
while ($dados = mysql_fetch_array($consulta)) {

$id_equipe=$dados['id_area'];
$equipe_nome=$dados['equipe_nome'];
$equipe_curriculo=$dados['equipe_curriculo'];
$equipe_area=$dados['equipe_area'];
$equipe_idioma=$dados['equipe_idioma'];
$equipe_email=$dados['equipe_email'];
$equipe_socio=$dados['equipe_socio'];

$idioma = $equipe_idioma;
$idiomadecode = utf8_decode($idioma);

$area = $equipe_area;
$areadecode = utf8_decode($area);

$nome = $equipe_nome;
$nomedecode = utf8_decode($nome);

?> 
<a href="#" class="texto_curriculo"> <strong><? echo"$nomedecode";?></strong></a> 
    <div> 
    <span class="texto_curriculo"><? echo"$equipe_curriculo";?><br />
<br />
<strong>Principali Settori di Pratica: </strong><br />
<? echo"$areadecode";?><br /><br />
<strong>Lingue: </strong> <br />
<? echo"$idiomadecode";?> </span><br /><br />
<a class="texto_curriculo" href="mailto:<? echo"$equipe_email";?>" target="_blank"><? echo"$equipe_email";?></a></p>
    <br />
<p><img src="img/friso2.png" /></p>
<br /><br />
    </div> 
 
 <? } ?>
 
    <?php

include ("conexao_teste.php");

//Consulta com a tabela
//Selecione tudo de nomedatabela em ordem crescente pelo nome 
$consulta=mysql_query("SELECT * FROM equipe_ita where equipe_socio='0' order by id_equipe asc"); 

?>
                    <?
//Fazendo o looping para exibição de todos registros que contiverem em nomedatabela
while ($dados = mysql_fetch_array($consulta)) {

$id_equipe=$dados['id_area'];
$equipe_nome=$dados['equipe_nome'];
$equipe_curriculo=$dados['equipe_curriculo'];
$equipe_area=$dados['equipe_area'];
$equipe_idioma=$dados['equipe_idioma'];
$equipe_email=$dados['equipe_email'];
$equipe_socio=$dados['equipe_socio'];

$idioma = $equipe_idioma;
$idiomadecode = utf8_decode($idioma);

$area = $equipe_area;
$areadecode = utf8_decode($area);

$nome = $equipe_nome;
$nomedecode = utf8_decode($nome);

?> 
<a href="#" class="texto_curriculo"> <? echo"$nomedecode";?></a> 
    <div> 
    <span class="texto_curriculo"><? echo"$equipe_curriculo";?><br />
<br />
<strong>Principali Settori di Pratica: </strong><br />
<? echo"$areadecode";?><br /><br />
<strong>Lingue: </strong> <br />
<? echo"$idiomadecode";?> </span><br /><br />
<a class="texto_curriculo" href="mailto:<? echo"$equipe_email";?>" target="_blank"><? echo"$equipe_email";?></a></p>
    <br />
<p><img src="img/friso2.png" /></p>
<br /><br />
    </div> 
 
 <? } ?>
  
</div>  
</div>
</div>
<!--<div id="bt_topo"><a href="#topo"><img src="img/bt_topo.png" border="0" /></a></div>-->
</div>
</div>
<!--fim conteudo-->

<!--inicio rodape-->
  <div class="fundo_rodape">
 <div class="container_16"><iframe width="960" height="234" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="rodape.htm"></iframe>
 </div>
 </div>
 <!--fim rodape-->

</div>
</div>
</body>
</html>
