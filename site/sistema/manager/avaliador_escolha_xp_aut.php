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

$aval_id_vinc =$_REQUEST["aval_id_vinc"];
//echo"$aval_id_vinc<br><br><br>"; 
$evento_id = 23;
$area = $_REQUEST["area"];

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
		$avaliador = $avaliadorList[$i]; 
		 $cel= $avaliador->getCELULAR();?>
     
      <?  if($avaliador->getSTATUS()=="1" && $cel == $area){
	       $cont_tot=$cont_tot+1;
		   
	       
		 
		  }
	  
   
   

		 /*<?= ($avaliador->getSTATUS()=="1") ? "Ativo" : "";?>
		<?= ($avaliador->getSTATUS()=="2") ? "Inativo" : "";?><?php */?>
      <br>
  <? }; 
  //echo"<br>$cont_tot<br>";?>




<?
if($cont_tot == $cont_volta){
 $cont_volta ="0";

}
?>
 
  
  
	
  <? 

  
   for ($i = 0; $i < count($trabalhoList); $i++ ) {
		/* @var $trabalho Trabalho */
		$trabalho = $trabalhoList[$i]; ?>
		<br>
  <?= $trabalho->getID() ?>
   <? if($trabalho->getSTATUS()!="0"){
      echo"Vinculado!";
   
   }else{
      echo"Esperando Vinculação!";
   } ?>
  
   <?php 
   $trab_id =$trabalho->getID();
      if($trabalho->getSTATUS()=="0" && $trab_id_vinc != $trab_id  ){
		  
		 header( "Location:avaliador_escolha_xp_aut2.php?trab_id=$trab_id&area=$area&aval_id_vinc=$aval_id_vinc&cont_volta=$cont_volta" ) ; 
         
		 
	  } else{
		 
	    
	  }
      
   ?>
	
    
	
  <? }; ?>
    
	
	
	
    
	
 

<?
//if($cont_trab_env_t == $cont_trab_tot){

  // header( "Location:trabalho_list.php" ) ; 



?>
<!-------------------------------------conteudo para o usúario------------------------------>
<form action="trabalho_list.php">
<input type="submit"  value="Voltar" style="width:80px;">
</form> 
  
 