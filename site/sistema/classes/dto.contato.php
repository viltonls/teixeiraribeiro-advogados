<?php

// **********************
// CLASS DECLARATION
// **********************

class ContatoDTO
{ // class : begin


// **********************
// ATTRIBUTE DECLARATION
// **********************

private $ID;   // KEY ATTR. WITH AUTOINCREMENT

private $ORGA_ID;   // (normal Attribute)
private $ORGA_NOME;   // (normal Attribute)
private $EVEN_ID;   // (normal Attribute)
private $EVEN_NOME;   // (normal Attribute)
private $USUA_ID;   // (normal Attribute)
private $USUA_NOME;   // (normal Attribute)
private $DATA;   // (normal Attribute)
private $TIPO;   // (normal Attribute)
private $OBS;   // (normal Attribute)


// **********************
// CONSTRUCTOR METHOD
// **********************

function ContatoDTO()
{


}


// **********************
// GETTER METHODS
// **********************


function getID()
{
return $this->ID;
}

function getORGA_ID()
{
return $this->ORGA_ID;
}

function getORGA_NOME()
{
return $this->ORGA_NOME;
}

function getEVEN_ID()
{
return $this->EVEN_ID;
}

function getEVEN_NOME()
{
return $this->EVEN_NOME;
}

function getUSUA_ID()
{
return $this->USUA_ID;
}

function getUSUA_NOME()
{
return $this->USUA_NOME;
}

function getDATA()
{
return $this->DATA;
}

function getTIPO()
{
return $this->TIPO;
}

function getOBS()
{
return $this->OBS;
}

// **********************
// SETTER METHODS
// **********************


function setID($val)
{
$this->ID =  $val;
}

function setORGA_ID($val)
{
$this->ORGA_ID =  $val;
}

function setORGA_NOME($val)
{
$this->ORGA_NOME =  $val;
}

function setEVEN_ID($val)
{
$this->EVEN_ID =  $val;
}

function setEVEN_NOME($val)
{
$this->EVEN_NOME =  $val;
}

function setUSUA_ID($val)
{
$this->USUA_ID =  $val;
}

function setUSUA_NOME($val)
{
$this->USUA_NOME =  $val;
}

function setDATA($val)
{
$this->DATA =  $val;
}

function setTIPO($val)
{
$this->TIPO =  $val;
}

function setOBS($val)
{
$this->OBS =  $val;
}

// **********************
// SELECT METHOD / LOAD
// **********************



} // class : end

?>