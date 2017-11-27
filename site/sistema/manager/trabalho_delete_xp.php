<? include_once("struct/auth.php");

include_once('../classes/class.trabalho.php');
include_once('../classes/service.trabalho.php');

$trabalho = new Trabalho();

if ($_REQUEST["trab_id"]) {
	$trabalho->delete($_REQUEST["trab_id"],$eventoAtual->getID());
} else {
	echo "<span class='structFilter'>";
	echo "Erro: Trabalho não encontrado no BD.<br>";
	break;
	echo "</span>";
}

header("Location: trabalho_list.php");

?>