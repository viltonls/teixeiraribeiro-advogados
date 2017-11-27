<? include_once("struct/auth.php"); ?>
<?
include_once("struct/struct_top.php");

include_once('../classes/class.avaliador.php');
include_once('../classes/service.avaliador.php');
include_once('../classes/class.email.php');

/* @var $eventoAtual Evento */
/* @var $eventoConfiguracaoAtual Configuracao */
/* @var $eventoConfiguracaoXMLAtual ConfiguracaoXML */

// Insere variáveis do Form na Classe
$avaliador = new Avaliador();

// Se é uma edição, preenche o objeto com dados do BD
if ($_REQUEST["id"]) {
	$avaliador->select($_REQUEST["id"]);
}

$bodyHtml  = '<div style="font-family:arial, helvetica; font-size:10pt; line-height: 150%" align="left">';
$bodyHtml .= '<b>' . $eventoAtual->getNOME() . '</b><br><br>';
$bodyHtml .= $eventoConfiguracaoXMLAtual->getTrabalhoEmailAvaliadorConvite("PT");
$bodyHtml .= '<br><br>';
$bodyHtml .= '<b>Link:</b> <a href="http://www.eventoonline.com/review">http://www.eventoonline.com/review</a><br>';
$bodyHtml .= '<b>Evento:</b> ' . $eventoConfiguracaoAtual->getALIAS() . '<br>';
$bodyHtml .= '<b>E-Mail:</b> ' . $avaliador->getLOGIN() . '<br>';
$bodyHtml .= '<b>Senha:</b> ' . $avaliador->getSENHA() . '<br>';
$bodyHtml .= '</div>';

$bodyText = $bodyHtml;
$bodyText  = str_replace("<br>","\n",$bodyText);
$bodyText  = strip_tags($bodyText);

$email = new Email();
$email->setFromName("aviso@eventoonline.com");
$email->setFromEmail("aviso@eventoonline.com");
if ($eventoConfiguracaoXMLAtual->getEmailTrabalho())
	$email->setReplyTo($eventoConfiguracaoXMLAtual->getEmailTrabalho());
$email->setMsgHtml($bodyHtml);
$email->setMsgText($bodyText);
$email->setSubject($eventoAtual->getNOME());
$email->setToEmail($avaliador->getLOGIN());

if ($email->send()) {
	echo "Mensagem enviada com sucesso para '".$avaliador->getLOGIN()."'";
} else {
	echo "Erro ao enviar mensagem para '".$avaliador->getLOGIN()."'.<br><br> Possivelmente o e-mail esteja incorreto.";
}
	$data = date("Y-m-d H:i:s",mktime(date('H'),date('i'),date('s'),date('m'),date('d'),date('Y'))); // agora
	$avaliador->setDATA_CONVITE($data);
	$avaliador->save();

// Preenche os dados editados

?>
<? include_once("struct/struct_bottom.php")?>