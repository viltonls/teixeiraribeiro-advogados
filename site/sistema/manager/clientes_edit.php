<? include_once("struct/struct_top.php")?>
<?php
include_once("fckeditor/fckeditor.php");

?>
<?

//include_once('../classes/class.configuracao.php');
//include_once('../classes/class.palestrantes.php');
//include_once('../classes/service.palestrantes.php');

//$Palestrantes = new Palestrantes();
$id_clientes=$_REQUEST["id"];
?>

 <?php

include ("conexao_teste.php");

//Consulta com a tabela
//Selecione tudo de nomedatabela em ordem crescente pelo nome 
$consulta=mysql_query("SELECT * FROM clientes WHERE ID_CLIENTES='$id_clientes'"); 

$cons_ordem = mysql_query("SELECT * FROM clientes WHERE ID_CLIENTES='$id_clientes'");

?>
  <?
//Fazendo o looping para exibição de todos registros que contiverem em nomedatabela
while ($dados = mysql_fetch_array($consulta)) 
{
	$id_clientes=$dados['id_clientes'];
	$clientes_nome=$dados['clientes_nome'];
	$clientes_estado=$dados['clientes_estado'];
	$clientes_produto=$dados['clientes_produto'];
	$clientes_logo=$dados['clientes_logo'];
	$clientes_ordem=$dados['clientes_ordem'];
}

?>
<link type="text/css" rel="stylesheet" href="dhtmlgoodies_calendar/dhtmlgoodies_calendar.css?random=20051112" media="screen"></LINK>
<SCRIPT type="text/javascript" src="dhtmlgoodies_calendar/dhtmlgoodies_calendar.js?random=20060118"></script>


<div class="structTitle">Editar Clientes </div>

<div style="padding-top:8px;"></div>

<form action="clientes_edit_xp.php" method="POST" class="form.nospace" onsubmit="return validateForm(this)" enctype="multipart/form-data">

<input type="hidden" name="usua_id" value="<?= $_SESSION["usuario"]->getID() ?>">
<!--input type="hidden" name="orga_id" value="<?= $orga_id ?>"-->
<!--input type="hidden" name="even_id" value="<?= $even_id ?>"-->
<table border="0" cellpadding="0" cellspacing="0" width="100%">
<tr>
	<td width="50%" valign="top">
		<table width="1028" border="0" cellpadding="2" cellspacing="2">
		<tr>
			<td width="19%" class="structFilter">Nome:</td>
			<td width="81%" class="structFilter">
			<input type="hidden" class="structFilterBox" name="id_clientes"  value="<?= $id_clientes?>" size="50" maxlength="200">
			<input type="edit" class="structFilterBox" name="clientes_nome"  value="<?= $clientes_nome?>" size="50" maxlength="200">
			</td>
		</tr>
		<tr>
			<td width="19%" class="structFilter">Sistema que utiliza:</td>
			<td width="81%" class="structFilter">
			<select name="clientes_produto">
			<option value="SCAP Plus">SCAP Plus</option>
			<option value="SCAP Standard">SCAP Standard</option>
			<option value="SCAP Light">SCAP Light</option>
			</select>
			</td>
		</tr>
		<tr>
			<td width="19%" class="structFilter">Estado:</td>
			<td width="81%" class="structFilter">
			<select name="clientes_estado">
			<option value="0">Selecione o Estado</option>
 <option value="ac">Acre</option>
 <option value="al">Alagoas</option>
 <option value="ap">Amapá</option>
 <option value="am">Amazonas</option>
 <option value="ba">Bahia</option>
 <option value="ce">Ceará</option>
 <option value="df">Distrito Federal</option>
 <option value="es">Espirito Santo</option>
 <option value="go">Goiás</option>
 <option value="ma">Maranhão</option>
 <option value="ms">Mato Grosso do Sul</option>
 <option value="mt">Mato Grosso</option>
 <option value="mg">Minas Gerais</option>
 <option value="pa">Pará</option>
 <option value="pb">Paraíba</option>
 <option value="pr">Paraná</option>
 <option value="pe">Pernambuco</option>
 <option value="pi">Piauí</option>
 <option value="rj">Rio de Janeiro</option>
 <option value="rn">Rio Grande do Norte</option>
 <option value="rs">Rio Grande do Sul</option>
 <option value="ro">Rondônia</option>
 <option value="rr">Roraima</option>
 <option value="sc">Santa Catarina</option>
 <option value="sp">São Paulo</option>
 <option value="se">Sergipe</option>
 <option value="to">Tocantins</option>
 </select>
 
			</td>
		</tr>
			<tr>
			<td width="19%" class="structFilter">Ordem:</td>
			<td width="81%" class="structFilter">
			<input type="edit" class="structFilterBox" name="clientes_ordem"  value="<?= $clientes_ordem?>" size="50" maxlength="200"></td>
		</tr>	
		<tr>
			<td height="31" class="structFilter">Logo: (Tamanho 150x150px com borda) </td>
			<td class="structFilter"><input type="file" class="structFilterBox" name="clientes_logo" value="<?= $clientes_logo?>" size="42">
			  <? 
			    if($clientes_logo!=""){
			     echo"<img src='img_clientes/$clientes_logo' width='100'>";
				 echo"<input name='fotoa'type='checkbox' value='1' />
			  (Marque aqui caso queira excluir a imagem ao salvar.)";	
				} ?> 
				<input type="hidden" name="acao" value="imagem" />
	  	    </td>
		</tr>	
			<td class="structFilter">&nbsp;&nbsp;&nbsp;</td>
			<td class="structFilter"><input type="submit" class="structFilterButton" value="Salvar"></td>
		</tr>
		</table>
	</td>
</tr>

</table>
</form>
<? /* } else { ?>
	Erro: não foi informada a organização.
	
<? }*/ ?>
<? include_once("struct/struct_bottom.php")?>