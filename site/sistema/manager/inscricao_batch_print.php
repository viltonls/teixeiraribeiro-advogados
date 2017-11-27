<? include_once("struct/auth.php");

if (!session_is_registered("evento")) { 
	header("Location: session_seleciona_evento.php?url=inscricao_batch_filter.php&orga_id=0&configurado=1");
} else {
	
	$_SESSION["batch_order_by"] = $_REQUEST["order_by"];
	$_SESSION["batch_insc_id_ultimo"] = $_REQUEST["insc_id_ultimo"];
	$_SESSION["batch_imprimir"] = $_REQUEST["imprimir"];
	$_SESSION["batch_insc_status_pgto"] = $_REQUEST["insc_status_pgto"];
	$_SESSION["batch_prot_cdrom"] = $_REQUEST["prot_cdrom"];
	$_SESSION["batch_prot_cracha"] = $_REQUEST["prot_cracha"];
	$_SESSION["batch_prot_pasta"] = $_REQUEST["prot_pasta"];
	$_SESSION["batch_prot_recibo"] = $_REQUEST["prot_recibo"];
	$_SESSION["batch_insc_opcao_1"] = $_REQUEST["insc_opcao_1"];
	$_SESSION["batch_insc_opcao_2"] = $_REQUEST["insc_opcao_2"];
	$_SESSION["batch_insc_opcao_3"] = $_REQUEST["insc_opcao_3"];
	$_SESSION["batch_insc_opcao_4"] = $_REQUEST["insc_opcao_4"];
	$_SESSION["batch_insc_opcao_5"] = $_REQUEST["insc_opcao_5"];
	$_SESSION["batch_insc_opcao_6"] = $_REQUEST["insc_opcao_6"];
	$_SESSION["batch_insc_categoria_a"] = $_REQUEST["insc_categoria_a"];
	$_SESSION["batch_insc_categoria_b"] = $_REQUEST["insc_categoria_b"];
	$_SESSION["batch_insc_categoria_c"] = $_REQUEST["insc_categoria_c"];
	$_SESSION["batch_insc_categoria_d"] = $_REQUEST["insc_categoria_d"];
	$_SESSION["batch_insc_categoria_e"] = $_REQUEST["insc_categoria_e"];
	$_SESSION["batch_insc_categoria_f"] = $_REQUEST["insc_categoria_f"];
	$_SESSION["batch_insc_categoria_g"] = $_REQUEST["insc_categoria_g"];
	$_SESSION["batch_insc_categoria_h"] = $_REQUEST["insc_categoria_h"];
	$_SESSION["batch_insc_categoria_i"] = $_REQUEST["insc_categoria_i"];
	$_SESSION["batch_insc_categoria_j"] = $_REQUEST["insc_categoria_j"];
	$_SESSION["batch_insc_categoria_k"] = $_REQUEST["insc_categoria_k"];
	$_SESSION["batch_insc_categoria_l"] = $_REQUEST["insc_categoria_l"];
	$_SESSION["batch_insc_categoria_m"] = $_REQUEST["insc_categoria_m"];
	$_SESSION["batch_insc_categoria_n"] = $_REQUEST["insc_categoria_n"];
	$_SESSION["batch_insc_categoria_o"] = $_REQUEST["insc_categoria_o"];
	$_SESSION["batch_insc_categoria_p"] = $_REQUEST["insc_categoria_p"];
	$_SESSION["batch_insc_categoria_q"] = $_REQUEST["insc_categoria_q"];
	$_SESSION["batch_insc_categoria_r"] = $_REQUEST["insc_categoria_r"];
	$_SESSION["batch_insc_categoria_s"] = $_REQUEST["insc_categoria_s"];
	$_SESSION["batch_insc_categoria_t"] = $_REQUEST["insc_categoria_t"];
	$_SESSION["batch_insc_categoria_u"] = $_REQUEST["insc_categoria_u"];
	$_SESSION["batch_insc_categoria_v"] = $_REQUEST["insc_categoria_v"];
	$_SESSION["batch_insc_categoria_w"] = $_REQUEST["insc_categoria_w"];
	$_SESSION["batch_insc_categoria_x"] = $_REQUEST["insc_categoria_x"];
	$_SESSION["batch_insc_categoria_y"] = $_REQUEST["insc_categoria_y"];
	$_SESSION["batch_insc_categoria_z"] = $_REQUEST["insc_categoria_z"];
	
	//include_once("struct/struct_top.php");
	include_once('../classes/class.inscricao.php');
	include_once('../classes/service.inscricao.php');
	include_once("struct/struct_functions.php");
	
	$order_by = $_REQUEST["order_by"];
	
	$opcoes = "";
	if ($_REQUEST["insc_opcao_1"] == "on") $opcoes .= "1,";
	if ($_REQUEST["insc_opcao_2"] == "on") $opcoes .= "2,";
	if ($_REQUEST["insc_opcao_3"] == "on") $opcoes .= "3,";
	if ($_REQUEST["insc_opcao_4"] == "on") $opcoes .= "4,";
	if ($_REQUEST["insc_opcao_5"] == "on") $opcoes .= "5,";
	if ($_REQUEST["insc_opcao_6"] == "on") $opcoes .= "6,";

	$categorias = "";
	if ($_REQUEST["insc_categoria_a"] == "on") $categorias .= "a,";
	if ($_REQUEST["insc_categoria_b"] == "on") $categorias .= "b,";
	if ($_REQUEST["insc_categoria_c"] == "on") $categorias .= "c,";
	if ($_REQUEST["insc_categoria_d"] == "on") $categorias .= "d,";
	if ($_REQUEST["insc_categoria_e"] == "on") $categorias .= "e,";
	if ($_REQUEST["insc_categoria_f"] == "on") $categorias .= "f,";
	if ($_REQUEST["insc_categoria_g"] == "on") $categorias .= "g,";
	if ($_REQUEST["insc_categoria_h"] == "on") $categorias .= "h,";
	if ($_REQUEST["insc_categoria_i"] == "on") $categorias .= "i,";
	if ($_REQUEST["insc_categoria_j"] == "on") $categorias .= "j,";
	if ($_REQUEST["insc_categoria_k"] == "on") $categorias .= "k,";
	if ($_REQUEST["insc_categoria_l"] == "on") $categorias .= "l,";
	if ($_REQUEST["insc_categoria_m"] == "on") $categorias .= "m,";
	if ($_REQUEST["insc_categoria_n"] == "on") $categorias .= "n,";
	if ($_REQUEST["insc_categoria_o"] == "on") $categorias .= "o,";
	if ($_REQUEST["insc_categoria_p"] == "on") $categorias .= "p,";
	if ($_REQUEST["insc_categoria_q"] == "on") $categorias .= "q,";
	if ($_REQUEST["insc_categoria_r"] == "on") $categorias .= "r,";
	if ($_REQUEST["insc_categoria_s"] == "on") $categorias .= "s,";
	if ($_REQUEST["insc_categoria_t"] == "on") $categorias .= "t,";
	if ($_REQUEST["insc_categoria_u"] == "on") $categorias .= "u,";
	if ($_REQUEST["insc_categoria_v"] == "on") $categorias .= "v,";
	if ($_REQUEST["insc_categoria_w"] == "on") $categorias .= "w,";
	if ($_REQUEST["insc_categoria_x"] == "on") $categorias .= "x,";
	if ($_REQUEST["insc_categoria_y"] == "on") $categorias .= "y,";
	if ($_REQUEST["insc_categoria_z"] == "on") $categorias .= "z,";
	
	if ($_REQUEST["insc_status_pgto"] == "all") $status_pgto = "t";
	if ($_REQUEST["insc_status_pgto"] == "y") $status_pgto = "o";
	if ($_REQUEST["insc_status_pgto"] == "n") $status_pgto = "a,c";
	if ($_REQUEST["insc_status_pgto"] == "g") $status_pgto = "g";

	// Se for acompanhante, coloca o filtro na listagem
	if (($_REQUEST["imprimir"]) == "protocolo_acompanhante" || ($_REQUEST["imprimir"]) == "cracha_acompanhante") $list_acomp = 1; else $list_acomp = 0;
	
	/* @var $eventoAtual Evento */
	$inscricaoService = new InscricaoService();
	$inscricaoList = $inscricaoService->listInscricoesByEventoFiltered($eventoAtual->getID(),$order_by,"",$categorias,$opcoes,"","",$status_pgto,"",$list_acomp);
	//echo "Categorias: ".$categorias."<br>";
	//echo "Encontradas ".count($inscricaoList)." inscrições.<br><br>";
	
	$print = true;
	$print_counter = 0;

	if ($_REQUEST["insc_id_ultimo"]) {
		$print = false;	
		$insc_id_ultimo = $_REQUEST["insc_id_ultimo"];
	}

	
	// Imprime o cabeçalho
	switch ($_REQUEST["imprimir"]) {
			case "recibo_pf":
			case "recibo_pj":
			case "protocolo":
			case "protocolo_acompanhante":
				header("Content-type: text/html; charset=ISO-8859-1");
				/* @var $eventoConfiguracaoAtual Configuracao */
				?>
				<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.0 Transitional//EN">
				<HTML>
				<HEAD>
				<TITLE></TITLE>
				</HEAD>
				<BODY align="center" leftmargin="0" topmargin="0" rightmargin="0" bottommargin="0" marginwidth="0" marginheight="0" onload="print();">
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
				
				break;
			case "cracha":
			case "cracha_acompanhante":
				header("Content-type: text/html; charset=ISO-8859-1");
				/* @var $eventoConfiguracaoAtual Configuracao */
				?>
				<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.0 Transitional//EN">
				<HTML>
				<HEAD>
				<TITLE></TITLE>
				<style type="text/css">
				td,div,body {font-family:arial, helvetica; font-size:8pt;}
				</style>
				</HEAD>
				<BODY align="center" leftmargin="0" topmargin="0" rightmargin="0" bottommargin="0" marginwidth="0" marginheight="0" onload="javascript:print();">
				<div align="center">				
				<?
				break;
			case "certificado":
				include_once("struct/csv_header.php");
				echo "Id;";
				echo "Nome;";
				echo "Org. Nome;";
				echo "Categoria;";
				echo "\n";
				break;
	}	
	
	$ultimo_estado = "";

	// Imprime o conteúdo
	if (sizeof($inscricaoList) > 0) {
		echo "Qtd: ".sizeof($inscricaoList);
		echo '<div style="page-break-after:always"></div><br>';
		foreach ($inscricaoList as $inscricao) {
			if ($print) {
				// Se é ordenação por estado então mostra estado
				if ($order_by == "INSC_ESTADO ASC, INSC_NOME ASC") {
					//echo "UF: ".$inscricao->getESTADO()."<br>";
					if ($ultimo_estado != $inscricao->getESTADO()) {
						$ultimo_estado = $inscricao->getESTADO();
						if (($print_counter % 3) != 0 && ($_REQUEST["imprimir"] == "protocolo" || $_REQUEST["imprimir"] == "protocolo_acompanhante")) echo '<div style="page-break-after:always"></div><br>';
						echo "Inscritos do Estado: ".$ultimo_estado;
						echo '<div style="page-break-after:always"></div><br>';
						$print_counter = 0;
					}
				}
				
				//echo $inscricao->getID().": ".$inscricao->getNOME()." (".$inscricao->getORG_NOME().") / ".$inscricao->getESTADO()."<br>";
				switch ($_REQUEST["imprimir"]) {
						case "recibo_pf":
						case "recibo_pj":
							if ($_REQUEST["imprimir"]=="recibo_pf") $tipo_recibo="pf"; else $tipo_recibo="pj";
							include("template_recibo.php");
							echo '<div style="page-break-after:always"></div><br>';
							//echo '<div style="height:1.8cm; width:18cm; font-family:arial, helvetica; font-size:10pt;"></div>';
							break;
						case "protocolo":
							// Identifica quais itens devem ser marcados
							if ($_REQUEST["prot_cdrom"] == "on") {
								$check_cdrom = true;
							}
							if ($_REQUEST["prot_cracha"] == "on") {
								$check_cracha = true;
							}
							if ($_REQUEST["prot_pasta"] == "on") {
								$check_pasta = true;
							}
							if ($_REQUEST["prot_recibo"] == "on") {
								$check_recibo = true;
							}
							
							// A cada 3 protocolos, quebra a página
							if ($print_counter && ($print_counter % 3 == 0)) { ?>
								<div style="page-break-after:always"></div>
								<div style="height:1.8cm; width:18cm; font-family:arial, helvetica; font-size:10pt;"></div>						
							<? } else { ?>
								<div style="height:1.5cm; width:18cm; font-family:arial, helvetica; font-size:10pt;"></div>						
							<? } 
							//echo $print_counter % 2 ."<br>";
							include("template_protocolo.php");
							break;
						case "protocolo_acompanhante":
							if ($inscricao->getACOMP()) {
								// A cada 3 protocolos, quebra a página
								if ($print_counter && ($print_counter % 3 == 0)) { ?>
									<div style="page-break-after:always"></div>
									<div style="height:1.8cm; width:18cm; font-family:arial, helvetica; font-size:10pt;"></div>						
								<? } else { ?>
									<div style="height:1.5cm; width:18cm; font-family:arial, helvetica; font-size:10pt;"></div>						
								<? } 
								//echo $print_counter % 2 ."<br>";
								include("template_protocolo_acompanhante.php");
							}
							break;
						case "cracha":
							include('template_cracha.php');
							echo '<div style="page-break-after:always"></div><br>';
							break;
						case "cracha_acompanhante":
							if ($inscricao->getACOMP()) {
								include('template_cracha_acompanhante.php');
								echo '<div style="page-break-after:always"></div><br>';
							}
							break;
						case "certificado":
							echo $inscricao->getID().";";
							echo $inscricao->getNOME().";";
							echo $inscricao->getORG_NOME().";";
							switch ($inscricao->getCATEGORIA()) {
								case "a": echo $eventoConfiguracaoXMLAtual->getInscricaoCategoriaA("PT").";"; break;
								case "b": echo $eventoConfiguracaoXMLAtual->getInscricaoCategoriaB("PT").";"; break;
								case "c": echo $eventoConfiguracaoXMLAtual->getInscricaoCategoriaC("PT").";"; break;
								case "d": echo $eventoConfiguracaoXMLAtual->getInscricaoCategoriaD("PT").";"; break;
								case "e": echo $eventoConfiguracaoXMLAtual->getInscricaoCategoriaE("PT").";"; break;
								case "f": echo $eventoConfiguracaoXMLAtual->getInscricaoCategoriaF("PT").";"; break;
								case "g": echo $eventoConfiguracaoXMLAtual->getInscricaoCategoriaG("PT").";"; break;
								case "h": echo $eventoConfiguracaoXMLAtual->getInscricaoCategoriaH("PT").";"; break;
								case "i": echo $eventoConfiguracaoXMLAtual->getInscricaoCategoriaI("PT").";"; break;
								case "j": echo $eventoConfiguracaoXMLAtual->getInscricaoCategoriaJ("PT").";"; break;
								case "k": echo $eventoConfiguracaoXMLAtual->getInscricaoCategoriaK("PT").";"; break;
								case "l": echo $eventoConfiguracaoXMLAtual->getInscricaoCategoriaL("PT").";"; break;
								case "m": echo $eventoConfiguracaoXMLAtual->getInscricaoCategoriaM("PT").";"; break;
								case "n": echo $eventoConfiguracaoXMLAtual->getInscricaoCategoriaN("PT").";"; break;
								case "o": echo $eventoConfiguracaoXMLAtual->getInscricaoCategoriaO("PT").";"; break;
								case "p": echo $eventoConfiguracaoXMLAtual->getInscricaoCategoriaP("PT").";"; break;
								case "q": echo $eventoConfiguracaoXMLAtual->getInscricaoCategoriaQ("PT").";"; break;
								case "r": echo $eventoConfiguracaoXMLAtual->getInscricaoCategoriaR("PT").";"; break;
								case "s": echo $eventoConfiguracaoXMLAtual->getInscricaoCategoriaS("PT").";"; break;
								case "t": echo $eventoConfiguracaoXMLAtual->getInscricaoCategoriaT("PT").";"; break;
								case "u": echo $eventoConfiguracaoXMLAtual->getInscricaoCategoriaU("PT").";"; break;
								case "v": echo $eventoConfiguracaoXMLAtual->getInscricaoCategoriaV("PT").";"; break;
								case "w": echo $eventoConfiguracaoXMLAtual->getInscricaoCategoriaW("PT").";"; break;
								case "x": echo $eventoConfiguracaoXMLAtual->getInscricaoCategoriaX("PT").";"; break;
								case "y": echo $eventoConfiguracaoXMLAtual->getInscricaoCategoriaY("PT").";"; break;
								case "z": echo $eventoConfiguracaoXMLAtual->getInscricaoCategoriaZ("PT").";"; break;
								default: echo ";"; break;
							}
							echo "\n";
							break;
					}	
				$print_counter++;
			}
			if ($inscricao->getID() == $insc_id_ultimo) {
				$print = true;
			}
		}
	}

	// Imprime o rodapé
	switch ($_REQUEST["imprimir"]) {
			case "recibo_pf":
			case "recibo_pj":
			case "protocolo":
			case "protocolo_acompanhante":
				?>
				</div></BODY>
				</HTML>
				<?
				
				break;
			case "cracha":
			case "cracha_acompanhante":
				?>
				</div></BODY>
				</HTML>				
				<?
				break;
			case "certificado":
				
				break;
	}	
	
	
}