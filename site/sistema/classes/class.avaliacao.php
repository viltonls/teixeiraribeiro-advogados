<?php
include_once("class.database.php");

// **********************
// CLASS DECLARATION
// **********************

class avaliacao
{ // class : begin


// **********************
// ATTRIBUTE DECLARATION
// **********************

var $AVAL_ID;
var $TRAB_ID;
var $DATA_ATRIBUIDO;
var $DATA_AVALIADO;
var $STATUS;
var $COMENTARIO;
var $NOTA_A;
var $NOTA_B;
var $NOTA_C;
var $NOTA_D;
var $NOTA_E;
var $NOTA_F;
var $NOTA_G;
var $NOTA_H;
var $NOTA_I;

public $STATUS_NOVO = 0;
public $STATUS_EM_REVISAO = 2;
public $STATUS_PENDENTE = 4;
public $STATUS_ACEITO_COM_RESTRICOES = 7;
public $STATUS_ACEITO = 8;
public $STATUS_REJEITADO = 9;

//////////// parte nova inserida por antonio na data 15/01/2010 /////////
public $STATUS_MUITO_BOM = 10;
public $STATUS_EXCELENTE = 11;


////////////////fim  parte nova inserida por antonio na data 15/01/2010 /////////////////
var $database; // Instance of class database


// **********************
// CONSTRUCTOR METHOD
// **********************

function avaliacao()
{

$this->database = new Database();

}


// **********************
// GETTER METHODS
// **********************


function getAVAL_ID() {
	return $this->AVAL_ID;
}

function setAVAL_ID($val) {
	$this->AVAL_ID =  $val;
}

function getTRAB_ID() {
	return $this->TRAB_ID;
}

function setTRAB_ID($val) {
	$this->TRAB_ID =  $val;
}

function getDATA_ATRIBUIDO() {
	return $this->DATA_ATRIBUIDO;
}

function setDATA_ATRIBUIDO($val) {
	$this->DATA_ATRIBUIDO =  $val;
}

function getDATA_AVALIADO() {
	return $this->DATA_AVALIADO;
}

function setDATA_AVALIADO($val) {
	$this->DATA_AVALIADO =  $val;
}

function getSTATUS() {
	return $this->STATUS;
}

function setSTATUS($val) {
	$this->STATUS =  $val;
}

function getCOMENTARIO() {
	return $this->COMENTARIO;
}

function setCOMENTARIO($val) {
	$this->COMENTARIO =  $val;
}

function getNOTA_A() {
	return $this->NOTA_A;
}

function setNOTA_A($val) {
	$this->NOTA_A =  $val;
}

function getNOTA_B() {
	return $this->NOTA_B;
}

function setNOTA_B($val) {
	$this->NOTA_B =  $val;
}

function getNOTA_C() {
	return $this->NOTA_C;
}

function setNOTA_C($val) {
	$this->NOTA_C =  $val;
}

function getNOTA_D() {
	return $this->NOTA_D;
}

function setNOTA_D($val) {
	$this->NOTA_D =  $val;
}

function getNOTA_E() {
	return $this->NOTA_E;
}

function setNOTA_E($val) {
	$this->NOTA_E =  $val;
}

function getNOTA_F() {
	return $this->NOTA_F;
}

function setNOTA_F($val) {
	$this->NOTA_F =  $val;
}

function getNOTA_G() {
	return $this->NOTA_G;
}

function setNOTA_G($val) {
	$this->NOTA_G =  $val;
}

function getNOTA_H() {
	return $this->NOTA_H;
}

function setNOTA_H($val) {
	$this->NOTA_H =  $val;
}

function getNOTA_I() {
	return $this->NOTA_I;
}

function setNOTA_I($val) {
	$this->NOTA_I =  $val;
}
// **********************
// SELECT METHOD / LOAD
// **********************

function select($aval_id, $trab_id) {

$sql =  "SELECT * FROM avaliador_trabalho WHERE AVAL_ID = $aval_id AND TRAB_ID = $trab_id;";
$result =  $this->database->query($sql);
$result = $this->database->result;
$row = mysql_fetch_object($result);


$this->AVAL_ID = $row->AVAL_ID;
$this->TRAB_ID = $row->TRAB_ID;
$this->DATA_ATRIBUIDO = $row->AVTR_DATA_ATRIBUIDO;
$this->DATA_AVALIADO = $row->AVTR_DATA_AVALIADO;
$this->STATUS = $row->AVTR_STATUS;
$this->COMENTARIO = $row->AVTR_COMENTARIO;
$this->NOTA_A = $row->AVTR_NOTA_A;
$this->NOTA_B = $row->AVTR_NOTA_B;
$this->NOTA_C = $row->AVTR_NOTA_C;
$this->NOTA_D = $row->AVTR_NOTA_D;
$this->NOTA_E = $row->AVTR_NOTA_E;
$this->NOTA_F = $row->AVTR_NOTA_F;
$this->NOTA_G = $row->AVTR_NOTA_G;
$this->NOTA_H = $row->AVTR_NOTA_H;
$this->NOTA_I = $row->AVTR_NOTA_I;


}

// **********************
// DELETE
// **********************

function delete($aval_id, $trab_id) {
$sql = "DELETE FROM avaliador_trabalho WHERE AVAL_ID = $aval_id AND TRAB_ID = $trab_id;";
$result = $this->database->query($sql);

}

// **********************
// SAVE
// **********************

function save() {
	if ($this->AVAL_ID != null && $this->TRAB_ID != null) {
		$this->update($this->AVAL_ID,$this->TRAB_ID);
	} else {
		$this->insert();
	}
}

// **********************
// INSERT
// **********************

function insert() {

$sql = "INSERT INTO avaliador_trabalho ( AVAL_ID,TRAB_ID,AVTR_DATA_ATRIBUIDO,AVTR_DATA_AVALIADO,AVTR_STATUS,AVTR_COMENTARIO,AVTR_NOTA_A,AVTR_NOTA_B,AVTR_NOTA_C,AVTR_NOTA_D,AVTR_NOTA_E,AVTR_NOTA_F,AVTR_NOTA_G,AVTR_NOTA_H,AVTR_NOTA_I ) VALUES ( '$this->AVAL_ID','$this->TRAB_ID','$this->DATA_ATRIBUIDO','$this->DATA_AVALIADO','$this->STATUS','$this->COMENTARIO','$this->NOTA_A','$this->NOTA_B','$this->NOTA_C','$this->NOTA_D','$this->NOTA_E','$this->NOTA_F','$this->NOTA_G','$this->NOTA_H','$this->NOTA_I' )";
$result = $this->database->query($sql);
//$this->ID = mysql_insert_id($this->database->link);

}

// **********************
// UPDATE
// **********************

function update($aval_id, $trab_id) {

$sql = " UPDATE avaliador_trabalho SET AVTR_DATA_ATRIBUIDO = '$this->DATA_ATRIBUIDO',AVTR_DATA_AVALIADO = '$this->DATA_AVALIADO',AVTR_STATUS = '$this->STATUS',AVTR_COMENTARIO = '$this->COMENTARIO',AVTR_NOTA_A = '$this->NOTA_A',AVTR_NOTA_B = '$this->NOTA_B',AVTR_NOTA_C = '$this->NOTA_C',AVTR_NOTA_D = '$this->NOTA_D',AVTR_NOTA_E = '$this->NOTA_E',AVTR_NOTA_F = '$this->NOTA_F',AVTR_NOTA_G = '$this->NOTA_G',AVTR_NOTA_H = '$this->NOTA_H',AVTR_NOTA_I = '$this->NOTA_I' WHERE AVAL_ID = '$this->AVAL_ID' AND TRAB_ID = '$this->TRAB_ID'";

$result = $this->database->query($sql);

}


} // class : end

?>