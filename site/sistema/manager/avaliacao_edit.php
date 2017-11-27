<? include_once ( "auth.php" ) ?>
<? if ( ! session_is_registered("evento") )
{
	header( "Location: session_seleciona_evento.php?url=avaliacao_edit.php&orga_id=0&configurado=1" ) ;
}
else
{
	include_once ( "struct_top.php" ) ;
	include_once ( '../classes/class.avaliacao.php' ) ;
	include_once ( '../classes/service.avaliacao.php' ) ;
	include_once ( '../classes/class.avaliador.php' ) ;
	include_once ( '../classes/service.avaliador.php' ) ;
	include_once ( '../classes/class.trabalho.php' ) ;
	include_once ( '../classes/service.trabalho.php' ) ;
	$avaliacaoService = new AvaliacaoService() ;
	$trabalhoService = new TrabalhoService() ;
	/* @var $eventoConfiguracaoXMLAtual ConfiguracaoXML */
	/* @var $avaliadorAtual Avaliador */
	/* @var $eventoAtual Evento */
	$aval_id = $avaliadorAtual->getID() ;
	$trab_id = $_REQUEST['id'] ;
	/* Tratamento de Erro */
	if ( $trab_id && $aval_id )
	{
		$avaliacaoList = $avaliacaoService->loadAvaliacaoFiltered( $aval_id, $trab_id, "", $eventoAtual->getID() ) ;
		$avaliacao = $avaliacaoList[0] ;
		/* @var $avaliacao Avaliacao */
		if ( ! $avaliacao->getAVAL_ID() )
		{
			echo "<span class='structFilter'>" ;
			echo "Erro: Avalia��o n�o autorizada.<br>" ;
			break ;
			echo "</span>" ;
		}
		$trabalho = $trabalhoService->loadTrabalhoById( $trab_id, $eventoAtual->getID() ) ;
		if ( ! $trabalho->getID() )
		{
			echo "<span class='structFilter'>" ;
			echo "Erro: Trabalho n�o encontrato.<br>" ;
			break ;
			echo "</span>" ;
		}
	} ?>
<script language="JavaScript">
<!--
<?if( $eventoAtual->getID() == 23){ ?>
function validateForm(theForm)
{
	var total = 0;
	total = total + parseFloat(theForm.notaA[theForm.notaA.selectedIndex].text);
	total = total + parseFloat(theForm.notaB[theForm.notaB.selectedIndex].text);
	total = total + parseFloat(theForm.notaC[theForm.notaC.selectedIndex].text);
	total = total + parseFloat(theForm.notaD[theForm.notaE.selectedIndex].text);
	total = total + parseFloat(theForm.notaE[theForm.notaE.selectedIndex].text);
	if(total < 2.0 && theForm.comentario.value == ""){
		alert('A nota apresentada � inferior a 2. O campo Coment�rio deve conter a justificativa para a nota.');
		theForm.comentario.focus();
		return false;
	}
    
  return confirm('Ao submeter, voc� n�o poder� alterar sua avalia��o.\nDeseja confirmar sua avalia��o?');
}

<? } else { ?>
function validateForm(theForm)
{
  if (!validRequired(theForm.comentario,"Coment�rio"))
    return false;
  if (!theForm.status[0].checked && !theForm.status[1].checked && !theForm.status[2].checked && !the.Form.status[3].checked) {
  alert("Informar a Avalia��o Geral");
  return false;
  }
    
  return confirm('Ao submeter, voc� n�o poder� alterar sua avalia��o.\nDeseja confirmar sua avalia��o?');
}
<? } ?>

function PegaDica(obj){
 if(obj.id == 'status_reencaminhar'){
   document.getElementById('justificativa').style.display='';
  }else{
   document.getElementById('justificativa').style.display='none';
 }
}
-->
</script>

<div class="structTitle">Avalia��o de Trabalho</div>
<div style="padding-top:8px;"></div>
<form action="avaliacao_edit_xp.php" method="POST" class="form.nospace" onSubmit="return validateForm(this)">
  <input type="hidden" name="trab_id" value="<?= $avaliacao->getTRAB_ID() ?>">
  <table border="0" cellpadding="0" cellspacing="4">
    <tr>
      <td class="structFilter" colspan="4"> T�tulo<br>
        <input type="text" class="structFilterBox" name="titulo" value="<?= $trabalho->getTITULO() ?>" size="120" maxlength="200" readonly>
      </td>
    </tr>
    <? if($eventoAtual->getID() == 23 || $eventoAtual->getID() == 24) {?>
		<!--<tr> 
			<td class="structFilter" colspan="4">Introdu��o<br>
			<textarea readonly class="structFilterBox" name="intro" rows="5" cols="120"><?= $trabalho->getINTRO()?></textarea> </td>
		</tr>
		<tr> 
			<td class="structFilter" colspan="4">Objetivos<br>
			<textarea readonly class="structFilterBox" name="objetivo" rows="5" cols="120"><?= $trabalho->getOBJETIVO()?></textarea> </td>
		</tr>
		<tr> 
			<td class="structFilter" colspan="4">Materiais e M�todos<br>
			<textarea readonly class="structFilterBox" name="materiais" rows="5" cols="120"><?= $trabalho->getMATERIAIS()?></textarea> </td>
		</tr>
		<tr> 
			<td class="structFilter" colspan="4">Resultados<br>
			<textarea readonly class="structFilterBox" name="resultados" rows="5" cols="120"><?= $trabalho->getRESULTADOS()?></textarea> </td>
		</tr>
		<tr> 
			<td class="structFilter" colspan="4">Conclus�o<br> 
			<textarea readonly class="structFilterBox" name="conclusao" rows="5" cols="120"><?= $trabalho->getCONCLUSAO()?></textarea> </td>
		</tr>-->
		<tr> 
			<td class="structFilter" colspan="4">Palavras-chave<br> 
       			<input type="text" class="structFilterBox" name="palavra1" value="<?= $trabalho->getPALAVRA1() ?>" size="120" maxlength="200" readonly><br>
			    <input type="text" class="structFilterBox" name="palavra2" value="<?= $trabalho->getPALAVRA2() ?>" size="120" maxlength="200" readonly><br>
			    <input type="text" class="structFilterBox" name="palavra3" value="<?= $trabalho->getPALAVRA3() ?>" size="120" maxlength="200" readonly>
			
			</td>
		</tr>
    
    <?}?>
    <tr <? if ( $eventoAtual->getID() == 12 || $eventoAtual->getID() == 13 /*|| $eventoAtual->getID() == 23 || $eventoAtual->getID() == 24*/ ) echo 'style="display: none"' ; ?> >
      <td class="structFilter" colspan="4"> Resumo<br>
        <textarea class="structFilterBox" name="resumo" rows="5" cols="120" readonly><?= $trabalho->getRESUMO() ?>
</textarea>
      </td>
    </tr>
    <tr>
	<? if ( $eventoAtual->getID() == 18 ) { ?>
	<? $subtitulos = unserialize( $trabalho->getOPCAO4() ) ?>
      <td class="structFilter" colspan="4"> Resumo Co-Autor 1<br>
	  	<input type="text" readonly="readonly" value="<?= $subtitulos['0'] ?>" class="structFilterBox"><br>
        <textarea class="structFilterBox" name="resumo" rows="5" cols="120" readonly><?= $trabalho->getAUTORIZACAO() ?>
</textarea>
      </td>
    </tr>
    <tr>
      <td class="structFilter" colspan="4"> Resumo Co-Autor 2<br>
	  <input type="text" readonly="readonly" value="<?= $subtitulos['1'] ?>" class="structFilterBox"><br>
        <textarea class="structFilterBox" name="resumo" rows="5" cols="120" readonly><?= $trabalho->getCORPO() ?>
</textarea>
      </td>
    </tr>
    <tr>
      <td class="structFilter" colspan="4"> Resumo Co-Autor 3<br>
	  <input type="text" readonly="readonly" value="<?= $subtitulos['2'] ?>" class="structFilterBox"><br>
        <textarea class="structFilterBox" name="resumo" rows="5" cols="120" readonly><?= $trabalho->getBIBLIOGRAFIA() ?>
</textarea>
      </td>
    </tr>
    <tr>
      <td class="structFilter" colspan="4"> Resumo Co-Autor 4<br>
	  <input type="text" readonly="readonly" value="<?= $subtitulos['3'] ?>" class="structFilterBox"><br>
        <textarea class="structFilterBox" name="resumo" rows="5" cols="120" readonly><?= $trabalho->getOBS() ?>
</textarea>
      </td>
    </tr>
    <tr>
	<? } ?>
      <td class="structFilter" colspan="4"><br>
        <?= nl2br( $eventoConfiguracaoXMLAtual->getTrabalhoAvaliacaoDescricaoPT() ) ?>
      </td>
    </tr>
    <? if ( $eventoConfiguracaoXMLAtual->getTrabalhoAvaliacaoNotaADescricaoPT() )
	{ ?>
    <tr>
      <td class="structFilter">
        <?= $eventoConfiguracaoXMLAtual->getTrabalhoAvaliacaoNotaADescricaoPT() ?>
      </td>
      <td class="structFilter" colspan="3">
        <select name="notaA" id="notaA" class="structFilterBox">
          <? for ( $i = 0; $i < $eventoConfiguracaoXMLAtual->getTrabalhoAvaliacaoNotaAMax() + 0.05; $i += 0.05 )
		{ ?>
  <?php /**
			 * Rotina : 23-C
			 * Gera intervalo de notas de 10 em 10
			 * 
			 * criado em : ter�a-feira, 5 maio 2009
			 */
			if ( $eventoAtual->getID() == 23 or $eventoAtual->getID() == 24 )
			{
				if ( substr($i, 3) == 5 )
				{
					continue ;
				}
			}
 
			
			/**
			 * Fim da Rotina : 23-C
			 */ ?>
  		  <option>
          <?= number_format( $i, 2, '.', ',' ) ?>
          </option>
          <? } ?>
        </select>
        (0 a
        <?= $eventoConfiguracaoXMLAtual->getTrabalhoAvaliacaoNotaAMax() ?>
        )</td>
    </tr>
    <? } ?>
    <? if ( $eventoConfiguracaoXMLAtual->getTrabalhoAvaliacaoNotaBDescricaoPT() )
	{ ?>
    <tr>
      <td class="structFilter">
        <?= $eventoConfiguracaoXMLAtual->getTrabalhoAvaliacaoNotaBDescricaoPT() ?>
      </td>
      <td class="structFilter" colspan="3">
        <select name="notaB" id="notaB" class="structFilterBox">
          <? for ( $i = 0; $i < $eventoConfiguracaoXMLAtual->getTrabalhoAvaliacaoNotaBMax() + 0.05; $i += 0.05 )
		{ ?>
  <?php /**
			 * Rotina : 23-C
			 * Gera intervalo de notas de 10 em 10
			 * 
			 * criado em : ter�a-feira, 5 maio 2009
			 */
			if ( $eventoAtual->getID() == 23 or $eventoAtual->getID() == 24 )
			{
				if ( substr($i, 3) == 5 )
				{
					continue ;
				}
			}
			/**
			 * Fim da Rotina : 23-C
			 */ ?>
  
   		  <option>
          <?= number_format( $i, 2, '.', ',' ) ?>
          </option>
          <? } ?>
        </select>
        (0 a
        <?= $eventoConfiguracaoXMLAtual->getTrabalhoAvaliacaoNotaBMax() ?>
        )</td>
    </tr>
    <? } ?>
    <? if ( $eventoConfiguracaoXMLAtual->getTrabalhoAvaliacaoNotaCDescricaoPT() )
	{ ?>
    <tr>
      <td class="structFilter">
        <?= $eventoConfiguracaoXMLAtual->getTrabalhoAvaliacaoNotaCDescricaoPT() ?>
      </td>
      <td class="structFilter" colspan="3">
        <select name="notaC" id="notaC" class="structFilterBox">
          <? for ( $i = 0; $i < $eventoConfiguracaoXMLAtual->getTrabalhoAvaliacaoNotaCMax() + 0.05; $i += 0.05 )
		{ ?>
          
  <?php /**
			 * Rotina : 23-C
			 * Gera intervalo de notas de 10 em 10
			 * 
			 * criado em : ter�a-feira, 5 maio 2009
			 */
			if ( $eventoAtual->getID() == 23 or $eventoAtual->getID() == 24 )
			{
				if ( substr($i, 3) == 5 )
				{
					continue ;
				}
			}
			/**
			 * Fim da Rotina : 23-C
			 */ ?>
  		  <option>
          <?= number_format( $i, 2, '.', ',' ) ?>
          </option>
          <? } ?>
        </select>
        (0 a
        <?= $eventoConfiguracaoXMLAtual->getTrabalhoAvaliacaoNotaCMax() ?>
        )</td>
    </tr>
    <? } ?>
    <? if ( $eventoConfiguracaoXMLAtual->getTrabalhoAvaliacaoNotaDDescricaoPT() )
	{ ?>
    <tr>
      <td class="structFilter">
        <?= $eventoConfiguracaoXMLAtual->getTrabalhoAvaliacaoNotaDDescricaoPT() ?>
      </td>
      <td class="structFilter" colspan="3">
        <select name="notaD" id="notaD"class="structFilterBox">
          <? for ( $i = 0; $i < $eventoConfiguracaoXMLAtual->getTrabalhoAvaliacaoNotaDMax() + 0.05; $i += 0.05 )
		{ ?>
  <?php /**
			 * Rotina : 23-C
			 * Gera intervalo de notas de 10 em 10
			 * 
			 * criado em : ter�a-feira, 5 maio 2009
			 */
			if ( $eventoAtual->getID() == 23 or $eventoAtual->getID() == 24 )
			{
				if ( substr($i, 3) == 5 )
				{
					continue ;
				}
			}
			/**
			 * Fim da Rotina : 23-C
			 */ ?>
  		  <option>
          <?= number_format( $i, 2, '.', ',' ) ?>
          </option>
          <? } ?>
        </select>
        (0 a
        <?= $eventoConfiguracaoXMLAtual->getTrabalhoAvaliacaoNotaDMax() ?>
        )</td>
    </tr>
    <? } ?>
    <? if ( $eventoConfiguracaoXMLAtual->getTrabalhoAvaliacaoNotaEDescricaoPT() )
	{ ?>
    <tr>
      <td class="structFilter">
        <?= $eventoConfiguracaoXMLAtual->getTrabalhoAvaliacaoNotaEDescricaoPT() ?>
      </td>
      <td class="structFilter" colspan="3">
        <select name="notaE" id="notaE" class="structFilterBox">
          <? for ( $i = 0; $i < $eventoConfiguracaoXMLAtual->getTrabalhoAvaliacaoNotaEMax() + 0.05; $i += 0.05 )
		{ ?>
  <?php /**
			 * Rotina : 23-C
			 * Gera intervalo de notas de 10 em 10
			 * 
			 * criado em : ter�a-feira, 5 maio 2009
			 */
			if ( $eventoAtual->getID() == 23 or $eventoAtual->getID() == 24 )
			{
				if ( substr($i, 3) == 5 )
				{
					continue ;
				}
			}
			/**
			 * Fim da Rotina : 23-C
			 */ ?>
  		  <option>
          <?= number_format( $i, 2, '.', ',' ) ?>
          </option>
          <? } ?>
        </select>
        (0 a
        <?= $eventoConfiguracaoXMLAtual->getTrabalhoAvaliacaoNotaEMax() ?>
        )</td>
    </tr>
    <? } ?>
    <? if ( $eventoConfiguracaoXMLAtual->getTrabalhoAvaliacaoNotaFDescricaoPT() )
	{ ?>
    <tr>
      <td class="structFilter">
        <?= $eventoConfiguracaoXMLAtual->getTrabalhoAvaliacaoNotaFDescricaoPT() ?>
      </td>
      <td class="structFilter" colspan="3">
        <select name="notaF" class="structFilterBox">
          <? for ( $i = 0; $i < $eventoConfiguracaoXMLAtual->getTrabalhoAvaliacaoNotaFMax() + 0.05; $i += 0.05 )
		{ ?>
   <?php /**
			 * Rotina : 23-C
			 * Gera intervalo de notas de 10 em 10
			 * 
			 * criado em : ter�a-feira, 5 maio 2009
			 */
			if ( $eventoAtual->getID() == 23 or $eventoAtual->getID() == 24 )
			{
				if ( substr($i, 3) == 5 )
				{
					continue ;
				}
			}
			/**
			 * Fim da Rotina : 23-C
			 */ ?>
  		  <option>
          <?= number_format( $i, 2, '.', ',' ) ?>
          </option>
          <? } ?>
        </select>
        (0 a
        <?= $eventoConfiguracaoXMLAtual->getTrabalhoAvaliacaoNotaFMax() ?>
        )</td>
    </tr>
    <? } ?>
    <? if ( $eventoConfiguracaoXMLAtual->getTrabalhoAvaliacaoNotaGDescricaoPT() )
	{ ?>
    <tr>
      <td class="structFilter">
        <?= $eventoConfiguracaoXMLAtual->getTrabalhoAvaliacaoNotaGDescricaoPT() ?>
      </td>
      <td class="structFilter" colspan="3">
        <select name="notaG" class="structFilterBox">
          <? for ( $i = 0; $i < $eventoConfiguracaoXMLAtual->getTrabalhoAvaliacaoNotaGMax() + 0.05; $i += 0.05 )
		{ ?>
  <?php /**
			 * Rotina : 23-C
			 * Gera intervalo de notas de 10 em 10
			 * 
			 * criado em : ter�a-feira, 5 maio 2009
			 */
			if ( $eventoAtual->getID() == 23 or $eventoAtual->getID() == 24 )
			{
				if ( substr($i, 3) == 5 )
				{
					continue ;
				}
			}
			/**
			 * Fim da Rotina : 23-C
			 */ ?>
  		  <option>
          <?= number_format( $i, 2, '.', ',' ) ?>
          </option>
          <? } ?>
        </select>
        (0 a
        <?= $eventoConfiguracaoXMLAtual->getTrabalhoAvaliacaoNotaGMax() ?>
        )</td>
    </tr>
    <? } ?>
    <? if ( $eventoConfiguracaoXMLAtual->getTrabalhoAvaliacaoNotaHDescricaoPT() )
	{ ?>
    <tr>
      <td class="structFilter">
        <?= $eventoConfiguracaoXMLAtual->getTrabalhoAvaliacaoNotaHDescricaoPT() ?>
      </td>
      <td class="structFilter" colspan="3">
        <select name="notaH" class="structFilterBox">
          <? for ( $i = 0; $i < $eventoConfiguracaoXMLAtual->getTrabalhoAvaliacaoNotaHMax() + 0.05; $i += 0.05 )
		{ ?>
  <?php /**
			 * Rotina : 23-C
			 * Gera intervalo de notas de 10 em 10
			 * 
			 * criado em : ter�a-feira, 5 maio 2009
			 */
			if ( $eventoAtual->getID() == 23 or $eventoAtual->getID() == 24 )
			{
				if ( substr($i, 3) == 5 )
				{
					continue ;
				}
			}
			/**
			 * Fim da Rotina : 23-C
			 */ ?>
  		  <option>
          <?= number_format( $i, 2, '.', ',' ) ?>
          </option>
          <? } ?>
        </select>
        (0 a
        <?= $eventoConfiguracaoXMLAtual->getTrabalhoAvaliacaoNotaHMax() ?>
        )</td>
    </tr>
    <? } ?>
    <? if ( $eventoConfiguracaoXMLAtual->getTrabalhoAvaliacaoNotaIDescricaoPT() )
	{ ?>
    <tr>
      <td class="structFilter">
        <?= $eventoConfiguracaoXMLAtual->getTrabalhoAvaliacaoNotaIDescricaoPT() ?>
      </td>
      <td class="structFilter" colspan="3">
        <select name="notaI" class="structFilterBox">
          <? for ( $i = 0; $i < $eventoConfiguracaoXMLAtual->getTrabalhoAvaliacaoNotaIMax() + 0.05; $i += 0.05 )
		{ ?>
  <?php /**
			 * Rotina : 23-C
			 * Gera intervalo de notas de 10 em 10
			 * 
			 * criado em : ter�a-feira, 5 maio 2009
			 */
			if ( $eventoAtual->getID() == 23 or $eventoAtual->getID() == 24 )
			{
				if ( substr($i, 3) == 5 )
				{
					continue ;
				}
			}
			/**
			 * Fim da Rotina : 23-C
			 */ ?>
   		  <option>
          <?= number_format( $i, 2, '.', ',' ) ?>
          </option>
          <? } ?>
        </select>
        (0 a
        <?= $eventoConfiguracaoXMLAtual->getTrabalhoAvaliacaoNotaIMax() ?>
        )</td>
    </tr>
    <? } ?>
    <? if ( $eventoAtual->getID() == 12 || $eventoAtual->getID() == 13 )
	{ ?>
    <tr>
      <td class="structFilter" colspan="4"></td>
    </tr>
    <tr>
      <td class="structFilter" colspan="4" align="center"><strong>Quesitos para
          Avalia��o</strong></td>
    </tr>
    <tr>
      <td class="structFilter" colspan="4">Objetivos claramente definidos</td>
    </tr>
    <tr>
      <td class="structFilter" colspan="4">Qualidade da reda��o e organiza��o
        do texto: (ortografia, gram�tica, clareza, objetividade e estrutura formal)</td>
    </tr>
    <tr>
      <td class="structFilter" colspan="4">Originalidade do trabalho e relev�ncia
        do tema</td>
    </tr>
    <tr>
      <td class="structFilter" colspan="4">Consist�ncia te�rica do trabalho</td>
    </tr>
    <tr>
      <td class="structFilter" colspan="4">Metodologia utilizada: (adequada aos
        objetivos)</td>
    </tr>
    <tr>
      <td class="structFilter" colspan="4">An�lise de dados (ou informa��es)
        e resultados (articula��o te�rica e metodol�gica da interpreta��o) (obs:
        n�o se aplica se o artigo for um ensaio te�rico )</td>
    </tr>
    <tr>
      <td class="structFilter" colspan="4">Conclus�es: fundamento, coer�ncia
        e responde aos objetivos</td>
    </tr>
    <tr>
      <td class="structFilter" colspan="4">Contribui��o do trabalho para o conhecimento
        na �rea </td>
    </tr>
    <tr>
      <td height="10" class="structFilter" colspan="4"></td>
    </tr>
    <? if ( $eventoAtual->getID() == 12 )
		{ ?>
    <tr>
      <td class="structFilter" colspan="4">
        <table border="0" cellpadding="1" cellspacing="0" width="60%">
          <tr>
            <td width="45%">Forma de Apresenta&ccedil;&atilde;o</td>
            <td width="4%">
              <input type="radio" class="structFilterBox" name="opcao1" id="opcao1_oral" value="oral">
            </td>
            <td width="31%"><label for="opcao1_oral">Exposi��o Oral</label>
            </td>
            <td width="4%"><input type="radio" class="structFilterBox" name="opcao1" id="opcao1_poster" value="poster">
            </td>
            <td width="16%">
              <label for="opcao1_poster">P�ster</label>
            </td>
          </tr>
        </table>
      </td>
    </tr>
    <? } ?>
    <? } ?>
    <tr>
      <td class="structFilter" colspan="4">
  <? /**
	 * Rotina : 23-B
	 * N�o gera as op��es de Avalia��o Geral e a define como Aceito (status 8)
	 * 
	 * criado : domingo, 3 maio 2009
	 * modificado em : 
	 */
	if (  $eventoAtual->getID() == 23 ||  $eventoAtual->getID() == 24 )
	{
		echo '<input type="hidden" class="structFilterBox" name="status" value="' . $avaliacao->STATUS_ACEITO . '" id="status_aceito">' ;
	}
	else
	{ ?>
        <table border="0" cellpadding="1" cellspacing="0" width="100%">
          <td align="left" valign="bottom" nowrap>Avalia��o Geral</td>
            <td valign="bottom" align="right">
              <input type="radio" class="structFilterBox" name="status" value="<?= $avaliacao->STATUS_REJEITADO ?>" id="status_rejeitado" onClick="PegaDica(this)">
            </td>
            <td valign="bottom" align="left">
              <label for="status_rejeitado">Rejeitado</label>
            </td>
            <td valign="bottom" align="right" <? if ( $eventoAtual->getID() == 12 || $eventoAtual->getID() == 13 || $eventoAtual->getID() == 18 ) echo 'style="display: none"' ; ?> >
              <input type="radio" class="structFilterBox" name="status" value="<?= $avaliacao->STATUS_ACEITO_COM_RESTRICOES ?>" id="status_aceito_com_restricoes">
            </td>
            <td valign="bottom" align="left" <? if ( $eventoAtual->getID() == 12 || $eventoAtual->getID() == 13 || $eventoAtual->getID() == 18 ) echo 'style="display: none"' ; ?> >
              <label for="status_aceito_com_restricoes">Aceito com Restri��es</label>
            </td>
            <td valign="bottom" align="right">
              <input type="radio" class="structFilterBox" name="status" value="<?= $avaliacao->STATUS_ACEITO ?>" id="status_aceito" onClick="PegaDica(this)">
            </td>
            <td valign="bottom" align="left">
              <label for="status_aceito">Aceito</label>
            </td>
			<? /* if ( $eventoAtual->getID() == 18 ) { ?>
            <td valign="bottom" align="right" >
              <input type="radio" class="structFilterBox" name="status" value="reencaminhar" id="status_reencaminhar" onClick="PegaDica(this)">
            </td>
            <td align="left" valign="bottom" nowrap>
              <label for="status_reencaminhar">Reencaminhar para o Administrador</label>
            </td>
			<? } */?>
        </table>
<?	}
	/**
	 * Fim da Rotina : 23-B
	 */ ?>
      </td>
    </tr>
    <tr>
      <td class="structFilter" colspan="4"> Coment�rio <span style="display: none" id="justificativa"><u>::
            Utilize este campo como justificativa para o Administrador ::</u></span><br>
        <textarea class="structFilterBox" name="comentario" rows="5" cols="120" ></textarea>
      </td>
    </tr>
    <tr>
      <td class="structFilter" colspan="4" align="center">
        <input type="submit" class="structFilterButton" value="Submeter Avalia��o" id="SubmitField" >
      </td>
    </tr>
  </table>
</form>
<? include_once ( "struct_bottom.php" ) ?>
<? } ?>
