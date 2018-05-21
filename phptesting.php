<html>
	<head>
		<title>ESP8266 LED Control</title>
	</head>
	<body>
	
	<!-- in the <button> tags below the ID attribute is the value sent to the arduino -->
	
	<button id="Toggle11" class="led">Toggle Pin 11</button> <!-- button for pin 11 -->
	<button id="12" class="led">Toggle Pin 12</button> <!-- button for pin 12 -->
		

    <p>

	
	<?php 
	$servername = "localhost";
	$username = "root";
	$password = "";
	$dbname = "hydrometer data";
	
	//create a connection to the database
	
	$conn = new mysqli($servername, $username, $password, $dbname);

	//check to see if it connected successfully
	
	if ($conn->connect_error) {
		die("connection failed: " . $conn->connect_error);
	}
	
	    if(!empty($_POST['reading']) && !empty($_POST['data']))
    {
    	$reading = $_POST['reading'];
    	$data = $_POST['data'];
 
	    $sql = "INSERT INTO analogreadings (data, reading)
		
		VALUES ('".$data."', '".$reading."')";
 
		if ($conn->query($sql) === TRUE) {
		    echo "OK";
		} else {
		    echo "Error: " . $sql . "<br>" . $conn->error;
		}
	}

	?>
	</p>
	</body>
</html>