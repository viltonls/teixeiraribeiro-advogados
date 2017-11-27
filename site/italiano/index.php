<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>TEIXEIRA RIBEIRO ADVOGADOS</title>
<link href="style.css" rel="stylesheet" type="text/css" />
<link href="reset.css" rel="stylesheet" type="text/css" />
<link rel="stylesheet" href="css/nivostyle.css" type="text/css" media="screen" />

    <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.5/jquery.min.js"></script>
	<!--<script type="text/javascript" src="js/jquery-1.7.1.min.js"></script>-->
    <script type="text/javascript" src="js/jquery.nivo.slider.pack.js"></script>

   <script type="text/javascript" src="js/jquery.cycle.all.js"></script>
 <script type="text/javascript">
    $(window).load(function() {
        $('#slider').nivoSlider({
		pauseTime: 5000, // How long each slide will show
		effect: 'slideInLeft',
});

    });

$(function() {
    $('#slideshow').cycle({
        fx:     'fade',
        speed:  'slow',
        timeout: 0,
        pager:  '#nav',
	        after: onAfter,

		
        pagerAnchorBuilder: function(idx, slide) {
            // return sel string for existing anchor
            return '#nav li:eq(' + (idx) + ') a';
        }
    });
});
function onAfter(curr, next, opts, fwd) {
 var $ht = $(this).height();

 //set the container's height to that of the current slide
 $(this).parent().animate({height: $ht});
}
	
	</script>
<script src="cufon-yui.js"></script>
<script type="text/javascript" src="TraditionellSans_400-TraditionellSans_700.font.js"></script>
<script type="text/javascript">
Cufon.replace('.tit_capa', {
	hover: true
});
Cufon.replace('.tit_capa2', {
	hover: true
});
</script>
</head>

<body id="ita">
<!--inicio header-->
<div class="fundo_header">
<div class="container_16">
<div id="logo"><img src="img/logo_tra.png" alt="Teixeira Ribeiro Advogados" /></div>

<div class="linkedin">
    <a href="http://www.linkedin.com/company/teixeira-ribeiro-advogados" target="_blank">
        <img src="img/linkedin.png" alt="Linkedin" />
    </a>
</div>

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
 <!--inicio slider-->
<div class="fundo_slider">
<div class="container_16">
<!-- nivo slider--><div class="slider-wrapper theme-default">
            <div class="ribbon"></div>
            <div id="slider" class="nivoSlider">
                <a href="escritorio.php"><img src="img/slide1.jpg" alt="" /></a>
				<a href="escritorio.php"><img src="img/slide2.jpg" alt="" /></a>
                <a href="escritorio.php"><img src="img/slide3.jpg" alt="" /></a>
                <a href="escritorio.php"><img src="img/slide4.jpg" alt="" /></a>
				<!--<a href="http://www.fourinvendas.com.br/detalhes.php?codigo_imovel=FI110">
                <img src="images/banner01.jpg" alt="" data-transition="slideInLeft" /></a>-->
            </div>
        </div><!-- end nivo slider-->
</div>
</div>
</div>
<!--fim slider-->
 <!--inicio espaco-->
<div class="fundo_espaco">
<div class="container_16">
</div>
</div>
<!--fim espaco-->
 <!--inicio areas-->
<div class="fundo_areas">
<div class="container_16">
<div id="chamada_capa"><p class="tit_capa">SETTORI DI AZIONE</p></div>
<ul id="nav">
        <li><a href="#"><img src="img/bt1.png" /></a></li>
        <li><a href="#"><img src="img/bt2.png" /></a></li>
        <li><a href="#"><img src="img/bt3.png" /></a></li>
        </ul>
		<br />
<div id="slideshow" class="pics">
<div class="slide1">
<div id="box_slide">
<div id="conteudo_box_slide">
<p><a href="areas.php#tributario" target="_top"><img src="img/img-direito-tributario-capa.jpg" alt="Tribut&aacute;rio" border="0" /></a></p>
<br />
<p class="tit_capa2"><a href="areas.php#tributario" target="_top" class="tit_capa2">Tributario</a></p>
<br />
<p class="link_capa"><a href="areas.php#tributario" target="_top" class="link_capa">vedere inoltre ></a></p>
</div>
</div>
<div id="box_slide">
<div id="conteudo_box_slide">
<p><a href="areas.php#societario"><img src="img/img-direito-societario-capa.jpg" alt="Direito Societ&aacute;rio" width="200" height="100" border="0" /></a></p>
<br />
<p class="tit_capa2"><a href="areas.php#societario" class="tit_capa2">Societario</a></p>
<br /><p class="link_capa"><a href="areas.php#societario" class="link_capa">vedere inoltre ></a></p>
</div>
</div>
<div id="box_slide">
<div id="conteudo_box_slide">
<p><a href="areas.php#contratual"><img src="img/img-direito-contrato-capa.jpg" alt="Contratual" width="200" height="100" border="0" /></a></p>
<br />
<p class="tit_capa2"><a href="areas.php#contratual" class="tit_capa2">Contrattuale</a></p>
<br /><p class="link_capa"><a href="areas.php#contratual" class="link_capa">vedere inoltre ></a></p>
</div>
</div>
<div id="box_slide_right">
<div id="conteudo_box_slide">
<p><a href="areas.php#patrimonial"><img src="img/img-direito-bancario-capa.jpg" alt="Planejamento Patrimonial e Sucess&oacute;rio" border="0" /></a></p>
<br /><p class="tit_capa2"><a href="areas.php#patrimonial" class="tit_capa2">Pianificazione Patrimoniale e di Successione</a></p>
<br />
<p class="link_capa"><a href="areas.php#patrimonial" class="link_capa">vedere inoltre ></a></p>
</div>
</div>
</div>

<div class="slide2">
<div id="box_slide">
<div id="conteudo_box_slide">
<p><a href="areas.php#consumidor"><img src="img/img-direito-consumidor-capa.jpg" alt="Consumidor" width="200" height="100" border="0" /></a></p>
<br />
<p class="tit_capa2"><a href="areas.php#consumidor" class="tit_capa2">Consumatore</a></p>
<br />
<p class="link_capa"><a href="areas.php#consumidor" class="link_capa">vedere inoltre ></a></p>
</div>
</div>
<div id="box_slide">
<div id="conteudo_box_slide">
<p><a href="areas.php#resp_civil"><img src="img/img-responsabilidade-civil-capa.jpg" alt="Responsabilidade Civil" width="200" height="100" border="0" /></a></p>
<br />
<p class="tit_capa2"><a href="areas.php#resp_civil" class="tit_capa2">Responsabilità Civile</a> </p>
<br />
<p class="link_capa"><a href="areas.php#resp_civil" class="link_capa">vedere inoltre ></a></p>
</div>
</div>
<div id="box_slide">
<div id="conteudo_box_slide">
<p><a href="areas.php#contencioso"><img src="img/img-contencioso_corporativo-capa.jpg" alt="Contencioso Corporativo em Escala" width="200" height="100" border="0" /></a></p>
<br />
<p class="tit_capa2"><a href="areas.php#contencioso" class="tit_capa2">Contenzioso Corporativo in Scala</a></p>
<br />
<p class="link_capa"><a href="areas.php#contencioso" class="link_capa">vedere inoltre ></a></p>
</div>
</div>
<div id="box_slide_right">
<div id="conteudo_box_slide">
<p><a href="areas.php#governanca"><img src="img/img-governanca-capa.jpg" alt="Governan&ccedil;a Corporativa" width="200" height="100" border="0" /></a></p>
<br /><p class="tit_capa2"><a href="areas.php#governanca" class="tit_capa2"><em>Governance Corporativa</em>, Etica e <em>Compliance</em></a></p>
<br />
<p class="link_capa"><a href="areas.php#governanca" class="link_capa">vedere inoltre ></a></p>
</div>
</div>
</div>

<div class="slide3">
<div id="box_slide">
<div id="conteudo_box_slide">
<p><a href="areas.php#ambiental"><img src="img/img-direito-ambiental-capa.jpg" alt="Ambiental" width="200" height="100" border="0" /></a></p>
<br />
<p class="tit_capa2"><a href="areas.php#ambiental" class="tit_capa2">Ambientale</a></p>
<br />
<p class="link_capa"><a href="areas.php#ambiental" class="link_capa">vedere inoltre ></a></p>
</div>
</div>
<div id="box_slide">
<div id="conteudo_box_slide">
<p><a href="areas.php#familia"><img src="img/img-direito-familia-capa.jpg" alt="Fam&iacute;lia e Sucess&otilde;es" width="200" height="100" border="0" /></a></p>
<br />
<p class="tit_capa2"><a href="areas.php#familia" class="tit_capa2">Famiglia e Successioni</a>  </p>
<br />
<p class="link_capa"><a href="areas.php#familia" class="link_capa">vedere inoltre ></a></p>
</div>
</div>
</div>
</div>
<p><img src="img/friso_capa.png" /></p><br /><br />
</div>

</div>
</div>
<!--fim areas-->
 <!--inicio boxes-->
<div class="fundo_boxes">
<div class="container_16">

<div id="box">  <p class="tit_capa"><a href="area_cliente.htm" target="_top" class="tit_capa">AREA <strong>DEL CLIENTE</strong></a></p>
  <br />
<p><img src="img/friso.png" /></p><br />
<p class="texto_capa"><a href="area_cliente.htm" target="_top" class="texto_capa">Seguite le informazioni relative all’andamento del vostro processo. </a></p>
<br />
<div id="bt_capa"><a href="area_cliente.htm" target="_top"><img src="img/bt_saiba_mais.png" alt="saiba mais responsabilidade social Teixeira Ribeiro Advogados" width="100" height="29" border="0" /></a></div>
</div>

<div id="box"><p class="tit_capa">NOTIZIE E PUBBLICAZIONI</p>
<br />
<p><img src="img/friso.png" /></p><br />
<p class="texto_capa"><a href="informativo.php" target="_top" class="texto_capa">Leggete qui gli articoli e le ultime novità della Teixeira Ribeiro Avvocati.</a></p>
<br />
<div id="bt_capa"><a href="informativo.php" target="_top"><img src="img/bt_saiba_mais.png" alt="saiba mais not&iacute;cias Teixeira Ribeiro Advogados" width="100" height="29" border="0" /></a></div>
</div>

<div id="box_right">
  <p class="tit_capa"><a href="equipe.php" target="_top" class="tit_capa">EQUIPE </a></p>
  <br />
<p><img src="img/friso.png" /></p><br />
<p class="texto_capa"><a href="equipe.php" target="_top" class="texto_capa">Conoscete i  professionisti che formano il corpo giuridico dello studio. </a></p>
<br />
<div id="bt_capa"><a href="equipe.php" target="_top"><img src="img/bt_saiba_mais.png" alt="saiba mais responsabilidade social Teixeira Ribeiro Advogados" width="100" height="29" border="0" /></a></div>
</div>
</div>
</div>
<!--fim boxes-->
<!--inicio rodape-->
  <div class="fundo_rodape">
 <div class="container_16"><iframe width="960" height="215" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="rodape.htm"></iframe>
 <div id="assinatura"><a href="http://www.lexmarketing.com.br" target="_blank"><img src="img/logo-lex-marketing.png" border="0" /></a></div>
 </div>
 </div>
 <!--fim rodape-->

</div>
</div>
</body>
</html>
