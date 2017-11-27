<?
require_once("Barcode.php");
$bc = new Image_Barcode;
$bc->draw($_REQUEST["cod"], "Code39", "png");
?>
