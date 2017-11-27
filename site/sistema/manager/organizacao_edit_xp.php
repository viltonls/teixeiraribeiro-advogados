<?
include_once('../classes/class.organizacao.php');
include_once('../classes/service.organizacao.php');

// Insere variсveis do Form na Classe
$organizacao = new Organizacao();

// Se щ uma ediчуo, preenche o objeto com dados do BD
if ($_REQUEST["id"]) {
	$organizacao->select($_REQUEST["id"]);
}

// Preenche os dados editados
$organizacao->setID($_REQUEST["id"]);
$organizacao->setNOME($_REQUEST["nome"]);
$organizacao->setRAZAO($_REQUEST["razao"]);
$organizacao->setCNPJ($_REQUEST["cnpj"]);
$organizacao->setIE($_REQUEST["ie"]);
$organizacao->setIM($_REQUEST["im"]);
$organizacao->setSITE($_REQUEST["site"]);
$organizacao->setFONE($_REQUEST["fone"]);
$organizacao->setFAX($_REQUEST["fax"]);
$organizacao->setENDERECO($_REQUEST["endereco"]);
$organizacao->setBAIRRO($_REQUEST["bairro"]);
$organizacao->setCIDADE($_REQUEST["cidade"]);
$organizacao->setCEP($_REQUEST["cep"]);
$organizacao->setESTADO($_REQUEST["estado"]);
$organizacao->setPAIS($_REQUEST["pais"]);
$organizacao->setOBS($_REQUEST["obs"]);
	
$organizacao->save();

header("Location: organizacao_list.php");

?>