<? include_once("struct/struct_top.php")?>
<?
include_once('../classes/class.contato.php');
include_once('../classes/service.contato.php');
include_once('../classes/class.organizacao.php');
include_once('../classes/service.organizacao.php');
include_once('../classes/class.evento.php');
include_once('../classes/service.evento.php');
$contato = new Contato();

/* Tratamento de Erro */
// Se é edição
if ($_REQUEST['id']) {
	$contatoService = new ContatoService();
	$contato = $contatoService->loadContatoById($_REQUEST['id']);
	if (!$contato->getID()) {
		echo "<span class='structFilter'>";
		echo "Erro: Contato não encontrado no BD.<br>";
		break;
		echo "</span>";
	} else {
		$orga_id = $contato->getORGA_ID();
		$even_id = $contato->getEVEN_ID();
	}
} else if ($_REQUEST['orga_id']) {
// Se é novo contato
	$orga_id = $_REQUEST['orga_id'];
	$even_id = $_REQUEST['even_id'];
}

//if ($orga_id) {

?>

<script Language="JavaScript">

function validateForm(theForm) {
  if (!validComboSelected(theForm.orga_id,"0","Organização"))
    return false;
  if (!validRequired(theForm.obs,"Descrição"))
    return false;
  return true;
}
</script>

<?
if ($_REQUEST['id']) {
	$calendar1Day = date("d",strtotime($contato->getDATA()));
	$calendar1Month = date("m",strtotime($contato->getDATA())) - 1;
	$calendar1Year = date("Y",strtotime($contato->getDATA()));
	$calendar2Day = date("d",strtotime($contato->getDATA()));
	$calendar2Month = date("m",strtotime($contato->getDATA())) - 1;
	$calendar2Year = date("Y",strtotime($contato->getDATA()));
} else {
	$calendar1Day = date('d');
	$calendar1Month = date('m')-1;
	$calendar1Year = date('Y');
	$calendar2Day = date('d');
	$calendar2Month = date('m')-1;
	$calendar2Year = date('Y');
}
$calendarMinDate = 2007;
$calendarMaxDate = 2020;
include_once("struct/struct_calendar.php");
?>

<div class="structTitle">Editar Contato</div>

<div style="padding-top:8px;"></div>

<form action="contato_edit_xp.php" method="POST" class="form.nospace" onsubmit="return validateForm(this)">
<input type="hidden" name="id" value="<?= $contato->getID() ?>">
<input type="hidden" name="usua_id" value="<?= $_SESSION["usuario"]->getID() ?>">
<!--input type="hidden" name="orga_id" value="<?= $orga_id ?>"-->
<!--input type="hidden" name="even_id" value="<?= $even_id ?>"-->
<table border="0" cellpadding="0" cellspacing="0" width="100%">
<tr>
	<td width="50%" valign="top">
		<table cellpadding="2" cellspacing="2" border="0">

		
		<tr>
			<td class="structFilter" width="10%">Organização</td>
			<td class="structFilter">
				<select name="orga_id" id="ajaxmenu" size="1" onChange="ajaxcombo('ajaxmenu', 'eventoSelectArea');this.form.orga_id" class="structFilterBox">
				<?
					if (!$orga_id) {
						echo "<option value='0'>Escolha a Organização</option>";
						
					} else {
						if ($orga_id) {
							?>
							<SCRIPT language="JavaScript" type="text/javascript">
								ajaxpage('ajax_select_evento.php?even_id=<?=$even_id?>&orga_id=<?=$orga_id?>&configurado=<?=$configurado?>', 'eventoSelectArea');
							</SCRIPT>
							<?
						} else {
							?>
							<SCRIPT language="JavaScript" type="text/javascript">
								ajaxpage('ajax_select_evento.php?orga_id=<?=$orga_id?>', 'eventoSelectArea');
							</SCRIPT>
							<?
						}
					}
					$organizacaoService = new OrganizacaoService();
					$organizacaoList = $organizacaoService->listOrganizacoes();
					if ($orga_id) {
						echo $organizacaoService->generateHtmlOptionsForAjax($organizacaoList,$orga_id,"ajax_select_evento.php?configurado=".$configurado."&even_id=".$even_id."&orga_id=");
					} else {
						echo $organizacaoService->generateHtmlOptionsForAjax($organizacaoList,$orga_id,"ajax_select_evento.php?configurado=".$configurado."&orga_id=");
					}
				?>			
				</select>
			</td>
		</tr>
		<tr>
			<td class="structFilter">Evento</td>
			<td class="structFilter">
				<div id="eventoSelectArea">
					Escolha a organização para listar os eventos
				</div>		
			</td>
		</tr>		
		
		<tr>
			<td class="structFilter">Tipo</td>
			<td class="structFilter">
				<select class="structFilterBox" name="tipo">
					<option value="r" <?= ($contato->getTIPO()=="r") ? "selected" : "";?>> Reunião</option>
					<option value="t" <?= ($contato->getTIPO()=="t") ? "selected" : "";?>> Telefone</option>
					<option value="e" <?= ($contato->getTIPO()=="e") ? "selected" : "";?>> Email</option>
					<option value="o" <?= ($contato->getTIPO()=="o") ? "selected" : "";?>> Outro</option>
				</select>
			</td>
		</tr>
		<tr>
			<td class="structFilter">Data do Contato</td>
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
			<td class="structFilter">Descrição</td>
			<td class="structFilter"><textarea class="structFilterBox" name="obs" rows="5" cols="120"><?= $contato->getOBS()?></textarea></td>
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
<?/* } else { ?>
	Erro: não foi informada a organização.
	
<? }*/ ?>
<? include_once("struct/struct_bottom.php")?>