<?
include_once('../classes/class.configuracao.php');
include_once('../classes/service.evento.php');

$id = $_REQUEST["even_id"];

$evento = new Evento();
$configuracao = new Configuracao();
$eventoService = new EventoService();

/* Tratamento de Erro */
if ($id) {
	$evento = $eventoService->loadEventoById($id);
	$configuracao = $eventoService->loadEventoConfiguracaoById($id);

	if ($configuracao->getEVEN_ID()) {
		
		//header("Content-length: ");
		//header("Content?type: image/".$configuracao->getLOGO_FORMATO());
		header("Content?type: application/octet-stream");
		//header("Content-Disposition: attachment; filename=logo.".$configuracao->getLOGO_FORMATO());
		echo $configuracao->loadLogo();
		
	}
}
?>