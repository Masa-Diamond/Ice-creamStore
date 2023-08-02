<?php


//$GLOBALS=$item_num=0;
    session_start();

$connect =mysqli_connect("localhost","root","","project");
if(isset($_GET["buy"])){
    echo'<script>alert("thanks.. the delivery is on the way! ")</script>';
}
if(isset($_POST["add_to_cart"])){
    if(isset($_SESSION["shopping_cart"])){
       $item_array_id= array_column($_SESSION["shopping_cart"],"item_id");
       if(!in_array($_POST['hidden_name'],$item_array_id))
       {
$count =count($_SESSION["shopping_cart"]);
$item_array=array(
    'item_id'=> $_POST['hidden_name'],
    'item_name'=> $_POST["hidden_name"],
    'item_price'=> $_POST["hidden_price"],
    'item_quantity'=>$_POST["quantity"]
);
$_SESSION["shopping_cart"][$count]= $item_array;
           //$item_num=$item_num+1;
       }
       else{
              echo'<script>alert("product already added .. if you want you can remove it from cart and add a new quantity")</script>';
              echo'<script> window.location="flav-cart.php"</script>';
       }


    }
    else{
        $item_array =array(
                'item_id'=> $_POST['hidden_name'],
            'item_name'=> $_POST["hidden_name"],
            'item_price'=> $_POST["hidden_price"],
            'item_quantity'=>$_POST["quantity"]
        );
        $_SESSION["shopping_cart"][0]= $item_array;
    }
}
if(isset($_GET["action"])){
    if($_GET["action"] == "delete"){
        foreach ($_SESSION["shopping_cart"] as $item => $value){
            if($value["item_name"] ==ltrim($_GET["id"]) ){
                unset($_SESSION["shopping_cart"][$item]);
                echo '<script> alert("Item Removed")</script>';
                //$item_num=$item_num-1;
                echo'<script>window.location="flav-cart.php"</script>';
            }
        }
    }
}
if(isset($_GET["action"])){
    if($_GET["action"] == "clear"){
        foreach ($_SESSION["shopping_cart"] as $item => $value){

                unset($_SESSION["shopping_cart"][$item]);

                //$item_num=$item_num-1;


        }
        echo '<script> alert("Order deleted")</script>';
        echo'<script>window.location="flav-cart.php"</script>';
    }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>ice cream</title>
    <link rel="icon" href="imgs/logo2.png" type="image/gif">
    <link rel="stylesheet" href="mystyle.css"/>

    <style>
        body{
           /* background-image: url('imgs/55.jpg');
            background-repeat: no-repeat;
            background-size:cover;
            position: page;*/
            background-color: papayawhip;
        }
        .wrapper{
            /*background-image: linear-gradient(45deg,palevioletred,white);*/
            background-image: url('imgs/55.jpg');

            /*opacity: 0.9;*/
            background-size:cover;
            float: left;

        }
        .prod{
            background-color: white;
            opacity: 0.9;
            /*width: 90%;*/
            /*margin: 20px;*/
        }
        p{
            font-size: 18px;
        }
        div.container {
            padding: 10px;
            /*height: 100px;*/

        }
        button.add{
            width: 100px;
            background-color: palevioletred;

        }
        div.polaroid {
            width: 250px;
            /*height: 350px;*/
            box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
            text-align: center;
            display: inline-block;
            margin: 40px 30px 10px 10px;
            /*box-sizing: border-box;*/
        }
        img.resize{
            width:250px;
            height: 256px;
        }
        .add{
            width: 100px;
            background-color: palevioletred;
            color:white;
        }
        .add:hover{
            background-color: #fae2aa;
            color: #e7857e;
        }
        .mycart{
            background-color: papayawhip;
            width: 700px;
            padding-left: 40px;

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
            <li><a href="flav-cart.php">FLAVOURS<ion-icon name="ice-cream-outline"></ion-icon></a></li>
            <li><a href="blog.html">BOLG<ion-icon name="cafe-outline"></ion-icon></a></li>
            <li><a href="Home1.html #ft">CONTACT<ion-icon name="analytics-outline"></ion-icon>
                </a></li>
            <li class="cart">
                <a href="#cart">
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
<script src="main.php"></script>
<script src="app.js"></script>
<script src="https://unpkg.com/ionicons@5.4.0/dist/ionicons.js"></script>

<div class="cart" >

    <h1 style="text-align: center;color:darkslategray;font-family: Cambria">Our products and flavors...</h1>
    <div class="wrapper">
    <?php
    $query ="SELECT * FROM icecream";
    $result =mysqli_query($connect,$query);
    if(mysqli_num_rows($result)>0){
        while($row =mysqli_fetch_array($result))
        {
            ?>


                <div class="polaroid">
                <form action="" method="post">

                    <img class=resize src=<?php echo $row["photo"];?>> <br />
                        <div class="container">
                    <h4> <?php echo $row["name"];?></h4>
                    <h4><?php echo 'price: '.$row["price"];?></h4>
                    <input type="text" name="quantity" value="1">
                    <input type="text" style="display: none;visibility: hidden" name="hidden_name" value="<?php echo $row["name"]?>">
                    <input type="text" style="display: none;visibility: hidden" name="hidden_price" value="<?php echo $row["price"] ?>"><br />
                           <input  type="submit" class="add" name="add_to_cart" style="margin-top: 5px" value="Add to cart">   <a href="" ></a>
                </form>
            </div>

</div>

    <?php
        }
    }
    ?>
</div>
    <div  class="mycart" >
    <br>
    <h3>Order Details</h3>
    <div id="cart">
        <table>
            <tr>
                <th align="left" width="40%">Item Name</th>
                <th align="left"  width="10%">Quantity</th>
                <th align="left"  width="20%">Price</th>
                <th align="left"  width="15%">Total</th>
                <th align="left"  width="5%">Action</th>
            </tr>
            <?php
            if(!empty($_SESSION["shopping_cart"])){
                $total=0;
                foreach($_SESSION["shopping_cart"] as $item=>$value){
                    ?>
            <tr>
                   <td><?php echo $value["item_name"];?></td>
                <td><?php echo $value["item_quantity"];?></td>
                <td><?php echo $value["item_price"];?></td>
                <td><?php echo number_format($value["item_quantity"] * $value["item_price"],2) ?></td>
                <td><a href="flav-cart.php?action=delete&id= <?php echo $value["item_name"] ?>"> <span>Remove</span> </a></td>
            </tr>
            <?php
                    $total = $total + ($value["item_quantity"] * $value["item_price"]);
                }
                ?>
                <tr>
                    <td colspan="3" align="right">Total</td>
                    <td align="right"> <?php echo number_format($total,2) ?> </td>
                    <td></td>
                    <td></td>
                    <td><a href="flav-cart.php?action=clear&id= <?php echo $value["item_name"] ?>"> <span>Clear<ion-icon name="trash-outline"></ion-icon></span> </a></td>
                </tr>
             <?php

            }

            ?>

        </table>

    </div>
        <form action="" method="get">
             <input type="submit" value="BUY" name="buy" class="add" ><ion-icon name="cart-outline"></ion-icon>
        </form>

    </div>
<script>


</script>
</body>
</html>