<? include_once("struct/struct_top.php")?>
<?
include_once('../classes/class.pessoa.php');
include_once('../classes/service.pessoa.php');

if ($_REQUEST["orga_id"]) {

$pessoaService = new PessoaService();
$pessoaList = $pessoaService->listPessoasByOrganizacao($_REQUEST["orga_id"]);

?>
<span class="structTitle">Listar Pessoas</span> (<a href="pessoa_edit.php?orga_id=<?=$_REQUEST["orga_id"]?>">Nova Pessoa</a>)

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
    <td class="gridHeader">Fone</td>
	<td class="gridHeader" width="2%">&nbsp;</td>
	<td class="gridHeader" width="2%">&nbsp;</td>
	<td class="gridHeader" width="2%">&nbsp;</td>
  </tr>
  </thead>
  <tbody>
  <? for ($i = 0; $i < count($pessoaList); $i++) {
		/* @var $pessoa Pessoa */
		$pessoa = $pessoaList[$i]; ?>
  <tr>
    <td class="gridLineEven">&nbsp;</td>
    <td class="gridLineEven"><?= $pessoa->getNOME() ?>&nbsp;</td>
    <td class="gridLineEven"><?= $pessoa->getEMAIL() ?>&nbsp;</td>
    <td class="gridLineEven"><?= $pessoa->getFONE() ?>&nbsp;</td>
    <td class="gridLineEven"><a href="pessoa_edit.php?id=<?= $pessoa->getID() ?>">Editar</a>&nbsp;</td>
    <td class="gridLineEven"><a href="pessoa_delete_xp.php?id=<?= $pessoa->getID() ?>&orga_id=<?= $pessoa->getORGA_ID()?>" onclick="return confirm('Você tem certeza que deseja excluir?\n(essa operação não pode ser desfeita)')">Excluir</a></td>
    <td class="gridLineEven">&nbsp;</td>
  </tr>
  <? }; ?>
  </tbody>
</table>
</div>

</form>
<? } else { ?>
	Erro: não foi informada a organização.
	
<? } ?>
<? include_once("struct/struct_bottom.php")?>