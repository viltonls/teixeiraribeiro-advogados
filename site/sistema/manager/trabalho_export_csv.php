<? include_once("struct/auth.php");
if (!session_is_registered("evento")) { 
	header("Location: session_seleciona_evento.php?url=trabalho_export_csv.php&orga_id=0&configurado=1");
} else {
	
	include_once("struct/csv_header.php");
	
	include_once('../classes/class.trabalho.php');
	include_once('../classes/service.trabalho.php');
	
	/* @var $eventoAtual Evento */
	$trabalhoService = new TrabalhoService();
	$trabalhoList = $trabalhoService->listTrabalhosByEvento($eventoAtual->getID(),"TITULO ASC");
	
	echo " ";
	echo "Id;";
	echo "Titulo;";
//	echo "Resumo;"; // RESUMO
	echo "Autor Nome;";
	echo "Status;";
	echo "Data Submetido;";
	echo "Tipo Apres.;";
	echo "Data Apres.;";
	echo "Opção 1;";
	echo "Opção 2;";
	echo "Opção 3;";
	echo "Opção 4;";
	echo "Opção 5;";
	echo "Autor CPF Passaporte;";
	echo "Autor Email;";
	echo "Autor Fone;";
	echo "Autor Organização;";
	echo "Autor Cidade;";
	echo "Autor Estado;";
	echo "Autor País;";
	echo "Apres. Nome;";
	echo "Apres. Email ;";
	echo "Apres. Fone;";
	echo "Apres. Organização;";
	echo "Autor 01 Nome;";
	echo "Autor 01 Email;";
	echo "Autor 02 Nome;";
	echo "Autor 02 Email;";
	echo "Autor 03 Nome;";
	echo "Autor 03 Email;";
	echo "Autor 04 Nome;";
	echo "Autor 04 Email;";
	echo "Autor 05 Nome;";
	echo "Autor 05 Email;";
	echo "Autor 06 Nome;";
	echo "Autor 06 Email;";
	echo "Autor 07 Nome;";
	echo "Autor 07 Email;";
	echo "Autor 08 Nome;";
	echo "Autor 08 Email;";
	echo "Autor 09 Nome;";
	echo "Autor 09 Email;";
	echo "Autor 10 Nome;";
	echo "Autor 10 Email;";
	echo "\n";
	
	
	for ($i = 0; $i < count($trabalhoList); $i++) {
		/* @var $trabalho Trabalho */
		$trabalho = $trabalhoList[$i];
	
		echo $trabalho->getID().";";
		echo $trabalho->getTITULO().";";
//		echo $trabalho->getRESUMO().";"; // RESUMO
		echo $trabalho->getAUTOR_NOME().";";
		switch ($trabalho->getSTATUS()) {
			case $trabalho->STATUS_NOVO: echo "Novo"; break;
			case $trabalho->STATUS_EM_REVISAO: echo "Em Revisão"; break;
			case $trabalho->STATUS_PENDENTE: echo "Pendente"; break;
			case $trabalho->STATUS_ACEITO_COM_RESTRICOES: echo "Aceito com Restrições"; break;
			case $trabalho->STATUS_ACEITO: echo "Aceito"; break;
			case $trabalho->STATUS_REJEITADO: echo "Rejeitado"; break;
			default : echo ""; break;
		};
		echo ";";
		echo date("d/m/Y H:m",strtotime($trabalho->getDATA())).";";
		echo $trabalho->getTIPO_APRES().";";
		echo date("d/m/Y H:m",strtotime($trabalho->getDATA_APRES())).";";
		echo $trabalho->getOPCAO1().";";
		echo $trabalho->getOPCAO2().";";
		echo $trabalho->getOPCAO3().";";
		echo $trabalho->getOPCAO4().";";
		echo $trabalho->getOPCAO5().";";
		echo $trabalho->getAUTOR_CPF_PASSAPORTE().";";
		echo $trabalho->getAUTOR_EMAIL().";";
		echo $trabalho->getAUTOR_FONE().";";
		echo $trabalho->getAUTOR_ORGA().";";
		echo $trabalho->getAUTOR_CIDADE().";";
		echo $trabalho->getAUTOR_ESTADO().";";
		echo $trabalho->getAUTOR_PAIS().";";
		echo $trabalho->getAPRES_NOME().";";
		echo $trabalho->getAPRES_EMAIL().";";
		echo $trabalho->getAPRES_FONE().";";
		echo $trabalho->getAPRES_ORGA().";";
		echo $trabalho->getAUTOR1_NOME().";";
		echo $trabalho->getAUTOR1_EMAIL().";";
		echo $trabalho->getAUTOR2_NOME().";";
		echo $trabalho->getAUTOR2_EMAIL().";";
		echo $trabalho->getAUTOR3_NOME().";";
		echo $trabalho->getAUTOR3_EMAIL().";";
		echo $trabalho->getAUTOR4_NOME().";";
		echo $trabalho->getAUTOR4_EMAIL().";";
		echo $trabalho->getAUTOR5_NOME().";";
		echo $trabalho->getAUTOR5_EMAIL().";";
		echo $trabalho->getAUTOR6_NOME().";";
		echo $trabalho->getAUTOR6_EMAIL().";";
		echo $trabalho->getAUTOR7_NOME().";";
		echo $trabalho->getAUTOR7_EMAIL().";";
		echo $trabalho->getAUTOR8_NOME().";";
		echo $trabalho->getAUTOR8_EMAIL().";";
		echo $trabalho->getAUTOR9_NOME().";";
		echo $trabalho->getAUTOR9_EMAIL().";";
		echo $trabalho->getAUTOR10_NOME().";";
		echo $trabalho->getAUTOR10_EMAIL().";";
		echo "\n";
	}

} ?>