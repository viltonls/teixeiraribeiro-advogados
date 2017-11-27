<? include_once("struct/auth.php")?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
    <title>teste</title>
    
    <style>
        fieldset {
            width: 50%;
            margin: 15px 0px 25px 0px;
            padding: 15px;
        }
        legend {
            font-weight: bold;
        }
        fieldset img {
            float: right;
        }
        fieldset p {
            font-size: 70%;
            font-style: italic;
        }
        .button {
            text-align: right;
        }
        .button input {
            font-weight: bold;
        }
    </style>
</head>

<body>

    <p>class.upload.php test forms</p>
<?php
// Aqui incluimos a classe upload
include ("conexao_teste.php");
include('class.upload.php');


$id_receitas=$_REQUEST["id_receitas"];
$nome_receitas=$_REQUEST["nome_receitas"];
$receita_receitas=$_REQUEST["receita_receitas"];

$foto1_receitas=$_FILES["foto1_receitas"];
$foto2_receitas=$_FILES["foto2_receitas"];
$foto3_receitas=$_FILES["foto3_receitas"];
$foto4_receitas=$_FILES["foto4_receitas"];
$foto5_receitas=$_FILES["foto5_receitas"];
$foto6_receitas=$_FILES["foto6_receitas"];



  
if ($id_receitas!=""){


if ($_POST['acao'] == 'imagem') 
{
if(isset($_FILES["foto1_receitas"])){
  //$pasta_dir = "./imagens/";
 
   $arquivo1_nome_p =$arquivo1_nome= md5(uniqid(time()))  . $ext[1];
   $arquivo1_nome =$arquivo1_nome_p.".jpg";
    // Instanciamos o objeto Upload
    $handle = new Upload($_FILES['foto1_receitas']);
          
    // Então verificamos se o arquivo foi carregado corretamente
    if ($handle->uploaded) 
	{       
        // Definimos as configurações desejadas da imagem maior
     
        
        // Em caso de sucesso no upload podemos fazer outras ações como insert em um banco de cados
        
       // Definimos as configurações desejadas da imagem maior
        $handle->image_resize            = true;
        $handle->image_ratio_y           = false;
        $handle->image_x                 = 640;
		$handle->image_y                 = 480;
		$handle->image_watermark         = 'watermark.png';
		$handle->image_watermark_x       = -10;
		$handle->image_watermark_y       = -10;
		$handle->image_bevel = 20;
		$handle->image_bevel_color1 = '#FF0000';
		$handle->image_reflection_height = '25%';
		$handle->image_reflection_space = -6;

		
		$handle->file_new_name_body =  $arquivo1_nome_p;// "1";
        // Definimos a pasta para onde a imagem thumbs será armazenada
        $handle->Process('./imagens_r/');
        
        // Excluimos os arquivos temporarios
        $handle-> Clean();

    } 
	else 
	{
        // Em caso de erro listamos o erro abaixo
        
    } 
	
 }

if(isset($_FILES["foto2_receitas"])){

   // $pasta_dir = "imagens/";
   $arquivo2_nome_p =$arquivo2_nome= md5(uniqid(time()))  . $ext[1];
   $arquivo2_nome =$arquivo2_nome_p.".jpg";
    // Instanciamos o objeto Upload
    $handle = new Upload($_FILES['foto2_receitas']);
    
    // Então verificamos se o arquivo foi carregado corretamente
    if ($handle->uploaded) 
	{       
        // Definimos as configurações desejadas da imagem maior
     
        
        // Em caso de sucesso no upload podemos fazer outras ações como insert em um banco de cados
        
        // Definimos as configurações desejadas da imagem maior
        $handle->image_resize            = true;
        $handle->image_ratio_y           = false;
        $handle->image_x                 = 640;
		$handle->image_y                 = 480;
		$handle->image_watermark         = 'watermark.png';
		$handle->image_watermark_x       = -10;
		$handle->image_watermark_y       = -10;
		$handle->image_bevel = 20;
		$handle->image_bevel_color1 = '#FF0000';
		$handle->image_reflection_height = '25%';
		$handle->image_reflection_space = -6;

		
		$handle->file_new_name_body =  $arquivo2_nome_p;// "1";
		
        // Definimos a pasta para onde a imagem thumbs será armazenada
        $handle->Process('./imagens_r/');
        
        // Excluimos os arquivos temporarios
        $handle-> Clean();

    } 
	else 
	{
       
    } 
   }
if(isset($_FILES["foto3_receitas"])){
  //$pasta_dir = "./imagens/";
  $arquivo3_nome_p =$arquivo3_nome= md5(uniqid(time()))  . $ext[1];
   $arquivo3_nome =$arquivo3_nome_p.".jpg";
    // Instanciamos o objeto Upload
    $handle = new Upload($_FILES['foto3_receitas']);
          
    // Então verificamos se o arquivo foi carregado corretamente
    if ($handle->uploaded) 
	{       
        // Definimos as configurações desejadas da imagem maior
     
        
        // Em caso de sucesso no upload podemos fazer outras ações como insert em um banco de cados
        
       // Definimos as configurações desejadas da imagem maior
        $handle->image_resize            = true;
        $handle->image_ratio_y           = false;
        $handle->image_x                 = 640;
		$handle->image_y                 = 480;
		$handle->image_watermark         = 'watermark.png';
		$handle->image_watermark_x       = -10;
		$handle->image_watermark_y       = -10;
		$handle->image_bevel = 20;
		$handle->image_bevel_color1 = '#FF0000';
		$handle->image_reflection_height = '25%';
		$handle->image_reflection_space = -6;

		
		$handle->file_new_name_body =  $arquivo3_nome_p;// "1";
        // Definimos a pasta para onde a imagem thumbs será armazenada
        $handle->Process('./imagens_r/');
        
        // Excluimos os arquivos temporarios
        $handle-> Clean();

    } 
	else 
	{
      
    } 
	
 }
 
 if(isset($_FILES["foto4_receitas"])){
  //$pasta_dir = "./imagens/";
   $arquivo4_nome_p =$arquivo4_nome= md5(uniqid(time()))  . $ext[1];
   $arquivo4_nome =$arquivo4_nome_p.".jpg";
    // Instanciamos o objeto Upload
    $handle = new Upload($_FILES['foto4_receitas']);
          
    // Então verificamos se o arquivo foi carregado corretamente
    if ($handle->uploaded) 
	{       
        // Definimos as configurações desejadas da imagem maior
     
        
        // Em caso de sucesso no upload podemos fazer outras ações como insert em um banco de cados
        
       // Definimos as configurações desejadas da imagem maior
        $handle->image_resize            = true;
        $handle->image_ratio_y           = false;
        $handle->image_x                 = 640;
		$handle->image_y                 = 480;
		$handle->image_watermark         = 'watermark.png';
		$handle->image_watermark_x       = -10;
		$handle->image_watermark_y       = -10;
		$handle->image_bevel = 20;
		$handle->image_bevel_color1 = '#FF0000';
		$handle->image_reflection_height = '25%';
		$handle->image_reflection_space = -6;

		
		$handle->file_new_name_body =  $arquivo4_nome_p;// "1";
        // Definimos a pasta para onde a imagem thumbs será armazenada
        $handle->Process('./imagens_r/');
        
        // Excluimos os arquivos temporarios
        $handle-> Clean();

    } 
	else 
	{
        // Em caso de erro listamos o erro abaixo
     
    } 
	
 }
 

 
 if(isset($_FILES["foto5_receitas"])){
  //$pasta_dir = "./imagens/";
   $arquivo5_nome_p =$arquivo5_nome= md5(uniqid(time()))  . $ext[1];
   $arquivo5_nome =$arquivo5_nome_p.".jpg";
    // Instanciamos o objeto Upload
    $handle = new Upload($_FILES['foto5_receitas']);
          
    // Então verificamos se o arquivo foi carregado corretamente
    if ($handle->uploaded) 
	{       
        // Definimos as configurações desejadas da imagem maior
     
        
        // Em caso de sucesso no upload podemos fazer outras ações como insert em um banco de cados
        
       // Definimos as configurações desejadas da imagem maior
        $handle->image_resize            = true;
        $handle->image_ratio_y           = false;
        $handle->image_x                 = 640;
		$handle->image_y                 = 480;
		$handle->image_watermark         = 'watermark.png';
		$handle->image_watermark_x       = -10;
		$handle->image_watermark_y       = -10;
		$handle->image_bevel = 20;
		$handle->image_bevel_color1 = '#FF0000';
		$handle->image_reflection_height = '25%';
		$handle->image_reflection_space = -6;

		
		$handle->file_new_name_body =  $arquivo5_nome_p;// "1";
        // Definimos a pasta para onde a imagem thumbs será armazenada
        $handle->Process('./imagens_r/');
        
        // Excluimos os arquivos temporarios
        $handle-> Clean();

    } 
	else 
	{
        // Em caso de erro listamos o erro abaixo
      
    } 
	
 } 
 
 if(isset($_FILES["foto6_receitas"])){
  //$pasta_dir = "./imagens/";
   $arquivo6_nome_p =$arquivo6_nome= md5(uniqid(time()))  . $ext[1];
   $arquivo6_nome =$arquivo6_nome_p.".jpg";
    // Instanciamos o objeto Upload
    $handle = new Upload($_FILES['foto6_receitas']);
          
    // Então verificamos se o arquivo foi carregado corretamente
    if ($handle->uploaded) 
	{       
        // Definimos as configurações desejadas da imagem maior
     
        
        // Em caso de sucesso no upload podemos fazer outras ações como insert em um banco de cados
        
       // Definimos as configurações desejadas da imagem maior
        $handle->image_resize            = true;
        $handle->image_ratio_y           = false;
        $handle->image_x                 = 640;
		$handle->image_y                 = 480;
		$handle->image_watermark         = 'watermark.png';
		$handle->image_watermark_x       = -10;
		$handle->image_watermark_y       = -10;
		$handle->image_bevel = 20;
		$handle->image_bevel_color1 = '#FF0000';
		$handle->image_reflection_height = '25%';
		$handle->image_reflection_space = -6;

		
		$handle->file_new_name_body =  $arquivo6_nome_p;// "1";
        // Definimos a pasta para onde a imagem thumbs será armazenada
        $handle->Process('./imagens_r/');
        
        // Excluimos os arquivos temporarios
        $handle-> Clean();

    } 
	else 
	{
        // Em caso de erro listamos o erro abaixo
     
    } 
	
 }
} // end imagem ação


 
   $sql = "UPDATE receitas SET NOME_RECEITAS='$nome_receitas', RECEITA_RECEITAS='$receita_receitas',FOTO1_RECEITAS='$arquivo1_nome',FOTO2_RECEITAS='$arquivo2_nome',FOTO3_RECEITAS='$arquivo3_nome',FOTO4_RECEITAS='$arquivo4_nome',FOTO5_RECEITAS='$arquivo5_nome',FOTO6_RECEITAS='$arquivo6_nome' WHERE ID_RECEITAS='$id_receitas'";
   
}else{
 
 if ($_POST['acao'] == 'imagem') 
{
if(isset($_FILES["foto1_receitas"])){
  //$pasta_dir = "./imagens/";
 
   $arquivo1_nome_p =$arquivo1_nome= md5(uniqid(time()))  . $ext[1];
   $arquivo1_nome =$arquivo1_nome_p.".jpg";
    // Instanciamos o objeto Upload
    $handle = new Upload($_FILES['foto1_receitas']);
          
    // Então verificamos se o arquivo foi carregado corretamente
    if ($handle->uploaded) 
	{       
        // Definimos as configurações desejadas da imagem maior
     
        
        // Em caso de sucesso no upload podemos fazer outras ações como insert em um banco de cados
        
       // Definimos as configurações desejadas da imagem maior
        $handle->image_resize            = true;
        $handle->image_ratio_y           = false;
        $handle->image_x                 = 640;
		$handle->image_y                 = 480;
		$handle->image_watermark         = 'watermark.png';
		$handle->image_watermark_x       = -10;
		$handle->image_watermark_y       = -10;
		$handle->image_bevel = 20;
		$handle->image_bevel_color1 = '#FF0000';
		$handle->image_reflection_height = '25%';
		$handle->image_reflection_space = -6;

		
		$handle->file_new_name_body =  $arquivo1_nome_p;// "1";
        // Definimos a pasta para onde a imagem thumbs será armazenada
        $handle->Process('./imagens_r/');
        
        // Excluimos os arquivos temporarios
        $handle-> Clean();

    } 
	else 
	{
        // Em caso de erro listamos o erro abaixo
        
    } 
	
 }

if(isset($_FILES["foto2_receitas"])){

   // $pasta_dir = "imagens/";
   $arquivo2_nome_p =$arquivo2_nome= md5(uniqid(time()))  . $ext[1];
   $arquivo2_nome =$arquivo2_nome_p.".jpg";
    // Instanciamos o objeto Upload
    $handle = new Upload($_FILES['foto2_receitas']);
    
    // Então verificamos se o arquivo foi carregado corretamente
    if ($handle->uploaded) 
	{       
        // Definimos as configurações desejadas da imagem maior
     
        
        // Em caso de sucesso no upload podemos fazer outras ações como insert em um banco de cados
        
        // Definimos as configurações desejadas da imagem maior
        $handle->image_resize            = true;
        $handle->image_ratio_y           = false;
        $handle->image_x                 = 640;
		$handle->image_y                 = 480;
		$handle->image_watermark         = 'watermark.png';
		$handle->image_watermark_x       = -10;
		$handle->image_watermark_y       = -10;
		$handle->image_bevel = 20;
		$handle->image_bevel_color1 = '#FF0000';
		$handle->image_reflection_height = '25%';
		$handle->image_reflection_space = -6;

		
		$handle->file_new_name_body =  $arquivo2_nome_p;// "1";
		
        // Definimos a pasta para onde a imagem thumbs será armazenada
        $handle->Process('./imagens_r/');
        
        // Excluimos os arquivos temporarios
        $handle-> Clean();

    } 
	else 
	{
       
    } 
   }
if(isset($_FILES["foto3_receitas"])){
  //$pasta_dir = "./imagens/";
  $arquivo3_nome_p =$arquivo3_nome= md5(uniqid(time()))  . $ext[1];
   $arquivo3_nome =$arquivo3_nome_p.".jpg";
    // Instanciamos o objeto Upload
    $handle = new Upload($_FILES['foto3_receitas']);
          
    // Então verificamos se o arquivo foi carregado corretamente
    if ($handle->uploaded) 
	{       
        // Definimos as configurações desejadas da imagem maior
     
        
        // Em caso de sucesso no upload podemos fazer outras ações como insert em um banco de cados
        
       // Definimos as configurações desejadas da imagem maior
        $handle->image_resize            = true;
        $handle->image_ratio_y           = false;
        $handle->image_x                 = 640;
		$handle->image_y                 = 480;
		$handle->image_watermark         = 'watermark.png';
		$handle->image_watermark_x       = -10;
		$handle->image_watermark_y       = -10;
		$handle->image_bevel = 20;
		$handle->image_bevel_color1 = '#FF0000';
		$handle->image_reflection_height = '25%';
		$handle->image_reflection_space = -6;

		
		$handle->file_new_name_body =  $arquivo3_nome_p;// "1";
        // Definimos a pasta para onde a imagem thumbs será armazenada
        $handle->Process('./imagens_r/');
        
        // Excluimos os arquivos temporarios
        $handle-> Clean();

    } 
	else 
	{
      
    } 
	
 }
 
 if(isset($_FILES["foto4_receitas"])){
  //$pasta_dir = "./imagens/";
   $arquivo4_nome_p =$arquivo4_nome= md5(uniqid(time()))  . $ext[1];
   $arquivo4_nome =$arquivo4_nome_p.".jpg";
    // Instanciamos o objeto Upload
    $handle = new Upload($_FILES['foto4_receitas']);
          
    // Então verificamos se o arquivo foi carregado corretamente
    if ($handle->uploaded) 
	{       
        // Definimos as configurações desejadas da imagem maior
     
        
        // Em caso de sucesso no upload podemos fazer outras ações como insert em um banco de cados
        
       // Definimos as configurações desejadas da imagem maior
        $handle->image_resize            = true;
        $handle->image_ratio_y           = false;
        $handle->image_x                 = 640;
		$handle->image_y                 = 480;
		$handle->image_watermark         = 'watermark.png';
		$handle->image_watermark_x       = -10;
		$handle->image_watermark_y       = -10;
		$handle->image_bevel = 20;
		$handle->image_bevel_color1 = '#FF0000';
		$handle->image_reflection_height = '25%';
		$handle->image_reflection_space = -6;

		
		$handle->file_new_name_body =  $arquivo4_nome_p;// "1";
        // Definimos a pasta para onde a imagem thumbs será armazenada
        $handle->Process('./imagens_r/');
        
        // Excluimos os arquivos temporarios
        $handle-> Clean();

    } 
	else 
	{
        // Em caso de erro listamos o erro abaixo
     
    } 
	
 }
 

 
 if(isset($_FILES["foto5_receitas"])){
  //$pasta_dir = "./imagens/";
   $arquivo5_nome_p =$arquivo5_nome= md5(uniqid(time()))  . $ext[1];
   $arquivo5_nome =$arquivo5_nome_p.".jpg";
    // Instanciamos o objeto Upload
    $handle = new Upload($_FILES['foto5_receitas']);
          
    // Então verificamos se o arquivo foi carregado corretamente
    if ($handle->uploaded) 
	{       
        // Definimos as configurações desejadas da imagem maior
     
        
        // Em caso de sucesso no upload podemos fazer outras ações como insert em um banco de cados
        
       // Definimos as configurações desejadas da imagem maior
        $handle->image_resize            = true;
        $handle->image_ratio_y           = false;
        $handle->image_x                 = 640;
		$handle->image_y                 = 480;
		$handle->image_watermark         = 'watermark.png';
		$handle->image_watermark_x       = -10;
		$handle->image_watermark_y       = -10;
		$handle->image_bevel = 20;
		$handle->image_bevel_color1 = '#FF0000';
		$handle->image_reflection_height = '25%';
		$handle->image_reflection_space = -6;

		
		$handle->file_new_name_body =  $arquivo5_nome_p;// "1";
        // Definimos a pasta para onde a imagem thumbs será armazenada
        $handle->Process('./imagens_r/');
        
        // Excluimos os arquivos temporarios
        $handle-> Clean();

    } 
	else 
	{
        // Em caso de erro listamos o erro abaixo
      
    } 
	
 } 
 
 if(isset($_FILES["foto6_receitas"])){
  //$pasta_dir = "./imagens/";
   $arquivo6_nome_p =$arquivo6_nome= md5(uniqid(time()))  . $ext[1];
   $arquivo6_nome =$arquivo6_nome_p.".jpg";
    // Instanciamos o objeto Upload
    $handle = new Upload($_FILES['foto6_receitas']);
          
    // Então verificamos se o arquivo foi carregado corretamente
    if ($handle->uploaded) 
	{       
        // Definimos as configurações desejadas da imagem maior
     
        
        // Em caso de sucesso no upload podemos fazer outras ações como insert em um banco de cados
        
       // Definimos as configurações desejadas da imagem maior
        $handle->image_resize            = true;
        $handle->image_ratio_y           = false;
        $handle->image_x                 = 640;
		$handle->image_y                 = 480;
		$handle->image_watermark         = 'watermark.png';
		$handle->image_watermark_x       = -10;
		$handle->image_watermark_y       = -10;
		$handle->image_bevel = 20;
		$handle->image_bevel_color1 = '#FF0000';
		$handle->image_reflection_height = '25%';
		$handle->image_reflection_space = -6;

		
		$handle->file_new_name_body =  $arquivo6_nome_p;// "1";
        // Definimos a pasta para onde a imagem thumbs será armazenada
        $handle->Process('./imagens_r/');
        
        // Excluimos os arquivos temporarios
        $handle-> Clean();

    } 
	else 
	{
        // Em caso de erro listamos o erro abaixo
     
    } 
	
 }
} // end imagem ação


   $sql = "INSERT INTO receitas (NOME_RECEITAS,RECEITA_RECEITAS,FOTO1_RECEITAS,FOTO2_RECEITAS,FOTO3_RECEITAS,FOTO4_RECEITAS,FOTO5_RECEITAS,FOTO6_RECEITAS) VALUES ('".$nome_receitas."','".$receita_receitas."','".$arquivo1_nome."','".$arquivo2_nome."','".$arquivo3_nome."','".$arquivo4_nome."','".$arquivo5_nome."','".$arquivo6_nome."')";

}   

If(!$resultado = mysql_query($sql)) $contadora++;
         
   If($resultado)
   {
      echo"<br>ok<br>"; //  header("Location: produtos_list.php");
   }
   Else
   {
      echo"<br>Not<br>";//header("Location: produtos_edit.php");
   }

echo '<p><a href="indexx.html">Voltar</a></p>';
// Aqui somente recupero o nome da imagem caso queira fazer um insert em banco de dados
$nome_da_imagem = $handle->file_dst_name;

echo $nome_da_imagem;
?> 
</body>

</html>

