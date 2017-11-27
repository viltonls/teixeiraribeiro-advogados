<?
/*
include_once("struct/auth.php");
if (!session_is_registered("evento")) { 
	header("Location: session_seleciona_evento.php?url=inscricao_export_csv.php&orga_id=0&configurado=1");
} else {
*/
	$even_id = $_REQUEST["even_id"];
	include_once("struct/xml_header.php");
	
	include_once('../classes/class.inscricao.php');
	include_once('../classes/service.inscricao.php');
	
	/* @var $eventoAtual Evento */
	/* @var $eventoConfiguracaoAtual Configuracao */
	$inscricaoService = new InscricaoService();
	$inscricaoList = $inscricaoService->listInscricoesByEvento($even_id,"ID ASC");

	echo "<?xml version=\"1.0\" encoding=\"ISO-8859-1\"?>\n";
	echo "<inscricoes>\n";

	for ($i = 0; $i < count($inscricaoList); $i++) {

		/* @var $inscricao Inscricao */
		$inscricao = $inscricaoList[$i];

		if ($_REQUEST["lastid"] == "" || $inscricao->getID() > $_REQUEST["lastid"] ) {
			
			echo "\t<inscricao>\n";
	
			echo "\t\t<data>".date("d/m/Y h:m",strtotime($inscricao->getDATA()))."</data>\n";
			echo "\t\t<status>".$inscricao->getSTATUS()."</status>\n";
			echo "\t\t<id_externo>".$inscricao->getID()."</id_externo>\n";
			echo "\t\t<nome>".$inscricao->getNOME()."</nome>\n";
			echo "\t\t<cracha>".$inscricao->getCRACHA()."</cracha>\n";
			echo "\t\t<sexo>".$inscricao->getSEXO()."</sexo>\n";
			echo "\t\t<nascimento>".date("d/m/Y",strtotime($inscricao->getNASCIMENTO()))."</nascimento>\n";
			echo "\t\t<cpf_passaporte>".$inscricao->getCPF_PASSAPORTE()."</cpf_passaporte>\n";
			echo "\t\t<registro_prof>".$inscricao->getREGISTRO_PROF()."</registro_prof>\n";
			echo "\t\t<especialidade>".$inscricao->getESPECIALIDADE()."</especialidade>\n";
			echo "\t\t<email>".$inscricao->getEMAIL()."</email>\n";
			echo "\t\t<ddi>".$inscricao->getDDI()."</ddi>\n";
			echo "\t\t<ddd>".$inscricao->getDDD()."</ddd>\n";
			echo "\t\t<fone>".$inscricao->getFONE()."</fone>\n";
			echo "\t\t<celular>".$inscricao->getCELULAR()."</celular>\n";
			echo "\t\t<fax>".$inscricao->getFAX()."</fax>\n";
			echo "\t\t<endereco>".$inscricao->getENDERECO()."</endereco>\n";
			echo "\t\t<cep>".$inscricao->getCEP()."</cep>\n";
			echo "\t\t<bairro>".$inscricao->getBAIRRO()."</bairro>\n";
			echo "\t\t<cidade>".$inscricao->getCIDADE()."</cidade>\n";
			echo "\t\t<estado>".$inscricao->getESTADO()."</estado>\n";
			echo "\t\t<pais>".$inscricao->getPAIS()."</pais>\n";
			echo "\t\t<tipo>".$inscricao->getTIPO()."</tipo>\n";
			echo "\t\t<categoria>".$inscricao->getCATEGORIA()."</categoria>\n";
			echo "\t\t<valor>".$inscricao->getVALOR()."</valor>\n";
			echo "\t\t<status_pgto>".$inscricao->getSTATUS_PGTO()."</status_pgto>\n";
			echo "\t\t<forma_pgto>".$inscricao->getFORMA_PGTO()."</forma_pgto>\n";
			echo "\t\t<org_nome>".str_replace("&","",$inscricao->getORG_NOME())."</org_nome>\n";
			echo "\t\t<org_fone>".$inscricao->getORG_FONE()."</org_fone>\n";
			echo "\t\t<org_cnpj>".$inscricao->getORG_CNPJ()."</org_cnpj>\n";
			echo "\t\t<org_endereco>".$inscricao->getORG_ENDERECO()."</org_endereco>\n";
			echo "\t\t<org_cidade>".$inscricao->getORG_CIDADE()."</org_cidade>\n";
			echo "\t\t<org_website>".$inscricao->getORG_WEBSITE()."</org_website>\n";
			echo "\t\t<acomp>".$inscricao->getACOMP()."</acomp>\n";
			echo "\t\t<obs>".str_replace("\n"," ",$inscricao->getOBS())."</obs>\n";
			echo "\t\t<texto_1>".str_replace("&","",$inscricao->getTEXTO_1())."</texto_1>\n";
			echo "\t\t<texto_2>".str_replace("&","",$inscricao->getTEXTO_2())."</texto_2>\n";
			echo "\t\t<texto_3>".str_replace("&","",$inscricao->getTEXTO_3())."</texto_3>\n";
			echo "\t\t<texto_4>".str_replace("&","",$inscricao->getTEXTO_4())."</texto_4>\n";
			echo "\t\t<texto_5>".str_replace("&","",$inscricao->getTEXTO_5())."</texto_5>\n";
			echo "\t\t<texto_6>".str_replace("&","",$inscricao->getTEXTO_6())."</texto_6>\n";
			echo "\t\t<texto_7>".str_replace("&","",$inscricao->getTEXTO_7())."</texto_7>\n";
			echo "\t\t<texto_8>".str_replace("&","",$inscricao->getTEXTO_8())."</texto_8>\n";
			echo "\t\t<texto_9>".str_replace("&","",$inscricao->getTEXTO_9())."</texto_9>\n";
			echo "\t\t<texto_10>".str_replace("&","",$inscricao->getTEXTO_10())."</texto_10>\n";
			echo "\t\t<bool_1>".$inscricao->getBOOL_1()."</bool_1>\n";
			echo "\t\t<bool_2>".$inscricao->getBOOL_2()."</bool_2>\n";
			echo "\t\t<bool_3>".$inscricao->getBOOL_3()."</bool_3>\n";
			echo "\t\t<bool_4>".$inscricao->getBOOL_4()."</bool_4>\n";
			echo "\t\t<bool_5>".$inscricao->getBOOL_5()."</bool_5>\n";
			echo "\t\t<bool_6>".$inscricao->getBOOL_6()."</bool_6>\n";
			echo "\t\t<bool_7>".$inscricao->getBOOL_7()."</bool_7>\n";
			echo "\t\t<bool_8>".$inscricao->getBOOL_8()."</bool_8>\n";
			echo "\t\t<bool_9>".$inscricao->getBOOL_9()."</bool_9>\n";
			echo "\t\t<bool_10>".$inscricao->getBOOL_10()."</bool_10>\n";
			echo "\t\t<bool_11>".$inscricao->getBOOL_11()."</bool_11>\n";
			echo "\t\t<bool_12>".$inscricao->getBOOL_12()."</bool_12>\n";
			echo "\t\t<bool_13>".$inscricao->getBOOL_13()."</bool_13>\n";
			echo "\t\t<bool_14>".$inscricao->getBOOL_14()."</bool_14>\n";
			echo "\t\t<bool_15>".$inscricao->getBOOL_15()."</bool_15>\n";
			echo "\t\t<bool_16>".$inscricao->getBOOL_16()."</bool_16>\n";
			echo "\t\t<bool_17>".$inscricao->getBOOL_17()."</bool_17>\n";
			echo "\t\t<bool_18>".$inscricao->getBOOL_18()."</bool_18>\n";
			echo "\t\t<bool_19>".$inscricao->getBOOL_19()."</bool_19>\n";
			echo "\t\t<bool_20>".$inscricao->getBOOL_20()."</bool_20>\n";
			echo "\t\t<curso_1>".$inscricao->getCURSO_1()."</curso_1>\n";
			echo "\t\t<curso_2>".$inscricao->getCURSO_2()."</curso_2>\n";
			echo "\t\t<curso_3>".$inscricao->getCURSO_3()."</curso_3>\n";
			echo "\t\t<curso_4>".$inscricao->getCURSO_4()."</curso_4>\n";
			echo "\t\t<curso_5>".$inscricao->getCURSO_5()."</curso_5>\n";
			echo "\t\t<curso_6>".$inscricao->getCURSO_6()."</curso_6>\n";
			echo "\t\t<curso_7>".$inscricao->getCURSO_7()."</curso_7>\n";
			echo "\t\t<curso_8>".$inscricao->getCURSO_8()."</curso_8>\n";
			echo "\t\t<curso_9>".$inscricao->getCURSO_9()."</curso_9>\n";
			echo "\t\t<curso_10>".$inscricao->getCURSO_10()."</curso_10>\n";
			echo "\t\t<curso_11>".$inscricao->getCURSO_11()."</curso_11>\n";
			echo "\t\t<curso_12>".$inscricao->getCURSO_12()."</curso_12>\n";
			echo "\t\t<curso_13>".$inscricao->getCURSO_13()."</curso_13>\n";
			echo "\t\t<curso_14>".$inscricao->getCURSO_14()."</curso_14>\n";
			echo "\t\t<curso_15>".$inscricao->getCURSO_15()."</curso_15>\n";
			echo "\t\t<curso_16>".$inscricao->getCURSO_16()."</curso_16>\n";
			echo "\t\t<curso_17>".$inscricao->getCURSO_17()."</curso_17>\n";
			echo "\t\t<curso_18>".$inscricao->getCURSO_18()."</curso_18>\n";
			echo "\t\t<curso_19>".$inscricao->getCURSO_19()."</curso_19>\n";
			echo "\t\t<curso_20>".$inscricao->getCURSO_20()."</curso_20>\n";
			echo "\t\t<curso_21>".$inscricao->getCURSO_21()."</curso_21>\n";
			echo "\t\t<curso_22>".$inscricao->getCURSO_22()."</curso_22>\n";
			echo "\t\t<curso_23>".$inscricao->getCURSO_23()."</curso_23>\n";
			echo "\t\t<curso_24>".$inscricao->getCURSO_24()."</curso_24>\n";
			echo "\t\t<curso_25>".$inscricao->getCURSO_25()."</curso_25>\n";
			echo "\t\t<curso_26>".$inscricao->getCURSO_26()."</curso_26>\n";
			echo "\t\t<curso_27>".$inscricao->getCURSO_27()."</curso_27>\n";
			echo "\t\t<curso_28>".$inscricao->getCURSO_28()."</curso_28>\n";
			echo "\t\t<curso_29>".$inscricao->getCURSO_29()."</curso_29>\n";
			echo "\t\t<curso_30>".$inscricao->getCURSO_20()."</curso_30>\n";	
			echo "\t</inscricao>\n";
		};
	
	};
	
	echo "</inscricoes>\n";
	
//};