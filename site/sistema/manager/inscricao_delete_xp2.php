<? include_once("struct/auth.php")?>
<?
include_once('../classes/class.inscricao.php');
include_once('../classes/service.inscricao.php');

$inscricao = new Inscricao();

if ($_REQUEST["insc_id"]) {
	//$inscricao->delete($_REQUEST["insc_id"],$eventoAtual->getID());
	$inscricao->select($_REQUEST["insc_id"],$eventoAtual->getID());
	$inscricao->setSTATUS("x");
	$inscricao->save();
} else {
	echo "<span class='structFilter'>";
	echo "Erro: Inscrição não encontrada no BD.<br>";
	break;
	echo "</span>";
}

header("Location: inscricao_list.php");

?>