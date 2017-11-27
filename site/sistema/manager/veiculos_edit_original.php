<? include_once("struct/struct_top.php")?>
<?php
include_once("fckeditor/fckeditor.php");

?>
<?

//include_once('../classes/class.configuracao.php');
//include_once('../classes/class.palestrantes.php');
//include_once('../classes/service.palestrantes.php');

//$Palestrantes = new Palestrantes();
$id_veiculo=$_REQUEST["id"];
?>

 <?php

include ("conexao_teste.php");

//Consulta com a tabela
//Selecione tudo de nomedatabela em ordem crescente pelo nome 
$consulta=mysql_query("SELECT * FROM veiculos WHERE ID_VEICULO='$id_veiculo'"); 

?>
  <?
//Fazendo o looping para exibição de todos registros que contiverem em nomedatabela
while ($dados = mysql_fetch_array($consulta)) {
$id_veiculo=$dados['id_veiculo'];
$veiculo_marca=$dados['veiculo_marca'];
$veiculo_modelo=$dados['veiculo_modelo'];
$veiculo_ano_fabricacao=$dados['veiculo_ano_fabricacao'];
$veiculo_zero=$dados['veiculo_zero'];
$veiculo_quilometragem=$dados['veiculo_quilometragem'];
$veiculo_cor=$dados['veiculo_cor'];
$veiculo_versao=$dados['veiculo_versao'];
$veiculo_ano_modelo=$dados['veiculo_ano_modelo'];
$veiculo_combustivel=$dados['veiculo_combustivel'];
$veiculo_placa=$dados['veiculo_placa'];
$veiculo_n_portas=$dados['veiculo_n_portas'];
$veiculo_abs=$dados['veiculo_abs'];
$veiculo_airbag=$dados['veiculo_airbag'];
$veiculo_alarme=$dados['veiculo_alarme'];
$veiculo_ar_condicionado=$dados['veiculo_ar_condicionado'];
$veiculo_banco_couro=$dados['veiculo_banco_couro'];
$veiculo_cambio_automatico=$dados['veiculo_cambio_automatico'];
$veiculo_conjunto_eletrico=$dados['veiculo_conjunto_eletrico'];
$veiculo_cambio_aut_seq=$dados['veiculo_cambio_aut_seq'];
$veiculo_direcao_eletrica=$dados['veiculo_direcao_eletrica'];
$veiculo_cambio_mecanico=$dados['veiculo_cambio_mecanico'];
$veiculo_direcao_hidraulica=$dados['veiculo_direcao_hidraulica'];
$veiculo_pelicula=$dados['veiculo_pelicula'];
$veiculo_rodas_liga_leve=$dados['veiculo_rodas_liga_leve'];
$veiculo_teto_solar=$dados['veiculo_teto_solar'];
$veiculo_vidro_eletrico=$dados['veiculo_vidro_eletrico'];
$veiculo_trava_eletrica=$dados['veiculo_trava_eletrica'];
$veiculo_obs=$dados['veiculo_obs'];
$veiculo_valor=$dados['veiculo_valor'];

$veiculo_foto1=$dados['veiculo_foto1'];
$veiculo_foto2=$dados['veiculo_foto2'];
$veiculo_foto3=$dados['veiculo_foto3'];
$veiculo_foto4=$dados['veiculo_foto4'];
$veiculo_foto5=$dados['veiculo_foto5'];
$veiculo_foto6=$dados['veiculo_foto6'];
$veiculo_foto7=$dados['veiculo_foto7'];
$veiculo_foto8=$dados['veiculo_foto8'];
$veiculo_foto9=$dados['veiculo_foto9'];
$veiculo_foto10=$dados['veiculo_foto10'];
$veiculo_foto11=$dados['veiculo_foto11'];
$veiculo_foto12=$dados['veiculo_foto12'];
}

?>

<link type="text/css" rel="stylesheet" href="dhtmlgoodies_calendar/dhtmlgoodies_calendar.css?random=20051112" media="screen"></LINK>
	<SCRIPT type="text/javascript" src="dhtmlgoodies_calendar/dhtmlgoodies_calendar.js?random=20060118"></script>
<SCRIPT LANGUAGE="Javascript">
/*
*    Script:    Mascaras em Javascript
*    Autor:    Matheus Biagini de Lima Dias
*    Data:    26/08/2008
*    Obs:    
*/
    /*Função Pai de Mascaras*/
    function Mascara(o,f){
        v_obj=o
        v_fun=f
        setTimeout("execmascara()",1)
    }
    
    /*Função que Executa os objetos*/
    function execmascara(){
        v_obj.value=v_fun(v_obj.value)
    }
    
    /*Função que Determina as expressões regulares dos objetos*/
    function leech(v){
        v=v.replace(/o/gi,"0")
        v=v.replace(/i/gi,"1")
        v=v.replace(/z/gi,"2")
        v=v.replace(/e/gi,"3")
        v=v.replace(/a/gi,"4")
        v=v.replace(/s/gi,"5")
        v=v.replace(/t/gi,"7")
        return v
    }
    
    /*Função que permite apenas numeros*/
    function Integer(v){
        return v.replace(/\D/g,"")
    }
    
    
   
    
    
	</script>

<div class="structTitle">Editar Semi-novos </div>

<div style="padding-top:8px;"></div>

<form action="veiculos_edit_xp.php" method="POST" class="form.nospace" onsubmit="return validateForm(this)" enctype="multipart/form-data">

<input type="hidden" name="usua_id" value="<?= $_SESSION["usuario"]->getID() ?>">
<!--input type="hidden" name="orga_id" value="<?= $orga_id ?>"-->
<!--input type="hidden" name="even_id" value="<?= $even_id ?>"-->
<table border="0" cellpadding="0" cellspacing="0" width="100%">
<tr>
	<td width="50%" valign="top">
		<table width="932" border="0" cellpadding="2" cellspacing="2">
		<tr>
			<td width="14%" class="structFilter">Marca:</td>
			<td width="86%" class="structFilter"><input type="hidden" class="structFilterBox" name="id_veiculo"  value="<?= $id_veiculo?>" size="50" maxlength="200">
		    <input type="edit" class="structFilterBox" name="veiculo_marca"  value="<?= $veiculo_marca?>" size="50" maxlength="200"></td>
		  </tr>
		<tr>
			<td width="14%" class="structFilter">Modelo:</td>
			<td class="structFilter"><input type="edit" class="structFilterBox" name="veiculo_modelo"  value="<?= $veiculo_modelo?>" size="50" maxlength="200"></td>
		  </tr>	
		<tr>
			<td width="14%" class="structFilter">Ano Fabrica&ccedil;&atilde;o :</td>
			<td class="structFilter">
			<?
$data=date("Y");
$menosdat= 1980;
$maisdat = 2020;

if($maisdat <= $data){
$maisdat=$maisdat+1;
$menosdat=$menosdat+1;
}
//echo "$data";
?>
			<select name="veiculo_ano_fabricacao">
			<option value="<?=$veiculo_ano_fabricacao ?>"><?=$veiculo_ano_fabricacao ?></option>
			<option value=""></option>
			<?

  for($i = $menosdat; $i <= $maisdat; $i ++){
   ?> 
   <option value="<?=$i ?>"><?=$i ?></option><?
   
  }
 ?>
 </select>
   </td>
		  </tr>		
		<tr>
			<td class="structFilter">Ve&iacute;culo Zero:</td>
			<td class="structFilter">	
				<label for="sim"><input name="veiculo_zero" type="radio" value="s" id="sim" <?= ($veiculo_zero=="s") ? "checked" : "";?>>
        Sim </label>
        <label for="nao"><input name="veiculo_zero" type="radio" id="nao" value="n"<?= ($veiculo_zero=="n") ? "checked" : "";?>>
        N&atilde;o</label>		</td>
		  </tr>
		<tr>
			<td class="structFilter">Quilometragem:</td>
			<td class="structFilter">
			<input type="edit" class="structFilterBox" name="veiculo_quilometragem"  value="<?= $veiculo_quilometragem?>" size="20" maxlength="20" onKeyDown="Mascara(this,Integer);" onKeyPress="Mascara(this,Integer);" onKeyUp="Mascara(this,Integer);">			</td>
		  </tr>
		<tr>
			<td class="structFilter">Cor:</td>
			<td class="structFilter">
			<input type="edit" class="structFilterBox" name="veiculo_cor"  value="<?= $veiculo_cor?>" size="50" maxlength="200">			</td>
		  </tr>
		<tr>
			<td class="structFilter">Vers&atilde;o:</td>
			<td class="structFilter"><input type="edit" class="structFilterBox" name="veiculo_versao"  value="<?= $veiculo_versao?>" size="50" maxlength="200"></td>
		  </tr>
		  <tr>
			<td class="structFilter">Ano Modelo:</td>
			<td class="structFilter">
			<?
$data=date("Y");
$menosdat= 1980;
$maisdat = 2020;

if($maisdat <= $data){
$maisdat=$maisdat+1;
$menosdat=$menosdat+1;
}
//echo "$data";
?>
			<select name="veiculo_ano_modelo">
			<option value="<?=$veiculo_ano_modelo ?>"><?=$veiculo_ano_modelo ?></option>
			<option value=""></option>
			<?

  for($i = $menosdat; $i <= $maisdat; $i ++){
   ?> 
   <option value="<?=$i ?>"><?=$i ?></option><?
   
  }
 ?>
 </select>
			 
			</td>
		  </tr>
		<tr>
			<td class="structFilter">Combust&iacute;vel:</td>
			<td class="structFilter"><select class="structInputBox" name="veiculo_combustivel">
          <option value="<?=$veiculo_combustivel ?>" selected><?=$veiculo_combustivel ?> </option>
		  <option value="Álcol">Álcol</option>
		  <option value="Álcol/Gás">Álcol/Gás</option>
		  <option value="Bi-combustível">Bi-combustível</option>
          <option value="Gasolina">Gasolina</option>
		  <option value="Gasolina/Gás">Gasolina/Gás</option>
		  <option value="Tri-combustível">Tri-combustível</option>
		  </select>
		  </td>
		</tr>
		  <tr>
			<td class="structFilter">Placa:</td>
			<td class="structFilter">
			<input type="text" class="structFilterBox" value="<?= $veiculo_placa?>" name="veiculo_placa" size="20" maxlength="12">
			</td>
		  </tr>
		  <tr>
			<td class="structFilter">N&uacute;mero de Portas: </td>
			<td class="structFilter">
			<select class="structInputBox" name="veiculo_n_portas">
          <option value="<?=$veiculo_n_portas ?>" selected><?=$veiculo_n_portas ?> </option>
		  <option value="1">1</option>
		  <option value="2">2</option>
		  <option value="3">3</option>
          <option value="4">4</option>
		  <option value="5">5</option>
		  </select>
		  </td>
		  </tr>
		  <tr>
			<td class="structFilter">Acess&oacute;rios: </td>
			<td class="structFilter">
			 <table width="576" height="161">
			  <tr>
			  <td width="182" class="structFilter">
			      <input name="veiculo_abs" type="checkbox" <?= ($veiculo_abs=="1") ? "checked" : "";?>>
			      ABS				</td>
			   <td width="195" class="structFilter"><input name="veiculo_airbag" type="checkbox" <?= ($veiculo_airbag=="1") ? "checked" : "";?>>
			     Airbag</td>
			   <td width="183" class="structFilter"><input name="veiculo_alarme" type="checkbox" <?= ($veiculo_alarme=="1") ? "checked" : "";?>>
Alarme</td>
			  <tr>
			  <tr>
			  <td class="structFilter"><input name="veiculo_ar_condicionado" type="checkbox" <?= ($veiculo_ar_condicionado=="1") ? "checked" : "";?>>
Ar-condicionado</td>
			   <td class="structFilter"><input name="veiculo_banco_couro" type="checkbox" <?= ($veiculo_banco_couro=="1") ? "checked" : "";?>>
Bancos em couro</td>
			   <td class="structFilter"><input name="veiculo_cambio_automatico" type="checkbox" <?= ($veiculo_cambio_automatico=="1") ? "checked" : "";?>>
			     C&acirc;mbio autom&aacute;tico</td>
			  <tr>
			  <tr>
			  <td class="structFilter"><input name="veiculo_conjunto_eletrico" type="checkbox" <?= ($veiculo_conjunto_eletrico=="1") ? "checked" : "";?>>
			    Conjunto el&eacute;trico</td>
			   <td class="structFilter"><input name="veiculo_direcao_hidraulica" type="checkbox" <?= ($veiculo_direcao_hidraulica=="1") ? "checked" : "";?>>
Dire&ccedil;&atilde;o hidr&aacute;ulica</td>
			   <td class="structFilter"><input name="veiculo_pelicula" type="checkbox" <?= ($veiculo_pelicula=="1") ? "checked" : "";?>>
Pel&iacute;cula</td>
			  <tr>
			  <tr>
			  <td class="structFilter"><input name="veiculo_rodas_liga_leve" type="checkbox" <?= ($veiculo_rodas_liga_leve=="1") ? "checked" : "";?>>
			    Rodas de Liga Leve</td>
			   <td class="structFilter"><input name="veiculo_teto_solar" type="checkbox" <?= ($veiculo_teto_solar=="1") ? "checked" : "";?>>
Teto solar</td>
			   <td class="structFilter"><input name="veiculo_trava_eletrica" type="checkbox" <?= ($veiculo_trava_eletrica=="1") ? "checked" : "";?>>
			     Trava el&eacute;trica</td>
			  <tr>
			  <tr>
			  <td class="structFilter"><input name="veiculo_vidro_eletrico" type="checkbox" <?= ($veiculo_vidro_eletrico=="1") ? "checked" : "";?>>
			    Vidro el&eacute;trico</td>
			   <td class="structFilter"><input name="veiculo_cambio_aut_seq" type="checkbox" <?= ($veiculo_cambio_aut_seq=="1") ? "checked" : "";?>>
			     Autom&aacute;tico e Sequencial</td>
			   <td class="structFilter"><input name="veiculo_cambio_mecanico" type="checkbox"  <?= ($veiculo_cambio_mecanico=="1") ? "checked" : "";?>>
			     C&acirc;mbio Mec&acirc;nico</td>
			  <tr>
			</table>
			
			</td>
		  </tr>
		  <tr>
			<td class="structFilter">Valor:</td>
			<td class="structFilter">
			<input type="text" class="structFilterBox" name="veiculo_valor"  value="<?= $veiculo_valor?>" size="20" maxlength="20"onKeyPress="return(currencyFormat(this,'.',',',event))">
			</td>
		  </tr>
		<tr>
			<td class="structFilter">Observa&ccedil;&otilde;es:</td>
			<td class="structFilter"><?php
                $oFCKeditor = new FCKeditor('veiculo_obs') ;
                $oFCKeditor->BasePath = 'fckeditor/' ;
                $oFCKeditor->Value = $veiculo_obs;
                $oFCKeditor->Create() ;
              ?></td>
		  </tr>
		<tr>
			<td colspan="2" class="structFilter"> ____________________________________________________________________________________________________________   </td>
		  </tr>
		  <tr>
			<td height="31" class="structFilter">Foto1 :  </td>
			<td class="structFilter"><input type="file" class="structFilterBox" name="veiculo_foto1" value="<?= $veiculo_foto1?>"   size="42">
		    <? 
			    if($veiculo_foto1!=""){
			     echo"<img src='img_veiculos/$veiculo_foto1' width='100'>";
				 echo"<input name='fotoa'type='checkbox' value='1' />
			  (Marque aqui caso queira excluir a imagem e logo ap&oacute;s clique em salvar.)";	
				} ?>	  	<input type="hidden" name="acao" value="imagem" />    </td>
		  </tr>
		<tr>
			<td colspan="2" class="structFilter"> ____________________________________________________________________________________________________________   </td>
		  </tr>
		  <tr>
			<td height="31" class="structFilter">Foto2 :  </td>
			<td class="structFilter"><input type="file" class="structFilterBox" name="veiculo_foto2" value="<?= $veiculo_foto2?>"   size="42">
		    <? 
			    if($veiculo_foto2!=""){
			     echo"<img src='img_veiculos/$veiculo_foto2' width='100'>";
				 echo"<input name='fotob'type='checkbox' value='1' />
			  (Marque aqui caso queira excluir a imagem e logo ap&oacute;s clique em salvar.)";	
				} ?>	  	    </td>
		  </tr>
		<tr>
			<td colspan="2" class="structFilter"> ____________________________________________________________________________________________________________   </td>
		  </tr>
		  <tr>
			<td height="31" class="structFilter">Foto3 :  </td>
			<td class="structFilter"><input type="file" class="structFilterBox" name="veiculo_foto3" value="<?= $veiculo_foto3?>"   size="42">
		    <? 
			    if($veiculo_foto3!=""){
			     echo"<img src='img_veiculos/$veiculo_foto3' width='100'>";
				 echo"<input name='fotoc'type='checkbox' value='1' />
			  (Marque aqui caso queira excluir a imagem e logo ap&oacute;s clique em salvar.)";	
				} ?>	  	    </td>
		  </tr>
		<tr>
			<td colspan="2" class="structFilter"> ____________________________________________________________________________________________________________   </td>
		  </tr>
		  <tr>
			<td height="31" class="structFilter">Foto4 :  </td>
			<td class="structFilter"><input type="file" class="structFilterBox" name="veiculo_foto4" value="<?= $veiculo_foto4?>"   size="42">
		    <? 
			    if($veiculo_foto4!=""){
			     echo"<img src='img_veiculos/$veiculo_foto4' width='100'>";
				 echo"<input name='fotod'type='checkbox' value='1' />
			  (Marque aqui caso queira excluir a imagem e logo ap&oacute;s clique em salvar.)";	
				} ?>	  	    </td>
		  </tr>
		<tr>
			<td colspan="2" class="structFilter"> ____________________________________________________________________________________________________________   </td>
		  </tr>
		  <tr>
			<td height="31" class="structFilter">Foto5 :  </td>
			<td class="structFilter"><input type="file" class="structFilterBox" name="veiculo_foto5" value="<?= $veiculo_foto5?>"   size="42">
		    <? 
			    if($veiculo_foto5!=""){
			     echo"<img src='img_veiculos/$veiculo_foto5' width='100'>";
				 echo"<input name='fotoe'type='checkbox' value='1' />
			  (Marque aqui caso queira excluir a imagem e logo ap&oacute;s clique em salvar.)";	
				} ?>	  	    </td>
		  </tr>
		<tr>
			<td colspan="2" class="structFilter"> ____________________________________________________________________________________________________________   </td>
		  </tr>
		  <tr>
			<td height="31" class="structFilter">Foto6 : </td>
			<td class="structFilter"><input type="file" class="structFilterBox" name="veiculo_foto6" value="<?= $veiculo_foto6?>"   size="42">
		    <? 
			    if($veiculo_foto6!=""){
			     echo"<img src='img_veiculos/$veiculo_foto6' width='100'>";
				 echo"<input name='fotof'type='checkbox' value='1' />
			  (Marque aqui caso queira excluir a imagem e logo ap&oacute;s clique em salvar.)";	
				} ?>	  	    </td>
		  </tr>
		<tr>
			<td colspan="2" class="structFilter"> ____________________________________________________________________________________________________________   </td>
		  </tr>
		  <tr>
			<td height="31" class="structFilter">Foto7 :  </td>
			<td class="structFilter"><input type="file" class="structFilterBox" name="veiculo_foto7" value="<?= $veiculo_foto7?>"   size="42">
		    <? 
			    if($veiculo_foto7!=""){
			     echo"<img src='img_veiculos/$veiculo_foto7' width='100'>";
				 echo"<input name='fotog'type='checkbox' value='1' />
			  (Marque aqui caso queira excluir a imagem e logo ap&oacute;s clique em salvar.)";	
				} ?>	  	    </td>
		  </tr>
		<tr>
			<td colspan="2" class="structFilter"> ____________________________________________________________________________________________________________   </td>
		  </tr>
		  <tr>
			<td height="31" class="structFilter">Foto8 :  </td>
			<td class="structFilter"><input type="file" class="structFilterBox" name="veiculo_foto8" value="<?= $veiculo_foto8?>"   size="42">
		    <? 
			    if($veiculo_foto8!=""){
			     echo"<img src='img_veiculos/$veiculo_foto8' width='100'>";
				 echo"<input name='fotoh'type='checkbox' value='1' />
			  (Marque aqui caso queira excluir a imagem e logo ap&oacute;s clique em salvar.)";	
				} ?>	  	    </td>
		  </tr>
		<tr>
			<td colspan="2" class="structFilter"> ____________________________________________________________________________________________________________   </td>
		  </tr>
		  <tr>
			<td height="31" class="structFilter">Foto9 :  </td>
			<td class="structFilter"><input type="file" class="structFilterBox" name="veiculo_foto9" value="<?= $veiculo_foto9?>"   size="42">
		    <? 
			    if($veiculo_foto9!=""){
			     echo"<img src='img_veiculos/$veiculo_foto9' width='100'>";
				 echo"<input name='fotoi'type='checkbox' value='1' />
			  (Marque aqui caso queira excluir a imagem e logo ap&oacute;s clique em salvar.)";	
				} ?>	  	    </td>
		  </tr>
		<tr>
			<td colspan="2" class="structFilter"> ____________________________________________________________________________________________________________   </td>
		  </tr>
		  <tr>
			<td height="31" class="structFilter">Foto10 :  </td>
			<td class="structFilter"><input type="file" class="structFilterBox" name="veiculo_foto10" value="<?= $veiculo_foto10?>"   size="42">
		    <? 
			    if($veiculo_foto10!=""){
			     echo"<img src='img_veiculos/$veiculo_foto10' width='100'>";
				 echo"<input name='fotoj'type='checkbox' value='1' />
			  (Marque aqui caso queira excluir a imagem e logo ap&oacute;s clique em salvar.)";	
				} ?>	  	    </td>
		  </tr>
		<tr>
			<td colspan="2" class="structFilter"> ____________________________________________________________________________________________________________   </td>
		  </tr>
		 
		  <tr>
			<td height="31" class="structFilter">Foto11 :  </td>
			<td class="structFilter"><input type="file" class="structFilterBox" name="veiculo_foto11" value="<?= $veiculo_foto11?>"   size="42">
		    <? 
			    if($veiculo_foto11!=""){
			     echo"<img src='img_veiculos/$veiculo_foto11' width='100'>";
				 echo"<input name='fotok'type='checkbox' value='1' />
			  (Marque aqui caso queira excluir a imagem e logo ap&oacute;s clique em salvar.)";	
				} ?>	  	    </td>
		  </tr>
		  <tr>
			<td colspan="2" class="structFilter"> ____________________________________________________________________________________________________________   </td>
		  </tr>
		  <tr>
			<td height="31" class="structFilter">Foto12 :  </td>
			<td class="structFilter"><input type="file" class="structFilterBox" name="veiculo_foto12" value="<?= $veiculo_foto12?>"   size="42">
		    <? 
			    if($veiculo_foto12!=""){
			     echo"<img src='img_veiculos/$veiculo_foto12' width='100'>";
				 echo"<input name='fotol'type='checkbox' value='1' />
			  (Marque aqui caso queira excluir a imagem e logo ap&oacute;s clique em salvar.)";	
				} ?>	  	    </td>
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