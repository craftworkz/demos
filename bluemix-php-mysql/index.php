<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Todolist</title>
    <link href="/bootstrap.min.css" rel="stylesheet">
    <style type="text/css">
    	body {color: #4e4d4e;}
    	.btn-primary, .btn-primary:hover, .btn-primary:active, .btn-primary:focus {background-color: #92d4d5; border-style: none;}
    	input {margin-right: 6px;}
    </style>
  </head>
  <body>
  	<div class="container">
		<p class="text-center"><img src="/logo.png" alt="craftworkz" /></p>
	</div>
    <div class="container">
      <div id="content">
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
		
		echo "<strong>Host Info:</strong> ".$mysqli->host_info . "<br>\n";
		echo "<strong>Client Info:</strong> ".$mysqli->client_info . "<br>\n";
		echo "<strong>Client Version:</strong> ".$mysqli->client_version . "<br>\n";
		echo "<strong>Protocol Version:</strong> ".$mysqli->protocol_version . "<br>\n";
		echo "<strong>Server Info:</strong> ".$mysqli->server_info . "<br>\n";
		echo "<strong>Server Version:</strong> ".$mysqli->server_version . "<br>\n";
		
		?>

		</div>
    </div>
  </body>
</html>
