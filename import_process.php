<?php

//manipulate how many users to use (up to 500)
$unum = 1;
$unum = $_POST['importnum'];

echo $unum.' records generated<br/>';






//get users from random api
$userURL = 'https://randomuser.me/api/?results='.$unum.'&nat=us&exc=login,id,nat';
$json = file_get_contents($userURL);

//connect to database
$connect = mysqli_connect("localhost", "root", "", "qgiv_test");




//decode
$decoded = json_decode($json, false);

//initialize variable
$donorID = '';

//THIS WORKS!!! DO NOT DELETE
//loop through json results (not info) and insert users to database
foreach($decoded->results as $data){
	
	//format date
	$dobDate = date("Y-m-d",strtotime($data->dob->date));
	$regDate = date("Y-m-d",strtotime($data->registered->date));
	//address string
	$address = $data->location->street->number.' '.$data->location->street->name;
	
	$sql = "INSERT INTO qgiv_test.`tbldonors`( Title
, FirstName
, LastName
, Email
, PrimaryPhone
, CellPhone
, DOB
, Age
, Gender
, RegistrationDate
, RegistrationAge
, Address1
, City
, StateProvince
, PostalCode
, Country
, TimeZoneOffset
, TimeZoneDesc
, ImageSmall
, ImageLarge
, ImageThumbnail )
VALUES ( '".$data->name->title."'
, '".$data->name->first."'
, '".$data->name->last."'
, '".$data->email."'
, '".$data->phone."'
, '".$data->cell."'
, '".$dobDate."'
, '".$data->dob->age."'
, '".$data->gender."'
, '".$regDate."'
, '".$data->registered->age."'
, '".$address."'
, '".$data->location->city."'
, '".$data->location->state."'
, '".$data->location->postcode."'
, '".$data->location->country."'
, '".$data->location->timezone->offset."'
, '".$data->location->timezone->description."'
, '".$data->picture->large."'
, '".$data->picture->medium."'
, '".$data->picture->thumbnail."'
)";
	$results = mysqli_query($connect, $sql);

	
//generate a transaction with sample data

		//Make transaction timestamp the fun/complicated way 
		/*or comment this out and just use mySQL CURDATE() function within the query value
		--if you want to get really fancy you should compare user info so all the transactions take place
		between the current year and the registration date... but that seems like a feature for a later time.
		*/
		$Y = mt_rand(1908,2021);
		$m = mt_rand(1,12);
		$d = mt_rand(1,30);
		$H = mt_rand(1,24);
		$i = mt_rand(1,60);
		$s = mt_rand(1,60);
		$date = $Y.'-'.$m.'-'.$d.' '.$H.':'.$i.':'.$s;

		$timeStamp = date("Y-m-d H:i:s", strtotime($date));
	
		//generate random transaction amount between 1.00 and 1000.00
		$amount = mt_rand(100, 100000) / 100;
		
		//use array to call a "random" somewhat arbitrary status
		$statOptions = array(
			  'Invalid'
			, 'Canceled'
			, 'Declined'
			, 'Authorized'
		);
		$payStatus = $statOptions[ mt_rand(0,3) ];
		
		//use array to call a "random" somewhat arbitrary payment method
		$payTypes = array(
			  'Visa'
			, 'Mastercard'
			, 'Discover'
			, 'American Express'
			, 'eCheck'
			, 'Paypal'
			, 'Cash'
		);
		$paymentMethod = $payTypes[ mt_rand(0,6) ];
		
		//arbitrary transaction fundid, projectname, and notes determined by dice roll
		$dice = mt_rand(0,5);

		switch ($dice){
			case 0:
				$fundid = 'GIFT0034';
				$projectname = 'Mike Green Support';
				$note = 'Good work Mike! Hope this helps';
			break;
			case 1:
				$fundid = 'FUND2745';
				$projectname = 'Jenny Bowdy Fundraiser';
				$note = 'Love you Jenny';
			break;
			case 2:
				$fundid = 'CAMP9421';
				$projectname = 'Feed the Hungry Campaign';
				$note = 'Love what you guys do';
			break;
			case 3:
				$fundid = 'FUND1323';
				$projectname = 'Building Fundraiser';
				$note = 'Awesome blueprints and vision!';
			break;
			case 4:
				$fundid = 'YEND2020';
				$projectname = 'Year End Giving';
				$note = 'Just in time for taxes!!';
			break;
			case 5:
				$fundid = 'CAMP8831';
				$projectname = 'Wellness Center Campaign';
				$note = 'To help with the community fitness program';
			break;
			default:
				$fundid = 'GENR2022';
				$projectname = 'General Donations';
				$note = 'Please use this wherever it helps most';
		}
		
		
		//get donorID from newly imported record
		$sql_donorID = "SELECT * FROM qgiv_test.`tbldonors` WHERE email =  '".$data->email."'";
		
		
		//$get_donorID = mysqli_query($connect, $sql_donorID);
		$donor_check = mysqli_query( $connect, $sql_donorID );
		if( $donor_check )
		{
			if( mysqli_num_rows( $donor_check ) > 0 )
			{
				while( $row = mysqli_fetch_assoc( $donor_check ) )
				{
					$donorID = $row[ 'DonorID' ];
				}
			}
		}

		
//insert transaction to transaction table
$sql_insert_trans = "INSERT INTO qgiv_test.tbltransactions (DonorID
, TIMESTAMP
, Amount
, PaymentStatus
, PaymentMethod
, FundID
, ProjectName
, Anonymous
, Note )
VALUES ('".$donorID."'
, '".$timeStamp."'
, '".$amount."'
, '".$payStatus."'
, '".$paymentMethod."'
, '".$fundid."'
, '".$projectname."'
, 0
, '".$note."'
)";

$insert_trans = mysqli_query($connect, $sql_insert_trans);



}

echo 'success<br/>';

echo '<a href="index.php"> Return Home</a>';

?>