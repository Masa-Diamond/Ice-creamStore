
<?php
$user = 'root';
$pass = '';
$db = 'project';
$conn = new mysqli('localhost',$user,$pass,$db);

if($conn->connect_error){
    die.("Connection failed : " .$conn->connect_error);
}
$sql1 = "SELECT name FROM product";
$sql2 ="SELECT photo FROM product";
$imgs = mysqli_query($conn,$sql2);
$sql3 = "SELECT price FROM product";
$prices = mysqli_query($conn,$sql3);
$names =  mysqli_query($conn,$sql1);
//$number = mysqli_num_rows($names);
$fsql = "SELECT namef FROM flavour";
$fsql2 = "SELECT photof FROM flavour";
$fsql3 = "SELECT pricef FROM flavour";
$flimg = mysqli_query($conn,$fsql2);
$fname = mysqli_query($conn,$fsql);
$fprice = mysqli_query($conn,$fsql3);
if(isset($_POST['move'])){
    $numb = $_POST['num'];
    echo "<script>window.location='Signin.php'</script>";
}
?>
<!DOCTYPE html>
<html lang="en">
<meta charset="UTF-8">
<title>ice cream</title>
<link rel="icon" href="imgs/logo2.png" type="image/gif">
<link rel="stylesheet" href="mystyle.css"/>


<link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300&display=swap" rel="stylesheet">
<style>
    div.polaroid {
        width: 250px;
        /*height: 350px;*/
        box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
        text-align: center;
        display: inline-block;
        margin: 40px 30px 10px 10px;
        /*box-sizing: border-box;*/
    }

    div.container {
        padding: 10px;
        /*height: 100px;*/

    }
    button.add{
        width: 100px;
        background-color: palevioletred;

    }
    body{
        background-image: url('imgs/55.jpg');
        background-repeat: no-repeat;
        background-size:cover;
        position: page;
    }

    img.resize{
        width:256px;
        height: 256px;
    }
    p{
        font-size: 18px;
    }
    /*.wrapper{*/
    /*    display: flex;*/
    /*    overflow: auto;*/
    /*}*/
    /*.wrapper::-webkit-scrollbar{*/
    /*    width: 0;*/
    /*}*/
    .wrapper{
        /*background-image: linear-gradient(45deg,palevioletred,white);*/
        background-color: papayawhip;
        /*opacity: 0.9;*/
    }
    .myclass {
        width: 100%;
        height: 100%;
        background-color: rgba(0, 0, 0, 0.7);
        opacity: 1;
        position: absolute;
        top: 0;
        display: none;
        justify-content: center;
        align-items: center;
    }

    div.myclass:target{
        display: flex;
    }


    .sec{
        width: 500px;
        height: 300px;

        background-image: url("imgs/dd.jfif");
        background-repeat: no-repeat;
        background-size: cover;
        background-color: white;
        border-radius: 4px;
        text-align:center;
        padding: 15px;
        align-content: center;
        justify-content: center;


    }
    .myform{
        display: inline-block;
        align-content: center;
        justify-content: center;
        size: auto;
        margin: auto;
        text-align: left;

    }
    .prod{
        background-color: white;
        opacity: 0.9;
        /*width: 90%;*/
        /*margin: 20px;*/
    }
    .add{
        color:white;
    }
    .the_cart{
        width: 500px;
        height: 300px;
        background: white;
        opacity: 0.9%;
        z-index: 2;
        visibility: visible;
    }
</style>
</head>

<body>
<header >

    <span  class=logo><img src="imgs/logo2.png" alt="" id="logo1" height="45" width="200">
        </span>
    <nav id="nav">
        <ul class="nav-links">
            <li><a href="Home1.html">HOME</a></li>
            <li><a href="flavour.php">FLAVOURS</a></li>
            <li><a href="blog.html">BOLG</a></li>
            <li><a href="#ft">CONTACT</a></li>
            <li class="cart">
                <a href="#cart">
                    <ion-icon name="basket"></ion-icon> CART  <span>0</span>
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
<div class="wrapper">
    <h1 style="text-align: center;color:darkslategray;font-family: Cambria">Our flavors...</h1>
    <?php

    while ($fresult = $fname->fetch_assoc()) {
        $fphoto = $flimg->fetch_assoc();
        $fpr = $fprice->fetch_assoc();
        echo'<div class="polaroid">';
        echo ' <img class=resize src="'.$fphoto['photof'].'" alt="Norway" id="img" style="width:100%"/>';
        echo'<div class="container">';
        echo $fresult['namef'];
        echo'<br>';
        echo 'price:'.$fpr['pricef'];
        echo'<br>';


        echo'<button class="add" style="color: white"><a href="#d1">Add to cart</a></button>';
        echo'</div>';
        echo'</div>';
    }

//    while ($result = $names->fetch_assoc()){
//        echo $result['name'];
//    }
    ?>




    </div>
<div style="height: 300px">
</div>

<div class="prod">
    <h1 style="text-align: center;color:darkslategray;font-family: Cambria">Our Product...</h1>
    <?php

    while ($result = $names->fetch_assoc()) {
        $photo = $imgs->fetch_assoc();
        $pr = $prices->fetch_assoc();
        echo'<div class="polaroid">';
        echo ' <img class=resize src="'.$photo['photo'].'" alt="Norway" id="img" style="width:100%"/>';
        echo'<div class="container">';
        echo $result['name'];
        echo '<br>';
        echo 'price:'.$pr['price'];
        echo '<br>';
        echo'<button class="add" style="color: white"><a href="#d1">Add to cart</a></button>';
        echo'</div>';
        echo'</div>';
    }


  ?>
    <div style="height: 300px">
    </div>
</div>

<div id="cart" calss="the_Cart">

</div>
<script src="app.js"></script>

<script src="https://unpkg.com/ionicons@5.4.0/dist/ionicons.js"></script>

<?php
include("main.php");
?>
<script src="main.php"></script>
</body>
</html>