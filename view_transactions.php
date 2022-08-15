<?php

$donors = array();

$connect = mysqli_connect("localhost", "root", "", "qgiv_test");

		//get donors from database
		$transaction_query = "SELECT * FROM qgiv_test.`tbltransactions`";
		$results = mysqli_query( $connect, $transaction_query);

?>

<!DOCTYPE html>
<html class="no-js" lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <meta name="viewport" content="width=device-width" />
    
    <title>Transaction Table</title>
	    
    <link rel="stylesheet" type="text/css" href="https://secure.qgiv.com/resources/admin/css/application.css" />

    <style type="text/css">
        .container{ max-width: 1200px; margin: 0 auto; }

        .logo-header{ padding: 2em; }
        .logo{ margin: 0 auto; min-height: 80px; }
    </style>
</head>

<body>
    <section class="container">
        <h1>Transactions</h1>
		<p><a href="index.php"> Return Home</a></p>
        <div class="data-table-container">
            <table class="data-table">
                <thead>
                    <tr>
						<th class="ui-secondary-color">Transaction ID</th>
                        <th class="ui-secondary-color">Donor ID</th>
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
		if( $results )
		{
			if( mysqli_num_rows( $results ) > 0 )
			{
				while( $row = mysqli_fetch_assoc( $results ) )
				{

					//format date
					$transDate = date("m/d/Y",strtotime($row['TimeStamp']));
					
					//link to user view
					$seturl = 'http://localhost/qgiv_carr/donor_profile.php?id='.$row['DonorID'];
					$viewDonorURL = '<a href="'.$seturl.'">'. $row['DonorID'] .'</a>';

					echo '<tr class="data-row">';
						echo "<td>" . $row['TransID'] . "</td>";
						echo "<td>" . $viewDonorURL ."</td>";
						echo "<td>" . $transDate . "</td>";
						echo "<td>" .'$'. $row['Amount'] . "</td>";
						echo "<td>" . $row['PaymentStatus'] . "</td>";
						echo "<td>" . $row['PaymentMethod'] . "</td>";
						echo "<td>" . $row['FundID'] . "</td>";
						echo "<td>" . $row['ProjectName'] . "</td>";
						echo "<td>" . $row['Note'] . "</td>";
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
