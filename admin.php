<?php
$user = 'root';
$pass = '';
$db = 'project';
$conn = new mysqli('localhost', $user, $pass, $db);
if ($conn->connect_error) {
    die . ("Connection failed : " . $conn->connect_error);
}
if(isset($_POST['insert'])){
$nm = $_POST['prn'];
$cost = $_POST['price'];
$photo = "imgs/".$_POST['img'];
$sql0 = "SELECT * FROM `product` WHERE `name` = '$nm'";
$ex = $conn->query($sql0);
if($ex->num_rows == 0){
$sql1 = "insert into product values ('".$nm."','".$cost."','".$photo."')";
$insert = $conn->query($sql1);
echo"<script>alert('Add Successfully')</script>";
}
else{
    echo"<script>alert('this product is already exist')</script>";
}
}
if(isset($_POST['updatep'])){
    $n = $_POST['prn'];
    $cost = $_POST['price'];
    $photo = "imgs/".$_POST['img'];
    $sql0 = "SELECT * FROM `product` WHERE `name` = '$n'";
    $ex = $conn->query($sql0);
    if($ex->num_rows != 0){
        $sql1 = "UPDATE `product` SET `name`='$n',`price`='$cost',`photo`='$photo' WHERE `name` = '$n'";
        $insert = $conn->query($sql1);
        echo"<script>alert('Update Successfully')</script>";
    }
    else{
        echo"<script>alert('this product is not exist')</script>";
    }

}
if(isset($_POST['deletp'])){
    $nd = $_POST['dep'];
    $sql0 = "SELECT * FROM `product` WHERE `name` = '$nd'";
    $ex = $conn->query($sql0);
    if($ex->num_rows != 0){
    $sql2 = "DELETE FROM `product` WHERE `name`='$nd'";
    $delete = $conn->query($sql2);
    echo"<script>alert('Delete Successfully')</script>";
    }
    else{
        echo"<script>alert('This Flavour dose not exist')</script>";
    }
}
if(isset($_POST['Addf'])){
    $fn = $_POST['nf'];
    $fp = $_POST['pricef'];
    $fimg = "imgs/".$_POST['imgf'];
$sql0 = "SELECT * FROM `flavour` WHERE `namef` = '$fn'";
$ex = $conn->query($sql0);
if($ex->num_rows == 0) {
    $sql3 = "insert into `flavour` values ('" . $fn . "','" . $fp . "','" . $fimg . "')";
    $addfl = $conn->query($sql3);
    echo "<script>alert('Add Successfully')</script>";
}
else{
    echo"<script>alert('this flavour is already exist')</script>";
}
}
if(isset($_POST['updatef'])) {
    $n = $_POST['nf'];
    $cost = $_POST['pricef'];
    $photo = "imgs/" . $_POST['imgf'];
    $sql0 = "SELECT * FROM `flavour` WHERE `namef` = '$n'";
    $ex = $conn->query($sql0);
    if ($ex->num_rows != 0) {
        $sql1 = "UPDATE `flavour` SET `namef`='$n',`pricef`='$cost',`photof`='$photo' WHERE `namef` = '$n'";
        $insert = $conn->query($sql1);
        echo "<script>alert('Update Successfully')</script>";
    } else {
        echo "<script>alert('this flavour is not exist')</script>";
    }
}
if(isset($_POST['bd'])){
    $dfn = $_POST['df'];
$sql0 = "SELECT * FROM `flavour` WHERE `namef` = '$dfn'";
$ex = $conn->query($sql0);
if($ex->num_rows != 0) {


    $sql4 = "DELETE FROM `flavour` WHERE `namef`='$dfn'";
    $delete = $conn->query($sql4);
    echo"<script>alert('Delete Successfully')</script>";
}
else{
    echo"<script>alert('this flavour dose not exist')</script>";
}
}
if(isset($_POST['Adda'])){

    $Adminn = $_POST['An'];
    $Adminp = $_POST['Ap'];
    if($Adminn == null || $Adminp == null ){
        echo "<script></script>";
    }
$sql0 = "SELECT * FROM `admin` WHERE `admin-name` = '$Adminn'";
$ex = $conn->query($sql0);
if($ex->num_rows == 0) {
    $sql5 = "insert into `admin` values ('" . $Adminn . "','" . $Adminp . "')";
    $admin = $conn->query($sql5);
    echo "<script>alert('Add Successfully')</script>";
}
else{
    echo"<script>alert('Admin is exist')</script>";
}
}
if(isset($_POST['dea'])) {
    $Dadmin = $_POST['An'];
    $Dpass = $_POST['Ap'];
    $sql0 = "SELECT * FROM `admin` WHERE `admin-name` = '$Dadmin'&& `password`='$Dpass'";
    $ex = $conn->query($sql0);
    if ($ex->num_rows != 0) {
        $sql6 = "DELETE FROM `admin` WHERE `admin-name`='$Dadmin' && `password`='$Dpass'";
        $delete = $conn->query($sql6);
        echo "<script>alert('Delete Successfully')</script>";
    }
    else{
        echo"<script>alert('Admin is not exist')</script>";
    }
}
if(isset($_POST["insert"])) {
    $product = $_POST["p"];
    $sql1 = "SELECT * FROM `sale` where `month` = 1 && `name` = '$product'";
    $sql2 = "SELECT * FROM `sale` where `month` = 2 && `name` = '$product'";
    $sql3 = "SELECT * FROM `sale` where `month` = 3 && `name` = '$product'";
    $sql4 = "SELECT * FROM `sale` where `month` = 4 && `name` = '$product'";
    $sql5 = "SELECT * FROM `sale` where `month` = 5 && `name` = '$product'";
    $sql6 = "SELECT * FROM `sale` where `month` = 6 && `name` = '$product'";
    $sql7 = "SELECT * FROM `sale` where `month` = 7 && `name` = '$product'";
    $sql8 = "SELECT * FROM `sale` where `month` = 8 && `name` = '$product'";
    $sql9 = "SELECT * FROM `sale` where `month` = 9 && `name` = '$product'";
    $sql10 = "SELECT * FROM `sale` where `month` = 10 && `name` = '$product'";
    $sql11 = "SELECT * FROM `sale` where `month` = 11 && `name` = '$product'";
    $sql12 = "SELECT * FROM `sale` where `month` = 12 && `name` = '$product'";

    $p1 = mysqli_query($conn, $sql1);
    $p2 = mysqli_query($conn, $sql2);
    $p3 = mysqli_query($conn, $sql3);
    $p4 = mysqli_query($conn, $sql4);
    $p5 = mysqli_query($conn, $sql5);
    $p6 = mysqli_query($conn, $sql6);
    $p7 = mysqli_query($conn, $sql7);
    $p8 = mysqli_query($conn, $sql8);
    $p9 = mysqli_query($conn, $sql9);
    $p10 = mysqli_query($conn, $sql10);
    $p11 = mysqli_query($conn, $sql11);
    $p12 = mysqli_query($conn, $sql12);


    $c1 = $p1->fetch_assoc();
    $c2 = $p2->fetch_assoc();
    $c3 = $p3->fetch_assoc();
    $c4 = $p4->fetch_assoc();
    $c5 = $p5->fetch_assoc();
    $c6 = $p6->fetch_assoc();
    $c7 = $p7->fetch_assoc();
    $c8 = $p8->fetch_assoc();
    $c9 = $p9->fetch_assoc();
    $c10 = $p10->fetch_assoc();
    $c11 = $p11->fetch_assoc();
    $c12 = $p12->fetch_assoc();
    $json[] = ['January', 'February', 'March', 'April', 'May', 'June', 'July','August', 'September', 'October' ,'November' ,'December'];
    $json2[] = [$c1['ammount'], $c2['ammount'],$c3['ammount'], $c4['ammount'],$c5['ammount'],$c6['ammount'],$c7['ammount'],$c8['ammount'],$c9['ammount'],$c10['ammount'],$c11['ammount'],$c12['ammount']];
//        echo json_encode($json);
//        echo json_encode($json2);


}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Admin</title>
    <link rel="icon" href="imgs/logo2.png" type="image/gif">
  <link rel="stylesheet" type="text/css" href="mystyle.css">
    <style>
        .product{
        height: 500px;
        width: 100%;
        /*background-image: linear-gradient(45deg,plum,white);*/
        background-image: linear-gradient(45grad,salmon,white);
        /*opacity: 0.8;*/

        }
        input[type="text"], input[type="password"]
        {
            border: none;
            border-bottom: 1px solid black;
            background: transparent;
            outline: none;
            height: 25px;
            color: black;
            font-size: 16px;
        }
        input[type="submit"]{
            height: 30px;
            width: 200px;
            margin: 20px;
            border-radius: 12px;
        }
        input[type="submit"]:hover{
            background-color: purple;
        }
        label{
        margin: 0;
        padding: 0;
        font-weight: bold;
        }
        body{
            background-image: url("imgs/55.jpg");
            background-size: cover;
            background-repeat: no-repeat;
            background-attachment: fixed;
            margin: 0px;
            margin-top: 0px;
        }
        .delete{
            /*background-image: linear-gradient(45grad,salmon,white);*/
            height: 300px;
            opacity: 0.8;

        }
        .addf{
            background-image: linear-gradient(45deg,pink,white);
            height: 500px;
            /*opacity: 0.8;*/
        }
        /*.def{*/
        /*    background-image: linear-gradient(45deg,mediumvioletred,white);*/
        /*    height: 300px;*/
        /*    opacity: 0.9;*/
        /*}*/
        .em{
            height: 100px;
        }
        #d5{
            background-image: linear-gradient(45deg,silver,white);
            height: 400px;
            /*opacity: 0.9;*/
        }
        .pro{
            background-image: linear-gradient(45deg,pink,white);
            height: 150px;
            width: 100%;
            /*background-image: linear-gradient(45deg,plum,white);*/
            background-color: white;

            box-shadow: 10px 10px 5px grey;;
        }

      /* #d6{*/
      /*      background-image: linear-gradient(45deg,darkseagreen,white);*/
      /*      height: 300px;*/
      /*      opacity: 0.9;*/
      /*  }*/
        .chart1{
            /*position: absolute;*/
            top:60px;
            left:10px;
            width:500px;
            height: 500px;
        }
    </style>

</head>
<body>
<header id="h">

    <span  class=logo><img src="imgs/logo2.png" alt="" id="logo1" height="45" width="200">
        </span>
    <nav id="nav">
        <ul class="nav-links">
        <li><a href="Home1.html">HOME</a></li>
        <li><a href="#d1">Add Product</a></li>
        <li><a href="#d2">Delete Product</a></li>
        <li><a href="#d3">Add Flavour</a></li>
        <li><a href="#d4">Delete Flavour</a></li>
        <li><a href="#d5"> Add Admin</a></li>
            <li><a href="chart.php"> sells chart</a></li>
            <li><a href="chart2.php"> monthly sells</a></li>

        </ul>
        <div class="mini">
            <div class="line1"></div>
            <div class="line2"></div>
            <div class="line3"></div>
        </div>
    </nav>
</header>

<div class="product" id="d1">
<form method="post">

   <h1 style="text-align: left;margin-top: 0px">Add Product</h1>
   <label>Name:</label>
   <input type="text" name="prn" id="prn"required >

   <br>
   <br>
   <label>Price:</label>
    <input type="text" id="price" name="price" required>
   <br>
   <br>
    <label>Choose image</label>
    <input type="file" id="img" name="img" required>
    <br>
    <br>
    <input type="submit" id="insert" name="insert" value="Add Product"  >
    <input type="submit" id="updatep" name="updatep" value=" Update"  >

</form>
<form method="post">
    <div class="delete" id="d2">
        <h1 style="text-align: left;margin-top: 0px">Delete Product</h1>
        <label>Name:</label>
        <input type="text" name="dep" id="dep" required>
        <br>
        <input type="submit" id="deletp" name="deletp" value="Delete Product">
    </div>
    <div class="em"></div>
</form>
</div>
<div class="em"></div>
<div class="addf" id="d3">
<form method="post">

        <h1 style="text-align: left;margin-top: 0px">Add Flavour</h1>
        <label>Name:</label>
        <input type="text" name="nf" id="nf" required>
        <br>
        <br>
        <label>Price:</label>
        <input type="text" id="pricef" name="pricef" required>
        <br>
        <br>
        <label>Choose image</label>
        <input type="file" id="imgf" name="imgf" required>
        <br>
        <br>
        <input type="submit" id="Addf" name="Addf" value="Add Flavour">
    <input type="submit" id="updatef" name="updatef" value=" Update"  >
</form>
<form method="post">
    <div class="def" id="d4">
        <h1 style="text-align: left;margin-top: 0px">Delete Flavour</h1>
        <label>Name:</label>
        <input type="text" name="df" id="df" required>
        <br>
        <input type="submit" id="bd" name="bd" value="Delete Flavour" >

    </div>

</form>
</div>

<div class="em"></div>
<form method="post">
    <div id="d5">
        <h1 style="text-align: left;margin-top: 0px">Add Admin</h1>
        <label>Name:</label>
        <input type="text" name="An" id="An" required>
        <br>
        <br>
        <label>Password:</label>
        <input type="password" name="Ap" id="Ap" required>
        <br>
        <br>
        <input type="submit" id="Adda" name="Adda" value="Add Admin" >
        <input type="submit" id="dea" name="dea" value="Delete Admin" >
    </div>
    </div>
    <div class="em">
    </div>
</form>
<!--
<div>
    <form method="post">
    <div class="pro" id="d1">
        <br>
        <br>
        <label>Name of Product:</label>
        <input type="text" name="p">
        <br>
        <br>
        <input type="submit" id="insert" name="insert" value="Show chart" style="width: 200px; margin: 20px">
    </div>
    </form>
</div>
<div class="chart1">
    <canvas id="myChart" width="300" height="300"></canvas>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script type="text/javascript">

        var ctx = document.getElementById('myChart').getContext('2d');
        var myChart = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: ['January', 'February', 'March', 'April', 'May', 'June', 'July','August', 'September', 'October' ,'November' ,'December'],
                datasets: [{
                    label: "# sales'.<?php echo $product?>'",
                    data:[<?php echo $c1['ammount'];?>,<?php echo $c2['ammount'];?>,<?php echo $c3['ammount'];?>,<?php echo $c4['ammount'];?>,<?php echo $c5['ammount'];?>,<?php echo $c6['ammount'];?>,<?php echo $c7['ammount'];?>,
                        <?php echo $c8['ammount'];?>,<?php echo $c9['ammount'];?>,<?php echo $c10['ammount'];?>,<?php echo $c11['ammount'];?>,<?php echo $c12['ammount'];?>],
                    backgroundColor: [
                        'rgba(255, 99, 132, 0.2)',
                        'rgba(54, 162, 235, 0.2)',
                        'rgba(255, 206, 86, 0.2)',
                        'rgba(75, 192, 192, 0.2)',
                        'rgba(153, 102, 255, 0.2)',
                        'rgba(255, 159, 64, 0.2)'
                    ],
                    borderColor: [
                        'rgba(255, 99, 132, 1)',
                        'rgba(54, 162, 235, 1)',
                        'rgba(255, 206, 86, 1)',
                        'rgba(75, 192, 192, 1)',
                        'rgba(153, 102, 255, 1)',
                        'rgba(255, 159, 64, 1)'
                    ],
                    borderWidth: 1
                }]
            },
            options: {
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });

    </script>
</div>
<script src="app.js"></script>
</body>
</html>
-->