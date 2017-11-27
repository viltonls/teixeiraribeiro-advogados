<? include_once ( "struct/auth.php" ) ?>
<? if ( ! session_is_registered("evento") )
{
	header( "Location: session_seleciona_evento.php?url=inscricao_list.php&orga_id=0&configurado=1" ) ;
}
else
{
	include_once ( "struct/struct_top.php" ) ;
	include_once ( '../classes/class.trabalho.php' ) ;
	include_once ( '../classes/service.trabalho.php' ) ;
	include_once ( '../classes/class.avaliador.php' ) ;
	include_once ( '../classes/class.avaliacao.php' ) ;
	include_once ( '../classes/service.avaliacao.php' ) ;
	include_once ( '../classes/dto.avaliacao_avaliador.php' ) ;
	/* @var $eventoConfiguracaoAtual Configuracao */
	/* @var $avaliadorAtual Avaliador */
	$trab_id = $_REQUEST['trab_id'] ;
	$trabalhoService = new TrabalhoService ;
	$trabalho = $trabalhoService->loadTrabalhoById( $trab_id, $eventoAtual->getID() ) ;
	$avaliacao = new Avaliacao() ;
	$avaliacaoService = new AvaliacaoService() ;
	$avaliacaoAvaliadorList = $avaliacaoService->loadAvaliacaoAvaliadorFiltered( "", $trab_id, "", $eventoAtual->getID() ) ; ?>

<div class="structTitle">Listar Avaliações do Trabalho
  <?= $trab_id ?>
</div>
(<a href="avaliador_escolha_list.php?trab_id=<?= $trab_id ?>">Incluir avaliador
para este trabalho</a>)
<div style="padding-top:8px;"></div>
<!-- Grid de Listagem -->
<div class="gridContainer" id="tC" style="height:150px; width:100%;border:solid 1px #303030">
  <table border="0" cellspacing="0" cellpadding="0" width="100%">
    <thead class="gridHeader">
      <tr class="gridHeader" style="top:expression(document.getElementById('tC').scrollTop);">
        <!--td class="gridHeader" width="2%">&nbsp;</td-->
        <td class="gridHeader" width="2%">&nbsp;</td>
        <td width="8%" class="gridHeader">Avaliador</td>
        <td width="38%" class="gridHeader">Avaliação Geral</td>
		<? if ( $eventoAtual->getID()== 54 ) { ?>
        <td width="25%" class="gridHeader">Nota(s)</td>
		<? }?>
        <td width="9%" class="gridHeader">Data Avaliação</td>
        <td class="gridHeader" width="9%">&nbsp;</td>
        <td class="gridHeader" width="8%">&nbsp;</td>
      </tr>
    </thead>
    <tbody>
      <? for ( $i = 0; $i < count($avaliacaoAvaliadorList); $i++ )
	{
		/* @var $avaliacaoAvaliador AvaliacaoAvaliadorDTO */
		$avaliacaoAvaliador = $avaliacaoAvaliadorList[$i] ; ?>
      <tr>
        <td class="gridLineEven">&nbsp;</td>
        <td class="gridLineEven"><?= $avaliacaoAvaliador->getNOME() ?>
          (
          <?= $avaliacaoAvaliador->getLOGIN() ?>
          )&nbsp;</td>
        <td class="gridLineEven">
		  <? if ( $eventoAtual->getID()== 32 || $eventoAtual->getID()== 52  ) { ?>
		  <?= ( $avaliacaoAvaliador->getSTATUS() == $avaliacao->STATUS_NOVO ) ? "Novo" : "" ; ?>
		  <?= ( $avaliacaoAvaliador->getSTATUS() == $avaliacao->STATUS_EM_REVISAO ) ? "Em Revisão" : "" ; ?>
          <?= ( $avaliacaoAvaliador->getSTATUS() == $avaliacao->STATUS_REJEITADO  ) ? "Rejeitado" : "" ; ?>
          <?= ( $avaliacaoAvaliador->getSTATUS() == $avaliacao->STATUS_ACEITO_COM_RESTRICOES) ? "Reavaliação do Presidente" : "" ; ?>
          <?= ( $avaliacaoAvaliador->getSTATUS() == $avaliacao->STATUS_ACEITO ) ? "Aceito" : "" ; ?>
		  <? } else {?>
		<? if ( $eventoAtual->getID()== 54 ) { ?>
		      <?= ( $avaliacaoAvaliador->getSTATUS() == $avaliacao->STATUS_NOVO ) ? "Novo" : "" ; ?>
          <?= ( $avaliacaoAvaliador->getSTATUS() == $avaliacao->STATUS_REJEITADO  ) ? "Não Aceitavel" : "" ; ?>
          <?= ( $avaliacaoAvaliador->getSTATUS() == $avaliacao->STATUS_ACEITO_COM_RESTRICOES) ? "Aceitavel" : "" ; ?>
          <?= ( $avaliacaoAvaliador->getSTATUS() == $avaliacao->STATUS_ACEITO ) ? "Bom" : "" ; ?>
          <?= ( $avaliacaoAvaliador->getSTATUS() == $avaliacao->STATUS_MUITO_BOM ) ? "Muito Bom" : "" ; ?>
          <?= ( $avaliacaoAvaliador->getSTATUS() == $avaliacao->STATUS_EXCELENTE ) ? "Excelente" : "" ; ?>
		<? } else {?>
          <?= ( $avaliacaoAvaliador->getSTATUS() == $avaliacao->STATUS_NOVO ) ? "Novo" : "" ; ?>
          <?= ( $avaliacaoAvaliador->getSTATUS() == $avaliacao->STATUS_EM_REVISAO ) ? "Em Revisão" : "" ; ?>
          <?= ( $avaliacaoAvaliador->getSTATUS() == $avaliacao->STATUS_PENDENTE ) ? "Pendente" : "" ; ?>
          <?= ( $avaliacaoAvaliador->getSTATUS() == $avaliacao->STATUS_ACEITO_COM_RESTRICOES ) ? "Aceito com Restrições" : "" ; ?>
          <?= ( $avaliacaoAvaliador->getSTATUS() == $avaliacao->STATUS_ACEITO ) ? "Aceito" : "" ; ?>
          <?= ( $avaliacaoAvaliador->getSTATUS() == $avaliacao->STATUS_REJEITADO ) ? "Rejeitado" : "" ; ?>
		  <? }?>
		   <? }?>
        </td>
        <td class="gridLineEven">
		<? if ( $eventoAtual->getID()== 54 ) { ?>
          <?= ( $eventoConfiguracaoXMLAtual->getTrabalhoAvaliacaoNotaADescricaoPT() ) ? $eventoConfiguracaoXMLAtual->getTrabalhoAvaliacaoNotaADescricaoPT() . ": " . number_format( $avaliacaoAvaliador->getNOTA_A(), 2 ) . "<br>" : "" ?>
          <?= ( $eventoConfiguracaoXMLAtual->getTrabalhoAvaliacaoNotaBDescricaoPT() ) ? $eventoConfiguracaoXMLAtual->getTrabalhoAvaliacaoNotaBDescricaoPT() . ": " . number_format( $avaliacaoAvaliador->getNOTA_B(), 2 ) . "<br>" : "" ?>
          <?= ( $eventoConfiguracaoXMLAtual->getTrabalhoAvaliacaoNotaCDescricaoPT() ) ? $eventoConfiguracaoXMLAtual->getTrabalhoAvaliacaoNotaCDescricaoPT() . ": " . number_format( $avaliacaoAvaliador->getNOTA_C(), 2 ) . "<br>" : "" ?>
          <?= ( $eventoConfiguracaoXMLAtual->getTrabalhoAvaliacaoNotaDDescricaoPT() ) ? $eventoConfiguracaoXMLAtual->getTrabalhoAvaliacaoNotaDDescricaoPT() . ": " . number_format( $avaliacaoAvaliador->getNOTA_D(), 2 ) . "<br>" : "" ?>
          <?= ( $eventoConfiguracaoXMLAtual->getTrabalhoAvaliacaoNotaEDescricaoPT() ) ? $eventoConfiguracaoXMLAtual->getTrabalhoAvaliacaoNotaEDescricaoPT() . ": " . number_format( $avaliacaoAvaliador->getNOTA_E(), 2 ) . "<br>" : "" ?>
          <?= ( $eventoConfiguracaoXMLAtual->getTrabalhoAvaliacaoNotaFDescricaoPT() ) ? $eventoConfiguracaoXMLAtual->getTrabalhoAvaliacaoNotaFDescricaoPT() . ": " . number_format( $avaliacaoAvaliador->getNOTA_F(), 2 ) . "<br>" : "" ?>
          <?= ( $eventoConfiguracaoXMLAtual->getTrabalhoAvaliacaoNotaGDescricaoPT() ) ? $eventoConfiguracaoXMLAtual->getTrabalhoAvaliacaoNotaGDescricaoPT() . ": " . number_format( $avaliacaoAvaliador->getNOTA_G(), 2 ) . "<br>" : "" ?>
          <?= ( $eventoConfiguracaoXMLAtual->getTrabalhoAvaliacaoNotaHDescricaoPT() ) ? $eventoConfiguracaoXMLAtual->getTrabalhoAvaliacaoNotaHDescricaoPT() . ": " . number_format( $avaliacaoAvaliador->getNOTA_H(), 2 ) . "<br>" : "" ?>
          <?= ( $eventoConfiguracaoXMLAtual->getTrabalhoAvaliacaoNotaIDescricaoPT() ) ? $eventoConfiguracaoXMLAtual->getTrabalhoAvaliacaoNotaIDescricaoPT() . ": " . number_format( $avaliacaoAvaliador->getNOTA_I(), 2 ) . "<br>" : "" ?>
          SOMA:
          <?= number_format( $avaliacaoAvaliador->getNOTA_A() + $avaliacaoAvaliador->getNOTA_B() + $avaliacaoAvaliador->getNOTA_C() + $avaliacaoAvaliador->getNOTA_D() + $avaliacaoAvaliador->getNOTA_E() + $avaliacaoAvaliador->getNOTA_F() + $avaliacaoAvaliador->getNOTA_G() + $avaliacaoAvaliador->getNOTA_H() + $avaliacaoAvaliador->getNOTA_I(), 2 ) ?>
		  <? }?>
        </td>
        <td class="gridLineEven"><? if ( $avaliacaoAvaliador->getDATA_AVALIADO() != "0000-00-00 00:00:00" ) echo date( "d/m/Y H:m", strtotime($avaliacaoAvaliador->getDATA_AVALIADO()) ) ?>
&nbsp;</td>
        <? if ( $avaliacaoAvaliador->getSTATUS() == $avaliacao->STATUS_NOVO )
			{ ?>
        <td class="gridLineEven"><a href="avaliacao_delete_xp.php?trab_id=<?= $avaliacaoAvaliador->getTRAB_ID() ?>&aval_id=<?= $avaliacaoAvaliador->getAVAL_ID() ?>"  onClick="return confirm('Você tem certeza que deseja excluir?\n(essa operação não pode ser desfeita)')">Excluir&nbsp;Avaliação</a>&nbsp;</td>
        <? }
			else
			{ ?>
        <td class="gridLineEven"><a href="avaliacao_view.php?trab_id=<?= $avaliacaoAvaliador->getTRAB_ID() ?>&aval_id=<?= $avaliacaoAvaliador->getAVAL_ID() ?>">Ver&nbsp;Avaliação</a>&nbsp;</td>
        <? } ?>
        <!--td class="gridLineEven"><a href="avaliador_edit.php?id=<?= $avaliacaoAvaliador->
        getAVAL_ID() ?>">Ver&nbsp;Avaliador
        <td width="0%"></a>
&nbsp;
        <td width="0%"></td-->
        <td width="1%" class="gridLineEven">&nbsp;</td>
      </tr>
      <? }
	; ?>
    </tbody>
  </table>
</div>
<div style="padding-top:8px;"></div>
<script language="JavaScript">



function validateForm(theForm) {



var status_novo = document.getElementById('status').value;

var status_anterior = document.getElementById('status_anterior').value;



if (status_novo != status_anterior &&

    (status_novo == <?= $trabalho->STATUS_ACEITO ?> ||

     status_novo == <?= $trabalho->STATUS_ACEITO_COM_RESTRICOES ?> ||

     status_novo == <?= $trabalho->STATUS_REJEITADO ?>)) {

return confirm('Ao submeter um novo status "Aceito", "Aceito com Restrições" ou "Rejeitado", o apresentador será automaticamente avisado por e-mail.\n\nDeseja confirmar essa operação?');     

 } else {

 return true;

 };



}

</script>
<form action="trabalho_avaliacao_edit_xp.php" method="POST" class="form.nospace" onSubmit="return validateForm(this)">
  <input type="hidden" name="status_anterior" id="status_anterior" value="<?= $trabalho->getSTATUS() ?>">
  <input type="hidden" name="id" value="<?= $trabalho->getID() ?>">
  <input type="hidden" name="even_id" value="<?= $eventoAtual->getID() ?>">
  <table border="0" cellpadding="0" cellspacing="4" width="90%">
    <tr>
      <td class="structFilter" colspan="4"><u>Dados do Trabalho</u></td>
    </tr>
    <tr>
      <td class="structFilter">Título</td>
      <td class="structFilter" colspan="3"><input readonly type="edit" class="structFilterBox" name="titulo" value="<?= $trabalho->getTITULO() ?>" size="120" maxlength="200">      </td>
    </tr>
    <tr>
      <td class="structFilter">Área Temática</td>
      <td class="structFilter" colspan="3">
        <select class="structFilterBox" name="area" id="area">
          <option value="0" <?= ( $trabalho->getAREA() == "0" ) ? "selected" : "" ; ?>>Não
          Definida</option>
          <? if ( $eventoConfiguracaoXMLAtual->getTrabalhoArea1PT() )
	{ ?>
          <option value="1" <?= ( $trabalho->getAREA() == "1" ) ? "selected" : "" ; ?>>
          <?= $eventoConfiguracaoXMLAtual->getTrabalhoArea1PT() ; ?>
          </option>
          <? } ?>
          <? if ( $eventoConfiguracaoXMLAtual->getTrabalhoArea2PT() )
	{ ?>
          <option value="2" <?= ( $trabalho->getAREA() == "2" ) ? "selected" : "" ; ?>>
          <?= $eventoConfiguracaoXMLAtual->getTrabalhoArea2PT() ; ?>
          </option>
          <? } ?>
          <? if ( $eventoConfiguracaoXMLAtual->getTrabalhoArea3PT() )
	{ ?>
          <option value="3" <?= ( $trabalho->getAREA() == "3" ) ? "selected" : "" ; ?>>
          <?= $eventoConfiguracaoXMLAtual->getTrabalhoArea3PT() ; ?>
          </option>
          <? } ?>
          <? if ( $eventoConfiguracaoXMLAtual->getTrabalhoArea4PT() )
	{ ?>
          <option value="4" <?= ( $trabalho->getAREA() == "4" ) ? "selected" : "" ; ?>>
          <?= $eventoConfiguracaoXMLAtual->getTrabalhoArea4PT() ; ?>
          </option>
          <? } ?>
          <? if ( $eventoConfiguracaoXMLAtual->getTrabalhoArea5PT() )
	{ ?>
          <option value="5" <?= ( $trabalho->getAREA() == "5" ) ? "selected" : "" ; ?>>
          <?= $eventoConfiguracaoXMLAtual->getTrabalhoArea5PT() ; ?>
          </option>
          <? } ?>
          <? if ( $eventoConfiguracaoXMLAtual->getTrabalhoArea6PT() )
	{ ?>
          <option value="6" <?= ( $trabalho->getAREA() == "6" ) ? "selected" : "" ; ?>>
          <?= $eventoConfiguracaoXMLAtual->getTrabalhoArea6PT() ; ?>
          </option>
          <? } ?>
          <? if ( $eventoConfiguracaoXMLAtual->getTrabalhoArea7PT() )
	{ ?>
          <option value="7" <?= ( $trabalho->getAREA() == "7" ) ? "selected" : "" ; ?>>
          <?= $eventoConfiguracaoXMLAtual->getTrabalhoArea7PT() ; ?>
          </option>
          <? } ?>
          <? if ( $eventoConfiguracaoXMLAtual->getTrabalhoArea8PT() )
	{ ?>
          <option value="8" <?= ( $trabalho->getAREA() == "8" ) ? "selected" : "" ; ?>>
          <?= $eventoConfiguracaoXMLAtual->getTrabalhoArea8PT() ; ?>
          </option>
          <? } ?>
          <? if ( $eventoConfiguracaoXMLAtual->getTrabalhoArea9PT() )
	{ ?>
          <option value="9" <?= ( $trabalho->getAREA() == "9" ) ? "selected" : "" ; ?>>
          <?= $eventoConfiguracaoXMLAtual->getTrabalhoArea9PT() ; ?>
          </option>
          <? } ?>
          <? if ( $eventoConfiguracaoXMLAtual->getTrabalhoArea10PT() )
	{ ?>
          <option value="10" <?= ( $trabalho->getAREA() == "10" ) ? "selected" : "" ; ?>>
          <?= $eventoConfiguracaoXMLAtual->getTrabalhoArea10PT() ; ?>
          </option>
          <? } ?>
          <? if ( $eventoConfiguracaoXMLAtual->getTrabalhoArea11PT() )
	{ ?>
          <option value="11" <?= ( $trabalho->getAREA() == "11" ) ? "selected" : "" ; ?>>
          <?= $eventoConfiguracaoXMLAtual->getTrabalhoArea11PT() ; ?>
          </option>
          <? } ?>
          <? if ( $eventoConfiguracaoXMLAtual->getTrabalhoArea12PT() )
	{ ?>
          <option value="12" <?= ( $trabalho->getAREA() == "12" ) ? "selected" : "" ; ?>>
          <?= $eventoConfiguracaoXMLAtual->getTrabalhoArea12PT() ; ?>
          </option>
          <? } ?>
          <? if ( $eventoConfiguracaoXMLAtual->getTrabalhoArea13PT() )
	{ ?>
          <option value="13" <?= ( $trabalho->getAREA() == "13" ) ? "selected" : "" ; ?>>
          <?= $eventoConfiguracaoXMLAtual->getTrabalhoArea13PT() ; ?>
          </option>
          <? } ?>
          <? if ( $eventoConfiguracaoXMLAtual->getTrabalhoArea14PT() )
	{ ?>
          <option value="14" <?= ( $trabalho->getAREA() == "14" ) ? "selected" : "" ; ?>>
          <?= $eventoConfiguracaoXMLAtual->getTrabalhoArea14PT() ; ?>
          </option>
          <? } ?>
          <? if ( $eventoConfiguracaoXMLAtual->getTrabalhoArea15PT() )
	{ ?>
          <option value="15" <?= ( $trabalho->getAREA() == "15" ) ? "selected" : "" ; ?>>
          <?= $eventoConfiguracaoXMLAtual->getTrabalhoArea15PT() ; ?>
          </option>
          <? } ?>
          <? if ( $eventoConfiguracaoXMLAtual->getTrabalhoArea16PT() )
	{ ?>
          <option value="16" <?= ( $trabalho->getAREA() == "16" ) ? "selected" : "" ; ?>>
          <?= $eventoConfiguracaoXMLAtual->getTrabalhoArea16PT() ; ?>
          </option>
          <? } ?>
          <? if ( $eventoConfiguracaoXMLAtual->getTrabalhoArea17PT() )
	{ ?>
          <option value="17" <?= ( $trabalho->getAREA() == "17" ) ? "selected" : "" ; ?>>
          <?= $eventoConfiguracaoXMLAtual->getTrabalhoArea17PT() ; ?>
          </option>
          <? } ?>
          <? if ( $eventoConfiguracaoXMLAtual->getTrabalhoArea18PT() )
	{ ?>
          <option value="18" <?= ( $trabalho->getAREA() == "18" ) ? "selected" : "" ; ?>>
          <?= $eventoConfiguracaoXMLAtual->getTrabalhoArea18PT() ; ?>
          </option>
          <? } ?>
          <? if ( $eventoConfiguracaoXMLAtual->getTrabalhoArea19PT() )
	{ ?>
          <option value="19" <?= ( $trabalho->getAREA() == "19" ) ? "selected" : "" ; ?>>
          <?= $eventoConfiguracaoXMLAtual->getTrabalhoArea19PT() ; ?>
          </option>
          <? } ?>
          <? if ( $eventoConfiguracaoXMLAtual->getTrabalhoArea20PT() )
	{ ?>
          <option value="20" <?= ( $trabalho->getAREA() == "20" ) ? "selected" : "" ; ?>>
          <?= $eventoConfiguracaoXMLAtual->getTrabalhoArea20PT() ; ?>
          </option>
          <? } ?>
        </select>      </td>
    </tr>
    <tr>
      <td class="structFilter" width="10%">Status Final de Avaliação</td>
      <td class="structFilter" colspan="3">
        <!--//"Enviado", "Em Revisão", "Pendente", "Aceito", "Rejeitado"-->
		

		 <? if ( $eventoAtual->getID()== 54 ) { ?>
		  <select class="structFilterBox" name="status" id="status">
          <option value="0" <?= ( $trabalho->getSTATUS() == "0" ) ? "selected" : "" ; ?>> Novo</option>
          <option value="9" <?= ( $trabalho->getSTATUS() == "9" ) ? "selected" : "" ; ?>> Não aceitável</option>
		   <option value="7" <?= ( $trabalho->getSTATUS() == "7" ) ? "selected" : "" ; ?>> Aceitável</option> 
          <option value="8" <?= ( $trabalho->getSTATUS() == "8" ) ? "selected" : "" ; ?>> Bom</option>
          <option value="10" <?= ( $trabalho->getSTATUS() == "10" ) ? "selected" : "" ; ?>> Muito bom</option>
          <option value="11" <?= ( $trabalho->getSTATUS() == "11" ) ? "selected" : "" ; ?>> Excelente</option>
          </select>
		  <? } else if ( $eventoAtual->getID()== 32  || $eventoAtual->getID()== 52 || $eventoAtual->getID()== 23) { ?>
		  <select class="structFilterBox" name="status" id="status">
		  <option value="0" <?= ( $trabalho->getSTATUS() == "0" ) ? "selected" : "" ; ?>> Novo</option>
		  <option value="2" <?= ( $trabalho->getSTATUS() == "2" ) ? "selected" : "" ; ?>> Em
            Revisão</option>
			
          <option value="8" <?= ( $trabalho->getSTATUS() == "8" ) ? "selected" : "" ; ?>> Aceito</option>
		  <option value="9" <?= ( $trabalho->getSTATUS() == "9" ) ? "selected" : "" ; ?>> Rejeitado</option>
          </select>
		<? } else {?>
		<select class="structFilterBox" name="select" id="select">
          <option value="0" <?= ( $trabalho->getSTATUS() == "0" ) ? "selected" : "" ; ?>> Novo</option>
          <option value="2" <?= ( $trabalho->getSTATUS() == "2" ) ? "selected" : "" ; ?>> Em Revisão</option>
          <option value="7" <?= ( $trabalho->getSTATUS() == "7" ) ? "selected" : "" ; ?>> Aceito com Restrições</option>
          <option value="8" <?= ( $trabalho->getSTATUS() == "8" ) ? "selected" : "" ; ?>> Aceito</option>
          <option value="9" <?= ( $trabalho->getSTATUS() == "9" ) ? "selected" : "" ; ?>> Rejeitado</option>
        </select>
		<? }?>      </td>
    </tr>
	<? if ( ! $eventoAtual->getID() == 18 ) { ?>
    <tr>
      <td class="structFilter">Observações da Comissão</td>
      <td class="structFilter" colspan="3"><textarea class="structFilterBox" name="resumo" rows="3" cols="120"><?= $trabalho->getOBS() ?>
      </textarea></td>
    </tr>
	<? } ?>
    <tr>
      <td class="structFilter">&nbsp;&nbsp;&nbsp;</td>
      <td class="structFilter" colspan="3"><input type="submit" class="structFilterButton" value="Salvar Status Final" style="width:120px;">      </td>
    </tr>
  </table>
</form>
<? include_once ( "struct/struct_bottom.php" ) ?>
<? } ?>