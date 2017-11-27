<? include_once("struct/struct_top.php")?>
<?
include_once('../classes/class.evento.php');
include_once('../classes/service.evento.php');

$eventoService = new EventoService();
$eventoList = $eventoService->listEventosConfigurados();

?>
<div class="structTitle">Listar Eventos Captados</div>

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
    <td class="gridHeader">Local</td>
    <td class="gridHeader">Data Início</td>
	<td class="gridHeader" width="2%">&nbsp;</td>
	<td class="gridHeader" width="2%">&nbsp;</td>
	<td class="gridHeader" width="2%">&nbsp;</td>
	<td class="gridHeader" width="2%">&nbsp;</td>
	<td class="gridHeader" width="2%">&nbsp;</td>
  </tr>
  </thead>
  <tbody>
  <? for ($i = 0; $i < count($eventoList); $i++) {
		/* @var $evento Evento */
		$evento = $eventoList[$i]; ?>
  <tr>
    <td class="gridLineEven">&nbsp;</td>
    <td class="gridLineEven"><?= $evento->getNOME() ?>&nbsp;</td>
    <td class="gridLineEven"><?= $evento->getLOCAL() ?>&nbsp;</td>
    <td class="gridLineEven"><?= date("d/m/Y",strtotime($evento->getINICIO())) ?>&nbsp;</td>
    <td class="gridLineEven"><a href="evento_captado_edit.php?id=<?= $evento->getID() ?>">Editar</a>&nbsp;</td>
    <td class="gridLineEven"><a href="evento_configuracao_edit.php?id=<?= $evento->getID() ?>">Configurar</a>&nbsp;</td>
    <td class="gridLineEven"><a href="evento_valores.php?even_id=<?= $evento->getID() ?>">Valores</a>&nbsp;</td>
    <td class="gridLineEven"><a href="evento_delete_xp.php?id=<?= $evento->getID() ?>" onclick="return confirm('Você tem certeza que deseja excluir?\n(essa operação não pode ser desfeita)')">Excluir</a></td>
    <td class="gridLineEven">&nbsp;</td>
  </tr>
  <? }; ?>
  </tbody>
</table>
</div>



<? include_once("struct/struct_bottom.php")?>