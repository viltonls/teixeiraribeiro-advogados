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

<body id="esp">
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
<a href="index.php" id="espnav">Español</a>
</li>
<li>
<a href="../italiano/index.php" id="itanav">Italiano</a>
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
<div id="titulo1" class="tit">CONTACTO</div>
<div class="fundo_menu_internas"><div id="menu_int">
  <p class="menu_internas"><a href="contato.htm" target="_top" class="menu_internas">CONTATO</a>  |  <a href="mapa.htm" target="_top" class="menu_internas">MAPA DE LOCALIZA&Ccedil;&Atilde;O </a>  |  <a href="trabalhe.htm" target="_top" class="menu_internas">TRABALHE CONOSCO</a> | <a href="area_cliente.htm" target="_top" class="menu_internas">ÁREA DO CLIENTE</a></p>
</div></div>
<div class="conteudo">
<div id="texto_int2">
<p class="texto">
<?php

$nome = $_POST['nome'];
$telefone = $_POST['telefone'];
$email = $_POST['email'];
$assunto = $_POST['assunto'];
$mensagem = $_POST['mensagem'];

/* Destinat&aacute;rio */
	/*
$to = "E2PS <koda@e2ps.com.br>";
	*/
$subject = "Contato do Site Teixeira Ribeiro";

/* mensagem */
$message = "
<html>
<head>
 <title>Contato do Site</title>
</head>
<body><font face='arial' size='2'>
__________________________________________________<br><br>
<b>Contato do Site</b><br>
<br>
<b>Nome:</b> $nome <br>
<b>Telefone:</b> $telefone <br>
<b>E-mail:</b> <a href=\"mailto:$email\">$email</a><br>
<b>Assunto:</b> $assunto <br>
<b>Mensagem:</b> $mensagem
<br><br>__________________________________________________
</font>
</body>
</html>
";

/* Para enviar email HTML, voc&ecirc; precisa definir o header Content-type. */
	/*
$headers = "MIME-Version: 1.0\r\n";
$headers .= "Content-type: text/html; charset=iso-8859-1\r\n";
	*/
/* headers adicionais */
	/*
$headers .= "From: $nome <$email>\r\n";
$headers .= 'Bcc: koda@e2ps.com.br' . "\r\n";
	*/
/* Enviar o email */
	/*
if (mail($to, $subject, $message, $headers))
{
echo "$nome seu e-mail foi enviado com sucesso!<br><br>";
echo "Obrigado pelo contato. Em breve, retornaremos.";
}
else
{
echo "Sua mensagem n&atilde;o foi enviada. Tente novamente!";
}
	*/

include_once ('class.phpmailer.php');

// Instantiate your new class
$mail = new PHPMailer;

// Now you only need to add the necessary stuff
$mail->From = "tr@teixeiraribeiro.com";
$mail->Sender = "$email";
//$mail->Return-Path = "pcmso@pcmsocarloschagas.com.br";
//$mail->Reply-To = "$email";
$mail->FromName = "$nome";
$mail->AddAddress("tr@teixeiraribeiro.com", "Teixeira Ribeiro"); //pcmso@ecarloschagas-rs.com.br
//$mail->AddAddress("dennis@conquistacom.com", "Teixeira Ribeiro"); //pcmso@ecarloschagas-rs.com.br
$mail->AddReplyTo("$email", "$nome"); //pcmso@ecarloschagas-rs.com.br
$mail->Subject = "Contato do Site";
$mail->IsHTML(true);
$mail->Body = $message;
//$mail->AddAttachment($_FILES['arquivo']['tmp_name'], $_FILES['arquivo']['name']); // optional name

if (!$mail->Send())
{
	echo "Su mensaje no fué enviada. Intente nuevamente!";
}
else
{
	echo "$nome seu e-mail foi enviado com sucesso!<br><br>";
	echo "Gracias por contactarno. Responderemos pronto.";
}

?></p><br /><br />
</div><br /><br />
<p class="texto"><strong>Teixeira Ribeiro Advogados</strong><br />
  Travessa Francisco de Leonardo Truda, 40/242 | Centro Histórico | CEP 90010-050 | Porto Alegre/RS | Brasil<br />
  fone/fax 55 51 2125.4611<br /><a href="mailto:tr@teixeiraribeiro.com" target="_blank" class="texto">tr@teixeiraribeiro.com</a></p>
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
