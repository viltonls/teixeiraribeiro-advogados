<?
include_once('../classes/class.evento.php');
include_once('../classes/service.evento.php');
include_once('../classes/class.trabalho.php');
include_once('../classes/service.trabalho.php');

include_once("struct/struct_top.php");
include_once("struct/struct_functions.php");

?>
<div class="structTitle">Resultado da Importação</div>
<?

$evento = new Evento();
$eventoService = new EventoService();
$trabalhoService = new TrabalhoService();

// Parâmetros que devem ser passados nessa chamada
$even_id = $_REQUEST["even_id"];
//$even_id = 13;
$url = $_REQUEST["url"];
//$url = "http://localhost/officemkt/system/trabalho_export_xml.php?even_id=".$even_id."&lastid=1424";

$xml = simplexml_load_file($url);

foreach($xml->trabalho as $xmlTrabalho) {

	$trabalho = new Trabalho();
	$trabalho->setEVEN_ID(utf8_decode($even_id));
	$trabalho->setDATA(date("Y-m-d H:i:s",dataHoraBrToTime($xmlTrabalho->data)));
	$trabalho->setID_EXTERNO($xmlTrabalho->id_externo);
	$trabalho->setSTATUS($xmlTrabalho->status);

	$trabalho->setAUTORIZACAO(transformSingleQuotes(utf8_decode($xmlTrabalho->autorizacao)));
	$trabalho->setDATA_APRES($xmlTrabalho->data_apres);
	$trabalho->setTIPO_APRES(transformSingleQuotes(utf8_decode($xmlTrabalho->tipo_apres)));
	$trabalho->setTITULO(transformSingleQuotes(utf8_decode($xmlTrabalho->titulo)));
	$trabalho->setRESUMO(transformSingleQuotes(utf8_decode($xmlTrabalho->resumo)));
	$trabalho->setCORPO(transformSingleQuotes(utf8_decode($xmlTrabalho->corpo)));
	$trabalho->setBIBLIOGRAFIA(transformSingleQuotes(utf8_decode($xmlTrabalho->bibliografia)));
	$trabalho->setARQ_NOME(transformSingleQuotes(utf8_decode($xmlTrabalho->arq_nome)));
	$trabalho->setARQ_URL($xmlTrabalho->arq_url);
	$trabalho->setARQ_TIPO($xmlTrabalho->arq_tipo);
	$trabalho->setARQ2_NOME(transformSingleQuotes(utf8_decode($xmlTrabalho->arq2_nome)));
	$trabalho->setARQ2_URL($xmlTrabalho->arq2_url);
	$trabalho->setARQ2_TIPO($xmlTrabalho->arq2_tipo);
	$trabalho->setAUTOR_NOME(transformSingleQuotes(utf8_decode($xmlTrabalho->autor_nome)));
	$trabalho->setAUTOR_EMAIL(transformSingleQuotes(utf8_decode($xmlTrabalho->autor_email)));
	$trabalho->setAUTOR_FONE(transformSingleQuotes(utf8_decode($xmlTrabalho->autor_fone)));
	$trabalho->setAUTOR_ORGA(transformSingleQuotes(utf8_decode($xmlTrabalho->autor_orga)));
	$trabalho->setAUTOR_CIDADE(transformSingleQuotes(utf8_decode($xmlTrabalho->autor_cidade)));
	$trabalho->setAUTOR_ESTADO(transformSingleQuotes(utf8_decode($xmlTrabalho->autor_estado)));
	$trabalho->setAUTOR_PAIS(transformSingleQuotes(utf8_decode($xmlTrabalho->autor_pais)));
	$trabalho->setAPRES_NOME(transformSingleQuotes(utf8_decode($xmlTrabalho->apres_nome)));
	$trabalho->setAPRES_EMAIL(transformSingleQuotes(utf8_decode($xmlTrabalho->apres_email)));
	$trabalho->setAPRES_FONE(transformSingleQuotes(utf8_decode($xmlTrabalho->apres_fone)));
	$trabalho->setAPRES_ORGA(transformSingleQuotes(utf8_decode($xmlTrabalho->apres_orga)));
	$trabalho->setAUTOR1_NOME(transformSingleQuotes(utf8_decode($xmlTrabalho->autor1_nome)));
	$trabalho->setAUTOR1_EMAIL(transformSingleQuotes(utf8_decode($xmlTrabalho->autor1_email)));
	$trabalho->setAUTOR2_NOME(transformSingleQuotes(utf8_decode($xmlTrabalho->autor2_nome)));
	$trabalho->setAUTOR2_EMAIL(transformSingleQuotes(utf8_decode($xmlTrabalho->autor2_email)));
	$trabalho->setAUTOR3_NOME(transformSingleQuotes(utf8_decode($xmlTrabalho->autor3_nome)));
	$trabalho->setAUTOR3_EMAIL(transformSingleQuotes(utf8_decode($xmlTrabalho->autor3_email)));
	$trabalho->setAUTOR4_NOME(transformSingleQuotes(utf8_decode($xmlTrabalho->autor4_nome)));
	$trabalho->setAUTOR4_EMAIL(transformSingleQuotes(utf8_decode($xmlTrabalho->autor4_email)));
	$trabalho->setAUTOR5_NOME(transformSingleQuotes(utf8_decode($xmlTrabalho->autor5_nome)));
	$trabalho->setAUTOR5_EMAIL(transformSingleQuotes(utf8_decode($xmlTrabalho->autor5_email)));
	$trabalho->setAUTOR6_NOME(transformSingleQuotes(utf8_decode($xmlTrabalho->autor6_nome)));
	$trabalho->setAUTOR6_EMAIL(transformSingleQuotes(utf8_decode($xmlTrabalho->autor6_email)));
	$trabalho->setAUTOR7_NOME(transformSingleQuotes(utf8_decode($xmlTrabalho->autor7_nome)));
	$trabalho->setAUTOR7_EMAIL(transformSingleQuotes(utf8_decode($xmlTrabalho->autor7_email)));
	$trabalho->setAUTOR8_NOME(transformSingleQuotes(utf8_decode($xmlTrabalho->autor8_nome)));
	$trabalho->setAUTOR8_EMAIL(transformSingleQuotes(utf8_decode($xmlTrabalho->autor8_email)));
	$trabalho->setAUTOR9_NOME(transformSingleQuotes(utf8_decode($xmlTrabalho->autor9_nome)));
	$trabalho->setAUTOR9_EMAIL(transformSingleQuotes(utf8_decode($xmlTrabalho->autor9_email)));
	$trabalho->setAUTOR10_NOME(transformSingleQuotes(utf8_decode($xmlTrabalho->autor10_nome)));
	$trabalho->setAUTOR10_EMAIL(transformSingleQuotes(utf8_decode($xmlTrabalho->autor10_email)));
	$trabalho->setOBS(transformSingleQuotes(utf8_decode($xmlTrabalho->obs)));
	

	// Verifica se já há trabalho com mesmo ID Externo
	$trabalhoRepetidoId = $trabalhoService->loadTrabalhoByIdExterno($even_id,$trabalho->getID_EXTERNO());
	//echo "Trabalho Repetido Id: ".$trabalhoRepetidoId."<br>";
	
	if ($trabalhoRepetidoId != "") {
		// Há trabalho com mesmo ID Externo
		$trabalhoRepetido = new Trabalho();
		$trabalhoRepetido->select($trabalhoRepetidoId,$even_id);

		// Verifica o campo de status
		if ($trabalhoRepetido->getSTATUS() <= 8) {
			// Se não está ok no sistema, pega o status do Site
			$trabalhoRepetido->setSTATUS($trabalho->getSTATUS());
			$trabalhoRepetido->setOBS($trabalho->getOBS());
			$trabalhoRepetido->save();
			echo "ID Externo: ".$trabalho->getID_EXTERNO()." (Encontrado com mesmo ID Externo - Status e Obs Atualizado!)<br>";
		} else {
			// Se está com status final, não faz nada
			echo "ID Externo: ".$trabalho->getID_EXTERNO()." (Encontrado com mesmo ID Externo)<br>";
		}

	} else {
		// Não há trabalho com mesmo ID Externo
		echo "ID Externo: ".$trabalho->getID_EXTERNO()." (Novo Trabalho)<br>";
		$trabalho->save();
		$trabalhoRepetido = "";
	}


	
} 

//header("Location: trabalho_list.php");
?>
<? include_once("struct/struct_bottom.php")?>