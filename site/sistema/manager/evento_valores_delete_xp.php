<?
include_once('../classes/class.valores.php');
include_once('../classes/service.valores.php');

$valores = new Valores();

if ($_REQUEST["eval_id"]) {
	$valores->delete($_REQUEST["eval_id"]);
} else {
	echo "<span class='structFilter'>";
	echo "Erro: Tabela de Valores n�o encontrada no BD.<br>";
	break;
	echo "</span>";
}

header("Location: evento_valores.php?even_id=".$_REQUEST["even_id"]);

?>