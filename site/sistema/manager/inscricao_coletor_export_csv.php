<? include_once("struct/auth.php")?>
<?
if (!session_is_registered("evento")) { 
	header("Location: session_seleciona_evento.php?url=inscricao_coletor_export_csv.php&orga_id=0&configurado=1");
} else {
	
include_once("struct/struct_top.php");

include_once('../classes/class.evento.php');
include_once('../classes/service.evento.php');
include_once('../classes/class.organizacao.php');
include_once('../classes/service.organizacao.php');

$evento = new Evento();

?>


<div class="structTitle">Indique os arquivos dos coletores de entrada e de saída</div>

<div style="padding-top:8px;"></div>

<form name="importForm" method="post" action="inscricao_coletor_export_csv_xp.php" class="nospace" enctype="multipart/form-data" onsubmit="return disableForm(this)" accept-charset="ISO-8859-1">
<table border="0" cellpadding="0" cellspacing="0" width="100%">
<tr>
	<td width="50%" valign="top">
		<table cellpadding="10" cellspacing="2" border="0">
		<tr>
			<td class="structFilter" width="28%">Arquivos dos Coletores de Entrada</td>
			<td class="structFilter">
				<input type="file" name="file_entrada_1" value="" class="structFilterBox" style="margin-bottom:4px;"><br>
				<input type="file" name="file_entrada_2" value="" class="structFilterBox" style="margin-bottom:4px;"><br>
				<input type="file" name="file_entrada_3" value="" class="structFilterBox" style="margin-bottom:4px;"><br>
				<input type="file" name="file_entrada_4" value="" class="structFilterBox" style="margin-bottom:4px;"><br>
				<input type="file" name="file_entrada_5" value="" class="structFilterBox" style="margin-bottom:4px;"><br>
			</td>
		</tr>
		<tr>
			<td class="structFilter" width="28%">Arquivos dos Coletores de Saída</td>
			<td class="structFilter">
				<input type="file" name="file_saida_1" value="" class="structFilterBox" style="margin-bottom:4px;"><br>
				<input type="file" name="file_saida_2" value="" class="structFilterBox" style="margin-bottom:4px;"><br>
				<input type="file" name="file_saida_3" value="" class="structFilterBox" style="margin-bottom:4px;"><br>
				<input type="file" name="file_saida_4" value="" class="structFilterBox" style="margin-bottom:4px;"><br>
				<input type="file" name="file_saida_5" value="" class="structFilterBox" style="margin-bottom:4px;"><br>
			</td>
		</tr>
		<tr>
			<td class="structFilter">&nbsp;&nbsp;&nbsp;</td>
			<td class="structFilter"><input type="submit" class="structFilterButton" value="Enviar"></td>
		</tr>
		</table>
	</td>
</tr>

</table>
</form>

<? include_once("struct/struct_bottom.php")?>
<? } ?>