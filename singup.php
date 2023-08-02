<?php
$user = 'root';
$pass = '';
$db = 'project';
$conn = new mysqli('localhost', $user, $pass, $db);
if ($conn->connect_error) {
    die . ("Connection failed : " . $conn->connect_error);
}
if (isset($_POST['ok'])){
//    cardnumber(document.getElementById('card'));
//    $validem=echo'<script>if(ValidateEmail(document.getElementById(mail)))
//                            <script>';
    $fnam= $_POST['name'];
    $username= $_POST['username'];
    $password = $_POST['pass'];
    $confirm = $_POST['copass'];
    $address = $_POST['address'];
    $card = $_POST['card'];
//    $sql0 = "SELECT * FROM `product` WHERE `name` = '$nm'";
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Sign up</title>
    <link rel="icon" href="imgs/logo2.png" type="image/gif">
    <style>
        a{
            text-decoration: none;
            color: black;
        }

        @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@200;300;400;500;600;700&display=swap');
        *{
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Poppins',sans-serif;
        }
        body{
            height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            padding: 10px;
            background-image: linear-gradient(45deg,pink,grey);
        }
        .container{
            height: 95%;
            max-width: 700px;
            width: 100%;
            background-color: #fff;
            padding: 25px 30px;
            border-radius: 5px;
            box-shadow: 0 5px 10px rgba(0,0,0,0.15);
        }
        .container .title{
            font-size: 25px;
            font-weight: 500;
            position: relative;
        }
        .container .title::before{
            content: "";
            position: absolute;
            left: 0;
            bottom: 0;
            height: 3px;
            width: 30px;
            border-radius: 5px;
            background: linear-gradient(135deg, pink, grey);
        }
        .content form .user-details{
            display: flex;
            flex-wrap: wrap;
            justify-content: space-between;
            margin: 20px 0 12px 0;
        }
        form .user-details .input-box{
            margin-bottom: 15px;
            width: calc(100% / 2 - 20px);
        }
        form .input-box span.details{
            display: block;
            font-weight: 500;
            margin-bottom: 5px;
        }
        .user-details .input-box input{
            height: 45px;
            width: 100%;
            outline: none;
            font-size: 16px;
            border-radius: 5px;
            padding-left: 15px;
            border: 1px solid #ccc;
            border-bottom-width: 2px;
            transition: all 0.3s ease;
        }
        .user-details .input-box input:focus,
        .user-details .input-box input:valid{
            border-color: palevioletred;
        }
        form .gender-details .gender-title{
            font-size: 20px;
            font-weight: 500;
        }
        /*form .category{*/
        /*    display: flex;*/
        /*    width: 80%;*/
        /*    margin: 14px 0 ;*/
        /*    justify-content: space-between;*/
        /*}*/
        /*form .category label{*/
        /*    display: flex;*/
        /*    align-items: center;*/
        /*    cursor: pointer;*/
        /*}*/
        /*form .category label .dot{*/
        /*    height: 18px;*/
        /*    width: 18px;*/
        /*    border-radius: 50%;*/
        /*    margin-right: 10px;*/
        /*    background: #d9d9d9;*/
        /*    border: 5px solid transparent;*/
        /*    transition: all 0.3s ease;*/
        /*}*/
        #dot-1:checked ~ .category label .one,
        #dot-2:checked ~ .category label .two,
        #dot-3:checked ~ .category label .three{
            background: palevioletred;
            border-color: #d9d9d9;
        }
        form .button{
            height: 45px;
            margin: 35px 0
        }
        form .button input{
            height: 100%;
            width: 100%;
            border-radius: 5px;
            border: none;
            color: #fff;
            font-size: 18px;
            font-weight: 500;
            letter-spacing: 1px;
            cursor: pointer;
            transition: all 0.3s ease;
            background: linear-gradient(135deg, pink, grey);
        }
        form .button input:hover{
            /* transform: scale(0.99); */
            background: linear-gradient(-135deg, pink, grey);
        }
        @media(max-width: 584px){
            .container{
                max-width: 100%;
            }
            form .user-details .input-box{
                margin-bottom: 15px;
                width: 100%;
            }
            form .category{
                width: 100%;
            }
            .content form .user-details{
                max-height: 300px;
                overflow-y: scroll;
            }
            .user-details::-webkit-scrollbar{
                width: 5px;
            }
        }
        @media(max-width: 459px){
            .container .content .category{
                flex-direction: column;
            }
        }

    </style>
    <script>
        // function ValidateEmail()
        // {
        //     if (/^[a-zA-Z0-9.!#$%&'*+/=?^_`{|}~-]+@[a-zA-Z0-9-]+(?:\.[a-zA-Z0-9-]+)*$/.test(document.getElementById('mail')))
        //     {
        //
        //         return (true)
        //     }
        //     alert("You have entered an invalid email address!")
        //
        //     return (false)
        // }
        function ValidateEmail(mail)
        {
            if (/^[a-zA-Z0-9.!#$%&'*+/=?^_`{|}~-]+@[a-zA-Z0-9-]+(?:\.[a-zA-Z0-9-]+)*$/.test(myForm.emailAddr.value));
            {

            }
            else{
            alert("You have entered an invalid email address!");

            }
        }
        function cardnumber(inputtxt)
        {

            var cardno5 = /^(?:3(?:0[0-5]|[68][0-9])[0-9]{11})$/;
            var cardno4 = /^(?:6(?:011|5[0-9][0-9])[0-9]{12})$/;
            var cardno3 = /^(?:5[1-5][0-9]{14})$/;
            var cardno2 = /^(?:4[0-9]{12}(?:[0-9]{3})?)$/;
            var cardno6 = /^(?:(?:2131|1800|35\d{3})\d{11})$/;
            var cardno = /^(?:3[47][0-9]{13})$/;
            if(inputtxt.value.match(cardno))
            {
                return true;
            }
            else if(inputtxt.value.match(cardno2))
            {
                return true;
            }

            else if(inputtxt.value.match(cardno3))
            {
                return true;
            }
            else if(inputtxt.value.match(cardno4))
            {
                return true;
            }

        else if(inputtxt.value.match(cardno5))
            {
                return true;
            }

            else if(inputtxt.value.match(cardno6))
            {
                return true;
            }
        else
        {
            alert("Not a valid JCB card number!");
            return false;
        }

        }

    </script>
</head>
<body>
<div class="container">
    <p><a href="Home1.html"><img src="imgs/home.png" style="width: 20px;height: 20px"/>Home</a></p>
    <div class="title">Registration</div>
    <div class="content">
        <form action="#">
            <div class="user-details">
                <div class="input-box">
                    <span class="details">Full Name</span>
                    <input type="text" name="name" placeholder="Enter your name" required>
                </div>
                <div class="input-box">
                    <span class="details">Username</span>
                    <input type="text" name="username" placeholder="Enter your username" required>
                </div>
                <div class="input-box">
                    <span class="details">Email</span>
                    <input type="email" id="mail" name="Email" placeholder="Enter your email" required>
                </div>
                <div class="input-box">
                    <span class="details">Phone Number</span>
                    <input type="text" name="phone" placeholder="Enter your number" required>
                </div>
                <div class="input-box">
                    <span class="details">Password</span>
                    <input type="password" name="pass" placeholder="Enter your password" required>
                </div>
                <div class="input-box">
                    <span class="details">Confirm Password</span>
                    <input type="password" name="copass" placeholder="Confirm your password" required>
                </div>

            <div class="input-box">
                <span class="details">Address</span>
                <input type="text" name="address" placeholder="Enter Address" required>
            </div>

                <div class="input-box">
                    <span class="details">Credit card number</span>
                    <input type="text" id="card" name="card" placeholder="Enter Credit card number" required>
                </div>

     </div>
            <div class="button">
            <input type="submit" name="ok" value="Register" >
            </div>
        </form>
    </div>
</div>

</body>
</html>

<body >

</body>
</html>
