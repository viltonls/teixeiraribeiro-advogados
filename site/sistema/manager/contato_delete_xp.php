<?
include_once('../classes/class.contato.php');
include_once('../classes/service.contato.php');

$contato = new Contato();

if ($_REQUEST["id"]) {
	$contato->delete($_REQUEST["id"]);
} else {
	echo "<span class='structFilter'>";
	echo "Erro: Contato não encontrado no BD.<br>";
	break;
	echo "</span>";
}

header("Location: contato_list.php?orga_id=".$_REQUEST["orga_id"]);

?>