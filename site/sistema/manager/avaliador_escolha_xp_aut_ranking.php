<? include("struct/auth.php"); 
//include_once("struct/struct_top2.php");

?>

<?
include_once('../classes/class.avaliador.php');
include_once('../classes/service.avaliador.php');
include_once('../classes/class.avaliacao.php');
include_once('../classes/service.avaliacao.php');
include_once('../classes/class.trabalho.php');
include_once('../classes/service.trabalho.php');


//echo"$aval_id_vinc<br><br><br>"; 
$evento_id = 24;


$avaliacao = new Avaliacao();
$trabalhoService = new TrabalhoService();

$trabalhoService = new TrabalhoService();
$trabalhoList = $trabalhoService->listTrabalhosFiltered($eventoAtual->getID(),$_REQUEST["area"],$_REQUEST["status"],"DATA DESC");

$trabalho = new Trabalho();


$trab_id_vinc = $_REQUEST["trab_id_vinc"];
$cont = $_REQUEST["cont"];
$cont_volta= $cont;
//$aval_id = $_REQUEST["aval_id"];
//echo"$trab_id_vinc"; 

//echo"<br>$area<br>area<br>";
?>
 
<?
 $avaliadorService = new AvaliadorService();
$avaliadorList = $avaliadorService->listAvaliadoresByEvento($eventoAtual->getID(),"NOME ASC");

?>

 <? for ($i = 0; $i < count($avaliadorList); $i++) {
		/* @var $avaliador Avaliador */
		$avaliador = $avaliadorList[$i]; ?>
      <?=  $aval_id=$avaliador->getID();   ?>
      <?php /*?>
      <?= $avaliador->getLOGIN() ?>
      <?= $avaliador->getTELEFONE() */?>
     
      <?= $avaliador->getNOME() ?>-----------
   
     
  <? 
   }; 
 
  echo"$aval_id";


  
   for ($i = 0; $i < count($trabalhoList); $i++ ) {
		/* @var $trabalho Trabalho */
		$trabalho = $trabalhoList[$i]; ?>
		<br>
  <?= $trabalho->getID() ?>
  
  
   <?php 
   $trab_id =$trabalho->getID();
     $avaliacao->setAVAL_ID($aval_id);
	             $avaliacao->setTRAB_ID($trab_id);
	
	             $data = date("Y-m-d H:i:s",mktime(date('H'),date('i'),date('s'),date('m'),date('d'),date('Y'))); // agora
	             $avaliacao->setDATA_ATRIBUIDO($data);
	
	             $avaliacao->setSTATUS($avaliacao->STATUS_NOVO);
	
     	         $avaliacao->insert();

	             $trabalho = $trabalhoService->loadTrabalhoById($trab_id,$eventoAtual->getID());
	             if ($trabalho->getID()) {
		            $trabalho->setSTATUS($trabalho->STATUS_EM_REVISAO);
		            $trabalho->save();
	          
	               echo"Vinculado com sucesso!";
	             }else{
				   echo"Não foi vinculado, porfavor vincule manualmente! ";
				 }
				 
		  
		// header( "Location:avaliador_escolha_xp_aut2.php?trab_id=$trab_id&area=$area&aval_id_vinc=$aval_id_vinc&cont_volta=$cont_volta" ) ; 
         
		 
	
	
    
	
}; ?>
    
	
	
	
    
	
 

<?
//if($cont_trab_env_t == $cont_trab_tot){

  // header( "Location:trabalho_list.php" ) ; 



?>
<!-------------------------------------conteudo para o usúario------------------------------>
<form action="trabalho_list.php">
<input type="submit"  value="Voltar" style="width:80px;">
</form> 
  
 