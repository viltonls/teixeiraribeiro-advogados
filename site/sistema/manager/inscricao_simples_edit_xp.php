<?
include_once("struct/auth.php");
include_once("struct/struct_functions.php");
include_once('../classes/class.configuracao.php');
include_once('../classes/class.inscricao.php');
include_once('../classes/service.inscricao.php');

// Insere variсveis do Form na Classe
$inscricao = new Inscricao();

// Se щ uma ediчуo, preenche o objeto com dados do BD
if ($_REQUEST["id"]) {
	$inscricao->select($_REQUEST["id"],$_REQUEST["even_id"]);
} else {
	$hoje = date("Y-m-d H:i:s",mktime(0,0,0,date("m"),date("d"),date("Y")));
	$inscricao->setDATA($hoje);
}

// Preenche os dados editados
$inscricao->setEVEN_ID($_REQUEST["even_id"]);

$inscricao->setSTATUS("5");
$inscricao->setORIGEM("l"); // Local

$inscricao->setNOME($_REQUEST["nome"]);
$inscricao->setCRACHA($_REQUEST["cracha"]);
$inscricao->setCPF_PASSAPORTE($_REQUEST["cpf_passaporte"]);
$inscricao->setORG_NOME($_REQUEST["org_nome"]);
$inscricao->setORG_CNPJ($_REQUEST["org_cnpj"]);
$inscricao->setCIDADE($_REQUEST["cidade"]);
$inscricao->setESTADO($_REQUEST["estado"]);
$inscricao->setPAIS($_REQUEST["pais"]);

$inscricao->setTIPO($_REQUEST["tipo"]);
$inscricao->setCATEGORIA($_REQUEST["categoria"]);
$inscricao->setVALOR(brazilConvertNumber($_REQUEST["valor"])*100);
$inscricao->setSTATUS_PGTO($_REQUEST["status_pgto"]);
$inscricao->setFORMA_PGTO($_REQUEST["forma_pgto"]);

$inscricao->setACOMP($_REQUEST["acomp"]);
$inscricao->setOBS($_REQUEST["obs"]);
	
$inscricao->save();

header("Location: inscricao_simples_view.php?id=".$inscricao->getID());
?>