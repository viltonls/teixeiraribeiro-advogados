<? include_once("struct/auth.php")?>
<?
if (!session_is_registered("evento")) { 
	header("Location: session_seleciona_evento.php?url=inscricao_simples_view.php&orga_id=0&configurado=1");
} else {

include_once("struct/struct_top.php");

include_once('../classes/class.configuracao.php');
include_once('../classes/class.inscricao.php');
include_once('../classes/service.inscricao.php');

$inscricao = new Inscricao();

/* @var $eventoConfiguracaoAtual Configuracao */

/* Tratamento de Erro */
if ($_REQUEST['id']) {
	$inscricaoService = new InscricaoService();
	$inscricao = $inscricaoService->loadInscricaoById($_REQUEST['id'],$eventoAtual->getID());
	if (!$inscricao->getID() || $inscricao->getSTATUS() == "x") {
		echo "<span class='structFilterSimple'>";
		echo "Erro: Inscricao n�o encontrada no BD.<br>";
		echo "</span>";
		break;
	}
}

?>

<table border="0" cellpadding="0" cellspacing="0" width="100%">
<tr>
	<td valign="top">
		<table cellpadding="2" cellspacing="2" border="0" width="100%">
		<tr>
			<td class="structFilterSimple" colspan="4"><b>Inscri��o Simplificada - SALVA (id: <?=$inscricao->getID()?>)</b><div style="padding-top:8px;"></div></td>
		</tr>
		<tr>
			<td class="structFilterSimple">Nome Completo</td>
			<td class="structFilterSimple" colspan="3"><input style="background:#f0f0f0" type="edit" class="structFilterSimpleBox" name="nome" value="<?= $inscricao->getNOME()?>" size="50" maxlength="200" readonly></td>
		</tr>
		<tr>
			<td class="structFilterSimple" width="110">Nome Crach�</td>
			<td class="structFilterSimple" width="200"><input style="background:#f0f0f0" type="edit" class="structFilterSimpleBox" name="cracha" value="<?= $inscricao->getCRACHA()?>" size="20" maxlength="20" readonly></td>
			<td class="structFilterSimple" width="110">CPF/Passaporte</td>
			<td class="structFilterSimple"><input style="background:#f0f0f0" type="edit" class="structFilterSimpleBox" name="cpf_passaporte" value="<?= $inscricao->getCPF_PASSAPORTE()?>" size="20" maxlength="20" readonly></td>
		</tr>
		<tr>
			<td class="structFilterSimple">Acompanhante</td>
			<td class="structFilterSimple" valign="bottom" colspan="3">
				<table cellpadding="0" cellspacing="0" border="0"><tr><td>
				<input style="background:#f0f0f0" type="edit" class="structFilterSimpleBox" name="acomp" value="<?= $inscricao->getACOMP()?>" size="20" maxlength="50" onblur="if (this.value.length > 0) {document.getElementById('acompanhante_check').checked = true;} else {document.getElementById('acompanhante_check').checked = false}" onchange="javascript:ajaxValorInscricao();" readonly>
				</td><td>
				<input disabled type="checkbox" name="acompanhante_check" id="acompanhante_check" <?= ($inscricao->getACOMP()) ? "checked" : "";?>>
				</td></tr></table>
			</td>
		</tr>
		<tr>
			<td class="structFilterSimple">Organiza��o</td>
			<td class="structFilterSimple"><input style="background:#f0f0f0" type="edit" class="structFilterSimpleBox" name="org_nome" value="<?= $inscricao->getORG_NOME()?>" size="25" maxlength="100" readonly></td>
			<td class="structFilterSimple">CNPJ</td>
			<td class="structFilterSimple"><input style="background:#f0f0f0" type="edit" class="structFilterSimpleBox" name="org_cnpj" value="<?= $inscricao->getORG_CNPJ()?>" size="20" maxlength="20" readonly></td>
		</tr>
		<tr>
			<td class="structFilterSimple">Cidade</td>
			<td class="structFilterSimple"><input style="background:#f0f0f0" type="edit" class="structFilterSimpleBox" name="cidade" id="cidade" value="<?= $inscricao->getCIDADE()?>" size="25" maxlength="50" onKeyUp="javascript:setUpperCase(this);" readonly></td>
			<td class="structFilterSimple" colspan="2">
				Estado: <input style="background:#f0f0f0" type="edit" class="structFilterSimpleBox" name="estado" id="estado" value="<?= $inscricao->getESTADO()?>" size="2" maxlength="2" onKeyUp="javascript:setUpperCase(this);" readonly>&nbsp;&nbsp;&nbsp;
				Pa�s: <input style="background:#f0f0f0" type="edit" class="structFilterSimpleBox" name="pais" id="pais" value="<?= $inscricao->getPAIS()?>" onKeyUp="javascript:setUpperCase(this);" size="20" maxlength="20" readonly></td>
		</tr>
		<tr>
			<td class="structFilterSimple">Categoria</td>
			<td class="structFilterSimple" colspan="3">
				<select style="background:#f0f0f0" class="structFilterSimpleBox" name="categoria" id="categoria" onchange="javascript:ajaxValorInscricao();" disabled>
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
			<td class="structFilterSimple">Op��o</td>
			<td class="structFilterSimple" colspan="3">
				<select style="background:#f0f0f0" class="structFilterSimpleBox" name="tipo" id="tipo" onchange="javascript:ajaxValorInscricao();" disabled>
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
		<tr>
			<td class="structFilterSimple">
				Valor
			</td>
			<td class="structFilterSimple" colspan="3">
				R$<input style="background:#f0f0f0" style="text-align:right" type="edit" class="structFilterSimpleBox" name="valor" id="valor" value="<?= number_format($inscricao->getVALOR()/100,2,",","."); ?>" size="5" maxlength="10" onKeyPress="return(currencyFormat(this,'.',',',event))" readonly>

				<select style="background:#f0f0f0" class="structFilterSimpleBox" name="status_pgto" disabled>
					<option value="a" <?= ($inscricao->getSTATUS_PGTO()=="a") ? "selected" : "";?>> Aguarda Pagamento</option>
					<option value="c" <?= ($inscricao->getSTATUS_PGTO()=="c") ? "selected" : "";?>> Aguarda Confirma��o</option>
					<option value="o" <?= ($inscricao->getSTATUS_PGTO()=="o") ? "selected" : "";?>> Pagamento OK</option>
					<option value="o" <?= ($inscricao->getSTATUS_PGTO()=="g") ? "selected" : "";?>> Cortesia</option>
				</select>

				<select style="background:#f0f0f0" class="structFilterSimpleBox" name="forma_pgto" disabled>
					<option value="d" <?= ($inscricao->getFORMA_PGTO()=="d") ? "selected" : "";?>>Dep�sito</option>
					<option value="b" <?= ($inscricao->getFORMA_PGTO()=="b") ? "selected" : "";?>>Boleto</option>
					<option value="c" <?= ($inscricao->getFORMA_PGTO()=="c") ? "selected" : "";?>>Cheque</option>
					<option value="n" <?= ($inscricao->getFORMA_PGTO()=="n") ? "selected" : "";?>>Dinheiro</option>
					<option value="m" <?= ($inscricao->getFORMA_PGTO()=="m") ? "selected" : "";?>>Cart�o MC</option>
					<option value="v" <?= ($inscricao->getFORMA_PGTO()=="v") ? "selected" : "";?>>Cart�o VISA</option>
					<option value="a" <?= ($inscricao->getFORMA_PGTO()=="a") ? "selected" : "";?>>Cart�o AMEX</option>
				</select>
			</td>
		</tr>
		<tr>
			<td class="structFilterSimple">Observa��es</td>
			<td class="structFilterSimple" colspan="3"><textarea style="background:#f0f0f0" class="structFilterSimpleBox" name="obs" rows="2" cols="80" readonly><?= $inscricao->getOBS()?></textarea></td>
		</tr>
		<tr>
			<td class="structFilterSimple">&nbsp;&nbsp;&nbsp;</td>
			<td class="structFilterSimple" colspan="3" nowrap>
				<script language="javascript">
					function imprimirProtocolo() {
						var win = window.open('template_protocolo_print.php?even_id=<?=$inscricao->getEVEN_ID()?>&insc_id=<?=$inscricao->getID()?>','protocolo','resizable,width=800,height=300');
						win.blur();
					}
					function imprimirProtocoloAcompanhante() {
						var win = window.open('template_protocolo_acompanhante_print.php?even_id=<?=$inscricao->getEVEN_ID()?>&insc_id=<?=$inscricao->getID()?>','protocolo','resizable,width=800,height=300');
						win.blur();
					}
					function imprimirReciboPF() {
						var win = window.open('template_recibo_print.php?tipo_recibo=pf&even_id=<?=$inscricao->getEVEN_ID()?>&insc_id=<?=$inscricao->getID()?>','protocolo','resizable,width=800,height=600');
						win.blur();
					}
					function imprimirReciboPJ() {
						var win = window.open('template_recibo_print.php?tipo_recibo=pj&even_id=<?=$inscricao->getEVEN_ID()?>&insc_id=<?=$inscricao->getID()?>','protocolo','resizable,width=800,height=600');
						win.blur();
					}
					function imprimirCracha() {
						var win = window.open('template_cracha_print.php?even_id=<?=$inscricao->getEVEN_ID()?>&insc_id=<?=$inscricao->getID()?>','protocolo','resizable,width=300,height=300');
						win.blur();
					}
					function imprimirCrachaAcompanhante() {
						var win = window.open('template_cracha_acompanhante_print.php?even_id=<?=$inscricao->getEVEN_ID()?>&insc_id=<?=$inscricao->getID()?>','protocolo','resizable,width=300,height=300');
						win.blur();
					}
				</script>
				<a style="text-decoration:none;" class="structFilterSimpleButton" href="inscricao_simples_edit.php?id=<?=$inscricao->getID()?>"><< Corrigir Inscri��o</a>
				<a style="text-decoration:none;" class="structFilterSimpleButton" href="inscricao_simples_edit.php">Nova Inscri��o</a>
				|
				<a style="text-decoration:none; background:#9999FF; color:white" class="structFilterSimpleButton" href="javascript:imprimirCracha();">Crach�</a>
				<? if ($inscricao->getACOMP() != null && $inscricao->getACOMP() != "") { ?>
				<a style="text-decoration:none; background:#9999FF; color:white" class="structFilterSimpleButton" href="javascript:imprimirCrachaAcompanhante();">Crach� Acomp.</a>
				<? } else { ?>
				<span style="text-decoration:none; background:#9999FF; color:#D0D0D0" class="structFilterSimpleButton">Crach� Acomp.</span>
				<? }?>
				<? if ($inscricao->getSTATUS_PGTO()=="o") { ?>
				<a style="text-decoration:none; background:#9999FF; color:white" class="structFilterSimpleButton" href="javascript:imprimirReciboPF();">Recibo PF</a>
				<a style="text-decoration:none; background:#9999FF; color:white" class="structFilterSimpleButton" href="javascript:imprimirReciboPJ();">Recibo PJ</a>
				<? } else { ?>
				<span style="text-decoration:none; background:#9999FF; color:#D0D0D0" class="structFilterSimpleButton">Recibo PF</span>
				<span style="text-decoration:none; background:#9999FF; color:#D0D0D0" class="structFilterSimpleButton">Recibo PJ</span>
				<? }?>
				<a style="text-decoration:none; background:#9999FF; color:white" class="structFilterSimpleButton" href="javascript:imprimirProtocolo();">Protocolo</a>
				<? if ($inscricao->getACOMP() != null && $inscricao->getACOMP() != "") { ?>
				<a style="text-decoration:none; background:#9999FF; color:white" class="structFilterSimpleButton" href="javascript:imprimirProtocoloAcompanhante();">Protocolo Acomp.</a>
				<? } else { ?>
				<span style="text-decoration:none; background:#9999FF; color:#D0D0D0" class="structFilterSimpleButton">Protocolo Acomp.</span>
				<? }?>
				<a style="text-decoration:none; background:#9999FF; color:white" class="structFilterSimpleButton" href="">Certificado</a>
			</td>
		</tr>
		</table>
	</td>
</tr>
</table>
<!--<div id="impressao" width="100" height="500"></div>-->
<? include_once("struct/struct_bottom.php")?>
<? } ?>