<? include_once("struct/auth.php")?>
<?
if (!session_is_registered("evento")) { 
	header("Location: session_seleciona_evento.php?url=inscricao_simples_edit.php&orga_id=0&configurado=1");
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
		echo "<span class='structFilterSimple'>";
		echo "Erro: Inscricao não encontrada no BD.<br>";
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
    
  return confirm("Deseja confirmar a inscrição?");
    
  //return true;
}

</script>


<? if ($_REQUEST["id_anterior"]) { ?>
	<script Language="JavaScript">
		alert("A inscrição de '<?=$_REQUEST["nome_anterior"]?>' foi salva com ID <?=$_REQUEST["id_anterior"]?>");
	</script>
<? } ?>

<form action="inscricao_simples_edit_xp.php" method="POST" class="form.nospace" onsubmit="return validateForm(this)" onkeypress="return event.keyCode!=13">
<input type="hidden" name="id" value="<?= $inscricao->getID() ?>">
<input type="hidden" name="even_id" value="<?= $eventoAtual->getID() ?>">
<table border="0" cellpadding="0" cellspacing="0" width="100%">
<tr>
	<td valign="top">
		<table cellpadding="2" cellspacing="2" border="0" width="100%">
		<tr>
			<td class="structFilterSimple" colspan="4"><b>Inscrição Simplificada - <? if ($inscricao->getID()) echo "EDIÇÃO (id: ".$inscricao->getID().")"; else echo "NOVA";?></b><div style="padding-top:8px;"></div></td>
		</tr>
		<tr>
			<td class="structFilterSimple">Nome Completo</td>
			<td class="structFilterSimple" colspan="3"><input type="edit" class="structFilterSimpleBox" name="nome" id="nome" value="<?= $inscricao->getNOME()?>" size="50" maxlength="200" onKeyUp="javascript:setUpperCase(this);" onBlur="javascript:document.getElementById('cracha').value = getFirstName('nome')"></td>
		</tr>
		<tr>
			<td class="structFilterSimple" width="110">Nome Crachá</td>
			<td class="structFilterSimple" width="200"><input type="edit" class="structFilterSimpleBox" name="cracha" id="cracha" value="<?= $inscricao->getCRACHA()?>" size="20" maxlength="20" onKeyUp="javascript:setUpperCase(this);"></td>
			<td class="structFilterSimple" width="110">CPF/Passaporte</td>
			<td class="structFilterSimple"><input type="edit" class="structFilterSimpleBox" name="cpf_passaporte" value="<?= $inscricao->getCPF_PASSAPORTE()?>" size="20" maxlength="20"></td>
		</tr>
		<tr>
			<td class="structFilterSimple">Acompanhante</td>
			<td class="structFilterSimple" valign="bottom" colspan="3">
				<table cellpadding="0" cellspacing="0" border="0"><tr><td>
				<input type="edit" class="structFilterSimpleBox" name="acomp" id="acomp" value="<?= $inscricao->getACOMP()?>" size="20" maxlength="50" onblur="if (this.value.length > 0) {document.getElementById('acompanhante_check').checked = true;} else {document.getElementById('acompanhante_check').checked = false};ajaxValorInscricao();" onKeyUp="javascript:setUpperCase(this);">
				</td><td>
				<input disabled type="checkbox" name="acompanhante_check" id="acompanhante_check" <?= ($inscricao->getACOMP()) ? "checked" : "";?>>
				</td></tr></table>
			</td>
		</tr>
		<tr>
			<td class="structFilterSimple">Organização</td>
			<td class="structFilterSimple"><input type="edit" class="structFilterSimpleBox" name="org_nome" id="org_nome" value="<?= $inscricao->getORG_NOME()?>" size="25" maxlength="100" onKeyUp="javascript:setUpperCase(this);"></td>
			<td class="structFilterSimple">CNPJ</td>
			<td class="structFilterSimple"><input type="edit" class="structFilterSimpleBox" name="org_cnpj" value="<?= $inscricao->getORG_CNPJ()?>" size="20" maxlength="20" onkeypress="return txtBoxFormat(this.form, 'org_cnpj', '99.999.999/9999-99', event);"></td>
		</tr>
		<tr>
			<td class="structFilterSimple">Cidade</td>
			<td class="structFilterSimple"><input type="edit" class="structFilterSimpleBox" name="cidade" id="cidade" value="<?= $inscricao->getCIDADE()?>" size="25" maxlength="50" onKeyUp="javascript:setUpperCase(this);"></td>
			<td class="structFilterSimple" colspan="2">
				Estado: <input type="edit" class="structFilterSimpleBox" name="estado" id="estado" value="<?= $inscricao->getESTADO()?>" size="2" maxlength="2" onKeyUp="javascript:setUpperCase(this);">&nbsp;&nbsp;&nbsp;
				País: <input type="edit" class="structFilterSimpleBox" name="pais" id="pais" value="<?= $inscricao->getPAIS()?>" onKeyUp="javascript:setUpperCase(this);" size="20" maxlength="20"></td>
		</tr>
		</tr>
		<tr>
			<td class="structFilterSimple">Categoria</td>
			<td class="structFilterSimple" colspan="3">
				<select class="structFilterSimpleBox" name="categoria" id="categoria" onchange="javascript:ajaxValorInscricao();">
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
			<td class="structFilterSimple">Opção</td>
			<td class="structFilterSimple" colspan="3">
				<select class="structFilterSimpleBox" name="tipo" id="tipo" onchange="javascript:ajaxValorInscricao();">
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
				//return YAHOO.example.calendar.cal1.getSelectedDates()[0].getDate()+'/'+(YAHOO.example.calendar.cal1.getSelectedDates()[0].getMonth()+1)+'/'+YAHOO.example.calendar.cal1.getSelectedDates()[0].getFullYear();
				Todays = new Date();
				TheDate = Todays.getDate() +"/"+ (Todays.getMonth() + 1) + "/" +  Todays.getFullYear()
				return TheDate;
			}
			
			function ajaxValorInscricao() {
				even_id = <?=$eventoAtual->getId()?>;
				data = getCal1Date();
				acompanhante = document.getElementById('acompanhante_check');
				opcao = document.getElementById('tipo');
				categoria = document.getElementById('categoria');

				ajaxedit('ajax_calcula_inscricao.php?even_id='+even_id+'&data='+data+'&opcao='+opcao.options[opcao.selectedIndex].value+'&categoria='+categoria.options[categoria.selectedIndex].value+'&acompanhante='+acompanhante.checked,'valor');
				//alert('ajax_calcula_inscricao.php?even_id='+even_id+'&data='+data+'&opcao='+opcao.options[opcao.selectedIndex].value+'&categoria='+categoria.options[categoria.selectedIndex].value);
			}
		</script>
		<tr>
			<td class="structFilterSimple">
				Valor
				(<a href="javascript:ajaxValorInscricao();">atualizar</a>)
				<!--<input type="edit" value="" id="valorTmp" name="ajax_edit"><br>-->
				<!--<div id="valorTmp"></div>-->
			</td>
			<td class="structFilterSimple" colspan="3">
				R$<input style="text-align:right" type="edit" class="structFilterSimpleBox" name="valor" id="valor" value="<?= number_format($inscricao->getVALOR()/100,2,",","."); ?>" size="5" maxlength="10" onKeyPress="return(currencyFormat(this,'.',',',event))">

				<select class="structFilterSimpleBox" name="status_pgto" id="status_pgto" onchange="javascript:status_pgto = document.getElementById('status_pgto');if (status_pgto.options[status_pgto.selectedIndex].value=='g') document.getElementById('valor').value='0,00';">
					<option value="a" <?= ($inscricao->getSTATUS_PGTO()=="a") ? "selected" : "";?>> Aguarda Pagamento</option>
					<option value="c" <?= ($inscricao->getSTATUS_PGTO()=="c") ? "selected" : "";?>> Aguarda Confirmação</option>
					<option value="o" <?= ($inscricao->getSTATUS_PGTO()=="o") ? "selected" : "";?>> Pagamento OK</option>
					<option value="g" <?= ($inscricao->getSTATUS_PGTO()=="g") ? "selected" : "";?>> Cortesia</option>
				</select>

				<select class="structFilterSimpleBox" name="forma_pgto">
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
			<td class="structFilterSimple">Observações</td>
			<td class="structFilterSimple" colspan="3"><textarea class="structFilterSimpleBox" name="obs" id="obs" rows="2" cols="80"><?= $inscricao->getOBS()?></textarea></td>
		</tr>
		<tr>
			<td class="structFilterSimple">&nbsp;&nbsp;&nbsp;</td>
			<td class="structFilterSimple" colspan="3"><input type="submit" class="structFilterSimpleButton" value="Salvar"></td>
		</tr>
		</table>
	</td>
</tr>

</table>
</form>

<? include_once("struct/struct_bottom.php")?>
<? } ?>