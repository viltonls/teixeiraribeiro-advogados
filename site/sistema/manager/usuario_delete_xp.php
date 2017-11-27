<?
include_once('../classes/class.usuario.php');
include_once('../classes/service.usuario.php');

$usuario = new Usuario();

if ($_REQUEST["id"]) {
	$usuario->delete($_REQUEST["id"]);
} else {
	echo "<span class='structFilter'>";
	echo "Erro: Usuário não encontrado no BD.<br>";
	break;
	echo "</span>";
}

header("Location: usuario_list.php");

?>