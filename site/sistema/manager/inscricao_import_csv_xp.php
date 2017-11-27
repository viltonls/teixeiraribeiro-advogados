<?
include_once("struct/auth.php");
include_once('../classes/class.evento.php');
include_once('../classes/service.evento.php');
include_once('../classes/class.inscricao.php');
include_once('../classes/service.inscricao.php');

include_once("struct/struct_functions.php");

$evento = new Evento();
$eventoService = new EventoService();

$inscricaoService = new InscricaoService();

// Pega o conteúdo do arquivo
$file_content = $_SESSION['import_file_content'];

$file_content = str_replace("'","",$file_content);
$file_content = str_replace('"','',$file_content);

// Apaga o conteúdo na sessão
//session_unregister("import_file_content");

$file_content_array = explode("\n",$file_content);
//$file_lines = count($file_content_array); // qtd de linhas válidas


for ($i = 1; $i < count($file_content_array); $i++) {
//for ($i = 1; $i < 3; $i++) {
	$line_array = explode(";",trim($file_content_array[$i]));
	
	$inscricao = new Inscricao();

	/* @var $eventoAtual Evento */
	$inscricao->setEVEN_ID($eventoAtual->getID());
	

	for ($j = 0; $j < count($line_array); $j++) {
		$cellValue = $line_array[$j];
		
		switch ($_REQUEST["coluna".$j]) {
			case "ID_OFFICE": $inscricao->setID(transformSingleQuotes(transformSingleQuotes($cellValue))); break;
			case "DATA": $inscricao->setDATA(transformSingleQuotes($cellValue)); break;
			case "STATUS": $inscricao->setSTATUS(transformSingleQuotes($cellValue)); break;
			//case "ORIGEM": $inscricao->setORIGEM(transformSingleQuotes($cellValue)); break;
			case "NOME": $inscricao->setNOME(transformSingleQuotes($cellValue)); break;
			case "CRACHA": $inscricao->setCRACHA(transformSingleQuotes($cellValue)); break;
			case "ID_EXTERNO": $inscricao->setID_EXTERNO(transformSingleQuotes($cellValue)); break;
			case "SEXO": $inscricao->setSEXO(transformSingleQuotes($cellValue)); break;
			case "NASCIMENTO":
			    if (transformSingleQuotes($cellValue)) {
					$nascDateArray = explode("/",transformSingleQuotes($cellValue));
					if ($nascDateArray[0] && $nascDateArray[1] && $nascDateArray[2]) {
						$nascDate = mktime(0,0,0,$nascDateArray[1],$nascDateArray[0],$nascDateArray[2]);
						$inscricao->setNASCIMENTO(date("Y-m-d h:m:s",$nascDate));
			    	}
			    }
			break;
			case "CPF_PASSAPORTE": $inscricao->setCPF_PASSAPORTE(transformSingleQuotes($cellValue)); break;
			case "REGISTRO_PROF": $inscricao->setREGISTRO_PROF(transformSingleQuotes($cellValue)); break;
			case "ESPECIALIDADE": $inscricao->setESPECIALIDADE(transformSingleQuotes($cellValue)); break;
			case "EMAIL": $inscricao->setEMAIL(transformSingleQuotes($cellValue)); break;
			case "DDI": $inscricao->setDDI(transformSingleQuotes($cellValue)); break;
			case "DDD": $inscricao->setDDD(transformSingleQuotes($cellValue)); break;
			case "FONE": $inscricao->setFONE(transformSingleQuotes($cellValue)); break;
			case "CELULAR": $inscricao->setCELULAR(transformSingleQuotes($cellValue)); break;
			case "FAX": $inscricao->setFAX(transformSingleQuotes($cellValue)); break;
			case "ENDERECO": $inscricao->setENDERECO(transformSingleQuotes($cellValue)); break;
			case "CEP": $inscricao->setCEP(transformSingleQuotes($cellValue)); break;
			case "BAIRRO": $inscricao->setBAIRRO(transformSingleQuotes($cellValue)); break;
			case "CIDADE": $inscricao->setCIDADE(transformSingleQuotes($cellValue)); break;
			case "ESTADO": $inscricao->setESTADO(transformSingleQuotes($cellValue)); break;
			case "PAIS": $inscricao->setPAIS(transformSingleQuotes($cellValue)); break;
			case "TIPO": $inscricao->setTIPO(transformSingleQuotes($cellValue)); break;
			case "CATEGORIA": $inscricao->setCATEGORIA(transformSingleQuotes($cellValue)); break;
			case "VALOR": $inscricao->setVALOR(transformSingleQuotes($cellValue)); break;
			case "STATUS_PGTO": $inscricao->setSTATUS_PGTO(transformSingleQuotes($cellValue)); break;
			case "FORMA_PGTO": $inscricao->setFORMA_PGTO(transformSingleQuotes($cellValue)); break;
			case "ORG_NOME": $inscricao->setORG_NOME(transformSingleQuotes($cellValue)); break;
			case "ORG_CARGO": $inscricao->setORG_CARGO(transformSingleQuotes($cellValue)); break;
			case "ORG_FONE": $inscricao->setORG_FONE(transformSingleQuotes($cellValue)); break;
			case "ORG_CNPJ": $inscricao->setORG_CNPJ(transformSingleQuotes($cellValue)); break;
			case "ORG_ENDERECO": $inscricao->setORG_ENDERECO(transformSingleQuotes($cellValue)); break;
			case "ORG_CIDADE": $inscricao->setORG_CIDADE(transformSingleQuotes($cellValue)); break;
			case "ORG_WEBSITE": $inscricao->setORG_WEBSITE(transformSingleQuotes($cellValue)); break;
			case "ACOMP": $inscricao->setACOMP(transformSingleQuotes($cellValue)); break;
			case "OBS": $inscricao->setOBS(transformSingleQuotes($cellValue)); break;
			case "TEXTO_1": $inscricao->setTEXTO_1(transformSingleQuotes($cellValue)); break;
			case "TEXTO_2": $inscricao->setTEXTO_2(transformSingleQuotes($cellValue)); break;
			case "TEXTO_3": $inscricao->setTEXTO_3(transformSingleQuotes($cellValue)); break;
			case "TEXTO_4": $inscricao->setTEXTO_4(transformSingleQuotes($cellValue)); break;
			case "TEXTO_5": $inscricao->setTEXTO_5(transformSingleQuotes($cellValue)); break;
			case "TEXTO_6": $inscricao->setTEXTO_6(transformSingleQuotes($cellValue)); break;
			case "TEXTO_7": $inscricao->setTEXTO_7(transformSingleQuotes($cellValue)); break;
			case "TEXTO_8": $inscricao->setTEXTO_8(transformSingleQuotes($cellValue)); break;
			case "TEXTO_9": $inscricao->setTEXTO_9(transformSingleQuotes($cellValue)); break;
			case "TEXTO_10": $inscricao->setTEXTO_10(transformSingleQuotes($cellValue)); break;
			case "BOOL_1": $inscricao->setBOOL_1(transformSingleQuotes($cellValue)); break;
			case "BOOL_2": $inscricao->setBOOL_2(transformSingleQuotes($cellValue)); break;
			case "BOOL_3": $inscricao->setBOOL_3(transformSingleQuotes($cellValue)); break;
			case "BOOL_4": $inscricao->setBOOL_4(transformSingleQuotes($cellValue)); break;
			case "BOOL_5": $inscricao->setBOOL_5(transformSingleQuotes($cellValue)); break;
			case "BOOL_6": $inscricao->setBOOL_6(transformSingleQuotes($cellValue)); break;
			case "BOOL_7": $inscricao->setBOOL_7(transformSingleQuotes($cellValue)); break;
			case "BOOL_8": $inscricao->setBOOL_8(transformSingleQuotes($cellValue)); break;
			case "BOOL_9": $inscricao->setBOOL_9(transformSingleQuotes($cellValue)); break;
			case "BOOL_10": $inscricao->setBOOL_10(transformSingleQuotes($cellValue)); break;
			case "BOOL_11": $inscricao->setBOOL_11(transformSingleQuotes($cellValue)); break;
			case "BOOL_12": $inscricao->setBOOL_12(transformSingleQuotes($cellValue)); break;
			case "BOOL_13": $inscricao->setBOOL_13(transformSingleQuotes($cellValue)); break;
			case "BOOL_14": $inscricao->setBOOL_14(transformSingleQuotes($cellValue)); break;
			case "BOOL_15": $inscricao->setBOOL_15(transformSingleQuotes($cellValue)); break;
			case "BOOL_16": $inscricao->setBOOL_16(transformSingleQuotes($cellValue)); break;
			case "BOOL_17": $inscricao->setBOOL_17(transformSingleQuotes($cellValue)); break;
			case "BOOL_18": $inscricao->setBOOL_18(transformSingleQuotes($cellValue)); break;
			case "BOOL_19": $inscricao->setBOOL_19(transformSingleQuotes($cellValue)); break;
			case "BOOL_20": $inscricao->setBOOL_20(transformSingleQuotes($cellValue)); break;
			case "CURSO_1": $inscricao->setCURSO_1(transformSingleQuotes($cellValue)); break;
			case "CURSO_2": $inscricao->setCURSO_2(transformSingleQuotes($cellValue)); break;
			case "CURSO_3": $inscricao->setCURSO_3(transformSingleQuotes($cellValue)); break;
			case "CURSO_4": $inscricao->setCURSO_4(transformSingleQuotes($cellValue)); break;
			case "CURSO_5": $inscricao->setCURSO_5(transformSingleQuotes($cellValue)); break;
			case "CURSO_6": $inscricao->setCURSO_6(transformSingleQuotes($cellValue)); break;
			case "CURSO_7": $inscricao->setCURSO_7(transformSingleQuotes($cellValue)); break;
			case "CURSO_8": $inscricao->setCURSO_8(transformSingleQuotes($cellValue)); break;
			case "CURSO_9": $inscricao->setCURSO_9(transformSingleQuotes($cellValue)); break;
			case "CURSO_10": $inscricao->setCURSO_10(transformSingleQuotes($cellValue)); break;
			case "CURSO_11": $inscricao->setCURSO_11(transformSingleQuotes($cellValue)); break;
			case "CURSO_12": $inscricao->setCURSO_12(transformSingleQuotes($cellValue)); break;
			case "CURSO_13": $inscricao->setCURSO_13(transformSingleQuotes($cellValue)); break;
			case "CURSO_14": $inscricao->setCURSO_14(transformSingleQuotes($cellValue)); break;
			case "CURSO_15": $inscricao->setCURSO_15(transformSingleQuotes($cellValue)); break;
			case "CURSO_16": $inscricao->setCURSO_16(transformSingleQuotes($cellValue)); break;
			case "CURSO_17": $inscricao->setCURSO_17(transformSingleQuotes($cellValue)); break;
			case "CURSO_18": $inscricao->setCURSO_18(transformSingleQuotes($cellValue)); break;
			case "CURSO_19": $inscricao->setCURSO_19(transformSingleQuotes($cellValue)); break;
			case "CURSO_20": $inscricao->setCURSO_20(transformSingleQuotes($cellValue)); break;
			case "CURSO_21": $inscricao->setCURSO_21(transformSingleQuotes($cellValue)); break;
			case "CURSO_22": $inscricao->setCURSO_22(transformSingleQuotes($cellValue)); break;
			case "CURSO_23": $inscricao->setCURSO_23(transformSingleQuotes($cellValue)); break;
			case "CURSO_24": $inscricao->setCURSO_24(transformSingleQuotes($cellValue)); break;
			case "CURSO_25": $inscricao->setCURSO_25(transformSingleQuotes($cellValue)); break;
			case "CURSO_26": $inscricao->setCURSO_26(transformSingleQuotes($cellValue)); break;
			case "CURSO_27": $inscricao->setCURSO_27(transformSingleQuotes($cellValue)); break;
			case "CURSO_28": $inscricao->setCURSO_28(transformSingleQuotes($cellValue)); break;
			case "CURSO_29": $inscricao->setCURSO_29(transformSingleQuotes($cellValue)); break;
			case "CURSO_30": $inscricao->setCURSO_30(transformSingleQuotes($cellValue)); break;
			default: break;
		}
		
	}

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
