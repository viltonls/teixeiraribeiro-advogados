<?
include_once('../classes/class.evento.php');
include_once('../classes/class.configuracao.php');
include_once('../classes/service.evento.php');

$even_id = $_REQUEST["even_id"];
$url = $_REQUEST["url"];

$eventoService = new EventoService();
$evento = new Evento();
$evento = $eventoService->loadEventoById($even_id);
$configuracao = new Configuracao();
$configuracao = $eventoService->loadEventoConfiguracaoById($even_id);

/*
echo "Dados do Usuario no BD<br>";
echo "Id: ".$user->getID()."<br>";
echo "Login: ".$user->getLOGIN()."<br>";
echo "Senha: ".$user->getSENHA()."<br>";
*/
if ($evento->getID() != null) {

	/*
	$filePath = dirname(__FILE__)."\logos\\";
	$filePath = str_replace("\\","/",$filePath);
	if (file_exists($filePath."logo.bmp")) unlink($filePath."logo.bmp");
	if (file_exists($filePath."logo.gif")) unlink($filePath."logo.gif");
	if (file_exists($filePath."logo.jpg")) unlink($filePath."logo.jpg");
	*/
	
	$configuracao->dumpLogo(dirname(__FILE__)."\logos\\".$configuracao->getEVEN_ID()."_tmp.".$configuracao->getLOGO_FORMATO());
	
	session_register("evento");
	$_SESSION["evento"] = $evento;
	session_register("configuracao");
	$_SESSION["configuracao"] = $configuracao;
	if ($url) {
		header("Location: $url");
	} else {
		header("Location: index.php");
	}
} else {
	include_once("struct/struct_top.php");
	echo 'Erro: Evento não encontrado no BD.';
	include_once("struct/struct_bottom.php");
}

?>