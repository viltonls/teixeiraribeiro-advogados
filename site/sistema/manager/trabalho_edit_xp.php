<? include("struct/auth.php"); ?>
<?
include_once('../classes/class.trabalho.php');
include_once('../classes/service.trabalho.php');
include_once ( "struct/count_words.php" ) ;
// Insere variáveis do Form na Classe
$trabalho = new Trabalho();

/* @var $eventoAtual Evento */

// Se é uma edição, preenche o objeto com dados do BD
if ($_REQUEST["id"]) {
	$trabalho->select($_REQUEST["id"],$eventoAtual->getID());
	$statusAnterior = $trabalho->getSTATUS();
} else {
	$trabalho->setEVEN_ID($_REQUEST["even_id"]);
	$data = date("Y-m-d H:i:s",mktime(date('H'),date('i'),date('s'),date('m'),date('d'),date('Y'))); // agora
	$trabalho->setDATA($data);
}

// Preenche os dados editados
$trabalho->setAVAL_ID($_REQUEST["aval_id"]);
$trabalho->setSTATUS($_REQUEST["status"]);
$trabalho->setAREA($_REQUEST["area"]);
$trabalho->setOPCAO1($_REQUEST["opcao1"]);
$trabalho->setOPCAO2($_REQUEST["opcao2"]);
$trabalho->setOPCAO3($_REQUEST["opcao3"]);
$trabalho->setOPCAO4($_REQUEST["opcao4"]);
$trabalho->setOPCAO5($_REQUEST["opcao5"]);
$trabalho->setAUTORIZACAO($_REQUEST["autorizacao"]);
$trabalho->setDATA_APRES($_REQUEST["data_apres"]);
$trabalho->setTIPO_APRES($_REQUEST["tipo_apres"]);
$trabalho->setTITULO($_REQUEST["titulo"]);
$trabalho->setRESUMO($_REQUEST["resumo"]);
$trabalho->setCORPO($_REQUEST["corpo"]);
$trabalho->setBIBLIOGRAFIA($_REQUEST["bibliografia"]);
$trabalho->setARQ_NOME($_REQUEST["arq_nome"]);
$trabalho->setARQ_URL($_REQUEST["arq_url"]);
$trabalho->setARQ_TIPO($_REQUEST["arq_tipo"]);
$trabalho->setAUTOR_NOME($_REQUEST["autor_nome"]);
$trabalho->setAUTOR_EMAIL($_REQUEST["autor_email"]);
$trabalho->setAUTOR_FONE($_REQUEST["autor_fone"]);
$trabalho->setAUTOR_ORGA($_REQUEST["autor_orga"]);
$trabalho->setAUTOR_CIDADE($_REQUEST["autor_cidade"]);
$trabalho->setAUTOR_ESTADO($_REQUEST["autor_estado"]);
$trabalho->setAUTOR_PAIS($_REQUEST["autor_pais"]);
$trabalho->setAPRES_NOME($_REQUEST["apres_nome"]);
$trabalho->setAPRES_EMAIL($_REQUEST["apres_email"]);
$trabalho->setAPRES_FONE($_REQUEST["apres_fone"]);
$trabalho->setAPRES_CELULAR($_REQUEST["apres_celular"]);
$trabalho->setAPRES_ORGA($_REQUEST["apres_orga"]);
$trabalho->setAUTOR1_NOME($_REQUEST["autor1_nome"]);
$trabalho->setAUTOR1_EMAIL($_REQUEST["autor1_email"]);
$trabalho->setAUTOR2_NOME($_REQUEST["autor2_nome"]);
$trabalho->setAUTOR2_EMAIL($_REQUEST["autor2_email"]);
$trabalho->setAUTOR3_NOME($_REQUEST["autor3_nome"]);
$trabalho->setAUTOR3_EMAIL($_REQUEST["autor3_email"]);
$trabalho->setAUTOR4_NOME($_REQUEST["autor4_nome"]);
$trabalho->setAUTOR4_EMAIL($_REQUEST["autor4_email"]);
$trabalho->setAUTOR5_NOME($_REQUEST["autor5_nome"]);
$trabalho->setAUTOR5_EMAIL($_REQUEST["autor5_email"]);
$trabalho->setAUTOR6_NOME($_REQUEST["autor6_nome"]);
$trabalho->setAUTOR6_EMAIL($_REQUEST["autor6_email"]);
$trabalho->setAUTOR7_NOME($_REQUEST["autor7_nome"]);
$trabalho->setAUTOR7_EMAIL($_REQUEST["autor7_email"]);
$trabalho->setAUTOR8_NOME($_REQUEST["autor8_nome"]);
$trabalho->setAUTOR8_EMAIL($_REQUEST["autor8_email"]);
$trabalho->setAUTOR9_NOME($_REQUEST["autor9_nome"]);
$trabalho->setAUTOR9_EMAIL($_REQUEST["autor9_email"]);
$trabalho->setAUTOR10_NOME($_REQUEST["autor10_nome"]);
$trabalho->setAUTOR10_EMAIL($_REQUEST["autor10_email"]);
$trabalho->setOBS($_REQUEST["obs"]);

$trabalho->setAPRES_CPF_PASSAPORTE($_REQUEST["apres_cpf_passaporte"]);
$trabalho->setINSTITUICAO1($_REQUEST["instituicao1"]);
$trabalho->setINSTITUICAO2($_REQUEST["instituicao2"]);
$trabalho->setINSTITUICAO3($_REQUEST["instituicao3"]);
$trabalho->setINSTITUICAO4($_REQUEST["instituicao4"]);
$trabalho->setESTADO($_REQUEST["estado"]);
$trabalho->setCIDADE($_REQUEST["cidade"]);
$trabalho->setINTRO($_REQUEST["intro"]);
$trabalho->setOBJETIVO($_REQUEST["objetivo"]);
$trabalho->setMATERIAIS($_REQUEST["materiais"]);
$trabalho->setRESULTADOS($_REQUEST["resultados"]);
$trabalho->setCONCLUSAO($_REQUEST["conclusao"]);
$trabalho->setPALAVRA1($_REQUEST["palavra1"]);
$trabalho->setPALAVRA2($_REQUEST["palavra2"]);
$trabalho->setPALAVRA3($_REQUEST["palavra3"]);

// Rotina 18-D
$trabalho->setAUTORIZACAO($_REQUEST["autorizacao_18"]);
$trabalho->setCORPO($_REQUEST["corpo_18"]);
$trabalho->setBIBLIOGRAFIA($_REQUEST["bibliografia_18"]);
$trabalho->setOBS($_REQUEST["obs_18"]);

$words_number[0] = Get_words( $_REQUEST["resumo"] ) ;
$words_number[1] = Get_words( $_REQUEST["autorizacao_18"] ) ;
$words_number[2] = Get_words( $_REQUEST["corpo_18"] ) ;
$words_number[3] = Get_words( $_REQUEST["bibliografia_18"] ) ;
$words_number[4] = Get_words( $_REQUEST["obs_18"] ) ;

$trabalho->setOPCAO5(serialize( $words_number) );
// Fim Rotina 18-D

$trabalho->save();

$statusNovo = $trabalho->getSTATUS();

// Verifica se mudou o status
if ($statusAnterior != $statusNovo) {
	// Verifica se mudou para status final
	if ($statusNovo == $trabalho->STATUS_ACEITO ||
	    $statusNovo == $trabalho->STATUS_ACEITO_COM_RESTRICOES ||
	    $statusNovo == $trabalho->STATUS_REJEITADO) {
		header("Location: trabalho_envia_resultado.php?trab_id=".$trabalho->getID());
	} else {
		// Permaneceu com status intermediário
		header("Location: trabalho_list.php");
	}
} else {
	header("Location: trabalho_list.php");
}


?>