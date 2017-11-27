<?php
include_once("class.database.php");

// **********************
// CLASS DECLARATION
// **********************

class avaliacaoAvaliadorDTO
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


var $NOME;   // (normal Attribute)
var $TELEFONE;   // (normal Attribute)
var $CELULAR;   // (normal Attribute)
var $LOGIN;   // (normal Attribute)
var $SENHA;   // (normal Attribute)
var $EVEN_ID;   // (normal Attribute)


var $database; // Instance of class database


// **********************
// CONSTRUCTOR METHOD
// **********************

function avaliacaoAvaliadorDTO() {

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

function getEVEN_ID()
{
return $this->EVEN_ID;
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

function setEVEN_ID($val) {
$this->EVEN_ID =  $val;
}



} // class : end

?>