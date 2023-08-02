/*
var my_data = "<JSON-String>";
var my_var = JSON.parse(my_data);
let name='';
let price='';


    let products = <?php echo json_encode($array_name);?>
    let prices = <?php echo json_encode($array_price);?>


for(var i in products){
name=products[i];
}
for(var i in prices){
price=prices[i];
}



function onLoadCartNumbers(products,prices){
console.log('the product is',products,'price is',prices);
        let productNubers = localStorage.getItem('cartNumbers');
        if(productNubers){
            document.querySelector('.cart span').textContent=productNubers;
        }
    }
    let carts = document.querySelectorAll('.add');
    for(let i=0;i<carts.length;i++){
    carts[i].addEventListener('click',()=>{
    cartNumbers();
    })
    }
    function cartNumbers(){
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
    onLoadCartNumbers(products,prices);
*/