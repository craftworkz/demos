<?php 

$services = getenv("VCAP_SERVICES"); 
$services_json = json_decode($services,true);
$mysql_config = $services_json["mysql-5.5"][0]["credentials"]; 

$db = $mysql_config["name"]; 
$host = $mysql_config["host"]; 
$port = $mysql_config["port"]; 
$username = $mysql_config["user"]; 
$password = $mysql_config["password"];

$mysqli = new mysqli($host . ':' . $port, $username, $password, $db);
if ($mysqli->connect_errno) {
	echo "Failed to connect to MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
}
echo $mysqli->host_info . "\n";


?>