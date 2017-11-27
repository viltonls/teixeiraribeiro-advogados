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
<div class="structTitle">Listar Receitas "<?=$eventoAtual->getNOME()?>"</div>



<div class="gridContainer" id="tC" style="height:300px; width:100%;border:solid 1px #303030">
<table border="0" cellspacing="0" cellpadding="0" width="100%">
  <thead class="gridHeader">
  <tr class="gridHeader" style="top:expression(document.getElementById('tC').scrollTop);">
	<!--td class="gridHeader" width="2%">&nbsp;</td-->

	<td class="gridHeader" width="2%">&nbsp;</td>
    <td class="gridHeader">ID</td>
	 <td class="gridHeader">Titulo da Receita </td>
     <td class="gridHeader">Receita</td>
    
	<td class="gridHeader">Editar</td>
	<td class="gridHeader">Excluir</td>
	<td class="gridHeader" width="2%">&nbsp;</td>
  </tr>
  </thead>
  <tbody>
  <?php

include ("conexao_teste.php");

//Consulta com a tabela
//Selecione tudo de nomedatabela em ordem crescente pelo nome 
$consulta=mysql_query("SELECT * FROM receitas order by id_receitas ASC"); 

?>
  <?
//Fazendo o looping para exibição de todos registros que contiverem em nomedatabela
while ($dados = mysql_fetch_array($consulta)) {
$id_receitas=$dados['id_receitas'];
$nome_receitas=$dados['nome_receitas'];
$receita_receitas=$dados['receita_receitas'];

$foto1_receitas=$dados['foto1_receitas'];
$foto2_receitas=$dados['foto2_receitas'];
$foto3_receitas=$dados['foto3_receitas'];
$foto4_receitas=$dados['foto4_receitas'];
$foto5_receitas=$dados['foto5_receitas'];
$foto6_receitas=$dados['foto6_receitas'];

?>
  
 
  <tr>
   <td class="gridLineEven">&nbsp;
	  
	</td>
    <td class="gridLineEven">
	  <?= $id_receitas?>
	</td>
	<td class="gridLineEven">
	  <?= $nome_receitas?>
	</td>
    <td class="gridLineEven">
		<?= $receita_receitas?>
    </td>
   
   
    <td class="gridLineEven"><a href="receitas_edit.php?id=<?= $id_receitas;  ?>">Editar</a>&nbsp;</td>
   
    <td class="gridLineEven">&nbsp;<a href="receitas_delete_xp2.php?id=<?= $id_receitas;  ?>" onClick="return confirm('Você tem certeza que deseja excluir?\n(essa operação não pode ser desfeita)')">Excluir</a></td>
    <td class="gridLineEven">&nbsp;</td>
	<td class="gridLineEven">&nbsp;
	  
	</td>
  </tr>
  <? } ?>
  </tbody>
</table>
</div>



<? include_once("struct/struct_bottom.php")?>
<? } ?>