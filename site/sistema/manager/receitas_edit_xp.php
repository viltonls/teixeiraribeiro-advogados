<? include_once("struct/struct_top.php")?>
<? include_once("struct/auth.php")?>


<?php
// Aqui incluimos a classe upload
include ("conexao_teste.php");
include('class.upload.php');



$id_receitas=$_REQUEST["id_receitas"];
$nome_receitas=$_REQUEST["nome_receitas"];
$receita_receitas=$_REQUEST["receita_receitas"];

$foto1_receitas=$_FILES["foto1_receitas"];
$fotoa=$_REQUEST["fotoa"];
$foto2_receitas=$_FILES["foto2_receitas"];
$fotob=$_REQUEST["fotob"];
$foto3_receitas=$_FILES["foto3_receitas"];
$fotoc=$_REQUEST["fotoc"];
$foto4_receitas=$_FILES["foto4_receitas"];
$fotod=$_REQUEST["fotod"];
$foto5_receitas=$_FILES["foto5_receitas"];
$fotoe=$_REQUEST["fotoe"];
$foto6_receitas=$_FILES["foto6_receitas"];
$fotof=$_REQUEST["fotof"];


// Verificamos se a acao é igual a imagem
if ($id_receitas!=""){
$id_r = $id_receitas;
$consulta=mysql_query("SELECT * FROM receitas where id_receitas='$id_r'"); 

//Fazendo o looping para exibição de todos registros que contiverem em nomedatabela
while ($dados = mysql_fetch_array($consulta)) {


$foto1_r=$dados['foto1_receitas'];
$foto2_r=$dados['foto2_receitas'];
$foto3_r=$dados['foto3_receitas'];
$foto4_r=$dados['foto4_receitas'];
$foto5_r=$dados['foto5_receitas'];
$foto6_r=$dados['foto6_receitas'];

}
//echo"Aqui: $foto1_r";

if ($_POST['acao'] == 'imagem') 
{

if($fotoa=="1"){

   $arquivo1_nome="";
  if($foto1_r!=""){
       unlink("./imagens_r/$foto1_r");


    }

}else{
if(isset($_FILES["foto1_receitas"])){
  //$pasta_dir = "./imagens/";
 
  
    // Instanciamos o objeto Upload
    $handle = new Upload($_FILES['foto1_receitas']);
          
    // Então verificamos se o arquivo foi carregado corretamente
    if ($handle->uploaded) 
	{       
       if($foto1_r!=""){
       unlink("./imagens_r/$foto1_r");

     } // Definimos as configurações desejadas da imagem maior
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
		//$handle->image_bevel_color1 = '#FF0000';
		//$handle->image_reflection_height = '25%';
		//$handle->image_reflection_space = -6;

		
		$handle->file_new_name_body =  $arquivo1_nome_p;// "1";
        // Definimos a pasta para onde a imagem thumbs será armazenada
        $handle->Process('./imagens_r/');
        
        // Excluimos os arquivos temporarios
        $handle-> Clean();

    } 
	else 
	{
	  $arquivo1_nome= $foto1_r;
        // Em caso de erro listamos o erro abaixo
        
    } 
	
 }
 }
 if($fotob=="1"){

   $arquivo2_nome="";
    if($foto2_r!=""){
       unlink("./imagens_r/$foto2_r");


    }

}else{
if(isset($_FILES["foto2_receitas"])){

   // $pasta_dir = "imagens/";
   
    // Instanciamos o objeto Upload
    $handle = new Upload($_FILES['foto2_receitas']);
    
    // Então verificamos se o arquivo foi carregado corretamente
    if ($handle->uploaded) 
	{       
         if($foto2_r!=""){
       unlink("./imagens_r/$foto2_r");

     } // Definimos as configurações desejadas da imagem maior
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
        $handle->Process('./imagens_r/');
        
        // Excluimos os arquivos temporarios
        $handle-> Clean();

    } 
	else 
	{
        $arquivo2_nome= $foto2_r;
    } 
   }
   }
   if($fotoc=="1"){

   $arquivo3_nome="";
   if($foto3_r!=""){
       unlink("./imagens_r/$foto3_r");

    }

}else{
if(isset($_FILES["foto3_receitas"])){
  //$pasta_dir = "./imagens/";
  
    // Instanciamos o objeto Upload
    $handle = new Upload($_FILES['foto3_receitas']);
          
    // Então verificamos se o arquivo foi carregado corretamente
    if ($handle->uploaded) 
	{       
        if($foto3_r!=""){
       unlink("./imagens_r/$foto3_r");

     }  // Definimos as configurações desejadas da imagem maior
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
        $handle->Process('./imagens_r/');
        
        // Excluimos os arquivos temporarios
        $handle-> Clean();

    } 
	else 
	{
       $arquivo3_nome= $foto3_r;
    } 
	
 }
 }
 if($fotod=="1"){

   $arquivo4_nome="";
   if($foto4_r!=""){
       unlink("./imagens_r/$foto4_r");

    }

}else{
 if(isset($_FILES["foto4_receitas"])){
  //$pasta_dir = "./imagens/";
  
    // Instanciamos o objeto Upload
    $handle = new Upload($_FILES['foto4_receitas']);
          
    // Então verificamos se o arquivo foi carregado corretamente
    if ($handle->uploaded) 
	{       
       if($foto4_r!=""){
       unlink("./imagens_r/$foto4_r");

     }   // Definimos as configurações desejadas da imagem maior
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
        $handle->Process('./imagens_r/');
        
        // Excluimos os arquivos temporarios
        $handle-> Clean();

    } 
	else 
	{
         $arquivo4_nome= $foto4_r;// Em caso de erro listamos o erro abaixo
     
    } 
	
 }
 
 }
 if($fotoe=="1"){

   $arquivo5_nome="";
    if($foto5_r!=""){
       unlink("./imagens_r/$foto5_r");

    }

}else{

 
 if(isset($_FILES["foto5_receitas"])){
  //$pasta_dir = "./imagens/";
   
    // Instanciamos o objeto Upload
    $handle = new Upload($_FILES['foto5_receitas']);
          
    // Então verificamos se o arquivo foi carregado corretamente
    if ($handle->uploaded) 
	{       
        if($foto5_r!=""){
       unlink("./imagens_r/$foto5_r");

     }  // Definimos as configurações desejadas da imagem maior
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
        $handle->Process('./imagens_r/');
        
        // Excluimos os arquivos temporarios
        $handle-> Clean();

    } 
	else 
	{
         $arquivo5_nome= $foto5_r;// Em caso de erro listamos o erro abaixo
      
    } 
	
 } 
 }
 if($fotof=="1"){

   $arquivo6_nome="";
    if($foto6_r!=""){
       unlink("./imagens_r/$foto6_r");

    }

}else{
 if(isset($_FILES["foto6_receitas"])){
  //$pasta_dir = "./imagens/";
  
    // Instanciamos o objeto Upload
    $handle = new Upload($_FILES['foto6_receitas']);
          
    // Então verificamos se o arquivo foi carregado corretamente
    if ($handle->uploaded) 
	{       
        if($foto6_r!=""){
       unlink("./imagens_r/$foto6_r");

     }  // Definimos as configurações desejadas da imagem maior
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
        $handle->Process('./imagens_r/');
        
        // Excluimos os arquivos temporarios
        $handle-> Clean();

    } 
	else 
	{
        $arquivo6_nome= $foto6_r; // Em caso de erro listamos o erro abaixo
     
    } 
	
 }
 }
} // end imagem ação

  $sql = "UPDATE receitas SET NOME_RECEITAS='$nome_receitas', RECEITA_RECEITAS='$receita_receitas',FOTO1_RECEITAS='$arquivo1_nome',FOTO2_RECEITAS='$arquivo2_nome',FOTO3_RECEITAS='$arquivo3_nome',FOTO4_RECEITAS='$arquivo4_nome',FOTO5_RECEITAS='$arquivo5_nome',FOTO6_RECEITAS='$arquivo6_nome' WHERE ID_RECEITAS='$id_receitas'";

 

   
}else{


if ($_POST['acao'] == 'imagem') 
{
if(isset($_FILES["foto1_receitas"])){
  //$pasta_dir = "./imagens/";
 
  
    // Instanciamos o objeto Upload
    $handle = new Upload($_FILES['foto1_receitas']);
          
    // Então verificamos se o arquivo foi carregado corretamente
    if ($handle->uploaded) 
	{       
      $arquivo1_nome_p =$arquivo1_nome= md5(uniqid(time()))  . $ext[1];
   $arquivo1_nome =$arquivo1_nome_p.".jpg"; // Definimos as configurações desejadas da imagem maior
     
        
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
   
    // Instanciamos o objeto Upload
    $handle = new Upload($_FILES['foto2_receitas']);
    
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
		$handle->image_reflection_space = -6;*/

		
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
  
    // Instanciamos o objeto Upload
    $handle = new Upload($_FILES['foto3_receitas']);
          
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
   
    // Instanciamos o objeto Upload
    $handle = new Upload($_FILES['foto4_receitas']);
          
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
		$handle->image_reflection_space = -6;
*/
		
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
  
    // Instanciamos o objeto Upload
    $handle = new Upload($_FILES['foto5_receitas']);
          
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
   
    // Instanciamos o objeto Upload
    $handle = new Upload($_FILES['foto6_receitas']);
          
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
		$handle->image_reflection_space = -6;
*/
		
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
      echo"Esta receita foi salva com sucesso!";//header("Location: receitas_list.php");//echo"<br>ok<br>"; //  
   }
   Else
   {
      echo"Não foi salva esta receita!";
	  //echo"<br>Not<br>";//header("Location: produtos_edit.php");
   }

//echo '<p><a href="indexx.html">Voltar</a></p>';
// Aqui somente recupero o nome da imagem caso queira fazer um insert em banco de dados
$nome_da_imagem = $handle->file_dst_name;

//echo $nome_da_imagem;
//echo"$foto1_receitas sssssssss<br>$nome_receitas";
?> 
