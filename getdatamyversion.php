

<?php

//this script will connect to a database, send a query to extract data
//and then echo the acquired data in JSON

$host         = "localhost"; //server that has the database
$username     = "root"; 

$password     = "";

$dbname       = "hydrometer data";
$result_array = array();

/* Create connection */
$conn = new mysqli($host, $username, $password, $dbname);

/* Check connection  */
if ($conn->connect_error) {

     die("Connection to database failed: " . $conn->connect_error);
}



$sql = "SELECT reading,data FROM analogreadings ORDER BY reading DESC LIMIT 1";
//select the last entry in the table. 

$result = $conn->query($sql); //send a query stored in $sql to our database

/* If there are results from database push to result array */

if ($result->num_rows > 0) {
	//the 'num_rows' member data will find the number of rows read from the query

    while($row = $result->fetch_assoc()) {

        array_push($result_array, $row);
		//put the acquired data into an array

    }

}

/* send a JSON encded array to client */
echo json_encode($result_array); //encode our new array into JSON and echo it.

$conn->close();

?>