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
$tabela = "intervalos"; 

//dados do administrador

$conexao = mysql_connect($host, $user, $password)
           or die(mysql_error()); 
$banco = mysql_select_db($db) or die(mysql_error()); 


$id_intervalos=$_REQUEST["id_intervalos"];
$dia_intervalos=$_REQUEST["dia_intervalos"];

$turno_intervalos=$_REQUEST["turno_intervalos"];

$inicio_intervalos=$_REQUEST["inicio_intervalos"];

$fim_intervalos=$_REQUEST["fim_intervalos"];


if ($id_intervalos!=""){
 
   $sql = "UPDATE intervalos SET DIA_INTERVALOS='$dia_intervalos',TURNO_INTERVALOS='$turno_intervalos',INICIO_INTERVALOS='$inicio_intervalos',FIM_INTERVALOS='$fim_intervalos' WHERE ID_INTERVALOS='$id_intervalos'";
   
}else{

   $sql = "INSERT INTO intervalos (DIA_INTERVALOS,TURNO_INTERVALOS,INICIO_INTERVALOS,FIM_INTERVALOS ) VALUES ('".$dia_intervalos."','".$turno_intervalos."','".$inicio_intervalos."','".$fim_intervalos."')";

}
   If(!$resultado = mysql_query($sql)) $contadora++;
         
   If($resultado)
   {
      header("Location: intervalos_list.php");
   }
   Else
   {
      header("Location: intervalos_edit.php");
   }



?>