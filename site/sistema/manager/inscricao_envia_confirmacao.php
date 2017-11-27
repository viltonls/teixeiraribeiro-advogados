<? include_once("struct/auth.php"); ?>
<?
include_once("struct/struct_top.php");

include_once('../classes/class.inscricao.php');
include_once('../classes/service.inscricao.php');
include_once('../classes/class.email.php');

/* @var $eventoAtual Evento */
/* @var $eventoConfiguracaoXMLAtual ConfiguracaoXML */

// Insere vari�veis do Form na Classe
$inscricao = new Inscricao();
$inscricaoService = new InscricaoService();

// Se � uma edi��o, preenche o objeto com dados do BD
if ($_REQUEST["id"]) {
	$inscricao = $inscricaoService->loadInscricaoById($_REQUEST["id"],$eventoAtual->getID());
}

if ($inscricao->getID()) {
	
	if ($inscricao->getEMAIL()) {
		
		$bodyHtml  = '<div style="font-family:arial, helvetica; font-size:10pt; line-height: 150%" align="left">';
		$bodyHtml .= '<b>' . $eventoAtual->getNOME() . '</b><br><br>';
		$bodyHtml .= 'Prezado(a) '.$inscricao->getNOME().', sua inscri��o foi confirmada.<br><br>';
		$bodyHtml .= 'Confira seus dados abaixo e, em caso de d�vidas, entre em contato atrav�s do email '.$eventoConfiguracaoXMLAtual->getEmailInscricao().'<br>';
		$bodyHtml .= 'ou, se preferir, atrav�s do telefone +55 (51) 3226.3111.<br>';
		$bodyHtml .= '<br>';
		$bodyHtml .= '<b>Nome Completo:</b> ' . $inscricao->getNOME() . '<br>';
		$bodyHtml .= '<b>Nome Crach�:</b> ' . $inscricao->getCRACHA() . '<br>';
		$bodyHtml .= '<b>Id. no Evento:</b> ' . $inscricao->getID() . '<br>';
		//$bodyHtml .= '<b>:</b> ' . $inscricao->get . '<br>';
		$bodyHtml .= '</div>';
		
		$bodyText = $bodyHtml;
		$bodyText  = str_replace("<br>","\n",$bodyText);
		$bodyText  = strip_tags($bodyText);
		
		$email = new Email();
		$email->setFromName("aviso@eventoonline.com");
		$email->setFromEmail("aviso@eventoonline.com");
		if ($eventoConfiguracaoAtual->getEMAIL_INSC())
			$email->setReplyTo($eventoConfiguracaoXMLAtual->getEmailInscricao());
		else
			$email->setReplyTo($eventoConfiguracaoXMLAtual->getEmailInscricao());
		$email->setMsgHtml($bodyHtml);
		$email->setMsgText($bodyText);
		$email->setSubject($eventoAtual->getNOME());
		$email->setToEmail($inscricao->getEMAIL());
		
		//echo "Responder para ".$eventoConfiguracaoAtual->getEMAIL_INSC()."<br><br>";
		//echo "Email para ".$inscricao->getEMAIL()."<br><br>";
		//echo $bodyHtml."<br><br>";

		if ($email->send()) {
			echo "Mensagem enviada para '".$eventoConfiguracaoXMLAtual->getEmailInscricao()."'!";
		} else {
			echo "Erro ao enviar mensagem para '".$eventoConfiguracaoXMLAtual->getEmailInscricao()."'... Possivelmente o e-mail esteja incorreto.";
		}
/*
*/
	} else {
		echo "Inscri��o de ID '".$_REQUEST["id"]."' n�o possui email cadastrado.";
	}
	
} else {
	echo "Inscri��o de ID '".$_REQUEST["id"]."' n�o encontrada.";
}


?>
<? include_once("struct/struct_bottom.php")?>