<? include_once("struct/auth.php")?>
<?
if (!session_is_registered("evento")) { 
	header("Location: session_seleciona_evento.php?url=inscricao_list_excluded.php&orga_id=0&configurado=1");
} else {
	
include_once("struct/struct_top.php");
include_once('../classes/class.inscricao.php');
include_once('../classes/service.inscricao.php');

if ($_REQUEST["order_by"]) {
	$order_by = $_REQUEST["order_by"];
} else {
	$order_by = "INSC_NOME ASC";
}


/* @var $eventoAtual Evento */
$inscricaoService = new InscricaoService();
$inscricaoList = $inscricaoService->listInscricoesByEventoFiltered($eventoAtual->getID(),$order_by,"","","","","x","t","","");

/* @var $eventoConfiguracaoAtual Configuracao */

?>
<div class="structTitle">Listar Inscrições Excluídas do Evento "<?=$eventoAtual->getNOME()?>"</div>

<div style="padding-top:8px;"></div>

<!-- Grid de Listagem -->
<div class="gridContainer" id="tC" style="height:300px; width:100%;border:solid 1px #303030">
<table border="0" cellspacing="0" cellpadding="0" width="100%">
  <thead class="gridHeader">
  <tr class="gridHeader" style="top:expression(document.getElementById('tC').scrollTop);">
	<!--td class="gridHeader" width="2%">&nbsp;</td-->

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
	    <?= number_format($inscricao->getVALOR()/100,2,",","."); ?>
	</td>
    <td class="gridLineEven">
		<?= ($inscricao->getORIGEM()=="i") ? "Interno" : "";?>
		<?= ($inscricao->getORIGEM()=="s") ? "Site" : "";?>
		<?= ($inscricao->getORIGEM()=="l") ? "Local" : "";?>
		<?= ($inscricao->getORIGEM()=="") ? "-" : "";?>
		&nbsp;
	</td>
    <td class="gridLineEven"><a href="inscricao_edit.php?id=<?= $inscricao->getID() ?>">Editar</a>&nbsp;</td>
    <td class="gridLineEven">&nbsp;<a href="inscricao_delete_xp.php?insc_id=<?= $inscricao->getID() ?>" onClick="return confirm('Você tem certeza que deseja excluir?\n(essa operação não pode ser desfeita)')">Excluir</a></td>
	<td class="gridLineEven">&nbsp;</td>
  </tr>
  <? }; ?>
  </tbody>
</table>
</div>



<? include_once("struct/struct_bottom.php")?>
<? } ?>