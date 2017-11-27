<? include_once("struct/auth.php")?>
<?
if (!session_is_registered("evento")) { 
	header("Location: session_seleciona_evento.php?url=relatorio_caixa.php&orga_id=0&configurado=1");
} else {
	
$print = $_REQUEST["print"];
	
if ($print) {
	include_once("struct/struct_print.php");
} else {
	include_once("struct/struct_top.php");
}
include_once('../classes/class.inscricao.php');
include_once('../classes/service.inscricao.php');

if ($_REQUEST["order_by"]) {
	$order_by = $_REQUEST["order_by"];
} else {
	$order_by = "INSC_ID ASC";
}


/* @var $eventoAtual Evento */
$inscricaoService = new InscricaoService();
$inscricaoList = $inscricaoService->listInscricoesByEventoFiltered($eventoAtual->getID(),$order_by,$_REQUEST["insc_nome"],$_REQUEST["insc_categoria"],"",$_REQUEST["insc_forma_pgto"],"","o","","");


?><title>Evento Online</title>
<div class="structTitle">Relatório de Caixa do Evento "<?=$eventoAtual->getNOME()?>"</div>
(<a href="relatorio_caixa.php?print=true">Versão para Impressão</a>)

<div style="padding-top:8px;"></div>
		<!-- Qtd de Inscrições por Categorias x Status de Pgto -->
		<?	// Prepara as variáveis de total
			$valor_total_a = $inscricaoService->sumValorTotalFiltered($eventoAtual->getID(),"","a");
			$valor_total_c = $inscricaoService->sumValorTotalFiltered($eventoAtual->getID(),"","c");
			$valor_total_o = $inscricaoService->sumValorTotalFiltered($eventoAtual->getID(),"","o");
		?>
		<table border="0" cellspacing="5" cellpadding="0">
		  <tr class="reportCell">
		    <td class="reportCell" align="right"><b>Valor Total</b></td>
		    <td class="reportCell" align="right" style="border: 1px solid silver">R$ <?= number_format(($valor_total_a + $valor_total_c + $valor_total_o)/100,2,",","."); ?></td>
		    <td class="reportCell" align="right"><b>Valor Pago</b></td>
		    <td class="reportCell" align="right" style="border: 1px solid silver">R$ <?= number_format(($valor_total_o)/100,2,",","."); ?></td>
		    <td class="reportCell" align="right"><b>Valor A Receber</b></td>
		    <td class="reportCell" align="right" style="border: 1px solid silver">R$ <?= number_format(($valor_total_a + $valor_total_c)/100,2,",","."); ?></td>
		  </tr>
		</table>
<div style="padding-top:8px;"></div>

<? if ($print) { ?>
<div style="width:100%;border:solid 1px #303030">
<table border="0" cellspacing="0" cellpadding="0" width="100%">
  <tr class="gridHeader">
<? } else { ?>
<!-- Grid de Listagem -->
<div class="gridContainer" id="tC" style="height:300px; width:100%;border:solid 1px #303030">
<table border="0" cellspacing="0" cellpadding="0" width="100%">
  <thead class="gridHeader">
  <tr class="gridHeader" style="top:expression(document.getElementById('tC').scrollTop);">
<? } ?>
	<!--td class="gridHeader" width="2%">&nbsp;</td-->

	<!-- Nº do recibo /  Nome /  Instituição / Categoria / Valor / Forma de pgto. -->
	<td class="gridHeader" width="2%">&nbsp;</td>
    <td class="gridHeader">Recibo</td>
    <td class="gridHeader">Nome Completo</td>
    <td class="gridHeader">Organização</td>
    <td class="gridHeader">Categoria</td>
    <td class="gridHeader">Valor</td>
    <td class="gridHeader">Forma Pgto</td>
    <td class="gridHeader">Status Pgto</td>
	<td class="gridHeader" width="2%">&nbsp;</td>
	<td class="gridHeader" width="2%">&nbsp;</td>
  </tr>
  </thead>
  <tbody>
  <? for ($i = 0; $i < count($inscricaoList); $i++) {
		/* @var $inscricao Inscricao */
		$inscricao = $inscricaoList[$i]; ?>
  <tr>
    <td class="gridLineEven">&nbsp;</td>
    <td class="gridLineEven"><?= $inscricao->getID() ?>&nbsp;</td>
    <td class="gridLineEven"><?= $inscricao->getNOME() ?>&nbsp;</td>
    <td class="gridLineEven"><?= $inscricao->getORG_NOME() ?>&nbsp;</td>
    <td class="gridLineEven" nowrap>
		<?= ($inscricao->getCATEGORIA()=="a") ? $eventoConfiguracaoXMLAtual->getInscricaoCategoriaA("PT") : "";?>
		<?= ($inscricao->getCATEGORIA()=="b") ? $eventoConfiguracaoXMLAtual->getInscricaoCategoriaB("PT") : "";?>
		<?= ($inscricao->getCATEGORIA()=="c") ? $eventoConfiguracaoXMLAtual->getInscricaoCategoriaC("PT") : "";?>
		<?= ($inscricao->getCATEGORIA()=="d") ? $eventoConfiguracaoXMLAtual->getInscricaoCategoriaD("PT") : "";?>
		<?= ($inscricao->getCATEGORIA()=="e") ? $eventoConfiguracaoXMLAtual->getInscricaoCategoriaE("PT") : "";?>
		<?= ($inscricao->getCATEGORIA()=="f") ? $eventoConfiguracaoXMLAtual->getInscricaoCategoriaF("PT") : "";?>
		<?= ($inscricao->getCATEGORIA()=="g") ? $eventoConfiguracaoXMLAtual->getInscricaoCategoriaG("PT") : "";?>
		<?= ($inscricao->getCATEGORIA()=="h") ? $eventoConfiguracaoXMLAtual->getInscricaoCategoriaH("PT") : "";?>
		<?= ($inscricao->getCATEGORIA()=="i") ? $eventoConfiguracaoXMLAtual->getInscricaoCategoriaI("PT") : "";?>
		<?= ($inscricao->getCATEGORIA()=="j") ? $eventoConfiguracaoXMLAtual->getInscricaoCategoriaJ("PT") : "";?>
		<?= ($inscricao->getCATEGORIA()=="k") ? $eventoConfiguracaoXMLAtual->getInscricaoCategoriaK("PT") : "";?>
		<?= ($inscricao->getCATEGORIA()=="l") ? $eventoConfiguracaoXMLAtual->getInscricaoCategoriaL("PT") : "";?>
		<?= ($inscricao->getCATEGORIA()=="m") ? $eventoConfiguracaoXMLAtual->getInscricaoCategoriaM("PT") : "";?>
		<?= ($inscricao->getCATEGORIA()=="n") ? $eventoConfiguracaoXMLAtual->getInscricaoCategoriaN("PT") : "";?>
		<?= ($inscricao->getCATEGORIA()=="o") ? $eventoConfiguracaoXMLAtual->getInscricaoCategoriaO("PT") : "";?>
		<?= ($inscricao->getCATEGORIA()=="p") ? $eventoConfiguracaoXMLAtual->getInscricaoCategoriaP("PT") : "";?>
		<?= ($inscricao->getCATEGORIA()=="q") ? $eventoConfiguracaoXMLAtual->getInscricaoCategoriaQ("PT") : "";?>
		<?= ($inscricao->getCATEGORIA()=="r") ? $eventoConfiguracaoXMLAtual->getInscricaoCategoriaR("PT") : "";?>
		<?= ($inscricao->getCATEGORIA()=="s") ? $eventoConfiguracaoXMLAtual->getInscricaoCategoriaS("PT") : "";?>
		<?= ($inscricao->getCATEGORIA()=="t") ? $eventoConfiguracaoXMLAtual->getInscricaoCategoriaT("PT") : "";?>
		<?= ($inscricao->getCATEGORIA()=="u") ? $eventoConfiguracaoXMLAtual->getInscricaoCategoriaU("PT") : "";?>
		<?= ($inscricao->getCATEGORIA()=="v") ? $eventoConfiguracaoXMLAtual->getInscricaoCategoriaV("PT") : "";?>
		<?= ($inscricao->getCATEGORIA()=="w") ? $eventoConfiguracaoXMLAtual->getInscricaoCategoriaW("PT") : "";?>
		<?= ($inscricao->getCATEGORIA()=="x") ? $eventoConfiguracaoXMLAtual->getInscricaoCategoriaX("PT") : "";?>
		<?= ($inscricao->getCATEGORIA()=="y") ? $eventoConfiguracaoXMLAtual->getInscricaoCategoriaY("PT") : "";?>
		<?= ($inscricao->getCATEGORIA()=="z") ? $eventoConfiguracaoXMLAtual->getInscricaoCategoriaZ("PT") : "";?>
		&nbsp;
    </td>
    <td class="gridLineEven">
    	<? if (!$print) { echo "R$ ";} ?>
    	<?= number_format($inscricao->getVALOR()/100,2,",","."); ?>&nbsp;
    </td>
    <td class="gridLineEven" nowrap>
		<?= ($inscricao->getFORMA_PGTO()=="d") ? "Depósito" : "";?>
		<?= ($inscricao->getFORMA_PGTO()=="b") ? "Boleto" : "";?>
		<?= ($inscricao->getFORMA_PGTO()=="c") ? "Cheque" : "";?>
		<?= ($inscricao->getFORMA_PGTO()=="n") ? "Dinheiro" : "";?>
		<?= ($inscricao->getFORMA_PGTO()=="m") ? "Cartão MC" : "";?>
		<?= ($inscricao->getFORMA_PGTO()=="v") ? "Cartão VISA" : "";?>
		<?= ($inscricao->getFORMA_PGTO()=="a") ? "Cartão AMEX" : "";?>
		&nbsp;
    </td>
    <td class="gridLineEven" nowrap>
		<?= ($inscricao->getSTATUS_PGTO()=="a") ? "Aguarda Pagamento" : "";?>
		<?= ($inscricao->getSTATUS_PGTO()=="c") ? "Aguarda Confirmação" : "";?>
		<?= ($inscricao->getSTATUS_PGTO()=="o") ? "Pagamento OK" : "";?>
		<?= ($inscricao->getSTATUS_PGTO()=="g") ? "Cortesia" : "";?>
		&nbsp;
    </td>
    <td class="gridLineEven"><? if (!$print) { ?><a href="inscricao_edit.php?id=<?= $inscricao->getID() ?>">Editar</a><? } ?>&nbsp;</td>
    <td class="gridLineEven">&nbsp;</td>
  </tr>
  <? }; ?>
  </tbody>
</table>
</div>



<? include_once("struct/struct_bottom.php")?>
<? } ?>