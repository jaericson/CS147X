<!DOCTYPE html> 
<html>

<head>
	<title>VoteCaster | Submit</title> 
	<meta charset="utf-8">
	<meta name="apple-mobile-web-app-capable" content="yes">
 	<meta name="apple-mobile-web-app-status-bar-style" content="black">
	<meta name="viewport" content="width=device-width, initial-scale=1"> 

	<link rel="stylesheet" href="jquery.mobile-1.2.0.css" />
	<link rel="stylesheet" href="style.css" />
	<link rel="apple-touch-icon" href="appicon.png" />
	<link rel="apple-touch-startup-image" href="startup.png">
	
	<script src="jquery-1.8.2.min.js"></script>
	<script src="jquery.mobile-1.2.0.js"></script>

</head> 
<body> 

<div data-role="page">

	<div data-role="header">
		<h1>My Title</h1>
		<a href="#" data-icon="check" id="logout" class="ui-btn-right">Logout</a>

	</div><!-- /header -->

	<div data-role="content">	
		
	
	
	<?php

include("config.php");

$username = mysql_real_escape_string($_POST['username']);
$password = md5(mysql_real_escape_string($_POST['password']));

if (!isset($username) || !isset($password)) {

    echo("Sorry, nothing set!");
    
}

elseif (empty($username) || empty($password)) {
	
    echo("Sorry, everything empty!");
    
} else {
	
    $result   = mysql_query("select * from users where username='$username' AND password='$password'");
    $rowCheck = mysql_num_rows($result);
    if ($rowCheck > 0) {
        echo "<p>Thank you, <strong>".$_POST["username"]."</strong>. You are now logged in.</p>";
        
    } else {
			echo "<p>There seems to have been an error.</p>";
		}
}

?> 
	


	
	
	</div><!-- /content -->

	<?php include("footer.php"); ?>
	
	<script type="text/javascript">
		$("#logout").click(function() {
			localStorage.removeItem('username');
			$("#form").show();
			$("#logout").hide();
		});
	</script>
</div><!-- /page -->

</body>
</html>