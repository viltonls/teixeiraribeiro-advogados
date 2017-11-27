<?
include_once('../classes/class.usuario.php');
include_once('../classes/service.usuario.php');

// Insere variсveis do Form na Classe
$usuario = new Usuario();

// Se щ uma ediчуo, preenche o objeto com dados do BD
if ($_REQUEST["id"]) {
	$usuario->select($_REQUEST["id"]);
}

// Preenche os dados editados
$usuario->setID($_REQUEST["id"]);
$usuario->setNOME($_REQUEST["nome"]);
$usuario->setEVEN_ID($_REQUEST["even_id"]);
$usuario->setLOGIN($_REQUEST["login"]);
$usuario->setEMAIL($_REQUEST["email"]);

// Se nуo digitou a senha, nуo modifica
if ($_REQUEST["senha"]) {
	$usuario->setSENHA($_REQUEST["senha"]);
}

$usuario->setCELULAR($_REQUEST["celular"]);
$usuario->setADMIN($_REQUEST["admin"]);
$usuario->setCAPTACAO($_REQUEST["captacao"]);
$usuario->setOPERACIONAL($_REQUEST["operacional"]);
$usuario->setCOMERCIAL($_REQUEST["comercial"]);
$usuario->setINSCRICOES($_REQUEST["inscricoes"]);
$usuario->setTRABALHOS($_REQUEST["trabalhos"]);
$usuario->setFINANCEIRO($_REQUEST["financeiro"]);
$usuario->setEVENTO($_REQUEST["evento"]);
$usuario->setDEPOIMENTOS($_REQUEST["depoimentos"]);
$usuario->setCASES($_REQUEST["cases"]);
$usuario->setNOTICIAS($_REQUEST["noticias"]);
$usuario->setCLIENTES($_REQUEST["clientes"]);
$usuario->setAREAS($_REQUEST["areas"]);
$usuario->setESCRITORIO($_REQUEST["escritorio"]);
$usuario->setEQUIPE($_REQUEST["equipe"]);


	
$usuario->save();

header("Location: usuario_list.php");

?>