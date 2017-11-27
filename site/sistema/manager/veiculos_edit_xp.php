<? include_once("struct/struct_top.php")?>
<? include_once("struct/auth.php")?>

<?php
// Aqui incluimos a classe upload
include ("conexao_teste.php");
include('class.upload.php');

$excluir=$_REQUEST["excluir"];
$id_veiculo=$_REQUEST["id_veiculo"];
$veiculo_marca=$_REQUEST["veiculo_marca"];
$veiculo_modelo=$_REQUEST["veiculo_modelo"];
$veiculo_ano_fabricacao=$_REQUEST["veiculo_ano_fabricacao"];
$veiculo_zero=$_REQUEST["veiculo_zero"];
$veiculo_quilometragem=$_REQUEST["veiculo_quilometragem"];
$veiculo_cor=$_REQUEST["veiculo_cor"];
$veiculo_versao=$_REQUEST["veiculo_versao"];
$veiculo_ano_modelo=$_REQUEST["veiculo_ano_modelo"];
$veiculo_conbustivel=$_REQUEST["veiculo_conbustivel"];
$veiculo_placa=$_REQUEST["veiculo_placa"];
$veiculo_n_portas=$_REQUEST["veiculo_n_portas"];
$veiculo_abs=$_REQUEST["veiculo_abs"];
if($veiculo_abs!=""){
$veiculo_abs="1";
}
$veiculo_airbag=$_REQUEST["veiculo_airbag"];
if($veiculo_airbag!=""){
$veiculo_airbag="1";
}
$veiculo_alarme=$_REQUEST["veiculo_alarme"];
if($veiculo_alarme!=""){
$veiculo_alarme="1";
}
$veiculo_ar_condicionado=$_REQUEST["veiculo_ar_condicionado"];
if($veiculo_ar_condicionado!=""){
$veiculo_ar_condicionado="1";
}
$veiculo_banco_couro=$_REQUEST["veiculo_banco_couro"];
if($veiculo_banco_couro!=""){
$veiculo_banco_couro="1";
}
$veiculo_cambio_automatico=$_REQUEST["veiculo_cambio_automatico"];
if($veiculo_cambio_automatico!=""){
$veiculo_cambio_automatico="1";
}
$veiculo_conjunto_eletrico=$_REQUEST["veiculo_conjunto_eletrico"];
if($veiculo_conjunto_eletrico!=""){
$veiculo_conjunto_eletrico="1";
}

$veiculo_cambio_aut_seq=$_REQUEST["veiculo_cambio_aut_seq"];
if($veiculo_cambio_aut_seq!=""){
$veiculo_cambio_aut_seq="1";
}
$veiculo_direcao_eletrica=$_REQUEST["veiculo_direcao_eletrica"];
if($veiculo_direcao_eletrica!=""){
$veiculo_direcao_eletrica="1";
}
$veiculo_cambio_mecanico=$_REQUEST["veiculo_cambio_mecanico"];
if($veiculo_cambio_mecanico!=""){
$veiculo_cambio_mecanico="1";
}

$veiculo_direcao_hidraulica=$_REQUEST["veiculo_direcao_hidraulica"];
if($veiculo_direcao_hidraulica!=""){
$veiculo_direcao_hidraulica="1";
}

$veiculo_pelicula=$_REQUEST["veiculo_pelicula"];
if($veiculo_pelicula!=""){
$veiculo_pelicula="1";
}

$veiculo_rodas_liga_leve=$_REQUEST["veiculo_rodas_liga_leve"];
if($veiculo_rodas_liga_leve!=""){
$veiculo_rodas_liga_leve="1";
}
$veiculo_teto_solar=$_REQUEST["veiculo_teto_solar"];
if($veiculo_teto_solar!=""){
$veiculo_teto_solar="1";
}
$veiculo_vidro_eletrico=$_REQUEST["veiculo_vidro_eletrico"];
if($veiculo_vidro_eletrico!=""){
$veiculo_vidro_eletrico="1";
}
$veiculo_trava_eletrica=$_REQUEST["veiculo_trava_eletrica"];
if($veiculo_trava_eletrica!=""){
$veiculo_trava_eletrica="1";
}
$veiculo_obs=$_REQUEST["veiculo_obs"];
$veiculo_valor=$_REQUEST["veiculo_valor"];


$veiculo_foto1=$_FILES["veiculo_foto1"]; 
$fotoa=$_REQUEST["fotoa"];
$veiculo_foto2=$_FILES["veiculo_foto2"]; 
$fotob=$_REQUEST["fotob"];
$veiculo_foto3=$_FILES["veiculo_foto3"]; 
$fotoc=$_REQUEST["fotoc"];
$veiculo_foto4=$_FILES["veiculo_foto4"]; 
$fotod=$_REQUEST["fotod"];
$veiculo_foto5=$_FILES["veiculo_foto5"]; 
$fotoe=$_REQUEST["fotoe"];
$veiculo_foto6=$_FILES["veiculo_foto6"]; 
$fotof=$_REQUEST["fotof"];
$veiculo_foto7=$_FILES["veiculo_foto7"]; 
$fotog=$_REQUEST["fotog"];
$veiculo_foto8=$_FILES["veiculo_foto8"]; 
$fotoh=$_REQUEST["fotoh"];
$veiculo_foto9=$_FILES["veiculo_foto9"]; 
$fotoi=$_REQUEST["fotoi"];
$veiculo_foto10=$_FILES["veiculo_foto10"]; 
$fotoj=$_REQUEST["fotoj"];
$veiculo_foto11=$_FILES["veiculo_foto11"]; 
$fotok=$_REQUEST["fotok"];
$veiculo_foto12=$_FILES["veiculo_foto12"]; 
$fotol=$_REQUEST["fotol"];

// Verificamos se a acao é igual a imagem
if ($id_veiculo!=""){
$id_p = $id_veiculo;
$consulta=mysql_query("SELECT * FROM veiculos where id_veiculo='$id_p'"); 

//Fazendo o looping para exibição de todos registros que contiverem em nomedatabela
while ($dados = mysql_fetch_array($consulta)) {


$foto1_p=$dados['veiculo_foto1'];
$foto2_p=$dados['veiculo_foto2'];
$foto3_p=$dados['veiculo_foto3'];
$foto4_p=$dados['veiculo_foto4'];
$foto5_p=$dados['veiculo_foto5'];
$foto6_p=$dados['veiculo_foto6'];
$foto7_p=$dados['veiculo_foto7'];
$foto8_p=$dados['veiculo_foto8'];
$foto9_p=$dados['veiculo_foto9'];
$foto10_p=$dados['veiculo_foto10'];
$foto11_p=$dados['veiculo_foto11'];
$foto12_p=$dados['veiculo_foto12'];


}

if ($_POST['acao'] == 'imagem') 
{
if($fotoa=="1"){

   $arquivo1_nome="";
   if($foto1_p!=""){
       unlink("./img_veiculos/$foto1_p");

    }

}else{
if(isset($_FILES["veiculo_foto1"])){
  //$pasta_dir = "./imagens/";
  
   
    // Instanciamos o objeto Upload
    $handle = new Upload($_FILES['veiculo_foto1']);
          
    // Então verificamos se o arquivo foi carregado corretamente
    if ($handle->uploaded) 
	{       
        
   // Definimos as configurações desejadas da imagem maior
     if($foto1_p!=""){
       unlink("./img_veiculos/$foto1_p");

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
        $handle->Process('./img_veiculos/');
        
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
       unlink("./img_veiculos/$foto2_p");

    }

}else{
if(isset($_FILES["veiculo_foto2"])){
  //$pasta_dir = "./imagens/";
  
   
    // Instanciamos o objeto Upload
    $handle = new Upload($_FILES['veiculo_foto2']);
          
    // Então verificamos se o arquivo foi carregado corretamente
    if ($handle->uploaded) 
	{       
        
   // Definimos as configurações desejadas da imagem maior
     if($foto2_p!=""){
       unlink("./img_veiculos/$foto2_p");

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
        $handle->Process('./img_veiculos/');
        
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
       unlink("./img_veiculos/$foto3_p");

    }

}else{
if(isset($_FILES["veiculo_foto3"])){
  //$pasta_dir = "./imagens/";
  
   
    // Instanciamos o objeto Upload
    $handle = new Upload($_FILES['veiculo_foto3']);
          
    // Então verificamos se o arquivo foi carregado corretamente
    if ($handle->uploaded) 
	{       
        
   // Definimos as configurações desejadas da imagem maior
     if($foto3_p!=""){
       unlink("./img_veiculos/$foto3_p");

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
        $handle->Process('./img_veiculos/');
        
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
       unlink("./img_veiculos/$foto4_p");

    }

}else{
if(isset($_FILES["veiculo_foto4"])){
  //$pasta_dir = "./imagens/";
  
   
    // Instanciamos o objeto Upload
    $handle = new Upload($_FILES['veiculo_foto4']);
          
    // Então verificamos se o arquivo foi carregado corretamente
    if ($handle->uploaded) 
	{       
        
   // Definimos as configurações desejadas da imagem maior
     if($foto4_p!=""){
       unlink("./img_veiculos/$foto4_p");

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
        $handle->Process('./img_veiculos/');
        
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
       unlink("./img_veiculos/$foto5_p");

    }

}else{
if(isset($_FILES["veiculo_foto5"])){
  //$pasta_dir = "./imagens/";
  
   
    // Instanciamos o objeto Upload
    $handle = new Upload($_FILES['veiculo_foto5']);
          
    // Então verificamos se o arquivo foi carregado corretamente
    if ($handle->uploaded) 
	{       
        
   // Definimos as configurações desejadas da imagem maior
     if($foto5_p!=""){
       unlink("./img_veiculos/$foto5_p");

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
        $handle->Process('./img_veiculos/');
        
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
       unlink("./img_veiculos/$foto6_p");

    }

}else{
if(isset($_FILES["veiculo_foto6"])){
  //$pasta_dir = "./imagens/";
  
   
    // Instanciamos o objeto Upload
    $handle = new Upload($_FILES['veiculo_foto6']);
          
    // Então verificamos se o arquivo foi carregado corretamente
    if ($handle->uploaded) 
	{       
        
   // Definimos as configurações desejadas da imagem maior
     if($foto6_p!=""){
       unlink("./img_veiculos/$foto6_p");

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
        $handle->Process('./img_veiculos/');
        
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
       unlink("./img_veiculos/$foto7_p");

    }

}else{
if(isset($_FILES["veiculo_foto7"])){
  //$pasta_dir = "./imagens/";
  
   
    // Instanciamos o objeto Upload
    $handle = new Upload($_FILES['veiculo_foto7']);
          
    // Então verificamos se o arquivo foi carregado corretamente
    if ($handle->uploaded) 
	{       
        
   // Definimos as configurações desejadas da imagem maior
     if($foto7_p!=""){
       unlink("./img_veiculos/$foto7_p");

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
        $handle->Process('./img_veiculos/');
        
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
       unlink("./img_veiculos/$foto8_p");

    }

}else{
if(isset($_FILES["veiculo_foto8"])){
  //$pasta_dir = "./imagens/";
  
   
    // Instanciamos o objeto Upload
    $handle = new Upload($_FILES['veiculo_foto8']);
          
    // Então verificamos se o arquivo foi carregado corretamente
    if ($handle->uploaded) 
	{       
        
   // Definimos as configurações desejadas da imagem maior
     if($foto8_p!=""){
       unlink("./img_veiculos/$foto8_p");

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
        $handle->Process('./img_veiculos/');
        
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
       unlink("./img_veiculos/$foto9_p");

    }

}else{
if(isset($_FILES["veiculo_foto9"])){
  //$pasta_dir = "./imagens/";
  
   
    // Instanciamos o objeto Upload
    $handle = new Upload($_FILES['veiculo_foto9']);
          
    // Então verificamos se o arquivo foi carregado corretamente
    if ($handle->uploaded) 
	{       
        
   // Definimos as configurações desejadas da imagem maior
     if($foto9_p!=""){
       unlink("./img_veiculos/$foto9_p");

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
        $handle->Process('./img_veiculos/');
        
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
       unlink("./img_veiculos/$foto10_p");

    }

}else{
if(isset($_FILES["veiculo_foto10"])){
  //$pasta_dir = "./imagens/";
  
   
    // Instanciamos o objeto Upload
    $handle = new Upload($_FILES['veiculo_foto10']);
          
    // Então verificamos se o arquivo foi carregado corretamente
    if ($handle->uploaded) 
	{       
        
   // Definimos as configurações desejadas da imagem maior
     if($foto10_p!=""){
       unlink("./img_veiculos/$foto10_p");

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
        $handle->Process('./img_veiculos/');
        
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
       unlink("./img_veiculos/$foto11_p");

    }

}else{
if(isset($_FILES["veiculo_foto11"])){
  //$pasta_dir = "./imagens/";
  
   
    // Instanciamos o objeto Upload
    $handle = new Upload($_FILES['veiculo_foto11']);
          
    // Então verificamos se o arquivo foi carregado corretamente
    if ($handle->uploaded) 
	{       
        
   // Definimos as configurações desejadas da imagem maior
     if($foto11_p!=""){
       unlink("./img_veiculos/$foto11_p");

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
        $handle->Process('./img_veiculos/');
        
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
       unlink("./img_veiculos/$foto12_p");

    }

}else{
if(isset($_FILES["veiculo_foto12"])){
  //$pasta_dir = "./imagens/";
  
   
    // Instanciamos o objeto Upload
    $handle = new Upload($_FILES['veiculo_foto12']);
          
    // Então verificamos se o arquivo foi carregado corretamente
    if ($handle->uploaded) 
	{       
        
   // Definimos as configurações desejadas da imagem maior
     if($foto12_p!=""){
       unlink("./img_veiculos/$foto12_p");

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
        $handle->Process('./img_veiculos/');
        
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



///////////////////////////////////////////////

} // end imagem ação

/// Falta esta parte  em diante
  $sql = "UPDATE veiculos SET VEICULO_MARCA='$veiculo_marca', VEICULO_MODELO='$veiculo_modelo', VEICULO_ANO_FABRICACAO='$veiculo_ano_fabricacao', VEICULO_ZERO='$veiculo_zero', VEICULO_QUILOMETRAGEM='$veiculo_quilometragem', VEICULO_COR='$veiculo_cor',VEICULO_VERSAO='$veiculo_versao', VEICULO_ANO_MODELO='$veiculo_ano_modelo', VEICULO_COMBUSTIVEL='$veiculo_combustivel', VEICULO_PLACA='$veiculo_placa', VEICULO_N_PORTAS='$veiculo_n_portas', VEICULO_ABS='$veiculo_abs',VEICULO_AIRBAG='$veiculo_airbag', VEICULO_ALARME='$veiculo_alarme', VEICULO_AR_CONDICIONADO='$veiculo_ar_condicionado',VEICULO_BANCO_COURO='$veiculo_banco_couro',VEICULO_CAMBIO_AUTOMATICO='$veiculo_cambio_automatico',VEICULO_CONJUNTO_ELETRICO='$veiculo_conjunto_eletrico', VEICULO_CAMBIO_AUT_SEQ='$veiculo_cambio_aut_seq', VEICULO_DIRECAO_ELETRICA='$veiculo_direcao_eletrica', VEICULO_CAMBIO_MECANICO='$veiculo_cambio_mecanico', VEICULO_DIRECAO_HIDRAULICA='$veiculo_direcao_hidraulica',VEICULO_PELICULA='$veiculo_pelicula', VEICULO_RODAS_LIGA_LEVE='$veiculo_rodas_liga_leve', VEICULO_TETO_SOLAR='$veiculo_teto_solar',VEICULO_VIDRO_ELETRICO='$veiculo_vidro_eletrico', VEICULO_TRAVA_ELETRICA='$veiculo_trava_eletrica', VEICULO_OBS='$veiculo_obs',VEICULO_VALOR='$veiculo_valor', VEICULO_FOTO1='$arquivo1_nome' , VEICULO_FOTO2='$arquivo2_nome' , VEICULO_FOTO3='$arquivo3_nome' , VEICULO_FOTO4='$arquivo4_nome' , VEICULO_FOTO5='$arquivo5_nome' , VEICULO_FOTO6='$arquivo6_nome' , VEICULO_FOTO7='$arquivo7_nome' , VEICULO_FOTO8='$arquivo8_nome' , VEICULO_FOTO9='$arquivo9_nome' , VEICULO_FOTO10='$arquivo10_nome' , VEICULO_FOTO11='$arquivo11_nome' , VEICULO_FOTO12='$arquivo12_nome' WHERE ID_VEICULO='$id_veiculo'";
   
}else{


if ($_POST['acao'] == 'imagem') 
{
if(isset($_FILES["veiculo_foto1"])){
  //$pasta_dir = "./imagens/";
 
   
    // Instanciamos o objeto Upload
    $handle = new Upload($_FILES['veiculo_foto1']);
          
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
        $handle->Process('./img_veiculos/');
        
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



if(isset($_FILES["veiculo_foto2"])){
  //$pasta_dir = "./imagens/";
 
   
    // Instanciamos o objeto Upload
    $handle = new Upload($_FILES['veiculo_foto2']);
          
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
        $handle->Process('./img_veiculos/');
        
        // Excluimos os arquivos temporarios
        $handle-> Clean();

    } 
	else 
	{
       $arquivo2_nome="";
	    // Em caso de erro listamos o erro abaixo
        
    } 
	
 }
 if(isset($_FILES["veiculo_foto3"])){
  //$pasta_dir = "./imagens/";
 
   
    // Instanciamos o objeto Upload
    $handle = new Upload($_FILES['veiculo_foto3']);
          
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
        $handle->Process('./img_veiculos/');
        
        // Excluimos os arquivos temporarios
        $handle-> Clean();

    } 
	else 
	{
       $arquivo3_nome="";
	    // Em caso de erro listamos o erro abaixo
        
    } 
	
 }
 if(isset($_FILES["veiculo_foto4"])){
  //$pasta_dir = "./imagens/";
 
   
    // Instanciamos o objeto Upload
    $handle = new Upload($_FILES['veiculo_foto4']);
          
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
        $handle->Process('./img_veiculos/');
        
        // Excluimos os arquivos temporarios
        $handle-> Clean();

    } 
	else 
	{
       $arquivo4_nome="";
	    // Em caso de erro listamos o erro abaixo
        
    } 
	
 }
 if(isset($_FILES["veiculo_foto5"])){
  //$pasta_dir = "./imagens/";
 
   
    // Instanciamos o objeto Upload
    $handle = new Upload($_FILES['veiculo_foto5']);
          
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
        $handle->Process('./img_veiculos/');
        
        // Excluimos os arquivos temporarios
        $handle-> Clean();

    } 
	else 
	{
       $arquivo5_nome="";
	    // Em caso de erro listamos o erro abaixo
        
    } 
	
 }
 if(isset($_FILES["veiculo_foto6"])){
  //$pasta_dir = "./imagens/";
 
   
    // Instanciamos o objeto Upload
    $handle = new Upload($_FILES['veiculo_foto6']);
          
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
        $handle->Process('./img_veiculos/');
        
        // Excluimos os arquivos temporarios
        $handle-> Clean();

    } 
	else 
	{
       $arquivo6_nome="";
	    // Em caso de erro listamos o erro abaixo
        
    } 
	
 }
 if(isset($_FILES["veiculo_foto7"])){
  //$pasta_dir = "./imagens/";
 
   
    // Instanciamos o objeto Upload
    $handle = new Upload($_FILES['veiculo_foto7']);
          
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
        $handle->Process('./img_veiculos/');
        
        // Excluimos os arquivos temporarios
        $handle-> Clean();

    } 
	else 
	{
       $arquivo7_nome="";
	    // Em caso de erro listamos o erro abaixo
        
    } 
	
 }
 if(isset($_FILES["veiculo_foto8"])){
  //$pasta_dir = "./imagens/";
 
   
    // Instanciamos o objeto Upload
    $handle = new Upload($_FILES['veiculo_foto8']);
          
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
        $handle->Process('./img_veiculos/');
        
        // Excluimos os arquivos temporarios
        $handle-> Clean();

    } 
	else 
	{
       $arquivo8_nome="";
	    // Em caso de erro listamos o erro abaixo
        
    } 
	
 }
 if(isset($_FILES["veiculo_foto9"])){
  //$pasta_dir = "./imagens/";
 
   
    // Instanciamos o objeto Upload
    $handle = new Upload($_FILES['veiculo_foto9']);
          
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
        $handle->Process('./img_veiculos/');
        
        // Excluimos os arquivos temporarios
        $handle-> Clean();

    } 
	else 
	{
       $arquivo9_nome="";
	    // Em caso de erro listamos o erro abaixo
        
    } 
	
 }
 if(isset($_FILES["veiculo_foto10"])){
  //$pasta_dir = "./imagens/";
 
   
    // Instanciamos o objeto Upload
    $handle = new Upload($_FILES['veiculo_foto10']);
          
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
        $handle->Process('./img_veiculos/');
        
        // Excluimos os arquivos temporarios
        $handle-> Clean();

    } 
	else 
	{
       $arquivo10_nome="";
	    // Em caso de erro listamos o erro abaixo
        
    } 
	
 }
 
if(isset($_FILES["veiculo_foto11"])){
  //$pasta_dir = "./imagens/";
 
   
    // Instanciamos o objeto Upload
    $handle = new Upload($_FILES['veiculo_foto11']);
          
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
        $handle->Process('./img_veiculos/');
        
        // Excluimos os arquivos temporarios
        $handle-> Clean();

    } 
	else 
	{
       $arquivo11_nome="";
	    // Em caso de erro listamos o erro abaixo
        
    } 
	
 }
 if(isset($_FILES["veiculo_foto12"])){
  //$pasta_dir = "./imagens/";
 
   
    // Instanciamos o objeto Upload
    $handle = new Upload($_FILES['veiculo_foto12']);
          
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
        $handle->Process('./img_veiculos/');
        
        // Excluimos os arquivos temporarios
        $handle-> Clean();

    } 
	else 
	{
       $arquivo12_nome="";
	    // Em caso de erro listamos o erro abaixo
        
    } 
	
 }
 
//////////////////////////////

} // end imagem ação


$sql = "INSERT INTO veiculos (VEICULO_MARCA,VEICULO_MODELO,VEICULO_ANO_FABRICACAO,VEICULO_ZERO,VEICULO_QUILOMETRAGEM,VEICULO_COR,VEICULO_VERSAO,VEICULO_ANO_MODELO,VEICULO_COMBUSTIVEL,VEICULO_PLACA,VEICULO_N_PORTAS,VEICULO_ABS,VEICULO_AIRBAG,VEICULO_ALARME,VEICULO_AR_CONDICIONADO,VEICULO_BANCO_COURO,VEICULO_CAMBIO_AUTOMATICO,VEICULO_CONJUNTO_ELETRICO,VEICULO_CAMBIO_AUT_SEQ,VEICULO_DIRECAO_ELETRICA,VEICULO_CAMBIO_MECANICO,VEICULO_DIRECAO_HIDRAULICA,VEICULO_PELICULA,VEICULO_RODAS_LIGA_LEVE,VEICULO_TETO_SOLAR,VEICULO_VIDRO_ELETRICO,VEICULO_TRAVA_ELETRICA,VEICULO_OBS,VEICULO_VALOR,VEICULO_FOTO1,VEICULO_FOTO2,VEICULO_FOTO3,VEICULO_FOTO4,VEICULO_FOTO5,VEICULO_FOTO6,VEICULO_FOTO7,VEICULO_FOTO8,VEICULO_FOTO9,VEICULO_FOTO10,VEICULO_FOTO11,VEICULO_FOTO12) VALUES ('".$veiculo_marca."','".$veiculo_modelo."','".$veiculo_ano_fabricacao."','".$veiculo_zero."','".$veiculo_quilometragem."','".$veiculo_cor."','".$veiculo_versao."','".$veiculo_ano_modelo."','".$veiculo_combustivel."','".$veiculo_placa."','".$veiculo_n_portas."','".$veiculo_abs."','".$veiculo_airbag."','".$veiculo_alarme."','".$veiculo_ar_condicionado."','".$veiculo_banco_couro."','".$veiculo_cambio_automatico."','".$veiculo_conjunto_eletrico."','".$veiculo_cambio_aut_seq."','".$veiculo_direcao_eletrica."','".$veiculo_cambio_mecanico."','".$veiculo_direcao_hidraulica."','".$veiculo_pelicula."','".$veiculo_rodas_liga_leve."','".$veiculo_teto_solar."','".$veiculo_vidro_eletrico."','".$veiculo_trava_eletrica."','".$veiculo_obs."','".$veiculo_valor."','".$arquivo1_nome."','".$arquivo2_nome."','".$arquivo3_nome."','".$arquivo4_nome."','".$arquivo5_nome."','".$arquivo6_nome."','".$arquivo7_nome."','".$arquivo8_nome."','".$arquivo9_nome."','".$arquivo10_nome."','".$arquivo11_nome."','".$arquivo12_nome."')";

}   
If(!$resultado = mysql_query($sql)) $contadora++;
         
   If($resultado)
   {
      echo"Este Veículo foi salvo com sucesso!";//header("Location: receitas_list.php");//echo"<br>ok<br>"; //  
   }
   Else
   {
      echo"Não foi salvo este Veículo!";
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
