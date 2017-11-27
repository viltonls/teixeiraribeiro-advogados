<? include_once("struct/auth.php")?>
<?
if (!session_is_registered("evento")) { 
	header("Location: session_seleciona_evento.php?url=inscricao_list.php&orga_id=0&configurado=1");
} else {
	
include_once("struct/struct_top.php");
include_once('../classes/class.trabalho.php');
include_once('../classes/service.trabalho.php');
include_once('../classes/class.avaliacao.php');
include_once('../classes/service.avaliacao.php');
include_once('../classes/class.avaliador.php');
include_once('../classes/service.avaliador.php');
include_once('../classes/dto.avaliacao_trabalho.php');

$aval_id = $_REQUEST['aval_id'];

/* @var $eventoConfiguracaoXMLAtual ConfiguracaoXML */
/* @var $eventoConfiguracaoAtual Configuracao */
$avaliacao = new Avaliacao();
$avaliacaoService = new AvaliacaoService();
$avaliacaoTrabalhoList = $avaliacaoService->loadAvaliacaoTrabalhoFiltered($aval_id,"",$status,$eventoAtual->getID());

$avaliadorService = new AvaliadorService();
$avaliador = $avaliadorService->loadAvaliadorById($aval_id);
/* @var $avaliador Avaliador */


?>
<div class="structTitle">Listar Avaliações de "<?=$avaliador->getNOME()?>"</div>

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

<!-- Grid de Listagem -->
<div class="gridContainer" id="tC" style="height:300px; width:100%;border:solid 1px #303030">
<table border="0" cellspacing="0" cellpadding="0" width="100%">
  <thead class="gridHeader">
  <tr class="gridHeader" style="top:expression(document.getElementById('tC').scrollTop);">
	<!--td class="gridHeader" width="2%">&nbsp;</td-->

	<td class="gridHeader" width="2%">&nbsp;</td>
    <td class="gridHeader">Titulo do Trabalho</td>
    <td class="gridHeader">Área Temática</td>
    <td class="gridHeader">Status da Avaliação</td>
    <td class="gridHeader">Nota(s)</td>    
    <td class="gridHeader">Data Submissão</td>
	<td class="gridHeader" width="2%">&nbsp;</td>
	<td class="gridHeader" width="2%">&nbsp;</td>
	<td class="gridHeader" width="2%">&nbsp;</td>
  </tr>
  </thead>
  <tbody>
  <? for ($i = 0; $i < count($avaliacaoTrabalhoList); $i++) {
		/* @var $avaliacaoTrabalho AvaliacaoTrabalhoDTO */
		$avaliacaoTrabalho = $avaliacaoTrabalhoList[$i]; ?>
  <tr>
    <td class="gridLineEven">&nbsp;</td>
    <td class="gridLineEven"><?= $avaliacaoTrabalho->getTITULO() ?>&nbsp;</td>
    <td class="gridLineEven">
    	<?= ($avaliacaoTrabalho->getAREA()==0) ? "Não Definida" : "";?>
    	<?= ($avaliacaoTrabalho->getAREA()==1) ? $eventoConfiguracaoXMLAtual->getTrabalhoArea1PT() : "";?>
    	<?= ($avaliacaoTrabalho->getAREA()==2) ? $eventoConfiguracaoXMLAtual->getTrabalhoArea2PT() : "";?>
    	<?= ($avaliacaoTrabalho->getAREA()==3) ? $eventoConfiguracaoXMLAtual->getTrabalhoArea3PT() : "";?>
    	<?= ($avaliacaoTrabalho->getAREA()==4) ? $eventoConfiguracaoXMLAtual->getTrabalhoArea4PT() : "";?>
    	<?= ($avaliacaoTrabalho->getAREA()==5) ? $eventoConfiguracaoXMLAtual->getTrabalhoArea5PT() : "";?>
    	<?= ($avaliacaoTrabalho->getAREA()==6) ? $eventoConfiguracaoXMLAtual->getTrabalhoArea6PT() : "";?>
    	<?= ($avaliacaoTrabalho->getAREA()==7) ? $eventoConfiguracaoXMLAtual->getTrabalhoArea7PT() : "";?>
    	<?= ($avaliacaoTrabalho->getAREA()==8) ? $eventoConfiguracaoXMLAtual->getTrabalhoArea8PT() : "";?>
    	<?= ($avaliacaoTrabalho->getAREA()==9) ? $eventoConfiguracaoXMLAtual->getTrabalhoArea9PT() : "";?>
    	<?= ($avaliacaoTrabalho->getAREA()==10) ? $eventoConfiguracaoXMLAtual->getTrabalhoArea10PT() : "";?>
    	<?= ($avaliacaoTrabalho->getAREA()==11) ? $eventoConfiguracaoXMLAtual->getTrabalhoArea11PT() : "";?>
    	<?= ($avaliacaoTrabalho->getAREA()==12) ? $eventoConfiguracaoXMLAtual->getTrabalhoArea12PT() : "";?>
    	<?= ($avaliacaoTrabalho->getAREA()==13) ? $eventoConfiguracaoXMLAtual->getTrabalhoArea13PT() : "";?>
    	<?= ($avaliacaoTrabalho->getAREA()==14) ? $eventoConfiguracaoXMLAtual->getTrabalhoArea14PT() : "";?>
    	<?= ($avaliacaoTrabalho->getAREA()==15) ? $eventoConfiguracaoXMLAtual->getTrabalhoArea15PT() : "";?>
    	<?= ($avaliacaoTrabalho->getAREA()==16) ? $eventoConfiguracaoXMLAtual->getTrabalhoArea16PT() : "";?>
    	<?= ($avaliacaoTrabalho->getAREA()==17) ? $eventoConfiguracaoXMLAtual->getTrabalhoArea17PT() : "";?>
    	<?= ($avaliacaoTrabalho->getAREA()==18) ? $eventoConfiguracaoXMLAtual->getTrabalhoArea18PT() : "";?>
    	<?= ($avaliacaoTrabalho->getAREA()==19) ? $eventoConfiguracaoXMLAtual->getTrabalhoArea19PT() : "";?>
    	<?= ($avaliacaoTrabalho->getAREA()==20) ? $eventoConfiguracaoXMLAtual->getTrabalhoArea20PT() : "";?>
    	&nbsp;
    </td>    
    <td class="gridLineEven">
		<?= ($avaliacaoTrabalho->getSTATUS()==$avaliacao->STATUS_NOVO) ? "Novo" : "";?>
		<?= ($avaliacaoTrabalho->getSTATUS()==$avaliacao->STATUS_EM_REVISAO) ? "Em Revisão" : "";?>
		<?= ($avaliacaoTrabalho->getSTATUS()==$avaliacao->STATUS_PENDENTE) ? "Pendente" : "";?>
		<?= ($avaliacaoTrabalho->getSTATUS()==$avaliacao->STATUS_ACEITO_COM_RESTRICOES) ? "Aceito com Restrições" : "";?>
		<?= ($avaliacaoTrabalho->getSTATUS()==$avaliacao->STATUS_ACEITO) ? "Aceito" : "";?>
		<?= ($avaliacaoTrabalho->getSTATUS()==$avaliacao->STATUS_REJEITADO) ? "Rejeitado" : "";?>
		&nbsp;
    </td>
    <td class="gridLineEven">
    	<?= ($eventoConfiguracaoXMLAtual->getTrabalhoAvaliacaoNotaADescricaoPT()) ? $eventoConfiguracaoXMLAtual->getTrabalhoAvaliacaoNotaADescricaoPT().": ".number_format($avaliacaoTrabalho->getNOTA_A(),2)."<br>" : "" ?>
    	<?= ($eventoConfiguracaoXMLAtual->getTrabalhoAvaliacaoNotaBDescricaoPT()) ? $eventoConfiguracaoXMLAtual->getTrabalhoAvaliacaoNotaBDescricaoPT().": ".number_format($avaliacaoTrabalho->getNOTA_B(),2)."<br>" : "" ?>
    	<?= ($eventoConfiguracaoXMLAtual->getTrabalhoAvaliacaoNotaCDescricaoPT()) ? $eventoConfiguracaoXMLAtual->getTrabalhoAvaliacaoNotaCDescricaoPT().": ".number_format($avaliacaoTrabalho->getNOTA_C(),2)."<br>" : "" ?>
    	<?= ($eventoConfiguracaoXMLAtual->getTrabalhoAvaliacaoNotaDDescricaoPT()) ? $eventoConfiguracaoXMLAtual->getTrabalhoAvaliacaoNotaDDescricaoPT().": ".number_format($avaliacaoTrabalho->getNOTA_D(),2)."<br>" : "" ?>
    	<?= ($eventoConfiguracaoXMLAtual->getTrabalhoAvaliacaoNotaEDescricaoPT()) ? $eventoConfiguracaoXMLAtual->getTrabalhoAvaliacaoNotaEDescricaoPT().": ".number_format($avaliacaoTrabalho->getNOTA_E(),2)."<br>" : "" ?>
		<?= ($eventoConfiguracaoXMLAtual->getTrabalhoAvaliacaoNotaFDescricaoPT()) ? $eventoConfiguracaoXMLAtual->getTrabalhoAvaliacaoNotaFDescricaoPT().": ".number_format($avaliacaoTrabalho->getNOTA_F(),2)."<br>" : "" ?>
		<?= ($eventoConfiguracaoXMLAtual->getTrabalhoAvaliacaoNotaGDescricaoPT()) ? $eventoConfiguracaoXMLAtual->getTrabalhoAvaliacaoNotaGDescricaoPT().": ".number_format($avaliacaoTrabalho->getNOTA_G(),2)."<br>" : "" ?>
		<?= ($eventoConfiguracaoXMLAtual->getTrabalhoAvaliacaoNotaHDescricaoPT()) ? $eventoConfiguracaoXMLAtual->getTrabalhoAvaliacaoNotaHDescricaoPT().": ".number_format($avaliacaoTrabalho->getNOTA_H(),2)."<br>" : "" ?>
		<?= ($eventoConfiguracaoXMLAtual->getTrabalhoAvaliacaoNotaIDescricaoPT()) ? $eventoConfiguracaoXMLAtual->getTrabalhoAvaliacaoNotaIDescricaoPT().": ".number_format($avaliacaoTrabalho->getNOTA_I(),2)."<br>" : "" ?>
    	SOMA: <?= number_format($avaliacaoTrabalho->getNOTA_A() + $avaliacaoTrabalho->getNOTA_B() + $avaliacaoTrabalho->getNOTA_C() + $avaliacaoTrabalho->getNOTA_D() + $avaliacaoTrabalho->getNOTA_E() + $avaliacaoTrabalho->getNOTA_F() + $avaliacaoTrabalho->getNOTA_G() + $avaliacaoTrabalho->getNOTA_H() + $avaliacaoTrabalho->getNOTA_I(),2)  ?>
    </td>
    <td class="gridLineEven"><?= $avaliacaoTrabalho->getDATA() ?>&nbsp;</td>
	<? if ($avaliacaoTrabalho->getSTATUS()==$avaliacao->STATUS_NOVO) { ?>    
    	<td class="gridLineEven"><a href="avaliacao_delete_xp.php?trab_id=<?= $avaliacaoTrabalho->getTRAB_ID() ?>&aval_id=<?= $aval_id ?>"  onClick="return confirm('Você tem certeza que deseja excluir?\n(essa operação não pode ser desfeita)')">Excluir&nbsp;Avaliação</a>&nbsp;</td>
    <? } else { ?>
	    <td class="gridLineEven"><a href="avaliacao_view.php?trab_id=<?= $avaliacaoTrabalho->getTRAB_ID() ?>&aval_id=<?= $aval_id ?>">Ver&nbsp;Avaliação</a>&nbsp;</td>
    <? } ?>
    <td class="gridLineEven"><a href="trabalho_view.php?id=<?= $avaliacaoTrabalho->getTRAB_ID() ?>">Ver&nbsp;Trabalho</a>&nbsp;</td>
    <td class="gridLineEven">&nbsp;</td>
  </tr>
  <? }; ?>
  </tbody>
</table>
</div>



<? include_once("struct/struct_bottom.php")?>
<? } ?>