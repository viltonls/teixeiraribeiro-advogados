<? include_once("struct/struct_top.php")?>
<? include_once("struct/auth.php")?>

<?php
// Aqui incluimos a classe upload
include ("conexao_teste.php");
include('class.upload.php');

$excluir=$_REQUEST["excluir"];
$id_cases=$_REQUEST["id_cases"];
$cases_titulo=$_REQUEST["cases_titulo"];
$cases_data=$_REQUEST["cases_data"];

$cases_corpo=$_REQUEST["cases_corpo"];


$cases_foto=$_FILES["cases_foto"]; 
$fotoa=$_REQUEST["fotoa"];

// Verificamos se a acao é igual a imagem
if ($id_cases!=""){
$id_p = $id_cases;
$consulta=mysql_query("SELECT * FROM cases where id_cases='$id_p'"); 

//Fazendo o looping para exibição de todos registros que contiverem em nomedatabela
while ($dados = mysql_fetch_array($consulta)) {


$foto1_p=$dados['cases_foto'];


}

if ($_POST['acao'] == 'imagem') 
{
if($fotoa=="1"){

   $arquivo1_nome="";
   if($foto1_p!=""){
       unlink("img_cases/$foto1_p");

    }

}else{
if(isset($_FILES["cases_foto"])){
  //$pasta_dir = "./imagens/";
  
   
    // Instanciamos o objeto Upload
    $handle = new Upload($_FILES['cases_foto']);
          
    // Então verificamos se o arquivo foi carregado corretamente
    if ($handle->uploaded) 
	{       
        
   // Definimos as configurações desejadas da imagem maior
     if($foto1_p!=""){
       unlink("img_cases/$foto1_p");

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
        $handle->Process('img_cases/');
        
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


  $sql = "UPDATE cases SET CASES_TITULO='$cases_titulo', CASES_DATA='$cases_data', CASES_CORPO='$cases_corpo',CASES_FOTO='$arquivo1_nome' WHERE ID_CASES='$id_cases'";
   
}else{


if ($_POST['acao'] == 'imagem') 
{
if(isset($_FILES["cases_foto"])){
  //$pasta_dir = "./imagens/";
 
   
    // Instanciamos o objeto Upload
    $handle = new Upload($_FILES['cases_foto']);
          
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
        $handle->Process('img_cases/');
        
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

   $sql = "INSERT INTO cases (CASES_TITULO,CASES_DATA,CASES_CORPO,CASES_FOTO) VALUES ('".$cases_titulo."','".$cases_data."','".$cases_corpo."','".$arquivo1_nome."')";

}   
If(!$resultado = mysql_query($sql)) $contadora++;
         
   If($resultado)
   {
      echo"Este case foi salvo com sucesso!";//header("Location: receitas_list.php");//echo"<br>ok<br>"; //  
   }
   Else
   {
      echo"Não foi salvo este case!";
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
