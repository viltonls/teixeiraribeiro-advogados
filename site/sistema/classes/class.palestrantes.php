<?php
/*
*
* -------------------------------------------------------
* CLASSNAME:        inscricao
* GENERATION DATE:  12.10.2006
* CLASS FILE:       C:\Develop\xampp\htdocs\sql_class_generator/generated_classes/class.inscricao.php
* FOR MYSQL TABLE:  inscricao
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

class Palestrantes
{ // class : begin


// **********************
// ATTRIBUTE DECLARATION
// **********************

private $ID;   // KEY ATTR. WITH AUTOINCREMENT

private $NOME_PALESTRANTES;   // (normal Attribute)
private $CURRICULO_PALESTRANTES;   // (normal Attribute)

private $database; // Instance of class database


function Palestrantes() {
	$this->database = new Database();
}


// **********************
// GETTER METHODS
// **********************



function getID()
{
return $this->ID;
}

function getNOME_PALESTRANTES()
{
return $this->NOME_PALESTRANTES;
}

function getCURRICULO_PALESTRANTES()
{
return $this->CURRICULO_PALESTRANTES;
}



// **********************
// SETTER METHODS
// **********************


function setID($val)
{
$this->ID =  $val;
}

function setNOME_PALESTRANTES($val)
{
$this->NOME_PALESTRANTES =  $val;
}

function setCURRICULO_PALESTRANTES($val)
{
$this->CURRICULO_PALESTRANTES =  $val;
}



function select($id)
{

$sql =  "SELECT * FROM palestrantes WHERE ID_PALESTRANTES = $id ;";
$result =  $this->database->query($sql);
$result = $this->database->result;
$row = mysql_fetch_object($result);


$this->ID = $row->ID_PALESTRANTES;
$this->NOME_PALESTRANTES = $row->NOME_PALESTRANTES;
$this->CURRICULO_PALESTRANTES = $row->CURRICULO_PALESTRANTES;

// **********************
// DELETE
// **********************

function delete($id)
{
$sql = "DELETE FROM palestrantes WHERE ID_PALESTRANTES = $id;";
$result = $this->database->query($sql);

}

// **********************
// SAVE
// **********************

function save() {
	if ($this->ID != null) {
		$sql =  "SELECT * FROM palestrantes WHERE ID_PALESTRANTES = ".$this->ID.";";
		$result =  $this->database->query($sql);
		$result = $this->database->result;
		$row = mysql_fetch_object($result);
		
		if ($row->INSC_ID) {
			$this->update($this->ID);
		} else {
			$this->insert();
		}
		//$this->update($this->ID,$this->EVEN_ID);
	} else {
		$this->insert();
	}
}


// **********************
// INSERT
// **********************

function insert()
{
	if ($this->ID) {
		$sql = "INSERT INTO palestrantes (ID_PALESTRANTES,NOME_PALESTRANTES,CURRICULO_PALESTRANTES ) VALUES ( '$this->ID','$this->NOME_PALESTRANTES','$this->CURRICULO_PALESTRANTES' )";
		$result = $this->database->query($sql);
		$this->ID = mysql_insert_id($this->database->link);

	} else {
		$this->ID = ""; // clear key for autoincrement
		$sql = "INSERT INTO palestrantes ( NOME_PALESTRANTES,CURRICULO_PALESTRANTES) VALUES ( '$this->NOME_PALESTRANTES','$this->CURRICULO_PALESTRANTES')";
		$result = $this->database->query($sql);
		$this->ID = mysql_insert_id($this->database->link);
	}

}

// **********************
// UPDATE
// **********************

function update($id) {

$sql = " UPDATE palestrantes SET NOME_PALESTRANTES = '$this->NOME_PALESTRANTES',CURRICULO_PALESTRANTES = '$this->CURRICULO_PALESTRANTES' WHERE ID_PALESTRANTES  = $id ";

$result = $this->database->query($sql);

}

// **********************
// LOG_AVISO
// **********************


}
} // class : end

?>