<?php

include_once("class.valores.php");
include_once("class.configuracao.php");
include_once("class.database.php");

// **********************
// CLASS DECLARATION
// **********************

class ValoresService
{ // class : begin


// **********************
// ATTRIBUTE DECLARATION
// **********************

private $database; // Instance of class database


// **********************
// CONSTRUCTOR METHOD
// **********************

function ValoresService() {
	$this->database = new Database();
}


// **********************
// SELECT METHOD / LOAD
// **********************

/**
 * Carrega o valores pelo ID
 *
 * @param int $id
 * @return Valores
 */
function loadValoresById($id) {

	$valores = new Valores();
	$valores->select($id);
	return $valores;

}


/**
 * Carrega todos os valores
 *
 * @param int $even_id
 * @return array
 */
function listValoresByEvento($even_id) {

	$sql = "SELECT * FROM evento_valores WHERE EVEN_ID = $even_id ORDER BY EVAL_FIM ASC;";
	$result = $this->database->query($sql);
	$result = $this->database->result;
	//$row = mysql_fetch_object($result);
	
	$result_count = 0;
	while ($row = mysql_fetch_object($result)) {
		
	
		$valores = new Valores();
		
		$valores->setID($row->EVAL_ID);
		$valores->setEVEN_ID($row->EVEN_ID);
		$valores->setFIM($row->EVAL_FIM);
		$valores->setACOMP($row->EVAL_ACOMP);
		$valores->setA1($row->EVAL_A1);
		$valores->setA2($row->EVAL_A2);
		$valores->setA3($row->EVAL_A3);
		$valores->setA4($row->EVAL_A4);
		$valores->setA5($row->EVAL_A5);
		$valores->setA6($row->EVAL_A6);
		$valores->setB1($row->EVAL_B1);
		$valores->setB2($row->EVAL_B2);
		$valores->setB3($row->EVAL_B3);
		$valores->setB4($row->EVAL_B4);
		$valores->setB5($row->EVAL_B5);
		$valores->setB6($row->EVAL_B6);
		$valores->setC1($row->EVAL_C1);
		$valores->setC2($row->EVAL_C2);
		$valores->setC3($row->EVAL_C3);
		$valores->setC4($row->EVAL_C4);
		$valores->setC5($row->EVAL_C5);
		$valores->setC6($row->EVAL_C6);
		$valores->setD1($row->EVAL_D1);
		$valores->setD2($row->EVAL_D2);
		$valores->setD3($row->EVAL_D3);
		$valores->setD4($row->EVAL_D4);
		$valores->setD5($row->EVAL_D5);
		$valores->setD6($row->EVAL_D6);
		$valores->setE1($row->EVAL_E1);
		$valores->setE2($row->EVAL_E2);
		$valores->setE3($row->EVAL_E3);
		$valores->setE4($row->EVAL_E4);
		$valores->setE5($row->EVAL_E5);
		$valores->setE6($row->EVAL_E6);
		$valores->setF1($row->EVAL_F1);
		$valores->setF2($row->EVAL_F2);
		$valores->setF3($row->EVAL_F3);
		$valores->setF4($row->EVAL_F4);
		$valores->setF5($row->EVAL_F5);
		$valores->setF6($row->EVAL_F6);
		$valores->setG1($row->EVAL_G1);
		$valores->setG2($row->EVAL_G2);
		$valores->setG3($row->EVAL_G3);
		$valores->setG4($row->EVAL_G4);
		$valores->setG5($row->EVAL_G5);
		$valores->setG6($row->EVAL_G6);
		$valores->setH1($row->EVAL_H1);
		$valores->setH2($row->EVAL_H2);
		$valores->setH3($row->EVAL_H3);
		$valores->setH4($row->EVAL_H4);
		$valores->setH5($row->EVAL_H5);
		$valores->setH6($row->EVAL_H6);
		$valores->setI1($row->EVAL_I1);
		$valores->setI2($row->EVAL_I2);
		$valores->setI3($row->EVAL_I3);
		$valores->setI4($row->EVAL_I4);
		$valores->setI5($row->EVAL_I5);
		$valores->setI6($row->EVAL_I6);
		$valores->setJ1($row->EVAL_J1);
		$valores->setJ2($row->EVAL_J2);
		$valores->setJ3($row->EVAL_J3);
		$valores->setJ4($row->EVAL_J4);
		$valores->setJ5($row->EVAL_J5);
		$valores->setJ6($row->EVAL_J6);
		$valores->setK1($row->EVAL_K1);
		$valores->setK2($row->EVAL_K2);
		$valores->setK3($row->EVAL_K3);
		$valores->setK4($row->EVAL_K4);
		$valores->setK5($row->EVAL_K5);
		$valores->setK6($row->EVAL_K6);
		$valores->setL1($row->EVAL_L1);
		$valores->setL2($row->EVAL_L2);
		$valores->setL3($row->EVAL_L3);
		$valores->setL4($row->EVAL_L4);
		$valores->setL5($row->EVAL_L5);
		$valores->setL6($row->EVAL_L6);
		$valores->setM1($row->EVAL_M1);
		$valores->setM2($row->EVAL_M2);
		$valores->setM3($row->EVAL_M3);
		$valores->setM4($row->EVAL_M4);
		$valores->setM5($row->EVAL_M5);
		$valores->setM6($row->EVAL_M6);
		$valores->setN1($row->EVAL_N1);
		$valores->setN2($row->EVAL_N2);
		$valores->setN3($row->EVAL_N3);
		$valores->setN4($row->EVAL_N4);
		$valores->setN5($row->EVAL_N5);
		$valores->setN6($row->EVAL_N6);
		$valores->setO1($row->EVAL_O1);
		$valores->setO2($row->EVAL_O2);
		$valores->setO3($row->EVAL_O3);
		$valores->setO4($row->EVAL_O4);
		$valores->setO5($row->EVAL_O5);
		$valores->setO6($row->EVAL_O6);
		$valores->setP1($row->EVAL_P1);
		$valores->setP2($row->EVAL_P2);
		$valores->setP3($row->EVAL_P3);
		$valores->setP4($row->EVAL_P4);
		$valores->setP5($row->EVAL_P5);
		$valores->setP6($row->EVAL_P6);
		$valores->setQ1($row->EVAL_Q1);
		$valores->setQ2($row->EVAL_Q2);
		$valores->setQ3($row->EVAL_Q3);
		$valores->setQ4($row->EVAL_Q4);
		$valores->setQ5($row->EVAL_Q5);
		$valores->setQ6($row->EVAL_Q6);
		$valores->setR1($row->EVAL_R1);
		$valores->setR2($row->EVAL_R2);
		$valores->setR3($row->EVAL_R3);
		$valores->setR4($row->EVAL_R4);
		$valores->setR5($row->EVAL_R5);
		$valores->setR6($row->EVAL_R6);
		$valores->setS1($row->EVAL_S1);
		$valores->setS2($row->EVAL_S2);
		$valores->setS3($row->EVAL_S3);
		$valores->setS4($row->EVAL_S4);
		$valores->setS5($row->EVAL_S5);
		$valores->setS6($row->EVAL_S6);
		$valores->setT1($row->EVAL_T1);
		$valores->setT2($row->EVAL_T2);
		$valores->setT3($row->EVAL_T3);
		$valores->setT4($row->EVAL_T4);
		$valores->setT5($row->EVAL_T5);
		$valores->setT6($row->EVAL_T6);
		$valores->setU1($row->EVAL_U1);
		$valores->setU2($row->EVAL_U2);
		$valores->setU3($row->EVAL_U3);
		$valores->setU4($row->EVAL_U4);
		$valores->setU5($row->EVAL_U5);
		$valores->setU6($row->EVAL_U6);
		$valores->setV1($row->EVAL_V1);
		$valores->setV2($row->EVAL_V2);
		$valores->setV3($row->EVAL_V3);
		$valores->setV4($row->EVAL_V4);
		$valores->setV5($row->EVAL_V5);
		$valores->setV6($row->EVAL_V6);
		$valores->setW1($row->EVAL_W1);
		$valores->setW2($row->EVAL_W2);
		$valores->setW3($row->EVAL_W3);
		$valores->setW4($row->EVAL_W4);
		$valores->setW5($row->EVAL_W5);
		$valores->setW6($row->EVAL_W6);
		$valores->setX1($row->EVAL_X1);
		$valores->setX2($row->EVAL_X2);
		$valores->setX3($row->EVAL_X3);
		$valores->setX4($row->EVAL_X4);
		$valores->setX5($row->EVAL_X5);
		$valores->setX6($row->EVAL_X6);
		$valores->setY1($row->EVAL_Y1);
		$valores->setY2($row->EVAL_Y2);
		$valores->setY3($row->EVAL_Y3);
		$valores->setY4($row->EVAL_Y4);
		$valores->setY5($row->EVAL_Y5);
		$valores->setY6($row->EVAL_Y6);
		$valores->setZ1($row->EVAL_Z1);
		$valores->setZ2($row->EVAL_Z2);
		$valores->setZ3($row->EVAL_Z3);
		$valores->setZ4($row->EVAL_Z4);
		$valores->setZ5($row->EVAL_Z5);
		$valores->setZ6($row->EVAL_Z6);
		
		$result_list[$result_count] = $valores;
		$result_count++;
	
	}
	
	return $result_list;

}



/**
 * Calcula o valor a partir dos parтmetros da inscriчуo
 *
 * @param int $even_id, date $data, char $opcao, char $categoria
 * @return array
 */
function calculaValor($even_id, $data, $opcao, $categoria, $acompanhante) {

	$celula = $categoria . $opcao;
	
	if ($categoria == "w" || $categoria == "x" || $categoria == "y" || $categoria == "z") {
		return 0;
	}
	
	$sql = "SELECT eval_$celula, eval_acomp FROM evento_valores WHERE even_id = $even_id AND eval_fim >= '".date('Y-m-d',$data)."' ORDER BY EVAL_FIM ASC LIMIT 1;";
	$result = $this->database->query($sql);
	$result = $this->database->result;
	$row = mysql_fetch_row($result);
	$valor = $row[0];
	$valor_acomp = $row[1];
	
	if ($acompanhante == "true")
	$valor = $valor + $valor_acomp;

	return $valor;

}



} // class : end

?>