<? include_once("struct/auth.php")?>
<? 
 
		 
if (!session_is_registered("evento")) { 
	header("Location: session_seleciona_evento.php?url=inscricao_list.php&orga_id=0&configurado=1");
} else {
	
include_once("struct/struct_top.php");
include_once('../classes/class.trabalho.php');
include_once('../classes/service.trabalho.php');

/* @var $eventoConfiguracaoXMLAtual ConfiguracaoXML */
/* @var $eventoConfiguracaoAtual Configuracao */
/* @var $eventoAtual Evento */
$trabalhoService = new TrabalhoService();
$trabalhoList = $trabalhoService->listTrabalhosFiltered($eventoAtual->getID(),$_REQUEST["area"],$_REQUEST["status"],"DATA DESC");

$trabalho = new Trabalho();

?>

	   <div class="structTitle">Listar Trabalhos do Evento "<?=$eventoAtual->getNOME()?>"</div>



<form action="trabalho_list.php" method="POST" name="theForm">

<div style="padding-top:8px;"></div>

<table width="741" border="0" cellpadding="2" cellspacing="0">
<tr>
	<td class="structFilter">Filtar por:</td>
	<td class="structFilter">&nbsp;&nbsp;&nbsp;</td>
	<td class="structFilter">Área Temática</td>
	<td class="structFilter"><select class="structFilterBox" name="area">
      <option value="">Todas</option>
      <? if ($eventoConfiguracaoXMLAtual->getTrabalhoArea1PT()) { ?>
      <option value="1" <?= ($_REQUEST["area"]=="1") ? "selected" : "";?>>
        <?= $eventoConfiguracaoXMLAtual->getTrabalhoArea1PT(); ?>
        </option>
      <? } ?>
      <? if ($eventoConfiguracaoXMLAtual->getTrabalhoArea2PT()) { ?>
      <option value="2" <?= ($_REQUEST["area"]=="2") ? "selected" : "";?>>
        <?= $eventoConfiguracaoXMLAtual->getTrabalhoArea2PT(); ?>
        </option>
      <? } ?>
      <? if ($eventoConfiguracaoXMLAtual->getTrabalhoArea3PT()) { ?>
      <option value="3" <?= ($_REQUEST["area"]=="3") ? "selected" : "";?>>
        <?= $eventoConfiguracaoXMLAtual->getTrabalhoArea3PT(); ?>
        </option>
      <? } ?>
      <? if ($eventoConfiguracaoXMLAtual->getTrabalhoArea4PT()) { ?>
      <option value="4" <?= ($_REQUEST["area"]=="4") ? "selected" : "";?>>
        <?= $eventoConfiguracaoXMLAtual->getTrabalhoArea4PT(); ?>
        </option>
      <? } ?>
      <? if ($eventoConfiguracaoXMLAtual->getTrabalhoArea5PT()) { ?>
      <option value="5" <?= ($_REQUEST["area"]=="5") ? "selected" : "";?>>
        <?= $eventoConfiguracaoXMLAtual->getTrabalhoArea5PT(); ?>
        </option>
      <? } ?>
      <? if ($eventoConfiguracaoXMLAtual->getTrabalhoArea6PT()) { ?>
      <option value="6" <?= ($_REQUEST["area"]=="6") ? "selected" : "";?>>
        <?= $eventoConfiguracaoXMLAtual->getTrabalhoArea6PT(); ?>
        </option>
      <? } ?>
      <? if ($eventoConfiguracaoXMLAtual->getTrabalhoArea7PT()) { ?>
      <option value="7" <?= ($_REQUEST["area"]=="7") ? "selected" : "";?>>
        <?= $eventoConfiguracaoXMLAtual->getTrabalhoArea7PT(); ?>
        </option>
      <? } ?>
      <? if ($eventoConfiguracaoXMLAtual->getTrabalhoArea8PT()) { ?>
      <option value="8" <?= ($_REQUEST["area"]=="8") ? "selected" : "";?>>
        <?= $eventoConfiguracaoXMLAtual->getTrabalhoArea8PT(); ?>
        </option>
      <? } ?>
      <? if ($eventoConfiguracaoXMLAtual->getTrabalhoArea9PT()) { ?>
      <option value="9" <?= ($_REQUEST["area"]=="9") ? "selected" : "";?>>
        <?= $eventoConfiguracaoXMLAtual->getTrabalhoArea9PT(); ?>
        </option>
      <? } ?>
      <? if ($eventoConfiguracaoXMLAtual->getTrabalhoArea10PT()) { ?>
      <option value="10" <?= ($_REQUEST["area"]=="10") ? "selected" : "";?>>
        <?= $eventoConfiguracaoXMLAtual->getTrabalhoArea10PT(); ?>
        </option>
      <? } ?>
      <? if ($eventoConfiguracaoXMLAtual->getTrabalhoArea11PT()) { ?>
      <option value="11" <?= ($_REQUEST["area"]=="11") ? "selected" : "";?>>
        <?= $eventoConfiguracaoXMLAtual->getTrabalhoArea11PT(); ?>
        </option>
      <? } ?>
      <? if ($eventoConfiguracaoXMLAtual->getTrabalhoArea12PT()) { ?>
      <option value="12" <?= ($_REQUEST["area"]=="12") ? "selected" : "";?>>
        <?= $eventoConfiguracaoXMLAtual->getTrabalhoArea12PT(); ?>
        </option>
      <? } ?>
      <? if ($eventoConfiguracaoXMLAtual->getTrabalhoArea13PT()) { ?>
      <option value="13" <?= ($_REQUEST["area"]=="13") ? "selected" : "";?>>
        <?= $eventoConfiguracaoXMLAtual->getTrabalhoArea13PT(); ?>
        </option>
      <? } ?>
      <? if ($eventoConfiguracaoXMLAtual->getTrabalhoArea14PT()) { ?>
      <option value="14" <?= ($_REQUEST["area"]=="14") ? "selected" : "";?>>
        <?= $eventoConfiguracaoXMLAtual->getTrabalhoArea14PT(); ?>
        </option>
      <? } ?>
      <? if ($eventoConfiguracaoXMLAtual->getTrabalhoArea15PT()) { ?>
      <option value="15" <?= ($_REQUEST["area"]=="15") ? "selected" : "";?>>
        <?= $eventoConfiguracaoXMLAtual->getTrabalhoArea15PT(); ?>
        </option>
      <? } ?>
      <? if ($eventoConfiguracaoXMLAtual->getTrabalhoArea16PT()) { ?>
      <option value="16" <?= ($_REQUEST["area"]=="16") ? "selected" : "";?>>
        <?= $eventoConfiguracaoXMLAtual->getTrabalhoArea16PT(); ?>
        </option>
      <? } ?>
      <? if ($eventoConfiguracaoXMLAtual->getTrabalhoArea17PT()) { ?>
      <option value="17" <?= ($_REQUEST["area"]=="17") ? "selected" : "";?>>
        <?= $eventoConfiguracaoXMLAtual->getTrabalhoArea17PT(); ?>
        </option>
      <? } ?>
      <? if ($eventoConfiguracaoXMLAtual->getTrabalhoArea18PT()) { ?>
      <option value="18" <?= ($_REQUEST["area"]=="18") ? "selected" : "";?>>
        <?= $eventoConfiguracaoXMLAtual->getTrabalhoArea18PT(); ?>
        </option>
      <? } ?>
      <? if ($eventoConfiguracaoXMLAtual->getTrabalhoArea19PT()) { ?>
      <option value="19" <?= ($_REQUEST["area"]=="19") ? "selected" : "";?>>
        <?= $eventoConfiguracaoXMLAtual->getTrabalhoArea19PT(); ?>
        </option>
      <? } ?>
      <? if ($eventoConfiguracaoXMLAtual->getTrabalhoArea20PT()) { ?>
      <option value="20" <?= ($_REQUEST["area"]=="20") ? "selected" : "";?>>
        <?= $eventoConfiguracaoXMLAtual->getTrabalhoArea20PT(); ?>
        </option>
      <? } ?>
    </select></td>
	<td class="structFilter">
	  <? 
	   /////////// Para o evevnto 52/////////
	  if($eventoAtual->getID()==52 ){?> 
	 
	   
	    <select class="structFilterBox" name="idades">
		<option value="">Todos</option>
		<option value="1" <?= ($_REQUEST["idades"]!= "" && $_REQUEST["idades"] ==1) ? "selected" : "";?>>COBRAMSEG</option>
		<option value="2" <?= ($_REQUEST["idades"] == 2) ? "selected" : "";?>>GEOJOVEM</option>
		
	</select>
	 
	 <? 
	    }
	  /////////// Para o evevnto 23/////////
	  if($eventoAtual->getID()==23){
	  
	   ?>
	   <? $data=date("d/m/Y");
  
       if ($data >= "10/01/2010"){ ?>
	      <a href="avaliador_escolha_xp_aut.php?evento_id=<?= $eventoAtual->getID() ?>&area=<?=$area?>"> Vincular</a>
	   <? } 
	   } 
	
	  ?>
	  
	  
	 <? 
	   
	  /////////// Para o evevnto 23/////////
	  if($eventoAtual->getID()==24){
	  
	   ?>
	   <? $data=date("d/m/Y");
  
       if ($data >= "10/01/2010"){ ?>
	      <a href="avaliador_escolha_xp_aut_ranking.php?evento_id=<?= $eventoAtual->getID() ?>"> Vincular</a>
	   <? } 
	   } 
	
	  ?>
	  
	  
	  </td>
	<td class="structFilter">Status</td>
	<td class="structFilter"><select class="structFilterBox" name="status">
		<option value="">Todos</option>
		<option value="<?= $trabalho->STATUS_NOVO ?>" <?= ($_REQUEST["status"]!= "" && $_REQUEST["status"]==$trabalho->STATUS_NOVO) ? "selected" : "";?>>Novo</option>
		<option value="<?= $trabalho->STATUS_EM_REVISAO ?>" <?= ($_REQUEST["status"]==$trabalho->STATUS_EM_REVISAO) ? "selected" : "";?>>Em Revisão</option>
		<option value="<?= $trabalho->STATUS_PENDENTE ?>" <?= ($_REQUEST["status"]==$trabalho->STATUS_PENDENTE) ? "selected" : "";?>>Pendente</option>
		<option value="<?= $trabalho->STATUS_ACEITO ?>" <?= ($_REQUEST["status"]==$trabalho->STATUS_ACEITO) ? "selected" : "";?>>Aceito</option>
		<option value="<?= $trabalho->STATUS_ACEITO_COM_RESTRICOES ?>" <?= ($_REQUEST["status"]==$trabalho->STATUS_ACEITO_COM_RESTRICOES) ? "selected" : "";?>>Aceito com Restrições</option>
		<option value="<?= $trabalho->STATUS_REJEITADO ?>" <?= ($_REQUEST["status"]==$trabalho->STATUS_REJEITADO) ? "selected" : "";?>>Rejeitado</option>
	</select></td>
	<td class="structFilter">&nbsp;&nbsp;&nbsp;</td>
	<td class="structFilter"><input type="submit" class="structFilterButton" value="Aplicar"></td>
</tr>
</table>
</form>

<div style="padding-top:8px;"></div>

<!-- Grid de Listagem -->
<div class="gridContainer" id="tC" style="height:300px; width:100%;border:solid 1px #303030">
<table border="0" cellspacing="0" cellpadding="0" width="100%">
  <thead class="gridHeader">
  <tr class="gridHeader" style="top:expression(document.getElementById('tC').scrollTop);">
	<!--td class="gridHeader" width="2%">&nbsp;</td-->

	<td class="gridHeader" width="2%">
	
	
	</td>
    <td class="gridHeader">ID</td>
    <td class="gridHeader">Titulo</td>
	 <? 
	   /////////// Para o evevnto 52/////////
	  if($eventoAtual->getID()==52 ){?> 
	<td class="gridHeader">Idade</td>
	<? }?>
    <td class="gridHeader">Área Temática</td>
    <td class="gridHeader">Apresentador</td>
    <td class="gridHeader">Status</td>
    <td class="gridHeader">Data</td>
	<td class="gridHeader" width="2%">&nbsp;</td>
	<td class="gridHeader" width="2%">&nbsp;</td>
	<td class="gridHeader" width="2%">&nbsp;</td>
	<td class="gridHeader" width="2%">&nbsp;</td>
	<td class="gridHeader" width="2%">&nbsp;</td>
  </tr>
  </thead>
  <tbody>
   <?
   ////////////////////////////////// 
   //////////////////////// evento 52 para listar por idade ////////////////////////////
                                                 ///////////////////////////////////////
   
    if($eventoAtual->getID()==52 ){?>
	<? if($idades ==1){?> 
	<? for ($i = 0; $i < count($trabalhoList); $i++) {
	      
	
		/* @var $trabalho Trabalho */
		$trabalho = $trabalhoList[$i]; ?>
		<? if($trabalho->getOBS() > 34){ ?>
		
  <tr>
    <td class="gridLineEven">&nbsp;</td>
    <td class="gridLineEven"><?= $trabalho->getID() ?>&nbsp;</td>
    <td class="gridLineEven"><?= $trabalho->getTITULO() ?>&nbsp;</td>
	 <td class="gridLineEven"><?= $trabalho->getOBS() ?>&nbsp;</td>
	
	
    <td class="gridLineEven">
    	<?= ($trabalho->getAREA()==0) ? "Não Definida" : "";?>
    	<?= ($trabalho->getAREA()==1) ? $eventoConfiguracaoXMLAtual->getTrabalhoArea1PT() : "";?>
    	<?= ($trabalho->getAREA()==2) ? $eventoConfiguracaoXMLAtual->getTrabalhoArea2PT() : "";?>
    	<?= ($trabalho->getAREA()==3) ? $eventoConfiguracaoXMLAtual->getTrabalhoArea3PT() : "";?>
    	<?= ($trabalho->getAREA()==4) ? $eventoConfiguracaoXMLAtual->getTrabalhoArea4PT() : "";?>
    	<?= ($trabalho->getAREA()==5) ? $eventoConfiguracaoXMLAtual->getTrabalhoArea5PT() : "";?>
    	<?= ($trabalho->getAREA()==6) ? $eventoConfiguracaoXMLAtual->getTrabalhoArea6PT() : "";?>
    	<?= ($trabalho->getAREA()==7) ? $eventoConfiguracaoXMLAtual->getTrabalhoArea7PT() : "";?>
    	<?= ($trabalho->getAREA()==8) ? $eventoConfiguracaoXMLAtual->getTrabalhoArea8PT() : "";?>
    	<?= ($trabalho->getAREA()==9) ? $eventoConfiguracaoXMLAtual->getTrabalhoArea9PT() : "";?>
    	<?= ($trabalho->getAREA()==10) ? $eventoConfiguracaoXMLAtual->getTrabalhoArea10PT() : "";?>
    	<?= ($trabalho->getAREA()==11) ? $eventoConfiguracaoXMLAtual->getTrabalhoArea11PT() : "";?>
    	<?= ($trabalho->getAREA()==12) ? $eventoConfiguracaoXMLAtual->getTrabalhoArea12PT() : "";?>
    	<?= ($trabalho->getAREA()==13) ? $eventoConfiguracaoXMLAtual->getTrabalhoArea13PT() : "";?>
    	<?= ($trabalho->getAREA()==14) ? $eventoConfiguracaoXMLAtual->getTrabalhoArea14PT() : "";?>
    	<?= ($trabalho->getAREA()==15) ? $eventoConfiguracaoXMLAtual->getTrabalhoArea15PT() : "";?>
    	<?= ($trabalho->getAREA()==16) ? $eventoConfiguracaoXMLAtual->getTrabalhoArea16PT() : "";?>
    	<?= ($trabalho->getAREA()==17) ? $eventoConfiguracaoXMLAtual->getTrabalhoArea17PT() : "";?>
    	<?= ($trabalho->getAREA()==18) ? $eventoConfiguracaoXMLAtual->getTrabalhoArea18PT() : "";?>
    	<?= ($trabalho->getAREA()==19) ? $eventoConfiguracaoXMLAtual->getTrabalhoArea19PT() : "";?>
    	<?= ($trabalho->getAREA()==20) ? $eventoConfiguracaoXMLAtual->getTrabalhoArea20PT() : "";?>
    </td>    
    <td class="gridLineEven"><?= $trabalho->getAPRES_NOME() ?>&nbsp;</td>
    <td class="gridLineEven">
	 
		<?= ($trabalho->getSTATUS()=="0") ? "Novo" : "";?>
		<?= ($trabalho->getSTATUS()=="2") ? "Em Revisão" : "";?>
		<?= ($trabalho->getSTATUS()=="4") ? "Pendente" : "";?>
		<?= ($trabalho->getSTATUS()=="7") ? "Reavaliação do Presidente" : "";?>
		<?= ($trabalho->getSTATUS()=="8") ? "Aceito" : "";?>
		<?= ($trabalho->getSTATUS()=="9") ? "Rejeitado" : "";?>
	  
    </td>
    <td class="gridLineEven"><?= date("d/m/Y H:m",strtotime($trabalho->getDATA())) ?>&nbsp;</td>
    <td class="gridLineEven"><a href="trabalho_avaliacao_list.php?trab_id=<?= $trabalho->getID() ?>">Avaliações</a>&nbsp;</td>
    <td class="gridLineEven"><a href="trabalho_view.php?id=<?= $trabalho->getID() ?>">Visualizar</a>&nbsp;</td>
    <td class="gridLineEven"><a href="trabalho_edit.php?id=<?= $trabalho->getID() ?>">Editar</a>&nbsp;</td>
    <td class="gridLineEven"><a href="trabalho_delete_xp.php?trab_id=<?= $trabalho->getID() ?>" onClick="return confirm('Você tem certeza que deseja excluir?\n(essa operação não pode ser desfeita)')">Excluir</a></td>
    <td class="gridLineEven">&nbsp;</td>
  </tr>
   <? } ?>
  <? }; ?>
    
	<? } else if($idades ==2){?> 
	<? for ($i = 0; $i < count($trabalhoList); $i++) {
	      
	
		/* @var $trabalho Trabalho */
		$trabalho = $trabalhoList[$i]; ?>
		<? if($trabalho->getOBS() < 35){ ?>
		
  <tr>
    <td class="gridLineEven">&nbsp;</td>
    <td class="gridLineEven"><?= $trabalho->getID() ?>&nbsp;</td>
    <td class="gridLineEven"><?= $trabalho->getTITULO() ?>&nbsp;</td>
	 <td class="gridLineEven"><?= $trabalho->getOBS() ?>&nbsp;</td>
	
	
    <td class="gridLineEven">
    	<?= ($trabalho->getAREA()==0) ? "Não Definida" : "";?>
    	<?= ($trabalho->getAREA()==1) ? $eventoConfiguracaoXMLAtual->getTrabalhoArea1PT() : "";?>
    	<?= ($trabalho->getAREA()==2) ? $eventoConfiguracaoXMLAtual->getTrabalhoArea2PT() : "";?>
    	<?= ($trabalho->getAREA()==3) ? $eventoConfiguracaoXMLAtual->getTrabalhoArea3PT() : "";?>
    	<?= ($trabalho->getAREA()==4) ? $eventoConfiguracaoXMLAtual->getTrabalhoArea4PT() : "";?>
    	<?= ($trabalho->getAREA()==5) ? $eventoConfiguracaoXMLAtual->getTrabalhoArea5PT() : "";?>
    	<?= ($trabalho->getAREA()==6) ? $eventoConfiguracaoXMLAtual->getTrabalhoArea6PT() : "";?>
    	<?= ($trabalho->getAREA()==7) ? $eventoConfiguracaoXMLAtual->getTrabalhoArea7PT() : "";?>
    	<?= ($trabalho->getAREA()==8) ? $eventoConfiguracaoXMLAtual->getTrabalhoArea8PT() : "";?>
    	<?= ($trabalho->getAREA()==9) ? $eventoConfiguracaoXMLAtual->getTrabalhoArea9PT() : "";?>
    	<?= ($trabalho->getAREA()==10) ? $eventoConfiguracaoXMLAtual->getTrabalhoArea10PT() : "";?>
    	<?= ($trabalho->getAREA()==11) ? $eventoConfiguracaoXMLAtual->getTrabalhoArea11PT() : "";?>
    	<?= ($trabalho->getAREA()==12) ? $eventoConfiguracaoXMLAtual->getTrabalhoArea12PT() : "";?>
    	<?= ($trabalho->getAREA()==13) ? $eventoConfiguracaoXMLAtual->getTrabalhoArea13PT() : "";?>
    	<?= ($trabalho->getAREA()==14) ? $eventoConfiguracaoXMLAtual->getTrabalhoArea14PT() : "";?>
    	<?= ($trabalho->getAREA()==15) ? $eventoConfiguracaoXMLAtual->getTrabalhoArea15PT() : "";?>
    	<?= ($trabalho->getAREA()==16) ? $eventoConfiguracaoXMLAtual->getTrabalhoArea16PT() : "";?>
    	<?= ($trabalho->getAREA()==17) ? $eventoConfiguracaoXMLAtual->getTrabalhoArea17PT() : "";?>
    	<?= ($trabalho->getAREA()==18) ? $eventoConfiguracaoXMLAtual->getTrabalhoArea18PT() : "";?>
    	<?= ($trabalho->getAREA()==19) ? $eventoConfiguracaoXMLAtual->getTrabalhoArea19PT() : "";?>
    	<?= ($trabalho->getAREA()==20) ? $eventoConfiguracaoXMLAtual->getTrabalhoArea20PT() : "";?>
    </td>    
    <td class="gridLineEven"><?= $trabalho->getAPRES_NOME() ?>&nbsp;</td>
    <td class="gridLineEven">
	 
		<?= ($trabalho->getSTATUS()=="0") ? "Novo" : "";?>
		<?= ($trabalho->getSTATUS()=="2") ? "Em Revisão" : "";?>
		<?= ($trabalho->getSTATUS()=="4") ? "Pendente" : "";?>
		<?= ($trabalho->getSTATUS()=="7") ? "Reavaliação do Presidente" : "";?>
		<?= ($trabalho->getSTATUS()=="8") ? "Aceito" : "";?>
		<?= ($trabalho->getSTATUS()=="9") ? "Rejeitado" : "";?>
	
    </td>
    <td class="gridLineEven"><?= date("d/m/Y H:m",strtotime($trabalho->getDATA())) ?>&nbsp;</td>
    <td class="gridLineEven"><a href="trabalho_avaliacao_list.php?trab_id=<?= $trabalho->getID() ?>">Avaliações</a>&nbsp;</td>
    <td class="gridLineEven"><a href="trabalho_view.php?id=<?= $trabalho->getID() ?>">Visualizar</a>&nbsp;</td>
    <td class="gridLineEven"><a href="trabalho_edit.php?id=<?= $trabalho->getID() ?>">Editar</a>&nbsp;</td>
    <td class="gridLineEven"><a href="trabalho_delete_xp.php?trab_id=<?= $trabalho->getID() ?>" onClick="return confirm('Você tem certeza que deseja excluir?\n(essa operação não pode ser desfeita)')">Excluir</a></td>
    <td class="gridLineEven">&nbsp;</td>
  </tr>
   <? } ?>
  <? }; ?>
    
	<? }else{?> 
	<? for ($i = 0; $i < count($trabalhoList); $i++) {
	  
	    
		/* @var $trabalho Trabalho */
		$trabalho = $trabalhoList[$i]; ?>
		
  <tr>
    <td class="gridLineEven">&nbsp;</td>
    <td class="gridLineEven"><?= $trabalho->getID() ?>&nbsp;</td>
    <td class="gridLineEven"><?= $trabalho->getTITULO() ?>&nbsp;</td>
	 <td class="gridLineEven"><?= $trabalho->getOBS() ?>&nbsp;</td>
	
	
    <td class="gridLineEven">
    	<?= ($trabalho->getAREA()==0) ? "Não Definida" : "";?>
    	<?= ($trabalho->getAREA()==1) ? $eventoConfiguracaoXMLAtual->getTrabalhoArea1PT() : "";?>
    	<?= ($trabalho->getAREA()==2) ? $eventoConfiguracaoXMLAtual->getTrabalhoArea2PT() : "";?>
    	<?= ($trabalho->getAREA()==3) ? $eventoConfiguracaoXMLAtual->getTrabalhoArea3PT() : "";?>
    	<?= ($trabalho->getAREA()==4) ? $eventoConfiguracaoXMLAtual->getTrabalhoArea4PT() : "";?>
    	<?= ($trabalho->getAREA()==5) ? $eventoConfiguracaoXMLAtual->getTrabalhoArea5PT() : "";?>
    	<?= ($trabalho->getAREA()==6) ? $eventoConfiguracaoXMLAtual->getTrabalhoArea6PT() : "";?>
    	<?= ($trabalho->getAREA()==7) ? $eventoConfiguracaoXMLAtual->getTrabalhoArea7PT() : "";?>
    	<?= ($trabalho->getAREA()==8) ? $eventoConfiguracaoXMLAtual->getTrabalhoArea8PT() : "";?>
    	<?= ($trabalho->getAREA()==9) ? $eventoConfiguracaoXMLAtual->getTrabalhoArea9PT() : "";?>
    	<?= ($trabalho->getAREA()==10) ? $eventoConfiguracaoXMLAtual->getTrabalhoArea10PT() : "";?>
    	<?= ($trabalho->getAREA()==11) ? $eventoConfiguracaoXMLAtual->getTrabalhoArea11PT() : "";?>
    	<?= ($trabalho->getAREA()==12) ? $eventoConfiguracaoXMLAtual->getTrabalhoArea12PT() : "";?>
    	<?= ($trabalho->getAREA()==13) ? $eventoConfiguracaoXMLAtual->getTrabalhoArea13PT() : "";?>
    	<?= ($trabalho->getAREA()==14) ? $eventoConfiguracaoXMLAtual->getTrabalhoArea14PT() : "";?>
    	<?= ($trabalho->getAREA()==15) ? $eventoConfiguracaoXMLAtual->getTrabalhoArea15PT() : "";?>
    	<?= ($trabalho->getAREA()==16) ? $eventoConfiguracaoXMLAtual->getTrabalhoArea16PT() : "";?>
    	<?= ($trabalho->getAREA()==17) ? $eventoConfiguracaoXMLAtual->getTrabalhoArea17PT() : "";?>
    	<?= ($trabalho->getAREA()==18) ? $eventoConfiguracaoXMLAtual->getTrabalhoArea18PT() : "";?>
    	<?= ($trabalho->getAREA()==19) ? $eventoConfiguracaoXMLAtual->getTrabalhoArea19PT() : "";?>
    	<?= ($trabalho->getAREA()==20) ? $eventoConfiguracaoXMLAtual->getTrabalhoArea20PT() : "";?>
    </td>    
    <td class="gridLineEven"><?= $trabalho->getAPRES_NOME() ?>&nbsp;</td>
    <td class="gridLineEven">
	  
		<?= ($trabalho->getSTATUS()=="0") ? "Novo" : "";?>
		<?= ($trabalho->getSTATUS()=="2") ? "Em Revisão" : "";?>
		<?= ($trabalho->getSTATUS()=="4") ? "Pendente" : "";?>
		<?= ($trabalho->getSTATUS()=="7") ? "Reavaliação do Presidente" : "";?>
		<?= ($trabalho->getSTATUS()=="8") ? "Aceito" : "";?>
		<?= ($trabalho->getSTATUS()=="9") ? "Rejeitado" : "";?>
	 
    </td>
    <td class="gridLineEven"><?= date("d/m/Y H:m",strtotime($trabalho->getDATA())) ?>&nbsp;</td>
    <td class="gridLineEven"><a href="trabalho_avaliacao_list.php?trab_id=<?= $trabalho->getID() ?>">Avaliações</a>&nbsp;</td>
    <td class="gridLineEven"><a href="trabalho_view.php?id=<?= $trabalho->getID() ?>">Visualizar</a>&nbsp;</td>
    <td class="gridLineEven"><a href="trabalho_edit.php?id=<?= $trabalho->getID() ?>">Editar</a>&nbsp;</td>
    <td class="gridLineEven"><a href="trabalho_delete_xp.php?trab_id=<?= $trabalho->getID() ?>" onClick="return confirm('Você tem certeza que deseja excluir?\n(essa operação não pode ser desfeita)')">Excluir</a></td>
    <td class="gridLineEven">&nbsp;</td>
  </tr>
  
  <? }; ?>
    
	<? }?>
	
	<? } else {
	//////////////////////////////////////////////////////////////////////
	       ////////////////////////////// end listagem por idade  ////////////////////
	?>
  <? for ($i = 0; $i < count($trabalhoList); $i++) {
		/* @var $trabalho Trabalho */
		$trabalho = $trabalhoList[$i]; ?>
  <tr>
    <td class="gridLineEven">&nbsp;</td>
    <td class="gridLineEven"><?= $trabalho->getID() ?>&nbsp;</td>
    <td class="gridLineEven"><?= $trabalho->getTITULO() ?>&nbsp;</td>
	 <td class="gridLineEven"><?= $trabalho->getOBS() ?>&nbsp;</td>
	
	
    <td class="gridLineEven">
    	<?= ($trabalho->getAREA()==0) ? "Não Definida" : "";?>
    	<?= ($trabalho->getAREA()==1) ? $eventoConfiguracaoXMLAtual->getTrabalhoArea1PT() : "";?>
    	<?= ($trabalho->getAREA()==2) ? $eventoConfiguracaoXMLAtual->getTrabalhoArea2PT() : "";?>
    	<?= ($trabalho->getAREA()==3) ? $eventoConfiguracaoXMLAtual->getTrabalhoArea3PT() : "";?>
    	<?= ($trabalho->getAREA()==4) ? $eventoConfiguracaoXMLAtual->getTrabalhoArea4PT() : "";?>
    	<?= ($trabalho->getAREA()==5) ? $eventoConfiguracaoXMLAtual->getTrabalhoArea5PT() : "";?>
    	<?= ($trabalho->getAREA()==6) ? $eventoConfiguracaoXMLAtual->getTrabalhoArea6PT() : "";?>
    	<?= ($trabalho->getAREA()==7) ? $eventoConfiguracaoXMLAtual->getTrabalhoArea7PT() : "";?>
    	<?= ($trabalho->getAREA()==8) ? $eventoConfiguracaoXMLAtual->getTrabalhoArea8PT() : "";?>
    	<?= ($trabalho->getAREA()==9) ? $eventoConfiguracaoXMLAtual->getTrabalhoArea9PT() : "";?>
    	<?= ($trabalho->getAREA()==10) ? $eventoConfiguracaoXMLAtual->getTrabalhoArea10PT() : "";?>
    	<?= ($trabalho->getAREA()==11) ? $eventoConfiguracaoXMLAtual->getTrabalhoArea11PT() : "";?>
    	<?= ($trabalho->getAREA()==12) ? $eventoConfiguracaoXMLAtual->getTrabalhoArea12PT() : "";?>
    	<?= ($trabalho->getAREA()==13) ? $eventoConfiguracaoXMLAtual->getTrabalhoArea13PT() : "";?>
    	<?= ($trabalho->getAREA()==14) ? $eventoConfiguracaoXMLAtual->getTrabalhoArea14PT() : "";?>
    	<?= ($trabalho->getAREA()==15) ? $eventoConfiguracaoXMLAtual->getTrabalhoArea15PT() : "";?>
    	<?= ($trabalho->getAREA()==16) ? $eventoConfiguracaoXMLAtual->getTrabalhoArea16PT() : "";?>
    	<?= ($trabalho->getAREA()==17) ? $eventoConfiguracaoXMLAtual->getTrabalhoArea17PT() : "";?>
    	<?= ($trabalho->getAREA()==18) ? $eventoConfiguracaoXMLAtual->getTrabalhoArea18PT() : "";?>
    	<?= ($trabalho->getAREA()==19) ? $eventoConfiguracaoXMLAtual->getTrabalhoArea19PT() : "";?>
    	<?= ($trabalho->getAREA()==20) ? $eventoConfiguracaoXMLAtual->getTrabalhoArea20PT() : "";?>
    </td>    
    <td class="gridLineEven"><?= $trabalho->getAPRES_NOME() ?>&nbsp;</td>
    <td class="gridLineEven">
	   <? if ($eventoAtual->getID() == 54 ) { ?>
	   
	      <?= ($trabalho->getSTATUS()=="0") ? "Novo" : "";?>
	<?= ($trabalho->getSTATUS()=="9") ? "Não Aceitavel" : "";?>
		
		
		   <?= ($trabalho->getSTATUS()=="7") ? "Aceitavel" : "";?>
		
		<?= ($trabalho->getSTATUS()=="8") ? "Bom" : "";?>
		<?= ($trabalho->getSTATUS()=="10") ? "Muito Bom" : "";?>
		<?= ($trabalho->getSTATUS()=="11") ? "Excelente" : "";?>
		
		   
         
		<? } else {?>
		<?= ($trabalho->getSTATUS()=="0") ? "Novo" : "";?>
		<?= ($trabalho->getSTATUS()=="2") ? "Em Revisão" : "";?>
		<?= ($trabalho->getSTATUS()=="4") ? "Pendente" : "";?>
		<? if ($eventoAtual->getID()== 32 || $eventoAtual->getID()== 52 ) { ?>
		   <?= ($trabalho->getSTATUS()=="7") ? "Reavaliação do Presidente" : "";?>
		<? }else{?>
		   <?= ($trabalho->getSTATUS()=="7") ? "Aceito com Restrições" : "";?>
		<? }?>
		<?= ($trabalho->getSTATUS()=="8") ? "Aceito" : "";?>
		<?= ($trabalho->getSTATUS()=="9") ? "Rejeitado" : "";?>
	  <? }?>
    </td>
    <td class="gridLineEven"><?= date("d/m/Y H:m",strtotime($trabalho->getDATA())) ?>&nbsp;</td>
    <td class="gridLineEven"><a href="trabalho_avaliacao_list.php?trab_id=<?= $trabalho->getID() ?>">Avaliações</a>&nbsp;</td>
    <td class="gridLineEven"><a href="trabalho_view.php?id=<?= $trabalho->getID() ?>">Visualizar</a>&nbsp;</td>
    <td class="gridLineEven"><a href="trabalho_edit.php?id=<?= $trabalho->getID() ?>">Editar</a>&nbsp;</td>
    <td class="gridLineEven"><a href="trabalho_delete_xp.php?trab_id=<?= $trabalho->getID() ?>" onClick="return confirm('Você tem certeza que deseja excluir?\n(essa operação não pode ser desfeita)')">Excluir</a></td>
    <td class="gridLineEven">&nbsp;</td>
  </tr>
  <? }; ?>
 <? }?>
  </tbody>
</table>
</div>

	

<?
  
include_once("struct/struct_bottom.php")?>
<? } ?>