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
</HEAD>
<BODY align="center" leftmargin="0" topmargin="0" rightmargin="0" bottommargin="0" marginwidth="0" marginheight="0" onload="javascript:print();">
<div align="center">
<br>
<style type="text/css">
td,div,body {font-family:arial, helvetica; font-size:8pt;}
.title {font-family:arial, helvetica; font-size:12pt; font-weight:bold;padding:2px;background-color:silver;}
.titleValue {font-family:arial, helvetica; font-size:12pt; font-weight:bold;padding:2px;}
.fieldName {font-family:arial, helvetica; font-size:8pt;padding:2px;}
.fieldValue {font-family:arial, helvetica; font-size:8pt;padding:2px;font-weight:bold;border: 1px solid black}
</style>

<?
 $tipo_recibo = $_REQUEST["tipo_recibo"];
 include("template_recibo.php");
?>

</div></BODY>
</HTML>