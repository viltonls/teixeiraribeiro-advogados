<?
include_once("struct/auth.php");
if (!session_is_registered("evento")) { 
	header("Location: session_seleciona_evento.php?url=inscricao_export_csv.php&orga_id=0&configurado=1");
} else {

	include_once("struct/csv_header.php");
	
	include_once('../classes/class.inscricao.php');
	include_once('../classes/service.inscricao.php');


	// Pega o conteúdo dos arquivos
	$file_entrada_1 = file_get_contents($_FILES['file_entrada_1']['tmp_name']);
	$file_entrada_2 = file_get_contents($_FILES['file_entrada_2']['tmp_name']);
	$file_entrada_3 = file_get_contents($_FILES['file_entrada_3']['tmp_name']);
	$file_entrada_4 = file_get_contents($_FILES['file_entrada_4']['tmp_name']);
	$file_entrada_5 = file_get_contents($_FILES['file_entrada_5']['tmp_name']);
	
	$file_entrada_all = $file_entrada_1 ."\n".
						$file_entrada_2 ."\n".
						$file_entrada_3 ."\n".
						$file_entrada_4 ."\n".
						$file_entrada_5;
	
	$file_saida_1 = file_get_contents($_FILES['file_saida_1']['tmp_name']);
	$file_saida_2 = file_get_contents($_FILES['file_saida_2']['tmp_name']);
	$file_saida_3 = file_get_contents($_FILES['file_saida_3']['tmp_name']);
	$file_saida_4 = file_get_contents($_FILES['file_saida_4']['tmp_name']);
	$file_saida_5 = file_get_contents($_FILES['file_saida_5']['tmp_name']);

	$file_saida_all = $file_saida_1 ."\n".
					  $file_saida_2 ."\n".
					  $file_saida_3 ."\n".
					  $file_saida_4 ."\n".
					  $file_saida_5;
    
	//echo "Arquivos de Entrada:<br>".$file_entrada_all."<br><br>";
	//echo "Arquivos de Saída:<br>".$file_saida_all."<br><br>";
	
	$file_entrada_array = explode("\n",$file_entrada_all);
	$file_saida_array = explode("\n",$file_saida_all);
	
					  
    /*
      Monta array com IDs de Entrada
      Monta array com IDs de Saída
      
      Para cada ID de Entrada
      	Pega no BD a Inscrição pelo ID
      	Verifica se está na lista de Saída
      	Imprime linha do CSV
    
    */
	
	/* @var $eventoAtual Evento */
	/* @var $eventoConfiguracaoAtual Configuracao */
	
	$inscricaoService = new InscricaoService();

	
	//echo "<br><br><br>";
	
	echo " ";
	echo "Id;";
	echo "Data Inscrição;";
	echo "Status;";
	echo "Origem;";
	echo "Nome;";
	echo "Crachá;";
	echo "ID Externo;";
	echo "Sexo;";
	echo "Nascimento;";
	echo "CPF / Passaporte;";
	echo "Registro Prof.;";
	echo "Especialidade;";
	echo "Email;";
	echo "DDI;";
	echo "DDD;";
	echo "Fone;";
	echo "Celular;";
	echo "Fax;";
	echo "Endereço;";
	echo "CEP;";
	echo "Bairro;";
	echo "Cidade;";
	echo "Estado;";
	echo "País;";
	echo "Tipo;";
	echo "Categoria;";
	echo "Valor;";
	echo "Status Pgto.;";
	echo "Forma Pgto.;";
	echo "Org. Nome;";
	echo "Org. Fone;";
	echo "Org. CNPJ;";
	echo "Org. Endereço;";
	echo "Org. Cidade;";
	echo "Org. Website;";
	echo "Acompanhante;";
	echo "Obs;";
	if ($eventoConfiguracaoXMLAtual->getInscricaoTexto1("PT")) echo "<td>". $eventoConfiguracaoXMLAtual->getInscricaoTexto1().";";
	if ($eventoConfiguracaoXMLAtual->getInscricaoTexto2("PT")) echo "<td>". $eventoConfiguracaoXMLAtual->getInscricaoTexto2().";";
	if ($eventoConfiguracaoXMLAtual->getInscricaoTexto3("PT")) echo "<td>". $eventoConfiguracaoXMLAtual->getInscricaoTexto3().";";
	if ($eventoConfiguracaoXMLAtual->getInscricaoTexto4("PT")) echo "<td>". $eventoConfiguracaoXMLAtual->getInscricaoTexto4().";";
	if ($eventoConfiguracaoXMLAtual->getInscricaoTexto5("PT")) echo "<td>". $eventoConfiguracaoXMLAtual->getInscricaoTexto5().";";
	if ($eventoConfiguracaoXMLAtual->getInscricaoTexto6("PT")) echo "<td>". $eventoConfiguracaoXMLAtual->getInscricaoTexto6().";";
	if ($eventoConfiguracaoXMLAtual->getInscricaoTexto7("PT")) echo "<td>". $eventoConfiguracaoXMLAtual->getInscricaoTexto7().";";
	if ($eventoConfiguracaoXMLAtual->getInscricaoTexto8("PT")) echo "<td>". $eventoConfiguracaoXMLAtual->getInscricaoTexto8().";";
	if ($eventoConfiguracaoXMLAtual->getInscricaoTexto9("PT")) echo "<td>". $eventoConfiguracaoXMLAtual->getInscricaoTexto9().";";
	if ($eventoConfiguracaoXMLAtual->getInscricaoTexto10("PT")) echo "<td>". $eventoConfiguracaoXMLAtual->getInscricaoTexto10().";";
	if ($eventoConfiguracaoXMLAtual->getInscricaoBool1("PT")) echo "<td>". $eventoConfiguracaoXMLAtual->getInscricaoBool1().";";
	if ($eventoConfiguracaoXMLAtual->getInscricaoBool2("PT")) echo "<td>". $eventoConfiguracaoXMLAtual->getInscricaoBool2().";";
	if ($eventoConfiguracaoXMLAtual->getInscricaoBool3("PT")) echo "<td>". $eventoConfiguracaoXMLAtual->getInscricaoBool3().";";
	if ($eventoConfiguracaoXMLAtual->getInscricaoBool4("PT")) echo "<td>". $eventoConfiguracaoXMLAtual->getInscricaoBool4().";";
	if ($eventoConfiguracaoXMLAtual->getInscricaoBool5("PT")) echo "<td>". $eventoConfiguracaoXMLAtual->getInscricaoBool5().";";
	if ($eventoConfiguracaoXMLAtual->getInscricaoBool6("PT")) echo "<td>". $eventoConfiguracaoXMLAtual->getInscricaoBool6().";";
	if ($eventoConfiguracaoXMLAtual->getInscricaoBool7("PT")) echo "<td>". $eventoConfiguracaoXMLAtual->getInscricaoBool7().";";
	if ($eventoConfiguracaoXMLAtual->getInscricaoBool8("PT")) echo "<td>". $eventoConfiguracaoXMLAtual->getInscricaoBool8().";";
	if ($eventoConfiguracaoXMLAtual->getInscricaoBool9("PT")) echo "<td>". $eventoConfiguracaoXMLAtual->getInscricaoBool9().";";
	if ($eventoConfiguracaoXMLAtual->getInscricaoBool10("PT")) echo "<td>". $eventoConfiguracaoXMLAtual->getInscricaoBool10().";";
	if ($eventoConfiguracaoXMLAtual->getInscricaoBool11("PT")) echo "<td>". $eventoConfiguracaoXMLAtual->getInscricaoBool11().";";
	if ($eventoConfiguracaoXMLAtual->getInscricaoBool12("PT")) echo "<td>". $eventoConfiguracaoXMLAtual->getInscricaoBool12().";";
	if ($eventoConfiguracaoXMLAtual->getInscricaoBool13("PT")) echo "<td>". $eventoConfiguracaoXMLAtual->getInscricaoBool13().";";
	if ($eventoConfiguracaoXMLAtual->getInscricaoBool14("PT")) echo "<td>". $eventoConfiguracaoXMLAtual->getInscricaoBool14().";";
	if ($eventoConfiguracaoXMLAtual->getInscricaoBool15("PT")) echo "<td>". $eventoConfiguracaoXMLAtual->getInscricaoBool15().";";
	if ($eventoConfiguracaoXMLAtual->getInscricaoBool16("PT")) echo "<td>". $eventoConfiguracaoXMLAtual->getInscricaoBool16().";";
	if ($eventoConfiguracaoXMLAtual->getInscricaoBool17("PT")) echo "<td>". $eventoConfiguracaoXMLAtual->getInscricaoBool17().";";
	if ($eventoConfiguracaoXMLAtual->getInscricaoBool18("PT")) echo "<td>". $eventoConfiguracaoXMLAtual->getInscricaoBool18().";";
	if ($eventoConfiguracaoXMLAtual->getInscricaoBool19("PT")) echo "<td>". $eventoConfiguracaoXMLAtual->getInscricaoBool19().";";
	if ($eventoConfiguracaoXMLAtual->getInscricaoBool20("PT")) echo "<td>". $eventoConfiguracaoXMLAtual->getInscricaoBool20().";";
	if ($eventoConfiguracaoXMLAtual->getInscricaoCurso1("PT")) echo "<td>". $eventoConfiguracaoXMLAtual->getInscricaoCurso1().";";
	if ($eventoConfiguracaoXMLAtual->getInscricaoCurso2("PT")) echo "<td>". $eventoConfiguracaoXMLAtual->getInscricaoCurso2().";";
	if ($eventoConfiguracaoXMLAtual->getInscricaoCurso3("PT")) echo "<td>". $eventoConfiguracaoXMLAtual->getInscricaoCurso3().";";
	if ($eventoConfiguracaoXMLAtual->getInscricaoCurso4("PT")) echo "<td>". $eventoConfiguracaoXMLAtual->getInscricaoCurso4().";";
	if ($eventoConfiguracaoXMLAtual->getInscricaoCurso5("PT")) echo "<td>". $eventoConfiguracaoXMLAtual->getInscricaoCurso5().";";
	if ($eventoConfiguracaoXMLAtual->getInscricaoCurso6("PT")) echo "<td>". $eventoConfiguracaoXMLAtual->getInscricaoCurso6().";";
	if ($eventoConfiguracaoXMLAtual->getInscricaoCurso7("PT")) echo "<td>". $eventoConfiguracaoXMLAtual->getInscricaoCurso7().";";
	if ($eventoConfiguracaoXMLAtual->getInscricaoCurso8("PT")) echo "<td>". $eventoConfiguracaoXMLAtual->getInscricaoCurso8().";";
	if ($eventoConfiguracaoXMLAtual->getInscricaoCurso9("PT")) echo "<td>". $eventoConfiguracaoXMLAtual->getInscricaoCurso9().";";
	if ($eventoConfiguracaoXMLAtual->getInscricaoCurso10("PT")) echo "<td>". $eventoConfiguracaoXMLAtual->getInscricaoCurso10().";";
	if ($eventoConfiguracaoXMLAtual->getInscricaoCurso11("PT")) echo "<td>". $eventoConfiguracaoXMLAtual->getInscricaoCurso11().";";
	if ($eventoConfiguracaoXMLAtual->getInscricaoCurso12("PT")) echo "<td>". $eventoConfiguracaoXMLAtual->getInscricaoCurso12().";";
	if ($eventoConfiguracaoXMLAtual->getInscricaoCurso13("PT")) echo "<td>". $eventoConfiguracaoXMLAtual->getInscricaoCurso13().";";
	if ($eventoConfiguracaoXMLAtual->getInscricaoCurso14("PT")) echo "<td>". $eventoConfiguracaoXMLAtual->getInscricaoCurso14().";";
	if ($eventoConfiguracaoXMLAtual->getInscricaoCurso15("PT")) echo "<td>". $eventoConfiguracaoXMLAtual->getInscricaoCurso15().";";
	if ($eventoConfiguracaoXMLAtual->getInscricaoCurso16("PT")) echo "<td>". $eventoConfiguracaoXMLAtual->getInscricaoCurso16().";";
	if ($eventoConfiguracaoXMLAtual->getInscricaoCurso17("PT")) echo "<td>". $eventoConfiguracaoXMLAtual->getInscricaoCurso17().";";
	if ($eventoConfiguracaoXMLAtual->getInscricaoCurso18("PT")) echo "<td>". $eventoConfiguracaoXMLAtual->getInscricaoCurso18().";";
	if ($eventoConfiguracaoXMLAtual->getInscricaoCurso19("PT")) echo "<td>". $eventoConfiguracaoXMLAtual->getInscricaoCurso19().";";
	if ($eventoConfiguracaoXMLAtual->getInscricaoCurso20("PT")) echo "<td>". $eventoConfiguracaoXMLAtual->getInscricaoCurso20().";";
	if ($eventoConfiguracaoXMLAtual->getInscricaoCurso21("PT")) echo "<td>". $eventoConfiguracaoXMLAtual->getInscricaoCurso21().";";
	if ($eventoConfiguracaoXMLAtual->getInscricaoCurso22("PT")) echo "<td>". $eventoConfiguracaoXMLAtual->getInscricaoCurso22().";";
	if ($eventoConfiguracaoXMLAtual->getInscricaoCurso23("PT")) echo "<td>". $eventoConfiguracaoXMLAtual->getInscricaoCurso23().";";
	if ($eventoConfiguracaoXMLAtual->getInscricaoCurso24("PT")) echo "<td>". $eventoConfiguracaoXMLAtual->getInscricaoCurso24().";";
	if ($eventoConfiguracaoXMLAtual->getInscricaoCurso25("PT")) echo "<td>". $eventoConfiguracaoXMLAtual->getInscricaoCurso25().";";
	if ($eventoConfiguracaoXMLAtual->getInscricaoCurso26("PT")) echo "<td>". $eventoConfiguracaoXMLAtual->getInscricaoCurso26().";";
	if ($eventoConfiguracaoXMLAtual->getInscricaoCurso27("PT")) echo "<td>". $eventoConfiguracaoXMLAtual->getInscricaoCurso27().";";
	if ($eventoConfiguracaoXMLAtual->getInscricaoCurso28("PT")) echo "<td>". $eventoConfiguracaoXMLAtual->getInscricaoCurso28().";";
	if ($eventoConfiguracaoXMLAtual->getInscricaoCurso29("PT")) echo "<td>". $eventoConfiguracaoXMLAtual->getInscricaoCurso29().";";
	if ($eventoConfiguracaoXMLAtual->getInscricaoCurso30("PT")) echo "<td>". $eventoConfiguracaoXMLAtual->getInscricaoCurso30().";";
	echo "Entrada;";
	echo "Saída;";
	echo "\r\n";
	//echo "<br><br>";
	
	//echo "Foram encontradas ".count($file_entrada_array)." inscrições de entrada.<br>";
	//echo "Foram encontradas ".count($file_saida_array)." inscrições de saída.<br>";
	//echo "<br>";
	
	for ($i = 0; $i < count($file_entrada_array); $i++) {

		// Pega a linha do arquivo de entrada
		$file_entrada_line = explode(";",trim($file_entrada_array[$i]));
		$entrada_insc_id = trim($file_entrada_line[0]);
		$entrada_horario = $file_entrada_line[1]." ".$file_entrada_line[2];

		if (is_numeric($entrada_insc_id)) {
			
			// Pega a inscrição no BD
			/* @var $inscricao Inscricao */
			$inscricao = $inscricaoService->loadInscricaoById($entrada_insc_id,$eventoAtual->getID());
			
			if ($inscricao->getID()) {
				
				$saida_horario = "";
				for ($j = 0; $j < count($file_saida_array); $j++) {
					// Pega a linha do arquivo de saída
					$file_saida_line = explode(";",trim($file_saida_array[$j]));
					$saida_insc_id = trim($file_saida_line[0]);
					if (is_numeric($saida_insc_id) && ($saida_insc_id == $entrada_insc_id)) {
						$saida_horario = $file_saida_line[1]." ".$file_saida_line[2];
					}
				}

				echo $inscricao->getID().";";
				echo date("d/m/Y h:m",strtotime($inscricao->getDATA())).";";
				echo $inscricao->getSTATUS().";";
				echo $inscricao->getORIGEM().";";
				echo $inscricao->getNOME().";";
				echo $inscricao->getCRACHA().";";
				echo $inscricao->getID_EXTERNO().";";
				echo $inscricao->getSEXO().";";
				echo date("d/m/Y",strtotime($inscricao->getNASCIMENTO())).";";
				echo $inscricao->getCPF_PASSAPORTE().";";
				echo $inscricao->getREGISTRO_PROF().";";
				echo $inscricao->getESPECIALIDADE().";";
				echo $inscricao->getEMAIL().";";
				echo $inscricao->getDDI().";";
				echo $inscricao->getDDD().";";
				echo $inscricao->getFONE().";";
				echo $inscricao->getCELULAR().";";
				echo $inscricao->getFAX().";";
				echo $inscricao->getENDERECO().";";
				echo $inscricao->getCEP().";";
				echo $inscricao->getBAIRRO().";";
				echo $inscricao->getCIDADE().";";
				echo $inscricao->getESTADO().";";
				echo $inscricao->getPAIS().";";
				switch ($inscricao->getTIPO()) {
					case "1": echo $eventoConfiguracaoXMLAtual->getInscricaoOpcao1("PT").";"; break;
					case "2": echo $eventoConfiguracaoXMLAtual->getInscricaoOpcao2("PT").";"; break;
					case "3": echo $eventoConfiguracaoXMLAtual->getInscricaoOpcao3("PT").";"; break;
					case "4": echo $eventoConfiguracaoXMLAtual->getInscricaoOpcao4("PT").";"; break;
					case "5": echo $eventoConfiguracaoXMLAtual->getInscricaoOpcao5("PT").";"; break;
					case "6": echo $eventoConfiguracaoXMLAtual->getInscricaoOpcao6("PT").";"; break;
					default: echo ";"; break;
				}
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
				echo $inscricao->getVALOR().";";
				echo $inscricao->getSTATUS_PGTO().";";
				echo $inscricao->getFORMA_PGTO().";";
				echo $inscricao->getORG_NOME().";";
				echo $inscricao->getORG_FONE().";";
				echo $inscricao->getORG_CNPJ().";";
				echo $inscricao->getORG_ENDERECO().";";
				echo $inscricao->getORG_CIDADE().";";
				echo $inscricao->getORG_WEBSITE().";";
				echo $inscricao->getACOMP().";";
				echo str_replace("\n"," ",$inscricao->getOBS()).";";
				if ($eventoConfiguracaoXMLAtual->getInscricaoTexto1("PT")) echo "<td>". $inscricao->getTEXTO_1().";";
				if ($eventoConfiguracaoXMLAtual->getInscricaoTexto2("PT")) echo "<td>". $inscricao->getTEXTO_2().";";
				if ($eventoConfiguracaoXMLAtual->getInscricaoTexto3("PT")) echo "<td>". $inscricao->getTEXTO_3().";";
				if ($eventoConfiguracaoXMLAtual->getInscricaoTexto4("PT")) echo "<td>". $inscricao->getTEXTO_4().";";
				if ($eventoConfiguracaoXMLAtual->getInscricaoTexto5("PT")) echo "<td>". $inscricao->getTEXTO_5().";";
				if ($eventoConfiguracaoXMLAtual->getInscricaoTexto6("PT")) echo "<td>". $inscricao->getTEXTO_6().";";
				if ($eventoConfiguracaoXMLAtual->getInscricaoTexto7("PT")) echo "<td>". $inscricao->getTEXTO_7().";";
				if ($eventoConfiguracaoXMLAtual->getInscricaoTexto8("PT")) echo "<td>". $inscricao->getTEXTO_8().";";
				if ($eventoConfiguracaoXMLAtual->getInscricaoTexto9("PT")) echo "<td>". $inscricao->getTEXTO_9().";";
				if ($eventoConfiguracaoXMLAtual->getInscricaoTexto10("PT")) echo "<td>". $inscricao->getTEXTO_10().";";
				if ($eventoConfiguracaoXMLAtual->getInscricaoBool1("PT")) echo "<td>". $inscricao->getBOOL_1().";";
				if ($eventoConfiguracaoXMLAtual->getInscricaoBool2("PT")) echo "<td>". $inscricao->getBOOL_2().";";
				if ($eventoConfiguracaoXMLAtual->getInscricaoBool3("PT")) echo "<td>". $inscricao->getBOOL_3().";";
				if ($eventoConfiguracaoXMLAtual->getInscricaoBool4("PT")) echo "<td>". $inscricao->getBOOL_4().";";
				if ($eventoConfiguracaoXMLAtual->getInscricaoBool5("PT")) echo "<td>". $inscricao->getBOOL_5().";";
				if ($eventoConfiguracaoXMLAtual->getInscricaoBool6("PT")) echo "<td>". $inscricao->getBOOL_6().";";
				if ($eventoConfiguracaoXMLAtual->getInscricaoBool7("PT")) echo "<td>". $inscricao->getBOOL_7().";";
				if ($eventoConfiguracaoXMLAtual->getInscricaoBool8("PT")) echo "<td>". $inscricao->getBOOL_8().";";
				if ($eventoConfiguracaoXMLAtual->getInscricaoBool9("PT")) echo "<td>". $inscricao->getBOOL_9().";";
				if ($eventoConfiguracaoXMLAtual->getInscricaoBool10("PT")) echo "<td>". $inscricao->getBOOL_10().";";
				if ($eventoConfiguracaoXMLAtual->getInscricaoBool11("PT")) echo "<td>". $inscricao->getBOOL_11().";";
				if ($eventoConfiguracaoXMLAtual->getInscricaoBool12("PT")) echo "<td>". $inscricao->getBOOL_12().";";
				if ($eventoConfiguracaoXMLAtual->getInscricaoBool13("PT")) echo "<td>". $inscricao->getBOOL_13().";";
				if ($eventoConfiguracaoXMLAtual->getInscricaoBool14("PT")) echo "<td>". $inscricao->getBOOL_14().";";
				if ($eventoConfiguracaoXMLAtual->getInscricaoBool15("PT")) echo "<td>". $inscricao->getBOOL_15().";";
				if ($eventoConfiguracaoXMLAtual->getInscricaoBool16("PT")) echo "<td>". $inscricao->getBOOL_16().";";
				if ($eventoConfiguracaoXMLAtual->getInscricaoBool17("PT")) echo "<td>". $inscricao->getBOOL_17().";";
				if ($eventoConfiguracaoXMLAtual->getInscricaoBool18("PT")) echo "<td>". $inscricao->getBOOL_18().";";
				if ($eventoConfiguracaoXMLAtual->getInscricaoBool19("PT")) echo "<td>". $inscricao->getBOOL_19().";";
				if ($eventoConfiguracaoXMLAtual->getInscricaoBool20("PT")) echo "<td>". $inscricao->getBOOL_20().";";
				if ($eventoConfiguracaoXMLAtual->getInscricaoCurso1("PT")) echo "<td>". $inscricao->getCURSO_1().";";
				if ($eventoConfiguracaoXMLAtual->getInscricaoCurso2("PT")) echo "<td>". $inscricao->getCURSO_2().";";
				if ($eventoConfiguracaoXMLAtual->getInscricaoCurso3("PT")) echo "<td>". $inscricao->getCURSO_3().";";
				if ($eventoConfiguracaoXMLAtual->getInscricaoCurso4("PT")) echo "<td>". $inscricao->getCURSO_4().";";
				if ($eventoConfiguracaoXMLAtual->getInscricaoCurso5("PT")) echo "<td>". $inscricao->getCURSO_5().";";
				if ($eventoConfiguracaoXMLAtual->getInscricaoCurso6("PT")) echo "<td>". $inscricao->getCURSO_6().";";
				if ($eventoConfiguracaoXMLAtual->getInscricaoCurso7("PT")) echo "<td>". $inscricao->getCURSO_7().";";
				if ($eventoConfiguracaoXMLAtual->getInscricaoCurso8("PT")) echo "<td>". $inscricao->getCURSO_8().";";
				if ($eventoConfiguracaoXMLAtual->getInscricaoCurso9("PT")) echo "<td>". $inscricao->getCURSO_9().";";
				if ($eventoConfiguracaoXMLAtual->getInscricaoCurso10("PT")) echo "<td>". $inscricao->getCURSO_10().";";
				if ($eventoConfiguracaoXMLAtual->getInscricaoCurso11("PT")) echo "<td>". $inscricao->getCURSO_11().";";
				if ($eventoConfiguracaoXMLAtual->getInscricaoCurso12("PT")) echo "<td>". $inscricao->getCURSO_12().";";
				if ($eventoConfiguracaoXMLAtual->getInscricaoCurso13("PT")) echo "<td>". $inscricao->getCURSO_13().";";
				if ($eventoConfiguracaoXMLAtual->getInscricaoCurso14("PT")) echo "<td>". $inscricao->getCURSO_14().";";
				if ($eventoConfiguracaoXMLAtual->getInscricaoCurso15("PT")) echo "<td>". $inscricao->getCURSO_15().";";
				if ($eventoConfiguracaoXMLAtual->getInscricaoCurso16("PT")) echo "<td>". $inscricao->getCURSO_16().";";
				if ($eventoConfiguracaoXMLAtual->getInscricaoCurso17("PT")) echo "<td>". $inscricao->getCURSO_17().";";
				if ($eventoConfiguracaoXMLAtual->getInscricaoCurso18("PT")) echo "<td>". $inscricao->getCURSO_18().";";
				if ($eventoConfiguracaoXMLAtual->getInscricaoCurso19("PT")) echo "<td>". $inscricao->getCURSO_19().";";
				if ($eventoConfiguracaoXMLAtual->getInscricaoCurso20("PT")) echo "<td>". $inscricao->getCURSO_20().";";
				if ($eventoConfiguracaoXMLAtual->getInscricaoCurso21("PT")) echo "<td>". $inscricao->getCURSO_21().";";
				if ($eventoConfiguracaoXMLAtual->getInscricaoCurso22("PT")) echo "<td>". $inscricao->getCURSO_22().";";
				if ($eventoConfiguracaoXMLAtual->getInscricaoCurso23("PT")) echo "<td>". $inscricao->getCURSO_23().";";
				if ($eventoConfiguracaoXMLAtual->getInscricaoCurso24("PT")) echo "<td>". $inscricao->getCURSO_24().";";
				if ($eventoConfiguracaoXMLAtual->getInscricaoCurso25("PT")) echo "<td>". $inscricao->getCURSO_25().";";
				if ($eventoConfiguracaoXMLAtual->getInscricaoCurso26("PT")) echo "<td>". $inscricao->getCURSO_26().";";
				if ($eventoConfiguracaoXMLAtual->getInscricaoCurso27("PT")) echo "<td>". $inscricao->getCURSO_27().";";
				if ($eventoConfiguracaoXMLAtual->getInscricaoCurso28("PT")) echo "<td>". $inscricao->getCURSO_28().";";
				if ($eventoConfiguracaoXMLAtual->getInscricaoCurso29("PT")) echo "<td>". $inscricao->getCURSO_29().";";
				if ($eventoConfiguracaoXMLAtual->getInscricaoCurso30("PT")) echo "<td>". $inscricao->getCURSO_30().";";
				echo $entrada_horario.";";
				echo $saida_horario.";";
				echo "\n";
				//echo "<br><br>";
			}

		}

	};
	
};