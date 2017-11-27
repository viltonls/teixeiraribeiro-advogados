<? include_once("struct/struct_top.php")?>
<? include_once("struct/auth.php")?>

<?php
// Aqui incluimos a classe upload
include ("conexao_teste.php");
include('class.upload.php');

$id_fot1=$_REQUEST["id_fot1"];




// Verificamos se a acao é igual a imagem

$id_p = $id_fot1;
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
 
$arquivo2_nome=$foto2_p;
$arquivo3_nome=$foto3_p;
$arquivo4_nome=$foto4_p;
$arquivo5_nome=$foto5_p;
$arquivo6_nome=$foto6_p;


if($id_p!=""){

echo"$id_p<p>";

if($id_fot1){
  echo"$arquivo1_nome<p>";
  echo"este";
  
 if($foto1_p!=""){
       
	   unlink("./imagens/$foto1_p");

 }

}else{
 
  $arquivo1_nome=$foto1_p;

}

if($id_fot2!=""){

   $arquivo2_nome="";
   if($foto2_p!=""){
       unlink("./imagens/$foto2_p");

     }

}

if($id_fot3!=""){

   $arquivo3_nome="";
   if($foto3_p!=""){
       unlink("./imagens/$foto3_p");

     }

}

if($id_fot4!=""){

   $arquivo4_nome="";
   if($foto4_p!=""){
       unlink("./imagens/$foto4_p");

     }

}

if($id_fot5!=""){

   $arquivo5_nome="";
   if($foto5_p!=""){
       unlink("./imagens/$foto5_p");

     }

}

if($id_fot6!=""){

   $arquivo6_nome="";
   if($foto6_p!=""){
       unlink("./imagens/$foto6_p");

     }

}



 $sql = "UPDATE produtos SET NOME_PRODUTOS='$nome_produtos', CATEGORIA_PRODUTOS='$categoria_produtos', DESCRICAO_PRODUTOS='$descricao_produtos',FOTO1_PRODUTOS='',FOTO2_PRODUTOS='$arquivo2_nome',FOTO3_PRODUTOS='$arquivo3_nome',FOTO4_PRODUTOS='$arquivo4_nome',FOTO5_PRODUTOS='$arquivo5_nome',FOTO6_PRODUTOS='$arquivo6_nome' WHERE ID_PRODUTOS='$id_p'";
   
}
?> 
</body>

</html>
