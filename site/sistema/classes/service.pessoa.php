<?php

include_once("class.pessoa.php");
include_once("class.database.php");

// **********************
// CLASS DECLARATION
// **********************

class PessoaService
{ // class : begin


// **********************
// ATTRIBUTE DECLARATION
// **********************

private $database; // Instance of class database


// **********************
// CONSTRUCTOR METHOD
// **********************

function PessoaService() {
	$this->database = new Database();
}


// **********************
// SELECT METHOD / LOAD
// **********************

/**
 * Carrega a pessoa pelo ID
 *
 * @param int $id
 * @return Pessoa
 */
function loadPessoaById($id) {

	$pessoa = new Pessoa();
	$pessoa->select($id);
	return $pessoa;

}



/**
 * Carrega todos os usuários
 *
 * @param none
 * @return array
 */
function listPessoas() {

	$sql =  "SELECT * FROM pessoa ORDER BY PESS_NOME;";
	$result =  $this->database->query($sql);
	$result = $this->database->result;
	//$row = mysql_fetch_object($result);
	
	$result_count = 0;
	while ($row = mysql_fetch_object($result)) {
		
	
		$pessoa = new Pessoa();

		$pessoa->setID($row->PESS_ID);
		$pessoa->setORGA_ID($row->ORGA_ID);
		$pessoa->setTRATAMENTO($row->PESS_TRATAMENTO);
		$pessoa->setNOME($row->PESS_NOME);
		$pessoa->setEMAIL($row->PESS_EMAIL);
		$pessoa->setFONE($row->PESS_FONE);
		$pessoa->setCELULAR($row->PESS_CELULAR);
		$pessoa->setNASCIMENTO($row->PESS_NASCIMENTO);
		$pessoa->setSEXO($row->PESS_SEXO);
		$pessoa->setOBS($row->PESS_OBS);
		
		$result_list[$result_count] = $pessoa;
		$result_count++;
	
	}
	
	return $result_list;

}




/**
 * Carrega todos os usuários
 *
 * @param none
 * @return array
 */
function listPessoasByOrganizacao($orga_id) {

	$sql =  "SELECT * FROM pessoa WHERE ORGA_ID = ".$orga_id." ORDER BY PESS_NOME;";
	$result =  $this->database->query($sql);
	$result = $this->database->result;
	//$row = mysql_fetch_object($result);
	
	$result_count = 0;
	while ($row = mysql_fetch_object($result)) {
		
	
		$pessoa = new Pessoa();

		$pessoa->setID($row->PESS_ID);
		$pessoa->setORGA_ID($row->ORGA_ID);
		$pessoa->setTRATAMENTO($row->PESS_TRATAMENTO);
		$pessoa->setNOME($row->PESS_NOME);
		$pessoa->setEMAIL($row->PESS_EMAIL);
		$pessoa->setFONE($row->PESS_FONE);
		$pessoa->setCELULAR($row->PESS_CELULAR);
		$pessoa->setNASCIMENTO($row->PESS_NASCIMENTO);
		$pessoa->setSEXO($row->PESS_SEXO);
		$pessoa->setOBS($row->PESS_OBS);
		
		$result_list[$result_count] = $pessoa;
		$result_count++;
	
	}
	
	return $result_list;

}



} // class : end

?>