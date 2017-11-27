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
<div id="titulo1" class="tit">CONTATO</div>
<div class="fundo_menu_internas"><div id="menu_int">
  <p class="menu_internas"><a href="contato.htm" target="_top" class="menu_internas">CONTATO</a>  |  <a href="mapa.htm" target="_top" class="menu_internas">MAPA DE LOCALIZA&Ccedil;&Atilde;O </a>  |  <a href="trabalhe.htm" target="_top" class="menu_internas">TRABALHE CONOSCO</a> | <a href="area_cliente.htm" target="_top" class="menu_internas">ÁREA DO CLIENTE</a></p>
</div></div>
<div class="conteudo">
<div id="texto_int2">
<p class="tit2">Trabalhe Conosco </p>
<br /><br />
<p class="texto">
<?php
if (getenv("REQUEST_METHOD") == "POST")
{

set_time_limit(0);
##########################################################
################## aqui os dados para mudar posteriormente
$nome      = $_POST['nome'];
//$nome_pessoa      = $_POST['nome_pessoa'];
//$ip        = $_POST['ip'];
$email     = $_POST['email'];
$cargo  = $_POST['cargo'];
$assunto   = $_POST['assunto'];
$fone      = $_POST['telefone'];
$anexos    = 0;
$boundary  = "XYZ-" . date("dmYis") . "-ZYX";

$mens  = "--$boundary\n";    
$mens .= "Content-Transfer-Encoding: 8bits\n";
$mens .= "Content-Type: text/html; charset=\"ISO-8859-1\"\n\n"; 
//$mens .= "<b>Assunto:</b>$assunto\n\n\n<br>";
$mens .= "<b>Nome:</b>$nome\n<br>";
//$mens .= "<b>IP da maquina solicitante:</b>$ip\n<br>";
$mens .= "<b>Telefone:</b>$fone\n<br>";
$mens .= "<b>Email:</b>$email\n<br>";
$mens .= "<b>Cargo Pretendido:</b>$cargo\n";
$mens .= "--$boundary\n";
##################################################################

for($i = 0; $i < count($_FILES["file"]["name"]); $i++)
{
    if(is_uploaded_file($_FILES["file"]["tmp_name"][$i])){
        $fp = fopen($_FILES["file"]["tmp_name"][$i], "rb");
        $anexo = chunk_split(base64_encode(fread($fp, $_FILES["file"]["size"][$i])));         
        fclose($fp);

        $mens .= "Content-Type: ".$_FILES["file"]["type"][$i]."\n name=\"".$_FILES["file"]["name"][$i]."\"\n";
        $mens .= "Content-Disposition: attachment; filename=\"".$_FILES["file"]["name"][$i]."\"\n";        
        $mens .= "Content-transfer-encoding:base64\n\n"; 
        $mens .= $anexo."\n";
        
        if($i + 1 == count($_FILES["file"]["name"])) 
            $mens.= "--$boundary--"; 
        else 
            $mens.= "--$boundary\n"; 
        
        if($_FILES["file"]['error'][$i] == 0) {
            $anexos++;
        }        
    }    
}

$headers  = "MIME-Version: 1.0\n";
$headers .= "Date: ".date("D, d M Y H:i:s O")."\n";
$headers .= "From: \"$nome\" <".$email.">\r\n";
$headers .= "Content-type: multipart/mixed; boundary=\"$boundary\"\r\n";


if(mail("tr@teixeiraribeiro.com", $assunto, $mens, $headers)){ //tr@teixeiraribeiro.com
    echo "O email foi enviado com sucesso! <br> $anexos arquivo(s) anexo(s) enviado com sucesso! <br><br> Obrigado pelo contato. Em breve, retornaremos!";
} else {
    echo "Nao foi possivel enviar o email";
}    
}

?>
</p>
</div>
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
