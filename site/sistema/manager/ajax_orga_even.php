<?
include_once('../classes/class.evento.php');
include_once('../classes/service.evento.php');
include_once('../classes/service.organizacao.php');
?>
<table border="0" cellpadding="2" cellspacing="0">
<tr>
	<td class="structFilter" width="10%">Organização</td>
	<td class="structFilter">
		<select name="orga_id" id="ajaxmenu" size="1" onChange="ajaxcombo('ajaxmenu', 'eventoSelectArea')" class="structFilterBox">
		<?
			if (!$selectedORGA_ID) {
				echo "<option value='0'>Escolha a Organização</option>";
				
			} else {
				if ($selectedORGA_ID) {
					?>
					<SCRIPT language="JavaScript" type="text/javascript">
						ajaxpage('ajax_select_evento.php?even_id=<?=$selectedEVEN_ID?>&orga_id=<?=$selectedORGA_ID?>&configurado=<?=$configurado?>', 'eventoSelectArea');
					</SCRIPT>
					<?
				} else {
					?>
					<SCRIPT language="JavaScript" type="text/javascript">
						ajaxpage('ajax_select_evento.php?orga_id=<?=$selectedORGA_ID?>', 'eventoSelectArea');
					</SCRIPT>
					<?
				}
			}
			$organizacaoService = new OrganizacaoService();
			if ($configurado) {
				$organizacaoList = $organizacaoService->listOrganizacoesComEventoCaptado();
			} else {
				$organizacaoList = $organizacaoService->listOrganizacoes();
			}
			if ($selectedORGA_ID) {
				echo $organizacaoService->generateHtmlOptionsForAjax($organizacaoList,$selectedORGA_ID,"ajax_select_evento.php?configurado=".$configurado."&even_id=".$selectedEVEN_ID."&orga_id=");
			} else {
				echo $organizacaoService->generateHtmlOptionsForAjax($organizacaoList,$selectedORGA_ID,"ajax_select_evento.php?configurado=".$configurado."&orga_id=");
			}
		?>			
		</select>
	</td>
</tr>
<tr>
	<td class="structFilter">Evento</td>
	<td class="structFilter">
		<div id="eventoSelectArea">
			Escolha a organização para listar os eventos
		</div>		
	</td>
</tr>
</table>