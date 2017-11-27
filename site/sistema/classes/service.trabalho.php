<?php

include_once("class.trabalho.php");
include_once("class.database.php");

// **********************
// CLASS DECLARATION
// **********************

class TrabalhoService
{ // class : begin


// **********************
// ATTRIBUTE DECLARATION
// **********************

private $database; // Instance of class database


// **********************
// CONSTRUCTOR METHOD
// **********************

function TrabalhoService() {
	$this->database = new Database();
}


// **********************
// SELECT METHOD / LOAD
// **********************

/**
 * Carrega o valores pelo ID
 *
 * @param int $id
 * @return Trabalho
 */
function loadTrabalhoById($id,$even_id) {

	$trabalho = new Trabalho();
	$trabalho->select($id,$even_id);
	return $trabalho;

}

/**
 * Verifica se há inscrição com mesmo External ID para esse evento
 *
 * @param int $even_id, String $id_externo
 * @return int
 */
function loadTrabalhoByIdExterno($even_id, $id_externo) {

	$sql = "SELECT TRAB_ID FROM trabalho WHERE EVEN_ID = $even_id AND TRAB_ID_EXTERNO LIKE '".$id_externo."'";
	//echo "<hr>".$sql."<hr>";
	$result = $this->database->query($sql);
	$result = $this->database->result;
	$row = mysql_fetch_object($result);
	return $row->TRAB_ID;
}

/**
 * Carrega todos as trabalhos de um evento
 *
 * @param int $even_id, String $order_by, String
 * @return array
 */
function listTrabalhosByEvento($even_id, $order_by) {

	$sql = "SELECT * FROM trabalho WHERE EVEN_ID = $even_id ORDER BY TRAB_".$order_by.";";
	$result = $this->database->query($sql);
	$result = $this->database->result;
	//$row = mysql_fetch_object($result);
	
	$result_count = 0;
	while ($row = mysql_fetch_object($result)) {
		
	
		$trabalho = new Trabalho();
		
		$trabalho->setID($row->TRAB_ID);
		$trabalho->setEVEN_ID($row->EVEN_ID);
		$trabalho->setINSC_ID($row->INSC_ID);
		$trabalho->setAVAL_ID($row->AVAL_ID);
		$trabalho->setDATA($row->TRAB_DATA);
		$trabalho->setSTATUS($row->TRAB_STATUS);
		$trabalho->setAREA($row->TRAB_AREA);
		$trabalho->setOPCAO1($row->TRAB_OPCAO1);
		$trabalho->setOPCAO2($row->TRAB_OPCAO2);
		$trabalho->setOPCAO3($row->TRAB_OPCAO3);
		$trabalho->setOPCAO4($row->TRAB_OPCAO4);
		$trabalho->setOPCAO5($row->TRAB_OPCAO5);
		$trabalho->setAUTORIZACAO($row->TRAB_AUTORIZACAO);
		$trabalho->setDATA_APRES($row->TRAB_DATA_APRES);
		$trabalho->setTIPO_APRES($row->TRAB_TIPO_APRES);
		$trabalho->setTITULO($row->TRAB_TITULO);
		$trabalho->setRESUMO($row->TRAB_RESUMO);
		$trabalho->setCORPO($row->TRAB_CORPO);
		$trabalho->setBIBLIOGRAFIA($row->TRAB_BIBLIOGRAFIA);
		$trabalho->setARQ_NOME($row->TRAB_ARQ_NOME);
		$trabalho->setARQ_URL($row->TRAB_ARQ_URL);
		$trabalho->setARQ_TIPO($row->TRAB_ARQ_TIPO);
		$trabalho->setARQ2_NOME($row->TRAB_ARQ2_NOME);
		$trabalho->setARQ2_URL($row->TRAB_ARQ2_URL);
		$trabalho->setARQ2_TIPO($row->TRAB_ARQ2_TIPO);
		$trabalho->setAUTOR_CPF_PASSAPORTE($row->TRAB_AUTOR_CPF_PASSAPORTE);
		$trabalho->setAUTOR_NOME($row->TRAB_AUTOR_NOME);
		$trabalho->setAUTOR_EMAIL($row->TRAB_AUTOR_EMAIL);
		$trabalho->setAUTOR_FONE($row->TRAB_AUTOR_FONE);
		$trabalho->setAUTOR_ORGA($row->TRAB_AUTOR_ORGA);
		$trabalho->setAUTOR_CIDADE($row->TRAB_AUTOR_CIDADE);
		$trabalho->setAUTOR_ESTADO($row->TRAB_AUTOR_ESTADO);
		$trabalho->setAUTOR_PAIS($row->TRAB_AUTOR_PAIS);
		$trabalho->setAPRES_NOME($row->TRAB_APRES_NOME);
		$trabalho->setAPRES_EMAIL($row->TRAB_APRES_EMAIL);
		$trabalho->setAPRES_FONE($row->TRAB_APRES_FONE);
		$trabalho->setAPRES_ORGA($row->TRAB_APRES_ORGA);
		$trabalho->setAPRES_ENDERECO($row->TRAB_APRES_ENDERECO);
		$trabalho->setAPRES_BAIRRO($row->TRAB_APRES_BAIRRO);
		$trabalho->setAPRES_CIDADE($row->TRAB_APRES_CIDADE);
		$trabalho->setAPRES_ESTADO($row->TRAB_APRES_ESTADO);
		$trabalho->setAPRES_PAIS($row->TRAB_APRES_PAIS);
		$trabalho->setAPRES_CEP($row->TRAB_APRES_CEP);
		$trabalho->setAPRES_FAX($row->TRAB_APRES_FAX);
		$trabalho->setAPRES_CELULAR($row->TRAB_APRES_CELULAR);
		$trabalho->setAUTOR1_NOME($row->TRAB_AUTOR1_NOME);
		$trabalho->setAUTOR1_EMAIL($row->TRAB_AUTOR1_EMAIL);
		$trabalho->setAUTOR2_NOME($row->TRAB_AUTOR2_NOME);
		$trabalho->setAUTOR2_EMAIL($row->TRAB_AUTOR2_EMAIL);
		$trabalho->setAUTOR3_NOME($row->TRAB_AUTOR3_NOME);
		$trabalho->setAUTOR3_EMAIL($row->TRAB_AUTOR3_EMAIL);
		$trabalho->setAUTOR4_NOME($row->TRAB_AUTOR4_NOME);
		$trabalho->setAUTOR4_EMAIL($row->TRAB_AUTOR4_EMAIL);
		$trabalho->setAUTOR5_NOME($row->TRAB_AUTOR5_NOME);
		$trabalho->setAUTOR5_EMAIL($row->TRAB_AUTOR5_EMAIL);
		$trabalho->setAUTOR6_NOME($row->TRAB_AUTOR6_NOME);
		$trabalho->setAUTOR6_EMAIL($row->TRAB_AUTOR6_EMAIL);
		$trabalho->setAUTOR7_NOME($row->TRAB_AUTOR7_NOME);
		$trabalho->setAUTOR7_EMAIL($row->TRAB_AUTOR7_EMAIL);
		$trabalho->setAUTOR8_NOME($row->TRAB_AUTOR8_NOME);
		$trabalho->setAUTOR8_EMAIL($row->TRAB_AUTOR8_EMAIL);
		$trabalho->setAUTOR9_NOME($row->TRAB_AUTOR9_NOME);
		$trabalho->setAUTOR9_EMAIL($row->TRAB_AUTOR9_EMAIL);
		$trabalho->setAUTOR10_NOME($row->TRAB_AUTOR10_NOME);
		$trabalho->setAUTOR10_EMAIL($row->TRAB_AUTOR10_EMAIL);
		$trabalho->setAUTOR1_ORGA($row->TRAB_AUTOR1_ORGA);
		$trabalho->setAUTOR1_CPF_PASSAPORTE($row->TRAB_AUTOR1_CPF_PASSAPORTE);
		$trabalho->setAUTOR2_ORGA($row->TRAB_AUTOR2_ORGA);
		$trabalho->setAUTOR2_CPF_PASSAPORTE($row->TRAB_AUTOR2_CPF_PASSAPORTE);
		$trabalho->setAUTOR3_ORGA($row->TRAB_AUTOR3_ORGA);
		$trabalho->setAUTOR3_CPF_PASSAPORTE($row->TRAB_AUTOR3_CPF_PASSAPORTE);
		$trabalho->setAUTOR4_ORGA($row->TRAB_AUTOR4_ORGA);
		$trabalho->setAUTOR4_CPF_PASSAPORTE($row->TRAB_AUTOR4_CPF_PASSAPORTE);
		$trabalho->setAUTOR5_ORGA($row->TRAB_AUTOR5_ORGA);
		$trabalho->setAUTOR5_CPF_PASSAPORTE($row->TRAB_AUTOR5_CPF_PASSAPORTE);
		$trabalho->setAUTOR6_ORGA($row->TRAB_AUTOR6_ORGA);
		$trabalho->setAUTOR6_CPF_PASSAPORTE($row->TRAB_AUTOR6_CPF_PASSAPORTE);
		$trabalho->setAUTOR7_ORGA($row->TRAB_AUTOR7_ORGA);
		$trabalho->setAUTOR7_CPF_PASSAPORTE($row->TRAB_AUTOR7_CPF_PASSAPORTE);
		$trabalho->setAUTOR8_ORGA($row->TRAB_AUTOR8_ORGA);
		$trabalho->setAUTOR8_CPF_PASSAPORTE($row->TRAB_AUTOR8_CPF_PASSAPORTE);
		$trabalho->setAUTOR9_ORGA($row->TRAB_AUTOR9_ORGA);
		$trabalho->setAUTOR9_CPF_PASSAPORTE($row->TRAB_AUTOR9_CPF_PASSAPORTE);
		$trabalho->setAUTOR10_ORGA($row->TRAB_AUTOR10_ORGA);
		$trabalho->setAUTOR10_CPF_PASSAPORTE($row->TRAB_AUTOR10_CPF_PASSAPORTE);
		$trabalho->setOBS($row->TRAB_OBS);


		$result_list[$result_count] = $trabalho;
		$result_count++;
	
	}
	
	return $result_list;

}


/**
 * Carrega todos as trabalhos de um evento
 *
 * @param int $even_id, String $order_by, String
 * @return array
 */
function listTrabalhosFiltered($even_id,$area,$status,$order_by) {

	$sql = "SELECT * FROM trabalho WHERE EVEN_ID = $even_id ";
	if ($area != "") {
		$sql .= " AND TRAB_AREA = ".$area;
	}
	if ($status != "") {
		$sql .= " AND TRAB_STATUS = ".$status;
	}
	if ($order_by != "") {
		$sql .= " ORDER BY TRAB_".$order_by.";";
	}
	//echo $sql;break;
	$result = $this->database->query($sql);
	$result = $this->database->result;
	//$row = mysql_fetch_object($result);
	
	$result_count = 0;
	while ($row = mysql_fetch_object($result)) {
		
	
		$trabalho = new Trabalho();
		
		$trabalho->setID($row->TRAB_ID);
		$trabalho->setEVEN_ID($row->EVEN_ID);
		$trabalho->setINSC_ID($row->INSC_ID);
		$trabalho->setAVAL_ID($row->AVAL_ID);
		$trabalho->setDATA($row->TRAB_DATA);
		$trabalho->setSTATUS($row->TRAB_STATUS);
		$trabalho->setAREA($row->TRAB_AREA);
		$trabalho->setOPCAO1($row->TRAB_OPCAO1);
		$trabalho->setOPCAO2($row->TRAB_OPCAO2);
		$trabalho->setOPCAO3($row->TRAB_OPCAO3);
		$trabalho->setOPCAO4($row->TRAB_OPCAO4);
		$trabalho->setOPCAO5($row->TRAB_OPCAO5);
		$trabalho->setAUTORIZACAO($row->TRAB_AUTORIZACAO);
		$trabalho->setDATA_APRES($row->TRAB_DATA_APRES);
		$trabalho->setTIPO_APRES($row->TRAB_TIPO_APRES);
		$trabalho->setTITULO($row->TRAB_TITULO);
		$trabalho->setRESUMO($row->TRAB_RESUMO);
		$trabalho->setCORPO($row->TRAB_CORPO);
		$trabalho->setBIBLIOGRAFIA($row->TRAB_BIBLIOGRAFIA);
		$trabalho->setARQ_NOME($row->TRAB_ARQ_NOME);
		$trabalho->setARQ_URL($row->TRAB_ARQ_URL);
		$trabalho->setARQ_TIPO($row->TRAB_ARQ_TIPO);
		$trabalho->setARQ2_NOME($row->TRAB_ARQ2_NOME);
		$trabalho->setARQ2_URL($row->TRAB_ARQ2_URL);
		$trabalho->setARQ2_TIPO($row->TRAB_ARQ2_TIPO);
		$trabalho->setAUTOR_CPF_PASSAPORTE($row->TRAB_AUTOR_CPF_PASSAPORTE);
		$trabalho->setAUTOR_NOME($row->TRAB_AUTOR_NOME);
		$trabalho->setAUTOR_EMAIL($row->TRAB_AUTOR_EMAIL);
		$trabalho->setAUTOR_FONE($row->TRAB_AUTOR_FONE);
		$trabalho->setAUTOR_ORGA($row->TRAB_AUTOR_ORGA);
		$trabalho->setAUTOR_CIDADE($row->TRAB_AUTOR_CIDADE);
		$trabalho->setAUTOR_ESTADO($row->TRAB_AUTOR_ESTADO);
		$trabalho->setAUTOR_PAIS($row->TRAB_AUTOR_PAIS);
		$trabalho->setAPRES_NOME($row->TRAB_APRES_NOME);
		$trabalho->setAPRES_EMAIL($row->TRAB_APRES_EMAIL);
		$trabalho->setAPRES_FONE($row->TRAB_APRES_FONE);
		$trabalho->setAPRES_ORGA($row->TRAB_APRES_ORGA);
		$trabalho->setAPRES_ENDERECO($row->TRAB_APRES_ENDERECO);
		$trabalho->setAPRES_BAIRRO($row->TRAB_APRES_BAIRRO);
		$trabalho->setAPRES_CIDADE($row->TRAB_APRES_CIDADE);
		$trabalho->setAPRES_ESTADO($row->TRAB_APRES_ESTADO);
		$trabalho->setAPRES_PAIS($row->TRAB_APRES_PAIS);
		$trabalho->setAPRES_CEP($row->TRAB_APRES_CEP);
		$trabalho->setAPRES_FAX($row->TRAB_APRES_FAX);
		$trabalho->setAPRES_CELULAR($row->TRAB_APRES_CELULAR);
		$trabalho->setAUTOR1_NOME($row->TRAB_AUTOR1_NOME);
		$trabalho->setAUTOR1_EMAIL($row->TRAB_AUTOR1_EMAIL);
		$trabalho->setAUTOR2_NOME($row->TRAB_AUTOR2_NOME);
		$trabalho->setAUTOR2_EMAIL($row->TRAB_AUTOR2_EMAIL);
		$trabalho->setAUTOR3_NOME($row->TRAB_AUTOR3_NOME);
		$trabalho->setAUTOR3_EMAIL($row->TRAB_AUTOR3_EMAIL);
		$trabalho->setAUTOR4_NOME($row->TRAB_AUTOR4_NOME);
		$trabalho->setAUTOR4_EMAIL($row->TRAB_AUTOR4_EMAIL);
		$trabalho->setAUTOR5_NOME($row->TRAB_AUTOR5_NOME);
		$trabalho->setAUTOR5_EMAIL($row->TRAB_AUTOR5_EMAIL);
		$trabalho->setAUTOR6_NOME($row->TRAB_AUTOR6_NOME);
		$trabalho->setAUTOR6_EMAIL($row->TRAB_AUTOR6_EMAIL);
		$trabalho->setAUTOR7_NOME($row->TRAB_AUTOR7_NOME);
		$trabalho->setAUTOR7_EMAIL($row->TRAB_AUTOR7_EMAIL);
		$trabalho->setAUTOR8_NOME($row->TRAB_AUTOR8_NOME);
		$trabalho->setAUTOR8_EMAIL($row->TRAB_AUTOR8_EMAIL);
		$trabalho->setAUTOR9_NOME($row->TRAB_AUTOR9_NOME);
		$trabalho->setAUTOR9_EMAIL($row->TRAB_AUTOR9_EMAIL);
		$trabalho->setAUTOR10_NOME($row->TRAB_AUTOR10_NOME);
		$trabalho->setAUTOR10_EMAIL($row->TRAB_AUTOR10_EMAIL);
		$trabalho->setAUTOR1_ORGA($row->TRAB_AUTOR1_ORGA);
		$trabalho->setAUTOR1_CPF_PASSAPORTE($row->TRAB_AUTOR1_CPF_PASSAPORTE);
		$trabalho->setAUTOR2_ORGA($row->TRAB_AUTOR2_ORGA);
		$trabalho->setAUTOR2_CPF_PASSAPORTE($row->TRAB_AUTOR2_CPF_PASSAPORTE);
		$trabalho->setAUTOR3_ORGA($row->TRAB_AUTOR3_ORGA);
		$trabalho->setAUTOR3_CPF_PASSAPORTE($row->TRAB_AUTOR3_CPF_PASSAPORTE);
		$trabalho->setAUTOR4_ORGA($row->TRAB_AUTOR4_ORGA);
		$trabalho->setAUTOR4_CPF_PASSAPORTE($row->TRAB_AUTOR4_CPF_PASSAPORTE);
		$trabalho->setAUTOR5_ORGA($row->TRAB_AUTOR5_ORGA);
		$trabalho->setAUTOR5_CPF_PASSAPORTE($row->TRAB_AUTOR5_CPF_PASSAPORTE);
		$trabalho->setAUTOR6_ORGA($row->TRAB_AUTOR6_ORGA);
		$trabalho->setAUTOR6_CPF_PASSAPORTE($row->TRAB_AUTOR6_CPF_PASSAPORTE);
		$trabalho->setAUTOR7_ORGA($row->TRAB_AUTOR7_ORGA);
		$trabalho->setAUTOR7_CPF_PASSAPORTE($row->TRAB_AUTOR7_CPF_PASSAPORTE);
		$trabalho->setAUTOR8_ORGA($row->TRAB_AUTOR8_ORGA);
		$trabalho->setAUTOR8_CPF_PASSAPORTE($row->TRAB_AUTOR8_CPF_PASSAPORTE);
		$trabalho->setAUTOR9_ORGA($row->TRAB_AUTOR9_ORGA);
		$trabalho->setAUTOR9_CPF_PASSAPORTE($row->TRAB_AUTOR9_CPF_PASSAPORTE);
		$trabalho->setAUTOR10_ORGA($row->TRAB_AUTOR10_ORGA);
		$trabalho->setAUTOR10_CPF_PASSAPORTE($row->TRAB_AUTOR10_CPF_PASSAPORTE);
		$trabalho->setOBS($row->TRAB_OBS);


		$result_list[$result_count] = $trabalho;
		$result_count++;
	
	}
	
	return $result_list;

}

function listTrabalhosByCategoria($even_id,$categoria,$status,$order_by) {

	$sql = "SELECT * FROM trabalho WHERE EVEN_ID = $even_id  AND TRAB_OPCAO2 = '$categoria'";
	if ($status != "") {
		$sql .= " AND TRAB_STATUS = ".$status;
	}
	if ($order_by != "") {
		$sql .= " ORDER BY TRAB_".$order_by.";";
	}
	//echo $sql;break;
	$result = $this->database->query($sql);
	$result = $this->database->result;
	//$row = mysql_fetch_object($result);
	
	$result_count = 0;
	while ($row = mysql_fetch_object($result)) {
		
	
		$trabalho = new Trabalho();
		
		$trabalho->setID($row->TRAB_ID);
		$trabalho->setEVEN_ID($row->EVEN_ID);
		$trabalho->setINSC_ID($row->INSC_ID);
		$trabalho->setAVAL_ID($row->AVAL_ID);
		$trabalho->setDATA($row->TRAB_DATA);
		$trabalho->setSTATUS($row->TRAB_STATUS);
		$trabalho->setAREA($row->TRAB_AREA);
		$trabalho->setOPCAO1($row->TRAB_OPCAO1);
		$trabalho->setOPCAO2($row->TRAB_OPCAO2);
		$trabalho->setOPCAO3($row->TRAB_OPCAO3);
		$trabalho->setOPCAO4($row->TRAB_OPCAO4);
		$trabalho->setOPCAO5($row->TRAB_OPCAO5);
		$trabalho->setAUTORIZACAO($row->TRAB_AUTORIZACAO);
		$trabalho->setDATA_APRES($row->TRAB_DATA_APRES);
		$trabalho->setTIPO_APRES($row->TRAB_TIPO_APRES);
		$trabalho->setTITULO($row->TRAB_TITULO);
		$trabalho->setRESUMO($row->TRAB_RESUMO);
		$trabalho->setCORPO($row->TRAB_CORPO);
		$trabalho->setBIBLIOGRAFIA($row->TRAB_BIBLIOGRAFIA);
		$trabalho->setARQ_NOME($row->TRAB_ARQ_NOME);
		$trabalho->setARQ_URL($row->TRAB_ARQ_URL);
		$trabalho->setARQ_TIPO($row->TRAB_ARQ_TIPO);
		$trabalho->setARQ2_NOME($row->TRAB_ARQ2_NOME);
		$trabalho->setARQ2_URL($row->TRAB_ARQ2_URL);
		$trabalho->setARQ2_TIPO($row->TRAB_ARQ2_TIPO);
		$trabalho->setAUTOR_CPF_PASSAPORTE($row->TRAB_AUTOR_CPF_PASSAPORTE);
		$trabalho->setAUTOR_NOME($row->TRAB_AUTOR_NOME);
		$trabalho->setAUTOR_EMAIL($row->TRAB_AUTOR_EMAIL);
		$trabalho->setAUTOR_FONE($row->TRAB_AUTOR_FONE);
		$trabalho->setAUTOR_ORGA($row->TRAB_AUTOR_ORGA);
		$trabalho->setAUTOR_CIDADE($row->TRAB_AUTOR_CIDADE);
		$trabalho->setAUTOR_ESTADO($row->TRAB_AUTOR_ESTADO);
		$trabalho->setAUTOR_PAIS($row->TRAB_AUTOR_PAIS);
		$trabalho->setAPRES_NOME($row->TRAB_APRES_NOME);
		$trabalho->setAPRES_EMAIL($row->TRAB_APRES_EMAIL);
		$trabalho->setAPRES_FONE($row->TRAB_APRES_FONE);
		$trabalho->setAPRES_ORGA($row->TRAB_APRES_ORGA);
		$trabalho->setAPRES_ENDERECO($row->TRAB_APRES_ENDERECO);
		$trabalho->setAPRES_BAIRRO($row->TRAB_APRES_BAIRRO);
		$trabalho->setAPRES_CIDADE($row->TRAB_APRES_CIDADE);
		$trabalho->setAPRES_ESTADO($row->TRAB_APRES_ESTADO);
		$trabalho->setAPRES_PAIS($row->TRAB_APRES_PAIS);
		$trabalho->setAPRES_CEP($row->TRAB_APRES_CEP);
		$trabalho->setAPRES_FAX($row->TRAB_APRES_FAX);
		$trabalho->setAPRES_CELULAR($row->TRAB_APRES_CELULAR);
		$trabalho->setAUTOR1_NOME($row->TRAB_AUTOR1_NOME);
		$trabalho->setAUTOR1_EMAIL($row->TRAB_AUTOR1_EMAIL);
		$trabalho->setAUTOR2_NOME($row->TRAB_AUTOR2_NOME);
		$trabalho->setAUTOR2_EMAIL($row->TRAB_AUTOR2_EMAIL);
		$trabalho->setAUTOR3_NOME($row->TRAB_AUTOR3_NOME);
		$trabalho->setAUTOR3_EMAIL($row->TRAB_AUTOR3_EMAIL);
		$trabalho->setAUTOR4_NOME($row->TRAB_AUTOR4_NOME);
		$trabalho->setAUTOR4_EMAIL($row->TRAB_AUTOR4_EMAIL);
		$trabalho->setAUTOR5_NOME($row->TRAB_AUTOR5_NOME);
		$trabalho->setAUTOR5_EMAIL($row->TRAB_AUTOR5_EMAIL);
		$trabalho->setAUTOR6_NOME($row->TRAB_AUTOR6_NOME);
		$trabalho->setAUTOR6_EMAIL($row->TRAB_AUTOR6_EMAIL);
		$trabalho->setAUTOR7_NOME($row->TRAB_AUTOR7_NOME);
		$trabalho->setAUTOR7_EMAIL($row->TRAB_AUTOR7_EMAIL);
		$trabalho->setAUTOR8_NOME($row->TRAB_AUTOR8_NOME);
		$trabalho->setAUTOR8_EMAIL($row->TRAB_AUTOR8_EMAIL);
		$trabalho->setAUTOR9_NOME($row->TRAB_AUTOR9_NOME);
		$trabalho->setAUTOR9_EMAIL($row->TRAB_AUTOR9_EMAIL);
		$trabalho->setAUTOR10_NOME($row->TRAB_AUTOR10_NOME);
		$trabalho->setAUTOR10_EMAIL($row->TRAB_AUTOR10_EMAIL);
		$trabalho->setAUTOR1_ORGA($row->TRAB_AUTOR1_ORGA);
		$trabalho->setAUTOR1_CPF_PASSAPORTE($row->TRAB_AUTOR1_CPF_PASSAPORTE);
		$trabalho->setAUTOR2_ORGA($row->TRAB_AUTOR2_ORGA);
		$trabalho->setAUTOR2_CPF_PASSAPORTE($row->TRAB_AUTOR2_CPF_PASSAPORTE);
		$trabalho->setAUTOR3_ORGA($row->TRAB_AUTOR3_ORGA);
		$trabalho->setAUTOR3_CPF_PASSAPORTE($row->TRAB_AUTOR3_CPF_PASSAPORTE);
		$trabalho->setAUTOR4_ORGA($row->TRAB_AUTOR4_ORGA);
		$trabalho->setAUTOR4_CPF_PASSAPORTE($row->TRAB_AUTOR4_CPF_PASSAPORTE);
		$trabalho->setAUTOR5_ORGA($row->TRAB_AUTOR5_ORGA);
		$trabalho->setAUTOR5_CPF_PASSAPORTE($row->TRAB_AUTOR5_CPF_PASSAPORTE);
		$trabalho->setAUTOR6_ORGA($row->TRAB_AUTOR6_ORGA);
		$trabalho->setAUTOR6_CPF_PASSAPORTE($row->TRAB_AUTOR6_CPF_PASSAPORTE);
		$trabalho->setAUTOR7_ORGA($row->TRAB_AUTOR7_ORGA);
		$trabalho->setAUTOR7_CPF_PASSAPORTE($row->TRAB_AUTOR7_CPF_PASSAPORTE);
		$trabalho->setAUTOR8_ORGA($row->TRAB_AUTOR8_ORGA);
		$trabalho->setAUTOR8_CPF_PASSAPORTE($row->TRAB_AUTOR8_CPF_PASSAPORTE);
		$trabalho->setAUTOR9_ORGA($row->TRAB_AUTOR9_ORGA);
		$trabalho->setAUTOR9_CPF_PASSAPORTE($row->TRAB_AUTOR9_CPF_PASSAPORTE);
		$trabalho->setAUTOR10_ORGA($row->TRAB_AUTOR10_ORGA);
		$trabalho->setAUTOR10_CPF_PASSAPORTE($row->TRAB_AUTOR10_CPF_PASSAPORTE);
		$trabalho->setOBS($row->TRAB_OBS);


		$result_list[$result_count] = $trabalho;
		$result_count++;
	
	}
	
	return $result_list;

}




/**
 * Carrega todos as trabalhos de um evento
 *
 * @param int $aval_id, String $order_by, String
 * @return array
 */
function listTrabalhosByAvaliador($aval_id, $order_by,$even_id) {

	$sql = "SELECT * FROM trabalho WHERE AVAL_ID = $aval_id AND EVEN_ID = $even_id ORDER BY TRAB_".$order_by.";";
	$result = $this->database->query($sql);
	$result = $this->database->result;
	//$row = mysql_fetch_object($result);
	
	$result_count = 0;
	while ($row = mysql_fetch_object($result)) {
		
	
		$trabalho = new Trabalho();
		
		$trabalho->setID($row->TRAB_ID);
		$trabalho->setEVEN_ID($row->EVEN_ID);
		$trabalho->setINSC_ID($row->INSC_ID);
		$trabalho->setAVAL_ID($row->AVAL_ID);
		$trabalho->setDATA($row->TRAB_DATA);
		$trabalho->setSTATUS($row->TRAB_STATUS);
		$trabalho->setAREA($row->TRAB_AREA);
		$trabalho->setOPCAO1($row->TRAB_OPCAO1);
		$trabalho->setOPCAO2($row->TRAB_OPCAO2);
		$trabalho->setOPCAO3($row->TRAB_OPCAO3);
		$trabalho->setOPCAO4($row->TRAB_OPCAO4);
		$trabalho->setOPCAO5($row->TRAB_OPCAO5);
		$trabalho->setAUTORIZACAO($row->TRAB_AUTORIZACAO);
		$trabalho->setDATA_APRES($row->TRAB_DATA_APRES);
		$trabalho->setTIPO_APRES($row->TRAB_TIPO_APRES);
		$trabalho->setTITULO($row->TRAB_TITULO);
		$trabalho->setRESUMO($row->TRAB_RESUMO);
		$trabalho->setCORPO($row->TRAB_CORPO);
		$trabalho->setBIBLIOGRAFIA($row->TRAB_BIBLIOGRAFIA);
		$trabalho->setARQ_NOME($row->TRAB_ARQ_NOME);
		$trabalho->setARQ_URL($row->TRAB_ARQ_URL);
		$trabalho->setARQ_TIPO($row->TRAB_ARQ_TIPO);
		$trabalho->setARQ2_NOME($row->TRAB_ARQ2_NOME);
		$trabalho->setARQ2_URL($row->TRAB_ARQ2_URL);
		$trabalho->setARQ2_TIPO($row->TRAB_ARQ2_TIPO);
		$trabalho->setAUTOR_CPF_PASSAPORTE($row->TRAB_AUTOR_CPF_PASSAPORTE);
		$trabalho->setAUTOR_NOME($row->TRAB_AUTOR_NOME);
		$trabalho->setAUTOR_EMAIL($row->TRAB_AUTOR_EMAIL);
		$trabalho->setAUTOR_FONE($row->TRAB_AUTOR_FONE);
		$trabalho->setAUTOR_ORGA($row->TRAB_AUTOR_ORGA);
		$trabalho->setAUTOR_CIDADE($row->TRAB_AUTOR_CIDADE);
		$trabalho->setAUTOR_ESTADO($row->TRAB_AUTOR_ESTADO);
		$trabalho->setAUTOR_PAIS($row->TRAB_AUTOR_PAIS);
		$trabalho->setAPRES_NOME($row->TRAB_APRES_NOME);
		$trabalho->setAPRES_EMAIL($row->TRAB_APRES_EMAIL);
		$trabalho->setAPRES_FONE($row->TRAB_APRES_FONE);
		$trabalho->setAPRES_ORGA($row->TRAB_APRES_ORGA);
		$trabalho->setAPRES_ENDERECO($row->TRAB_APRES_ENDERECO);
		$trabalho->setAPRES_BAIRRO($row->TRAB_APRES_BAIRRO);
		$trabalho->setAPRES_CIDADE($row->TRAB_APRES_CIDADE);
		$trabalho->setAPRES_ESTADO($row->TRAB_APRES_ESTADO);
		$trabalho->setAPRES_PAIS($row->TRAB_APRES_PAIS);
		$trabalho->setAPRES_CEP($row->TRAB_APRES_CEP);
		$trabalho->setAPRES_FAX($row->TRAB_APRES_FAX);
		$trabalho->setAPRES_CELULAR($row->TRAB_APRES_CELULAR);
		$trabalho->setAUTOR1_NOME($row->TRAB_AUTOR1_NOME);
		$trabalho->setAUTOR1_EMAIL($row->TRAB_AUTOR1_EMAIL);
		$trabalho->setAUTOR2_NOME($row->TRAB_AUTOR2_NOME);
		$trabalho->setAUTOR2_EMAIL($row->TRAB_AUTOR2_EMAIL);
		$trabalho->setAUTOR3_NOME($row->TRAB_AUTOR3_NOME);
		$trabalho->setAUTOR3_EMAIL($row->TRAB_AUTOR3_EMAIL);
		$trabalho->setAUTOR4_NOME($row->TRAB_AUTOR4_NOME);
		$trabalho->setAUTOR4_EMAIL($row->TRAB_AUTOR4_EMAIL);
		$trabalho->setAUTOR5_NOME($row->TRAB_AUTOR5_NOME);
		$trabalho->setAUTOR5_EMAIL($row->TRAB_AUTOR5_EMAIL);
		$trabalho->setAUTOR6_NOME($row->TRAB_AUTOR6_NOME);
		$trabalho->setAUTOR6_EMAIL($row->TRAB_AUTOR6_EMAIL);
		$trabalho->setAUTOR7_NOME($row->TRAB_AUTOR7_NOME);
		$trabalho->setAUTOR7_EMAIL($row->TRAB_AUTOR7_EMAIL);
		$trabalho->setAUTOR8_NOME($row->TRAB_AUTOR8_NOME);
		$trabalho->setAUTOR8_EMAIL($row->TRAB_AUTOR8_EMAIL);
		$trabalho->setAUTOR9_NOME($row->TRAB_AUTOR9_NOME);
		$trabalho->setAUTOR9_EMAIL($row->TRAB_AUTOR9_EMAIL);
		$trabalho->setAUTOR10_NOME($row->TRAB_AUTOR10_NOME);
		$trabalho->setAUTOR10_EMAIL($row->TRAB_AUTOR10_EMAIL);
		$trabalho->setAUTOR1_ORGA($row->TRAB_AUTOR1_ORGA);
		$trabalho->setAUTOR1_CPF_PASSAPORTE($row->TRAB_AUTOR1_CPF_PASSAPORTE);
		$trabalho->setAUTOR2_ORGA($row->TRAB_AUTOR2_ORGA);
		$trabalho->setAUTOR2_CPF_PASSAPORTE($row->TRAB_AUTOR2_CPF_PASSAPORTE);
		$trabalho->setAUTOR3_ORGA($row->TRAB_AUTOR3_ORGA);
		$trabalho->setAUTOR3_CPF_PASSAPORTE($row->TRAB_AUTOR3_CPF_PASSAPORTE);
		$trabalho->setAUTOR4_ORGA($row->TRAB_AUTOR4_ORGA);
		$trabalho->setAUTOR4_CPF_PASSAPORTE($row->TRAB_AUTOR4_CPF_PASSAPORTE);
		$trabalho->setAUTOR5_ORGA($row->TRAB_AUTOR5_ORGA);
		$trabalho->setAUTOR5_CPF_PASSAPORTE($row->TRAB_AUTOR5_CPF_PASSAPORTE);
		$trabalho->setAUTOR6_ORGA($row->TRAB_AUTOR6_ORGA);
		$trabalho->setAUTOR6_CPF_PASSAPORTE($row->TRAB_AUTOR6_CPF_PASSAPORTE);
		$trabalho->setAUTOR7_ORGA($row->TRAB_AUTOR7_ORGA);
		$trabalho->setAUTOR7_CPF_PASSAPORTE($row->TRAB_AUTOR7_CPF_PASSAPORTE);
		$trabalho->setAUTOR8_ORGA($row->TRAB_AUTOR8_ORGA);
		$trabalho->setAUTOR8_CPF_PASSAPORTE($row->TRAB_AUTOR8_CPF_PASSAPORTE);
		$trabalho->setAUTOR9_ORGA($row->TRAB_AUTOR9_ORGA);
		$trabalho->setAUTOR9_CPF_PASSAPORTE($row->TRAB_AUTOR9_CPF_PASSAPORTE);
		$trabalho->setAUTOR10_ORGA($row->TRAB_AUTOR10_ORGA);
		$trabalho->setAUTOR10_CPF_PASSAPORTE($row->TRAB_AUTOR10_CPF_PASSAPORTE);
		$trabalho->setOBS($row->TRAB_OBS);


		$result_list[$result_count] = $trabalho;
		$result_count++;
	
	}
	
	return $result_list;

}

function todosTrabalhosAvaliados($even_id) {

	$sql = "SELECT * FROM trabalho WHERE EVEN_ID = $even_id AND TRAB_STATUS < 7";
	$result_count = 0;
	$result = $this->database->query($sql);
	$result = $this->database->result;
	
	while ($row = mysql_fetch_object($result)) {
		$result_count++;
	}
		return $result_count;
}


} // class : end

?>