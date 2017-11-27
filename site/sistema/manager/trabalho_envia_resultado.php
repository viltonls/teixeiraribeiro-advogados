<? include_once("struct/auth.php"); ?>
<?
include_once("struct/struct_top.php");

include_once('../classes/class.trabalho.php');
include_once('../classes/service.trabalho.php');
include_once('../classes/class.avaliacao.php');
include_once('../classes/service.avaliacao.php');
include_once('../classes/class.email.php');
include_once('../classes/dto.avaliacao_trabalho.php');

/* @var $eventoAtual Evento */
/* @var $eventoConfiguracaoAtual Configuracao */
/* @var $eventoConfiguracaoXMLAtual ConfiguracaoXML */

// Insere variáveis do Form na Classe
$trabalho = new Trabalho();
$trabalhoService = new TrabalhoService();
$trab_id = $_REQUEST["trab_id"];

$avaliacaoService = new AvaliacaoService();

// Se é uma edição, preenche o objeto com dados do BD
if ($trab_id) {
	$trabalho = $trabalhoService->loadTrabalhoById($trab_id,$eventoAtual->getID());
}

if ($trabalho->getID()) {
	switch ($trabalho->getSTATUS()) {
	
	    case $trabalho->STATUS_MUITO_BOM:
			$textoEmail = $eventoConfiguracaoXMLAtual->getTrabalhoEmailAceitoPT();
			break;
		case $trabalho->STATUS_EXCELENTE:
			$textoEmail = $eventoConfiguracaoXMLAtual->getTrabalhoEmailAceitoPT();
			break;
			
		case $trabalho->STATUS_ACEITO:
			$textoEmail = $eventoConfiguracaoXMLAtual->getTrabalhoEmailAceitoPT();
			break;
		case $trabalho->STATUS_ACEITO_COM_RESTRICOES:
			$textoEmail = $eventoConfiguracaoXMLAtual->getTrabalhoEmailAceitoComRestricoesPT();
			break;
		case $trabalho->STATUS_REJEITADO:
			$textoEmail = $eventoConfiguracaoXMLAtual->getTrabalhoEmailRejeitadoPT();
			break;
	
		default:
			break;
	}
	
	if ($trabalho->getAPRES_EMAIL()) {
		$bodyHtml  = '<div style="font-family:arial, helvetica; font-size:10pt; line-height: 150%" align="left">';
		$bodyHtml .= '<b>' . $eventoAtual->getNOME() . '</b><br><br>';
		$bodyHtml .= $trabalho->getAPRES_NOME().',<br>';
		$bodyHtml .= $textoEmail.'<br><br>';
		$bodyHtml .= '<b>ID ' . $trabalho->getID() . '</b><br>';
		$bodyHtml .= '<b>' . $trabalho->getTITULO() . '</b><br>';
		
		$avaliacaoList = $avaliacaoService->loadAvaliacaoTrabalhoFiltered("",$trabalho->getID(),"",$eventoAtual->getID());
		for ($i = 0; $i < sizeof($avaliacaoList); $i++) {
			/* @var $avaliacao AvaliacaoTrabalhoDTO */
			$avaliacao = $avaliacaoList[$i];
			$bodyHtml .= '<div style="background:#F0F0F0;">';
			//$bodyHtml .= '<b>Avaliação '.$i.'</b><br>';
			//$bodyHtml .= nl2br($avaliacao->getCOMENTARIO()).'<br>';
			$bodyHtml .= '</div><br>';
		}
		
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
		$email->setToEmail($trabalho->getAPRES_EMAIL());
		
		//echo "Responder para ".$eventoConfiguracaoAtual->getEMAIL_INSC()."<br><br>";
		//echo "Email para ".$trabalho->getAPRES_EMAIL()."<br><br>";
		//echo $bodyHtml."<br><br>";

		if ($email->send()) {
			echo "Mensagem enviada com sucesso para '".$trabalho->getAPRES_EMAIL()."'";
		} else {
			echo "Erro ao enviar mensagem para '".$trabalho->getAPRES_EMAIL()."'.<br><br> Possivelmente o e-mail esteja incorreto.";
		}

	} else {
		//echo "Erro ao enviar email: Trabalho de ID '".$trab_id."' não possui email do apresentador cadastrado.";
		//ESTA LINHA ACIMA É A ORIGINAL TUDO QUE ESTÁ ABAIXO SERVE PARA TRABALHOS QUE NÃO POSSUEM APRESENTADOR CADASTRADO
		$bodyHtml  = '<div style="font-family:arial, helvetica; font-size:10pt; line-height: 150%" align="left">';
		$bodyHtml .= '<b>' . $eventoAtual->getNOME() . '</b><br><br>';
		$bodyHtml .= $trabalho->getAUTOR_NOME().',<br>';
		$bodyHtml .= $textoEmail.'<br><br>';
		$bodyHtml .= '<b>ID ' . $trabalho->getID() . '</b><br>';
		$bodyHtml .= '<b>' . $trabalho->getTITULO() . '</b><br>';
		
		$avaliacaoList = $avaliacaoService->loadAvaliacaoTrabalhoFiltered("",$trabalho->getID(),"",$eventoAtual->getID());
		for ($i = 0; $i < sizeof($avaliacaoList); $i++) {
			/* @var $avaliacao AvaliacaoTrabalhoDTO */
			$avaliacao = $avaliacaoList[$i];
			$bodyHtml .= '<div style="background:#F0F0F0;">';
			//$bodyHtml .= '<b>Avaliação '.$i.'</b><br>';
			//$bodyHtml .= nl2br($avaliacao->getCOMENTARIO()).'<br>';
			$bodyHtml .= '</div><br>';
		}
		
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
		$email->setToEmail($trabalho->getAUTOR_EMAIL());
		
		//echo "Responder para ".$eventoConfiguracaoAtual->getEMAIL_INSC()."<br><br>";
		//echo "Email para ".$trabalho->getAPRES_EMAIL()."<br><br>";
		//echo $bodyHtml."<br><br>";

		if ($email->send()) {
			echo "Mensagem enviada com sucesso para '".$trabalho->getAUTOR_EMAIL()."'";
		} else {
			echo "Erro ao enviar mensagem para '".$trabalho->getAUTOR_EMAIL()."'.<br><br> Possivelmente o e-mail esteja incorreto.";
		}
		//AQUI TERMINA O QUE SERVE PARA TRABALHOS QUE NÃO POSSUEM APRESENTADOR CADASTRADO
	}
	
} else {
	echo "Trabalho de ID '".$trab_id."' não foi encontrado.";
}


?>
<? include_once("struct/struct_bottom.php")?>