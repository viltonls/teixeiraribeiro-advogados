<? include_once("struct/struct_top.php")?>
<? include_once("struct/auth.php")?>

<?php
// Aqui incluimos a classe upload
include ("conexao_teste.php");
include('class.upload.php');

$excluir=$_REQUEST["excluir"];
$id_clientes=$_REQUEST["id_clientes"];
$clientes_nome=$_REQUEST["clientes_nome"];
$clientes_estado=$_REQUEST["clientes_estado"];
$clientes_produto=$_REQUEST["clientes_produto"];
$clientes_ordem=$_REQUEST["clientes_ordem"];


$clientes_logo=$_FILES["clientes_logo"]; 
$fotoa=$_REQUEST["fotoa"];

// Verificamos se a acao é igual a imagem
if ($id_clientes!=""){
$id_p = $id_clientes;
$consulta=mysql_query("SELECT * FROM clientes where id_clientes='$id_p'"); 

//Fazendo o looping para exibição de todos registros que contiverem em nomedatabela
while ($dados = mysql_fetch_array($consulta)) {


$foto1_p=$dados['clientes_logo'];


}

if ($_POST['acao'] == 'imagem') 
{
if($fotoa=="1"){

   $arquivo1_nome="";
   if($foto1_p!=""){
       unlink("img_clientes/$foto1_p");

    }

}else{
if(isset($_FILES["clientes_logo"])){
  //$pasta_dir = "./imagens/";
  
   
    // Instanciamos o objeto Upload
    $handle = new Upload($_FILES['clientes_logo']);
          
    // Então verificamos se o arquivo foi carregado corretamente
    if ($handle->uploaded) 
	{       
        
   // Definimos as configurações desejadas da imagem maior
     if($foto1_p!=""){
       unlink("img_clientes/$foto1_p");

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
        $handle->Process('img_clientes/');
        
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


  $sql = "UPDATE clientes SET CLIENTES_NOME='$clientes_nome', CLIENTES_ESTADO='$clientes_estado', CLIENTES_PRODUTO='$clientes_produto', CLIENTES_ORDEM='$clientes_ordem',CLIENTES_LOGO='$arquivo1_nome' WHERE ID_CLIENTES='$id_clientes'";
   
}else{


if ($_POST['acao'] == 'imagem') 
{
if(isset($_FILES["clientes_logo"])){
  //$pasta_dir = "./imagens/";
 
   
    // Instanciamos o objeto Upload
    $handle = new Upload($_FILES['clientes_logo']);
          
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
        $handle->Process('img_clientes/');
        
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

   $sql = "INSERT INTO clientes (CLIENTES_NOME,CLIENTES_ESTADO,CLIENTES_PRODUTO,CLIENTES_ORDEM,CLIENTES_LOGO) VALUES ('".$clientes_nome."','".$clientes_estado."','".$clientes_produto."','".$clientes_ordem."','".$arquivo1_nome."')";

}   
If(!$resultado = mysql_query($sql)) $contadora++;
         
   If($resultado)
   {
      echo"Este Cliente foi salvo com sucesso!";//header("Location: receitas_list.php");//echo"<br>ok<br>"; //  
   }
   Else
   {
      echo"Não foi salvo este cliente!";
	  //echo"<br>Not<br>";//header("Location: produtos_edit.php");
   }
//echo '<p><a href="indexx.html">Voltar</a></p>';
// Aqui somente recupero o nome da imagem caso queira fazer um insert em banco de dados
$nome_da_imagem = $handle->file_dst_name;
header("Location: clientes_edit.php");
//echo $nome_da_imagem;
///echo"$foto1_produtos";
?> 
</body>

</html>
