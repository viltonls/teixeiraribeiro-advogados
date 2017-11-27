<? include_once("struct/auth.php")?>
<?
if (!session_is_registered("evento")) { 
	header("Location: session_seleciona_evento.php?url=relatorio_estatisticas.php&orga_id=0&configurado=1");
} else {
	
include_once("struct/struct_top.php");
include_once("struct/struct_functions.php");
include_once('../classes/class.inscricao.php');
include_once('../classes/service.inscricao.php');

if ($_REQUEST["order_by"]) {
	$order_by = $_REQUEST["order_by"];
} else {
	$order_by = "INSC_ID ASC";
}


/* @var $eventoAtual Evento */
/* @var $eventoConfiguracaoAtual Configuracao */
$inscricaoService = new InscricaoService();

// Qtd de Inscrições por Categoria x Status de Pagamento

// Valor total
// Valor pago
// Valor a receber

// Qtd de Inscrições por Curso x Status de Pagamento

// Qtd de Inscrições com Acompanhante

// Qtd de Inscrições por Estado
// Qtd de Inscrições por Cidade
// Qtd de Inscrições por País
// Qtd de Inscrições por Sexo


?>
<div class="structTitle">Relatório de Estatísticas do Evento "<?=$eventoAtual->getNOME()?>"</div>
<div class="main"><?=dataPorExtenso(mktime())?> <?= date("H:i:s")?></div>

<div style="padding-top:8px;"></div>

<table width="100%" cellpadding="5" cellspacing="0" border="0">
<tr>
	<td width="50%" class="main" valign="top">

		<br>
		
		<!-- Qtd de Inscrições por Categorias x Status de Pgto -->
		<div style="padding-bottom:8px;">
			<u>Inscrições por Categoria</u>
		</div>
		<?	// Prepara as variáveis de total
			$total_aguardando = 0;
			$total_pago = 0;
		?>
		<table border="0" cellspacing="0" cellpadding="0" class="reportTable">
		  <tr class="reportTableHeader">
		    <td class="reportTableHeader" align="left"></td>
		    <td class="reportTableHeader" align="center" colspan="2" style="border-left:solid 1px silver">Pago</td>
		    <td class="reportTableHeader" align="center" colspan="2" style="border-left:solid 1px silver">A Receber</td>
		    <td class="reportTableHeader" align="center" style="border-left:solid 1px silver">Cortesia</td>
		    <td class="reportTableHeader" align="center" colspan="2" style="border-left:solid 1px silver">Total</td>
		  </tr>
		  <tr class="reportTableHeader">
		    <td class="reportTableHeader" align="left"></td>
		    <td class="reportTableHeader" align="center" style="border-left:solid 1px silver">Qtd.</td>
		    <td class="reportTableHeader" align="center">Valor</td>
		    <td class="reportTableHeader" align="center" style="border-left:solid 1px silver">Qtd.</td>
		    <td class="reportTableHeader" align="center">Valor</td>
		    <td class="reportTableHeader" align="center" style="border-left:solid 1px silver">Qtd.</td>
		    <td class="reportTableHeader" align="center" style="border-left:solid 1px silver">Qtd.</td>
		    <td class="reportTableHeader" align="center">Valor</td>
		  </tr>
		  <? if ($eventoConfiguracaoXMLAtual->getInscricaoCategoriaA("PT")) {
		  	//$categ_a_pago = $inscricaoService->countInscricoesFiltered($eventoAtual->getID(),"a","a") + $inscricaoService->countInscricoesFiltered($eventoAtual->getID(),"a","c");
		  	$categ_a_aguardando = $inscricaoService->countInscricoesFiltered($eventoAtual->getID(),"a","a,c");
		  	$categ_a_pago = $inscricaoService->countInscricoesFiltered($eventoAtual->getID(),"a","o");
		  	$categ_a_cortesia = $inscricaoService->countInscricoesFiltered($eventoAtual->getID(),"a","g");
		  	$categ_a_total = $categ_a_aguardando + $categ_a_pago + $categ_a_cortesia;
		  	$total_aguardando += $categ_a_aguardando;
		  	$total_pago += $categ_a_pago;
		  	$total_cortesia += $categ_a_cortesia;
		  	
		  	$valor_categ_a_aguardando = $inscricaoService->sumValorTotalFiltered($eventoAtual->getID(),"a","a,c");
		  	$valor_categ_a_pago = $inscricaoService->sumValorTotalFiltered($eventoAtual->getID(),"a","o");
		  	$valor_categ_a_total = $valor_categ_a_aguardando + $valor_categ_a_pago;
		  	$valor_total_aguardando += $valor_categ_a_aguardando;
		  	$valor_total_pago += $valor_categ_a_pago;
			?>
		  <tr>
		    <td class="reportCellGrid" align="left"><?=$eventoConfiguracaoXMLAtual->getInscricaoCategoriaA("PT")?></td>
		    <td class="reportCellGrid" align="center" style="border-left:solid 1px silver"><b><?=$categ_a_pago?></b></td>
		    <td class="reportCellGrid" align="center">R$&nbsp;<?=number_format($valor_categ_a_pago/100,0,",",".")?></td>
		    <td class="reportCellGrid" align="center" style="border-left:solid 1px silver"><b><?=$categ_a_aguardando?></b></td>
		    <td class="reportCellGrid" align="center">R$&nbsp;<?=number_format($valor_categ_a_aguardando/100,0,",",".")?></td>
		    <td class="reportCellGrid" align="center" style="border-left:solid 1px silver"><b><?=$categ_a_cortesia?></b></td>
		    <td class="reportCellGrid" align="center" style="border-left:solid 1px silver"><b><?=$categ_a_total?></b></td>
		    <td class="reportCellGrid" align="center">R$&nbsp;<?=number_format($valor_categ_a_total/100,0,",",".")?></td>
		  </tr>
		  <? } ?>
		  <? if ($eventoConfiguracaoXMLAtual->getInscricaoCategoriaB("PT")) {
		  	//$categ_b_pago = $inscricaoService->countInscricoesFiltered($eventoAtual->getID(),"b","a") + $inscricaoService->countInscricoesFiltered($eventoAtual->getID(),"a","c");
		  	$categ_b_aguardando = $inscricaoService->countInscricoesFiltered($eventoAtual->getID(),"b","a,c");
		  	$categ_b_pago = $inscricaoService->countInscricoesFiltered($eventoAtual->getID(),"b","o");
		  	$categ_b_cortesia = $inscricaoService->countInscricoesFiltered($eventoAtual->getID(),"b","g");
		  	$categ_b_total = $categ_b_aguardando + $categ_b_pago + $categ_b_cortesia;
		  	$total_aguardando += $categ_b_aguardando;
		  	$total_pago += $categ_b_pago;
		  	$total_cortesia += $categ_b_cortesia;
		  	
		  	$valor_categ_b_aguardando = $inscricaoService->sumValorTotalFiltered($eventoAtual->getID(),"b","a,c");
		  	$valor_categ_b_pago = $inscricaoService->sumValorTotalFiltered($eventoAtual->getID(),"b","o");
		  	$valor_categ_b_total = $valor_categ_b_aguardando + $valor_categ_b_pago;
		  	$valor_total_aguardando += $valor_categ_b_aguardando;
		  	$valor_total_pago += $valor_categ_b_pago;
			?>
		  <tr>
		    <td class="reportCellGrid" align="left"><?=$eventoConfiguracaoXMLAtual->getInscricaoCategoriaB("PT")?></td>
		    <td class="reportCellGrid" align="center" style="border-left:solid 1px silver"><b><?=$categ_b_pago?></b></td>
		    <td class="reportCellGrid" align="center">R$&nbsp;<?=number_format($valor_categ_b_pago/100,0,",",".")?></td>
		    <td class="reportCellGrid" align="center" style="border-left:solid 1px silver"><b><?=$categ_b_aguardando?></b></td>
		    <td class="reportCellGrid" align="center">R$&nbsp;<?=number_format($valor_categ_b_aguardando/100,0,",",".")?></td>
		    <td class="reportCellGrid" align="center" style="border-left:solid 1px silver"><b><?=$categ_b_cortesia?></b></td>
		    <td class="reportCellGrid" align="center" style="border-left:solid 1px silver"><b><?=$categ_b_total?></b></td>
		    <td class="reportCellGrid" align="center">R$&nbsp;<?=number_format($valor_categ_b_total/100,0,",",".")?></td>
		  </tr>
		<? } ?>
		  <? if ($eventoConfiguracaoXMLAtual->getInscricaoCategoriaC("PT")) {
		  	$categ_c_aguardando = $inscricaoService->countInscricoesFiltered($eventoAtual->getID(),"c","a,c");
		  	$categ_c_pago = $inscricaoService->countInscricoesFiltered($eventoAtual->getID(),"c","o");
		  	$categ_c_cortesia = $inscricaoService->countInscricoesFiltered($eventoAtual->getID(),"c","g");
		  	$categ_c_total = $categ_c_aguardando + $categ_c_pago + $categ_c_cortesia;
		  	$total_aguardando += $categ_c_aguardando;
		  	$total_pago += $categ_c_pago;
		  	$total_cortesia += $categ_c_cortesia;
		  	
		  	$valor_categ_c_aguardando = $inscricaoService->sumValorTotalFiltered($eventoAtual->getID(),"c","a,c");
		  	$valor_categ_c_pago = $inscricaoService->sumValorTotalFiltered($eventoAtual->getID(),"c","o");
		  	$valor_categ_c_total = $valor_categ_c_aguardando + $valor_categ_c_pago;
		  	$valor_total_aguardando += $valor_categ_c_aguardando;
		  	$valor_total_pago += $valor_categ_c_pago;
			?>
		  <tr>
		    <td class="reportCellGrid" align="left"><?=$eventoConfiguracaoXMLAtual->getInscricaoCategoriaC("PT")?></td>
		    <td class="reportCellGrid" align="center" style="border-left:solid 1px silver"><b><?=$categ_c_pago?></b></td>
		    <td class="reportCellGrid" align="center">R$&nbsp;<?=number_format($valor_categ_c_pago/100,0,",",".")?></td>
		    <td class="reportCellGrid" align="center" style="border-left:solid 1px silver"><b><?=$categ_c_aguardando?></b></td>
		    <td class="reportCellGrid" align="center">R$&nbsp;<?=number_format($valor_categ_c_aguardando/100,0,",",".")?></td>
		    <td class="reportCellGrid" align="center" style="border-left:solid 1px silver"><b><?=$categ_c_cortesia?></b></td>
		    <td class="reportCellGrid" align="center" style="border-left:solid 1px silver"><b><?=$categ_c_total?></b></td>
		    <td class="reportCellGrid" align="center">R$&nbsp;<?=number_format($valor_categ_c_total/100,0,",",".")?></td>
		  </tr>
		<? } ?>
		  <? if ($eventoConfiguracaoXMLAtual->getInscricaoCategoriaD("PT")) {
		  	$categ_d_aguardando = $inscricaoService->countInscricoesFiltered($eventoAtual->getID(),"d","a,c");
		  	$categ_d_pago = $inscricaoService->countInscricoesFiltered($eventoAtual->getID(),"d","o");
		  	$categ_d_cortesia = $inscricaoService->countInscricoesFiltered($eventoAtual->getID(),"d","g");
		  	$categ_d_total = $categ_d_aguardando + $categ_d_pago + $categ_d_cortesia;
		  	$total_aguardando += $categ_d_aguardando;
		  	$total_pago += $categ_d_pago;
		  	$total_cortesia += $categ_d_cortesia;
		  	
		  	$valor_categ_d_aguardando = $inscricaoService->sumValorTotalFiltered($eventoAtual->getID(),"d","a,c");
		  	$valor_categ_d_pago = $inscricaoService->sumValorTotalFiltered($eventoAtual->getID(),"d","o");
		  	$valor_categ_d_total = $valor_categ_d_aguardando + $valor_categ_d_pago;
		  	$valor_total_aguardando += $valor_categ_d_aguardando;
		  	$valor_total_pago += $valor_categ_d_pago;
			?>
		  <tr>
		    <td class="reportCellGrid" align="left"><?=$eventoConfiguracaoXMLAtual->getInscricaoCategoriaD("PT")?></td>
		    <td class="reportCellGrid" align="center" style="border-left:solid 1px silver"><b><?=$categ_d_pago?></b></td>
		    <td class="reportCellGrid" align="center">R$&nbsp;<?=number_format($valor_categ_d_pago/100,0,",",".")?></td>
		    <td class="reportCellGrid" align="center" style="border-left:solid 1px silver"><b><?=$categ_d_aguardando?></b></td>
		    <td class="reportCellGrid" align="center">R$&nbsp;<?=number_format($valor_categ_d_aguardando/100,0,",",".")?></td>
		    <td class="reportCellGrid" align="center" style="border-left:solid 1px silver"><b><?=$categ_d_cortesia?></b></td>
		    <td class="reportCellGrid" align="center" style="border-left:solid 1px silver"><b><?=$categ_d_total?></b></td>
		    <td class="reportCellGrid" align="center">R$&nbsp;<?=number_format($valor_categ_d_total/100,0,",",".")?></td>
		  </tr>
		<? } ?>
		  <? if ($eventoConfiguracaoXMLAtual->getInscricaoCategoriaE("PT")) {

		  	$categ_e_aguardando = $inscricaoService->countInscricoesFiltered($eventoAtual->getID(),"e","a,c");
		  	$categ_e_pago = $inscricaoService->countInscricoesFiltered($eventoAtual->getID(),"e","o");
		  	$categ_e_cortesia = $inscricaoService->countInscricoesFiltered($eventoAtual->getID(),"e","g");
		  	$categ_e_total = $categ_e_aguardando + $categ_e_pago + $categ_e_cortesia;
		  	$total_aguardando += $categ_e_aguardando;
		  	$total_pago += $categ_e_pago;
		  	$total_cortesia += $categ_e_cortesia;
		  	
		  	$valor_categ_e_aguardando = $inscricaoService->sumValorTotalFiltered($eventoAtual->getID(),"e","a,c");
		  	$valor_categ_e_pago = $inscricaoService->sumValorTotalFiltered($eventoAtual->getID(),"e","o");
		  	$valor_categ_e_total = $valor_categ_e_aguardando + $valor_categ_e_pago;
		  	$valor_total_aguardando += $valor_categ_e_aguardando;
		  	$valor_total_pago += $valor_categ_e_pago;
			?>
		  <tr>
		    <td class="reportCellGrid" align="left"><?=$eventoConfiguracaoXMLAtual->getInscricaoCategoriaE("PT")?></td>
		    <td class="reportCellGrid" align="center" style="border-left:solid 1px silver"><b><?=$categ_e_pago?></b></td>
		    <td class="reportCellGrid" align="center">R$&nbsp;<?=number_format($valor_categ_e_pago/100,0,",",".")?></td>
		    <td class="reportCellGrid" align="center" style="border-left:solid 1px silver"><b><?=$categ_e_aguardando?></b></td>
		    <td class="reportCellGrid" align="center">R$&nbsp;<?=number_format($valor_categ_e_aguardando/100,0,",",".")?></td>
		    <td class="reportCellGrid" align="center" style="border-left:solid 1px silver"><b><?=$categ_e_cortesia?></b></td>
		    <td class="reportCellGrid" align="center" style="border-left:solid 1px silver"><b><?=$categ_e_total?></b></td>
		    <td class="reportCellGrid" align="center">R$&nbsp;<?=number_format($valor_categ_e_total/100,0,",",".")?></td>
		  </tr>
		<? } ?>
		  <? if ($eventoConfiguracaoXMLAtual->getInscricaoCategoriaF("PT")) {
		  	$categ_f_aguardando = $inscricaoService->countInscricoesFiltered($eventoAtual->getID(),"f","a,c");
		  	$categ_f_pago = $inscricaoService->countInscricoesFiltered($eventoAtual->getID(),"f","o");
		  	$categ_f_cortesia = $inscricaoService->countInscricoesFiltered($eventoAtual->getID(),"f","g");
		  	$categ_f_total = $categ_f_aguardando + $categ_f_pago + $categ_f_cortesia;
		  	$total_aguardando += $categ_f_aguardando;
		  	$total_pago += $categ_f_pago;
		  	$total_cortesia += $categ_f_cortesia;
		  	
		  	$valor_categ_f_aguardando = $inscricaoService->sumValorTotalFiltered($eventoAtual->getID(),"f","a,c");
		  	$valor_categ_f_pago = $inscricaoService->sumValorTotalFiltered($eventoAtual->getID(),"f","o");
		  	$valor_categ_f_total = $valor_categ_f_aguardando + $valor_categ_f_pago;
		  	$valor_total_aguardando += $valor_categ_f_aguardando;
		  	$valor_total_pago += $valor_categ_f_pago;
			?>
		  <tr>
		    <td class="reportCellGrid" align="left"><?=$eventoConfiguracaoXMLAtual->getInscricaoCategoriaF("PT")?></td>
		    <td class="reportCellGrid" align="center" style="border-left:solid 1px silver"><b><?=$categ_f_pago?></b></td>
		    <td class="reportCellGrid" align="center">R$&nbsp;<?=number_format($valor_categ_f_pago/100,0,",",".")?></td>
		    <td class="reportCellGrid" align="center" style="border-left:solid 1px silver"><b><?=$categ_f_aguardando?></b></td>
		    <td class="reportCellGrid" align="center">R$&nbsp;<?=number_format($valor_categ_f_aguardando/100,0,",",".")?></td>
		    <td class="reportCellGrid" align="center" style="border-left:solid 1px silver"><b><?=$categ_f_cortesia?></b></td>
		    <td class="reportCellGrid" align="center" style="border-left:solid 1px silver"><b><?=$categ_f_total?></b></td>
		    <td class="reportCellGrid" align="center">R$&nbsp;<?=number_format($valor_categ_f_total/100,0,",",".")?></td>
		  </tr>
		<? } ?>
		  <? if ($eventoConfiguracaoXMLAtual->getInscricaoCategoriaG("PT")) {
		  	$categ_g_aguardando = $inscricaoService->countInscricoesFiltered($eventoAtual->getID(),"g","a,c");
		  	$categ_g_pago = $inscricaoService->countInscricoesFiltered($eventoAtual->getID(),"g","o");
		  	$categ_g_cortesia = $inscricaoService->countInscricoesFiltered($eventoAtual->getID(),"g","g");
		  	$categ_g_total = $categ_g_aguardando + $categ_g_pago + $categ_g_cortesia;
		  	$total_aguardando += $categ_g_aguardando;
		  	$total_pago += $categ_g_pago;
		  	$total_cortesia += $categ_g_cortesia;
		  	
		  	$valor_categ_g_aguardando = $inscricaoService->sumValorTotalFiltered($eventoAtual->getID(),"g","a,c");
		  	$valor_categ_g_pago = $inscricaoService->sumValorTotalFiltered($eventoAtual->getID(),"g","o");
		  	$valor_categ_g_total = $valor_categ_g_aguardando + $valor_categ_g_pago;
		  	$valor_total_aguardando += $valor_categ_g_aguardando;
		  	$valor_total_pago += $valor_categ_g_pago;
			?>
		  <tr>
		    <td class="reportCellGrid" align="left"><?=$eventoConfiguracaoXMLAtual->getInscricaoCategoriaG("PT")?></td>
		    <td class="reportCellGrid" align="center" style="border-left:solid 1px silver"><b><?=$categ_g_pago?></b></td>
		    <td class="reportCellGrid" align="center">R$&nbsp;<?=number_format($valor_categ_g_pago/100,0,",",".")?></td>
		    <td class="reportCellGrid" align="center" style="border-left:solid 1px silver"><b><?=$categ_g_aguardando?></b></td>
		    <td class="reportCellGrid" align="center">R$&nbsp;<?=number_format($valor_categ_g_aguardando/100,0,",",".")?></td>
		    <td class="reportCellGrid" align="center" style="border-left:solid 1px silver"><b><?=$categ_g_cortesia?></b></td>
		    <td class="reportCellGrid" align="center" style="border-left:solid 1px silver"><b><?=$categ_g_total?></b></td>
		    <td class="reportCellGrid" align="center">R$&nbsp;<?=number_format($valor_categ_g_total/100,0,",",".")?></td>
		  </tr>
		<? } ?>
		  <? if ($eventoConfiguracaoXMLAtual->getInscricaoCategoriaH("PT")) {
		  	$categ_h_aguardando = $inscricaoService->countInscricoesFiltered($eventoAtual->getID(),"h","a,c");
		  	$categ_h_pago = $inscricaoService->countInscricoesFiltered($eventoAtual->getID(),"h","o");
		  	$categ_h_cortesia = $inscricaoService->countInscricoesFiltered($eventoAtual->getID(),"h","g");
		  	$categ_h_total = $categ_h_aguardando + $categ_h_pago + $categ_h_cortesia;
		  	$total_aguardando += $categ_h_aguardando;
		  	$total_pago += $categ_h_pago;
		  	$total_cortesia += $categ_h_cortesia;
		  	
		  	$valor_categ_h_aguardando = $inscricaoService->sumValorTotalFiltered($eventoAtual->getID(),"h","a,c");
		  	$valor_categ_h_pago = $inscricaoService->sumValorTotalFiltered($eventoAtual->getID(),"h","o");
		  	$valor_categ_h_total = $valor_categ_h_aguardando + $valor_categ_h_pago;
		  	$valor_total_aguardando += $valor_categ_h_aguardando;
		  	$valor_total_pago += $valor_categ_h_pago;
			?>
		  <tr>
		    <td class="reportCellGrid" align="left"><?=$eventoConfiguracaoXMLAtual->getInscricaoCategoriaH("PT")?></td>
		    <td class="reportCellGrid" align="center" style="border-left:solid 1px silver"><b><?=$categ_h_pago?></b></td>
		    <td class="reportCellGrid" align="center">R$&nbsp;<?=number_format($valor_categ_h_pago/100,0,",",".")?></td>
		    <td class="reportCellGrid" align="center" style="border-left:solid 1px silver"><b><?=$categ_h_aguardando?></b></td>
		    <td class="reportCellGrid" align="center">R$&nbsp;<?=number_format($valor_categ_h_aguardando/100,0,",",".")?></td>
		    <td class="reportCellGrid" align="center" style="border-left:solid 1px silver"><b><?=$categ_h_cortesia?></b></td>
		    <td class="reportCellGrid" align="center" style="border-left:solid 1px silver"><b><?=$categ_h_total?></b></td>
		    <td class="reportCellGrid" align="center">R$&nbsp;<?=number_format($valor_categ_h_total/100,0,",",".")?></td>
		  </tr>
		<? } ?>
		  <? if ($eventoConfiguracaoXMLAtual->getInscricaoCategoriaI("PT")) {
		  	$categ_i_aguardando = $inscricaoService->countInscricoesFiltered($eventoAtual->getID(),"i","a,c");
		  	$categ_i_pago = $inscricaoService->countInscricoesFiltered($eventoAtual->getID(),"i","o");
		  	$categ_i_cortesia = $inscricaoService->countInscricoesFiltered($eventoAtual->getID(),"i","g");
		  	$categ_i_total = $categ_i_aguardando + $categ_i_pago + $categ_i_cortesia;
		  	$total_aguardando += $categ_i_aguardando;
		  	$total_pago += $categ_i_pago;
		  	$total_cortesia += $categ_i_cortesia;
		  	
		  	$valor_categ_i_aguardando = $inscricaoService->sumValorTotalFiltered($eventoAtual->getID(),"i","a,c");
		  	$valor_categ_i_pago = $inscricaoService->sumValorTotalFiltered($eventoAtual->getID(),"i","o");
		  	$valor_categ_i_total = $valor_categ_i_aguardando + $valor_categ_i_pago;
		  	$valor_total_aguardando += $valor_categ_i_aguardando;
		  	$valor_total_pago += $valor_categ_i_pago;
			?>
		  <tr>
		    <td class="reportCellGrid" align="left"><?=$eventoConfiguracaoXMLAtual->getInscricaoCategoriaI("PT")?></td>
		    <td class="reportCellGrid" align="center" style="border-left:solid 1px silver"><b><?=$categ_i_pago?></b></td>
		    <td class="reportCellGrid" align="center">R$&nbsp;<?=number_format($valor_categ_i_pago/100,0,",",".")?></td>
		    <td class="reportCellGrid" align="center" style="border-left:solid 1px silver"><b><?=$categ_i_aguardando?></b></td>
		    <td class="reportCellGrid" align="center">R$&nbsp;<?=number_format($valor_categ_i_aguardando/100,0,",",".")?></td>
		    <td class="reportCellGrid" align="center" style="border-left:solid 1px silver"><b><?=$categ_i_cortesia?></b></td>
		    <td class="reportCellGrid" align="center" style="border-left:solid 1px silver"><b><?=$categ_i_total?></b></td>
		    <td class="reportCellGrid" align="center">R$&nbsp;<?=number_format($valor_categ_i_total/100,0,",",".")?></td>
		  </tr>
		<? } ?>
		  <? if ($eventoConfiguracaoXMLAtual->getInscricaoCategoriaJ("PT")) {
		  	$categ_j_aguardando = $inscricaoService->countInscricoesFiltered($eventoAtual->getID(),"j","a,c");
		  	$categ_j_pago = $inscricaoService->countInscricoesFiltered($eventoAtual->getID(),"j","o");
		  	$categ_j_cortesia = $inscricaoService->countInscricoesFiltered($eventoAtual->getID(),"j","g");
		  	$categ_j_total = $categ_j_aguardando + $categ_j_pago + $categ_j_cortesia;
		  	$total_aguardando += $categ_j_aguardando;
		  	$total_pago += $categ_j_pago;
		  	$total_cortesia += $categ_j_cortesia;
		  	
		  	$valor_categ_j_aguardando = $inscricaoService->sumValorTotalFiltered($eventoAtual->getID(),"j","a,c");
		  	$valor_categ_j_pago = $inscricaoService->sumValorTotalFiltered($eventoAtual->getID(),"j","o");
		  	$valor_categ_j_total = $valor_categ_j_aguardando + $valor_categ_j_pago;
		  	$valor_total_aguardando += $valor_categ_j_aguardando;
		  	$valor_total_pago += $valor_categ_j_pago;
			?>
		  <tr>
		    <td class="reportCellGrid" align="left"><?=$eventoConfiguracaoXMLAtual->getInscricaoCategoriaJ("PT")?></td>
		    <td class="reportCellGrid" align="center" style="border-left:solid 1px silver"><b><?=$categ_j_pago?></b></td>
		    <td class="reportCellGrid" align="center">R$&nbsp;<?=number_format($valor_categ_j_pago/100,0,",",".")?></td>
		    <td class="reportCellGrid" align="center" style="border-left:solid 1px silver"><b><?=$categ_j_aguardando?></b></td>
		    <td class="reportCellGrid" align="center">R$&nbsp;<?=number_format($valor_categ_j_aguardando/100,0,",",".")?></td>
		    <td class="reportCellGrid" align="center" style="border-left:solid 1px silver"><b><?=$categ_j_cortesia?></b></td>
		    <td class="reportCellGrid" align="center" style="border-left:solid 1px silver"><b><?=$categ_j_total?></b></td>
		    <td class="reportCellGrid" align="center">R$&nbsp;<?=number_format($valor_categ_j_total/100,0,",",".")?></td>
		  </tr>
		<? } ?>
		  <? if ($eventoConfiguracaoXMLAtual->getInscricaoCategoriaK("PT")) {
		  	$categ_k_aguardando = $inscricaoService->countInscricoesFiltered($eventoAtual->getID(),"k","a,c");
		  	$categ_k_pago = $inscricaoService->countInscricoesFiltered($eventoAtual->getID(),"k","o");
		  	$categ_k_cortesia = $inscricaoService->countInscricoesFiltered($eventoAtual->getID(),"k","g");
		  	$categ_k_total = $categ_k_aguardando + $categ_k_pago + $categ_k_cortesia;
		  	$total_aguardando += $categ_k_aguardando;
		  	$total_pago += $categ_k_pago;
		  	$total_cortesia += $categ_k_cortesia;
		  	
		  	$valor_categ_k_aguardando = $inscricaoService->sumValorTotalFiltered($eventoAtual->getID(),"k","a,c");
		  	$valor_categ_k_pago = $inscricaoService->sumValorTotalFiltered($eventoAtual->getID(),"k","o");
		  	$valor_categ_k_total = $valor_categ_k_aguardando + $valor_categ_k_pago;
		  	$valor_total_aguardando += $valor_categ_k_aguardando;
		  	$valor_total_pago += $valor_categ_k_pago;
			?>
		  <tr>
		    <td class="reportCellGrid" align="left"><?=$eventoConfiguracaoXMLAtual->getInscricaoCategoriaK("PT")?></td>
		    <td class="reportCellGrid" align="center" style="border-left:solid 1px silver"><b><?=$categ_k_pago?></b></td>
		    <td class="reportCellGrid" align="center">R$&nbsp;<?=number_format($valor_categ_k_pago/100,0,",",".")?></td>
		    <td class="reportCellGrid" align="center" style="border-left:solid 1px silver"><b><?=$categ_k_aguardando?></b></td>
		    <td class="reportCellGrid" align="center">R$&nbsp;<?=number_format($valor_categ_k_aguardando/100,0,",",".")?></td>
		    <td class="reportCellGrid" align="center" style="border-left:solid 1px silver"><b><?=$categ_k_cortesia?></b></td>
		    <td class="reportCellGrid" align="center" style="border-left:solid 1px silver"><b><?=$categ_k_total?></b></td>
		    <td class="reportCellGrid" align="center">R$&nbsp;<?=number_format($valor_categ_k_total/100,0,",",".")?></td>
		  </tr>
		<? } ?>
		  <? if ($eventoConfiguracaoXMLAtual->getInscricaoCategoriaL("PT")) {
		  	$categ_l_aguardando = $inscricaoService->countInscricoesFiltered($eventoAtual->getID(),"l","a,c");
		  	$categ_l_pago = $inscricaoService->countInscricoesFiltered($eventoAtual->getID(),"l","o");
		  	$categ_l_cortesia = $inscricaoService->countInscricoesFiltered($eventoAtual->getID(),"l","g");
		  	$categ_l_total = $categ_l_aguardando + $categ_l_pago + $categ_l_cortesia;
		  	$total_aguardando += $categ_l_aguardando;
		  	$total_pago += $categ_l_pago;
		  	$total_cortesia += $categ_l_cortesia;
		  	
		  	$valor_categ_l_aguardando = $inscricaoService->sumValorTotalFiltered($eventoAtual->getID(),"l","a,c");
		  	$valor_categ_l_pago = $inscricaoService->sumValorTotalFiltered($eventoAtual->getID(),"l","o");
		  	$valor_categ_l_total = $valor_categ_l_aguardando + $valor_categ_l_pago;
		  	$valor_total_aguardando += $valor_categ_l_aguardando;
		  	$valor_total_pago += $valor_categ_l_pago;
			?>
		  <tr>
		    <td class="reportCellGrid" align="left"><?=$eventoConfiguracaoXMLAtual->getInscricaoCategoriaL("PT")?></td>
		    <td class="reportCellGrid" align="center" style="border-left:solid 1px silver"><b><?=$categ_l_pago?></b></td>
		    <td class="reportCellGrid" align="center">R$&nbsp;<?=number_format($valor_categ_l_pago/100,0,",",".")?></td>
		    <td class="reportCellGrid" align="center" style="border-left:solid 1px silver"><b><?=$categ_l_aguardando?></b></td>
		    <td class="reportCellGrid" align="center">R$&nbsp;<?=number_format($valor_categ_l_aguardando/100,0,",",".")?></td>
		    <td class="reportCellGrid" align="center" style="border-left:solid 1px silver"><b><?=$categ_l_cortesia?></b></td>
		    <td class="reportCellGrid" align="center" style="border-left:solid 1px silver"><b><?=$categ_l_total?></b></td>
		    <td class="reportCellGrid" align="center">R$&nbsp;<?=number_format($valor_categ_l_total/100,0,",",".")?></td>
		  </tr>
		<? } ?>
		  <? if ($eventoConfiguracaoXMLAtual->getInscricaoCategoriaM("PT")) {
		  	$categ_m_aguardando = $inscricaoService->countInscricoesFiltered($eventoAtual->getID(),"m","a,c");
		  	$categ_m_pago = $inscricaoService->countInscricoesFiltered($eventoAtual->getID(),"m","o");
		  	$categ_m_cortesia = $inscricaoService->countInscricoesFiltered($eventoAtual->getID(),"m","g");
		  	$categ_m_total = $categ_m_aguardando + $categ_m_pago + $categ_m_cortesia;
		  	$total_aguardando += $categ_m_aguardando;
		  	$total_pago += $categ_m_pago;
		  	$total_cortesia += $categ_m_cortesia;
		  	
		  	$valor_categ_m_aguardando = $inscricaoService->sumValorTotalFiltered($eventoAtual->getID(),"m","a,c");
		  	$valor_categ_m_pago = $inscricaoService->sumValorTotalFiltered($eventoAtual->getID(),"m","o");
		  	$valor_categ_m_total = $valor_categ_m_aguardando + $valor_categ_m_pago;
		  	$valor_total_aguardando += $valor_categ_m_aguardando;
		  	$valor_total_pago += $valor_categ_m_pago;
			?>
		  <tr>
		    <td class="reportCellGrid" align="left"><?=$eventoConfiguracaoXMLAtual->getInscricaoCategoriaM("PT")?></td>
		    <td class="reportCellGrid" align="center" style="border-left:solid 1px silver"><b><?=$categ_m_pago?></b></td>
		    <td class="reportCellGrid" align="center">R$&nbsp;<?=number_format($valor_categ_m_pago/100,0,",",".")?></td>
		    <td class="reportCellGrid" align="center" style="border-left:solid 1px silver"><b><?=$categ_m_aguardando?></b></td>
		    <td class="reportCellGrid" align="center">R$&nbsp;<?=number_format($valor_categ_m_aguardando/100,0,",",".")?></td>
		    <td class="reportCellGrid" align="center" style="border-left:solid 1px silver"><b><?=$categ_m_cortesia?></b></td>
		    <td class="reportCellGrid" align="center" style="border-left:solid 1px silver"><b><?=$categ_m_total?></b></td>
		    <td class="reportCellGrid" align="center">R$&nbsp;<?=number_format($valor_categ_m_total/100,0,",",".")?></td>
		  </tr>
		<? } ?>
		  <? if ($eventoConfiguracaoXMLAtual->getInscricaoCategoriaN("PT")) {
		  	$categ_n_aguardando = $inscricaoService->countInscricoesFiltered($eventoAtual->getID(),"n","a,c");
		  	$categ_n_pago = $inscricaoService->countInscricoesFiltered($eventoAtual->getID(),"n","o");
		  	$categ_n_cortesia = $inscricaoService->countInscricoesFiltered($eventoAtual->getID(),"n","g");
		  	$categ_n_total = $categ_n_aguardando + $categ_n_pago + $categ_n_cortesia;
		  	$total_aguardando += $categ_n_aguardando;
		  	$total_pago += $categ_n_pago;
		  	$total_cortesia += $categ_n_cortesia;
		  	
		  	$valor_categ_n_aguardando = $inscricaoService->sumValorTotalFiltered($eventoAtual->getID(),"n","a,c");
		  	$valor_categ_n_pago = $inscricaoService->sumValorTotalFiltered($eventoAtual->getID(),"n","o");
		  	$valor_categ_n_total = $valor_categ_n_aguardando + $valor_categ_n_pago;
		  	$valor_total_aguardando += $valor_categ_n_aguardando;
		  	$valor_total_pago += $valor_categ_n_pago;
			?>
		  <tr>
		    <td class="reportCellGrid" align="left"><?=$eventoConfiguracaoXMLAtual->getInscricaoCategoriaN("PT")?></td>
		    <td class="reportCellGrid" align="center" style="border-left:solid 1px silver"><b><?=$categ_n_pago?></b></td>
		    <td class="reportCellGrid" align="center">R$&nbsp;<?=number_format($valor_categ_n_pago/100,0,",",".")?></td>
		    <td class="reportCellGrid" align="center" style="border-left:solid 1px silver"><b><?=$categ_n_aguardando?></b></td>
		    <td class="reportCellGrid" align="center">R$&nbsp;<?=number_format($valor_categ_n_aguardando/100,0,",",".")?></td>
		    <td class="reportCellGrid" align="center" style="border-left:solid 1px silver"><b><?=$categ_n_cortesia?></b></td>
		    <td class="reportCellGrid" align="center" style="border-left:solid 1px silver"><b><?=$categ_n_total?></b></td>
		    <td class="reportCellGrid" align="center">R$&nbsp;<?=number_format($valor_categ_n_total/100,0,",",".")?></td>
		  </tr>
		<? } ?>
		  <? if ($eventoConfiguracaoXMLAtual->getInscricaoCategoriaO("PT")) {
		  	$categ_o_aguardando = $inscricaoService->countInscricoesFiltered($eventoAtual->getID(),"o","a,c");
		  	$categ_o_pago = $inscricaoService->countInscricoesFiltered($eventoAtual->getID(),"o","o");
		  	$categ_o_cortesia = $inscricaoService->countInscricoesFiltered($eventoAtual->getID(),"o","g");
		  	$categ_o_total = $categ_o_aguardando + $categ_o_pago + $categ_o_cortesia;
		  	$total_aguardando += $categ_o_aguardando;
		  	$total_pago += $categ_o_pago;
		  	$total_cortesia += $categ_o_cortesia;
		  	
		  	$valor_categ_o_aguardando = $inscricaoService->sumValorTotalFiltered($eventoAtual->getID(),"o","a,c");
		  	$valor_categ_o_pago = $inscricaoService->sumValorTotalFiltered($eventoAtual->getID(),"o","o");
		  	$valor_categ_o_total = $valor_categ_o_aguardando + $valor_categ_o_pago;
		  	$valor_total_aguardando += $valor_categ_o_aguardando;
		  	$valor_total_pago += $valor_categ_o_pago;
			?>
		  <tr>
		    <td class="reportCellGrid" align="left"><?=$eventoConfiguracaoXMLAtual->getInscricaoCategoriaO("PT")?></td>
		    <td class="reportCellGrid" align="center" style="border-left:solid 1px silver"><b><?=$categ_o_pago?></b></td>
		    <td class="reportCellGrid" align="center">R$&nbsp;<?=number_format($valor_categ_o_pago/100,0,",",".")?></td>
		    <td class="reportCellGrid" align="center" style="border-left:solid 1px silver"><b><?=$categ_o_aguardando?></b></td>
		    <td class="reportCellGrid" align="center">R$&nbsp;<?=number_format($valor_categ_o_aguardando/100,0,",",".")?></td>
		    <td class="reportCellGrid" align="center" style="border-left:solid 1px silver"><b><?=$categ_o_cortesia?></b></td>
		    <td class="reportCellGrid" align="center" style="border-left:solid 1px silver"><b><?=$categ_o_total?></b></td>
		    <td class="reportCellGrid" align="center">R$&nbsp;<?=number_format($valor_categ_o_total/100,0,",",".")?></td>
		  </tr>
		<? } ?>
		  <? if ($eventoConfiguracaoXMLAtual->getInscricaoCategoriaP("PT")) {
		  	$categ_p_aguardando = $inscricaoService->countInscricoesFiltered($eventoAtual->getID(),"p","a,c");
		  	$categ_p_pago = $inscricaoService->countInscricoesFiltered($eventoAtual->getID(),"p","o");
		  	$categ_p_cortesia = $inscricaoService->countInscricoesFiltered($eventoAtual->getID(),"p","g");
		  	$categ_p_total = $categ_p_aguardando + $categ_p_pago + $categ_p_cortesia;
		  	$total_aguardando += $categ_p_aguardando;
		  	$total_pago += $categ_p_pago;
		  	$total_cortesia += $categ_p_cortesia;
		  	
		  	$valor_categ_p_aguardando = $inscricaoService->sumValorTotalFiltered($eventoAtual->getID(),"p","a,c");
		  	$valor_categ_p_pago = $inscricaoService->sumValorTotalFiltered($eventoAtual->getID(),"p","o");
		  	$valor_categ_p_total = $valor_categ_p_aguardando + $valor_categ_p_pago;
		  	$valor_total_aguardando += $valor_categ_p_aguardando;
		  	$valor_total_pago += $valor_categ_p_pago;
			?>
		  <tr>
		    <td class="reportCellGrid" align="left"><?=$eventoConfiguracaoXMLAtual->getInscricaoCategoriaP("PT")?></td>
		    <td class="reportCellGrid" align="center" style="border-left:solid 1px silver"><b><?=$categ_p_pago?></b></td>
		    <td class="reportCellGrid" align="center">R$&nbsp;<?=number_format($valor_categ_p_pago/100,0,",",".")?></td>
		    <td class="reportCellGrid" align="center" style="border-left:solid 1px silver"><b><?=$categ_p_aguardando?></b></td>
		    <td class="reportCellGrid" align="center">R$&nbsp;<?=number_format($valor_categ_p_aguardando/100,0,",",".")?></td>
		    <td class="reportCellGrid" align="center" style="border-left:solid 1px silver"><b><?=$categ_p_cortesia?></b></td>
		    <td class="reportCellGrid" align="center" style="border-left:solid 1px silver"><b><?=$categ_p_total?></b></td>
		    <td class="reportCellGrid" align="center">R$&nbsp;<?=number_format($valor_categ_p_total/100,0,",",".")?></td>
		  </tr>
		<? } ?>
		  <? if ($eventoConfiguracaoXMLAtual->getInscricaoCategoriaQ("PT")) {
		  	$categ_q_aguardando = $inscricaoService->countInscricoesFiltered($eventoAtual->getID(),"q","a,c");
		  	$categ_q_pago = $inscricaoService->countInscricoesFiltered($eventoAtual->getID(),"q","o");
		  	$categ_q_cortesia = $inscricaoService->countInscricoesFiltered($eventoAtual->getID(),"q","g");
		  	$categ_q_total = $categ_q_aguardando + $categ_q_pago + $categ_q_cortesia;
		  	$total_aguardando += $categ_q_aguardando;
		  	$total_pago += $categ_q_pago;
		  	$total_cortesia += $categ_q_cortesia;
		  	
		  	$valor_categ_q_aguardando = $inscricaoService->sumValorTotalFiltered($eventoAtual->getID(),"q","a,c");
		  	$valor_categ_q_pago = $inscricaoService->sumValorTotalFiltered($eventoAtual->getID(),"q","o");
		  	$valor_categ_q_total = $valor_categ_q_aguardando + $valor_categ_q_pago;
		  	$valor_total_aguardando += $valor_categ_q_aguardando;
		  	$valor_total_pago += $valor_categ_q_pago;
			?>
		  <tr>
		    <td class="reportCellGrid" align="left"><?=$eventoConfiguracaoXMLAtual->getInscricaoCategoriaQ("PT")?></td>
		    <td class="reportCellGrid" align="center" style="border-left:solid 1px silver"><b><?=$categ_q_pago?></b></td>
		    <td class="reportCellGrid" align="center">R$&nbsp;<?=number_format($valor_categ_q_pago/100,0,",",".")?></td>
		    <td class="reportCellGrid" align="center" style="border-left:solid 1px silver"><b><?=$categ_q_aguardando?></b></td>
		    <td class="reportCellGrid" align="center">R$&nbsp;<?=number_format($valor_categ_q_aguardando/100,0,",",".")?></td>
		    <td class="reportCellGrid" align="center" style="border-left:solid 1px silver"><b><?=$categ_q_cortesia?></b></td>
		    <td class="reportCellGrid" align="center" style="border-left:solid 1px silver"><b><?=$categ_q_total?></b></td>
		    <td class="reportCellGrid" align="center">R$&nbsp;<?=number_format($valor_categ_q_total/100,0,",",".")?></td>
		  </tr>
		<? } ?>
		  <? if ($eventoConfiguracaoXMLAtual->getInscricaoCategoriaR("PT")) {
		  	$categ_r_aguardando = $inscricaoService->countInscricoesFiltered($eventoAtual->getID(),"r","a,c");
		  	$categ_r_pago = $inscricaoService->countInscricoesFiltered($eventoAtual->getID(),"r","o");
		  	$categ_r_cortesia = $inscricaoService->countInscricoesFiltered($eventoAtual->getID(),"r","g");
		  	$categ_r_total = $categ_r_aguardando + $categ_r_pago + $categ_r_cortesia;
		  	$total_aguardando += $categ_r_aguardando;
		  	$total_pago += $categ_r_pago;
		  	$total_cortesia += $categ_r_cortesia;
		  	
		  	$valor_categ_r_aguardando = $inscricaoService->sumValorTotalFiltered($eventoAtual->getID(),"r","a,c");
		  	$valor_categ_r_pago = $inscricaoService->sumValorTotalFiltered($eventoAtual->getID(),"r","o");
		  	$valor_categ_r_total = $valor_categ_r_aguardando + $valor_categ_r_pago;
		  	$valor_total_aguardando += $valor_categ_r_aguardando;
		  	$valor_total_pago += $valor_categ_r_pago;
			?>
		  <tr>
		    <td class="reportCellGrid" align="left"><?=$eventoConfiguracaoXMLAtual->getInscricaoCategoriaR("PT")?></td>
		    <td class="reportCellGrid" align="center" style="border-left:solid 1px silver"><b><?=$categ_r_pago?></b></td>
		    <td class="reportCellGrid" align="center">R$&nbsp;<?=number_format($valor_categ_r_pago/100,0,",",".")?></td>
		    <td class="reportCellGrid" align="center" style="border-left:solid 1px silver"><b><?=$categ_r_aguardando?></b></td>
		    <td class="reportCellGrid" align="center">R$&nbsp;<?=number_format($valor_categ_r_aguardando/100,0,",",".")?></td>
		    <td class="reportCellGrid" align="center" style="border-left:solid 1px silver"><b><?=$categ_r_cortesia?></b></td>
		    <td class="reportCellGrid" align="center" style="border-left:solid 1px silver"><b><?=$categ_r_total?></b></td>
		    <td class="reportCellGrid" align="center">R$&nbsp;<?=number_format($valor_categ_r_total/100,0,",",".")?></td>
		  </tr>
		<? } ?>
		  <? if ($eventoConfiguracaoXMLAtual->getInscricaoCategoriaS("PT")) {
		  	$categ_s_aguardando = $inscricaoService->countInscricoesFiltered($eventoAtual->getID(),"s","a,c");
		  	$categ_s_pago = $inscricaoService->countInscricoesFiltered($eventoAtual->getID(),"s","o");
		  	$categ_s_cortesia = $inscricaoService->countInscricoesFiltered($eventoAtual->getID(),"s","g");
		  	$categ_s_total = $categ_s_aguardando + $categ_s_pago + $categ_s_cortesia;
		  	$total_aguardando += $categ_s_aguardando;
		  	$total_pago += $categ_s_pago;
		  	$total_cortesia += $categ_s_cortesia;
		  	
		  	$valor_categ_s_aguardando = $inscricaoService->sumValorTotalFiltered($eventoAtual->getID(),"s","a,c");
		  	$valor_categ_s_pago = $inscricaoService->sumValorTotalFiltered($eventoAtual->getID(),"s","o");
		  	$valor_categ_s_total = $valor_categ_s_aguardando + $valor_categ_s_pago;
		  	$valor_total_aguardando += $valor_categ_s_aguardando;
		  	$valor_total_pago += $valor_categ_s_pago;
			?>
		  <tr>
		    <td class="reportCellGrid" align="left"><?=$eventoConfiguracaoXMLAtual->getInscricaoCategoriaS("PT")?></td>
		    <td class="reportCellGrid" align="center" style="border-left:solid 1px silver"><b><?=$categ_s_pago?></b></td>
		    <td class="reportCellGrid" align="center">R$&nbsp;<?=number_format($valor_categ_s_pago/100,0,",",".")?></td>
		    <td class="reportCellGrid" align="center" style="border-left:solid 1px silver"><b><?=$categ_s_aguardando?></b></td>
		    <td class="reportCellGrid" align="center">R$&nbsp;<?=number_format($valor_categ_s_aguardando/100,0,",",".")?></td>
		    <td class="reportCellGrid" align="center" style="border-left:solid 1px silver"><b><?=$categ_s_cortesia?></b></td>
		    <td class="reportCellGrid" align="center" style="border-left:solid 1px silver"><b><?=$categ_s_total?></b></td>
		    <td class="reportCellGrid" align="center">R$&nbsp;<?=number_format($valor_categ_s_total/100,0,",",".")?></td>
		  </tr>
		<? } ?>
		  <? if ($eventoConfiguracaoXMLAtual->getInscricaoCategoriaT("PT")) {
		  	$categ_t_aguardando = $inscricaoService->countInscricoesFiltered($eventoAtual->getID(),"t","a,c");
		  	$categ_t_pago = $inscricaoService->countInscricoesFiltered($eventoAtual->getID(),"t","o");
		  	$categ_t_cortesia = $inscricaoService->countInscricoesFiltered($eventoAtual->getID(),"t","g");
		  	$categ_t_total = $categ_t_aguardando + $categ_t_pago + $categ_t_cortesia;
		  	$total_aguardando += $categ_t_aguardando;
		  	$total_pago += $categ_t_pago;
		  	$total_cortesia += $categ_t_cortesia;
		  	
		  	$valor_categ_t_aguardando = $inscricaoService->sumValorTotalFiltered($eventoAtual->getID(),"t","a,c");
		  	$valor_categ_t_pago = $inscricaoService->sumValorTotalFiltered($eventoAtual->getID(),"t","o");
		  	$valor_categ_t_total = $valor_categ_t_aguardando + $valor_categ_t_pago;
		  	$valor_total_aguardando += $valor_categ_t_aguardando;
		  	$valor_total_pago += $valor_categ_t_pago;
			?>
		  <tr>
		    <td class="reportCellGrid" align="left"><?=$eventoConfiguracaoXMLAtual->getInscricaoCategoriaT("PT")?></td>
		    <td class="reportCellGrid" align="center" style="border-left:solid 1px silver"><b><?=$categ_t_pago?></b></td>
		    <td class="reportCellGrid" align="center">R$&nbsp;<?=number_format($valor_categ_t_pago/100,0,",",".")?></td>
		    <td class="reportCellGrid" align="center" style="border-left:solid 1px silver"><b><?=$categ_t_aguardando?></b></td>
		    <td class="reportCellGrid" align="center">R$&nbsp;<?=number_format($valor_categ_t_aguardando/100,0,",",".")?></td>
		    <td class="reportCellGrid" align="center" style="border-left:solid 1px silver"><b><?=$categ_t_cortesia?></b></td>
		    <td class="reportCellGrid" align="center" style="border-left:solid 1px silver"><b><?=$categ_t_total?></b></td>
		    <td class="reportCellGrid" align="center">R$&nbsp;<?=number_format($valor_categ_t_total/100,0,",",".")?></td>
		  </tr>
		<? } ?>
		  <? if ($eventoConfiguracaoXMLAtual->getInscricaoCategoriaU("PT")) {
		  	$categ_u_aguardando = $inscricaoService->countInscricoesFiltered($eventoAtual->getID(),"u","a,c");
		  	$categ_u_pago = $inscricaoService->countInscricoesFiltered($eventoAtual->getID(),"u","o");
		  	$categ_u_cortesia = $inscricaoService->countInscricoesFiltered($eventoAtual->getID(),"u","g");
		  	$categ_u_total = $categ_u_aguardando + $categ_u_pago + $categ_u_cortesia;
		  	$total_aguardando += $categ_u_aguardando;
		  	$total_pago += $categ_u_pago;
		  	$total_cortesia += $categ_u_cortesia;
		  	
		  	$valor_categ_u_aguardando = $inscricaoService->sumValorTotalFiltered($eventoAtual->getID(),"u","a,c");
		  	$valor_categ_u_pago = $inscricaoService->sumValorTotalFiltered($eventoAtual->getID(),"u","o");
		  	$valor_categ_u_total = $valor_categ_u_aguardando + $valor_categ_u_pago;
		  	$valor_total_aguardando += $valor_categ_u_aguardando;
		  	$valor_total_pago += $valor_categ_u_pago;
			?>
		  <tr>
		    <td class="reportCellGrid" align="left"><?=$eventoConfiguracaoXMLAtual->getInscricaoCategoriaU("PT")?></td>
		    <td class="reportCellGrid" align="center" style="border-left:solid 1px silver"><b><?=$categ_u_pago?></b></td>
		    <td class="reportCellGrid" align="center">R$&nbsp;<?=number_format($valor_categ_u_pago/100,0,",",".")?></td>
		    <td class="reportCellGrid" align="center" style="border-left:solid 1px silver"><b><?=$categ_u_aguardando?></b></td>
		    <td class="reportCellGrid" align="center">R$&nbsp;<?=number_format($valor_categ_u_aguardando/100,0,",",".")?></td>
		    <td class="reportCellGrid" align="center" style="border-left:solid 1px silver"><b><?=$categ_u_cortesia?></b></td>
		    <td class="reportCellGrid" align="center" style="border-left:solid 1px silver"><b><?=$categ_u_total?></b></td>
		    <td class="reportCellGrid" align="center">R$&nbsp;<?=number_format($valor_categ_u_total/100,0,",",".")?></td>
		  </tr>
		<? } ?>
		  <? if ($eventoConfiguracaoXMLAtual->getInscricaoCategoriaV("PT")) {
		  	$categ_v_aguardando = $inscricaoService->countInscricoesFiltered($eventoAtual->getID(),"v","a,c");
		  	$categ_v_pago = $inscricaoService->countInscricoesFiltered($eventoAtual->getID(),"v","o");
		  	$categ_v_cortesia = $inscricaoService->countInscricoesFiltered($eventoAtual->getID(),"v","g");
		  	$categ_v_total = $categ_v_aguardando + $categ_v_pago + $categ_v_cortesia;
		  	$total_aguardando += $categ_v_aguardando;
		  	$total_pago += $categ_v_pago;
		  	$total_cortesia += $categ_v_cortesia;
		  	
		  	$valor_categ_v_aguardando = $inscricaoService->sumValorTotalFiltered($eventoAtual->getID(),"v","a,c");
		  	$valor_categ_v_pago = $inscricaoService->sumValorTotalFiltered($eventoAtual->getID(),"v","o");
		  	$valor_categ_v_total = $valor_categ_v_aguardando + $valor_categ_v_pago;
		  	$valor_total_aguardando += $valor_categ_v_aguardando;
		  	$valor_total_pago += $valor_categ_v_pago;
			?>
		  <tr>
		    <td class="reportCellGrid" align="left"><?=$eventoConfiguracaoXMLAtual->getInscricaoCategoriaV("PT")?></td>
		    <td class="reportCellGrid" align="center" style="border-left:solid 1px silver"><b><?=$categ_v_pago?></b></td>
		    <td class="reportCellGrid" align="center">R$&nbsp;<?=number_format($valor_categ_v_pago/100,0,",",".")?></td>
		    <td class="reportCellGrid" align="center" style="border-left:solid 1px silver"><b><?=$categ_v_aguardando?></b></td>
		    <td class="reportCellGrid" align="center">R$&nbsp;<?=number_format($valor_categ_v_aguardando/100,0,",",".")?></td>
		    <td class="reportCellGrid" align="center" style="border-left:solid 1px silver"><b><?=$categ_v_cortesia?></b></td>
		    <td class="reportCellGrid" align="center" style="border-left:solid 1px silver"><b><?=$categ_v_total?></b></td>
		    <td class="reportCellGrid" align="center">R$&nbsp;<?=number_format($valor_categ_v_total/100,0,",",".")?></td>
		  </tr>
		<? } ?>
		  <? if ($eventoConfiguracaoXMLAtual->getInscricaoCategoriaW("PT")) {
		  	$categ_w_aguardando = $inscricaoService->countInscricoesFiltered($eventoAtual->getID(),"w","a,c");
		  	$categ_w_pago = $inscricaoService->countInscricoesFiltered($eventoAtual->getID(),"w","o");
		  	$categ_w_cortesia = $inscricaoService->countInscricoesFiltered($eventoAtual->getID(),"w","g");
		  	$categ_w_total = $categ_w_aguardando + $categ_w_pago + $categ_w_cortesia;
		  	$total_aguardando += $categ_w_aguardando;
		  	$total_pago += $categ_w_pago;
		  	$total_cortesia += $categ_w_cortesia;
		  	
		  	$valor_categ_w_aguardando = $inscricaoService->sumValorTotalFiltered($eventoAtual->getID(),"w","a,c");
		  	$valor_categ_w_pago = $inscricaoService->sumValorTotalFiltered($eventoAtual->getID(),"w","o");
		  	$valor_categ_w_total = $valor_categ_w_aguardando + $valor_categ_w_pago;
		  	$valor_total_aguardando += $valor_categ_w_aguardando;
		  	$valor_total_pago += $valor_categ_w_pago;
			?>
		  <tr>
		    <td class="reportCellGrid" align="left"><?=$eventoConfiguracaoXMLAtual->getInscricaoCategoriaW("PT")?></td>
		    <td class="reportCellGrid" align="center" style="border-left:solid 1px silver"><b><?=$categ_w_pago?></b></td>
		    <td class="reportCellGrid" align="center">R$&nbsp;<?=number_format($valor_categ_w_pago/100,0,",",".")?></td>
		    <td class="reportCellGrid" align="center" style="border-left:solid 1px silver"><b><?=$categ_w_aguardando?></b></td>
		    <td class="reportCellGrid" align="center">R$&nbsp;<?=number_format($valor_categ_w_aguardando/100,0,",",".")?></td>
		    <td class="reportCellGrid" align="center" style="border-left:solid 1px silver"><b><?=$categ_w_cortesia?></b></td>
		    <td class="reportCellGrid" align="center" style="border-left:solid 1px silver"><b><?=$categ_w_total?></b></td>
		    <td class="reportCellGrid" align="center">R$&nbsp;<?=number_format($valor_categ_w_total/100,0,",",".")?></td>
		  </tr>
		<? } ?>
		  <? if ($eventoConfiguracaoXMLAtual->getInscricaoCategoriaX("PT")) {
		  	$categ_x_aguardando = $inscricaoService->countInscricoesFiltered($eventoAtual->getID(),"x","a,c");
		  	$categ_x_pago = $inscricaoService->countInscricoesFiltered($eventoAtual->getID(),"x","o");
		  	$categ_x_cortesia = $inscricaoService->countInscricoesFiltered($eventoAtual->getID(),"x","g");
		  	$categ_x_total = $categ_x_aguardando + $categ_x_pago + $categ_x_cortesia;
		  	$total_aguardando += $categ_x_aguardando;
		  	$total_pago += $categ_x_pago;
		  	$total_cortesia += $categ_x_cortesia;
		  	
		  	$valor_categ_x_aguardando = $inscricaoService->sumValorTotalFiltered($eventoAtual->getID(),"x","a,c");
		  	$valor_categ_x_pago = $inscricaoService->sumValorTotalFiltered($eventoAtual->getID(),"x","o");
		  	$valor_categ_x_total = $valor_categ_x_aguardando + $valor_categ_x_pago;
		  	$valor_total_aguardando += $valor_categ_x_aguardando;
		  	$valor_total_pago += $valor_categ_x_pago;
			?>
		  <tr>
		    <td class="reportCellGrid" align="left"><?=$eventoConfiguracaoXMLAtual->getInscricaoCategoriaX("PT")?></td>
		    <td class="reportCellGrid" align="center" style="border-left:solid 1px silver"><b><?=$categ_x_pago?></b></td>
		    <td class="reportCellGrid" align="center">R$&nbsp;<?=number_format($valor_categ_x_pago/100,0,",",".")?></td>
		    <td class="reportCellGrid" align="center" style="border-left:solid 1px silver"><b><?=$categ_x_aguardando?></b></td>
		    <td class="reportCellGrid" align="center">R$&nbsp;<?=number_format($valor_categ_x_aguardando/100,0,",",".")?></td>
		    <td class="reportCellGrid" align="center" style="border-left:solid 1px silver"><b><?=$categ_x_cortesia?></b></td>
		    <td class="reportCellGrid" align="center" style="border-left:solid 1px silver"><b><?=$categ_x_total?></b></td>
		    <td class="reportCellGrid" align="center">R$&nbsp;<?=number_format($valor_categ_x_total/100,0,",",".")?></td>
		  </tr>
		<? } ?>
		  <? if ($eventoConfiguracaoXMLAtual->getInscricaoCategoriaY("PT")) {
		  	$categ_y_aguardando = $inscricaoService->countInscricoesFiltered($eventoAtual->getID(),"y","a,c");
		  	$categ_y_pago = $inscricaoService->countInscricoesFiltered($eventoAtual->getID(),"y","o");
		  	$categ_y_cortesia = $inscricaoService->countInscricoesFiltered($eventoAtual->getID(),"y","g");
		  	$categ_y_total = $categ_y_aguardando + $categ_y_pago + $categ_y_cortesia;
		  	$total_aguardando += $categ_y_aguardando;
		  	$total_pago += $categ_y_pago;
		  	$total_cortesia += $categ_y_cortesia;
		  	
		  	$valor_categ_y_aguardando = $inscricaoService->sumValorTotalFiltered($eventoAtual->getID(),"y","a,c");
		  	$valor_categ_y_pago = $inscricaoService->sumValorTotalFiltered($eventoAtual->getID(),"y","o");
		  	$valor_categ_y_total = $valor_categ_y_aguardando + $valor_categ_y_pago;
		  	$valor_total_aguardando += $valor_categ_y_aguardando;
		  	$valor_total_pago += $valor_categ_y_pago;
			?>
		  <tr>
		    <td class="reportCellGrid" align="left"><?=$eventoConfiguracaoXMLAtual->getInscricaoCategoriaY("PT")?></td>
		    <td class="reportCellGrid" align="center" style="border-left:solid 1px silver"><b><?=$categ_y_pago?></b></td>
		    <td class="reportCellGrid" align="center">R$&nbsp;<?=number_format($valor_categ_y_pago/100,0,",",".")?></td>
		    <td class="reportCellGrid" align="center" style="border-left:solid 1px silver"><b><?=$categ_y_aguardando?></b></td>
		    <td class="reportCellGrid" align="center">R$&nbsp;<?=number_format($valor_categ_y_aguardando/100,0,",",".")?></td>
		    <td class="reportCellGrid" align="center" style="border-left:solid 1px silver"><b><?=$categ_y_cortesia?></b></td>
		    <td class="reportCellGrid" align="center" style="border-left:solid 1px silver"><b><?=$categ_y_total?></b></td>
		    <td class="reportCellGrid" align="center">R$&nbsp;<?=number_format($valor_categ_y_total/100,0,",",".")?></td>
		  </tr>
		<? } ?>
		  <? if ($eventoConfiguracaoXMLAtual->getInscricaoCategoriaZ("PT")) {
		  	$categ_z_aguardando = $inscricaoService->countInscricoesFiltered($eventoAtual->getID(),"z","a,c");
		  	$categ_z_pago = $inscricaoService->countInscricoesFiltered($eventoAtual->getID(),"z","o");
		  	$categ_z_cortesia = $inscricaoService->countInscricoesFiltered($eventoAtual->getID(),"z","g");
		  	$categ_z_total = $categ_z_aguardando + $categ_z_pago + $categ_z_cortesia;
		  	$total_aguardando += $categ_z_aguardando;
		  	$total_pago += $categ_z_pago;
		  	$total_cortesia += $categ_z_cortesia;
		  	
		  	$valor_categ_z_aguardando = $inscricaoService->sumValorTotalFiltered($eventoAtual->getID(),"z","a,c");
		  	$valor_categ_z_pago = $inscricaoService->sumValorTotalFiltered($eventoAtual->getID(),"z","o");
		  	$valor_categ_z_total = $valor_categ_z_aguardando + $valor_categ_z_pago;
		  	$valor_total_aguardando += $valor_categ_z_aguardando;
		  	$valor_total_pago += $valor_categ_z_pago;
			?>
		  <tr>
		    <td class="reportCellGrid" align="left"><?=$eventoConfiguracaoXMLAtual->getInscricaoCategoriaZ("PT")?></td>
		    <td class="reportCellGrid" align="center" style="border-left:solid 1px silver"><b><?=$categ_z_pago?></b></td>
		    <td class="reportCellGrid" align="center">R$&nbsp;<?=number_format($valor_categ_z_pago/100,0,",",".")?></td>
		    <td class="reportCellGrid" align="center" style="border-left:solid 1px silver"><b><?=$categ_z_aguardando?></b></td>
		    <td class="reportCellGrid" align="center">R$&nbsp;<?=number_format($valor_categ_z_aguardando/100,0,",",".")?></td>
		    <td class="reportCellGrid" align="center" style="border-left:solid 1px silver"><b><?=$categ_z_cortesia?></b></td>
		    <td class="reportCellGrid" align="center" style="border-left:solid 1px silver"><b><?=$categ_z_total?></b></td>
		    <td class="reportCellGrid" align="center">R$&nbsp;<?=number_format($valor_categ_z_total/100,0,",",".")?></td>
		  </tr>
		<? } ?>
		  <tr>
		    <td class="reportCellTotal" align="left"><b>TOTAL</b></td>
		    <td class="reportCellTotal" align="center" style="border-left:solid 1px silver"><b><?=$total_pago?></b></td>
		    <td class="reportCellTotal" align="center">R$&nbsp;<?=number_format($valor_total_pago/100,0,",",".")?></td>
		    <td class="reportCellTotal" align="center" style="border-left:solid 1px silver"><b><?=$total_aguardando?></b></td>
		    <td class="reportCellTotal" align="center">R$&nbsp;<?=number_format($valor_total_aguardando/100,0,",",".")?></td>
		    <td class="reportCellTotal" align="center" style="border-left:solid 1px silver"><b><?=$total_cortesia?></b></td>
		    <td class="reportCellTotal" align="center" style="border-left:solid 1px silver"><b><?=$total_pago + $total_aguardando + $total_cortesia?></b></td>
		    <td class="reportCellTotal" align="center">R$&nbsp;<?=number_format(($valor_total_pago+$valor_total_aguardando)/100,0,",",".")?></td>
		  </tr>		  
		</table>

		<br>
		<?
		$total_status_indefinido = $inscricaoService->countInscricoesFiltered($eventoAtual->getID(),"","i");
		if ($total_status_indefinido > 0) {
			?>
			<u>Atenção</u>:<br>
			Foram encontradas <?=$total_status_indefinido?> inscrições com status de pagamento indefinido.<br>
			<a href="inscricao_list.php?insc_status_pgto=i">Clique aqui</a> para listá-las e corrigi-las.
			<?
		}
		?>
		
		
	</td>
	<td width="50%" valign="top">
	
		<br>
		
		<!-- Qtd de Inscrições por Curso x Status de Pgto -->
		<div style="padding-bottom:8px;">
			<u>Inscrições por Curso</u>
		</div>
		<?	// Prepara as variáveis de total
			$total_aguardando = 0;
			$total_pago = 0;
			$total_cortesia = 0;
		?>
		<table border="0" cellspacing="0" cellpadding="0" class="reportTable">
		  <tr class="reportTableHeader">
		    <td class="reportTableHeader" align="center"></td>
		    <td class="reportTableHeader" align="center">Pago</td>
		    <td class="reportTableHeader" align="center">A Receber</td>
		    <td class="reportTableHeader" align="center">Cortesia</td>
		    <td class="reportTableHeader" align="center">Qtd. Total</td>
		  </tr>
		<? if ($eventoConfiguracaoXMLAtual->getInscricaoCurso1("PT")) {
			$curso_1_aguardando = $inscricaoService->countInscricoesByCursoFiltered($eventoAtual->getID(),1,'a') + $inscricaoService->countInscricoesByCursoFiltered($eventoAtual->getID(),1,'c');
			$curso_1_pago = $inscricaoService->countInscricoesByCursoFiltered($eventoAtual->getID(),1,'o');
			$curso_1_cortesia = $inscricaoService->countInscricoesByCursoFiltered($eventoAtual->getID(),1,'g');
			$curso_1_total = $curso_1_pago + $curso_1_aguardando + $curso_1_cortesia;
			
		  	$total_aguardando += $curso_1_aguardando;
		  	$total_pago += $curso_1_pago;
		  	$total_cortesia += $curso_1_cortesia;
			?>
		  <tr>
		    <td class="reportCellGrid" align="left"><?=$eventoConfiguracaoXMLAtual->getInscricaoCurso1("PT")?></td>
		    <td class="reportCellGrid" align="center"><?=$curso_1_pago?></td>
		    <td class="reportCellGrid" align="center"><?=$curso_1_aguardando?></td>
		    <td class="reportCellGrid" align="center"><?=$curso_1_cortesia?></td>
		    <td class="reportCellGrid" align="center"><?=$curso_1_total?></td>
		  </tr>
		<? } ?>
		<? if ($eventoConfiguracaoXMLAtual->getInscricaoCurso2("PT")) {
			$curso_2_aguardando = $inscricaoService->countInscricoesByCursoFiltered($eventoAtual->getID(),2,'a') + $inscricaoService->countInscricoesByCursoFiltered($eventoAtual->getID(),2,'c');
			$curso_2_pago = $inscricaoService->countInscricoesByCursoFiltered($eventoAtual->getID(),2,'o');
			$curso_2_cortesia = $inscricaoService->countInscricoesByCursoFiltered($eventoAtual->getID(),2,'g');
			$curso_2_total = $curso_2_pago + $curso_2_aguardando + $curso_2_cortesia;
			
		  	$total_aguardando += $curso_2_aguardando;
		  	$total_pago += $curso_2_pago;
		  	$total_cortesia += $curso_2_cortesia;
			?>
		  <tr>
		    <td class="reportCellGrid" align="left"><?=$eventoConfiguracaoXMLAtual->getInscricaoCurso2("PT")?></td>
		    <td class="reportCellGrid" align="center"><?=$curso_2_pago?></td>
		    <td class="reportCellGrid" align="center"><?=$curso_2_aguardando?></td>
		    <td class="reportCellGrid" align="center"><?=$curso_2_cortesia?></td>
		    <td class="reportCellGrid" align="center"><?=$curso_2_total?></td>
		  </tr>
		<? } ?>
		<? if ($eventoConfiguracaoXMLAtual->getInscricaoCurso3("PT")) {
			$curso_3_aguardando = $inscricaoService->countInscricoesByCursoFiltered($eventoAtual->getID(),3,'a') + $inscricaoService->countInscricoesByCursoFiltered($eventoAtual->getID(),3,'c');
			$curso_3_pago = $inscricaoService->countInscricoesByCursoFiltered($eventoAtual->getID(),3,'o');
			$curso_3_cortesia = $inscricaoService->countInscricoesByCursoFiltered($eventoAtual->getID(),3,'g');
			$curso_3_total = $curso_3_pago + $curso_3_aguardando + $curso_3_cortesia;
			
		  	$total_aguardando += $curso_3_aguardando;
		  	$total_pago += $curso_3_pago;
		  	$total_cortesia += $curso_3_cortesia;
			?>
		  <tr>
		    <td class="reportCellGrid" align="left"><?=$eventoConfiguracaoXMLAtual->getInscricaoCurso3("PT")?></td>
		    <td class="reportCellGrid" align="center"><?=$curso_3_pago?></td>
		    <td class="reportCellGrid" align="center"><?=$curso_3_aguardando?></td>
		    <td class="reportCellGrid" align="center"><?=$curso_3_cortesia?></td>
		    <td class="reportCellGrid" align="center"><?=$curso_3_total?></td>
		  </tr>
		<? } ?>
		<? if ($eventoConfiguracaoXMLAtual->getInscricaoCurso4("PT")) {
			$curso_4_aguardando = $inscricaoService->countInscricoesByCursoFiltered($eventoAtual->getID(),4,'a') + $inscricaoService->countInscricoesByCursoFiltered($eventoAtual->getID(),4,'c');
			$curso_4_pago = $inscricaoService->countInscricoesByCursoFiltered($eventoAtual->getID(),4,'o');
			$curso_4_cortesia = $inscricaoService->countInscricoesByCursoFiltered($eventoAtual->getID(),4,'g');
			$curso_4_total = $curso_4_pago + $curso_4_aguardando + $curso_4_cortesia;
			
		  	$total_aguardando += $curso_4_aguardando;
		  	$total_pago += $curso_4_pago;
		  	$total_cortesia += $curso_4_cortesia;
			?>
		  <tr>
		    <td class="reportCellGrid" align="left"><?=$eventoConfiguracaoXMLAtual->getInscricaoCurso4("PT")?></td>
		    <td class="reportCellGrid" align="center"><?=$curso_4_pago?></td>
		    <td class="reportCellGrid" align="center"><?=$curso_4_aguardando?></td>
		    <td class="reportCellGrid" align="center"><?=$curso_4_cortesia?></td>
		    <td class="reportCellGrid" align="center"><?=$curso_4_total?></td>
		  </tr>
		<? } ?>
		<? if ($eventoConfiguracaoXMLAtual->getInscricaoCurso5("PT")) {
			$curso_5_aguardando = $inscricaoService->countInscricoesByCursoFiltered($eventoAtual->getID(),5,'a') + $inscricaoService->countInscricoesByCursoFiltered($eventoAtual->getID(),5,'c');
			$curso_5_pago = $inscricaoService->countInscricoesByCursoFiltered($eventoAtual->getID(),5,'o');
			$curso_5_cortesia = $inscricaoService->countInscricoesByCursoFiltered($eventoAtual->getID(),5,'g');
			$curso_5_total = $curso_5_pago + $curso_5_aguardando + $curso_5_cortesia;
			
		  	$total_aguardando += $curso_5_aguardando;
		  	$total_pago += $curso_5_pago;
		  	$total_cortesia += $curso_5_cortesia;
			?>
		  <tr>
		    <td class="reportCellGrid" align="left"><?=$eventoConfiguracaoXMLAtual->getInscricaoCurso5("PT")?></td>
		    <td class="reportCellGrid" align="center"><?=$curso_5_pago?></td>
		    <td class="reportCellGrid" align="center"><?=$curso_5_aguardando?></td>
		    <td class="reportCellGrid" align="center"><?=$curso_5_cortesia?></td>
		    <td class="reportCellGrid" align="center"><?=$curso_5_total?></td>
		  </tr>
		<? } ?>
		<? if ($eventoConfiguracaoXMLAtual->getInscricaoCurso6("PT")) {
			$curso_6_aguardando = $inscricaoService->countInscricoesByCursoFiltered($eventoAtual->getID(),6,'a') + $inscricaoService->countInscricoesByCursoFiltered($eventoAtual->getID(),6,'c');
			$curso_6_pago = $inscricaoService->countInscricoesByCursoFiltered($eventoAtual->getID(),6,'o');
			$curso_6_cortesia = $inscricaoService->countInscricoesByCursoFiltered($eventoAtual->getID(),6,'g');
			$curso_6_total = $curso_6_pago + $curso_6_aguardando + $curso_6_cortesia;
			
		  	$total_aguardando += $curso_6_aguardando;
		  	$total_pago += $curso_6_pago;
		  	$total_cortesia += $curso_6_cortesia;
			?>
		  <tr>
		    <td class="reportCellGrid" align="left"><?=$eventoConfiguracaoXMLAtual->getInscricaoCurso6("PT")?></td>
		    <td class="reportCellGrid" align="center"><?=$curso_6_pago?></td>
		    <td class="reportCellGrid" align="center"><?=$curso_6_aguardando?></td>
		    <td class="reportCellGrid" align="center"><?=$curso_6_cortesia?></td>
		    <td class="reportCellGrid" align="center"><?=$curso_6_total?></td>
		  </tr>
		<? } ?>
		<? if ($eventoConfiguracaoXMLAtual->getInscricaoCurso7("PT")) {
			$curso_7_aguardando = $inscricaoService->countInscricoesByCursoFiltered($eventoAtual->getID(),7,'a') + $inscricaoService->countInscricoesByCursoFiltered($eventoAtual->getID(),7,'c');
			$curso_7_pago = $inscricaoService->countInscricoesByCursoFiltered($eventoAtual->getID(),7,'o');
			$curso_7_cortesia = $inscricaoService->countInscricoesByCursoFiltered($eventoAtual->getID(),7,'g');
			$curso_7_total = $curso_7_pago + $curso_7_aguardando + $curso_7_cortesia;
			
		  	$total_aguardando += $curso_7_aguardando;
		  	$total_pago += $curso_7_pago;
		  	$total_cortesia += $curso_7_cortesia;
			?>
		  <tr>
		    <td class="reportCellGrid" align="left"><?=$eventoConfiguracaoXMLAtual->getInscricaoCurso7("PT")?></td>
		    <td class="reportCellGrid" align="center"><?=$curso_7_pago?></td>
		    <td class="reportCellGrid" align="center"><?=$curso_7_aguardando?></td>
		    <td class="reportCellGrid" align="center"><?=$curso_7_cortesia?></td>
		    <td class="reportCellGrid" align="center"><?=$curso_7_total?></td>
		  </tr>
		<? } ?>
		<? if ($eventoConfiguracaoXMLAtual->getInscricaoCurso8("PT")) {
			$curso_8_aguardando = $inscricaoService->countInscricoesByCursoFiltered($eventoAtual->getID(),8,'a') + $inscricaoService->countInscricoesByCursoFiltered($eventoAtual->getID(),8,'c');
			$curso_8_pago = $inscricaoService->countInscricoesByCursoFiltered($eventoAtual->getID(),8,'o');
			$curso_8_cortesia = $inscricaoService->countInscricoesByCursoFiltered($eventoAtual->getID(),8,'g');
			$curso_8_total = $curso_8_pago + $curso_8_aguardando + $curso_8_cortesia;
			
		  	$total_aguardando += $curso_8_aguardando;
		  	$total_pago += $curso_8_pago;
		  	$total_cortesia += $curso_8_cortesia;
			?>
		  <tr>
		    <td class="reportCellGrid" align="left"><?=$eventoConfiguracaoXMLAtual->getInscricaoCurso8("PT")?></td>
		    <td class="reportCellGrid" align="center"><?=$curso_8_pago?></td>
		    <td class="reportCellGrid" align="center"><?=$curso_8_aguardando?></td>
		    <td class="reportCellGrid" align="center"><?=$curso_8_cortesia?></td>
		    <td class="reportCellGrid" align="center"><?=$curso_8_total?></td>
		  </tr>
		<? } ?>
		<? if ($eventoConfiguracaoXMLAtual->getInscricaoCurso9("PT")) {
			$curso_9_aguardando = $inscricaoService->countInscricoesByCursoFiltered($eventoAtual->getID(),9,'a') + $inscricaoService->countInscricoesByCursoFiltered($eventoAtual->getID(),9,'c');
			$curso_9_pago = $inscricaoService->countInscricoesByCursoFiltered($eventoAtual->getID(),9,'o');
			$curso_9_cortesia = $inscricaoService->countInscricoesByCursoFiltered($eventoAtual->getID(),9,'g');
			$curso_9_total = $curso_9_pago + $curso_9_aguardando + $curso_9_cortesia;
			
		  	$total_aguardando += $curso_9_aguardando;
		  	$total_pago += $curso_9_pago;
		  	$total_cortesia += $curso_9_cortesia;
			?>
		  <tr>
		    <td class="reportCellGrid" align="left"><?=$eventoConfiguracaoXMLAtual->getInscricaoCurso9("PT")?></td>
		    <td class="reportCellGrid" align="center"><?=$curso_9_pago?></td>
		    <td class="reportCellGrid" align="center"><?=$curso_9_aguardando?></td>
		    <td class="reportCellGrid" align="center"><?=$curso_9_cortesia?></td>
		    <td class="reportCellGrid" align="center"><?=$curso_9_total?></td>
		  </tr>
		<? } ?>
		<? if ($eventoConfiguracaoXMLAtual->getInscricaoCurso10("PT")) {
			$curso_10_aguardando = $inscricaoService->countInscricoesByCursoFiltered($eventoAtual->getID(),10,'a') + $inscricaoService->countInscricoesByCursoFiltered($eventoAtual->getID(),10,'c');
			$curso_10_pago = $inscricaoService->countInscricoesByCursoFiltered($eventoAtual->getID(),10,'o');
			$curso_10_cortesia = $inscricaoService->countInscricoesByCursoFiltered($eventoAtual->getID(),10,'g');
			$curso_10_total = $curso_10_pago + $curso_10_aguardando + $curso_10_cortesia;
			
		  	$total_aguardando += $curso_10_aguardando;
		  	$total_pago += $curso_10_pago;
		  	$total_cortesia += $curso_10_cortesia;
			?>
		  <tr>
		    <td class="reportCellGrid" align="left"><?=$eventoConfiguracaoXMLAtual->getInscricaoCurso10("PT")?></td>
		    <td class="reportCellGrid" align="center"><?=$curso_10_pago?></td>
		    <td class="reportCellGrid" align="center"><?=$curso_10_aguardando?></td>
		    <td class="reportCellGrid" align="center"><?=$curso_10_cortesia?></td>
		    <td class="reportCellGrid" align="center"><?=$curso_10_total?></td>
		  </tr>
		<? } ?>
		<? if ($eventoConfiguracaoXMLAtual->getInscricaoCurso11("PT")) {
			$curso_11_aguardando = $inscricaoService->countInscricoesByCursoFiltered($eventoAtual->getID(),11,'a') + $inscricaoService->countInscricoesByCursoFiltered($eventoAtual->getID(),11,'c');
			$curso_11_pago = $inscricaoService->countInscricoesByCursoFiltered($eventoAtual->getID(),11,'o');
			$curso_11_cortesia = $inscricaoService->countInscricoesByCursoFiltered($eventoAtual->getID(),11,'g');
			$curso_11_total = $curso_11_pago + $curso_11_aguardando + $curso_11_cortesia;
			
		  	$total_aguardando += $curso_11_aguardando;
		  	$total_pago += $curso_11_pago;
		  	$total_cortesia += $curso_11_cortesia;
			?>
		  <tr>
		    <td class="reportCellGrid" align="left"><?=$eventoConfiguracaoXMLAtual->getInscricaoCurso11("PT")?></td>
		    <td class="reportCellGrid" align="center"><?=$curso_11_pago?></td>
		    <td class="reportCellGrid" align="center"><?=$curso_11_aguardando?></td>
		    <td class="reportCellGrid" align="center"><?=$curso_11_cortesia?></td>
		    <td class="reportCellGrid" align="center"><?=$curso_11_total?></td>
		  </tr>
		<? } ?>
		<? if ($eventoConfiguracaoXMLAtual->getInscricaoCurso12("PT")) {
			$curso_12_aguardando = $inscricaoService->countInscricoesByCursoFiltered($eventoAtual->getID(),12,'a') + $inscricaoService->countInscricoesByCursoFiltered($eventoAtual->getID(),12,'c');
			$curso_12_pago = $inscricaoService->countInscricoesByCursoFiltered($eventoAtual->getID(),12,'o');
			$curso_12_cortesia = $inscricaoService->countInscricoesByCursoFiltered($eventoAtual->getID(),12,'g');
			$curso_12_total = $curso_12_pago + $curso_12_aguardando + $curso_12_cortesia;
			
		  	$total_aguardando += $curso_12_aguardando;
		  	$total_pago += $curso_12_pago;
		  	$total_cortesia += $curso_12_cortesia;
			?>
		  <tr>
		    <td class="reportCellGrid" align="left"><?=$eventoConfiguracaoXMLAtual->getInscricaoCurso12("PT")?></td>
		    <td class="reportCellGrid" align="center"><?=$curso_12_pago?></td>
		    <td class="reportCellGrid" align="center"><?=$curso_12_aguardando?></td>
		    <td class="reportCellGrid" align="center"><?=$curso_12_cortesia?></td>
		    <td class="reportCellGrid" align="center"><?=$curso_12_total?></td>
		  </tr>
		<? } ?>
		<? if ($eventoConfiguracaoXMLAtual->getInscricaoCurso13("PT")) {
			$curso_13_aguardando = $inscricaoService->countInscricoesByCursoFiltered($eventoAtual->getID(),13,'a') + $inscricaoService->countInscricoesByCursoFiltered($eventoAtual->getID(),13,'c');
			$curso_13_pago = $inscricaoService->countInscricoesByCursoFiltered($eventoAtual->getID(),13,'o');
			$curso_13_cortesia = $inscricaoService->countInscricoesByCursoFiltered($eventoAtual->getID(),13,'g');
			$curso_13_total = $curso_13_pago + $curso_13_aguardando + $curso_13_cortesia;
			
		  	$total_aguardando += $curso_13_aguardando;
		  	$total_pago += $curso_13_pago;
		  	$total_cortesia += $curso_13_cortesia;
			?>
		  <tr>
		    <td class="reportCellGrid" align="left"><?=$eventoConfiguracaoXMLAtual->getInscricaoCurso13("PT")?></td>
		    <td class="reportCellGrid" align="center"><?=$curso_13_pago?></td>
		    <td class="reportCellGrid" align="center"><?=$curso_13_aguardando?></td>
		    <td class="reportCellGrid" align="center"><?=$curso_13_cortesia?></td>
		    <td class="reportCellGrid" align="center"><?=$curso_13_total?></td>
		  </tr>
		<? } ?>
		<? if ($eventoConfiguracaoXMLAtual->getInscricaoCurso14("PT")) {
			$curso_14_aguardando = $inscricaoService->countInscricoesByCursoFiltered($eventoAtual->getID(),14,'a') + $inscricaoService->countInscricoesByCursoFiltered($eventoAtual->getID(),14,'c');
			$curso_14_pago = $inscricaoService->countInscricoesByCursoFiltered($eventoAtual->getID(),14,'o');
			$curso_14_cortesia = $inscricaoService->countInscricoesByCursoFiltered($eventoAtual->getID(),14,'g');
			$curso_14_total = $curso_14_pago + $curso_14_aguardando + $curso_14_cortesia;
			
		  	$total_aguardando += $curso_14_aguardando;
		  	$total_pago += $curso_14_pago;
		  	$total_cortesia += $curso_14_cortesia;
			?>
		  <tr>
		    <td class="reportCellGrid" align="left"><?=$eventoConfiguracaoXMLAtual->getInscricaoCurso14("PT")?></td>
		    <td class="reportCellGrid" align="center"><?=$curso_14_pago?></td>
		    <td class="reportCellGrid" align="center"><?=$curso_14_aguardando?></td>
		    <td class="reportCellGrid" align="center"><?=$curso_14_cortesia?></td>
		    <td class="reportCellGrid" align="center"><?=$curso_14_total?></td>
		  </tr>
		<? } ?>
		<? if ($eventoConfiguracaoXMLAtual->getInscricaoCurso15("PT")) {
			$curso_15_aguardando = $inscricaoService->countInscricoesByCursoFiltered($eventoAtual->getID(),15,'a') + $inscricaoService->countInscricoesByCursoFiltered($eventoAtual->getID(),15,'c');
			$curso_15_pago = $inscricaoService->countInscricoesByCursoFiltered($eventoAtual->getID(),15,'o');
			$curso_15_cortesia = $inscricaoService->countInscricoesByCursoFiltered($eventoAtual->getID(),15,'g');
			$curso_15_total = $curso_15_pago + $curso_15_aguardando + $curso_15_cortesia;
			
		  	$total_aguardando += $curso_15_aguardando;
		  	$total_pago += $curso_15_pago;
		  	$total_cortesia += $curso_15_cortesia;
			?>
		  <tr>
		    <td class="reportCellGrid" align="left"><?=$eventoConfiguracaoXMLAtual->getInscricaoCurso15("PT")?></td>
		    <td class="reportCellGrid" align="center"><?=$curso_15_pago?></td>
		    <td class="reportCellGrid" align="center"><?=$curso_15_aguardando?></td>
		    <td class="reportCellGrid" align="center"><?=$curso_15_cortesia?></td>
		    <td class="reportCellGrid" align="center"><?=$curso_15_total?></td>
		  </tr>
		<? } ?>
		<? if ($eventoConfiguracaoXMLAtual->getInscricaoCurso16("PT")) {
			$curso_16_aguardando = $inscricaoService->countInscricoesByCursoFiltered($eventoAtual->getID(),16,'a') + $inscricaoService->countInscricoesByCursoFiltered($eventoAtual->getID(),16,'c');
			$curso_16_pago = $inscricaoService->countInscricoesByCursoFiltered($eventoAtual->getID(),16,'o');
			$curso_16_cortesia = $inscricaoService->countInscricoesByCursoFiltered($eventoAtual->getID(),16,'g');
			$curso_16_total = $curso_16_pago + $curso_16_aguardando + $curso_16_cortesia;
			
		  	$total_aguardando += $curso_16_aguardando;
		  	$total_pago += $curso_16_pago;
		  	$total_cortesia += $curso_16_cortesia;
			?>
		  <tr>
		    <td class="reportCellGrid" align="left"><?=$eventoConfiguracaoXMLAtual->getInscricaoCurso16("PT")?></td>
		    <td class="reportCellGrid" align="center"><?=$curso_16_pago?></td>
		    <td class="reportCellGrid" align="center"><?=$curso_16_aguardando?></td>
		    <td class="reportCellGrid" align="center"><?=$curso_16_cortesia?></td>
		    <td class="reportCellGrid" align="center"><?=$curso_16_total?></td>
		  </tr>
		<? } ?>
		<? if ($eventoConfiguracaoXMLAtual->getInscricaoCurso17("PT")) {
			$curso_17_aguardando = $inscricaoService->countInscricoesByCursoFiltered($eventoAtual->getID(),17,'a') + $inscricaoService->countInscricoesByCursoFiltered($eventoAtual->getID(),17,'c');
			$curso_17_pago = $inscricaoService->countInscricoesByCursoFiltered($eventoAtual->getID(),17,'o');
			$curso_17_cortesia = $inscricaoService->countInscricoesByCursoFiltered($eventoAtual->getID(),17,'g');
			$curso_17_total = $curso_17_pago + $curso_17_aguardando + $curso_17_cortesia;
			
		  	$total_aguardando += $curso_17_aguardando;
		  	$total_pago += $curso_17_pago;
		  	$total_cortesia += $curso_17_cortesia;
			?>
		  <tr>
		    <td class="reportCellGrid" align="left"><?=$eventoConfiguracaoXMLAtual->getInscricaoCurso17("PT")?></td>
		    <td class="reportCellGrid" align="center"><?=$curso_17_pago?></td>
		    <td class="reportCellGrid" align="center"><?=$curso_17_aguardando?></td>
		    <td class="reportCellGrid" align="center"><?=$curso_17_cortesia?></td>
		    <td class="reportCellGrid" align="center"><?=$curso_17_total?></td>
		  </tr>
		<? } ?>
		<? if ($eventoConfiguracaoXMLAtual->getInscricaoCurso18("PT")) {
			$curso_18_aguardando = $inscricaoService->countInscricoesByCursoFiltered($eventoAtual->getID(),18,'a') + $inscricaoService->countInscricoesByCursoFiltered($eventoAtual->getID(),18,'c');
			$curso_18_pago = $inscricaoService->countInscricoesByCursoFiltered($eventoAtual->getID(),18,'o');
			$curso_18_cortesia = $inscricaoService->countInscricoesByCursoFiltered($eventoAtual->getID(),18,'g');
			$curso_18_total = $curso_18_pago + $curso_18_aguardando + $curso_18_cortesia;
			
		  	$total_aguardando += $curso_18_aguardando;
		  	$total_pago += $curso_18_pago;
		  	$total_cortesia += $curso_18_cortesia;
			?>
		  <tr>
		    <td class="reportCellGrid" align="left"><?=$eventoConfiguracaoXMLAtual->getInscricaoCurso18("PT")?></td>
		    <td class="reportCellGrid" align="center"><?=$curso_18_pago?></td>
		    <td class="reportCellGrid" align="center"><?=$curso_18_aguardando?></td>
		    <td class="reportCellGrid" align="center"><?=$curso_18_cortesia?></td>
		    <td class="reportCellGrid" align="center"><?=$curso_18_total?></td>
		  </tr>
		<? } ?>
		<? if ($eventoConfiguracaoXMLAtual->getInscricaoCurso19("PT")) {
			$curso_19_aguardando = $inscricaoService->countInscricoesByCursoFiltered($eventoAtual->getID(),19,'a') + $inscricaoService->countInscricoesByCursoFiltered($eventoAtual->getID(),19,'c');
			$curso_19_pago = $inscricaoService->countInscricoesByCursoFiltered($eventoAtual->getID(),19,'o');
			$curso_19_cortesia = $inscricaoService->countInscricoesByCursoFiltered($eventoAtual->getID(),19,'g');
			$curso_19_total = $curso_19_pago + $curso_19_aguardando + $curso_19_cortesia;
			
		  	$total_aguardando += $curso_19_aguardando;
		  	$total_pago += $curso_19_pago;
		  	$total_cortesia += $curso_19_cortesia;
			?>
		  <tr>
		    <td class="reportCellGrid" align="left"><?=$eventoConfiguracaoXMLAtual->getInscricaoCurso19("PT")?></td>
		    <td class="reportCellGrid" align="center"><?=$curso_19_pago?></td>
		    <td class="reportCellGrid" align="center"><?=$curso_19_aguardando?></td>
		    <td class="reportCellGrid" align="center"><?=$curso_19_cortesia?></td>
		    <td class="reportCellGrid" align="center"><?=$curso_19_total?></td>
		  </tr>
		<? } ?>
		<? if ($eventoConfiguracaoXMLAtual->getInscricaoCurso20("PT")) {
			$curso_20_aguardando = $inscricaoService->countInscricoesByCursoFiltered($eventoAtual->getID(),20,'a') + $inscricaoService->countInscricoesByCursoFiltered($eventoAtual->getID(),20,'c');
			$curso_20_pago = $inscricaoService->countInscricoesByCursoFiltered($eventoAtual->getID(),20,'o');
			$curso_20_cortesia = $inscricaoService->countInscricoesByCursoFiltered($eventoAtual->getID(),20,'g');
			$curso_20_total = $curso_20_pago + $curso_20_aguardando + $curso_20_cortesia;
			
		  	$total_aguardando += $curso_20_aguardando;
		  	$total_pago += $curso_20_pago;
		  	$total_cortesia += $curso_20_cortesia;
			?>
		  <tr>
		    <td class="reportCellGrid" align="left"><?=$eventoConfiguracaoXMLAtual->getInscricaoCurso20("PT")?></td>
		    <td class="reportCellGrid" align="center"><?=$curso_20_pago?></td>
		    <td class="reportCellGrid" align="center"><?=$curso_20_aguardando?></td>
		    <td class="reportCellGrid" align="center"><?=$curso_20_cortesia?></td>
		    <td class="reportCellGrid" align="center"><?=$curso_20_total?></td>
		  </tr>
		<? } ?>
		<? if ($eventoConfiguracaoXMLAtual->getInscricaoCurso21("PT")) {
			$curso_21_aguardando = $inscricaoService->countInscricoesByCursoFiltered($eventoAtual->getID(),21,'a') + $inscricaoService->countInscricoesByCursoFiltered($eventoAtual->getID(),21,'c');
			$curso_21_pago = $inscricaoService->countInscricoesByCursoFiltered($eventoAtual->getID(),21,'o');
			$curso_21_cortesia = $inscricaoService->countInscricoesByCursoFiltered($eventoAtual->getID(),21,'g');
			$curso_21_total = $curso_21_pago + $curso_21_aguardando + $curso_21_cortesia;
			
		  	$total_aguardando += $curso_21_aguardando;
		  	$total_pago += $curso_21_pago;
		  	$total_cortesia += $curso_21_cortesia;
			?>
		  <tr>
		    <td class="reportCellGrid" align="left"><?=$eventoConfiguracaoXMLAtual->getInscricaoCurso21("PT")?></td>
		    <td class="reportCellGrid" align="center"><?=$curso_21_pago?></td>
		    <td class="reportCellGrid" align="center"><?=$curso_21_aguardando?></td>
		    <td class="reportCellGrid" align="center"><?=$curso_21_cortesia?></td>
		    <td class="reportCellGrid" align="center"><?=$curso_21_total?></td>
		  </tr>
		<? } ?>
		<? if ($eventoConfiguracaoXMLAtual->getInscricaoCurso22("PT")) {
			$curso_22_aguardando = $inscricaoService->countInscricoesByCursoFiltered($eventoAtual->getID(),22,'a') + $inscricaoService->countInscricoesByCursoFiltered($eventoAtual->getID(),22,'c');
			$curso_22_pago = $inscricaoService->countInscricoesByCursoFiltered($eventoAtual->getID(),22,'o');
			$curso_22_cortesia = $inscricaoService->countInscricoesByCursoFiltered($eventoAtual->getID(),22,'g');
			$curso_22_total = $curso_22_pago + $curso_22_aguardando + $curso_22_cortesia;
			
		  	$total_aguardando += $curso_22_aguardando;
		  	$total_pago += $curso_22_pago;
		  	$total_cortesia += $curso_22_cortesia;
			?>
		  <tr>
		    <td class="reportCellGrid" align="left"><?=$eventoConfiguracaoXMLAtual->getInscricaoCurso22("PT")?></td>
		    <td class="reportCellGrid" align="center"><?=$curso_22_pago?></td>
		    <td class="reportCellGrid" align="center"><?=$curso_22_aguardando?></td>
		    <td class="reportCellGrid" align="center"><?=$curso_22_cortesia?></td>
		    <td class="reportCellGrid" align="center"><?=$curso_22_total?></td>
		  </tr>
		<? } ?>
		<? if ($eventoConfiguracaoXMLAtual->getInscricaoCurso23("PT")) {
			$curso_23_aguardando = $inscricaoService->countInscricoesByCursoFiltered($eventoAtual->getID(),23,'a') + $inscricaoService->countInscricoesByCursoFiltered($eventoAtual->getID(),23,'c');
			$curso_23_pago = $inscricaoService->countInscricoesByCursoFiltered($eventoAtual->getID(),23,'o');
			$curso_23_cortesia = $inscricaoService->countInscricoesByCursoFiltered($eventoAtual->getID(),23,'g');
			$curso_23_total = $curso_23_pago + $curso_23_aguardando + $curso_23_cortesia;
			
		  	$total_aguardando += $curso_23_aguardando;
		  	$total_pago += $curso_23_pago;
		  	$total_cortesia += $curso_23_cortesia;
			?>
		  <tr>
		    <td class="reportCellGrid" align="left"><?=$eventoConfiguracaoXMLAtual->getInscricaoCurso23("PT")?></td>
		    <td class="reportCellGrid" align="center"><?=$curso_23_pago?></td>
		    <td class="reportCellGrid" align="center"><?=$curso_23_aguardando?></td>
		    <td class="reportCellGrid" align="center"><?=$curso_23_cortesia?></td>
		    <td class="reportCellGrid" align="center"><?=$curso_23_total?></td>
		  </tr>
		<? } ?>
		<? if ($eventoConfiguracaoXMLAtual->getInscricaoCurso24("PT")) {
			$curso_24_aguardando = $inscricaoService->countInscricoesByCursoFiltered($eventoAtual->getID(),24,'a') + $inscricaoService->countInscricoesByCursoFiltered($eventoAtual->getID(),24,'c');
			$curso_24_pago = $inscricaoService->countInscricoesByCursoFiltered($eventoAtual->getID(),24,'o');
			$curso_24_cortesia = $inscricaoService->countInscricoesByCursoFiltered($eventoAtual->getID(),24,'g');
			$curso_24_total = $curso_24_pago + $curso_24_aguardando + $curso_24_cortesia;
			
		  	$total_aguardando += $curso_24_aguardando;
		  	$total_pago += $curso_24_pago;
		  	$total_cortesia += $curso_24_cortesia;
			?>
		  <tr>
		    <td class="reportCellGrid" align="left"><?=$eventoConfiguracaoXMLAtual->getInscricaoCurso24("PT")?></td>
		    <td class="reportCellGrid" align="center"><?=$curso_24_pago?></td>
		    <td class="reportCellGrid" align="center"><?=$curso_24_aguardando?></td>
		    <td class="reportCellGrid" align="center"><?=$curso_24_cortesia?></td>
		    <td class="reportCellGrid" align="center"><?=$curso_24_total?></td>
		  </tr>
		<? } ?>
		<? if ($eventoConfiguracaoXMLAtual->getInscricaoCurso25("PT")) {
			$curso_25_aguardando = $inscricaoService->countInscricoesByCursoFiltered($eventoAtual->getID(),25,'a') + $inscricaoService->countInscricoesByCursoFiltered($eventoAtual->getID(),25,'c');
			$curso_25_pago = $inscricaoService->countInscricoesByCursoFiltered($eventoAtual->getID(),25,'o');
			$curso_25_cortesia = $inscricaoService->countInscricoesByCursoFiltered($eventoAtual->getID(),25,'g');
			$curso_25_total = $curso_25_pago + $curso_25_aguardando + $curso_25_cortesia;
			
		  	$total_aguardando += $curso_25_aguardando;
		  	$total_pago += $curso_25_pago;
		  	$total_cortesia += $curso_25_cortesia;
			?>
		  <tr>
		    <td class="reportCellGrid" align="left"><?=$eventoConfiguracaoXMLAtual->getInscricaoCurso25("PT")?></td>
		    <td class="reportCellGrid" align="center"><?=$curso_25_pago?></td>
		    <td class="reportCellGrid" align="center"><?=$curso_25_aguardando?></td>
		    <td class="reportCellGrid" align="center"><?=$curso_25_cortesia?></td>
		    <td class="reportCellGrid" align="center"><?=$curso_25_total?></td>
		  </tr>
		<? } ?>
		<? if ($eventoConfiguracaoXMLAtual->getInscricaoCurso26("PT")) {
			$curso_26_aguardando = $inscricaoService->countInscricoesByCursoFiltered($eventoAtual->getID(),26,'a') + $inscricaoService->countInscricoesByCursoFiltered($eventoAtual->getID(),26,'c');
			$curso_26_pago = $inscricaoService->countInscricoesByCursoFiltered($eventoAtual->getID(),26,'o');
			$curso_26_cortesia = $inscricaoService->countInscricoesByCursoFiltered($eventoAtual->getID(),26,'g');
			$curso_26_total = $curso_26_pago + $curso_26_aguardando + $curso_26_cortesia;
			
		  	$total_aguardando += $curso_26_aguardando;
		  	$total_pago += $curso_26_pago;
		  	$total_cortesia += $curso_26_cortesia;
			?>
		  <tr>
		    <td class="reportCellGrid" align="left"><?=$eventoConfiguracaoXMLAtual->getInscricaoCurso26("PT")?></td>
		    <td class="reportCellGrid" align="center"><?=$curso_26_pago?></td>
		    <td class="reportCellGrid" align="center"><?=$curso_26_aguardando?></td>
		    <td class="reportCellGrid" align="center"><?=$curso_26_cortesia?></td>
		    <td class="reportCellGrid" align="center"><?=$curso_26_total?></td>
		  </tr>
		<? } ?>
		<? if ($eventoConfiguracaoXMLAtual->getInscricaoCurso27("PT")) {
			$curso_27_aguardando = $inscricaoService->countInscricoesByCursoFiltered($eventoAtual->getID(),27,'a') + $inscricaoService->countInscricoesByCursoFiltered($eventoAtual->getID(),27,'c');
			$curso_27_pago = $inscricaoService->countInscricoesByCursoFiltered($eventoAtual->getID(),27,'o');
			$curso_27_cortesia = $inscricaoService->countInscricoesByCursoFiltered($eventoAtual->getID(),27,'g');
			$curso_27_total = $curso_27_pago + $curso_27_aguardando + $curso_27_cortesia;
			
		  	$total_aguardando += $curso_27_aguardando;
		  	$total_pago += $curso_27_pago;
		  	$total_cortesia += $curso_27_cortesia;
			?>
		  <tr>
		    <td class="reportCellGrid" align="left"><?=$eventoConfiguracaoXMLAtual->getInscricaoCurso27("PT")?></td>
		    <td class="reportCellGrid" align="center"><?=$curso_27_pago?></td>
		    <td class="reportCellGrid" align="center"><?=$curso_27_aguardando?></td>
		    <td class="reportCellGrid" align="center"><?=$curso_27_cortesia?></td>
		    <td class="reportCellGrid" align="center"><?=$curso_27_total?></td>
		  </tr>
		<? } ?>
		<? if ($eventoConfiguracaoXMLAtual->getInscricaoCurso28("PT")) {
			$curso_28_aguardando = $inscricaoService->countInscricoesByCursoFiltered($eventoAtual->getID(),28,'a') + $inscricaoService->countInscricoesByCursoFiltered($eventoAtual->getID(),28,'c');
			$curso_28_pago = $inscricaoService->countInscricoesByCursoFiltered($eventoAtual->getID(),28,'o');
			$curso_28_cortesia = $inscricaoService->countInscricoesByCursoFiltered($eventoAtual->getID(),28,'g');
			$curso_28_total = $curso_28_pago + $curso_28_aguardando + $curso_28_cortesia;
			
		  	$total_aguardando += $curso_28_aguardando;
		  	$total_pago += $curso_28_pago;
		  	$total_cortesia += $curso_28_cortesia;
			?>
		  <tr>
		    <td class="reportCellGrid" align="left"><?=$eventoConfiguracaoXMLAtual->getInscricaoCurso28("PT")?></td>
		    <td class="reportCellGrid" align="center"><?=$curso_28_pago?></td>
		    <td class="reportCellGrid" align="center"><?=$curso_28_aguardando?></td>
		    <td class="reportCellGrid" align="center"><?=$curso_28_cortesia?></td>
		    <td class="reportCellGrid" align="center"><?=$curso_28_total?></td>
		  </tr>
		<? } ?>
		<? if ($eventoConfiguracaoXMLAtual->getInscricaoCurso29("PT")) {
			$curso_29_aguardando = $inscricaoService->countInscricoesByCursoFiltered($eventoAtual->getID(),29,'a') + $inscricaoService->countInscricoesByCursoFiltered($eventoAtual->getID(),29,'c');
			$curso_29_pago = $inscricaoService->countInscricoesByCursoFiltered($eventoAtual->getID(),29,'o');
			$curso_29_cortesia = $inscricaoService->countInscricoesByCursoFiltered($eventoAtual->getID(),29,'g');
			$curso_29_total = $curso_29_pago + $curso_29_aguardando + $curso_29_cortesia;
			
		  	$total_aguardando += $curso_29_aguardando;
		  	$total_pago += $curso_29_pago;
		  	$total_cortesia += $curso_29_cortesia;
			?>
		  <tr>
		    <td class="reportCellGrid" align="left"><?=$eventoConfiguracaoXMLAtual->getInscricaoCurso29("PT")?></td>
		    <td class="reportCellGrid" align="center"><?=$curso_29_pago?></td>
		    <td class="reportCellGrid" align="center"><?=$curso_29_aguardando?></td>
		    <td class="reportCellGrid" align="center"><?=$curso_29_cortesia?></td>
		    <td class="reportCellGrid" align="center"><?=$curso_29_total?></td>
		  </tr>
		<? } ?>
		<? if ($eventoConfiguracaoXMLAtual->getInscricaoCurso30("PT")) {
			$curso_30_aguardando = $inscricaoService->countInscricoesByCursoFiltered($eventoAtual->getID(),30,'a') + $inscricaoService->countInscricoesByCursoFiltered($eventoAtual->getID(),30,'c');
			$curso_30_pago = $inscricaoService->countInscricoesByCursoFiltered($eventoAtual->getID(),30,'o');
			$curso_30_cortesia = $inscricaoService->countInscricoesByCursoFiltered($eventoAtual->getID(),30,'g');
			$curso_30_total = $curso_30_pago + $curso_30_aguardando + $curso_30_cortesia;
			
		  	$total_aguardando += $curso_30_aguardando;
		  	$total_pago += $curso_30_pago;
		  	$total_cortesia += $curso_30_cortesia;
			?>
		  <tr>
		    <td class="reportCellGrid" align="left"><?=$eventoConfiguracaoXMLAtual->getInscricaoCurso30("PT")?></td>
		    <td class="reportCellGrid" align="center"><?=$curso_30_pago?></td>
		    <td class="reportCellGrid" align="center"><?=$curso_30_aguardando?></td>
		    <td class="reportCellGrid" align="center"><?=$curso_30_cortesia?></td>
		    <td class="reportCellGrid" align="center"><?=$curso_30_total?></td>
		  </tr>
		<? } ?>
		  <tr>
		    <td class="reportCellTotal" align="left"><b>TOTAL</b></td>
		    <td class="reportCellTotal" align="center"><b><?=$total_pago?></b></td>
		    <td class="reportCellTotal" align="center"><b><?=$total_aguardando?></b></td>
		    <td class="reportCellTotal" align="center"><b><?=$total_cortesia?></b></td>
		    <td class="reportCellTotal" align="center"><b><?=$total_pago + $total_aguardando + $total_cortesia?></b></td>
		  </tr>
		</table>

	</td>
	</tr>
	<tr>
	<td colspan="2" class="main" valign="top">
	
		<br>

		<div style="padding-bottom:8px;">
			<u>Resumo sobre Inscrições</u>
		</div>	
		<!-- Qtd de Inscrições por Categorias x Status de Pgto -->
		<?	// Prepara as variáveis de total
			$valor_total_a = $inscricaoService->sumValorTotalFiltered($eventoAtual->getID(),"","a");
			$valor_total_c = $inscricaoService->sumValorTotalFiltered($eventoAtual->getID(),"","c");
			$valor_total_o = $inscricaoService->sumValorTotalFiltered($eventoAtual->getID(),"","o");
		?>
		<table border="0" cellspacing="5" cellpadding="0">
		  <tr class="reportCell">
		    <td class="reportCell" align="right"><b>Valor Total</b></td>
		    <td class="reportCell" align="right" style="border: 1px solid silver">R$&nbsp;<?= number_format(($valor_total_a + $valor_total_c + $valor_total_o)/100,2,",","."); ?></td>
		  </tr>
		    <td class="reportCell" align="right"><b>Valor Pago</b></td>
		    <td class="reportCell" align="right" style="border: 1px solid silver">R$&nbsp;<?= number_format(($valor_total_o)/100,2,",","."); ?></td>
		  </tr>
		    <td class="reportCell" align="right"><b>Valor A Receber</b></td>
		    <td class="reportCell" align="right" style="border: 1px solid silver">R$&nbsp;<?= number_format(($valor_total_a + $valor_total_c)/100,2,",","."); ?></td>
		  </tr>
		<?	// Prepara as variáveis de total
			$total_acompanhantes = $inscricaoService->countAcompanhantes($eventoAtual->getID());
			$total_sexo_m = $inscricaoService->countInscricoesBySexo($eventoAtual->getID(),"M");
			$total_sexo_f = $inscricaoService->countInscricoesBySexo($eventoAtual->getID(),"F");
			$total_sexo_i = $inscricaoService->countInscricoesBySexo($eventoAtual->getID(),"");
		?>
		  <tr class="reportCell">
		    <td class="reportCell" align="right"><b>Qtd. Acompanhantes</b></td>
		    <td class="reportCell" width="50px" align="right" style="border: 1px solid silver"><?=$total_acompanhantes?></td>
		  </tr>
		  <tr class="reportCell">
		    <td class="reportCell" align="right"><b>Qtd. Homens</b></td>
		    <td class="reportCell" width="50px" align="right" style="border: 1px solid silver"><?=$total_sexo_m?></td>
		  </tr>
		  <tr class="reportCell">
		    <td class="reportCell" align="right"><b>Qtd. Mulheres</b></td>
		    <td class="reportCell" width="50px" align="right" style="border: 1px solid silver"><?=$total_sexo_f?></td>
		  </tr>
		  <tr class="reportCell">
		    <td class="reportCell" align="right"><b>Qtd. Sexo não cadastrado</b></td>
		    <td class="reportCell" width="50px" align="right" style="border: 1px solid silver"><?=$total_sexo_i?></td>
		  </tr>
		  <? $total_inscritos = $total_sexo_m + $total_sexo_f + $total_sexo_i + $total_acompanhantes; ?>
		  <tr class="reportCell">
		    <td class="reportCell" align="right"><b>Total de Inscritos</b></td>
		    <td class="reportCellTotal" width="50px" align="right" style="border: 1px solid silver"><?=$total_inscritos?></td>
		  </tr>
		</table>
	
	</td>
	
</tr>
</table>



<? include_once("struct/struct_bottom.php")?>
<? } ?>