<?php

include_once("class.organizacao.php");
include_once("class.database.php");

// **********************
// CLASS DECLARATION
// **********************

class OrganizacaoService
{ // class : begin


// **********************
// ATTRIBUTE DECLARATION
// **********************

private $database; // Instance of class database


// **********************
// CONSTRUCTOR METHOD
// **********************

function OrganizacaoService() {
	$this->database = new Database();
}


// **********************
// SELECT METHOD / LOAD
// **********************

/**
 * Carrega o usuário pelo ID
 *
 * @param int $id
 * @return Organizacao
 */
function loadOrganizacaoById($id) {

	$organizacao = new Organizacao();
	$organizacao->select($id);
	return $organizacao;

}


/**
 * Carrega todas as organizações
 *
 * @param none
 * @return array
 */
function listOrganizacoes() {

	$sql =  "SELECT * FROM organizacao ORDER BY ORGA_NOME;";
	$result =  $this->database->query($sql);
	$result = $this->database->result;
	//$row = mysql_fetch_object($result);
	
	$result_count = 0;
	while ($row = mysql_fetch_object($result)) {
	
		$organizacao = new Organizacao();
		
		$organizacao->setID($row->ORGA_ID);
		$organizacao->setNOME($row->ORGA_NOME);
		$organizacao->setRAZAO($row->ORGA_RAZAO);
		$organizacao->setCNPJ($row->ORGA_CNPJ);
		$organizacao->setIE($row->ORGA_IE);
		$organizacao->setIM($row->ORGA_IM);
		$organizacao->setSITE($row->ORGA_SITE);
		$organizacao->setFONE($row->ORGA_FONE);
		$organizacao->setFAX($row->ORGA_FAX);
		$organizacao->setENDERECO($row->ORGA_ENDERECO);
		$organizacao->setBAIRRO($row->ORGA_BAIRRO);
		$organizacao->setCIDADE($row->ORGA_CIDADE);
		$organizacao->setCEP($row->ORGA_CEP);
		$organizacao->setESTADO($row->ORGA_ESTADO);
		$organizacao->setPAIS($row->ORGA_PAIS);
		$organizacao->setOBS($row->ORGA_OBS);

		$result_list[$result_count] = $organizacao;
		$result_count++;
	
	}
	
	return $result_list;

}


/**
 * Carrega todas as organizações
 *
 * @param none
 * @return array
 */
function listOrganizacoesComEventoCaptado() {

	$sql =  "SELECT * FROM organizacao WHERE orga_id IN (SELECT DISTINCT orga_id FROM evento WHERE even_id IN (SELECT even_id FROM evento_configuracao)) ORDER BY ORGA_NOME;";
	$result =  $this->database->query($sql);
	$result = $this->database->result;
	//$row = mysql_fetch_object($result);
	
	$result_count = 0;
	while ($row = mysql_fetch_object($result)) {
	
		$organizacao = new Organizacao();
		
		$organizacao->setID($row->ORGA_ID);
		$organizacao->setNOME($row->ORGA_NOME);
		$organizacao->setRAZAO($row->ORGA_RAZAO);
		$organizacao->setCNPJ($row->ORGA_CNPJ);
		$organizacao->setIE($row->ORGA_IE);
		$organizacao->setIM($row->ORGA_IM);
		$organizacao->setSITE($row->ORGA_SITE);
		$organizacao->setFONE($row->ORGA_FONE);
		$organizacao->setFAX($row->ORGA_FAX);
		$organizacao->setENDERECO($row->ORGA_ENDERECO);
		$organizacao->setBAIRRO($row->ORGA_BAIRRO);
		$organizacao->setCIDADE($row->ORGA_CIDADE);
		$organizacao->setCEP($row->ORGA_CEP);
		$organizacao->setESTADO($row->ORGA_ESTADO);
		$organizacao->setPAIS($row->ORGA_PAIS);
		$organizacao->setOBS($row->ORGA_OBS);

		$result_list[$result_count] = $organizacao;
		$result_count++;
	
	}
	
	return $result_list;

}


/**
 * Gera as tags <option> em HTML para uma lista de Organizações
 *
 * @param array, int
 * @return String
 */
function generateHtmlOptions($organizacaoList, $selectedId) {
	$options = "";
	if (count($organizacaoList)) {
		for ($i = 0; $i < count($organizacaoList); $i++) {
			/* @var $organizacao Organizacao */
			$organizacao = $organizacaoList[$i];
			$options .= "<option value='".$organizacao->getID()."'";
			if ($selectedId && $organizacao->getID() == $selectedId) $options .=" selected";
			$options .= "> ".$organizacao->getNOME()."</option>\n";
		};
	} else {
		$options .= "<option value='0'>Nenhum item encontrado</option>";
	}
	return $options;
}

/**
 * Gera as tags <option> em HTML para uma lista de Organizações
 *
 * @param array, int, String
 * @return String
 */
function generateHtmlOptionsForAjax($organizacaoList, $selectedId, $ajaxString) {
	$options = "";
	if (count($organizacaoList)) {
		for ($i = 0; $i < count($organizacaoList); $i++) {
			/* @var $organizacao Organizacao */
			$organizacao = $organizacaoList[$i];
			$options .= "<option value='".$ajaxString.$organizacao->getID()."'";
			if ($selectedId && $organizacao->getID() == $selectedId) $options .=" selected";
			$options .= "> ".$organizacao->getNOME()."</option>\n";
		};
	} else {
		$options .= "<option value='0'>Nenhum item encontrado</option>";
	}
	return $options;
}


} // class : end

?>