<? include_once("struct/struct_top.php")?>
<?php
include_once("fckeditor/fckeditor.php");

?>
<?

//include_once('../classes/class.configuracao.php');
//include_once('../classes/class.palestrantes.php');
//include_once('../classes/service.palestrantes.php');

//$Palestrantes = new Palestrantes();
//$id_escritorio=1;
?>

 <?php

include ("conexao_teste.php");

//Consulta com a tabela
//Selecione tudo de nomedatabela em ordem crescente pelo nome 
$consulta=mysql_query("SELECT * FROM escritorio_ita"); //WHERE ID_escritorio='$id_escritorio'

?>
  <?
//Fazendo o looping para exibição de todos registros que contiverem em nomedatabela
while ($dados = mysql_fetch_array($consulta)) {
$id_escritorio=$dados['id_escritorio'];
$apresentacao=$dados['apresentacao'];
$missao=$dados['missao'];
$visao=$dados['visao'];
$codigo=$dados['codigo'];
$parcerias=$dados['parcerias'];

}

?>
<link type="text/css" rel="stylesheet" href="dhtmlgoodies_calendar/dhtmlgoodies_calendar.css?random=20051112" media="screen"></LINK>
	<SCRIPT type="text/javascript" src="dhtmlgoodies_calendar/dhtmlgoodies_calendar.js?random=20060118"></script>


<div class="structTitle">Editar Escritorio em Italiano </div>

<div style="padding-top:8px;"></div>

<form action="escritorioita_edit_xp.php" method="POST" class="form.nospace" onsubmit="return validateForm(this)" enctype="multipart/form-data">

<input type="hidden" name="usua_id" value="<?= $_SESSION["usuario"]->getID() ?>">
<!--input type="hidden" name="orga_id" value="<?= $orga_id ?>"-->
<!--input type="hidden" name="even_id" value="<?= $even_id ?>"-->
<table border="0" cellpadding="0" cellspacing="0" width="100%">
<tr>
	<td width="50%" valign="top">
		<table width="1028" border="0" cellpadding="2" cellspacing="2">
		<tr>
			<td width="19%" class="structFilter">Apresentação:</td>
			<td width="81%" class="structFilter">
			<input type="hidden" class="structFilterBox" name="id_escritorio"  value="<?= $id_escritorio?>" size="50" maxlength="200">
			 <?php
                $oFCKeditor = new FCKeditor('apresentacao') ;
                $oFCKeditor->BasePath = 'fckeditor/' ;
                $oFCKeditor->Value = $apresentacao;
                $oFCKeditor->Create() ;
              ?>	</td>
		</tr>
		<tr>
			<td width="19%" class="structFilter">Missão:</td>
			<td width="81%" class="structFilter">
			<?php
                $oFCKeditor = new FCKeditor('missao') ;
                $oFCKeditor->BasePath = 'fckeditor/' ;
                $oFCKeditor->Value = $missao;
                $oFCKeditor->Create() ;
              ?></td>
		</tr>
		<tr>
			<td width="19%" class="structFilter">Visão:</td>
			<td width="81%" class="structFilter">
			<?php
                $oFCKeditor = new FCKeditor('visao') ;
                $oFCKeditor->BasePath = 'fckeditor/' ;
                $oFCKeditor->Value = $visao;
                $oFCKeditor->Create() ;
              ?></td>
		</tr>		
		<tr>
			<td class="structFilter">Código de Ética: </td>
			<td class="structFilter">
			  <?php
                $oFCKeditor = new FCKeditor('codigo') ;
                $oFCKeditor->BasePath = 'fckeditor/' ;
                $oFCKeditor->Value = $codigo;
                $oFCKeditor->Create() ;
              ?>			</td>
		</tr>
		<tr>
			<td class="structFilter">Parcerias: </td>
			<td class="structFilter">
			  <?php
                $oFCKeditor = new FCKeditor('parcerias') ;
                $oFCKeditor->BasePath = 'fckeditor/' ;
                $oFCKeditor->Value = $parcerias;
                $oFCKeditor->Create() ;
              ?>			</td>
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