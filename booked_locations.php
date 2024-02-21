<!DOCTYPE html>
<html lang="en">
<head>
<body>

 
<h1><b>Booked Location</b></h1>
    
</body>
</html>
<?php

$servername = "localhost";
$username ="root";
$password ="";
$dbname = "reglog";

//Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
//Check connection

if($conn->connect_error){
	die("Connection failed: " . $conn->connect_error);
}
else {
	echo "";
}
$sql = "SELECT * FROM booking_from";
$result = $conn-> query($sql);
if($result->num_rows>0){
	echo "<table border = '5' style = 'border-collapse: collapse'>
	<tr>
	<th>Name</th>
	<th>Email_Address</th>
	<th>NID_Number</th>
    <th>Arrivals</th>
	<th>leaving</th>
	<th>location</th>
	</tr>";
	//output data of each row
	while($row = $result->fetch_assoc())
	{ echo  "<tr>
       <td>".$row["Name"]."</td>
	   <td>".$row["email"]."</td>
	   <td>".$row["NID_Number"]."</td>
       <td>".$row["arrivals"]."</td>
	   <td>".$row["leaving"]."</td>
	   <td>".$row["location"]."</td>
	   </tr>";
	}echo "</table>";
}
else { echo " 0 results";
}

$conn->close();
?>
