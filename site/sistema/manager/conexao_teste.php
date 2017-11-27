 <? 
			  
			 
$dbhost="mysql01.provisoriolex.hospedagemdesites.ws"; //nome do servidor que hospeda o banco de dados
$dbuser="provisoriolex";   // usuario do banco de dados
$dbpasswd="fTR8723htd";   // senha usada para entrar no banco de dados
$dbname="provisoriolex";  // nome que você deu ao seu banco de dados
$conexao = @mysql_pconnect($dbhost, $dbuser, $dbpasswd) or die ("Não foi possível conectar-se ao servidor MySQL");
$db = @mysql_select_db($dbname) or die ("Não foi possível selecionar o banco de dados <b>$dbname</b>");?>

	