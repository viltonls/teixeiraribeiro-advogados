<?
include_once('../classes/class.usuario.php');
include_once('../classes/dto.usuario_evento.php');
include_once('../classes/service.usuario.php');

include_once("struct/struct_top.php");

$usuarioService = new UsuarioService();
$usuarioSearchList = $usuarioService->listUsuariosFiltered("","","","");

?>
<div class="structTitle">Listar Usuários</div>

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
    <td class="gridHeader">Login</td>
    <td class="gridHeader" width="2%">&nbsp;</td>
	<td class="gridHeader" width="2%">&nbsp;</td>
	<td class="gridHeader" width="2%">&nbsp;</td>
  </tr>
  </thead>
  <tbody>
  <? for ($i = 0; $i < count($usuarioSearchList); $i++) {
		/* @var $usuarioSearch UsuarioEventoDTO */
		$usuarioSearch = $usuarioSearchList[$i]; ?>
  <tr>
    <td class="gridLineEven">&nbsp;</td>
    <td class="gridLineEven"><?= $usuarioSearch->getNOME() ?>&nbsp;</td>
    <td class="gridLineEven"><?= $usuarioSearch->getLOGIN() ?>&nbsp;</td>
    <td class="gridLineEven"><a href="usuario_edit.php?id=<?= $usuarioSearch->getID() ?>&orga_id=<?= $usuarioSearch->getORGA_ID() ?>">Editar</a>&nbsp;</td>
    <td class="gridLineEven"><a href="usuario_delete_xp.php?id=<?= $usuarioSearch->getID() ?>" onclick="return confirm('Voc? tem certeza que deseja excluir?\n(essa opera??o n?o pode ser desfeita)')">Excluir</a></td>
    <td class="gridLineEven">&nbsp;</td>
  </tr>
  <? }; ?>
  </tbody>
</table>
</div>



<? include_once("struct/struct_bottom.php")?>