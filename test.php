<?php
    session_start();
   if(isset($_POST['form_post_flag']) && $_POST['form_post_flag'] ==1){
        $conn=mysqli_connect("localhost","root","","fabevy");
        $sel_admin ="select * from admin where username='".$_POST['username']."' and password='".$_POST['password']."' ";
        $result =mysqli_query($conn,$sel_admin);
        $rowcount =mysqli_num_rows($result);
        $row = mysqli_fetch_array($result);
            if($rowcount == 1){
                $_SESSION['admin_id']=$row['id'];
                header('Location:index.php');
            }
 }
 $msg="";
 if(isset($_GET['login']) && $_GET['login']=='fail'){
     $msg="authentication faild. please login.";
 }
?>
<?php echo $msg; ?>
<form name="login_form" method="post">
    <input  type="hidden" name="form_post_flag" value="1">
    username <input name="username" type="text"> <br> <br>
    password input <input name="password" type="password"> <br> <br>
    <input type="submit" name="submit" value="submit">
</form>
