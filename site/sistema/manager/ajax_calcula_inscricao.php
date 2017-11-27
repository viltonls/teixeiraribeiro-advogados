<? header("Content-type: text/html; charset=ISO-8859-1");
include_once("struct/auth.php");
include_once('../classes/class.valores.php');
include_once('../classes/service.valores.php');

/* @var $eventoConfiguracaoXMLAtual ConfiguracaoXML */

$valoresService = new ValoresService();

$categoria = $_REQUEST["categoria"];
$opcao = $_REQUEST["opcao"];
$even_id = $_REQUEST["even_id"];
$data = $_REQUEST["data"];
$acompanhante = $_REQUEST["acompanhante"];
$data_array = explode("/",$data);

$data = mktime(0,0,0,$data_array[1],$data_array[0],$data_array[2]);

$cursosArray = explode(',',$_REQUEST["cursos"]);
$cursosPrecoTotal = $eventoConfiguracaoXMLAtual->getCursoPrecoTotal($cursosArray);

$valor = $valoresService->calculaValor($even_id, $data, $opcao, $categoria,$acompanhante);
$valor += $cursosPrecoTotal;
//$valor = 199;
echo number_format($valor/100,2,",",".");
?>