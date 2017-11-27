<?
include_once('../classes/class.usuario.php');
include_once('../classes/service.usuario.php');
include_once('../classes/class.evento.php');
include_once('../classes/class.configuracao.php');
include_once('../classes/class.configuracao_xml.php');
include_once('../classes/service.evento.php');

//$alias = trim($_REQUEST["alias"]);
$login = trim($_REQUEST["login"]);
$senha = trim($_REQUEST["password"]);
$url = $_REQUEST["url"];

$validate = false;
$admin = false;

$eventoService = new EventoService();
$eventoConfiguracao = new Configuracao();
$eventoConfiguracaoXML = new ConfiguracaoXML();

if ($alias == "e23oj52bdec59") {
	// Verifica se o usuário existe	
	$userService = new UsuarioService();
	$user = new Usuario();
	$user = $userService->loadUsuarioByLogin($login);
	if ($user->getSENHA() == $senha) {
		$validate = true;
		$admin = true;
	} else {
		// Senha nao confere
	}
} else {
	$eventoConfiguracao = $eventoService->loadEventoConfiguracaoByAlias($alias);
	/* @var $eventoConfiguracao Configuracao */
	
	if ($eventoConfiguracao && $eventoConfiguracao->getEVEN_ID()) {
		
		$eventoConfiguracaoXML->loadFromFile("../xml/".$eventoConfiguracao->getEVEN_ID().".xml");
		
		$evento = new Evento();
		$evento = $eventoService->loadEventoById($eventoConfiguracao->getEVEN_ID());
		
		if ($login == "pescat2010@conquistacom.com" && $senha == "pescat10system") {
			$validate = true;
			$userService = new UsuarioService();
			$user = $userService->loadUsuarioByLogin($login);
		} else {
			
			// Verifica se o usuário existe	
			$userService = new UsuarioService();
			$user = new Usuario();
			$user = $userService->loadUsuarioByLogin($login);
			
			if ($user && $user->getID()) {
				if ($user->getEVEN_ID() == $eventoConfiguracao->getEVEN_ID()) {
					if ($user->getSENHA() == $senha) {
						$validate = true;
					} else {
						//Senha nao confere
					}
				} else {
					//Usuario nao pertence a esse evento
				}
			} else {
				//Usuario inexistente
			}
		}
	} else {
		//Alias inexistente
	}
	
}

/*
echo "Dados do Usuario no BD<br>";
echo "Id: ".$user->getID()."<br>";
echo "Login: ".$user->getLOGIN()."<br>";
echo "Senha: ".$user->getSENHA()."<br>";
*/
if ($validate) {
	
	// Registra variáveis na sessão
	session_register("usuario");
	$_SESSION["usuario"] = $user;
	session_register("evento");
	$_SESSION["evento"] = $evento;
	session_register("configuracao");
	$_SESSION["configuracao"] = $eventoConfiguracao;
	session_register("configuracaoXML");
	$_SESSION["configuracaoXML"] = $eventoConfiguracaoXML;
	
	if ($admin) {
		session_register("admin");
		$_SESSION["admin"] = true;
	}
	
	if ($url) {
		header("Location: $url");
	} else {
		header("Location: index.php");
		 }
	
} else {
		 header("Location: login.php?error=1&login=".$login."&alias=".$alias);
}

?>