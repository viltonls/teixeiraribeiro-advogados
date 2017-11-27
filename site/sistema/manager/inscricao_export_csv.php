<?
include_once("struct/auth.php");
if (!session_is_registered("evento")) { 
	header("Location: session_seleciona_evento.php?url=inscricao_export_csv.php&orga_id=0&configurado=1");
} else {

	include_once("struct/csv_header.php");
	
	include_once('../classes/class.inscricao.php');
	include_once('../classes/service.inscricao.php');
	
	/* @var $eventoAtual Evento */
	/* @var $eventoConfiguracaoAtual Configuracao */
	$inscricaoService = new InscricaoService();
	$inscricaoList = $inscricaoService->listInscricoesByEvento($eventoAtual->getID(),"ID ASC");

	echo "\r\n";

	for ($i = 0; $i < count($inscricaoList); $i++) {
		/* @var $inscricao Inscricao */
		$inscricao = $inscricaoList[$i];
		echo $inscricao->getID().";";
		if ($inscricao->getDATA() != "0000-00-00 00:00:00") 
			echo date("d/m/Y h:m",strtotime($inscricao->getDATA())).";";
		else
			echo ";";
		echo $inscricao->getSTATUS().";";
		echo str_replace(";"," ",$inscricao->getNOME()).";";
		echo str_replace(";"," ",$inscricao->getCRACHA()).";";
		echo $inscricao->getID_EXTERNO().";";
		echo $inscricao->getSEXO().";";
		if ($inscricao->getNASCIMENTO() != "0000-00-00 00:00:00") 
			echo date("d/m/Y",strtotime($inscricao->getNASCIMENTO())).";";
		else
			echo ";";
		echo str_replace(";"," ",$inscricao->getCPF_PASSAPORTE()).";";
		echo str_replace(";"," ",$inscricao->getREGISTRO_PROF()).";";
		echo str_replace(";"," ",$inscricao->getESPECIALIDADE()).";";
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
		echo $inscricao->getTIPO().";";
		echo $inscricao->getCATEGORIA().";";
		echo $inscricao->getVALOR().";";
		echo $inscricao->getSTATUS_PGTO().";";
		echo $inscricao->getFORMA_PGTO().";";
		echo str_replace(";"," ",$inscricao->getORG_NOME()).";";
		echo str_replace(";"," ",$inscricao->getORG_CARGO()).";";
		echo str_replace(";"," ",$inscricao->getORG_FONE()).";";
		echo str_replace(";"," ",$inscricao->getORG_CNPJ()).";";
		echo str_replace(";"," ",$inscricao->getORG_ENDERECO()).";";
		echo str_replace(";"," ",$inscricao->getORG_CIDADE()).";";
		echo str_replace(";"," ",$inscricao->getORG_WEBSITE()).";";
		echo str_replace(";"," ",$inscricao->getACOMP()).";";
		echo str_replace(";"," ",str_replace("\n"," ",$inscricao->getOBS())).";";
		echo str_replace(";"," ",$inscricao->getTEXTO_1()).";";
		echo str_replace(";"," ",$inscricao->getTEXTO_2()).";";
		echo str_replace(";"," ",$inscricao->getTEXTO_3()).";";
		echo str_replace(";"," ",$inscricao->getTEXTO_4()).";";
		echo str_replace(";"," ",$inscricao->getTEXTO_5()).";";
		echo str_replace(";"," ",$inscricao->getTEXTO_6()).";";
		echo str_replace(";"," ",$inscricao->getTEXTO_7()).";";
		echo str_replace(";"," ",$inscricao->getTEXTO_8()).";";
		echo str_replace(";"," ",$inscricao->getTEXTO_9()).";";
		echo str_replace(";"," ",$inscricao->getTEXTO_10()).";";
		echo $inscricao->getBOOL_1().";";
		echo $inscricao->getBOOL_2().";";
		echo $inscricao->getBOOL_3().";";
		echo $inscricao->getBOOL_4().";";
		echo $inscricao->getBOOL_5().";";
		echo $inscricao->getBOOL_6().";";
		echo $inscricao->getBOOL_7().";";
		echo $inscricao->getBOOL_8().";";
		echo $inscricao->getBOOL_9().";";
		echo $inscricao->getBOOL_10().";";
		echo $inscricao->getBOOL_11().";";
		echo $inscricao->getBOOL_12().";";
		echo $inscricao->getBOOL_13().";";
		echo $inscricao->getBOOL_14().";";
		echo $inscricao->getBOOL_15().";";
		echo $inscricao->getBOOL_16().";";
		echo $inscricao->getBOOL_17().";";
		echo $inscricao->getBOOL_18().";";
		echo $inscricao->getBOOL_19().";";
		echo $inscricao->getBOOL_20().";";
		echo $inscricao->getCURSO_1().";";
		echo $inscricao->getCURSO_2().";";
		echo $inscricao->getCURSO_3().";";
		echo $inscricao->getCURSO_4().";";
		echo $inscricao->getCURSO_5().";";
		echo $inscricao->getCURSO_6().";";
		echo $inscricao->getCURSO_7().";";
		echo $inscricao->getCURSO_8().";";
		echo $inscricao->getCURSO_9().";";
		echo $inscricao->getCURSO_10().";";
		echo $inscricao->getCURSO_11().";";
		echo $inscricao->getCURSO_12().";";
		echo $inscricao->getCURSO_13().";";
		echo $inscricao->getCURSO_14().";";
		echo $inscricao->getCURSO_15().";";
		echo $inscricao->getCURSO_16().";";
		echo $inscricao->getCURSO_17().";";
		echo $inscricao->getCURSO_18().";";
		echo $inscricao->getCURSO_19().";";
		echo $inscricao->getCURSO_20().";";
		echo $inscricao->getCURSO_21().";";
		echo $inscricao->getCURSO_22().";";
		echo $inscricao->getCURSO_23().";";
		echo $inscricao->getCURSO_24().";";
		echo $inscricao->getCURSO_25().";";
		echo $inscricao->getCURSO_26().";";
		echo $inscricao->getCURSO_27().";";
		echo $inscricao->getCURSO_28().";";
		echo $inscricao->getCURSO_29().";";
		echo $inscricao->getCURSO_30().";";
		echo "\r\n";
	
	};
	
};