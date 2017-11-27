<? include_once("struct/struct_top.php")?>
<?
include_once('../classes/class.contato.php');
include_once('../classes/service.contato.php');
include_once('../classes/class.usuario.php');
include_once('../classes/service.usuario.php');
include_once('../classes/dto.contato.php');
include_once('../classes/class.organizacao.php');
include_once('../classes/service.organizacao.php');
include_once('../classes/class.evento.php');
include_once('../classes/service.evento.php');

// Verifica as variáveis do filtro
if ($_REQUEST["orga_id"]) {
	$orga_id_array = explode("=",$_REQUEST["orga_id"]);
	$orga_id = $orga_id_array[3];
}

switch ($_REQUEST["mesData1"]) {
	case "Jan": $mesData1 = 1; break;
	case "Fev": $mesData1 = 2; break;
	case "Mar": $mesData1 = 3; break;
	case "Abr": $mesData1 = 4; break;
	case "Mai": $mesData1 = 5; break;
	case "Jun": $mesData1 = 6; break;
	case "Jul": $mesData1 = 7; break;
	case "Ago": $mesData1 = 8; break;
	case "Set": $mesData1 = 9; break;
	case "Out": $mesData1 = 10; break;
	case "Nov": $mesData1 = 11; break;
	case "Dez": $mesData1 = 12; break;
}
$data_ini = mktime(0,0,0,$mesData1,$_REQUEST["diaData1"],$_REQUEST["anoData1"]);

switch ($_REQUEST["mesData2"]) {
	case "Jan": $mesData2 = 1; break;
	case "Fev": $mesData2 = 2; break;
	case "Mar": $mesData2 = 3; break;
	case "Abr": $mesData2 = 4; break;
	case "Mai": $mesData2 = 5; break;
	case "Jun": $mesData2 = 6; break;
	case "Jul": $mesData2 = 7; break;
	case "Ago": $mesData2 = 8; break;
	case "Set": $mesData2 = 9; break;
	case "Out": $mesData2 = 10; break;
	case "Nov": $mesData2 = 11; break;
	case "Dez": $mesData2 = 12; break;
}
$data_fim = mktime(0,0,0,$mesData2,$_REQUEST["diaData2"],$_REQUEST["anoData2"]);

$contatoService = new ContatoService();
$contatoList = $contatoService->reportContatosFiltered($orga_id,$_REQUEST["even_id"],$_REQUEST["usua_id"],$_REQUEST["cont_tipo"],$data_ini,$data_fim,"");

if ($_REQUEST["diaData1"]) {
	$calendar1Day = $_REQUEST["diaData1"];
	$calendar1Month = $mesData1-1;
	$calendar1Year = $_REQUEST["anoData1"];
	$calendar2Day = $_REQUEST["diaData2"];
	$calendar2Month = $mesData2-1;
	$calendar2Year = $_REQUEST["anoData2"];
} else {
	$calendar1Day = date('d');
	$calendar1Month = date('m')-2;
	$calendar1Year = date('Y');
	$calendar2Day = date('d');
	$calendar2Month = date('m')-1;
	$calendar2Year = date('Y');
}
$calendarMinDate = 2007;
$calendarMaxDate = 2010;
include_once("struct/struct_calendar.php");
?>
<span class="structTitle">Relatório de Contatos</span>

<div style="padding-top:8px;"></div>

<form action="relatorio_contatos.php" method="POST">
<table border="0" cellpadding="2" cellspacing="0">
<tr>
	<td class="structFilter">Filtar por:</td>
	<td class="structFilter"><input type="submit" style="padding:0px;" class="structFilterButton" value="Aplicar Filtros"></td>
	<td class="structFilter">&nbsp;&nbsp;&nbsp;</td>
	<td class="structFilter">&nbsp;&nbsp;&nbsp;</td>
</tr>
<tr>
	<td class="structFilter">Organização</td>
	<td class="structFilter" colspan="3">
		<select name="orga_id" id="ajaxmenu" size="1" onChange="ajaxcombo('ajaxmenu', 'eventoSelectArea');if(this.selectedIndex==0) document.getElementById('eventoSelectArea').innerHTML='Escolha a organização para listar os eventos'" class="structFilterBox">
		<?
			if (!$orga_id) {
				echo "<option value='0'>Todas as Organizações</option>";
				
			} else {
				if ($orga_id) {
				echo "<option value='0'>Todas as Organizações</option>";
					?>
					<SCRIPT language="JavaScript" type="text/javascript">
						ajaxpage('ajax_select_evento.php?even_id=<?=$_REQUEST['even_id']?>&orga_id=<?=$orga_id?>&configurado=<?=$configurado?>', 'eventoSelectArea');
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
				echo $organizacaoService->generateHtmlOptionsForAjax($organizacaoList,$orga_id,"ajax_select_evento.php?configurado=".$configurado."&even_id=".$_REQUEST['even_id']."&orga_id=");
			} else {
				echo $organizacaoService->generateHtmlOptionsForAjax($organizacaoList,$orga_id,"ajax_select_evento.php?configurado=".$configurado."&orga_id=");
			}
		?>			
		</select>
	</td>
</tr>
<tr>
	<td class="structFilter">Evento</td>
	<td class="structFilter" colspan="3">
		<div id="eventoSelectArea">
			Escolha a organização para listar os eventos
		</div>		
	</td>
</tr>
<tr>
	<td class="structFilter">Responsável Office</td>
	<td class="structFilter" colspan="3">
		<?	$usuarioService = new UsuarioService();
			$usuarioList = $usuarioService->listUsuarios(); ?>
		<select name="usua_id" id="usua_id" class="structFilterBox">
			<option value="">Todos</option>
			<?= $usuarioService->generateHtmlOptions($usuarioList,$_REQUEST['usua_id']);?>
		</select>
	</td>
</tr>
<tr>
	<td class="structFilter">Data Início</td>
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
	<td class="structFilter">Data Fim</td>
	<td class="structFilter">
		<select name="diaData2" id="selDay2" onchange="changeDate2()" style="vertical-align:middle;" class="structFilterBox">
			<? for ($i = 1; $i <= 31; $i++) { ?>
			<option value="<?=$i?>"><?=$i?></option>
			<? } ?>
		</select>
		<select name="mesData2" id="selMonth2" onchange="changeDate2()" style="vertical-align:middle;" class="structFilterBox">
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
		<select name="anoData2" id="selYear2" onchange="changeDate2()" style="vertical-align:middle;" class="structFilterBox">
			<? for ($i = $calendarMinDate; $i <= $calendarMaxDate; $i++) { ?>
			<option value="<?=$i?>"><?=$i?></option>
			<? } ?>
		</select>
		<a href="javascript:void(null)" onclick="showCalendar2()"><img id="dateLink2" src="img/pdate.gif" border="0" style="vertical-align:middle;margin-left:5px"/></a>
	</td>
</tr>
</table>
</form>

<div style="padding-top:8px;"></div>

<!-- Grid de Listagem -->
<div class="gridContainer" id="tC" style="height:300px; width:100%;border:solid 1px #303030">
<table border="0" cellspacing="0" cellpadding="0" width="100%">
  <thead class="gridHeader">
  <tr class="gridHeader" style="top:expression(document.getElementById('tC').scrollTop);">
	<!--td class="gridHeader" width="2%">&nbsp;</td-->

	<td class="gridHeader" width="2%">&nbsp;</td>
    <td class="gridHeader">Data/Forma</td>
    <td class="gridHeader">Responsável Office</td>
    <td class="gridHeader">Organização / Evento</td>
    <td class="gridHeader">Descrição</td>
	<td class="gridHeader" width="2%">&nbsp;</td>
	<td class="gridHeader" width="2%">&nbsp;</td>
  </tr>
  </thead>
  <tbody>
  <? for ($i = 0; $i < count($contatoList); $i++) {
		/* @var $contato ContatoDTO */
		$contato = $contatoList[$i]; ?>
  <tr>
    <td class="gridLineEven">&nbsp;</td>
    <td class="gridLineEven"><?= date("d/m/Y",strtotime($contato->getDATA())) ?><br>
		<?= ($contato->getTIPO()=="r") ? "Reunião" : "";?>
		<?= ($contato->getTIPO()=="t") ? "Telefone" : "";?>
		<?= ($contato->getTIPO()=="e") ? "Email" : "";?>
		<?= ($contato->getTIPO()=="o") ? "Outro" : "";?>
    </td>
    <td class="gridLineEven"><?=$contato->getUSUA_NOME()?></td>
    <td class="gridLineEven" width="20%">
    	<?=$contato->getORGA_NOME()?><br>
    	<?=$contato->getEVEN_NOME()?></td>
    <td class="gridLineEven"><?
    	 echo substr(str_replace("\n"," ",$contato->getOBS()),0,150);
    	 if (strlen($contato->getOBS()) >= 150) {
    	 	echo "(...)";
    	 }
    	 
    	  ?>
    	 &nbsp;
    </td>
    <td class="gridLineEven"><a href="contato_view.php?id=<?= $contato->getID() ?>">Detalhes</a>&nbsp;</td>
    <td class="gridLineEven">&nbsp;</td>
  </tr>
  <? }; ?>
  </tbody>
</table>
</div>

</form>
<? include_once("struct/struct_bottom.php")?>