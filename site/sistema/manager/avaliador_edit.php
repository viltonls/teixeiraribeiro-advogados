<? include_once("struct/struct_top.php")?>
<?
include_once('../classes/class.avaliador.php');
include_once('../classes/service.avaliador.php');

$avaliador = new Avaliador();

/* Tratamento de Erro */

if ($_REQUEST['id']) {
	$avaliadorService = new AvaliadorService();
	$avaliador = $avaliadorService->loadAvaliadorById($_REQUEST['id']);
	if (!$avaliador->getID()) {
		echo "<span class='structFilter'>";
		echo "Erro: Avaliador não encontrado no BD.<br>";
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
  if (!validEmail(theForm.login,"E-Mail",true))
    return false;
  if (document.getElementById("id").value == "" && !validRequired(theForm.senha,"Senha"))
    return false;
 
  if (theForm.senha.value != theForm.senha_confirma.value) {
  	alert('"Senha" e "Confirma Senha" não conferem.');
  	theForm.senha.value = '';
  	theForm.senha_confirma.value = '';
  	theForm.senha.focus();
  	return false;
  }
  return true;
}
</script>




<div class="structTitle">Editar Avaliador</div>

<div style="padding-top:8px;"></div>

<form name="theForm" action="avaliador_edit_xp.php" method="POST" class="form.nospace" onsubmit="return validateForm(this)">
<input type="hidden" name="id" id="id" value="<?= $avaliador->getID() ?>">
<input type="hidden" name="even_id" value="<?= $eventoAtual->getID() ?>">
<table border="0" cellpadding="0" cellspacing="0" width="100%">
<tr>
	<td width="50%" valign="top">
		<table cellpadding="2" cellspacing="2" border="0">
		<tr>
			<td class="structFilter">Nome </td>
			<td class="structFilter"><input type="edit" class="structFilterBox" name="nome" value="<?= $avaliador->getNOME()?>" size="50" maxlength="200"></td>
		</tr>
		<tr>
			<td class="structFilter">E-Mail</td>
			<td class="structFilter">
			  <input type="edit" class="structFilterBox" name="login" value="<?= $avaliador->getLOGIN()?>" onKeyUp="javascript:setLowerCase(this);" size="50" maxlength="100">
			</td>
		</tr>
		<tr>
			<td class="structFilter">Telefone</td>
			<td class="structFilter"><input type="edit" class="structFilterBox" name="telefone" value="<?= $avaliador->getTELEFONE()?>" size="13" maxlength="13" onkeypress="return txtBoxFormat(this.form, 'telefone', '(99)9999-9999', event);"></td>
		</tr>
		<? if($eventoAtual->getID() == 23){ ?>
		<tr>
			<td class="structFilter">Area</td>
			<td class="structFilter">
			<select class="structFilterBox" name="celular">
					<option value="1" <?= ($avaliador->getCELULAR()=="1") ? "selected" : "";?>>Neonatologia e Pediatria</option>
					<option value="2" <?= ($avaliador->getCELULAR()=="2") ? "selected" : "";?>>Fisioterapia em Terapia Intensiva</option>
			<option value="3" <?= ($avaliador->getCELULAR()=="3") ? "selected" : "";?>>Fisioterapia em Cardiologia</option>
			<option value="4" <?= ($avaliador->getCELULAR()=="4") ? "selected" : "";?>>Fisioterapia em Pneumopatias</option>
			<option value="5" <?= ($avaliador->getCELULAR()=="5") ? "selected" : "";?>>Recondicionamento Físico nas doenças crônicas</option>
			<option value="6" <?= ($avaliador->getCELULAR()=="6") ? "selected" : "";?>>Fisioterapia Cardiorrespiratória no pré e pós-operatório</option>
			<option value="7" <?= ($avaliador->getCELULAR()=="7") ? "selected" : "";?>>Saúde Coletiva</option>
			<option value="8" <?= ($avaliador->getCELULAR()=="8") ? "selected" : "";?>>Outros</option>
				</select>
			
			</td>
		</tr>
		<? }else{?>
		<tr>
			<td class="structFilter">Celular</td>
			<td class="structFilter"><input type="edit" class="structFilterBox" name="celular" value="<?= $avaliador->getCELULAR()?>" size="13" maxlength="13" onkeypress="return txtBoxFormat(this.form, 'celular', '(99)9999-9999', event);"></td>
		</tr>
		<tr>
		
      <? }?>
			<td class="structFilter">Senha</td>
			<td class="structFilter"><input type="password" class="structFilterBox" name="senha" id="senha" value="" size="20" maxlength="50"> [<a href="#" class="main" onclick="generatePassword(8, document.theForm.senha);document.getElementById('senha_confirma').value=document.getElementById('senha').value;">Gerar Senha</a>]</td>
		</tr>
		<tr>
			<td class="structFilter">Senha (Confirmar)</td>
			<td class="structFilter"><input type="password" class="structFilterBox" name="senha_confirma" id="senha_confirma" value="" size="20" maxlength="50"></td>
		</tr>
		<tr>
			<td class="structFilter">Status</td>
			<td class="structFilter">
				<select class="structFilterBox" name="status">
					<option value="1" <?= ($avaliador->getSTATUS()=="1") ? "selected" : "";?>>Ativo</option>
					<option value="2" <?= ($avaliador->getSTATUS()=="2") ? "selected" : "";?>>Inativo</option>
				</select>
			</td>
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


