<? include_once("struct/struct_top.php")?>
<? include_once("struct/auth.php")?>

<?php
// Aqui incluimos a classe upload
include ("conexao_teste.php");
include('class.upload.php');

$excluir=$_REQUEST["excluir"];
$id_depoimentos=$_REQUEST["id_depoimentos"];
$depoimentos_nome=$_REQUEST["depoimentos_nome"];
$depoimentos_cargo=$_REQUEST["depoimentos_cargo"];

$depoimentos_dadoscomplementares=$_REQUEST["depoimentos_dadoscomplementares"];
$depoimentos_site=$_REQUEST["depoimentos_site"];
$depoimentos_corpo=$_REQUEST["depoimentos_corpo"];


$depoimentos_foto=$_FILES["depoimentos_foto"]; 
$fotoa=$_REQUEST["fotoa"];
$depoimentos_ordem=$_REQUEST["depoimentos_ordem"]; 

// Verificamos se a acao é igual a imagem
if ($id_depoimentos!=""){
$id_p = $id_depoimentos;
$consulta=mysql_query("SELECT * FROM depoimentos where id_depoimentos='$id_p'"); 

//Fazendo o looping para exibição de todos registros que contiverem em nomedatabela
while ($dados = mysql_fetch_array($consulta)) {


$foto1_p=$dados['depoimentos_foto'];


}

if ($_POST['acao'] == 'imagem') 
{
if($fotoa=="1"){

   $arquivo1_nome="";
   if($foto1_p!=""){
       unlink("img_depoimentos/$foto1_p");

    }

}else{
if(isset($_FILES["depoimentos_foto"])){
  //$pasta_dir = "./imagens/";
  
   
    // Instanciamos o objeto Upload
    $handle = new Upload($_FILES['depoimentos_foto']);
          
    // Então verificamos se o arquivo foi carregado corretamente
    if ($handle->uploaded) 
	{       
        
   // Definimos as configurações desejadas da imagem maior
     if($foto1_p!=""){
       unlink("img_depoimentos/$foto1_p");

     }
        $arquivo1_nome_p =$arquivo1_nome= md5(uniqid(time()))  . $ext[1];
      $arquivo1_nome =$arquivo1_nome_p.".jpg";
        // Em caso de sucesso no upload podemos fazer outras ações como insert em um banco de cados
        
       // Definimos as configurações desejadas da imagem maior
        $handle->image_resize            = true;
        $handle->image_ratio_y           = false;
         $handle->image_x                 = 640;
		$handle->image_y                 = 416;
		$handle->image_watermark         = 'watermark.png';
		$handle->image_watermark_x       = -10;
		$handle->image_watermark_y       = -10;
		//$handle->image_bevel = 20;
		/*$handle->image_bevel_color1 = '#FF0000';
		$handle->image_reflection_height = '25%';
		$handle->image_reflection_space = -6;*/

		
		$handle->file_new_name_body =  $arquivo1_nome_p;// "1";
        // Definimos a pasta para onde a imagem thumbs será armazenada
        $handle->Process('img_depoimentos/');
        
        // Excluimos os arquivos temporarios
        $handle-> Clean();

    } 
	else 
	{
        $arquivo1_nome= $foto1_p;
	    // Em caso de erro listamos o erro abaixo
        
    } 
	
 }
}


} // end imagem ação


  $sql = "UPDATE depoimentos SET DEPOIMENTOS_NOME='$depoimentos_nome', DEPOIMENTOS_CARGO='$depoimentos_cargo', DEPOIMENTOS_DADOSCOMPLEMENTARES='$depoimentos_dadoscomplementares', DEPOIMENTOS_SITE='$depoimentos_site',DEPOIMENTOS_CORPO='$depoimentos_corpo',DEPOIMENTOS_FOTO='$arquivo1_nome', DEPOIMENTOS_ORDEM='$depoimentos_ordem' WHERE ID_DEPOIMENTOS='$id_depoimentos'";
   
}else{


if ($_POST['acao'] == 'imagem') 
{
if(isset($_FILES["depoimentos_foto"])){
  //$pasta_dir = "./imagens/";
 
   
    // Instanciamos o objeto Upload
    $handle = new Upload($_FILES['depoimentos_foto']);
          
    // Então verificamos se o arquivo foi carregado corretamente
    if ($handle->uploaded) 
	{       
        // Definimos as configurações desejadas da imagem maior
     $arquivo1_nome_p =$arquivo1_nome= md5(uniqid(time()))  . $ext[1];
   $arquivo1_nome =$arquivo1_nome_p.".jpg";
        
        // Em caso de sucesso no upload podemos fazer outras ações como insert em um banco de cados
        
       // Definimos as configurações desejadas da imagem maior
        $handle->image_resize            = true;
        $handle->image_ratio_y           = false;
        $handle->image_x                 = 640;
		$handle->image_y                 = 416;
		$handle->image_watermark         = 'watermark.png';
		$handle->image_watermark_x       = -10;
		$handle->image_watermark_y       = -10;
		//$handle->image_bevel = 20;
		/*$handle->image_bevel_color1 = '#FF0000';
		$handle->image_reflection_height = '25%';
		$handle->image_reflection_space = -6;*/

		
		$handle->file_new_name_body =  $arquivo1_nome_p;// "1";
        // Definimos a pasta para onde a imagem thumbs será armazenada
        $handle->Process('img_depoimentos/');
        
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

   $sql = "INSERT INTO depoimentos (DEPOIMENTOS_NOME,DEPOIMENTOS_CARGO,DEPOIMENTOS_DADOSCOMPLEMENTARES,DEPOIMENTOS_SITE,DEPOIMENTOS_CORPO,DEPOIMENTOS_FOTO,DEPOIMENTOS_ORDEM) VALUES ('".$depoimentos_nome."','".$depoimentos_cargo."','".$depoimentos_dadoscomplementares."','".$depoimentos_site."','".$depoimentos_corpo."','".$arquivo1_nome."','".$depoimentos_ordem."')";

}   
If(!$resultado = mysql_query($sql)) $contadora++;
         
   If($resultado)
   {
      echo"Este depoimento foi salvo com sucesso!";//header("Location: receitas_list.php");//echo"<br>ok<br>"; //  
   }
   Else
   {
      echo"Não foi salvo este depoimento!";
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
