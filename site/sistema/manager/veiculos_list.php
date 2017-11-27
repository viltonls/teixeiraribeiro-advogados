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
<div class="structTitle">Listar Semi-novos "<?=$eventoAtual->getNOME()?>"</div>



<div class="gridContainer" id="tC" style="height:300px; width:100%;border:solid 1px #303030">
<table border="0" cellspacing="0" cellpadding="0" width="100%">
  <thead class="gridHeader">
  <tr class="gridHeader" style="top:expression(document.getElementById('tC').scrollTop);">
	<!--td class="gridHeader" width="2%">&nbsp;</td-->

	<td class="gridHeader" width="0%">&nbsp;</td>
   
	 <td width="20%" class="gridHeader">Modelo</td>
	 <td width="17%" class="gridHeader">Placa</td>
	  <td width="22%" class="gridHeader">Marca</td>
	  <td width="10%" class="gridHeader">Ano Fabricação</td>
	  
      <td width="15%" class="gridHeader">Ano Modelo</td>
    
	  <td width="5%" class="gridHeader">Editar</td>
	<td width="4%" class="gridHeader">Excluir</td>
	<td class="gridHeader" width="0%">&nbsp;</td>
  </tr>
  </thead>
  <tbody>
  <?php

include ("conexao_teste.php");

//Consulta com a tabela
//Selecione tudo de nomedatabela em ordem crescente pelo nome 
$consulta=mysql_query("SELECT * FROM veiculos order by veiculo_modelo"); 

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
$veiculo_conbustivel=$dados['veiculo_conbustivel'];
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

?>
  
 
  <tr>
   <td class="gridLineEven">&nbsp;
	  
	</td>
	<td class="gridLineEven">
	  <?= $veiculo_modelo?>
	</td>
	<td class="gridLineEven">
	  <?= $veiculo_placa?>
	</td>
	<td class="gridLineEven">
	  <?= $veiculo_marca?>
	</td>
    <td class="gridLineEven">
		<?= $veiculo_ano_fabricacao?>
    </td>
	<td class="gridLineEven">
		<?= $veiculo_ano_modelo?>
    </td>
   
   
    <td class="gridLineEven"><a href="veiculos_edit.php?id=<?=$id_veiculo;  ?>">Editar</a>&nbsp;</td>
   
    <td class="gridLineEven">&nbsp;<a href="veiculos_delete_xp2.php?id=<?=$id_veiculo;  ?>" onClick="return confirm('Você tem certeza que deseja excluir?\n(essa operação não pode ser desfeita)')">Excluir</a></td>
    <td class="gridLineEven">&nbsp;</td>
	<td width="7%" class="gridLineEven">&nbsp;	</td>
  </tr>
  <? } ?>
  </tbody>
</table>
</div>



<? include_once("struct/struct_bottom.php")?>
<? } ?>