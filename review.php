<!DOCTYPE html>
<html>
<head>
    <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Review Page</title>
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
  <a href="home.php" class ="logo">travel & tour</a>
  <nav class = "navbar">
    <a href = "home.php">home</a>
    <a href = "about.php">about</a>
    <a href = "package.php">package</a>
    <a href = "booked_locations.php">Booked location</a>
    <a href = "review.php">Reviews</a>
    <a href = "logout.php">logout</a>
    <a href = "admin.php">Admin</a>

  </nav>
  
  <!--To bring Menu button #menu-btn.fas.fa-bars -->
  <div id="menu-btn" class="fas fa-bars"></div>

  
</section>
	
	<style>
		body {
			background-color: #f2f2f2;
			font-family: Arial, sans-serif;
		}
		.container {
			max-width: 800px;
			margin: auto;
			padding: 25px;
			background-color: white;
			box-shadow: 0px 0px 10px rgba(0,0,0,0.2);
			border-radius: 5px;
			box-sizing: border-box;
		}
		h1 {
			text-align: center;
			margin-top: 0;
		}
		form {
			display: flex;
			flex-direction: column;
			align-items: center;
		}
		input[type="text"], textarea {
			width: 100%;
			padding: 12px;
			margin: 8px 0;
			box-sizing: border-box;
			border: 2px solid #ccc;
			border-radius: 4px;
			background-color: white;
			resize: vertical;
		}
		input[type="submit"] {
			background-color: #4CAF50;
			color: white;
			padding: 12px 20px;
			border: none;
			border-radius: 4px;
			cursor: pointer;
		}
		input[type="submit"]:hover {
			background-color: #45a049;
		}
		.review {
			margin-bottom: 20px;
			padding: 10px;
			background-color: #f9f9f9;
			border: 1px solid #ddd;
			border-radius: 5px;
			box-shadow: 0px 0px 5px rgba(0,0,0,0.1);
			font-size: 16px;
		}
		.review h3 {
			margin-top: 0;
		}
		.review p {
			margin-bottom: 0;
		}
        
	</style>
</head>
<body>
	<div class="container">
		<h1>Reviews</h1>
		<form method="post" action="save_review.php">
			<label for="name"><h3>Name:</h3></label>
			<input type="text" id="name" name="name" placeholder="Your name.." required>

			<label for="email"><h3>Email:</h3></label>
			<input type="text" id="email" name="email" placeholder="Your email.." required>
            
           
			<label for="review"><h3>Review:</h3></label>
			<textarea id="review" name="review" placeholder="Write your review.." required></textarea>

			<input type="submit" value="Submit">
		</form>

		<?php
		require 'config.php';
		$sql = "SELECT * FROM reviews ORDER BY created_at DESC";
		$result = $conn->query($sql);

		if ($result->num_rows > 0) {
			while($row = $result->fetch_assoc()) {
				echo '<div class="review">';
				echo '<h3>' . $row["name"] . '</h3>';
				echo '<p>' . $row["review"] . '</p>';
                // echo '<p>' . $row["email"] . '</p>';
				echo '<p>' . $row["created_at"] . '</p>';
				echo '</div>';
			}
		} else {
			echo '<p>No reviews found.</p>';
		}
		$conn->close();
		?>
	</div>
</body>
</html>
