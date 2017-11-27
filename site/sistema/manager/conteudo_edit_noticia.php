<? include_once("struct_top.php")?>
<?
include_once('../classes/class.conteudo.php');
include_once('../classes/service.conteudo.php');
$conteudo = new Conteudo();

/* Tratamento de Erro */
if ($_REQUEST['id']) {
	$conteudoService = new ConteudoService();
	$conteudo = $conteudoService->loadConteudoById($_REQUEST['id']);
	if (!$conteudo->getID()) {
		echo "<span class='structField'>";
		echo "Erro: Conteúdo não encontrada no BD.<br>";
		break;
		echo "</span>";
	}
}

?>

<script Language="JavaScript">

function validateForm(theForm)
{
  if (!validRequired(theForm.titulo,"Título"))
    return false;
  return true;
}
</script>


<div class="structTitle">Editar Notícia</div>

<div style="padding-top:8px;"></div>

<form action="conteudo_edit_xp.php" method="POST" onsubmit="return validateForm(this)" enctype="multipart/form-data">
<input type="hidden" name="id" value="<?= $conteudo->getId() ?>">
<input type="hidden" name="tipo" value="<?= $conteudo->TIPO_NOTICIA ?>">
<input type="hidden" name="idioma" value="<?= $_REQUEST["idioma"] ?>">
<input type="hidden" name="redirect" value="conteudo_list_noticia.php">
<table border="0" cellpadding="0" cellspacing="0" width="100%">
<tr>
	<td width="50%" valign="top">
		<table border="0" cellpadding="2" cellspacing="0">
		<tr>
			<td class="structField" width="10%">Título</td>
			<td class="structField"><input type="edit" class="structFieldBox" name="titulo" value="<?= $conteudo->getTitulo()?>" size="100" maxlength="200"></td>
		</tr>
		<tr>
			<td class="structField">Corpo</td>
			<td class="structField"><textarea class="structFieldBox" name="corpo" rows="10" cols="100"><?= $conteudo->getCorpo()?></textarea></td>
		</tr>
		<tr>
			<td class="structField">Link</td>
			<td class="structField">http:// <input type="edit" class="structFieldBox" name="link" value="<?= $conteudo->getLink()?>" size="50" maxlength="200"></td>
		</tr>
		<tr>
			<td class="structField">Status</td>
			<td class="structField">
				<select class="structFieldBox" name="status">
					<option value="2" <?= ($conteudo->getStatus()==2) ? "selected" : "";?>> Ativo</option>
					<option value="1" <?= ($conteudo->getStatus()==1) ? "selected" : "";?>> Inativo</option>
				</select>
			</td>
		</tr>
		<tr>
			<td class="structField" width="10%">Data</td>
			<td class="structField"><input type="edit" class="structFieldBox" name="data" value="<? if ($conteudo->getData() != "0000-00-00 00:00:00" && $conteudo->getData() != "") echo date("d/m/Y",strtotime($conteudo->getData()))?>" size="10" maxlength="10"> dd/mm/aaaa</td>
		</tr>
		<tr>
		    <td valign="top" class="structField">Imagem A</td>
		    <td valign="top">
		      <input type="file" name="imagem_a" class="structFieldBox">
		    </td>
		</tr>
		<? if ($conteudo->getImagemA() && $conteudo->getImagemA() != "") {?>
		<tr>
		    <td valign="top" class="structField">Imagem A - Atual</td>
		    <td valign="top">
				<img src="../images/<?=$conteudo->getId()?>_a.<?=$conteudo->getImagemA()?>" border="0">
		    </td>
		</tr>
		<? } ?>
		<tr>
		    <td valign="top" class="structField">Imagem B</td>
		    <td valign="top">
		      <input type="file" name="imagem_b" class="structFieldBox">
		    </td>
		</tr>
		<? if ($conteudo->getImagemB() && $conteudo->getImagemB() != "") {?>
		<tr>
		    <td valign="top" class="structField">Imagem B - Atual</td>
		    <td valign="top">
				<img src="../images/<?=$conteudo->getId()?>_b.<?=$conteudo->getImagemB()?>" border="0">
		    </td>
		</tr>
		<? } ?>
		<tr>
		    <td valign="top" class="structField">Imagem C</td>
		    <td valign="top">
		      <input type="file" name="imagem_c" class="structFieldBox">
		    </td>
		</tr>
		<? if ($conteudo->getImagemC() && $conteudo->getImagemC() != "") {?>
		<tr>
		    <td valign="top" class="structField">Imagem C - Atual</td>
		    <td valign="top">
				<img src="../images/<?=$conteudo->getId()?>_c.<?=$conteudo->getImagemC()?>" border="0">
		    </td>
		</tr>
		<? } ?>
		<tr>
		    <td valign="top" class="structField">Imagem D</td>
		    <td valign="top">
		      <input type="file" name="imagem_d" class="structFieldBox">
		    </td>
		</tr>
		<? if ($conteudo->getImagemD() && $conteudo->getImagemD() != "") {?>
		<tr>
		    <td valign="top" class="structField">Imagem D - Atual</td>
		    <td valign="top">
				<img src="../images/<?=$conteudo->getId()?>_d.<?=$conteudo->getImagemD()?>" border="0">
		    </td>
		</tr>
		<? } ?>
		<tr>
		    <td valign="top" class="structField">Imagem E</td>
		    <td valign="top">
		      <input type="file" name="imagem_e" class="structFieldBox">
		    </td>
		</tr>
		<? if ($conteudo->getImagemE() && $conteudo->getImagemE() != "") {?>
		<tr>
		    <td valign="top" class="structField">Imagem E - Atual</td>
		    <td valign="top">
				<img src="../images/<?=$conteudo->getId()?>_e.<?=$conteudo->getImagemE()?>" border="0">
		    </td>
		</tr>
		<? } ?>
		<tr>
			<td class="structField">&nbsp;&nbsp;&nbsp;</td>
			<td class="structField"><input type="submit" class="structFieldButton" value="Salvar"></td>
		</tr>
		</table>
	</td>
</tr>

</table>
</form>

<? include_once("struct_bottom.php")?>