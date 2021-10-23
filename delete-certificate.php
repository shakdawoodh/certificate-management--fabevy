<?php 

session_start();
if(!isset($_SESSION['admin_id']) || $_SESSION['admin_id']==''){
 header('Location:student-certificate.php?login=fail');
}

 $conn=mysqli_connect("localhost","root","","fabevy");
 $del_query="delete from certificates where id=".$_GET['id'];
 $result=mysqli_query($conn,$del_query);
header("Location:student-certificate.php? delcc=succ")
?>
