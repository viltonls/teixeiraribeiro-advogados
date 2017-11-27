<?php

include_once("class.avaliador.php");
include_once("class.database.php");

// **********************
// CLASS DECLARATION
// **********************

class AvaliadorService
{ // class : begin


// **********************
// ATTRIBUTE DECLARATION
// **********************

private $database; // Instance of class database


// **********************
// CONSTRUCTOR METHOD
// **********************

function AvaliadorService() {
	$this->database = new Database();
}


// **********************
// SELECT METHOD / LOAD
// **********************

/**
 * Carrega o valores pelo ID
 *
 * @param int $id
 * @return Avaliador
 */
function loadAvaliadorById($id) {

	$avaliador = new Avaliador();
	$avaliador->select($id);
	return $avaliador;

}


/**
 * Carrega todos as avaliadores de um evento
 *
 * @param int $even_id, String $order_by, String
 * @return array
 */
function listAvaliadoresByEvento($even_id, $order_by) {

	$sql = "SELECT * FROM avaliador WHERE EVEN_ID = $even_id ORDER BY AVAL_".$order_by.";";
	$result = $this->database->query($sql);
	$result = $this->database->result;
	//$row = mysql_fetch_object($result);
	
	$result_count = 0;
	while ($row = mysql_fetch_object($result)) {
		
	
		$avaliador = new Avaliador();
		
		$avaliador->setID($row->AVAL_ID);
		$avaliador->setNOME($row->AVAL_NOME);
		$avaliador->setTELEFONE($row->AVAL_TELEFONE);
		$avaliador->setCELULAR($row->AVAL_CELULAR);
		$avaliador->setLOGIN($row->AVAL_LOGIN);
		$avaliador->setSENHA($row->AVAL_SENHA);
		$avaliador->setSTATUS($row->AVAL_STATUS);
		$avaliador->setEVEN_ID($row->EVEN_ID);		
		$avaliador->setDATA_CONVITE($row->AVAL_DATA_CONVITE);
		$avaliador->setLOGGED($row->AVAL_LOGGED);

		$result_list[$result_count] = $avaliador;
		$result_count++;
	}
	
	return $result_list;

}

/**
 * Carrega o avaliador pelo LOGIN
 *
 * @param String $login
 * @return Avaliador
 */
function loadAvaliadorByLoginEvento($login,$evenId) {

	$sql =  "SELECT * FROM avaliador WHERE AVAL_LOGIN LIKE '$login' AND EVEN_ID = '$evenId';";
	$result =  $this->database->query($sql);
	$result = $this->database->result;
	$row = mysql_fetch_object($result);
	
	$avaliador = new Avaliador();
	
	$avaliador->setID($row->AVAL_ID);
	$avaliador->setNOME($row->AVAL_NOME);
	$avaliador->setTELEFONE($row->AVAL_TELEFONE);
	$avaliador->setCELULAR($row->AVAL_CELULAR);
	$avaliador->setLOGIN($row->AVAL_LOGIN);
	$avaliador->setSENHA($row->AVAL_SENHA);
	$avaliador->setSTATUS($row->AVAL_STATUS);
	$avaliador->setEVEN_ID($row->EVEN_ID);		
	$avaliador->setDATA_CONVITE($row->AVAL_DATA_CONVITE);
	$avaliador->setLOGGED($row->AVAL_LOGGED);
	
	return $avaliador;

}



/**
 * Gera as tags <option> em HTML para uma lista de Organizações
 *
 * @param array, int
 * @return String
 */
function generateHtmlOptions($avaliadorList, $selectedId) {
	$options = "";
	if (count($avaliadorList)) {
		for ($i = 0; $i < count($avaliadorList); $i++) {
			/* @var $avaliador Avaliador */
			$avaliador = $avaliadorList[$i];
			$options .= "<option value='".$avaliador->getID()."'";
			if ($selectedId && $avaliador->getID() == $selectedId) $options .=" selected";
			$options .= "> ".$avaliador->getNOME()."</option>\n";
		};
	} else {
		$options .= "<option value='0'>Nenhum item encontrado</option>";
	}
	return $options;
}



} // class : end

?>