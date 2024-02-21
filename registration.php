<?php
require 'config.php';
if(!empty($_SESSION["id"])){
  header("Location: index.php");
}

if(isset($_POST["submit"])){
  $name = $_POST["name"];  
  $email = $_POST["email"];
  $contract = $_POST["contract"]; 
  $nid = $_POST["nid"];
  $address = $_POST["address"];
  $password = $_POST["password"];
  $confirmpassword = $_POST["confirmpassword"];
  $duplicate = mysqli_query($conn, "SELECT * FROM tb_user WHERE name = '$name' OR email = '$email'");
  if(mysqli_num_rows($duplicate) > 0){
    echo
    "<script> alert('Username or Email Has Already Taken'); </script>";
  }
  else{
    if($password == $confirmpassword){
      $query = "INSERT INTO tb_user VALUES('','$name','$email','$contract','$nid','$address','$password')";
      mysqli_query($conn, $query);
      echo
      "<script> alert('Registration Successful'); </script>";
    }
    else{
      echo
      "<script> alert('Password Does Not Match'); </script>";
    }
  }
}
?>

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

<h2>Registration From</h2>

<form class="" action="" method="post" autocomplete="off">
      <label for="name">Name : </label>
      <input type="text" name="name" id = "name" required value=""> <br>  

      <label for="email">Email : </label>
      <input type="text" name="email" id = "email" required value=""> <br>

      <label for="name">Contract Number : </label>
      <input type="text" name="contract" id = "contract" required value=""> <br>  

      <label for="name">NID : </label>
      <input type="text" name="nid" id = "nid" required value=""> <br> 

      <label for="name">Address: </label>
      <input type="text" name="address" id = "address" required value=""> <br> 

      <label for="password">Password : </label>
      <input type="password" name="password" id = "password" required value=""> <br>

      <label for="confirmpassword">Confirm Password : </label>
      <input type="password" name="confirmpassword" id = "confirmpassword" required value=""> <br>

      <button type="submit" name="submit">Register</button>
    </form>
    <br>
    <a  href="login.php">Login</a>
</body>
</html>
