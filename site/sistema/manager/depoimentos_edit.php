<? include_once("struct/struct_top.php")?>
<?php
include_once("fckeditor/fckeditor.php");

?>
<?

//include_once('../classes/class.configuracao.php');
//include_once('../classes/class.palestrantes.php');
//include_once('../classes/service.palestrantes.php');

//$Palestrantes = new Palestrantes();
$id_depoimentos=$_REQUEST["id"];
?>

 <?php

include ("conexao_teste.php");

//Consulta com a tabela
//Selecione tudo de nomedatabela em ordem crescente pelo nome 
$consulta=mysql_query("SELECT * FROM depoimentos WHERE ID_depoimentos='$id_depoimentos'"); 

?>
  <?
//Fazendo o looping para exibição de todos registros que contiverem em nomedatabela
while ($dados = mysql_fetch_array($consulta)) {
$id_depoimentos=$dados['id_depoimentos'];
$depoimentos_nome=$dados['depoimentos_nome'];
$depoimentos_cargo=$dados['depoimentos_cargo'];
$depoimentos_dadoscomplementares=$dados['depoimentos_dadoscomplementares'];
$depoimentos_site=$dados['depoimentos_site'];
$depoimentos_corpo=$dados['depoimentos_corpo'];

$depoimentos_foto=$dados['depoimentos_foto'];
$depoimentos_ordem=$dados['depoimentos_ordem'];
}

?>
<link type="text/css" rel="stylesheet" href="dhtmlgoodies_calendar/dhtmlgoodies_calendar.css?random=20051112" media="screen"></LINK>
	<SCRIPT type="text/javascript" src="dhtmlgoodies_calendar/dhtmlgoodies_calendar.js?random=20060118"></script>


<div class="structTitle">Editar Depoimentos </div>

<div style="padding-top:8px;"></div>

<form action="depoimentos_edit_xp.php" method="POST" class="form.nospace" onsubmit="return validateForm(this)" enctype="multipart/form-data">

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
			<input type="hidden" class="structFilterBox" name="id_depoimentos"  value="<?= $id_depoimentos?>" size="50" maxlength="200">
			<input type="edit" class="structFilterBox" name="depoimentos_nome"  value="<?= $depoimentos_nome?>" size="50" maxlength="200"></td>
		</tr>
		<tr>
			<td width="19%" class="structFilter">Cargo:</td>
			<td width="81%" class="structFilter">
			<input type="edit" class="structFilterBox" name="depoimentos_cargo"  value="<?= $depoimentos_cargo?>" size="50" maxlength="200"></td>
		</tr>	
		<tr>
			<td width="19%" class="structFilter">Dados Complementares:</td>
			<td width="81%" class="structFilter">
			<input type="edit" class="structFilterBox" value="<?= $depoimentos_dadoscomplementares?>" size="50" name="depoimentos_dadoscomplementares">
			</td>
		</tr>		
		<tr>
			<td width="19%" class="structFilter">Site:</td>
			<td width="81%" class="structFilter">
			<input type="edit" class="structFilterBox" value="<?= $depoimentos_site?>" size="50" name="depoimentos_site">
			</td>
		</tr>
		<tr>
			<td class="structFilter">Corpo: </td>
			<td class="structFilter">
			  <?php
                $oFCKeditor = new FCKeditor('depoimentos_corpo') ;
                $oFCKeditor->BasePath = 'fckeditor/' ;
                $oFCKeditor->Value = $depoimentos_corpo;
                $oFCKeditor->Create() ;
              ?>			</td>
		</tr>
		<tr>
			<td height="31" class="structFilter">Foto : (Tamanho 155x182 px) </td>
			<td class="structFilter"><input type="file" class="structFilterBox" name="depoimentos_foto" value="<?= $depoimentos_foto?>"   size="42">
			  <? 
			    if($depoimentos_foto!=""){
			     echo"<img src='img_depoimentos/$depoimentos_foto' width='100'>";
				 echo"<input name='fotoa'type='checkbox' value='1' />
			  (Marque aqui caso queira excluir a imagem e logo ap&oacute;s clique em salvar.)";	
				} ?> 
				<input type="hidden" name="acao" value="imagem" />
	  	    </td>
		</tr>
		<tr>
			<td width="19%" class="structFilter">Ordem:</td>
			<td width="81%" class="structFilter">
			<input type="text" class="structFilterBox" value="<?= $depoimentos_ordem?>" name="depoimentos_ordem" width="20" maxlength="2">
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