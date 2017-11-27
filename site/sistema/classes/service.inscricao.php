<?php

include_once("class.inscricao.php");
include_once("class.database.php");

// **********************
// CLASS DECLARATION
// **********************

class InscricaoService
{ // class : begin


// **********************
// ATTRIBUTE DECLARATION
// **********************

private $database; // Instance of class database


// **********************
// CONSTRUCTOR METHOD
// **********************

function InscricaoService() {
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
function loadInscricaoById($id,$even_id) {

	$inscricao = new Inscricao();
	$inscricao->select($id,$even_id);
	return $inscricao;

}



/**
 * Verifica se há inscrição com mesmo CPF_PASSAPORTE para esse evento
 *
 * @param int $even_id, String $cpf_passaporte
 * @return int
 */
function loadInscricaoByCPF($even_id, $cpf_passaporte) {

	$sql = "SELECT INSC_ID FROM inscricao WHERE EVEN_ID = $even_id AND INSC_CPF_PASSAPORTE LIKE '$cpf_passaporte'";
	$result = $this->database->query($sql);
	$result = $this->database->result;
	$row = mysql_fetch_object($result);
	//echo $cpf_passaporte." -> ".$row->INSC_ID."<br>";
	return $row->INSC_ID;
}
/**
 * 2Verifica se há inscrição com mesmo CPF_PASSAPORTE para esse evento
 *
 * @param int $even_id, String $cpf_passaporte
 * @return int
 */
function loadInscricaoByCPF2($even_id, $cpf_passaporte) {

	$sql = "SELECT INSC_ID FROM inscricao WHERE EVEN_ID = $even_id ,INSC_CPF_PASSAPORTE LIKE '$cpf_passaporte'";
	$result = $this->database->query($sql);
	$result = $this->database->result;
	$row = mysql_fetch_object($result);
	//echo $cpf_passaporte." -> ".$row->INSC_ID."<br>";
	return $row->INSC_ID;
}
/**
 * Verifica se há inscrição com mesmo EMAIL para esse evento
 *
 * @param int $even_id, String $email
 * @return int
 */
function loadInscricaoByEmail($even_id, $email) {

	$sql = "SELECT INSC_ID FROM inscricao WHERE EVEN_ID = $even_id AND INSC_EMAIL LIKE '$email'";
	$result = $this->database->query($sql);
	$result = $this->database->result;
	$row = mysql_fetch_object($result);
	//echo $cpf_passaporte." -> ".$row->INSC_ID."<br>";
	return $row->INSC_ID;
}	


/**
 * Verifica se há inscrição com mesmo External ID para esse evento
 *
 * @param int $even_id, String $id_externo
 * @return int
 */
function loadInscricaoByIdExterno($even_id, $id_externo) {

	$sql = "SELECT INSC_ID FROM inscricao WHERE EVEN_ID = $even_id AND INSC_ID_EXTERNO LIKE '".$id_externo."'";
	//echo "<hr>".$sql."<hr>";
	$result = $this->database->query($sql);
	$result = $this->database->result;
	$row = mysql_fetch_object($result);
	return $row->INSC_ID;
}



/**
 * Carrega todos as inscricoes de um evento
 *
 * @param int $even_id, String $order_by, String
 * @return array
 */
function listInscricoesByEvento($even_id, $order_by) {

	$sql = "SELECT * FROM inscricao WHERE EVEN_ID = $even_id AND insc_status != 'x' ORDER BY INSC_".$order_by.";";
	//$sql = "SELECT * FROM inscricao WHERE EVEN_ID = $even_id ORDER BY INSC_ID DESC;";
	$result = $this->database->query($sql);
	$result = $this->database->result;
	//$row = mysql_fetch_object($result);

	$result_count = 0;
	while ($row = mysql_fetch_object($result)) {
		
	
		$inscricao = new Inscricao();
		
		$inscricao->setID($row->INSC_ID);
		$inscricao->setEVEN_ID($row->EVEN_ID);
		$inscricao->setDATA($row->INSC_DATA);
		$inscricao->setSTATUS($row->INSC_STATUS);
		$inscricao->setORIGEM($row->INSC_ORIGEM);
		$inscricao->setNOME($row->INSC_NOME);
		$inscricao->setCRACHA($row->INSC_CRACHA);
		$inscricao->setID_EXTERNO($row->INSC_ID_EXTERNO);
		$inscricao->setSEXO($row->INSC_SEXO);
		$inscricao->setNASCIMENTO($row->INSC_NASCIMENTO);
		$inscricao->setCPF_PASSAPORTE($row->INSC_CPF_PASSAPORTE);
		$inscricao->setREGISTRO_PROF($row->INSC_REGISTRO_PROF);
		$inscricao->setESPECIALIDADE($row->INSC_ESPECIALIDADE);
		$inscricao->setEMAIL($row->INSC_EMAIL);
		$inscricao->setDDI($row->INSC_DDI);
		$inscricao->setDDD($row->INSC_DDD);
		$inscricao->setFONE($row->INSC_FONE);
		$inscricao->setCELULAR($row->INSC_CELULAR);
		$inscricao->setFAX($row->INSC_FAX);
		$inscricao->setENDERECO($row->INSC_ENDERECO);
		$inscricao->setCEP($row->INSC_CEP);
		$inscricao->setBAIRRO($row->INSC_BAIRRO);
		$inscricao->setCIDADE($row->INSC_CIDADE);
		$inscricao->setESTADO($row->INSC_ESTADO);
		$inscricao->setPAIS($row->INSC_PAIS);
		$inscricao->setTIPO($row->INSC_TIPO);
		$inscricao->setCATEGORIA($row->INSC_CATEGORIA);
		$inscricao->setVALOR($row->INSC_VALOR);
		$inscricao->setSTATUS_PGTO($row->INSC_STATUS_PGTO);
		$inscricao->setFORMA_PGTO($row->INSC_FORMA_PGTO);
		$inscricao->setORG_NOME($row->INSC_ORG_NOME);
		$inscricao->setORG_CARGO($row->INSC_ORG_CARGO);
		$inscricao->setORG_FONE($row->INSC_ORG_FONE);
		$inscricao->setORG_CNPJ($row->INSC_ORG_CNPJ);
		$inscricao->setORG_ENDERECO($row->INSC_ORG_ENDERECO);
		$inscricao->setORG_CIDADE($row->INSC_ORG_CIDADE);
		$inscricao->setORG_WEBSITE($row->INSC_ORG_WEBSITE);
		$inscricao->setACOMP($row->INSC_ACOMP);
		$inscricao->setOBS($row->INSC_OBS);
		$inscricao->setTEXTO_1($row->INSC_TEXTO_1);
		$inscricao->setTEXTO_2($row->INSC_TEXTO_2);
		$inscricao->setTEXTO_3($row->INSC_TEXTO_3);
		$inscricao->setTEXTO_4($row->INSC_TEXTO_4);
		$inscricao->setTEXTO_5($row->INSC_TEXTO_5);
		$inscricao->setTEXTO_6($row->INSC_TEXTO_6);
		$inscricao->setTEXTO_7($row->INSC_TEXTO_7);
		$inscricao->setTEXTO_8($row->INSC_TEXTO_8);
		$inscricao->setTEXTO_9($row->INSC_TEXTO_9);
		$inscricao->setTEXTO_10($row->INSC_TEXTO_10);
		$inscricao->setBOOL_1($row->INSC_BOOL_1);
		$inscricao->setBOOL_2($row->INSC_BOOL_2);
		$inscricao->setBOOL_3($row->INSC_BOOL_3);
		$inscricao->setBOOL_4($row->INSC_BOOL_4);
		$inscricao->setBOOL_5($row->INSC_BOOL_5);
		$inscricao->setBOOL_6($row->INSC_BOOL_6);
		$inscricao->setBOOL_7($row->INSC_BOOL_7);
		$inscricao->setBOOL_8($row->INSC_BOOL_8);
		$inscricao->setBOOL_9($row->INSC_BOOL_9);
		$inscricao->setBOOL_10($row->INSC_BOOL_10);
		$inscricao->setBOOL_11($row->INSC_BOOL_11);
		$inscricao->setBOOL_12($row->INSC_BOOL_12);
		$inscricao->setBOOL_13($row->INSC_BOOL_13);
		$inscricao->setBOOL_14($row->INSC_BOOL_14);
		$inscricao->setBOOL_15($row->INSC_BOOL_15);
		$inscricao->setBOOL_16($row->INSC_BOOL_16);
		$inscricao->setBOOL_17($row->INSC_BOOL_17);
		$inscricao->setBOOL_18($row->INSC_BOOL_18);
		$inscricao->setBOOL_19($row->INSC_BOOL_19);
		$inscricao->setBOOL_20($row->INSC_BOOL_20);
		$inscricao->setCURSO_1($row->INSC_CURSO_1);
		$inscricao->setCURSO_2($row->INSC_CURSO_2);
		$inscricao->setCURSO_3($row->INSC_CURSO_3);
		$inscricao->setCURSO_4($row->INSC_CURSO_4);
		$inscricao->setCURSO_5($row->INSC_CURSO_5);
		$inscricao->setCURSO_6($row->INSC_CURSO_6);
		$inscricao->setCURSO_7($row->INSC_CURSO_7);
		$inscricao->setCURSO_8($row->INSC_CURSO_8);
		$inscricao->setCURSO_9($row->INSC_CURSO_9);
		$inscricao->setCURSO_10($row->INSC_CURSO_10);
		$inscricao->setCURSO_11($row->INSC_CURSO_11);
		$inscricao->setCURSO_12($row->INSC_CURSO_12);
		$inscricao->setCURSO_13($row->INSC_CURSO_13);
		$inscricao->setCURSO_14($row->INSC_CURSO_14);
		$inscricao->setCURSO_15($row->INSC_CURSO_15);
		$inscricao->setCURSO_16($row->INSC_CURSO_16);
		$inscricao->setCURSO_17($row->INSC_CURSO_17);
		$inscricao->setCURSO_18($row->INSC_CURSO_18);
		$inscricao->setCURSO_19($row->INSC_CURSO_19);
		$inscricao->setCURSO_20($row->INSC_CURSO_20);
		$inscricao->setCURSO_21($row->INSC_CURSO_21);
		$inscricao->setCURSO_22($row->INSC_CURSO_22);
		$inscricao->setCURSO_23($row->INSC_CURSO_23);
		$inscricao->setCURSO_24($row->INSC_CURSO_24);
		$inscricao->setCURSO_25($row->INSC_CURSO_25);
		$inscricao->setCURSO_26($row->INSC_CURSO_26);
		$inscricao->setCURSO_27($row->INSC_CURSO_27);
		$inscricao->setCURSO_28($row->INSC_CURSO_28);
		$inscricao->setCURSO_29($row->INSC_CURSO_29);
		$inscricao->setCURSO_30($row->INSC_CURSO_30);
		$inscricao->setAVISO_1($row->INSC_AVISO_1);
		$inscricao->setAVISO_2($row->INSC_AVISO_2);
		$inscricao->setAVISO_3($row->INSC_AVISO_3);
		$inscricao->setAVISO_4($row->INSC_AVISO_4);
		$inscricao->setAVISO_5($row->INSC_AVISO_5);
		
		$result_list[$result_count] = $inscricao;
		$result_count++;
	
	}
	//echo $sql."<br>";
	//echo $result_count;
	return $result_list;

}




	
/**
 * Carrega inscricoes de um evento de acordo com o filtro
 *
 * @param int $even_id, String $order_by, String $insc_nome, String $insc_categoria, String $insc_forma_pgto
 * @return array
 */
function listInscricoesByEventoFiltered($even_id, $order_by, $insc_nome, $insc_categoria, $insc_opcao, $insc_forma_pgto, $insc_status, $insc_status_pgto, $insc_org_nome, $insc_acomp) {

	$sql  = " SELECT * FROM inscricao WHERE EVEN_ID = $even_id ";
	if ($insc_nome) {
		$sql .= " AND insc_nome LIKE '%".$insc_nome."%'";
	}
	if ($insc_categoria) {
		if (strlen($insc_categoria)==1) {
			$sql .= " AND insc_categoria = '".$insc_categoria."'";
		} else {
			$categorias_array = explode(",",$insc_categoria);
			$sql .= " AND (";
			foreach ($categorias_array as $categoria) {
				if ($categoria)	$sql .= " insc_categoria = '".$categoria."' OR ";
			}
			$sql .= " 0=1) ";
		}
	}
	if ($insc_opcao) {
		if (strlen($insc_opcao)==1) {
			$sql .= " AND insc_tipo = '".$insc_opcao."'";
		} else {
			$opcoes_array = explode(",",$insc_opcao);
			$sql .= " AND (";
			foreach ($opcoes_array as $opcao) {
				if ($opcao)	$sql .= " insc_tipo = '".$opcao."' OR ";
			}
			$sql .= " 0=1) ";
		}
	}
	if ($insc_forma_pgto) {
		$sql .= " AND insc_forma_pgto = '".$insc_forma_pgto."'";
	}
	if ($insc_status) {
		if (strlen($insc_status)==1) {
			$sql .= " AND insc_status = '".$insc_status."'";
		} else {
			$status_array = explode(",",$insc_status);
			$sql .= " AND (";
			foreach ($status_array as $status) {
				if ($status)	$sql .= " insc_status = '".$status."' OR ";
			}
			$sql .= " 0=1) ";
		}
	} else { // se não é passado o status, elimina as inscrições excluídas automaticamente
		$sql .= " AND insc_status != 'x'";
	}
	if ($insc_status_pgto != "t") {
		if (strlen($insc_status_pgto==1)) {
			$sql .= " AND insc_status_pgto = '".$insc_status_pgto."'";
		} else {
			if ($insc_status_pgto == "i") {
				$sql .= " AND insc_status_pgto = ''";
			} else {
				$status_pgto_array = explode(",",$insc_status_pgto);
				$sql .= " AND (";
				foreach ($status_pgto_array as $status_pgto) {
					if ($status_pgto)	$sql .= " insc_status_pgto = '".$status_pgto."' OR ";
				}
				$sql .= " 0=1) ";
			}
		}
	}
	if ($insc_org_nome) {
		$sql .= " AND insc_org_nome LIKE '%".$insc_org_nome."%'";
	}
	if ($insc_acomp) {
		$sql .= " AND insc_acomp IS NOT NULL AND insc_acomp NOT LIKE ''";
	}
	$sql .= " ORDER BY ".$order_by.";";
	$result = $this->database->query($sql);
	$result = $this->database->result;
	//$row = mysql_fetch_object($result);
	//echo $sql; break;
	
	$result_count = 0;
	while ($row = mysql_fetch_object($result)) {
		
	
		$inscricao = new Inscricao();
		
		$inscricao->setID($row->INSC_ID);
		$inscricao->setEVEN_ID($row->EVEN_ID);
		$inscricao->setDATA($row->INSC_DATA);
		$inscricao->setSTATUS($row->INSC_STATUS);
		$inscricao->setORIGEM($row->INSC_ORIGEM);
		$inscricao->setNOME($row->INSC_NOME);
		$inscricao->setCRACHA($row->INSC_CRACHA);
		$inscricao->setID_EXTERNO($row->INSC_ID_EXTERNO);
		$inscricao->setSEXO($row->INSC_SEXO);
		$inscricao->setNASCIMENTO($row->INSC_NASCIMENTO);
		$inscricao->setCPF_PASSAPORTE($row->INSC_CPF_PASSAPORTE);
		$inscricao->setREGISTRO_PROF($row->INSC_REGISTRO_PROF);
		$inscricao->setESPECIALIDADE($row->INSC_ESPECIALIDADE);
		$inscricao->setEMAIL($row->INSC_EMAIL);
		$inscricao->setDDI($row->INSC_DDI);
		$inscricao->setDDD($row->INSC_DDD);
		$inscricao->setFONE($row->INSC_FONE);
		$inscricao->setCELULAR($row->INSC_CELULAR);
		$inscricao->setFAX($row->INSC_FAX);
		$inscricao->setENDERECO($row->INSC_ENDERECO);
		$inscricao->setCEP($row->INSC_CEP);
		$inscricao->setBAIRRO($row->INSC_BAIRRO);
		$inscricao->setCIDADE($row->INSC_CIDADE);
		$inscricao->setESTADO($row->INSC_ESTADO);
		$inscricao->setPAIS($row->INSC_PAIS);
		$inscricao->setTIPO($row->INSC_TIPO);
		$inscricao->setCATEGORIA($row->INSC_CATEGORIA);
		$inscricao->setVALOR($row->INSC_VALOR);
		$inscricao->setSTATUS_PGTO($row->INSC_STATUS_PGTO);
		$inscricao->setFORMA_PGTO($row->INSC_FORMA_PGTO);
		$inscricao->setORG_NOME($row->INSC_ORG_NOME);
		$inscricao->setORG_CARGO($row->INSC_ORG_CARGO);
		$inscricao->setORG_FONE($row->INSC_ORG_FONE);
		$inscricao->setORG_CNPJ($row->INSC_ORG_CNPJ);
		$inscricao->setORG_ENDERECO($row->INSC_ORG_ENDERECO);
		$inscricao->setORG_CIDADE($row->INSC_ORG_CIDADE);
		$inscricao->setORG_WEBSITE($row->INSC_ORG_WEBSITE);
		$inscricao->setACOMP($row->INSC_ACOMP);
		$inscricao->setOBS($row->INSC_OBS);
		$inscricao->setTEXTO_1($row->INSC_TEXTO_1);
		$inscricao->setTEXTO_2($row->INSC_TEXTO_2);
		$inscricao->setTEXTO_3($row->INSC_TEXTO_3);
		$inscricao->setTEXTO_4($row->INSC_TEXTO_4);
		$inscricao->setTEXTO_5($row->INSC_TEXTO_5);
		$inscricao->setTEXTO_6($row->INSC_TEXTO_6);
		$inscricao->setTEXTO_7($row->INSC_TEXTO_7);
		$inscricao->setTEXTO_8($row->INSC_TEXTO_8);
		$inscricao->setTEXTO_9($row->INSC_TEXTO_9);
		$inscricao->setTEXTO_10($row->INSC_TEXTO_10);
		$inscricao->setBOOL_1($row->INSC_BOOL_1);
		$inscricao->setBOOL_2($row->INSC_BOOL_2);
		$inscricao->setBOOL_3($row->INSC_BOOL_3);
		$inscricao->setBOOL_4($row->INSC_BOOL_4);
		$inscricao->setBOOL_5($row->INSC_BOOL_5);
		$inscricao->setBOOL_6($row->INSC_BOOL_6);
		$inscricao->setBOOL_7($row->INSC_BOOL_7);
		$inscricao->setBOOL_8($row->INSC_BOOL_8);
		$inscricao->setBOOL_9($row->INSC_BOOL_9);
		$inscricao->setBOOL_10($row->INSC_BOOL_10);
		$inscricao->setBOOL_11($row->INSC_BOOL_11);
		$inscricao->setBOOL_12($row->INSC_BOOL_12);
		$inscricao->setBOOL_13($row->INSC_BOOL_13);
		$inscricao->setBOOL_14($row->INSC_BOOL_14);
		$inscricao->setBOOL_15($row->INSC_BOOL_15);
		$inscricao->setBOOL_16($row->INSC_BOOL_16);
		$inscricao->setBOOL_17($row->INSC_BOOL_17);
		$inscricao->setBOOL_18($row->INSC_BOOL_18);
		$inscricao->setBOOL_19($row->INSC_BOOL_19);
		$inscricao->setBOOL_20($row->INSC_BOOL_20);
		$inscricao->setCURSO_1($row->INSC_CURSO_1);
		$inscricao->setCURSO_2($row->INSC_CURSO_2);
		$inscricao->setCURSO_3($row->INSC_CURSO_3);
		$inscricao->setCURSO_4($row->INSC_CURSO_4);
		$inscricao->setCURSO_5($row->INSC_CURSO_5);
		$inscricao->setCURSO_6($row->INSC_CURSO_6);
		$inscricao->setCURSO_7($row->INSC_CURSO_7);
		$inscricao->setCURSO_8($row->INSC_CURSO_8);
		$inscricao->setCURSO_9($row->INSC_CURSO_9);
		$inscricao->setCURSO_10($row->INSC_CURSO_10);
		$inscricao->setCURSO_11($row->INSC_CURSO_11);
		$inscricao->setCURSO_12($row->INSC_CURSO_12);
		$inscricao->setCURSO_13($row->INSC_CURSO_13);
		$inscricao->setCURSO_14($row->INSC_CURSO_14);
		$inscricao->setCURSO_15($row->INSC_CURSO_15);
		$inscricao->setCURSO_16($row->INSC_CURSO_16);
		$inscricao->setCURSO_17($row->INSC_CURSO_17);
		$inscricao->setCURSO_18($row->INSC_CURSO_18);
		$inscricao->setCURSO_19($row->INSC_CURSO_19);
		$inscricao->setCURSO_20($row->INSC_CURSO_20);
		$inscricao->setCURSO_21($row->INSC_CURSO_21);
		$inscricao->setCURSO_22($row->INSC_CURSO_22);
		$inscricao->setCURSO_23($row->INSC_CURSO_23);
		$inscricao->setCURSO_24($row->INSC_CURSO_24);
		$inscricao->setCURSO_25($row->INSC_CURSO_25);
		$inscricao->setCURSO_26($row->INSC_CURSO_26);
		$inscricao->setCURSO_27($row->INSC_CURSO_27);
		$inscricao->setCURSO_28($row->INSC_CURSO_28);
		$inscricao->setCURSO_29($row->INSC_CURSO_29);
		$inscricao->setCURSO_30($row->INSC_CURSO_30);
		$inscricao->setAVISO_1($row->INSC_AVISO_1);
		$inscricao->setAVISO_2($row->INSC_AVISO_2);
		$inscricao->setAVISO_3($row->INSC_AVISO_3);
		$inscricao->setAVISO_4($row->INSC_AVISO_4);
		$inscricao->setAVISO_5($row->INSC_AVISO_5);
		
		$result_list[$result_count] = $inscricao;
		$result_count++;
	
	}
	//echo $sql."<br>";
	//echo $result_count;
	return $result_list;

}


/**
 * Carrega inscricoes de um evento que estão inscritas em um Curso
 *
 * @param int $even_id, String $order_by String curso
 * @return array
 */
function listInscricoesByEventoCurso($even_id, $order_by, $curso) {

	if ($curso == "") {
		return null;
	} else {
		$sql  = " SELECT * FROM inscricao WHERE EVEN_ID = $even_id ";
		$sql .= " AND insc_status != 'x'";
		$sql .= " AND insc_curso_".$curso." = 1";
		$sql .= " ORDER BY ".$order_by.";";
		$result = $this->database->query($sql);
		$result = $this->database->result;
		//$row = mysql_fetch_object($result);
		//echo $sql;
		
		$result_count = 0;
		while ($row = mysql_fetch_object($result)) {
			
		
			$inscricao = new Inscricao();
			
			$inscricao->setID($row->INSC_ID);
			$inscricao->setEVEN_ID($row->EVEN_ID);
			$inscricao->setDATA($row->INSC_DATA);
			$inscricao->setSTATUS($row->INSC_STATUS);
			$inscricao->setORIGEM($row->INSC_ORIGEM);
			$inscricao->setNOME($row->INSC_NOME);
			$inscricao->setCRACHA($row->INSC_CRACHA);
			$inscricao->setID_EXTERNO($row->INSC_ID_EXTERNO);
			$inscricao->setSEXO($row->INSC_SEXO);
			$inscricao->setNASCIMENTO($row->INSC_NASCIMENTO);
			$inscricao->setCPF_PASSAPORTE($row->INSC_CPF_PASSAPORTE);
			$inscricao->setREGISTRO_PROF($row->INSC_REGISTRO_PROF);
			$inscricao->setESPECIALIDADE($row->INSC_ESPECIALIDADE);
			$inscricao->setEMAIL($row->INSC_EMAIL);
			$inscricao->setDDI($row->INSC_DDI);
			$inscricao->setDDD($row->INSC_DDD);
			$inscricao->setFONE($row->INSC_FONE);
			$inscricao->setCELULAR($row->INSC_CELULAR);
			$inscricao->setFAX($row->INSC_FAX);
			$inscricao->setENDERECO($row->INSC_ENDERECO);
			$inscricao->setCEP($row->INSC_CEP);
			$inscricao->setBAIRRO($row->INSC_BAIRRO);
			$inscricao->setCIDADE($row->INSC_CIDADE);
			$inscricao->setESTADO($row->INSC_ESTADO);
			$inscricao->setPAIS($row->INSC_PAIS);
			$inscricao->setTIPO($row->INSC_TIPO);
			$inscricao->setCATEGORIA($row->INSC_CATEGORIA);
			$inscricao->setVALOR($row->INSC_VALOR);
			$inscricao->setSTATUS_PGTO($row->INSC_STATUS_PGTO);
			$inscricao->setFORMA_PGTO($row->INSC_FORMA_PGTO);
			$inscricao->setORG_NOME($row->INSC_ORG_NOME);
			$inscricao->setORG_CARGO($row->INSC_ORG_CARGO);
			$inscricao->setORG_FONE($row->INSC_ORG_FONE);
			$inscricao->setORG_CNPJ($row->INSC_ORG_CNPJ);
			$inscricao->setORG_ENDERECO($row->INSC_ORG_ENDERECO);
			$inscricao->setORG_CIDADE($row->INSC_ORG_CIDADE);
			$inscricao->setORG_WEBSITE($row->INSC_ORG_WEBSITE);
			$inscricao->setACOMP($row->INSC_ACOMP);
			$inscricao->setOBS($row->INSC_OBS);
			$inscricao->setTEXTO_1($row->INSC_TEXTO_1);
			$inscricao->setTEXTO_2($row->INSC_TEXTO_2);
			$inscricao->setTEXTO_3($row->INSC_TEXTO_3);
			$inscricao->setTEXTO_4($row->INSC_TEXTO_4);
			$inscricao->setTEXTO_5($row->INSC_TEXTO_5);
			$inscricao->setTEXTO_6($row->INSC_TEXTO_6);
			$inscricao->setTEXTO_7($row->INSC_TEXTO_7);
			$inscricao->setTEXTO_8($row->INSC_TEXTO_8);
			$inscricao->setTEXTO_9($row->INSC_TEXTO_9);
			$inscricao->setTEXTO_10($row->INSC_TEXTO_10);
			$inscricao->setBOOL_1($row->INSC_BOOL_1);
			$inscricao->setBOOL_2($row->INSC_BOOL_2);
			$inscricao->setBOOL_3($row->INSC_BOOL_3);
			$inscricao->setBOOL_4($row->INSC_BOOL_4);
			$inscricao->setBOOL_5($row->INSC_BOOL_5);
			$inscricao->setBOOL_6($row->INSC_BOOL_6);
			$inscricao->setBOOL_7($row->INSC_BOOL_7);
			$inscricao->setBOOL_8($row->INSC_BOOL_8);
			$inscricao->setBOOL_9($row->INSC_BOOL_9);
			$inscricao->setBOOL_10($row->INSC_BOOL_10);
			$inscricao->setBOOL_11($row->INSC_BOOL_11);
			$inscricao->setBOOL_12($row->INSC_BOOL_12);
			$inscricao->setBOOL_13($row->INSC_BOOL_13);
			$inscricao->setBOOL_14($row->INSC_BOOL_14);
			$inscricao->setBOOL_15($row->INSC_BOOL_15);
			$inscricao->setBOOL_16($row->INSC_BOOL_16);
			$inscricao->setBOOL_17($row->INSC_BOOL_17);
			$inscricao->setBOOL_18($row->INSC_BOOL_18);
			$inscricao->setBOOL_19($row->INSC_BOOL_19);
			$inscricao->setBOOL_20($row->INSC_BOOL_20);
			$inscricao->setCURSO_1($row->INSC_CURSO_1);
			$inscricao->setCURSO_2($row->INSC_CURSO_2);
			$inscricao->setCURSO_3($row->INSC_CURSO_3);
			$inscricao->setCURSO_4($row->INSC_CURSO_4);
			$inscricao->setCURSO_5($row->INSC_CURSO_5);
			$inscricao->setCURSO_6($row->INSC_CURSO_6);
			$inscricao->setCURSO_7($row->INSC_CURSO_7);
			$inscricao->setCURSO_8($row->INSC_CURSO_8);
			$inscricao->setCURSO_9($row->INSC_CURSO_9);
			$inscricao->setCURSO_10($row->INSC_CURSO_10);
			$inscricao->setCURSO_11($row->INSC_CURSO_11);
			$inscricao->setCURSO_12($row->INSC_CURSO_12);
			$inscricao->setCURSO_13($row->INSC_CURSO_13);
			$inscricao->setCURSO_14($row->INSC_CURSO_14);
			$inscricao->setCURSO_15($row->INSC_CURSO_15);
			$inscricao->setCURSO_16($row->INSC_CURSO_16);
			$inscricao->setCURSO_17($row->INSC_CURSO_17);
			$inscricao->setCURSO_18($row->INSC_CURSO_18);
			$inscricao->setCURSO_19($row->INSC_CURSO_19);
			$inscricao->setCURSO_20($row->INSC_CURSO_20);
			$inscricao->setCURSO_21($row->INSC_CURSO_21);
			$inscricao->setCURSO_22($row->INSC_CURSO_22);
			$inscricao->setCURSO_23($row->INSC_CURSO_23);
			$inscricao->setCURSO_24($row->INSC_CURSO_24);
			$inscricao->setCURSO_25($row->INSC_CURSO_25);
			$inscricao->setCURSO_26($row->INSC_CURSO_26);
			$inscricao->setCURSO_27($row->INSC_CURSO_27);
			$inscricao->setCURSO_28($row->INSC_CURSO_28);
			$inscricao->setCURSO_29($row->INSC_CURSO_29);
			$inscricao->setCURSO_30($row->INSC_CURSO_30);
			$inscricao->setAVISO_1($row->INSC_AVISO_1);
			$inscricao->setAVISO_2($row->INSC_AVISO_2);
			$inscricao->setAVISO_3($row->INSC_AVISO_3);
			$inscricao->setAVISO_4($row->INSC_AVISO_4);
			$inscricao->setAVISO_5($row->INSC_AVISO_5);
			
			$result_list[$result_count] = $inscricao;
			$result_count++;
		
		}
		//echo $sql."<br>";
		//echo $result_count;
		return $result_list;
	}
}


/**
 * Carrega todos acompanhantes de um evento
 *
 * @param int $even_id, String $order_by
 * @return array
 */
function listAcompanhantesByEvento($even_id, $order_by) {

	$sql = "SELECT * FROM inscricao WHERE EVEN_ID = $even_id AND insc_status != 'x' AND insc_acomp IS NOT NULL AND insc_acomp != '' ORDER BY INSC_".$order_by.";";
	$result = $this->database->query($sql);
	$result = $this->database->result;

	$result_count = 0;
	while ($row = mysql_fetch_object($result)) {
		
	
		$inscricao = new Inscricao();
		
		$inscricao->setID($row->INSC_ID);
		$inscricao->setEVEN_ID($row->EVEN_ID);
		$inscricao->setDATA($row->INSC_DATA);
		$inscricao->setSTATUS($row->INSC_STATUS);
		$inscricao->setORIGEM($row->INSC_ORIGEM);
		$inscricao->setNOME($row->INSC_NOME);
		$inscricao->setCRACHA($row->INSC_CRACHA);
		$inscricao->setID_EXTERNO($row->INSC_ID_EXTERNO);
		$inscricao->setSEXO($row->INSC_SEXO);
		$inscricao->setNASCIMENTO($row->INSC_NASCIMENTO);
		$inscricao->setCPF_PASSAPORTE($row->INSC_CPF_PASSAPORTE);
		$inscricao->setREGISTRO_PROF($row->INSC_REGISTRO_PROF);
		$inscricao->setESPECIALIDADE($row->INSC_ESPECIALIDADE);
		$inscricao->setEMAIL($row->INSC_EMAIL);
		$inscricao->setDDI($row->INSC_DDI);
		$inscricao->setDDD($row->INSC_DDD);
		$inscricao->setFONE($row->INSC_FONE);
		$inscricao->setCELULAR($row->INSC_CELULAR);
		$inscricao->setFAX($row->INSC_FAX);
		$inscricao->setENDERECO($row->INSC_ENDERECO);
		$inscricao->setCEP($row->INSC_CEP);
		$inscricao->setBAIRRO($row->INSC_BAIRRO);
		$inscricao->setCIDADE($row->INSC_CIDADE);
		$inscricao->setESTADO($row->INSC_ESTADO);
		$inscricao->setPAIS($row->INSC_PAIS);
		$inscricao->setTIPO($row->INSC_TIPO);
		$inscricao->setCATEGORIA($row->INSC_CATEGORIA);
		$inscricao->setVALOR($row->INSC_VALOR);
		$inscricao->setSTATUS_PGTO($row->INSC_STATUS_PGTO);
		$inscricao->setFORMA_PGTO($row->INSC_FORMA_PGTO);
		$inscricao->setORG_NOME($row->INSC_ORG_NOME);
		$inscricao->setORG_CARGO($row->INSC_ORG_CARGO);
		$inscricao->setORG_FONE($row->INSC_ORG_FONE);
		$inscricao->setORG_CNPJ($row->INSC_ORG_CNPJ);
		$inscricao->setORG_ENDERECO($row->INSC_ORG_ENDERECO);
		$inscricao->setORG_CIDADE($row->INSC_ORG_CIDADE);
		$inscricao->setORG_WEBSITE($row->INSC_ORG_WEBSITE);
		$inscricao->setACOMP($row->INSC_ACOMP);
		$inscricao->setOBS($row->INSC_OBS);
		$inscricao->setTEXTO_1($row->INSC_TEXTO_1);
		$inscricao->setTEXTO_2($row->INSC_TEXTO_2);
		$inscricao->setTEXTO_3($row->INSC_TEXTO_3);
		$inscricao->setTEXTO_4($row->INSC_TEXTO_4);
		$inscricao->setTEXTO_5($row->INSC_TEXTO_5);
		$inscricao->setTEXTO_6($row->INSC_TEXTO_6);
		$inscricao->setTEXTO_7($row->INSC_TEXTO_7);
		$inscricao->setTEXTO_8($row->INSC_TEXTO_8);
		$inscricao->setTEXTO_9($row->INSC_TEXTO_9);
		$inscricao->setTEXTO_10($row->INSC_TEXTO_10);
		$inscricao->setBOOL_1($row->INSC_BOOL_1);
		$inscricao->setBOOL_2($row->INSC_BOOL_2);
		$inscricao->setBOOL_3($row->INSC_BOOL_3);
		$inscricao->setBOOL_4($row->INSC_BOOL_4);
		$inscricao->setBOOL_5($row->INSC_BOOL_5);
		$inscricao->setBOOL_6($row->INSC_BOOL_6);
		$inscricao->setBOOL_7($row->INSC_BOOL_7);
		$inscricao->setBOOL_8($row->INSC_BOOL_8);
		$inscricao->setBOOL_9($row->INSC_BOOL_9);
		$inscricao->setBOOL_10($row->INSC_BOOL_10);
		$inscricao->setBOOL_11($row->INSC_BOOL_11);
		$inscricao->setBOOL_12($row->INSC_BOOL_12);
		$inscricao->setBOOL_13($row->INSC_BOOL_13);
		$inscricao->setBOOL_14($row->INSC_BOOL_14);
		$inscricao->setBOOL_15($row->INSC_BOOL_15);
		$inscricao->setBOOL_16($row->INSC_BOOL_16);
		$inscricao->setBOOL_17($row->INSC_BOOL_17);
		$inscricao->setBOOL_18($row->INSC_BOOL_18);
		$inscricao->setBOOL_19($row->INSC_BOOL_19);
		$inscricao->setBOOL_20($row->INSC_BOOL_20);
		$inscricao->setCURSO_1($row->INSC_CURSO_1);
		$inscricao->setCURSO_2($row->INSC_CURSO_2);
		$inscricao->setCURSO_3($row->INSC_CURSO_3);
		$inscricao->setCURSO_4($row->INSC_CURSO_4);
		$inscricao->setCURSO_5($row->INSC_CURSO_5);
		$inscricao->setCURSO_6($row->INSC_CURSO_6);
		$inscricao->setCURSO_7($row->INSC_CURSO_7);
		$inscricao->setCURSO_8($row->INSC_CURSO_8);
		$inscricao->setCURSO_9($row->INSC_CURSO_9);
		$inscricao->setCURSO_10($row->INSC_CURSO_10);
		$inscricao->setCURSO_11($row->INSC_CURSO_11);
		$inscricao->setCURSO_12($row->INSC_CURSO_12);
		$inscricao->setCURSO_13($row->INSC_CURSO_13);
		$inscricao->setCURSO_14($row->INSC_CURSO_14);
		$inscricao->setCURSO_15($row->INSC_CURSO_15);
		$inscricao->setCURSO_16($row->INSC_CURSO_16);
		$inscricao->setCURSO_17($row->INSC_CURSO_17);
		$inscricao->setCURSO_18($row->INSC_CURSO_18);
		$inscricao->setCURSO_19($row->INSC_CURSO_19);
		$inscricao->setCURSO_20($row->INSC_CURSO_20);
		$inscricao->setCURSO_21($row->INSC_CURSO_21);
		$inscricao->setCURSO_22($row->INSC_CURSO_22);
		$inscricao->setCURSO_23($row->INSC_CURSO_23);
		$inscricao->setCURSO_24($row->INSC_CURSO_24);
		$inscricao->setCURSO_25($row->INSC_CURSO_25);
		$inscricao->setCURSO_26($row->INSC_CURSO_26);
		$inscricao->setCURSO_27($row->INSC_CURSO_27);
		$inscricao->setCURSO_28($row->INSC_CURSO_28);
		$inscricao->setCURSO_29($row->INSC_CURSO_29);
		$inscricao->setCURSO_30($row->INSC_CURSO_30);
		$inscricao->setAVISO_1($row->INSC_AVISO_1);
		$inscricao->setAVISO_2($row->INSC_AVISO_2);
		$inscricao->setAVISO_3($row->INSC_AVISO_3);
		$inscricao->setAVISO_4($row->INSC_AVISO_4);
		$inscricao->setAVISO_5($row->INSC_AVISO_5);
		
		$result_list[$result_count] = $inscricao;
		$result_count++;
	
	}
	//echo $sql."<br>";
	//echo $result_count;
	return $result_list;

}


/**
 * Relatório de Estatísticas
 * - Quantidade de Inscrições por Categoria e por Status de Pagamento
 *
 * @param int $even_id
 * @return int
 */
function countInscricoesFiltered($even_id, $categoria, $status_pgto) {
	
	$sql  = " SELECT COUNT(*) AS total FROM inscricao WHERE EVEN_ID = $even_id ";
	$sql .= " AND insc_status != 'x'";
	if ($categoria != "" && $categoria != null) {
		$sql .= " AND INSC_CATEGORIA LIKE '".$categoria."'";
	}
	/*
	if ($status_pgto != "" && $status_pgto != null) {
		$sql .= " AND INSC_STATUS_PGTO LIKE '".$status_pgto."'";
	} 
	*/
	if ($status_pgto != "t") {
		if (strlen($status_pgto==1)) {
			$sql .= " AND INSC_STATUS_PGTO LIKE '".$status_pgto."'";
		} else {
			if ($status_pgto == "i") {
				$sql .= " AND INSC_STATUS_PGTO LIKE ''";
			} else {
				$status_pgto_array = explode(",",$status_pgto);
				$sql .= " AND (";
				foreach ($status_pgto_array as $status) {
					if ($status)	$sql .= " INSC_STATUS_PGTO LIKE '".$status."' OR ";
				}
				$sql .= " 0=1) ";
			}
		}
	}
	$sql .= ";";
	//echo $sql; break;
	$result = $this->database->query($sql);
	$result = $this->database->result;

	$row = mysql_fetch_object($result);

	return $row->total;
	
}


/**
 * Relatório de Estatísticas
 * - Valor total por Status de Pagamento
 *
 * @param int $even_id
 * @return int
 */
function sumValorTotalFiltered($even_id, $categoria, $status_pgto) {

	$sql  = " SELECT SUM(INSC_VALOR) AS total FROM inscricao WHERE EVEN_ID = $even_id ";
	$sql .= " AND insc_status != 'x'";
	if ($categoria != "" && $categoria != null) {
		$sql .= " AND INSC_CATEGORIA LIKE '".$categoria."'";
	}
	if ($status_pgto != "t") {
		if (strlen($status_pgto==1)) {
			$sql .= " AND INSC_STATUS_PGTO LIKE '".$status_pgto."'";
		} else {
			if ($status_pgto == "i") {
				$sql .= " AND INSC_STATUS_PGTO LIKE ''";
			} else {
				$status_pgto_array = explode(",",$status_pgto);
				$sql .= " AND (";
				foreach ($status_pgto_array as $status) {
					if ($status)	$sql .= " INSC_STATUS_PGTO LIKE '".$status."' OR ";
				}
				$sql .= " 0=1) ";
			}
		}
	}
	$sql .= ";";
	$result = $this->database->query($sql);
	$result = $this->database->result;

	$row = mysql_fetch_object($result);

	return $row->total;
	
}


/**
 * Relatório de Estatísticas
 * - Qtd de Inscrições com Acompanhante
 *
 * @param int $even_id
 * @return int
 */
function countAcompanhantes($even_id) {

	$sql  = " SELECT COUNT(*) AS total FROM inscricao WHERE EVEN_ID = $even_id ";
	$sql .= " AND insc_status != 'x'";
	$sql .= " AND INSC_ACOMP IS NOT NULL AND INSC_ACOMP NOT LIKE '';";
	$result = $this->database->query($sql);
	$result = $this->database->result;

	$row = mysql_fetch_object($result);

	return $row->total;
	
}

/**
 * Relatório de Estatísticas
 * - Qtd de Inscrições por Sexo
 *
 * @param int $even_id, String $sexo
 * @return int
 */
function countInscricoesBySexo($even_id, $sexo) {

	$sql  = " SELECT COUNT(*) AS total FROM inscricao WHERE EVEN_ID = $even_id ";
	$sql .= " AND insc_status != 'x'";
	if ($sexo != "" && $sexo != null) {
		$sql .= " AND INSC_SEXO LIKE '".$sexo."'";
	} else {
		$sql .= " AND (INSC_SEXO IS NULL OR INSC_SEXO LIKE '')";
	}
	$result = $this->database->query($sql);
	$result = $this->database->result;

	$row = mysql_fetch_object($result);

	return $row->total;
	
}



/**
 * Relatório de Estatísticas
 * - Quantidade de Inscrições por Categoria e por Status de Pagamento
 *
 * @param int $even_id, int $curso, String $status_pgto
 * @return int
 */
function countInscricoesByCursoFiltered($even_id, $curso, $status_pgto) {
	
	$sql  = " SELECT COUNT(*) AS total FROM inscricao WHERE EVEN_ID = $even_id ";
	$sql .= " AND insc_status != 'x'";
	if ($curso) {
		
		$sql .= " AND INSC_CURSO_".$curso." = 1";
		
		if ($status_pgto != "" && $status_pgto != null) {
			$sql .= " AND INSC_STATUS_PGTO LIKE '".$status_pgto."'";
		}
		$sql .= ";";
		$result = $this->database->query($sql);
		$result = $this->database->result;
	
		$row = mysql_fetch_object($result);
	
		return $row->total;
		
	} else {
		return null;
	}
	
}


/**
 * Gera as tags <option> em HTML para uma lista de UFs
 *
 * @param String
 * @return String
 */
function generateUfOptions($selectedUf) {
	$options = "";
	if ($selectedUf != "AC") $options .= '<option value="AC">AC</option>'; else $options .= '<option value="AC" selected>AC</option>';
	if ($selectedUf != "AM") $options .= '<option value="AM">AM</option>'; else $options .= '<option value="AM" selected>AM</option>';
	if ($selectedUf != "AP") $options .= '<option value="AP">AP</option>'; else $options .= '<option value="AP" selected>AP</option>';
	if ($selectedUf != "BA") $options .= '<option value="BA">BA</option>'; else $options .= '<option value="BA" selected>BA</option>';
	if ($selectedUf != "CE") $options .= '<option value="CE">CE</option>'; else $options .= '<option value="CE" selected>CE</option>';
	if ($selectedUf != "DF") $options .= '<option value="DF">DF</option>'; else $options .= '<option value="DF" selected>DF</option>';
	if ($selectedUf != "ES") $options .= '<option value="ES">ES</option>'; else $options .= '<option value="ES" selected>ES</option>';
	if ($selectedUf != "GO") $options .= '<option value="GO">GO</option>'; else $options .= '<option value="GO" selected>GO</option>';
	if ($selectedUf != "MA") $options .= '<option value="MA">MA</option>'; else $options .= '<option value="MA" selected>MA</option>';
	if ($selectedUf != "MG") $options .= '<option value="MG">MG</option>'; else $options .= '<option value="MG" selected>MG</option>';
	if ($selectedUf != "MS") $options .= '<option value="MS">MS</option>'; else $options .= '<option value="MS" selected>MS</option>';
	if ($selectedUf != "MT") $options .= '<option value="MT">MT</option>'; else $options .= '<option value="MT" selected>MT</option>';
	if ($selectedUf != "PA") $options .= '<option value="PA">PA</option>'; else $options .= '<option value="PA" selected>PA</option>';
	if ($selectedUf != "PB") $options .= '<option value="PB">PB</option>'; else $options .= '<option value="PB" selected>PB</option>';
	if ($selectedUf != "PE") $options .= '<option value="PE">PE</option>'; else $options .= '<option value="PE" selected>PE</option>';
	if ($selectedUf != "PI") $options .= '<option value="PI">PI</option>'; else $options .= '<option value="PI" selected>PI</option>';
	if ($selectedUf != "PR") $options .= '<option value="PR">PR</option>'; else $options .= '<option value="PR" selected>PR</option>';
	if ($selectedUf != "RJ") $options .= '<option value="RJ">RJ</option>'; else $options .= '<option value="RJ" selected>RJ</option>';
	if ($selectedUf != "RN") $options .= '<option value="RN">RN</option>'; else $options .= '<option value="RN" selected>RN</option>';
	if ($selectedUf != "RO") $options .= '<option value="RO">RO</option>'; else $options .= '<option value="RO" selected>RO</option>';
	if ($selectedUf != "RR") $options .= '<option value="RR">RR</option>'; else $options .= '<option value="RR" selected>RR</option>';
	if ($selectedUf != "RS") $options .= '<option value="RS">RS</option>'; else $options .= '<option value="RS" selected>RS</option>';
	if ($selectedUf != "SC") $options .= '<option value="SC">SC</option>'; else $options .= '<option value="SC" selected>SC</option>';
	if ($selectedUf != "SE") $options .= '<option value="SE">SE</option>'; else $options .= '<option value="SE" selected>SE</option>';
	if ($selectedUf != "SP") $options .= '<option value="SP">SP</option>'; else $options .= '<option value="SP" selected>SP</option>';
	if ($selectedUf != "TO") $options .= '<option value="TO">TO</option>'; else $options .= '<option value="TO" selected>TO</option>';

	return $options;
}


/**
 * Gera as tags <option> em HTML para uma lista de DDDs
 *
 * @param String
 * @return String
 */
function generateDDDOptions($selectedDDD) {
	$options = "";
	if ($selectedDDD != "11") $options .= '<option value="11">11</option>'; else $options .= '<option value="11" selected>11</option>';
	if ($selectedDDD != "12") $options .= '<option value="12">12</option>'; else $options .= '<option value="12" selected>12</option>';
	if ($selectedDDD != "13") $options .= '<option value="13">13</option>'; else $options .= '<option value="13" selected>13</option>';
	if ($selectedDDD != "14") $options .= '<option value="14">14</option>'; else $options .= '<option value="14" selected>14</option>';
	if ($selectedDDD != "15") $options .= '<option value="15">15</option>'; else $options .= '<option value="15" selected>15</option>';
	if ($selectedDDD != "16") $options .= '<option value="16">16</option>'; else $options .= '<option value="16" selected>16</option>';
	if ($selectedDDD != "17") $options .= '<option value="17">17</option>'; else $options .= '<option value="17" selected>17</option>';
	if ($selectedDDD != "18") $options .= '<option value="18">18</option>'; else $options .= '<option value="18" selected>18</option>';
	if ($selectedDDD != "19") $options .= '<option value="19">19</option>'; else $options .= '<option value="19" selected>19</option>';
	if ($selectedDDD != "21") $options .= '<option value="21">21</option>'; else $options .= '<option value="21" selected>21</option>';
	if ($selectedDDD != "22") $options .= '<option value="22">22</option>'; else $options .= '<option value="22" selected>22</option>';
	if ($selectedDDD != "24") $options .= '<option value="24">24</option>'; else $options .= '<option value="24" selected>24</option>';
	if ($selectedDDD != "27") $options .= '<option value="27">27</option>'; else $options .= '<option value="27" selected>27</option>';
	if ($selectedDDD != "28") $options .= '<option value="28">28</option>'; else $options .= '<option value="28" selected>28</option>';
	if ($selectedDDD != "31") $options .= '<option value="31">31</option>'; else $options .= '<option value="31" selected>31</option>';
	if ($selectedDDD != "32") $options .= '<option value="32">32</option>'; else $options .= '<option value="32" selected>32</option>';
	if ($selectedDDD != "33") $options .= '<option value="33">33</option>'; else $options .= '<option value="33" selected>33</option>';
	if ($selectedDDD != "34") $options .= '<option value="34">34</option>'; else $options .= '<option value="34" selected>34</option>';
	if ($selectedDDD != "35") $options .= '<option value="35">35</option>'; else $options .= '<option value="35" selected>35</option>';
	if ($selectedDDD != "37") $options .= '<option value="37">37</option>'; else $options .= '<option value="37" selected>37</option>';
	if ($selectedDDD != "38") $options .= '<option value="38">38</option>'; else $options .= '<option value="38" selected>38</option>';
	if ($selectedDDD != "41") $options .= '<option value="41">41</option>'; else $options .= '<option value="41" selected>41</option>';
	if ($selectedDDD != "42") $options .= '<option value="42">42</option>'; else $options .= '<option value="42" selected>42</option>';
	if ($selectedDDD != "43") $options .= '<option value="43">43</option>'; else $options .= '<option value="43" selected>43</option>';
	if ($selectedDDD != "44") $options .= '<option value="44">44</option>'; else $options .= '<option value="44" selected>44</option>';
	if ($selectedDDD != "45") $options .= '<option value="45">45</option>'; else $options .= '<option value="45" selected>45</option>';
	if ($selectedDDD != "46") $options .= '<option value="46">46</option>'; else $options .= '<option value="46" selected>46</option>';
	if ($selectedDDD != "47") $options .= '<option value="47">47</option>'; else $options .= '<option value="47" selected>47</option>';
	if ($selectedDDD != "48") $options .= '<option value="48">48</option>'; else $options .= '<option value="48" selected>48</option>';
	if ($selectedDDD != "49") $options .= '<option value="49">49</option>'; else $options .= '<option value="49" selected>49</option>';
	if ($selectedDDD != "51") $options .= '<option value="51">51</option>'; else $options .= '<option value="51" selected>51</option>';
	if ($selectedDDD != "53") $options .= '<option value="53">53</option>'; else $options .= '<option value="53" selected>53</option>';
	if ($selectedDDD != "54") $options .= '<option value="54">54</option>'; else $options .= '<option value="54" selected>54</option>';
	if ($selectedDDD != "55") $options .= '<option value="55">55</option>'; else $options .= '<option value="55" selected>55</option>';
	if ($selectedDDD != "61") $options .= '<option value="61">61</option>'; else $options .= '<option value="61" selected>61</option>';
	if ($selectedDDD != "62") $options .= '<option value="62">62</option>'; else $options .= '<option value="62" selected>62</option>';
	if ($selectedDDD != "63") $options .= '<option value="63">63</option>'; else $options .= '<option value="63" selected>63</option>';
	if ($selectedDDD != "64") $options .= '<option value="64">64</option>'; else $options .= '<option value="64" selected>64</option>';
	if ($selectedDDD != "65") $options .= '<option value="65">65</option>'; else $options .= '<option value="65" selected>65</option>';
	if ($selectedDDD != "66") $options .= '<option value="66">66</option>'; else $options .= '<option value="66" selected>66</option>';
	if ($selectedDDD != "67") $options .= '<option value="67">67</option>'; else $options .= '<option value="67" selected>67</option>';
	if ($selectedDDD != "68") $options .= '<option value="68">68</option>'; else $options .= '<option value="68" selected>68</option>';
	if ($selectedDDD != "69") $options .= '<option value="69">69</option>'; else $options .= '<option value="69" selected>69</option>';
	if ($selectedDDD != "71") $options .= '<option value="71">71</option>'; else $options .= '<option value="71" selected>71</option>';
	if ($selectedDDD != "73") $options .= '<option value="73">73</option>'; else $options .= '<option value="73" selected>73</option>';
	if ($selectedDDD != "74") $options .= '<option value="74">74</option>'; else $options .= '<option value="74" selected>74</option>';
	if ($selectedDDD != "75") $options .= '<option value="75">75</option>'; else $options .= '<option value="75" selected>75</option>';
	if ($selectedDDD != "77") $options .= '<option value="77">77</option>'; else $options .= '<option value="77" selected>77</option>';
	if ($selectedDDD != "79") $options .= '<option value="79">79</option>'; else $options .= '<option value="79" selected>79</option>';
	if ($selectedDDD != "81") $options .= '<option value="81">81</option>'; else $options .= '<option value="81" selected>81</option>';
	if ($selectedDDD != "82") $options .= '<option value="82">82</option>'; else $options .= '<option value="82" selected>82</option>';
	if ($selectedDDD != "83") $options .= '<option value="83">83</option>'; else $options .= '<option value="83" selected>83</option>';
	if ($selectedDDD != "84") $options .= '<option value="84">84</option>'; else $options .= '<option value="84" selected>84</option>';
	if ($selectedDDD != "85") $options .= '<option value="85">85</option>'; else $options .= '<option value="85" selected>85</option>';
	if ($selectedDDD != "86") $options .= '<option value="86">86</option>'; else $options .= '<option value="86" selected>86</option>';
	if ($selectedDDD != "87") $options .= '<option value="87">87</option>'; else $options .= '<option value="87" selected>87</option>';
	if ($selectedDDD != "88") $options .= '<option value="88">88</option>'; else $options .= '<option value="88" selected>88</option>';
	if ($selectedDDD != "89") $options .= '<option value="89">89</option>'; else $options .= '<option value="89" selected>89</option>';
	if ($selectedDDD != "91") $options .= '<option value="91">91</option>'; else $options .= '<option value="91" selected>91</option>';
	if ($selectedDDD != "92") $options .= '<option value="92">92</option>'; else $options .= '<option value="92" selected>92</option>';
	if ($selectedDDD != "93") $options .= '<option value="93">93</option>'; else $options .= '<option value="93" selected>93</option>';
	if ($selectedDDD != "94") $options .= '<option value="94">94</option>'; else $options .= '<option value="94" selected>94</option>';
	if ($selectedDDD != "95") $options .= '<option value="95">95</option>'; else $options .= '<option value="95" selected>95</option>';
	if ($selectedDDD != "96") $options .= '<option value="96">96</option>'; else $options .= '<option value="96" selected>96</option>';
	if ($selectedDDD != "97") $options .= '<option value="97">97</option>'; else $options .= '<option value="97" selected>97</option>';
	if ($selectedDDD != "98") $options .= '<option value="98">98</option>'; else $options .= '<option value="98" selected>98</option>';
	if ($selectedDDD != "99") $options .= '<option value="99">99</option>'; else $options .= '<option value="99" selected>99</option>';
	return $options;
}


/**
 * Transforma todas os campos de inscrições de um evento em CAIXA ALTA (exceto email)
 *
 * @param int $even_id
 * @return null
 */

function strtolower2($Texto) {
	$Array1 = array('à','á','â','ã','é','è','ê','ó','ò','ô','õ','ú','ù','û','ü','ä','ë','ï','ö','ç','í');
	$Array2 = array('À','Á','Â','Ã','É','È','Ê','Ó','Ò','Ô','Õ','Ú','Ù','Û','Ü','Ä','Ë','Ï','Ö','Ç','Í');
	for ($X = 0; $X < count($Array1); $X++) {
		$Texto = str_replace($Array2[$X],$Array1[$X],$Texto);
	}
	return strtolower($Texto);
}                     

function strtoupper2($Texto) {
	$Array1 = array('À','Á','Â','Ã','É','È','Ê','Ó','Ò','Ô','Õ','Ú','Ù','Û','Ü','Ä','Ë','Ï','Ö','Ç','Í');
	$Array2 = array('à','á','â','ã','é','è','ê','ó','ò','ô','õ','ú','ù','û','ü','ä','ë','ï','ö','ç','í');
	for ($X = 0; $X < count($Array1); $X++) {
		$Texto = str_replace($Array2[$X],$Array1[$X],$Texto);
	}
	return strtoupper($Texto);
}
              
function uppercaseInscricoes($even_id) {
	$inscricaoList = $this->listInscricoesByEvento($even_id,"NOME");
	for ($i = 0; $i < count($inscricaoList); $i++) {
		/* @var $inscricao Inscricao */
		$inscricao = $inscricaoList[$i];
		//echo $inscricao->getID()."<br>";
		$inscricao->setNOME($this->strtoupper2($inscricao->getNOME()));
		$inscricao->setCRACHA($this->strtoupper2($inscricao->getCRACHA()));
		$inscricao->setREGISTRO_PROF($this->strtoupper2($inscricao->getREGISTRO_PROF()));
		$inscricao->setESPECIALIDADE($this->strtoupper2($inscricao->getESPECIALIDADE()));
		$inscricao->setEMAIL($this->strtolower2($inscricao->getEMAIL()));
		$inscricao->setENDERECO($this->strtoupper2($inscricao->getENDERECO()));
		$inscricao->setBAIRRO($this->strtoupper2($inscricao->getBAIRRO()));
		$inscricao->setCIDADE($this->strtoupper2($inscricao->getCIDADE()));
		$inscricao->setESTADO($this->strtoupper2($inscricao->getESTADO()));
		$inscricao->setPAIS($this->strtoupper2($inscricao->getPAIS()));
		$inscricao->setORG_NOME($this->strtoupper2($inscricao->getORG_NOME()));
		$inscricao->setORG_CARGO($this->strtoupper2($inscricao->getORG_CARGO()));
		$inscricao->setORG_ENDERECO($this->strtoupper2($inscricao->getORG_ENDERECO()));
		$inscricao->setORG_CIDADE($this->strtoupper2($inscricao->getORG_CIDADE()));
		$inscricao->setACOMP($this->strtoupper2($inscricao->getACOMP()));
		$inscricao->setOBS($this->strtoupper2($inscricao->getOBS()));
		$inscricao->setTEXTO_1($this->strtoupper2($inscricao->getTEXTO_1()));
		$inscricao->setTEXTO_2($this->strtoupper2($inscricao->getTEXTO_2()));
		$inscricao->setTEXTO_3($this->strtoupper2($inscricao->getTEXTO_3()));
		$inscricao->setTEXTO_4($this->strtoupper2($inscricao->getTEXTO_4()));
		$inscricao->setTEXTO_5($this->strtoupper2($inscricao->getTEXTO_5()));
		$inscricao->setTEXTO_6($this->strtoupper2($inscricao->getTEXTO_6()));
		$inscricao->setTEXTO_7($this->strtoupper2($inscricao->getTEXTO_7()));
		$inscricao->setTEXTO_8($this->strtoupper2($inscricao->getTEXTO_8()));
		$inscricao->setTEXTO_9($this->strtoupper2($inscricao->getTEXTO_9()));
		$inscricao->setTEXTO_10($this->strtoupper2($inscricao->getTEXTO_10()));
		$inscricao->save();
	}
}



} // class : end

?>