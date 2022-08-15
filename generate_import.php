<?php
?>
<!DOCTYPE html>
<html class="no-js" lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <meta name="viewport" content="width=device-width" />
    
    <title>Donor Table</title>
	    
    <link rel="stylesheet" type="text/css" href="https://secure.qgiv.com/resources/admin/css/application.css" />

    <style type="text/css">
        .container{ max-width: 1200px; margin: 0 auto; }

        .logo-header{ padding: 2em; }
        .logo{ margin: 0 auto; min-height: 80px; }
    </style>
</head> 
<body>
	<section class="container">
		<h1>Generate Users and Transactions</h1>
		<h3>Create sample users and transactions</h3>
		<form action="import_process.php" method="post">
		How many users would you like to generate? (max 500) <input type="number" name="importnum" max="500"><br>
		<input type="submit">
		
		<br/><br/>
		<a href="index.php"> Return Home</a>
	</section>
</body>
</html>

