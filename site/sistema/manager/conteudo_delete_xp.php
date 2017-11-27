<?
include_once("auth.php");
include_once('../classes/class.conteudo.php');
include_once('../classes/service.conteudo.php');

$conteudo = new Conteudo();

if ($_REQUEST["id"]) {
	$conteudo->delete($_REQUEST["id"]);
} else {
	echo "<span class='structFilter'>";
	echo "Erro: Conteúdo não encontrado no BD.<br>";
	break;
	echo "</span>";
}

header("Location: ".$_REQUEST["redirect"]."?site=".$conteudo->getSite());

?>