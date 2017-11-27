<? include_once("struct/struct_top.php")?>
<?
$id_temas=$_REQUEST["id"];

?>
 <?php

include ("conexao_teste.php");

//Consulta com a tabela
//Selecione tudo de nomedatabela em ordem crescente pelo nome 
$consulta=mysql_query("SELECT * FROM temas WHERE ID_TEMAS='$id_temas'"); 

?>
  <?
//Fazendo o looping para exibição de todos registros que contiverem em nomedatabela
while ($dados = mysql_fetch_array($consulta)) {
$id_temas=$dados['id_temas'];
$nome_temas=$dados['nome_temas'];
}

?>

<div class="structTitle">Editar Temas</div>

<div style="padding-top:8px;"></div>

<form action="temas_edit_xp.php" method="POST" class="form.nospace" onsubmit="return validateForm(this)">

<input type="hidden" name="usua_id" value="<?= $_SESSION["usuario"]->getID() ?>">
<!--input type="hidden" name="orga_id" value="<?= $orga_id ?>"-->
<!--input type="hidden" name="even_id" value="<?= $even_id ?>"-->
<table border="0" cellpadding="0" cellspacing="0" width="100%">
<tr>
	<td width="50%" valign="top">
		<table width="382" border="0" cellpadding="2" cellspacing="2">
		<tr>
			<td width="31%" class="structFilter">Nome do Tema:</td>
			<td width="69%" class="structFilter">
			  <input type="hidden" class="structFilterBox" name="id_temas"  value="<?= $id_temas?>" size="50" maxlength="200">
			  <input type="edit" class="structFilterBox" name="nome_temas"  value="<?= $nome_temas?>" size="50" maxlength="200">
			</td>
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
	
 }*/ ?>
<? include_once("struct/struct_bottom.php")?>