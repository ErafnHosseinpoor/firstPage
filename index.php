<?php require_once 'config/config.php';
if(isset($_SESSION['user-login'])) {


$email = $_SESSION['user-login'];
$sql=mysqli_query($conn , "SELECT * FROM users WHERE email='$email'");
$usera=mysqli_fetch_array($sql);

}

$sql1=mysqli_query($conn , "SELECT * FROM product order by id desc LIMIT 6");
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport">
    <link rel="stylesheet" href="styles/styles.css">
    <title>سایت فروشگاه</title>

<style>



    #main .row .text .content{
        width: 30%;
        margin: 10px;
        top: 0px;

        height: 300px;
        border: 1px solid #CCCCCC;
        box-shadow: 0px 1px 1px 2px #111111;
        background-color: #d9d0d0;
        border-radius: 3px;
        position: relative;
    }

    #main .row .text .content:hover{
        box-shadow: 0px 1px 5px 2px #dddddd;
        background-color:#FFFFFF;
        transition: 0.2s ease;



    }




    #main .row .text .content .image {

        height: 200px;


        position: relative;
        margin: 0px;
        width: 100%;
        font-family: Tahoma;
        border-radius: 2px;
    }


    #main .row .text .content .image img{
        height: 180px;
        width: 100%;
        border-radius: 2px;
        filter: blur(1px);
    }


    #main .row .text .content .image img:hover{
        filter: blur(0px);

    }


    #main .row .text .content .name{
        margin: 5px;

        float: right;
        clear: both;
    }
    #main .row .text .content .price {
        margin: 5px;

        float: right;
        clear: both;



    }

    #main .row .text .content .desc{
        margin: 5px;
        font-family: Tahoma;
        float: left;
        clear: both;
        text-decoration: none;
    }

    #main .row .text .content .desc a{
        text-decoration: none;

    }



</style>
</head>
<body>


<div id="main">

<div class="header">
    <h1> مدیریت سایت فروشگاه</h1>
</div>


<div class="nav">

    <ul>
        <li><a href="index.php" style="background-color: #4d4d4d">صفحه اصلی</a></li>
        <li><a href="#">محصولات</a></li>
        <li><a href="users/login.php">ورود کاربران</a></li>
        <li><a href="admin/index.php" onclick="<?php error()?>">ورود مدیران</a></li>
        <li><a href="users/register.php">ثبت نام</a></li>
        <li style="float: left; padding: 15px;color: #FFFFFF"><?php if(isset($_SESSION['user-login'])){ echo 'سلام ' . $usera['name']; }?> </li>
    </ul>
</div>

    <?php

    function error()
    {
        if (isset($_SESSION[ 'user-login' ])) {
            echo 'شما به عنوان کابربر وارد شدید)';
        } else {
            return;
        }
    }
    ?>







    <div class="row" style=" position: relative; overflow: hidden;">


            <div class="sidenav">
               <ul>  <li><a href="#about">About</a><br></li>
                <li> <a href="#services">Services</a></li>
                <li><a href="#clients">Clients</a></li>
                <li><a href="#contact">Contact</a></li>
               </ul>
            </div>



             <div class="text">
                 <?php while($row=mysqli_fetch_array($sql1)){?>

                 <div class="content" style="display: inline-block" >
                     <div class="image"><img src="admin/<?php echo $row['product_image'];?>"></div>
                     <div class="name"><?php echo $row['product_name'];?></div>
                     <div class="price"><?php echo $row['product_price'];?></div>
                     <div class="desc"><a href="productsIndex.php?id=<?php echo $row['id']; ?>" >جزئیات بیشتر...</a></div>



                 </div>
                 <?php }?>




             </div>



    </div>









</div>

</body>

</html>