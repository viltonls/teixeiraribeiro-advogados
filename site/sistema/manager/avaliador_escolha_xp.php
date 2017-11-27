<? include("struct/auth.php"); ?>
<?
include_once('../classes/class.avaliacao.php');
include_once('../classes/service.avaliacao.php');
include_once('../classes/class.trabalho.php');
include_once('../classes/service.trabalho.php');

$avaliacao = new Avaliacao();
$trabalhoService = new TrabalhoService();

$trab_id = $_REQUEST["trab_id"];
$aval_id = $_REQUEST["aval_id"];



/* @var $eventoAtual Evento */

// Se é uma edição, preenche o objeto com dados do BD
if ($trab_id && $aval_id) {
	$avaliacao->setAVAL_ID($aval_id);
	$avaliacao->setTRAB_ID($trab_id);
	
	$data = date("Y-m-d H:i:s",mktime(date('H'),date('i'),date('s'),date('m'),date('d'),date('Y'))); // agora
	$avaliacao->setDATA_ATRIBUIDO($data);
	
	$avaliacao->setSTATUS($avaliacao->STATUS_NOVO);
	
	$avaliacao->insert();

	$trabalho = $trabalhoService->loadTrabalhoById($trab_id,$eventoAtual->getID());
	if ($trabalho->getID() && $trabalho->getSTATUS() == $trabalho->STATUS_NOVO) {
		$trabalho->setSTATUS($trabalho->STATUS_EM_REVISAO);
		$trabalho->save();
	}
	
	header("Location: trabalho_avaliacao_list.php?trab_id=".$trab_id);
	
 } else {
		echo "Operação não autorizada.";
 }

?>