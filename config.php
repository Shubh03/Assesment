<?php 
// DB credentials.
define('DB_HOST','us-cdbr-east-05.cleardb.net');
define('DB_USER','bc343e20b4cb9a');
define('DB_PASS','3f3e26cb');
define('DB_NAME','heroku_eeb1b643f6cf021');
// Establish database connection.
try
{
$dbh = new PDO("mysql:host=".DB_HOST.";dbname=".DB_NAME,DB_USER, DB_PASS,array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES 'utf8'"));
}
catch (PDOException $e)
{
exit("Error: " . $e->getMessage());
}
?>