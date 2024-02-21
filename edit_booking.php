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
if(isset($_POST['update'])) {
    // $booking_id = $_POST['booking_id'];
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
    $location = mysqli_real_escape_string($conn, $_POST['location']);

    // Update booking record in the database
    $sql = "UPDATE booking_from SET Name='$Name', Father_Name='$Father_Name', Mother_Name='$Mother_Name', email='$email', Gender='$Gender', Age='$Age', Profession='$Profession', NID_Number='$NID_Number', Contract_Number='$Contract_Number', Address='$Address', arrivals='$arrivals', leaving='$leaving', location='$location' WHERE NID_Number=$NID_Number";

    if ($conn->query($sql) === TRUE) {
        echo "Record updated successfully";
    } else {
        echo "Error updating record: " . $conn->error;
    }
}

// Get booking record from the database
if(isset($_GET['NID_Number'])) {
    $nid = $_GET['NID_Number'];

    $sql = "SELECT * FROM booking_from WHERE NID_Number=$nid";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        // $booking_id = $row['booking_id'];
        $Name = $row['Name'];
        $Father_Name = $row['Father_Name'];
        $Mother_Name = $row['Mother_Name'];
        $email = $row['email'];
        $Gender = $row['Gender'];
        $Age = $row['Age'];
        $Profession = $row['Profession'];
        $NID_Number = $row['NID_Number'];
        $Contract_Number = $row['Contract_Number'];
        $Address = $row['Address'];
        $arrivals = $row['arrivals'];
        $leaving = $row['leaving'];
        $location = $row['location'];
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
    <title>Edit Booking</title>
</head>
<body>
    <h1>Edit Booking</h1>
    <form method="POST" action="edit_booking.php">
        <input type="hidden" name="booking_id" value="<?php echo $booking_id; ?>">
        <label>Name:</label><br>
        <input type="text" name="Name" value="<?php echo $Name; ?>"><br>

        <label>Father's Name:</label><br>
        <input type="text" name="Father_Name" value="<?php echo $Father_Name;?>"><br>

        <label>Mother's Name:</label><br>
        <input type="text" name="Mother_Name" value="<?php echo $Mother_Name; ?>"><br>

        <label>Email:</label><br>
        <input type="email" name="email" value="<?php echo $email; ?>"><br>

        <label>Gender:</label><br>
        <input type="radio" name="Gender" value="Male" <?php if($Gender == "Male") echo "checked"; ?>> Male
        <input type="radio" name="Gender" value="Female" <?php if($Gender == "Female") echo "checked"; ?>> Female<br>

        <label>Age:</label><br>
        <input type="number" name="Age" value="<?php echo $Age; ?>"><br>

        <label>Profession:</label><br>
        <input type="text" name="Profession" value="<?php echo $Profession; ?>"><br>

        <label>NID Number:</label><br>
        <input type="text" name="NID_Number" value="<?php echo $NID_Number; ?>"><br>

        <label>Contact Number:</label><br>
        <input type="text" name="Contract_Number" value="<?php echo $Contract_Number; ?>"><br>

        <label>Address:</label><br>
        <textarea name="Address"><?php echo $Address; ?></textarea><br>

        <label>Arrival Date:</label><br>
        <input type="date" name="arrivals" value="<?php echo $arrivals; ?>"><br>

        <label>Leaving Date:</label><br>
        <input type="date" name="leaving" value="<?php echo $leaving; ?>"><br>

        <label>Location:</label><br>
        <input type="text" name="location" value="<?php echo $location; ?>"><br>

        <input type="submit" name="update" value="Update">
</form>
</body>
</html>
