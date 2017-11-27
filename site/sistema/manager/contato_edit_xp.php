<?
include_once('../classes/class.contato.php');
include_once('../classes/service.contato.php');

// Insere variáveis do Form na Classe
$contato = new Contato();

// Se é uma edição, preenche o objeto com dados do BD
if ($_REQUEST["id"]) {
	$contato->select($_REQUEST["id"]);
}


$orga_id_array = explode("=",$_REQUEST["orga_id"]);
$orga_id = $orga_id_array[2];

// Preenche os dados editados
$contato->setID($_REQUEST["id"]);
$contato->setORGA_ID($orga_id);
$contato->setEVEN_ID($_REQUEST["even_id"]);

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
$contato->setDATA($data);

$contato->setTIPO($_REQUEST["tipo"]);
$contato->setUSUA_ID($_REQUEST["usua_id"]);
$contato->setOBS($_REQUEST["obs"]);

$contato->save();

//echo "ORGA_ID = ".$contato->getORGA_ID()."<br>";
//echo "EVEN_ID = ".$contato->getEVEN_ID()."<br>";



header("Location: contato_list.php?orga_id=".$contato->getORGA_ID());

?>