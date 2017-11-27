<?
include_once("struct/auth.php");
include_once("struct/struct_functions.php");
include_once('../classes/class.evento.php');
include_once('../classes/service.evento.php');
include_once('../classes/class.inscricao.php');
include_once('../classes/service.inscricao.php');

$evento = new Evento();
$eventoService = new EventoService();
$inscricaoService = new InscricaoService();

// Pega o conteúdo do arquivo
$file_content = file_get_contents($_FILES['file']['tmp_name']);
$file_content = str_replace("'","",$file_content);
$file_content = str_replace('"','',$file_content);
$file_content_array = explode("\n",$file_content);

for ($i = 1; $i < count($file_content_array); $i++) {

	$line_array = explode(";",trim($file_content_array[$i]));

	/* @var $eventoAtual Evento */
	$inscricao = new Inscricao();
	$inscricao->setEVEN_ID($eventoAtual->getID());
	
	$inscricao->setID(transformSingleQuotes(transformSingleQuotes($line_array[0])));
	$inscricao->setDATA(transformSingleQuotes($line_array[1]));
	$inscricao->setSTATUS(transformSingleQuotes($line_array[2]));
	$inscricao->setNOME(transformSingleQuotes($line_array[3]));
	$inscricao->setCRACHA(transformSingleQuotes($line_array[4]));
	$inscricao->setID_EXTERNO(transformSingleQuotes($line_array[5]));
	$inscricao->setSEXO(transformSingleQuotes($line_array[6]));
	if (transformSingleQuotes($line_array[7])) {
		$nascDateArray = explode("/",transformSingleQuotes($line_array[7]));
		if ($nascDateArray[0] && $nascDateArray[1] && $nascDateArray[2]) {
			$nascDate = mktime(0,0,0,$nascDateArray[1],$nascDateArray[0],$nascDateArray[2]);
			$inscricao->setNASCIMENTO(date("Y-m-d h:m:s",$nascDate));
    	}
    }
	$inscricao->setCPF_PASSAPORTE(transformSingleQuotes($line_array[8]));
	$inscricao->setREGISTRO_PROF(transformSingleQuotes($line_array[9]));
	$inscricao->setESPECIALIDADE(transformSingleQuotes($line_array[10]));
	$inscricao->setEMAIL(transformSingleQuotes($line_array[11]));
	$inscricao->setDDI(transformSingleQuotes($line_array[12]));
	$inscricao->setDDD(transformSingleQuotes($line_array[13]));
	$inscricao->setFONE(transformSingleQuotes($line_array[14]));
	$inscricao->setCELULAR(transformSingleQuotes($line_array[15]));
	$inscricao->setFAX(transformSingleQuotes($line_array[16]));
	$inscricao->setENDERECO(transformSingleQuotes($line_array[17]));
	$inscricao->setCEP(transformSingleQuotes($line_array[18]));
	$inscricao->setBAIRRO(transformSingleQuotes($line_array[19]));
	$inscricao->setCIDADE(transformSingleQuotes($line_array[20]));
	$inscricao->setESTADO(transformSingleQuotes($line_array[21]));
	$inscricao->setPAIS(transformSingleQuotes($line_array[22]));
	$inscricao->setTIPO(transformSingleQuotes($line_array[23]));
	$inscricao->setCATEGORIA(transformSingleQuotes($line_array[24]));
	$inscricao->setVALOR(transformSingleQuotes($line_array[25]));
	$inscricao->setSTATUS_PGTO(transformSingleQuotes($line_array[26]));
	$inscricao->setFORMA_PGTO(transformSingleQuotes($line_array[27]));
	$inscricao->setORG_NOME(transformSingleQuotes($line_array[28]));
	$inscricao->setORG_CARGO(transformSingleQuotes($line_array[29]));
	$inscricao->setORG_FONE(transformSingleQuotes($line_array[30]));
	$inscricao->setORG_CNPJ(transformSingleQuotes($line_array[31]));
	$inscricao->setORG_ENDERECO(transformSingleQuotes($line_array[32]));
	$inscricao->setORG_CIDADE(transformSingleQuotes($line_array[33]));
	$inscricao->setORG_WEBSITE(transformSingleQuotes($line_array[34]));
	$inscricao->setACOMP(transformSingleQuotes($line_array[35]));
	$inscricao->setOBS(transformSingleQuotes($line_array[36]));
	$inscricao->setTEXTO_1(transformSingleQuotes($line_array[37]));
	$inscricao->setTEXTO_2(transformSingleQuotes($line_array[38]));
	$inscricao->setTEXTO_3(transformSingleQuotes($line_array[39]));
	$inscricao->setTEXTO_4(transformSingleQuotes($line_array[40]));
	$inscricao->setTEXTO_5(transformSingleQuotes($line_array[41]));
	$inscricao->setTEXTO_6(transformSingleQuotes($line_array[42]));
	$inscricao->setTEXTO_7(transformSingleQuotes($line_array[43]));
	$inscricao->setTEXTO_8(transformSingleQuotes($line_array[44]));
	$inscricao->setTEXTO_9(transformSingleQuotes($line_array[45]));
	$inscricao->setTEXTO_10(transformSingleQuotes($line_array[46]));
	$inscricao->setBOOL_1(transformSingleQuotes($line_array[47]));
	$inscricao->setBOOL_2(transformSingleQuotes($line_array[48]));
	$inscricao->setBOOL_3(transformSingleQuotes($line_array[49]));
	$inscricao->setBOOL_4(transformSingleQuotes($line_array[50]));
	$inscricao->setBOOL_5(transformSingleQuotes($line_array[51]));
	$inscricao->setBOOL_6(transformSingleQuotes($line_array[52]));
	$inscricao->setBOOL_7(transformSingleQuotes($line_array[53]));
	$inscricao->setBOOL_8(transformSingleQuotes($line_array[54]));
	$inscricao->setBOOL_9(transformSingleQuotes($line_array[55]));
	$inscricao->setBOOL_10(transformSingleQuotes($line_array[56]));
	$inscricao->setBOOL_11(transformSingleQuotes($line_array[57]));
	$inscricao->setBOOL_12(transformSingleQuotes($line_array[58]));
	$inscricao->setBOOL_13(transformSingleQuotes($line_array[59]));
	$inscricao->setBOOL_14(transformSingleQuotes($line_array[60]));
	$inscricao->setBOOL_15(transformSingleQuotes($line_array[61]));
	$inscricao->setBOOL_16(transformSingleQuotes($line_array[62]));
	$inscricao->setBOOL_17(transformSingleQuotes($line_array[63]));
	$inscricao->setBOOL_18(transformSingleQuotes($line_array[64]));
	$inscricao->setBOOL_19(transformSingleQuotes($line_array[65]));
	$inscricao->setBOOL_20(transformSingleQuotes($line_array[66]));
	$inscricao->setCURSO_1(transformSingleQuotes($line_array[67]));
	$inscricao->setCURSO_2(transformSingleQuotes($line_array[68]));
	$inscricao->setCURSO_3(transformSingleQuotes($line_array[69]));
	$inscricao->setCURSO_4(transformSingleQuotes($line_array[70]));
	$inscricao->setCURSO_5(transformSingleQuotes($line_array[71]));
	$inscricao->setCURSO_6(transformSingleQuotes($line_array[72]));
	$inscricao->setCURSO_7(transformSingleQuotes($line_array[73]));
	$inscricao->setCURSO_8(transformSingleQuotes($line_array[74]));
	$inscricao->setCURSO_9(transformSingleQuotes($line_array[75]));
	$inscricao->setCURSO_10(transformSingleQuotes($line_array[76]));
	$inscricao->setCURSO_11(transformSingleQuotes($line_array[77]));
	$inscricao->setCURSO_12(transformSingleQuotes($line_array[78]));
	$inscricao->setCURSO_13(transformSingleQuotes($line_array[79]));
	$inscricao->setCURSO_14(transformSingleQuotes($line_array[80]));
	$inscricao->setCURSO_15(transformSingleQuotes($line_array[81]));
	$inscricao->setCURSO_16(transformSingleQuotes($line_array[82]));
	$inscricao->setCURSO_17(transformSingleQuotes($line_array[83]));
	$inscricao->setCURSO_18(transformSingleQuotes($line_array[84]));
	$inscricao->setCURSO_19(transformSingleQuotes($line_array[85]));
	$inscricao->setCURSO_20(transformSingleQuotes($line_array[86]));
	$inscricao->setCURSO_21(transformSingleQuotes($line_array[87]));
	$inscricao->setCURSO_22(transformSingleQuotes($line_array[88]));
	$inscricao->setCURSO_23(transformSingleQuotes($line_array[89]));
	$inscricao->setCURSO_24(transformSingleQuotes($line_array[90]));
	$inscricao->setCURSO_25(transformSingleQuotes($line_array[91]));
	$inscricao->setCURSO_26(transformSingleQuotes($line_array[92]));
	$inscricao->setCURSO_27(transformSingleQuotes($line_array[93]));
	$inscricao->setCURSO_28(transformSingleQuotes($line_array[94]));
	$inscricao->setCURSO_29(transformSingleQuotes($line_array[95]));
	$inscricao->setCURSO_30(transformSingleQuotes($line_array[96]));

	if ($inscricao->getID()) {
		// id_office informado no arquivo
		//echo "id informado ".$inscricao->getID()."<br>";
		
	} else {
		$inscricaoRepetidaId = $inscricaoService->loadInscricaoByCPF($eventoAtual->getID(),$inscricao->getCPF_PASSAPORTE());
		//echo $inscricaoRepetidaId."<br>";
		if ($inscricaoRepetidaId) {
			//echo $inscricao->getNOME()." - inscrição repetida. id=".$inscricaoRepetidaId."<br>";
			$inscricao->setID($inscricaoRepetidaId);
		} else {
			//echo $inscricao->getNOME()." - inscrição nova!<br>";
		}
	}	
	$inscricaoRepetidaId = "";
	$inscricao->save();
	
}

header("Location: inscricao_list.php");
?>