<? include("struct/auth.php"); ?>

<?
include_once('../classes/class.avaliador.php');
include_once('../classes/service.avaliador.php');
include_once('../classes/class.avaliacao.php');
include_once('../classes/service.avaliacao.php');
include_once('../classes/class.trabalho.php');
include_once('../classes/service.trabalho.php');

 $aval_id_vinc= $_REQUEST["aval_id_vinc"];
$evento_id = $_REQUEST["evento_id"];
$area = $_REQUEST["area"];
$trab_id = $_REQUEST["trab_ID"];
$cont_volta= $_REQUEST["cont_volta"];
$area_aval=$area;
$avaliacao = new Avaliacao();
$trabalhoService = new TrabalhoService();

$trabalhoService = new TrabalhoService();
$trabalhoList = $trabalhoService->listTrabalhosFiltered($eventoAtual->getID(),$_REQUEST["area"],$_REQUEST["status"],"DATA DESC");

$trabalho = new Trabalho();


//$trab_id = $_REQUEST["trab_id"];
//$aval_id = $_REQUEST["aval_id"];

echo"$evento_id <p>";
echo"$area <p>";

echo"<br><br><br>$trab_id<br><br><br><br>"
// Se é uma edição, preenche o objeto com dados do BD
/*
*/
?>
 
<?
 $avaliadorService = new AvaliadorService();
$avaliadorList = $avaliadorService->listAvaliadoresByEvento($eventoAtual->getID(),"NOME ASC");
echo"<br>contador voltando:$cont_volta<br>";
?>


  <? for ($i = 0; $i < count($avaliadorList); $i++) {
		/* @var $avaliador Avaliador */
		$avaliador = $avaliadorList[$i]; ?>
      <?=  $avaliador->getID()   ?>----------
      <?php /*?>
      <?= $avaliador->getLOGIN() ?>
      <?= $avaliador->getTELEFONE() */?>
       <?= $cel= $avaliador->getCELULAR()?>
      <?= $avaliador->getNOME() ?>-----------
      <?= $avaliador->getCELULAR() ?>-----------
      <?  if($avaliador->getSTATUS()=="1" && $cel == $area_aval){
	       $cont=$cont+1;
		   echo"<br>$cont<br>";
	        $aval_id =$avaliador->getID();
			if($area){
		    if($cont > $cont_volta ){
			  if($aval_id != $aval_id_vinc && $trab_id !=  $trab_id_vinc ) {
			  
	             $avaliacao->setAVAL_ID($aval_id);
	             $avaliacao->setTRAB_ID($trab_id);
	
	             $data = date("Y-m-d H:i:s",mktime(date('H'),date('i'),date('s'),date('m'),date('d'),date('Y'))); // agora
	             $avaliacao->setDATA_ATRIBUIDO($data);
	
	             $avaliacao->setSTATUS($avaliacao->STATUS_NOVO);
	
     	         $avaliacao->insert();

	             $trabalho = $trabalhoService->loadTrabalhoById($trab_id,$eventoAtual->getID());
	             if ($trabalho->getID() && $trabalho->getSTATUS() == $trabalho->STATUS_NOVO) {
		            $trabalho->setSTATUS($trabalho->STATUS_EM_REVISAO);
		            $trabalho->save();
	          
	                $aval_id_vinc=$aval_id;
			        $trab_id_vinc=$trab_id;
	                header( "Location:avaliador_escolha_xp_aut.php?trab_id_vinc=$trab_id_vinc&area=$area&aval_id_vinc=$aval_id_vinc&cont=$cont" ) ;
	             }
                   // header( "Location:avaliador_escolha_xp_aut.php?trab_id_vinc=$trab_id_vinc&area=$area&aval_id_vinc=$aval_id_vinc&cont=$cont" ) ;
		       } else {
		          // header( "Location:trabalho_list.php" ) ;
		          echo "<br>$aval_id_vinc.  <br>";
			   }
			 }
             }
		  
		  echo"ja esta vinculado a um trabalho";
		  }
	  
   
   

		 /*<?= ($avaliador->getSTATUS()=="1") ? "Ativo" : "";?>
		<?= ($avaliador->getSTATUS()=="2") ? "Inativo" : "";?><?php */?>
      <br>
  <? }; ?>
  
 






  
   
 
