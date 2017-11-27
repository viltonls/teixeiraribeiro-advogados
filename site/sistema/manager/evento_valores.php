<? include_once("struct/struct_top.php")?>
<?
include_once('../classes/class.configuracao.php');
include_once('../classes/class.configuracao_xml.php');
include_once('../classes/class.evento.php');
include_once('../classes/class.valores.php');
include_once('../classes/service.evento.php');
include_once('../classes/service.valores.php');

$even_id = $_REQUEST['even_id'];
$eval_id = $_REQUEST['eval_id'];

$evento = new Evento();
$eventoService = new EventoService();
$valoresService = new ValoresService();

/* Tratamento de Erro */
if ($even_id) {
	$evento = $eventoService->loadEventoById($even_id);
	$configuracao = $eventoService->loadEventoConfiguracaoById($even_id);
	$configuracaoXML = new ConfiguracaoXML();
	$configuracaoXML->loadFromFile("../xml/".$configuracao->getEVEN_ID().".xml");
	/* @var $configuracao Configuracao */
	/* @var $configuracaoXML ConfiguracaoXML */
	
	$valoresList = $valoresService->listValoresByEvento($even_id);
	
} else {
	echo "<span class='structFilter'>";
	echo "Erro: ID de Evento não foi informado corretamente.<br>";
	break;
	echo "</span>";
}


?>
<div class="structTitle">Listar Tabelas do Evento "<?=$evento->getNOME()?>"</div>

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
<table border="0" cellspacing="0" cellpadding="0" width="100%">
<tr>
	<!-- Lista das Tabelas -->
	<td width="30%" valign="top">
		<!-- Grid de Listagem -->
		<div class="gridContainer" id="tC" style="height:300px; width:100%;border:solid 1px #303030">
		<table border="0" cellspacing="0" cellpadding="0" width="100%">
		  <thead class="gridHeader">
		  <tr class="gridHeader" style="top:expression(document.getElementById('tC').scrollTop);">
			<!--td class="gridHeader" width="2%">&nbsp;</td-->
		
			<td class="gridHeader" width="2%">&nbsp;</td>
		    <td class="gridHeader" colspan="3">Tabela aplicada até o dia</td>
			<td class="gridHeader" width="2%">&nbsp;</td>
		  </tr>
		  </thead>
		  <tbody>
		  <? for ($i = 0; $i < count($valoresList); $i++) {
				/* @var $evento Evento */
				$valores = $valoresList[$i]; ?>
		  <tr>
		    <td class="gridLineEven">&nbsp;</td>
		    <td class="gridLineEven"><?= date("d/m/Y",strtotime($valores->getFIM())) ?>&nbsp;</td>
		    <td class="gridLineEven"><a href="evento_valores.php?even_id=<?= $evento->getID() ?>&eval_id=<?= $valores->getID() ?>">Editar</a>&nbsp;</td>
		    <td class="gridLineEven"><a href="evento_valores_delete_xp.php?even_id=<?= $evento->getID() ?>&eval_id=<?= $valores->getID() ?>" onclick="return confirm('Você tem certeza que deseja excluir?\n(essa operação não pode ser desfeita)')">Excluir</a></td>
		    <td class="gridLineEven">&nbsp;</td>
		  </tr>
		  <? }; ?>
		  </tbody>
		</table>
		</div>
	
	</td>
	
	
	<!-- Formulário da Tabela Atual -->
	<td width="100%" align="center">
	<?
		$valoresEdit = new Valores();
		// Prepara o calendário
		if ($eval_id) {
			$valoresEdit = $valoresService->loadValoresById($eval_id);
			$calendar1Day = date("d",strtotime($valoresEdit->getFIM()));
			$calendar1Month = date("m",strtotime($valoresEdit->getFIM())) - 1;
			$calendar1Year = date("Y",strtotime($valoresEdit->getFIM()));
			$calendar2Day = date('d');
			$calendar2Month = date('m')-1;
			$calendar2Year = date('Y');
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
		
		<form action="evento_valores_xp.php" method="POST" class="form.nospace" onsubmit="return validateForm(this)">
		<input type="hidden" name="even_id" value="<?=$even_id?>">
		<input type="hidden" name="eval_id" value="<?=$eval_id;?>">
		<table border="0" cellspacing="0" cellpadding="2">
		<tr>
			<td class="structFilter">Tabela aplicada até o dia</td>
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
			<td class="structFilter">Valor para Acompanhante</td>
			<td class="structFilter">R$<input style="text-align:right" type="edit" class="structFilterBox" name="acomp" value="<?= number_format($valoresEdit->getACOMP()/100,2,",","."); ?>" size="6" maxlength="10" onKeyPress="return(currencyFormat(this,'.',',',event))"></td>
		</tr>
		</table>
		<div style="visibility:hidden;">
		<select name="diaData2" id="selDay2" onchange="changeDate2()" style="vertical-align:middle" class="structFilterBox"></select>
		<select name="mesData2" id="selMonth2" onchange="changeDate2()" style="vertical-align:middle" class="structFilterBox"></select>
		<select name="anoData2" id="selYear2" onchange="changeDate2()" style="vertical-align:middle" class="structFilterBox"></select>
		<a href="javascript:void(null)" onclick="showCalendar2()"><img id="dateLink2" src="img/pdate.gif" border="0" style="vertical-align:middle;margin-left:5px"/></a>
		</div>
		
		<table border="0" cellspacing="0" cellpadding="6">
		<tr>
			<td class="structFilter" width="10%"></td>
			<? if ($configuracaoXML->getInscricaoOpcao1("PT")) { ?>
			<td class="structFilter" align="center" width="15%" valign="middle"><b><?= $configuracaoXML->getInscricaoOpcao1("PT"); ?></b></td>
			<? } ?>
			<? if ($configuracaoXML->getInscricaoOpcao2("PT")) { ?>
			<td class="structFilter" align="center" width="15%" valign="middle"><b><?= $configuracaoXML->getInscricaoOpcao2("PT"); ?></b></td>
			<? } ?>
			<? if ($configuracaoXML->getInscricaoOpcao3("PT")) { ?>
			<td class="structFilter" align="center" width="15%" valign="middle"><b><?= $configuracaoXML->getInscricaoOpcao3("PT"); ?></b></td>
			<? } ?>
			<? if ($configuracaoXML->getInscricaoOpcao4("PT")) { ?>
			<td class="structFilter" align="center" width="15%" valign="middle"><b><?= $configuracaoXML->getInscricaoOpcao4("PT"); ?></b></td>
			<? } ?>
			<? if ($configuracaoXML->getInscricaoOpcao5("PT")) { ?>
			<td class="structFilter" align="center" width="15%" valign="middle"><b><?= $configuracaoXML->getInscricaoOpcao5("PT"); ?></b></td>
			<? } ?>
			<? if ($configuracaoXML->getInscricaoOpcao6("PT")) { ?>
			<td class="structFilter" align="center" width="15%" valign="middle"><b><?= $configuracaoXML->getInscricaoOpcao6("PT"); ?></b></td>
			<? } ?>
		</tr>
		<? if ($configuracaoXML->getInscricaoCategoriaA("PT")) { ?>
		<tr>
			<td align="right"><b><?=$configuracaoXML->getInscricaoCategoriaA("PT")?></b></td>
			<? if ($configuracaoXML->getInscricaoOpcao1("PT")) { ?>
			<td align="center">R$<input style="text-align:right" type="edit" class="structFilterBox" name="a1" value="<?= number_format($valoresEdit->getA1()/100,2,",","."); ?>" size="6" maxlength="10" onKeyPress="return(currencyFormat(this,'.',',',event))"></td>
			<? } ?>
			<? if ($configuracaoXML->getInscricaoOpcao2("PT")) { ?>
			<td align="center">R$<input style="text-align:right" type="edit" class="structFilterBox" name="a2" value="<?= number_format($valoresEdit->getA2()/100,2,",","."); ?>" size="6" maxlength="10" onKeyPress="return(currencyFormat(this,'.',',',event))"></td>
			<? } ?>
			<? if ($configuracaoXML->getInscricaoOpcao3("PT")) { ?>
			<td align="center">R$<input style="text-align:right" type="edit" class="structFilterBox" name="a3" value="<?= number_format($valoresEdit->getA3()/100,2,",","."); ?>" size="6" maxlength="10" onKeyPress="return(currencyFormat(this,'.',',',event))"></td>
			<? } ?>
			<? if ($configuracaoXML->getInscricaoOpcao4("PT")) { ?>
			<td align="center">R$<input style="text-align:right" type="edit" class="structFilterBox" name="a4" value="<?= number_format($valoresEdit->getA4()/100,2,",","."); ?>" size="6" maxlength="10" onKeyPress="return(currencyFormat(this,'.',',',event))"></td>
			<? } ?>
			<? if ($configuracaoXML->getInscricaoOpcao5("PT")) { ?>
			<td align="center">R$<input style="text-align:right" type="edit" class="structFilterBox" name="a5" value="<?= number_format($valoresEdit->getA5()/100,2,",","."); ?>" size="6" maxlength="10" onKeyPress="return(currencyFormat(this,'.',',',event))"></td>
			<? } ?>
			<? if ($configuracaoXML->getInscricaoOpcao6("PT")) { ?>
			<td align="center">R$<input style="text-align:right" type="edit" class="structFilterBox" name="a6" value="<?= number_format($valoresEdit->getA6()/100,2,",","."); ?>" size="6" maxlength="10" onKeyPress="return(currencyFormat(this,'.',',',event))"></td>
			<? } ?>
		</tr>
		<? } ?>
		<? if ($configuracaoXML->getInscricaoCategoriaB("PT")) { ?>
		<tr>
			<td align="right"><b><?=$configuracaoXML->getInscricaoCategoriaB("PT")?></b></td>
			<? if ($configuracaoXML->getInscricaoOpcao1("PT")) { ?>
			<td align="center">R$<input style="text-align:right" type="edit" class="structFilterBox" name="b1" value="<?= number_format($valoresEdit->getB1()/100,2,",","."); ?>" size="6" maxlength="10" onKeyPress="return(currencyFormat(this,'.',',',event))"></td>
			<? } ?>
			<? if ($configuracaoXML->getInscricaoOpcao2("PT")) { ?>
			<td align="center">R$<input style="text-align:right" type="edit" class="structFilterBox" name="b2" value="<?= number_format($valoresEdit->getB2()/100,2,",","."); ?>" size="6" maxlength="10" onKeyPress="return(currencyFormat(this,'.',',',event))"></td>
			<? } ?>
			<? if ($configuracaoXML->getInscricaoOpcao3("PT")) { ?>
			<td align="center">R$<input style="text-align:right" type="edit" class="structFilterBox" name="b3" value="<?= number_format($valoresEdit->getB3()/100,2,",","."); ?>" size="6" maxlength="10" onKeyPress="return(currencyFormat(this,'.',',',event))"></td>
			<? } ?>
			<? if ($configuracaoXML->getInscricaoOpcao4("PT")) { ?>
			<td align="center">R$<input style="text-align:right" type="edit" class="structFilterBox" name="b4" value="<?= number_format($valoresEdit->getB4()/100,2,",","."); ?>" size="6" maxlength="10" onKeyPress="return(currencyFormat(this,'.',',',event))"></td>
			<? } ?>
			<? if ($configuracaoXML->getInscricaoOpcao5("PT")) { ?>
			<td align="center">R$<input style="text-align:right" type="edit" class="structFilterBox" name="b5" value="<?= number_format($valoresEdit->getB5()/100,2,",","."); ?>" size="6" maxlength="10" onKeyPress="return(currencyFormat(this,'.',',',event))"></td>
			<? } ?>
			<? if ($configuracaoXML->getInscricaoOpcao6("PT")) { ?>
			<td align="center">R$<input style="text-align:right" type="edit" class="structFilterBox" name="b6" value="<?= number_format($valoresEdit->getB6()/100,2,",","."); ?>" size="6" maxlength="10" onKeyPress="return(currencyFormat(this,'.',',',event))"></td>
			<? } ?>
		</tr>
		<? } ?>
		<? if ($configuracaoXML->getInscricaoCategoriaC("PT")) { ?>
		<tr>
			<td align="right"><b><?=$configuracaoXML->getInscricaoCategoriaC("PT")?></b></td>
			<? if ($configuracaoXML->getInscricaoOpcao1("PT")) { ?>
			<td align="center">R$<input style="text-align:right" type="edit" class="structFilterBox" name="c1" value="<?= number_format($valoresEdit->getC1()/100,2,",","."); ?>" size="6" maxlength="10" onKeyPress="return(currencyFormat(this,'.',',',event))"></td>
			<? } ?>
			<? if ($configuracaoXML->getInscricaoOpcao2("PT")) { ?>
			<td align="center">R$<input style="text-align:right" type="edit" class="structFilterBox" name="c2" value="<?= number_format($valoresEdit->getC2()/100,2,",","."); ?>" size="6" maxlength="10" onKeyPress="return(currencyFormat(this,'.',',',event))"></td>
			<? } ?>
			<? if ($configuracaoXML->getInscricaoOpcao3("PT")) { ?>
			<td align="center">R$<input style="text-align:right" type="edit" class="structFilterBox" name="c3" value="<?= number_format($valoresEdit->getC3()/100,2,",","."); ?>" size="6" maxlength="10" onKeyPress="return(currencyFormat(this,'.',',',event))"></td>
			<? } ?>
			<? if ($configuracaoXML->getInscricaoOpcao4("PT")) { ?>
			<td align="center">R$<input style="text-align:right" type="edit" class="structFilterBox" name="c4" value="<?= number_format($valoresEdit->getC4()/100,2,",","."); ?>" size="6" maxlength="10" onKeyPress="return(currencyFormat(this,'.',',',event))"></td>
			<? } ?>
			<? if ($configuracaoXML->getInscricaoOpcao5("PT")) { ?>
			<td align="center">R$<input style="text-align:right" type="edit" class="structFilterBox" name="c5" value="<?= number_format($valoresEdit->getC5()/100,2,",","."); ?>" size="6" maxlength="10" onKeyPress="return(currencyFormat(this,'.',',',event))"></td>
			<? } ?>
			<? if ($configuracaoXML->getInscricaoOpcao6("PT")) { ?>
			<td align="center">R$<input style="text-align:right" type="edit" class="structFilterBox" name="c6" value="<?= number_format($valoresEdit->getC6()/100,2,",","."); ?>" size="6" maxlength="10" onKeyPress="return(currencyFormat(this,'.',',',event))"></td>
			<? } ?>
		</tr>
		<? } ?>
		<? if ($configuracaoXML->getInscricaoCategoriaD("PT")) { ?>
		<tr>
			<td align="right"><b><?=$configuracaoXML->getInscricaoCategoriaD("PT")?></b></td>
			<? if ($configuracaoXML->getInscricaoOpcao1("PT")) { ?>
			<td align="center">R$<input style="text-align:right" type="edit" class="structFilterBox" name="d1" value="<?= number_format($valoresEdit->getD1()/100,2,",","."); ?>" size="6" maxlength="10" onKeyPress="return(currencyFormat(this,'.',',',event))"></td>
			<? } ?>
			<? if ($configuracaoXML->getInscricaoOpcao2("PT")) { ?>
			<td align="center">R$<input style="text-align:right" type="edit" class="structFilterBox" name="d2" value="<?= number_format($valoresEdit->getD2()/100,2,",","."); ?>" size="6" maxlength="10" onKeyPress="return(currencyFormat(this,'.',',',event))"></td>
			<? } ?>
			<? if ($configuracaoXML->getInscricaoOpcao3("PT")) { ?>
			<td align="center">R$<input style="text-align:right" type="edit" class="structFilterBox" name="d3" value="<?= number_format($valoresEdit->getD3()/100,2,",","."); ?>" size="6" maxlength="10" onKeyPress="return(currencyFormat(this,'.',',',event))"></td>
			<? } ?>
			<? if ($configuracaoXML->getInscricaoOpcao4("PT")) { ?>
			<td align="center">R$<input style="text-align:right" type="edit" class="structFilterBox" name="d4" value="<?= number_format($valoresEdit->getD4()/100,2,",","."); ?>" size="6" maxlength="10" onKeyPress="return(currencyFormat(this,'.',',',event))"></td>
			<? } ?>
			<? if ($configuracaoXML->getInscricaoOpcao5("PT")) { ?>
			<td align="center">R$<input style="text-align:right" type="edit" class="structFilterBox" name="d5" value="<?= number_format($valoresEdit->getD5()/100,2,",","."); ?>" size="6" maxlength="10" onKeyPress="return(currencyFormat(this,'.',',',event))"></td>
			<? } ?>
			<? if ($configuracaoXML->getInscricaoOpcao6("PT")) { ?>
			<td align="center">R$<input style="text-align:right" type="edit" class="structFilterBox" name="d6" value="<?= number_format($valoresEdit->getD6()/100,2,",","."); ?>" size="6" maxlength="10" onKeyPress="return(currencyFormat(this,'.',',',event))"></td>
			<? } ?>
		</tr>
		<? } ?>
		<? if ($configuracaoXML->getInscricaoCategoriaE("PT")) { ?>
		<tr>
			<td align="right"><b><?=$configuracaoXML->getInscricaoCategoriaE("PT")?></b></td>
			<? if ($configuracaoXML->getInscricaoOpcao1("PT")) { ?>
			<td align="center">R$<input style="text-align:right" type="edit" class="structFilterBox" name="e1" value="<?= number_format($valoresEdit->getE1()/100,2,",","."); ?>" size="6" maxlength="10" onKeyPress="return(currencyFormat(this,'.',',',event))"></td>
			<? } ?>
			<? if ($configuracaoXML->getInscricaoOpcao2("PT")) { ?>
			<td align="center">R$<input style="text-align:right" type="edit" class="structFilterBox" name="e2" value="<?= number_format($valoresEdit->getE2()/100,2,",","."); ?>" size="6" maxlength="10" onKeyPress="return(currencyFormat(this,'.',',',event))"></td>
			<? } ?>
			<? if ($configuracaoXML->getInscricaoOpcao3("PT")) { ?>
			<td align="center">R$<input style="text-align:right" type="edit" class="structFilterBox" name="e3" value="<?= number_format($valoresEdit->getE3()/100,2,",","."); ?>" size="6" maxlength="10" onKeyPress="return(currencyFormat(this,'.',',',event))"></td>
			<? } ?>
			<? if ($configuracaoXML->getInscricaoOpcao4("PT")) { ?>
			<td align="center">R$<input style="text-align:right" type="edit" class="structFilterBox" name="e4" value="<?= number_format($valoresEdit->getE4()/100,2,",","."); ?>" size="6" maxlength="10" onKeyPress="return(currencyFormat(this,'.',',',event))"></td>
			<? } ?>
			<? if ($configuracaoXML->getInscricaoOpcao5("PT")) { ?>
			<td align="center">R$<input style="text-align:right" type="edit" class="structFilterBox" name="e5" value="<?= number_format($valoresEdit->getE5()/100,2,",","."); ?>" size="6" maxlength="10" onKeyPress="return(currencyFormat(this,'.',',',event))"></td>
			<? } ?>
			<? if ($configuracaoXML->getInscricaoOpcao6("PT")) { ?>
			<td align="center">R$<input style="text-align:right" type="edit" class="structFilterBox" name="e6" value="<?= number_format($valoresEdit->getE6()/100,2,",","."); ?>" size="6" maxlength="10" onKeyPress="return(currencyFormat(this,'.',',',event))"></td>
			<? } ?>
		</tr>
		<? } ?>
		<? if ($configuracaoXML->getInscricaoCategoriaF("PT")) { ?>
		<tr>
			<td align="right"><b><?=$configuracaoXML->getInscricaoCategoriaF("PT")?></b></td>
			<? if ($configuracaoXML->getInscricaoOpcao1("PT")) { ?>
			<td align="center">R$<input style="text-align:right" type="edit" class="structFilterBox" name="f1" value="<?= number_format($valoresEdit->getF1()/100,2,",","."); ?>" size="6" maxlength="10" onKeyPress="return(currencyFormat(this,'.',',',event))"></td>
			<? } ?>
			<? if ($configuracaoXML->getInscricaoOpcao2("PT")) { ?>
			<td align="center">R$<input style="text-align:right" type="edit" class="structFilterBox" name="f2" value="<?= number_format($valoresEdit->getF2()/100,2,",","."); ?>" size="6" maxlength="10" onKeyPress="return(currencyFormat(this,'.',',',event))"></td>
			<? } ?>
			<? if ($configuracaoXML->getInscricaoOpcao3("PT")) { ?>
			<td align="center">R$<input style="text-align:right" type="edit" class="structFilterBox" name="f3" value="<?= number_format($valoresEdit->getF3()/100,2,",","."); ?>" size="6" maxlength="10" onKeyPress="return(currencyFormat(this,'.',',',event))"></td>
			<? } ?>
			<? if ($configuracaoXML->getInscricaoOpcao4("PT")) { ?>
			<td align="center">R$<input style="text-align:right" type="edit" class="structFilterBox" name="f4" value="<?= number_format($valoresEdit->getF4()/100,2,",","."); ?>" size="6" maxlength="10" onKeyPress="return(currencyFormat(this,'.',',',event))"></td>
			<? } ?>
			<? if ($configuracaoXML->getInscricaoOpcao5("PT")) { ?>
			<td align="center">R$<input style="text-align:right" type="edit" class="structFilterBox" name="f5" value="<?= number_format($valoresEdit->getF5()/100,2,",","."); ?>" size="6" maxlength="10" onKeyPress="return(currencyFormat(this,'.',',',event))"></td>
			<? } ?>
			<? if ($configuracaoXML->getInscricaoOpcao6("PT")) { ?>
			<td align="center">R$<input style="text-align:right" type="edit" class="structFilterBox" name="f6" value="<?= number_format($valoresEdit->getF6()/100,2,",","."); ?>" size="6" maxlength="10" onKeyPress="return(currencyFormat(this,'.',',',event))"></td>
			<? } ?>
		</tr>
		<? } ?>
		<? if ($configuracaoXML->getInscricaoCategoriaG("PT")) { ?>
		<tr>
			<td align="right"><b><?=$configuracaoXML->getInscricaoCategoriaG("PT")?></b></td>
			<? if ($configuracaoXML->getInscricaoOpcao1("PT")) { ?>
			<td align="center">R$<input style="text-align:right" type="edit" class="structFilterBox" name="g1" value="<?= number_format($valoresEdit->getG1()/100,2,",","."); ?>" size="6" maxlength="10" onKeyPress="return(currencyFormat(this,'.',',',event))"></td>
			<? } ?>
			<? if ($configuracaoXML->getInscricaoOpcao2("PT")) { ?>
			<td align="center">R$<input style="text-align:right" type="edit" class="structFilterBox" name="g2" value="<?= number_format($valoresEdit->getG2()/100,2,",","."); ?>" size="6" maxlength="10" onKeyPress="return(currencyFormat(this,'.',',',event))"></td>
			<? } ?>
			<? if ($configuracaoXML->getInscricaoOpcao3("PT")) { ?>
			<td align="center">R$<input style="text-align:right" type="edit" class="structFilterBox" name="g3" value="<?= number_format($valoresEdit->getG3()/100,2,",","."); ?>" size="6" maxlength="10" onKeyPress="return(currencyFormat(this,'.',',',event))"></td>
			<? } ?>
			<? if ($configuracaoXML->getInscricaoOpcao4("PT")) { ?>
			<td align="center">R$<input style="text-align:right" type="edit" class="structFilterBox" name="g4" value="<?= number_format($valoresEdit->getG4()/100,2,",","."); ?>" size="6" maxlength="10" onKeyPress="return(currencyFormat(this,'.',',',event))"></td>
			<? } ?>
			<? if ($configuracaoXML->getInscricaoOpcao5("PT")) { ?>
			<td align="center">R$<input style="text-align:right" type="edit" class="structFilterBox" name="g5" value="<?= number_format($valoresEdit->getG5()/100,2,",","."); ?>" size="6" maxlength="10" onKeyPress="return(currencyFormat(this,'.',',',event))"></td>
			<? } ?>
			<? if ($configuracaoXML->getInscricaoOpcao6("PT")) { ?>
			<td align="center">R$<input style="text-align:right" type="edit" class="structFilterBox" name="g6" value="<?= number_format($valoresEdit->getG6()/100,2,",","."); ?>" size="6" maxlength="10" onKeyPress="return(currencyFormat(this,'.',',',event))"></td>
			<? } ?>
		</tr>
		<? } ?>
		<? if ($configuracaoXML->getInscricaoCategoriaH("PT")) { ?>
		<tr>
			<td align="right"><b><?=$configuracaoXML->getInscricaoCategoriaH("PT")?></b></td>
			<? if ($configuracaoXML->getInscricaoOpcao1("PT")) { ?>
			<td align="center">R$<input style="text-align:right" type="edit" class="structFilterBox" name="h1" value="<?= number_format($valoresEdit->getH1()/100,2,",","."); ?>" size="6" maxlength="10" onKeyPress="return(currencyFormat(this,'.',',',event))"></td>
			<? } ?>
			<? if ($configuracaoXML->getInscricaoOpcao2("PT")) { ?>
			<td align="center">R$<input style="text-align:right" type="edit" class="structFilterBox" name="h2" value="<?= number_format($valoresEdit->getH2()/100,2,",","."); ?>" size="6" maxlength="10" onKeyPress="return(currencyFormat(this,'.',',',event))"></td>
			<? } ?>
			<? if ($configuracaoXML->getInscricaoOpcao3("PT")) { ?>
			<td align="center">R$<input style="text-align:right" type="edit" class="structFilterBox" name="h3" value="<?= number_format($valoresEdit->getH3()/100,2,",","."); ?>" size="6" maxlength="10" onKeyPress="return(currencyFormat(this,'.',',',event))"></td>
			<? } ?>
			<? if ($configuracaoXML->getInscricaoOpcao4("PT")) { ?>
			<td align="center">R$<input style="text-align:right" type="edit" class="structFilterBox" name="h4" value="<?= number_format($valoresEdit->getH4()/100,2,",","."); ?>" size="6" maxlength="10" onKeyPress="return(currencyFormat(this,'.',',',event))"></td>
			<? } ?>
			<? if ($configuracaoXML->getInscricaoOpcao5("PT")) { ?>
			<td align="center">R$<input style="text-align:right" type="edit" class="structFilterBox" name="h5" value="<?= number_format($valoresEdit->getH5()/100,2,",","."); ?>" size="6" maxlength="10" onKeyPress="return(currencyFormat(this,'.',',',event))"></td>
			<? } ?>
			<? if ($configuracaoXML->getInscricaoOpcao6("PT")) { ?>
			<td align="center">R$<input style="text-align:right" type="edit" class="structFilterBox" name="h6" value="<?= number_format($valoresEdit->getH6()/100,2,",","."); ?>" size="6" maxlength="10" onKeyPress="return(currencyFormat(this,'.',',',event))"></td>
			<? } ?>
		</tr>
		<? } ?>
		<? if ($configuracaoXML->getInscricaoCategoriaI("PT")) { ?>
		<tr>
			<td align="right"><b><?=$configuracaoXML->getInscricaoCategoriaI("PT")?></b></td>
			<? if ($configuracaoXML->getInscricaoOpcao1("PT")) { ?>
			<td align="center">R$<input style="text-align:right" type="edit" class="structFilterBox" name="i1" value="<?= number_format($valoresEdit->getI1()/100,2,",","."); ?>" size="6" maxlength="10" onKeyPress="return(currencyFormat(this,'.',',',event))"></td>
			<? } ?>
			<? if ($configuracaoXML->getInscricaoOpcao2("PT")) { ?>
			<td align="center">R$<input style="text-align:right" type="edit" class="structFilterBox" name="i2" value="<?= number_format($valoresEdit->getI2()/100,2,",","."); ?>" size="6" maxlength="10" onKeyPress="return(currencyFormat(this,'.',',',event))"></td>
			<? } ?>
			<? if ($configuracaoXML->getInscricaoOpcao3("PT")) { ?>
			<td align="center">R$<input style="text-align:right" type="edit" class="structFilterBox" name="i3" value="<?= number_format($valoresEdit->getI3()/100,2,",","."); ?>" size="6" maxlength="10" onKeyPress="return(currencyFormat(this,'.',',',event))"></td>
			<? } ?>
			<? if ($configuracaoXML->getInscricaoOpcao4("PT")) { ?>
			<td align="center">R$<input style="text-align:right" type="edit" class="structFilterBox" name="i4" value="<?= number_format($valoresEdit->getI4()/100,2,",","."); ?>" size="6" maxlength="10" onKeyPress="return(currencyFormat(this,'.',',',event))"></td>
			<? } ?>
			<? if ($configuracaoXML->getInscricaoOpcao5("PT")) { ?>
			<td align="center">R$<input style="text-align:right" type="edit" class="structFilterBox" name="i5" value="<?= number_format($valoresEdit->getI5()/100,2,",","."); ?>" size="6" maxlength="10" onKeyPress="return(currencyFormat(this,'.',',',event))"></td>
			<? } ?>
			<? if ($configuracaoXML->getInscricaoOpcao6("PT")) { ?>
			<td align="center">R$<input style="text-align:right" type="edit" class="structFilterBox" name="i6" value="<?= number_format($valoresEdit->getI6()/100,2,",","."); ?>" size="6" maxlength="10" onKeyPress="return(currencyFormat(this,'.',',',event))"></td>
			<? } ?>
		</tr>
		<? } ?>
		<? if ($configuracaoXML->getInscricaoCategoriaJ("PT")) { ?>
		<tr>
			<td align="right"><b><?=$configuracaoXML->getInscricaoCategoriaJ("PT")?></b></td>
			<? if ($configuracaoXML->getInscricaoOpcao1("PT")) { ?>
			<td align="center">R$<input style="text-align:right" type="edit" class="structFilterBox" name="j1" value="<?= number_format($valoresEdit->getJ1()/100,2,",","."); ?>" size="6" maxlength="10" onKeyPress="return(currencyFormat(this,'.',',',event))"></td>
			<? } ?>
			<? if ($configuracaoXML->getInscricaoOpcao2("PT")) { ?>
			<td align="center">R$<input style="text-align:right" type="edit" class="structFilterBox" name="j2" value="<?= number_format($valoresEdit->getJ2()/100,2,",","."); ?>" size="6" maxlength="10" onKeyPress="return(currencyFormat(this,'.',',',event))"></td>
			<? } ?>
			<? if ($configuracaoXML->getInscricaoOpcao3("PT")) { ?>
			<td align="center">R$<input style="text-align:right" type="edit" class="structFilterBox" name="j3" value="<?= number_format($valoresEdit->getJ3()/100,2,",","."); ?>" size="6" maxlength="10" onKeyPress="return(currencyFormat(this,'.',',',event))"></td>
			<? } ?>
			<? if ($configuracaoXML->getInscricaoOpcao4("PT")) { ?>
			<td align="center">R$<input style="text-align:right" type="edit" class="structFilterBox" name="j4" value="<?= number_format($valoresEdit->getJ4()/100,2,",","."); ?>" size="6" maxlength="10" onKeyPress="return(currencyFormat(this,'.',',',event))"></td>
			<? } ?>
			<? if ($configuracaoXML->getInscricaoOpcao5("PT")) { ?>
			<td align="center">R$<input style="text-align:right" type="edit" class="structFilterBox" name="j5" value="<?= number_format($valoresEdit->getJ5()/100,2,",","."); ?>" size="6" maxlength="10" onKeyPress="return(currencyFormat(this,'.',',',event))"></td>
			<? } ?>
			<? if ($configuracaoXML->getInscricaoOpcao6("PT")) { ?>
			<td align="center">R$<input style="text-align:right" type="edit" class="structFilterBox" name="j6" value="<?= number_format($valoresEdit->getJ6()/100,2,",","."); ?>" size="6" maxlength="10" onKeyPress="return(currencyFormat(this,'.',',',event))"></td>
			<? } ?>
		</tr>
		<? } ?>
		<? if ($configuracaoXML->getInscricaoCategoriaK("PT")) { ?>
		<tr>
			<td align="right"><b><?=$configuracaoXML->getInscricaoCategoriaK("PT")?></b></td>
			<? if ($configuracaoXML->getInscricaoOpcao1("PT")) { ?>
			<td align="center">R$<input style="text-align:right" type="edit" class="structFilterBox" name="k1" value="<?= number_format($valoresEdit->getK1()/100,2,",","."); ?>" size="6" maxlength="10" onKeyPress="return(currencyFormat(this,'.',',',event))"></td>
			<? } ?>
			<? if ($configuracaoXML->getInscricaoOpcao2("PT")) { ?>
			<td align="center">R$<input style="text-align:right" type="edit" class="structFilterBox" name="k2" value="<?= number_format($valoresEdit->getK2()/100,2,",","."); ?>" size="6" maxlength="10" onKeyPress="return(currencyFormat(this,'.',',',event))"></td>
			<? } ?>
			<? if ($configuracaoXML->getInscricaoOpcao3("PT")) { ?>
			<td align="center">R$<input style="text-align:right" type="edit" class="structFilterBox" name="k3" value="<?= number_format($valoresEdit->getK3()/100,2,",","."); ?>" size="6" maxlength="10" onKeyPress="return(currencyFormat(this,'.',',',event))"></td>
			<? } ?>
			<? if ($configuracaoXML->getInscricaoOpcao4("PT")) { ?>
			<td align="center">R$<input style="text-align:right" type="edit" class="structFilterBox" name="k4" value="<?= number_format($valoresEdit->getK4()/100,2,",","."); ?>" size="6" maxlength="10" onKeyPress="return(currencyFormat(this,'.',',',event))"></td>
			<? } ?>
			<? if ($configuracaoXML->getInscricaoOpcao5("PT")) { ?>
			<td align="center">R$<input style="text-align:right" type="edit" class="structFilterBox" name="k5" value="<?= number_format($valoresEdit->getK5()/100,2,",","."); ?>" size="6" maxlength="10" onKeyPress="return(currencyFormat(this,'.',',',event))"></td>
			<? } ?>
			<? if ($configuracaoXML->getInscricaoOpcao6("PT")) { ?>
			<td align="center">R$<input style="text-align:right" type="edit" class="structFilterBox" name="k6" value="<?= number_format($valoresEdit->getK6()/100,2,",","."); ?>" size="6" maxlength="10" onKeyPress="return(currencyFormat(this,'.',',',event))"></td>
			<? } ?>
		</tr>
		<? } ?>
		<? if ($configuracaoXML->getInscricaoCategoriaL("PT")) { ?>
		<tr>
			<td align="right"><b><?=$configuracaoXML->getInscricaoCategoriaL("PT")?></b></td>
			<? if ($configuracaoXML->getInscricaoOpcao1("PT")) { ?>
			<td align="center">R$<input style="text-align:right" type="edit" class="structFilterBox" name="l1" value="<?= number_format($valoresEdit->getL1()/100,2,",","."); ?>" size="6" maxlength="10" onKeyPress="return(currencyFormat(this,'.',',',event))"></td>
			<? } ?>
			<? if ($configuracaoXML->getInscricaoOpcao2("PT")) { ?>
			<td align="center">R$<input style="text-align:right" type="edit" class="structFilterBox" name="l2" value="<?= number_format($valoresEdit->getL2()/100,2,",","."); ?>" size="6" maxlength="10" onKeyPress="return(currencyFormat(this,'.',',',event))"></td>
			<? } ?>
			<? if ($configuracaoXML->getInscricaoOpcao3("PT")) { ?>
			<td align="center">R$<input style="text-align:right" type="edit" class="structFilterBox" name="l3" value="<?= number_format($valoresEdit->getL3()/100,2,",","."); ?>" size="6" maxlength="10" onKeyPress="return(currencyFormat(this,'.',',',event))"></td>
			<? } ?>
			<? if ($configuracaoXML->getInscricaoOpcao4("PT")) { ?>
			<td align="center">R$<input style="text-align:right" type="edit" class="structFilterBox" name="l4" value="<?= number_format($valoresEdit->getL4()/100,2,",","."); ?>" size="6" maxlength="10" onKeyPress="return(currencyFormat(this,'.',',',event))"></td>
			<? } ?>
			<? if ($configuracaoXML->getInscricaoOpcao5("PT")) { ?>
			<td align="center">R$<input style="text-align:right" type="edit" class="structFilterBox" name="l5" value="<?= number_format($valoresEdit->getL5()/100,2,",","."); ?>" size="6" maxlength="10" onKeyPress="return(currencyFormat(this,'.',',',event))"></td>
			<? } ?>
			<? if ($configuracaoXML->getInscricaoOpcao6("PT")) { ?>
			<td align="center">R$<input style="text-align:right" type="edit" class="structFilterBox" name="l6" value="<?= number_format($valoresEdit->getL6()/100,2,",","."); ?>" size="6" maxlength="10" onKeyPress="return(currencyFormat(this,'.',',',event))"></td>
			<? } ?>
		</tr>
		<? } ?>
		<? if ($configuracaoXML->getInscricaoCategoriaM("PT")) { ?>
		<tr>
			<td align="right"><b><?=$configuracaoXML->getInscricaoCategoriaM("PT")?></b></td>
			<? if ($configuracaoXML->getInscricaoOpcao1("PT")) { ?>
			<td align="center">R$<input style="text-align:right" type="edit" class="structFilterBox" name="m1" value="<?= number_format($valoresEdit->getM1()/100,2,",","."); ?>" size="6" maxlength="10" onKeyPress="return(currencyFormat(this,'.',',',event))"></td>
			<? } ?>
			<? if ($configuracaoXML->getInscricaoOpcao2("PT")) { ?>
			<td align="center">R$<input style="text-align:right" type="edit" class="structFilterBox" name="m2" value="<?= number_format($valoresEdit->getM2()/100,2,",","."); ?>" size="6" maxlength="10" onKeyPress="return(currencyFormat(this,'.',',',event))"></td>
			<? } ?>
			<? if ($configuracaoXML->getInscricaoOpcao3("PT")) { ?>
			<td align="center">R$<input style="text-align:right" type="edit" class="structFilterBox" name="m3" value="<?= number_format($valoresEdit->getM3()/100,2,",","."); ?>" size="6" maxlength="10" onKeyPress="return(currencyFormat(this,'.',',',event))"></td>
			<? } ?>
			<? if ($configuracaoXML->getInscricaoOpcao4("PT")) { ?>
			<td align="center">R$<input style="text-align:right" type="edit" class="structFilterBox" name="m4" value="<?= number_format($valoresEdit->getM4()/100,2,",","."); ?>" size="6" maxlength="10" onKeyPress="return(currencyFormat(this,'.',',',event))"></td>
			<? } ?>
			<? if ($configuracaoXML->getInscricaoOpcao5("PT")) { ?>
			<td align="center">R$<input style="text-align:right" type="edit" class="structFilterBox" name="m5" value="<?= number_format($valoresEdit->getM5()/100,2,",","."); ?>" size="6" maxlength="10" onKeyPress="return(currencyFormat(this,'.',',',event))"></td>
			<? } ?>
			<? if ($configuracaoXML->getInscricaoOpcao6("PT")) { ?>
			<td align="center">R$<input style="text-align:right" type="edit" class="structFilterBox" name="m6" value="<?= number_format($valoresEdit->getM6()/100,2,",","."); ?>" size="6" maxlength="10" onKeyPress="return(currencyFormat(this,'.',',',event))"></td>
			<? } ?>
		</tr>
		<? } ?>
		<? if ($configuracaoXML->getInscricaoCategoriaN("PT")) { ?>
		<tr>
			<td align="right"><b><?=$configuracaoXML->getInscricaoCategoriaN("PT")?></b></td>
			<? if ($configuracaoXML->getInscricaoOpcao1("PT")) { ?>
			<td align="center">R$<input style="text-align:right" type="edit" class="structFilterBox" name="n1" value="<?= number_format($valoresEdit->getN1()/100,2,",","."); ?>" size="6" maxlength="10" onKeyPress="return(currencyFormat(this,'.',',',event))"></td>
			<? } ?>
			<? if ($configuracaoXML->getInscricaoOpcao2("PT")) { ?>
			<td align="center">R$<input style="text-align:right" type="edit" class="structFilterBox" name="n2" value="<?= number_format($valoresEdit->getN2()/100,2,",","."); ?>" size="6" maxlength="10" onKeyPress="return(currencyFormat(this,'.',',',event))"></td>
			<? } ?>
			<? if ($configuracaoXML->getInscricaoOpcao3("PT")) { ?>
			<td align="center">R$<input style="text-align:right" type="edit" class="structFilterBox" name="n3" value="<?= number_format($valoresEdit->getN3()/100,2,",","."); ?>" size="6" maxlength="10" onKeyPress="return(currencyFormat(this,'.',',',event))"></td>
			<? } ?>
			<? if ($configuracaoXML->getInscricaoOpcao4("PT")) { ?>
			<td align="center">R$<input style="text-align:right" type="edit" class="structFilterBox" name="n4" value="<?= number_format($valoresEdit->getN4()/100,2,",","."); ?>" size="6" maxlength="10" onKeyPress="return(currencyFormat(this,'.',',',event))"></td>
			<? } ?>
			<? if ($configuracaoXML->getInscricaoOpcao5("PT")) { ?>
			<td align="center">R$<input style="text-align:right" type="edit" class="structFilterBox" name="n5" value="<?= number_format($valoresEdit->getN5()/100,2,",","."); ?>" size="6" maxlength="10" onKeyPress="return(currencyFormat(this,'.',',',event))"></td>
			<? } ?>
			<? if ($configuracaoXML->getInscricaoOpcao6("PT")) { ?>
			<td align="center">R$<input style="text-align:right" type="edit" class="structFilterBox" name="n6" value="<?= number_format($valoresEdit->getN6()/100,2,",","."); ?>" size="6" maxlength="10" onKeyPress="return(currencyFormat(this,'.',',',event))"></td>
			<? } ?>
		</tr>
		<? } ?>
		<? if ($configuracaoXML->getInscricaoCategoriaO("PT")) { ?>
		<tr>
			<td align="right"><b><?=$configuracaoXML->getInscricaoCategoriaO("PT")?></b></td>
			<? if ($configuracaoXML->getInscricaoOpcao1("PT")) { ?>
			<td align="center">R$<input style="text-align:right" type="edit" class="structFilterBox" name="o1" value="<?= number_format($valoresEdit->getO1()/100,2,",","."); ?>" size="6" maxlength="10" onKeyPress="return(currencyFormat(this,'.',',',event))"></td>
			<? } ?>
			<? if ($configuracaoXML->getInscricaoOpcao2("PT")) { ?>
			<td align="center">R$<input style="text-align:right" type="edit" class="structFilterBox" name="o2" value="<?= number_format($valoresEdit->getO2()/100,2,",","."); ?>" size="6" maxlength="10" onKeyPress="return(currencyFormat(this,'.',',',event))"></td>
			<? } ?>
			<? if ($configuracaoXML->getInscricaoOpcao3("PT")) { ?>
			<td align="center">R$<input style="text-align:right" type="edit" class="structFilterBox" name="o3" value="<?= number_format($valoresEdit->getO3()/100,2,",","."); ?>" size="6" maxlength="10" onKeyPress="return(currencyFormat(this,'.',',',event))"></td>
			<? } ?>
			<? if ($configuracaoXML->getInscricaoOpcao4("PT")) { ?>
			<td align="center">R$<input style="text-align:right" type="edit" class="structFilterBox" name="o4" value="<?= number_format($valoresEdit->getO4()/100,2,",","."); ?>" size="6" maxlength="10" onKeyPress="return(currencyFormat(this,'.',',',event))"></td>
			<? } ?>
			<? if ($configuracaoXML->getInscricaoOpcao5("PT")) { ?>
			<td align="center">R$<input style="text-align:right" type="edit" class="structFilterBox" name="o5" value="<?= number_format($valoresEdit->getO5()/100,2,",","."); ?>" size="6" maxlength="10" onKeyPress="return(currencyFormat(this,'.',',',event))"></td>
			<? } ?>
			<? if ($configuracaoXML->getInscricaoOpcao6("PT")) { ?>
			<td align="center">R$<input style="text-align:right" type="edit" class="structFilterBox" name="o6" value="<?= number_format($valoresEdit->getO6()/100,2,",","."); ?>" size="6" maxlength="10" onKeyPress="return(currencyFormat(this,'.',',',event))"></td>
			<? } ?>
		</tr>
		<? } ?>
		<? if ($configuracaoXML->getInscricaoCategoriaP("PT")) { ?>
		<tr>
			<td align="right"><b><?=$configuracaoXML->getInscricaoCategoriaP("PT")?></b></td>
			<? if ($configuracaoXML->getInscricaoOpcao1("PT")) { ?>
			<td align="center">R$<input style="text-align:right" type="edit" class="structFilterBox" name="p1" value="<?= number_format($valoresEdit->getP1()/100,2,",","."); ?>" size="6" maxlength="10" onKeyPress="return(currencyFormat(this,'.',',',event))"></td>
			<? } ?>
			<? if ($configuracaoXML->getInscricaoOpcao2("PT")) { ?>
			<td align="center">R$<input style="text-align:right" type="edit" class="structFilterBox" name="p2" value="<?= number_format($valoresEdit->getP2()/100,2,",","."); ?>" size="6" maxlength="10" onKeyPress="return(currencyFormat(this,'.',',',event))"></td>
			<? } ?>
			<? if ($configuracaoXML->getInscricaoOpcao3("PT")) { ?>
			<td align="center">R$<input style="text-align:right" type="edit" class="structFilterBox" name="p3" value="<?= number_format($valoresEdit->getP3()/100,2,",","."); ?>" size="6" maxlength="10" onKeyPress="return(currencyFormat(this,'.',',',event))"></td>
			<? } ?>
			<? if ($configuracaoXML->getInscricaoOpcao4("PT")) { ?>
			<td align="center">R$<input style="text-align:right" type="edit" class="structFilterBox" name="p4" value="<?= number_format($valoresEdit->getP4()/100,2,",","."); ?>" size="6" maxlength="10" onKeyPress="return(currencyFormat(this,'.',',',event))"></td>
			<? } ?>
			<? if ($configuracaoXML->getInscricaoOpcao5("PT")) { ?>
			<td align="center">R$<input style="text-align:right" type="edit" class="structFilterBox" name="p5" value="<?= number_format($valoresEdit->getP5()/100,2,",","."); ?>" size="6" maxlength="10" onKeyPress="return(currencyFormat(this,'.',',',event))"></td>
			<? } ?>
			<? if ($configuracaoXML->getInscricaoOpcao6("PT")) { ?>
			<td align="center">R$<input style="text-align:right" type="edit" class="structFilterBox" name="p6" value="<?= number_format($valoresEdit->getP6()/100,2,",","."); ?>" size="6" maxlength="10" onKeyPress="return(currencyFormat(this,'.',',',event))"></td>
			<? } ?>
		</tr>
		<? } ?>
		<? if ($configuracaoXML->getInscricaoCategoriaQ("PT")) { ?>
		<tr>
			<td align="right"><b><?=$configuracaoXML->getInscricaoCategoriaQ("PT")?></b></td>
			<? if ($configuracaoXML->getInscricaoOpcao1("PT")) { ?>
			<td align="center">R$<input style="text-align:right" type="edit" class="structFilterBox" name="q1" value="<?= number_format($valoresEdit->getQ1()/100,2,",","."); ?>" size="6" maxlength="10" onKeyPress="return(currencyFormat(this,'.',',',event))"></td>
			<? } ?>
			<? if ($configuracaoXML->getInscricaoOpcao2("PT")) { ?>
			<td align="center">R$<input style="text-align:right" type="edit" class="structFilterBox" name="q2" value="<?= number_format($valoresEdit->getQ2()/100,2,",","."); ?>" size="6" maxlength="10" onKeyPress="return(currencyFormat(this,'.',',',event))"></td>
			<? } ?>
			<? if ($configuracaoXML->getInscricaoOpcao3("PT")) { ?>
			<td align="center">R$<input style="text-align:right" type="edit" class="structFilterBox" name="q3" value="<?= number_format($valoresEdit->getQ3()/100,2,",","."); ?>" size="6" maxlength="10" onKeyPress="return(currencyFormat(this,'.',',',event))"></td>
			<? } ?>
			<? if ($configuracaoXML->getInscricaoOpcao4("PT")) { ?>
			<td align="center">R$<input style="text-align:right" type="edit" class="structFilterBox" name="q4" value="<?= number_format($valoresEdit->getQ4()/100,2,",","."); ?>" size="6" maxlength="10" onKeyPress="return(currencyFormat(this,'.',',',event))"></td>
			<? } ?>
			<? if ($configuracaoXML->getInscricaoOpcao5("PT")) { ?>
			<td align="center">R$<input style="text-align:right" type="edit" class="structFilterBox" name="q5" value="<?= number_format($valoresEdit->getQ5()/100,2,",","."); ?>" size="6" maxlength="10" onKeyPress="return(currencyFormat(this,'.',',',event))"></td>
			<? } ?>
			<? if ($configuracaoXML->getInscricaoOpcao6("PT")) { ?>
			<td align="center">R$<input style="text-align:right" type="edit" class="structFilterBox" name="q6" value="<?= number_format($valoresEdit->getQ6()/100,2,",","."); ?>" size="6" maxlength="10" onKeyPress="return(currencyFormat(this,'.',',',event))"></td>
			<? } ?>
		</tr>
		<? } ?>
		<? if ($configuracaoXML->getInscricaoCategoriaR("PT")) { ?>
		<tr>
			<td align="right"><b><?=$configuracaoXML->getInscricaoCategoriaR("PT")?></b></td>
			<? if ($configuracaoXML->getInscricaoOpcao1("PT")) { ?>
			<td align="center">R$<input style="text-align:right" type="edit" class="structFilterBox" name="r1" value="<?= number_format($valoresEdit->getR1()/100,2,",","."); ?>" size="6" maxlength="10" onKeyPress="return(currencyFormat(this,'.',',',event))"></td>
			<? } ?>
			<? if ($configuracaoXML->getInscricaoOpcao2("PT")) { ?>
			<td align="center">R$<input style="text-align:right" type="edit" class="structFilterBox" name="r2" value="<?= number_format($valoresEdit->getR2()/100,2,",","."); ?>" size="6" maxlength="10" onKeyPress="return(currencyFormat(this,'.',',',event))"></td>
			<? } ?>
			<? if ($configuracaoXML->getInscricaoOpcao3("PT")) { ?>
			<td align="center">R$<input style="text-align:right" type="edit" class="structFilterBox" name="r3" value="<?= number_format($valoresEdit->getR3()/100,2,",","."); ?>" size="6" maxlength="10" onKeyPress="return(currencyFormat(this,'.',',',event))"></td>
			<? } ?>
			<? if ($configuracaoXML->getInscricaoOpcao4("PT")) { ?>
			<td align="center">R$<input style="text-align:right" type="edit" class="structFilterBox" name="r4" value="<?= number_format($valoresEdit->getR4()/100,2,",","."); ?>" size="6" maxlength="10" onKeyPress="return(currencyFormat(this,'.',',',event))"></td>
			<? } ?>
			<? if ($configuracaoXML->getInscricaoOpcao5("PT")) { ?>
			<td align="center">R$<input style="text-align:right" type="edit" class="structFilterBox" name="r5" value="<?= number_format($valoresEdit->getR5()/100,2,",","."); ?>" size="6" maxlength="10" onKeyPress="return(currencyFormat(this,'.',',',event))"></td>
			<? } ?>
			<? if ($configuracaoXML->getInscricaoOpcao6("PT")) { ?>
			<td align="center">R$<input style="text-align:right" type="edit" class="structFilterBox" name="r6" value="<?= number_format($valoresEdit->getR6()/100,2,",","."); ?>" size="6" maxlength="10" onKeyPress="return(currencyFormat(this,'.',',',event))"></td>
			<? } ?>
		</tr>
		<? } ?>
		<? if ($configuracaoXML->getInscricaoCategoriaS("PT")) { ?>
		<tr>
			<td align="right"><b><?=$configuracaoXML->getInscricaoCategoriaS("PT")?></b></td>
			<? if ($configuracaoXML->getInscricaoOpcao1("PT")) { ?>
			<td align="center">R$<input style="text-align:right" type="edit" class="structFilterBox" name="s1" value="<?= number_format($valoresEdit->getS1()/100,2,",","."); ?>" size="6" maxlength="10" onKeyPress="return(currencyFormat(this,'.',',',event))"></td>
			<? } ?>
			<? if ($configuracaoXML->getInscricaoOpcao2("PT")) { ?>
			<td align="center">R$<input style="text-align:right" type="edit" class="structFilterBox" name="s2" value="<?= number_format($valoresEdit->getS2()/100,2,",","."); ?>" size="6" maxlength="10" onKeyPress="return(currencyFormat(this,'.',',',event))"></td>
			<? } ?>
			<? if ($configuracaoXML->getInscricaoOpcao3("PT")) { ?>
			<td align="center">R$<input style="text-align:right" type="edit" class="structFilterBox" name="s3" value="<?= number_format($valoresEdit->getS3()/100,2,",","."); ?>" size="6" maxlength="10" onKeyPress="return(currencyFormat(this,'.',',',event))"></td>
			<? } ?>
			<? if ($configuracaoXML->getInscricaoOpcao4("PT")) { ?>
			<td align="center">R$<input style="text-align:right" type="edit" class="structFilterBox" name="s4" value="<?= number_format($valoresEdit->getS4()/100,2,",","."); ?>" size="6" maxlength="10" onKeyPress="return(currencyFormat(this,'.',',',event))"></td>
			<? } ?>
			<? if ($configuracaoXML->getInscricaoOpcao5("PT")) { ?>
			<td align="center">R$<input style="text-align:right" type="edit" class="structFilterBox" name="s5" value="<?= number_format($valoresEdit->getS5()/100,2,",","."); ?>" size="6" maxlength="10" onKeyPress="return(currencyFormat(this,'.',',',event))"></td>
			<? } ?>
			<? if ($configuracaoXML->getInscricaoOpcao6("PT")) { ?>
			<td align="center">R$<input style="text-align:right" type="edit" class="structFilterBox" name="s6" value="<?= number_format($valoresEdit->getS6()/100,2,",","."); ?>" size="6" maxlength="10" onKeyPress="return(currencyFormat(this,'.',',',event))"></td>
			<? } ?>
		</tr>
		<? } ?>
		<? if ($configuracaoXML->getInscricaoCategoriaT("PT")) { ?>
		<tr>
			<td align="right"><b><?=$configuracaoXML->getInscricaoCategoriaT("PT")?></b></td>
			<? if ($configuracaoXML->getInscricaoOpcao1("PT")) { ?>
			<td align="center">R$<input style="text-align:right" type="edit" class="structFilterBox" name="t1" value="<?= number_format($valoresEdit->getT1()/100,2,",","."); ?>" size="6" maxlength="10" onKeyPress="return(currencyFormat(this,'.',',',event))"></td>
			<? } ?>
			<? if ($configuracaoXML->getInscricaoOpcao2("PT")) { ?>
			<td align="center">R$<input style="text-align:right" type="edit" class="structFilterBox" name="t2" value="<?= number_format($valoresEdit->getT2()/100,2,",","."); ?>" size="6" maxlength="10" onKeyPress="return(currencyFormat(this,'.',',',event))"></td>
			<? } ?>
			<? if ($configuracaoXML->getInscricaoOpcao3("PT")) { ?>
			<td align="center">R$<input style="text-align:right" type="edit" class="structFilterBox" name="t3" value="<?= number_format($valoresEdit->getT3()/100,2,",","."); ?>" size="6" maxlength="10" onKeyPress="return(currencyFormat(this,'.',',',event))"></td>
			<? } ?>
			<? if ($configuracaoXML->getInscricaoOpcao4("PT")) { ?>
			<td align="center">R$<input style="text-align:right" type="edit" class="structFilterBox" name="t4" value="<?= number_format($valoresEdit->getT4()/100,2,",","."); ?>" size="6" maxlength="10" onKeyPress="return(currencyFormat(this,'.',',',event))"></td>
			<? } ?>
			<? if ($configuracaoXML->getInscricaoOpcao5("PT")) { ?>
			<td align="center">R$<input style="text-align:right" type="edit" class="structFilterBox" name="t5" value="<?= number_format($valoresEdit->getT5()/100,2,",","."); ?>" size="6" maxlength="10" onKeyPress="return(currencyFormat(this,'.',',',event))"></td>
			<? } ?>
			<? if ($configuracaoXML->getInscricaoOpcao6("PT")) { ?>
			<td align="center">R$<input style="text-align:right" type="edit" class="structFilterBox" name="t6" value="<?= number_format($valoresEdit->getT6()/100,2,",","."); ?>" size="6" maxlength="10" onKeyPress="return(currencyFormat(this,'.',',',event))"></td>
			<? } ?>
		</tr>
		<? } ?>
		<? if ($configuracaoXML->getInscricaoCategoriaU("PT")) { ?>
		<tr>
			<td align="right"><b><?=$configuracaoXML->getInscricaoCategoriaU("PT")?></b></td>
			<? if ($configuracaoXML->getInscricaoOpcao1("PT")) { ?>
			<td align="center">R$<input style="text-align:right" type="edit" class="structFilterBox" name="u1" value="<?= number_format($valoresEdit->getU1()/100,2,",","."); ?>" size="6" maxlength="10" onKeyPress="return(currencyFormat(this,'.',',',event))"></td>
			<? } ?>
			<? if ($configuracaoXML->getInscricaoOpcao2("PT")) { ?>
			<td align="center">R$<input style="text-align:right" type="edit" class="structFilterBox" name="u2" value="<?= number_format($valoresEdit->getU2()/100,2,",","."); ?>" size="6" maxlength="10" onKeyPress="return(currencyFormat(this,'.',',',event))"></td>
			<? } ?>
			<? if ($configuracaoXML->getInscricaoOpcao3("PT")) { ?>
			<td align="center">R$<input style="text-align:right" type="edit" class="structFilterBox" name="u3" value="<?= number_format($valoresEdit->getU3()/100,2,",","."); ?>" size="6" maxlength="10" onKeyPress="return(currencyFormat(this,'.',',',event))"></td>
			<? } ?>
			<? if ($configuracaoXML->getInscricaoOpcao4("PT")) { ?>
			<td align="center">R$<input style="text-align:right" type="edit" class="structFilterBox" name="u4" value="<?= number_format($valoresEdit->getU4()/100,2,",","."); ?>" size="6" maxlength="10" onKeyPress="return(currencyFormat(this,'.',',',event))"></td>
			<? } ?>
			<? if ($configuracaoXML->getInscricaoOpcao5("PT")) { ?>
			<td align="center">R$<input style="text-align:right" type="edit" class="structFilterBox" name="u5" value="<?= number_format($valoresEdit->getU5()/100,2,",","."); ?>" size="6" maxlength="10" onKeyPress="return(currencyFormat(this,'.',',',event))"></td>
			<? } ?>
			<? if ($configuracaoXML->getInscricaoOpcao6("PT")) { ?>
			<td align="center">R$<input style="text-align:right" type="edit" class="structFilterBox" name="u6" value="<?= number_format($valoresEdit->getU6()/100,2,",","."); ?>" size="6" maxlength="10" onKeyPress="return(currencyFormat(this,'.',',',event))"></td>
			<? } ?>
		</tr>
		<? } ?>
		<? if ($configuracaoXML->getInscricaoCategoriaV("PT")) { ?>
		<tr>
			<td align="right"><b><?=$configuracaoXML->getInscricaoCategoriaV("PT")?></b></td>
			<? if ($configuracaoXML->getInscricaoOpcao1("PT")) { ?>
			<td align="center">R$<input style="text-align:right" type="edit" class="structFilterBox" name="v1" value="<?= number_format($valoresEdit->getV1()/100,2,",","."); ?>" size="6" maxlength="10" onKeyPress="return(currencyFormat(this,'.',',',event))"></td>
			<? } ?>
			<? if ($configuracaoXML->getInscricaoOpcao2("PT")) { ?>
			<td align="center">R$<input style="text-align:right" type="edit" class="structFilterBox" name="v2" value="<?= number_format($valoresEdit->getV2()/100,2,",","."); ?>" size="6" maxlength="10" onKeyPress="return(currencyFormat(this,'.',',',event))"></td>
			<? } ?>
			<? if ($configuracaoXML->getInscricaoOpcao3("PT")) { ?>
			<td align="center">R$<input style="text-align:right" type="edit" class="structFilterBox" name="v3" value="<?= number_format($valoresEdit->getV3()/100,2,",","."); ?>" size="6" maxlength="10" onKeyPress="return(currencyFormat(this,'.',',',event))"></td>
			<? } ?>
			<? if ($configuracaoXML->getInscricaoOpcao4("PT")) { ?>
			<td align="center">R$<input style="text-align:right" type="edit" class="structFilterBox" name="v4" value="<?= number_format($valoresEdit->getV4()/100,2,",","."); ?>" size="6" maxlength="10" onKeyPress="return(currencyFormat(this,'.',',',event))"></td>
			<? } ?>
			<? if ($configuracaoXML->getInscricaoOpcao5("PT")) { ?>
			<td align="center">R$<input style="text-align:right" type="edit" class="structFilterBox" name="v5" value="<?= number_format($valoresEdit->getV5()/100,2,",","."); ?>" size="6" maxlength="10" onKeyPress="return(currencyFormat(this,'.',',',event))"></td>
			<? } ?>
			<? if ($configuracaoXML->getInscricaoOpcao6("PT")) { ?>
			<td align="center">R$<input style="text-align:right" type="edit" class="structFilterBox" name="v6" value="<?= number_format($valoresEdit->getV6()/100,2,",","."); ?>" size="6" maxlength="10" onKeyPress="return(currencyFormat(this,'.',',',event))"></td>
			<? } ?>
		</tr>
		<? } ?>
		<? if ($configuracaoXML->getInscricaoCategoriaW("PT")) { ?>
		<tr>
			<td align="right"><b><?=$configuracaoXML->getInscricaoCategoriaW("PT")?></b></td>
			<? if ($configuracaoXML->getInscricaoOpcao1("PT")) { ?>
			<td align="center">R$<input style="text-align:right" type="edit" class="structFilterBox" name="w1" value="<?= number_format($valoresEdit->getW1()/100,2,",","."); ?>" size="6" maxlength="10" onKeyPress="return(currencyFormat(this,'.',',',event))"></td>
			<? } ?>
			<? if ($configuracaoXML->getInscricaoOpcao2("PT")) { ?>
			<td align="center">R$<input style="text-align:right" type="edit" class="structFilterBox" name="w2" value="<?= number_format($valoresEdit->getW2()/100,2,",","."); ?>" size="6" maxlength="10" onKeyPress="return(currencyFormat(this,'.',',',event))"></td>
			<? } ?>
			<? if ($configuracaoXML->getInscricaoOpcao3("PT")) { ?>
			<td align="center">R$<input style="text-align:right" type="edit" class="structFilterBox" name="w3" value="<?= number_format($valoresEdit->getW3()/100,2,",","."); ?>" size="6" maxlength="10" onKeyPress="return(currencyFormat(this,'.',',',event))"></td>
			<? } ?>
			<? if ($configuracaoXML->getInscricaoOpcao4("PT")) { ?>
			<td align="center">R$<input style="text-align:right" type="edit" class="structFilterBox" name="w4" value="<?= number_format($valoresEdit->getW4()/100,2,",","."); ?>" size="6" maxlength="10" onKeyPress="return(currencyFormat(this,'.',',',event))"></td>
			<? } ?>
			<? if ($configuracaoXML->getInscricaoOpcao5("PT")) { ?>
			<td align="center">R$<input style="text-align:right" type="edit" class="structFilterBox" name="w5" value="<?= number_format($valoresEdit->getW5()/100,2,",","."); ?>" size="6" maxlength="10" onKeyPress="return(currencyFormat(this,'.',',',event))"></td>
			<? } ?>
			<? if ($configuracaoXML->getInscricaoOpcao6("PT")) { ?>
			<td align="center">R$<input style="text-align:right" type="edit" class="structFilterBox" name="w6" value="<?= number_format($valoresEdit->getW6()/100,2,",","."); ?>" size="6" maxlength="10" onKeyPress="return(currencyFormat(this,'.',',',event))"></td>
			<? } ?>
		</tr>
		<? } ?>
		<? if ($configuracaoXML->getInscricaoCategoriaX("PT")) { ?>
		<tr>
			<td align="right"><b><?=$configuracaoXML->getInscricaoCategoriaX("PT")?></b></td>
			<? if ($configuracaoXML->getInscricaoOpcao1("PT")) { ?>
			<td align="center">R$<input style="text-align:right" type="edit" class="structFilterBox" name="x1" value="<?= number_format($valoresEdit->getX1()/100,2,",","."); ?>" size="6" maxlength="10" onKeyPress="return(currencyFormat(this,'.',',',event))"></td>
			<? } ?>
			<? if ($configuracaoXML->getInscricaoOpcao2("PT")) { ?>
			<td align="center">R$<input style="text-align:right" type="edit" class="structFilterBox" name="x2" value="<?= number_format($valoresEdit->getX2()/100,2,",","."); ?>" size="6" maxlength="10" onKeyPress="return(currencyFormat(this,'.',',',event))"></td>
			<? } ?>
			<? if ($configuracaoXML->getInscricaoOpcao3("PT")) { ?>
			<td align="center">R$<input style="text-align:right" type="edit" class="structFilterBox" name="x3" value="<?= number_format($valoresEdit->getX3()/100,2,",","."); ?>" size="6" maxlength="10" onKeyPress="return(currencyFormat(this,'.',',',event))"></td>
			<? } ?>
			<? if ($configuracaoXML->getInscricaoOpcao4("PT")) { ?>
			<td align="center">R$<input style="text-align:right" type="edit" class="structFilterBox" name="x4" value="<?= number_format($valoresEdit->getX4()/100,2,",","."); ?>" size="6" maxlength="10" onKeyPress="return(currencyFormat(this,'.',',',event))"></td>
			<? } ?>
			<? if ($configuracaoXML->getInscricaoOpcao5("PT")) { ?>
			<td align="center">R$<input style="text-align:right" type="edit" class="structFilterBox" name="x5" value="<?= number_format($valoresEdit->getX5()/100,2,",","."); ?>" size="6" maxlength="10" onKeyPress="return(currencyFormat(this,'.',',',event))"></td>
			<? } ?>
			<? if ($configuracaoXML->getInscricaoOpcao6("PT")) { ?>
			<td align="center">R$<input style="text-align:right" type="edit" class="structFilterBox" name="x6" value="<?= number_format($valoresEdit->getX6()/100,2,",","."); ?>" size="6" maxlength="10" onKeyPress="return(currencyFormat(this,'.',',',event))"></td>
			<? } ?>
		</tr>
		<? } ?>
		<? if ($configuracaoXML->getInscricaoCategoriaY("PT")) { ?>
		<tr>
			<td align="right"><b><?=$configuracaoXML->getInscricaoCategoriaY("PT")?></b></td>
			<? if ($configuracaoXML->getInscricaoOpcao1("PT")) { ?>
			<td align="center">R$<input style="text-align:right" type="edit" class="structFilterBox" name="y1" value="<?= number_format($valoresEdit->getY1()/100,2,",","."); ?>" size="6" maxlength="10" onKeyPress="return(currencyFormat(this,'.',',',event))"></td>
			<? } ?>
			<? if ($configuracaoXML->getInscricaoOpcao2("PT")) { ?>
			<td align="center">R$<input style="text-align:right" type="edit" class="structFilterBox" name="y2" value="<?= number_format($valoresEdit->getY2()/100,2,",","."); ?>" size="6" maxlength="10" onKeyPress="return(currencyFormat(this,'.',',',event))"></td>
			<? } ?>
			<? if ($configuracaoXML->getInscricaoOpcao3("PT")) { ?>
			<td align="center">R$<input style="text-align:right" type="edit" class="structFilterBox" name="y3" value="<?= number_format($valoresEdit->getY3()/100,2,",","."); ?>" size="6" maxlength="10" onKeyPress="return(currencyFormat(this,'.',',',event))"></td>
			<? } ?>
			<? if ($configuracaoXML->getInscricaoOpcao4("PT")) { ?>
			<td align="center">R$<input style="text-align:right" type="edit" class="structFilterBox" name="y4" value="<?= number_format($valoresEdit->getY4()/100,2,",","."); ?>" size="6" maxlength="10" onKeyPress="return(currencyFormat(this,'.',',',event))"></td>
			<? } ?>
			<? if ($configuracaoXML->getInscricaoOpcao5("PT")) { ?>
			<td align="center">R$<input style="text-align:right" type="edit" class="structFilterBox" name="y5" value="<?= number_format($valoresEdit->getY5()/100,2,",","."); ?>" size="6" maxlength="10" onKeyPress="return(currencyFormat(this,'.',',',event))"></td>
			<? } ?>
			<? if ($configuracaoXML->getInscricaoOpcao6("PT")) { ?>
			<td align="center">R$<input style="text-align:right" type="edit" class="structFilterBox" name="y6" value="<?= number_format($valoresEdit->getY6()/100,2,",","."); ?>" size="6" maxlength="10" onKeyPress="return(currencyFormat(this,'.',',',event))"></td>
			<? } ?>
		</tr>
		<? } ?>
		<? if ($configuracaoXML->getInscricaoCategoriaZ("PT")) { ?>
		<tr>
			<td align="right"><b><?=$configuracaoXML->getInscricaoCategoriaZ("PT")?></b></td>
			<? if ($configuracaoXML->getInscricaoOpcao1("PT")) { ?>
			<td align="center">R$<input style="text-align:right" type="edit" class="structFilterBox" name="z1" value="<?= number_format($valoresEdit->getZ1()/100,2,",","."); ?>" size="6" maxlength="10" onKeyPress="return(currencyFormat(this,'.',',',event))"></td>
			<? } ?>
			<? if ($configuracaoXML->getInscricaoOpcao2("PT")) { ?>
			<td align="center">R$<input style="text-align:right" type="edit" class="structFilterBox" name="z2" value="<?= number_format($valoresEdit->getZ2()/100,2,",","."); ?>" size="6" maxlength="10" onKeyPress="return(currencyFormat(this,'.',',',event))"></td>
			<? } ?>
			<? if ($configuracaoXML->getInscricaoOpcao3("PT")) { ?>
			<td align="center">R$<input style="text-align:right" type="edit" class="structFilterBox" name="z3" value="<?= number_format($valoresEdit->getZ3()/100,2,",","."); ?>" size="6" maxlength="10" onKeyPress="return(currencyFormat(this,'.',',',event))"></td>
			<? } ?>
			<? if ($configuracaoXML->getInscricaoOpcao4("PT")) { ?>
			<td align="center">R$<input style="text-align:right" type="edit" class="structFilterBox" name="z4" value="<?= number_format($valoresEdit->getZ4()/100,2,",","."); ?>" size="6" maxlength="10" onKeyPress="return(currencyFormat(this,'.',',',event))"></td>
			<? } ?>
			<? if ($configuracaoXML->getInscricaoOpcao5("PT")) { ?>
			<td align="center">R$<input style="text-align:right" type="edit" class="structFilterBox" name="z5" value="<?= number_format($valoresEdit->getZ5()/100,2,",","."); ?>" size="6" maxlength="10" onKeyPress="return(currencyFormat(this,'.',',',event))"></td>
			<? } ?>
			<? if ($configuracaoXML->getInscricaoOpcao6("PT")) { ?>
			<td align="center">R$<input style="text-align:right" type="edit" class="structFilterBox" name="z6" value="<?= number_format($valoresEdit->getZ6()/100,2,",","."); ?>" size="6" maxlength="10" onKeyPress="return(currencyFormat(this,'.',',',event))"></td>
			<? } ?>
		</tr>
		<? } ?>
		</table>
		<br><br>
		<input type="submit" class="structFilterButton" value="Salvar Tabela">
		</form>
	</td>
</tr>
</table>



<? include_once("struct/struct_bottom.php")?>