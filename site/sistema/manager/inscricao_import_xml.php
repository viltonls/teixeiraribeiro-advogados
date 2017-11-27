<? include_once("struct/auth.php")?>
<?
if (!session_is_registered("evento")) { 
	header("Location: session_seleciona_evento.php?url=inscricao_import_xml.php&orga_id=0&configurado=1");
} else {
	
include_once("struct/struct_top.php");
include_once('../classes/class.configuracao.php');
include_once('../classes/class.inscricao.php');
include_once('../classes/service.inscricao.php');

/* @var $eventoConfiguracaoAtual Configuracao */
/* @var $eventoAtual Evento */
?>
<div class="structTitle">Importar Inscrições do Site do Evento "<?=$eventoAtual->getNOME()?>"</div>

<div style="padding-top:8px;"></div>

<form action="inscricao_import_xml_xp.php" method="POST">
<input type="hidden" name="url" value="<?= $eventoConfiguracaoAtual->getURL_SYNC_INSC() ?>">
<input type="hidden" name="even_id" value="<?= $eventoAtual->getID() ?>">
<? if ($eventoConfiguracaoAtual->getURL_SYNC_INSC() != null && $eventoConfiguracaoAtual->getURL_SYNC_INSC() != "") { ?>
<table border="0" cellpadding="2" cellspacing="0">
<tr>
	<td class="structFilter"><input type="submit" class="structFilterButton" value="Iniciar Importação"></td>
</tr>
</table>
<? } else { ?>
<div class="main">O evento não possui URL configurada para sincronização com o site.</div>
<? } ?>

</form>

<? include_once("struct/struct_bottom.php")?>
<? } ?>