<? include_once("struct/struct_top.php")?>
<?php
include_once("fckeditor/fckeditor.php");

?>
<?

//include_once('../classes/class.configuracao.php');
//include_once('../classes/class.palestrantes.php');
//include_once('../classes/service.palestrantes.php');

//$Palestrantes = new Palestrantes();
$id_equipe=$_REQUEST["id"];
?>

 <?php

include ("conexao_teste.php");

//Consulta com a tabela
//Selecione tudo de nomedatabela em ordem crescente pelo nome 
$consulta=mysql_query("SELECT * FROM equipe_ing WHERE ID_EQUIPE='$id_equipe'"); 

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
}

?>
<link type="text/css" rel="stylesheet" href="dhtmlgoodies_calendar/dhtmlgoodies_calendar.css?random=20051112" media="screen"></LINK>
	<SCRIPT type="text/javascript" src="dhtmlgoodies_calendar/dhtmlgoodies_calendar.js?random=20060118"></script>


<div class="structTitle">Editar Membro da Equipe em Inglês</div>

<div style="padding-top:8px;"></div>

<form action="equipeing_edit_xp.php" method="POST" class="form.nospace" onsubmit="return validateForm(this)" enctype="multipart/form-data">

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
			<input type="hidden" class="structFilterBox" name="id_equipe"  value="<?= $id_equipe?>" size="50" maxlength="200">
			<input type="edit" class="structFilterBox" name="equipe_nome"  value="<?= $equipe_nome?>" size="50" maxlength="200"></td>
		</tr>	
		<tr>
			<td width="19%" class="structFilter">Currículo:</td>
			<td width="81%" class="structFilter">
			<?php
                $oFCKeditor = new FCKeditor('equipe_curriculo') ;
                $oFCKeditor->BasePath = 'fckeditor/' ;
                $oFCKeditor->Value = $equipe_curriculo;
                $oFCKeditor->Create() ;
              ?>
			</td>
		<tr>
			<td width="19%" class="structFilter">Áreas de Prática:</td>
			<td width="81%" class="structFilter">
			<input type="edit" class="structFilterBox" name="equipe_area"  value="<?= $equipe_area?>" size="50" maxlength="200"></td>
		</tr>
		<tr>
			<td width="19%" class="structFilter">Idiomas:</td>
			<td width="81%" class="structFilter">
			<input type="edit" class="structFilterBox" name="equipe_idioma"  value="<?= $equipe_idioma?>" size="50" maxlength="200"></td>
		</tr>
		<tr>
			<td width="19%" class="structFilter">E-mail:</td>
			<td width="81%" class="structFilter">
			<input type="edit" class="structFilterBox" name="equipe_email"  value="<?= $equipe_email?>" size="50" maxlength="200"></td>
		</tr>
		<tr>
			<td width="19%" class="structFilter">Sócio?:</td>
			<td width="81%" class="structFilter"><p>
			  <label>
				<input type="radio" name="equipe_socio" value="1">
			    Sim</label>
			  <br>
			  <label>
				<input type="radio" name="equipe_socio" value="0">
			    Não</label>
			</p></td>
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