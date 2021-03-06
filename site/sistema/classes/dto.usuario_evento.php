<?php
/*
*
* -------------------------------------------------------
* CLASSNAME:        
* GENERATION DATE:  12.10.2006
* CLASS FILE:       
* FOR MYSQL TABLE:  usuario
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

class UsuarioEventoDTO
{ // class : begin


// **********************
// ATTRIBUTE DECLARATION
// **********************

private $ID;   // KEY ATTR. WITH AUTOINCREMENT

private $NOME;   // (normal Attribute)
private $LOGIN;   // (normal Attribute)
private $CELULAR;   // (normal Attribute)
private $EVEN_ID;   // (normal Attribute)
private $EVEN_NOME;
private $ORGA_ID;
private $ORGA_NOME;

private $database; // Instance of class database


// **********************
// CONSTRUCTOR METHOD
// **********************

function UsuarioEventoDTO() {
	$this->database = new Database();
}


// **********************
// GETTER METHODS
// **********************

function getID() {
	return $this->ID;
}

function getEVEN_ID() {
	return $this->EVEN_ID;
}

function getNOME() {
	return $this->NOME;
}

function getLOGIN() {
	return $this->LOGIN;
}

function getCELULAR() {
	return $this->CELULAR;
}

function getEVEN_NOME() {
	return $this->EVEN_NOME;
}

function getORGA_ID() {
	return $this->ORGA_ID;
}

function getORGA_NOME() {
	return $this->ORGA_NOME;
}

// **********************
// SETTER METHODS
// **********************


function setID($val) {
	$this->ID =  $val;
}

function setEVEN_ID($val) {
	$this->EVEN_ID =  $val;
}

function setNOME($val) {
	$this->NOME =  $val;
}

function setLOGIN($val) {
	$this->LOGIN =  $val;
}

function setCELULAR($val) {
	$this->CELULAR =  $val;
}

function setEVEN_NOME($val) {
	$this->EVEN_NOME =  $val;
}

function setORGA_ID($val) {
	$this->ORGA_ID =  $val;
}

function setORGA_NOME($val) {
	$this->ORGA_NOME =  $val;
}


} // class : end

?>