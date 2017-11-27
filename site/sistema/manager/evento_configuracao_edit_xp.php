<?
include_once('../classes/class.configuracao.php');
include_once('../classes/service.evento.php');

$even_id = $_REQUEST["even_id"];

// Verifica se foi passado o ID do evento
if ($even_id) {
	
	$eventoService = new EventoService();
	
	// Insere variáveis do Form na Classe
	$configuracao = new Configuracao();
	
	// Preenche os dados editados
	$configuracao->setEVEN_ID($even_id);
	$configuracao->setDADOS_RECIBO($_REQUEST["dados_recibo"]);
	$configuracao->setALIAS($_REQUEST["alias"]);
	
	/* Inicia tratamento das Imagens */
	if ($_FILES["logo_file"]['name'] != "") {
		// Obtém a extensão da imagem para depois gravar no BD
		$logo_ext = strtolower(end(explode('.', $_FILES['logo_file']['name'])));
		$configuracao->setLOGO_FORMATO($logo_ext);
	} else {
		$configuracao->setLOGO_FORMATO($_REQUEST["logo_formato"]);
	}
	
	$configuracao->save();

	
	if ($_FILES['logo_file']['name'] != "") {
		// Salva arquivo no disco
		$logo_arquivo = "logos/".$configuracao->getEVEN_ID().".".$logo_ext;
		copy($_FILES['logo_file']['tmp_name'], $logo_arquivo);
		
		$logoPath = dirname(__FILE__)."/".$logo_arquivo;
		$configuracao->updateLogo($logoPath);
		//echo $_FILES['logo_file']['type'];break;
	}

	
	
	
	header("Location: evento_captado_list.php");
	
} else {
	include_once("struct/struct_top.php");
	echo "Erro: ID do Evento não informado corretamente";
	include_once("struct/struct_bottom.php");
}

?>