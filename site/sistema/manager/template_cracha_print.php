<?
include_once("struct/auth.php");
include_once("struct/struct_functions.php");

header("Content-type: text/html; charset=ISO-8859-1");
/* @var $eventoConfiguracaoAtual Configuracao */

include_once('../classes/class.configuracao.php');
include_once('../classes/class.inscricao.php');
include_once('../classes/service.inscricao.php');

$inscricao = new Inscricao();

/* @var $eventoConfiguracaoAtual Configuracao */

/* Tratamento de Erro */
if ($_REQUEST['insc_id']) {
	$inscricaoService = new InscricaoService();
	$inscricao = $inscricaoService->loadInscricaoById($_REQUEST['insc_id'],$eventoAtual->getID());
	if (!$inscricao->getID()) {
		echo "<span class='structFilterSimple'>";
		echo "Erro: Inscricao não encontrada no BD.<br>";
		break;
		echo "</span>";
	}
}

?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.0 Transitional//EN">
<HTML>
<HEAD>
<TITLE></TITLE>
<style type="text/css">
td,div,body {font-family:arial, helvetica; font-size:8pt;}
</style>
</HEAD>
<BODY align="center" leftmargin="0" topmargin="0" rightmargin="0" bottommargin="0" marginwidth="0" marginheight="0">
<div align="center">
<? include('template_cracha.php'); ?>

<!-- Script para imprimir na impressora padrão -->
<object id="WBControl" width="0" height="0" classid="CLSID:8856F961-340A-11D0-A96B-00C04FD705A2"></object>
<script language="vbscript">WBControl.ExecWB 6,2,3</script></div></BODY>
</HTML>