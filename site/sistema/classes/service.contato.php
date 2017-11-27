<?php

include_once("dto.contato.php");
include_once("class.contato.php");
include_once("class.database.php");

// **********************
// CLASS DECLARATION
// **********************

class ContatoService
{ // class : begin


// **********************
// ATTRIBUTE DECLARATION
// **********************

private $database; // Instance of class database


// **********************
// CONSTRUCTOR METHOD
// **********************

function ContatoService() {
	$this->database = new Database();
}


// **********************
// SELECT METHOD / LOAD
// **********************

/**
 * Carrega a contato pelo ID
 *
 * @param int $id
 * @return Contato
 */
function loadContatoById($id) {

	$contato = new Contato();
	$contato->select($id);
	return $contato;

}



/**
 * Carrega todos os usuários
 *
 * @param none
 * @return array
 */
function listContatos() {

	$sql =  "SELECT * FROM contato ORDER BY CONT_DATA DESC;";
	$result =  $this->database->query($sql);
	$result = $this->database->result;
	//$row = mysql_fetch_object($result);
	
	$result_count = 0;
	while ($row = mysql_fetch_object($result)) {
		
	
		$contato = new Contato();

		$contato->setID($row->CONT_ID);
		$contato->setORGA_ID($row->ORGA_ID);
		$contato->setEVEN_ID($row->EVEN_ID);
		$contato->setUSUA_ID($row->USUA_ID);
		$contato->setDATA($row->CONT_DATA);
		$contato->setTIPO($row->CONT_TIPO);
		$contato->setOBS($row->CONT_OBS);

		$result_list[$result_count] = $contato;
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
function listContatosByOrganizacao($orga_id) {

	$sql =  "SELECT * FROM contato WHERE ORGA_ID = ".$orga_id." ORDER BY CONT_DATA DESC;";
	$result =  $this->database->query($sql);
	$result = $this->database->result;
	//$row = mysql_fetch_object($result);
	
	$result_count = 0;
	while ($row = mysql_fetch_object($result)) {
		
	
		$contato = new Contato();

		$contato->setID($row->CONT_ID);
		$contato->setORGA_ID($row->ORGA_ID);
		$contato->setEVEN_ID($row->EVEN_ID);
		$contato->setUSUA_ID($row->USUA_ID);
		$contato->setDATA($row->CONT_DATA);
		$contato->setTIPO($row->CONT_TIPO);
		$contato->setOBS($row->CONT_OBS);
		
		$result_list[$result_count] = $contato;
		$result_count++;
	
	}
	
	return $result_list;

}


/**
 * Carrega todos os usuários
 *
 * @param int $orga_id, int $even_id, int $usua_id, String $tipo, Date $data_ini, Date $data_fim, String $order_by
 * @return array
 */
function reportContatosFiltered($orga_id, $even_id, $usua_id, $tipo, $data_ini, $data_fim, $order_by) {

	$sql =  " SELECT c.CONT_ID, c.ORGA_ID, o.ORGA_NOME, c.EVEN_ID, e.EVEN_NOME, c.USUA_ID, u.USUA_NOME, c.CONT_DATA, c.CONT_TIPO, c.CONT_OBS";
	$sql .= " FROM contato c, organizacao o, evento e, usuario u WHERE 1 = 1 ";
	$sql .= " AND c.ORGA_ID = o.ORGA_ID AND c.EVEN_ID = e.EVEN_ID AND c.USUA_ID = u.USUA_ID ";
	if ($orga_id) {
		$sql .= " AND c.ORGA_ID = ".$orga_id."";
	}
	if ($even_id) {
		$sql .= " AND c.EVEN_ID = ".$even_id."";
	}
	if ($usua_id) {
		$sql .= " AND c.USUA_ID = ".$usua_id."";
	}
	if ($tipo) {
		$sql .= " AND CONT_TIPO LIKE '".$tipo."'";
	}
	if ($data_ini) {
		$sql .= " AND CONT_DATA >= '".date('Y-m-d',$data_ini)."'";
	}
	if ($data_ini) {
		$sql .= " AND CONT_DATA <= '".date('Y-m-d',$data_fim)."'";
	}
	if ($order_by) {
		$sql .= " ORDER BY ".$order_by.";";
	} else {
		$sql .= " ORDER BY CONT_DATA DESC;";
	}
	
	//echo $sql;break;
	$result =  $this->database->query($sql);
	$result = $this->database->result;
	//$row = mysql_fetch_object($result);
	
	$result_count = 0;
	while ($row = mysql_fetch_object($result)) {
		
	
		$contatoDTO = new ContatoDTO();

		$contatoDTO->setID($row->CONT_ID);
		$contatoDTO->setORGA_ID($row->ORGA_ID);
		$contatoDTO->setORGA_NOME($row->ORGA_NOME);
		$contatoDTO->setEVEN_ID($row->EVEN_ID);
		$contatoDTO->setEVEN_NOME($row->EVEN_NOME);
		$contatoDTO->setUSUA_ID($row->USUA_ID);
		$contatoDTO->setUSUA_NOME($row->USUA_NOME);
		$contatoDTO->setDATA($row->CONT_DATA);
		$contatoDTO->setTIPO($row->CONT_TIPO);
		$contatoDTO->setOBS($row->CONT_OBS);
		
		$result_list[$result_count] = $contatoDTO;
		$result_count++;
	
	}
	
	return $result_list;

}


} // class : end

?>