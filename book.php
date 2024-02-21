<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
        <!--Swiper css link-->
    <linkrel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.css"/>
        <!--Font Awesome Cdn link-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css"> 
        <!--CSS File link-->
    <link rel="stylesheet" href="css/style.css">
  
</head>
    <style>
      /* Add styles for the login form */
      body {
        font-family: Arial, sans-serif;
        background-color: #f2f2f2;
      }

      * {
        box-sizing: border-box;
      }

      .container {
        background-color: #ffffff;
        padding: 20px;
        border-radius: 5px;
        box-shadow: 0px 0px 5px #888888;
        margin: auto;
        width: 100%;
      }

      h2 {
        text-align: center;
      }

      input[type="text"],
      input[type="password"] {
        width: 100%;
        padding: 12px;
        margin: 8px 0;
        display: inline-block;
        border: 1px solid #ccc;
        border-radius: 4px;
        box-sizing: border-box;
      }

      button[type="submit"] {
        background-color: #4caf50;
        color: white;
        padding: 12px 20px;
        border: none;
        border-radius: 4px;
        cursor: pointer;
        float: right;
      }

      button[type="submit"]:hover {
        background-color: #45a049;
      }

      .cancelbtn {
        background-color: #f44336;
        color: white;
        padding: 12px 20px;
        border: none;
        border-radius: 4px;
        cursor: pointer;
        float: left;
      }

      .cancelbtn:hover {
        background-color: #dc143c;
      }

      .clearfix::after {
        content: "";
        clear: both;
        display: table;
      }
    </style>
  </head>



<body>
   <!--Header Section Starts-->
<section class="header">
  <a href="home.php" class ="logo">travel & tour</a>
  <nav class = "navbar">
    <a href = "home.php">home</a>
    <a href = "about.php">about</a>
    <a href = "package.php">package</a>
    <a href = "book.php">book</a>
    <a href = "booked_locations.php">Booked Locations</a>
    <a href = "review.php">Reviews</a>
    <a href = "logout.php">logout</a>

  </nav>
  
  <!--To bring Menu button #menu-btn.fas.fa-bars -->
  <div id="menu-btn" class="fas fa-bars"></div>

  
</section>

<h2>Booking From</h2>

<form method='POST' action="book_from.php">
  <label> Name: </label><br>
  <input type="text"  name="Name"><br>
  
  <label> Father_Name: </label><br>
  <input type="text"  name="Father_Name"><br>
  
  <label>Mother_Name : </label><br>
  <input type="text"  name="Mother_Name"><br>
  
  <label>Email_Address : </label><br>
  <input type="text"  name="email"><br>
  
    <td>
     Gender:
    </td>
    <td>
     <input type="radio"  name="Gender">male
     <input type="radio"  name="Gender">female
      <br>
    </td>

   <label>Age : </label><br>
  <input type="text"  name="Age"><br>
  
   <label>Profession: </label><br>
  <input type="text"  name="Profession"><br>

  
   <label>NID_Number  : </label><br>
  <input type="text"  name="NID_Number"><br>
  
   <label>Contract_Number : </label><br>
  <input type="text"  name="Contract_Number"><br>
  
  
   <label>Address : </label><br>
  <input type="text" name="Address"><br>
 
  <label> arrivals: </label><br>
  <input type="date" name="arrivals"><br>
  
  <label> leaving : </label><br>
  <input type="date" name="leaving"><br>
  
   <label> location : </label><br>
  <input type="text" name="location"><br><br>
  
   
 
 
  <input type="Submit" value="send">
  
</form>
</body>
</html>