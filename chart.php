<?php
$dbhost ='localhost';
$bdname ='project';
$dbuser = 'root';
$dbpass = '@@proj@@';
try{
    $dbcon = new PDO("mysql:host={$dbhost};dbname={$bdname}",$dbuser,$dbpass);
    $dbcon->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
}
catch (PDOException $ex){
    die($ex->getMessage());
}
$stmt=$dbcon->prepare("SELECT * FROM total_sell");
$stmt->execute();
$json=[];
$json2=[];
while($row=$stmt->fetch(PDO::FETCH_ASSOC)){
    extract($row);
    $json[]=$flavour_name;
    $json2[]=(int)$sold;
}
$stmt2=$dbcon->prepare("SELECT * FROM monthly_sells");
$stmt2->execute();
$json3=[];
$json4=[];
while($row=$stmt2->fetch(PDO::FETCH_ASSOC)) {
    extract($row);
    $json3[] = $flavour_name;
    $json4[] = (int)$amount;
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
        body{
            background-repeat: no-repeat;
            background-size:cover;
        }
    </style>
    <link rel="icon" href="imgs/logo2.png" type="image/gif">
    <link rel="stylesheet" href="mystyle.css">
</head>
<body style="background-image: url('imgs/55.jpg')">
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
</header>

<div style="position: absolute; top: 80px; left:250px; width:430px;height: 500px; ">
    <canvas id="myChart"></canvas>
</div>


<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.4.0/Chart.min.js" ></script>
<script type="text/javascript">
    var ctx = document.getElementById('myChart').getContext('2d');
    var chart = new Chart(ctx, {
        // The type of chart we want to create
        type: 'pie',

        // The data for our dataset
        data: {
            labels: <?php echo json_encode($json);?> ,

            datasets: [{
                label: "total sells",
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
                borderColor: 'rgb(255,255,255)',
                data: <?php echo json_encode($json2);?>,
            }]
        },

        // Configuration options go here
        options: {
            legend: {
            labels: {
                fontColor: 'white',

            }
        }}
    });

</script>
<script src="app.js"></script>
</body>
</html>