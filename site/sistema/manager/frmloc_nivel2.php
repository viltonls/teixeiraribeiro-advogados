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
<div class="structTitle">Listar Portfolio N2 "<?=$eventoAtual->getNOME()?>"</div>
<div class="gridContainer" id="tC" style="height:300px; width:100%;border:solid 1px #303030">
	<table border="0" cellspacing="0" cellpadding="0" width="100%">
		<thead class="gridHeader">
	  	<tr class="gridHeader" style="top:expression(document.getElementById('tC').scrollTop);">
			<!--td class="gridHeader" width="2%">&nbsp;</td-->
			<td class="gridHeader" width="2%">&nbsp;</td>   
			<td width="7%" class="gridHeader">C&oacute;digo</td>
			<td width="10%" class="gridHeader">N&iacute;vel 1</td>
			<td width="32%" class="gridHeader">Descri&ccedil;&atilde;o</td>	 
			<td width="7%" class="gridHeader">Editar</td>
			<td width="9%" class="gridHeader">Excluir</td>
			<td class="gridHeader" width="2%">&nbsp;</td>
  		</tr>
	</thead>
<tbody>
<?php
	include ("conexao_teste.php");
  	$arr = array(1=>"CIRCULA&Ccedil;&Atilde;O",2=>"CRM",3=>"COMERCIAL",4=>"FINANCEIRO",5=>"WEB");
	$consulta = "SELECT * FROM portfolio where nunivel1 <> 0 order by nmdescricao";	
	$sql_query = mysql_query($consulta);
	while ($dados = mysql_fetch_array($sql_query)) {
		$id_portfolio=$dados['idportfolio'];
		$descricao=$dados['nmdescricao'];
		$nivel1top=$dados['nunivel1'];
	
?>
	<tr>
   		<td class="gridLineEven">&nbsp;</td>
		<td class="gridLineEven"><?= $id_portfolio?></td>
		<td class="gridLineEven"><?= $arr[$nivel1top]?></td>	
		<td class="gridLineEven"><?= $descricao?></td>		
    	<td class="gridLineEven"><a href="frmcad_nivel2.php?id=<?= $id_portfolio; ?>">Editar</a>&nbsp;</td>
   		<td class="gridLineEven">&nbsp;<a href="frmExcluir.php?id=<?= $id_portfolio; ?>" onClick="return confirm('Você tem certeza que deseja excluir?\n(essa operação não pode ser desfeita)')">Excluir</a></td>
    	<td class="gridLineEven">&nbsp;</td>
		<td width="1%" class="gridLineEven">&nbsp;	</td>
  	</tr>
  <? } ?>
  </tbody>
</table>
</div>
<? include_once("struct/struct_bottom.php") ?>
<? } ?>