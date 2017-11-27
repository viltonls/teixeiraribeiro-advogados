<? include_once("struct/struct_top.php")?>
<?
include_once('../classes/class.organizacao.php');
include_once('../classes/service.organizacao.php');

$organizacaoService = new OrganizacaoService();
$organizacaoList = $organizacaoService->listOrganizacoes();

?>
<div class="structTitle">Listar Organizações</div>

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
	<td class="gridHeader" width="2%">&nbsp;</td>
	<td class="gridHeader" width="2%">&nbsp;</td>
	<td class="gridHeader" width="2%">&nbsp;</td>
	<td class="gridHeader" width="2%">&nbsp;</td>
	<td class="gridHeader" width="2%">&nbsp;</td>
  </tr>
  </thead>
  <tbody>
  <? for ($i = 0; $i < count($organizacaoList); $i++) {
		/* @var $organizacao Organizacao */
		$organizacao = $organizacaoList[$i]; ?>
  <tr>
    <td class="gridLineEven">&nbsp;</td>
    <td class="gridLineEven"><?= $organizacao->getNOME() ?>&nbsp;</td>
    <td class="gridLineEven"><a href="pessoa_list.php?orga_id=<?= $organizacao->getID() ?>">Pessoas</a>&nbsp;</td>
    <td class="gridLineEven"><a href="contato_list.php?orga_id=<?= $organizacao->getID() ?>">Contatos</a>&nbsp;</td>
    <td class="gridLineEven"><a href="organizacao_edit.php?id=<?= $organizacao->getID() ?>">Editar</a>&nbsp;</td>
    <td class="gridLineEven"><a href="organizacao_delete_xp.php?id=<?= $organizacao->getID() ?>" onclick="return confirm('Você tem certeza que deseja excluir?\n(essa operação não pode ser desfeita)')">Excluir</a></td>
    <td class="gridLineEven">&nbsp;</td>
  </tr>
  <? }; ?>
  </tbody>
</table>
</div>



<? include_once("struct/struct_bottom.php")?>