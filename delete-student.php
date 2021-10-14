<?php 
 $conn=mysqli_connect("localhost","root","","fabevy");
 $del_query="delete from student where id=".$_GET['id'];
 $result=mysqli_query($conn,$del_query);
header("Location:index.php? del=succ")
?>
