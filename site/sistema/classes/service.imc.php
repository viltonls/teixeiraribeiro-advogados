<?php

include_once ("class.imc.php");
include_once ("class.database.php");

// **********************
// CLASS DECLARATION
// **********************

class ImcService
{ // class : begin


	// **********************
	// ATTRIBUTE DECLARATION
	// **********************

	private $database; // Instance of class database


	// **********************
	// CONSTRUCTOR METHOD
	// **********************

	function ImcService()
	{
		$this->database = new Database();
	}


	// **********************
	// SELECT METHOD / LOAD
	// **********************

	/**
	 * Carrega o assobrafir pelo ID
	 *
	 * @param int $id
	 * @return Assobrafir
	 */
	function loadImcById($id)
	{

		$imc = new Imc();
		$imc->select($id);
		return $imc;

	}
	
	/**
	 * Carrega o assobrafir pelo ID
	 *
	 * @param int $id
	 * @return Assobrafir
	 */
	function checkLogin($email, $cpf)
	{
		$key ="#".$email."|".$cpf."#";
		$imc = new Imc();
		$list = $this->listImcByKey($key);
		if(sizeof($list) >0) {
			$imc = $list[0];
			return 1;
		} else {
			
			$sql = "SELECT * FROM inscricao WHERE EVEN_ID = 60 and INSC_CPF_PASSAPORTE = '$cpf' AND INSC_EMAIL='$email';";
			$result = $this->database->query($sql);
			$result = $this->database->result;
			$row = mysql_fetch_object($result);
			if($row){
				$id = $row->INSC_ID;
				if($row->INSC_STATUS_PGTO !='o'){
					return 2;
				}
				$imc->setimc_trab_inscricao_id($id);
				$imc->setimc_trab_login($email);
				$imc->setimc_trab_key($key);
				$imc->setimc_trab_password($cpf);
				$imc->insert();
				return 1;
			} 
		}
		return 0;
	}

	/**
	 * Carrega o usuário pelo LOGIN
	 *
	 * @param String $login
	 * @return Assobrafir
	 */
	function loadImcByLogin($login)
	{

		$sql = "SELECT * FROM usuario WHERE USUA_LOGIN LIKE '$login';";
		$result = $this->database->query($sql);
		$result = $this->database->result;
		$row = mysql_fetch_object($result);

		$usuario = new Imc();

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

		return $usuario;

	}


	/**
	 * Carrega todos os assobrafir
	 *
	 * @param none
	 * @return array
	 */
	function listAllImc()
	{

		$sql = "SELECT * FROM imc_trab ORDER BY imc_trab_id;";
		$result = $this->database->query($sql);
		$result = $this->database->result;
		//$row = mysql_fetch_object($result);

		$result_count = 0;
		while ($row = mysql_fetch_object($result))
		{


			$imc = new Imc();

			$imc->setimc_trab_id($row->imc_trab_id);
			$imc->setimc_trab_inscricao_id($row->imc_trab_inscricao_id);
			$imc->setimc_trab_key($row->imc_trab_key);
			$imc->setimc_trab_login($row->imc_trab_login);
			$imc->setimc_trab_password($row->imc_trab_password);
			$imc->setimc_trab_trabalhos($row->imc_trab_trabalhos);

			$result_list[$result_count] = $imc;
			$result_count++;

		}

		return $result_list;

	}


	/**
	 * Carrega todos os assobrafir por 
	 *
	 * @param string
	 * @return array
	 */
	function listImcByKey($key)
	{

		$sql = "SELECT * FROM imc_trab WHERE imc_trab_key LIKE '$key';";
		$result = $this->database->query($sql);
		$result = $this->database->result;
		//$row = mysql_fetch_object($result);

		$result_count = 0;
		while ($row = mysql_fetch_object($result))
		{


			$imc = new Imc();

			$imc->setimc_trab_id($row->imc_trab_id);
			$imc->setimc_trab_inscricao_id($row->imc_trab_inscricao_id);
			$imc->setimc_trab_key($row->imc_trab_key);
			$imc->setimc_trab_login($row->imc_trab_login);
			$imc->setimc_trab_password($row->imc_trab_password);
			$imc->setimc_trab_trabalhos($row->imc_trab_trabalhos);

			$result_list[$result_count] = $imc;
			$result_count++;

		}

		return $result_list;

	}

	

	/**
	 * Verifica a chave
	 * 'key' => 'the key' A chave
	 * 'is_valid' Verifica se a chave existe
	 * 'is_full' Verifica se atingiu o número máximo de trabalhos
	 * 
	 * @param array
	 * @return bool
	 */
	function checkImcKey($attrib)
	{
		if (empty($attrib['key']))
		{
			return false;
		}
		
		$resultList = $this->listImcByKey($attrib['key']);

		if (in_array('is_valid', $attrib))
		{
			if (empty($resultList))
			{
				return false;
			}
			else
			{
				return true;
			}
		}

		if (in_array('is_full', $attrib)) $resultList = $resultList['0']->imc_trab_trabalhos;
		$resultList = explode('|', $resultList);
		if (count($resultList) == 3)
		{
			return true;
		}
		else
		{
			return false;
		}

	}


	/**
	 * Carrega todos os usu?rios
	 *
	 * @param int, int, String, String
	 * @return array
	 */
	function listImcsFiltered($EVEN_ID, $ORGA_ID, $USUA_NOME, $USUA_LOGIN)
	{

		$sql = " SELECT * ";
		$sql .= " FROM usuario u, evento e, organizacao o ";
		$sql .= " WHERE u.EVEN_ID = e.EVEN_ID AND e.ORGA_ID = o.ORGA_ID ";
		$sql .= " ORDER BY USUA_NOME";
		$result = $this->database->query($sql);
		$result = $this->database->result;
		//$row = mysql_fetch_object($result);

		$result_count = 0;
		while ($row = mysql_fetch_object($result))
		{

			$usuarioEventoDTO = new ImcEventoDTO();

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
	function generateHtmlOptions($usuarioList, $selectedId)
	{
		$options = "";
		if (count($usuarioList))
		{
			for ($i = 0; $i < count($usuarioList); $i++)
			{
				/* @var $usuario Assobrafir */
				$usuario = $usuarioList[$i];
				$options .= "<option value='".$usuario->getID()."'";
				if ($selectedId && $usuario->getID() == $selectedId) $options .= " selected";
				$options .= "> ".$usuario->getNOME()."</option>\n";
			}
			;
		}
		else
		{
			$options .= "<option value='0'>Nenhum item encontrado</option>";
		}
		return $options;
	}

	function printTrabalhoArea($document, $eventId, $id){
		
		$document->loadFromFile("../../../xml/".$eventId.".xml");
		switch ($id){
			case 1:
				return $document->getTrabalhoArea1PT();
			case 2:
				return $document->getTrabalhoArea2PT();
			case 3:
				return $document->getTrabalhoArea3PT();
			case 4:
				return $document->getTrabalhoArea4PT();
			case 5:
				return $document->getTrabalhoArea5PT();
			case 6:
				return $document->getTrabalhoArea6PT();
			case 7:
				return $document->getTrabalhoArea7PT();
			case 8:
				return $document->getTrabalhoArea8PT();
			default:
				return $id;	
		}
	}
	function getDataApresentacao($data){
		if($data == "0000-00-00 00:00:00")
			return "A Definir";
		else return $data;
		
		
	}
	
	function getNumApres($evenId, $cpf){
		
		$sql = "SELECT * FROM trabalho WHERE even_id = '$evenId' AND TRAB_APRES_CPF_PASSAPORTE LIKE '$cpf';";
		$result = $this->database->query($sql);
		$result = $this->database->result;
		//$row = mysql_fetch_object($result);

		$result_count = 0;
		while ($row = mysql_fetch_object($result))
		{
			$result_count++;

		}

		return $result_count;
		
		
	}
} // class : end


?>