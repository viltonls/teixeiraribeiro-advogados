<?
include_once('../classes/class.evento.php');
include_once('../classes/service.evento.php');

$evento = new Evento();

if ($_REQUEST["id"]) {
	$evento->delete($_REQUEST["id"]);
} else {
	echo "<span class='structFilter'>";
	echo "Erro: Evento não encontrado no BD.<br>";
	break;
	echo "</span>";
}

header("Location: evento_list.php");

?>