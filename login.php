<?php
    session_start();
   if(isset($_POST['form_post_flag']) && $_POST['form_post_flag'] ==1){
        $conn=mysqli_connect("localhost","root","","fabevy");
        $sel_admin ="select * from admin where username='".$_POST['username']."' and password='".$_POST['password']."' ";
        $result =mysqli_query($conn,$sel_admin);
        $rowcount =mysqli_num_rows($result);
        $row = mysqli_fetch_array($result);
            if($rowcount ==1){
                $_SESSION['admin_id']=$row['id'];
                header('Location:index.php');
            }
 }
 $msg="";
    if(isset($_GET['login']) && $_GET['login']=='fail'){
        $msg="Authentication Faild. Please Login.";
    }

    if(isset($rowcount)  && $rowcount ==0){
        $msg ="no id found!";
    }

 
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css" integrity="sha384-DyZ88mC6Up2uqS4h/KRgHuoeGwBcD4Ng9SiP4dIRy0EXTlnuz47vAwmeGwVChigm" crossorigin="anonymous">
    <link rel="stylesheet" href="css/style2.css">
    <link href="https://fonts.googleapis.com/css2?family=Abel&display=swap" rel="stylesheet">
    <title>Welcome to FABEVY </title>
</head>
<body>
   <div>
       <form name="login_form" method="post"  class="login">
           <!-- <h1>User Login</h1> -->
           
           <i class="fab fa-angrycreative"></i>
           <span> <strong><?php echo $msg; ?></strong></span>
           
        <input  type="hidden" name="form_post_flag" value="1">
        <input style="color: #333;" name="username" type="text" placeholder="Enter Username" autocomplete="off">
        <input style="color:#333;"  name="password" type="password" placeholder="Password" autocomplete="off">
        <button style="border:none;" type="submit" name="submit" value="submit">Login</button>
        <!-- <a href="#">Forgot Password?</a> -->
    </form>
            <div class="signup_btn">
                <!-- <h4><a href="#">signup now</a></h4> -->
            </div>
   </div>
</body>
</html>