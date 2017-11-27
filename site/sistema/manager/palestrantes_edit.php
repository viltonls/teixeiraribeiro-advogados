<? include_once("struct/struct_top.php")?>
<?

include_once('../classes/class.configuracao.php');
include_once('../classes/class.palestrantes.php');
include_once('../classes/service.palestrantes.php');

//$Palestrantes = new Palestrantes();
$id_palestrantes=$_REQUEST["id"];
?>

 <?php

include ("conexao_teste.php");

//Consulta com a tabela
//Selecione tudo de nomedatabela em ordem crescente pelo nome 
$consulta=mysql_query("SELECT * FROM palestrantes WHERE ID_PALESTRANTES='$id_palestrantes'"); 

?>
  <?
//Fazendo o looping para exibição de todos registros que contiverem em nomedatabela
while ($dados = mysql_fetch_array($consulta)) {
$id_palestrantes=$dados['id_palestrantes'];
$nome_palestrantes=$dados['nome_palestrantes'];
$curriculo_palestrantes=$dados['curriculo_palestrantes'];
}

?>



<div class="structTitle">Editar Palestrante </div>

<div style="padding-top:8px;"></div>

<form action="palestrantes_edit_xp.php" method="POST" class="form.nospace" onsubmit="return validateForm(this)">

<input type="hidden" name="usua_id" value="<?= $_SESSION["usuario"]->getID() ?>">
<!--input type="hidden" name="orga_id" value="<?= $orga_id ?>"-->
<!--input type="hidden" name="even_id" value="<?= $even_id ?>"-->
<table border="0" cellpadding="0" cellspacing="0" width="100%">
<tr>
	<td width="50%" valign="top">
		<table width="488" border="0" cellpadding="2" cellspacing="2">
		<tr>
			<td width="31%" class="structFilter">Nome do Palestrante:</td>
			<td width="69%" class="structFilter">
			<input type="hidden" class="structFilterBox" name="id_palestrantes"  value="<?= $id_palestrantes?>" size="50" maxlength="200">
			<input type="edit" class="structFilterBox" name="nome_palestrantes"  value="<?= $nome_palestrantes?>" size="50" maxlength="200"></td>
		</tr>		
		
		<tr>
			<td class="structFilter">Url do Curriculo: </td>
			<td class="structFilter"><input type="edit" class="structFilterBox" name="curriculo_palestrantes" id="curriculo_palestrantes" value="<?= $curriculo_palestrantes?>"   size="50" maxlength="200"></td>
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
<?/* } else { ?>
	Erro: não foi informada a organização.
	
<? }*/ ?>
<? include_once("struct/struct_bottom.php")?>