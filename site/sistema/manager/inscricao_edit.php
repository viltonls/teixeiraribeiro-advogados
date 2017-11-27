<? include_once("struct/auth.php")?>
<?
if (!session_is_registered("evento")) { 
	header("Location: session_seleciona_evento.php?url=inscricao_edit.php&orga_id=0&configurado=1");
} else {

include_once("struct/struct_top.php");

include_once('../classes/class.configuracao.php');
include_once('../classes/class.inscricao.php');
include_once('../classes/service.inscricao.php');

$inscricao = new Inscricao();

/* @var $eventoConfiguracaoAtual Configuracao */
/* @var $eventoConfiguracaoXMLAtual ConfiguracaoXML */

/* Tratamento de Erro */
if ($_REQUEST['id']) {
	$inscricaoService = new InscricaoService();
	$inscricao = $inscricaoService->loadInscricaoById($_REQUEST['id'],$eventoAtual->getID());
	if (!$inscricao->getID()) {
		echo "<span class='structFilter'>";
		echo "Erro: Inscricao não encontrada no BD.<br>";
		break;
		echo "</span>";
	}
}

?>

<script language="JavaScript">

function validateForm(theForm)
{
  if (!validRequired(theForm.nome,"Nome"))
    return false;
  return true;
}

</script>

<?
if ($_REQUEST['id']) {
	$calendar1Day = date("d",strtotime($inscricao->getDATA()));
	$calendar1Month = date("m",strtotime($inscricao->getDATA())) - 1;
	$calendar1Year = date("Y",strtotime($inscricao->getDATA()));
	$calendar2Day = date("d",strtotime($inscricao->getNASCIMENTO()));
	$calendar2Month = date("m",strtotime($inscricao->getNASCIMENTO())) - 1;
	$calendar2Year = date("Y",strtotime($inscricao->getNASCIMENTO()));
} else {
	$calendar1Day = date('d');
	$calendar1Month = date('m')-1;
	$calendar1Year = date('Y');
	$calendar2Day = date('d');
	$calendar2Month = date('m')-1;
	$calendar2Year = date('Y');
}
$calendarMinDate = 1900;
$calendarMaxDate = 2020;
include_once("struct/struct_calendar.php");
?>

<div class="structTitle">Editar Inscrição 
	<?	$id_len = strlen($inscricao->getID());
		switch ($eventoAtual->getID())
		{
			case 19:
				if ($id_len == 2)
				{
					echo '2'.$inscricao->getID();
				}
				else
				{
					echo '20'.$inscricao->getID();
				}
			break;
			case 20:
				if ($id_len == 2)
				{
					echo '3'.$inscricao->getID();
				}
				else
				{
					echo '30'.$inscricao->getID();
				}
			break;
			case 21:
				if ($id_len == 2)
				{
					echo '4'.$inscricao->getID();
				}
				else
				{
					echo '40'.$inscricao->getID();
				}
			break;
			case 22:
				if ($id_len == 2)
				{
					echo '5'.$inscricao->getID();
				}
				else
				{
					echo '50'.$inscricao->getID();
				}
			break;
			case 27:
				if ($id_len == 2)
				{
					echo '6'.$inscricao->getID();
				}
				else
				{
					echo '60'.$inscricao->getID();
				}
			break;
			case 28:
				if ($id_len == 2)
				{
					echo '7'.$inscricao->getID();
				}
				else
				{
					echo '70'.$inscricao->getID();
				}
			break;
			case 29:
				if ($id_len == 2)
				{
					echo '8'.$inscricao->getID();
				}
				else
				{
					echo '80'.$inscricao->getID();
				}
			break;
			case 30:
				if ($id_len == 2)
				{
					echo '9'.$inscricao->getID();
				}
				else
				{
					echo '90'.$inscricao->getID();
				}
			break;
			
			default:
				echo $inscricao->getID();
		}
	?>
</div>

<div style="padding-top:8px;"></div>

<form action="inscricao_edit_xp.php" method="POST" class="form.nospace" onSubmit="return validateForm(this)" onKeyPress="return event.keyCode!=13" name="theForm">
<input type="hidden" name="id" value="<?= $inscricao->getID() ?>">
<input type="hidden" name="even_id" value="<?= $eventoAtual->getID() ?>">
<input type="hidden" name="redirect" id="redirect" value="list">
<table border="0" cellpadding="0" cellspacing="0" width="100%">
<tr>
	<td width="45%" valign="top">
		<table cellpadding="2" cellspacing="2" border="0">
		<tr>
			<td class="structFilter" colspan="2"><u>Dados de Identificação</u></td>
		</tr>
		<tr>
			<td class="structFilter" width="25%">Nome Completo</td>
			<td class="structFilter"><input type="edit" class="structFilterBox" name="nome" id="nome" value="<?= $inscricao->getNOME()?>" onKeyUp="javascript:setUpperCase(this);" onBlur="javascript:document.getElementById('cracha').value = getFirstName('nome')" size="50" maxlength="200"></td>
		</tr>
		<tr>
			<td class="structFilter">Nome Crachá</td>
			<td class="structFilter"><input type="edit" class="structFilterBox" name="cracha" id="cracha" value="<?= $inscricao->getCRACHA()?>" onKeyUp="javascript:setUpperCase(this);" size="20" maxlength="200"></td>
		</tr>
		<tr>
			<td class="structFilter">Sexo</td>
			<td class="structFilter">
				<select class="structFilterBox" name="sexo">
					<option value="" <?= ($inscricao->getSEXO()=="") ? "selected" : "";?>> Não informado</option>
					<option value="f" <?= ($inscricao->getSEXO()=="f") ? "selected" : "";?>> Feminino</option>
					<option value="m" <?= ($inscricao->getSEXO()=="m") ? "selected" : "";?>> Masculino</option>
				</select>
			</td>
		</tr>
		<tr>
			<td class="structFilter">Data de Nascimento</td>
			<td class="structFilter" colspan="3">
				<select name="diaData2" id="selDay2" onChange="changeDate2()" style="vertical-align:middle" class="structFilterBox">
					<? for ($i = 1; $i <= 31; $i++) { ?>
					<option value="<?=$i?>"><?=$i?></option>
					<? } ?>
				</select>
				<select name="mesData2" id="selMonth2" onChange="changeDate2()" style="vertical-align:middle" class="structFilterBox">
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
				<select name="anoData2" id="selYear2" onChange="changeDate2()" style="vertical-align:middle" class="structFilterBox">
					<? for ($i = $calendarMinDate; $i <= $calendarMaxDate; $i++) { ?>
					<option value="<?=$i?>"><?=$i?></option>
					<? } ?>
				</select>
				<a href="javascript:void(null)" onClick="showCalendar2()"><img id="dateLink2" src="img/pdate.gif" border="0" style="vertical-align:middle;margin-left:5px"/></a>
				
			</td>
		</tr>
		<tr>
			<td class="structFilter">CPF/Passaporte</td>
			<td class="structFilter"><input type="edit" class="structFilterBox" name="cpf_passaporte" value="<?= $inscricao->getCPF_PASSAPORTE()?>" onKeyUp="javascript:setUpperCase(this);" size="20" maxlength="20"></td>
		</tr>
		<tr>
			<td class="structFilter">Registro Prof.</td>
			<td class="structFilter"><input type="edit" class="structFilterBox" name="registro_prof" value="<?= $inscricao->getREGISTRO_PROF()?>" onKeyUp="javascript:setUpperCase(this);" size="20" maxlength="20"></td>
		</tr>
		<tr>
			<td class="structFilter">Especialidade</td>
			<td class="structFilter"><input type="edit" class="structFilterBox" name="especialidade" value="<?= $inscricao->getESPECIALIDADE()?>" onKeyUp="javascript:setUpperCase(this);" size="20" maxlength="50"></td>
		</tr>
		<tr>
			<td class="structFilter">Acompanhante</td>
			<td class="structFilter" valign="bottom">
				<table cellpadding="0" cellspacing="0" border="0"><tr><td>
				<input type="edit" class="structFilterBox" name="acomp" value="<?= $inscricao->getACOMP()?>" onKeyUp="javascript:setUpperCase(this);" size="20" maxlength="50" onBlur="if (this.value.length > 0) {document.getElementById('acompanhante_check').checked = true;} else {document.getElementById('acompanhante_check').checked = false};ajaxValorInscricao();">
				</td><td>
				<input disabled type="checkbox" name="acompanhante_check" id="acompanhante_check" <?= ($inscricao->getACOMP()) ? "checked" : "";?>>
				</td></tr></table>
			</td>
		</tr>
		<tr>
			<td class="structFilter" colspan="2"><u>Dados de Contato</u></td>
		</tr>
		<tr>
			<td class="structFilter">Email</td>
			<td class="structFilter"><input type="edit" class="structFilterBox" name="email" value="<?= $inscricao->getEMAIL()?>" onKeyUp="javascript:setLowerCase(this);" size="50" maxlength="50"></td>
		</tr>
		<tr>
			<td class="structFilter">Telefones</td>
			<td class="structFilter">
				DDI <input type="edit" class="structFilterBox" name="ddi" value="<?= $inscricao->getDDI()?>" size="1" maxlength="3">
				DDD <input type="edit" class="structFilterBox" name="ddd" value="<?= $inscricao->getDDD()?>" size="1" maxlength="3">
				Tel. <input type="edit" class="structFilterBox" name="fone" value="<?= $inscricao->getFONE()?>" size="10" maxlength="10">
			</td>
		</tr>
		<tr>
			<td class="structFilter"> </td>
			<td class="structFilter">
				Cel. <input type="edit" class="structFilterBox" name="celular" value="<?= $inscricao->getCELULAR()?>" size="10" maxlength="10">
				&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
				Fax <input type="edit" class="structFilterBox" name="fax" value="<?= $inscricao->getFAX()?>" size="10" maxlength="10">
			</td>
		</tr>
		<tr>
			<td class="structFilter">Endereço</td>
			<td class="structFilter"><input type="edit" class="structFilterBox" name="endereco" value="<?= $inscricao->getENDERECO()?>" onKeyUp="javascript:setUpperCase(this);" size="50" maxlength="50"></td>
		</tr>
		<tr>
			<td class="structFilter">Bairro</td>
			<td class="structFilter"><input type="edit" class="structFilterBox" name="bairro" value="<?= $inscricao->getBAIRRO()?>" onKeyUp="javascript:setUpperCase(this);" size="50" maxlength="50"></td>
		</tr>
		<tr>
			<td class="structFilter">CEP</td>
			<td class="structFilter"><input type="edit" class="structFilterBox" name="cep" value="<?= $inscricao->getCEP()?>" size="10" maxlength="9" onKeyPress="return txtBoxFormat(this.form, 'cep', '99999-999', event);"></td>
		</tr>
		<tr>
			<td class="structFilter">Cidade</td>
			<td class="structFilter"><input type="edit" class="structFilterBox" name="cidade" value="<?= $inscricao->getCIDADE()?>" onKeyUp="javascript:setUpperCase(this);" size="50" maxlength="50"></td>
		</tr>
		<tr>
			<td class="structFilter">Estado</td>
			<td class="structFilter"><input type="edit" class="structFilterBox" name="estado" value="<?= $inscricao->getESTADO()?>" onKeyUp="javascript:setUpperCase(this);" size="50" maxlength="50"></td>
		</tr>
		<tr>
			<td class="structFilter">País</td>
			<td class="structFilter"><input type="edit" class="structFilterBox" name="pais" value="<?= $inscricao->getPAIS()?>" onKeyUp="javascript:setUpperCase(this);" size="50" maxlength="50"></td>
		</tr>
		<tr>
			<td class="structFilter" colspan="2"><u>Dados Profissionais</u></td>
		</tr>
		<tr>
			<td class="structFilter">Organização</td>
			<td class="structFilter"><input type="edit" class="structFilterBox" name="org_nome" value="<?= $inscricao->getORG_NOME()?>" onKeyUp="javascript:setUpperCase(this);" size="40" maxlength="50"></td>
		</tr>
		<tr>
			<td class="structFilter">Cargo</td>
			<td class="structFilter"><input type="edit" class="structFilterBox" name="org_cargo" value="<?= $inscricao->getORG_CARGO()?>" onKeyUp="javascript:setUpperCase(this);" size="40" maxlength="50"></td>
		</tr>
		<tr>
			<td class="structFilter">Telefone</td>
			<td class="structFilter"><input type="edit" class="structFilterBox" name="org_fone" value="<?= $inscricao->getORG_FONE()?>" onKeyUp="javascript:setUpperCase(this);" size="10" maxlength="20"></td>
		</tr>
		<tr>
			<td class="structFilter">CNPJ</td>
			<td class="structFilter"><input type="edit" class="structFilterBox" name="org_cnpj" value="<?= $inscricao->getORG_CNPJ()?>" size="19" maxlength="18" onKeyPress="return txtBoxFormat(this.form, 'org_cnpj', '99.999.999/9999-99', event);"></td>
		</tr>
		<tr>
			<td class="structFilter">Endereço</td>
			<td class="structFilter"><input type="edit" class="structFilterBox" name="org_endereco" value="<?= $inscricao->getORG_ENDERECO()?>" onKeyUp="javascript:setUpperCase(this);" size="40" maxlength="50"></td>
		</tr>
		<tr>
			<td class="structFilter">Cidade</td>
			<td class="structFilter"><input type="edit" class="structFilterBox" name="org_cidade" value="<?= $inscricao->getORG_CIDADE()?>" onKeyUp="javascript:setUpperCase(this);" size="40" maxlength="50"></td>
		</tr>
		<tr>
			<td class="structFilter">Website</td>
			<td class="structFilter">http:// <input type="edit" class="structFilterBox" name="org_website" value="<?= $inscricao->getORG_WEBSITE()?>" onKeyUp="javascript:setUpperCase(this);" size="40" maxlength="50"></td>
		</tr>
		
		</table>
	</td>
	<td width="55%" valign="top">
		
		<table border="0" cellpadding="2" cellspacing="0">
		<tr>
			<td class="structFilter" colspan="4"><u>Dados da Inscrição</u></td>
		</tr>
		<tr>
			<td class="structFilter" width="28%">Status</td>
			<td class="structFilter" colspan="3">
			<!--	//"Aguardando Pgto", "Efetuada", "Pendente", "Reservada", "Presente", "Ausente"-->
				<select class="structFilterBox" name="status">
					<option value="0" <?= ($inscricao->getSTATUS()=="0") ? "selected" : "";?>> Nova</option>
					<option value="1" <?= ($inscricao->getSTATUS()=="1") ? "selected" : "";?>> Pendente</option>
					<option value="2" <?= ($inscricao->getSTATUS()=="2") ? "selected" : "";?>> Pré-Reserva</option>
					<option value="5" <?= ($inscricao->getSTATUS()=="5") ? "selected" : "";?>> Confirmada</option>
					<option value="8" <?= ($inscricao->getSTATUS()=="8") ? "selected" : "";?>> Ausente</option>
					<option value="9" <?= ($inscricao->getSTATUS()=="9") ? "selected" : "";?>> Presente</option>
					<option value="x" <?= ($inscricao->getSTATUS()=="x") ? "selected" : "";?>> Excluída</option>
				</select>
			</td>
		</tr>
		<tr>
			<td class="structFilter">Origem</td>
			<td class="structFilter">
				<select class="structFilterBox" name="origem">
					<option value="i" <?= ($inscricao->getORIGEM()=="i") ? "selected" : "";?>> Interno</option>
					<option value="s" <?= ($inscricao->getORIGEM()=="s") ? "selected" : "";?>> Site</option>
					<option value="l" <?= ($inscricao->getORIGEM()=="l") ? "selected" : "";?>> Local</option>
				</select>
			</td>
			<td class="structFilter" colspan="2">ID Externo: <input type="edit" class="structFilterBox" name="id_externo" value="<?= $inscricao->getID_EXTERNO()?>" size="10" maxlength="10" readonly></td>
		</tr>
		<tr>
			<td class="structFilter">Data da Inscrição</td>
			<td class="structFilter" colspan="3">
				<select name="diaData1" id="selDay1" onChange="changeDate1();ajaxValorInscricao()" style="vertical-align:middle" class="structFilterBox">
					<? for ($i = 1; $i <= 31; $i++) { ?>
					<option value="<?=$i?>"><?=$i?></option>
					<? } ?>
				</select>
				<select name="mesData1" id="selMonth1" onChange="changeDate1();ajaxValorInscricao()" style="vertical-align:middle" class="structFilterBox">
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
				<select name="anoData1" id="selYear1" onChange="changeDate1();ajaxValorInscricao()" style="vertical-align:middle" class="structFilterBox">
					<? for ($i = $calendarMinDate; $i <= $calendarMaxDate; $i++) { ?>
					<option value="<?=$i?>"><?=$i?></option>
					<? } ?>
				</select>
				<a href="javascript:void(null)" onClick="showCalendar1()"><img id="dateLink1" src="img/pdate.gif" border="0" style="vertical-align:middle;margin-left:5px"/></a>
				
			</td>

		</tr>
		<tr>
			<td class="structFilter" width="28%">Categoria</td>
			<td class="structFilter" colspan="3">
				<select class="structFilterBox" name="categoria" id="categoria" onChange="javascript:ajaxValorInscricao();">
					<? if ($eventoConfiguracaoXMLAtual->getInscricaoCategoriaA("PT")) { ?>
					<option value="a" <?= ($inscricao->getCATEGORIA()=="a") ? "selected" : "";?>><?= $eventoConfiguracaoXMLAtual->getInscricaoCategoriaA("PT"); ?></option>
					<? } ?>
					<? if ($eventoConfiguracaoXMLAtual->getInscricaoCategoriaB("PT")) { ?>
					<option value="b" <?= ($inscricao->getCATEGORIA()=="b") ? "selected" : "";?>><?= $eventoConfiguracaoXMLAtual->getInscricaoCategoriaB("PT"); ?></option>
					<? } ?>
					<? if ($eventoConfiguracaoXMLAtual->getInscricaoCategoriaC("PT")) { ?>
					<option value="c" <?= ($inscricao->getCATEGORIA()=="c") ? "selected" : "";?>><?= $eventoConfiguracaoXMLAtual->getInscricaoCategoriaC("PT"); ?></option>
					<? } ?>
					<? if ($eventoConfiguracaoXMLAtual->getInscricaoCategoriaD("PT")) { ?>
					<option value="d" <?= ($inscricao->getCATEGORIA()=="d") ? "selected" : "";?>><?= $eventoConfiguracaoXMLAtual->getInscricaoCategoriaD("PT"); ?></option>
					<? } ?>
					<? if ($eventoConfiguracaoXMLAtual->getInscricaoCategoriaE("PT")) { ?>
					<option value="e" <?= ($inscricao->getCATEGORIA()=="e") ? "selected" : "";?>><?= $eventoConfiguracaoXMLAtual->getInscricaoCategoriaE("PT"); ?></option>
					<? } ?>
					<? if ($eventoConfiguracaoXMLAtual->getInscricaoCategoriaF("PT")) { ?>
					<option value="f" <?= ($inscricao->getCATEGORIA()=="f") ? "selected" : "";?>><?= $eventoConfiguracaoXMLAtual->getInscricaoCategoriaF("PT"); ?></option>
					<? } ?>
					<? if ($eventoConfiguracaoXMLAtual->getInscricaoCategoriaG("PT")) { ?>
					<option value="g" <?= ($inscricao->getCATEGORIA()=="g") ? "selected" : "";?>><?= $eventoConfiguracaoXMLAtual->getInscricaoCategoriaG("PT"); ?></option>
					<? } ?>
					<? if ($eventoConfiguracaoXMLAtual->getInscricaoCategoriaH("PT")) { ?>
					<option value="h" <?= ($inscricao->getCATEGORIA()=="h") ? "selected" : "";?>><?= $eventoConfiguracaoXMLAtual->getInscricaoCategoriaH("PT"); ?></option>
					<? } ?>
					<? if ($eventoConfiguracaoXMLAtual->getInscricaoCategoriaI("PT")) { ?>
					<option value="i" <?= ($inscricao->getCATEGORIA()=="i") ? "selected" : "";?>><?= $eventoConfiguracaoXMLAtual->getInscricaoCategoriaI("PT"); ?></option>
					<? } ?>
					<? if ($eventoConfiguracaoXMLAtual->getInscricaoCategoriaJ("PT")) { ?>
					<option value="j" <?= ($inscricao->getCATEGORIA()=="j") ? "selected" : "";?>><?= $eventoConfiguracaoXMLAtual->getInscricaoCategoriaJ("PT"); ?></option>
					<? } ?>
					<? if ($eventoConfiguracaoXMLAtual->getInscricaoCategoriaK("PT")) { ?>
					<option value="k" <?= ($inscricao->getCATEGORIA()=="k") ? "selected" : "";?>><?= $eventoConfiguracaoXMLAtual->getInscricaoCategoriaK("PT"); ?></option>
					<? } ?>
					<? if ($eventoConfiguracaoXMLAtual->getInscricaoCategoriaL("PT")) { ?>
					<option value="l" <?= ($inscricao->getCATEGORIA()=="l") ? "selected" : "";?>><?= $eventoConfiguracaoXMLAtual->getInscricaoCategoriaL("PT"); ?></option>
					<? } ?>
					<? if ($eventoConfiguracaoXMLAtual->getInscricaoCategoriaM("PT")) { ?>
					<option value="m" <?= ($inscricao->getCATEGORIA()=="m") ? "selected" : "";?>><?= $eventoConfiguracaoXMLAtual->getInscricaoCategoriaM("PT"); ?></option>
					<? } ?>
					<? if ($eventoConfiguracaoXMLAtual->getInscricaoCategoriaN("PT")) { ?>
					<option value="n" <?= ($inscricao->getCATEGORIA()=="n") ? "selected" : "";?>><?= $eventoConfiguracaoXMLAtual->getInscricaoCategoriaN("PT"); ?></option>
					<? } ?>
					<? if ($eventoConfiguracaoXMLAtual->getInscricaoCategoriaO("PT")) { ?>
					<option value="o" <?= ($inscricao->getCATEGORIA()=="o") ? "selected" : "";?>><?= $eventoConfiguracaoXMLAtual->getInscricaoCategoriaO("PT"); ?></option>
					<? } ?>
					<? if ($eventoConfiguracaoXMLAtual->getInscricaoCategoriaP("PT")) { ?>
					<option value="p" <?= ($inscricao->getCATEGORIA()=="p") ? "selected" : "";?>><?= $eventoConfiguracaoXMLAtual->getInscricaoCategoriaP("PT"); ?></option>
					<? } ?>
					<? if ($eventoConfiguracaoXMLAtual->getInscricaoCategoriaQ("PT")) { ?>
					<option value="q" <?= ($inscricao->getCATEGORIA()=="q") ? "selected" : "";?>><?= $eventoConfiguracaoXMLAtual->getInscricaoCategoriaQ("PT"); ?></option>
					<? } ?>
					<? if ($eventoConfiguracaoXMLAtual->getInscricaoCategoriaR("PT")) { ?>
					<option value="r" <?= ($inscricao->getCATEGORIA()=="r") ? "selected" : "";?>><?= $eventoConfiguracaoXMLAtual->getInscricaoCategoriaR("PT"); ?></option>
					<? } ?>
					<? if ($eventoConfiguracaoXMLAtual->getInscricaoCategoriaS("PT")) { ?>
					<option value="s" <?= ($inscricao->getCATEGORIA()=="s") ? "selected" : "";?>><?= $eventoConfiguracaoXMLAtual->getInscricaoCategoriaS("PT"); ?></option>
					<? } ?>
					<? if ($eventoConfiguracaoXMLAtual->getInscricaoCategoriaT("PT")) { ?>
					<option value="t" <?= ($inscricao->getCATEGORIA()=="t") ? "selected" : "";?>><?= $eventoConfiguracaoXMLAtual->getInscricaoCategoriaT("PT"); ?></option>
					<? } ?>
					<? if ($eventoConfiguracaoXMLAtual->getInscricaoCategoriaU("PT")) { ?>
					<option value="u" <?= ($inscricao->getCATEGORIA()=="u") ? "selected" : "";?>><?= $eventoConfiguracaoXMLAtual->getInscricaoCategoriaU("PT"); ?></option>
					<? } ?>
					<? if ($eventoConfiguracaoXMLAtual->getInscricaoCategoriaV("PT")) { ?>
					<option value="v" <?= ($inscricao->getCATEGORIA()=="v") ? "selected" : "";?>><?= $eventoConfiguracaoXMLAtual->getInscricaoCategoriaV("PT"); ?></option>
					<? } ?>
					<? if ($eventoConfiguracaoXMLAtual->getInscricaoCategoriaW("PT")) { ?>
					<option value="w" <?= ($inscricao->getCATEGORIA()=="w") ? "selected" : "";?>><?= $eventoConfiguracaoXMLAtual->getInscricaoCategoriaW("PT"); ?></option>
					<? } ?>
					<? if ($eventoConfiguracaoXMLAtual->getInscricaoCategoriaX("PT")) { ?>
					<option value="x" <?= ($inscricao->getCATEGORIA()=="x") ? "selected" : "";?>><?= $eventoConfiguracaoXMLAtual->getInscricaoCategoriaX("PT"); ?></option>
					<? } ?>
					<? if ($eventoConfiguracaoXMLAtual->getInscricaoCategoriaY("PT")) { ?>
					<option value="y" <?= ($inscricao->getCATEGORIA()=="y") ? "selected" : "";?>><?= $eventoConfiguracaoXMLAtual->getInscricaoCategoriaY("PT"); ?></option>
					<? } ?>
					<? if ($eventoConfiguracaoXMLAtual->getInscricaoCategoriaZ("PT")) { ?>
					<option value="z" <?= ($inscricao->getCATEGORIA()=="z") ? "selected" : "";?>><?= $eventoConfiguracaoXMLAtual->getInscricaoCategoriaZ("PT"); ?></option>
					<? } ?>
				</select>
			</td>
		</tr>
		<tr>
			<td class="structFilter" width="28%">Opção</td>
			<td class="structFilter" colspan="3">
				<select class="structFilterBox" name="tipo" id="tipo" onChange="javascript:ajaxValorInscricao();">
					<? if ($eventoConfiguracaoXMLAtual->getInscricaoOpcao1("PT")) { ?>
					<option value="1" <?= ($inscricao->getTIPO()=="1") ? "selected" : "";?>><?= $eventoConfiguracaoXMLAtual->getInscricaoOpcao1("PT"); ?></option>
					<? } ?>
					<? if ($eventoConfiguracaoXMLAtual->getInscricaoOpcao2("PT")) { ?>
					<option value="2" <?= ($inscricao->getTIPO()=="2") ? "selected" : "";?>><?= $eventoConfiguracaoXMLAtual->getInscricaoOpcao2("PT"); ?></option>
					<? } ?>
					<? if ($eventoConfiguracaoXMLAtual->getInscricaoOpcao3("PT")) { ?>
					<option value="3" <?= ($inscricao->getTIPO()=="3") ? "selected" : "";?>><?= $eventoConfiguracaoXMLAtual->getInscricaoOpcao3("PT"); ?></option>
					<? } ?>
					<? if ($eventoConfiguracaoXMLAtual->getInscricaoOpcao4("PT")) { ?>
					<option value="4" <?= ($inscricao->getTIPO()=="4") ? "selected" : "";?>><?= $eventoConfiguracaoXMLAtual->getInscricaoOpcao4("PT"); ?></option>
					<? } ?>
					<? if ($eventoConfiguracaoXMLAtual->getInscricaoOpcao5("PT")) { ?>
					<option value="5" <?= ($inscricao->getTIPO()=="5") ? "selected" : "";?>><?= $eventoConfiguracaoXMLAtual->getInscricaoOpcao5("PT"); ?></option>
					<? } ?>
					<? if ($eventoConfiguracaoXMLAtual->getInscricaoOpcao6("PT")) { ?>
					<option value="6" <?= ($inscricao->getTIPO()=="6") ? "selected" : "";?>><?= $eventoConfiguracaoXMLAtual->getInscricaoOpcao6("PT"); ?></option>
					<? } ?>
				</select>
			</td>
		</tr>
		<script language="javascript">
			function getCal1Date() {
				return YAHOO.example.calendar.cal1.getSelectedDates()[0].getDate()+'/'+(YAHOO.example.calendar.cal1.getSelectedDates()[0].getMonth()+1)+'/'+YAHOO.example.calendar.cal1.getSelectedDates()[0].getFullYear();
			}
			
			function ajaxValorInscricao() {
				cursos = "";
				for (curso=1; curso<=30; curso++) {
					if (document.getElementById('curso_'+curso) && document.getElementById('curso_'+curso).checked) cursos += curso + ',';
				}
				even_id = <?=$eventoAtual->getId()?>;
				data = getCal1Date();
				acompanhante = document.getElementById('acompanhante_check');
				opcao = document.getElementById('tipo');
				categoria = document.getElementById('categoria');

				//alert('ajax_calcula_inscricao.php?even_id='+even_id+'&data='+data+'&opcao='+opcao.options[opcao.selectedIndex].value+'&categoria='+categoria.options[categoria.selectedIndex].value+'&acompanhante='+acompanhante.checked+'&cursos='+cursos);
				ajaxedit('ajax_calcula_inscricao.php?even_id='+even_id+'&data='+data+'&opcao='+opcao.options[opcao.selectedIndex].value+'&categoria='+categoria.options[categoria.selectedIndex].value+'&acompanhante='+acompanhante.checked+'&cursos='+cursos,'valor');
			}
		</script>
		<tr>
			<td class="structFilter">
				Valor
				(<a href="javascript:ajaxValorInscricao();">atualizar</a>)
				<!--<input type="edit" value="" id="valorTmp" name="ajax_edit"><br>-->
				<!--<div id="valorTmp"></div>-->
			</td>
			<td class="structFilter">
				R$<input style="text-align:right" type="edit" class="structFilterBox" name="valor" id="valor" value="<?= number_format($inscricao->getVALOR()/100,2,",","."); ?>" size="5" maxlength="10" onKeyPress="return(currencyFormat(this,'.',',',event))">
			</td>
			<td class="structFilter">
				<select class="structFilterBox" name="status_pgto" id="status_pgto" onChange="javascript:status_pgto = document.getElementById('status_pgto');if (status_pgto.options[status_pgto.selectedIndex].value=='g') document.getElementById('valor').value='0,00';">
					<option value="a" <?= ($inscricao->getSTATUS_PGTO()=="a") ? "selected" : "";?>> Aguarda Pagamento</option>
					<option value="c" <?= ($inscricao->getSTATUS_PGTO()=="c") ? "selected" : "";?>> Aguarda Confirmação</option>
					<option value="o" <?= ($inscricao->getSTATUS_PGTO()=="o") ? "selected" : "";?>> Pagamento OK</option>
					<option value="g" <?= ($inscricao->getSTATUS_PGTO()=="g") ? "selected" : "";?>> Cortesia</option>
				</select>
			</td>
			<td class="structFilter">
				<select class="structFilterBox" name="forma_pgto">
					<option value="d" <?= ($inscricao->getFORMA_PGTO()=="d") ? "selected" : "";?>>Depósito</option>
					<option value="b" <?= ($inscricao->getFORMA_PGTO()=="b") ? "selected" : "";?>>Boleto</option>
					<option value="c" <?= ($inscricao->getFORMA_PGTO()=="c") ? "selected" : "";?>>Cheque</option>
					<option value="n" <?= ($inscricao->getFORMA_PGTO()=="n") ? "selected" : "";?>>Dinheiro</option>
					<option value="m" <?= ($inscricao->getFORMA_PGTO()=="m") ? "selected" : "";?>>Cartão MC</option>
					<option value="v" <?= ($inscricao->getFORMA_PGTO()=="v") ? "selected" : "";?>>Cartão VISA</option>
					<option value="a" <?= ($inscricao->getFORMA_PGTO()=="a") ? "selected" : "";?>>Cartão AMEX</option>
				</select>
			</td>
		</tr>

		<tr>
			<td class="structFilter" colspan="4"><u>Campos Especiais</u></td>
		</tr>

		<? if ($eventoConfiguracaoXMLAtual->getInscricaoTexto1("PT")) { ?>
		<tr>
			<td class="structFilter"><?=$eventoConfiguracaoXMLAtual->getInscricaoTexto1()?></td>
			<td class="structFilter" colspan="3"><input type="edit" class="structFilterBox" name="texto_1" value="<?= $inscricao->getTEXTO_1()?>" onKeyUp="javascript:setUpperCase(this);" size="40" maxlength="50"></td>
		</tr>
		<? } ?>
		<? if ($eventoConfiguracaoXMLAtual->getInscricaoTexto2("PT")) { ?>
		<tr>
			<td class="structFilter"><?=$eventoConfiguracaoXMLAtual->getInscricaoTexto2()?></td>
			<td class="structFilter" colspan="3"><input type="edit" class="structFilterBox" name="texto_2" value="<?= $inscricao->getTEXTO_2()?>" onKeyUp="javascript:setUpperCase(this);" size="40" maxlength="50"></td>
		</tr>
		<? } ?>
		<? if ($eventoConfiguracaoXMLAtual->getInscricaoTexto3("PT")) { ?>
		<tr>
			<td class="structFilter"><?=$eventoConfiguracaoXMLAtual->getInscricaoTexto3()?></td>
			<td class="structFilter" colspan="3"><input type="edit" class="structFilterBox" name="texto_3" value="<?= $inscricao->getTEXTO_3()?>" onKeyUp="javascript:setUpperCase(this);" size="40" maxlength="50"></td>
		</tr>
		<? } ?>
		<? if ($eventoConfiguracaoXMLAtual->getInscricaoTexto4("PT")) { ?>
		<tr>
			<td class="structFilter"><?=$eventoConfiguracaoXMLAtual->getInscricaoTexto4()?></td>
			<td class="structFilter" colspan="3"><input type="edit" class="structFilterBox" name="texto_4" value="<?= $inscricao->getTEXTO_4()?>" onKeyUp="javascript:setUpperCase(this);" size="40" maxlength="50"></td>
		</tr>
		<? } ?>
		<? if ($eventoConfiguracaoXMLAtual->getInscricaoTexto5("PT")) { ?>
		<tr>
			<td class="structFilter"><?=$eventoConfiguracaoXMLAtual->getInscricaoTexto5()?></td>
			<td class="structFilter" colspan="3"><input type="edit" class="structFilterBox" name="texto_5" value="<?= $inscricao->getTEXTO_5()?>" onKeyUp="javascript:setUpperCase(this);" size="40" maxlength="50"></td>
		</tr>
		<? } ?>
		<? if ($eventoConfiguracaoXMLAtual->getInscricaoTexto6("PT")) { ?>
		<tr>
			<td class="structFilter"><?=$eventoConfiguracaoXMLAtual->getInscricaoTexto6()?></td>
			<td class="structFilter" colspan="3"><input type="edit" class="structFilterBox" name="texto_6" value="<?= $inscricao->getTEXTO_6()?>" onKeyUp="javascript:setUpperCase(this);" size="40" maxlength="50"></td>
		</tr>
		<? } ?>
		<? if ($eventoConfiguracaoXMLAtual->getInscricaoTexto7("PT")) { ?>
		<tr>
			<td class="structFilter"><?=$eventoConfiguracaoXMLAtual->getInscricaoTexto7()?></td>
			<td class="structFilter" colspan="3"><input type="edit" class="structFilterBox" name="texto_7" value="<?= $inscricao->getTEXTO_7()?>" onKeyUp="javascript:setUpperCase(this);" size="40" maxlength="50"></td>
		</tr>
		<? } ?>
		<? if ($eventoConfiguracaoXMLAtual->getInscricaoTexto8("PT")) { ?>
		<tr>
			<td class="structFilter"><?=$eventoConfiguracaoXMLAtual->getInscricaoTexto8()?></td>
			<td class="structFilter" colspan="3"><input type="edit" class="structFilterBox" name="texto_8" value="<?= $inscricao->getTEXTO_8()?>" onKeyUp="javascript:setUpperCase(this);" size="40" maxlength="50"></td>
		</tr>
		<? } ?>
		<? if ($eventoConfiguracaoXMLAtual->getInscricaoTexto9("PT")) { ?>
		<tr>
			<td class="structFilter"><?=$eventoConfiguracaoXMLAtual->getInscricaoTexto9()?></td>
			<td class="structFilter" colspan="3"><input type="edit" class="structFilterBox" name="texto_9" value="<?= $inscricao->getTEXTO_9()?>" onKeyUp="javascript:setUpperCase(this);" size="40" maxlength="50"></td>
		</tr>
		<? } ?>
		<? if ($eventoConfiguracaoXMLAtual->getInscricaoTexto10("PT")) { ?>
		<tr>
			<td class="structFilter"><?=$eventoConfiguracaoXMLAtual->getInscricaoTexto10()?></td>
			<td class="structFilter" colspan="3"><input type="edit" class="structFilterBox" name="texto_10" value="<?= $inscricao->getTEXTO_10()?>" onKeyUp="javascript:setUpperCase(this);" size="40" maxlength="50"></td>
		</tr>
		<? } ?>
		
		<tr>
			<td class="structFilter" valign="top"><u>Opções Especiais</u></td>
			<td class="structFilter" colspan="3">
				<table cellpadding="0" cellspacing="0" border="0">
				
				<? if ($eventoConfiguracaoXMLAtual->getInscricaoBool1("PT")) { ?>
				<tr>
					<td class="structFilter"><input type="checkbox" name="bool_1" id="bool_1" <?= ($inscricao->getBOOL_1()) ? "checked" : "";?>></td>
					<td class="structFilter"><label for="bool_1"><?= $eventoConfiguracaoXMLAtual->getInscricaoBool1("PT"); ?></label></td>
				</tr>
				<? } ?>
				<? if ($eventoConfiguracaoXMLAtual->getInscricaoBool2("PT")) { ?>
				<tr>
					<td class="structFilter"><input type="checkbox" name="bool_2" id="bool_2" <?= ($inscricao->getBOOL_2()) ? "checked" : "";?>></td>
					<td class="structFilter"><label for="bool_2"><?= $eventoConfiguracaoXMLAtual->getInscricaoBool2("PT"); ?></label></td>
				</tr>
				<? } ?>
				<? if ($eventoConfiguracaoXMLAtual->getInscricaoBool3("PT")) { ?>
				<tr>
					<td class="structFilter"><input type="checkbox" name="bool_3" id="bool_3" <?= ($inscricao->getBOOL_3()) ? "checked" : "";?>></td>
					<td class="structFilter"><label for="bool_3"><?= $eventoConfiguracaoXMLAtual->getInscricaoBool3("PT"); ?></label></td>
				</tr>
				<? } ?>
				<? if ($eventoConfiguracaoXMLAtual->getInscricaoBool4("PT")) { ?>
				<tr>
					<td class="structFilter"><input type="checkbox" name="bool_4" id="bool_4" <?= ($inscricao->getBOOL_4()) ? "checked" : "";?>></td>
					<td class="structFilter"><label for="bool_4"><?= $eventoConfiguracaoXMLAtual->getInscricaoBool4("PT"); ?></label></td>
				</tr>
				<? } ?>
				<? if ($eventoConfiguracaoXMLAtual->getInscricaoBool5("PT")) { ?>
				<tr>
					<td class="structFilter"><input type="checkbox" name="bool_5" id="bool_5" <?= ($inscricao->getBOOL_5()) ? "checked" : "";?>></td>
					<td class="structFilter"><label for="bool_5"><?= $eventoConfiguracaoXMLAtual->getInscricaoBool5("PT"); ?></label></td>
				</tr>
				<? } ?>
				<? if ($eventoConfiguracaoXMLAtual->getInscricaoBool6("PT")) { ?>
				<tr>
					<td class="structFilter"><input type="checkbox" name="bool_6" id="bool_6" <?= ($inscricao->getBOOL_6()) ? "checked" : "";?>></td>
					<td class="structFilter"><label for="bool_6"><?= $eventoConfiguracaoXMLAtual->getInscricaoBool6("PT"); ?></label></td>
				</tr>
				<? } ?>
				<? if ($eventoConfiguracaoXMLAtual->getInscricaoBool7("PT")) { ?>
				<tr>
					<td class="structFilter"><input type="checkbox" name="bool_7" id="bool_7" <?= ($inscricao->getBOOL_7()) ? "checked" : "";?>></td>
					<td class="structFilter"><label for="bool_7"><?= $eventoConfiguracaoXMLAtual->getInscricaoBool7("PT"); ?></label></td>
				</tr>
				<? } ?>
				<? if ($eventoConfiguracaoXMLAtual->getInscricaoBool8("PT")) { ?>
				<tr>
					<td class="structFilter"><input type="checkbox" name="bool_8" id="bool_8" <?= ($inscricao->getBOOL_8()) ? "checked" : "";?>></td>
					<td class="structFilter"><label for="bool_8"><?= $eventoConfiguracaoXMLAtual->getInscricaoBool8("PT"); ?></label></td>
				</tr>
				<? } ?>
				<? if ($eventoConfiguracaoXMLAtual->getInscricaoBool9("PT")) { ?>
				<tr>
					<td class="structFilter"><input type="checkbox" name="bool_9" id="bool_9" <?= ($inscricao->getBOOL_9()) ? "checked" : "";?>></td>
					<td class="structFilter"><label for="bool_9"><?= $eventoConfiguracaoXMLAtual->getInscricaoBool9("PT"); ?></label></td>
				</tr>
				<? } ?>
				<? if ($eventoConfiguracaoXMLAtual->getInscricaoBool10("PT")) { ?>
				<tr>
					<td class="structFilter"><input type="checkbox" name="bool_10" id="bool_10" <?= ($inscricao->getBOOL_10()) ? "checked" : "";?>></td>
					<td class="structFilter"><label for="bool_10"><?= $eventoConfiguracaoXMLAtual->getInscricaoBool10("PT"); ?></label></td>
				</tr>
				<? } ?>
				<? if ($eventoConfiguracaoXMLAtual->getInscricaoBool11("PT")) { ?>
				<tr>
					<td class="structFilter"><input type="checkbox" name="bool_11" id="bool_11" <?= ($inscricao->getBOOL_11()) ? "checked" : "";?>></td>
					<td class="structFilter"><label for="bool_11"><?= $eventoConfiguracaoXMLAtual->getInscricaoBool11("PT"); ?></label></td>
				</tr>
				<? } ?>
				<? if ($eventoConfiguracaoXMLAtual->getInscricaoBool12("PT")) { ?>
				<tr>
					<td class="structFilter"><input type="checkbox" name="bool_12" id="bool_12" <?= ($inscricao->getBOOL_12()) ? "checked" : "";?>></td>
					<td class="structFilter"><label for="bool_12"><?= $eventoConfiguracaoXMLAtual->getInscricaoBool12("PT"); ?></label></td>
				</tr>
				<? } ?>
				<? if ($eventoConfiguracaoXMLAtual->getInscricaoBool13("PT")) { ?>
				<tr>
					<td class="structFilter"><input type="checkbox" name="bool_13" id="bool_13" <?= ($inscricao->getBOOL_13()) ? "checked" : "";?>></td>
					<td class="structFilter"><label for="bool_13"><?= $eventoConfiguracaoXMLAtual->getInscricaoBool13("PT"); ?></label></td>
				</tr>
				<? } ?>
				<? if ($eventoConfiguracaoXMLAtual->getInscricaoBool14("PT")) { ?>
				<tr>
					<td class="structFilter"><input type="checkbox" name="bool_14" id="bool_14" <?= ($inscricao->getBOOL_14()) ? "checked" : "";?>></td>
					<td class="structFilter"><label for="bool_14"><?= $eventoConfiguracaoXMLAtual->getInscricaoBool14("PT"); ?></label></td>
				</tr>
				<? } ?>
				<? if ($eventoConfiguracaoXMLAtual->getInscricaoBool15("PT")) { ?>
				<tr>
					<td class="structFilter"><input type="checkbox" name="bool_15" id="bool_15" <?= ($inscricao->getBOOL_15()) ? "checked" : "";?>></td>
					<td class="structFilter"><label for="bool_15"><?= $eventoConfiguracaoXMLAtual->getInscricaoBool15("PT"); ?></label></td>
				</tr>
				<? } ?>
				<? if ($eventoConfiguracaoXMLAtual->getInscricaoBool16("PT")) { ?>
				<tr>
					<td class="structFilter"><input type="checkbox" name="bool_16" id="bool_16" <?= ($inscricao->getBOOL_16()) ? "checked" : "";?>></td>
					<td class="structFilter"><label for="bool_16"><?= $eventoConfiguracaoXMLAtual->getInscricaoBool16("PT"); ?></label></td>
				</tr>
				<? } ?>
				<? if ($eventoConfiguracaoXMLAtual->getInscricaoBool17("PT")) { ?>
				<tr>
					<td class="structFilter"><input type="checkbox" name="bool_17" id="bool_17" <?= ($inscricao->getBOOL_17()) ? "checked" : "";?>></td>
					<td class="structFilter"><label for="bool_17"><?= $eventoConfiguracaoXMLAtual->getInscricaoBool17("PT"); ?></label></td>
				</tr>
				<? } ?>
				<? if ($eventoConfiguracaoXMLAtual->getInscricaoBool18("PT")) { ?>
				<tr>
					<td class="structFilter"><input type="checkbox" name="bool_18" id="bool_18" <?= ($inscricao->getBOOL_18()) ? "checked" : "";?>></td>
					<td class="structFilter"><label for="bool_18"><?= $eventoConfiguracaoXMLAtual->getInscricaoBool18("PT"); ?></label></td>
				</tr>
				<? } ?>
				<? if ($eventoConfiguracaoXMLAtual->getInscricaoBool19("PT")) { ?>
				<tr>
					<td class="structFilter"><input type="checkbox" name="bool_19" id="bool_19" <?= ($inscricao->getBOOL_19()) ? "checked" : "";?>></td>
					<td class="structFilter"><label for="bool_19"><?= $eventoConfiguracaoXMLAtual->getInscricaoBool19("PT"); ?></label></td>
				</tr>
				<? } ?>
				<? if ($eventoConfiguracaoXMLAtual->getInscricaoBool20("PT")) { ?>
				<tr>
					<td class="structFilter"><input type="checkbox" name="bool_20" id="bool_20" <?= ($inscricao->getBOOL_20()) ? "checked" : "";?>></td>
					<td class="structFilter"><label for="bool_20"><?= $eventoConfiguracaoXMLAtual->getInscricaoBool20("PT"); ?></label></td>
				</tr>
				<? } ?>

				</table>
				
			</td>
		</tr>
		<tr>
			<td class="structFilter" valign="top"><u>Cursos Escolhidos</u></td>
			<td class="structFilter" colspan="3">
				<table cellpadding="0" cellspacing="0" border="0">
	          <? for ($curso = 1; $curso <= 30; $curso++) {
	               if ($eventoConfiguracaoXMLAtual->getInscricaoCurso($curso,"PT")) { ?>
	               <tr><td width="1%"><input name="curso_<?=$curso?>" id="curso_<?=$curso?>" type="checkbox" <?= ($inscricao->getCURSO($curso)=="1") ? "checked" : "";?> onChange="javascript:ajaxValorInscricao();"></td>
	               <td class="structFilter"><label for="curso_<?=$curso?>"><?= $eventoConfiguracaoXMLAtual->getInscricaoCurso($curso,"PT"); ?></label></td></tr>
	          <?   }
	             } ?>
				<? /*
				<? if ($eventoConfiguracaoXMLAtual->getInscricaoCurso1("PT")) { ?>
				<tr>
					<td class="structFilter"><input type="checkbox" name="curso_1" id="curso_1" <?= ($inscricao->getCURSO_1()) ? "checked" : "";?>></td>
					<td class="structFilter"><label for="curso_1"><?= $eventoConfiguracaoXMLAtual->getInscricaoCurso1("PT"); ?></label></td>
				</tr>
				<? } ?>
				<? if ($eventoConfiguracaoXMLAtual->getInscricaoCurso2("PT")) { ?>
				<tr>
					<td class="structFilter"><input type="checkbox" name="curso_2" id="curso_2" <?= ($inscricao->getCURSO_2()) ? "checked" : "";?>></td>
					<td class="structFilter"><label for="curso_2"><?= $eventoConfiguracaoXMLAtual->getInscricaoCurso2("PT"); ?></label></td>
				</tr>
				<? } ?>
				<? if ($eventoConfiguracaoXMLAtual->getInscricaoCurso3("PT")) { ?>
				<tr>
					<td class="structFilter"><input type="checkbox" name="curso_3" id="curso_3" <?= ($inscricao->getCURSO_3()) ? "checked" : "";?>></td>
					<td class="structFilter"><label for="curso_3"><?= $eventoConfiguracaoXMLAtual->getInscricaoCurso3("PT"); ?></label></td>
				</tr>
				<? } ?>
				<? if ($eventoConfiguracaoXMLAtual->getInscricaoCurso4("PT")) { ?>
				<tr>
					<td class="structFilter"><input type="checkbox" name="curso_4" id="curso_4" <?= ($inscricao->getCURSO_4()) ? "checked" : "";?>></td>
					<td class="structFilter"><label for="curso_4"><?= $eventoConfiguracaoXMLAtual->getInscricaoCurso4("PT"); ?></label></td>
				</tr>
				<? } ?>
				<? if ($eventoConfiguracaoXMLAtual->getInscricaoCurso5("PT")) { ?>
				<tr>
					<td class="structFilter"><input type="checkbox" name="curso_5" id="curso_5" <?= ($inscricao->getCURSO_5()) ? "checked" : "";?>></td>
					<td class="structFilter"><label for="curso_5"><?= $eventoConfiguracaoXMLAtual->getInscricaoCurso5("PT"); ?></label></td>
				</tr>
				<? } ?>
				<? if ($eventoConfiguracaoXMLAtual->getInscricaoCurso6("PT")) { ?>
				<tr>
					<td class="structFilter"><input type="checkbox" name="curso_6" id="curso_6" <?= ($inscricao->getCURSO_6()) ? "checked" : "";?>></td>
					<td class="structFilter"><label for="curso_6"><?= $eventoConfiguracaoXMLAtual->getInscricaoCurso6("PT"); ?></label></td>
				</tr>
				<? } ?>
				<? if ($eventoConfiguracaoXMLAtual->getInscricaoCurso7("PT")) { ?>
				<tr>
					<td class="structFilter"><input type="checkbox" name="curso_7" id="curso_7" <?= ($inscricao->getCURSO_7()) ? "checked" : "";?>></td>
					<td class="structFilter"><label for="curso_7"><?= $eventoConfiguracaoXMLAtual->getInscricaoCurso7("PT"); ?></label></td>
				</tr>
				<? } ?>
				<? if ($eventoConfiguracaoXMLAtual->getInscricaoCurso8("PT")) { ?>
				<tr>
					<td class="structFilter"><input type="checkbox" name="curso_8" id="curso_8" <?= ($inscricao->getCURSO_8()) ? "checked" : "";?>></td>
					<td class="structFilter"><label for="curso_8"><?= $eventoConfiguracaoXMLAtual->getInscricaoCurso8("PT"); ?></label></td>
				</tr>
				<? } ?>
				<? if ($eventoConfiguracaoXMLAtual->getInscricaoCurso9("PT")) { ?>
				<tr>
					<td class="structFilter"><input type="checkbox" name="curso_9" id="curso_9" <?= ($inscricao->getCURSO_9()) ? "checked" : "";?>></td>
					<td class="structFilter"><label for="curso_9"><?= $eventoConfiguracaoXMLAtual->getInscricaoCurso9("PT"); ?></label></td>
				</tr>
				<? } ?>
				<? if ($eventoConfiguracaoXMLAtual->getInscricaoCurso10("PT")) { ?>
				<tr>
					<td class="structFilter"><input type="checkbox" name="curso_10" id="curso_10" <?= ($inscricao->getCURSO_10()) ? "checked" : "";?>></td>
					<td class="structFilter"><label for="curso_10"><?= $eventoConfiguracaoXMLAtual->getInscricaoCurso10("PT"); ?></label></td>
				</tr>
				<? } ?>
				<? if ($eventoConfiguracaoXMLAtual->getInscricaoCurso11("PT")) { ?>
				<tr>
					<td class="structFilter"><input type="checkbox" name="curso_11" id="curso_11" <?= ($inscricao->getCURSO_11()) ? "checked" : "";?>></td>
					<td class="structFilter"><label for="curso_11"><?= $eventoConfiguracaoXMLAtual->getInscricaoCurso11("PT"); ?></label></td>
				</tr>
				<? } ?>
				<? if ($eventoConfiguracaoXMLAtual->getInscricaoCurso12("PT")) { ?>
				<tr>
					<td class="structFilter"><input type="checkbox" name="curso_12" id="curso_12" <?= ($inscricao->getCURSO_12()) ? "checked" : "";?>></td>
					<td class="structFilter"><label for="curso_12"><?= $eventoConfiguracaoXMLAtual->getInscricaoCurso12("PT"); ?></label></td>
				</tr>
				<? } ?>
				<? if ($eventoConfiguracaoXMLAtual->getInscricaoCurso13("PT")) { ?>
				<tr>
					<td class="structFilter"><input type="checkbox" name="curso_13" id="curso_13" <?= ($inscricao->getCURSO_13()) ? "checked" : "";?>></td>
					<td class="structFilter"><label for="curso_13"><?= $eventoConfiguracaoXMLAtual->getInscricaoCurso13("PT"); ?></label></td>
				</tr>
				<? } ?>
				<? if ($eventoConfiguracaoXMLAtual->getInscricaoCurso14("PT")) { ?>
				<tr>
					<td class="structFilter"><input type="checkbox" name="curso_14" id="curso_14" <?= ($inscricao->getCURSO_14()) ? "checked" : "";?>></td>
					<td class="structFilter"><label for="curso_14"><?= $eventoConfiguracaoXMLAtual->getInscricaoCurso14("PT"); ?></label></td>
				</tr>
				<? } ?>
				<? if ($eventoConfiguracaoXMLAtual->getInscricaoCurso15("PT")) { ?>
				<tr>
					<td class="structFilter"><input type="checkbox" name="curso_15" id="curso_15" <?= ($inscricao->getCURSO_15()) ? "checked" : "";?>></td>
					<td class="structFilter"><label for="curso_15"><?= $eventoConfiguracaoXMLAtual->getInscricaoCurso15("PT"); ?></label></td>
				</tr>
				<? } ?>
				<? if ($eventoConfiguracaoXMLAtual->getInscricaoCurso16("PT")) { ?>
				<tr>
					<td class="structFilter"><input type="checkbox" name="curso_16" id="curso_16" <?= ($inscricao->getCURSO_16()) ? "checked" : "";?>></td>
					<td class="structFilter"><label for="curso_16"><?= $eventoConfiguracaoXMLAtual->getInscricaoCurso16("PT"); ?></label></td>
				</tr>
				<? } ?>
				<? if ($eventoConfiguracaoXMLAtual->getInscricaoCurso17("PT")) { ?>
				<tr>
					<td class="structFilter"><input type="checkbox" name="curso_17" id="curso_17" <?= ($inscricao->getCURSO_17()) ? "checked" : "";?>></td>
					<td class="structFilter"><label for="curso_17"><?= $eventoConfiguracaoXMLAtual->getInscricaoCurso17("PT"); ?></label></td>
				</tr>
				<? } ?>
				<? if ($eventoConfiguracaoXMLAtual->getInscricaoCurso18("PT")) { ?>
				<tr>
					<td class="structFilter"><input type="checkbox" name="curso_18" id="curso_18" <?= ($inscricao->getCURSO_18()) ? "checked" : "";?>></td>
					<td class="structFilter"><label for="curso_18"><?= $eventoConfiguracaoXMLAtual->getInscricaoCurso18("PT"); ?></label></td>
				</tr>
				<? } ?>
				<? if ($eventoConfiguracaoXMLAtual->getInscricaoCurso19("PT")) { ?>
				<tr>
					<td class="structFilter"><input type="checkbox" name="curso_19" id="curso_19" <?= ($inscricao->getCURSO_19()) ? "checked" : "";?>></td>
					<td class="structFilter"><label for="curso_19"><?= $eventoConfiguracaoXMLAtual->getInscricaoCurso19("PT"); ?></label></td>
				</tr>
				<? } ?>
				<? if ($eventoConfiguracaoXMLAtual->getInscricaoCurso20("PT")) { ?>
				<tr>
					<td class="structFilter"><input type="checkbox" name="curso_20" id="curso_20" <?= ($inscricao->getCURSO_20()) ? "checked" : "";?>></td>
					<td class="structFilter"><label for="curso_20"><?= $eventoConfiguracaoXMLAtual->getInscricaoCurso20("PT"); ?></label></td>
				</tr>
				<? } ?>
				<? if ($eventoConfiguracaoXMLAtual->getInscricaoCurso21("PT")) { ?>
				<tr>
					<td class="structFilter"><input type="checkbox" name="curso_21" id="curso_21" <?= ($inscricao->getCURSO_21()) ? "checked" : "";?>></td>
					<td class="structFilter"><label for="curso_21"><?= $eventoConfiguracaoXMLAtual->getInscricaoCurso21("PT"); ?></label></td>
				</tr>
				<? } ?>
				<? if ($eventoConfiguracaoXMLAtual->getInscricaoCurso22("PT")) { ?>
				<tr>
					<td class="structFilter"><input type="checkbox" name="curso_22" id="curso_22" <?= ($inscricao->getCURSO_22()) ? "checked" : "";?>></td>
					<td class="structFilter"><label for="curso_22"><?= $eventoConfiguracaoXMLAtual->getInscricaoCurso22("PT"); ?></label></td>
				</tr>
				<? } ?>
				<? if ($eventoConfiguracaoXMLAtual->getInscricaoCurso23("PT")) { ?>
				<tr>
					<td class="structFilter"><input type="checkbox" name="curso_23" id="curso_23" <?= ($inscricao->getCURSO_23()) ? "checked" : "";?>></td>
					<td class="structFilter"><label for="curso_23"><?= $eventoConfiguracaoXMLAtual->getInscricaoCurso23("PT"); ?></label></td>
				</tr>
				<? } ?>
				<? if ($eventoConfiguracaoXMLAtual->getInscricaoCurso24("PT")) { ?>
				<tr>
					<td class="structFilter"><input type="checkbox" name="curso_24" id="curso_24" <?= ($inscricao->getCURSO_24()) ? "checked" : "";?>></td>
					<td class="structFilter"><label for="curso_24"><?= $eventoConfiguracaoXMLAtual->getInscricaoCurso24("PT"); ?></label></td>
				</tr>
				<? } ?>
				<? if ($eventoConfiguracaoXMLAtual->getInscricaoCurso25("PT")) { ?>
				<tr>
					<td class="structFilter"><input type="checkbox" name="curso_25" id="curso_25" <?= ($inscricao->getCURSO_25()) ? "checked" : "";?>></td>
					<td class="structFilter"><label for="curso_25"><?= $eventoConfiguracaoXMLAtual->getInscricaoCurso25("PT"); ?></label></td>
				</tr>
				<? } ?>
				<? if ($eventoConfiguracaoXMLAtual->getInscricaoCurso26("PT")) { ?>
				<tr>
					<td class="structFilter"><input type="checkbox" name="curso_26" id="curso_26" <?= ($inscricao->getCURSO_26()) ? "checked" : "";?>></td>
					<td class="structFilter"><label for="curso_26"><?= $eventoConfiguracaoXMLAtual->getInscricaoCurso26("PT"); ?></label></td>
				</tr>
				<? } ?>
				<? if ($eventoConfiguracaoXMLAtual->getInscricaoCurso27("PT")) { ?>
				<tr>
					<td class="structFilter"><input type="checkbox" name="curso_27" id="curso_27" <?= ($inscricao->getCURSO_27()) ? "checked" : "";?>></td>
					<td class="structFilter"><label for="curso_27"><?= $eventoConfiguracaoXMLAtual->getInscricaoCurso27("PT"); ?></label></td>
				</tr>
				<? } ?>
				<? if ($eventoConfiguracaoXMLAtual->getInscricaoCurso28("PT")) { ?>
				<tr>
					<td class="structFilter"><input type="checkbox" name="curso_28" id="curso_28" <?= ($inscricao->getCURSO_28()) ? "checked" : "";?>></td>
					<td class="structFilter"><label for="curso_28"><?= $eventoConfiguracaoXMLAtual->getInscricaoCurso28("PT"); ?></label></td>
				</tr>
				<? } ?>
				<? if ($eventoConfiguracaoXMLAtual->getInscricaoCurso29("PT")) { ?>
				<tr>
					<td class="structFilter"><input type="checkbox" name="curso_29" id="curso_29" <?= ($inscricao->getCURSO_29()) ? "checked" : "";?>></td>
					<td class="structFilter"><label for="curso_29"><?= $eventoConfiguracaoXMLAtual->getInscricaoCurso29("PT"); ?></label></td>
				</tr>
				<? } ?>
				<? if ($eventoConfiguracaoXMLAtual->getInscricaoCurso30("PT")) { ?>
				<tr>
					<td class="structFilter"><input type="checkbox" name="curso_30" id="curso_30" <?= ($inscricao->getCURSO_30()) ? "checked" : "";?>></td>
					<td class="structFilter"><label for="curso_30"><?= $eventoConfiguracaoXMLAtual->getInscricaoCurso30("PT"); ?></label></td>
				</tr>
				<? } ?>
				*/?>
				</table>
				
			</td>
		</tr>				
		</table>
	</td>
</tr>
<tr>
	<td colspan="2" valign="top">
		<table border="0" cellpadding="2" cellspacing="0">
		<tr>
			<td class="structFilter" width="14%">Observações</td>
			<td class="structFilter"><textarea class="structFilterBox" name="obs" rows="5" cols="120"><?= $inscricao->getOBS()?></textarea></td>
		</tr>
		<tr>
			<td class="structFilter">&nbsp;&nbsp;&nbsp;</td>
			<td class="structFilter">
				<input type="submit" class="structFilterButton" value="Salvar" onClick="document.theForm.redirect.value = 'list';">
				&nbsp;
				<input type="submit" class="structFilterButton" value="Salvar e Imprimir" onClick="document.theForm.redirect.value = 'view';">
				&nbsp;
				<input type="submit" class="structFilterButton" value="Salvar e Inserir Nova" onClick="document.theForm.redirect.value = 'edit';">
			</td>
		</tr>
		</table>
	</td>
</tr>

</table>
</form>

<? include_once("struct/struct_bottom.php")?>
<? } ?>