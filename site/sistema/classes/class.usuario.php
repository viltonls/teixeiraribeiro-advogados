<?php
/*
*
* -------------------------------------------------------
* CLASSNAME:        usuario
* GENERATION DATE:  12.10.2006
* CLASS FILE:       C:\Develop\xampp\htdocs\sql_class_generator/generated_classes/class.usuario.php
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

class Usuario
{ // class : begin


// **********************
// ATTRIBUTE DECLARATION
// **********************

private $ID;   // KEY ATTR. WITH AUTOINCREMENT

private $EVEN_ID;   // (normal Attribute)
private $NOME;   // (normal Attribute)
private $LOGIN;   // (normal Attribute)
private $EMAIL;   // (normal Attribute)
private $SENHA;   // (normal Attribute)
private $CELULAR;   // (normal Attribute)
private $ADMIN;   // (normal Attribute)
private $CAPTACAO;   // (normal Attribute)
private $OPERACIONAL;   // (normal Attribute)
private $COMERCIAL;   // (normal Attribute)
private $INSCRICOES;   // (normal Attribute)
private $TRABALHOS;   // (normal Attribute)
private $FINANCEIRO;   // (normal Attribute)
private $EVENTO;   // (normal Attribute)
private $DEPOIMENTOS;   // (normal Attribute)
private $CASES;   // (normal Attribute)
private $NOTICIAS;   // (normal Attribute)
private $CLIENTES;   // (normal Attribute)
private $PORTFOLIO; // (normal Attribute)
private $AREAS; // (normal Attribute)
private $ESCRITORIO; // (normal Attribute)
private $EQUIPE; // (normal Attribute)

private $database; // Instance of class database


// **********************
// CONSTRUCTOR METHOD
// **********************

function Usuario()
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

function getEVEN_ID()
{
return $this->EVEN_ID;
}

function getNOME()
{
return $this->NOME;
}

function getLOGIN()
{
return $this->LOGIN;
}

function getEMAIL()
{
return $this->EMAIL;
}

function getSENHA()
{
return $this->SENHA;
}

function getCELULAR()
{
return $this->CELULAR;
}

function getADMIN()
{
return $this->ADMIN;
}

function getCAPTACAO()
{
return $this->CAPTACAO;
}

function getOPERACIONAL()
{
return $this->OPERACIONAL;
}

function getCOMERCIAL()
{
return $this->COMERCIAL;
}

function getINSCRICOES()
{
return $this->INSCRICOES;
}

function getTRABALHOS()
{
return $this->TRABALHOS;
}

function getFINANCEIRO()
{
return $this->FINANCEIRO;
}

function getEVENTO()
{
return $this->EVENTO;
}

function getDEPOIMENTOS()
{
return $this->DEPOIMENTOS;
}

function getCASES()
{
return $this->CASES;
}

function getNOTICIAS()
{
return $this->NOTICIAS;
}

function getCLIENTES()
{
return $this->CLIENTES;
}

function getPORTFOLIO()
{
return $this->PORTFOLIO;
}

function getAREAS()
{
return $this->AREAS;
}

function getESCRITORIO()
{
return $this->ESCRITORIO;
}

function getEQUIPE()
{
return $this->EQUIPE;
}

// **********************
// SETTER METHODS
// **********************


function setID($val)
{
$this->ID =  $val;
}

function setEVEN_ID($val)
{
$this->EVEN_ID =  $val;
}

function setNOME($val)
{
$this->NOME =  $val;
}

function setLOGIN($val)
{
$this->LOGIN =  $val;
}

function setEMAIL($val)
{
$this->EMAIL =  $val;
}

function setSENHA($val)
{
$this->SENHA =  $val;
}

function setCELULAR($val)
{
$this->CELULAR =  $val;
}

function setADMIN($val)
{
$this->ADMIN =  $val;
}

function setCAPTACAO($val)
{
$this->CAPTACAO =  $val;
}

function setOPERACIONAL($val)
{
$this->OPERACIONAL =  $val;
}

function setCOMERCIAL($val)
{
$this->COMERCIAL =  $val;
}

function setINSCRICOES($val)
{
$this->INSCRICOES =  $val;
}

function setTRABALHOS($val)
{
$this->TRABALHOS =  $val;
}

function setFINANCEIRO($val)
{
$this->FINANCEIRO =  $val;
}

function setEVENTO($val)
{
$this->EVENTO =  $val;
}

function setDEPOIMENTOS($val)
{
$this->DEPOIMENTOS =  $val;
}

function setCASES($val)
{
$this->CASES =  $val;
}

function setNOTICIAS($val)
{
$this->NOTICIAS =  $val;
}

function setCLIENTES($val)
{
$this->CLIENTES =  $val;
}

function setPORTFOLIO($val)
{
$this->PORTFOLIO =  $val;
}

function setAREAS($val)
{
$this->AREAS =  $val;
}

function setESCRITORIO($val)
{
$this->ESCRITORIO =  $val;
}

function setEQUIPE($val)
{
$this->EQUIPE =  $val;
}
// **********************
// SELECT METHOD / LOAD
// **********************

function select($id)
{

$sql =  "SELECT * FROM usuario WHERE USUA_ID = $id;";
$result =  $this->database->query($sql);
$result = $this->database->result;
$row = mysql_fetch_object($result);


$this->ID = $row->USUA_ID;

$this->EVEN_ID = $row->EVEN_ID;

$this->NOME = $row->USUA_NOME;

$this->LOGIN = $row->USUA_LOGIN;

$this->EMAIL = $row->USUA_EMAIL;

$this->SENHA = $row->USUA_SENHA;

$this->CELULAR = $row->USUA_CELULAR;

$this->ADMIN = $row->USUA_ADMIN;

$this->CAPTACAO = $row->USUA_CAPTACAO;

$this->OPERACIONAL = $row->USUA_OPERACIONAL;

$this->COMERCIAL = $row->USUA_COMERCIAL;

$this->INSCRICOES = $row->USUA_INSCRICOES;

$this->TRABALHOS = $row->USUA_TRABALHOS;

$this->FINANCEIRO = $row->USUA_FINANCEIRO;

$this->EVENTO = $row->USUA_EVENTO;

$this->DEPOIMENTOS = $row->USUA_DEPOIMENTOS;

$this->CASES = $row->USUA_CASES;

$this->NOTICIAS = $row->USUA_NOTICIAS;

$this->CLIENTES = $row->USUA_CLIENTES;

$this->PORTFOLIO = $row->USUA_PORTFOLIO;

$this->AREAS = $row->USUA_AREAS;

$this->ESCRITORIO = $row->USUA_ESCRITORIO;

$this->EQUIPE = $row->USUA_EQUIPE;
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
// DELETE
// **********************

function delete($id)
{
$sql = "DELETE FROM usuario WHERE USUA_ID = $id;";
$result = $this->database->query($sql);

}

// **********************
// INSERT
// **********************

function insert()
{
$this->ID = ""; // clear key for autoincrement

$sql = "INSERT INTO usuario ( EVEN_ID,USUA_NOME,USUA_LOGIN,USUA_EMAIL,USUA_SENHA,USUA_CELULAR,USUA_ADMIN,USUA_CAPTACAO,USUA_OPERACIONAL,USUA_COMERCIAL,USUA_INSCRICOES,USUA_TRABALHOS,USUA_FINANCEIRO,USUA_EVENTO,USUA_DEPOIMENTOS,USUA_CASES,USUA_NOTICIAS,USUA_CLIENTES,USUA_PORTFOLIO,USUA_AREAS,USUA_ESCRITORIO,USUA_EQUIPE) VALUES ( '$this->EVEN_ID','$this->NOME','$this->LOGIN','$this->EMAIL','$this->SENHA','$this->CELULAR','$this->ADMIN','$this->CAPTACAO','$this->OPERACIONAL','$this->COMERCIAL','$this->INSCRICOES','$this->TRABALHOS','$this->FINANCEIRO','$this->EVENTO','$this->DEPOIMENTOS','$this->CASES','$this->NOTICIAS','$this->CLIENTES','$this->PORTFOLIO','$this->AREAS','$this->ESCRITORIO','$this->EQUIPE' )";
$result = $this->database->query($sql);
$this->ID = mysql_insert_id($this->database->link);

}

// **********************
// UPDATE
// **********************

function update($id)
{



$sql = " UPDATE usuario SET EVEN_ID = '$this->EVEN_ID',USUA_NOME = '$this->NOME',USUA_LOGIN = '$this->LOGIN',USUA_EMAIL = '$this->EMAIL',USUA_SENHA = '$this->SENHA',USUA_CELULAR = '$this->CELULAR',USUA_ADMIN = '$this->ADMIN',USUA_CAPTACAO = '$this->CAPTACAO',USUA_OPERACIONAL = '$this->OPERACIONAL',USUA_COMERCIAL = '$this->COMERCIAL',USUA_INSCRICOES = '$this->INSCRICOES',USUA_TRABALHOS = '$this->TRABALHOS',USUA_FINANCEIRO = '$this->FINANCEIRO',USUA_EVENTO = '$this->EVENTO'  ,USUA_DEPOIMENTOS = '$this->DEPOIMENTOS',USUA_CASES = '$this->CASES',USUA_NOTICIAS = '$this->NOTICIAS',USUA_CLIENTES = '$this->CLIENTES',USUA_PORTFOLIO = '$this->PORTFOLIO',USUA_AREAS = '$this->AREAS',USUA_ESCRITORIO = '$this->ESCRITORIO',USUA_EQUIPE = '$this->EQUIPE' WHERE USUA_ID = $id ";

$result = $this->database->query($sql);



}


} // class : end

?>