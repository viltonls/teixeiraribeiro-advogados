<?
include_once('../classes/class.evento.php');
include_once('../classes/service.evento.php');
include_once('../classes/class.inscricao.php');
include_once('../classes/service.inscricao.php');

include_once("struct/struct_top.php");
include_once("struct/struct_functions.php");

?>
<div class="structTitle">Resultado da Importação</div>
<?

$evento = new Evento();
$eventoService = new EventoService();
$inscricaoService = new InscricaoService();

// Parâmetros que devem ser passados nessa chamada
$even_id = $_REQUEST["even_id"];
//$even_id = 13;
$url = $_REQUEST["url"];
//$url = "http://localhost/officemkt/system/inscricao_export_xml.php?even_id=".$even_id."&lastid=1424";

$xml = simplexml_load_file($url);

foreach($xml->inscricao as $xmlInscricao) {

	$inscricao = new Inscricao();
	$inscricao->setEVEN_ID(transformSingleQuotes($even_id));
	$inscricao->setDATA(date("Y-m-d H:i:s",dataHoraBrToTime($xmlInscricao->data)));
	$inscricao->setSTATUS($xmlInscricao->status);
	$inscricao->setORIGEM("s");
	$inscricao->setNOME(transformSingleQuotes($xmlInscricao->nome));
	$inscricao->setCRACHA(transformSingleQuotes($xmlInscricao->cracha));
	$inscricao->setID_EXTERNO($xmlInscricao->id_externo);
	$inscricao->setSEXO($xmlInscricao->sexo);
	$inscricao->setNASCIMENTO(date("Y-m-d H:i:s",dataHoraBrToTime($xmlInscricao->nascimento)));
	$inscricao->setCPF_PASSAPORTE($xmlInscricao->cpf_passaporte);
	$inscricao->setREGISTRO_PROF(transformSingleQuotes($xmlInscricao->registro_prof));
	$inscricao->setESPECIALIDADE(transformSingleQuotes($xmlInscricao->especialidade));
	$inscricao->setEMAIL(transformSingleQuotes($xmlInscricao->email));
	$inscricao->setDDI($xmlInscricao->ddi);
	$inscricao->setDDD($xmlInscricao->ddd);
	$inscricao->setFONE($xmlInscricao->fone);
	$inscricao->setCELULAR($xmlInscricao->celular);
	$inscricao->setFAX($xmlInscricao->fax);
	$inscricao->setENDERECO(transformSingleQuotes($xmlInscricao->endereco));
	$inscricao->setCEP($xmlInscricao->cep);
	$inscricao->setBAIRRO(transformSingleQuotes($xmlInscricao->bairro));
	$inscricao->setCIDADE(transformSingleQuotes($xmlInscricao->cidade));
	$inscricao->setESTADO(transformSingleQuotes($xmlInscricao->estado));
	$inscricao->setPAIS(transformSingleQuotes($xmlInscricao->pais));
	$inscricao->setTIPO($xmlInscricao->tipo);
	$inscricao->setCATEGORIA($xmlInscricao->categoria);
	$inscricao->setVALOR($xmlInscricao->valor);
	$inscricao->setSTATUS_PGTO($xmlInscricao->status_pgto);
	$inscricao->setFORMA_PGTO($xmlInscricao->forma_pgto);
	$inscricao->setORG_NOME(transformSingleQuotes($xmlInscricao->org_nome));
	$inscricao->setORG_CARGO(transformSingleQuotes($xmlInscricao->org_cargo));
	$inscricao->setORG_FONE($xmlInscricao->org_fone);
	$inscricao->setORG_CNPJ($xmlInscricao->org_cnpj);
	$inscricao->setORG_ENDERECO(transformSingleQuotes($xmlInscricao->org_endereco));
	$inscricao->setORG_CIDADE(transformSingleQuotes($xmlInscricao->org_cidade));
	$inscricao->setORG_WEBSITE(transformSingleQuotes($xmlInscricao->org_website));
	$inscricao->setACOMP(transformSingleQuotes($xmlInscricao->acomp));
	$inscricao->setOBS(transformSingleQuotes($xmlInscricao->obs));
	$inscricao->setTEXTO_1(transformSingleQuotes($xmlInscricao->texto_1));
	$inscricao->setTEXTO_2(transformSingleQuotes($xmlInscricao->texto_2));
	$inscricao->setTEXTO_3(transformSingleQuotes($xmlInscricao->texto_3));
	$inscricao->setTEXTO_4(transformSingleQuotes($xmlInscricao->texto_4));
	$inscricao->setTEXTO_5(transformSingleQuotes($xmlInscricao->texto_5));
	$inscricao->setTEXTO_6(transformSingleQuotes($xmlInscricao->texto_6));
	$inscricao->setTEXTO_7(transformSingleQuotes($xmlInscricao->texto_7));
	$inscricao->setTEXTO_8(transformSingleQuotes($xmlInscricao->texto_8));
	$inscricao->setTEXTO_9(transformSingleQuotes($xmlInscricao->texto_9));
	$inscricao->setTEXTO_10(transformSingleQuotes($xmlInscricao->texto_10));
	$inscricao->setBOOL_1($xmlInscricao->bool_1);
	$inscricao->setBOOL_2($xmlInscricao->bool_2);
	$inscricao->setBOOL_3($xmlInscricao->bool_3);
	$inscricao->setBOOL_4($xmlInscricao->bool_4);
	$inscricao->setBOOL_5($xmlInscricao->bool_5);
	$inscricao->setBOOL_6($xmlInscricao->bool_6);
	$inscricao->setBOOL_7($xmlInscricao->bool_7);
	$inscricao->setBOOL_8($xmlInscricao->bool_8);
	$inscricao->setBOOL_9($xmlInscricao->bool_9);
	$inscricao->setBOOL_10($xmlInscricao->bool_10);
	$inscricao->setBOOL_11($xmlInscricao->bool_11);
	$inscricao->setBOOL_12($xmlInscricao->bool_12);
	$inscricao->setBOOL_13($xmlInscricao->bool_13);
	$inscricao->setBOOL_14($xmlInscricao->bool_14);
	$inscricao->setBOOL_15($xmlInscricao->bool_15);
	$inscricao->setBOOL_16($xmlInscricao->bool_16);
	$inscricao->setBOOL_17($xmlInscricao->bool_17);
	$inscricao->setBOOL_18($xmlInscricao->bool_18);
	$inscricao->setBOOL_19($xmlInscricao->bool_19);
	$inscricao->setBOOL_20($xmlInscricao->bool_20);
	$inscricao->setCURSO_1($xmlInscricao->curso_1);
	$inscricao->setCURSO_2($xmlInscricao->curso_2);
	$inscricao->setCURSO_3($xmlInscricao->curso_3);
	$inscricao->setCURSO_4($xmlInscricao->curso_4);
	$inscricao->setCURSO_5($xmlInscricao->curso_5);
	$inscricao->setCURSO_6($xmlInscricao->curso_6);
	$inscricao->setCURSO_7($xmlInscricao->curso_7);
	$inscricao->setCURSO_8($xmlInscricao->curso_8);
	$inscricao->setCURSO_9($xmlInscricao->curso_9);
	$inscricao->setCURSO_10($xmlInscricao->curso_10);
	$inscricao->setCURSO_11($xmlInscricao->curso_11);
	$inscricao->setCURSO_12($xmlInscricao->curso_12);
	$inscricao->setCURSO_13($xmlInscricao->curso_13);
	$inscricao->setCURSO_14($xmlInscricao->curso_14);
	$inscricao->setCURSO_15($xmlInscricao->curso_15);
	$inscricao->setCURSO_16($xmlInscricao->curso_16);
	$inscricao->setCURSO_17($xmlInscricao->curso_17);
	$inscricao->setCURSO_18($xmlInscricao->curso_18);
	$inscricao->setCURSO_19($xmlInscricao->curso_19);
	$inscricao->setCURSO_20($xmlInscricao->curso_20);
	$inscricao->setCURSO_21($xmlInscricao->curso_21);
	$inscricao->setCURSO_22($xmlInscricao->curso_22);
	$inscricao->setCURSO_23($xmlInscricao->curso_23);
	$inscricao->setCURSO_24($xmlInscricao->curso_24);
	$inscricao->setCURSO_25($xmlInscricao->curso_25);
	$inscricao->setCURSO_26($xmlInscricao->curso_26);
	$inscricao->setCURSO_27($xmlInscricao->curso_27);
	$inscricao->setCURSO_28($xmlInscricao->curso_28);
	$inscricao->setCURSO_29($xmlInscricao->curso_29);
	$inscricao->setCURSO_30($xmlInscricao->curso_30);

	// Verifica se já há inscrição com mesmo ID Externo
	$inscricaoRepetidaId = $inscricaoService->loadInscricaoByIdExterno($even_id,$inscricao->getID_EXTERNO());
	//echo "Inscricao Repetida Id: ".$inscricaoRepetidaId."<br>";
	
	if ($inscricaoRepetidaId != "") {
		// Há inscrição com mesmo ID Externo
		$inscricaoRepetida = new Inscricao();
		$inscricaoRepetida->select($inscricaoRepetidaId,$even_id);

		if ($inscricaoRepetida->getSTATUS() != "x") {
			
			// Verifica o campo de status de pagamento
			if ($inscricaoRepetida->getSTATUS_PGTO() != "o" && $inscricaoRepetida->getSTATUS_PGTO() != "g") {
				// Se não está ok no sistema, pega o status do Site
				$inscricaoRepetida->setSTATUS_PGTO($inscricao->getSTATUS_PGTO());
				//$inscricaoRepetida->setCATEGORIA($inscricao->getCATEGORIA());
				//$inscricaoRepetida->setTIPO($inscricao->getTIPO());
				$inscricaoRepetida->setNOME($inscricao->getNOME());
				$inscricaoRepetida->save();
				echo "ID Externo: ".$inscricao->getID_EXTERNO()." (Encontrado com mesmo ID Externo - StatusPgto Atualizado!)<br>";
			} else {
				//$inscricaoRepetida->setCATEGORIA($inscricao->getCATEGORIA());
				//$inscricaoRepetida->setTIPO($inscricao->getTIPO());
				$inscricaoRepetida->setNOME($inscricao->getNOME());
				$inscricaoRepetida->save();
				echo "ID Externo: ".$inscricao->getID_EXTERNO()." (Encontrado com mesmo ID Externo)<br>";
				// Se está ok, não faz nada
			}
		} else {
			echo "ID Externo: ".$inscricao->getID_EXTERNO()." (Encontrado com mesmo ID Externo - Excluída no sistema...)<br>";
		}

	} else {
		// Não há inscrição com mesmo ID Externo
		$inscricaoRepetidaId = $inscricaoService->loadInscricaoByCPF($even_id,$inscricao->getCPF_PASSAPORTE());
		if ($inscricaoRepetidaId != "") {
			// Há inscrição com mesmo CPF/Passaporte
			echo "ID Externo: ".$inscricao->getID_EXTERNO()." (Encontrado com mesmo CPF/Passaporte)<br>";
			// Salva com mesmo CPF no sistema
			$inscricao->save();
			$inscricaoRepetidaId = "";
		} else {
			// Não há inscrição com mesmo CPF/Passaporte
			echo "ID Externo: ".$inscricao->getID_EXTERNO()." (Nova Inscrição)<br>";
			$inscricao->save();
			$inscricaoRepetidaId = "";
		}
	}


	
} 

//header("Location: inscricao_list.php");
?>
<? include_once("struct/struct_bottom.php")?>