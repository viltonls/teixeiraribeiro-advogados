<?
include_once('../classes/class.pessoa.php');
include_once('../classes/service.pessoa.php');

// Insere variсveis do Form na Classe
$pessoa = new Pessoa();

// Se щ uma ediчуo, preenche o objeto com dados do BD
if ($_REQUEST["id"]) {
	$pessoa->select($_REQUEST["id"]);
}

// Preenche os dados editados
$pessoa->setID($_REQUEST["id"]);
$pessoa->setTRATAMENTO($_REQUEST["tratamento"]);
$pessoa->setNOME($_REQUEST["nome"]);
$pessoa->setORGA_ID($_REQUEST["orga_id"]);

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

$nascimento = date("Y-m-d H:i:s",mktime(0,0,0,$mesData1,$_REQUEST["diaData1"],$_REQUEST["anoData1"]));
$pessoa->setNASCIMENTO($nascimento);

$pessoa->setSEXO($_REQUEST["sexo"]);
$pessoa->setEMAIL($_REQUEST["email"]);
$pessoa->setFONE($_REQUEST["fone"]);
$pessoa->setCELULAR($_REQUEST["celular"]);
$pessoa->setOBS($_REQUEST["obs"]);

$pessoa->save();

header("Location: pessoa_list.php?orga_id=".$pessoa->getORGA_ID());

?>