<?php

include_once("class.usuario.php");
include_once("dto.usuario_evento.php");
include_once("class.database.php");

// **********************
// CLASS DECLARATION
// **********************

class UsuarioService
{ // class : begin


// **********************
// ATTRIBUTE DECLARATION
// **********************

private $database; // Instance of class database


// **********************
// CONSTRUCTOR METHOD
// **********************

function UsuarioService() {
	$this->database = new Database();
}


// **********************
// SELECT METHOD / LOAD
// **********************

/**
 * Carrega o usuário pelo ID
 *
 * @param int $id
 * @return Usuario
 */
function loadUsuarioById($id) {

	$usuario = new Usuario();
	$usuario->select($id);
	return $usuario;

}


/**
 * Carrega o usu?rio pelo LOGIN
 *
 * @param String $login
 * @return Usuario
 */
function loadUsuarioByLogin($login) {

	$sql =  "SELECT * FROM usuario WHERE USUA_LOGIN LIKE '$login';";
	$result =  $this->database->query($sql);
	$result = $this->database->result;
	$row = mysql_fetch_object($result);
	
	$usuario = new Usuario();
	
	$usuario->setID($row->USUA_ID);
	$usuario->setEVEN_ID($row->EVEN_ID);
	$usuario->setNOME($row->USUA_NOME);
	$usuario->setLOGIN($row->USUA_LOGIN);
	$usuario->setEMAIL($row->USUA_EMAIL);
	$usuario->setSENHA($row->USUA_SENHA);
	$usuario->setCELULAR($row->USUA_CELULAR);
	$usuario->setADMIN($row->USUA_ADMIN);
	$usuario->setCAPTACAO($row->USUA_CAPTACAO);
	$usuario->setOPERACIONAL($row->USUA_OPERACIONAL);
	$usuario->setCOMERCIAL($row->USUA_COMERCIAL);
	$usuario->setINSCRICOES($row->USUA_INSCRICOES);
	$usuario->setTRABALHOS($row->USUA_TRABALHOS);
	$usuario->setFINANCEIRO($row->USUA_FINANCEIRO);
	$usuario->setEVENTO($row->USUA_EVENTO);
	$usuario->setDEPOIMENTOS($row->USUA_DEPOIMENTOS);
	$usuario->setCASES($row->USUA_CASES);
	$usuario->setNOTICIAS($row->USUA_NOTICIAS);
	$usuario->setCLIENTES($row->USUA_CLIENTES);
	$usuario->setAREAS($row->USUA_AREAS);
	$usuario->setESCRITORIO($row->USUA_ESCRITORIO);
	$usuario->setEQUIPE($row->USUA_EQUIPE);
	
	return $usuario;

}


/**
 * Carrega todos os usu?rios
 *
 * @param none
 * @return array
 */
function listUsuarios() {

	$sql =  "SELECT * FROM usuario ORDER BY USUA_NOME;";
	$result =  $this->database->query($sql);
	$result = $this->database->result;
	//$row = mysql_fetch_object($result);
	
	$result_count = 0;
	while ($row = mysql_fetch_object($result)) {
		
	
		$usuario = new Usuario();
		
		$usuario->setID($row->USUA_ID);
		$usuario->setEVEN_ID($row->EVEN_ID);
		$usuario->setNOME($row->USUA_NOME);
		$usuario->setLOGIN($row->USUA_LOGIN);
		$usuario->setEMAIL($row->USUA_EMAIL);
		$usuario->setSENHA($row->USUA_SENHA);
		$usuario->setCELULAR($row->USUA_CELULAR);
		$usuario->setADMIN($row->USUA_ADMIN);
		$usuario->setCAPTACAO($row->USUA_CAPTACAO);
		$usuario->setOPERACIONAL($row->USUA_OPERACIONAL);
		$usuario->setCOMERCIAL($row->USUA_COMERCIAL);
		$usuario->setINSCRICOES($row->USUA_INSCRICOES);
		$usuario->setTRABALHOS($row->USUA_TRABALHOS);
		$usuario->setFINANCEIRO($row->USUA_FINANCEIRO);
		$usuario->setEVENTO($row->USUA_EVENTO);
		$usuario->setDEPOIMENTOS($row->USUA_DEPOIMENTOS);
		$usuario->setCASES($row->USUA_CASES);
		$usuario->setNOTICIAS($row->USUA_NOTICIAS);
		$usuario->setEVENTOS_CLIENTES($row->USUA_CLIENTES);
		$usuario->setEVENTOS_AREAS($row->USUA_AREAS);
		$usuario->setEVENTOS_ESCRITORIO($row->USUA_ESCRITORIO);
		$usuario->setEVENTOS_EQUIPE($row->USUA_EQUIPE);
		
		$result_list[$result_count] = $usuario;
		$result_count++;
	
	}
	
	return $result_list;

}



/**
 * Carrega todos os usu?rios
 *
 * @param int EVEN_ID
 * @return array
 */
function listUsuariosByEvento($EVEN_ID) {

	$sql =  "SELECT * FROM usuario WHERE EVEN_ID = $EVEN_ID ORDER BY USUA_NOME;";
	$result =  $this->database->query($sql);
	$result = $this->database->result;
	//$row = mysql_fetch_object($result);
	
	$result_count = 0;
	while ($row = mysql_fetch_object($result)) {
	
		$usuario = new Usuario();
		
		$usuario->setID($row->USUA_ID);
		$usuario->setEVEN_ID($row->EVEN_ID);
		$usuario->setNOME($row->USUA_NOME);
		$usuario->setLOGIN($row->USUA_LOGIN);
		$usuario->setEMAIL($row->USUA_EMAIL);
		$usuario->setSENHA($row->USUA_SENHA);
		$usuario->setCELULAR($row->USUA_CELULAR);
		$usuario->setADMIN($row->USUA_ADMIN);
		$usuario->setCAPTACAO($row->USUA_CAPTACAO);
		$usuario->setOPERACIONAL($row->USUA_OPERACIONAL);
		$usuario->setCOMERCIAL($row->USUA_COMERCIAL);
		$usuario->setINSCRICOES($row->USUA_INSCRICOES);
		$usuario->setTRABALHOS($row->USUA_TRABALHOS);
		$usuario->setFINANCEIRO($row->USUA_FINANCEIRO);
		$usuario->setEVENTO($row->USUA_EVENTO);
		
		
		$usuario->setDEPOIMENTOS($row->USUA_DEPOIMENTOS);
		$usuario->setCASES($row->USUA_CASES);
		$usuario->setNOTICIAS($row->USUA_NOTICIAS);
		$usuario->setCLIENTES($row->USUA_CLIENTES);
		$usuario->setAREAS($row->USUA_AREAS);
		$usuario->setESCRITORIO($row->USUA_ESCRITORIO);
		$usuario->setEQUIPE($row->USUA_EQUIPE);
		
		$result_list[$result_count] = $usuario;
		$result_count++;
	
	}
	
	return $result_list;

}



/**
 * Carrega todos os usu?rios
 *
 * @param int, int, String, String
 * @return array
 */
function listUsuariosFiltered($EVEN_ID,$ORGA_ID,$USUA_NOME,$USUA_LOGIN) {

	$sql  = " SELECT * ";
	$sql .= " FROM usuario u, evento e, organizacao o ";
	$sql .= " WHERE u.EVEN_ID = e.EVEN_ID AND e.ORGA_ID = o.ORGA_ID ";
	$sql .= " ORDER BY USUA_NOME";
	$result =  $this->database->query($sql);
	$result = $this->database->result;
	//$row = mysql_fetch_object($result);
	
	$result_count = 0;
	while ($row = mysql_fetch_object($result)) {
	
		$usuarioEventoDTO = new UsuarioEventoDTO();
		
		$usuarioEventoDTO->setID($row->USUA_ID);
		$usuarioEventoDTO->setEVEN_ID($row->EVEN_ID);
		$usuarioEventoDTO->setNOME($row->USUA_NOME);
		$usuarioEventoDTO->setLOGIN($row->USUA_LOGIN);
		$usuarioEventoDTO->setCELULAR($row->USUA_CELULAR);
		$usuarioEventoDTO->setEVEN_NOME($row->EVEN_NOME);
		$usuarioEventoDTO->setORGA_ID($row->ORGA_ID);
		$usuarioEventoDTO->setORGA_NOME($row->ORGA_NOME);
		
		$result_list[$result_count] = $usuarioEventoDTO;
		$result_count++;
	
	}
	
	return $result_list;

}



/**
 * Gera as tags <option> em HTML para uma lista de Usuários
 *
 * @param array, int
 * @return String
 */
function generateHtmlOptions($usuarioList, $selectedId) {
	$options = "";
	if (count($usuarioList)) {
		for ($i = 0; $i < count($usuarioList); $i++) {
			/* @var $usuario Usuario */
			$usuario = $usuarioList[$i];
			$options .= "<option value='".$usuario->getID()."'";
			if ($selectedId && $usuario->getID() == $selectedId) $options .=" selected";
			$options .= "> ".$usuario->getNOME()."</option>\n";
		};
	} else {
		$options .= "<option value='0'>Nenhum item encontrado</option>";
	}
	return $options;
}

} // class : end

?>