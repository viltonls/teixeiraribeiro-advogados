<? include("struct/auth.php"); ?>
<?
include_once('../classes/class.trabalho.php');
include_once('../classes/service.trabalho.php');

// Insere variáveis do Form na Classe
$trabalho = new Trabalho();

/* @var $eventoAtual Evento */

// Se é uma edição, preenche o objeto com dados do BD
if ($_REQUEST["id"]) {
	$trabalho->select($_REQUEST["id"],$eventoAtual->getID());
	$statusAnterior = $trabalho->getSTATUS();
	if ($trabalho->getID()) {
		$trabalho->setSTATUS($_REQUEST["status"]);
		$trabalho->setAREA($_REQUEST["area"]);
		$trabalho->setOBS($_REQUEST["obs"]);
		
		$trabalho->save();
        if ( $eventoAtual->getID()== 54 ) { 
              $stat=$_REQUEST["status"];
            $statusNovo = $trabalho->getSTATUS();
		
		  // Verifica se mudou o status
		  if ($statusAnterior != $statusNovo) {
			// Verifica se mudou para status final
			  if ($statusNovo == $trabalho->STATUS_ACEITO ||
			     $statusNovo == $trabalho->STATUS_ACEITO_COM_RESTRICOES || $statusNovo == $trabalho->STATUS_REJEITADO || $statusNovo == $trabalho->STATUS_MUITO_BOM || $statusNovo == $trabalho->STATUS_EXCELENTE ) {
				 header("Location: trabalho_envia_resultado.php?trab_id=".$trabalho->getID());
			  } else {
				// Permaneceu com status intermediário
				 header("Location: trabalho_list.php");
			  }
		  } else {
			  header("Location: trabalho_list.php");
		  }
           

        }else {
		  $statusNovo = $trabalho->getSTATUS();
		
		  // Verifica se mudou o status
		  if ($statusAnterior != $statusNovo) {
			// Verifica se mudou para status final
			  if ($statusNovo == $trabalho->STATUS_ACEITO ||
			     $statusNovo == $trabalho->STATUS_ACEITO_COM_RESTRICOES ||
			     $statusNovo == $trabalho->STATUS_REJEITADO) {
				 header("Location: trabalho_envia_resultado.php?trab_id=".$trabalho->getID());
			  } else {
				// Permaneceu com status intermediário
				 header("Location: trabalho_list.php");
			  }
		  } else {
			  header("Location: trabalho_list.php");
		  }
	    }
		
		
	} else {
		echo "Operação não autorizada.";
	}
} else {
		echo "Operação não autorizada.";
}


?>