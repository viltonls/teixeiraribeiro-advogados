<? include_once("struct/auth.php")?>
<?
if (!session_is_registered("evento")) { 
	header("Location: session_seleciona_evento.php?url=inscricao_list.php&orga_id=0&configurado=1");
} else {
	
include_once("struct/struct_top.php");
include_once('../classes/class.trabalho.php');
include_once('../classes/service.trabalho.php');
include_once('../classes/class.avaliacao.php');
include_once('../classes/service.avaliacao.php');
include_once('../classes/class.avaliador.php');
include_once('../classes/service.avaliador.php');
include_once('../classes/dto.avaliacao_trabalho.php');

$aval_id = $_REQUEST['aval_id'];

/* @var $eventoConfiguracaoXMLAtual ConfiguracaoXML */
/* @var $eventoConfiguracaoAtual Configuracao */
$avaliacao = new Avaliacao();
$avaliacaoService = new AvaliacaoService();
$avaliacaoTrabalhoList = $avaliacaoService->loadAvaliacaoTrabalhoFiltered($aval_id,"",$status,$eventoAtual->getID());

$avaliadorService = new AvaliadorService();
$avaliador = $avaliadorService->loadAvaliadorById($aval_id);
/* @var $avaliador Avaliador */


?>

  <? for ($i = 0; $i < count($avaliacaoTrabalhoList); $i++) {
		/* @var $avaliacaoTrabalho AvaliacaoTrabalhoDTO */
		$avaliacaoTrabalho = $avaliacaoTrabalhoList[$i]; 
		$cont =$cont+1;
		?>
  
    	
 <?  
  }; 
 } 
 

 ?>
 <table width="1131" border="1"  bgcolor="#00FF99">
  <tr>
    <td width="647">
	 <? echo"$cont"; ?>	</td>
  </tr>
  <tr>
    <td>
	 <? echo"$cont"; ?>
	</td>
  </tr><tr>
    <td>
	 <? echo"$cont"; ?>
	</td>
  </tr><tr>
    <td>
	 <? echo"$cont"; ?>
	</td>
  </tr><tr>
    <td>
	 <? echo"$cont"; ?>
	</td>
  </tr><tr>
    <td>
	 <? echo"$cont"; ?>
	</td>
  </tr><tr>
    <td>
	 <? echo"$cont"; ?>
	</td>
  </tr>
 </table>
