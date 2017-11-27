<?php

include_once("class.inscricao.php");
include_once("class.database.php");

// **********************
// CLASS DECLARATION
// **********************

class PalestrantesService
{ // class : begin


// **********************
// ATTRIBUTE DECLARATION
// **********************

private $database; // Instance of class database


// **********************
// CONSTRUCTOR METHOD
// **********************

function PalestrantesService() {
	$this->database = new Database();
}


// **********************
// SELECT METHOD / LOAD
// **********************

/**
 * Carrega a inscricao pelo ID
 *
 * @param int $id
 * @return Inscricao
 */
function loadPalestrantesById($id) {

	$palestrantes = new $Palestrantes();
	$palestrantes->select($id);
	return $palestrantes;

}




	
/**
 * Carrega inscricoes de um evento de acordo com o filtro
 *
 * @param int $even_id, String $order_by, String $insc_nome, String $insc_categoria, String $insc_forma_pgto
 * @return array**/
 


} // class : end

?>