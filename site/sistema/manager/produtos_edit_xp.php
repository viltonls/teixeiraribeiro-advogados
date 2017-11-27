<? include_once("struct/struct_top.php")?>
<? include_once("struct/auth.php")?>

<?php
// Aqui incluimos a classe upload
include ("conexao_teste.php");
include('class.upload.php');

$excluir=$_REQUEST["excluir"];
$id_produtos=$_REQUEST["id_produtos"];
$nome_produtos=$_REQUEST["nome_produtos"];
$categoria_produtos=$_REQUEST["categoria_produtos"];

$descricao_produtos=$_REQUEST["descricao_produtos"];

$foto1_produtos=$_FILES["foto1_produtos"]; 
$fotoa=$_REQUEST["fotoa"];
$foto2_produtos=$_FILES["foto2_produtos"];
$fotob=$_REQUEST["fotob"];
$foto3_produtos=$_FILES["foto3_produtos"];
$fotoc=$_REQUEST["fotoc"];
$foto4_produtos=$_FILES["foto4_produtos"];
$fotod=$_REQUEST["fotod"];
$foto5_produtos=$_FILES["foto5_produtos"];
$fotoe=$_REQUEST["fotoe"];
$foto6_produtos=$_FILES["foto6_produtos"];
$fotof=$_REQUEST["fotof"];
// Verificamos se a acao é igual a imagem
if ($id_produtos!=""){
$id_p = $id_produtos;
$consulta=mysql_query("SELECT * FROM produtos where id_produtos='$id_p'"); 

//Fazendo o looping para exibição de todos registros que contiverem em nomedatabela
while ($dados = mysql_fetch_array($consulta)) {


$foto1_p=$dados['foto1_produtos'];
$foto2_p=$dados['foto2_produtos'];
$foto3_p=$dados['foto3_produtos'];
$foto4_p=$dados['foto4_produtos'];
$foto5_p=$dados['foto5_produtos'];
$foto6_p=$dados['foto6_produtos'];

}

if ($_POST['acao'] == 'imagem') 
{
if($fotoa=="1"){

   $arquivo1_nome="";
   if($foto1_p!=""){
       unlink("./imagens/$foto1_p");

    }

}else{
if(isset($_FILES["foto1_produtos"])){
  //$pasta_dir = "./imagens/";
  
   
    // Instanciamos o objeto Upload
    $handle = new Upload($_FILES['foto1_produtos']);
          
    // Então verificamos se o arquivo foi carregado corretamente
    if ($handle->uploaded) 
	{       
        
   // Definimos as configurações desejadas da imagem maior
     if($foto1_p!=""){
       unlink("./imagens/$foto1_p");

     }
        $arquivo1_nome_p =$arquivo1_nome= md5(uniqid(time()))  . $ext[1];
      $arquivo1_nome =$arquivo1_nome_p.".jpg";
        // Em caso de sucesso no upload podemos fazer outras ações como insert em um banco de cados
        
       // Definimos as configurações desejadas da imagem maior
        $handle->image_resize            = true;
        $handle->image_ratio_y           = false;
         $handle->image_x                 = 320;
		$handle->image_y                 = 240;
		$handle->image_watermark         = 'watermark.png';
		$handle->image_watermark_x       = -10;
		$handle->image_watermark_y       = -10;
		//$handle->image_bevel = 20;
		/*$handle->image_bevel_color1 = '#FF0000';
		$handle->image_reflection_height = '25%';
		$handle->image_reflection_space = -6;*/

		
		$handle->file_new_name_body =  $arquivo1_nome_p;// "1";
        // Definimos a pasta para onde a imagem thumbs será armazenada
        $handle->Process('./imagens/');
        
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

if($fotob=="1"){

   $arquivo2_nome="";
   if($foto2_p!=""){
       unlink("./imagens/$foto2_p");

    }

}else{
if(isset($_FILES["foto2_produtos"])){

   // $pasta_dir = "imagens/";
  
    // Instanciamos o objeto Upload
    $handle = new Upload($_FILES['foto2_produtos']);
    
    // Então verificamos se o arquivo foi carregado corretamente
    if ($handle->uploaded) 
	{       
        if($foto2_p!=""){
    unlink("./imagens/$foto2_p");

     }
	     $arquivo2_nome_p =$arquivo2_nome= md5(uniqid(time()))  . $ext[1];
   $arquivo2_nome =$arquivo2_nome_p.".jpg";// Definimos as configurações desejadas da imagem maior
     
        
        // Em caso de sucesso no upload podemos fazer outras ações como insert em um banco de cados
        
        // Definimos as configurações desejadas da imagem maior
        $handle->image_resize            = true;
        $handle->image_ratio_y           = false;
         $handle->image_x                 = 320;
		$handle->image_y                 = 240;
		$handle->image_watermark         = 'watermark.png';
		$handle->image_watermark_x       = -10;
		$handle->image_watermark_y       = -10;
		//$handle->image_bevel = 20;
		/*$handle->image_bevel_color1 = '#FF0000';
		$handle->image_reflection_height = '25%';
		$handle->image_reflection_space = -6;*/

		
		$handle->file_new_name_body =  $arquivo2_nome_p;// "1";
		
        // Definimos a pasta para onde a imagem thumbs será armazenada
        $handle->Process('./imagens/');
        
        // Excluimos os arquivos temporarios
        $handle-> Clean();

    } 
	else 
	{
       $arquivo2_nome= $foto2_p;
    } 
   }
   
   }
   if($fotoc=="1"){

   $arquivo3_nome="";
   if($foto3_p!=""){
       unlink("./imagens/$foto3_p");

    }

}else{
if(isset($_FILES["foto3_produtos"])){
  //$pasta_dir = "./imagens/";
  
    // Instanciamos o objeto Upload
    $handle = new Upload($_FILES['foto3_produtos']);
          
    // Então verificamos se o arquivo foi carregado corretamente
    if ($handle->uploaded) 
	{       
         if($foto3_p!=""){
    unlink("./imagens/$foto3_p");

     }// Definimos as configurações desejadas da imagem maior
     $arquivo3_nome_p =$arquivo3_nome= md5(uniqid(time()))  . $ext[1];
   $arquivo3_nome =$arquivo3_nome_p.".jpg";
        
        // Em caso de sucesso no upload podemos fazer outras ações como insert em um banco de cados
        
       // Definimos as configurações desejadas da imagem maior
        $handle->image_resize            = true;
        $handle->image_ratio_y           = false;
         $handle->image_x                 = 320;
		$handle->image_y                 = 240;
		$handle->image_watermark         = 'watermark.png';
		$handle->image_watermark_x       = -10;
		$handle->image_watermark_y       = -10;
		//$handle->image_bevel = 20;
		/*$handle->image_bevel_color1 = '#FF0000';
		$handle->image_reflection_height = '25%';
		$handle->image_reflection_space = -6;*/

		
		$handle->file_new_name_body =  $arquivo3_nome_p;// "1";
        // Definimos a pasta para onde a imagem thumbs será armazenada
        $handle->Process('./imagens/');
        
        // Excluimos os arquivos temporarios
        $handle-> Clean();

    } 
	else 
	{
      $arquivo3_nome= $foto3_p;
    } 
	
 }
 }
 if($fotod=="1"){

   $arquivo4_nome="";
   if($foto4_p!=""){
       unlink("./imagens/$foto4_p");

    }

}else{
 
 if(isset($_FILES["foto4_produtos"])){
  //$pasta_dir = "./imagens/";
  
    // Instanciamos o objeto Upload
    $handle = new Upload($_FILES['foto4_produtos']);
          
    // Então verificamos se o arquivo foi carregado corretamente
    if ($handle->uploaded) 
	{       
        if($foto4_p!=""){
    unlink("./imagens/$foto4_p");

     }// Definimos as configurações desejadas da imagem maior
     
         $arquivo4_nome_p =$arquivo4_nome= md5(uniqid(time()))  . $ext[1];
   $arquivo4_nome =$arquivo4_nome_p.".jpg";
        // Em caso de sucesso no upload podemos fazer outras ações como insert em um banco de cados
        
       // Definimos as configurações desejadas da imagem maior
        $handle->image_resize            = true;
        $handle->image_ratio_y           = false;
        $handle->image_x                 = 320;
		$handle->image_y                 = 240;
		$handle->image_watermark         = 'watermark.png';
		$handle->image_watermark_x       = -10;
		$handle->image_watermark_y       = -10;
		//$handle->image_bevel = 20;
		/*$handle->image_bevel_color1 = '#FF0000';
		$handle->image_reflection_height = '25%';
		$handle->image_reflection_space = -6;*/

		
		$handle->file_new_name_body =  $arquivo4_nome_p;// "1";
        // Definimos a pasta para onde a imagem thumbs será armazenada
        $handle->Process('./imagens/');
        
        // Excluimos os arquivos temporarios
        $handle-> Clean();

    } 
	else 
	{
       $arquivo4_nome= $foto4_p; // Em caso de erro listamos o erro abaixo
     
    } 
	
 }
 }
 if($fotoe=="1"){

   $arquivo5_nome="";
   if($foto5_p!=""){
       unlink("./imagens/$foto5_p");

    }

}else{

 
 if(isset($_FILES["foto5_produtos"])){
  //$pasta_dir = "./imagens/";
  
    // Instanciamos o objeto Upload
    $handle = new Upload($_FILES['foto5_produtos']);
          
    // Então verificamos se o arquivo foi carregado corretamente
    if ($handle->uploaded) 
	{       
        if($foto5_p!=""){
     unlink("./imagens/$foto5_p");

     }
	    // Definimos as configurações desejadas da imagem maior
      $arquivo5_nome_p =$arquivo5_nome= md5(uniqid(time()))  . $ext[1];
   $arquivo5_nome =$arquivo5_nome_p.".jpg";
        
        // Em caso de sucesso no upload podemos fazer outras ações como insert em um banco de cados
        
       // Definimos as configurações desejadas da imagem maior
        $handle->image_resize            = true;
        $handle->image_ratio_y           = false;
        $handle->image_x                 = 320;
		$handle->image_y                 = 240;
		$handle->image_watermark         = 'watermark.png';
		$handle->image_watermark_x       = -10;
		$handle->image_watermark_y       = -10;
		//$handle->image_bevel = 20;
		/*$handle->image_bevel_color1 = '#FF0000';
		$handle->image_reflection_height = '25%';
		$handle->image_reflection_space = -6;*/

		
		$handle->file_new_name_body =  $arquivo5_nome_p;// "1";
        // Definimos a pasta para onde a imagem thumbs será armazenada
        $handle->Process('./imagens/');
        
        // Excluimos os arquivos temporarios
        $handle-> Clean();

    } 
	else 
	{
        $arquivo5_nome= $foto5_p;// Em caso de erro listamos o erro abaixo
      
    } 
	
 } 
 
 }
 if($fotof=="1"){

   $arquivo6_nome="";
   if($foto6_p!=""){
       unlink("./imagens/$foto6_p");

    }

}else{
 if(isset($_FILES["foto6_produtos"])){
  //$pasta_dir = "./imagens/";
  
    // Instanciamos o objeto Upload
    $handle = new Upload($_FILES['foto6_produtos']);
          
    // Então verificamos se o arquivo foi carregado corretamente
    if ($handle->uploaded) 
	{       
         if($foto6_p!=""){
    unlink("./imagens/$foto6_p");

     }// Definimos as configurações desejadas da imagem maior
      $arquivo6_nome_p =$arquivo6_nome= md5(uniqid(time()))  . $ext[1];
   $arquivo6_nome =$arquivo6_nome_p.".jpg";
        
        // Em caso de sucesso no upload podemos fazer outras ações como insert em um banco de cados
        
       // Definimos as configurações desejadas da imagem maior
        $handle->image_resize            = true;
        $handle->image_ratio_y           = false;
        $handle->image_x                 = 320;
		$handle->image_y                 = 240;
		$handle->image_watermark         = 'watermark.png';
		$handle->image_watermark_x       = -10;
		$handle->image_watermark_y       = -10;
		//$handle->image_bevel = 20;
		/*$handle->image_bevel_color1 = '#FF0000';
		$handle->image_reflection_height = '25%';
		$handle->image_reflection_space = -6;
*/
		
		$handle->file_new_name_body =  $arquivo6_nome_p;// "1";
        // Definimos a pasta para onde a imagem thumbs será armazenada
        $handle->Process('./imagens/');
        
        // Excluimos os arquivos temporarios
        $handle-> Clean();

    } 
	else 
	{
        $arquivo6_nome= $foto6_p;// Em caso de erro listamos o erro abaixo
     
    } 
	
 }
 }
} // end imagem ação


  $sql = "UPDATE produtos SET NOME_PRODUTOS='$nome_produtos', CATEGORIA_PRODUTOS='$categoria_produtos', DESCRICAO_PRODUTOS='$descricao_produtos',FOTO1_PRODUTOS='$arquivo1_nome',FOTO2_PRODUTOS='$arquivo2_nome',FOTO3_PRODUTOS='$arquivo3_nome',FOTO4_PRODUTOS='$arquivo4_nome',FOTO5_PRODUTOS='$arquivo5_nome',FOTO6_PRODUTOS='$arquivo6_nome' WHERE ID_PRODUTOS='$id_produtos'";
   
}else{


if ($_POST['acao'] == 'imagem') 
{
if(isset($_FILES["foto1_produtos"])){
  //$pasta_dir = "./imagens/";
 
   
    // Instanciamos o objeto Upload
    $handle = new Upload($_FILES['foto1_produtos']);
          
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
        $handle->image_x                 = 320;
		$handle->image_y                 = 240;
		$handle->image_watermark         = 'watermark.png';
		$handle->image_watermark_x       = -10;
		$handle->image_watermark_y       = -10;
		//$handle->image_bevel = 20;
		/*$handle->image_bevel_color1 = '#FF0000';
		$handle->image_reflection_height = '25%';
		$handle->image_reflection_space = -6;*/

		
		$handle->file_new_name_body =  $arquivo1_nome_p;// "1";
        // Definimos a pasta para onde a imagem thumbs será armazenada
        $handle->Process('./imagens/');
        
        // Excluimos os arquivos temporarios
        $handle-> Clean();

    } 
	else 
	{
       $arquivo1_nome="";
	    // Em caso de erro listamos o erro abaixo
        
    } 
	
 }

if(isset($_FILES["foto2_produtos"])){

   // $pasta_dir = "imagens/";
  
    // Instanciamos o objeto Upload
    $handle = new Upload($_FILES['foto2_produtos']);
    
    // Então verificamos se o arquivo foi carregado corretamente
    if ($handle->uploaded) 
	{       
        // Definimos as configurações desejadas da imagem maior
      $arquivo2_nome_p =$arquivo2_nome= md5(uniqid(time()))  . $ext[1];
   $arquivo2_nome =$arquivo2_nome_p.".jpg";
        
        // Em caso de sucesso no upload podemos fazer outras ações como insert em um banco de cados
        
        // Definimos as configurações desejadas da imagem maior
        $handle->image_resize            = true;
        $handle->image_ratio_y           = false;
         $handle->image_x                 = 320;
		$handle->image_y                 = 240;
		$handle->image_watermark         = 'watermark.png';
		$handle->image_watermark_x       = -10;
		$handle->image_watermark_y       = -10;
		//$handle->image_bevel = 20;
		/*$handle->image_bevel_color1 = '#FF0000';
		$handle->image_reflection_height = '25%';
		$handle->image_reflection_space = -6;
*/
		
		$handle->file_new_name_body =  $arquivo2_nome_p;// "1";
		
        // Definimos a pasta para onde a imagem thumbs será armazenada
        $handle->Process('./imagens/');
        
        // Excluimos os arquivos temporarios
        $handle-> Clean();

    } 
	else 
	{
       
    } 
   }
if(isset($_FILES["foto3_produtos"])){
  //$pasta_dir = "./imagens/";
 
    // Instanciamos o objeto Upload
    $handle = new Upload($_FILES['foto3_produtos']);
          
    // Então verificamos se o arquivo foi carregado corretamente
    if ($handle->uploaded) 
	{       
        // Definimos as configurações desejadas da imagem maior
      $arquivo3_nome_p =$arquivo3_nome= md5(uniqid(time()))  . $ext[1];
   $arquivo3_nome =$arquivo3_nome_p.".jpg";
        
        // Em caso de sucesso no upload podemos fazer outras ações como insert em um banco de cados
        
       // Definimos as configurações desejadas da imagem maior
        $handle->image_resize            = true;
        $handle->image_ratio_y           = false;
         $handle->image_x                 = 320;
		$handle->image_y                 = 240;
		$handle->image_watermark         = 'watermark.png';
		$handle->image_watermark_x       = -10;
		$handle->image_watermark_y       = -10;
		//$handle->image_bevel = 20;
		/*$handle->image_bevel_color1 = '#FF0000';
		$handle->image_reflection_height = '25%';
		$handle->image_reflection_space = -6;
*/
		
		$handle->file_new_name_body =  $arquivo3_nome_p;// "1";
        // Definimos a pasta para onde a imagem thumbs será armazenada
        $handle->Process('./imagens/');
        
        // Excluimos os arquivos temporarios
        $handle-> Clean();

    } 
	else 
	{
      
    } 
	
 }
 
 if(isset($_FILES["foto4_produtos"])){
  //$pasta_dir = "./imagens/";
   
    // Instanciamos o objeto Upload
    $handle = new Upload($_FILES['foto4_produtos']);
          
    // Então verificamos se o arquivo foi carregado corretamente
    if ($handle->uploaded) 
	{       
        // Definimos as configurações desejadas da imagem maior
     $arquivo4_nome_p =$arquivo4_nome= md5(uniqid(time()))  . $ext[1];
   $arquivo4_nome =$arquivo4_nome_p.".jpg";
        
        // Em caso de sucesso no upload podemos fazer outras ações como insert em um banco de cados
        
       // Definimos as configurações desejadas da imagem maior
        $handle->image_resize            = true;
        $handle->image_ratio_y           = false;
         $handle->image_x                 = 320;
		$handle->image_y                 = 240;
		$handle->image_watermark         = 'watermark.png';
		$handle->image_watermark_x       = -10;
		$handle->image_watermark_y       = -10;
		//$handle->image_bevel = 20;
		/*$handle->image_bevel_color1 = '#FF0000';
		$handle->image_reflection_height = '25%';
		$handle->image_reflection_space = -6;*/

		
		$handle->file_new_name_body =  $arquivo4_nome_p;// "1";
        // Definimos a pasta para onde a imagem thumbs será armazenada
        $handle->Process('./imagens/');
        
        // Excluimos os arquivos temporarios
        $handle-> Clean();

    } 
	else 
	{
        // Em caso de erro listamos o erro abaixo
     
    } 
	
 }
 

 
 if(isset($_FILES["foto5_produtos"])){
  //$pasta_dir = "./imagens/";
  
    // Instanciamos o objeto Upload
    $handle = new Upload($_FILES['foto5_produtos']);
          
    // Então verificamos se o arquivo foi carregado corretamente
    if ($handle->uploaded) 
	{       
        // Definimos as configurações desejadas da imagem maior
     
         $arquivo5_nome_p =$arquivo5_nome= md5(uniqid(time()))  . $ext[1];
   $arquivo5_nome =$arquivo5_nome_p.".jpg";
        // Em caso de sucesso no upload podemos fazer outras ações como insert em um banco de cados
        
       // Definimos as configurações desejadas da imagem maior
        $handle->image_resize            = true;
        $handle->image_ratio_y           = false;
         $handle->image_x                 = 320;
		$handle->image_y                 = 240;
		$handle->image_watermark         = 'watermark.png';
		$handle->image_watermark_x       = -10;
		$handle->image_watermark_y       = -10;
		//$handle->image_bevel = 20;
		/*$handle->image_bevel_color1 = '#FF0000';
		$handle->image_reflection_height = '25%';
		$handle->image_reflection_space = -6;*/

		
		$handle->file_new_name_body =  $arquivo5_nome_p;// "1";
        // Definimos a pasta para onde a imagem thumbs será armazenada
        $handle->Process('./imagens/');
        
        // Excluimos os arquivos temporarios
        $handle-> Clean();

    } 
	else 
	{
        // Em caso de erro listamos o erro abaixo
      
    } 
	
 } 
 
 if(isset($_FILES["foto6_produtos"])){
  //$pasta_dir = "./imagens/";
  
    // Instanciamos o objeto Upload
    $handle = new Upload($_FILES['foto6_produtos']);
          
    // Então verificamos se o arquivo foi carregado corretamente
    if ($handle->uploaded) 
	{       
        // Definimos as configurações desejadas da imagem maior
      $arquivo6_nome_p =$arquivo6_nome= md5(uniqid(time()))  . $ext[1];
   $arquivo6_nome =$arquivo6_nome_p.".jpg";
        
        // Em caso de sucesso no upload podemos fazer outras ações como insert em um banco de cados
        
       // Definimos as configurações desejadas da imagem maior
        $handle->image_resize            = true;
        $handle->image_ratio_y           = false;
         $handle->image_x                 = 320;
		$handle->image_y                 = 240;
		$handle->image_watermark         = 'watermark.png';
		$handle->image_watermark_x       = -10;
		$handle->image_watermark_y       = -10;
		//$handle->image_bevel = 20;
		/*$handle->image_bevel_color1 = '#FF0000';
		$handle->image_reflection_height = '25%';
		$handle->image_reflection_space = -6;*/

		
		$handle->file_new_name_body =  $arquivo6_nome_p;// "1";
        // Definimos a pasta para onde a imagem thumbs será armazenada
        $handle->Process('./imagens/');
        
        // Excluimos os arquivos temporarios
        $handle-> Clean();

    } 
	else 
	{
        // Em caso de erro listamos o erro abaixo
     
    } 
	
 }
} // end imagem ação


   $sql = "INSERT INTO produtos (NOME_PRODUTOS,CATEGORIA_PRODUTOS,DESCRICAO_PRODUTOS,FOTO1_PRODUTOS,FOTO2_PRODUTOS,FOTO3_PRODUTOS,FOTO4_PRODUTOS,FOTO5_PRODUTOS,FOTO6_PRODUTOS) VALUES ('".$nome_produtos."','".$categoria_produtos."','".$descricao_produtos."','".$arquivo1_nome."','".$arquivo2_nome."','".$arquivo3_nome."','".$arquivo4_nome."','".$arquivo5_nome."','".$arquivo6_nome."')";

}   
If(!$resultado = mysql_query($sql)) $contadora++;
         
   If($resultado)
   {
      echo"Este produto foi salvo com sucesso!";//header("Location: receitas_list.php");//echo"<br>ok<br>"; //  
   }
   Else
   {
      echo"Não foi salvo este produto!";
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
