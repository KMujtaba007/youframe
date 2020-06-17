<?php

session_start();

$servername = "localhost";
$username = "root";
$password = "root";
$dbname = "gallery";

$conn = mysqli_connect($servername, $username, $password, $dbname);

$name = $_POST['user'];
$pass = $_POST['password'];

//User Registration
$sql = "SELECT * FROM userdata where name = '$name'";

$result = mysqli_query($conn, $sql);

$num = mysqli_num_rows($result);

if($num == 1){
  echo "Username already exists";
  exit();
}else{
  $reg = "INSERT INTO userdata values ('$name','$pass')";
  mysqli_query($conn, $reg);
  echo "Registration successful";
  header('Location: signin.php');
}
//User Registration ends

?>
