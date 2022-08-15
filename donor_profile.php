<?php

//this would be better as oop

//initialize variables
$profilepic = '';
$name = '';
$dob = '';
$donorinfo = '';
$contacts = '';

//get donor ID
$donorID = $_GET['id'];


$connect = mysqli_connect("localhost", "root", "", "qgiv_test");

		//get single donor
		$donor_query = "SELECT * FROM qgiv_test.`tbldonors` WHERE DonorID = ".$donorID;
		$results = mysqli_query( $connect, $donor_query);
		if( $results )
		{
			if( mysqli_num_rows( $results ) > 0 )
			{
				while( $row = mysqli_fetch_assoc( $results ) )
				{
					$profilepic = $row['ImageSmall'];
					$name = $row['Title'].' '.$row['FirstName'].' '.$row['LastName'].' ';
					$dob = date("F j, Y", strtotime($row['DOB'])); 
					
					//make sure birthdate and accountdate is formatted correctly
					$donorinfo = '<h3>Donor Information</h3>
						<p>
						Birthday: '.$dob.'<br/> '
						.'Age: '.$row['Age'].'<br/> '
						.'Gender: '.$row['Gender'].'<br/> '
						.'Member Since: '.$row['RegistrationDate'].'<br/> '
						.'Account Length: '.$row['RegistrationAge'].' years
						</p>'
						;
					
					$contacts = '<h3>Contacts</h3>
						<p>
						<strong> Email:</strong> '.$row['Email'].'<br/>'
						.'<strong>Primary Phone:</strong> '.$row['PrimaryPhone'].'<br/>'
						.'<strong>Cell Phone:</strong> '.$row['CellPhone'].'<br/>'
						.'<strong>Address:</strong> '.$row['Address1'].'<br/>'
								   .$row['City'].', '.$row['StateProvince'].' '.$row['PostalCode'].'<br/>'
								   .$row['Country'].'<br/>'
						.'<strong>Time Zone:</strong> '.$row['TimeZoneOffset'].' '.$row['TimeZoneDesc'].
						'</p>'
					;
				}
			}
		} 
				
?>
<!DOCTYPE html>
<html class="no-js" lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <meta name="viewport" content="width=device-width" />
    
    <title>Donor Profile</title>
	    
    <link rel="stylesheet" type="text/css" href="https://secure.qgiv.com/resources/admin/css/application.css" />

    <style type="text/css">
        .container{ max-width: 1200px; margin: 0 auto; }

        .logo-header{ padding: 2em; }
        .logo{ margin: 0 auto; min-height: 80px; }
    </style>
</head>
<body>
<section class="container">
		<h1>Donor Profile</h1>
		<p><a href="index.php"> Return Home</a></p>
		<div>
<?php
echo '<h2>'.$name.'</h2>';
echo '<img src="'.$profilepic.'" alt="profile picture" />';
echo $donorinfo;
echo $contacts; 
?>
		</div>
		<h1>Transactions</h1>
        <div class="data-table-container">
            <table class="data-table">
                <thead>
                    <tr>
						<th class="ui-secondary-color">Transaction ID</th>
						<th class="ui-secondary-color">Transaction Date</th>
						<th class="ui-secondary-color">Amount</th>
						<th class="ui-secondary-color">Payment Status</th>
						<th class="ui-secondary-color">Payment Method</th>
						<th class="ui-secondary-color">FundID</th>
						<th class="ui-secondary-color">Project Name</th>
						<th class="ui-secondary-color">Note</th>					
                    </tr>
                </thead>
                <tbody>
<?php
		//get transactions for donor
		$trans_query = "SELECT * FROM qgiv_test.`tbltransactions` WHERE DonorID = ".$donorID;
		$results2 = mysqli_query( $connect, $trans_query);
		if( $results2 )
		{
			if( mysqli_num_rows( $results2 ) > 0 )
			{
				while( $row2 = mysqli_fetch_assoc( $results2 ) )
				{

					//format date
					$transDate = date("m/d/Y",strtotime($row2['TimeStamp']));
					
					echo '<tr class="data-row">';
						echo "<td>" . $row2['TransID'] . "</td>";
						echo "<td>" . $transDate . "</td>";
						echo "<td>" .'$'. $row2['Amount'] . "</td>";
						echo "<td>" . $row2['PaymentStatus'] . "</td>";
						echo "<td>" . $row2['PaymentMethod'] . "</td>";
						echo "<td>" . $row2['FundID'] . "</td>";
						echo "<td>" . $row2['ProjectName'] . "</td>";
						echo "<td>" . $row2['Note'] . "</td>";
                    echo "</tr>"; 					
				}
			}
		}
?>
                </tbody>	
            </table>
        </div>
    </section>
</body>
</html>
