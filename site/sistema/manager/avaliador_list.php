<? include_once("struct/auth.php")?>
<?
if (!session_is_registered("evento")) { 
	header("Location: session_seleciona_evento.php?url=avaliador_list.php");
} else {

include_once("struct/struct_top.php");
	
include_once('../classes/class.avaliador.php');
include_once('../classes/service.avaliador.php');

include_once('../classes/class.trabalho.php');
include_once('../classes/service.trabalho.php');
include_once('../classes/class.avaliacao.php');
include_once('../classes/service.avaliacao.php');

include_once('../classes/dto.avaliacao_trabalho.php');
$avaliadorService = new AvaliadorService();
$avaliadorList = $avaliadorService->listAvaliadoresByEvento($eventoAtual->getID(),"NOME ASC");

if($eventoAtual->getID()==23){
   $cel = $_REQUEST['celular'];
}
?>
<div class="structTitle">Listar Avaliadores do Evento "<?=$eventoAtual->getNOME()?>"</div>

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
<?  /////////// Para o evevnto 23/////////
	  if($eventoAtual->getID()==23){  ?>

<form action="avaliador_list.php" method="POST" name="theForm">

<div style="padding-top:8px;"></div>

<table border="0" cellpadding="2" cellspacing="0">
<tr>
	<td class="structFilter">Filtar por:</td>
	<td class="structFilter">&nbsp;&nbsp;&nbsp;</td>
	<td class="structFilter">Área Temática</td>
	<td class="structFilter"><select class="structFilterBox" name="celular">
		<option value="0" <?= ($_REQUEST[celular]=="0") ? "selected" : "";?>>Todas</option>
		
		<option value="1" <?= ($_REQUEST[celular]=="1") ? "selected" : "";?>>Neonatologia e Pediatria</option>
		    

		<option value="2" <?= ($_REQUEST[celular]=="2") ? "selected" : "";?>>Fisioterapia em Terapia Intensiva</option>
		
		<option value="3" <?= ($_REQUEST[celular]=="3") ? "selected" : "";?>>Fisioterapia em Cardiologia</option>
    
		
		<option value="4" <?= ($_REQUEST[celular]=="4") ? "selected" : "";?>>Fisioterapia em Pneumopatias</option>
		
		<option value="5" <?= ($_REQUEST[celular]=="5") ? "selected" : "";?>>Recondicionamento Físico nas doenças crônicas</option>
	
		<option value="6" <?= ($_REQUEST[celular]=="6") ? "selected" : "";?>>Fisioterapia Cardiorrespiratória no pré e pós-operatório</option>
	
		<option value="7" <?= ($_REQUEST[celular]=="7") ? "selected" : "";?>>Saúde Coletiva</option>
	
		<option value="8" <?= ($_REQUEST[celular]=="8") ? "selected" : "";?>>Outros</option>
	
	
	</select></td>
	<td class="structFilter">
	 
	</td>
	
	
	<td class="structFilter"><input type="submit" class="structFilterButton" value="Aplicar"></td>
</tr>
</table>
</form>
<? } ?>

<!-- Grid de Listagem -->
<div class="gridContainer" id="tC" style="height:300px; width:100%;border:solid 1px #303030">
<table border="0" cellspacing="0" cellpadding="0" width="100%">
  <thead class="gridHeader">
  <tr class="gridHeader" style="top:expression(document.getElementById('tC').scrollTop);">
	<!--td class="gridHeader" width="2%">&nbsp;</td-->

	<td class="gridHeader" width="2%">&nbsp;</td>
    <td class="gridHeader">Nome</td>
    <td class="gridHeader">Email</td>
    <td class="gridHeader">Telefone</td>
    <td class="gridHeader">Celular</td>
    <td class="gridHeader">Status</td>
    <? if ($eventoAtual->getID() == 23 || $eventoAtual->getID() == 24) {?>
    <td class="gridHeader">Data Convite</td>
    <? } ?>
	<td class="gridHeader" width="2%">	</td>
	<td class="gridHeader" width="2%">&nbsp;</td>
	<td class="gridHeader" width="2%">&nbsp;</td>
	<td class="gridHeader" width="2%">&nbsp;</td>
	<td class="gridHeader" width="2%">&nbsp;</td>
  </tr>
  </thead>
  <tbody>
  
  
	<?  /////////// Para o evevnto 23///////// estou testando neste
	  if($eventoAtual->getID()==23){  ?>  
	  
  <? for ($i = 0; $i < count($avaliadorList); $i++) {
		/* @var $avaliador Avaliador */
		$avaliador = $avaliadorList[$i]; ?>
    <? 
	$celula =  $avaliador->getCELULAR();
	if($cel == $celula){ ?>
  <tr>
    <td class="gridLineEven">&nbsp;</td>
    <td class="gridLineEven"> 
	    <?= $avaliador->getNOME() ?>&nbsp;</td>
    <td class="gridLineEven"><?= $avaliador->getLOGIN() ?>&nbsp;</td>
    <td class="gridLineEven"><?= $avaliador->getTELEFONE() ?>&nbsp;</td>
    <td class="gridLineEven"><?=  $avaliador->getCELULAR() ?>&nbsp;</td>
    <td class="gridLineEven">
		<?= ($avaliador->getSTATUS()=="1") ? "Ativo" : "";?>
		<?= ($avaliador->getSTATUS()=="2") ? "Inativo" : "";?>    </td>
   
    <td class="gridLineEven" <?if(!$avaliador->getLOGGED()) {?> style="color:red" <?}?>>
    <? if($avaliador->getDATA_CONVITE()!= null) { 
    		if($avaliador->getDATA_CONVITE() == "0000-00-00 00:00:00"){
    			echo "&nbsp;";
    		} else {
    			echo $avaliador->getDATA_CONVITE(); 
    		} 
    	} else {
    		echo "&nbsp;";
    	}?>
   
   

    </td>
   
    <td class="gridLineEven" nowrap><a href="avaliador_envia_convite.php?id=<?= $avaliador->getID() ?>">Enviar Convite</a>&nbsp;</td>
    <td class="gridLineEven"><a href="avaliador_avaliacao_list.php?aval_id=<?= $avaliador->getID() ?>">Avaliações</a>&nbsp;</td>
    <td class="gridLineEven"><a href="avaliador_edit.php?id=<?= $avaliador->getID() ?>">Editar</a>&nbsp;</td>
    <td class="gridLineEven"><a href="avaliador_delete_xp.php?id=<?= $avaliador->getID() ?>" onclick="return confirm('Você tem certeza que deseja excluir? (essa operação não pode ser desfeita)')">Excluir</a></td>
    <td class="gridLineEven">	</td>
  </tr>
     <? }else if($cel=="0"){?>
	    <tr>
    <td class="gridLineEven">&nbsp;</td>
    <td class="gridLineEven"> <?= $avaliador->getNOME() ?>&nbsp;</td>
    <td class="gridLineEven"><?= $avaliador->getLOGIN() ?>&nbsp;</td>
    <td class="gridLineEven"><?= $avaliador->getTELEFONE() ?>&nbsp;</td>
    <td class="gridLineEven"><?=  $avaliador->getCELULAR() ?>&nbsp;</td>
	
    <td class="gridLineEven">
		<?= ($avaliador->getSTATUS()=="1") ? "Ativo" : "";?>
		<?= ($avaliador->getSTATUS()=="2") ? "Inativo" : "";?>    </td>
    <? if ($eventoAtual->getID() == 23 || $eventoAtual->getID() == 24) {?>
    <td class="gridLineEven" <?if(!$avaliador->getLOGGED()) {?> style="color:red" <?}?>>
    <? if($avaliador->getDATA_CONVITE()!= null) { 
    		if($avaliador->getDATA_CONVITE() == "0000-00-00 00:00:00"){
    			echo "&nbsp;";
    		} else {
    			echo $avaliador->getDATA_CONVITE(); 
    		} 
    	} else {
    		echo "&nbsp;";
    	}?>    </td>
    <?} ?>
    <td class="gridLineEven" nowrap><a href="avaliador_envia_convite.php?id=<?= $avaliador->getID() ?>">Enviar Convite</a>&nbsp;</td>
    <td class="gridLineEven"><a href="avaliador_avaliacao_list.php?aval_id=<?= $avaliador->getID() ?>">Avaliações</a>&nbsp;</td>
    <td class="gridLineEven"><a href="avaliador_edit.php?id=<?= $avaliador->getID() ?>">Editar</a>&nbsp;</td>
    <td class="gridLineEven"><a href="avaliador_delete_xp.php?id=<?= $avaliador->getID() ?>" onclick="return confirm('Você tem certeza que deseja excluir? (essa operação não pode ser desfeita)')">Excluir</a></td>
    <td class="gridLineEven">&nbsp;</td>
  </tr>
	 
  <?
    }  
   }; ?>
   
   
   
 <? }else {
 
 
 ?>
   
   <? for ($i = 0; $i < count($avaliadorList); $i++) {
		/* @var $avaliador Avaliador */
		$avaliador = $avaliadorList[$i]; ?>
  
  <tr>
    <td class="gridLineEven">&nbsp;</td>
    <td class="gridLineEven"> 
	    <?= $avaliador->getNOME() ?>&nbsp;</td>
    <td class="gridLineEven"><?= $avaliador->getLOGIN() ?>&nbsp;</td>
    <td class="gridLineEven"><?= $avaliador->getTELEFONE() ?>&nbsp;</td>
    <td class="gridLineEven"><?=  $avaliador->getCELULAR() ?>&nbsp;</td>
    <td class="gridLineEven">
		<?= ($avaliador->getSTATUS()=="1") ? "Ativo" : "";?>
		<?= ($avaliador->getSTATUS()=="2") ? "Inativo" : "";?>    </td>
    <? if ($eventoAtual->getID() == 23 || $eventoAtual->getID() == 24) {?>
    <td class="gridLineEven" <?if(!$avaliador->getLOGGED()) {?> style="color:red" <?}?>>
    <? if($avaliador->getDATA_CONVITE()!= null) { 
    		if($avaliador->getDATA_CONVITE() == "0000-00-00 00:00:00"){
    			echo "&nbsp;";
    		} else {
    			echo $avaliador->getDATA_CONVITE(); 
    		} 
    	} else {
    		echo "&nbsp;";
    	}?>    </td>
    <?} ?>
    <td class="gridLineEven" nowrap><a href="avaliador_envia_convite.php?id=<?= $avaliador->getID() ?>">Enviar Convite</a>&nbsp;</td>
    <td class="gridLineEven"><a href="avaliador_avaliacao_list.php?aval_id=<?= $avaliador->getID() ?>">Avaliações</a>&nbsp;</td>
    <td class="gridLineEven"><a href="avaliador_edit.php?id=<?= $avaliador->getID() ?>">Editar</a>&nbsp;</td>
    <td class="gridLineEven"><a href="avaliador_delete_xp.php?id=<?= $avaliador->getID() ?>" onclick="return confirm('Você tem certeza que deseja excluir? (essa operação não pode ser desfeita)')">Excluir</a></td>
    <td class="gridLineEven">	</td>
  </tr>
    
	 
  <?
    
   }; ?>
   
   
   <? }?>
  </tbody>
</table>
</div>



<? include_once("struct/struct_bottom.php")?>
<? } ?>