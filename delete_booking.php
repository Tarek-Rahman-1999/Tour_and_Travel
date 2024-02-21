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

// Check if form is submitted
if(isset($_POST['delete'])) {
    $NID_Number = $_POST['NID_Number'];

    // Delete booking record from the database
    $sql = "DELETE FROM booking_from WHERE NID_Number=$NID_Number";

    if ($conn->query($sql) === TRUE) {
        echo "Record deleted successfully";
    } else {
        echo "Error deleting record: " . $conn->error;
    }
}

// Get booking record from the database
if(isset($_GET['NID_Number'])) {
    $NID_Number = $_GET['NID_Number'];

    $sql = "SELECT * FROM booking_from WHERE NID_Number=$NID_Number";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $Name = $row['Name'];
        $NID_Number = $row['NID_Number'];
    } else {
        echo "No booking found with NID number $nid";
        exit;
    }
} else {
    echo "No NID number provided";
    exit;
}

$conn->close();
?>

<!DOCTYPE html>
<html>
<head>
    <title>Delete Booking</title>
</head>
<body>
    <h1>Delete Booking</h1>
    <p>Are you sure you want to delete the following booking?</p>
    <p><strong>Name:</strong> <?php echo $Name; ?></p>
    <p><strong>NID Number:</strong> <?php echo $NID_Number; ?></p>
    <form method="POST" action="delete_booking.php">
        <input type="hidden" name="NID_Number" value="<?php echo $NID_Number; ?>">
        <input type="submit" name="delete" value="Delete">
        <input type="button" value="Cancel" onclick="window.location.href='booking_list.php'">
    </form>
</body>
</html>
