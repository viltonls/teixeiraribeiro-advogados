<? include_once("struct/struct_top.php")?>
<?
include_once('../classes/class.organizacao.php');
include_once('../classes/service.organizacao.php');
$organizacao = new Organizacao();

/* Tratamento de Erro */
if ($_REQUEST['id']) {
	$organizacaoService = new OrganizacaoService();
	$organizacao = $organizacaoService->loadOrganizacaoById($_REQUEST['id']);
	if (!$organizacao->getID()) {
		echo "<span class='structFilter'>";
		echo "Erro: Organização não encontrada no BD.<br>";
		break;
		echo "</span>";
	}
}

?>

<script Language="JavaScript">

function validateForm(theForm)
{
  if (!validRequired(theForm.nome,"Nome"))
    return false;
  if (!validCNPJ(theForm.cnpj,"CNPJ",false))
    return false;
  return true;
}
</script>


<div class="structTitle">Editar Organização</div>

<div style="padding-top:8px;"></div>

<form action="organizacao_edit_xp.php" method="POST" class="form.nospace" onsubmit="return validateForm(this)">
<input type="hidden" name="id" value="<?= $organizacao->getID() ?>">
<table border="0" cellpadding="0" cellspacing="0" width="100%">
<tr>
	<td width="50%" valign="top">
		<table border="0" cellpadding="2" cellspacing="0">
		<tr>
			<td class="structFilter" width="30%">Nome</td>
			<td class="structFilter"><input type="edit" class="structFilterBox" name="nome" value="<?= $organizacao->getNOME()?>" size="40" maxlength="100"></td>
		</tr>
		<tr>
			<td class="structFilter">Site</td>
			<td class="structFilter">http:// <input type="edit" class="structFilterBox" name="site" value="<?= $organizacao->getSITE()?>" size="30" maxlength="100"></td>
		</tr>
		<tr>
			<td class="structFilter">Telefone</td>
			<td class="structFilter"><input type="edit" class="structFilterBox" name="fone" value="<?= $organizacao->getFONE()?>" size="20" maxlength="20"></td>
		</tr>
		<tr>
			<td class="structFilter">Fax</td>
			<td class="structFilter"><input type="edit" class="structFilterBox" name="fax" value="<?= $organizacao->getFAX()?>" size="20" maxlength="20"></td>
		</tr>
		<tr>
			<td class="structFilter">Razão Social</td>
			<td class="structFilter"><input type="edit" class="structFilterBox" name="razao" value="<?= $organizacao->getRAZAO()?>" size="40" maxlength="50"></td>
		</tr>
		<tr>
			<td class="structFilter">CNPJ</td>
			<td class="structFilter"><input type="edit" class="structFilterBox" name="cnpj" value="<?= $organizacao->getCNPJ()?>" size="19" maxlength="18" onkeypress="return txtBoxFormat(this.form, 'cnpj', '99.999.999/9999-99', event);"></td>
		</tr>
		<tr>
			<td class="structFilter">Inscrição Estadual</td>
			<td class="structFilter"><input type="edit" class="structFilterBox" name="ie" value="<?= $organizacao->getIE()?>" size="10" maxlength="20"></td>
		</tr>
		<tr>
			<td class="structFilter">Inscrição Municipal</td>
			<td class="structFilter"><input type="edit" class="structFilterBox" name="im" value="<?= $organizacao->getIM()?>" size="10" maxlength="20"></td>
		</tr>
		</table>
	</td>
	<td valign="top">
		<table border="0" cellpadding="2" cellspacing="0">
		<tr>
			<td class="structFilter" colspan="2"><u>Dados de Endereço</u></td>
		</tr>
		<tr>
			<td class="structFilter">Endereço</td>
			<td class="structFilter"><input type="edit" class="structFilterBox" name="endereco" value="<?= $organizacao->getENDERECO()?>" size="40" maxlength="100"></td>
		</tr>
		<tr>
			<td class="structFilter">Bairro</td>
			<td class="structFilter"><input type="edit" class="structFilterBox" name="bairro" value="<?= $organizacao->getBAIRRO()?>" size="40" maxlength="100"></td>
		</tr>
		<tr>
			<td class="structFilter">Cidade</td>
			<td class="structFilter"><input type="edit" class="structFilterBox" name="cidade" value="<?= $organizacao->getCIDADE()?>" size="40" maxlength="100"></td>
		</tr>
		<tr>
			<td class="structFilter">CEP</td>
			<td class="structFilter"><input type="edit" class="structFilterBox" name="cep" value="<?= $organizacao->getCEP()?>" size="20" maxlength="20"></td>
		</tr>
		<tr>
			<td class="structFilter">Estado</td>
			<td class="structFilter"><input type="edit" class="structFilterBox" name="estado" value="<?= $organizacao->getESTADO()?>" size="40" maxlength="100"></td>
		</tr>
		<tr>
			<td class="structFilter">País</td>
			<td class="structFilter"><input type="edit" class="structFilterBox" name="pais" value="<?= $organizacao->getPAIS()?>" size="40" maxlength="100"></td>
		</tr>
		</table>
	</td>
</tr>
<tr>
	<td colspan="2" valign="top">
		<table border="0" cellpadding="2" cellspacing="0">
		<tr>
			<td class="structFilter" width="15%">Observações</td>
			<td class="structFilter"><textarea class="structFilterBox" name="obs" rows="5" cols="120"><?= $organizacao->getOBS()?></textarea></td>
		</tr>
		<tr>
			<td class="structFilter">&nbsp;&nbsp;&nbsp;</td>
			<td class="structFilter"><input type="submit" class="structFilterButton" value="Salvar"></td>
		</tr>
		</table>
	</td>
</tr>

</table>
</form>

<? include_once("struct/struct_bottom.php")?>