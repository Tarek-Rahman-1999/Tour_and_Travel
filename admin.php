<?php
// session_start();
// if(!isset($_SESSION["admin"])) {
//     header("location: login.php");
//     exit();
// }

require_once("config.php");

if(isset($_POST["add_destination"])) {
    $destination = $_POST["destination"];
    $description = $_POST["description"];
    $image_url = $_POST["image_url"];

    // Add the new destination to the database
    $stmt = $conn->prepare("INSERT INTO destinations (destination, description, image_url) VALUES (?, ?, ?)");
    $stmt->bind_param("sss", $destination, $description, $image_url);
    $stmt->execute();
    $stmt->close();
}
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
    <h1>Admin Page for Adding Location</h1>
    <p>Welcome Admin</p>

    <form method="post" action="admin.php">
        <label for="destination">Destination:</label>
        <input type="text" id="destination" name="destination" required><br>

        <label for="description">Description:</label>
        <textarea id="description" name="description" required></textarea><br>

        <label for="image_url">Image URL:</label>
        <input type="url" id="image_url" name="image_url" required><br>

        <input type="submit" name="add_destination" value="Add Destination">
    </form>

    <br>

    <a href="logout.php">Logout</a>
</body>
</html>
