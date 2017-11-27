<? include_once("struct/struct_top.php")?>
<?php
include_once("fckeditor/fckeditor.php");

?>
<?

//include_once('../classes/class.configuracao.php');
//include_once('../classes/class.palestrantes.php');
//include_once('../classes/service.palestrantes.php');

//$Palestrantes = new Palestrantes();
$id_area=$_REQUEST["id"];
?>

 <?php

include ("conexao_teste.php");

//Consulta com a tabela
//Selecione tudo de nomedatabela em ordem crescente pelo nome 
$consulta=mysql_query("SELECT * FROM areas_ita WHERE ID_AREA='$id_area'"); 

?>
  <?
//Fazendo o looping para exibição de todos registros que contiverem em nomedatabela
while ($dados = mysql_fetch_array($consulta)) {
$id_area=$dados['id_area'];
$area_titulo=$dados['area_titulo'];
$area_corpo=$dados['area_corpo'];
$area_curto=$dados['area_curto'];
}

?>
<link type="text/css" rel="stylesheet" href="dhtmlgoodies_calendar/dhtmlgoodies_calendar.css?random=20051112" media="screen"></LINK>
	<SCRIPT type="text/javascript" src="dhtmlgoodies_calendar/dhtmlgoodies_calendar.js?random=20060118"></script>


<div class="structTitle">Editar Área em Italiano</div>

<div style="padding-top:8px;"></div>

<form action="areasita_edit_xp.php" method="POST" class="form.nospace" onsubmit="return validateForm(this)" enctype="multipart/form-data">

<input type="hidden" name="usua_id" value="<?= $_SESSION["usuario"]->getID() ?>">
<!--input type="hidden" name="orga_id" value="<?= $orga_id ?>"-->
<!--input type="hidden" name="even_id" value="<?= $even_id ?>"-->
<table border="0" cellpadding="0" cellspacing="0" width="100%">
<tr>
	<td width="50%" valign="top">
		<table width="1028" border="0" cellpadding="2" cellspacing="2">
		<tr>
			<td width="19%" class="structFilter">Titulo:</td>
			<td width="81%" class="structFilter">
			<input type="hidden" class="structFilterBox" name="id_area"  value="<?= $id_area?>" size="50" maxlength="200">
			<input type="edit" class="structFilterBox" name="area_titulo"  value="<?= $area_titulo?>" size="50" maxlength="200"></td>
		</tr>	
		<tr>
			<td width="19%" class="structFilter">Corpo:</td>
			<td width="81%" class="structFilter">
			<?php
                $oFCKeditor = new FCKeditor('area_corpo') ;
                $oFCKeditor->BasePath = 'fckeditor/' ;
                $oFCKeditor->Value = $area_corpo;
                $oFCKeditor->Create() ;
              ?>
			</td>
		<tr>
			<td width="19%" class="structFilter">Titulo Curto:</td>
			<td width="81%" class="structFilter">
			<input type="edit" class="structFilterBox" name="area_curto"  value="<?= $area_curto?>" size="50" maxlength="200"></td>
		</tr>	
		<tr>
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