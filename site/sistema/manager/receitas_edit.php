<? include_once("struct/struct_top.php")?>
<?php
include_once("fckeditor/fckeditor.php");

?>
<?

//include_once('../classes/class.configuracao.php');
//include_once('../classes/class.palestrantes.php');
//include_once('../classes/service.palestrantes.php');

//$Receitas = new Receitas();
$id_receitas=$_REQUEST["id"];
?>

 <?php

include ("conexao_teste.php");

//Consulta com a tabela
//Selecione tudo de nomedatabela em ordem crescente pelo nome 
$consulta=mysql_query("SELECT * FROM receitas WHERE ID_RECEITAS='$id_receitas'"); 

?>
  <?
//Fazendo o looping para exibição de todos registros que contiverem em nomedatabela
while ($dados = mysql_fetch_array($consulta)) {
$id_palestrantes=$dados['id_receitas'];
$nome_receitas=$dados['nome_receitas'];
$receita_receitas=$dados['receita_receitas'];
$foto1_receitas=$dados['foto1_receitas'];
$foto2_receitas=$dados['foto2_receitas'];
$foto3_receitas=$dados['foto3_receitas'];
$foto4_receitas=$dados['foto4_receitas'];
$foto5_receitas=$dados['foto5_receitas'];
$foto6_receitas=$dados['foto6_receitas'];


}

?>



<div class="structTitle">Editar Receitas </div>

<div style="padding-top:8px;"></div>

<form action="receitas_edit_xp.php" method="POST" class="form.nospace" onsubmit="return validateForm(this)" enctype="multipart/form-data">

<input type="hidden" name="usua_id" value="<?= $_SESSION["usuario"]->getID() ?>">
<!--input type="hidden" name="orga_id" value="<?= $orga_id ?>"-->
<!--input type="hidden" name="even_id" value="<?= $even_id ?>"-->
<table border="0" cellpadding="0" cellspacing="0" width="100%">
<tr>
	<td width="50%" valign="top">
		<table width="1036" border="0" cellpadding="2" cellspacing="2">
		<tr>
			<td width="16%" class="structFilter">Titulo Receita :</td>
			<td width="84%" class="structFilter">
			<input type="hidden" class="structFilterBox" name="id_receitas"  value="<?= $id_receitas?>" size="50" maxlength="200">
			<input type="edit" class="structFilterBox" name="nome_receitas"  value="<?= $nome_receitas?>" size="50" maxlength="200"></td>
		</tr>		
		
		<tr>
			<td class="structFilter">Receita: </td>
			<td class="structFilter">
			  
			  <?php
                $oFCKeditor = new FCKeditor('receita_receitas') ;
                $oFCKeditor->BasePath = 'fckeditor/' ;
                $oFCKeditor->Value = $receita_receitas;
                $oFCKeditor->Create() ;
              ?>			</td>
		</tr>
		<tr>
			<td class="structFilter">Visualiza&ccedil;&atilde;o das Fotos  : </td>
			<td class="structFilter">			</td>
		</tr>
		<tr>
			<td colspan="2" class="structFilter"> ____________________________________________________________________________________________________________   </td>
		  </tr>
		<tr>
			<td class="structFilter">1&deg; Foto : </td>
			<td class="structFilter">
			  <input type="file" class="structFilterBox" name="foto1_receitas" value="<?= $foto1_receitas?>"   size="42"> <? 
			    if($foto1_receitas!=""){
			     echo"<img src='imagens_r/$foto1_receitas' width='100'>";
				  echo"<input name='fotoa'type='checkbox' value='1' />
			  (Marque aqui caso queira excluir a imagem e logo ap&oacute;s clique em salvar.)";	
				} ?></td>
		</tr>
		<tr>
			<td colspan="2" class="structFilter"> ____________________________________________________________________________________________________________   </td>
		  </tr>
		<tr>
			<td class="structFilter">2&deg; Foto : </td>
			<td class="structFilter">
			  <input type="file" class="structFilterBox" name="foto2_receitas" value="<?= $foto2_receitas?>"   size="42"><?
				if($foto2_receitas!=""){
				 echo"<img src='imagens_r/$foto2_receitas' width='100'>";
				  echo"<input name='fotob'type='checkbox' value='1' />
			  (Marque aqui caso queira excluir a imagem e logo ap&oacute;s clique em salvar.)";	
				}?></td>
		</tr>
		<tr>
			<td colspan="2" class="structFilter"> ____________________________________________________________________________________________________________   </td>
		  </tr>
		<tr>
			<td class="structFilter">3&deg; Foto : </td>
			<td class="structFilter">
			  <input type="file" class="structFilterBox" name="foto3_receitas" value="<?= $foto3_receitas?>"   size="42"><?
				if($foto3_receitas!=""){
				 echo"<img src='imagens_r/$foto3_receitas' width='100'>";
				  echo"<input name='fotoc'type='checkbox' value='1' />
			  (Marque aqui caso queira excluir a imagem e logo ap&oacute;s clique em salvar.)";	
				} ?></td>
		</tr>
		<tr>
			<td colspan="2" class="structFilter"> ____________________________________________________________________________________________________________   </td>
		  </tr>
		<tr>
			<td class="structFilter">4&deg; Foto : </td>
			<td class="structFilter">
			 <input type="file" class="structFilterBox" name="foto4_receitas" value="<?= $foto4_receitas?>"   size="42"><?
				if($foto4_receitas!=""){ 
				 echo"<img src='imagens_r/$foto4_receitas' width='100'>";
				  echo"<input name='fotod'type='checkbox' value='1' />
			  (Marque aqui caso queira excluir a imagem e logo ap&oacute;s clique em salvar.)";	
				} ?></td>
		</tr>
		<tr>
			<td colspan="2" class="structFilter"> ____________________________________________________________________________________________________________   </td>
		  </tr>
		<tr>
			<td class="structFilter">5&deg; Foto : </td>
			<td class="structFilter">
			<input type="file" class="structFilterBox" name="foto5_receitas" value="<?= $foto5_receitas?>"   size="42"> <?
				if($foto5_receitas!=""){ 
				 echo"<img src='imagens_r/$foto5_receitas' width='100'>";
				  echo"<input name='fotoe'type='checkbox' value='1' />
			  (Marque aqui caso queira excluir a imagem e logo ap&oacute;s clique em salvar.)";	
				} ?></td>
		</tr>
		<tr>
			<td colspan="2" class="structFilter"> ____________________________________________________________________________________________________________   </td>
		  </tr>
		<tr>
			<td class="structFilter">6&deg; Foto : </td>
			<td class="structFilter">
			  <input type="file" class="structFilterBox" name="foto6_receitas" value="<?= $foto6_receitas?>"   size="42"><?
				if($foto6_receitas!=""){ 
				 echo"<img src='imagens_r/$foto6_receitas' width='100'>"; 
				  echo"<input name='fotof'type='checkbox' value='1' />
			  (Marque aqui caso queira excluir a imagem e logo ap&oacute;s clique em salvar.)";	
                }			  
			  ?>	
			   <input type="hidden" name="acao" value="imagem" />			</td>
		</tr>
		<tr>
			<td colspan="2" class="structFilter"> ____________________________________________________________________________________________________________   </td>
		  </tr>
		<tr>
			<td class="structFilter">&nbsp;&nbsp;&nbsp;</td>
			<td class="structFilter"><input type="submit" class="structFilterButton" value="Salvar"></td>
		</tr>
		</table>
	</td>
</tr>

</table>
</form>
<? /* } else { ?>
	Erro: não foi informada a organização.
	
<? }*/ ?>
<? include_once("struct/struct_bottom.php")?>