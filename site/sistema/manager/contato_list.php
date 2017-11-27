<? include_once("struct/struct_top.php")?>
<?
include_once('../classes/class.contato.php');
include_once('../classes/service.contato.php');
include_once('../classes/class.usuario.php');
include_once('../classes/service.usuario.php');

if ($_REQUEST["orga_id"]) {

$contatoService = new ContatoService();
$contatoList = $contatoService->listContatosByOrganizacao($_REQUEST["orga_id"]);

?>
<span class="structTitle">Listar Contatos</span> (<a href="contato_edit.php?orga_id=<?=$_REQUEST["orga_id"]?>">Novo Contato</a>)

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
    <td class="gridHeader">Data</td>
    <td class="gridHeader">Forma</td>
    <td class="gridHeader">Responsável Office</td>
    <td class="gridHeader">Descrição</td>
	<td class="gridHeader" width="2%">&nbsp;</td>
	<td class="gridHeader" width="2%">&nbsp;</td>
	<td class="gridHeader" width="2%">&nbsp;</td>
  </tr>
  </thead>
  <tbody>
  <? for ($i = 0; $i < count($contatoList); $i++) {
		/* @var $contato Contato */
		$contato = $contatoList[$i]; ?>
  <tr>
    <td class="gridLineEven">&nbsp;</td>
    <td class="gridLineEven"><?= date("d/m/Y",strtotime($contato->getDATA())) ?>&nbsp;</td>
    <td class="gridLineEven">
		<?= ($contato->getTIPO()=="r") ? "Reunião" : "";?>
		<?= ($contato->getTIPO()=="t") ? "Telefone" : "";?>
		<?= ($contato->getTIPO()=="e") ? "Email" : "";?>
		<?= ($contato->getTIPO()=="o") ? "Outro" : "";?>
    </td>
    <td class="gridLineEven">
    	<? $usuarioService = new UsuarioService();
    	   $usuario = $usuarioService->loadUsuarioById($contato->getUSUA_ID());
    	   echo $usuario->getNOME();
    	?>
    	&nbsp;
    </td>
    <td class="gridLineEven"><?
    	 echo substr(str_replace("\n"," ",$contato->getOBS()),0,50);
    	 if (strlen($contato->getOBS()) >= 50) {
    	 	echo "(...)";
    	 }
    	 
    	  ?>
    	 &nbsp;
    </td>
    <td class="gridLineEven"><a href="contato_edit.php?id=<?= $contato->getID() ?>">Editar</a>&nbsp;</td>
    <td class="gridLineEven"><a href="contato_delete_xp.php?id=<?= $contato->getID() ?>&orga_id=<?= $contato->getORGA_ID()?>" onclick="return confirm('Você tem certeza que deseja excluir?\n(essa operação não pode ser desfeita)')">Excluir</a></td>
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