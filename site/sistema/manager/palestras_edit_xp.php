<? include_once("struct/auth.php")?>
<?
include_once('../classes/class.palestrantes.php');
include_once('../classes/service.palestrantes.php');
include_once("struct/struct_functions.php");

// Insere variáveis do Form na Classe
//$palestrantes = new Palestrantes();

// Se é uma edição, preenche o objeto com dados do BD
//if ($_REQUEST["id"]) {
	//$palestrantes->select($_REQUEST["id"],$_REQUEST["even_id"]);
//}

// Preenche os dados editados
//$palestrantes->setID($_REQUEST["id"]);

//configuracoes para conexao com banco de dados
$host = "187.45.196.151"; 
$user = "w57cba2010"; 
$password = "a45wert1L"; 
$db = "w57cba2010"; 
$tabela = "palestras"; 

//dados do administrador

$conexao = mysql_connect($host, $user, $password)
           or die(mysql_error()); 
$banco = mysql_select_db($db) or die(mysql_error()); 

$id_palestras=$_REQUEST["id_palestras"];

$nome_palestras=$_REQUEST["nome_palestras"];

$dia_palestras=$_REQUEST["dia_palestras"];

$tema_palestras=$_REQUEST["tema_palestras"];

$turno_palestras=$_REQUEST["turno_palestras"];

$sala_palestras=$_REQUEST["sala_palestras"];

$inicio_palestras=$_REQUEST["inicio_palestras"];

$fim_palestras=$_REQUEST["fim_palestras"];

$palestrante_palestras=$_REQUEST["palestrante_palestras"];

$url_palestrante_palestras=$_REQUEST["url_palestrante_palestras"];

if ($id_palestras!=""){
 
   $sql = "UPDATE palestras SET NOME_PALESTRAS='$nome_palestras',DIA_PALESTRAS='$dia_palestras',TEMA_PALESTRAS='$tema_palestras',TURNO_PALESTRAS='$turno_palestras',SALA_PALESTRAS='$sala_palestras',INICIO_PALESTRAS='$inicio_palestras',FIM_PALESTRAS='$fim_palestras',PALESTRANTE_PALESTRAS='$palestrante_palestras',URL_PALESTRANTE_PALESTRAS='$url_palestrante_palestras' WHERE ID_PALESTRAS='$id_palestras'";
   
}else{

$sql = "INSERT INTO palestras (NOME_PALESTRAS,DIA_PALESTRAS,TEMA_PALESTRAS,TURNO_PALESTRAS,SALA_PALESTRAS,INICIO_PALESTRAS,FIM_PALESTRAS,PALESTRANTE_PALESTRAS,URL_PALESTRANTE_PALESTRAS ) VALUES ('".$nome_palestras."','".$dia_palestras."','".$tema_palestras."','".$turno_palestras."','".$sala_palestras."','".$inicio_palestras."','".$fim_palestras."','".$palestrante_palestras."','".$url_palestrante_palestras."')";

}

   If(!$resultado = mysql_query($sql)) $contadora++;
         
   If($resultado)
   {
      header("Location: palestras_list.php");
   }
   Else
   {
      header("Location: palestras_edit.php");
   }



?>