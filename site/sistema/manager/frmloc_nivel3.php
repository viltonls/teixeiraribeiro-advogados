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

?>
<script language="JavaScript">
function excluir(id)
{
	if (confirm('Deseja relamente excluir o registro de Cód. ' + id + ' ?'))
	{
		location.href="frmExcluir.php?id="+id;
	}	
}
function scrollWindowTop()
{
window.scrollTo(0,0);
}
</script>
<div class="structTitle">Listar Portfolio N3 "<?=$eventoAtual->getNOME()?>"</div>
<div class="gridContainer" id="tC" style="height:300px; width:100%;border:solid 1px #303030">
<table border="0" cellspacing="0" cellpadding="0" width="100%">
	<thead class="gridHeader">
		<tr class="gridHeader" style="top:expression(document.getElementById('tC').scrollTop);">	
			<td class="gridHeader" width="2%">&nbsp;</td>   
			<td width="7%" class="gridHeader">C&oacute;digo</td>
			<td width="15%" class="gridHeader">N&iacute;vel 1</td>
			<td width="15%" class="gridHeader">N&iacute;vel 2</td>
			<td width="25%" class="gridHeader">Descri&ccedil;&atilde;o</td>	 
			<td width="35%" class="gridHeader">Descri&ccedil;&atilde;o da ajuda</td>
			<td width="7%" class="gridHeader">Editar</td>
			<td width="9%" class="gridHeader">Excluir</td>
			<td class="gridHeader" width="2%">&nbsp;</td>
  		</tr>
	</thead>
	<tbody>

	<?php 
	/************** inicio paginacao *******************/
	include ("conexao_teste.php");  	
	$arr = array(1=>"CIRCULA&Ccedil;&Atilde;O",2=>"CRM",3=>"COMERCIAL",4=>"FINANCEIRO",5=>"WEB");	
	
	$sql_select = " SELECT nivel1.nunivel1 nivel1top, nivel1.nmdescricao descnivel1,portfolio.* FROM portfolio ";
	$sql_select .= " inner join portfolio nivel1 on (portfolio.nunivel2 = nivel1.idportfolio) ";
	$sql_select .= " where portfolio.nunivel2 <> 0 order by nivel1.nunivel1";	
	$sql_query = mysql_query($sql_select);	
	while ($dados = mysql_fetch_array($sql_query)) 
	{
		$idportfolio = $dados['idportfolio'];		
		$nivel1top = $dados['nivel1top'];
		$descnivel1 = $dados['descnivel1'];
		$nmdescricao = $dados['nmdescricao'];
		$nmtitle = $dados['nmtitle'];
	?>
	<tr>
   		<td class="gridLineEven">&nbsp;</td>
		<td class="gridLineEven"><?= $idportfolio?></td>
		<td class="gridLineEven"><?= $arr[$nivel1top]?></td>
		<td class="gridLineEven"><?= $descnivel1?></td>
		<td class="gridLineEven"><?= $nmdescricao?></td>
		<td class="gridLineEven"><?= $nmtitle?></td>
    	<td class="gridLineEven"><a href="frmcad_nivel3.php?id=<?= $idportfolio;  ?>">Editar</a>&nbsp;</td>
   		<td class="gridLineEven">&nbsp;<a href="frmExcluir.php?id=<?= $idportfolio;  ?>" onClick="return confirm('Você tem certeza que deseja excluir?\n(essa operação não pode ser desfeita)')">Excluir</a></td>
    	<td class="gridLineEven">&nbsp;</td>
		<td width="1%" class="gridLineEven">&nbsp;	</td>
  	</tr>
	<?php }?>
</table>
</div>
<? include_once("struct/struct_bottom.php")?>
<? } ?>