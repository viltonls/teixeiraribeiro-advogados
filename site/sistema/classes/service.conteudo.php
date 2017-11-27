<?php

include_once("class.conteudo.php");
include_once("class.database.php");

// **********************
// CLASS DECLARATION
// **********************

class ConteudoService
{ // class : begin


// **********************
// ATTRIBUTE DECLARATION
// **********************

private $database; // Instance of class database


// **********************
// CONSTRUCTOR METHOD
// **********************

function ConteudoService() {
	$this->database = new Database();
}


// **********************
// SELECT METHOD / LOAD
// **********************

/**
 * Carrega o conteúdo pelo ID
 *
 * @param int $id
 * @return Conteudo
 */
function loadConteudoById($id) {

	$conteudo = new Conteudo();
	$conteudo->select($id);
	return $conteudo;

}


/**
 * Carrega todos os conteúdos
 *
 * @param none
 * @return array
 */
function listConteudo() {

	$sql =  "SELECT * FROM conteudo ORDER BY Id ASC;";
	$result =  $this->database->query($sql);
	$result = $this->database->result;
	
	$result_count = 0;
	while ($row = mysql_fetch_object($result)) {
		
	
		$conteudo = new Conteudo();

		$conteudo->setId($row->Id);
		$conteudo->setTitulo($row->Titulo);
		$conteudo->setCorpo($row->Corpo);
		$conteudo->setData($row->Data);
		$conteudo->setImagemA($row->ImagemA);
		$conteudo->setImagemB($row->ImagemB);
		$conteudo->setImagemC($row->ImagemC);
		$conteudo->setImagemD($row->ImagemD);
		$conteudo->setImagemE($row->ImagemE);
		$conteudo->setImagemF($row->ImagemF);
		$conteudo->setImagemG($row->ImagemG);
		$conteudo->setImagemH($row->ImagemH);
		$conteudo->setImagemI($row->ImagemI);
		$conteudo->setImagemJ($row->ImagemJ);
		$conteudo->setImagemK($row->ImagemK);
		$conteudo->setLegendaA($row->LegendaA);
		$conteudo->setLegendaB($row->LegendaB);
		$conteudo->setLegendaC($row->LegendaC);
		$conteudo->setLegendaD($row->LegendaD);
		$conteudo->setLegendaE($row->LegendaE);
		$conteudo->setLegendaF($row->LegendaF);
		$conteudo->setLegendaG($row->LegendaG);
		$conteudo->setLegendaH($row->LegendaH);
		$conteudo->setLegendaI($row->LegendaI);
		$conteudo->setLegendaJ($row->LegendaJ);
		$conteudo->setLegendaK($row->LegendaK);
		$conteudo->setLink($row->Link);
		$conteudo->setCampo1($row->Campo1);
		$conteudo->setCampo2($row->Campo2);
		$conteudo->setCampo3($row->Campo3);
		$conteudo->setDataCadastro($row->DataCadastro);
		$conteudo->setDataModificacao($row->DataModificacao);
		$conteudo->setStatus($row->Status);
		$conteudo->setTipo($row->Tipo);
		$conteudo->setOrdem($row->Ordem);
		$conteudo->setIdioma($row->Idioma);
		
		$result_list[$result_count] = $conteudo;
		$result_count++;
	
	}
	
	return $result_list;

}


/**
 * Carrega os conteúdos filtrados
 *
 * @param none
 * @return array
 */
function listConteudoFiltrado($tipo, $status, $idioma, $ordem) {

	$sql =  "SELECT * FROM conteudo WHERE ";
	if ($tipo>0) $sql .= " Tipo = $tipo AND ";
	if ($status>0) $sql .= " Status >= $status AND ";
	if ($idioma>0) $sql .= " Idioma = $idioma AND ";
	$sql .= " 1=1 ";
	$sql .= " ORDER BY $ordem;";
	//echo $sql;break;
	$result =  $this->database->query($sql);
	$result = $this->database->result;
	
	$result_count = 0;
	while ($row = mysql_fetch_object($result)) {
	
		$conteudo = new Conteudo();

		$conteudo->setId($row->Id);
		$conteudo->setTitulo($row->Titulo);
		$conteudo->setCorpo($row->Corpo);
		$conteudo->setData($row->Data);
		$conteudo->setImagemA($row->ImagemA);
		$conteudo->setImagemB($row->ImagemB);
		$conteudo->setImagemC($row->ImagemC);
		$conteudo->setImagemD($row->ImagemD);
		$conteudo->setImagemE($row->ImagemE);
		$conteudo->setImagemF($row->ImagemF);
		$conteudo->setImagemG($row->ImagemG);
		$conteudo->setImagemH($row->ImagemH);
		$conteudo->setImagemI($row->ImagemI);
		$conteudo->setImagemJ($row->ImagemJ);
		$conteudo->setImagemK($row->ImagemK);
		$conteudo->setLegendaA($row->LegendaA);
		$conteudo->setLegendaB($row->LegendaB);
		$conteudo->setLegendaC($row->LegendaC);
		$conteudo->setLegendaD($row->LegendaD);
		$conteudo->setLegendaE($row->LegendaE);
		$conteudo->setLegendaF($row->LegendaF);
		$conteudo->setLegendaG($row->LegendaG);
		$conteudo->setLegendaH($row->LegendaH);
		$conteudo->setLegendaI($row->LegendaI);
		$conteudo->setLegendaJ($row->LegendaJ);
		$conteudo->setLegendaK($row->LegendaK);
		$conteudo->setLink($row->Link);
		$conteudo->setCampo1($row->Campo1);
		$conteudo->setCampo2($row->Campo2);
		$conteudo->setCampo3($row->Campo3);
		$conteudo->setDataCadastro($row->DataCadastro);
		$conteudo->setDataModificacao($row->DataModificacao);
		$conteudo->setStatus($row->Status);
		$conteudo->setTipo($row->Tipo);
		$conteudo->setOrdem($row->Ordem);
		$conteudo->setIdioma($row->Idioma);
		
		$result_list[$result_count] = $conteudo;
		$result_count++;
	}
	
	return $result_list;

}


} // class : end

?>