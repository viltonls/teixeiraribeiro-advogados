<? include_once("struct/struct_top.php")?>
<?
include_once('../classes/class.usuario.php');
include_once('../classes/service.usuario.php');
include_once('../classes/class.organizacao.php');
include_once('../classes/service.organizacao.php');
include_once('../classes/class.evento.php');
include_once('../classes/service.evento.php');

$usuario = new Usuario();

/* Tratamento de Erro */
if ($_REQUEST['id']) {
	$usuarioService = new UsuarioService();
	$usuario = $usuarioService->loadUsuarioById($_REQUEST['id']);
	if (!$usuario->getID()) {
		echo "<span class='structFilter'>";
		echo "Erro: Usuário não encontrado no BD.<br>";
		break;
		echo "</span>";
	} else {
		$orga_id = $_REQUEST['orga_id'];
		$even_id = $usuario->getEVEN_ID();
	}
} else if ($_REQUEST['orga_id']) {
// Se é novo contato
	$orga_id = $_REQUEST['orga_id'];
	$even_id = $_REQUEST['even_id'];
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


<div class="structTitle">Editar Usuário</div>

<div style="padding-top:8px;"></div>

<form name="theForm" action="usuario_edit_xp.php" method="POST" class="form.nospace" onsubmit="return validateForm(this)">
<input type="hidden" name="id" id="id" value="<?= $usuario->getID() ?>">
<table border="0" cellpadding="2" cellspacing="0">
<tr>
	<td class="structFilter" width="27%"></td>
	<td width="73%" class="structFilter">
	<input type="hidden" class="structFilterBox" name="orga_id" value="1" size="40" maxlength="50">
	<input type="hidden" class="structFilterBox" name="even_id" value="1" size="40" maxlength="50">	</td>
</tr>
<tr>
	<td class="structFilter">&nbsp;</td>
	<td class="structFilter">		</td>
</tr>	
<tr>
	<td class="structFilter" width="27%">Nome</td>
	<td class="structFilter"><input type="edit" class="structFilterBox" name="nome" value="<?= $usuario->getNOME()?>" size="40" maxlength="50"></td>
</tr>
<tr>
	<td class="structFilter">E-Mail</td>
	<td class="structFilter"><input type="edit" class="structFilterBox" name="login" value="<?= $usuario->getLOGIN()?>" onKeyUp="javascript:setLowerCase(this);" size="40" maxlength="50"></td>
</tr>
<tr>
	<td class="structFilter">Senha</td>
	<td class="structFilter"><input type="edit" class="structFilterBox" name="senha" id="senha" value="" size="20" maxlength="50"> [<a href="#" class="main" onclick="generatePassword(8, document.theForm.senha);document.getElementById('senha_confirma').value=document.getElementById('senha').value;">Gerar Senha</a>]</td>
</tr>
<tr>
	<td class="structFilter">Senha (Confirmar)</td>
	<td class="structFilter"><input type="edit" class="structFilterBox" name="senha_confirma" id="senha_confirma" value="" size="20" maxlength="50"></td>
</tr>
<td class="structFilter" colspan="2"><br><u>Permissões de Acesso por Módulo</u></td>
</tr>
<tr>
	<td class="structFilter">Escritório</td>
	<td class="structFilter">
		<select class="structFilterBox" name="escritorio">
			<option value="n" <?= ($usuario->getESCRITORIO()=="n") ? "selected" : "";?>>Nenhum acesso</option>
			<option value="t" <?= ($usuario->getESCRITORIO()=="t") ? "selected" : "";?>>Acesso Total</option>
		</select>
	</td>
</tr>

<tr>
	<td class="structFilter">Áreas</td>
	<td class="structFilter">
		<select class="structFilterBox" name="areas">
			<option value="n" <?= ($usuario->getAREAS()=="n") ? "selected" : "";?>>Nenhum acesso</option>
			<option value="t" <?= ($usuario->getAREAS()=="t") ? "selected" : "";?>>Acesso Total</option>
		</select>
	</td>
</tr>
<tr>
	<td class="structFilter">Notícias</td>
	<td class="structFilter">
		<select class="structFilterBox" name="noticias">
			<option value="n" <?= ($usuario->getNOTICIAS()=="n") ? "selected" : "";?>>Nenhum acesso</option>
			<option value="t" <?= ($usuario->getNOTICIAS()=="t") ? "selected" : "";?>>Acesso Total</option>
		</select>
	</td>
</tr>
<tr>
	<td class="structFilter">Equipe</td>
	<td class="structFilter">
		<select class="structFilterBox" name="equipe">
			<option value="n" <?= ($usuario->getEQUIPE()=="n") ? "selected" : "";?>>Nenhum acesso</option>
			<option value="t" <?= ($usuario->getEQUIPE()=="t") ? "selected" : "";?>>Acesso Total</option>
		</select>
	</td>
</tr>


<tr>
	<td class="structFilter">Admin</td>
	<td class="structFilter">
		<select class="structFilterBox" name="admin">
			<option value="n" <?= ($usuario->getADMIN()=="n") ? "selected" : "";?>>Nenhum acesso</option>
			<option value="t" <?= ($usuario->getADMIN()=="t") ? "selected" : "";?>>Acesso Total</option>
		</select>
	</td>
<tr>
	<td colspan="2" class="structFilter"><br>
	  <input type="hidden" class="structFilterBox" name="inscricoes" value="t" size="40" maxlength="50">	  </td>
</tr>

<tr>
	<td class="structFilter">&nbsp;&nbsp;&nbsp;</td>
	<td class="structFilter"><input type="submit" class="structFilterButton" value="Salvar"></td>
</tr>
</table>
</form>

<? include_once("struct/struct_bottom.php")?>