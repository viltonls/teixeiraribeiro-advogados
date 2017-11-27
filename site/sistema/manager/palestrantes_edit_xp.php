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
$tabela = "palestrantes"; 

//dados do administrador

$conexao = mysql_connect($host, $user, $password)
           or die(mysql_error()); 
$banco = mysql_select_db($db) or die(mysql_error()); 


$id_palestrantes=$_REQUEST["id_palestrantes"];
$nome_palestrantes=$_REQUEST["nome_palestrantes"];
$curriculo_palestrantes=$_REQUEST["curriculo_palestrantes"];


if ($id_palestrantes!=""){
 
   $sql = "UPDATE palestrantes SET NOME_PALESTRANTES='$nome_palestrantes', CURRICULO_PALESTRANTES='$curriculo_palestrantes' WHERE ID_PALESTRANTES='$id_palestrantes'";
   
}else{

   $sql = "INSERT INTO palestrantes (NOME_PALESTRANTES,CURRICULO_PALESTRANTES ) VALUES ('".$nome_palestrantes."','".$curriculo_palestrantes."')";

}   
   
   If(!$resultado = mysql_query($sql)) $contadora++;
         
   If($resultado)
   {
      header("Location: palestrantes_list.php");
   }
   Else
   {
      header("Location: palestrantes_edit.php");
   }





?>