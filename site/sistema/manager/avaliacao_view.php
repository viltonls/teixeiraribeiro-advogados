<? include_once("struct/auth.php")?>
<?
if (!session_is_registered("evento")) { 
	header("Location: session_seleciona_evento.php?url=avaliacao_edit.php&orga_id=0&configurado=1");
} else {

include_once("struct/struct_top.php");

include_once('../classes/class.avaliacao.php');
include_once('../classes/service.avaliacao.php');
include_once('../classes/class.avaliador.php');
include_once('../classes/service.avaliador.php');
include_once('../classes/class.trabalho.php');
include_once('../classes/service.trabalho.php');

$avaliacaoService = new AvaliacaoService();
$trabalhoService = new TrabalhoService();

/* @var $eventoConfiguracaoXMLAtual ConfiguracaoXML */
/* @var $avaliadorAtual Avaliador */
/* @var $eventoAtual Evento */
$aval_id = $_REQUEST['aval_id'];
$trab_id = $_REQUEST['trab_id'];

/* Tratamento de Erro */
if ($trab_id && $aval_id) {
	$avaliacaoList = $avaliacaoService->loadAvaliacaoFiltered($aval_id,$trab_id,"",$eventoAtual->getID());
	$avaliacao = $avaliacaoList[0];
	/* @var $avaliacao Avaliacao */
	//echo $avaliacao->getAVAL_ID();break;
	if (!$avaliacao->getAVAL_ID()) {
		echo "<span class='structFilter'>";
		echo "Erro: Avaliação não autorizada.<br>";
		break;
		echo "</span>";
	}
	$trabalho = $trabalhoService->loadTrabalhoById($trab_id,$eventoAtual->getID());
	if (!$trabalho->getID()) {
		echo "<span class='structFilter'>";
		echo "Erro: Trabalho não encontrato.<br>";
		break;
		echo "</span>";
	}
}

?>


<div class="structTitle">Avaliação de Trabalho</div>

<div style="padding-top:8px;"></div>

<form action="javascript:history.back();" method="POST" class="form.nospace">
<input type="hidden" name="trab_id" value="<?=$avaliacao->getTRAB_ID()?>">

    <table border="0" cellpadding="0" cellspacing="4">
		<tr> 			<td class="structFilter" colspan="4"> Título<br> <input type="edit" class="structFilterBox" name="titulo" value="<?= $trabalho->getTITULO()?>" size="120" maxlength="200" readonly></td>		</tr>  
		<? if($eventoAtual->getid() == 54){?>
	  <tr <? if( $eventoAtual->getID() == 23 || $eventoAtual->getID() == 24) echo 'style="display: none"'; ?>>
			<td class="structFilter" colspan="4"><u>Dados do Arquivo</u></td>
		</tr>
		<tr <? if( $eventoAtual->getID() == 23 || $eventoAtual->getID() == 24) echo 'style="display: none"'; ?>>
			<td class="structFilter">Download</td>
			<td class="structFilter" colspan="3">
				<? if ($trabalho->getARQ_URL()) {?>
					<a href="<?= $trabalho->getARQ_URL()?>" target="_blank">Clique aqui para efetuar download</a>
				<? } else if ($trabalho->getARQ_NOME()) {?>
					<a href="<?= "../../work_upload/".$eventoConfiguracaoXMLAtual->getEventoAlias()."_".$trabalho->getID()."_1.".$trabalho->getARQ_TIPO() ?>" target="_blank">Clique aqui para efetuar download</a>
				<? } else { ?>
			<i>Arquivo não disponível para download</i>
			<? } ?></td>
		</tr>
	  
	  
	<? }?>
		  <? if($eventoAtual->getID() == 23 || $eventoAtual->getID() == 24 ) {?>
		<tr> 
			<td class="structFilter" colspan="4">Introdução<br>
			<textarea readonly class="structFilterBox" name="intro" rows="5" cols="120"><?= $trabalho->getINTRO()?></textarea> </td>
		</tr>
		<tr> 
			<td class="structFilter" colspan="4">Objetivos<br>
			<textarea readonly class="structFilterBox" name="objetivo" rows="5" cols="120"><?= $trabalho->getOBJETIVO()?></textarea> </td>
		</tr>
		<tr> 
			<td class="structFilter" colspan="4">Materiais e Métodos<br>
			<textarea readonly class="structFilterBox" name="materiais" rows="5" cols="120"><?= $trabalho->getMATERIAIS()?></textarea> </td>
		</tr>
		<tr> 
			<td class="structFilter" colspan="4">Resultados<br>
			<textarea readonly class="structFilterBox" name="resultados" rows="5" cols="120"><?= $trabalho->getRESULTADOS()?></textarea> </td>
		</tr>
		<tr> 
			<td class="structFilter" colspan="4">Conclusão<br> 
			<textarea readonly class="structFilterBox" name="conclusao" rows="5" cols="120"><?= $trabalho->getCONCLUSAO()?></textarea> </td>
		</tr>
		<tr> 
			<td class="structFilter" colspan="4">Palavras-chave<br> 
       			<input type="text" class="structFilterBox" name="palavra1" value="<?= $trabalho->getPALAVRA1() ?>" size="120" maxlength="200" readonly><br>
			    <input type="text" class="structFilterBox" name="palavra2" value="<?= $trabalho->getPALAVRA2() ?>" size="120" maxlength="200" readonly><br>
			    <input type="text" class="structFilterBox" name="palavra3" value="<?= $trabalho->getPALAVRA3() ?>" size="120" maxlength="200" readonly>			</td>
		</tr>
    
    <? }?>
		<tr <? if($eventoAtual->getID() == 12 || $eventoAtual->getID() == 13 ||  $eventoAtual->getID() == 54 /* $eventoAtual->getID() == 23|| $eventoAtual->getID() == 24 */ ) echo 'style="display: none"'; ?>> 
		 
		  <td class="structFilter" colspan="4"> 
		      Resumo<br>
		      <textarea class="structFilterBox" name="resumo" rows="5" cols="120" readonly>
				    <?= $trabalho->getRESUMO()?>
			   </textarea></td>	
		</tr>
		<tr> 
			<td class="structFilter" colspan="4"><br>
				<b>Avaliação por Quesitos</b></td>
		</tr>
		<? if ($eventoConfiguracaoXMLAtual->getTrabalhoAvaliacaoNotaADescricaoPT()) { ?>
		
		<tr> 
		 
			<td class="structFilter">
				<?=$eventoConfiguracaoXMLAtual->getTrabalhoAvaliacaoNotaADescricaoPT()?>			</td>
			<td class="structFilter" colspan="3">
			   <select name="notaA" class="structFilterBox" disabled>
                 <? for ($i = 0; $i < $eventoConfiguracaoXMLAtual->getTrabalhoAvaliacaoNotaAMax()+0.05; $i += 0.05) { ?>
                 <option <?= (number_format($i,2) == number_format($avaliacao->getNOTA_A(),2)) ? "selected" : ""; ?>>
                 <?= number_format($i,2,'.',',') ?>
                 </option>
                 <? } ?>
               </select>
		      (0 a 
				<?=$eventoConfiguracaoXMLAtual->getTrabalhoAvaliacaoNotaAMax()?>
				)</td>
		</tr>
		<? } ?>
		<? if ($eventoConfiguracaoXMLAtual->getTrabalhoAvaliacaoNotaBDescricaoPT()) { ?>
		<tr> 
			<td class="structFilter">
				<?=$eventoConfiguracaoXMLAtual->getTrabalhoAvaliacaoNotaBDescricaoPT()?>			</td>
			<td class="structFilter" colspan="3"><select name="notaB" class="structFilterBox" disabled>
					<? for ($i = 0; $i < $eventoConfiguracaoXMLAtual->getTrabalhoAvaliacaoNotaBMax()+0.05; $i += 0.05) { ?>
					<option <?= (number_format($i,2) == number_format($avaliacao->getNOTA_B(),2)) ? "selected" : ""; ?>>
					<?= number_format($i,2,'.',',') ?>
					</option>
					<? } ?>
				</select>
				(0 a 
				<?=$eventoConfiguracaoXMLAtual->getTrabalhoAvaliacaoNotaBMax()?>
				)</td>
		</tr>
		<? } ?>
		<? if ($eventoConfiguracaoXMLAtual->getTrabalhoAvaliacaoNotaCDescricaoPT()) { ?>
		<tr> 
			<td class="structFilter">
				<?=$eventoConfiguracaoXMLAtual->getTrabalhoAvaliacaoNotaCDescricaoPT()?>			</td>
			<td class="structFilter" colspan="3"><select name="notaC" class="structFilterBox" disabled>
					<? for ($i = 0; $i < $eventoConfiguracaoXMLAtual->getTrabalhoAvaliacaoNotaCMax()+0.05; $i += 0.05) { ?>
					<option <?= (number_format($i,2) == number_format($avaliacao->getNOTA_C(),2)) ? "selected" : ""; ?>>
					<?= number_format($i,2,'.',',') ?>
					</option>
					<? } ?>
				</select>
				(0 a 
				<?=$eventoConfiguracaoXMLAtual->getTrabalhoAvaliacaoNotaCMax()?>
				)</td>
		</tr>
		<? } ?>
		<? if ($eventoConfiguracaoXMLAtual->getTrabalhoAvaliacaoNotaDDescricaoPT()) { ?>
		<tr> 
			<td class="structFilter">
				<?=$eventoConfiguracaoXMLAtual->getTrabalhoAvaliacaoNotaDDescricaoPT()?>			</td>
			<td class="structFilter" colspan="3"><select name="notaD" class="structFilterBox" disabled>
					<? for ($i = 0; $i < $eventoConfiguracaoXMLAtual->getTrabalhoAvaliacaoNotaDMax()+0.05; $i += 0.05) { ?>
					<option <?= (number_format($i,2) == number_format($avaliacao->getNOTA_D(),2)) ? "selected" : ""; ?>>
					<?= number_format($i,2,'.',',') ?>
					</option>
					<? } ?>
				</select>
				(0 a 
				<?=$eventoConfiguracaoXMLAtual->getTrabalhoAvaliacaoNotaDMax()?>
				)</td>
		</tr>
		<? } ?>
		<? if ($eventoConfiguracaoXMLAtual->getTrabalhoAvaliacaoNotaEDescricaoPT()) { ?>
		<tr> 
			<td class="structFilter">
				<?=$eventoConfiguracaoXMLAtual->getTrabalhoAvaliacaoNotaEDescricaoPT()?>			</td>
			<td class="structFilter" colspan="3"><select name="notaE" class="structFilterBox" disabled>
					<? for ($i = 0; $i < $eventoConfiguracaoXMLAtual->getTrabalhoAvaliacaoNotaEMax()+0.05; $i += 0.05) { ?>
					<option <?= (number_format($i,2) == number_format($avaliacao->getNOTA_E(),2)) ? "selected" : ""; ?>>
					<?= number_format($i,2,'.',',') ?>
					</option>
					<? } ?>
				</select>
				(0 a 
				<?=$eventoConfiguracaoXMLAtual->getTrabalhoAvaliacaoNotaEMax()?>
				)</td>
		</tr>
		<? } ?>
		<? if ($eventoConfiguracaoXMLAtual->getTrabalhoAvaliacaoNotaFDescricaoPT()) { ?>
		<tr>
			<td class="structFilter"><?=$eventoConfiguracaoXMLAtual->getTrabalhoAvaliacaoNotaFDescricaoPT()?></td>
			<td class="structFilter" colspan="3"><select name="notaF" class="structFilterBox" disabled>
					<? for ($i = 0; $i < $eventoConfiguracaoXMLAtual->getTrabalhoAvaliacaoNotaFMax()+0.05; $i += 0.05) { ?>
					<option <?= (number_format($i,2) == number_format($avaliacao->getNOTA_F(),2)) ? "selected" : ""; ?>>
					<?= number_format($i,2,'.',',') ?>
					</option>
					<? } ?>
				</select>
				(0 a 
				<?=$eventoConfiguracaoXMLAtual->getTrabalhoAvaliacaoNotaFMax()?>
				)</td>
		</tr>
		<? } ?>
		<? if ($eventoConfiguracaoXMLAtual->getTrabalhoAvaliacaoNotaGDescricaoPT()) { ?>
		<tr>
			<td class="structFilter"><?=$eventoConfiguracaoXMLAtual->getTrabalhoAvaliacaoNotaGDescricaoPT()?></td>
			<td class="structFilter" colspan="3"><select name="notaG" class="structFilterBox" disabled>
					<? for ($i = 0; $i < $eventoConfiguracaoXMLAtual->getTrabalhoAvaliacaoNotaGMax()+0.05; $i += 0.05) { ?>
					<option <?= (number_format($i,2) == number_format($avaliacao->getNOTA_G(),2)) ? "selected" : ""; ?>>
					<?= number_format($i,2,'.',',') ?>
					</option>
					<? } ?>
				</select>
				(0 a 
				<?=$eventoConfiguracaoXMLAtual->getTrabalhoAvaliacaoNotaGMax()?>
				)</td>
		</tr>
		<? } ?>
		<? if ($eventoConfiguracaoXMLAtual->getTrabalhoAvaliacaoNotaHDescricaoPT()) { ?>
		<tr>
			<td class="structFilter"><?=$eventoConfiguracaoXMLAtual->getTrabalhoAvaliacaoNotaHDescricaoPT()?></td>
			<td class="structFilter" colspan="3"><select name="notaH" class="structFilterBox" disabled>
					<? for ($i = 0; $i < $eventoConfiguracaoXMLAtual->getTrabalhoAvaliacaoNotaHMax()+0.05; $i += 0.05) { ?>
					<option <?= (number_format($i,2) == number_format($avaliacao->getNOTA_H(),2)) ? "selected" : ""; ?>>
					<?= number_format($i,2,'.',',') ?>
					</option>
					<? } ?>
				</select>
				(0 a 
				<?=$eventoConfiguracaoXMLAtual->getTrabalhoAvaliacaoNotaHMax()?>
				)</td>
		</tr>
		<? } ?>
		<? if ($eventoConfiguracaoXMLAtual->getTrabalhoAvaliacaoNotaIDescricaoPT()) { ?>
		<tr>
			<td class="structFilter"><?=$eventoConfiguracaoXMLAtual->getTrabalhoAvaliacaoNotaIDescricaoPT()?></td>
			<td class="structFilter" colspan="3"><select name="notaI" class="structFilterBox" disabled>
					<? for ($i = 0; $i < $eventoConfiguracaoXMLAtual->getTrabalhoAvaliacaoNotaIMax()+0.05; $i += 0.05) { ?>
					<option <?= (number_format($i,2) == number_format($avaliacao->getNOTA_I(),2)) ? "selected" : ""; ?>>
					<?= number_format($i,2,'.',',') ?>
					</option>
					<? } ?>
				</select>
				(0 a 
				<?=$eventoConfiguracaoXMLAtual->getTrabalhoAvaliacaoNotaIMax()?>
				)</td>
				
		</tr>
		<? } ?>
<?	if (  $eventoAtual->getID() != 23 &&  $eventoAtual->getID() != 24 && $eventoAtual->getID() !=54) {?>		
		<tr> 
			<td class="structFilter" colspan="4"> <table border="0" cellpadding="1" cellspacing="0" width="70%">
					<td valign="bottom" align="left"><b>Avaliação Geral</b></td>
					<td valign="bottom" align="right"><input type="radio" class="structFilterBox" name="status" value="<?=$avaliacao->STATUS_REJEITADO?>" id="status_rejeitado" disabled <?= ($avaliacao->getSTATUS()==$avaliacao->STATUS_REJEITADO) ? "checked" :  ""; ?>></td>
					<td valign="bottom" align="left"><label for="status_rejeitado">Rejeitado</label></td>
					<td valign="bottom" align="right"><input type="radio" class="structFilterBox" name="status" value="<?=$avaliacao->STATUS_ACEITO_COM_RESTRICOES?>" id="status_aceito_com_restricoes" disabled <?= ($avaliacao->getSTATUS()==$avaliacao->STATUS_ACEITO_COM_RESTRICOES) ? "checked" :  ""; ?>></td>
					<td valign="bottom" align="left"><label for="status_aceito_com_restricoes"><? if($eventoAtual->getID() ==32){ ?>Reavaliação do Presidente<? }else{?> Aceito com Restrições <? }?></label></td>
					<td valign="bottom" align="right"><input type="radio" class="structFilterBox" name="status" value="<?=$avaliacao->STATUS_ACEITO?>" id="status_aceito" disabled <?= ($avaliacao->getSTATUS()==$avaliacao->STATUS_ACEITO) ? "checked" :  ""; ?> /></td>
					<td valign="bottom" align="left"><label for="status_aceito">Aceito</label></td>
				</table></td>
		</tr><? } ?>
		<tr> 
			<td class="structFilter" colspan="4"> <b>Comentário</b><br> <textarea class="structFilterBox" name="comentario" rows="5" cols="120" readonly><?=$avaliacao->getCOMENTARIO()?></textarea></td>
		</tr>
		<tr> 
			<td class="structFilter">&nbsp;&nbsp;&nbsp;</td>
			<td class="structFilter" colspan="3"><input type="submit" class="structFilterButton" value="Voltar"></td>
		</tr>
	</table>
</form>

<? include_once("struct/struct_bottom.php")?>
<? } ?>