<?
include_once('../classes/class.avaliador.php');
include_once('../classes/service.avaliador.php');

$avaliador = new Avaliador();

if ($_REQUEST["id"]) {
	$avaliador->delete($_REQUEST["id"]);
} else {
	echo "<span class='structFilter'>";
	echo "Erro: Avaliador não encontrado no BD.<br>";
	break;
	echo "</span>";
}

header("Location: avaliador_list.php");

?>