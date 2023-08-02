<?php
//$GLOBALS=$logged='false';

$user = 'root';
$pass = '';
$db = 'project';
$conn = new mysqli('localhost', $user, $pass, $db);
if ($conn->connect_error) {
    die . ("Connection failed : " . $conn->connect_error);
}

if (isset($_POST['log'])) {
//    if (empty($_POST['nameu'])) {
//        echo "<script>alert('Please enter Username')</script>";
//    } else if (empty($_POST['pass'])) {
//        echo "<script>alert('Please enter Password')</script>"};
     if (!empty($_POST['nameu']) && !empty($_POST['pass'])) {
        $password = $_POST['pass'];
        $admin = $_POST['nameu'];
        //$logged=$_POST['log'];
        $sqlA = "SELECT * FROM `admin` where `admin-name` ='$admin' && `password`= $password";
        $nameA = mysqli_query($conn, $sqlA);
        if ($nameA->num_rows != 0 ) {
            echo "<script>window.location='admin.php'</script>";
        }
        elseif($nameA->num_rows == 0 ){
            $password = $_POST['pass'];
            $admin = $_POST['nameu'];
            $sqlA2 = "SELECT * FROM `customer` where `name` ='$admin' && `pass`= $password";
            $nameb = mysqli_query($conn, $sqlA2);
            if ($nameb->num_rows != 0 ){
                $_POST['log']='true';
                echo "<script>alert('welcome {$admin}')</script>";
                echo "<script>window.location='Home1.html'</script>";
            }
        }
        else{
            echo "<script>alert('Username or Password is invalide')</script>";
        }


}
}
        ?>

<html lang="en">
<head>
    <title>Login</title>
    <link rel="icon" href="imgs/logo2.png" type="image/gif">
    <link rel="stylesheet" href="mystyle.css">
    <link rel="stylesheet" type="text/css" href="login.css">
</head>
<body>
<header id="h">

<span  class=logo><img src="imgs/logo2.png" alt="" id="logo1" height="45" width="200">
        </span>
    <nav id="nav">
        <ul class="nav-links">
            <li><a href="Home1.html">HOME</a></li>
            <li><a href="flav-cart.php">FLAVOURS<ion-icon name="ice-cream-outline"></ion-icon></a></li>
            <li><a href="blog.html">BOLG<ion-icon name="cafe-outline"></ion-icon></a></li>
            <li><a href="Home1.html #ft">CONTACT<ion-icon name="analytics-outline"></ion-icon>
                </a></li>
            <li class="cart">
                <a href="flav-cart.php#cart">
                    <ion-icon name="basket"></ion-icon>CART   <span></span>
                </a>
            </li>

            <!--  <li> <img src="imgs/logo2.png" alt="" id="logo1" height="45" width="200"></li> -->



        </ul>
        <div class="mini">
            <div class="line1"></div>
            <div class="line2"></div>
            <div class="line3"></div>
        </div>
    </nav>
</header>
<div class="login-box">
    <img src="imgs/avatar.png" class="avatar">
    <h1>Login Here</h1>
    <form method="post"  name="Form" action="login.php">
        <p class="lo">Username</p>
        <input id=" nameu" type="text" name="nameu" required>
        <p class="lo">Password</p>
        <input id="pass" type="password" name="pass" required >
        <input type="submit" value="login" id="log" name="log" >

<!--       <input type="submit" name="submit" value="Login">-->
<!--       <button value="login" id="log"><a href="Home1.html">Sing in</a></button>-->
<!--        <input type="submit" name="submit" value="Login" onclick="myFunction()">-->
        <a href="singup.php" class="a1">sign up<ion-icon name="enter-outline"></ion-icon>
        </a>
       <!-- <input id="log" type="text" name="log" value="false" style="visibility: hidden"> -->
    </form>


</div>
<script src="app.js"></script>
<script src="https://unpkg.com/ionicons@5.4.0/dist/ionicons.js"></script>
</body>
</html>