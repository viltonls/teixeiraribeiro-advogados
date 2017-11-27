<? include_once("struct/auth.php")?>
<?
include_once('../classes/class.inscricao.php');
include_once('../classes/service.inscricao.php');
include_once("struct/struct_functions.php");

// Insere variáveis do Form na Classe
$inscricao = new Inscricao();

// Se é uma edição, preenche o objeto com dados do BD
if ($_REQUEST["id"]) {
	$inscricao->select($_REQUEST["id"],$_REQUEST["even_id"]);
}

// Preenche os dados editados
$inscricao->setID($_REQUEST["id"]);
$inscricao->setEVEN_ID($_REQUEST["even_id"]);

switch ($_REQUEST["mesData1"]) {
	case "Jan": $mesData1 = 1; break;
	case "Fev": $mesData1 = 2; break;
	case "Mar": $mesData1 = 3; break;
	case "Abr": $mesData1 = 4; break;
	case "Mai": $mesData1 = 5; break;
	case "Jun": $mesData1 = 6; break;
	case "Jul": $mesData1 = 7; break;
	case "Ago": $mesData1 = 8; break;
	case "Set": $mesData1 = 9; break;
	case "Out": $mesData1 = 10; break;
	case "Nov": $mesData1 = 11; break;
	case "Dez": $mesData1 = 12; break;
}

$data = date("Y-m-d H:i:s",mktime(0,0,0,$mesData1,$_REQUEST["diaData1"],$_REQUEST["anoData1"]));

$inscricao->setDATA($data);
$inscricao->setSTATUS($_REQUEST["status"]);
$inscricao->setORIGEM($_REQUEST["origem"]);
$inscricao->setNOME($_REQUEST["nome"]);
$inscricao->setCRACHA($_REQUEST["cracha"]);
$inscricao->setID_EXTERNO($_REQUEST["id_externo"]);
$inscricao->setSEXO($_REQUEST["sexo"]);

switch ($_REQUEST["mesData2"]) {
	case "Jan": $mesData2 = 1; break;
	case "Fev": $mesData2 = 2; break;
	case "Mar": $mesData2 = 3; break;
	case "Abr": $mesData2 = 4; break;
	case "Mai": $mesData2 = 5; break;
	case "Jun": $mesData2 = 6; break;
	case "Jul": $mesData2 = 7; break;
	case "Ago": $mesData2 = 8; break;
	case "Set": $mesData2 = 9; break;
	case "Out": $mesData2 = 10; break;
	case "Nov": $mesData2 = 11; break;
	case "Dez": $mesData2 = 12; break;
}

$nascimento = date("Y-m-d H:i:s",mktime(0,0,0,$mesData2,$_REQUEST["diaData2"],$_REQUEST["anoData2"]));
$inscricao->setNASCIMENTO($nascimento);
$inscricao->setCPF_PASSAPORTE($_REQUEST["cpf_passaporte"]);
$inscricao->setREGISTRO_PROF($_REQUEST["registro_prof"]);
$inscricao->setESPECIALIDADE($_REQUEST["especialidade"]);
$inscricao->setEMAIL($_REQUEST["email"]);
$inscricao->setDDI($_REQUEST["ddi"]);
$inscricao->setDDD($_REQUEST["ddd"]);
$inscricao->setFONE($_REQUEST["fone"]);
$inscricao->setCELULAR($_REQUEST["celular"]);
$inscricao->setFAX($_REQUEST["fax"]);
$inscricao->setENDERECO($_REQUEST["endereco"]);
$inscricao->setCEP($_REQUEST["cep"]);
$inscricao->setBAIRRO($_REQUEST["bairro"]);
$inscricao->setCIDADE($_REQUEST["cidade"]);
$inscricao->setESTADO($_REQUEST["estado"]);
$inscricao->setPAIS($_REQUEST["pais"]);
$inscricao->setTIPO($_REQUEST["tipo"]);
$inscricao->setCATEGORIA($_REQUEST["categoria"]);
//$inscricao->setVALOR($_REQUEST["valor"]*100);
$inscricao->setVALOR(brazilConvertNumber($_REQUEST["valor"])*100);
$inscricao->setSTATUS_PGTO($_REQUEST["status_pgto"]);
$inscricao->setFORMA_PGTO($_REQUEST["forma_pgto"]);
$inscricao->setORG_NOME($_REQUEST["org_nome"]);
$inscricao->setORG_CARGO($_REQUEST["org_cargo"]);
$inscricao->setORG_FONE($_REQUEST["org_fone"]);
$inscricao->setORG_CNPJ($_REQUEST["org_cnpj"]);
$inscricao->setORG_ENDERECO($_REQUEST["org_endereco"]);
$inscricao->setORG_CIDADE($_REQUEST["org_cidade"]);
$inscricao->setORG_WEBSITE($_REQUEST["org_website"]);
$inscricao->setACOMP($_REQUEST["acomp"]);
$inscricao->setOBS($_REQUEST["obs"]);
$inscricao->setTEXTO_1($_REQUEST["texto_1"]);
$inscricao->setTEXTO_2($_REQUEST["texto_2"]);
$inscricao->setTEXTO_3($_REQUEST["texto_3"]);
$inscricao->setTEXTO_4($_REQUEST["texto_4"]);
$inscricao->setTEXTO_5($_REQUEST["texto_5"]);
$inscricao->setTEXTO_6($_REQUEST["texto_6"]);
$inscricao->setTEXTO_7($_REQUEST["texto_7"]);
$inscricao->setTEXTO_8($_REQUEST["texto_8"]);
$inscricao->setTEXTO_9($_REQUEST["texto_9"]);
$inscricao->setTEXTO_10($_REQUEST["texto_10"]);

if ($_REQUEST["bool_1"] == "on") { $inscricao->setBOOL_1(true); } else { $inscricao->setBOOL_1(false); }
if ($_REQUEST["bool_2"] == "on") { $inscricao->setBOOL_2(true); } else { $inscricao->setBOOL_2(false); }
if ($_REQUEST["bool_3"] == "on") { $inscricao->setBOOL_3(true); } else { $inscricao->setBOOL_3(false); }
if ($_REQUEST["bool_4"] == "on") { $inscricao->setBOOL_4(true); } else { $inscricao->setBOOL_4(false); }
if ($_REQUEST["bool_5"] == "on") { $inscricao->setBOOL_5(true); } else { $inscricao->setBOOL_5(false); }
if ($_REQUEST["bool_6"] == "on") { $inscricao->setBOOL_6(true); } else { $inscricao->setBOOL_6(false); }
if ($_REQUEST["bool_7"] == "on") { $inscricao->setBOOL_7(true); } else { $inscricao->setBOOL_7(false); }
if ($_REQUEST["bool_8"] == "on") { $inscricao->setBOOL_8(true); } else { $inscricao->setBOOL_8(false); }
if ($_REQUEST["bool_9"] == "on") { $inscricao->setBOOL_9(true); } else { $inscricao->setBOOL_9(false); }
if ($_REQUEST["bool_10"] == "on") { $inscricao->setBOOL_10(true); } else { $inscricao->setBOOL_10(false); }
if ($_REQUEST["bool_11"] == "on") { $inscricao->setBOOL_11(true); } else { $inscricao->setBOOL_11(false); }
if ($_REQUEST["bool_12"] == "on") { $inscricao->setBOOL_12(true); } else { $inscricao->setBOOL_12(false); }
if ($_REQUEST["bool_13"] == "on") { $inscricao->setBOOL_13(true); } else { $inscricao->setBOOL_13(false); }
if ($_REQUEST["bool_14"] == "on") { $inscricao->setBOOL_14(true); } else { $inscricao->setBOOL_14(false); }
if ($_REQUEST["bool_15"] == "on") { $inscricao->setBOOL_15(true); } else { $inscricao->setBOOL_15(false); }
if ($_REQUEST["bool_16"] == "on") { $inscricao->setBOOL_16(true); } else { $inscricao->setBOOL_16(false); }
if ($_REQUEST["bool_17"] == "on") { $inscricao->setBOOL_17(true); } else { $inscricao->setBOOL_17(false); }
if ($_REQUEST["bool_18"] == "on") { $inscricao->setBOOL_18(true); } else { $inscricao->setBOOL_18(false); }
if ($_REQUEST["bool_19"] == "on") { $inscricao->setBOOL_19(true); } else { $inscricao->setBOOL_19(false); }
if ($_REQUEST["bool_20"] == "on") { $inscricao->setBOOL_20(true); } else { $inscricao->setBOOL_20(false); }

if ($_REQUEST["curso_1"] == "on") { $inscricao->setCURSO_1(true); } else { $inscricao->setCURSO_1(false); }
if ($_REQUEST["curso_2"] == "on") { $inscricao->setCURSO_2(true); } else { $inscricao->setCURSO_2(false); }
if ($_REQUEST["curso_3"] == "on") { $inscricao->setCURSO_3(true); } else { $inscricao->setCURSO_3(false); }
if ($_REQUEST["curso_4"] == "on") { $inscricao->setCURSO_4(true); } else { $inscricao->setCURSO_4(false); }
if ($_REQUEST["curso_5"] == "on") { $inscricao->setCURSO_5(true); } else { $inscricao->setCURSO_5(false); }
if ($_REQUEST["curso_6"] == "on") { $inscricao->setCURSO_6(true); } else { $inscricao->setCURSO_6(false); }
if ($_REQUEST["curso_7"] == "on") { $inscricao->setCURSO_7(true); } else { $inscricao->setCURSO_7(false); }
if ($_REQUEST["curso_8"] == "on") { $inscricao->setCURSO_8(true); } else { $inscricao->setCURSO_8(false); }
if ($_REQUEST["curso_9"] == "on") { $inscricao->setCURSO_9(true); } else { $inscricao->setCURSO_9(false); }
if ($_REQUEST["curso_10"] == "on") { $inscricao->setCURSO_10(true); } else { $inscricao->setCURSO_10(false); }
if ($_REQUEST["curso_11"] == "on") { $inscricao->setCURSO_11(true); } else { $inscricao->setCURSO_11(false); }
if ($_REQUEST["curso_12"] == "on") { $inscricao->setCURSO_12(true); } else { $inscricao->setCURSO_12(false); }
if ($_REQUEST["curso_13"] == "on") { $inscricao->setCURSO_13(true); } else { $inscricao->setCURSO_13(false); }
if ($_REQUEST["curso_14"] == "on") { $inscricao->setCURSO_14(true); } else { $inscricao->setCURSO_14(false); }
if ($_REQUEST["curso_15"] == "on") { $inscricao->setCURSO_15(true); } else { $inscricao->setCURSO_15(false); }
if ($_REQUEST["curso_16"] == "on") { $inscricao->setCURSO_16(true); } else { $inscricao->setCURSO_16(false); }
if ($_REQUEST["curso_17"] == "on") { $inscricao->setCURSO_17(true); } else { $inscricao->setCURSO_17(false); }
if ($_REQUEST["curso_18"] == "on") { $inscricao->setCURSO_18(true); } else { $inscricao->setCURSO_18(false); }
if ($_REQUEST["curso_19"] == "on") { $inscricao->setCURSO_19(true); } else { $inscricao->setCURSO_19(false); }
if ($_REQUEST["curso_20"] == "on") { $inscricao->setCURSO_20(true); } else { $inscricao->setCURSO_20(false); }	
if ($_REQUEST["curso_21"] == "on") { $inscricao->setCURSO_21(true); } else { $inscricao->setCURSO_21(false); }
if ($_REQUEST["curso_22"] == "on") { $inscricao->setCURSO_22(true); } else { $inscricao->setCURSO_22(false); }
if ($_REQUEST["curso_23"] == "on") { $inscricao->setCURSO_23(true); } else { $inscricao->setCURSO_23(false); }
if ($_REQUEST["curso_24"] == "on") { $inscricao->setCURSO_24(true); } else { $inscricao->setCURSO_24(false); }
if ($_REQUEST["curso_25"] == "on") { $inscricao->setCURSO_25(true); } else { $inscricao->setCURSO_25(false); }
if ($_REQUEST["curso_26"] == "on") { $inscricao->setCURSO_26(true); } else { $inscricao->setCURSO_26(false); }
if ($_REQUEST["curso_27"] == "on") { $inscricao->setCURSO_27(true); } else { $inscricao->setCURSO_27(false); }
if ($_REQUEST["curso_28"] == "on") { $inscricao->setCURSO_28(true); } else { $inscricao->setCURSO_28(false); }
if ($_REQUEST["curso_29"] == "on") { $inscricao->setCURSO_29(true); } else { $inscricao->setCURSO_29(false); }
if ($_REQUEST["curso_30"] == "on") { $inscricao->setCURSO_30(true); } else { $inscricao->setCURSO_30(false); }
	
$inscricao->save();

switch ($_REQUEST['redirect']) {
	case "edit":
		header("Location: inscricao_edit.php");	
		break;
		
	case "view":
		header("Location: inscricao_simples_view.php?id=".$inscricao->getID());
		break;

	case "list":
	default:
		header("Location: inscricao_list.php");
		break;
}

?>