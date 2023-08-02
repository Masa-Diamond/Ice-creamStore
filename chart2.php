<?php
$flavour ='';
$GLOBALS=$flavour;
if(isset($_POST['submit'])){
    $flavour=$_POST['flav'];

}
?>
<?php
$GLOBALS=$dbhost ='localhost';
$GLOBALS=$bdname ='project';
$GLOBALS=$dbuser = 'root';
$GLOBALS=$dbpass = '';

try{
    $dbcon = new PDO("mysql:host={$dbhost};dbname={$bdname}",$dbuser,$dbpass);
    $dbcon->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
}
catch (PDOException $ex){
    die($ex->getMessage());
}
$stmt=$dbcon->prepare("SELECT amount,date_month FROM monthly_sells WHERE flavour_name='$flavour'");
$stmt->execute();
$json=[];
$json2=[];
while($row=$stmt->fetch(PDO::FETCH_ASSOC)){
    extract($row);
    if($flavour_name=$flavour){
        $json[]=$date_month;
        $json2[]=(int)$amount;


    }


}


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Title</title>
    <style>
        #holder{
            width: auto;
            margin: auto;
            padding-top: 30px;
            padding-bottom: 30px;
            padding-left: 70px;
            display: inline-block;

        }
        .main{
            float: left;
            width: auto;

            padding: 30px;

            background-size: cover;
            background-repeat: no-repeat;
        }
body{
    background-size: cover;
    background-repeat: no-repeat;
}
    </style>

    <link rel="icon" href="imgs/logo2.png" type="image/gif">
    <link rel="stylesheet" href="mystyle.css">

</head>
<body style="background-image: url('imgs/ice.jpg')">


<header id="h" style="color: black; text-align: center;">
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
    <h1 > Ice Cream Sells Reports</h1>
</header>

<div id="holder" style="align-content: center;">

    <div style="position: absolute; top: 80px; left: 220px; width:500px;height: 350px; ">
        <canvas id="myChart"></canvas>
    </div>
</div>


<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.4.0/Chart.min.js" ></script>
<script type="text/javascript">
    var ctx = document.getElementById('myChart').getContext('2d');
    var chart = new Chart(ctx, {
        // The type of chart we want to create
        type: 'bar',

        // The data for our dataset
        data: {
            labels: <?php echo json_encode($json);?>,

        datasets: [{
            label: "monthly sells" ,
            backgroundColor:[
                'rgb(25,118,219)',
                'rgb(151,25,219)',
                'rgb(219,25,116)',
                'rgb(18,224,4)',
                'rgb(219,25,25)',
                'rgb(25,118,219)',
                'rgb(14,233,205)',
                'rgb(221,167,9)',
                'rgb(25,118,219)',
                'rgb(167,161,161)',
                'rgb(134,16,57)',
                'rgb(182,224,103)',
                'rgb(238,236,17)'
            ],
            borderColor: 'rgb(238,236,17)',
            data: <?php echo json_encode($json2);?>,
            }]
        },

        // Configuration options go here
        options: {
            legend: {
            labels: {
                fontColor: 'black',
                order: '1'
            }

        }}
    });

</script>


<br> <br><br><br><br><br><br>
<?php echo $flavour ;?>
<br><br><br><br> <br><br><br><br>

<form action="chart2.php" method="post">
    <text> flavour name:</text>
    <input type="text" name="flav" id="mytext">

    <input type="submit" value="show" name="submit">
    </form>

<script src="app.js"></script>
</body>
</html>
