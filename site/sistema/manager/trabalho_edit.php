<? include_once("struct/auth.php")?> 
<?
if (!session_is_registered("evento")) { 
	header("Location: session_seleciona_evento.php?url=trabalho_edit.php&orga_id=0&configurado=1");
} else {

include_once("struct/struct_top.php");

include_once('../classes/class.trabalho.php');
include_once('../classes/service.trabalho.php');
include_once('../classes/class.avaliador.php');
include_once('../classes/service.avaliador.php');
$trabalho = new Trabalho();

/* @var $eventoConfiguracaoAtual Configuracao */
/* @var $eventoAtual Evento */

/* Tratamento de Erro */
if ($_REQUEST['id']) {
	$trabalhoService = new TrabalhoService();
	$trabalho = $trabalhoService->loadTrabalhoById($_REQUEST['id'],$eventoAtual->getID());
	if (!$trabalho->getID()) {
		echo "<span class='structFilter'>";
		echo "Erro: Organização não encontrada no BD.<br>";
		break;
		echo "</span>";
	}
}

?>

<script language="JavaScript">

function validateForm(theForm)
{
  if (!validRequired(theForm.titulo,"Título"))
    return false;
  return true;
}
</script>


<div class="structTitle">Editar Trabalho</div>

<div style="padding-top:8px;"></div>

<form action="trabalho_edit_xp.php" method="POST" class="form.nospace" onSubmit="return validateForm(this)">
<input type="hidden" name="id" value="<?= $trabalho->getID() ?>">
<input type="hidden" name="even_id" value="<?= $eventoAtual->getID() ?>">
    
    <table border="0" cellpadding="0" cellspacing="4">
		<tr> 
			<td class="structFilter" colspan="4"><u>Dados do Trabalho</u></td>
		</tr>
		<tr> 
			<td class="structFilter">ID</td>
			<td class="structFilter" colspan="3"> 
				<?=$trabalho->getID()?>
			</td>
		</tr>
		<tr> 
			<td class="structFilter" width="28%">Status</td>
			<td class="structFilter" colspan="3"> 
				<!--	//"Enviado", "Em Revisão", "Pendente", "Aceito", "Rejeitado"-->
				<select class="structFilterBox" name="status">
					<option value="0" <?= ($trabalho->getSTATUS()=="0") ? "selected" : "";?>> Novo</option>
					<option value="2" <?= ($trabalho->getSTATUS()=="2") ? "selected" : "";?>> Em Revisão</option>
					<option value="4" <?= ($trabalho->getSTATUS()=="4") ? "selected" : "";?>> Pendente</option>
					<option value="8" <?= ($trabalho->getSTATUS()=="8") ? "selected" : "";?>> Aceito</option>
					<option value="9" <?= ($trabalho->getSTATUS()=="9") ? "selected" : "";?>> Rejeitado</option>
				</select> </td>
		</tr>
		<tr> 
			<td class="structFilter" width="28%">Área Temática</td>
			<td class="structFilter" colspan="3"> <select class="structFilterBox" name="area" id="area">
					<option value="0" <?= ($trabalho->getAREA()=="0") ? "selected" : "";?>>Não Definida</option>
					<? if ($eventoConfiguracaoXMLAtual->getTrabalhoArea1PT()) { ?>
					<option value="1" <?= ($trabalho->getAREA()=="1") ? "selected" : "";?>> 
					<?= $eventoConfiguracaoXMLAtual->getTrabalhoArea1PT(); ?>
					</option>
					<? } ?>
					<? if ($eventoConfiguracaoXMLAtual->getTrabalhoArea2PT()) { ?>
					<option value="2" <?= ($trabalho->getAREA()=="2") ? "selected" : "";?>> 
					<?= $eventoConfiguracaoXMLAtual->getTrabalhoArea2PT(); ?>
					</option>
					<? } ?>
					<? if ($eventoConfiguracaoXMLAtual->getTrabalhoArea3PT()) { ?>
					<option value="3" <?= ($trabalho->getAREA()=="3") ? "selected" : "";?>> 
					<?= $eventoConfiguracaoXMLAtual->getTrabalhoArea3PT(); ?>
					</option>
					<? } ?>
					<? if ($eventoConfiguracaoXMLAtual->getTrabalhoArea4PT()) { ?>
					<option value="4" <?= ($trabalho->getAREA()=="4") ? "selected" : "";?>> 
					<?= $eventoConfiguracaoXMLAtual->getTrabalhoArea4PT(); ?>
					</option>
					<? } ?>
					<? if ($eventoConfiguracaoXMLAtual->getTrabalhoArea5PT()) { ?>
					<option value="5" <?= ($trabalho->getAREA()=="5") ? "selected" : "";?>> 
					<?= $eventoConfiguracaoXMLAtual->getTrabalhoArea5PT(); ?>
					</option>
					<? } ?>
					<? if ($eventoConfiguracaoXMLAtual->getTrabalhoArea6PT()) { ?>
					<option value="6" <?= ($trabalho->getAREA()=="6") ? "selected" : "";?>> 
					<?= $eventoConfiguracaoXMLAtual->getTrabalhoArea6PT(); ?>
					</option>
					<? } ?>
					<? if ($eventoConfiguracaoXMLAtual->getTrabalhoArea7PT()) { ?>
					<option value="7" <?= ($trabalho->getAREA()=="7") ? "selected" : "";?>> 
					<?= $eventoConfiguracaoXMLAtual->getTrabalhoArea7PT(); ?>
					</option>
					<? } ?>
					<? if ($eventoConfiguracaoXMLAtual->getTrabalhoArea8PT()) { ?>
					<option value="8" <?= ($trabalho->getAREA()=="8") ? "selected" : "";?>> 
					<?= $eventoConfiguracaoXMLAtual->getTrabalhoArea8PT(); ?>
					</option>
					<? } ?>
					<? if ($eventoConfiguracaoXMLAtual->getTrabalhoArea9PT()) { ?>
					<option value="9" <?= ($trabalho->getAREA()=="9") ? "selected" : "";?>> 
					<?= $eventoConfiguracaoXMLAtual->getTrabalhoArea9PT(); ?>
					</option>
					<? } ?>
					<? if ($eventoConfiguracaoXMLAtual->getTrabalhoArea10PT()) { ?>
					<option value="10" <?= ($trabalho->getAREA()=="10") ? "selected" : "";?>> 
					<?= $eventoConfiguracaoXMLAtual->getTrabalhoArea10PT(); ?>
					</option>
					<? } ?>
					<? if ($eventoConfiguracaoXMLAtual->getTrabalhoArea11PT()) { ?>
					<option value="11" <?= ($trabalho->getAREA()=="11") ? "selected" : "";?>> 
					<?= $eventoConfiguracaoXMLAtual->getTrabalhoArea11PT(); ?>
					</option>
					<? } ?>
					<? if ($eventoConfiguracaoXMLAtual->getTrabalhoArea12PT()) { ?>
					<option value="12" <?= ($trabalho->getAREA()=="12") ? "selected" : "";?>> 
					<?= $eventoConfiguracaoXMLAtual->getTrabalhoArea12PT(); ?>
					</option>
					<? } ?>
					<? if ($eventoConfiguracaoXMLAtual->getTrabalhoArea13PT()) { ?>
					<option value="13" <?= ($trabalho->getAREA()=="13") ? "selected" : "";?>> 
					<?= $eventoConfiguracaoXMLAtual->getTrabalhoArea13PT(); ?>
					</option>
					<? } ?>
					<? if ($eventoConfiguracaoXMLAtual->getTrabalhoArea14PT()) { ?>
					<option value="14" <?= ($trabalho->getAREA()=="14") ? "selected" : "";?>> 
					<?= $eventoConfiguracaoXMLAtual->getTrabalhoArea14PT(); ?>
					</option>
					<? } ?>
					<? if ($eventoConfiguracaoXMLAtual->getTrabalhoArea15PT()) { ?>
					<option value="15" <?= ($trabalho->getAREA()=="15") ? "selected" : "";?>> 
					<?= $eventoConfiguracaoXMLAtual->getTrabalhoArea15PT(); ?>
					</option>
					<? } ?>
					<? if ($eventoConfiguracaoXMLAtual->getTrabalhoArea16PT()) { ?>
					<option value="16" <?= ($trabalho->getAREA()=="16") ? "selected" : "";?>> 
					<?= $eventoConfiguracaoXMLAtual->getTrabalhoArea16PT(); ?>
					</option>
					<? } ?>
					<? if ($eventoConfiguracaoXMLAtual->getTrabalhoArea17PT()) { ?>
					<option value="17" <?= ($trabalho->getAREA()=="17") ? "selected" : "";?>> 
					<?= $eventoConfiguracaoXMLAtual->getTrabalhoArea17PT(); ?>
					</option>
					<? } ?>
					<? if ($eventoConfiguracaoXMLAtual->getTrabalhoArea18PT()) { ?>
					<option value="18" <?= ($trabalho->getAREA()=="18") ? "selected" : "";?>> 
					<?= $eventoConfiguracaoXMLAtual->getTrabalhoArea18PT(); ?>
					</option>
					<? } ?>
					<? if ($eventoConfiguracaoXMLAtual->getTrabalhoArea19PT()) { ?>
					<option value="19" <?= ($trabalho->getAREA()=="19") ? "selected" : "";?>> 
					<?= $eventoConfiguracaoXMLAtual->getTrabalhoArea19PT(); ?>
					</option>
					<? } ?>
					<? if ($eventoConfiguracaoXMLAtual->getTrabalhoArea20PT()) { ?>
					<option value="20" <?= ($trabalho->getAREA()=="20") ? "selected" : "";?>> 
					<?= $eventoConfiguracaoXMLAtual->getTrabalhoArea20PT(); ?>
					</option>
					<? } ?>
				</select> </td>
		</tr>
		<tr> 
			<td class="structFilter">Título</td>
			<td class="structFilter" colspan="3"> <input type="edit" class="structFilterBox" name="titulo" value="<?= $trabalho->getTITULO()?>" size="120" maxlength="200"> </td>
		</tr>
		
		<? if($eventoAtual->getID()==23 || $eventoAtual->getID()==24){ ?>
		<!--<tr> 
			<td class="structFilter">Introdução</td>
			<td class="structFilter" colspan="3"> <textarea class="structFilterBox" name="intro" rows="5" cols="120"><?= $trabalho->getINTRO()?></textarea> </td>
		</tr>
		<tr> 
			<td class="structFilter">Objetivos</td>
			<td class="structFilter" colspan="3"> <textarea class="structFilterBox" name="objetivo" rows="5" cols="120"><?= $trabalho->getOBJETIVO()?></textarea> </td>
		</tr>
		<tr> 
			<td class="structFilter">Materiais e Métodos</td>
			<td class="structFilter" colspan="3"> <textarea class="structFilterBox" name="materiais" rows="5" cols="120"><?= $trabalho->getMATERIAIS()?></textarea> </td>
		</tr>
		<tr> 
			<td class="structFilter">Resultados</td>
			<td class="structFilter" colspan="3"> <textarea class="structFilterBox" name="resultados" rows="5" cols="120"><?= $trabalho->getRESULTADOS()?></textarea> </td>
		</tr>
		<tr> 
			<td class="structFilter">Conclusão</td>
			<td class="structFilter" colspan="3"> <textarea class="structFilterBox" name="conclusao" rows="5" cols="120"><?= $trabalho->getCONCLUSAO()?></textarea> </td>
		</tr>-->
		<tr> 
			<td class="structFilter">Palavras-chave</td>
			<td class="structFilter" colspan="3"> 
			<input type="edit" class="structFilterBox" name="palavra1" value="<?= $trabalho->getPALAVRA1()?>" size="120" maxlength="50"> 
			<input type="edit" class="structFilterBox" name="palavra2" value="<?= $trabalho->getPALAVRA2()?>" size="120" maxlength="50"> 
			<input type="edit" class="structFilterBox" name="palavra3" value="<?= $trabalho->getPALAVRA3()?>" size="120" maxlength="50"> 
			</td>
		</tr>
		<tr> 
			<td class="structFilter">Resumo</td>
			<td class="structFilter" colspan="3"> <textarea class="structFilterBox" name="resumo" rows="5" cols="120"><?= $trabalho->getRESUMO()?></textarea> </td>
		</tr>
		<?}?>

		<? if($eventoAtual->getID()!=6){ ?>
		<?php if ( ! $eventoAtual->getID() == 18 ) {?>
		<tr> 
			<td class="structFilter">Resumo</td>
			<td class="structFilter" colspan="3"> <textarea class="structFilterBox" name="resumo" rows="5" cols="120"><?= $trabalho->getRESUMO()?></textarea> </td>
		</tr>
		<? } ?>
		<?php if ( $eventoAtual->getID() == 18 ) {?>
		<? $words = unserialize( $trabalho->getOPCAO5() )?>
		<tr> 
			<td class="structFilter">Resumo<br>(<?= isset( $words[0] ) ? $words[0] : '' ?> palavras )</td>
			<td class="structFilter" colspan="3"><textarea name="resumo" cols="120" rows="5" class="structFilterBox" id="resumo"><?= $trabalho->getRESUMO()?></textarea></td>
		</tr>
		<tr> 
			<td class="structFilter">Resumo Co-Autor 1<br>(<?= isset( $words[1] ) ? $words[1] : '' ?> palavras )</td>
			<td class="structFilter" colspan="3"><textarea name="autorizacao_18" cols="120" rows="5" class="structFilterBox" id="autorizacao_18"><?= $trabalho->getAUTORIZACAO()?></textarea></td>
		</tr>
		<tr> 
			<td class="structFilter">Resumo Co-Autor 2<br>(<?= isset( $words[2] ) ? $words[2] : '' ?> palavras )</td>
			<td class="structFilter" colspan="3"><textarea name="corpo_18" cols="120" rows="5" class="structFilterBox" id="corpo"><?= $trabalho->getCORPO()?></textarea></td>
		</tr>
		<tr> 
			<td class="structFilter">Resumo Co-Autor 3<br>(<?= isset( $words[3] ) ? $words[3] : '' ?> palavras )</td>
			<td class="structFilter" colspan="3"><textarea name="bibliografia_18" cols="120" rows="5" class="structFilterBox" id="bibliografia"><?= $trabalho->getBIBLIOGRAFIA()?></textarea></td>
		</tr>
		<tr> 
			<td class="structFilter">Resumo Co-Autor 4<br>(<?= isset( $words[4] ) ? $words[4] : '' ?> palavras )</td>
			<td class="structFilter" colspan="3"><textarea name="obs_18" cols="120" rows="5" class="structFilterBox" id="obs"><?= $trabalho->getOBS()?></textarea></td>
		</tr>
		<?php } ?>
		
		<?php if($eventoAtual->getID() == 18 || $eventoAtual->getID() == 23 || $eventoAtual->getID()==24 || $eventoAtual->getID()==32) echo '<!--'; ?>
		<tr> 
			<td class="structFilter">Corpo</td>
			<td class="structFilter" colspan="3"> <textarea class="structFilterBox" name="corpo" rows="5" cols="120"><?= $trabalho->getCORPO()?></textarea> </td>
		</tr>
		<tr> 
			<td class="structFilter">Bibliografia</td>
			<td class="structFilter" colspan="3"> <textarea class="structFilterBox" name="bibliografia" rows="5" cols="120"><?= $trabalho->getBIBLIOGRAFIA()?></textarea> </td>
		</tr>
		<?php if($eventoAtual->getID() == 18 || $eventoAtual->getID() == 23 || $eventoAtual->getID()==24 || $eventoAtual->getID()==32) echo '-->'; ?>
		<? } ?>
		<?php if( $eventoAtual->getID() == 23 || $eventoAtual->getID()==24){ ?>
		<tr> 
			<td class="structFilter" colspan="4"><u>Opções</u></td>
		</tr>
		<tr> 
			<td class="structFilter">Forma de Apresentação</td>
			<td class="structFilter" colspan="3"> 
					<select class="structFilterBox" name="opcao1" id="opcao1">
						<option <?= $trabalho->getOPCAO1() == '' ? 'selected' : '' ?> value=""></option>
						<option <?= $trabalho->getOPCAO1() == 'Simpósio' ? 'selected' : '' ?> value="Simpósio">Simpósio</option>
						<option <?= $trabalho->getOPCAO1() == 'Apresentação Oral' ? 'selected' : '' ?> value="Apresentação Oral">Apresentação Oral</option>
						<option <?= $trabalho->getOPCAO1() == 'Poster' ? 'selected' : '' ?> value="Poster">Poster</option>
					</select>
			</td>
		</tr>
		<tr> 
			<td class="structFilter">Categoria</td>
			<td class="structFilter" colspan="3"> 
					<select class="structFilterBox" name="opcao2" id="opcao2">
						<option <?= $trabalho->getOPCAO2() == '' ? 'selected' : '' ?> value=""></option>
						<option <?= $trabalho->getOPCAO2() == 'Graduação' ? 'selected' : '' ?> value="Graduação">Graduação</option>
						<option <?= $trabalho->getOPCAO2() == 'Pós Graduação' ? 'selected' : '' ?> value="Pós Graduação">Pós Graduação</option>
						<option <?= $trabalho->getOPCAO2() == 'Profissional' ? 'selected' : '' ?> value="Profissional">Profissional</option>
					</select>
			</td>
		</tr>
		<? } ?>
		<?php if($eventoAtual->getID() == 23 || $eventoAtual->getID()==24) echo '<!--'; ?>
		<tr> 
			<td class="structFilter" colspan="4"><u>Opções</u></td>
		</tr>
		<tr> 
			<td class="structFilter">Opção 1</td>
			<td class="structFilter" colspan="3"> <input type="edit" class="structFilterBox" name="opcao1" value="<?= $trabalho->getOPCAO1()?>" size="120" maxlength="200"> </td>
		</tr>
		<tr> 
			<td class="structFilter">Opção 2</td>
			<td class="structFilter" colspan="3"> <input type="edit" class="structFilterBox" name="opcao2" value="<?= $trabalho->getOPCAO2()?>" size="120" maxlength="200"> </td>
		</tr>
		<tr> 
			<td class="structFilter">Opção 3</td>
			<td class="structFilter" colspan="3"> <input type="edit" class="structFilterBox" name="opcao3" value="<?= $trabalho->getOPCAO3()?>" size="120" maxlength="200"> </td>
		</tr>
		<?php if( ! $eventoAtual->getID() == 18 ) { ?>
		<tr> 
			<td class="structFilter">Opção 4</td>
			<td class="structFilter" colspan="3"> <input type="edit" class="structFilterBox" name="opcao4" value="<?= $trabalho->getOPCAO4()?>" size="120" maxlength="200"> </td>
		</tr>
		<tr> 
			<td class="structFilter">Opção 5</td>
			<td class="structFilter" colspan="3"> <input type="edit" class="structFilterBox" name="opcao5" value="<?= $trabalho->getOPCAO5()?>" size="120" maxlength="200"> </td>
		</tr>
		<?php } ?>
		<?php if( $eventoAtual->getID() == 23 || $eventoAtual->getID()==24) echo '-->'; ?>
		
		<?php if($eventoAtual->getID() == 18) echo '<!--'; ?>		
		<?php if($eventoAtual->getID() == 23 || $eventoAtual->getID()==24) echo '<!--'; ?>
		<tr> 
			<td class="structFilter" colspan="4"><u>Dados dos Arquivos</u></td>
		</tr>
		<tr> 
			<td class="structFilter" >Nome do Arquivo 1</td>
			<td class="structFilter"><input type="edit" class="structFilterBox" name="nome" value="<?= $trabalho->getARQ_NOME()?>" size="40" maxlength="200" readonly></td>
			<td class="structFilter" >Download</td>
			<td class="structFilter"> 
				<? if ($trabalho->getARQ_URL()) {?>
				<a href="<?= $trabalho->getARQ_URL()?>" target="_blank">Clique aqui para efetuar download</a> 
				<? } else if ($trabalho->getARQ_NOME()){?> <!--O if anterior estva puchando pelo get Nome: (if ($trabalho->getARQ_NOME())-->
				<a href="<?= "../../work_upload/".$eventoConfiguracaoXMLAtual->getEventoAlias()."_".$trabalho->getID()."_1.".$trabalho->getARQ_TIPO() ?>" target="_blank">Clique aqui para efetuar download</a> 
				
				<? } else if ($trabalho->getTITULO()){?> <!--O if anterior estva puchando pelo get Nome: (if ($trabalho->getARQ_NOME())-->
				<a href="<?= "../../work_upload/".$eventoConfiguracaoXMLAtual->getEventoAlias()."_".$trabalho->getID()."_1."."doc" ?>" target="_blank">Clique aqui para efetuar download</a> 
				<? } else { ?>
				<i>Arquivo não disponível para download</i> 
				<? } ?>
			</td>
		</tr>
		<tr> 
			<td class="structFilter" >Nome do Arquivo 2</td>
			<td class="structFilter"><input type="edit" class="structFilterBox" name="nome" value="<?= $trabalho->getARQ2_NOME()?>" size="40" maxlength="200" readonly></td>
			<td class="structFilter" >Download</td>
			<td class="structFilter"> 
				<? if ($trabalho->getARQ2_URL()) {?>
				<a href="<?= $trabalho->getARQ2_URL()?>" target="_blank">Clique aqui para efetuar download</a> 
				<? } else if ($trabalho->getARQ2_NOME()) {?>
				<a href="<?= "../../work_upload/".$eventoConfiguracaoXMLAtual->getEventoAlias()."_".$trabalho->getID()."_2.".$trabalho->getARQ2_TIPO() ?>" target="_blank">Clique aqui para efetuar download</a> 
				<? } else { ?>
				<i>Arquivo não disponível para download</i> 
				<? } ?>
			</td>
		</tr>
		<?php if( $eventoAtual->getID() == 23 || $eventoAtual->getID()==24) echo '-->'; ?>
		<tr> 
			<td class="structFilter" colspan="4"><u>Dados do Apresentador</u></td>
		</tr>
		<tr> 
			<td class="structFilter">Nome</td>
			<td class="structFilter"> <input type="edit" class="structFilterBox" name="apres_nome" value="<?= $trabalho->getAPRES_NOME()?>" size="40" maxlength="50"> </td>
			<td class="structFilter">Email</td>
			<td class="structFilter"> <input type="edit" class="structFilterBox" name="apres_email" value="<?= $trabalho->getAPRES_EMAIL()?>" size="40" maxlength="50"> </td>
		</tr>
		<tr> 
			<td class="structFilter">Organização</td>
			<td class="structFilter"> <input type="edit" class="structFilterBox" name="apres_orga" value="<?= $trabalho->getAPRES_ORGA()?>" size="40" maxlength="50"> </td>
			<td class="structFilter">Telefone</td>
			<td class="structFilter"> <input type="edit" class="structFilterBox" name="apres_fone" value="<?= $trabalho->getAPRES_FONE()?>" size="20" maxlength="20"> </td>
		</tr>
		<?php if($eventoAtual->getID() == 23 || $eventoAtual->getID()==24 || $eventoAtual->getID()==54) { ?>
		<tr>
			<td class="structFilter">CPF/Passaporte</td>
			<td class="structFilter"><input type="edit" class="structFilterBox" name="apres_cpf_passaporte" value="<?= $trabalho->getAPRES_CPF_PASSAPORTE()?>" size="40" maxlength="50"></td>
			<td class="structFilter">Celular</td>
			<td class="structFilter"><input name="apres_celular" type="edit" class="structFilterBox" id="apres_celular" value="<?= $trabalho->getAPRES_CELULAR()?>" size="20" maxlength="20"></td>
		</tr>
		<?php } else {?>
		<tr> 
			<td class="structFilter">&nbsp;</td>
			<td class="structFilter">&nbsp;</td>
			<td class="structFilter">Celular</td>
			<td class="structFilter"><input name="apres_celular" type="edit" class="structFilterBox" id="apres_celular" value="<?= $trabalho->getAPRES_CELULAR()?>" size="20" maxlength="20"></td>
		</tr>
		<?php } ?>
		<?php if($eventoAtual->getID() == 23 || $eventoAtual->getID()==24) echo '<!--'; ?>		
		<tr> 
			<td class="structFilter" colspan="4"><u>Dados do Autor Principal</u></td>
		</tr>
		<tr> 
			<td class="structFilter">Nome</td>
			<td class="structFilter"> <input type="edit" class="structFilterBox" name="autor_nome" value="<?= $trabalho->getAUTOR_NOME()?>" size="40" maxlength="50"> </td>
			<td class="structFilter">Email</td>
			<td class="structFilter"> <input type="edit" class="structFilterBox" name="autor_email" value="<?= $trabalho->getAUTOR_EMAIL()?>" size="40" maxlength="50"> </td>
		</tr>
		<tr> 
			<td class="structFilter">Organização</td>
			<td class="structFilter"> <input type="edit" class="structFilterBox" name="autor_orga" value="<?= $trabalho->getAUTOR_ORGA()?>" size="40" maxlength="50"> </td>
			<td class="structFilter">Telefone</td>
			<td class="structFilter"> <input type="edit" class="structFilterBox" name="autor_fone" value="<?= $trabalho->getAUTOR_FONE()?>" size="20" maxlength="20"> </td>
		</tr>
		<tr> 
			<td class="structFilter">Cidade</td>
			<td class="structFilter"> <input type="edit" class="structFilterBox" name="autor_cidade" value="<?= $trabalho->getAUTOR_CIDADE()?>" size="25" maxlength="20">
				UF 
				<input type="edit" class="structFilterBox" name="autor_estado" value="<?= $trabalho->getAUTOR_ESTADO()?>" size="5" maxlength="20"> </td>
			<td class="structFilter">País</td>
			<td class="structFilter"> <input type="edit" class="structFilterBox" name="autor_pais" value="<?= $trabalho->getAUTOR_PAIS()?>" size="20" maxlength="20"> </td>
		</tr>
		<?php if($eventoAtual->getID() == 18) echo '-->'; ?>
		<?php if( $eventoAtual->getID() == 23 || $eventoAtual->getID()==24) echo '-->'; ?>
		<tr> 
			<td class="structFilter" colspan="4"><u>Demais Autores</u></td>
		</tr>
		<tr> 
			<td class="structFilter">01: Nome</td>
			<td class="structFilter"> <input type="edit" class="structFilterBox" name="autor1_nome" value="<?= $trabalho->getAUTOR1_NOME()?>" size="40" maxlength="50"> </td>
			<td class="structFilter">Email</td>
			<td class="structFilter"> <input type="edit" class="structFilterBox" name="autor1_email" value="<?= $trabalho->getAUTOR1_EMAIL()?>" size="40" maxlength="50"> </td>
		</tr>
		<?php if($eventoAtual->getID() == 18) { ?>
		<tr>
			<td class="structFilter">CPF/Passaporte</td>
			<td class="structFilter"><input type="edit" class="structFilterBox" name="autor1_nome" value="<?= $trabalho->getAUTOR1_CPF_PASSAPORTE()?>" size="40" maxlength="50"></td>
			<td class="structFilter">Fone</td>
			<td class="structFilter"><input type="edit" class="structFilterBox" name="autor_fone" value="<?= $trabalho->getAUTOR_FONE()?>" size="20" maxlength="20"></td>
		</tr>
		<?php } ?>
		<tr> 
			<td class="structFilter">02: Nome</td>
			<td class="structFilter"> <input type="edit" class="structFilterBox" name="autor2_nome" value="<?= $trabalho->getAUTOR2_NOME()?>" size="40" maxlength="50"> </td>
			<td class="structFilter">Email</td>
			<td class="structFilter"> <input type="edit" class="structFilterBox" name="autor2_email" value="<?= $trabalho->getAUTOR2_EMAIL()?>" size="40" maxlength="50"> </td>
		</tr>
		<tr> 
			<td class="structFilter">03: Nome</td>
			<td class="structFilter"> <input type="edit" class="structFilterBox" name="autor3_nome" value="<?= $trabalho->getAUTOR3_NOME()?>" size="40" maxlength="50"> </td>
			<td class="structFilter">Email</td>
			<td class="structFilter"> <input type="edit" class="structFilterBox" name="autor3_email" value="<?= $trabalho->getAUTOR3_EMAIL()?>" size="40" maxlength="50"> </td>
		</tr>
		<tr> 
			<td class="structFilter">04: Nome</td>
			<td class="structFilter"> <input type="edit" class="structFilterBox" name="autor4_nome" value="<?= $trabalho->getAUTOR4_NOME()?>" size="40" maxlength="50"> </td>
			<td class="structFilter">Email</td>
			<td class="structFilter"> <input type="edit" class="structFilterBox" name="autor4_email" value="<?= $trabalho->getAUTOR4_EMAIL()?>" size="40" maxlength="50"> </td>
		</tr>
		<tr> 
			<td class="structFilter">05: Nome</td>
			<td class="structFilter"> <input type="edit" class="structFilterBox" name="autor5_nome" value="<?= $trabalho->getAUTOR5_NOME()?>" size="40" maxlength="50"> </td>
			<td class="structFilter">Email</td>
			<td class="structFilter"> <input type="edit" class="structFilterBox" name="autor5_email" value="<?= $trabalho->getAUTOR5_EMAIL()?>" size="40" maxlength="50"> </td>
		</tr>
		<tr> 
			<td class="structFilter">06: Nome</td>
			<td class="structFilter"> <input type="edit" class="structFilterBox" name="autor6_nome" value="<?= $trabalho->getAUTOR6_NOME()?>" size="40" maxlength="50"> </td>
			<td class="structFilter">Email</td>
			<td class="structFilter"> <input type="edit" class="structFilterBox" name="autor6_email" value="<?= $trabalho->getAUTOR6_EMAIL()?>" size="40" maxlength="50"> </td>
		</tr>
		<tr> 
			<td class="structFilter">07: Nome</td>
			<td class="structFilter"> <input type="edit" class="structFilterBox" name="autor7_nome" value="<?= $trabalho->getAUTOR7_NOME()?>" size="40" maxlength="50"> </td>
			<td class="structFilter">Email</td>
			<td class="structFilter"> <input type="edit" class="structFilterBox" name="autor7_email" value="<?= $trabalho->getAUTOR7_EMAIL()?>" size="40" maxlength="50"> </td>
		</tr>
		<tr> 
			<td class="structFilter">08: Nome</td>
			<td class="structFilter"> <input type="edit" class="structFilterBox" name="autor8_nome" value="<?= $trabalho->getAUTOR8_NOME()?>" size="40" maxlength="50"> </td>
			<td class="structFilter">Email</td>
			<td class="structFilter"> <input type="edit" class="structFilterBox" name="autor8_email" value="<?= $trabalho->getAUTOR8_EMAIL()?>" size="40" maxlength="50"> </td>
		</tr>
		<tr> 
			<td class="structFilter">09: Nome</td>
			<td class="structFilter"> <input type="edit" class="structFilterBox" name="autor9_nome" value="<?= $trabalho->getAUTOR9_NOME()?>" size="40" maxlength="50"> </td>
			<td class="structFilter">Email</td>
			<td class="structFilter"> <input type="edit" class="structFilterBox" name="autor9_email" value="<?= $trabalho->getAUTOR9_EMAIL()?>" size="40" maxlength="50"> </td>
		</tr>
		<tr> 
			<td class="structFilter">10: Nome</td>
			<td class="structFilter"> <input type="edit" class="structFilterBox" name="autor10_nome" value="<?= $trabalho->getAUTOR10_NOME()?>" size="40" maxlength="50"> </td>
			<td class="structFilter">Email</td>
			<td class="structFilter"> <input type="edit" class="structFilterBox" name="autor10_email" value="<?= $trabalho->getAUTOR10_EMAIL()?>" size="40" maxlength="50"> </td>
		</tr>
		<?php if($eventoAtual->getID() == 23 || $eventoAtual->getID()==24) { ?>
		<tr> 
			<td class="structFilter" colspan="4"><u>Dados da Instituição de Ensino</u></td>
		</tr>
		<tr> 
			<td class="structFilter">Instituição 1</td>
			<td class="structFilter"> <input type="edit" class="structFilterBox" name="instituicao1" value="<?= $trabalho->getINSTITUICAO1()?>" size="40" maxlength="50"> </td>
			<td class="structFilter">Instituição 2</td>
			<td class="structFilter"> <input type="edit" class="structFilterBox" name="instituicao2" value="<?= $trabalho->getINSTITUICAO2()?>" size="40" maxlength="50"> </td>
		</tr>
		<tr> 
			<td class="structFilter">Instituição 3</td>
			<td class="structFilter"> <input type="edit" class="structFilterBox" name="instituicao3" value="<?= $trabalho->getINSTITUICAO3()?>" size="40" maxlength="50"> </td>
			<td class="structFilter">Instituição 4</td>
			<td class="structFilter"> <input type="edit" class="structFilterBox" name="instituicao4" value="<?= $trabalho->getINSTITUICAO4()?>" size="40" maxlength="50"> </td>
		</tr>
		<tr> 
			<td class="structFilter" colspan="4"><u>Dados da Localidade da Realização do Trabalho</u></td>
		</tr>
		<tr> 
			<td class="structFilter">Estado</td>
			<td class="structFilter"> 
			<select class="structFilterBox" name="estado" id="estado">
				<option <?= $trabalho->getESTADO() == '' ? 'selected' : '' ?> value=""></option>
				<option <?= $trabalho->getESTADO() == 'AC' ? 'selected' : '' ?> value="AC">Acre</option>
				<option <?= $trabalho->getESTADO() == 'AL' ? 'selected' : '' ?> value="AL">Alagoas</option>
				<option <?= $trabalho->getESTADO() == 'AP' ? 'selected' : '' ?> value="AP">Amapá</option>
				<option <?= $trabalho->getESTADO() == 'AM' ? 'selected' : '' ?> value="AM">Amazonas</option>
				<option <?= $trabalho->getESTADO() == 'BA' ? 'selected' : '' ?> value="BA">Bahia</option>
				<option <?= $trabalho->getESTADO() == 'CE' ? 'selected' : '' ?> value="CE">Ceará</option>
				<option <?= $trabalho->getESTADO() == 'DF' ? 'selected' : '' ?> value="DF">Distrito Federal</option>
				<option <?= $trabalho->getESTADO() == 'ES' ? 'selected' : '' ?> value="ES">Espirito Santo</option>
				<option <?= $trabalho->getESTADO() == 'GO' ? 'selected' : '' ?> value="GO">Goiás</option>
				<option <?= $trabalho->getESTADO() == 'MA' ? 'selected' : '' ?> value="MA">Maranhão</option>
				<option <?= $trabalho->getESTADO() == 'MS' ? 'selected' : '' ?> value="MS">Mato Grosso do Sul</option>
				<option <?= $trabalho->getESTADO() == 'MT' ? 'selected' : '' ?> value="MT">Mato Grosso</option>
				<option <?= $trabalho->getESTADO() == 'MG' ? 'selected' : '' ?> value="MG">Minas Gerais</option>
				<option <?= $trabalho->getESTADO() == 'PA' ? 'selected' : '' ?> value="PA">Pará</option>
				<option <?= $trabalho->getESTADO() == 'PB' ? 'selected' : '' ?> value="PB">Paraíba</option>
				<option <?= $trabalho->getESTADO() == 'PR' ? 'selected' : '' ?> value="PR">Paraná</option>
				<option <?= $trabalho->getESTADO() == 'PE' ? 'selected' : '' ?> value="PE">Pernambuco</option>
				<option <?= $trabalho->getESTADO() == 'PI' ? 'selected' : '' ?> value="PI">Piauí</option>
				<option <?= $trabalho->getESTADO() == 'RJ' ? 'selected' : '' ?> value="RJ">Rio de Janeiro</option>
				<option <?= $trabalho->getESTADO() == 'RN' ? 'selected' : '' ?> value="RN">Rio Grande do Norte</option>
				<option <?= $trabalho->getESTADO() == 'RS' ? 'selected' : '' ?> value="RS">Rio Grande do Sul</option>
				<option <?= $trabalho->getESTADO() == 'RO' ? 'selected' : '' ?> value="RO">Rondônia</option>
				<option <?= $trabalho->getESTADO() == 'RR' ? 'selected' : '' ?> value="RR">Roraima</option>
				<option <?= $trabalho->getESTADO() == 'SC' ? 'selected' : '' ?> value="SC">Santa Catarina</option>
				<option <?= $trabalho->getESTADO() == 'SP' ? 'selected' : '' ?> value="SP">São Paulo</option>
				<option <?= $trabalho->getESTADO() == 'SE' ? 'selected' : '' ?> value="SE">Sergipe</option>
				<option <?= $trabalho->getESTADO() == 'TO' ? 'selected' : '' ?> value="TO">Tocantins</option>
			</select>
			
			</td>
			<td class="structFilter">Cidade</td>
			<td class="structFilter"> <input type="edit" class="structFilterBox" name="cidade" value="<?= $trabalho->getCIDADE()?>" size="40" maxlength="50"> </td>
		</tr>

		<?php } ?>
		<?php if($eventoAtual->getID() == 18) echo '<!--'; ?>
		<tr> 
			<td class="structFilter" colspan="4"><u>Informações Adicionais</u></td>
		</tr>
		<tr> 
			<td class="structFilter">Autorização</td>
			<td class="structFilter" colspan="3"> <textarea class="structFilterBox" name="autorizacao" rows="5" cols="120"><?= $trabalho->getAUTORIZACAO()?></textarea> </td>
		</tr>
		<tr> 
			<td class="structFilter">Observações</td>
			<td class="structFilter" colspan="3"> <textarea class="structFilterBox" name="obs" rows="5" cols="120"><?= $trabalho->getOBS()?></textarea> </td>
		</tr>
		<?php if($eventoAtual->getID() == 18) echo '-->'; ?>
		<tr> 
			<td class="structFilter">&nbsp;&nbsp;&nbsp;</td>
			<td class="structFilter" colspan="3"> <input type="submit" class="structFilterButton" value="Salvar"> </td>
		</tr>
	</table>
</form>
<? include_once("struct/struct_bottom.php")?>
<? } ?>