<?
include_once('../classes/class.evento.php');
include_once('../classes/class.configuracao.php');
include_once('../classes/service.evento.php');

$even_id = $_REQUEST["even_id"];

// Verifica se foi passado o ID do evento
if ($even_id) {
	
	// Obtém a configuração para esse ID, se houver
	$configuracao = new Configuracao();
	$configuracao->select($even_id);
	
	// Obtém o nome do evento para exibir ao usuário
	$evento = new Evento();
	$evento->select($even_id);

	// Verifica se há configuração para esse evento
	if ($configuracao->getEVEN_ID($even_id)) {
		// Se houver, indica erro e evita duplicação da configuração
		include_once("struct/struct_top.php");
		echo 'Erro: Evento "'.$evento->getNOME().'" já havia sido ativado antes...';
		include_once("struct/struct_bottom.php");
	} else {
		// Se não houver, cria a configuração
		$configuracao = new Configuracao();
		$configuracao->setEVEN_ID($even_id);
		$configuracao->insert();

		include_once("struct/struct_top.php");
		echo 'Evento "'.$evento->getNOME().'" foi ativado! Parabéns pela conquista!';
		include_once("struct/struct_bottom.php");
		
	}
} else {
	include_once("struct/struct_top.php");
	echo "Erro: ID do Evento não informado corretamente";
	include_once("struct/struct_bottom.php");
}

?>