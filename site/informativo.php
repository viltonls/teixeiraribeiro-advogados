<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>TEIXEIRA RIBEIRO ADVOGADOS</title>
<link href="style.css" rel="stylesheet" type="text/css" />
<link href="reset.css" rel="stylesheet" type="text/css" />
<link rel="stylesheet" href="css/nivostyle.css" type="text/css" media="screen" />

    <script type="text/javascript" src="js/jquery-1.7.1.min.js"></script>
    <script type="text/javascript" src="js/jquery.nivo.slider.pack.js"></script>

    <script type="text/javascript">
    $(window).load(function() {
        $('#slider').nivoSlider({
		pauseTime: 9000, // How long each slide will show
		effect: 'slideInLeft',
});

    });
	</script>
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
</head>

<body id="port">
<!--inicio header-->
<div class="fundo_header">
<div class="container_16">
<div id="logo"><a name="topo" id="topo"></a><a href="index.php"><img src="img/logo_tra.png" alt="Teixeira Ribeiro Advogados" border="0" /></a></div>
<ul id="idiomas">
<li>
<a href="index.htm" id="portnav">Português</a>
</li>
<li>
<a href="./ingles/index.php" id="engnav">English</a>
</li>
<li>
<a href="./espanhol/index.php" id="espnav">Español</a>
</li>
<li>
<a href="./italiano/index.php" id="itanav">Italiano</a>
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
<div id="titulo1" class="tit">NOT&Iacute;CIAS E PUBLICA&Ccedil;&Otilde;ES</div>
<div class="conteudo">
<div id="texto_int3">
<?php

include ("conexao_teste.php");

//Consulta com a tabela
//Selecione tudo de nomedatabela em ordem crescente pelo nome 
$consulta=mysql_query("SELECT * FROM noticias order by noticia_data desc"); 

?>
                    <?
//Fazendo o looping para exibição de todos registros que contiverem em nomedatabela
while ($dados = mysql_fetch_array($consulta)) {

$id_noticia=$dados['id_noticia'];
$noticia_titulo=$dados['noticia_titulo'];
$noticia_data=$dados['noticia_data'];
$noticia_corpo=$dados['noticia_corpo'];
$noticia_doc=$dados['noticia_doc'];

$titulo = $noticia_titulo;
$titulodecode = utf8_decode($titulo);

?> 
<p class="texto"><?= date("d/m/Y",strtotime($noticia_data)) ?></p><br />
<p class="tit3"><a class="tit3" href="sistema/manager/doc_noticia/<? echo"$noticia_doc";?>" target="_blank"><? echo"$titulodecode";?></a></p><br />
<span class="texto"><a href="sistema/manager/doc_noticia/<? echo"$noticia_doc";?>" target="_blank" class="texto"><? echo"$noticia_corpo";?></a><br>
  <br /></span>
  <br />
  <p><br /><br />
  </p>
<? } ?>
  
</div>
<div id="bt_topo"><a href="#topo"><img src="img/bt_topo.png" border="0" /></a></div>
</div>
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
