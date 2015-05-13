<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bluemix PHP Sendgrid</title>
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
		require 'vendor/autoload.php';
		$services = getenv("VCAP_SERVICES"); 
		$services_json = json_decode($services,true);
		$sendgrid_config = $services_json["sendgrid"][0]["credentials"]; 

		if (!empty($_POST)) {
			$sendgrid = new SendGrid($sendgrid_config["username"], $sendgrid_config["password"]);
			$email    = new SendGrid\Email();
			$email->addTo("andy.vandenheuvel@gmail.com")
			      ->setFrom("info@craftworks.co")
			      ->setSubject("Craftworkz mail")
			      ->setHtml("Hello craftworkz!");
			$sendgrid->send($email);
			echo "Mail succesfully send!";		
		}
	?>	

	<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
	<input name="submit" type="submit" value="send mail">
	</form>
      </div>
    </div>
  </body>
</html>
