<? include_once("struct/struct_top.php")?>
<?
include_once('../classes/class.configuracao.php');
include_once('../classes/class.evento.php');
include_once('../classes/service.evento.php');
include_once('../classes/service.organizacao.php');

$id = $_REQUEST['id'];

$evento = new Evento();
$configuracao = new Configuracao();
$eventoService = new EventoService();

/* Tratamento de Erro */
if ($id) {
	$evento = $eventoService->loadEventoById($id);
	$configuracao = $eventoService->loadEventoConfiguracaoById($id);

	if (!$configuracao->getEVEN_ID()) {
		echo "<span class='structFilter'>";
		echo "Erro: Evento ainda não foi ativado.<br>";
		break;
		echo "</span>";
	}

} else {
	echo "<span class='structFilter'>";
	echo "Erro: ID de Evento não foi informado corretamente.<br>";
	break;
	echo "</span>";
}

?>

<div class="structTitle">Configurar Evento "<?=$evento->getNOME()?>"</div>

<div style="padding-top:8px;"></div>
<form action="evento_configuracao_edit_xp.php" method="POST" class="form.nospace" onsubmit="return validateForm(this)" enctype="multipart/form-data">
<input type="hidden" name="even_id" value="<?= $configuracao->getEVEN_ID() ?>">

<table cellpadding="2" cellspacing="2" border="0">
<tr>
	<td class="structFilter" colspan="3">
		Alias: <input type="text" class="structFilterBox" size="30" name="alias" id="alias" value="<?= $configuracao->getALIAS()?>"><br>
	</td>
</tr>
<tr>
	<td class="structFilter" colspan="3">
		Upload do Logotipo
		<input type="file" class="structFilterBox" name="logo_file" size="10"><br>
		<input type="hidden" name="logo_formato" value="<?= $configuracao->getLOGO_FORMATO() ?>">
	</td>
</tr>

<? if (1 == 2 && $configuracao->getLOGO_FORMATO() != "") { ?>
<tr>
	<td class="structFilter" colspan="3">
		<img src="logos/imgsize.php?w=200&h=70&constrain=1&img=<?=$configuracao->getEVEN_ID()?>.<?=$configuracao->getLOGO_FORMATO()?>" vspace="5">
	</td>
</tr>
<? } ?>

<? if ($configuracao->getLOGO_FORMATO() != "") {
	$configuracao->dumpLogo(dirname(__FILE__)."\logos\\".$configuracao->getEVEN_ID()."_tmp.".$configuracao->getLOGO_FORMATO());
	?>
<tr>
	<td class="structFilter" colspan="3">
		<img src="logos/imgsize.php?w=200&h=70&constrain=1&img=<?=$configuracao->getEVEN_ID()?>_tmp.<?=$configuracao->getLOGO_FORMATO()?>" vspace="5"><br>
	</td>
</tr>
<? } else { ?>
<tr>
	<td class="structFilter" colspan="3">
		<i>Não há logotipo cadastrado</i>
	</td>
</tr>
<? }?>
<tr>
	<td class="structFilter" colspan="3">
		Recibo - Dados na área de assinatura<br>
		<textarea style="text-align:center;" class="structFilterBox" name="dados_recibo" rows="5" cols="60"><?= $configuracao->getDADOS_RECIBO()?></textarea>
	</td>
</tr>
<tr>
	<td class="structFilter">&nbsp;&nbsp;&nbsp;</td>
	<td class="structFilter"><input type="submit" class="structFilterButton" value="Salvar Configuração"></td>
</tr>
</table>
		

</div>

</form>

<script>
  changeTab(1);
</script>

<? include_once("struct/struct_bottom.php")?>