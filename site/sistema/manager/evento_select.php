<? include_once("struct/struct_top.php")?>
<?
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


<div class="structTitle">Escolha a Organização e o respectivo Evento</div>

<div style="padding-top:8px;"></div>

<form action="evento_edit_xp.php" method="POST" class="form.nospace" onsubmit="return validateForm(this)">
<input type="hidden" name="id" value="<?= $evento->getID() ?>">
<table border="0" cellpadding="0" cellspacing="0" width="100%">
<tr>
	<td width="50%" valign="top">
		<table cellpadding="2" cellspacing="2" border="0">
		<tr>
			<td class="structFilter" width="28%">Organização</td>
			<td class="structFilter">
			<?
				$organizacaoService = new OrganizacaoService();
				$organizacaoList = $organizacaoService->listOrganizacoes();
				echo "<select name='orga_id' class='structFilterBox' onchange=''>\n";
				echo $organizacaoService->generateHtmlOptions($organizacaoList,$evento->getORGA_ID());
				echo "</select>\n";
			?>			
			</td>
		</tr>
		<tr>
			<td class="structFilter" width="28%">Evento</td>
			<td class="structFilter">
			<?
				$eventoService = new EventoService();
				$eventoList = $eventoService->listEventos();
				echo "<select name='even_id' class='structFilterBox'>\n";
				echo $eventoService->generateHtmlOptions($eventoList,$evento->getEVEN_ID());
				echo "</select>\n";
			?>			
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

<? include_once("struct/struct_bottom.php")?>