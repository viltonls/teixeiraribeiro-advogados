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

//if ($_REQUEST["order_by"]) {
	//$order_by = $_REQUEST["order_by"];
//} else {
	//$order_by = "INSC_NOME ASC";
//}


/* @var $eventoAtual Evento */
//$inscricaoService = new InscricaoService();
//$inscricaoList = $inscricaoService->listInscricoesByEventoFiltered($eventoAtual->getID(),$order_by,$_REQUEST["insc_nome"],$_REQUEST["insc_categoria"],$_REQUEST["insc_opcao"],$_REQUEST["insc_forma_pgto"],"",$_REQUEST["insc_status_pgto"],$_REQUEST["insc_org_nome"],"");

/* @var $usuarioAtual Usuario*/
/* @var $eventoConfiguracaoAtual Configuracao */
/* @var $eventoConfiguracaoXMLAtual ConfiguracaoXML */

?>
<div class="structTitle">Listar Membros da Equipe em Italiano</div>



<div class="gridContainer" id="tC" style="height:300px; width:100%;border:solid 1px #303030">
<table border="0" cellspacing="0" cellpadding="0" width="100%">
  <thead class="gridHeader">
  <tr class="gridHeader" style="top:expression(document.getElementById('tC').scrollTop);">
	<!--td class="gridHeader" width="2%">&nbsp;</td-->

	<td class="gridHeader" width="2%">&nbsp;</td>
   
	 <td width="79%" class="gridHeader">Nome</td>
    
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
$consulta=mysql_query("SELECT * FROM equipe_ita order by id_equipe ASC"); 

?>
  <?
//Fazendo o looping para exibição de todos registros que contiverem em nomedatabela
while ($dados = mysql_fetch_array($consulta)) {
$id_equipe=$dados['id_equipe'];
$equipe_nome=$dados['equipe_nome'];
$equipe_curriculo=$dados['equipe_curriculo'];
$equipe_area=$dados['equipe_area'];
$equipe_idioma=$dados['equipe_idioma'];
$equipe_email=$dados['equipe_email'];
$equipe_socio=$dados['equipe_socio'];

?>
  
 
  <tr>
   <td class="gridLineEven">&nbsp;
	  
	</td>
	<td class="gridLineEven">
	  <?= $equipe_nome?>
	</td>
   
   
    <td class="gridLineEven"><a href="equipeita_edit.php?id=<?= $id_equipe;  ?>">Editar</a>&nbsp;</td>
   
    <td class="gridLineEven">&nbsp;<a href="equipeita_delete_xp2.php?id=<?= $id_equipe;  ?>" onClick="return confirm('Você tem certeza que deseja excluir?\n(essa operação não pode ser desfeita)')">Excluir</a></td>
    <td class="gridLineEven">&nbsp;</td>
	<td width="1%" class="gridLineEven">&nbsp;	</td>
  </tr>
  <? } ?>
  </tbody>
</table>
</div>



<? include_once("struct/struct_bottom.php")?>
<? } ?>