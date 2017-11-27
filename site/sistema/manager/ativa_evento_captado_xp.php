<?
include_once('../classes/class.evento.php');
include_once('../classes/class.configuracao.php');
include_once('../classes/service.evento.php');

$even_id = $_REQUEST["even_id"];

// Verifica se foi passado o ID do evento
if ($even_id) {
	
	// Obt�m a configura��o para esse ID, se houver
	$configuracao = new Configuracao();
	$configuracao->select($even_id);
	
	// Obt�m o nome do evento para exibir ao usu�rio
	$evento = new Evento();
	$evento->select($even_id);

	// Verifica se h� configura��o para esse evento
	if ($configuracao->getEVEN_ID($even_id)) {
		// Se houver, indica erro e evita duplica��o da configura��o
		include_once("struct/struct_top.php");
		echo 'Erro: Evento "'.$evento->getNOME().'" j� havia sido ativado antes...';
		include_once("struct/struct_bottom.php");
	} else {
		// Se n�o houver, cria a configura��o
		$configuracao = new Configuracao();
		$configuracao->setEVEN_ID($even_id);
		$configuracao->insert();

		include_once("struct/struct_top.php");
		echo 'Evento "'.$evento->getNOME().'" foi ativado! Parab�ns pela conquista!';
		include_once("struct/struct_bottom.php");
		
	}
} else {
	include_once("struct/struct_top.php");
	echo "Erro: ID do Evento n�o informado corretamente";
	include_once("struct/struct_bottom.php");
}

?>