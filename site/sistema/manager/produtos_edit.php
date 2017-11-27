<? include_once("struct/struct_top.php")?>
<?php
include_once("fckeditor/fckeditor.php");

?>
<?

//include_once('../classes/class.configuracao.php');
//include_once('../classes/class.palestrantes.php');
//include_once('../classes/service.palestrantes.php');

//$Palestrantes = new Palestrantes();
$id_produtos=$_REQUEST["id"];
?>

 <?php

include ("conexao_teste.php");

//Consulta com a tabela
//Selecione tudo de nomedatabela em ordem crescente pelo nome 
$consulta=mysql_query("SELECT * FROM produtos WHERE ID_PRODUTOS='$id_produtos'"); 

?>
  <?
//Fazendo o looping para exibição de todos registros que contiverem em nomedatabela
while ($dados = mysql_fetch_array($consulta)) {
$id_produtos=$dados['id_produtos'];
$nome_produtos=$dados['nome_produtos'];
$categoria_produtos=$dados['categoria_produtos'];
$descricao_produtos=$dados['descricao_produtos'];

$foto1_produtos=$dados['foto1_produtos'];
$foto2_produtos=$dados['foto2_produtos'];
$foto3_produtos=$dados['foto3_produtos'];
$foto4_produtos=$dados['foto4_produtos'];
$foto5_produtos=$dados['foto5_produtos'];
$foto6_produtos=$dados['foto6_produtos'];
}

?>



<div class="structTitle">Editar Produtos </div>

<div style="padding-top:8px;"></div>

<form action="produtos_edit_xp.php" method="POST" class="form.nospace" onsubmit="return validateForm(this)" enctype="multipart/form-data">

<input type="hidden" name="usua_id" value="<?= $_SESSION["usuario"]->getID() ?>">
<!--input type="hidden" name="orga_id" value="<?= $orga_id ?>"-->
<!--input type="hidden" name="even_id" value="<?= $even_id ?>"-->
<table border="0" cellpadding="0" cellspacing="0" width="100%">
<tr>
	<td width="50%" valign="top">
		<table width="1028" border="0" cellpadding="2" cellspacing="2">
		<tr>
			<td width="16%" class="structFilter">Nome do Produto  :</td>
			<td width="84%" class="structFilter">
			<input type="hidden" class="structFilterBox" name="id_produtos"  value="<?= $id_produtos?>" size="50" maxlength="200">
			<input type="edit" class="structFilterBox" name="nome_produtos"  value="<?= $nome_produtos?>" size="50" maxlength="200"></td>
		</tr>		
		<tr>
			<td class="structFilter">Categoria : </td>
			<td class="structFilter">
		<select  name="categoria_produtos" class="structFilterBox">
		             <option value="<?= $categoria_produtos;?>"><?= $categoria_produtos;?></option>
					 <option></option>
					<option value="Peixes: filés, postas, eviscerados"> Peixes: filés, postas, eviscerados</option>
					<option value="Frutos do Mar"> Frutos do Mar</option>
				</select>			 		</td>
		</tr>
		<tr>
			<td class="structFilter">Descri&ccedil;&atilde;o do Produto : </td>
			<td class="structFilter">
			  
			  <?php
                $oFCKeditor = new FCKeditor('descricao_produtos') ;
                $oFCKeditor->BasePath = 'fckeditor/' ;
                $oFCKeditor->Value = $descricao_produtos;
                $oFCKeditor->Create() ;
              ?>			</td>
		</tr>
		<tr>
			<td colspan="2" class="structFilter"> ____________________________________________________________________________________________________________   </td>
		  </tr>
		<tr>
			<td class="structFilter">1&deg; Foto : </td>
			<td class="structFilter"><input type="file" class="structFilterBox" name="foto1_produtos" value="<?= $foto1_produtos?>"   size="42">
			  <? 
			    if($foto1_produtos!=""){
			     echo"<img src='imagens/$foto1_produtos' width='100'>";
				 echo"<input name='fotoa'type='checkbox' value='1' />
			  (Marque aqui caso queira excluir a imagem e logo ap&oacute;s clique em salvar.)";	
				} ?>
			  	    </td>
		</tr>
		<tr>
			<td colspan="2" class="structFilter"> ____________________________________________________________________________________________________________   </td>
		  </tr>
		<tr>
			<td class="structFilter">2&deg; Foto : </td>
			<td class="structFilter"><input type="file" class="structFilterBox" name="foto2_produtos" value="<?= $foto2_produtos?>"   size="42">
			  <?
				if($foto2_produtos!=""){
				 echo"<img src='imagens/$foto2_produtos' width='100'>";
				 echo"<input name='fotob'type='checkbox' value='1' />
			  (Marque aqui caso queira excluir a imagem e logo ap&oacute;s clique em salvar.)";
				} ?>
			  </td>
		</tr>
		<tr>
			<td colspan="2" class="structFilter"> ____________________________________________________________________________________________________________   </td>
		  </tr>
		<tr>
			<td class="structFilter">3&deg; Foto : </td>
			<td class="structFilter">
		    <input type="file" class="structFilterBox" name="foto3_produtos" value="<?= $foto3_produtos?>"   size="42">
			<?
				if($foto3_produtos!=""){
				 echo"<img src='imagens/$foto3_produtos' width='100'>";
				 echo"<input name='fotoc'type='checkbox' value='1' />
			  (Marque aqui caso queira excluir a imagem e logo ap&oacute;s clique em salvar.)";
				} ?>
				 </td>
		</tr>
		<tr>
			<td colspan="2" class="structFilter"> ____________________________________________________________________________________________________________   </td>
		  </tr>
		<tr>
			<td class="structFilter">4&deg; Foto : </td>
			<td class="structFilter">
			 <input type="file" class="structFilterBox" name="foto4_produtos" value="<?= $foto4_produtos?>"   size="42">
			 <?
				if($foto4_produtos!=""){ 
				 echo"<img src='imagens/$foto4_produtos' width='100'>";
				 echo"<input name='fotod'type='checkbox' value='1' />
			  (Marque aqui caso queira excluir a imagem e logo ap&oacute;s clique em salvar.)";
				} ?>
				
				 </td>
		</tr>
		<tr>
			<td colspan="2" class="structFilter"> ____________________________________________________________________________________________________________   </td>
		  </tr>
		<tr>
			<td class="structFilter">5&deg; Foto : </td>
			<td class="structFilter">
			  <input type="file" class="structFilterBox" name="foto5_produtos" value="<?= $foto5_produtos?>"   size="42">
			  <?
				if($foto5_produtos!=""){ 
				 echo"<img src='imagens/$foto5_produtos' width='100'>";
				 echo"<input name='fotoe'type='checkbox' value='1' />
			  (Marque aqui caso queira excluir a imagem e logo ap&oacute;s clique em salvar.)";
				} ?>
				 </td>
		</tr>
		<tr>
			<td colspan="2" class="structFilter"> ____________________________________________________________________________________________________________   </td>
		  </tr>
		<tr>
			<td class="structFilter">6&deg; Foto : </td>
			<td class="structFilter">
			  <input type="file" class="structFilterBox" name="foto6_produtos" value="<?= $foto6_produtos?>"   size="42">
			  <?
				if($foto6_produtos!=""){ 
				 echo"<img src='imagens/$foto6_produtos' width='100'>";
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