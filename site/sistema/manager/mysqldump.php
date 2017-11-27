<?PHP
/* Function to backup a mysql database table
 * @param host
 *     The database host name (server)
 * @param user
 *     Database user
 * @param password
 *     Database password
 * @param table
 *     Database table name
 * @param backup_path
 *     The path to backup directory
 * @param backup_name
 *     The name of the backup file - no extension
 */
function mysql_backup($host, $user, $password, $table, $backup_path, $backup_name) {
  $day = date('w');
  # gzip (.gz)
  $backup = $backup_path.$backup_name.'.gz';
  //exec(sprintf('mysqldump --host=%s --user=%s --password=%s %s --quick --lock-tables --add-drop-table  | gzip > %s', $host, $user, $password, $table, $backup));
  exec(sprintf('mysqldump --host=%s --user=%s --password=%s %s --lock-tables --add-drop-table --extended-insert=FALSE | gzip > %s', $host, $user, $password, $table, $backup));
  # sql (.sql)
  //$backup = $backup_path.'officemkt.sql';
  //exec(sprintf('c:\Develop\xampp\mysql\bin\mysqldump --host=%s --user=%s --password=%s %s --lock-tables --add-drop-table > %s', $host, $user, $password, $table, $backup));
}

mysql_backup('localhost', 'root', 'office', 'officemkt', '/var/www/backup/', 'officemkt.sql');
//mysql_backup('localhost', 'root', '', 'officemkt', 'c:\Develop\xampp\htdocs\officemkt\backup\\', 'officemkt.sql');

header('Content-type: application');
header('Content-Disposition: attachment; filename="officemkt.sql.gz"');
readfile('../../backup/officemkt.sql.gz');

/*
$ftp_server = "ftp.rsloca.com.br";
$ftp_user_name = "rsloca";
$ftp_user_pass = "";
$destination_file = "officemkt.sql.gz";
$source_file = "../../backup/officemkt.sql.gz";

// set up basic connection
$conn_id = ftp_connect($ftp_server);

// login with username and password
$login_result = ftp_login($conn_id, $ftp_user_name, $ftp_user_pass);

// check connection
if ((!$conn_id) || (!$login_result)) {
        echo "FTP connection has failed!";
        echo "Attempted to connect to $ftp_server for user $ftp_user_name";
        exit;
    } else {
        echo "Connected to $ftp_server, for user $ftp_user_name";
    }

// upload the file
$upload = ftp_put($conn_id, $destination_file, $source_file, FTP_BINARY);

// check upload status
if (!$upload) {
        echo "FTP upload has failed!";
    } else {
        echo "Uploaded $source_file to $ftp_server as $destination_file";
    }

// close the FTP stream
ftp_close($conn_id);

*/

?>