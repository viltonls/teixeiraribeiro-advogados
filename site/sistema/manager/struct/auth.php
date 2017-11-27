<?

include_once('../classes/class.usuario.php');
//include_once('../classes/dto.usuario_evento.php');
include_once('../classes/class.evento.php');
include_once('../classes/class.configuracao.php');
include_once('../classes/class.configuracao_xml.php');

session_start();

if (!isset($_SESSION['usuario'])) {
	header("Location: login.php?url=".$_SERVER['PHP_SELF']);
} else {
	$usuarioAtual = new Usuario();
	$usuarioAtual = $_SESSION['usuario'];
	/* @var $usuarioAtual Usuario */
	//echo "Usuário: ".$usuarioAtual->getNOME();
	if (isset($_SESSION['evento'])) {
		$eventoAtual = new Evento();
		$eventoAtual = $_SESSION['evento'];
		$eventoConfiguracaoAtual = new Configuracao();
		$eventoConfiguracaoAtual = $_SESSION['configuracao'];
		$eventoConfiguracaoXMLAtual = new ConfiguracaoXML();
		$eventoConfiguracaoXMLAtual = $_SESSION['configuracaoXML'];
	}
	
	//header("Content-type: text/html; charset=ISO-8859-1");
}
?>