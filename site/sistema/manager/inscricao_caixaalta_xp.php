<? include_once("struct/auth.php")?>
<?
if (!session_is_registered("evento")) { 
	header("Location: session_seleciona_evento.php?url=inscricao_caixaalta_xp.php&orga_id=0&configurado=1");
} else {
	
include_once("struct/struct_top.php");
include_once('../classes/class.inscricao.php');
include_once('../classes/service.inscricao.php');

$inscricaoService = new InscricaoService();
$inscricaoService->uppercaseInscricoes($eventoAtual->getID());
?>

<div class="structTitle">Transformar Inscrições em Caixa Alta</div>

<div style="padding-top:8px;"></div>
Os campos das inscrições desse evento foram transformadas para caixa alta.

<? include_once("struct/struct_bottom.php")?>
<? } ?>