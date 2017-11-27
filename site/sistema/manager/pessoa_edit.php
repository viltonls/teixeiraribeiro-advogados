<? include_once("struct/struct_top.php")?>
<?
include_once('../classes/class.pessoa.php');
include_once('../classes/service.pessoa.php');
include_once('../classes/service.organizacao.php');

$pessoa = new Pessoa();

/* Tratamento de Erro */
if ($_REQUEST['id']) {
	$pessoaService = new PessoaService();
	$pessoa = $pessoaService->loadPessoaById($_REQUEST['id']);
	if (!$pessoa->getID()) {
		echo "<span class='structFilter'>";
		echo "Erro: Pessoa não encontrado no BD.<br>";
		break;
		echo "</span>";
	} else {
		$orga_id = $pessoa->getORGA_ID();
	}
} else if ($_REQUEST['orga_id']) {
	$orga_id = $_REQUEST['orga_id'];
}

if ($orga_id) {

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
	$calendar1Day = date("d",strtotime($pessoa->getNASCIMENTO()));
	$calendar1Month = date("m",strtotime($pessoa->getNASCIMENTO())) - 1;
	$calendar1Year = date("Y",strtotime($pessoa->getNASCIMENTO()));
	$calendar2Day = date("d",strtotime($pessoa->getNASCIMENTO()));
	$calendar2Month = date("m",strtotime($pessoa->getNASCIMENTO())) - 1;
	$calendar2Year = date("Y",strtotime($pessoa->getNASCIMENTO()));
} else {
	$calendar1Day = date('d');
	$calendar1Month = date('m')-1;
	$calendar1Year = date('Y');
	$calendar2Day = date('d');
	$calendar2Month = date('m')-1;
	$calendar2Year = date('Y');
}
$calendarMinDate = 1900;
$calendarMaxDate = 2010;
include_once("struct/struct_calendar.php");
?>

<div class="structTitle">Editar Pessoa</div>

<div style="padding-top:8px;"></div>

<form action="pessoa_edit_xp.php" method="POST" class="form.nospace" onsubmit="return validateForm(this)">
<input type="hidden" name="id" value="<?= $pessoa->getID() ?>">
<input type="hidden" name="orga_id" value="<?= $orga_id ?>">
<table border="0" cellpadding="0" cellspacing="0" width="100%">
<tr>
	<td width="50%" valign="top">
		<table cellpadding="2" cellspacing="2" border="0">
		<tr>
			<td class="structFilter" width="15%">Tratamento</td>
			<td class="structFilter"><input type="edit" class="structFilterBox" name="tratamento" value="<?= $pessoa->getTRATAMENTO()?>" size="6" maxlength="10"></td>
		</tr>
		<tr>
			<td class="structFilter">Nome</td>
			<td class="structFilter"><input type="edit" class="structFilterBox" name="nome" value="<?= $pessoa->getNOME()?>" size="50" maxlength="50"></td>
		</tr>
		<tr>
			<td class="structFilter">Email</td>
			<td class="structFilter"><input type="edit" class="structFilterBox" name="email" value="<?= $pessoa->getEMAIL()?>" size="50" maxlength="50"></td>
		</tr>
		<tr>
			<td class="structFilter">Fone</td>
			<td class="structFilter"><input type="edit" class="structFilterBox" name="fone" value="<?= $pessoa->getFONE()?>" size="12" maxlength="20"></td>
		</tr>
		<tr>
			<td class="structFilter">Celular</td>
			<td class="structFilter"><input type="edit" class="structFilterBox" name="celular" value="<?= $pessoa->getCELULAR()?>" size="12" maxlength="20"></td>
		</tr>
		<tr>
			<td class="structFilter">Sexo</td>
			<td class="structFilter">
				<select class="structFilterBox" name="sexo">
					<option value="" <?= ($pessoa->getSEXO()=="") ? "selected" : "";?>> Não informado</option>
					<option value="f" <?= ($pessoa->getSEXO()=="f") ? "selected" : "";?>> Feminino</option>
					<option value="m" <?= ($pessoa->getSEXO()=="m") ? "selected" : "";?>> Masculino</option>
				</select>
			</td>
		</tr>
		<tr>
			<td class="structFilter">Data de Nascimento</td>
			<td class="structFilter">
				<select name="diaData1" id="selDay1" onchange="changeDate1();ajaxValorInscricao()" style="vertical-align:middle" class="structFilterBox">
					<? for ($i = 1; $i <= 31; $i++) { ?>
					<option value="<?=$i?>"><?=$i?></option>
					<? } ?>
				</select>
				<select name="mesData1" id="selMonth1" onchange="changeDate1();ajaxValorInscricao()" style="vertical-align:middle" class="structFilterBox">
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
				<select name="anoData1" id="selYear1" onchange="changeDate1();ajaxValorInscricao()" style="vertical-align:middle" class="structFilterBox">
					<? for ($i = $calendarMinDate; $i <= $calendarMaxDate; $i++) { ?>
					<option value="<?=$i?>"><?=$i?></option>
					<? } ?>
				</select>
				<a href="javascript:void(null)" onclick="showCalendar1()"><img id="dateLink1" src="img/pdate.gif" border="0" style="vertical-align:middle;margin-left:5px"/></a>

				<select name="diaData2" id="selDay2" onchange="changeDate2()" style="vertical-align:middle; visibility:hidden" class="structFilterBox">
					<? for ($i = 1; $i <= 31; $i++) { ?>
					<option value="<?=$i?>"><?=$i?></option>
					<? } ?>
				</select>
				<select name="mesData2" id="selMonth2" onchange="changeDate2()" style="vertical-align:middle; visibility:hidden" class="structFilterBox">
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
				<select name="anoData2" id="selYear2" onchange="changeDate2()" style="vertical-align:middle; visibility:hidden" class="structFilterBox">
					<? for ($i = $calendarMinDate; $i <= $calendarMaxDate; $i++) { ?>
					<option value="<?=$i?>"><?=$i?></option>
					<? } ?>
				</select>
				<!--<a href="javascript:void(null)" onclick="showCalendar2()"><img id="dateLink2" src="img/pdate.gif" border="0" style="vertical-align:middle;margin-left:5px"/></a>-->
				
				

				<script language="javascript">
				function getCal1Date() {
					return YAHOO.example.calendar.cal1.getSelectedDates()[0].getDate()+'/'+(YAHOO.example.calendar.cal1.getSelectedDates()[0].getMonth()+1)+'/'+YAHOO.example.calendar.cal1.getSelectedDates()[0].getFullYear();
				}
				</script>
			</td>
		</tr>
		<tr>
			<td class="structFilter">Observações</td>
			<td class="structFilter"><textarea class="structFilterBox" name="obs" rows="5" cols="120"><?= $pessoa->getOBS()?></textarea></td>
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
<? } else { ?>
	Erro: não foi informada a organização.
	
<? } ?>
<? include_once("struct/struct_bottom.php")?>