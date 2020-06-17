<?php
session_start();

$servername = "localhost";
$username = "root";
$password = "root";
$dbname = "gallery";

$conn = mysqli_connect($servername, $username, $password, $dbname);

$name = $_POST['user'];
$pass = $_POST['password'];

$sql = "SELECT * FROM userdata where name = '$name' && password = '$pass'";
$result = mysqli_query($conn, $sql);

$num = mysqli_num_rows($result);

if($num == 1){
  $_SESSION['user'] = $name;
  header("Location: ../index.php");
}else{
  header('Location: signin.php');
}

?>
