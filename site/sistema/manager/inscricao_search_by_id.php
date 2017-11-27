<? include_once("struct/auth.php");

if (!session_is_registered("evento")) { 
	header("Location: session_seleciona_evento.php?url=inscricao_search_by_id.php&orga_id=0&configurado=1");
} else {

include_once('../classes/class.inscricao.php');
include_once('../classes/service.inscricao.php');

/* @var $eventoAtual Evento */
$inscricaoService = new InscricaoService();
$inscricao = new Inscricao();
if ($_REQUEST["insc_id"]) {
	$inscricao = $inscricaoService->loadInscricaoById($_REQUEST["insc_id"],$eventoAtual->getID());
} else if ($_REQUEST["insc_id_externo"]) {
	$inscricaoId = $inscricaoService->loadInscricaoByIdExterno($eventoAtual->getID(),$_REQUEST["insc_id_externo"]);
	if ($inscricaoId) {
		$inscricao = $inscricaoService->loadInscricaoById($inscricaoId,$eventoAtual->getID());
	};
}

if ($inscricao->getID() != null) {
	header("Location: inscricao_simples_view.php?id=".$inscricao->getID());
} else {

include_once("struct/struct_top.php");
		
?>
<div class="structTitle">Buscar Inscrição pelo ID do Evento "<?=$eventoAtual->getNOME()?>"</div>

<div style="padding-top:8px;"></div>

<form action="inscricao_search_by_id.php" method="POST">
<table border="0" cellpadding="2" cellspacing="0">
<tr>
	<td class="structFilter">Buscar ID:</td>
	<td class="structFilter"><input type="edit" name="insc_id" class="structFilterBox" value="<?=$_REQUEST["insc_id"];?>"></td>
	<td class="structFilter">&nbsp;&nbsp;&nbsp;</td>
	<td class="structFilter"><input type="submit" class="structFilterButton" value="Aplicar"></td>
</tr>
<tr>
	<td class="structFilter">Buscar ID Externo:</td>
	<td class="structFilter"><input type="edit" name="insc_id_externo" class="structFilterBox" value="<?=$_REQUEST["insc_id_externo"];?>"></td>
	<td class="structFilter">&nbsp;&nbsp;&nbsp;</td>
	<td class="structFilter"><input type="submit" class="structFilterButton" value="Aplicar"></td>
</tr>
</table>
</form>

<? if ($_REQUEST["insc_id"]) { ?>
<div class="main">
	Inscrição de ID "<?=$_REQUEST["insc_id"]?>" não encontrada neste evento.
</div>
<? } else if ($_REQUEST["insc_id_externo"]) { ?>
<div class="main">
	Inscrição de ID Externo "<?=$_REQUEST["insc_id_externo"]?>" não encontrada neste evento.
</div>
<? } ?>

<div style="padding-top:8px;"></div>


</div>



<? include_once("struct/struct_bottom.php")?>
<? } // if ($inscricao)?>
<? } ?>