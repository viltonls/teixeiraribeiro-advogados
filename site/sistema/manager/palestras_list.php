<? include_once("struct/auth.php")?>
<?
if (!session_is_registered("evento")) { 
	header("Location: session_seleciona_evento.php?url=inscricao_list.php&orga_id=0&configurado=1");
} else {
	
$print = $_REQUEST["print"];
	
if ($print == "true") {
	include_once("struct/struct_print.php");
} else {
	include_once("struct/struct_top.php");
}
include_once('../classes/class.inscricao.php');
include_once('../classes/service.inscricao.php');

if ($_REQUEST["order_by"]) {
	$order_by = $_REQUEST["order_by"];
} else {
	$order_by = "INSC_NOME ASC";
}


/* @var $eventoAtual Evento */
$inscricaoService = new InscricaoService();
$inscricaoList = $inscricaoService->listInscricoesByEventoFiltered($eventoAtual->getID(),$order_by,$_REQUEST["insc_nome"],$_REQUEST["insc_categoria"],$_REQUEST["insc_opcao"],$_REQUEST["insc_forma_pgto"],"",$_REQUEST["insc_status_pgto"],$_REQUEST["insc_org_nome"],"");

/* @var $usuarioAtual Usuario*/
/* @var $eventoConfiguracaoAtual Configuracao */
/* @var $eventoConfiguracaoXMLAtual ConfiguracaoXML */

?>
<div class="structTitle">Listar Palestras e Intervalos "<?=$eventoAtual->getNOME()?>"</div>



<div class="gridContainer" id="tC" style="height:300px; width:100%;border:solid 1px #303030">
    <table border="0" cellspacing="0" cellpadding="0" width="99%">
  		<thead class="gridHeader">
  			<tr class="gridHeader" style="top:expression(document.getElementById('tC').scrollTop);">
				<!--td class="gridHeader" width="2%">&nbsp;</td-->

				<td class="gridHeader" width="3%">&nbsp;</td>
				<td width="1%" class="gridHeader">ID</td>
				<td width="5%" class="gridHeader">Nome</td>
				<td width="8%" class="gridHeader">Palestrante</td>
				<td width="15%" class="gridHeader">Url do Palestrante</td>
				<td width="11%" class="gridHeader">Dia</td>
				<td width="9%" class="gridHeader">Tema</td>
				<td width="10%" class="gridHeader">Turno</td>
				<td width="6%" class="gridHeader">Sala</td>
				<td width="10%" class="gridHeader">Horario</td>
				<td width="8%" class="gridHeader">Editar</td>
				<td width="12%" class="gridHeader">Excluir</td>
				<td class="gridHeader" width="1%">&nbsp;</td>
			</tr>
  		</thead>
  		<tbody>
  			<?php

include ("conexao_teste.php");

//Consulta com a tabela
//Selecione tudo de nomedatabela em ordem crescente pelo nome 
$consulta=mysql_query("SELECT * FROM palestras order by id_palestras ASC"); 

?>
  			<?
//Fazendo o looping para exibição de todos registros que contiverem em nomedatabela
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

?>
  
 
  			<tr>
   				<td class="gridLineEven">&nbsp;
	  
	</td>
				<td class="gridLineEven">
	  				<?= $id_palestras?>
	</td>
				<td class="gridLineEven">
	  				<?= $nome_palestras?>
	</td>
				<td class="gridLineEven">
					<?= $palestrante_palestras?>
    </td>
				<td class="gridLineEven">
					<?= $url_palestrante_palestras?>
    </td>
				<td class="gridLineEven">
					<? if ($dia_palestras=="20"){
				echo"20 de Novembro de 2010";
				}else if ($dia_palestras=="21"){
				echo"21 de Novembro de 2010";
				}else if ($dia_palestras=="22"){
				echo"22 de Novembro de 2010";
				}else if ($dia_palestras=="23"){
				echo"23 de Novembro de 2010";
				}else if ($dia_palestras=="24"){
				echo"24 de Novembro de 2010";
				}
				
				?>
		
    </td>
				<td class="gridLineEven">
					<?= $tema_palestras?>
		
    </td>
				<td class="gridLineEven">
					<?= $turno_palestras?>
		
    </td>
				<td class="gridLineEven">
					<?= $sala_palestras?>
		
    </td>
				<td class="gridLineEven">
					<?= $inicio_palestras?>
-		
    
					<?= $fim_palestras?>
		
    </td>
				<td class="gridLineEven">
      				<? if($tema_palestras=="Intervalo"){?>
	    <a href="intervalos_edit.php?id=<?= $id_palestras;  ?>">Editar</a>&nbsp;
	  				<? }else{?>
         <a href="palestras_edit.php?id=<?= $id_palestras;  ?>">Editar</a>&nbsp;
      				<? }?>
				</td>
				<td class="gridLineEven">&nbsp;<a href="palestras_delete_xp2.php?id=<?= $id_palestras;  ?>" onClick="return confirm('Você tem certeza que deseja excluir?\n(essa operação não pode ser desfeita)')">Excluir</a></td>
				<td width="1%" class="gridLineEven">&nbsp;</td>
				<td width="1%" class="gridLineEven">&nbsp;
	  
	</td>
			</tr>
  			<? } ?>
  		</tbody>
    </table>
</div>



<? include_once("struct/struct_bottom.php")?>
<? } ?>