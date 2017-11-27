<?
session_start();
unset($_SESSION['usuario']);
unset($_SESSION['evento']);
unset($_SESSION['configuracao']);
unset($_SESSION['configuracaoXML']);
session_destroy();
header("Location: login.php");
?>