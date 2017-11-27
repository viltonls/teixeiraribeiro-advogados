<? include_once("struct/auth.php")?>
<?
if (!session_is_registered("evento")) { 
	header("Location: session_seleciona_evento.php?url=avaliador_list.php");
} else {

include_once("struct/struct_top.php");
	
include_once('../classes/class.avaliador.php');
include_once('../classes/service.avaliador.php');

$trab_id = $_REQUEST["trab_id"];

$avaliadorService = new AvaliadorService();
$avaliadorList = $avaliadorService->listAvaliadoresByEvento($eventoAtual->getID(),"NOME ASC");

?>
<div class="structTitle">Listar Avaliadores do Evento "<?=$eventoAtual->getNOME()?>"</div>

<div style="padding-top:8px;"></div>

<!--
<table border="0" cellpadding="2" cellspacing="0">
<tr>
	<td class="structFilter">Filtar por:</td>
	<td class="structFilter">&nbsp;&nbsp;&nbsp;</td>
	<td class="structFilter">Nome</td>
	<td class="structFilter"><input type="edit" class="structFilterBox"></td>
	<td class="structFilter">&nbsp;&nbsp;&nbsp;</td>
	<td class="structFilter">Status</td>
	<td class="structFilter"><select class="structFilterBox" name="status"><option value=""></option><option value="">Vendido</option></select></td>
	<td class="structFilter">&nbsp;&nbsp;&nbsp;</td>
	<td class="structFilter"><input type="submit" class="structFilterButton" value="Aplicar"></td>
</tr>
</table>

<div style="padding-top:8px;"></div>
-->

<!-- Grid de Listagem -->
<div class="gridContainer" id="tC" style="height:300px; width:100%;border:solid 1px #303030">
<table border="0" cellspacing="0" cellpadding="0" width="100%">
  <thead class="gridHeader">
  <tr class="gridHeader" style="top:expression(document.getElementById('tC').scrollTop);">
	<!--td class="gridHeader" width="2%">&nbsp;</td-->

	<td class="gridHeader" width="2%">&nbsp;</td>
    <td class="gridHeader">Nome</td>
    <td class="gridHeader">Email</td>
    <td class="gridHeader">Telefone</td>
    <td class="gridHeader">Celular</td>
    <td class="gridHeader">Status</td>
	<td class="gridHeader" width="2%">&nbsp;</td>
	<td class="gridHeader" width="2%">&nbsp;</td>
  </tr>
  </thead>
  <tbody>
  <? for ($i = 0; $i < count($avaliadorList); $i++) {
		/* @var $avaliador Avaliador */
		$avaliador = $avaliadorList[$i]; ?>
  <tr>
    <td class="gridLineEven">&nbsp;</td>
    <td class="gridLineEven"><?= $avaliador->getNOME() ?>&nbsp;</td>
    <td class="gridLineEven"><?= $avaliador->getLOGIN() ?>&nbsp;</td>
    <td class="gridLineEven"><?= $avaliador->getTELEFONE() ?>&nbsp;</td>
    <td class="gridLineEven"><?= $avaliador->getCELULAR() ?>&nbsp;</td>
    <td class="gridLineEven">
		<?= ($avaliador->getSTATUS()=="1") ? "Ativo" : "";?>
		<?= ($avaliador->getSTATUS()=="2") ? "Inativo" : "";?>
    </td>
    <td class="gridLineEven" nowrap><a href="avaliador_escolha_xp.php?aval_id=<?= $avaliador->getID() ?>&trab_id=<?=$trab_id?>">Vincular Avaliador</a>&nbsp;</td>
    <td class="gridLineEven">&nbsp;</td>
  </tr>
  <? }; ?>
  </tbody>
</table>
</div>



<? include_once("struct/struct_bottom.php")?>
<? } ?>