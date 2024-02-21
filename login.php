<?php
require 'config.php';
if(!empty($_SESSION["id"])){
  header("Location: home.php");
}
if(isset($_POST["submit"])){
  $email = $_POST["email"];
  $password = $_POST["password"];
  $result = mysqli_query($conn, "SELECT * FROM tb_user WHERE name = '$name' OR email = '$email'");
 
  $row = mysqli_fetch_assoc($result);
  if(mysqli_num_rows($result) > 0){
    if($password == $row['password']){
      $_SESSION["login"] = true;
      $_SESSION["id"] = $row["id"];
      header("Location: index.php");
    }
    else{
      echo
      "<script> alert('Wrong Password'); </script>";
    }
  }
  else{
    echo
    "<script> alert('User Not Registered'); </script>";
  }
}
?>


<!DOCTYPE html>
<html>
  <head>
    <title>Tour and Travel Site Login</title>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
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
        width: 50%;
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
        background-color: #45a04;
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

  .first {
        background-color: #4caf50;
        color: white;
        padding: 12px 20px;
        border: none;
        border-radius: 4px;
        cursor: pointer;
        float: middle;
  }

  .second{
    background-color: #4caf50;
        color: white;
        padding: 12px 20px;
        border: none;
        border-radius: 4px;
        cursor: pointer;
        float: middle;
  }

  /* Style the links when hovered */
  a:hover {
    background-color: #45a049;
  }
    </style>
  </head>
  <body>
    <div class="container">
      <h2>Login Form</h2>
      <form class="" action="" method="post" autocomplete="off">
      <label for="usernameemail">Username or Email : </label>
      <input type="text" name="email" id = "email" required value=""> <br>
      <label for="password">Password : </label>
      <input type="password" name="password" id = "password" required value=""> <br>
      <button type="submit" name="submit">Login</button>
    </form>
    <br>
    <a href="admin.php" class="first">Admin</a>
    <a href="registration.php" class="second">Registration</a>
    </div>
  </body>
</html>