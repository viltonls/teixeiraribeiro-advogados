<? include_once("struct/struct_top.php")?>
<?php
include_once("fckeditor/fckeditor.php");

?>
<?

//include_once('../classes/class.configuracao.php');
//include_once('../classes/class.palestrantes.php');
//include_once('../classes/service.palestrantes.php');

//$Palestrantes = new Palestrantes();
$id_eventosfotos=$_REQUEST["id"];
?>

 <?php

include ("conexao_teste.php");

//Consulta com a tabela
//Selecione tudo de nomedatabela em ordem crescente pelo nome 
$consulta=mysql_query("SELECT * FROM eventosfotos WHERE ID_EVENTOSFOTOS='$id_eventosfotos'"); 

?>
  <?
//Fazendo o looping para exibição de todos registros que contiverem em nomedatabela
while ($dados = mysql_fetch_array($consulta)) {
$id_eventosfotos=$dados['id_eventosfotos'];
$eventosfotos_titulo=$dados['eventosfotos_titulo'];
$eventosfotos_data=$dados['eventosfotos_data'];
$eventosfotos_corpo=$dados['eventosfotos_corpo'];
$eventosfotos_foto1=$dados['eventosfotos_foto1'];
$eventosfotos_foto2=$dados['eventosfotos_foto2'];
$eventosfotos_foto3=$dados['eventosfotos_foto3'];
$eventosfotos_foto4=$dados['eventosfotos_foto4'];
$eventosfotos_foto5=$dados['eventosfotos_foto5'];
$eventosfotos_foto6=$dados['eventosfotos_foto6'];
$eventosfotos_foto7=$dados['eventosfotos_foto7'];
$eventosfotos_foto8=$dados['eventosfotos_foto8'];
$eventosfotos_foto9=$dados['eventosfotos_foto9'];
$eventosfotos_foto10=$dados['eventosfotos_foto10'];
$eventosfotos_foto11=$dados['eventosfotos_foto11'];
$eventosfotos_foto12=$dados['eventosfotos_foto12'];
$eventosfotos_foto13=$dados['eventosfotos_foto13'];
$eventosfotos_foto14=$dados['eventosfotos_foto14'];
$eventosfotos_foto15=$dados['eventosfotos_foto15'];
$eventosfotos_foto16=$dados['eventosfotos_foto16'];
$eventosfotos_foto17=$dados['eventosfotos_foto17'];
$eventosfotos_foto18=$dados['eventosfotos_foto18'];
$eventosfotos_foto19=$dados['eventosfotos_foto19'];
$eventosfotos_foto20=$dados['eventosfotos_foto20'];
}

?>
<link type="text/css" rel="stylesheet" href="dhtmlgoodies_calendar/dhtmlgoodies_calendar.css?random=20051112" media="screen"></LINK>
	<SCRIPT type="text/javascript" src="dhtmlgoodies_calendar/dhtmlgoodies_calendar.js?random=20060118"></script>


<div class="structTitle">Editar Eventos e Fotos </div>

<div style="padding-top:8px;"></div>

<form action="eventosfotos_edit_xp.php" method="POST" class="form.nospace" onsubmit="return validateForm(this)" enctype="multipart/form-data">

<input type="hidden" name="usua_id" value="<?= $_SESSION["usuario"]->getID() ?>">
<!--input type="hidden" name="orga_id" value="<?= $orga_id ?>"-->
<!--input type="hidden" name="even_id" value="<?= $even_id ?>"-->
<table border="0" cellpadding="0" cellspacing="0" width="100%">
<tr>
	<td width="50%" valign="top">
		<table width="1028" border="0" cellpadding="2" cellspacing="2">
		<tr>
			<td width="9%" class="structFilter">Titulo:</td>
			<td width="91%" class="structFilter">
			<input type="hidden" class="structFilterBox" name="id_eventosfotos"  value="<?= $id_eventosfotos?>" size="50" maxlength="200">
			<input type="edit" class="structFilterBox" name="eventosfotos_titulo"  value="<?= $eventosfotos_titulo?>" size="50" maxlength="200"></td>
		</tr>	
		<tr>
			<td width="9%" class="structFilter">Data:</td>
			<td width="91%" class="structFilter">
			<input type="text" class="structFilterBox" value="<?= $eventosfotos_data?>" readonly name="eventosfotos_data"><input type="button" class="structFilterButton" value="Calendario" onclick="displayCalendar(document.forms[0].eventosfotos_data,'yyyy-mm-dd',this)">
			</td>
		</tr>		
		
		<tr>
			<td class="structFilter">Corpo: </td>
			<td class="structFilter">
			  <?php
                $oFCKeditor = new FCKeditor('eventosfotos_corpo') ;
                $oFCKeditor->BasePath = 'fckeditor/' ;
                $oFCKeditor->Value = $eventosfotos_corpo;
                $oFCKeditor->Create() ;
              ?>			</td>
		</tr>
		
		<tr>
			<td colspan="2" class="structFilter"> ____________________________________________________________________________________________________________   </td>
		  </tr>
		  <tr>
			<td height="31" class="structFilter">Foto1 :  </td>
			<td class="structFilter"><input type="file" class="structFilterBox" name="eventosfotos_foto1" value="<?= $eventosfotos_foto1?>"   size="42">
			  <? 
			    if($eventosfotos_foto1!=""){
			     echo"<img src='img_eventosfotos/$eventosfotos_foto1' width='100'>";
				 echo"<input name='fotoa'type='checkbox' value='1' />
			  (Marque aqui caso queira excluir a imagem e logo ap&oacute;s clique em salvar.)";	
				} ?> 
				
	  	    </td>
		</tr>
		<tr>
			<td colspan="2" class="structFilter"> ____________________________________________________________________________________________________________   </td>
		  </tr>
		  <tr>
			<td height="31" class="structFilter">Foto2 :  </td>
			<td class="structFilter"><input type="file" class="structFilterBox" name="eventosfotos_foto2" value="<?= $eventosfotos_foto2?>"   size="42">
			  <? 
			    if($eventosfotos_foto2!=""){
			     echo"<img src='img_eventosfotos/$eventosfotos_foto2' width='100'>";
				 echo"<input name='fotob'type='checkbox' value='1' />
			  (Marque aqui caso queira excluir a imagem e logo ap&oacute;s clique em salvar.)";	
				} ?> 
				
	  	    </td>
		</tr>
		<tr>
			<td colspan="2" class="structFilter"> ____________________________________________________________________________________________________________   </td>
		  </tr>
		  <tr>
			<td height="31" class="structFilter">Foto3 :  </td>
			<td class="structFilter"><input type="file" class="structFilterBox" name="eventosfotos_foto3" value="<?= $eventosfotos_foto3?>"   size="42">
			  <? 
			    if($eventosfotos_foto3!=""){
			     echo"<img src='img_eventosfotos/$eventosfotos_foto3' width='100'>";
				 echo"<input name='fotoc'type='checkbox' value='1' />
			  (Marque aqui caso queira excluir a imagem e logo ap&oacute;s clique em salvar.)";	
				} ?> 
				
	  	    </td>
		</tr>
		<tr>
			<td colspan="2" class="structFilter"> ____________________________________________________________________________________________________________   </td>
		  </tr>
		  <tr>
			<td height="31" class="structFilter">Foto4 :  </td>
			<td class="structFilter"><input type="file" class="structFilterBox" name="eventosfotos_foto4" value="<?= $eventosfotos_foto4?>"   size="42">
			  <? 
			    if($eventosfotos_foto4!=""){
			     echo"<img src='img_eventosfotos/$eventosfotos_foto4' width='100'>";
				 echo"<input name='fotod'type='checkbox' value='1' />
			  (Marque aqui caso queira excluir a imagem e logo ap&oacute;s clique em salvar.)";	
				} ?> 
				
	  	    </td>
		</tr>
		<tr>
			<td colspan="2" class="structFilter"> ____________________________________________________________________________________________________________   </td>
		  </tr>
		  <tr>
			<td height="31" class="structFilter">Foto5 :  </td>
			<td class="structFilter"><input type="file" class="structFilterBox" name="eventosfotos_foto5" value="<?= $eventosfotos_foto5?>"   size="42">
			  <? 
			    if($eventosfotos_foto5!=""){
			     echo"<img src='img_eventosfotos/$eventosfotos_foto5' width='100'>";
				 echo"<input name='fotoe'type='checkbox' value='1' />
			  (Marque aqui caso queira excluir a imagem e logo ap&oacute;s clique em salvar.)";	
				} ?> 
				
	  	    </td>
		</tr>
		<tr>
			<td colspan="2" class="structFilter"> ____________________________________________________________________________________________________________   </td>
		  </tr>
		  <tr>
			<td height="31" class="structFilter">Foto6 : </td>
			<td class="structFilter"><input type="file" class="structFilterBox" name="eventosfotos_foto6" value="<?= $eventosfotos_foto6?>"   size="42">
			  <? 
			    if($eventosfotos_foto6!=""){
			     echo"<img src='img_eventosfotos/$eventosfotos_foto6' width='100'>";
				 echo"<input name='fotof'type='checkbox' value='1' />
			  (Marque aqui caso queira excluir a imagem e logo ap&oacute;s clique em salvar.)";	
				} ?> 
				
	  	    </td>
		</tr>
		<tr>
			<td colspan="2" class="structFilter"> ____________________________________________________________________________________________________________   </td>
		  </tr>
		  <tr>
			<td height="31" class="structFilter">Foto7 :  </td>
			<td class="structFilter"><input type="file" class="structFilterBox" name="eventosfotos_foto7" value="<?= $eventosfotos_foto7?>"   size="42">
			  <? 
			    if($eventosfotos_foto7!=""){
			     echo"<img src='img_eventosfotos/$eventosfotos_foto7' width='100'>";
				 echo"<input name='fotog'type='checkbox' value='1' />
			  (Marque aqui caso queira excluir a imagem e logo ap&oacute;s clique em salvar.)";	
				} ?> 
				
	  	    </td>
		</tr>
		<tr>
			<td colspan="2" class="structFilter"> ____________________________________________________________________________________________________________   </td>
		  </tr>
		  <tr>
			<td height="31" class="structFilter">Foto8 :  </td>
			<td class="structFilter"><input type="file" class="structFilterBox" name="eventosfotos_foto8" value="<?= $eventosfotos_foto8?>"   size="42">
			  <? 
			    if($eventosfotos_foto8!=""){
			     echo"<img src='img_eventosfotos/$eventosfotos_foto8' width='100'>";
				 echo"<input name='fotoh'type='checkbox' value='1' />
			  (Marque aqui caso queira excluir a imagem e logo ap&oacute;s clique em salvar.)";	
				} ?> 
				
	  	    </td>
		</tr>
		<tr>
			<td colspan="2" class="structFilter"> ____________________________________________________________________________________________________________   </td>
		  </tr>
		  <tr>
			<td height="31" class="structFilter">Foto9 :  </td>
			<td class="structFilter"><input type="file" class="structFilterBox" name="eventosfotos_foto9" value="<?= $eventosfotos_foto9?>"   size="42">
			  <? 
			    if($eventosfotos_foto9!=""){
			     echo"<img src='img_eventosfotos/$eventosfotos_foto9' width='100'>";
				 echo"<input name='fotoi'type='checkbox' value='1' />
			  (Marque aqui caso queira excluir a imagem e logo ap&oacute;s clique em salvar.)";	
				} ?> 
				
	  	    </td>
		</tr>
		<tr>
			<td colspan="2" class="structFilter"> ____________________________________________________________________________________________________________   </td>
		  </tr>
		  <tr>
			<td height="31" class="structFilter">Foto10 :  </td>
			<td class="structFilter"><input type="file" class="structFilterBox" name="eventosfotos_foto10" value="<?= $eventosfotos_foto10?>"   size="42">
			  <? 
			    if($eventosfotos_foto10!=""){
			     echo"<img src='img_eventosfotos/$eventosfotos_foto10' width='100'>";
				 echo"<input name='fotoj'type='checkbox' value='1' />
			  (Marque aqui caso queira excluir a imagem e logo ap&oacute;s clique em salvar.)";	
				} ?> 
				
	  	    </td>
		</tr>
		<tr>
			<td colspan="2" class="structFilter"> ____________________________________________________________________________________________________________   </td>
		  </tr>
		  
		  
		   <tr>
			<td height="31" class="structFilter">Foto11 :  </td>
			<td class="structFilter"><input type="file" class="structFilterBox" name="eventosfotos_foto11" value="<?= $eventosfotos_foto11?>"   size="42">
			  <? 
			    if($eventosfotos_foto11!=""){
			     echo"<img src='img_eventosfotos/$eventosfotos_foto11' width='100'>";
				 echo"<input name='fotok'type='checkbox' value='1' />
			  (Marque aqui caso queira excluir a imagem e logo ap&oacute;s clique em salvar.)";	
				} ?> 
				
	  	    </td>
		</tr>
		<tr>
			<td colspan="2" class="structFilter"> ____________________________________________________________________________________________________________   </td>
		  </tr>
		  <tr>
			<td height="31" class="structFilter">Foto12 :  </td>
			<td class="structFilter"><input type="file" class="structFilterBox" name="eventosfotos_foto12" value="<?= $eventosfotos_foto12?>"   size="42">
			  <? 
			    if($eventosfotos_foto12!=""){
			     echo"<img src='img_eventosfotos/$eventosfotos_foto12' width='100'>";
				 echo"<input name='fotol'type='checkbox' value='1' />
			  (Marque aqui caso queira excluir a imagem e logo ap&oacute;s clique em salvar.)";	
				} ?> 
				
	  	    </td>
		</tr>
		<tr>
			<td colspan="2" class="structFilter"> ____________________________________________________________________________________________________________   </td>
		  </tr>
		  <tr>
			<td height="31" class="structFilter">Foto13 :  </td>
			<td class="structFilter"><input type="file" class="structFilterBox" name="eventosfotos_foto13" value="<?= $eventosfotos_foto13?>"   size="42">
			  <? 
			    if($eventosfotos_foto13!=""){
			     echo"<img src='img_eventosfotos/$eventosfotos_foto13' width='100'>";
				 echo"<input name='fotom'type='checkbox' value='1' />
			  (Marque aqui caso queira excluir a imagem e logo ap&oacute;s clique em salvar.)";	
				} ?> 
				
	  	    </td>
		</tr>
		<tr>
			<td colspan="2" class="structFilter"> ____________________________________________________________________________________________________________   </td>
		  </tr>
		  <tr>
			<td height="31" class="structFilter">Foto14 :  </td>
			<td class="structFilter"><input type="file" class="structFilterBox" name="eventosfotos_foto14" value="<?= $eventosfotos_foto14?>"   size="42">
			  <? 
			    if($eventosfotos_foto14!=""){
			     echo"<img src='img_eventosfotos/$eventosfotos_foto14' width='100'>";
				 echo"<input name='foton'type='checkbox' value='1' />
			  (Marque aqui caso queira excluir a imagem e logo ap&oacute;s clique em salvar.)";	
				} ?> 
				
	  	    </td>
		</tr>
		<tr>
			<td colspan="2" class="structFilter"> ____________________________________________________________________________________________________________   </td>
		  </tr>
		  <tr>
			<td height="31" class="structFilter">Foto15 :  </td>
			<td class="structFilter"><input type="file" class="structFilterBox" name="eventosfotos_foto15" value="<?= $eventosfotos_foto15?>"   size="42">
			  <? 
			    if($eventosfotos_foto15!=""){
			     echo"<img src='img_eventosfotos/$eventosfotos_foto15' width='100'>";
				 echo"<input name='fotoo'type='checkbox' value='1' />
			  (Marque aqui caso queira excluir a imagem e logo ap&oacute;s clique em salvar.)";	
				} ?> 
				
	  	    </td>
		</tr>
		<tr>
			<td colspan="2" class="structFilter"> ____________________________________________________________________________________________________________   </td>
		  </tr>
		  <tr>
			<td height="31" class="structFilter">Foto16 :  </td>
			<td class="structFilter"><input type="file" class="structFilterBox" name="eventosfotos_foto16" value="<?= $eventosfotos_foto16?>"   size="42">
			  <? 
			    if($eventosfotos_foto16!=""){
			     echo"<img src='img_eventosfotos/$eventosfotos_foto16' width='100'>";
				 echo"<input name='fotop'type='checkbox' value='1' />
			  (Marque aqui caso queira excluir a imagem e logo ap&oacute;s clique em salvar.)";	
				} ?> 
				
	  	    </td>
		</tr>
		<tr>
			<td colspan="2" class="structFilter"> ____________________________________________________________________________________________________________   </td>
		  </tr>
		  <tr>
			<td height="31" class="structFilter">Foto17 :  </td>
			<td class="structFilter"><input type="file" class="structFilterBox" name="eventosfotos_foto17" value="<?= $eventosfotos_foto17?>"   size="42">
			  <? 
			    if($eventosfotos_foto17!=""){
			     echo"<img src='img_eventosfotos/$eventosfotos_foto17' width='100'>";
				 echo"<input name='fotoq'type='checkbox' value='1' />
			  (Marque aqui caso queira excluir a imagem e logo ap&oacute;s clique em salvar.)";	
				} ?> 
				
	  	    </td>
		</tr>
		<tr>
			<td colspan="2" class="structFilter"> ____________________________________________________________________________________________________________   </td>
		  </tr>
		  <tr>
			<td height="31" class="structFilter">Foto18 : </td>
			<td class="structFilter"><input type="file" class="structFilterBox" name="eventosfotos_foto18" value="<?= $eventosfotos_foto18?>"   size="42">
			  <? 
			    if($eventosfotos_foto18!=""){
			     echo"<img src='img_eventosfotos/$eventosfotos_foto18' width='100'>";
				 echo"<input name='fotor'type='checkbox' value='1' />
			  (Marque aqui caso queira excluir a imagem e logo ap&oacute;s clique em salvar.)";	
				} ?> 
				
	  	    </td>
		</tr>
		<tr>
			<td colspan="2" class="structFilter"> ____________________________________________________________________________________________________________   </td>
		  </tr>
		  <tr>
			<td height="31" class="structFilter">Foto19 :  </td>
			<td class="structFilter"><input type="file" class="structFilterBox" name="eventosfotos_foto19" value="<?= $eventosfotos_foto19?>"   size="42">
			  <? 
			    if($eventosfotos_foto19!=""){
			     echo"<img src='img_eventosfotos/$eventosfotos_foto19' width='100'>";
				 echo"<input name='fotos'type='checkbox' value='1' />
			  (Marque aqui caso queira excluir a imagem e logo ap&oacute;s clique em salvar.)";	
				} ?> 
				
	  	    </td>
		</tr>
		<tr>
			<td colspan="2" class="structFilter"> ____________________________________________________________________________________________________________   </td>
		  </tr>
		  <tr>
			<td height="31" class="structFilter">Foto20 :  </td>
			<td class="structFilter"><input type="file" class="structFilterBox" name="eventosfotos_foto20" value="<?= $eventosfotos_foto20?>"   size="42">
			  <? 
			    if($eventosfotos_foto20!=""){
			     echo"<img src='img_eventosfotos/$eventosfotos_foto20' width='100'>";
				 echo"<input name='fotot'type='checkbox' value='1' />
			  (Marque aqui caso queira excluir a imagem e logo ap&oacute;s clique em salvar.)";	
				} ?> 
				<input type="hidden" name="acao" value="imagem" />
	  	    </td>
		</tr>
		<tr>
			<td colspan="2" class="structFilter"> ____________________________________________________________________________________________________________   </td>
		  </tr>
		  
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