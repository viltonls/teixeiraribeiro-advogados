<? include_once("struct/struct_top.php")?>
<? include_once("struct/struct_functions.php")?>
<?
include_once('../classes/class.evento.php');
include_once('../classes/service.evento.php');

$evento = new Evento();
$eventoService = new EventoService();

// Pega o conteúdo do arquivo
$file_content = file_get_contents($_FILES['file']['tmp_name']);

// Registra o conteúdo na sessão
session_register("import_file_content");
$_SESSION["import_file_content"] = $file_content;

// Move o arquivo para pasta "files"
uploadfile($_FILES['file']['name'],'files/',$_FILES['file']['tmp_name']);

$file_content_array = explode("\n",$file_content);
$file_lines = count($file_content_array); // qtd de linhas válidas

$file_header = explode(";",trim($file_content_array[0]));


/* @var $eventoConfiguracaoAtual Configuracao */

?>
<div class="structTitle">Identifique qual coluna do arquivo corresponse a qual campo do sistema</div>

<div style="padding-top:8px;"></div>

<form name="importForm" method="post" action="inscricao_import_csv_xp.php" class="nospace" enctype="multipart/form-data" onsubmit="return disableForm(this)" accept-charset="ISO-8859-1">
<table border="0" cellpadding="0" cellspacing="0" width="100%">
<tr>
	<td width="50%" valign="top">
		<table cellpadding="2" cellspacing="2" border="0">
		<tr>
			<td class="structFilter" width="28%"><b>Coluna do Arquivo</b></td>
			<td class="structFilter"><b>Campo do Sistema</b></td>
		</tr>
<? for ($i = 0; $i < count($file_header); $i++) { ?>
		<tr>
			<td class="structFilter" width="28%"><?= $file_header[$i] ?></td>
			<td class="structFilter">
				<select name="coluna<?=$i?>" class="structFilterBox">
					<?= $eventoService->generateHtmlOptionsForInscricao($eventoConfiguracaoAtual); ?>
				</select>
			</td>
		</tr>
<? } ?>		
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