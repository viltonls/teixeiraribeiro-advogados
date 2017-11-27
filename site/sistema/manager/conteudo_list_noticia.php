<? include_once("struct_top.php")?>
<?
include_once('../classes/class.conteudo.php');
include_once('../classes/service.conteudo.php');

$idioma = $_REQUEST["idioma"];

$conteudoService = new ConteudoService();
$conteudo = new Conteudo();
$conteudoList = $conteudoService->listConteudoFiltrado($conteudo->TIPO_NOTICIA,0,$idioma,"Id ASC");

?>
<span class="structTitle">Listar Notícias</span> (<a href="conteudo_edit_noticia.php?idioma=<?=$idioma?>">Inserir Notícia</a>)

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
    <td class="gridHeader">Título</td>
    <td class="gridHeader">Data</td>
    <td class="gridHeader">Status</td>
	<td class="gridHeader" width="2%">&nbsp;</td>
	<td class="gridHeader" width="2%">&nbsp;</td>
	<td class="gridHeader" width="2%">&nbsp;</td>
  </tr>
  </thead>
  <tbody>
  <? for ($i = 0; $i < count($conteudoList); $i++) {
		/* @var $conteudo Conteudo */
		$conteudo = $conteudoList[$i]; ?>
  <tr>
    <td class="gridLineEven">&nbsp;</td>
    <td class="gridLineEven"><?= $conteudo->getTitulo() ?>&nbsp;</td>
    <td class="gridLineEven"><?= date("d/m/Y",strtotime($conteudo->getData())) ?>&nbsp;</td>
    <td class="gridLineEven">
		<?= ($conteudo->getStatus()==2) ? "Ativo" : "";?>
		<?= ($conteudo->getStatus()==1) ? "Inativo" : "";?>
    </td>
    <td class="gridLineEven"><a href="conteudo_edit_noticia.php?id=<?= $conteudo->getId() ?>&idioma=<?= $conteudo->getIdioma() ?>">Editar</a>&nbsp;</td>
    <td class="gridLineEven"><a href="conteudo_delete_xp.php?id=<?= $conteudo->getId() ?>&redirect=conteudo_noticia_list.php" onclick="return confirm('Você tem certeza que deseja excluir?\n(essa operação não pode ser desfeita)')">Excluir</a></td>
    <td class="gridLineEven">&nbsp;</td>
  </tr>
  <? }; ?>
  </tbody>
</table>
</div>



<? include_once("struct_bottom.php")?>