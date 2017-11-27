<?
include_once("struct/auth.php");
if (!session_is_registered("evento")) { 
	header("Location: session_seleciona_evento.php?url=inscricao_export_mailing_csv.php&orga_id=0&configurado=1");
} else {

	include_once("struct/csv_header.php");
	
	include_once('../classes/class.inscricao.php');
	include_once('../classes/service.inscricao.php');
	
	/* @var $eventoAtual Evento */
	/* @var $eventoConfiguracaoAtual Configuracao */
	$inscricaoService = new InscricaoService();
	$inscricaoList = $inscricaoService->listInscricoesByEvento($eventoAtual->getID(),"ID ASC");
	
	echo " ";
	echo "Nome;";
	echo "Email;";
	echo "DDI;";
	echo "DDD;";
	echo "Fone;";
	echo "Celular;";
	echo "Fax;";
	echo "Endereço;";
	echo "CEP;";
	echo "Bairro;";
	echo "Cidade;";
	echo "Estado;";
	echo "País;";
	echo "Org. Nome;";
	echo "\r\n";
	
	for ($i = 0; $i < count($inscricaoList); $i++) {
		/* @var $inscricao Inscricao */
		$inscricao = $inscricaoList[$i];
	
		echo str_replace(";"," ",$inscricao->getNOME()).";";
		echo str_replace(";"," ",$inscricao->getEMAIL()).";";
		echo str_replace(";"," ",$inscricao->getDDI()).";";
		echo str_replace(";"," ",$inscricao->getDDD()).";";
		echo str_replace(";"," ",$inscricao->getFONE()).";";
		echo str_replace(";"," ",$inscricao->getCELULAR()).";";
		echo str_replace(";"," ",$inscricao->getFAX()).";";
		echo str_replace(";"," ",$inscricao->getENDERECO()).";";
		echo str_replace(";"," ",$inscricao->getCEP()).";";
		echo str_replace(";"," ",$inscricao->getBAIRRO()).";";
		echo str_replace(";"," ",$inscricao->getCIDADE()).";";
		echo str_replace(";"," ",$inscricao->getESTADO()).";";
		echo str_replace(";"," ",$inscricao->getPAIS()).";";
		echo str_replace(";"," ",$inscricao->getORG_NOME()).";";
		echo "\r\n";
	
	};
	
};