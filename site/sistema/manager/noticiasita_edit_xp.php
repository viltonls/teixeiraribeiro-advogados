<? include_once("struct/struct_top.php")?>
<? include_once("struct/auth.php")?>

<?php
// Aqui incluimos a classe upload
include ("conexao_teste.php");
include('class.upload.php');

$excluir=$_REQUEST["excluir"];
$id_noticia=$_REQUEST["id_noticia"];
$noticia_titulo=$_REQUEST["noticia_titulo"];

$noticia_data=$_REQUEST["noticia_data"];
$noticia_corpo=$_REQUEST["noticia_corpo"];
$noticia_doc=$_FILES["noticia_doc"]; 
$arqName = $_FILES['noticia_doc']['name'];
$doca=$_REQUEST["doca"];

// Verificamos se a acao é igual a imagem
if ($id_noticia!=""){
$id_p = $id_noticia;
$consulta=mysql_query("SELECT * FROM noticias_ita where id_noticia='$id_p'"); 

//Fazendo o looping para exibição de todos registros que contiverem em nomedatabela

while ($dados = mysql_fetch_array($consulta)) {


$doc1_p=$dados['noticia_doc'];


}

if ($_POST['acao'] == 'doc') 
{
if($doca=="1"){

   $arquivo1_nome="";
   if($fdoc1_p!=""){
       unlink("doc_noticia/$doc1_p");

    }

}else{
if(isset($_FILES["noticia_doc"])){
  //$pasta_dir = "./imagens/";
  
   
    // Instanciamos o objeto Upload
    $handle = new Upload($_FILES['noticia_doc']);
          
    // Então verificamos se o arquivo foi carregado corretamente
    if ($handle->uploaded) 
	{       
        
   // Definimos as configurações desejadas da imagem maior
     if($doc1_p!=""){
       unlink("doc_noticia/$doc1_p");

     }
        $extensao = strtolower(end(explode('.', $arqName)));
     $arquivo1_nome_p =$arquivo1_nome= md5(uniqid(time()))  . $ext[1];
   $arquivo1_nome =$arquivo1_nome_p.".$extensao";
        // Em caso de sucesso no upload podemos fazer outras ações como insert em um banco de cados
        
       // Definimos as configurações desejadas da imagem maior
        //$handle->image_resize            = true;
        //$handle->image_ratio_y           = false;
         //$handle->image_x                 = 640;
		//$handle->image_y                 = 416;
		//$handle->image_watermark         = 'watermark.png';
		//$handle->image_watermark_x       = -10;
		//$handle->image_watermark_y       = -10;
		//$handle->image_bevel = 20;
		/*$handle->image_bevel_color1 = '#FF0000';
		$handle->image_reflection_height = '25%';
		$handle->image_reflection_space = -6;*/

		
		$handle->file_new_name_body =  $arquivo1_nome_p;// "1";
        // Definimos a pasta para onde a imagem thumbs será armazenada
        $handle->Process('doc_noticia/');
        
        // Excluimos os arquivos temporarios
        $handle-> Clean();

    } 
	else 
	{
        $arquivo1_nome= $doc1_p;
	    // Em caso de erro listamos o erro abaixo
        
    } 
	
 }
}


} // end imagem ação



  $sql = "UPDATE noticias_ita SET NOTICIA_TITULO='$noticia_titulo', NOTICIA_DATA='$noticia_data', NOTICIA_CORPO='$noticia_corpo', NOTICIA_DOC='$arquivo1_nome' WHERE ID_NOTICIA='$id_noticia'";
   
}else{

if ($_POST['acao'] == 'doc') 
{
if(isset($_FILES["noticia_doc"])){
  //$pasta_dir = "./imagens/";
 
   
    // Instanciamos o objeto Upload
    $handle = new Upload($_FILES['noticia_doc']);
          
    // Então verificamos se o arquivo foi carregado corretamente
    if ($handle->uploaded) 
	{       
        // Definimos as configurações desejadas da imagem maior
	$extensao = strtolower(end(explode('.', $arqName)));
     $arquivo1_nome_p =$arquivo1_nome= md5(uniqid(time()))  . $ext[1];
   $arquivo1_nome =$arquivo1_nome_p.".$extensao";
    //preg_match("/\.(xls|doc|pdf|gif|bmp|png|jpg|jpeg){1}$/i", $doc_arquivo_name["name"], $ext);
	//$extensao = strtolower(end(explode('.', $arqName))); 
    //$arquivo1_nome=md5(uniqid(time())) . "." . $extensao;
	//$arquivo1_nome_p =$arquivo1_nome= md5(uniqid(time()))  . $ext[1];
                     
        
        // Em caso de sucesso no upload podemos fazer outras ações como insert em um banco de cados
        
       // Definimos as configurações desejadas da imagem maior
        //$handle->image_resize            = true;
        //$handle->image_ratio_y           = false;
        //$handle->image_x                 = 640;
		//$handle->image_y                 = 416;
		//$handle->image_watermark         = 'watermark.png';
		//$handle->image_watermark_x       = -10;
		//$handle->image_watermark_y       = -10;
		//$handle->image_bevel = 20;
		/*$handle->image_bevel_color1 = '#FF0000';
		$handle->image_reflection_height = '25%';
		$handle->image_reflection_space = -6;*/

		
		$handle->file_new_name_body =  $arquivo1_nome_p;// "1";
        // Definimos a pasta para onde a imagem thumbs será armazenada
        $handle->Process('doc_noticia/');
        
        // Excluimos os arquivos temporarios
        $handle-> Clean();

    } 
	else 
	{
       $arquivo1_nome="";
	    // Em caso de erro listamos o erro abaixo
        
    } 
	
 }


} // end imagem ação

   $sql = "INSERT INTO noticias_ita (NOTICIA_TITULO,NOTICIA_DATA,NOTICIA_CORPO,NOTICIA_DOC) VALUES ('".$noticia_titulo."','".$noticia_data."','".$noticia_corpo."','".$arquivo1_nome."')";

}   
If(!$resultado = mysql_query($sql)) $contadora++;
         
   If($resultado)
   {
      echo"Esta Novidade foi salva com sucesso!";//header("Location: receitas_list.php");//echo"<br>ok<br>"; //  
   }
   Else
   {
      echo"Não foi salva esta novidade!";
	  //echo"<br>Not<br>";//header("Location: produtos_edit.php");
   }
//echo '<p><a href="indexx.html">Voltar</a></p>';
// Aqui somente recupero o nome da imagem caso queira fazer um insert em banco de dados
$nome_da_imagem = $handle->file_dst_name;

//echo $nome_da_imagem;
///echo"$foto1_produtos";
?> 
</body>

</html>
