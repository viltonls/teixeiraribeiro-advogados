<?php

include_once("class.evento.php");
include_once("class.configuracao.php");
include_once("class.database.php");

// **********************
// CLASS DECLARATION
// **********************

class EventoService
{ // class : begin


// **********************
// ATTRIBUTE DECLARATION
// **********************

private $database; // Instance of class database


// **********************
// CONSTRUCTOR METHOD
// **********************

function EventoService() {
	$this->database = new Database();
}


// **********************
// SELECT METHOD / LOAD
// **********************

/**
 * Carrega o evento pelo ID
 *
 * @param int $id
 * @return Evento
 */
function loadEventoById($id) {

	$evento = new Evento();
	$evento->select($id);
	return $evento;

}


/**
 * Carrega a configuração do evento pelo ID
 *
 * @param int $id
 * @return Configuracao
 */
function loadEventoConfiguracaoById($id) {

	$config = new Configuracao();
	$config->select($id);
	return $config;

}


/**
 * Carrega eventoConfiguracao pelo alias
 *
 * @param String $alias
 * @return EventoConfiguracao
 */
function loadEventoConfiguracaoByAlias($alias) {

	$sql =  "SELECT * FROM evento_configuracao WHERE CONF_ALIAS LIKE '$alias';";
	$result =  $this->database->query($sql);
	$result = $this->database->result;
	$row = mysql_fetch_object($result);

	if ($row->EVEN_ID) {
		$eventoConfiguracao = $this->loadEventoConfiguracaoById($row->EVEN_ID);
		return $eventoConfiguracao;
	} else {
		return null;
	}
}



/**
 * Carrega todos os eventos
 *
 * @param none
 * @return array
 */
function listEventos() {

	$sql = "SELECT * FROM evento ORDER BY EVEN_INICIO DESC, EVEN_NOME;";
	$result = $this->database->query($sql);
	$result = $this->database->result;
	//$row = mysql_fetch_object($result);
	
	$result_count = 0;
	while ($row = mysql_fetch_object($result)) {
		
	
		$evento = new Evento();
		
		$evento->setID($row->EVEN_ID);
		$evento->setNOME($row->EVEN_NOME);
		$evento->setORGA_ID($row->ORGA_ID);
		$evento->setINICIO($row->EVEN_INICIO);
		$evento->setFIM($row->EVEN_FIM);
		$evento->setLOCAL($row->EVEN_LOCAL);
		$evento->setTIPO($row->EVEN_TIPO);
		$evento->setPATROC($row->EVEN_PATROC);
		$evento->setESPACO($row->EVEN_ESPACO);
		$evento->setAPOIO($row->EVEN_APOIO);
		$evento->setQTD_PART($row->EVEN_QTD_PART);
		$evento->setQTD_SALAS($row->EVEN_QTD_SALAS);
		$evento->setQTD_TRAB($row->EVEN_QTD_TRAB);
		$evento->setOBS($row->EVEN_OBS);
		
		$result_list[$result_count] = $evento;
		$result_count++;
	
	}
	
	return $result_list;

}


/**
 * Carrega todos os eventos
 *
 * @param int $orga_id
 * @return array
 */
function listEventosByOrganizacao($orga_id) {

	$sql = "SELECT * FROM evento WHERE ORGA_ID = $orga_id ORDER BY EVEN_INICIO DESC, EVEN_NOME;";
	$result = $this->database->query($sql);
	$result = $this->database->result;
	//$row = mysql_fetch_object($result);
	
	$result_count = 0;
	while ($row = mysql_fetch_object($result)) {
		
	
		$evento = new Evento();
		
		$evento->setID($row->EVEN_ID);
		$evento->setNOME($row->EVEN_NOME);
		$evento->setORGA_ID($row->ORGA_ID);
		$evento->setINICIO($row->EVEN_INICIO);
		$evento->setFIM($row->EVEN_FIM);
		$evento->setLOCAL($row->EVEN_LOCAL);
		$evento->setTIPO($row->EVEN_TIPO);
		$evento->setPATROC($row->EVEN_PATROC);
		$evento->setESPACO($row->EVEN_ESPACO);
		$evento->setAPOIO($row->EVEN_APOIO);
		$evento->setQTD_PART($row->EVEN_QTD_PART);
		$evento->setQTD_SALAS($row->EVEN_QTD_SALAS);
		$evento->setQTD_TRAB($row->EVEN_QTD_TRAB);
		$evento->setOBS($row->EVEN_OBS);
		
		$result_list[$result_count] = $evento;
		$result_count++;
	
	}
	
	return $result_list;

}


/**
 * Carrega todos os eventos
 *
 * @param none
 * @return array
 */
function listEventosConfigurados() {

	$sql = "SELECT * FROM evento WHERE EVEN_ID IN (SELECT EVEN_ID FROM evento_configuracao) ORDER BY EVEN_INICIO DESC, EVEN_NOME;";
	$result = $this->database->query($sql);
	$result = $this->database->result;
	//$row = mysql_fetch_object($result);
	
	$result_count = 0;
	while ($row = mysql_fetch_object($result)) {
		
	
		$evento = new Evento();
		
		$evento->setID($row->EVEN_ID);
		$evento->setNOME($row->EVEN_NOME);
		$evento->setORGA_ID($row->ORGA_ID);
		$evento->setINICIO($row->EVEN_INICIO);
		$evento->setFIM($row->EVEN_FIM);
		$evento->setLOCAL($row->EVEN_LOCAL);
		$evento->setTIPO($row->EVEN_TIPO);
		$evento->setPATROC($row->EVEN_PATROC);
		$evento->setESPACO($row->EVEN_ESPACO);
		$evento->setAPOIO($row->EVEN_APOIO);
		$evento->setQTD_PART($row->EVEN_QTD_PART);
		$evento->setQTD_SALAS($row->EVEN_QTD_SALAS);
		$evento->setQTD_TRAB($row->EVEN_QTD_TRAB);
		$evento->setOBS($row->EVEN_OBS);
		
		$result_list[$result_count] = $evento;
		$result_count++;
	
	}
	
	return $result_list;

}


/**
 * Carrega todos os eventos
 *
 * @param int
 * @return array
 */
function listEventosConfiguradosByOrganizacao($orga_id) {

	$sql = "SELECT * FROM evento WHERE ORGA_ID = $orga_id AND EVEN_ID IN (SELECT EVEN_ID FROM evento_configuracao) ORDER BY EVEN_INICIO DESC, EVEN_NOME;";
	$result = $this->database->query($sql);
	$result = $this->database->result;
	//$row = mysql_fetch_object($result);
	
	$result_count = 0;
	while ($row = mysql_fetch_object($result)) {
		
	
		$evento = new Evento();
		
		$evento->setID($row->EVEN_ID);
		$evento->setNOME($row->EVEN_NOME);
		$evento->setORGA_ID($row->ORGA_ID);
		$evento->setINICIO($row->EVEN_INICIO);
		$evento->setFIM($row->EVEN_FIM);
		$evento->setLOCAL($row->EVEN_LOCAL);
		$evento->setTIPO($row->EVEN_TIPO);
		$evento->setPATROC($row->EVEN_PATROC);
		$evento->setESPACO($row->EVEN_ESPACO);
		$evento->setAPOIO($row->EVEN_APOIO);
		$evento->setQTD_PART($row->EVEN_QTD_PART);
		$evento->setQTD_SALAS($row->EVEN_QTD_SALAS);
		$evento->setQTD_TRAB($row->EVEN_QTD_TRAB);
		$evento->setOBS($row->EVEN_OBS);
		
		$result_list[$result_count] = $evento;
		$result_count++;
	
	}
	
	return $result_list;

}




/**
 * Gera as tags <option> em HTML para uma lista de Eventos
 *
 * @param array, int
 * @return String
 */
function generateHtmlOptions($eventoList, $selectedId) {
	$options = "";
	if (count($eventoList)) {
		for ($i = 0; $i < count($eventoList); $i++) {
			/* @var $evento Evento */
			$evento = $eventoList[$i];
			$options .= "<option value='".$evento->getID()."'";
			if ($selectedId && $evento->getID() == $selectedId) $options .=" selected";
			$options .= "> ".$evento->getNOME()."</option>\n";
		};
	} else {
		$options .= "<option value='0'>Nenhum item encontrado</option>";
	}
	return $options;
}



/**
 * Gera as tags <option> em HTML para uma lista de Organizações
 *
 * @param Configuracao
 * @return String
 */
function generateHtmlOptionsForInscricao($configuracao) {
	/* @var $configuracao Configuracao */
	
	//$configuracao = new Configuracao();
	$options = "<option value=''>Nenhum</option>";
	$options .= "<option value='ID_OFFICE'>ID_OFFICE</option>";
	$options .= "<option value='DATA'>Data da Inscrição</option>";
	$options .= "<option value='STATUS'>Status</option>";
//	$options .= "<option value='ORIGEM'>Origem</option>";
	$options .= "<option value='NOME'>Nome Completo</option>";
	$options .= "<option value='CRACHA'>Nome Crachá</option>";
	$options .= "<option value='ID_EXTERNO'>ID Externo</option>";
	$options .= "<option value='SEXO'>Sexo</option>";
	$options .= "<option value='NASCIMENTO'>Nascimento</option>";
	$options .= "<option value='CPF_PASSAPORTE'>CPF/Passaporte</option>";
	$options .= "<option value='REGISTRO_PROF'>Registro Profissional</option>";
	$options .= "<option value='ESPECIALIDADE'>Especialidade</option>";
	$options .= "<option value='EMAIL'>Email</option>";
	$options .= "<option value='DDI'>DDI</option>";
	$options .= "<option value='DDD'>DDD</option>";
	$options .= "<option value='FONE'>Telefone</option>";
	$options .= "<option value='CELULAR'>Celular</option>";
	$options .= "<option value='FAX'>Fax</option>";
	$options .= "<option value='ENDERECO'>Endereço</option>";
	$options .= "<option value='CEP'>CEP</option>";
	$options .= "<option value='BAIRRO'>Bairro</option>";
	$options .= "<option value='CIDADE'>Cidade</option>";
	$options .= "<option value='ESTADO'>Estado</option>";
	$options .= "<option value='PAIS'>País</option>";
	$options .= "<option value='TIPO'>Tipo</option>";
	$options .= "<option value='CATEGORIA'>Categoria</option>";
	$options .= "<option value='VALOR'>Valor</option>";
	$options .= "<option value='STATUS_PGTO'>Status Pgto</option>";
	$options .= "<option value='FORMA_PGTO'>Forma Pgto</option>";
	$options .= "<option value='ORG_NOME'>Organização</option>";
	$options .= "<option value='ORG_CARGO'>Organização Cargo</option>";
	$options .= "<option value='ORG_FONE'>Organização Telefone</option>";
	$options .= "<option value='ORG_CNPJ'>Organização CNPJ</option>";
	$options .= "<option value='ORG_ENDERECO'>Organização Endereço</option>";
	$options .= "<option value='ORG_CIDADE'>Organização Cidade</option>";
	$options .= "<option value='ORG_WEBSITE'>Organização Website</option>";
	$options .= "<option value='ACOMP'>Acompanhante</option>";
	$options .= "<option value='OBS'>Observações</option>";
	if ($configuracao->getTEXTO_1()) {
		$options .= "<option value='TEXTO_1'>".$configuracao->getTEXTO_1()."</option>";
	}
	if ($configuracao->getTEXTO_2()) {
		$options .= "<option value='TEXTO_2'>".$configuracao->getTEXTO_2()."</option>";
	}
	if ($configuracao->getTEXTO_3()) {
		$options .= "<option value='TEXTO_3'>".$configuracao->getTEXTO_3()."</option>";
	}
	if ($configuracao->getTEXTO_4()) {
		$options .= "<option value='TEXTO_4'>".$configuracao->getTEXTO_4()."</option>";
	}
	if ($configuracao->getTEXTO_5()) {
		$options .= "<option value='TEXTO_5'>".$configuracao->getTEXTO_5()."</option>";
	}
	if ($configuracao->getTEXTO_6()) {
		$options .= "<option value='TEXTO_6'>".$configuracao->getTEXTO_6()."</option>";
	}
	if ($configuracao->getTEXTO_7()) {
		$options .= "<option value='TEXTO_7'>".$configuracao->getTEXTO_7()."</option>";
	}
	if ($configuracao->getTEXTO_8()) {
		$options .= "<option value='TEXTO_8'>".$configuracao->getTEXTO_8()."</option>";
	}
	if ($configuracao->getTEXTO_9()) {
		$options .= "<option value='TEXTO_9'>".$configuracao->getTEXTO_9()."</option>";
	}
	if ($configuracao->getTEXTO_10()) {
		$options .= "<option value='TEXTO_10'>".$configuracao->getTEXTO_10()."</option>";
	}
	if ($configuracao->getBOOL_1()) {
		$options .= "<option value='BOOL_1'>".$configuracao->getBOOL_1()."</option>";
	}
	if ($configuracao->getBOOL_2()) {
		$options .= "<option value='BOOL_2'>".$configuracao->getBOOL_2()."</option>";
	}
	if ($configuracao->getBOOL_3()) {
		$options .= "<option value='BOOL_3'>".$configuracao->getBOOL_3()."</option>";
	}
	if ($configuracao->getBOOL_4()) {
		$options .= "<option value='BOOL_4'>".$configuracao->getBOOL_4()."</option>";
	}
	if ($configuracao->getBOOL_5()) {
		$options .= "<option value='BOOL_5'>".$configuracao->getBOOL_5()."</option>";
	}
	if ($configuracao->getBOOL_6()) {
		$options .= "<option value='BOOL_6'>".$configuracao->getBOOL_6()."</option>";
	}
	if ($configuracao->getBOOL_7()) {
		$options .= "<option value='BOOL_7'>".$configuracao->getBOOL_7()."</option>";
	}
	if ($configuracao->getBOOL_8()) {
		$options .= "<option value='BOOL_8'>".$configuracao->getBOOL_8()."</option>";
	}
	if ($configuracao->getBOOL_9()) {
		$options .= "<option value='BOOL_9'>".$configuracao->getBOOL_9()."</option>";
	}
	if ($configuracao->getBOOL_10()) {
		$options .= "<option value='BOOL_10'>".$configuracao->getBOOL_10()."</option>";
	}
	if ($configuracao->getBOOL_11()) {
		$options .= "<option value='BOOL_11'>".$configuracao->getBOOL_11()."</option>";
	}
	if ($configuracao->getBOOL_12()) {
		$options .= "<option value='BOOL_12'>".$configuracao->getBOOL_12()."</option>";
	}
	if ($configuracao->getBOOL_13()) {
		$options .= "<option value='BOOL_13'>".$configuracao->getBOOL_13()."</option>";
	}
	if ($configuracao->getBOOL_14()) {
		$options .= "<option value='BOOL_14'>".$configuracao->getBOOL_14()."</option>";
	}
	if ($configuracao->getBOOL_15()) {
		$options .= "<option value='BOOL_15'>".$configuracao->getBOOL_15()."</option>";
	}
	if ($configuracao->getBOOL_16()) {
		$options .= "<option value='BOOL_16'>".$configuracao->getBOOL_16()."</option>";
	}
	if ($configuracao->getBOOL_17()) {
		$options .= "<option value='BOOL_17'>".$configuracao->getBOOL_17()."</option>";
	}
	if ($configuracao->getBOOL_18()) {
		$options .= "<option value='BOOL_18'>".$configuracao->getBOOL_18()."</option>";
	}
	if ($configuracao->getBOOL_19()) {
		$options .= "<option value='BOOL_19'>".$configuracao->getBOOL_19()."</option>";
	}
	if ($configuracao->getBOOL_20()) {
		$options .= "<option value='BOOL_20'>".$configuracao->getBOOL_20()."</option>";
	}
	if ($configuracao->getCURSO_1()) {
	$options .= "<option value='CURSO_1'>".$configuracao->getCURSO_1()."</option>";
	}
	if ($configuracao->getCURSO_2()) {
	$options .= "<option value='CURSO_2'>".$configuracao->getCURSO_2()."</option>";
	}
	if ($configuracao->getCURSO_3()) {
	$options .= "<option value='CURSO_3'>".$configuracao->getCURSO_3()."</option>";
	}
	if ($configuracao->getCURSO_4()) {
	$options .= "<option value='CURSO_4'>".$configuracao->getCURSO_4()."</option>";
	}
	if ($configuracao->getCURSO_5()) {
	$options .= "<option value='CURSO_5'>".$configuracao->getCURSO_5()."</option>";
	}
	if ($configuracao->getCURSO_6()) {
	$options .= "<option value='CURSO_6'>".$configuracao->getCURSO_6()."</option>";
	}
	if ($configuracao->getCURSO_7()) {
	$options .= "<option value='CURSO_7'>".$configuracao->getCURSO_7()."</option>";
	}
	if ($configuracao->getCURSO_8()) {
	$options .= "<option value='CURSO_8'>".$configuracao->getCURSO_8()."</option>";
	}
	if ($configuracao->getCURSO_9()) {
	$options .= "<option value='CURSO_9'>".$configuracao->getCURSO_9()."</option>";
	}
	if ($configuracao->getCURSO_10()) {
	$options .= "<option value='CURSO_10'>".$configuracao->getCURSO_10()."</option>";
	}
	if ($configuracao->getCURSO_11()) {
	$options .= "<option value='CURSO_11'>".$configuracao->getCURSO_11()."</option>";
	}
	if ($configuracao->getCURSO_12()) {
	$options .= "<option value='CURSO_12'>".$configuracao->getCURSO_12()."</option>";
	}
	if ($configuracao->getCURSO_13()) {
	$options .= "<option value='CURSO_13'>".$configuracao->getCURSO_13()."</option>";
	}
	if ($configuracao->getCURSO_14()) {
	$options .= "<option value='CURSO_14'>".$configuracao->getCURSO_14()."</option>";
	}
	if ($configuracao->getCURSO_15()) {
	$options .= "<option value='CURSO_15'>".$configuracao->getCURSO_15()."</option>";
	}
	if ($configuracao->getCURSO_16()) {
	$options .= "<option value='CURSO_16'>".$configuracao->getCURSO_16()."</option>";
	}
	if ($configuracao->getCURSO_17()) {
	$options .= "<option value='CURSO_17'>".$configuracao->getCURSO_17()."</option>";
	}
	if ($configuracao->getCURSO_18()) {
	$options .= "<option value='CURSO_18'>".$configuracao->getCURSO_18()."</option>";
	}
	if ($configuracao->getCURSO_19()) {
	$options .= "<option value='CURSO_19'>".$configuracao->getCURSO_19()."</option>";
	}
	if ($configuracao->getCURSO_20()) {
	$options .= "<option value='CURSO_20'>".$configuracao->getCURSO_20()."</option>";
	}
	if ($configuracao->getCURSO_21()) {
	$options .= "<option value='CURSO_21'>".$configuracao->getCURSO_21()."</option>";
	}
	if ($configuracao->getCURSO_22()) {
	$options .= "<option value='CURSO_22'>".$configuracao->getCURSO_22()."</option>";
	}
	if ($configuracao->getCURSO_23()) {
	$options .= "<option value='CURSO_23'>".$configuracao->getCURSO_23()."</option>";
	}
	if ($configuracao->getCURSO_24()) {
	$options .= "<option value='CURSO_24'>".$configuracao->getCURSO_24()."</option>";
	}
	if ($configuracao->getCURSO_25()) {
	$options .= "<option value='CURSO_25'>".$configuracao->getCURSO_25()."</option>";
	}
	if ($configuracao->getCURSO_26()) {
	$options .= "<option value='CURSO_26'>".$configuracao->getCURSO_26()."</option>";
	}
	if ($configuracao->getCURSO_27()) {
	$options .= "<option value='CURSO_27'>".$configuracao->getCURSO_27()."</option>";
	}
	if ($configuracao->getCURSO_28()) {
	$options .= "<option value='CURSO_28'>".$configuracao->getCURSO_28()."</option>";
	}
	if ($configuracao->getCURSO_29()) {
	$options .= "<option value='CURSO_29'>".$configuracao->getCURSO_29()."</option>";
	}
	if ($configuracao->getCURSO_30()) {
	$options .= "<option value='CURSO_30'>".$configuracao->getCURSO_30()."</option>";
	}
	
	
	return $options;
}


} // class : end

?>