<?
include_once("struct/auth.php");
if (!session_is_registered("evento")) { 
	header("Location: session_seleciona_evento.php?url=inscricao_list.php&orga_id=0&configurado=1");
} else {
	
	include_once("struct/xls_header.php");
	
	include_once('../classes/class.trabalho.php');
	include_once('../classes/service.trabalho.php');
	
	/* @var $eventoAtual Evento */
	$trabalhoService = new TrabalhoService();
	$trabalhoList = $trabalhoService->listTrabalhosByEvento($eventoAtual->getID(),"TITULO ASC");
	
	echo "<table><tr>";
	echo "<td>Id</td>";
	echo "<td>Titulo</td>";
	echo "<td>Resumo</td>"; // RESUMO
	echo "<td>Autor Nome</td>";
	echo "<td>Status</td>";
	echo "<td>Data Submetido</td>";
	echo "<td>Tipo Apres.</td>";
	echo "<td>Data Apres.</td>";
	echo "<td>Opção 1</td>";
	echo "<td>Opção 2</td>";
	echo "<td>Opção 3</td>";
	echo "<td>Opção 4</td>";
	echo "<td>Opção 5</td>";
	echo "<td>Autor CPF Passaporte</td>";
	echo "<td>Autor Email</td>";
	echo "<td>Autor Fone</td>";
	echo "<td>Autor Organização</td>";
	echo "<td>Autor Cidade</td>";
	echo "<td>Autor Estado</td>";
	echo "<td>Autor País</td>";
	echo "<td>Apres. Nome</td>";
	echo "<td>Apres. Email</td>";
	echo "<td>Apres. Fone</td>";
	echo "<td>Apres. Organização</td>";
	echo "<td>Autor 01 Nome</td>";
	echo "<td>Autor 01 Email</td>";
	echo "<td>Autor 02 Nome</td>";
	echo "<td>Autor 02 Email</td>";
	echo "<td>Autor 03 Nome</td>";
	echo "<td>Autor 03 Email</td>";
	echo "<td>Autor 04 Nome</td>";
	echo "<td>Autor 04 Email</td>";
	echo "<td>Autor 05 Nome</td>";
	echo "<td>Autor 05 Email</td>";
	echo "<td>Autor 06 Nome</td>";
	echo "<td>Autor 06 Email</td>";
	echo "<td>Autor 07 Nome</td>";
	echo "<td>Autor 07 Email</td>";
	echo "<td>Autor 08 Nome</td>";
	echo "<td>Autor 08 Email</td>";
	echo "<td>Autor 09 Nome</td>";
	echo "<td>Autor 09 Email</td>";
	echo "<td>Autor 10 Nome</td>";
	echo "<td>Autor 10 Email</td>";
	echo "</tr>";
	
	for ($i = 0; $i < count($trabalhoList); $i++) {
		/* @var $trabalho Trabalho */
		$trabalho = $trabalhoList[$i];
	
		echo "<tr>";
		echo "<td>". $trabalho->getID()."</td>";
		echo "<td>". $trabalho->getTITULO()."</td>";
		echo "<td><pre style='font-family: times new roman; font-size: 10px;'>". $trabalho->getRESUMO()."</pre></td>"; // RESUMO
		echo "<td>". $trabalho->getAUTOR_NOME()."</td>";
		switch ($trabalho->getSTATUS()) {
			case $trabalho->STATUS_NOVO: echo "<td>Novo"; break;
			case $trabalho->STATUS_EM_REVISAO: echo "<td>Em Revisão</td>"; break;
			case $trabalho->STATUS_PENDENTE: echo "<td>Pendente</td>"; break;
			case $trabalho->STATUS_ACEITO_COM_RESTRICOES: echo "<td>Aceito com Restrições</td>"; break;
			case $trabalho->STATUS_ACEITO: echo "<td>Aceito</td>"; break;
			case $trabalho->STATUS_REJEITADO: echo "<td>Rejeitado</td>"; break;
			default : echo "<td></td>"; break;
		};
		echo "<td>". date("d/m/Y H:m",strtotime($trabalho->getDATA()))."</td>";
		echo "<td>". $trabalho->getTIPO_APRES()."</td>";
		echo "<td>". date("d/m/Y H:m",strtotime($trabalho->getDATA_APRES()))."</td>";
		echo "<td>". $trabalho->getOPCAO1()."</td>";
		echo "<td>". $trabalho->getOPCAO2()."</td>";
		echo "<td>". $trabalho->getOPCAO3()."</td>";
		echo "<td>". $trabalho->getOPCAO4()."</td>";
		echo "<td>". $trabalho->getOPCAO5()."</td>";
		echo "<td>". $trabalho->getAUTOR_CPF_PASSAPORTE()."</td>";
		echo "<td>". $trabalho->getAUTOR_EMAIL()."</td>";
		echo "<td>". $trabalho->getAUTOR_FONE()."</td>";
		echo "<td>". $trabalho->getAUTOR_ORGA()."</td>";
		echo "<td>". $trabalho->getAUTOR_CIDADE()."</td>";
		echo "<td>". $trabalho->getAUTOR_ESTADO()."</td>";
		echo "<td>". $trabalho->getAUTOR_PAIS()."</td>";
		echo "<td>". $trabalho->getAPRES_NOME()."</td>";
		echo "<td>". $trabalho->getAPRES_EMAIL()."</td>";
		echo "<td>". $trabalho->getAPRES_FONE()."</td>";
		echo "<td>". $trabalho->getAPRES_ORGA()."</td>";
		echo "<td>". $trabalho->getAUTOR1_NOME()."</td>";
		echo "<td>". $trabalho->getAUTOR1_EMAIL()."</td>";
		echo "<td>". $trabalho->getAUTOR2_NOME()."</td>";
		echo "<td>". $trabalho->getAUTOR2_EMAIL()."</td>";
		echo "<td>". $trabalho->getAUTOR3_NOME()."</td>";
		echo "<td>". $trabalho->getAUTOR3_EMAIL()."</td>";
		echo "<td>". $trabalho->getAUTOR4_NOME()."</td>";
		echo "<td>". $trabalho->getAUTOR4_EMAIL()."</td>";
		echo "<td>". $trabalho->getAUTOR5_NOME()."</td>";
		echo "<td>". $trabalho->getAUTOR5_EMAIL()."</td>";
		echo "<td>". $trabalho->getAUTOR6_NOME()."</td>";
		echo "<td>". $trabalho->getAUTOR6_EMAIL()."</td>";
		echo "<td>". $trabalho->getAUTOR7_NOME()."</td>";
		echo "<td>". $trabalho->getAUTOR7_EMAIL()."</td>";
		echo "<td>". $trabalho->getAUTOR8_NOME()."</td>";
		echo "<td>". $trabalho->getAUTOR8_EMAIL()."</td>";
		echo "<td>". $trabalho->getAUTOR9_NOME()."</td>";
		echo "<td>". $trabalho->getAUTOR9_EMAIL()."</td>";
		echo "<td>". $trabalho->getAUTOR10_NOME()."</td>";
		echo "<td>". $trabalho->getAUTOR10_EMAIL()."</td>";

	}

} ?>