<? include_once("struct/auth.php")?>
<?
if (!session_is_registered("evento")) { 
	header("Location: session_seleciona_evento.php?url=inscricao_list.php&orga_id=0&configurado=1");
} else {
	
$print = $_REQUEST["print"];
	
if ($print == "true") {
	include_once("struct/struct_print.php");
} else {
	include_once("struct/struct_top.php");
}
include_once('../classes/class.inscricao.php');
include_once('../classes/service.inscricao.php');

if ($_REQUEST["order_by"]) {
	$order_by = $_REQUEST["order_by"];
} else {
	$order_by = "INSC_NOME ASC";
}


/* @var $eventoAtual Evento */
$inscricaoService = new InscricaoService();
$inscricaoList = $inscricaoService->listInscricoesByEventoFiltered($eventoAtual->getID(),$order_by,$_REQUEST["insc_nome"],$_REQUEST["insc_categoria"],$_REQUEST["insc_opcao"],$_REQUEST["insc_forma_pgto"],"",$_REQUEST["insc_status_pgto"],$_REQUEST["insc_org_nome"],"");

/* @var $usuarioAtual Usuario*/
/* @var $eventoConfiguracaoAtual Configuracao */
/* @var $eventoConfiguracaoXMLAtual ConfiguracaoXML */

?>
<div class="structTitle">Listar Eventos e Fotos "<?=$eventoAtual->getNOME()?>"</div>



<div class="gridContainer" id="tC" style="height:300px; width:100%;border:solid 1px #303030">
<table border="0" cellspacing="0" cellpadding="0" width="100%">
  <thead class="gridHeader">
  <tr class="gridHeader" style="top:expression(document.getElementById('tC').scrollTop);">
	<!--td class="gridHeader" width="2%">&nbsp;</td-->

	<td class="gridHeader" width="2%">&nbsp;</td>
   
	 <td width="52%" class="gridHeader">Titulo</td>
     <td width="27%" class="gridHeader">Data </td>
    
	 <td width="7%" class="gridHeader">Editar</td>
	<td width="9%" class="gridHeader">Excluir</td>
	<td class="gridHeader" width="2%">&nbsp;</td>
  </tr>
  </thead>
  <tbody>
  <?php

include ("conexao_teste.php");

//Consulta com a tabela
//Selecione tudo de nomedatabela em ordem crescente pelo nome 
$consulta=mysql_query("SELECT * FROM eventosfotos order by eventosfotos_data DESC"); 

?>
  <?
//Fazendo o looping para exibição de todos registros que contiverem em nomedatabela
while ($dados = mysql_fetch_array($consulta)) {
$id_eventosfotos=$dados['id_eventosfotos'];
$eventosfotos_titulo=$dados['eventosfotos_titulo'];
$eventosfotos_data=$dados['eventosfotos_data'];
$eventosfotos_corpo=$dados['eventosfotos_corpo'];
$eventosfotos_foto1=$dados['eventosfotos_foto1'];
$eventosfotos_foto2=$dados['eventosfotos_foto2'];
$eventosfotos_foto3=$dados['eventosfotos_foto3'];
$eventosfotos_foto4=$dados['eventosfotos_foto4'];
$eventosfotos_foto5=$dados['eventosfotos_foto5'];
$eventosfotos_foto6=$dados['eventosfotos_foto6'];
$eventosfotos_foto7=$dados['eventosfotos_foto7'];
$eventosfotos_foto8=$dados['eventosfotos_foto8'];
$eventosfotos_foto9=$dados['eventosfotos_foto9'];
$eventosfotos_foto10=$dados['eventosfotos_foto10'];
$eventosfotos_foto11=$dados['eventosfotos_foto11'];
$eventosfotos_foto12=$dados['eventosfotos_foto12'];
$eventosfotos_foto13=$dados['eventosfotos_foto13'];
$eventosfotos_foto14=$dados['eventosfotos_foto14'];
$eventosfotos_foto15=$dados['eventosfotos_foto15'];
$eventosfotos_foto16=$dados['eventosfotos_foto16'];
$eventosfotos_foto17=$dados['eventosfotos_foto17'];
$eventosfotos_foto18=$dados['eventosfotos_foto18'];
$eventosfotos_foto19=$dados['eventosfotos_foto19'];
$eventosfotos_foto20=$dados['eventosfotos_foto20'];

?>
  
 
  <tr>
   <td class="gridLineEven">&nbsp;
	  
	</td>
	<td class="gridLineEven">
	  <?= $eventosfotos_titulo?>
	</td>
    <td class="gridLineEven">
		<?= $eventosfotos_data?>
    </td>
   
   
    <td class="gridLineEven"><a href="eventosfotos_edit.php?id=<?=$id_eventosfotos;  ?>">Editar</a>&nbsp;</td>
   
    <td class="gridLineEven">&nbsp;<a href="eventosfotos_delete_xp2.php?id=<?=$id_eventosfotos;  ?>" onClick="return confirm('Você tem certeza que deseja excluir?\n(essa operação não pode ser desfeita)')">Excluir</a></td>
    <td class="gridLineEven">&nbsp;</td>
	<td width="1%" class="gridLineEven">&nbsp;	</td>
  </tr>
  <? } ?>
  </tbody>
</table>
</div>



<? include_once("struct/struct_bottom.php")?>
<? } ?>