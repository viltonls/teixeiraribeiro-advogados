<?
include_once('../classes/class.organizacao.php');
include_once('../classes/service.organizacao.php');

$organizacao = new Organizacao();

if ($_REQUEST["id"]) {
	$organizacao->delete($_REQUEST["id"]);
} else {
	echo "<span class='structFilter'>";
	echo "Erro: Organiza��o n�o encontrada no BD.<br>";
	break;
	echo "</span>";
}

header("Location: organizacao_list.php");

?>