<?header("Content-type: text/html; charset=ISO-8859-1");?>
<?
include_once('../classes/class.evento.php');
include_once('../classes/service.evento.php');

$eventoService = new EventoService();

$configurado = $_REQUEST["configurado"];
$orga_id = $_REQUEST["orga_id"];
$even_id = $_REQUEST["even_id"];

// Se foi passado um ID de Organização, lista evento dessa Organização
if ($orga_id) {
	if ($configurado == 1) {
		$eventoList = $eventoService->listEventosConfiguradosByOrganizacao($orga_id);
	} else {
		$eventoList = $eventoService->listEventosByOrganizacao($orga_id);
	}
} else {
	$eventoList = $eventoService->listEventos();
}

echo "<select name='even_id' class='structFilterBox'>\n";
echo $eventoService->generateHtmlOptions($eventoList,$even_id);
echo "</select>\n";
?>