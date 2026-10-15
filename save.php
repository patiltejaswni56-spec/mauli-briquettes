<?php
include("db.php");

$name = $_POST['name'];
$email = $_POST['email'];
$mobile = $_POST['mobile'];
$password = $_POST['password'];

$sql = "INSERT INTO users(name,email,mobile,password)
VALUES('$name','$email','$mobile','$password')";

$result = mysqli_query($conn, $sql);

if($result)
{
    header("Location: login.php");
    exit();
}
else
{
    echo "Registration Failed <br>";
    echo mysqli_error($conn);
}
?>