<? include_once("struct/auth.php")?>
<?
if (!session_is_registered("evento")) { 
	header("Location: session_seleciona_evento.php?url=inscricao_import_evento_csv.php&orga_id=0&configurado=1");
} else {
	
include_once("struct/struct_top.php");

include_once('../classes/class.evento.php');
include_once('../classes/service.evento.php');
include_once('../classes/class.organizacao.php');
include_once('../classes/service.organizacao.php');

$evento = new Evento();


/* Tratamento de Erro 
if ($_REQUEST['id']) {
	$eventoService = new EventoService();
	$evento = $eventoService->loadEventoById($_REQUEST['id']);
	if (!$evento->getID()) {
		echo "<span class='structFilter'>";
		echo "Erro: Evento não encontrado no BD.<br>";
		break;
		echo "</span>";
	}
}
*/
?>


<div class="structTitle">Informe o arquivo com as inscrições a serem importadas</div>

<div style="padding-top:8px;"></div>

<form name="importForm" method="post" action="inscricao_import_evento_csv_xp.php" class="nospace" enctype="multipart/form-data" onsubmit="return disableForm(this)" accept-charset="ISO-8859-1">
<table border="0" cellpadding="0" cellspacing="0" width="100%">
<tr>
	<td width="50%" valign="top">
		<table cellpadding="2" cellspacing="2" border="0">
		<tr>
			<td class="structFilter" width="28%">Arquivo</td>
			<td class="structFilter">
				<input type="file" name="file" value="" class="structFilterBox">
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