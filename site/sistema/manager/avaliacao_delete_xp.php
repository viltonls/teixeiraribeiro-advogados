<?
include_once('../classes/class.avaliacao.php');
include_once('../classes/service.avaliacao.php');

$avaliacao = new Avaliacao();

if ($_REQUEST["aval_id"] && $_REQUEST["trab_id"]) {
	$avaliacao->delete($_REQUEST["aval_id"],$_REQUEST["trab_id"]);
} else {
	echo "<span class='structFilter'>";
	echo "Erro: Avaliação não encontrada no BD.<br>";
	break;
	echo "</span>";
}

header("Location: avaliador_avaliacao_list.php?aval_id=".$_REQUEST["aval_id"]."&trab_id=".$_REQUEST["trab_id"]);

?>