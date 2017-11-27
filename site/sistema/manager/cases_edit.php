<? include_once("struct/struct_top.php")?>
<?php
include_once("fckeditor/fckeditor.php");

?>
<?

//include_once('../classes/class.configuracao.php');
//include_once('../classes/class.palestrantes.php');
//include_once('../classes/service.palestrantes.php');

//$Palestrantes = new Palestrantes();
$id_cases=$_REQUEST["id"];
?>

 <?php

include ("conexao_teste.php");

//Consulta com a tabela
//Selecione tudo de nomedatabela em ordem crescente pelo nome 
$consulta=mysql_query("SELECT * FROM cases WHERE ID_cases='$id_cases'"); 

?>
  <?
//Fazendo o looping para exibição de todos registros que contiverem em nomedatabela
while ($dados = mysql_fetch_array($consulta)) {
$id_cases=$dados['id_cases'];
$cases_titulo=$dados['cases_titulo'];
$cases_data=$dados['cases_data'];
$cases_corpo=$dados['cases_corpo'];
$cases_foto=$dados['cases_foto'];

}

?>
<link type="text/css" rel="stylesheet" href="dhtmlgoodies_calendar/dhtmlgoodies_calendar.css?random=20051112" media="screen"></LINK>
	<SCRIPT type="text/javascript" src="dhtmlgoodies_calendar/dhtmlgoodies_calendar.js?random=20060118"></script>


<div class="structTitle">Editar Cases </div>

<div style="padding-top:8px;"></div>

<form action="cases_edit_xp.php" method="POST" class="form.nospace" onsubmit="return validateForm(this)" enctype="multipart/form-data">

<input type="hidden" name="usua_id" value="<?= $_SESSION["usuario"]->getID() ?>">
<!--input type="hidden" name="orga_id" value="<?= $orga_id ?>"-->
<!--input type="hidden" name="even_id" value="<?= $even_id ?>"-->
<table border="0" cellpadding="0" cellspacing="0" width="100%">
<tr>
	<td width="50%" valign="top">
		<table width="1028" border="0" cellpadding="2" cellspacing="2">
		<tr>
			<td width="19%" class="structFilter">Título:</td>
			<td width="81%" class="structFilter">
			<input type="hidden" class="structFilterBox" name="id_cases"  value="<?= $id_cases?>" size="50" maxlength="200">
			<input type="edit" class="structFilterBox" name="cases_titulo"  value="<?= $cases_titulo?>" size="50" maxlength="200"></td>
		</tr>
		<tr>
			<td width="19%" class="structFilter">Data:</td>
			<td width="81%" class="structFilter">
			<input type="text" class="structFilterBox" value="<?= $cases_data?>" readonly name="cases_data"><input type="button" class="structFilterButton" value="Calendario" onclick="displayCalendar(document.forms[0].cases_data,'yyyy-mm-dd',this)"></td>
		</tr>	
		<tr>
			<td class="structFilter">Corpo: </td>
			<td class="structFilter">
			  <?php
                $oFCKeditor = new FCKeditor('cases_corpo') ;
                $oFCKeditor->BasePath = 'fckeditor/' ;
                $oFCKeditor->Value = $cases_corpo;
                $oFCKeditor->Create() ;
              ?>			</td>
		</tr>
		<tr>
			<td height="31" class="structFilter">Foto1: (Tamanho 155x182 px) </td>
			<td class="structFilter"><input type="file" class="structFilterBox" name="cases_foto" value="<?= $cases_foto?>"   size="42">
			  <? 
			    if($cases_foto!=""){
			     echo"<img src='img_cases/$cases_foto' width='100'>";
				 echo"<input name='fotoa'type='checkbox' value='1' />
			  (Marque aqui caso queira excluir a imagem e logo ap&oacute;s clique em salvar.)";	
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