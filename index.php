<?php
$url = $_SERVER['HTTP_HOST'];
if($url=="www.teixeiraribeiro.com."){ 
	header("location: /site"); 
}elseif($url=="teixeiraribeiro.com"){ 
	header("location: /site"); 
}else{ 
	header("location: /site"); 
}
exit;
?>
