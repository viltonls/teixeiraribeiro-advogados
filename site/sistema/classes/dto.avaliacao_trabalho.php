<?php
include_once("class.database.php");

// **********************
// CLASS DECLARATION
// **********************

class avaliacaoTrabalhoDTO
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

var $EVEN_ID;   // (normal Attribute)
var $INSC_ID;   // (normal Attribute)
var $DATA;   // (normal Attribute)
var $ID_EXTERNO;   // (normal Attribute)
var $AREA;   // (normal Attribute)
var $OPCAO1;   // (normal Attribute)
var $OPCAO2;   // (normal Attribute)
var $OPCAO3;   // (normal Attribute)
var $OPCAO4;   // (normal Attribute)
var $OPCAO5;   // (normal Attribute)
var $AUTORIZACAO;   // (normal Attribute)
var $DATA_APRES;   // (normal Attribute)
var $TIPO_APRES;   // (normal Attribute)
var $TITULO;   // (normal Attribute)
var $RESUMO;   // (normal Attribute)
var $CORPO;   // (normal Attribute)
var $BIBLIOGRAFIA;   // (normal Attribute)
var $ARQ_NOME;   // (normal Attribute)
var $ARQ_URL;   // (normal Attribute)
var $ARQ_TIPO;   // (normal Attribute)
var $ARQ2_NOME;   // (normal Attribute)
var $ARQ2_URL;   // (normal Attribute)
var $ARQ2_TIPO;   // (normal Attribute)
var $AUTOR_CPF_PASSAPORTE;   // (normal Attribute)
var $AUTOR_NOME;   // (normal Attribute)
var $AUTOR_EMAIL;   // (normal Attribute)
var $AUTOR_FONE;   // (normal Attribute)
var $AUTOR_ORGA;   // (normal Attribute)
var $AUTOR_CIDADE;   // (normal Attribute)
var $AUTOR_ESTADO;   // (normal Attribute)
var $AUTOR_PAIS;   // (normal Attribute)
var $APRES_NOME;   // (normal Attribute)
var $APRES_EMAIL;   // (normal Attribute)
var $APRES_FONE;   // (normal Attribute)
var $APRES_ORGA;   // (normal Attribute)
var $AUTOR1_NOME;   // (normal Attribute)
var $AUTOR1_EMAIL;   // (normal Attribute)
var $AUTOR2_NOME;   // (normal Attribute)
var $AUTOR2_EMAIL;   // (normal Attribute)
var $AUTOR3_NOME;   // (normal Attribute)
var $AUTOR3_EMAIL;   // (normal Attribute)
var $AUTOR4_NOME;   // (normal Attribute)
var $AUTOR4_EMAIL;   // (normal Attribute)
var $AUTOR5_NOME;   // (normal Attribute)
var $AUTOR5_EMAIL;   // (normal Attribute)
var $AUTOR6_NOME;   // (normal Attribute)
var $AUTOR6_EMAIL;   // (normal Attribute)
var $AUTOR7_NOME;   // (normal Attribute)
var $AUTOR7_EMAIL;   // (normal Attribute)
var $AUTOR8_NOME;   // (normal Attribute)
var $AUTOR8_EMAIL;   // (normal Attribute)
var $AUTOR9_NOME;   // (normal Attribute)
var $AUTOR9_EMAIL;   // (normal Attribute)
var $AUTOR10_NOME;   // (normal Attribute)
var $AUTOR10_EMAIL;   // (normal Attribute)
var $OBS;   // (normal Attribute)

var $database; // Instance of class database


// **********************
// CONSTRUCTOR METHOD
// **********************

function avaliacaoTrabalhoDTO() {


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


function getEVEN_ID()
{
return $this->EVEN_ID;
}

function getINSC_ID()
{
return $this->INSC_ID;
}

function getDATA()
{
return $this->DATA;
}

function getID_EXTERNO()
{
return $this->ID_EXTERNO;
}

function getAREA()
{
return $this->AREA;
}

function getOPCAO1()
{
return $this->OPCAO1;
}

function getOPCAO2()
{
return $this->OPCAO2;
}

function getOPCAO3()
{
return $this->OPCAO3;
}

function getOPCAO4()
{
return $this->OPCAO4;
}

function getOPCAO5()
{
return $this->OPCAO5;
}

function getAUTORIZACAO()
{
return $this->AUTORIZACAO;
}

function getDATA_APRES()
{
return $this->DATA_APRES;
}

function getTIPO_APRES()
{
return $this->TIPO_APRES;
}

function getTITULO()
{
return $this->TITULO;
}

function getRESUMO()
{
return $this->RESUMO;
}

function getCORPO()
{
return $this->CORPO;
}

function getBIBLIOGRAFIA()
{
return $this->BIBLIOGRAFIA;
}

function getARQ_NOME()
{
return $this->ARQ_NOME;
}

function getARQ_URL()
{
return $this->ARQ_URL;
}

function getARQ_TIPO()
{
return $this->ARQ_TIPO;
}

function getARQ2_NOME()
{
return $this->ARQ2_NOME;
}

function getARQ2_URL()
{
return $this->ARQ2_URL;
}

function getARQ2_TIPO()
{
return $this->ARQ2_TIPO;
}

function getAUTOR_CPF_PASSAPORTE()
{
return $this->AUTOR_CPF_PASSAPORTE;
}

function getAUTOR_NOME()
{
return $this->AUTOR_NOME;
}

function getAUTOR_EMAIL()
{
return $this->AUTOR_EMAIL;
}

function getAUTOR_FONE()
{
return $this->AUTOR_FONE;
}

function getAUTOR_ORGA()
{
return $this->AUTOR_ORGA;
}

function getAUTOR_CIDADE()
{
return $this->AUTOR_CIDADE;
}

function getAUTOR_ESTADO()
{
return $this->AUTOR_ESTADO;
}

function getAUTOR_PAIS()
{
return $this->AUTOR_PAIS;
}

function getAPRES_NOME()
{
return $this->APRES_NOME;
}

function getAPRES_EMAIL()
{
return $this->APRES_EMAIL;
}

function getAPRES_FONE()
{
return $this->APRES_FONE;
}

function getAPRES_ORGA()
{
return $this->APRES_ORGA;
}

function getAUTOR1_NOME()
{
return $this->AUTOR1_NOME;
}

function getAUTOR1_EMAIL()
{
return $this->AUTOR1_EMAIL;
}

function getAUTOR2_NOME()
{
return $this->AUTOR2_NOME;
}

function getAUTOR2_EMAIL()
{
return $this->AUTOR2_EMAIL;
}

function getAUTOR3_NOME()
{
return $this->AUTOR3_NOME;
}

function getAUTOR3_EMAIL()
{
return $this->AUTOR3_EMAIL;
}

function getAUTOR4_NOME()
{
return $this->AUTOR4_NOME;
}

function getAUTOR4_EMAIL()
{
return $this->AUTOR4_EMAIL;
}

function getAUTOR5_NOME()
{
return $this->AUTOR5_NOME;
}

function getAUTOR5_EMAIL()
{
return $this->AUTOR5_EMAIL;
}

function getAUTOR6_NOME()
{
return $this->AUTOR6_NOME;
}

function getAUTOR6_EMAIL()
{
return $this->AUTOR6_EMAIL;
}

function getAUTOR7_NOME()
{
return $this->AUTOR7_NOME;
}

function getAUTOR7_EMAIL()
{
return $this->AUTOR7_EMAIL;
}

function getAUTOR8_NOME()
{
return $this->AUTOR8_NOME;
}

function getAUTOR8_EMAIL()
{
return $this->AUTOR8_EMAIL;
}

function getAUTOR9_NOME()
{
return $this->AUTOR9_NOME;
}

function getAUTOR9_EMAIL()
{
return $this->AUTOR9_EMAIL;
}

function getAUTOR10_NOME()
{
return $this->AUTOR10_NOME;
}

function getAUTOR10_EMAIL()
{
return $this->AUTOR10_EMAIL;
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

function setEVEN_ID($val)
{
$this->EVEN_ID =  $val;
}

function setINSC_ID($val)
{
$this->INSC_ID =  $val;
}

function setDATA($val)
{
$this->DATA =  $val;
}

function setID_EXTERNO($val)
{
$this->ID_EXTERNO =  $val;
}

function setAREA($val)
{
$this->AREA =  $val;
}

function setOPCAO1($val)
{
$this->OPCAO1 =  $val;
}

function setOPCAO2($val)
{
$this->OPCAO2 =  $val;
}

function setOPCAO3($val)
{
$this->OPCAO3 =  $val;
}

function setOPCAO4($val)
{
$this->OPCAO4 =  $val;
}

function setOPCAO5($val)
{
$this->OPCAO5 =  $val;
}

function setAUTORIZACAO($val)
{
$this->AUTORIZACAO =  $val;
}

function setDATA_APRES($val)
{
$this->DATA_APRES =  $val;
}

function setTIPO_APRES($val)
{
$this->TIPO_APRES =  $val;
}

function setTITULO($val)
{
$this->TITULO =  $val;
}

function setRESUMO($val)
{
$this->RESUMO =  $val;
}

function setCORPO($val)
{
$this->CORPO =  $val;
}

function setBIBLIOGRAFIA($val)
{
$this->BIBLIOGRAFIA =  $val;
}

function setARQ_NOME($val)
{
$this->ARQ_NOME =  $val;
}

function setARQ_URL($val)
{
$this->ARQ_URL =  $val;
}

function setARQ_TIPO($val)
{
$this->ARQ_TIPO =  $val;
}

function setARQ2_NOME($val)
{
$this->ARQ2_NOME =  $val;
}

function setARQ2_URL($val)
{
$this->ARQ2_URL =  $val;
}

function setARQ2_TIPO($val)
{
$this->ARQ2_TIPO =  $val;
}

function setAUTOR_CPF_PASSAPORTE($val)
{
$this->AUTOR_CPF_PASSAPORTE =  $val;
}

function setAUTOR_NOME($val)
{
$this->AUTOR_NOME =  $val;
}

function setAUTOR_EMAIL($val)
{
$this->AUTOR_EMAIL =  $val;
}

function setAUTOR_FONE($val)
{
$this->AUTOR_FONE =  $val;
}

function setAUTOR_ORGA($val)
{
$this->AUTOR_ORGA =  $val;
}

function setAUTOR_CIDADE($val)
{
$this->AUTOR_CIDADE =  $val;
}

function setAUTOR_ESTADO($val)
{
$this->AUTOR_ESTADO =  $val;
}

function setAUTOR_PAIS($val)
{
$this->AUTOR_PAIS =  $val;
}

function setAPRES_NOME($val)
{
$this->APRES_NOME =  $val;
}

function setAPRES_EMAIL($val)
{
$this->APRES_EMAIL =  $val;
}

function setAPRES_FONE($val)
{
$this->APRES_FONE =  $val;
}

function setAPRES_ORGA($val)
{
$this->APRES_ORGA =  $val;
}

function setAUTOR1_NOME($val)
{
$this->AUTOR1_NOME =  $val;
}

function setAUTOR1_EMAIL($val)
{
$this->AUTOR1_EMAIL =  $val;
}

function setAUTOR2_NOME($val)
{
$this->AUTOR2_NOME =  $val;
}

function setAUTOR2_EMAIL($val)
{
$this->AUTOR2_EMAIL =  $val;
}

function setAUTOR3_NOME($val)
{
$this->AUTOR3_NOME =  $val;
}

function setAUTOR3_EMAIL($val)
{
$this->AUTOR3_EMAIL =  $val;
}

function setAUTOR4_NOME($val)
{
$this->AUTOR4_NOME =  $val;
}

function setAUTOR4_EMAIL($val)
{
$this->AUTOR4_EMAIL =  $val;
}

function setAUTOR5_NOME($val)
{
$this->AUTOR5_NOME =  $val;
}

function setAUTOR5_EMAIL($val)
{
$this->AUTOR5_EMAIL =  $val;
}

function setAUTOR6_NOME($val)
{
$this->AUTOR6_NOME =  $val;
}

function setAUTOR6_EMAIL($val)
{
$this->AUTOR6_EMAIL =  $val;
}

function setAUTOR7_NOME($val)
{
$this->AUTOR7_NOME =  $val;
}

function setAUTOR7_EMAIL($val)
{
$this->AUTOR7_EMAIL =  $val;
}

function setAUTOR8_NOME($val)
{
$this->AUTOR8_NOME =  $val;
}

function setAUTOR8_EMAIL($val)
{
$this->AUTOR8_EMAIL =  $val;
}

function setAUTOR9_NOME($val)
{
$this->AUTOR9_NOME =  $val;
}

function setAUTOR9_EMAIL($val)
{
$this->AUTOR9_EMAIL =  $val;
}

function setAUTOR10_NOME($val)
{
$this->AUTOR10_NOME =  $val;
}

function setAUTOR10_EMAIL($val)
{
$this->AUTOR10_EMAIL =  $val;
}

function setOBS($val)
{
$this->OBS =  $val;
}

// **********************
// SELECT METHOD / LOAD
// **********************

function select($aval_id, $trab_id) {

$sql =  "SELECT * FROM avaliador_trabalho a, trabalho t WHERE a.TRAB_ID = t.ID AND AVAL_ID = $aval_id AND TRAB_ID = $trab_id;";
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

$this->EVEN_ID = $row->EVEN_ID;
$this->INSC_ID = $row->INSC_ID;
$this->DATA = $row->TRAB_DATA;
$this->ID_EXTERNO = $row->TRAB_ID_EXTERNO;
$this->AREA = $row->TRAB_AREA;
$this->OPCAO1 = $row->TRAB_OPCAO1;
$this->OPCAO2 = $row->TRAB_OPCAO2;
$this->OPCAO3 = $row->TRAB_OPCAO3;
$this->OPCAO4 = $row->TRAB_OPCAO4;
$this->OPCAO5 = $row->TRAB_OPCAO5;
$this->AUTORIZACAO = $row->TRAB_AUTORIZACAO;
$this->DATA_APRES = $row->TRAB_DATA_APRES;
$this->TIPO_APRES = $row->TRAB_TIPO_APRES;
$this->TITULO = $row->TRAB_TITULO;
$this->RESUMO = $row->TRAB_RESUMO;
$this->CORPO = $row->TRAB_CORPO;
$this->BIBLIOGRAFIA = $row->TRAB_BIBLIOGRAFIA;
$this->ARQ_NOME = $row->TRAB_ARQ_NOME;
$this->ARQ_URL = $row->TRAB_ARQ_URL;
$this->ARQ_TIPO = $row->TRAB_ARQ_TIPO;
$this->ARQ2_NOME = $row->TRAB_ARQ2_NOME;
$this->ARQ2_URL = $row->TRAB_ARQ2_URL;
$this->ARQ2_TIPO = $row->TRAB_ARQ2_TIPO;
$this->AUTOR_CPF_PASSAPORTE = $row->TRAB_AUTOR_CPF_PASSAPORTE;
$this->AUTOR_NOME = $row->TRAB_AUTOR_NOME;
$this->AUTOR_EMAIL = $row->TRAB_AUTOR_EMAIL;
$this->AUTOR_FONE = $row->TRAB_AUTOR_FONE;
$this->AUTOR_ORGA = $row->TRAB_AUTOR_ORGA;
$this->AUTOR_CIDADE = $row->TRAB_AUTOR_CIDADE;
$this->AUTOR_ESTADO = $row->TRAB_AUTOR_ESTADO;
$this->AUTOR_PAIS = $row->TRAB_AUTOR_PAIS;
$this->APRES_NOME = $row->TRAB_APRES_NOME;
$this->APRES_EMAIL = $row->TRAB_APRES_EMAIL;
$this->APRES_FONE = $row->TRAB_APRES_FONE;
$this->APRES_ORGA = $row->TRAB_APRES_ORGA;
$this->AUTOR1_NOME = $row->TRAB_AUTOR1_NOME;
$this->AUTOR1_EMAIL = $row->TRAB_AUTOR1_EMAIL;
$this->AUTOR2_NOME = $row->TRAB_AUTOR2_NOME;
$this->AUTOR2_EMAIL = $row->TRAB_AUTOR2_EMAIL;
$this->AUTOR3_NOME = $row->TRAB_AUTOR3_NOME;
$this->AUTOR3_EMAIL = $row->TRAB_AUTOR3_EMAIL;
$this->AUTOR4_NOME = $row->TRAB_AUTOR4_NOME;
$this->AUTOR4_EMAIL = $row->TRAB_AUTOR4_EMAIL;
$this->AUTOR5_NOME = $row->TRAB_AUTOR5_NOME;
$this->AUTOR5_EMAIL = $row->TRAB_AUTOR5_EMAIL;
$this->AUTOR6_NOME = $row->TRAB_AUTOR6_NOME;
$this->AUTOR6_EMAIL = $row->TRAB_AUTOR6_EMAIL;
$this->AUTOR7_NOME = $row->TRAB_AUTOR7_NOME;
$this->AUTOR7_EMAIL = $row->TRAB_AUTOR7_EMAIL;
$this->AUTOR8_NOME = $row->TRAB_AUTOR8_NOME;
$this->AUTOR8_EMAIL = $row->TRAB_AUTOR8_EMAIL;
$this->AUTOR9_NOME = $row->TRAB_AUTOR9_NOME;
$this->AUTOR9_EMAIL = $row->TRAB_AUTOR9_EMAIL;
$this->AUTOR10_NOME = $row->TRAB_AUTOR10_NOME;
$this->AUTOR10_EMAIL = $row->TRAB_AUTOR10_EMAIL;
$this->OBS = $row->TRAB_OBS;

}


} // class : end

?>