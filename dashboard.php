<?php
require 'config.php';

// Get the number of registered users
$result = mysqli_query($conn, "SELECT COUNT(*) AS num_users FROM tb_user");
$row = mysqli_fetch_assoc($result);
$num_users = $row['num_users'];

// Get the number of bookings
$result = mysqli_query($conn, "SELECT COUNT(*) AS num_bookings FROM booking_from");
$row = mysqli_fetch_assoc($result);
$num_bookings = $row['num_bookings'];

// // Get the total revenue
// $result = mysqli_query($conn, "SELECT SUM(amount) AS total_revenue FROM tb_payment");
// $row = mysqli_fetch_assoc($result);
// $total_revenue = $row['total_revenue'];


// Connect to the database

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Page</title>
        <!--Swiper css link-->
    <linkrel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.css"/>
        <!--Font Awesome Cdn link-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css"> 
        <!--CSS File link-->
    <link rel="stylesheet" href="css/style.css">
  
</head>
<body>
           <!--Header Section Starts-->
<section class="header">
<a href="dashboard.php" class ="logo">travel & tour</a>
  <nav class = "navbar">
    <a href = "dashboard.php">Dashboard</a>
    <a href = "admin.php">Add location</a>
    <a href = "package.php">package</a>
    <a href = "booked_locations.php">Booked location</a>
    <a href = "review.php">Reviews</a>
    <a href = "logout.php">logout</a>
  

  </nav>
  
  <!--To bring Menu button #menu-btn.fas.fa-bars -->
  <div id="menu-btn" class="fas fa-bars"></div>

  
</section>
	<h1>Dashboard</h1>
	<h2>Overview</h2>
	<p>Number of registered users: <?php echo $num_users; ?></p>
	<p>Number of bookings: <?php echo $num_bookings; ?></p>
	<p>Total revenue: <?php echo $total_revenue; ?></p>
</body>
</html>

<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "reglog";
$conn = new mysqli($servername, $username, $password, $dbname);

// Query the database to retrieve all bookings
$sql = "SELECT * FROM booking_from";
$result = $conn->query($sql);

// Display the bookings in a table format
echo "<table>";
echo "<tr><th>Name</th><th>Email</th><th>Arrivals</th><th>Leaving</th><th>Location</th><th>Actions</th></tr>";
while($row = $result->fetch_assoc()) {
    echo "<tr>";
    echo "<td>".$row['Name']."</td>";
    echo "<td>".$row['email']."</td>";
    echo "<td>".$row['arrivals']."</td>";
    echo "<td>".$row['leaving']."</td>";
    echo "<td>".$row['location']."</td>";
    echo "<td>";
    echo "<a href='edit_booking.php?NID_Number=".$row['NID_Number']."'>Edit</a> ";
    echo "<a href='delete_booking.php?NID_Number=".$row['NID_Number']."' onclick='return confirm(\"Are you sure you want to delete this booking?\")'>Delete</a>";
    echo "</td>";
    echo "</tr>";
}
echo "</table>";

$conn->close();
?>
