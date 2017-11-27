<? include_once("struct/auth.php")?>
<?
if (!session_is_registered("evento")) { 
	header("Location: session_seleciona_evento.php?url=inscricao_list_acomp.php&orga_id=0&configurado=1");
} else {
	
include_once("struct/struct_top.php");
include_once('../classes/class.inscricao.php');
include_once('../classes/service.inscricao.php');

if ($_REQUEST["order_by"]) {
	$order_by = $_REQUEST["order_by"];
} else {
	$order_by = "ACOMP ASC";
}


/* @var $eventoAtual Evento */
$inscricaoService = new InscricaoService();
$inscricaoList = $inscricaoService->listAcompanhantesByEvento($eventoAtual->getID(),$order_by);

/* @var $eventoConfiguracaoAtual Configuracao */

?>
<div class="structTitle">Listar Acompanhantes do Evento "<?=$eventoAtual->getNOME()?>"</div>

<div style="padding-top:8px;"></div>

<!-- Grid de Listagem -->
<div class="gridContainer" id="tC" style="height:300px; width:100%;border:solid 1px #303030">
<table border="0" cellspacing="0" cellpadding="0" width="100%">
  <thead class="gridHeader">
  <tr class="gridHeader" style="top:expression(document.getElementById('tC').scrollTop);">
	<!--td class="gridHeader" width="2%">&nbsp;</td-->

	<td class="gridHeader" width="2%">&nbsp;</td>
    <td class="gridHeader">ID</td>
    <td class="gridHeader">Acompanhante</td>
    <td class="gridHeader">Inscrito</td>
    <td class="gridHeader">Categoria</td>
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
    <td class="gridLineEven"><?= $inscricao->getACOMP()?></td>
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
		<?= ($inscricao->getSTATUS_PGTO()=="a") ? "Aguarda Pagamento" : "";?>
		<?= ($inscricao->getSTATUS_PGTO()=="c") ? "Aguarda Confirmação" : "";?>
		<?= ($inscricao->getSTATUS_PGTO()=="o") ? "Pagamento OK" : "";?>
		<?= ($inscricao->getSTATUS_PGTO()=="g") ? "Cortesia" : "";?>
		&nbsp;
    </td>
    <td class="gridLineEven"><a href="inscricao_edit.php?id=<?= $inscricao->getID() ?>">Editar</a>&nbsp;</td>
    <td class="gridLineEven">&nbsp;</td>
  </tr>
  <? }; ?>
  </tbody>
</table>
</div>



<? include_once("struct/struct_bottom.php")?>
<? } ?>