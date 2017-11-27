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
$tabela = "temas"; 

//dados do administrador

$conexao = mysql_connect($host, $user, $password)
           or die(mysql_error()); 
$banco = mysql_select_db($db) or die(mysql_error()); 


$id_temas=$_REQUEST["id_temas"];
$nome_temas=$_REQUEST["nome_temas"];
//$curriculo_palestrantes=$_REQUEST["curriculo_palestrantes"];


if ($id_temas!=""){
 
   $sql = "UPDATE temas SET NOME_TEMAS='$nome_temas' WHERE ID_TEMAS='$id_temas'";
   
}else{

  $sql = "INSERT INTO temas (NOME_TEMAS) VALUES ('".$nome_temas."')";

}
   If(!$resultado = mysql_query($sql)) $contadora++;
         
   If($resultado)
   {
      header("Location: temas_list.php");
   }
   Else
   {
      header("Location: temas_edit.php");
   }




?>