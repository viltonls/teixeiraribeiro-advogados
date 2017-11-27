<? include_once("struct/struct_top.php")?>

<script Language="JavaScript">

function validateForm(theForm) {
  //alert('orga_id = ' + theForm.orga_id.value);
  if (theForm.orga_id.value == "0") {
  	alert("Escolha uma Organização");
    return false;
  }
  if (theForm.even_id.value == "0") {
  	alert("Escolha um Evento");
    return false;
  }
  return true;
}
</script>

<div class="structTitle">Informe o evento captado</div>

<div style="padding-top:8px;"></div>

<form action="ativa_evento_captado_xp.php" method="POST" class="form.nospace" onsubmit="return validateForm(this)">
<input type="hidden" name="url" value="<?=$_REQUEST["url"]?>">
<?
$selectedORGA_ID = $_REQUEST["orga_id"];
$selectedEVEN_ID = $_REQUEST["even_id"];
include_once("ajax_orga_even.php");
?>


<table border="0" cellpadding="2" cellspacing="0">
<tr>
	<td class="structFilter" width="10%">&nbsp;&nbsp;&nbsp;</td>
	<td class="structFilter"><input type="submit" class="structFilterButton" value="Ativar"></td>
</tr>
</table>
</form>

<? include_once("struct/struct_bottom.php")?>