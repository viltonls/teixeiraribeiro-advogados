<? include_once("struct/struct_top.php")?>
<?
include_once('../classes/class.evento.php');
include_once('../classes/service.evento.php');
include_once('../classes/service.organizacao.php');

$evento = new Evento();

/* Tratamento de Erro */
if ($_REQUEST['id']) {
	$eventoService = new EventoService();
	$evento = $eventoService->loadEventoById($_REQUEST['id']);
	if (!$evento->getID()) {
		echo "<span class='structFilter'>";
		echo "Erro: Evento não encontrado no BD.<br>";
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
  return true;
}
</script>

<?
if ($_REQUEST['id']) {
	$calendar1Day = date("d",strtotime($evento->getINICIO()));
	$calendar1Month = date("m",strtotime($evento->getINICIO())) - 1;
	$calendar1Year = date("Y",strtotime($evento->getINICIO()));
	$calendar2Day = date("d",strtotime($evento->getFIM()));
	$calendar2Month = date("m",strtotime($evento->getFIM())) - 1;
	$calendar2Year = date("Y",strtotime($evento->getFIM()));
} else {
	$calendar1Day = date('d');
	$calendar1Month = date('m')-1;
	$calendar1Year = date('Y');
	$calendar2Day = date('d');
	$calendar2Month = date('m')-1;
	$calendar2Year = date('Y');
}
$calendarMinDate = 2005;
$calendarMaxDate = 2020;
include_once("struct/struct_calendar.php");
?>

<div class="structTitle">Editar Evento</div>

<div style="padding-top:8px;"></div>

<form action="evento_edit_xp.php" method="POST" class="form.nospace" onsubmit="return validateForm(this)">
<input type="hidden" name="id" value="<?= $evento->getID() ?>">
<table border="0" cellpadding="0" cellspacing="0" width="100%">
<tr>
	<td width="50%" valign="top">
		<table cellpadding="2" cellspacing="2" border="0">
		<tr>
			<td class="structFilter" width="15%">Organização</td>
			<td class="structFilter">
			<?
				$organizacaoService = new OrganizacaoService();
				$organizacaoList = $organizacaoService->listOrganizacoes();
				echo "<select name='orga_id' class='structFilterBox'>\n";
				echo $organizacaoService->generateHtmlOptions($organizacaoList,$evento->getORGA_ID());
				echo "</select>\n";
			?>			
			</td>
		</tr>
		<tr>
			<td class="structFilter">Nome</td>
			<td class="structFilter"><input type="edit" class="structFilterBox" name="nome" value="<?= $evento->getNOME()?>" size="50" maxlength="200"></td>
		</tr>
		<tr>
			<td class="structFilter">Tipo</td>
			<td class="structFilter">
				<select class="structFilterBox" name="tipo">
					<option value="a" <?= ($evento->getTIPO()=="a") ? "selected" : "";?>> Aniversário</option>
					<option value="n" <?= ($evento->getTIPO()=="n") ? "selected" : "";?>> Congresso nacional</option>
					<option value="r" <?= ($evento->getTIPO()=="r") ? "selected" : "";?>> Congresso regional</option>
					<option value="i" <?= ($evento->getTIPO()=="i") ? "selected" : "";?>> Congresso internacional</option>
					<option value="f" <?= ($evento->getTIPO()=="f") ? "selected" : "";?>> Festa fim de ano</option>
					<option value="c" <?= ($evento->getTIPO()=="c") ? "selected" : "";?>> In Company</option>
					<option value="s" <?= ($evento->getTIPO()=="s") ? "selected" : "";?>> Seminário</option>
				</select>
			</td>
		</tr>
		<tr>
			<td class="structFilter">Local</td>
			<td class="structFilter"><input type="edit" class="structFilterBox" name="local" value="<?= $evento->getLOCAL()?>" size="30" maxlength="100"></td>
		</tr>
		<tr>
			<td class="structFilter">Início</td>
			<td class="structFilter">
				<select name="diaData1" id="selDay1" onchange="changeDate1()" style="vertical-align:middle" class="structFilterBox">
					<? for ($i = 1; $i <= 31; $i++) { ?>
					<option value="<?=$i?>"><?=$i?></option>
					<? } ?>
				</select>
				<select name="mesData1" id="selMonth1" onchange="changeDate1()" style="vertical-align:middle" class="structFilterBox">
					<option value="Jan">Janeiro</option>
					<option value="Fev">Fevereiro</option>
					<option value="Mar">Março</option>
					<option value="Abr">Abril</option>
					<option value="Mai">Maio</option>
					<option value="Jun">Junho</option>
					<option value="Jul">Julho</option>
					<option value="Ago">Agosto</option>
					<option value="Set">Setembro</option>
					<option value="Out">Outubro</option>
					<option value="Nov">Novembro</option>
					<option value="Dez">Dezembro</option>
				</select>
				<select name="anoData1" id="selYear1" onchange="changeDate1()" style="vertical-align:middle" class="structFilterBox">
					<? for ($i = $calendarMinDate; $i <= $calendarMaxDate; $i++) { ?>
					<option value="<?=$i?>"><?=$i?></option>
					<? } ?>
				</select>
				<a href="javascript:void(null)" onclick="showCalendar1()"><img id="dateLink1" src="img/pdate.gif" border="0" style="vertical-align:middle;margin-left:5px"/></a>
			</td>
		</tr>
		<tr>
			<td class="structFilter">Fim</td>
			<td class="structFilter">
				<select name="diaData2" id="selDay2" onchange="changeDate2()" style="vertical-align:middle" class="structFilterBox">
					<? for ($i = 1; $i <= 31; $i++) { ?>
					<option value="<?=$i?>"><?=$i?></option>
					<? } ?>
				</select>
				<select name="mesData2" id="selMonth2" onchange="changeDate2()" style="vertical-align:middle" class="structFilterBox">
					<option value="Jan">Janeiro</option>
					<option value="Fev">Fevereiro</option>
					<option value="Mar">Março</option>
					<option value="Abr">Abril</option>
					<option value="Mai">Maio</option>
					<option value="Jun">Junho</option>
					<option value="Jul">Julho</option>
					<option value="Ago">Agosto</option>
					<option value="Set">Setembro</option>
					<option value="Out">Outubro</option>
					<option value="Nov">Novembro</option>
					<option value="Dez">Dezembro</option>
				</select>
				<select name="anoData2" id="selYear2" onchange="changeDate2()" style="vertical-align:middle" class="structFilterBox">
					<? for ($i = $calendarMinDate; $i <= $calendarMaxDate; $i++) { ?>
					<option value="<?=$i?>"><?=$i?></option>
					<? } ?>
				</select>
				<a href="javascript:void(null)" onclick="showCalendar2()"><img id="dateLink2" src="img/pdate.gif" border="0" style="vertical-align:middle;margin-left:5px"/></a>
			</td>
		</tr>
		<tr>
			<td class="structFilter">Comercialização</td>
			<td class="structFilter">
				<table cellpadding="0" cellspacing="0" border="0">
				<tr>
					<td class="structFilter"><input type="checkbox" name="espaco" id="espaco" <?= ($evento->getESPACO()) ? "checked" : "";?>></td>
					<td class="structFilter"><label for="espaco">Espaços</label>&nbsp;&nbsp;&nbsp;&nbsp;</td>
					<td class="structFilter"><input type="checkbox" name="apoio" id="apoio" <?= ($evento->getAPOIO()) ? "checked" : "";?>></td>
					<td class="structFilter"><label for="apoio">Apoio</label>&nbsp;&nbsp;&nbsp;&nbsp;</td>
					<td class="structFilter"><input type="checkbox" name="patroc" id="patroc" <?= ($evento->getPATROC()) ? "checked" : "";?>></td>
					<td class="structFilter"><label for="patroc">Patrocínio</label>&nbsp;&nbsp;&nbsp;&nbsp;</td>
				</tr>
				</table>
				
			</td>
		</tr>
		<tr>
			<td class="structFilter">Estimativas</td>
			<td class="structFilter">
				<input style="text-align:right" type="edit" class="structFilterBox" name="qtd_part" value="<?= $evento->getQTD_PART()?>" size="3" maxlength="6"> participantes<br>
			</td>
		</tr>
		<tr>
			<td class="structFilter"></td>
			<td class="structFilter">
				<input style="text-align:right" type="edit" class="structFilterBox" name="qtd_trab" value="<?= $evento->getQTD_TRAB()?>" size="3" maxlength="6"> trabalhos<br>
			</td>
		</tr>
		<tr>
			<td class="structFilter"></td>
			<td class="structFilter">
				<input style="text-align:right" type="edit" class="structFilterBox" name="qtd_salas" value="<?= $evento->getQTD_SALAS()?>" size="3" maxlength="6"> salas<br>
			</td>
		</tr>
		<tr>
			<td class="structFilter" width="15%">Observações</td>
			<td class="structFilter"><textarea class="structFilterBox" name="obs" rows="5" cols="120"><?= $evento->getOBS()?></textarea></td>
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