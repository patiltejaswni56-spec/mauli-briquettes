<?php
session_start();
include "db.php";


if(isset($_SESSION['admin']))
{
    header("Location: dashboard.php");
    exit();
}

if(isset($_POST['login']))
{
    $username = $_POST['username'];
    $password = $_POST['password'];

    $query = mysqli_query($conn,
    "SELECT * FROM admin
    WHERE username='$username'
    AND password ='$password'");

    if(mysqli_num_rows($query)>0)
    {
        $_SESSION['admin']=$username;
        header("Location: dashboard.php");
        exit();
    }
    else
    {
        $msg="Invalid Username or Password";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
<title>Admin Login</title>

<style>
body{
    font-family:Arial;
    background:#f4f4f4;
}

.buy-container{
    display:flex;
    justify-content:center;
    align-items:center;
    height:100vh;
}

.buy-box{
    background:white;
    padding:30px;
    border-radius:10px;
    box-shadow:0 0 10px #ccc;
    text-align:center;
}

input{
    width:250px;
    padding:10px;
    margin:10px 0;
}

button{
    background:green;
    color:white;
    padding:10px 20px;
    border:none;
    cursor:pointer;
}
</style>

</head>

<body>

<div class="buy-container">

<div class="buy-box">

<h2>Admin Login</h2>
<div style="text-align:left; margin-bottom:10px;">
    <a href="index.php" style="text-decoration:none; color:#14532d; font-weight:bold;">
        ⬅ Back to Home
    </a>
</div>

<?php if(isset($msg)) echo "<p style='color:red;'>$msg</p>"; ?>

<form method="POST" autocomplete="off">

<input type="text"
name="username"
placeholder="Enter Username"
autocomplete="off"
required>
<br>

<input type="password"
name="password"
placeholder="Enter Password"
autocomplete="new-password"
required>
<br>

<button type="submit" name="login">Login</button>

</form>

</div>

</div>

</body>
</html>