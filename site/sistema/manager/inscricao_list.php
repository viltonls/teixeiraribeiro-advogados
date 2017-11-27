<? include_once("struct/auth.php")?>
<?
if (!session_is_registered("evento")) { 
	header("Location: session_seleciona_evento.php?url=inscricao_list.php&orga_id=0&configurado=1");
} else {
	
$print = $_REQUEST["print"];
	
if ($print == "true") {
	include_once("struct/struct_print.php");
} else {
	include_once("struct/struct_top.php");
}
include_once('../classes/class.inscricao.php');
include_once('../classes/service.inscricao.php');

if ($_REQUEST["order_by"]) {
	$order_by = $_REQUEST["order_by"];
} else {
	$order_by = "INSC_NOME ASC";
}


/* @var $eventoAtual Evento */
$inscricaoService = new InscricaoService();
$inscricaoList = $inscricaoService->listInscricoesByEventoFiltered($eventoAtual->getID(),$order_by,$_REQUEST["insc_nome"],$_REQUEST["insc_categoria"],$_REQUEST["insc_opcao"],$_REQUEST["insc_forma_pgto"],"",$_REQUEST["insc_status_pgto"],$_REQUEST["insc_org_nome"],"");

/* @var $usuarioAtual Usuario*/
/* @var $eventoConfiguracaoAtual Configuracao */
/* @var $eventoConfiguracaoXMLAtual ConfiguracaoXML */

?>
<div class="structTitle">Listar Inscrições do Evento "<?=$eventoAtual->getNOME()?>"</div>

<? if ($print != "true") { ?>

<form action="inscricao_list.php" method="POST" name="theForm">
<input type="hidden" name="print" id="print" value="false">
<script language="Javascript">
	function printList() {
		document.getElementById('print').value = 'true';
		document.theForm.submit();
	}
</script>
(<a href="javascript:printList();">Versão para Impressão</a>)

<div style="padding-top:8px;"></div>
<table border="0" cellpadding="2" cellspacing="0">
<tr>
	<td class="structFilter">Filtar por:</td>
	<td class="structFilter">&nbsp;&nbsp;&nbsp;</td>
	<td class="structFilter">Nome</td>
	<td class="structFilter"><input type="edit" name="insc_nome" class="structFilterBox" value="<?=$_REQUEST["insc_nome"];?>"></td>
	<td class="structFilter">&nbsp;&nbsp;&nbsp;</td>
	<td class="structFilter">Organização</td>
	<td class="structFilter"><input type="edit" name="insc_org_nome" class="structFilterBox" value="<?=$_REQUEST["insc_org_nome"];?>"></td>
	<td class="structFilter">&nbsp;&nbsp;&nbsp;</td>
	<td class="structFilter">Opção</td>
	<td class="structFilter">
		<select class="structFilterBox" name="insc_opcao">
			<option value="">Todas</option>
			<? if ($eventoConfiguracaoXMLAtual->getInscricaoOpcao1("PT")) { ?>
			<option value="1" <?= ($_REQUEST["insc_opcao"]=="1") ? "selected" : "";?>><?= $eventoConfiguracaoXMLAtual->getInscricaoOpcao1("PT"); ?></option>
			<? } ?>
			<? if ($eventoConfiguracaoXMLAtual->getInscricaoOpcao2("PT")) { ?>
			<option value="2" <?= ($_REQUEST["insc_opcao"]=="2") ? "selected" : "";?>><?= $eventoConfiguracaoXMLAtual->getInscricaoOpcao2("PT"); ?></option>
			<? } ?>
			<? if ($eventoConfiguracaoXMLAtual->getInscricaoOpcao3("PT")) { ?>
			<option value="3" <?= ($_REQUEST["insc_opcao"]=="3") ? "selected" : "";?>><?= $eventoConfiguracaoXMLAtual->getInscricaoOpcao3("PT"); ?></option>
			<? } ?>
			<? if ($eventoConfiguracaoXMLAtual->getInscricaoOpcao4("PT")) { ?>
			<option value="4" <?= ($_REQUEST["insc_opcao"]=="4") ? "selected" : "";?>><?= $eventoConfiguracaoXMLAtual->getInscricaoOpcao4("PT"); ?></option>
			<? } ?>
			<? if ($eventoConfiguracaoXMLAtual->getInscricaoOpcao5("PT")) { ?>
			<option value="5" <?= ($_REQUEST["insc_opcao"]=="5") ? "selected" : "";?>><?= $eventoConfiguracaoXMLAtual->getInscricaoOpcao5("PT"); ?></option>
			<? } ?>
			<? if ($eventoConfiguracaoXMLAtual->getInscricaoOpcao6("PT")) { ?>
			<option value="6" <?= ($_REQUEST["insc_opcao"]=="6") ? "selected" : "";?>><?= $eventoConfiguracaoXMLAtual->getInscricaoOpcao6("PT"); ?></option>
			<? } ?>
		</select>
	</td>
	<td class="structFilter">&nbsp;&nbsp;&nbsp;</td>
	<td class="structFilter">Categoria</td>
	<td class="structFilter">
		<select class="structFilterBox" name="insc_categoria">
			<option value="">Todas</option>
			<? if ($eventoConfiguracaoXMLAtual->getInscricaoCategoriaA("PT")) { ?>
			<option value="a" <?= ($_REQUEST["insc_categoria"]=="a") ? "selected" : "";?>><?= $eventoConfiguracaoXMLAtual->getInscricaoCategoriaA("PT"); ?></option>
			<? } ?>
			<? if ($eventoConfiguracaoXMLAtual->getInscricaoCategoriaB("PT")) { ?>
			<option value="b" <?= ($_REQUEST["insc_categoria"]=="b") ? "selected" : "";?>><?= $eventoConfiguracaoXMLAtual->getInscricaoCategoriaB("PT"); ?></option>
			<? } ?>
			<? if ($eventoConfiguracaoXMLAtual->getInscricaoCategoriaC("PT")) { ?>
			<option value="c" <?= ($_REQUEST["insc_categoria"]=="c") ? "selected" : "";?>><?= $eventoConfiguracaoXMLAtual->getInscricaoCategoriaC("PT"); ?></option>
			<? } ?>
			<? if ($eventoConfiguracaoXMLAtual->getInscricaoCategoriaD("PT")) { ?>
			<option value="d" <?= ($_REQUEST["insc_categoria"]=="d") ? "selected" : "";?>><?= $eventoConfiguracaoXMLAtual->getInscricaoCategoriaD("PT"); ?></option>
			<? } ?>
			<? if ($eventoConfiguracaoXMLAtual->getInscricaoCategoriaE("PT")) { ?>
			<option value="e" <?= ($_REQUEST["insc_categoria"]=="e") ? "selected" : "";?>><?= $eventoConfiguracaoXMLAtual->getInscricaoCategoriaE("PT"); ?></option>
			<? } ?>
			<? if ($eventoConfiguracaoXMLAtual->getInscricaoCategoriaF("PT")) { ?>
			<option value="f" <?= ($_REQUEST["insc_categoria"]=="f") ? "selected" : "";?>><?= $eventoConfiguracaoXMLAtual->getInscricaoCategoriaF("PT"); ?></option>
			<? } ?>
			<? if ($eventoConfiguracaoXMLAtual->getInscricaoCategoriaG("PT")) { ?>
			<option value="g" <?= ($_REQUEST["insc_categoria"]=="g") ? "selected" : "";?>><?= $eventoConfiguracaoXMLAtual->getInscricaoCategoriaG("PT"); ?></option>
			<? } ?>
			<? if ($eventoConfiguracaoXMLAtual->getInscricaoCategoriaH("PT")) { ?>
			<option value="h" <?= ($_REQUEST["insc_categoria"]=="h") ? "selected" : "";?>><?= $eventoConfiguracaoXMLAtual->getInscricaoCategoriaH("PT"); ?></option>
			<? } ?>
			<? if ($eventoConfiguracaoXMLAtual->getInscricaoCategoriaI("PT")) { ?>
			<option value="i" <?= ($_REQUEST["insc_categoria"]=="i") ? "selected" : "";?>><?= $eventoConfiguracaoXMLAtual->getInscricaoCategoriaI("PT"); ?></option>
			<? } ?>
			<? if ($eventoConfiguracaoXMLAtual->getInscricaoCategoriaJ("PT")) { ?>
			<option value="j" <?= ($_REQUEST["insc_categoria"]=="j") ? "selected" : "";?>><?= $eventoConfiguracaoXMLAtual->getInscricaoCategoriaJ("PT"); ?></option>
			<? } ?>
			<? if ($eventoConfiguracaoXMLAtual->getInscricaoCategoriaK("PT")) { ?>
			<option value="k" <?= ($_REQUEST["insc_categoria"]=="k") ? "selected" : "";?>><?= $eventoConfiguracaoXMLAtual->getInscricaoCategoriaK("PT"); ?></option>
			<? } ?>
			<? if ($eventoConfiguracaoXMLAtual->getInscricaoCategoriaL("PT")) { ?>
			<option value="l" <?= ($_REQUEST["insc_categoria"]=="l") ? "selected" : "";?>><?= $eventoConfiguracaoXMLAtual->getInscricaoCategoriaL("PT"); ?></option>
			<? } ?>
			<? if ($eventoConfiguracaoXMLAtual->getInscricaoCategoriaM("PT")) { ?>
			<option value="m" <?= ($_REQUEST["insc_categoria"]=="m") ? "selected" : "";?>><?= $eventoConfiguracaoXMLAtual->getInscricaoCategoriaM("PT"); ?></option>
			<? } ?>
			<? if ($eventoConfiguracaoXMLAtual->getInscricaoCategoriaN("PT")) { ?>
			<option value="n" <?= ($_REQUEST["insc_categoria"]=="n") ? "selected" : "";?>><?= $eventoConfiguracaoXMLAtual->getInscricaoCategoriaN("PT"); ?></option>
			<? } ?>
			<? if ($eventoConfiguracaoXMLAtual->getInscricaoCategoriaO("PT")) { ?>
			<option value="o" <?= ($_REQUEST["insc_categoria"]=="o") ? "selected" : "";?>><?= $eventoConfiguracaoXMLAtual->getInscricaoCategoriaO("PT"); ?></option>
			<? } ?>
			<? if ($eventoConfiguracaoXMLAtual->getInscricaoCategoriaP("PT")) { ?>
			<option value="p" <?= ($_REQUEST["insc_categoria"]=="p") ? "selected" : "";?>><?= $eventoConfiguracaoXMLAtual->getInscricaoCategoriaP("PT"); ?></option>
			<? } ?>
			<? if ($eventoConfiguracaoXMLAtual->getInscricaoCategoriaQ("PT")) { ?>
			<option value="q" <?= ($_REQUEST["insc_categoria"]=="q") ? "selected" : "";?>><?= $eventoConfiguracaoXMLAtual->getInscricaoCategoriaQ("PT"); ?></option>
			<? } ?>
			<? if ($eventoConfiguracaoXMLAtual->getInscricaoCategoriaR("PT")) { ?>
			<option value="r" <?= ($_REQUEST["insc_categoria"]=="r") ? "selected" : "";?>><?= $eventoConfiguracaoXMLAtual->getInscricaoCategoriaR("PT"); ?></option>
			<? } ?>
			<? if ($eventoConfiguracaoXMLAtual->getInscricaoCategoriaS("PT")) { ?>
			<option value="s" <?= ($_REQUEST["insc_categoria"]=="s") ? "selected" : "";?>><?= $eventoConfiguracaoXMLAtual->getInscricaoCategoriaS("PT"); ?></option>
			<? } ?>
			<? if ($eventoConfiguracaoXMLAtual->getInscricaoCategoriaT("PT")) { ?>
			<option value="t" <?= ($_REQUEST["insc_categoria"]=="t") ? "selected" : "";?>><?= $eventoConfiguracaoXMLAtual->getInscricaoCategoriaT("PT"); ?></option>
			<? } ?>
			<? if ($eventoConfiguracaoXMLAtual->getInscricaoCategoriaU("PT")) { ?>
			<option value="u" <?= ($_REQUEST["insc_categoria"]=="u") ? "selected" : "";?>><?= $eventoConfiguracaoXMLAtual->getInscricaoCategoriaU("PT"); ?></option>
			<? } ?>
			<? if ($eventoConfiguracaoXMLAtual->getInscricaoCategoriaV("PT")) { ?>
			<option value="v" <?= ($_REQUEST["insc_categoria"]=="v") ? "selected" : "";?>><?= $eventoConfiguracaoXMLAtual->getInscricaoCategoriaV("PT"); ?></option>
			<? } ?>
			<? if ($eventoConfiguracaoXMLAtual->getInscricaoCategoriaW("PT")) { ?>
			<option value="w" <?= ($_REQUEST["insc_categoria"]=="w") ? "selected" : "";?>><?= $eventoConfiguracaoXMLAtual->getInscricaoCategoriaW("PT"); ?></option>
			<? } ?>
			<? if ($eventoConfiguracaoXMLAtual->getInscricaoCategoriaX("PT")) { ?>
			<option value="x" <?= ($_REQUEST["insc_categoria"]=="x") ? "selected" : "";?>><?= $eventoConfiguracaoXMLAtual->getInscricaoCategoriaX("PT"); ?></option>
			<? } ?>
			<? if ($eventoConfiguracaoXMLAtual->getInscricaoCategoriaY("PT")) { ?>
			<option value="y" <?= ($_REQUEST["insc_categoria"]=="y") ? "selected" : "";?>><?= $eventoConfiguracaoXMLAtual->getInscricaoCategoriaY("PT"); ?></option>
			<? } ?>
			<? if ($eventoConfiguracaoXMLAtual->getInscricaoCategoriaZ("PT")) { ?>
			<option value="z" <?= ($_REQUEST["insc_categoria"]=="z") ? "selected" : "";?>><?= $eventoConfiguracaoXMLAtual->getInscricaoCategoriaZ("PT"); ?></option>
			<? } ?>
		</select>
	</td>
	<td class="structFilter">&nbsp;&nbsp;&nbsp;</td>
	<td class="structFilter">Status Pgto</td>
	<td class="structFilter">
		<select class="structFilterBox" name="insc_status_pgto">
			<option value="t"<?= ($_REQUEST["insc_status_pgto"]=="t") ? "selected" : "";?>>Todos</option>
			<option value="i" <?= ($_REQUEST["insc_status_pgto"]=="i") ? "selected" : "";?>> Indefinido</option>
			<option value="a" <?= ($_REQUEST["insc_status_pgto"]=="a") ? "selected" : "";?>> Aguarda Pgto.</option>
			<option value="c" <?= ($_REQUEST["insc_status_pgto"]=="c") ? "selected" : "";?>> Aguarda Conf.</option>
			<option value="o" <?= ($_REQUEST["insc_status_pgto"]=="o") ? "selected" : "";?>> Pagamento OK</option>
			<option value="g" <?= ($_REQUEST["insc_status_pgto"]=="g") ? "selected" : "";?>> Cortesia</option>
		</select>
		
		<?echo $inscricao->STATUS_PGTO_OK;?>
	</td>
	<td class="structFilter">&nbsp;&nbsp;&nbsp;</td>
	<td class="structFilter"><input type="submit" class="structFilterButton" value="Aplicar"></td>
</tr>
</table>
</form>

<div style="padding-top:8px;"></div>

<? } // if $print ?>

<? if ($print == "true") { ?>
<div style="width:100%;border:solid 1px #303030">
<table border="0" cellspacing="0" cellpadding="0" width="100%">
  <tr class="gridHeader">
<? } else { ?>
<!-- Grid de Listagem -->
<div class="gridContainer" id="tC" style="height:300px; width:100%;border:solid 1px #303030">
<table border="0" cellspacing="0" cellpadding="0" width="100%">
  <thead class="gridHeader">
  <tr class="gridHeader" style="top:expression(document.getElementById('tC').scrollTop);">
	<!--td class="gridHeader" width="2%">&nbsp;</td-->
<? } ?>
	<td class="gridHeader" width="2%">&nbsp;</td>
    <td class="gridHeader">ID</td>
    <td class="gridHeader">Nome Completo</td>
    <td class="gridHeader">Categoria</td>
    <td class="gridHeader">Opção</td>
    <td class="gridHeader">Status Pgto</td>
	
	<td class="gridHeader">Valor</td>
	
    <td class="gridHeader">Origem</td>
	<td class="gridHeader" width="2%">&nbsp;</td>
	<td class="gridHeader" width="2%">&nbsp;</td>
	<td class="gridHeader" width="2%">&nbsp;</td>
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
	<td class="gridLineEven">
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
			case 38:
				if ($id_len == 2)
				{
					echo '11'.$inscricao->getID();
				}
				else
				{
					echo '110'.$inscricao->getID();
				}
			break;
			case 39:
				if ($id_len == 2)
				{
					echo '12'.$inscricao->getID();
				}
				else
				{
					echo '120'.$inscricao->getID();
				}
			break;
			case 40:
				if ($id_len == 2)
				{
					echo '10'.$inscricao->getID();
				}
				else
				{
					echo '100'.$inscricao->getID();
				}
			break;
			case 41:
				if ($id_len == 2)
				{
					echo '13'.$inscricao->getID();
				}
				else
				{
					echo '130'.$inscricao->getID();
				}
			break;
			case 45:
				if ($id_len == 2)
				{
					echo '14'.$inscricao->getID();
				}
				else
				{
					echo '140'.$inscricao->getID();
				}
			break;
			case 46:
				if ($id_len == 2)
				{
					echo '15'.$inscricao->getID();
				}
				else
				{
					echo '150'.$inscricao->getID();
				}
			break;
			case 47:
				if ($id_len == 2)
				{
					echo '16'.$inscricao->getID();
				}
				else
				{
					echo '160'.$inscricao->getID();
				}
			break;
			case 48:
				if ($id_len == 2)
				{
					echo '17'.$inscricao->getID();
				}
				else
				{
					echo '170'.$inscricao->getID();
				}
			break;
			case 49:
				if ($id_len == 2)
				{
					echo '18'.$inscricao->getID();
				}
				else
				{
					echo '180'.$inscricao->getID();
				}
			break;
			case 55:
				if ($id_len == 2)
				{
					echo '19'.$inscricao->getID();
				}
				else
				{
					echo '190'.$inscricao->getID();
				}
			break;
			case 56:
				if ($id_len == 2)
				{
					echo '20'.$inscricao->getID();
				}
				else
				{
					echo '200'.$inscricao->getID();
				}
			break;
			case 57:
				if ($id_len == 2)
				{
					echo '21'.$inscricao->getID();
				}
				else
				{
					echo '210'.$inscricao->getID();
				}
			break;
			default:
				echo $inscricao->getID();
		}
	?>&nbsp;</td>
    <td class="gridLineEven"><?= $inscricao->getNOME() ?>&nbsp;</td>
    <td class="gridLineEven">
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
		<?= ($inscricao->getTIPO()=="1") ? $eventoConfiguracaoXMLAtual->getInscricaoOpcao1("PT") : "";?>
		<?= ($inscricao->getTIPO()=="2") ? $eventoConfiguracaoXMLAtual->getInscricaoOpcao2("PT") : "";?>
		<?= ($inscricao->getTIPO()=="3") ? $eventoConfiguracaoXMLAtual->getInscricaoOpcao3("PT") : "";?>
		<?= ($inscricao->getTIPO()=="4") ? $eventoConfiguracaoXMLAtual->getInscricaoOpcao4("PT") : "";?>
		<?= ($inscricao->getTIPO()=="5") ? $eventoConfiguracaoXMLAtual->getInscricaoOpcao5("PT") : "";?>
		<?= ($inscricao->getTIPO()=="6") ? $eventoConfiguracaoXMLAtual->getInscricaoOpcao6("PT") : "";?>
 		&nbsp;
    </td>
   <td class="gridLineEven">
		<?= ($inscricao->getSTATUS_PGTO()=="a") ? "Aguarda Pagamento" : "";?>
		<?= ($inscricao->getSTATUS_PGTO()=="c") ? "Aguarda Confirmação" : "";?>
		<?= ($inscricao->getSTATUS_PGTO()=="o") ? "Pagamento OK" : "";?>
		<?= ($inscricao->getSTATUS_PGTO()=="g") ? "Cortesia" : "";?>
		&nbsp;
    </td>
	
	<td class="gridLineEven">
	 <?= number_format($inscricao->getVALOR()/100,2,",","."); ?></td>

    <td class="gridLineEven">
		<?= ($inscricao->getORIGEM()=="i") ? "Interno" : "";?>
		<?= ($inscricao->getORIGEM()=="s") ? "Site" : "";?>
		<?= ($inscricao->getORIGEM()=="l") ? "Local" : "";?>
		<?= ($inscricao->getORIGEM()=="") ? "-" : "";?>
		&nbsp;
	</td>
    <td class="gridLineEven"><? if ($inscricao->getSTATUS()=="2") { ?><a href="inscricao_simples_edit.php?id=<?= $inscricao->getID() ?>">Efetivar</a><? } ?>&nbsp;</td>
    <td class="gridLineEven"><a href="inscricao_edit.php?id=<?= $inscricao->getID() ?>">Editar</a>&nbsp;</td>
    <td class="gridLineEven"><a href="inscricao_simples_view.php?id=<?= $inscricao->getID() ?>">Imprimir</a>&nbsp;</td>
    <td class="gridLineEven">&nbsp;<a href="inscricao_delete_xp2.php?insc_id=<?= $inscricao->getID() ?>" onClick="return confirm('Você tem certeza que deseja excluir?\n(essa operação não pode ser desfeita)')">Excluir</a></td>
    <td class="gridLineEven">&nbsp;</td>
  </tr>
  <? }; ?>
  </tbody>
</table>
</div>



<? include_once("struct/struct_bottom.php")?>
<? } ?>