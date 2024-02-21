<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "reglog";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

//collect data from html
$Name = $_POST['Name'];
$Father_Name = $_POST['Father_Name'];
$Mother_Name = $_POST['Mother_Name'];
$email = $_POST['email'];
$Gender = $_POST['Gender'];
$Age = $_POST['Age'];
$Profession = $_POST['Profession'];
$NID_Number = $_POST['NID_Number'];
$Contract_Number = $_POST['Contract_Number'];

$Address = $_POST['Address'];
$arrivals = $_POST['arrivals'];
$leaving = $_POST['leaving'];
$location = $_POST['location'];


//mysql
$sql = "INSERT INTO booking_from(Name,Father_Name,Mother_Name,email,Gender,Age,Profession,NID_Number,Contract_Number,Address,arrivals,leaving,location )
VALUES ('$Name','$Father_Name','$Mother_Name','$email','$Gender','$Age','$Profession','$NID_Number','$Contract_Number','$Address','$arrivals','$leaving','$location')";

if ($conn->query($sql) === TRUE) {
  echo "New record created successfully";
} else {
  echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>

