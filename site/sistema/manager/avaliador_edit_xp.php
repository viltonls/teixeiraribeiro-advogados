<?
include_once('../classes/class.avaliador.php');
include_once('../classes/service.avaliador.php');

// Insere variсveis do Form na Classe
$avaliador = new Avaliador();

// Se щ uma ediчуo, preenche o objeto com dados do BD
if ($_REQUEST["id"]) {
	$avaliador->select($_REQUEST["id"]);
}

// Preenche os dados editados
$avaliador->setID($_REQUEST["id"]);
$avaliador->setNOME($_REQUEST["nome"]);
$avaliador->setTELEFONE($_REQUEST["telefone"]);
$avaliador->setCELULAR($_REQUEST["celular"]);
$avaliador->setLOGIN($_REQUEST["login"]);
$avaliador->setSTATUS($_REQUEST["status"]);
$avaliador->setEVEN_ID($_REQUEST["even_id"]);
$avaliador->setLOGGED(false);

// Se nуo digitou a senha, nуo modifica
if ($_REQUEST["senha"]) {
	$avaliador->setSENHA($_REQUEST["senha"]);
}

$avaliador->save();

header("Location: avaliador_list.php");

?>