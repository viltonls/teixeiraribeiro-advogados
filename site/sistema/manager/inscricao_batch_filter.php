<? include_once("struct/auth.php")?>
<?
if (!session_is_registered("evento")) { 
	header("Location: session_seleciona_evento.php?url=inscricao_batch_filter.php&orga_id=0&configurado=1");
} else {
	
include_once("struct/struct_top.php");
include_once('../classes/class.inscricao.php');
include_once('../classes/service.inscricao.php');

/* @var $eventoConfiguracaoAtual Configuracao */
/* @var $eventoConfiguracaoXMLAtual ConfiguracaoXML */

?>
<div class="structTitle">Impressão em Lote para o Evento "<?=$eventoAtual->getNOME()?>"</div>

<div style="padding-top:8px;"></div>

<form action="inscricao_batch_print.php" method="POST">
<table border="0" cellpadding="0" cellspacing="0" width="70%">
<tr>
	<td valign="top">

		<table border="0" cellpadding="2" cellspacing="0">
		<tr>
			<td class="structFilter" valign="top" style="padding-top:3px;">Status Pgto.</td>
			<td class="structFilter">
				<table border="0" cellpadding="0" cellspacing="0">
				<tr>
					<td class="structFilter"><input type="radio" name="insc_status_pgto" value="all" id="insc_status_pgto_all" <? if ($_SESSION["batch_insc_status_pgto"] == "all") echo "checked" ; ?>></td>
					<td class="structFilter"><label for="insc_status_pgto_all">Todos</label></td>
				</tr>
				<tr>
					<td class="structFilter"><input type="radio" name="insc_status_pgto" value="y" id="insc_status_pgto_y" <? if ($_SESSION["batch_insc_status_pgto"] == "y") echo "checked" ; ?>></td>
					<td class="structFilter"><label for="insc_status_pgto_y">Pago</label></td>
				</tr>
				<tr>
					<td class="structFilter"><input type="radio" name="insc_status_pgto" value="n" id="insc_status_pgto_n" <? if ($_SESSION["batch_insc_status_pgto"] == "n") echo "checked" ; ?>></td>
					<td class="structFilter"><label for="insc_status_pgto_n">Não Pago</label></td>
				</tr>
				<tr>
					<td class="structFilter"><input type="radio" name="insc_status_pgto" value="g" id="insc_status_pgto_g" <? if ($_SESSION["batch_insc_status_pgto"] == "g") echo "checked" ; ?>></td>
					<td class="structFilter"><label for="insc_status_pgto_g">Cortesia</label></td>
				</tr>
				</table>
			</td>
		</tr>
		<tr>
			<td class="structFilter">&nbsp;</td>
			<td class="structFilter"></td>
		</tr>
		<tr>
			<td class="structFilter" valign="top" style="padding-top:4px;" nowrap>Impressão de</td>
			<td class="structFilter">
				<table border="0" cellpadding="0" cellspacing="0">
				<tr>
					<td class="structFilter"><input type="radio" name="imprimir" value="recibo_pf" id="imprimir_recibo_pf" checked onchange="document.getElementById('prot_opcoes').style.visibility='hidden'" <? if ($_SESSION["batch_imprimir"] == "recibo_pf") echo "checked" ; ?>></td>
					<td class="structFilter"><label for="imprimir_recibo_pf">Recibo PF</label></td>
				</tr>
				<tr>
					<td class="structFilter"><input type="radio" name="imprimir" value="recibo_pj" id="imprimir_recibo_pj" onchange="document.getElementById('prot_opcoes').style.visibility='hidden'" <? if ($_SESSION["batch_imprimir"] == "recibo_pj") echo "checked" ; ?>></td>
					<td class="structFilter"><label for="imprimir_recibo_pj">Recibo PJ</label></td>
				</tr>
				<tr>
					<td class="structFilter"><input type="radio" name="imprimir" value="protocolo" id="imprimir_protocolo" onchange="document.getElementById('prot_opcoes').style.visibility='visible'" <? if ($_SESSION["batch_imprimir"] == "protocolo") echo "checked" ; ?>></td>
					<td class="structFilter"><label for="imprimir_protocolo">Protocolo</label></td>
				</tr>
				<tr>
					<td class="structFilter"><input type="radio" name="imprimir" value="protocolo_acompanhante" id="imprimir_protocolo_acompanhante" onchange="document.getElementById('prot_opcoes').style.visibility='visible'" <? if ($_SESSION["batch_imprimir"] == "protocolo_acompanhante") echo "checked" ; ?>></td>
					<td class="structFilter"><label for="imprimir_protocolo_acompanhante">Protocolo Acomp.</label></td>
				</tr>
				<tr>
					<td class="structFilter"><input type="radio" name="imprimir" value="cracha" id="imprimir_cracha" onchange="document.getElementById('prot_opcoes').style.visibility='hidden'" <? if ($_SESSION["batch_imprimir"] == "cracha") echo "checked" ; ?>></td>
					<td class="structFilter"><label for="imprimir_cracha">Crachá</label></td>
				</tr>
				<tr>
					<td class="structFilter"><input type="radio" name="imprimir" value="cracha_acompanhante" id="imprimir_cracha_acompanhante" onchange="document.getElementById('prot_opcoes').style.visibility='hidden'" <? if ($_SESSION["batch_imprimir"] == "cracha_acompanhante") echo "checked" ; ?>></td>
					<td class="structFilter"><label for="imprimir_cracha_acompanhante">Crachá Acomp.</label></td>
				</tr>
				<tr>
					<td class="structFilter"><input type="radio" name="imprimir" value="certificado" id="imprimir_certificado" onchange="document.getElementById('prot_opcoes').style.visibility='hidden'" <? if ($_SESSION["batch_imprimir"] == "certificado") echo "checked" ; ?>></td>
					<td class="structFilter"><label for="imprimir_certificado">Certificado</label></td>
				</tr>
				</table>
			</td>
		</tr>
		<tr>
			<td class="structFilter" valign="top" style="padding-top:4px;"></td>
			<td class="structFilter">
			
				<div style="visibility:hidden;padding-top:5px;" id="prot_opcoes">
					Marcar Itens de Protocolo<br>
					<table border="0" cellpadding="0" cellspacing="0">
					<? if ($eventoConfiguracaoAtual->getPROT_CDROM()) { ?>
					<tr>
						<td class="structFilter" width="10%"><input type="checkbox" name="prot_cdrom" id="prot_cdrom"></td>
						<td class="structFilter"><label for="prot_cdrom">CD-ROM</label></td>
					</tr>
					<? } ?>
					<? if ($eventoConfiguracaoAtual->getPROT_CRACHA()) { ?>
					<tr>
						<td class="structFilter" width="10%"><input type="checkbox" name="prot_cracha" id="prot_cracha"></td>
						<td class="structFilter"><label for="prot_cracha">Crachá</label></td>
					</tr>
					<? } ?>
					<? if ($eventoConfiguracaoAtual->getPROT_PASTA()) { ?>
					<tr>
						<td class="structFilter" width="10%"><input type="checkbox" name="prot_pasta" id="prot_pasta"></td>
						<td class="structFilter"><label for="prot_pasta">Pasta</label></td>
					</tr>
					<? } ?>
					<? if ($eventoConfiguracaoAtual->getPROT_RECIBO()) { ?>
					<tr>
						<td class="structFilter" width="10%"><input type="checkbox" name="prot_recibo" id="prot_recibo"></td>
						<td class="structFilter"><label for="prot_recibo">Recibo</label></td>
					</tr>
					<? } ?>
					</table>
				</div>
			
			</td>
		</tr>
		</table>

	</td>
	<td valign="top">
		<table border="0" cellpadding="2" cellspacing="0">
		<tr>
			<td class="structFilter" valign="top" style="padding-top:4px;">Categorias</td>
			<td class="structFilter">
				<table border="0" cellpadding="0" cellspacing="0">
				<? if ($eventoConfiguracaoXMLAtual->getInscricaoCategoriaA("PT")) { ?>
				<tr>
					<td class="structFilter" width="10%"><input type="checkbox" name="insc_categoria_a" id="insc_categoria_a" <? if ($_SESSION["batch_insc_categoria_a"] == "on") echo "checked" ; ?>></td>
					<td class="structFilter"><label for="insc_categoria_a"><?= $eventoConfiguracaoXMLAtual->getInscricaoCategoriaA("PT"); ?></label></td>
				</tr>
				<? } ?>
				<? if ($eventoConfiguracaoXMLAtual->getInscricaoCategoriaB("PT")) { ?>
				<tr>
					<td class="structFilter"><input type="checkbox" name="insc_categoria_b" id="insc_categoria_b" <? if ($_SESSION["batch_insc_categoria_b"] == "on") echo "checked" ; ?>></td>
					<td class="structFilter"><label for="insc_categoria_b"><?= $eventoConfiguracaoXMLAtual->getInscricaoCategoriaB("PT"); ?></label></td>
				</tr>
				<? } ?>
				<? if ($eventoConfiguracaoXMLAtual->getInscricaoCategoriaC("PT")) { ?>
				<tr>
					<td class="structFilter"><input type="checkbox" name="insc_categoria_c" id="insc_categoria_c" <? if ($_SESSION["batch_insc_categoria_c"] == "on") echo "checked" ; ?>></td>
					<td class="structFilter"><label for="insc_categoria_c"><?= $eventoConfiguracaoXMLAtual->getInscricaoCategoriaC("PT"); ?></label></td>
				</tr>
				<? } ?>
				<? if ($eventoConfiguracaoXMLAtual->getInscricaoCategoriaD("PT")) { ?>
				<tr>
					<td class="structFilter"><input type="checkbox" name="insc_categoria_d" id="insc_categoria_d" <? if ($_SESSION["batch_insc_categoria_d"] == "on") echo "checked" ; ?>></td>
					<td class="structFilter"><label for="insc_categoria_d"><?= $eventoConfiguracaoXMLAtual->getInscricaoCategoriaD("PT"); ?></label></td>
				</tr>
				<? } ?>
				<? if ($eventoConfiguracaoXMLAtual->getInscricaoCategoriaE("PT")) { ?>
				<tr>
					<td class="structFilter"><input type="checkbox" name="insc_categoria_e" id="insc_categoria_e" <? if ($_SESSION["batch_insc_categoria_e"] == "on") echo "checked" ; ?>></td>
					<td class="structFilter"><label for="insc_categoria_e"><?= $eventoConfiguracaoXMLAtual->getInscricaoCategoriaE("PT"); ?></label></td>
				</tr>
				<? } ?>
				<? if ($eventoConfiguracaoXMLAtual->getInscricaoCategoriaF("PT")) { ?>
				<tr>
					<td class="structFilter"><input type="checkbox" name="insc_categoria_f" id="insc_categoria_f" <? if ($_SESSION["batch_insc_categoria_f"] == "on") echo "checked" ; ?>></td>
					<td class="structFilter"><label for="insc_categoria_f"><?= $eventoConfiguracaoXMLAtual->getInscricaoCategoriaF("PT"); ?></label></td>
				</tr>
				<? } ?>
				<? if ($eventoConfiguracaoXMLAtual->getInscricaoCategoriaG("PT")) { ?>
				<tr>
					<td class="structFilter"><input type="checkbox" name="insc_categoria_g" id="insc_categoria_g" <? if ($_SESSION["batch_insc_categoria_g"] == "on") echo "checked" ; ?>></td>
					<td class="structFilter"><label for="insc_categoria_g"><?= $eventoConfiguracaoXMLAtual->getInscricaoCategoriaG("PT"); ?></label></td>
				</tr>
				<? } ?>
				<? if ($eventoConfiguracaoXMLAtual->getInscricaoCategoriaH("PT")) { ?>
				<tr>
					<td class="structFilter"><input type="checkbox" name="insc_categoria_h" id="insc_categoria_h" <? if ($_SESSION["batch_insc_categoria_h"] == "on") echo "checked" ; ?>></td>
					<td class="structFilter"><label for="insc_categoria_h"><?= $eventoConfiguracaoXMLAtual->getInscricaoCategoriaH("PT"); ?></label></td>
				</tr>
				<? } ?>
				<? if ($eventoConfiguracaoXMLAtual->getInscricaoCategoriaI("PT")) { ?>
				<tr>
					<td class="structFilter"><input type="checkbox" name="insc_categoria_i" id="insc_categoria_i" <? if ($_SESSION["batch_insc_categoria_i"] == "on") echo "checked" ; ?>></td>
					<td class="structFilter"><label for="insc_categoria_i"><?= $eventoConfiguracaoXMLAtual->getInscricaoCategoriaI("PT"); ?></label></td>
				</tr>
				<? } ?>
				<? if ($eventoConfiguracaoXMLAtual->getInscricaoCategoriaJ("PT")) { ?>
				<tr>
					<td class="structFilter"><input type="checkbox" name="insc_categoria_j" id="insc_categoria_j" <? if ($_SESSION["batch_insc_categoria_j"] == "on") echo "checked" ; ?>></td>
					<td class="structFilter"><label for="insc_categoria_j"><?= $eventoConfiguracaoXMLAtual->getInscricaoCategoriaJ("PT"); ?></label></td>
				</tr>
				<? } ?>
				<? if ($eventoConfiguracaoXMLAtual->getInscricaoCategoriaK("PT")) { ?>
				<tr>
					<td class="structFilter"><input type="checkbox" name="insc_categoria_k" id="insc_categoria_k" <? if ($_SESSION["batch_insc_categoria_k"] == "on") echo "checked" ; ?>></td>
					<td class="structFilter"><label for="insc_categoria_k"><?= $eventoConfiguracaoXMLAtual->getInscricaoCategoriaK("PT"); ?></label></td>
				</tr>
				<? } ?>
				<? if ($eventoConfiguracaoXMLAtual->getInscricaoCategoriaL("PT")) { ?>
				<tr>
					<td class="structFilter"><input type="checkbox" name="insc_categoria_l" id="insc_categoria_l" <? if ($_SESSION["batch_insc_categoria_l"] == "on") echo "checked" ; ?>></td>
					<td class="structFilter"><label for="insc_categoria_l"><?= $eventoConfiguracaoXMLAtual->getInscricaoCategoriaL("PT"); ?></label></td>
				</tr>
				<? } ?>
				<? if ($eventoConfiguracaoXMLAtual->getInscricaoCategoriaM("PT")) { ?>
				<tr>
					<td class="structFilter"><input type="checkbox" name="insc_categoria_m" id="insc_categoria_m" <? if ($_SESSION["batch_insc_categoria_m"] == "on") echo "checked" ; ?>></td>
					<td class="structFilter"><label for="insc_categoria_m"><?= $eventoConfiguracaoXMLAtual->getInscricaoCategoriaM("PT"); ?></label></td>
				</tr>
				<? } ?>
				<? if ($eventoConfiguracaoXMLAtual->getInscricaoCategoriaN("PT")) { ?>
				<tr>
					<td class="structFilter"><input type="checkbox" name="insc_categoria_n" id="insc_categoria_n" <? if ($_SESSION["batch_insc_categoria_n"] == "on") echo "checked" ; ?>></td>
					<td class="structFilter"><label for="insc_categoria_n"><?= $eventoConfiguracaoXMLAtual->getInscricaoCategoriaN("PT"); ?></label></td>
				</tr>
				<? } ?>
				<? if ($eventoConfiguracaoXMLAtual->getInscricaoCategoriaO("PT")) { ?>
				<tr>
					<td class="structFilter"><input type="checkbox" name="insc_categoria_o" id="insc_categoria_o" <? if ($_SESSION["batch_insc_categoria_o"] == "on") echo "checked" ; ?>></td>
					<td class="structFilter"><label for="insc_categoria_o"><?= $eventoConfiguracaoXMLAtual->getInscricaoCategoriaO("PT"); ?></label></td>
				</tr>
				<? } ?>
				<? if ($eventoConfiguracaoXMLAtual->getInscricaoCategoriaP("PT")) { ?>
				<tr>
					<td class="structFilter"><input type="checkbox" name="insc_categoria_p" id="insc_categoria_p" <? if ($_SESSION["batch_insc_categoria_p"] == "on") echo "checked" ; ?>></td>
					<td class="structFilter"><label for="insc_categoria_p"><?= $eventoConfiguracaoXMLAtual->getInscricaoCategoriaP("PT"); ?></label></td>
				</tr>
				<? } ?>
				<? if ($eventoConfiguracaoXMLAtual->getInscricaoCategoriaQ("PT")) { ?>
				<tr>
					<td class="structFilter"><input type="checkbox" name="insc_categoria_q" id="insc_categoria_q" <? if ($_SESSION["batch_insc_categoria_q"] == "on") echo "checked" ; ?>></td>
					<td class="structFilter"><label for="insc_categoria_q"><?= $eventoConfiguracaoXMLAtual->getInscricaoCategoriaQ("PT"); ?></label></td>
				</tr>
				<? } ?>
				<? if ($eventoConfiguracaoXMLAtual->getInscricaoCategoriaR("PT")) { ?>
				<tr>
					<td class="structFilter"><input type="checkbox" name="insc_categoria_r" id="insc_categoria_r" <? if ($_SESSION["batch_insc_categoria_r"] == "on") echo "checked" ; ?>></td>
					<td class="structFilter"><label for="insc_categoria_r"><?= $eventoConfiguracaoXMLAtual->getInscricaoCategoriaR("PT"); ?></label></td>
				</tr>
				<? } ?>
				<? if ($eventoConfiguracaoXMLAtual->getInscricaoCategoriaS("PT")) { ?>
				<tr>
					<td class="structFilter"><input type="checkbox" name="insc_categoria_s" id="insc_categoria_s" <? if ($_SESSION["batch_insc_categoria_s"] == "on") echo "checked" ; ?>></td>
					<td class="structFilter"><label for="insc_categoria_s"><?= $eventoConfiguracaoXMLAtual->getInscricaoCategoriaS("PT"); ?></label></td>
				</tr>
				<? } ?>
				<? if ($eventoConfiguracaoXMLAtual->getInscricaoCategoriaT("PT")) { ?>
				<tr>
					<td class="structFilter"><input type="checkbox" name="insc_categoria_t" id="insc_categoria_t" <? if ($_SESSION["batch_insc_categoria_t"] == "on") echo "checked" ; ?>></td>
					<td class="structFilter"><label for="insc_categoria_t"><?= $eventoConfiguracaoXMLAtual->getInscricaoCategoriaT("PT"); ?></label></td>
				</tr>
				<? } ?>
				<? if ($eventoConfiguracaoXMLAtual->getInscricaoCategoriaU("PT")) { ?>
				<tr>
					<td class="structFilter"><input type="checkbox" name="insc_categoria_u" id="insc_categoria_u" <? if ($_SESSION["batch_insc_categoria_u"] == "on") echo "checked" ; ?>></td>
					<td class="structFilter"><label for="insc_categoria_u"><?= $eventoConfiguracaoXMLAtual->getInscricaoCategoriaU("PT"); ?></label></td>
				</tr>
				<? } ?>
				<? if ($eventoConfiguracaoXMLAtual->getInscricaoCategoriaV("PT")) { ?>
				<tr>
					<td class="structFilter"><input type="checkbox" name="insc_categoria_v" id="insc_categoria_v" <? if ($_SESSION["batch_insc_categoria_v"] == "on") echo "checked" ; ?>></td>
					<td class="structFilter"><label for="insc_categoria_v"><?= $eventoConfiguracaoXMLAtual->getInscricaoCategoriaV("PT"); ?></label></td>
				</tr>
				<? } ?>
				<? if ($eventoConfiguracaoXMLAtual->getInscricaoCategoriaW("PT")) { ?>
				<tr>
					<td class="structFilter"><input type="checkbox" name="insc_categoria_w" id="insc_categoria_w" <? if ($_SESSION["batch_insc_categoria_w"] == "on") echo "checked" ; ?>></td>
					<td class="structFilter"><label for="insc_categoria_w"><?= $eventoConfiguracaoXMLAtual->getInscricaoCategoriaW("PT"); ?></label></td>
				</tr>
				<? } ?>
				<? if ($eventoConfiguracaoXMLAtual->getInscricaoCategoriaX("PT")) { ?>
				<tr>
					<td class="structFilter"><input type="checkbox" name="insc_categoria_x" id="insc_categoria_x" <? if ($_SESSION["batch_insc_categoria_x"] == "on") echo "checked" ; ?>></td>
					<td class="structFilter"><label for="insc_categoria_x"><?= $eventoConfiguracaoXMLAtual->getInscricaoCategoriaX("PT"); ?></label></td>
				</tr>
				<? } ?>
				<? if ($eventoConfiguracaoXMLAtual->getInscricaoCategoriaY("PT")) { ?>
				<tr>
					<td class="structFilter"><input type="checkbox" name="insc_categoria_y" id="insc_categoria_y" <? if ($_SESSION["batch_insc_categoria_y"] == "on") echo "checked" ; ?>></td>
					<td class="structFilter"><label for="insc_categoria_y"><?= $eventoConfiguracaoXMLAtual->getInscricaoCategoriaY("PT"); ?></label></td>
				</tr>
				<? } ?>
				<? if ($eventoConfiguracaoXMLAtual->getInscricaoCategoriaZ("PT")) { ?>
				<tr>
					<td class="structFilter"><input type="checkbox" name="insc_categoria_z" id="insc_categoria_z" <? if ($_SESSION["batch_insc_categoria_z"] == "on") echo "checked" ; ?>></td>
					<td class="structFilter"><label for="insc_categoria_z"><?= $eventoConfiguracaoXMLAtual->getInscricaoCategoriaZ("PT"); ?></label></td>
				</tr>
				<? } ?>
				</table>
			</td>
		</tr>
		<tr>
			<td class="structFilter">&nbsp;</td>
			<td class="structFilter"></td>
		</tr>
		<tr>
			<td class="structFilter" valign="top" style="padding-top:4px;">Opções</td>
			<td class="structFilter">
				<table border="0" cellpadding="0" cellspacing="0">
				<? if ($eventoConfiguracaoXMLAtual->getInscricaoOpcao1("PT")) { ?>
				<tr>
					<td class="structFilter" width="10%"><input type="checkbox" name="insc_opcao_1" id="insc_opcao_1" <? if ($_SESSION["batch_insc_opcao_1"] == "on") echo "checked" ; ?>></td>
					<td class="structFilter"><label for="insc_opcao_1"><?= $eventoConfiguracaoXMLAtual->getInscricaoOpcao1("PT"); ?></label></td>
				</tr>
				<? } ?>
				<? if ($eventoConfiguracaoXMLAtual->getInscricaoOpcao2("PT")) { ?>
				<tr>
					<td class="structFilter" width="10%"><input type="checkbox" name="insc_opcao_2" id="insc_opcao_2" <? if ($_SESSION["batch_insc_opcao_2"] == "on") echo "checked" ; ?>></td>
					<td class="structFilter"><label for="insc_opcao_2"><?= $eventoConfiguracaoXMLAtual->getInscricaoOpcao2("PT"); ?></label></td>
				</tr>
				<? } ?>
				<? if ($eventoConfiguracaoXMLAtual->getInscricaoOpcao3("PT")) { ?>
				<tr>
					<td class="structFilter" width="10%"><input type="checkbox" name="insc_opcao_3" id="insc_opcao_3" <? if ($_SESSION["batch_insc_opcao_3"] == "on") echo "checked" ; ?>></td>
					<td class="structFilter"><label for="insc_opcao_3"><?= $eventoConfiguracaoXMLAtual->getInscricaoOpcao3("PT"); ?></label></td>
				</tr>
				<? } ?>
				<? if ($eventoConfiguracaoXMLAtual->getInscricaoOpcao4("PT")) { ?>
				<tr>
					<td class="structFilter" width="10%"><input type="checkbox" name="insc_opcao_4" id="insc_opcao_4" <? if ($_SESSION["batch_insc_opcao_4"] == "on") echo "checked" ; ?>></td>
					<td class="structFilter"><label for="insc_opcao_4"><?= $eventoConfiguracaoXMLAtual->getInscricaoOpcao4("PT"); ?></label></td>
				</tr>
				<? } ?>
				<? if ($eventoConfiguracaoXMLAtual->getInscricaoOpcao5("PT")) { ?>
				<tr>
					<td class="structFilter" width="10%"><input type="checkbox" name="insc_opcao_5" id="insc_opcao_5" <? if ($_SESSION["batch_insc_opcao_5"] == "on") echo "checked" ; ?>></td>
					<td class="structFilter"><label for="insc_opcao_5"><?= $eventoConfiguracaoXMLAtual->getInscricaoOpcao5("PT"); ?></label></td>
				</tr>
				<? } ?>
				<? if ($eventoConfiguracaoXMLAtual->getInscricaoOpcao6("PT")) { ?>
				<tr>
					<td class="structFilter" width="10%"><input type="checkbox" name="insc_opcao_6" id="insc_opcao_6" <? if ($_SESSION["batch_insc_opcao_6"] == "on") echo "checked" ; ?>></td>
					<td class="structFilter"><label for="insc_opcao_6"><?= $eventoConfiguracaoXMLAtual->getInscricaoOpcao6("PT"); ?></label></td>
				</tr>
				<? } ?>
				</table>
			</td>
		</tr>
		</table>
	</td>
	<td valign="top">
		<table border="0" cellpadding="2" cellspacing="0">
		<tr>
			<td class="structFilter">Ordenar por</td>
			<td class="structFilter">
				<select class="structFilterBox" name="order_by">
					<option value="INSC_NOME ASC" <? if ($_SESSION["batch_order_by"] == "INSC_NOME ASC") echo "selected" ; ?>>Nome</option>
					<option value="INSC_ESTADO ASC, INSC_NOME ASC" <? if ($_SESSION["batch_order_by"] == "INSC_ESTADO ASC, INSC_NOME ASC") echo "selected" ; ?>>Estado, Nome</option>
					<option value="INSC_ORG_NOME ASC, INSC_NOME ASC" <? if ($_SESSION["batch_order_by"] == "INSC_ORG_NOME ASC, INSC_NOME ASC") echo "selected" ; ?>>Organização, Nome</option>
				</select>
			</td>
		</tr>
		<tr>
			<td class="structFilter">Último ID Impresso<br> Corretamente</td>
			<td class="structFilter"><input type="edit" name="insc_id_ultimo" class="structFilterBox" value="<?=$_SESSION["batch_insc_id_ultimo"]?>"></td>
		</tr>
		<tr>
			<td class="structFilter">&nbsp;&nbsp;&nbsp;</td>
			<td class="structFilter"><input type="submit" class="structFilterButton" value="Aplicar"></td>
		</tr>
		</table>

		
	</td>
</tr>

</form>


<? include_once("struct/struct_bottom.php")?>
<? } ?>