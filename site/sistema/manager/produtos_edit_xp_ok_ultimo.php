<? include_once("struct/auth.php")?>

<?
//include_once('../classes/class.palestrantes.php');
//include_once('../classes/service.palestrantes.php');
//include_once("struct/struct_functions.php");

// Insere variáveis do Form na Classe
//$palestrantes = new Palestrantes();

// Se é uma edição, preenche o objeto com dados do BD
//if ($_REQUEST["id"]) {
	//$palestrantes->select($_REQUEST["id"],$_REQUEST["even_id"]);
//}
header("Location: produtos_list.php");
// Preenche os dados editados
//$palestrantes->setID($_REQUEST["id"]);

//configuracoes para conexao com banco de dados
include ("conexao_teste.php");


$id_produtos=$_REQUEST["id_produtos"];
$nome_produtos=$_REQUEST["nome_produtos"];
$descricao_produtos=$_REQUEST["descricao_produtos"];

$foto1_produtos=$_FILES["foto1_produtos"];
$foto2_produtos=$_FILES["foto2_produtos"];
$foto3_produtos=$_FILES["foto3_produtos"];
$foto4_produtos=$_FILES["foto4_produtos"];
$foto5_produtos=$_FILES["foto5_produtos"];
$foto6_produtos=$_FILES["foto6_produtos"];



if ($id_produtos!=""){



//se existir o arquivo
if(isset($_FILES["foto1_produtos"])){

$foto1_produtos = $_FILES["foto1_produtos"];



$pasta_dir = "fotos/";//diretorio dos arquivos
//se não existir a pasta ele cria uma
if(!file_exists($pasta_dir)){
mkdir($pasta_dir);
}
// Gera um nome único para a imagem
       
$arquivo1_nome = $pasta_dir .$arquivo1_nome= md5(uniqid(time())) . “.” . $ext[1].".jpg";

// Faz o upload da imagem
move_uploaded_file($foto1_produtos["tmp_name"], $arquivo1_nome);
}
//se existir o arquivo
if(isset($_FILES["foto2_produtos"])){

$foto2_produtos = $_FILES["foto2_produtos"];

$pasta_dir = "fotos/";//diretorio dos arquivos
//se não existir a pasta ele cria uma
if(!file_exists($pasta_dir)){
mkdir($pasta_dir);
}
$arquivo2_nome = $pasta_dir .$arquivo2_nome= md5(uniqid(time())) . “.” . $ext[1].".jpg";
//$arquivo2_nome = $pasta_dir ."foto2_produtos". $foto2_produtos["name"];

// Faz o upload da imagem
move_uploaded_file($foto2_produtos["tmp_name"], $arquivo2_nome);
}


//se existir o arquivo
if(isset($_FILES["foto3_produtos"])){

$foto3_produtos = $_FILES["foto3_produtos"];

$pasta_dir = "fotos/";//diretorio dos arquivos
//se não existir a pasta ele cria uma
if(!file_exists($pasta_dir)){
mkdir($pasta_dir);
}
$arquivo3_nome = $pasta_dir .$arquivo3_nome= md5(uniqid(time())) . “.” . $ext[1].".jpg";
//$arquivo3_nome = $pasta_dir ."foto3_produtos". $foto3_produtos["name"];

// Faz o upload da imagem
move_uploaded_file($foto3_produtos["tmp_name"], $arquivo3_nome);
}
//se existir o arquivo
if(isset($_FILES["foto4_produtos"])){

$foto4_produtos = $_FILES["foto4_produtos"];

$pasta_dir = "fotos/";//diretorio dos arquivos
//se não existir a pasta ele cria uma
if(!file_exists($pasta_dir)){
mkdir($pasta_dir);
}
$arquivo4_nome = $pasta_dir .$arquivo4_nome= md5(uniqid(time())) . “.” . $ext[1].".jpg";
//$arquivo4_nome = $pasta_dir ."foto4_produtos". $foto4_produtos["name"];

// Faz o upload da imagem
move_uploaded_file($foto4_produtos["tmp_name"], $arquivo4_nome);
}
//se existir o arquivo
if(isset($_FILES["foto5_produtos"])){

$foto5_produtos = $_FILES["foto5_produtos"];

$pasta_dir = "fotos/";//diretorio dos arquivos
//se não existir a pasta ele cria uma
if(!file_exists($pasta_dir)){
mkdir($pasta_dir);
}
$arquivo5_nome = $pasta_dir .$arquivo5_nome= md5(uniqid(time())) . “.” . $ext[1].".jpg";
//$arquivo5_nome = $pasta_dir ."foto5_produtos". $foto5_produtos["name"];

// Faz o upload da imagem
move_uploaded_file($foto5_produtos["tmp_name"], $arquivo5_nome);
}
//se existir o arquivo
if(isset($_FILES["foto6_produtos"])){

$foto6_produtos = $_FILES["foto6_produtos"];

$pasta_dir = "fotos/";//diretorio dos arquivos
//se não existir a pasta ele cria uma
if(!file_exists($pasta_dir)){
mkdir($pasta_dir);
}
$arquivo6_nome = $pasta_dir .$arquivo6_nome= md5(uniqid(time())) . “.” . $ext[1].".jpg";
//$arquivo6_nome = $pasta_dir ."foto6_produtos". $foto6_produtos["name"];

// Faz o upload da imagem
move_uploaded_file($foto6_produtos["tmp_name"], $arquivo6_nome);
}
 
   $sql = "UPDATE produtos SET NOME_PRODUTOS='$nome_produtos', DESCRICAO_PRODUTOS='$descricao_produtos',FOTO1_PRODUTOS='$arquivo1_nome',FOTO2_PRODUTOS='$arquivo2_nome',FOTO3_PRODUTOS='$arquivo3_nome',FOTO4_PRODUTOS='$arquivo4_nome',FOTO5_PRODUTOS='$arquivo5_nome',FOTO6_PRODUTOS='$arquivo6_nome' WHERE ID_PRODUTOS='$id_produtos'";
   
}else{

   $sql = "INSERT INTO produtos (NOME_PRODUTOS,DESCRICAO_PRODUTOS,FOTO1_PRODUTOS,FOTO2_PRODUTOS,FOTO3_PRODUTOS,FOTO4_PRODUTOS,FOTO5_PRODUTOS,FOTO6_PRODUTOS) VALUES ('".$nome_produtos."','".$descricao_produtos."','".$foto1_produtos."','".$foto2_produtos."','".$foto3_produtos."','".$foto4_produtos."','".$foto5_produtos."','".$foto6_produtos."')";

}   
   
   If(!$resultado = mysql_query($sql)) $contadora++;
         
   If($resultado)
   {
      header("Location: produtos_list.php");
   }
   Else
   {
      header("Location: produtos_edit.php");
   }





?>