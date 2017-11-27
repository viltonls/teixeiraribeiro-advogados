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
	include_once ( '../classes/service.avaliador.php' ) ;
	include_once ( '../classes/service.avaliacao.php' ) ;
	include_once ( '../classes/dto.avaliacao_avaliador.php' ) ;
	/* @var $eventoConfiguracaoXMLAtual ConfiguracaoXML */
	/* @var $eventoConfiguracaoAtual Configuracao */
	/* @var $eventoAtual Evento */
	$trabalhoService = new TrabalhoService() ;
	$trabalhoList = $trabalhoService->listTrabalhosFiltered( $eventoAtual->getID(), $_REQUEST["area"], $_REQUEST["status"], "DATA DESC" ) ;
	$trabalho = new Trabalho() ;
	$avaliador = new Avaliador() ;
	$avaliadorService = new AvaliadorService() ;
	$avaliacao = new Avaliacao() ;
	$avaliacaoService = new AvaliacaoService() ; ?>
<? if ($_GET['refresh'])
{
	include_once('../export/trabalhos_by_even_id.php') ;
	Trabalhos_by_even_id( 23, 24 ) ;
} ?>

<script language="JavaScript">
	function confirmEmail(){
	return confirm('Você tem certeza que deseja enviar os emails?\nOs autores serão notificados que foram selecionados para a apresentação oral.\nSó continue se todas os trabalhos já foram avaliados.\nDeseja continuar?');
	}
</script>
<? $trabalhoList = $trabalhoService->listTrabalhosFiltered( 23, $_REQUEST["area6"],8,'ID' ) ;
	if(count($trabalhoList)>0) 
	foreach ( $trabalhoList as $trabalho )
	{
		$avaliacaoTotal = 0 ;
		$avaliacaoAvaliadorList = $avaliacaoService->loadAvaliacaoAvaliadorFiltered( "", $trabalho->getID(), 8, 23 ) ;
		if(count($avaliacaoAvaliadorList)>0) 
		foreach ( $avaliacaoAvaliadorList as $nota )
		{
			$avaliacaoTotal += $nota->NOTA_A ;
			$avaliacaoTotal += $nota->NOTA_B ;
			$avaliacaoTotal += $nota->NOTA_C ;
			$avaliacaoTotal += $nota->NOTA_E ;
			$avaliacaoTotal += $nota->NOTA_D ;
		}
		if(count($avaliacaoAvaliadorList) > 0){
			$count = count($avaliacaoAvaliadorList);
		} else {
			$count = 1;
		}
//		$avaliacaoTotal = number_format( $avaliacaoTotal / $count,2,",",".");  
		$trabalhoRankingA[$trabalho->getID()] = $avaliacaoTotal/ $count ;

	}
	if(count($trabalhoRankingA)>0) 
	arsort( $trabalhoRankingA ) ; ?>
<div class="structTitle" id="dtA" onClick="ShowHideElement('6p')"> Ranking : Parcial (Critério 6 pontos) </div>
<div style="padding-top:8px;"></div>
<div id="6p" <?=  $_POST['area6'] || $_POST['opcao2_6'] ? '' : 'style="display: none"' ?>>
<table width="100%">
<tr>
<td align="left">
<form action="ranking_list.php" method="post">
	Filtrar por : Área Temática 
	<select class="structFilterBox" name="area6">
		<option value="">Todas</option>
		<? if ($eventoConfiguracaoXMLAtual->getTrabalhoArea1PT()) { ?>
		<option value="1" <?= ($_REQUEST["area6"]=="1") ? "selected" : "";?>><?= $eventoConfiguracaoXMLAtual->getTrabalhoArea1PT(); ?></option>
		<? } ?>	    
		<? if ($eventoConfiguracaoXMLAtual->getTrabalhoArea2PT()) { ?>
		<option value="2" <?= ($_REQUEST["area6"]=="2") ? "selected" : "";?>><?= $eventoConfiguracaoXMLAtual->getTrabalhoArea2PT(); ?></option>
		<? } ?>	    
		<? if ($eventoConfiguracaoXMLAtual->getTrabalhoArea3PT()) { ?>
		<option value="3" <?= ($_REQUEST["area6"]=="3") ? "selected" : "";?>><?= $eventoConfiguracaoXMLAtual->getTrabalhoArea3PT(); ?></option>
		<? } ?>	    
		<? if ($eventoConfiguracaoXMLAtual->getTrabalhoarea6PT()) { ?>
		<option value="4" <?= ($_REQUEST["area6"]=="4") ? "selected" : "";?>><?= $eventoConfiguracaoXMLAtual->getTrabalhoarea6PT(); ?></option>
		<? } ?>	    
		<? if ($eventoConfiguracaoXMLAtual->getTrabalhoArea5PT()) { ?>
		<option value="5" <?= ($_REQUEST["area6"]=="5") ? "selected" : "";?>><?= $eventoConfiguracaoXMLAtual->getTrabalhoArea5PT(); ?></option>
		<? } ?>	    
		<? if ($eventoConfiguracaoXMLAtual->getTrabalhoArea6PT()) { ?>
		<option value="6" <?= ($_REQUEST["area6"]=="6") ? "selected" : "";?>><?= $eventoConfiguracaoXMLAtual->getTrabalhoArea6PT(); ?></option>
		<? } ?>	    
		<? if ($eventoConfiguracaoXMLAtual->getTrabalhoArea7PT()) { ?>
		<option value="7" <?= ($_REQUEST["area6"]=="7") ? "selected" : "";?>><?= $eventoConfiguracaoXMLAtual->getTrabalhoArea7PT(); ?></option>
		<? } ?>	    
		<? if ($eventoConfiguracaoXMLAtual->getTrabalhoArea8PT()) { ?>
		<option value="8" <?= ($_REQUEST["area6"]=="8") ? "selected" : "";?>><?= $eventoConfiguracaoXMLAtual->getTrabalhoArea8PT(); ?></option>
		<? } ?>	    
		<? if ($eventoConfiguracaoXMLAtual->getTrabalhoArea9PT()) { ?>
		<option value="9" <?= ($_REQUEST["area6"]=="9") ? "selected" : "";?>><?= $eventoConfiguracaoXMLAtual->getTrabalhoArea9PT(); ?></option>
		<? } ?>	    
		<? if ($eventoConfiguracaoXMLAtual->getTrabalhoArea10PT()) { ?>
		<option value="10" <?= ($_REQUEST["area6"]=="10") ? "selected" : "";?>><?= $eventoConfiguracaoXMLAtual->getTrabalhoArea10PT(); ?></option>
		<? } ?>	    
		<? if ($eventoConfiguracaoXMLAtual->getTrabalhoArea11PT()) { ?>
		<option value="11" <?= ($_REQUEST["area6"]=="11") ? "selected" : "";?>><?= $eventoConfiguracaoXMLAtual->getTrabalhoArea11PT(); ?></option>
		<? } ?>	    
		<? if ($eventoConfiguracaoXMLAtual->getTrabalhoArea12PT()) { ?>
		<option value="12" <?= ($_REQUEST["area6"]=="12") ? "selected" : "";?>><?= $eventoConfiguracaoXMLAtual->getTrabalhoArea12PT(); ?></option>
		<? } ?>	    
		<? if ($eventoConfiguracaoXMLAtual->getTrabalhoArea13PT()) { ?>
		<option value="13" <?= ($_REQUEST["area6"]=="13") ? "selected" : "";?>><?= $eventoConfiguracaoXMLAtual->getTrabalhoArea13PT(); ?></option>
		<? } ?>	    
		<? if ($eventoConfiguracaoXMLAtual->getTrabalhoArea14PT()) { ?>
		<option value="14" <?= ($_REQUEST["area6"]=="14") ? "selected" : "";?>><?= $eventoConfiguracaoXMLAtual->getTrabalhoArea14PT(); ?></option>
		<? } ?>	    
		<? if ($eventoConfiguracaoXMLAtual->getTrabalhoArea15PT()) { ?>
		<option value="15" <?= ($_REQUEST["area6"]=="15") ? "selected" : "";?>><?= $eventoConfiguracaoXMLAtual->getTrabalhoArea15PT(); ?></option>
		<? } ?>	    
		<? if ($eventoConfiguracaoXMLAtual->getTrabalhoArea16PT()) { ?>
		<option value="16" <?= ($_REQUEST["area6"]=="16") ? "selected" : "";?>><?= $eventoConfiguracaoXMLAtual->getTrabalhoArea16PT(); ?></option>
		<? } ?>	    
		<? if ($eventoConfiguracaoXMLAtual->getTrabalhoArea17PT()) { ?>
		<option value="17" <?= ($_REQUEST["area6"]=="17") ? "selected" : "";?>><?= $eventoConfiguracaoXMLAtual->getTrabalhoArea17PT(); ?></option>
		<? } ?>	    
		<? if ($eventoConfiguracaoXMLAtual->getTrabalhoArea18PT()) { ?>
		<option value="18" <?= ($_REQUEST["area6"]=="18") ? "selected" : "";?>><?= $eventoConfiguracaoXMLAtual->getTrabalhoArea18PT(); ?></option>
		<? } ?>	    
		<? if ($eventoConfiguracaoXMLAtual->getTrabalhoArea19PT()) { ?>
		<option value="19" <?= ($_REQUEST["area6"]=="19") ? "selected" : "";?>><?= $eventoConfiguracaoXMLAtual->getTrabalhoArea19PT(); ?></option>
		<? } ?>	    
		<? if ($eventoConfiguracaoXMLAtual->getTrabalhoArea20PT()) { ?>
		<option value="20" <?= ($_REQUEST["area6"]=="20") ? "selected" : "";?>><?= $eventoConfiguracaoXMLAtual->getTrabalhoArea20PT(); ?></option>
		<? } ?>
	</select>&nbsp; 
	Categoria <select size="1" class="structFilterBox" name="opcao2_6">
		<option value="">Todos</option>
		<option value="Graduação" <?= $_REQUEST['opcao2_6'] == 'Graduação' ? 'selected' : '' ?>>Graduação</option>
		<option value="Pós-graduação" <?= $_REQUEST['opcao2_6'] == 'Pós-graduação' ? 'selected' : '' ?>>Pós-graduação</option>
		<option value="Profissional" <?= $_REQUEST['opcao2_6'] == 'Profissional' ? 'selected' : '' ?>>Profissional</option>
	</select>
	<button type="submit" class="structFilterButton">Filtrar</button>
</form>
</td>
<td align="right">
<form action="ranking_enviar_email.php" method="post" onSubmit="return confirmEmail()">
	Notificar os 30 primeiros colocados de cada categoria &nbsp;&nbsp; 
	<button type="submit" class="structFilterButton">Enviar</button>
</form>
</td>
</tr>
</table>


<!-- Grid de Listagem -->
<div class="gridContainer" id="tC" style="height:300px; width:100%;border:solid 1px #303030">
  <table border="0" cellspacing="0" cellpadding="0" width="100%">
    <thead class="gridHeader">
      <tr class="gridHeader" style="top:expression(document.getElementById('tC').scrollTop);">
        <td class="gridHeader" width="2%">&nbsp;</td>
        <td class="gridHeader">Posição</td>
        <!-- <td class="gridHeader">ID</td> -->
        <td class="gridHeader">Titulo</td>
        <td class="gridHeader">Área Temática</td>
        <!-- <td class="gridHeader">Apresentador</td> -->
        <td class="gridHeader">Categoria</td>
        <td class="gridHeader">Pontuação</td>
      </tr>
    </thead>
    <tbody>
      <? $i = 0 ;
	if(count($trabalhoRankingA)>0) 
	foreach ( $trabalhoRankingA as $trab_id => $nota_final )
	{
		$trabalho = $trabalhoService->loadTrabalhoById( $trab_id, 23 ) ;
		if ( $_POST['opcao2_6'] )
		{
			if ( $trabalho->getOPCAO2() <> $_POST['opcao2_6'] )
			{
				continue ;
			}
		} 
		 ?>
      <tr>
        <td class="gridLineEven">&nbsp;</td>
        <td class="gridLineEven">
          <? $i++ ;
		echo $i ; ?>º
&nbsp;</td>
        <td class="gridLineEven">
          <?= $trabalho->getTITULO() ?>
&nbsp;</td>
        <td class="gridLineEven">
          <?= ( $trabalho->getAREA() == 0 ) ? "Não Definida" : "" ; ?>
          <?= ( $trabalho->getAREA() == 1 ) ? $eventoConfiguracaoXMLAtual->getTrabalhoArea1PT() : "" ; ?>
          <?= ( $trabalho->getAREA() == 2 ) ? $eventoConfiguracaoXMLAtual->getTrabalhoArea2PT() : "" ; ?>
          <?= ( $trabalho->getAREA() == 3 ) ? $eventoConfiguracaoXMLAtual->getTrabalhoArea3PT() : "" ; ?>
          <?= ( $trabalho->getAREA() == 4 ) ? $eventoConfiguracaoXMLAtual->getTrabalhoArea4PT() : "" ; ?>
          <?= ( $trabalho->getAREA() == 5 ) ? $eventoConfiguracaoXMLAtual->getTrabalhoArea5PT() : "" ; ?>
          <?= ( $trabalho->getAREA() == 6 ) ? $eventoConfiguracaoXMLAtual->getTrabalhoArea6PT() : "" ; ?>
          <?= ( $trabalho->getAREA() == 7 ) ? $eventoConfiguracaoXMLAtual->getTrabalhoArea7PT() : "" ; ?>
          <?= ( $trabalho->getAREA() == 8 ) ? $eventoConfiguracaoXMLAtual->getTrabalhoArea8PT() : "" ; ?>
          <?= ( $trabalho->getAREA() == 9 ) ? $eventoConfiguracaoXMLAtual->getTrabalhoArea9PT() : "" ; ?>
          <?= ( $trabalho->getAREA() == 10 ) ? $eventoConfiguracaoXMLAtual->getTrabalhoArea10PT() : "" ; ?>
          <?= ( $trabalho->getAREA() == 11 ) ? $eventoConfiguracaoXMLAtual->getTrabalhoArea11PT() : "" ; ?>
          <?= ( $trabalho->getAREA() == 12 ) ? $eventoConfiguracaoXMLAtual->getTrabalhoArea12PT() : "" ; ?>
          <?= ( $trabalho->getAREA() == 13 ) ? $eventoConfiguracaoXMLAtual->getTrabalhoArea13PT() : "" ; ?>
          <?= ( $trabalho->getAREA() == 14 ) ? $eventoConfiguracaoXMLAtual->getTrabalhoArea14PT() : "" ; ?>
          <?= ( $trabalho->getAREA() == 15 ) ? $eventoConfiguracaoXMLAtual->getTrabalhoArea15PT() : "" ; ?>
          <?= ( $trabalho->getAREA() == 16 ) ? $eventoConfiguracaoXMLAtual->getTrabalhoArea16PT() : "" ; ?>
          <?= ( $trabalho->getAREA() == 17 ) ? $eventoConfiguracaoXMLAtual->getTrabalhoArea17PT() : "" ; ?>
          <?= ( $trabalho->getAREA() == 18 ) ? $eventoConfiguracaoXMLAtual->getTrabalhoArea18PT() : "" ; ?>
          <?= ( $trabalho->getAREA() == 19 ) ? $eventoConfiguracaoXMLAtual->getTrabalhoArea19PT() : "" ; ?>
          <?= ( $trabalho->getAREA() == 20 ) ? $eventoConfiguracaoXMLAtual->getTrabalhoArea20PT() : "" ; ?>
        </td>
        <!-- <td class="gridLineEven">
          <?= $trabalho->getAUTOR1_NOME() ?> &nbsp;
        </td>
        -->
        <td class="gridLineEven">
        <? if($trabalho->getOPCAO2()!=null){ echo $trabalho->getOPCAO2(); } else { echo "&nbsp";} ?>
        </td>
		<td class="gridLineEven">
        <?= $nota_final ?>
        </td>
      </tr>
      <? } ?>
    </tbody>
  </table>
</div>
</div>

<div style="padding-top:8px;"></div>
<div style="padding-top:8px;"></div>

<? $trabalhoList = $trabalhoService->listTrabalhosFiltered( 24, $_REQUEST["area4"],"",'ID' ) ;
	if(count($trabalhoList)>0)
	foreach ( $trabalhoList as $trabalho )
	{
		$avaliacaoTotal = 0 ;
		$avaliacaoAvaliadorList = $avaliacaoService->loadAvaliacaoAvaliadorFiltered( "", $trabalho->getID(), "", 24 ) ;
		if(count($avaliacaoAvaliadorList)>0)
		foreach ( $avaliacaoAvaliadorList as $nota )
		{
			$avaliacaoTotal += $nota->NOTA_A ;
			$avaliacaoTotal += $nota->NOTA_B ;
		}
		if(count($avaliacaoAvaliadorList) > 0){
			$count = count($avaliacaoAvaliadorList);
		} else {
			$count = 1;
		}
		//$avaliacaoTotal = number_format( $avaliacaoTotal / $count,2,",",".");  
		$trabalhoRankingB[$trabalho->getID()] = $avaliacaoTotal / $count ;
//		$avaliacaoTotal = 0 ;
	}
	if(count($trabalhoRankingB)>0)
	foreach ( $trabalhoRankingB as $id => $nt )
	{
		$trabalhoRankingAB[$id] = $trabalhoRankingA[$id] + $nt ;
	}
	if(count($trabalhoRankingAB)>0)
	arsort( $trabalhoRankingAB ) ; ?>

<div class="structTitle" id="dtB" onClick="ShowHideElement('10p')"> Ranking : Final (Critério 10 pontos)</div>

<div style="padding-top:8px;"></div>
<div id="10p" <?=  $_POST['area4'] || $_POST['opcao2'] ? '' : 'style="display: none"' ?>>
<table width="100%">
<tr>
<td align="left">
<form action="ranking_list.php" method="post">
	Filtrar por : Área Temática 
	<select class="structFilterBox" name="area4">
		<option value="">Todas</option>
		<? if ($eventoConfiguracaoXMLAtual->getTrabalhoArea1PT()) { ?>
		<option value="1" <?= ($_REQUEST["area4"]=="1") ? "selected" : "";?>><?= $eventoConfiguracaoXMLAtual->getTrabalhoArea1PT(); ?></option>
		<? } ?>	    
		<? if ($eventoConfiguracaoXMLAtual->getTrabalhoArea2PT()) { ?>
		<option value="2" <?= ($_REQUEST["area4"]=="2") ? "selected" : "";?>><?= $eventoConfiguracaoXMLAtual->getTrabalhoArea2PT(); ?></option>
		<? } ?>	    
		<? if ($eventoConfiguracaoXMLAtual->getTrabalhoArea3PT()) { ?>
		<option value="3" <?= ($_REQUEST["area4"]=="3") ? "selected" : "";?>><?= $eventoConfiguracaoXMLAtual->getTrabalhoArea3PT(); ?></option>
		<? } ?>	    
		<? if ($eventoConfiguracaoXMLAtual->getTrabalhoArea4PT()) { ?>
		<option value="4" <?= ($_REQUEST["area4"]=="4") ? "selected" : "";?>><?= $eventoConfiguracaoXMLAtual->getTrabalhoArea4PT(); ?></option>
		<? } ?>	    
		<? if ($eventoConfiguracaoXMLAtual->getTrabalhoArea5PT()) { ?>
		<option value="5" <?= ($_REQUEST["area4"]=="5") ? "selected" : "";?>><?= $eventoConfiguracaoXMLAtual->getTrabalhoArea5PT(); ?></option>
		<? } ?>	    
		<? if ($eventoConfiguracaoXMLAtual->getTrabalhoArea6PT()) { ?>
		<option value="6" <?= ($_REQUEST["area4"]=="6") ? "selected" : "";?>><?= $eventoConfiguracaoXMLAtual->getTrabalhoArea6PT(); ?></option>
		<? } ?>	    
		<? if ($eventoConfiguracaoXMLAtual->getTrabalhoArea7PT()) { ?>
		<option value="7" <?= ($_REQUEST["area4"]=="7") ? "selected" : "";?>><?= $eventoConfiguracaoXMLAtual->getTrabalhoArea7PT(); ?></option>
		<? } ?>	    
		<? if ($eventoConfiguracaoXMLAtual->getTrabalhoArea8PT()) { ?>
		<option value="8" <?= ($_REQUEST["area4"]=="8") ? "selected" : "";?>><?= $eventoConfiguracaoXMLAtual->getTrabalhoArea8PT(); ?></option>
		<? } ?>	    
		<? if ($eventoConfiguracaoXMLAtual->getTrabalhoArea9PT()) { ?>
		<option value="9" <?= ($_REQUEST["area4"]=="9") ? "selected" : "";?>><?= $eventoConfiguracaoXMLAtual->getTrabalhoArea9PT(); ?></option>
		<? } ?>	    
		<? if ($eventoConfiguracaoXMLAtual->getTrabalhoArea10PT()) { ?>
		<option value="10" <?= ($_REQUEST["area4"]=="10") ? "selected" : "";?>><?= $eventoConfiguracaoXMLAtual->getTrabalhoArea10PT(); ?></option>
		<? } ?>	    
		<? if ($eventoConfiguracaoXMLAtual->getTrabalhoArea11PT()) { ?>
		<option value="11" <?= ($_REQUEST["area4"]=="11") ? "selected" : "";?>><?= $eventoConfiguracaoXMLAtual->getTrabalhoArea11PT(); ?></option>
		<? } ?>	    
		<? if ($eventoConfiguracaoXMLAtual->getTrabalhoArea12PT()) { ?>
		<option value="12" <?= ($_REQUEST["area4"]=="12") ? "selected" : "";?>><?= $eventoConfiguracaoXMLAtual->getTrabalhoArea12PT(); ?></option>
		<? } ?>	    
		<? if ($eventoConfiguracaoXMLAtual->getTrabalhoArea13PT()) { ?>
		<option value="13" <?= ($_REQUEST["area4"]=="13") ? "selected" : "";?>><?= $eventoConfiguracaoXMLAtual->getTrabalhoArea13PT(); ?></option>
		<? } ?>	    
		<? if ($eventoConfiguracaoXMLAtual->getTrabalhoArea14PT()) { ?>
		<option value="14" <?= ($_REQUEST["area4"]=="14") ? "selected" : "";?>><?= $eventoConfiguracaoXMLAtual->getTrabalhoArea14PT(); ?></option>
		<? } ?>	    
		<? if ($eventoConfiguracaoXMLAtual->getTrabalhoArea15PT()) { ?>
		<option value="15" <?= ($_REQUEST["area4"]=="15") ? "selected" : "";?>><?= $eventoConfiguracaoXMLAtual->getTrabalhoArea15PT(); ?></option>
		<? } ?>	    
		<? if ($eventoConfiguracaoXMLAtual->getTrabalhoArea16PT()) { ?>
		<option value="16" <?= ($_REQUEST["area4"]=="16") ? "selected" : "";?>><?= $eventoConfiguracaoXMLAtual->getTrabalhoArea16PT(); ?></option>
		<? } ?>	    
		<? if ($eventoConfiguracaoXMLAtual->getTrabalhoArea17PT()) { ?>
		<option value="17" <?= ($_REQUEST["area4"]=="17") ? "selected" : "";?>><?= $eventoConfiguracaoXMLAtual->getTrabalhoArea17PT(); ?></option>
		<? } ?>	    
		<? if ($eventoConfiguracaoXMLAtual->getTrabalhoArea18PT()) { ?>
		<option value="18" <?= ($_REQUEST["area4"]=="18") ? "selected" : "";?>><?= $eventoConfiguracaoXMLAtual->getTrabalhoArea18PT(); ?></option>
		<? } ?>	    
		<? if ($eventoConfiguracaoXMLAtual->getTrabalhoArea19PT()) { ?>
		<option value="19" <?= ($_REQUEST["area4"]=="19") ? "selected" : "";?>><?= $eventoConfiguracaoXMLAtual->getTrabalhoArea19PT(); ?></option>
		<? } ?>	    
		<? if ($eventoConfiguracaoXMLAtual->getTrabalhoArea20PT()) { ?>
		<option value="20" <?= ($_REQUEST["area4"]=="20") ? "selected" : "";?>><?= $eventoConfiguracaoXMLAtual->getTrabalhoArea20PT(); ?></option>
		<? } ?>
	</select>&nbsp; 
	Categoria <select size="1" class="structFilterBox" name="opcao2">
		<option value="">Todos</option>
		<option value="Graduação" <?= $_REQUEST['opcao2'] == 'Graduação' ? 'selected' : '' ?>>Graduação</option>
		<option value="Profissional Sócio" <?= $_REQUEST['opcao2'] == 'Profissional Sócio' ? 'selected' : '' ?>>Profissional Sócio</option>
		<option value="Profissional Não Sócio" <?= $_REQUEST['opcao2'] == 'Profissional Não Sócio' ? 'selected' : '' ?>>Profissional Não Sócio</option>
	</select>
	<button type="submit" class="structFilterButton">Filtrar</button>
</form>
</td>
<td align="right">
<form action="ranking_enviar_email2.php" method="post" onSubmit="return confirmEmail()">
	Notificar os 91 primeiros colocados de cada categoria &nbsp;&nbsp; 
	<button type="submit" class="structFilterButton">Enviar</button>
</form>
</td>
</tr>
</table>

<!-- Grid de Listagem -->
<div class="gridContainer" id="tC" style="height:300px; width:100%;border:solid 1px #303030">
  <table border="0" cellspacing="0" cellpadding="0" width="100%">
    <thead class="gridHeader">
      <tr class="gridHeader" style="top:expression(document.getElementById('tC').scrollTop);">
        <td class="gridHeader" width="2%">&nbsp;</td>
        <td class="gridHeader">Posição</td>
        <!-- <td class="gridHeader">ID</td> -->
        <td class="gridHeader">Titulo</td>
        <td class="gridHeader">Área Temática</td>
        <!-- <td class="gridHeader">Apresentador</td> -->
        <td class="gridHeader">Categoria</td>
        <td class="gridHeader">Pontuação</td>
      </tr>
    </thead>
    <tbody>
      <? $i = 0 ;
	if(count($trabalhoRankingAB)>0)
	foreach ( $trabalhoRankingAB as $trab_id => $nota_final )
	{
		$trabalho = $trabalhoService->loadTrabalhoById( $trab_id, 24 ) ;
		if ( $_POST['opcao2'] )
		{
			if ( $trabalho->getOPCAO2() <> $_POST['opcao2'] )
			{
				continue ;
			}
		} ?>
      <tr>
        <td class="gridLineEven">&nbsp;</td>
        <td class="gridLineEven">
          <? $i++ ;
		echo $i ; ?>º
&nbsp;</td>
        <td class="gridLineEven">
          <?= $trabalho->getTITULO() ?>
&nbsp;</td>
        <td class="gridLineEven">
          <?= ( $trabalho->getAREA() == 0 ) ? "Não Definida" : "" ; ?>
          <?= ( $trabalho->getAREA() == 1 ) ? $eventoConfiguracaoXMLAtual->getTrabalhoArea1PT() : "" ; ?>
          <?= ( $trabalho->getAREA() == 2 ) ? $eventoConfiguracaoXMLAtual->getTrabalhoArea2PT() : "" ; ?>
          <?= ( $trabalho->getAREA() == 3 ) ? $eventoConfiguracaoXMLAtual->getTrabalhoArea3PT() : "" ; ?>
          <?= ( $trabalho->getAREA() == 4 ) ? $eventoConfiguracaoXMLAtual->getTrabalhoArea4PT() : "" ; ?>
          <?= ( $trabalho->getAREA() == 5 ) ? $eventoConfiguracaoXMLAtual->getTrabalhoArea5PT() : "" ; ?>
          <?= ( $trabalho->getAREA() == 6 ) ? $eventoConfiguracaoXMLAtual->getTrabalhoArea6PT() : "" ; ?>
          <?= ( $trabalho->getAREA() == 7 ) ? $eventoConfiguracaoXMLAtual->getTrabalhoArea7PT() : "" ; ?>
          <?= ( $trabalho->getAREA() == 8 ) ? $eventoConfiguracaoXMLAtual->getTrabalhoArea8PT() : "" ; ?>
          <?= ( $trabalho->getAREA() == 9 ) ? $eventoConfiguracaoXMLAtual->getTrabalhoArea9PT() : "" ; ?>
          <?= ( $trabalho->getAREA() == 10 ) ? $eventoConfiguracaoXMLAtual->getTrabalhoArea10PT() : "" ; ?>
          <?= ( $trabalho->getAREA() == 11 ) ? $eventoConfiguracaoXMLAtual->getTrabalhoArea11PT() : "" ; ?>
          <?= ( $trabalho->getAREA() == 12 ) ? $eventoConfiguracaoXMLAtual->getTrabalhoArea12PT() : "" ; ?>
          <?= ( $trabalho->getAREA() == 13 ) ? $eventoConfiguracaoXMLAtual->getTrabalhoArea13PT() : "" ; ?>
          <?= ( $trabalho->getAREA() == 14 ) ? $eventoConfiguracaoXMLAtual->getTrabalhoArea14PT() : "" ; ?>
          <?= ( $trabalho->getAREA() == 15 ) ? $eventoConfiguracaoXMLAtual->getTrabalhoArea15PT() : "" ; ?>
          <?= ( $trabalho->getAREA() == 16 ) ? $eventoConfiguracaoXMLAtual->getTrabalhoArea16PT() : "" ; ?>
          <?= ( $trabalho->getAREA() == 17 ) ? $eventoConfiguracaoXMLAtual->getTrabalhoArea17PT() : "" ; ?>
          <?= ( $trabalho->getAREA() == 18 ) ? $eventoConfiguracaoXMLAtual->getTrabalhoArea18PT() : "" ; ?>
          <?= ( $trabalho->getAREA() == 19 ) ? $eventoConfiguracaoXMLAtual->getTrabalhoArea19PT() : "" ; ?>
          <?= ( $trabalho->getAREA() == 20 ) ? $eventoConfiguracaoXMLAtual->getTrabalhoArea20PT() : "" ; ?>
        </td>
        <!-- <td class="gridLineEven">
          <?= $trabalho->getAUTOR1_NOME() ?> &nbsp;
        </td>
        -->
        <td class="gridLineEven">
        <? if($trabalho->getOPCAO2()!=null){ echo $trabalho->getOPCAO2(); } else { echo "&nbsp";} ?>
        </td>
		<td class="gridLineEven">
        <?= $nota_final ?>
        </td>
      </tr>
      <? } ?>
    </tbody>
  </table>
</div>
</div>

<p><a href="ranking_list?refresh=true">Atualizar importação</a></p>
<? include_once ( "struct/struct_bottom.php" ) ?>
<? } ?>
