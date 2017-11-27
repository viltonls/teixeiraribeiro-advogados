<? include_once("struct/auth.php")?>
<?
if (!session_is_registered("evento")) { 
	header("Location: session_seleciona_evento.php?url=inscricao_list_by_curso.php&orga_id=0&configurado=1");
} else {
	
$print = $_REQUEST["print"];
	
if ($print) {
	include_once("struct/struct_print.php");
} else {
	include_once("struct/struct_top.php");
}
include_once('../classes/class.inscricao.php');
include_once('../classes/service.inscricao.php');

if ($_REQUEST["order_by"]) {
	$order_by = $_REQUEST["order_by"];
} else {
	$order_by = "INSC_NOME ASC";
}


/* @var $eventoAtual Evento */
$inscricaoService = new InscricaoService();
$inscricaoList = $inscricaoService->listInscricoesByEventoCurso($eventoAtual->getID(),$order_by,$_REQUEST["curso_num"]);

/* @var $eventoConfiguracaoAtual Configuracao */
switch ($_REQUEST["curso_num"]) {
	case "1": $curso_nome = $eventoConfiguracaoXMLAtual->getInscricaoCurso1("PT"); break;
	case "2": $curso_nome = $eventoConfiguracaoXMLAtual->getInscricaoCurso2("PT"); break;
	case "3": $curso_nome = $eventoConfiguracaoXMLAtual->getInscricaoCurso3("PT"); break;
	case "4": $curso_nome = $eventoConfiguracaoXMLAtual->getInscricaoCurso4("PT"); break;
	case "5": $curso_nome = $eventoConfiguracaoXMLAtual->getInscricaoCurso5("PT"); break;
	case "6": $curso_nome = $eventoConfiguracaoXMLAtual->getInscricaoCurso6("PT"); break;
	case "7": $curso_nome = $eventoConfiguracaoXMLAtual->getInscricaoCurso7("PT"); break;
	case "8": $curso_nome = $eventoConfiguracaoXMLAtual->getInscricaoCurso8("PT"); break;
	case "9": $curso_nome = $eventoConfiguracaoXMLAtual->getInscricaoCurso9("PT"); break;
	case "10": $curso_nome = $eventoConfiguracaoXMLAtual->getInscricaoCurso10("PT"); break;
	case "11": $curso_nome = $eventoConfiguracaoXMLAtual->getInscricaoCurso11("PT"); break;
	case "12": $curso_nome = $eventoConfiguracaoXMLAtual->getInscricaoCurso12("PT"); break;
	case "13": $curso_nome = $eventoConfiguracaoXMLAtual->getInscricaoCurso13("PT"); break;
	case "14": $curso_nome = $eventoConfiguracaoXMLAtual->getInscricaoCurso14("PT"); break;
	case "15": $curso_nome = $eventoConfiguracaoXMLAtual->getInscricaoCurso15("PT"); break;
	case "16": $curso_nome = $eventoConfiguracaoXMLAtual->getInscricaoCurso16("PT"); break;
	case "17": $curso_nome = $eventoConfiguracaoXMLAtual->getInscricaoCurso17("PT"); break;
	case "18": $curso_nome = $eventoConfiguracaoXMLAtual->getInscricaoCurso18("PT"); break;
	case "19": $curso_nome = $eventoConfiguracaoXMLAtual->getInscricaoCurso19("PT"); break;
	case "20": $curso_nome = $eventoConfiguracaoXMLAtual->getInscricaoCurso20("PT"); break;
	case "21": $curso_nome = $eventoConfiguracaoXMLAtual->getInscricaoCurso21("PT"); break;
	case "22": $curso_nome = $eventoConfiguracaoXMLAtual->getInscricaoCurso22("PT"); break;
	case "23": $curso_nome = $eventoConfiguracaoXMLAtual->getInscricaoCurso23("PT"); break;
	case "24": $curso_nome = $eventoConfiguracaoXMLAtual->getInscricaoCurso24("PT"); break;
	case "25": $curso_nome = $eventoConfiguracaoXMLAtual->getInscricaoCurso25("PT"); break;
	case "26": $curso_nome = $eventoConfiguracaoXMLAtual->getInscricaoCurso26("PT"); break;
	case "27": $curso_nome = $eventoConfiguracaoXMLAtual->getInscricaoCurso27("PT"); break;
	case "28": $curso_nome = $eventoConfiguracaoXMLAtual->getInscricaoCurso28("PT"); break;
	case "29": $curso_nome = $eventoConfiguracaoXMLAtual->getInscricaoCurso29("PT"); break;
	case "30": $curso_nome = $eventoConfiguracaoXMLAtual->getInscricaoCurso30("PT"); break;
	default: break;
}

?>


<div class="structTitle">Listar Inscrições do Evento "<?=$eventoAtual->getNOME()?>" <? if ($_REQUEST["curso_num"]!="") {?> para o Curso "<?=$curso_nome?>" <?}?></div>
<? if (!$print && $_REQUEST["curso_num"]!="") { ?>
	(<a href="inscricao_list_by_curso.php?print=true&curso_num=<?=$_REQUEST["curso_num"]?>">Versão para Impressão</a>)
<? } ?>

<div style="padding-top:8px;"></div>

<? if (!$print) { ?>
<form action="inscricao_list_by_curso.php" method="POST">
<table border="0" cellpadding="2" cellspacing="0">
<tr>
	<td class="structFilter">Filtrar por Curso:</td>
	<td class="structFilter">
		<select class="structFilterBox" name="curso_num">
			<option value="">Escolher...</option>
			<? if ($eventoConfiguracaoXMLAtual->getInscricaoCurso1("PT") != "") {?>
			<option value="1" <?= ($_REQUEST["curso_num"]=="1") ? "selected" : "";?>> <?=$eventoConfiguracaoXMLAtual->getInscricaoCurso1("PT")?></option>
			<? } ?>
			<? if ($eventoConfiguracaoXMLAtual->getInscricaoCurso2("PT") != "") {?>
			<option value="2" <?= ($_REQUEST["curso_num"]=="2") ? "selected" : "";?>> <?=$eventoConfiguracaoXMLAtual->getInscricaoCurso2("PT")?></option>
			<? } ?>
			<? if ($eventoConfiguracaoXMLAtual->getInscricaoCurso3("PT") != "") {?>
			<option value="3" <?= ($_REQUEST["curso_num"]=="3") ? "selected" : "";?>> <?=$eventoConfiguracaoXMLAtual->getInscricaoCurso3("PT")?></option>
			<? } ?>
			<? if ($eventoConfiguracaoXMLAtual->getInscricaoCurso4("PT") != "") {?>
			<option value="4" <?= ($_REQUEST["curso_num"]=="4") ? "selected" : "";?>> <?=$eventoConfiguracaoXMLAtual->getInscricaoCurso4("PT")?></option>
			<? } ?>
			<? if ($eventoConfiguracaoXMLAtual->getInscricaoCurso5("PT") != "") {?>
			<option value="5" <?= ($_REQUEST["curso_num"]=="5") ? "selected" : "";?>> <?=$eventoConfiguracaoXMLAtual->getInscricaoCurso5("PT")?></option>
			<? } ?>
			<? if ($eventoConfiguracaoXMLAtual->getInscricaoCurso6("PT") != "") {?>
			<option value="6" <?= ($_REQUEST["curso_num"]=="6") ? "selected" : "";?>> <?=$eventoConfiguracaoXMLAtual->getInscricaoCurso6("PT")?></option>
			<? } ?>
			<? if ($eventoConfiguracaoXMLAtual->getInscricaoCurso7("PT") != "") {?>
			<option value="7" <?= ($_REQUEST["curso_num"]=="7") ? "selected" : "";?>> <?=$eventoConfiguracaoXMLAtual->getInscricaoCurso7("PT")?></option>
			<? } ?>
			<? if ($eventoConfiguracaoXMLAtual->getInscricaoCurso8("PT") != "") {?>
			<option value="8" <?= ($_REQUEST["curso_num"]=="8") ? "selected" : "";?>> <?=$eventoConfiguracaoXMLAtual->getInscricaoCurso8("PT")?></option>
			<? } ?>
			<? if ($eventoConfiguracaoXMLAtual->getInscricaoCurso9("PT") != "") {?>
			<option value="9" <?= ($_REQUEST["curso_num"]=="9") ? "selected" : "";?>> <?=$eventoConfiguracaoXMLAtual->getInscricaoCurso9("PT")?></option>
			<? } ?>
			<? if ($eventoConfiguracaoXMLAtual->getInscricaoCurso10("PT") != "") {?>
			<option value="10" <?= ($_REQUEST["curso_num"]=="10") ? "selected" : "";?>> <?=$eventoConfiguracaoXMLAtual->getInscricaoCurso10("PT")?></option>
			<? } ?>
			<? if ($eventoConfiguracaoXMLAtual->getInscricaoCurso11("PT") != "") {?>
			<option value="11" <?= ($_REQUEST["curso_num"]=="11") ? "selected" : "";?>> <?=$eventoConfiguracaoXMLAtual->getInscricaoCurso11("PT")?></option>
			<? } ?>
			<? if ($eventoConfiguracaoXMLAtual->getInscricaoCurso12("PT") != "") {?>
			<option value="12" <?= ($_REQUEST["curso_num"]=="12") ? "selected" : "";?>> <?=$eventoConfiguracaoXMLAtual->getInscricaoCurso12("PT")?></option>
			<? } ?>
			<? if ($eventoConfiguracaoXMLAtual->getInscricaoCurso13("PT") != "") {?>
			<option value="13" <?= ($_REQUEST["curso_num"]=="13") ? "selected" : "";?>> <?=$eventoConfiguracaoXMLAtual->getInscricaoCurso13("PT")?></option>
			<? } ?>
			<? if ($eventoConfiguracaoXMLAtual->getInscricaoCurso14("PT") != "") {?>
			<option value="14" <?= ($_REQUEST["curso_num"]=="14") ? "selected" : "";?>> <?=$eventoConfiguracaoXMLAtual->getInscricaoCurso14("PT")?></option>
			<? } ?>
			<? if ($eventoConfiguracaoXMLAtual->getInscricaoCurso15("PT") != "") {?>
			<option value="15" <?= ($_REQUEST["curso_num"]=="15") ? "selected" : "";?>> <?=$eventoConfiguracaoXMLAtual->getInscricaoCurso15("PT")?></option>
			<? } ?>
			<? if ($eventoConfiguracaoXMLAtual->getInscricaoCurso16("PT") != "") {?>
			<option value="16" <?= ($_REQUEST["curso_num"]=="16") ? "selected" : "";?>> <?=$eventoConfiguracaoXMLAtual->getInscricaoCurso16("PT")?></option>
			<? } ?>
			<? if ($eventoConfiguracaoXMLAtual->getInscricaoCurso17("PT") != "") {?>
			<option value="17" <?= ($_REQUEST["curso_num"]=="17") ? "selected" : "";?>> <?=$eventoConfiguracaoXMLAtual->getInscricaoCurso17("PT")?></option>
			<? } ?>
			<? if ($eventoConfiguracaoXMLAtual->getInscricaoCurso18("PT") != "") {?>
			<option value="18" <?= ($_REQUEST["curso_num"]=="18") ? "selected" : "";?>> <?=$eventoConfiguracaoXMLAtual->getInscricaoCurso18("PT")?></option>
			<? } ?>
			<? if ($eventoConfiguracaoXMLAtual->getInscricaoCurso19("PT") != "") {?>
			<option value="19" <?= ($_REQUEST["curso_num"]=="19") ? "selected" : "";?>> <?=$eventoConfiguracaoXMLAtual->getInscricaoCurso19("PT")?></option>
			<? } ?>
			<? if ($eventoConfiguracaoXMLAtual->getInscricaoCurso20("PT") != "") {?>
			<option value="20" <?= ($_REQUEST["curso_num"]=="20") ? "selected" : "";?>> <?=$eventoConfiguracaoXMLAtual->getInscricaoCurso20("PT")?></option>
			<? } ?>
			<? if ($eventoConfiguracaoXMLAtual->getInscricaoCurso21("PT") != "") {?>
			<option value="21" <?= ($_REQUEST["curso_num"]=="21") ? "selected" : "";?>> <?=$eventoConfiguracaoXMLAtual->getInscricaoCurso21("PT")?></option>
			<? } ?>
			<? if ($eventoConfiguracaoXMLAtual->getInscricaoCurso22("PT") != "") {?>
			<option value="22" <?= ($_REQUEST["curso_num"]=="22") ? "selected" : "";?>> <?=$eventoConfiguracaoXMLAtual->getInscricaoCurso22("PT")?></option>
			<? } ?>
			<? if ($eventoConfiguracaoXMLAtual->getInscricaoCurso23("PT") != "") {?>
			<option value="23" <?= ($_REQUEST["curso_num"]=="23") ? "selected" : "";?>> <?=$eventoConfiguracaoXMLAtual->getInscricaoCurso23("PT")?></option>
			<? } ?>
			<? if ($eventoConfiguracaoXMLAtual->getInscricaoCurso24("PT") != "") {?>
			<option value="24" <?= ($_REQUEST["curso_num"]=="24") ? "selected" : "";?>> <?=$eventoConfiguracaoXMLAtual->getInscricaoCurso24("PT")?></option>
			<? } ?>
			<? if ($eventoConfiguracaoXMLAtual->getInscricaoCurso25("PT") != "") {?>
			<option value="25" <?= ($_REQUEST["curso_num"]=="25") ? "selected" : "";?>> <?=$eventoConfiguracaoXMLAtual->getInscricaoCurso25("PT")?></option>
			<? } ?>
			<? if ($eventoConfiguracaoXMLAtual->getInscricaoCurso26("PT") != "") {?>
			<option value="26" <?= ($_REQUEST["curso_num"]=="26") ? "selected" : "";?>> <?=$eventoConfiguracaoXMLAtual->getInscricaoCurso26("PT")?></option>
			<? } ?>
			<? if ($eventoConfiguracaoXMLAtual->getInscricaoCurso27("PT") != "") {?>
			<option value="27" <?= ($_REQUEST["curso_num"]=="27") ? "selected" : "";?>> <?=$eventoConfiguracaoXMLAtual->getInscricaoCurso27("PT")?></option>
			<? } ?>
			<? if ($eventoConfiguracaoXMLAtual->getInscricaoCurso28("PT") != "") {?>
			<option value="28" <?= ($_REQUEST["curso_num"]=="28") ? "selected" : "";?>> <?=$eventoConfiguracaoXMLAtual->getInscricaoCurso28("PT")?></option>
			<? } ?>
			<? if ($eventoConfiguracaoXMLAtual->getInscricaoCurso29("PT") != "") {?>
			<option value="29" <?= ($_REQUEST["curso_num"]=="29") ? "selected" : "";?>> <?=$eventoConfiguracaoXMLAtual->getInscricaoCurso29("PT")?></option>
			<? } ?>
			<? if ($eventoConfiguracaoXMLAtual->getInscricaoCurso30("PT") != "") {?>
			<option value="30" <?= ($_REQUEST["curso_num"]=="30") ? "selected" : "";?>> <?=$eventoConfiguracaoXMLAtual->getInscricaoCurso30("PT")?></option>
			<? } ?>
		</select>
	</td>
	<td class="structFilter">&nbsp;&nbsp;&nbsp;</td>
	<td class="structFilter"><input type="submit" class="structFilterButton" value="Buscar"></td>
</tr>
</table>
</form>
<? } ?>
<div style="padding-top:8px;"></div>

<? if ($print) { ?>
<div style="width:100%;border:solid 1px #303030">
<table border="0" cellspacing="0" cellpadding="0" width="100%">
  <tr class="gridHeader">
<? } else { ?>
<!-- Grid de Listagem -->
<div class="gridContainer" id="tC" style="height:300px; width:100%;border:solid 1px #303030">
<table border="0" cellspacing="0" cellpadding="0" width="100%">
  <thead class="gridHeader">
  <tr class="gridHeader" style="top:expression(document.getElementById('tC').scrollTop);">
<? } ?>

	<td class="gridHeader" width="2%">&nbsp;</td>
    <td class="gridHeader">ID</td>
    <td class="gridHeader">Nome Completo</td>
    <td class="gridHeader">Categoria</td>
    <td class="gridHeader">Status Pgto</td>
    <td class="gridHeader">Origem</td>
	<td class="gridHeader" width="2%">&nbsp;</td>
	<td class="gridHeader" width="2%">&nbsp;</td>
	<td class="gridHeader" width="2%">&nbsp;</td>
	<td class="gridHeader" width="2%">&nbsp;</td>
	<td class="gridHeader" width="2%">&nbsp;</td>
  </tr>
  </thead>
  <tbody>
  <? for ($i = 0; $i < count($inscricaoList); $i++) {
		/* @var $inscricao Inscricao */
		$inscricao = $inscricaoList[$i]; ?>
  <tr>
    <td class="gridLineEven">&nbsp;</td>
    <td class="gridLineEven"><?= $inscricao->getID() ?>&nbsp;</td>
    <td class="gridLineEven"><?= $inscricao->getNOME() ?>&nbsp;</td>
    <td class="gridLineEven">
		<?= ($inscricao->getCATEGORIA()=="a") ? $eventoConfiguracaoXMLAtual->getInscricaoCategoriaA("PT") : "";?>
		<?= ($inscricao->getCATEGORIA()=="b") ? $eventoConfiguracaoXMLAtual->getInscricaoCategoriaB("PT") : "";?>
		<?= ($inscricao->getCATEGORIA()=="c") ? $eventoConfiguracaoXMLAtual->getInscricaoCategoriaC("PT") : "";?>
		<?= ($inscricao->getCATEGORIA()=="d") ? $eventoConfiguracaoXMLAtual->getInscricaoCategoriaD("PT") : "";?>
		<?= ($inscricao->getCATEGORIA()=="e") ? $eventoConfiguracaoXMLAtual->getInscricaoCategoriaE("PT") : "";?>
		<?= ($inscricao->getCATEGORIA()=="f") ? $eventoConfiguracaoXMLAtual->getInscricaoCategoriaF("PT") : "";?>
		<?= ($inscricao->getCATEGORIA()=="g") ? $eventoConfiguracaoXMLAtual->getInscricaoCategoriaG("PT") : "";?>
		<?= ($inscricao->getCATEGORIA()=="h") ? $eventoConfiguracaoXMLAtual->getInscricaoCategoriaH("PT") : "";?>
		<?= ($inscricao->getCATEGORIA()=="i") ? $eventoConfiguracaoXMLAtual->getInscricaoCategoriaI("PT") : "";?>
		<?= ($inscricao->getCATEGORIA()=="j") ? $eventoConfiguracaoXMLAtual->getInscricaoCategoriaJ("PT") : "";?>
		<?= ($inscricao->getCATEGORIA()=="k") ? $eventoConfiguracaoXMLAtual->getInscricaoCategoriaK("PT") : "";?>
		<?= ($inscricao->getCATEGORIA()=="l") ? $eventoConfiguracaoXMLAtual->getInscricaoCategoriaL("PT") : "";?>
		<?= ($inscricao->getCATEGORIA()=="m") ? $eventoConfiguracaoXMLAtual->getInscricaoCategoriaM("PT") : "";?>
		<?= ($inscricao->getCATEGORIA()=="n") ? $eventoConfiguracaoXMLAtual->getInscricaoCategoriaN("PT") : "";?>
		<?= ($inscricao->getCATEGORIA()=="o") ? $eventoConfiguracaoXMLAtual->getInscricaoCategoriaO("PT") : "";?>
		<?= ($inscricao->getCATEGORIA()=="p") ? $eventoConfiguracaoXMLAtual->getInscricaoCategoriaP("PT") : "";?>
		<?= ($inscricao->getCATEGORIA()=="q") ? $eventoConfiguracaoXMLAtual->getInscricaoCategoriaQ("PT") : "";?>
		<?= ($inscricao->getCATEGORIA()=="r") ? $eventoConfiguracaoXMLAtual->getInscricaoCategoriaR("PT") : "";?>
		<?= ($inscricao->getCATEGORIA()=="s") ? $eventoConfiguracaoXMLAtual->getInscricaoCategoriaS("PT") : "";?>
		<?= ($inscricao->getCATEGORIA()=="t") ? $eventoConfiguracaoXMLAtual->getInscricaoCategoriaT("PT") : "";?>
		<?= ($inscricao->getCATEGORIA()=="u") ? $eventoConfiguracaoXMLAtual->getInscricaoCategoriaU("PT") : "";?>
		<?= ($inscricao->getCATEGORIA()=="v") ? $eventoConfiguracaoXMLAtual->getInscricaoCategoriaV("PT") : "";?>
		<?= ($inscricao->getCATEGORIA()=="w") ? $eventoConfiguracaoXMLAtual->getInscricaoCategoriaW("PT") : "";?>
		<?= ($inscricao->getCATEGORIA()=="x") ? $eventoConfiguracaoXMLAtual->getInscricaoCategoriaX("PT") : "";?>
		<?= ($inscricao->getCATEGORIA()=="y") ? $eventoConfiguracaoXMLAtual->getInscricaoCategoriaY("PT") : "";?>
		<?= ($inscricao->getCATEGORIA()=="z") ? $eventoConfiguracaoXMLAtual->getInscricaoCategoriaZ("PT") : "";?>
		&nbsp;
    </td>
    <td class="gridLineEven">
		<?= ($inscricao->getSTATUS_PGTO()=="a") ? "Aguarda Pagamento" : "";?>
		<?= ($inscricao->getSTATUS_PGTO()=="c") ? "Aguarda Confirmação" : "";?>
		<?= ($inscricao->getSTATUS_PGTO()=="o") ? "Pagamento OK" : "";?>
		<?= ($inscricao->getSTATUS_PGTO()=="g") ? "Cortesia" : "";?>
		&nbsp;
    </td>
    <td class="gridLineEven">
		<?= ($inscricao->getORIGEM()=="i") ? "Interno" : "";?>
		<?= ($inscricao->getORIGEM()=="s") ? "Site" : "";?>
		<?= ($inscricao->getORIGEM()=="l") ? "Local" : "";?>
		<?= ($inscricao->getORIGEM()=="") ? "-" : "";?>
		&nbsp;
	</td>
    <td class="gridLineEven"><? if ($inscricao->getSTATUS()=="2") { ?><a href="inscricao_simples_edit.php?id=<?= $inscricao->getID() ?>">Efetivar</a><? } ?>&nbsp;</td>
    <td class="gridLineEven"><? if (!$print) { ?><a href="inscricao_edit.php?id=<?= $inscricao->getID() ?>">Editar</a><? } ?>&nbsp;</td>
    <td class="gridLineEven"><? if (!$print) { ?><a href="inscricao_simples_view.php?id=<?= $inscricao->getID() ?>">Imprimir</a><? } ?>&nbsp;</td>
    <td class="gridLineEven"><? if (!$print) { ?><a href="inscricao_delete_xp.php?insc_id=<?= $inscricao->getID() ?>" onclick="return confirm('Você tem certeza que deseja excluir?\n(essa operação não pode ser desfeita)')">Excluir</a><? } ?>&nbsp;</td>
    <td class="gridLineEven">&nbsp;</td>
  </tr>
  <? }; ?>
  </tbody>
</table>
</div>



<? include_once("struct/struct_bottom.php")?>
<? } ?>