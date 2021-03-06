<?php
/*
*
* -------------------------------------------------------
* CLASSNAME:        avaliador
* GENERATION DATE:  03.02.2007
* CLASS FILE:       C:\Develop\xampp\htdocs\sql_class_generator/generated_classes/class.avaliador.php
* FOR MYSQL TABLE:  avaliador
* FOR MYSQL DB:     officemkt
* -------------------------------------------------------
* CODE GENERATED BY:
* MY PHP-MYSQL-CLASS GENERATOR
* from: >> www.voegeli.li >> (download for free!)
* -------------------------------------------------------
*
*/

include_once("class.database.php");

// **********************
// CLASS DECLARATION
// **********************

class avaliador
{ // class : begin


// **********************
// ATTRIBUTE DECLARATION
// **********************

var $ID;   // KEY ATTR. WITH AUTOINCREMENT

var $NOME;   // (normal Attribute)
var $TELEFONE;   // (normal Attribute)
var $CELULAR;   // (normal Attribute)
var $LOGIN;   // (normal Attribute)
var $SENHA;   // (normal Attribute)
var $STATUS;   // (normal Attribute)
var $EVEN_ID;   // (normal Attribute)
var $DATA_CONVITE;
var $LOGGED;

var $database; // Instance of class database


// **********************
// CONSTRUCTOR METHOD
// **********************

function avaliador()
{

$this->database = new Database();

}


// **********************
// GETTER METHODS
// **********************


function getID()
{
return $this->ID;
}

function getNOME()
{
return $this->NOME;
}

function getTELEFONE()
{
return $this->TELEFONE;
}

function getCELULAR()
{
return $this->CELULAR;
}

function getLOGIN()
{
return $this->LOGIN;
}

function getSENHA()
{
return $this->SENHA;
}

function getSTATUS()
{
return $this->STATUS;
}

function getEVEN_ID()
{
return $this->EVEN_ID;
}

function getDATA_CONVITE()
{
return $this->DATA_CONVITE;
}
function getLOGGED()
{
return $this->LOGGED;
}


// **********************
// SETTER METHODS
// **********************


function setID($val)
{
$this->ID =  $val;
}

function setNOME($val)
{
$this->NOME =  $val;
}

function setTELEFONE($val)
{
$this->TELEFONE =  $val;
}

function setCELULAR($val)
{
$this->CELULAR =  $val;
}

function setLOGIN($val)
{
$this->LOGIN =  $val;
}

function setSENHA($val)
{
$this->SENHA =  $val;
}

function setSTATUS($val)
{
$this->STATUS =  $val;
}

function setEVEN_ID($val) {
$this->EVEN_ID =  $val;
}

function setDATA_CONVITE($val)
{ 
$this->DATA_CONVITE = $val;
}
function setLOGGED($val)
{
 $this->LOGGED = $val;
}

// **********************
// SELECT METHOD / LOAD
// **********************

function select($id) {

$sql =  "SELECT * FROM avaliador WHERE AVAL_ID = $id;";
$result =  $this->database->query($sql);
$result = $this->database->result;
$row = mysql_fetch_object($result);


$this->ID = $row->AVAL_ID;
$this->NOME = $row->AVAL_NOME;
$this->TELEFONE = $row->AVAL_TELEFONE;
$this->CELULAR = $row->AVAL_CELULAR;
$this->LOGIN = $row->AVAL_LOGIN;
$this->SENHA = $row->AVAL_SENHA;
$this->STATUS = $row->AVAL_STATUS;
$this->EVEN_ID = $row->EVEN_ID;
$this->DATA_CONVITE =  $row->AVAL_DATA_CONVITE;
$this->LOGGED =  $row->AVAL_LOGGED;
}

// **********************
// DELETE
// **********************

function delete($id) {
$sql = "DELETE FROM avaliador WHERE AVAL_ID = $id;";
$result = $this->database->query($sql);

}

// **********************
// SAVE
// **********************

function save() {
	if ($this->ID != null) {
		$this->update($this->ID);
	} else {
		$this->insert();
	}
}

// **********************
// INSERT
// **********************

function insert() {
$this->ID = ""; // clear key for autoincrement

$sql = "INSERT INTO avaliador ( AVAL_NOME,AVAL_TELEFONE,AVAL_CELULAR,AVAL_LOGIN,AVAL_SENHA,AVAL_STATUS,EVEN_ID,AVAL_DATA_CONVITE,AVAL_LOGGED ) VALUES ( '$this->NOME','$this->TELEFONE','$this->CELULAR','$this->LOGIN','$this->SENHA','$this->STATUS','$this->EVEN_ID','$this->DATA_CONVITE','$this->LOGGED' )";
$result = $this->database->query($sql);
$this->ID = mysql_insert_id($this->database->link);

}

// **********************
// UPDATE
// **********************

function update($id) {

$sql = " UPDATE avaliador SET  AVAL_NOME = '$this->NOME',AVAL_TELEFONE = '$this->TELEFONE',AVAL_CELULAR = '$this->CELULAR',AVAL_LOGIN = '$this->LOGIN',AVAL_SENHA = '$this->SENHA',AVAL_STATUS = '$this->STATUS',EVEN_ID = '$this->EVEN_ID',AVAL_DATA_CONVITE = '$this->DATA_CONVITE',AVAL_LOGGED = '$this->LOGGED' WHERE AVAL_ID = $id ";

$result = $this->database->query($sql);

}


} // class : end

?>