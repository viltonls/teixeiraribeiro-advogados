<?
include_once("struct/auth.php");
if (!session_is_registered("evento")) { 
	header("Location: session_seleciona_evento.php?url=inscricao_export_xls.php&orga_id=0&configurado=1");
} else {

	include_once("struct/xls_header.php");
	
	include_once('../classes/class.inscricao.php');
	include_once('../classes/service.inscricao.php');
	
	/* @var $eventoAtual Evento */
	/* @var $eventoConfiguracaoAtual Configuracao */
	/* @var $eventoConfiguracaoXMLAtual ConfiguracaoXML */
	$inscricaoService = new InscricaoService();
	$inscricaoList = $inscricaoService->listInscricoesByEvento($eventoAtual->getID(),"ID ASC");
	
	echo "<table><tr>";
	echo "<td>Id</td>";
	echo "<td>Data Inscrição</td>";
	echo "<td>Status</td>";
	echo "<td>Origem</td>";
	echo "<td>Nome</td>";
	echo "<td>Crachá</td>";
	echo "<td>ID Externo</td>";
	echo "<td>Sexo</td>";
	echo "<td>Nascimento</td>";
	echo "<td>CPF / Passaporte</td>";
	echo "<td>Registro Prof.</td>";
	echo "<td>Especialidade</td>";
	echo "<td>Email</td>";
	echo "<td>DDI</td>";
	echo "<td>DDD</td>";
	echo "<td>Fone</td>";
	echo "<td>Celular</td>";
	echo "<td>Fax</td>";
	echo "<td>Endereço</td>";
	echo "<td>CEP</td>";
	echo "<td>Bairro</td>";
	echo "<td>Cidade</td>";
	echo "<td>Estado</td>";
	echo "<td>País</td>";
	echo "<td>Tipo</td>";
	echo "<td>Categoria</td>";
	echo "<td>Valor</td>";
	echo "<td>Status Pgto.</td>";
	echo "<td>Forma Pgto.</td>";
	echo "<td>Org. Nome</td>";
	echo "<td>Org. Cargo</td>";
	echo "<td>Org. Fone</td>";
	echo "<td>Org. CNPJ</td>";
	echo "<td>Org. Endereço</td>";
	echo "<td>Org. Cidade</td>";
	echo "<td>Org. Website</td>";
	echo "<td>Acompanhante</td>";
	echo "<td>Obs</td>";
	if ($eventoConfiguracaoXMLAtual->getInscricaoTexto1("PT")) echo "<td>". $eventoConfiguracaoXMLAtual->getInscricaoTexto1()."</td>";
	if ($eventoConfiguracaoXMLAtual->getInscricaoTexto2("PT")) echo "<td>". $eventoConfiguracaoXMLAtual->getInscricaoTexto2()."</td>";
	if ($eventoConfiguracaoXMLAtual->getInscricaoTexto3("PT")) echo "<td>". $eventoConfiguracaoXMLAtual->getInscricaoTexto3()."</td>";
	if ($eventoConfiguracaoXMLAtual->getInscricaoTexto4("PT")) echo "<td>". $eventoConfiguracaoXMLAtual->getInscricaoTexto4()."</td>";
	if ($eventoConfiguracaoXMLAtual->getInscricaoTexto5("PT")) echo "<td>". $eventoConfiguracaoXMLAtual->getInscricaoTexto5()."</td>";
	if ($eventoConfiguracaoXMLAtual->getInscricaoTexto6("PT")) echo "<td>". $eventoConfiguracaoXMLAtual->getInscricaoTexto6()."</td>";
	if ($eventoConfiguracaoXMLAtual->getInscricaoTexto7("PT")) echo "<td>". $eventoConfiguracaoXMLAtual->getInscricaoTexto7()."</td>";
	if ($eventoConfiguracaoXMLAtual->getInscricaoTexto8("PT")) echo "<td>". $eventoConfiguracaoXMLAtual->getInscricaoTexto8()."</td>";
	if ($eventoConfiguracaoXMLAtual->getInscricaoTexto9("PT")) echo "<td>". $eventoConfiguracaoXMLAtual->getInscricaoTexto9()."</td>";
	if ($eventoConfiguracaoXMLAtual->getInscricaoTexto10("PT")) echo "<td>". $eventoConfiguracaoXMLAtual->getInscricaoTexto10()."</td>";
	if ($eventoConfiguracaoXMLAtual->getInscricaoBool1("PT")) echo "<td>". $eventoConfiguracaoXMLAtual->getInscricaoBool1()."</td>";
	if ($eventoConfiguracaoXMLAtual->getInscricaoBool2("PT")) echo "<td>". $eventoConfiguracaoXMLAtual->getInscricaoBool2()."</td>";
	if ($eventoConfiguracaoXMLAtual->getInscricaoBool3("PT")) echo "<td>". $eventoConfiguracaoXMLAtual->getInscricaoBool3()."</td>";
	if ($eventoConfiguracaoXMLAtual->getInscricaoBool4("PT")) echo "<td>". $eventoConfiguracaoXMLAtual->getInscricaoBool4()."</td>";
	if ($eventoConfiguracaoXMLAtual->getInscricaoBool5("PT")) echo "<td>". $eventoConfiguracaoXMLAtual->getInscricaoBool5()."</td>";
	if ($eventoConfiguracaoXMLAtual->getInscricaoBool6("PT")) echo "<td>". $eventoConfiguracaoXMLAtual->getInscricaoBool6()."</td>";
	if ($eventoConfiguracaoXMLAtual->getInscricaoBool7("PT")) echo "<td>". $eventoConfiguracaoXMLAtual->getInscricaoBool7()."</td>";
	if ($eventoConfiguracaoXMLAtual->getInscricaoBool8("PT")) echo "<td>". $eventoConfiguracaoXMLAtual->getInscricaoBool8()."</td>";
	if ($eventoConfiguracaoXMLAtual->getInscricaoBool9("PT")) echo "<td>". $eventoConfiguracaoXMLAtual->getInscricaoBool9()."</td>";
	if ($eventoConfiguracaoXMLAtual->getInscricaoBool10("PT")) echo "<td>". $eventoConfiguracaoXMLAtual->getInscricaoBool10()."</td>";
	if ($eventoConfiguracaoXMLAtual->getInscricaoBool11("PT")) echo "<td>". $eventoConfiguracaoXMLAtual->getInscricaoBool11()."</td>";
	if ($eventoConfiguracaoXMLAtual->getInscricaoBool12("PT")) echo "<td>". $eventoConfiguracaoXMLAtual->getInscricaoBool12()."</td>";
	if ($eventoConfiguracaoXMLAtual->getInscricaoBool13("PT")) echo "<td>". $eventoConfiguracaoXMLAtual->getInscricaoBool13()."</td>";
	if ($eventoConfiguracaoXMLAtual->getInscricaoBool14("PT")) echo "<td>". $eventoConfiguracaoXMLAtual->getInscricaoBool14()."</td>";
	if ($eventoConfiguracaoXMLAtual->getInscricaoBool15("PT")) echo "<td>". $eventoConfiguracaoXMLAtual->getInscricaoBool15()."</td>";
	if ($eventoConfiguracaoXMLAtual->getInscricaoBool16("PT")) echo "<td>". $eventoConfiguracaoXMLAtual->getInscricaoBool16()."</td>";
	if ($eventoConfiguracaoXMLAtual->getInscricaoBool17("PT")) echo "<td>". $eventoConfiguracaoXMLAtual->getInscricaoBool17()."</td>";
	if ($eventoConfiguracaoXMLAtual->getInscricaoBool18("PT")) echo "<td>". $eventoConfiguracaoXMLAtual->getInscricaoBool18()."</td>";
	if ($eventoConfiguracaoXMLAtual->getInscricaoBool19("PT")) echo "<td>". $eventoConfiguracaoXMLAtual->getInscricaoBool19()."</td>";
	if ($eventoConfiguracaoXMLAtual->getInscricaoBool20("PT")) echo "<td>". $eventoConfiguracaoXMLAtual->getInscricaoBool20()."</td>";
	if ($eventoConfiguracaoXMLAtual->getInscricaoCurso1("PT")) echo "<td>". $eventoConfiguracaoXMLAtual->getInscricaoCurso1()."</td>";
	if ($eventoConfiguracaoXMLAtual->getInscricaoCurso2("PT")) echo "<td>". $eventoConfiguracaoXMLAtual->getInscricaoCurso2()."</td>";
	if ($eventoConfiguracaoXMLAtual->getInscricaoCurso3("PT")) echo "<td>". $eventoConfiguracaoXMLAtual->getInscricaoCurso3()."</td>";
	if ($eventoConfiguracaoXMLAtual->getInscricaoCurso4("PT")) echo "<td>". $eventoConfiguracaoXMLAtual->getInscricaoCurso4()."</td>";
	if ($eventoConfiguracaoXMLAtual->getInscricaoCurso5("PT")) echo "<td>". $eventoConfiguracaoXMLAtual->getInscricaoCurso5()."</td>";
	if ($eventoConfiguracaoXMLAtual->getInscricaoCurso6("PT")) echo "<td>". $eventoConfiguracaoXMLAtual->getInscricaoCurso6()."</td>";
	if ($eventoConfiguracaoXMLAtual->getInscricaoCurso7("PT")) echo "<td>". $eventoConfiguracaoXMLAtual->getInscricaoCurso7()."</td>";
	if ($eventoConfiguracaoXMLAtual->getInscricaoCurso8("PT")) echo "<td>". $eventoConfiguracaoXMLAtual->getInscricaoCurso8()."</td>";
	if ($eventoConfiguracaoXMLAtual->getInscricaoCurso9("PT")) echo "<td>". $eventoConfiguracaoXMLAtual->getInscricaoCurso9()."</td>";
	if ($eventoConfiguracaoXMLAtual->getInscricaoCurso10("PT")) echo "<td>". $eventoConfiguracaoXMLAtual->getInscricaoCurso10()."</td>";
	if ($eventoConfiguracaoXMLAtual->getInscricaoCurso11("PT")) echo "<td>". $eventoConfiguracaoXMLAtual->getInscricaoCurso11()."</td>";
	if ($eventoConfiguracaoXMLAtual->getInscricaoCurso12("PT")) echo "<td>". $eventoConfiguracaoXMLAtual->getInscricaoCurso12()."</td>";
	if ($eventoConfiguracaoXMLAtual->getInscricaoCurso13("PT")) echo "<td>". $eventoConfiguracaoXMLAtual->getInscricaoCurso13()."</td>";
	if ($eventoConfiguracaoXMLAtual->getInscricaoCurso14("PT")) echo "<td>". $eventoConfiguracaoXMLAtual->getInscricaoCurso14()."</td>";
	if ($eventoConfiguracaoXMLAtual->getInscricaoCurso15("PT")) echo "<td>". $eventoConfiguracaoXMLAtual->getInscricaoCurso15()."</td>";
	if ($eventoConfiguracaoXMLAtual->getInscricaoCurso16("PT")) echo "<td>". $eventoConfiguracaoXMLAtual->getInscricaoCurso16()."</td>";
	if ($eventoConfiguracaoXMLAtual->getInscricaoCurso17("PT")) echo "<td>". $eventoConfiguracaoXMLAtual->getInscricaoCurso17()."</td>";
	if ($eventoConfiguracaoXMLAtual->getInscricaoCurso18("PT")) echo "<td>". $eventoConfiguracaoXMLAtual->getInscricaoCurso18()."</td>";
	if ($eventoConfiguracaoXMLAtual->getInscricaoCurso19("PT")) echo "<td>". $eventoConfiguracaoXMLAtual->getInscricaoCurso19()."</td>";
	if ($eventoConfiguracaoXMLAtual->getInscricaoCurso20("PT")) echo "<td>". $eventoConfiguracaoXMLAtual->getInscricaoCurso20()."</td>";
	if ($eventoConfiguracaoXMLAtual->getInscricaoCurso21("PT")) echo "<td>". $eventoConfiguracaoXMLAtual->getInscricaoCurso21()."</td>";
	if ($eventoConfiguracaoXMLAtual->getInscricaoCurso22("PT")) echo "<td>". $eventoConfiguracaoXMLAtual->getInscricaoCurso22()."</td>";
	if ($eventoConfiguracaoXMLAtual->getInscricaoCurso23("PT")) echo "<td>". $eventoConfiguracaoXMLAtual->getInscricaoCurso23()."</td>";
	if ($eventoConfiguracaoXMLAtual->getInscricaoCurso24("PT")) echo "<td>". $eventoConfiguracaoXMLAtual->getInscricaoCurso24()."</td>";
	if ($eventoConfiguracaoXMLAtual->getInscricaoCurso25("PT")) echo "<td>". $eventoConfiguracaoXMLAtual->getInscricaoCurso25()."</td>";
	if ($eventoConfiguracaoXMLAtual->getInscricaoCurso26("PT")) echo "<td>". $eventoConfiguracaoXMLAtual->getInscricaoCurso26()."</td>";
	if ($eventoConfiguracaoXMLAtual->getInscricaoCurso27("PT")) echo "<td>". $eventoConfiguracaoXMLAtual->getInscricaoCurso27()."</td>";
	if ($eventoConfiguracaoXMLAtual->getInscricaoCurso28("PT")) echo "<td>". $eventoConfiguracaoXMLAtual->getInscricaoCurso28()."</td>";
	if ($eventoConfiguracaoXMLAtual->getInscricaoCurso29("PT")) echo "<td>". $eventoConfiguracaoXMLAtual->getInscricaoCurso29()."</td>";
	if ($eventoConfiguracaoXMLAtual->getInscricaoCurso30("PT")) echo "<td>". $eventoConfiguracaoXMLAtual->getInscricaoCurso30()."</td>";
	echo "</tr>";
	
	for ($i = 0; $i < count($inscricaoList); $i++) {
		/* @var $inscricao Inscricao */
		$inscricao = $inscricaoList[$i];
		echo "<tr>";
		echo "<td>". $inscricao->getID()."</td>";
		if (date("d/m/Y",strtotime($inscricao->getDATA())) != "30/11/1999")
			echo "<td>". date("d/m/Y h:m",strtotime($inscricao->getDATA()))."</td>";
		else 
			echo "<td></td>";
		switch ($inscricao->getSTATUS()) {
			case "0": echo "<td>Nova</td>"; break;
			case "1": echo "<td>Pendente</td>"; break;
			case "2": echo "<td>Pré-Reserva</td>"; break;
			case "5": echo "<td>Confirmada</td>"; break;
			case "8": echo "<td>Ausente</td>"; break;
			case "9": echo "<td>Presente</td>"; break;
			case "x": echo "<td>Excluída</td>"; break;
			default: echo "<td></td>"; break;
		}
		switch ($inscricao->getORIGEM()) {
			case "i": echo "<td>Interno</td>"; break;
			case "s": echo "<td>Site</td>"; break;
			case "l": echo "<td>Local</td>"; break;
			default: echo "<td></td>"; break;
		}
		echo "<td>". $inscricao->getNOME()."</td>";
		echo "<td>". $inscricao->getCRACHA()."</td>";
		echo "<td>". $inscricao->getID_EXTERNO()."</td>";
		echo "<td>". strtoupper($inscricao->getSEXO())."</td>";
		if (date("d/m/Y",strtotime($inscricao->getNASCIMENTO())) != "30/11/1999")
			echo "<td>". date("d/m/Y h:m",strtotime($inscricao->getNASCIMENTO()))."</td>";
		else 
			echo "<td></td>";
		echo "<td>". $inscricao->getCPF_PASSAPORTE()."</td>";
		echo "<td>". $inscricao->getREGISTRO_PROF()."</td>";
		echo "<td>". $inscricao->getESPECIALIDADE()."</td>";
		echo "<td>". $inscricao->getEMAIL()."</td>";
		echo "<td>". $inscricao->getDDI()."</td>";
		echo "<td>". $inscricao->getDDD()."</td>";
		echo "<td>". $inscricao->getFONE()."</td>";
		echo "<td>". $inscricao->getCELULAR()."</td>";
		echo "<td>". $inscricao->getFAX()."</td>";
		echo "<td>". $inscricao->getENDERECO()."</td>";
		echo "<td>". $inscricao->getCEP()."</td>";
		echo "<td>". $inscricao->getBAIRRO()."</td>";
		echo "<td>". $inscricao->getCIDADE()."</td>";
		echo "<td>". $inscricao->getESTADO()."</td>";
		echo "<td>". $inscricao->getPAIS()."</td>";
		switch ($inscricao->getTIPO()) {
			case "1": echo "<td>". $eventoConfiguracaoXMLAtual->getInscricaoOpcao1("PT")."</td>"; break;
			case "2": echo "<td>". $eventoConfiguracaoXMLAtual->getInscricaoOpcao2("PT")."</td>"; break;
			case "3": echo "<td>". $eventoConfiguracaoXMLAtual->getInscricaoOpcao3("PT")."</td>"; break;
			case "4": echo "<td>". $eventoConfiguracaoXMLAtual->getInscricaoOpcao4("PT")."</td>"; break;
			case "5": echo "<td>". $eventoConfiguracaoXMLAtual->getInscricaoOpcao5("PT")."</td>"; break;
			case "6": echo "<td>". $eventoConfiguracaoXMLAtual->getInscricaoOpcao6("PT")."</td>"; break;
			default: echo "<td></td>"; break;
		}
		/*
		echo "<td>". $inscricao->getTIPO()."</td>";
		*/
		switch ($inscricao->getCATEGORIA()) {
			case "a": echo "<td>". $eventoConfiguracaoXMLAtual->getInscricaoCategoriaA("PT")."</td>"; break;
			case "b": echo "<td>". $eventoConfiguracaoXMLAtual->getInscricaoCategoriaB("PT")."</td>"; break;
			case "c": echo "<td>". $eventoConfiguracaoXMLAtual->getInscricaoCategoriaC("PT")."</td>"; break;
			case "d": echo "<td>". $eventoConfiguracaoXMLAtual->getInscricaoCategoriaD("PT")."</td>"; break;
			case "e": echo "<td>". $eventoConfiguracaoXMLAtual->getInscricaoCategoriaE("PT")."</td>"; break;
			case "f": echo "<td>". $eventoConfiguracaoXMLAtual->getInscricaoCategoriaF("PT")."</td>"; break;
			case "g": echo "<td>". $eventoConfiguracaoXMLAtual->getInscricaoCategoriaG("PT")."</td>"; break;
			case "h": echo "<td>". $eventoConfiguracaoXMLAtual->getInscricaoCategoriaH("PT")."</td>"; break;
			case "i": echo "<td>". $eventoConfiguracaoXMLAtual->getInscricaoCategoriaI("PT")."</td>"; break;
			case "j": echo "<td>". $eventoConfiguracaoXMLAtual->getInscricaoCategoriaJ("PT")."</td>"; break;
			case "k": echo "<td>". $eventoConfiguracaoXMLAtual->getInscricaoCategoriaK("PT")."</td>"; break;
			case "l": echo "<td>". $eventoConfiguracaoXMLAtual->getInscricaoCategoriaL("PT")."</td>"; break;
			case "m": echo "<td>". $eventoConfiguracaoXMLAtual->getInscricaoCategoriaM("PT")."</td>"; break;
			case "n": echo "<td>". $eventoConfiguracaoXMLAtual->getInscricaoCategoriaN("PT")."</td>"; break;
			case "o": echo "<td>". $eventoConfiguracaoXMLAtual->getInscricaoCategoriaO("PT")."</td>"; break;
			case "p": echo "<td>". $eventoConfiguracaoXMLAtual->getInscricaoCategoriaP("PT")."</td>"; break;
			case "q": echo "<td>". $eventoConfiguracaoXMLAtual->getInscricaoCategoriaQ("PT")."</td>"; break;
			case "r": echo "<td>". $eventoConfiguracaoXMLAtual->getInscricaoCategoriaR("PT")."</td>"; break;
			case "s": echo "<td>". $eventoConfiguracaoXMLAtual->getInscricaoCategoriaS("PT")."</td>"; break;
			case "t": echo "<td>". $eventoConfiguracaoXMLAtual->getInscricaoCategoriaT("PT")."</td>"; break;
			case "u": echo "<td>". $eventoConfiguracaoXMLAtual->getInscricaoCategoriaU("PT")."</td>"; break;
			case "v": echo "<td>". $eventoConfiguracaoXMLAtual->getInscricaoCategoriaV("PT")."</td>"; break;
			case "w": echo "<td>". $eventoConfiguracaoXMLAtual->getInscricaoCategoriaW("PT")."</td>"; break;
			case "x": echo "<td>". $eventoConfiguracaoXMLAtual->getInscricaoCategoriaX("PT")."</td>"; break;
			case "y": echo "<td>". $eventoConfiguracaoXMLAtual->getInscricaoCategoriaY("PT")."</td>"; break;
			case "z": echo "<td>". $eventoConfiguracaoXMLAtual->getInscricaoCategoriaZ("PT")."</td>"; break;
			default: echo "<td></td>"; break;
		}
		/*
		echo "<td>". $inscricao->getCATEGORIA()."</td>";
		*/
		echo "<td>". number_format($inscricao->getVALOR()/100,2,",",".")."</td>";
		switch ($inscricao->getSTATUS_PGTO()) {
			case "a": echo "<td>Aguardando Pagamento</td>"; break;
			case "c": echo "<td>Aguardando Confirmação</td>"; break;
			case "o": echo "<td>Pagamento OK</td>"; break;
			case "g": echo "<td>Cortesia</td>"; break;
			default: echo "<td>Indefinido</td>"; break;
		}
		switch ($inscricao->getFORMA_PGTO()) {
			case "d": echo "<td>Depósito</td>"; break;
			case "b": echo "<td>Boleto</td>"; break;
			case "c": echo "<td>Cheque</td>"; break;
			case "n": echo "<td>Dinheiro</td>"; break;
			case "m": echo "<td>Cartão MC</td>"; break;
			case "v": echo "<td>Cartão VISA</td>"; break;
			case "a": echo "<td>Cartão AMEX</td>"; break;
			default: echo "<td>Não informado</td>"; break;
		}
		echo "<td>". $inscricao->getORG_NOME()."</td>";
		echo "<td>". $inscricao->getORG_CARGO()."</td>";
		echo "<td>". $inscricao->getORG_FONE()."</td>";
		echo "<td>". $inscricao->getORG_CNPJ()."</td>";
		echo "<td>". $inscricao->getORG_ENDERECO()."</td>";
		echo "<td>". $inscricao->getORG_CIDADE()."</td>";
		echo "<td>". $inscricao->getORG_WEBSITE()."</td>";
		echo "<td>". $inscricao->getACOMP()."</td>";
		echo "<td>". str_replace("\n"," ",$inscricao->getOBS())."</td>";
		if ($eventoConfiguracaoXMLAtual->getInscricaoTexto1("PT")) echo "<td>". $inscricao->getTEXTO_1()."</td>";
		if ($eventoConfiguracaoXMLAtual->getInscricaoTexto2("PT")) echo "<td>". $inscricao->getTEXTO_2()."</td>";
		if ($eventoConfiguracaoXMLAtual->getInscricaoTexto3("PT")) echo "<td>". $inscricao->getTEXTO_3()."</td>";
		if ($eventoConfiguracaoXMLAtual->getInscricaoTexto4("PT")) echo "<td>". $inscricao->getTEXTO_4()."</td>";
		if ($eventoConfiguracaoXMLAtual->getInscricaoTexto5("PT")) echo "<td>". $inscricao->getTEXTO_5()."</td>";
		if ($eventoConfiguracaoXMLAtual->getInscricaoTexto6("PT")) echo "<td>". $inscricao->getTEXTO_6()."</td>";
		if ($eventoConfiguracaoXMLAtual->getInscricaoTexto7("PT")) echo "<td>". $inscricao->getTEXTO_7()."</td>";
		if ($eventoConfiguracaoXMLAtual->getInscricaoTexto8("PT")) echo "<td>". $inscricao->getTEXTO_8()."</td>";
		if ($eventoConfiguracaoXMLAtual->getInscricaoTexto9("PT")) echo "<td>". $inscricao->getTEXTO_9()."</td>";
		if ($eventoConfiguracaoXMLAtual->getInscricaoTexto10("PT")) echo "<td>". $inscricao->getTEXTO_10()."</td>";
		if ($eventoConfiguracaoXMLAtual->getInscricaoBool1("PT")) echo "<td>". $inscricao->getBOOL_1()."</td>";
		if ($eventoConfiguracaoXMLAtual->getInscricaoBool2("PT")) echo "<td>". $inscricao->getBOOL_2()."</td>";
		if ($eventoConfiguracaoXMLAtual->getInscricaoBool3("PT")) echo "<td>". $inscricao->getBOOL_3()."</td>";
		if ($eventoConfiguracaoXMLAtual->getInscricaoBool4("PT")) echo "<td>". $inscricao->getBOOL_4()."</td>";
		if ($eventoConfiguracaoXMLAtual->getInscricaoBool5("PT")) echo "<td>". $inscricao->getBOOL_5()."</td>";
		if ($eventoConfiguracaoXMLAtual->getInscricaoBool6("PT")) echo "<td>". $inscricao->getBOOL_6()."</td>";
		if ($eventoConfiguracaoXMLAtual->getInscricaoBool7("PT")) echo "<td>". $inscricao->getBOOL_7()."</td>";
		if ($eventoConfiguracaoXMLAtual->getInscricaoBool8("PT")) echo "<td>". $inscricao->getBOOL_8()."</td>";
		if ($eventoConfiguracaoXMLAtual->getInscricaoBool9("PT")) echo "<td>". $inscricao->getBOOL_9()."</td>";
		if ($eventoConfiguracaoXMLAtual->getInscricaoBool10("PT")) echo "<td>". $inscricao->getBOOL_10()."</td>";
		if ($eventoConfiguracaoXMLAtual->getInscricaoBool11("PT")) echo "<td>". $inscricao->getBOOL_11()."</td>";
		if ($eventoConfiguracaoXMLAtual->getInscricaoBool12("PT")) echo "<td>". $inscricao->getBOOL_12()."</td>";
		if ($eventoConfiguracaoXMLAtual->getInscricaoBool13("PT")) echo "<td>". $inscricao->getBOOL_13()."</td>";
		if ($eventoConfiguracaoXMLAtual->getInscricaoBool14("PT")) echo "<td>". $inscricao->getBOOL_14()."</td>";
		if ($eventoConfiguracaoXMLAtual->getInscricaoBool15("PT")) echo "<td>". $inscricao->getBOOL_15()."</td>";
		if ($eventoConfiguracaoXMLAtual->getInscricaoBool16("PT")) echo "<td>". $inscricao->getBOOL_16()."</td>";
		if ($eventoConfiguracaoXMLAtual->getInscricaoBool17("PT")) echo "<td>". $inscricao->getBOOL_17()."</td>";
		if ($eventoConfiguracaoXMLAtual->getInscricaoBool18("PT")) echo "<td>". $inscricao->getBOOL_18()."</td>";
		if ($eventoConfiguracaoXMLAtual->getInscricaoBool19("PT")) echo "<td>". $inscricao->getBOOL_19()."</td>";
		if ($eventoConfiguracaoXMLAtual->getInscricaoBool20("PT")) echo "<td>". $inscricao->getBOOL_20()."</td>";
		if ($eventoConfiguracaoXMLAtual->getInscricaoCurso1("PT")) echo "<td>". $inscricao->getCURSO_1()."</td>";
		if ($eventoConfiguracaoXMLAtual->getInscricaoCurso2("PT")) echo "<td>". $inscricao->getCURSO_2()."</td>";
		if ($eventoConfiguracaoXMLAtual->getInscricaoCurso3("PT")) echo "<td>". $inscricao->getCURSO_3()."</td>";
		if ($eventoConfiguracaoXMLAtual->getInscricaoCurso4("PT")) echo "<td>". $inscricao->getCURSO_4()."</td>";
		if ($eventoConfiguracaoXMLAtual->getInscricaoCurso5("PT")) echo "<td>". $inscricao->getCURSO_5()."</td>";
		if ($eventoConfiguracaoXMLAtual->getInscricaoCurso6("PT")) echo "<td>". $inscricao->getCURSO_6()."</td>";
		if ($eventoConfiguracaoXMLAtual->getInscricaoCurso7("PT")) echo "<td>". $inscricao->getCURSO_7()."</td>";
		if ($eventoConfiguracaoXMLAtual->getInscricaoCurso8("PT")) echo "<td>". $inscricao->getCURSO_8()."</td>";
		if ($eventoConfiguracaoXMLAtual->getInscricaoCurso9("PT")) echo "<td>". $inscricao->getCURSO_9()."</td>";
		if ($eventoConfiguracaoXMLAtual->getInscricaoCurso10("PT")) echo "<td>". $inscricao->getCURSO_10()."</td>";
		if ($eventoConfiguracaoXMLAtual->getInscricaoCurso11("PT")) echo "<td>". $inscricao->getCURSO_11()."</td>";
		if ($eventoConfiguracaoXMLAtual->getInscricaoCurso12("PT")) echo "<td>". $inscricao->getCURSO_12()."</td>";
		if ($eventoConfiguracaoXMLAtual->getInscricaoCurso13("PT")) echo "<td>". $inscricao->getCURSO_13()."</td>";
		if ($eventoConfiguracaoXMLAtual->getInscricaoCurso14("PT")) echo "<td>". $inscricao->getCURSO_14()."</td>";
		if ($eventoConfiguracaoXMLAtual->getInscricaoCurso15("PT")) echo "<td>". $inscricao->getCURSO_15()."</td>";
		if ($eventoConfiguracaoXMLAtual->getInscricaoCurso16("PT")) echo "<td>". $inscricao->getCURSO_16()."</td>";
		if ($eventoConfiguracaoXMLAtual->getInscricaoCurso17("PT")) echo "<td>". $inscricao->getCURSO_17()."</td>";
		if ($eventoConfiguracaoXMLAtual->getInscricaoCurso18("PT")) echo "<td>". $inscricao->getCURSO_18()."</td>";
		if ($eventoConfiguracaoXMLAtual->getInscricaoCurso19("PT")) echo "<td>". $inscricao->getCURSO_19()."</td>";
		if ($eventoConfiguracaoXMLAtual->getInscricaoCurso20("PT")) echo "<td>". $inscricao->getCURSO_20()."</td>";
		if ($eventoConfiguracaoXMLAtual->getInscricaoCurso21("PT")) echo "<td>". $inscricao->getCURSO_21()."</td>";
		if ($eventoConfiguracaoXMLAtual->getInscricaoCurso22("PT")) echo "<td>". $inscricao->getCURSO_22()."</td>";
		if ($eventoConfiguracaoXMLAtual->getInscricaoCurso23("PT")) echo "<td>". $inscricao->getCURSO_23()."</td>";
		if ($eventoConfiguracaoXMLAtual->getInscricaoCurso24("PT")) echo "<td>". $inscricao->getCURSO_24()."</td>";
		if ($eventoConfiguracaoXMLAtual->getInscricaoCurso25("PT")) echo "<td>". $inscricao->getCURSO_25()."</td>";
		if ($eventoConfiguracaoXMLAtual->getInscricaoCurso26("PT")) echo "<td>". $inscricao->getCURSO_26()."</td>";
		if ($eventoConfiguracaoXMLAtual->getInscricaoCurso27("PT")) echo "<td>". $inscricao->getCURSO_27()."</td>";
		if ($eventoConfiguracaoXMLAtual->getInscricaoCurso28("PT")) echo "<td>". $inscricao->getCURSO_28()."</td>";
		if ($eventoConfiguracaoXMLAtual->getInscricaoCurso29("PT")) echo "<td>". $inscricao->getCURSO_29()."</td>";
		if ($eventoConfiguracaoXMLAtual->getInscricaoCurso30("PT")) echo "<td>". $inscricao->getCURSO_30()."</td>";
		echo "</tr>";
	
	};
	echo "</table>";
	
};