<?
include_once('../classes/class.pessoa.php');
include_once('../classes/service.pessoa.php');

$pessoa = new Pessoa();

if ($_REQUEST["id"]) {
	$pessoa->delete($_REQUEST["id"]);
} else {
	echo "<span class='structFilter'>";
	echo "Erro: Pessoa não encontrado no BD.<br>";
	break;
	echo "</span>";
}

header("Location: pessoa_list.php?orga_id=".$_REQUEST["orga_id"]);

?>