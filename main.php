
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
    ?>





    <?php

    $GLOBALS=$data=array();
   // $GLOBALS=$data2=array();
    function save_data($nameb,$priceb)
    {
       array($nameb);


    }
        while ($fresult = $fname->fetch_assoc()) {
            $fphoto = $flimg->fetch_assoc();
            $fpr = $fprice->fetch_assoc();
            $nameb= $fresult['namef'];
            $priceb=$fpr['pricef'];

        save_data($nameb,$priceb);
        }
//$array_name=array_keys($data);
 //   $array_price=array_values($data);

        ?>


<script>
    let name='';
    let price='';


    let products = <?php echo json_encode(array())?>;
       // let prices = <?php/* echo json_encode($array_price)*/?>;
    for(let i  in products){
        name=products[i];
    }
   // for(let i in prices){
    //    price=prices[i];
  //  }
</script>



<script>



    function onLoadCartNumbers(){

        let productNubers = localStorage.getItem('cartNumbers');
        if(productNubers){
            document.querySelector('.cart span').textContent=productNubers;
        }
    }
    let carts = document.querySelectorAll('.add');
    for(let i=0;i<carts.length;i++){
    carts[i].addEventListener('click',()=>{
    cartNumbers(products);
    })
    }
    function cartNumbers(products){

    let productNumbers = localStorage.getItem('cartNumbers');
    productNumbers= parseInt(productNumbers);
    if(productNumbers){
        localStorage.setItem('cartNumbers',productNumbers+1);
        document.querySelector('.cart span').textContent=productNumbers+1;
    }
    else{
            localStorage.setItem('cartNumbers',1);
            document.querySelector('.cart span').textContent=1;
        }

    }
    onLoadCartNumbers();

</script>