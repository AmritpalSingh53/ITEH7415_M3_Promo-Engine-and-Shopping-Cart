<?php
	// include config file
	require_once 'config.php';

	//a PHP Super Global variable which used to collect data after submitting it from the form
	// Sanitize fist the values of this variable
	$request = sanitize($_REQUEST);

	// Validate the data
	$validation = validate($request, [
		'coupon-code' => 'required|max:25'
	]);

	// Defined $result as array
	$result = [];

	// Check if no validation errors
	if(!count($validation)):

		// Connect to database
		$db = connectDB();

		// Set the INSERT SQL data
		$sql = "SELECT * FROM coupons WHERE name='".$request['coupon-code']."' AND status='0'";

		// Process the query
		$results = $db->query($sql);

		// Fetch Associative array
		$row = $results->fetch_assoc();

		// Check if coupon code still active
		if(!is_null($row)):
			// Set the UPDATE SQL data for coupon code to inactive after using it
			$sql = "UPDATE coupons SET status='1' WHERE id='".$row['id']."'";
			
			// Process the query
			if ($db->query($sql)) {
				
			  	$result['response'] = "Coupon code succesfully varified!";
				
			} else {
				$result['response'] = "Error: " . $sql . "<br>" . $db->error;
			}
		else:
			$result['has_error'] = 1;
			$result['errors']['coupon-code'] = [
				"used" => "Invalid Coupon code!"
			];
		endif;

		// Close the connection after using it
		$db->close();
	else:
		$result['has_error'] = 1;
	   	$result['errors'] = $validation;
	endif;

	// Encode array into json format
	echo json_encode($result);


?>