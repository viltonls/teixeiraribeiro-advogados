<?
include_once('../classes/class.evento.php');
include_once('../classes/service.evento.php');

// Insere variсveis do Form na Classe
$evento = new Evento();

// Se щ uma ediчуo, preenche o objeto com dados do BD
if ($_REQUEST["id"]) {
	$evento->select($_REQUEST["id"]);
}

// Preenche os dados editados
$evento->setID($_REQUEST["id"]);
$evento->setNOME($_REQUEST["nome"]);
$evento->setORGA_ID($_REQUEST["orga_id"]);

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

$inicio = date("Y-m-d H:i:s",mktime(0,0,0,$mesData1,$_REQUEST["diaData1"],$_REQUEST["anoData1"]));
$evento->setINICIO($inicio);

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
$fim = date("Y-m-d H:i:s",mktime(0,0,0,$mesData2,$_REQUEST["diaData2"],$_REQUEST["anoData2"]));
$evento->setFIM($fim);

$evento->setLOCAL($_REQUEST["local"]);
$evento->setTIPO($_REQUEST["tipo"]);
if ($_REQUEST["patroc"] == "on") {
	$evento->setPATROC(true);
} else {
	$evento->setPATROC(false);
}
if ($_REQUEST["espaco"] == "on") {
	$evento->setESPACO(true);
} else {
	$evento->setESPACO(false);
}
if ($_REQUEST["apoio"] == "on") {
	$evento->setAPOIO(true);
} else {
	$evento->setAPOIO(false);
}
$evento->setQTD_PART($_REQUEST["qtd_part"]);
$evento->setQTD_SALAS($_REQUEST["qtd_salas"]);
$evento->setQTD_TRAB($_REQUEST["qtd_trab"]);
$evento->setOBS($_REQUEST["obs"]);

$evento->save();

header("Location: evento_list.php");

?>