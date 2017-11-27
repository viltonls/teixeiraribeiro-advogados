<? include_once("struct/struct_top.php")?>
<? include_once("struct/auth.php")?>

<?php
// Aqui incluimos a classe upload
include ("conexao_teste.php");
include('class.upload.php');

$data=$_REQUEST["eventosfotos_data"];

//echo"$data";

//function converte_data($data){
    //if (strstr($data, "/")){//verifica se tem a barra /
  //$d = explode ("/", $data);//tira a barra
  //$invert_data = "$d[2]-$d[1]-$d[0]";//separa as datas $d[2] = ano $d[1] = mês etc...
  //return $invert_data;
    //}
    //else{
  //return "Data invalida";
  //}
    
//}
//echo"$invert_data";
$excluir=$_REQUEST["excluir"];
$id_eventosfotos=$_REQUEST["id_eventosfotos"];
$eventosfotos_titulo=$_REQUEST["eventosfotos_titulo"];

$eventosfotos_data=$data;
$eventosfotos_corpo=$_REQUEST["eventosfotos_corpo"];


$eventosfotos_foto1=$_FILES["eventosfotos_foto1"]; 
$fotoa=$_REQUEST["fotoa"];
$eventosfotos_foto2=$_FILES["eventosfotos_foto2"]; 
$fotob=$_REQUEST["fotob"];
$eventosfotos_foto3=$_FILES["eventosfotos_foto3"]; 
$fotoc=$_REQUEST["fotoc"];
$eventosfotos_foto4=$_FILES["eventosfotos_foto4"]; 
$fotod=$_REQUEST["fotod"];
$eventosfotos_foto5=$_FILES["eventosfotos_foto5"]; 
$fotoe=$_REQUEST["fotoe"];
$eventosfotos_foto6=$_FILES["eventosfotos_foto6"]; 
$fotof=$_REQUEST["fotof"];
$eventosfotos_foto7=$_FILES["eventosfotos_foto7"]; 
$fotog=$_REQUEST["fotog"];
$eventosfotos_foto8=$_FILES["eventosfotos_foto8"]; 
$fotoh=$_REQUEST["fotoh"];
$eventosfotos_foto9=$_FILES["eventosfotos_foto9"]; 
$fotoi=$_REQUEST["fotoi"];
$eventosfotos_foto10=$_FILES["eventosfotos_foto10"]; 
$fotoj=$_REQUEST["fotoj"];
$eventosfotos_foto11=$_FILES["eventosfotos_foto11"]; 
$fotok=$_REQUEST["fotok"];
$eventosfotos_foto12=$_FILES["eventosfotos_foto12"]; 
$fotol=$_REQUEST["fotol"];
$eventosfotos_foto13=$_FILES["eventosfotos_foto13"]; 
$fotom=$_REQUEST["fotom"];
$eventosfotos_foto14=$_FILES["eventosfotos_foto14"]; 
$foton=$_REQUEST["foton"];
$eventosfotos_foto15=$_FILES["eventosfotos_foto15"]; 
$fotoo=$_REQUEST["fotoo"];
$eventosfotos_foto16=$_FILES["eventosfotos_foto16"]; 
$fotop=$_REQUEST["fotop"];
$eventosfotos_foto17=$_FILES["eventosfotos_foto17"]; 
$fotoq=$_REQUEST["fotoq"];
$eventosfotos_foto18=$_FILES["eventosfotos_foto18"]; 
$fotor=$_REQUEST["fotor"];
$eventosfotos_foto19=$_FILES["eventosfotos_foto19"]; 
$fotos=$_REQUEST["fotos"];
$eventosfotos_foto20=$_FILES["eventosfotos_foto20"]; 
$fotot=$_REQUEST["fotot"];

// Verificamos se a acao é igual a imagem
if ($id_eventosfotos!=""){
$id_p = $id_eventosfotos;
$consulta=mysql_query("SELECT * FROM eventosfotos where id_eventosfotos='$id_p'"); 

//Fazendo o looping para exibição de todos registros que contiverem em nomedatabela
while ($dados = mysql_fetch_array($consulta)) {


$foto1_p=$dados['eventosfotos_foto1'];
$foto2_p=$dados['eventosfotos_foto2'];
$foto3_p=$dados['eventosfotos_foto3'];
$foto4_p=$dados['eventosfotos_foto4'];
$foto5_p=$dados['eventosfotos_foto5'];
$foto6_p=$dados['eventosfotos_foto6'];
$foto7_p=$dados['eventosfotos_foto7'];
$foto8_p=$dados['eventosfotos_foto8'];
$foto9_p=$dados['eventosfotos_foto9'];
$foto10_p=$dados['eventosfotos_foto10'];
$foto11_p=$dados['eventosfotos_foto11'];
$foto12_p=$dados['eventosfotos_foto12'];
$foto13_p=$dados['eventosfotos_foto13'];
$foto14_p=$dados['eventosfotos_foto14'];
$foto15_p=$dados['eventosfotos_foto15'];
$foto16_p=$dados['eventosfotos_foto16'];
$foto17_p=$dados['eventosfotos_foto17'];
$foto18_p=$dados['eventosfotos_foto18'];
$foto19_p=$dados['eventosfotos_foto19'];
$foto20_p=$dados['eventosfotos_foto20'];


}

if ($_POST['acao'] == 'imagem') 
{
if($fotoa=="1"){

   $arquivo1_nome="";
   if($foto1_p!=""){
       unlink("./img_eventosfotos/$foto1_p");

    }

}else{
if(isset($_FILES["eventosfotos_foto1"])){
  //$pasta_dir = "./imagens/";
  
   
    // Instanciamos o objeto Upload
    $handle = new Upload($_FILES['eventosfotos_foto1']);
          
    // Então verificamos se o arquivo foi carregado corretamente
    if ($handle->uploaded) 
	{       
        
   // Definimos as configurações desejadas da imagem maior
     if($foto1_p!=""){
       unlink("./img_eventosfotos/$foto1_p");

     }
        $arquivo1_nome_p =$arquivo1_nome= md5(uniqid(time()))  . $ext[1];
      $arquivo1_nome =$arquivo1_nome_p.".jpg";
        // Em caso de sucesso no upload podemos fazer outras ações como insert em um banco de cados
        
       // Definimos as configurações desejadas da imagem maior
       // $handle->image_resize            = true;
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
        $handle->Process('./img_eventosfotos/');
        
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
////////////////////////////////////////////
if($fotob=="1"){

   $arquivo2_nome="";
   if($foto2_p!=""){
       unlink("./img_eventosfotos/$foto2_p");

    }

}else{
if(isset($_FILES["eventosfotos_foto2"])){
  //$pasta_dir = "./imagens/";
  
   
    // Instanciamos o objeto Upload
    $handle = new Upload($_FILES['eventosfotos_foto2']);
          
    // Então verificamos se o arquivo foi carregado corretamente
    if ($handle->uploaded) 
	{       
        
   // Definimos as configurações desejadas da imagem maior
     if($foto2_p!=""){
       unlink("./img_eventosfotos/$foto2_p");

     }
        $arquivo2_nome_p =$arquivo2_nome= md5(uniqid(time()))  . $ext[1];
      $arquivo2_nome =$arquivo2_nome_p.".jpg";
        // Em caso de sucesso no upload podemos fazer outras ações como insert em um banco de cados
        
       // Definimos as configurações desejadas da imagem maior
       // $handle->image_resize            = true;
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

		
		$handle->file_new_name_body =  $arquivo2_nome_p;// "1";
        // Definimos a pasta para onde a imagem thumbs será armazenada
        $handle->Process('./img_eventosfotos/');
        
        // Excluimos os arquivos temporarios
        $handle-> Clean();

    } 
	else 
	{
        $arquivo2_nome= $foto2_p;
	    // Em caso de erro listamos o erro abaixo
        
    } 
	
 }
}
if($fotoc=="1"){

   $arquivo3_nome="";
   if($foto3_p!=""){
       unlink("./img_eventosfotos/$foto3_p");

    }

}else{
if(isset($_FILES["eventosfotos_foto3"])){
  //$pasta_dir = "./imagens/";
  
   
    // Instanciamos o objeto Upload
    $handle = new Upload($_FILES['eventosfotos_foto3']);
          
    // Então verificamos se o arquivo foi carregado corretamente
    if ($handle->uploaded) 
	{       
        
   // Definimos as configurações desejadas da imagem maior
     if($foto3_p!=""){
       unlink("./img_eventosfotos/$foto3_p");

     }
        $arquivo3_nome_p =$arquivo3_nome= md5(uniqid(time()))  . $ext[1];
      $arquivo3_nome =$arquivo3_nome_p.".jpg";
        // Em caso de sucesso no upload podemos fazer outras ações como insert em um banco de cados
        
       // Definimos as configurações desejadas da imagem maior
       // $handle->image_resize            = true;
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

		
		$handle->file_new_name_body =  $arquivo3_nome_p;// "1";
        // Definimos a pasta para onde a imagem thumbs será armazenada
        $handle->Process('./img_eventosfotos/');
        
        // Excluimos os arquivos temporarios
        $handle-> Clean();

    } 
	else 
	{
        $arquivo3_nome= $foto3_p;
	    // Em caso de erro listamos o erro abaixo
        
    } 
	
 }
}
if($fotod=="1"){

   $arquivo4_nome="";
   if($foto4_p!=""){
       unlink("./img_eventosfotos/$foto4_p");

    }

}else{
if(isset($_FILES["eventosfotos_foto4"])){
  //$pasta_dir = "./imagens/";
  
   
    // Instanciamos o objeto Upload
    $handle = new Upload($_FILES['eventosfotos_foto4']);
          
    // Então verificamos se o arquivo foi carregado corretamente
    if ($handle->uploaded) 
	{       
        
   // Definimos as configurações desejadas da imagem maior
     if($foto4_p!=""){
       unlink("./img_eventosfotos/$foto4_p");

     }
        $arquivo4_nome_p =$arquivo4_nome= md5(uniqid(time()))  . $ext[1];
      $arquivo4_nome =$arquivo4_nome_p.".jpg";
        // Em caso de sucesso no upload podemos fazer outras ações como insert em um banco de cados
        
       // Definimos as configurações desejadas da imagem maior
       // $handle->image_resize            = true;
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

		
		$handle->file_new_name_body =  $arquivo4_nome_p;// "1";
        // Definimos a pasta para onde a imagem thumbs será armazenada
        $handle->Process('./img_eventosfotos/');
        
        // Excluimos os arquivos temporarios
        $handle-> Clean();

    } 
	else 
	{
        $arquivo4_nome= $foto4_p;
	    // Em caso de erro listamos o erro abaixo
        
    } 
	
 }
}
if($fotoe=="1"){

   $arquivo5_nome="";
   if($foto5_p!=""){
       unlink("./img_eventosfotos/$foto5_p");

    }

}else{
if(isset($_FILES["eventosfotos_foto5"])){
  //$pasta_dir = "./imagens/";
  
   
    // Instanciamos o objeto Upload
    $handle = new Upload($_FILES['eventosfotos_foto5']);
          
    // Então verificamos se o arquivo foi carregado corretamente
    if ($handle->uploaded) 
	{       
        
   // Definimos as configurações desejadas da imagem maior
     if($foto5_p!=""){
       unlink("./img_eventosfotos/$foto5_p");

     }
        $arquivo5_nome_p =$arquivo5_nome= md5(uniqid(time()))  . $ext[1];
      $arquivo5_nome =$arquivo5_nome_p.".jpg";
        // Em caso de sucesso no upload podemos fazer outras ações como insert em um banco de cados
        
       // Definimos as configurações desejadas da imagem maior
       // $handle->image_resize            = true;
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

		
		$handle->file_new_name_body =  $arquivo5_nome_p;// "1";
        // Definimos a pasta para onde a imagem thumbs será armazenada
        $handle->Process('./img_eventosfotos/');
        
        // Excluimos os arquivos temporarios
        $handle-> Clean();

    } 
	else 
	{
        $arquivo5_nome= $foto5_p;
	    // Em caso de erro listamos o erro abaixo
        
    } 
	
 }
}
if($fotof=="1"){

   $arquivo6_nome="";
   if($foto6_p!=""){
       unlink("./img_eventosfotos/$foto6_p");

    }

}else{
if(isset($_FILES["eventosfotos_foto6"])){
  //$pasta_dir = "./imagens/";
  
   
    // Instanciamos o objeto Upload
    $handle = new Upload($_FILES['eventosfotos_foto6']);
          
    // Então verificamos se o arquivo foi carregado corretamente
    if ($handle->uploaded) 
	{       
        
   // Definimos as configurações desejadas da imagem maior
     if($foto6_p!=""){
       unlink("./img_eventosfotos/$foto6_p");

     }
        $arquivo6_nome_p =$arquivo6_nome= md5(uniqid(time()))  . $ext[1];
      $arquivo6_nome =$arquivo6_nome_p.".jpg";
        // Em caso de sucesso no upload podemos fazer outras ações como insert em um banco de cados
        
       // Definimos as configurações desejadas da imagem maior
       // $handle->image_resize            = true;
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

		
		$handle->file_new_name_body =  $arquivo6_nome_p;// "1";
        // Definimos a pasta para onde a imagem thumbs será armazenada
        $handle->Process('./img_eventosfotos/');
        
        // Excluimos os arquivos temporarios
        $handle-> Clean();

    } 
	else 
	{
        $arquivo6_nome= $foto6_p;
	    // Em caso de erro listamos o erro abaixo
        
    } 
	
 }
}
if($fotog=="1"){

   $arquivo7_nome="";
   if($foto7_p!=""){
       unlink("./img_eventosfotos/$foto7_p");

    }

}else{
if(isset($_FILES["eventosfotos_foto7"])){
  //$pasta_dir = "./imagens/";
  
   
    // Instanciamos o objeto Upload
    $handle = new Upload($_FILES['eventosfotos_foto7']);
          
    // Então verificamos se o arquivo foi carregado corretamente
    if ($handle->uploaded) 
	{       
        
   // Definimos as configurações desejadas da imagem maior
     if($foto7_p!=""){
       unlink("./img_eventosfotos/$foto7_p");

     }
        $arquivo7_nome_p =$arquivo7_nome= md5(uniqid(time()))  . $ext[1];
      $arquivo7_nome =$arquivo7_nome_p.".jpg";
        // Em caso de sucesso no upload podemos fazer outras ações como insert em um banco de cados
        
      // Definimos as configurações desejadas da imagem maior
       // $handle->image_resize            = true;
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

		
		$handle->file_new_name_body =  $arquivo7_nome_p;// "1";
        // Definimos a pasta para onde a imagem thumbs será armazenada
        $handle->Process('./img_eventosfotos/');
        
        // Excluimos os arquivos temporarios
        $handle-> Clean();

    } 
	else 
	{
        $arquivo7_nome= $foto7_p;
	    // Em caso de erro listamos o erro abaixo
        
    } 
	
 }
}
if($fotoh=="1"){

   $arquivo8_nome="";
   if($foto8_p!=""){
       unlink("./img_eventosfotos/$foto8_p");

    }

}else{
if(isset($_FILES["eventosfotos_foto8"])){
  //$pasta_dir = "./imagens/";
  
   
    // Instanciamos o objeto Upload
    $handle = new Upload($_FILES['eventosfotos_foto8']);
          
    // Então verificamos se o arquivo foi carregado corretamente
    if ($handle->uploaded) 
	{       
        
   // Definimos as configurações desejadas da imagem maior
     if($foto1_p!=""){
       unlink("./img_eventosfotos/$foto8_p");

     }
        $arquivo8_nome_p =$arquivo8_nome= md5(uniqid(time()))  . $ext[1];
      $arquivo8_nome =$arquivo8_nome_p.".jpg";
        // Em caso de sucesso no upload podemos fazer outras ações como insert em um banco de cados
        
      // Definimos as configurações desejadas da imagem maior
       // $handle->image_resize            = true;
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

		
		$handle->file_new_name_body =  $arquivo8_nome_p;// "1";
        // Definimos a pasta para onde a imagem thumbs será armazenada
        $handle->Process('./img_eventosfotos/');
        
        // Excluimos os arquivos temporarios
        $handle-> Clean();

    } 
	else 
	{
        $arquivo8_nome= $foto8_p;
	    // Em caso de erro listamos o erro abaixo
        
    } 
	
 }
}
if($fotoi=="1"){

   $arquivo9_nome="";
   if($foto9_p!=""){
       unlink("./img_eventosfotos/$foto9_p");

    }

}else{
if(isset($_FILES["eventosfotos_foto9"])){
  //$pasta_dir = "./imagens/";
  
   
    // Instanciamos o objeto Upload
    $handle = new Upload($_FILES['eventosfotos_foto9']);
          
    // Então verificamos se o arquivo foi carregado corretamente
    if ($handle->uploaded) 
	{       
        
   // Definimos as configurações desejadas da imagem maior
     if($foto9_p!=""){
       unlink("./img_eventosfotos/$foto9_p");

     }
        $arquivo9_nome_p =$arquivo9_nome= md5(uniqid(time()))  . $ext[1];
      $arquivo9_nome =$arquivo9_nome_p.".jpg";
        // Em caso de sucesso no upload podemos fazer outras ações como insert em um banco de cados
        
       // Definimos as configurações desejadas da imagem maior
       // $handle->image_resize            = true;
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

		
		$handle->file_new_name_body =  $arquivo9_nome_p;// "1";
        // Definimos a pasta para onde a imagem thumbs será armazenada
        $handle->Process('./img_eventosfotos/');
        
        // Excluimos os arquivos temporarios
        $handle-> Clean();

    } 
	else 
	{
        $arquivo9_nome= $foto9_p;
	    // Em caso de erro listamos o erro abaixo
        
    } 
	
 }
}
if($fotoj=="1"){

   $arquivo10_nome="";
   if($foto10_p!=""){
       unlink("./img_eventosfotos/$foto10_p");

    }

}else{
if(isset($_FILES["eventosfotos_foto10"])){
  //$pasta_dir = "./imagens/";
  
   
    // Instanciamos o objeto Upload
    $handle = new Upload($_FILES['eventosfotos_foto10']);
          
    // Então verificamos se o arquivo foi carregado corretamente
    if ($handle->uploaded) 
	{       
        
   // Definimos as configurações desejadas da imagem maior
     if($foto10_p!=""){
       unlink("./img_eventosfotos/$foto10_p");

     }
        $arquivo10_nome_p =$arquivo10_nome= md5(uniqid(time()))  . $ext[1];
      $arquivo10_nome =$arquivo10_nome_p.".jpg";
        // Em caso de sucesso no upload podemos fazer outras ações como insert em um banco de cados
        
      // Definimos as configurações desejadas da imagem maior
       // $handle->image_resize            = true;
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

		
		$handle->file_new_name_body =  $arquivo10_nome_p;// "1";
        // Definimos a pasta para onde a imagem thumbs será armazenada
        $handle->Process('./img_eventosfotos/');
        
        // Excluimos os arquivos temporarios
        $handle-> Clean();

    } 
	else 
	{
        $arquivo10_nome= $foto10_p;
	    // Em caso de erro listamos o erro abaixo
        
    } 
	
 }
}
if($fotok=="1"){

   $arquivo11_nome="";
   if($foto11_p!=""){
       unlink("./img_eventosfotos/$foto11_p");

    }

}else{
if(isset($_FILES["eventosfotos_foto11"])){
  //$pasta_dir = "./imagens/";
  
   
    // Instanciamos o objeto Upload
    $handle = new Upload($_FILES['eventosfotos_foto11']);
          
    // Então verificamos se o arquivo foi carregado corretamente
    if ($handle->uploaded) 
	{       
        
   // Definimos as configurações desejadas da imagem maior
     if($foto11_p!=""){
       unlink("./img_eventosfotos/$foto11_p");

     }
        $arquivo11_nome_p =$arquivo11_nome= md5(uniqid(time()))  . $ext[1];
      $arquivo11_nome =$arquivo11_nome_p.".jpg";
        // Em caso de sucesso no upload podemos fazer outras ações como insert em um banco de cados
        
       // Definimos as configurações desejadas da imagem maior
       // $handle->image_resize            = true;
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
		
		$handle->file_new_name_body =  $arquivo11_nome_p;// "1";
        // Definimos a pasta para onde a imagem thumbs será armazenada
        $handle->Process('./img_eventosfotos/');
        
        // Excluimos os arquivos temporarios
        $handle-> Clean();

    } 
	else 
	{
        $arquivo11_nome= $foto11_p;
	    // Em caso de erro listamos o erro abaixo
        
    } 
	
 }
}
if($fotol=="1"){

   $arquivo12_nome="";
   if($foto12_p!=""){
       unlink("./img_eventosfotos/$foto12_p");

    }

}else{
if(isset($_FILES["eventosfotos_foto12"])){
  //$pasta_dir = "./imagens/";
  
   
    // Instanciamos o objeto Upload
    $handle = new Upload($_FILES['eventosfotos_foto12']);
          
    // Então verificamos se o arquivo foi carregado corretamente
    if ($handle->uploaded) 
	{       
        
   // Definimos as configurações desejadas da imagem maior
     if($foto12_p!=""){
       unlink("./img_eventosfotos/$foto12_p");

     }
        $arquivo12_nome_p =$arquivo12_nome= md5(uniqid(time()))  . $ext[1];
      $arquivo12_nome =$arquivo12_nome_p.".jpg";
        // Em caso de sucesso no upload podemos fazer outras ações como insert em um banco de cados
        
       // Definimos as configurações desejadas da imagem maior
       // $handle->image_resize            = true;
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

		
		$handle->file_new_name_body =  $arquivo12_nome_p;// "1";
        // Definimos a pasta para onde a imagem thumbs será armazenada
        $handle->Process('./img_eventosfotos/');
        
        // Excluimos os arquivos temporarios
        $handle-> Clean();

    } 
	else 
	{
        $arquivo12_nome= $foto12_p;
	    // Em caso de erro listamos o erro abaixo
        
    } 
	
 }
}
if($fotom=="1"){

   $arquivo13_nome="";
   if($foto13_p!=""){
       unlink("./img_eventosfotos/$foto13_p");

    }

}else{
if(isset($_FILES["eventosfotos_foto13"])){
  //$pasta_dir = "./imagens/";
  
   
    // Instanciamos o objeto Upload
    $handle = new Upload($_FILES['eventosfotos_foto13']);
          
    // Então verificamos se o arquivo foi carregado corretamente
    if ($handle->uploaded) 
	{       
        
   // Definimos as configurações desejadas da imagem maior
     if($foto13_p!=""){
       unlink("./img_eventosfotos/$foto13_p");

     }
        $arquivo13_nome_p =$arquivo13_nome= md5(uniqid(time()))  . $ext[1];
      $arquivo13_nome =$arquivo13_nome_p.".jpg";
        // Em caso de sucesso no upload podemos fazer outras ações como insert em um banco de cados
        
       // Definimos as configurações desejadas da imagem maior
       // $handle->image_resize            = true;
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

		
		$handle->file_new_name_body =  $arquivo13_nome_p;// "1";
        // Definimos a pasta para onde a imagem thumbs será armazenada
        $handle->Process('./img_eventosfotos/');
        
        // Excluimos os arquivos temporarios
        $handle-> Clean();

    } 
	else 
	{
        $arquivo13_nome= $foto13_p;
	    // Em caso de erro listamos o erro abaixo
        
    } 
	
 }
}
if($foton=="1"){

   $arquivo14_nome="";
   if($foto14_p!=""){
       unlink("./img_eventosfotos/$foto14_p");

    }

}else{
if(isset($_FILES["eventosfotos_foto14"])){
  //$pasta_dir = "./imagens/";
  
   
    // Instanciamos o objeto Upload
    $handle = new Upload($_FILES['eventosfotos_foto14']);
          
    // Então verificamos se o arquivo foi carregado corretamente
    if ($handle->uploaded) 
	{       
        
   // Definimos as configurações desejadas da imagem maior
     if($foto14_p!=""){
       unlink("./img_eventosfotos/$foto14_p");

     }
        $arquivo14_nome_p =$arquivo14_nome= md5(uniqid(time()))  . $ext[1];
      $arquivo14_nome =$arquivo14_nome_p.".jpg";
        // Em caso de sucesso no upload podemos fazer outras ações como insert em um banco de cados
        
       // Definimos as configurações desejadas da imagem maior
       // $handle->image_resize            = true;
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

		
		$handle->file_new_name_body =  $arquivo14_nome_p;// "1";
        // Definimos a pasta para onde a imagem thumbs será armazenada
        $handle->Process('./img_eventosfotos/');
        
        // Excluimos os arquivos temporarios
        $handle-> Clean();

    } 
	else 
	{
        $arquivo14_nome= $foto14_p;
	    // Em caso de erro listamos o erro abaixo
        
    } 
	
 }
}
if($fotoo=="1"){

   $arquivo15_nome="";
   if($foto15_p!=""){
       unlink("./img_eventosfotos/$foto15_p");

    }

}else{
if(isset($_FILES["eventosfotos_foto15"])){
  //$pasta_dir = "./imagens/";
  
   
    // Instanciamos o objeto Upload
    $handle = new Upload($_FILES['eventosfotos_foto15']);
          
    // Então verificamos se o arquivo foi carregado corretamente
    if ($handle->uploaded) 
	{       
        
   // Definimos as configurações desejadas da imagem maior
     if($foto15_p!=""){
       unlink("./img_eventosfotos/$foto15_p");

     }
        $arquivo15_nome_p =$arquivo15_nome= md5(uniqid(time()))  . $ext[1];
      $arquivo15_nome =$arquivo15_nome_p.".jpg";
        // Em caso de sucesso no upload podemos fazer outras ações como insert em um banco de cados
        
       // Definimos as configurações desejadas da imagem maior
       // $handle->image_resize            = true;
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

		
		$handle->file_new_name_body =  $arquivo15_nome_p;// "1";
        // Definimos a pasta para onde a imagem thumbs será armazenada
        $handle->Process('./img_eventosfotos/');
        
        // Excluimos os arquivos temporarios
        $handle-> Clean();

    } 
	else 
	{
        $arquivo15_nome= $foto15_p;
	    // Em caso de erro listamos o erro abaixo
        
    } 
	
 }
}
if($fotop=="1"){

   $arquivo16_nome="";
   if($foto16_p!=""){
       unlink("./img_eventosfotos/$foto16_p");

    }

}else{
if(isset($_FILES["eventosfotos_foto16"])){
  //$pasta_dir = "./imagens/";
  
   
    // Instanciamos o objeto Upload
    $handle = new Upload($_FILES['eventosfotos_foto16']);
          
    // Então verificamos se o arquivo foi carregado corretamente
    if ($handle->uploaded) 
	{       
        
   // Definimos as configurações desejadas da imagem maior
     if($foto16_p!=""){
       unlink("./img_eventosfotos/$foto16_p");

     }
        $arquivo16_nome_p =$arquivo16_nome= md5(uniqid(time()))  . $ext[1];
      $arquivo16_nome =$arquivo16_nome_p.".jpg";
        // Em caso de sucesso no upload podemos fazer outras ações como insert em um banco de cados
        
      // Definimos as configurações desejadas da imagem maior
       // $handle->image_resize            = true;
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

		
		$handle->file_new_name_body =  $arquivo16_nome_p;// "1";
        // Definimos a pasta para onde a imagem thumbs será armazenada
        $handle->Process('./img_eventosfotos/');
        
        // Excluimos os arquivos temporarios
        $handle-> Clean();

    } 
	else 
	{
        $arquivo16_nome= $foto16_p;
	    // Em caso de erro listamos o erro abaixo
        
    } 
	
 }
}
if($fotoq=="1"){

   $arquivo17_nome="";
   if($foto17_p!=""){
       unlink("./img_eventosfotos/$foto17_p");

    }

}else{
if(isset($_FILES["eventosfotos_foto17"])){
  //$pasta_dir = "./imagens/";
  
   
    // Instanciamos o objeto Upload
    $handle = new Upload($_FILES['eventosfotos_foto17']);
          
    // Então verificamos se o arquivo foi carregado corretamente
    if ($handle->uploaded) 
	{       
        
   // Definimos as configurações desejadas da imagem maior
     if($foto17_p!=""){
       unlink("./img_eventosfotos/$foto17_p");

     }
        $arquivo17_nome_p =$arquivo17_nome= md5(uniqid(time()))  . $ext[1];
      $arquivo17_nome =$arquivo17_nome_p.".jpg";
        // Em caso de sucesso no upload podemos fazer outras ações como insert em um banco de cados
        
      // Definimos as configurações desejadas da imagem maior
       // $handle->image_resize            = true;
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

		
		$handle->file_new_name_body =  $arquivo17_nome_p;// "1";
        // Definimos a pasta para onde a imagem thumbs será armazenada
        $handle->Process('./img_eventosfotos/');
        
        // Excluimos os arquivos temporarios
        $handle-> Clean();

    } 
	else 
	{
        $arquivo17_nome= $foto17_p;
	    // Em caso de erro listamos o erro abaixo
        
    } 
	
 }
}
if($fotor=="1"){

   $arquivo18_nome="";
   if($foto18_p!=""){
       unlink("./img_eventosfotos/$foto18_p");

    }

}else{
if(isset($_FILES["eventosfotos_foto18"])){
  //$pasta_dir = "./imagens/";
  
   
    // Instanciamos o objeto Upload
    $handle = new Upload($_FILES['eventosfotos_foto18']);
          
    // Então verificamos se o arquivo foi carregado corretamente
    if ($handle->uploaded) 
	{       
        
   // Definimos as configurações desejadas da imagem maior
     if($foto18_p!=""){
       unlink("./img_eventosfotos/$foto18_p");

     }
        $arquivo18_nome_p =$arquivo18_nome= md5(uniqid(time()))  . $ext[1];
      $arquivo18_nome =$arquivo18_nome_p.".jpg";
        // Em caso de sucesso no upload podemos fazer outras ações como insert em um banco de cados
        
       // Definimos as configurações desejadas da imagem maior
       // $handle->image_resize            = true;
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

		
		$handle->file_new_name_body =  $arquivo18_nome_p;// "1";
        // Definimos a pasta para onde a imagem thumbs será armazenada
        $handle->Process('./img_eventosfotos/');
        
        // Excluimos os arquivos temporarios
        $handle-> Clean();

    } 
	else 
	{
        $arquivo18_nome= $foto18_p;
	    // Em caso de erro listamos o erro abaixo
        
    } 
	
 }
}
if($fotos=="1"){

   $arquivo19_nome="";
   if($foto19_p!=""){
       unlink("./img_eventosfotos/$foto19_p");

    }

}else{
if(isset($_FILES["eventosfotos_foto19"])){
  //$pasta_dir = "./imagens/";
  
   
    // Instanciamos o objeto Upload
    $handle = new Upload($_FILES['eventosfotos_foto19']);
          
    // Então verificamos se o arquivo foi carregado corretamente
    if ($handle->uploaded) 
	{       
        
   // Definimos as configurações desejadas da imagem maior
     if($foto19_p!=""){
       unlink("./img_eventosfotos/$foto19_p");

     }
        $arquivo19_nome_p =$arquivo19_nome= md5(uniqid(time()))  . $ext[1];
      $arquivo19_nome =$arquivo19_nome_p.".jpg";
        // Em caso de sucesso no upload podemos fazer outras ações como insert em um banco de cados
        
       // Definimos as configurações desejadas da imagem maior
       // $handle->image_resize            = true;
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

		
		$handle->file_new_name_body =  $arquivo19_nome_p;// "1";
        // Definimos a pasta para onde a imagem thumbs será armazenada
        $handle->Process('./img_eventosfotos/');
        
        // Excluimos os arquivos temporarios
        $handle-> Clean();

    } 
	else 
	{
        $arquivo19_nome= $foto19_p;
	    // Em caso de erro listamos o erro abaixo
        
    } 
	
 }
}
if($fotot=="1"){

   $arquivo20_nome="";
   if($foto20_p!=""){
       unlink("./img_eventosfotos/$foto20_p");

    }

}else{
if(isset($_FILES["eventosfotos_foto20"])){
  //$pasta_dir = "./imagens/";
  
   
    // Instanciamos o objeto Upload
    $handle = new Upload($_FILES['eventosfotos_foto20']);
          
    // Então verificamos se o arquivo foi carregado corretamente
    if ($handle->uploaded) 
	{       
        
   // Definimos as configurações desejadas da imagem maior
     if($foto20_p!=""){
       unlink("./img_eventosfotos/$foto20_p");

     }
        $arquivo20_nome_p =$arquivo20_nome= md5(uniqid(time()))  . $ext[1];
      $arquivo20_nome =$arquivo20_nome_p.".jpg";
        // Em caso de sucesso no upload podemos fazer outras ações como insert em um banco de cados
        
      // Definimos as configurações desejadas da imagem maior
       // $handle->image_resize            = true;
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
		
		$handle->file_new_name_body =  $arquivo20_nome_p;// "1";
        // Definimos a pasta para onde a imagem thumbs será armazenada
        $handle->Process('./img_eventosfotos/');
        
        // Excluimos os arquivos temporarios
        $handle-> Clean();

    } 
	else 
	{
        $arquivo20_nome= $foto20_p;
	    // Em caso de erro listamos o erro abaixo
        
    } 
	
 }
}



///////////////////////////////////////////////

} // end imagem ação


  $sql = "UPDATE eventosfotos SET EVENTOSFOTOS_TITULO='$eventosfotos_titulo', EVENTOSFOTOS_DATA='$eventosfotos_data', EVENTOSFOTOS_CORPO='$eventosfotos_corpo', EVENTOSFOTOS_FOTO1='$arquivo1_nome' , EVENTOSFOTOS_FOTO2='$arquivo2_nome' , EVENTOSFOTOS_FOTO3='$arquivo3_nome' , EVENTOSFOTOS_FOTO4='$arquivo4_nome' , EVENTOSFOTOS_FOTO5='$arquivo5_nome' , EVENTOSFOTOS_FOTO6='$arquivo6_nome' , EVENTOSFOTOS_FOTO7='$arquivo7_nome' , EVENTOSFOTOS_FOTO8='$arquivo8_nome' , EVENTOSFOTOS_FOTO9='$arquivo9_nome' , EVENTOSFOTOS_FOTO10='$arquivo10_nome' , EVENTOSFOTOS_FOTO11='$arquivo11_nome' , EVENTOSFOTOS_FOTO12='$arquivo12_nome' , EVENTOSFOTOS_FOTO13='$arquivo13_nome' , EVENTOSFOTOS_FOTO14='$arquivo14_nome' , EVENTOSFOTOS_FOTO15='$arquivo15_nome' , EVENTOSFOTOS_FOTO16='$arquivo16_nome' , EVENTOSFOTOS_FOTO17='$arquivo17_nome' , EVENTOSFOTOS_FOTO18='$arquivo18_nome' , EVENTOSFOTOS_FOTO19='$arquivo19_nome' , EVENTOSFOTOS_FOTO20='$arquivo20_nome' WHERE ID_EVENTOSFOTOS='$id_eventosfotos'";
   
}else{


if ($_POST['acao'] == 'imagem') 
{
if(isset($_FILES["eventosfotos_foto1"])){
  //$pasta_dir = "./imagens/";
 
   
    // Instanciamos o objeto Upload
    $handle = new Upload($_FILES['eventosfotos_foto1']);
          
    // Então verificamos se o arquivo foi carregado corretamente
    if ($handle->uploaded) 
	{       
        // Definimos as configurações desejadas da imagem maior
     $arquivo1_nome_p =$arquivo1_nome= md5(uniqid(time()))  . $ext[1];
   $arquivo1_nome =$arquivo1_nome_p.".jpg";
        
        // Em caso de sucesso no upload podemos fazer outras ações como insert em um banco de cados
        
       // Definimos as configurações desejadas da imagem maior
       // $handle->image_resize            = true;
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
        $handle->Process('./img_eventosfotos/');
        
        // Excluimos os arquivos temporarios
        $handle-> Clean();

    } 
	else 
	{
       $arquivo1_nome="";
	    // Em caso de erro listamos o erro abaixo
        
    } 
	
 }
///////////////////////



if(isset($_FILES["eventosfotos_foto2"])){
  //$pasta_dir = "./imagens/";
 
   
    // Instanciamos o objeto Upload
    $handle = new Upload($_FILES['eventosfotos_foto2']);
          
    // Então verificamos se o arquivo foi carregado corretamente
    if ($handle->uploaded) 
	{       
        // Definimos as configurações desejadas da imagem maior
     $arquivo2_nome_p =$arquivo2_nome= md5(uniqid(time()))  . $ext[1];
   $arquivo2_nome =$arquivo2_nome_p.".jpg";
        
        // Em caso de sucesso no upload podemos fazer outras ações como insert em um banco de cados
        
       // Definimos as configurações desejadas da imagem maior
       // $handle->image_resize            = true;
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
		
		$handle->file_new_name_body =  $arquivo2_nome_p;// "1";
        // Definimos a pasta para onde a imagem thumbs será armazenada
        $handle->Process('./img_eventosfotos/');
        
        // Excluimos os arquivos temporarios
        $handle-> Clean();

    } 
	else 
	{
       $arquivo2_nome="";
	    // Em caso de erro listamos o erro abaixo
        
    } 
	
 }
 if(isset($_FILES["eventosfotos_foto3"])){
  //$pasta_dir = "./imagens/";
 
   
    // Instanciamos o objeto Upload
    $handle = new Upload($_FILES['eventosfotos_foto3']);
          
    // Então verificamos se o arquivo foi carregado corretamente
    if ($handle->uploaded) 
	{       
        // Definimos as configurações desejadas da imagem maior
     $arquivo3_nome_p =$arquivo3_nome= md5(uniqid(time()))  . $ext[1];
   $arquivo3_nome =$arquivo3_nome_p.".jpg";
        
        // Em caso de sucesso no upload podemos fazer outras ações como insert em um banco de cados
        
       // Definimos as configurações desejadas da imagem maior
       // $handle->image_resize            = true;
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

		
		$handle->file_new_name_body =  $arquivo3_nome_p;// "1";
        // Definimos a pasta para onde a imagem thumbs será armazenada
        $handle->Process('./img_eventosfotos/');
        
        // Excluimos os arquivos temporarios
        $handle-> Clean();

    } 
	else 
	{
       $arquivo3_nome="";
	    // Em caso de erro listamos o erro abaixo
        
    } 
	
 }
 if(isset($_FILES["eventosfotos_foto4"])){
  //$pasta_dir = "./imagens/";
 
   
    // Instanciamos o objeto Upload
    $handle = new Upload($_FILES['eventosfotos_foto4']);
          
    // Então verificamos se o arquivo foi carregado corretamente
    if ($handle->uploaded) 
	{       
        // Definimos as configurações desejadas da imagem maior
     $arquivo4_nome_p =$arquivo4_nome= md5(uniqid(time()))  . $ext[1];
   $arquivo4_nome =$arquivo4_nome_p.".jpg";
        
        // Em caso de sucesso no upload podemos fazer outras ações como insert em um banco de cados
        
       // Definimos as configurações desejadas da imagem maior
       // $handle->image_resize            = true;
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

		
		$handle->file_new_name_body =  $arquivo4_nome_p;// "1";
        // Definimos a pasta para onde a imagem thumbs será armazenada
        $handle->Process('./img_eventosfotos/');
        
        // Excluimos os arquivos temporarios
        $handle-> Clean();

    } 
	else 
	{
       $arquivo4_nome="";
	    // Em caso de erro listamos o erro abaixo
        
    } 
	
 }
 if(isset($_FILES["eventosfotos_foto5"])){
  //$pasta_dir = "./imagens/";
 
   
    // Instanciamos o objeto Upload
    $handle = new Upload($_FILES['eventosfotos_foto5']);
          
    // Então verificamos se o arquivo foi carregado corretamente
    if ($handle->uploaded) 
	{       
        // Definimos as configurações desejadas da imagem maior
     $arquivo5_nome_p =$arquivo5_nome= md5(uniqid(time()))  . $ext[1];
   $arquivo5_nome =$arquivo5_nome_p.".jpg";
        
        // Em caso de sucesso no upload podemos fazer outras ações como insert em um banco de cados
        
       // Definimos as configurações desejadas da imagem maior
       // $handle->image_resize            = true;
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

		
		$handle->file_new_name_body =  $arquivo5_nome_p;// "1";
        // Definimos a pasta para onde a imagem thumbs será armazenada
        $handle->Process('./img_eventosfotos/');
        
        // Excluimos os arquivos temporarios
        $handle-> Clean();

    } 
	else 
	{
       $arquivo5_nome="";
	    // Em caso de erro listamos o erro abaixo
        
    } 
	
 }
 if(isset($_FILES["eventosfotos_foto6"])){
  //$pasta_dir = "./imagens/";
 
   
    // Instanciamos o objeto Upload
    $handle = new Upload($_FILES['eventosfotos_foto6']);
          
    // Então verificamos se o arquivo foi carregado corretamente
    if ($handle->uploaded) 
	{       
        // Definimos as configurações desejadas da imagem maior
     $arquivo6_nome_p =$arquivo6_nome= md5(uniqid(time()))  . $ext[1];
   $arquivo6_nome =$arquivo6_nome_p.".jpg";
        
        // Em caso de sucesso no upload podemos fazer outras ações como insert em um banco de cados
        
      // Definimos as configurações desejadas da imagem maior
       // $handle->image_resize            = true;
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

		
		$handle->file_new_name_body =  $arquivo6_nome_p;// "1";
        // Definimos a pasta para onde a imagem thumbs será armazenada
        $handle->Process('./img_eventosfotos/');
        
        // Excluimos os arquivos temporarios
        $handle-> Clean();

    } 
	else 
	{
       $arquivo6_nome="";
	    // Em caso de erro listamos o erro abaixo
        
    } 
	
 }
 if(isset($_FILES["eventosfotos_foto7"])){
  //$pasta_dir = "./imagens/";
 
   
    // Instanciamos o objeto Upload
    $handle = new Upload($_FILES['eventosfotos_foto7']);
          
    // Então verificamos se o arquivo foi carregado corretamente
    if ($handle->uploaded) 
	{       
        // Definimos as configurações desejadas da imagem maior
     $arquivo7_nome_p =$arquivo7_nome= md5(uniqid(time()))  . $ext[1];
   $arquivo7_nome =$arquivo7_nome_p.".jpg";
        
        // Em caso de sucesso no upload podemos fazer outras ações como insert em um banco de cados
        
      // Definimos as configurações desejadas da imagem maior
       // $handle->image_resize            = true;
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

		
		$handle->file_new_name_body =  $arquivo7_nome_p;// "1";
        // Definimos a pasta para onde a imagem thumbs será armazenada
        $handle->Process('./img_eventosfotos/');
        
        // Excluimos os arquivos temporarios
        $handle-> Clean();

    } 
	else 
	{
       $arquivo7_nome="";
	    // Em caso de erro listamos o erro abaixo
        
    } 
	
 }
 if(isset($_FILES["eventosfotos_foto8"])){
  //$pasta_dir = "./imagens/";
 
   
    // Instanciamos o objeto Upload
    $handle = new Upload($_FILES['eventosfotos_foto8']);
          
    // Então verificamos se o arquivo foi carregado corretamente
    if ($handle->uploaded) 
	{       
        // Definimos as configurações desejadas da imagem maior
     $arquivo8_nome_p =$arquivo8_nome= md5(uniqid(time()))  . $ext[1];
   $arquivo8_nome =$arquivo8_nome_p.".jpg";
        
        // Em caso de sucesso no upload podemos fazer outras ações como insert em um banco de cados
        
       // Definimos as configurações desejadas da imagem maior
       // $handle->image_resize            = true;
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

		
		$handle->file_new_name_body =  $arquivo8_nome_p;// "1";
        // Definimos a pasta para onde a imagem thumbs será armazenada
        $handle->Process('./img_eventosfotos/');
        
        // Excluimos os arquivos temporarios
        $handle-> Clean();

    } 
	else 
	{
       $arquivo8_nome="";
	    // Em caso de erro listamos o erro abaixo
        
    } 
	
 }
 if(isset($_FILES["eventosfotos_foto9"])){
  //$pasta_dir = "./imagens/";
 
   
    // Instanciamos o objeto Upload
    $handle = new Upload($_FILES['eventosfotos_foto9']);
          
    // Então verificamos se o arquivo foi carregado corretamente
    if ($handle->uploaded) 
	{       
        // Definimos as configurações desejadas da imagem maior
     $arquivo9_nome_p =$arquivo9_nome= md5(uniqid(time()))  . $ext[1];
   $arquivo9_nome =$arquivo9_nome_p.".jpg";
        
        // Em caso de sucesso no upload podemos fazer outras ações como insert em um banco de cados
        
      // Definimos as configurações desejadas da imagem maior
       // $handle->image_resize            = true;
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

		
		$handle->file_new_name_body =  $arquivo9_nome_p;// "1";
        // Definimos a pasta para onde a imagem thumbs será armazenada
        $handle->Process('./img_eventosfotos/');
        
        // Excluimos os arquivos temporarios
        $handle-> Clean();

    } 
	else 
	{
       $arquivo9_nome="";
	    // Em caso de erro listamos o erro abaixo
        
    } 
	
 }
 if(isset($_FILES["eventosfotos_foto10"])){
  //$pasta_dir = "./imagens/";
 
   
    // Instanciamos o objeto Upload
    $handle = new Upload($_FILES['eventosfotos_foto10']);
          
    // Então verificamos se o arquivo foi carregado corretamente
    if ($handle->uploaded) 
	{       
        // Definimos as configurações desejadas da imagem maior
     $arquivo10_nome_p =$arquivo10_nome= md5(uniqid(time()))  . $ext[1];
   $arquivo10_nome =$arquivo10_nome_p.".jpg";
        
        // Em caso de sucesso no upload podemos fazer outras ações como insert em um banco de cados
        
       // Definimos as configurações desejadas da imagem maior
       // $handle->image_resize            = true;
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

		
		$handle->file_new_name_body =  $arquivo10_nome_p;// "1";
        // Definimos a pasta para onde a imagem thumbs será armazenada
        $handle->Process('./img_eventosfotos/');
        
        // Excluimos os arquivos temporarios
        $handle-> Clean();

    } 
	else 
	{
       $arquivo10_nome="";
	    // Em caso de erro listamos o erro abaixo
        
    } 
	
 }
 if(isset($_FILES["eventosfotos_foto11"])){
  //$pasta_dir = "./imagens/";
 
   
    // Instanciamos o objeto Upload
    $handle = new Upload($_FILES['eventosfotos_foto11']);
          
    // Então verificamos se o arquivo foi carregado corretamente
    if ($handle->uploaded) 
	{       
        // Definimos as configurações desejadas da imagem maior
     $arquivo11_nome_p =$arquivo11_nome= md5(uniqid(time()))  . $ext[1];
   $arquivo11_nome =$arquivo11_nome_p.".jpg";
        
        // Em caso de sucesso no upload podemos fazer outras ações como insert em um banco de cados
        
       // Definimos as configurações desejadas da imagem maior
       // $handle->image_resize            = true;
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

		
		$handle->file_new_name_body =  $arquivo11_nome_p;// "1";
        // Definimos a pasta para onde a imagem thumbs será armazenada
        $handle->Process('./img_eventosfotos/');
        
        // Excluimos os arquivos temporarios
        $handle-> Clean();

    } 
	else 
	{
       $arquivo11_nome="";
	    // Em caso de erro listamos o erro abaixo
        
    } 
	
 }

if(isset($_FILES["eventosfotos_foto12"])){
  //$pasta_dir = "./imagens/";
 
   
    // Instanciamos o objeto Upload
    $handle = new Upload($_FILES['eventosfotos_foto12']);
          
    // Então verificamos se o arquivo foi carregado corretamente
    if ($handle->uploaded) 
	{       
        // Definimos as configurações desejadas da imagem maior
     $arquivo12_nome_p =$arquivo12_nome= md5(uniqid(time()))  . $ext[1];
   $arquivo12_nome =$arquivo12_nome_p.".jpg";
        
        // Em caso de sucesso no upload podemos fazer outras ações como insert em um banco de cados
        
       // Definimos as configurações desejadas da imagem maior
       // $handle->image_resize            = true;
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
		
		$handle->file_new_name_body =  $arquivo12_nome_p;// "1";
        // Definimos a pasta para onde a imagem thumbs será armazenada
        $handle->Process('./img_eventosfotos/');
        
        // Excluimos os arquivos temporarios
        $handle-> Clean();

    } 
	else 
	{
       $arquivo12_nome="";
	    // Em caso de erro listamos o erro abaixo
        
    } 
	
 }
 if(isset($_FILES["eventosfotos_foto13"])){
  //$pasta_dir = "./imagens/";
 
   
    // Instanciamos o objeto Upload
    $handle = new Upload($_FILES['eventosfotos_foto13']);
          
    // Então verificamos se o arquivo foi carregado corretamente
    if ($handle->uploaded) 
	{       
        // Definimos as configurações desejadas da imagem maior
     $arquivo13_nome_p =$arquivo13_nome= md5(uniqid(time()))  . $ext[1];
   $arquivo13_nome =$arquivo13_nome_p.".jpg";
        
        // Em caso de sucesso no upload podemos fazer outras ações como insert em um banco de cados
        
      // Definimos as configurações desejadas da imagem maior
       // $handle->image_resize            = true;
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

		
		$handle->file_new_name_body =  $arquivo13_nome_p;// "1";
        // Definimos a pasta para onde a imagem thumbs será armazenada
        $handle->Process('./img_eventosfotos/');
        
        // Excluimos os arquivos temporarios
        $handle-> Clean();

    } 
	else 
	{
       $arquivo13_nome="";
	    // Em caso de erro listamos o erro abaixo
        
    } 
	
 }
 if(isset($_FILES["eventosfotos_foto14"])){
  //$pasta_dir = "./imagens/";
 
   
    // Instanciamos o objeto Upload
    $handle = new Upload($_FILES['eventosfotos_foto14']);
          
    // Então verificamos se o arquivo foi carregado corretamente
    if ($handle->uploaded) 
	{       
        // Definimos as configurações desejadas da imagem maior
     $arquivo14_nome_p =$arquivo14_nome= md5(uniqid(time()))  . $ext[1];
   $arquivo14_nome =$arquivo14_nome_p.".jpg";
        
        // Em caso de sucesso no upload podemos fazer outras ações como insert em um banco de cados
        
       // Definimos as configurações desejadas da imagem maior
       // $handle->image_resize            = true;
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

		
		$handle->file_new_name_body =  $arquivo14_nome_p;// "1";
        // Definimos a pasta para onde a imagem thumbs será armazenada
        $handle->Process('./img_eventosfotos/');
        
        // Excluimos os arquivos temporarios
        $handle-> Clean();

    } 
	else 
	{
       $arquivo14_nome="";
	    // Em caso de erro listamos o erro abaixo
        
    } 
	
 }
 if(isset($_FILES["eventosfotos_foto15"])){
  //$pasta_dir = "./imagens/";
 
   
    // Instanciamos o objeto Upload
    $handle = new Upload($_FILES['eventosfotos_foto15']);
          
    // Então verificamos se o arquivo foi carregado corretamente
    if ($handle->uploaded) 
	{       
        // Definimos as configurações desejadas da imagem maior
     $arquivo15_nome_p =$arquivo15_nome= md5(uniqid(time()))  . $ext[1];
   $arquivo15_nome =$arquivo15_nome_p.".jpg";
        
        // Em caso de sucesso no upload podemos fazer outras ações como insert em um banco de cados
        
       // Definimos as configurações desejadas da imagem maior
       // $handle->image_resize            = true;
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

		
		$handle->file_new_name_body =  $arquivo15_nome_p;// "1";
        // Definimos a pasta para onde a imagem thumbs será armazenada
        $handle->Process('./img_eventosfotos/');
        
        // Excluimos os arquivos temporarios
        $handle-> Clean();

    } 
	else 
	{
       $arquivo15_nome="";
	    // Em caso de erro listamos o erro abaixo
        
    } 
	
 }
 if(isset($_FILES["eventosfotos_foto16"])){
  //$pasta_dir = "./imagens/";
 
   
    // Instanciamos o objeto Upload
    $handle = new Upload($_FILES['eventosfotos_foto16']);
          
    // Então verificamos se o arquivo foi carregado corretamente
    if ($handle->uploaded) 
	{       
        // Definimos as configurações desejadas da imagem maior
     $arquivo16_nome_p =$arquivo16_nome= md5(uniqid(time()))  . $ext[1];
   $arquivo16_nome =$arquivo16_nome_p.".jpg";
        
        // Em caso de sucesso no upload podemos fazer outras ações como insert em um banco de cados
        
       // Definimos as configurações desejadas da imagem maior
       // $handle->image_resize            = true;
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

		
		$handle->file_new_name_body =  $arquivo16_nome_p;// "1";
        // Definimos a pasta para onde a imagem thumbs será armazenada
        $handle->Process('./img_eventosfotos/');
        
        // Excluimos os arquivos temporarios
        $handle-> Clean();

    } 
	else 
	{
       $arquivo16_nome="";
	    // Em caso de erro listamos o erro abaixo
        
    } 
	
 }
 if(isset($_FILES["eventosfotos_foto17"])){
  //$pasta_dir = "./imagens/";
 
   
    // Instanciamos o objeto Upload
    $handle = new Upload($_FILES['eventosfotos_foto17']);
          
    // Então verificamos se o arquivo foi carregado corretamente
    if ($handle->uploaded) 
	{       
        // Definimos as configurações desejadas da imagem maior
     $arquivo17_nome_p =$arquivo17_nome= md5(uniqid(time()))  . $ext[1];
   $arquivo17_nome =$arquivo17_nome_p.".jpg";
        
        // Em caso de sucesso no upload podemos fazer outras ações como insert em um banco de cados
        
       // Definimos as configurações desejadas da imagem maior
       // $handle->image_resize            = true;
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

		
		$handle->file_new_name_body =  $arquivo17_nome_p;// "1";
        // Definimos a pasta para onde a imagem thumbs será armazenada
        $handle->Process('./img_eventosfotos/');
        
        // Excluimos os arquivos temporarios
        $handle-> Clean();

    } 
	else 
	{
       $arquivo17_nome="";
	    // Em caso de erro listamos o erro abaixo
        
    } 
	
 }
 if(isset($_FILES["eventosfotos_foto18"])){
  //$pasta_dir = "./imagens/";
 
   
    // Instanciamos o objeto Upload
    $handle = new Upload($_FILES['eventosfotos_foto18']);
          
    // Então verificamos se o arquivo foi carregado corretamente
    if ($handle->uploaded) 
	{       
        // Definimos as configurações desejadas da imagem maior
     $arquivo18_nome_p =$arquivo18_nome= md5(uniqid(time()))  . $ext[1];
   $arquivo18_nome =$arquivo18_nome_p.".jpg";
        
        // Em caso de sucesso no upload podemos fazer outras ações como insert em um banco de cados
        
       // Definimos as configurações desejadas da imagem maior
       // $handle->image_resize            = true;
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
		
		$handle->file_new_name_body =  $arquivo18_nome_p;// "1";
        // Definimos a pasta para onde a imagem thumbs será armazenada
        $handle->Process('./img_eventosfotos/');
        
        // Excluimos os arquivos temporarios
        $handle-> Clean();

    } 
	else 
	{
       $arquivo18_nome="";
	    // Em caso de erro listamos o erro abaixo
        
    } 
	
 }
 if(isset($_FILES["eventosfotos_foto19"])){
  //$pasta_dir = "./imagens/";
 
   
    // Instanciamos o objeto Upload
    $handle = new Upload($_FILES['eventosfotos_foto19']);
          
    // Então verificamos se o arquivo foi carregado corretamente
    if ($handle->uploaded) 
	{       
        // Definimos as configurações desejadas da imagem maior
     $arquivo19_nome_p =$arquivo19_nome= md5(uniqid(time()))  . $ext[1];
   $arquivo19_nome =$arquivo19_nome_p.".jpg";
        
        // Em caso de sucesso no upload podemos fazer outras ações como insert em um banco de cados
        
       // Definimos as configurações desejadas da imagem maior
       // $handle->image_resize            = true;
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

		
		$handle->file_new_name_body =  $arquivo19_nome_p;// "1";
        // Definimos a pasta para onde a imagem thumbs será armazenada
        $handle->Process('./img_eventosfotos/');
        
        // Excluimos os arquivos temporarios
        $handle-> Clean();

    } 
	else 
	{
       $arquivo19_nome="";
	    // Em caso de erro listamos o erro abaixo
        
    } 
	
 }
 if(isset($_FILES["eventosfotos_foto20"])){
  //$pasta_dir = "./imagens/";
 
   
    // Instanciamos o objeto Upload
    $handle = new Upload($_FILES['eventosfotos_foto20']);
          
    // Então verificamos se o arquivo foi carregado corretamente
    if ($handle->uploaded) 
	{       
        // Definimos as configurações desejadas da imagem maior
     $arquivo20_nome_p =$arquivo20_nome= md5(uniqid(time()))  . $ext[1];
   $arquivo20_nome =$arquivo20_nome_p.".jpg";
        
        // Em caso de sucesso no upload podemos fazer outras ações como insert em um banco de cados
        
       // Definimos as configurações desejadas da imagem maior
       // $handle->image_resize            = true;
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
		
		$handle->file_new_name_body =  $arquivo20_nome_p;// "1";
        // Definimos a pasta para onde a imagem thumbs será armazenada
        $handle->Process('./img_eventosfotos/');
        
        // Excluimos os arquivos temporarios
        $handle-> Clean();

    } 
	else 
	{
       $arquivo20_nome="";
	    // Em caso de erro listamos o erro abaixo
        
    } 
	
 }
 

//////////////////////////////

} // end imagem ação

   $sql = "INSERT INTO eventosfotos (EVENTOSFOTOS_TITULO,EVENTOSFOTOS_DATA,EVENTOSFOTOS_CORPO,EVENTOSFOTOS_FOTO1,EVENTOSFOTOS_FOTO2,EVENTOSFOTOS_FOTO3,EVENTOSFOTOS_FOTO4,EVENTOSFOTOS_FOTO5,EVENTOSFOTOS_FOTO6,EVENTOSFOTOS_FOTO7,EVENTOSFOTOS_FOTO8,EVENTOSFOTOS_FOTO9,EVENTOSFOTOS_FOTO10,EVENTOSFOTOS_FOTO11,EVENTOSFOTOS_FOTO12,EVENTOSFOTOS_FOTO13,EVENTOSFOTOS_FOTO14,EVENTOSFOTOS_FOTO15,EVENTOSFOTOS_FOTO16,EVENTOSFOTOS_FOTO17,EVENTOSFOTOS_FOTO18,EVENTOSFOTOS_FOTO19,EVENTOSFOTOS_FOTO20) VALUES ('".$eventosfotos_titulo."','".$eventosfotos_data."','".$eventosfotos_corpo."','".$arquivo1_nome."','".$arquivo2_nome."','".$arquivo3_nome."','".$arquivo4_nome."','".$arquivo5_nome."','".$arquivo6_nome."','".$arquivo7_nome."','".$arquivo8_nome."','".$arquivo9_nome."','".$arquivo10_nome."','".$arquivo11_nome."','".$arquivo12_nome."','".$arquivo13_nome."','".$arquivo14_nome."','".$arquivo15_nome."','".$arquivo16_nome."','".$arquivo17_nome."','".$arquivo18_nome."','".$arquivo19_nome."','".$arquivo20_nome."')";

}   
If(!$resultado = mysql_query($sql)) $contadora++;
         
   If($resultado)
   {
      echo"Este Evento e Fotos foram salvos com sucesso!";//header("Location: receitas_list.php");//echo"<br>ok<br>"; //  
   }
   Else
   {
      echo"Não foram salvos este Evento e Fotos!";
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
