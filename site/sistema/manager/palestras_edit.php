<? include_once("struct/struct_top.php")?>
<?
$id_palestras=$_REQUEST["id"];

?>

<?php

include ("conexao_teste.php");

//Consulta com a tabela
//Selecione tudo de nomedatabela em ordem crescente pelo nome 
$consulta=mysql_query("SELECT * FROM palestras WHERE ID_PALESTRAS='$id_palestras'"); 

?>
  <?
//Fazendo o looping para exibi��o de todos registros que contiverem em nomedatabela
while ($dados = mysql_fetch_array($consulta)) {
$id_palestras=$dados['id_palestras'];
$nome_palestras=$dados['nome_palestras'];
$palestrante_palestras=$dados['palestrante_palestras'];
$dia_palestras=$dados['dia_palestras'];
$tema_palestras=$dados['tema_palestras'];
$turno_palestras=$dados['turno_palestras'];
$sala_palestras=$dados['sala_palestras'];
$inicio_palestras=$dados['inicio_palestras'];
$fim_palestras=$dados['fim_palestras'];
$url_palestrante_palestras=$dados['url_palestrante_palestras'];
}

?>

<script>
//Chama o Metodo assim: 
// onKeyPress="ConsisteTecla(event.keyCode,this);"
function ConsisteTecla(Tecla,Campo)
{
        if (Tecla > 47 && Tecla < 58)
      {
         event.returnValue = true;
         ConsisteHora(Campo);     
        }
        else
        {
     event.returnValue = false;
        }
}
function ConsisteHora(Campo)
{
      back = '';
            if(Campo.value.length == 2)
      { 
              hrs = (Campo.value.substring(0,2));
                if (hrs >= 00 && hrs <= 23)
                {
                    Campo.value += ":";
                    event.returnValue = true;
                    back = (Campo.value.substring(0,3));
                }
                else
                {
                    Campo.value = "";
                    event.returnValue = false;
                }
            }
            else if(Campo.value.length == 4)
            {
            min = (Campo.value.substring(3,4));
            if (min >= 0 && min < 6)
                {
                    event.returnValue = true; 
                }
                else
                {
                    back = (Campo.value.substring(0,3));
                    Campo.value = "";
                    Campo.value    = back;
                    event.returnValue = false;
                }
            }
        
}
</script>


<div class="structTitle">Editar Palestra </div>

<div style="padding-top:8px;"></div>

<form action="palestras_edit_xp.php" method="POST" class="form.nospace" onSubmit="return validateForm(this)">

<input type="hidden" name="usua_id" value="<?= $_SESSION["usuario"]->getID() ?>">
<!--input type="hidden" name="orga_id" value="<?= $orga_id ?>"-->
<!--input type="hidden" name="even_id" value="<?= $even_id ?>"-->
<table border="0" cellpadding="0" cellspacing="0" width="100%">
<tr>
	<td width="50%" valign="top">
		<table width="475" border="0" cellpadding="2" cellspacing="2">
		<tr>
			<td width="30%" class="structFilter">Nome da Palestra:</td>
			<td width="70%" class="structFilter">
			<input type="hidden" class="structFilterBox" name="id_palestras"  value="<?= $id_palestras?>" size="50" maxlength="200">
			<input type="edit" class="structFilterBox" name="nome_palestras"  value="<?= $nome_palestras?>" size="50" maxlength="200"></td>
		</tr>		
		<tr>
			<td width="30%" class="structFilter">Nome do Palestrante:</td>
			<?php

include ("conexao_teste.php");

//Consulta com a tabela
//Selecione tudo de nomedatabela em ordem crescente pelo nome 
$consulta=mysql_query("SELECT * FROM palestrantes order by nome_palestrantes ASC"); 

?>
			<td width="70%" class="structFilter">
			<select name="palestrante_palestras">
			 
			
			  <option value="<?= $palestrante_palestras;?>"><?= $palestrante_palestras;?></option>

<?

//Fazendo o looping para exibi��o de todos registros que contiverem em nomedatabela
while ($dados = mysql_fetch_array($consulta)) {
echo("<option value='".$dados['nome_palestrantes']."'>".$dados['nome_palestrantes']."</option>");
}

?>
</select></td>
		</tr>
		<tr>
										<td width="30%" class="structFilter">Url do Palestrante:</td>
			<?php

include ("conexao_teste.php");
//Consulta com a tabela
//Selecione tudo de nomedatabela em ordem crescente pelo nome 
$consultac=mysql_query("SELECT curriculo_palestrantes FROM palestrantes order by nome_palestrantes ASC"); 

?>
			<td width="70%" class="structFilter">
			<select name="url_palestrante_palestras">
			 
			
			  <option value="<?= $url_palestrante_palestras;?>"><?= $url_palestrante_palestras;?></option>

<?

//Fazendo o looping para exibi��o de todos registros que contiverem em nomedatabela
while ($dados = mysql_fetch_array($consultac)) {
echo("<option value='".$dados['curriculo_palestrantes']."'>".$dados['curriculo_palestrantes']."</option>");
}

?>
</select></td>
		</tr>
		<tr>
			<td class="structFilter">Dia da Palestra: </td>
			<td class="structFilter"><select name="dia_palestras">
			    <option value="<?= $dia_palestras?>"><?= $dia_palestras?></option>
                 <option value="20">20 de Novembro de 2010</option>
				 <option value="21">21 de Novembro de 2010</option>
				 <option value="22">22 de Novembro de 2010</option>
				 <option value="23">23 de Novembro de 2010</option>
				 <option value="24">24 de Novembro de 2010</option>
              </select>
			
			</td>
		</tr>
		<tr>
			<td width="30%" class="structFilter">Temas da Palestra:</td>
			<td width="70%" class="structFilter">
			  
			
<?php

//include ("conexao_teste.php");

//Consulta com a tabela
//Selecione tudo de nomedatabela em ordem crescente pelo nome 
$consulta=mysql_query("SELECT nome_temas FROM temas order by nome_temas ASC"); 
?>
	<select name="tema_palestras">
  	
			  <option value="<?= $tema_palestras;?>"><?= $tema_palestras;?></option>
 <?

//Fazendo o looping para exibi��o de todos registros que contiverem em nomedatabela
while ($dados = mysql_fetch_array($consulta)) {
echo("<option value='".$dados['nome_temas']."'>".$dados['nome_temas']."</option>");
}

?>
</select>
			</td>
		</tr>		
		
		<tr>
			<td class="structFilter">Turno da Palestra: </td>
			<td class="structFilter">
			  <select name="turno_palestras">
			    <option value="<?= $turno_palestras;?>"><?= $turno_palestras;?></option>
                 <option value="Manh�">Manh�</option>
				 <option value="Tarde">Tarde</option>
				 <option value="Noite">Noite</option>
              </select>
       </td>
		</tr>
		<tr>
			<td class="structFilter">Sala da Palestra: </td>
			<td class="structFilter">
			  <select name="sala_palestras">
			    <option value="<?= $sala_palestras;?>"><?= $sala_palestras;?></option>
                 <option value="Sala 1">Sala 1</option>
				 <option value="Sala 2">Sala 2</option>
				 <option value="Sala 3">Sala 3</option>
				 <option value="Sala 4">Sala 4</option>
				 <option value="Sala 5">Sala 5</option>
				 <option value="Sala 6">Sala 6</option>
				 <option value="Sala 7">Sala 7</option>
				 <option value="Sala 8">Sala 8</option>
				 
              </select>
		    </td>
		</tr>
		<tr>
			<td class="structFilter">Inicio da Palestra: </td>
			<td class="structFilter"><input type="edit" class="structFilterBox" name="inicio_palestras" value="<?= $inicio_palestras?>" onKeyPress="ConsisteTecla(event.keyCode,this);" size="5" maxlength="5"></td>
		</tr>
		<tr>
			<td class="structFilter">Fim da Palestra: </td>
			<td class="structFilter"><input type="edit" class="structFilterBox" name="fim_palestras" value="<?= $fim_palestras;?>"  onKeyPress="ConsisteTecla(event.keyCode,this);" size="5" maxlength="5"></td>
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
<?/* } else { ?>
	Erro: n�o foi informada a organiza��o.
	
<? }*/ ?>
<? include_once("struct/struct_bottom.php")?>