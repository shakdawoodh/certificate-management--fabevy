<?php
 session_start();
 if(!isset($_SESSION['admin_id']) || $_SESSION['admin_id']==''){
  header('Location:login.php?login=fail');
}
if(!isset($_SESSION['admin_id']) || $_SESSION['admin_id']==2){
  header('Location:student-page.php?login=student_login');
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css" integrity="sha384-DyZ88mC6Up2uqS4h/KRgHuoeGwBcD4Ng9SiP4dIRy0EXTlnuz47vAwmeGwVChigm" crossorigin="anonymous">
  <link rel="stylesheet" href="css/main.css">
  <link href="https://fonts.googleapis.com/css2?family=Cinzel&display=swap" rel="stylesheet">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Bebas+Neue&display=swap" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Abel&display=swap" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Staatliches&display=swap" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  <title>Certificate-Management</title>
</head>

<body> 
  <div class=over-body>
                       <!-- HEADER  -->
<header>
    <div class="navbar-1">
      <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container-fluid">
          <a class="navbar-brand" href="#"> <img src="images/fabevy-logo.png" alt="fabevy"> </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
              <span class="navbar-toggler-icon"></span>
            </button>
             <?php 
                    if(isset($_POST['from_post_flag'])&& $_POST['from_post_flag']==1){
                          $username = $_POST['username']; 
                          $password  =  $_POST['password']; 
                          $status = $_POST['status'];
                          $mailid = $_POST['mailid'];
                          $name = $_POST['name'];
                          $deportment = $_POST['deportment'];
                          $phonenumber = $_POST['phonenumber'];
                          $handlertype = $_POST['handlertype'];
                          header("Location:admin-page.php?user=succ");
                         $connection=mysqli_connect('localhost','root','','fabevy');
                         $query ="INSERT INTO admin (username,password,status,mailid,name,deportment,phonenumber,handlertype) VALUES('$username','$password','$status','$mailid','$name','$deportment','$phonenumber','$handlertype')";
                         mysqli_query($connection,$query);
                        }
                        ?>
            <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
            <div> <a style="text-decoration:none; color:#fff; padding-left:15px;   " href="logout.php"><i  style="font-size:20px;" class="fas fa-sign-out-alt"></i></a></div>
            
          </div>
        </div>
      </nav>
    </div>
  </header>

<!-- ============================LEFT----SIDE=============================== -->
<div class="container-fluid">
  <div class="row">
    <div class="col-2">
      <div class="left-clm">
          <div class="btns text-center">
            
            <button> <a href="index.php"><i class="fas fa-graduation-cap"></i>Students</a></button>
            
            <div class="btn-top">
                <button> <a href="course-index.php"><i style="padding-left:0px;" class="fas fa-book"></i>course</a></button>

              </div>
            </div>
      </div>
    </div>
 <div class="col-10">
      <div class="right-clm">
      <h1>users Details.</h1>
      <div class="text-start btn-add">
                           <!-- Button trigger modal -->
             <div class="btn-add">
                  <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal"><i class="fas fa-user-plus"></i> Add Admin/Student</button>
               </div>

                                    <!-- Modal -->
             <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
              <div class="modal-dialog">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Admin / Student Details</h5>
                    <?php 
                    if(isset($_POST['from_post_flag'])&& $_POST['from_post_flag']==1){
                          $username = $_POST['username']; 
                          $password  =  $_POST['password']; 
                          $status = $_POST['status'];
                          $mailid = $_POST['mailid'];
                          $name = $_POST['name'];
                          $deportment = $_POST['deportment'];
                          $phonenumber = $_POST['phonenumber'];
                          $handlertype = $_POST['handlertype'];
                          header("Location:admin-page.php?user=succ");
                         $connection=mysqli_connect('localhost','root','','fabevy');
                         $query ="INSERT INTO admin (username,password,status,mailid,name,deportment,phonenumber,handlertype) VALUES('$username','$password','$status','$mailid','$name','$deportment','$phonenumber','$handlertype')";
                         mysqli_query($connection,$query);
                        }
                        ?>
                  </div>  
                  <div class="modal-body ">
                  <form action="admin-page.php" method="post">
                  <input name="from_post_flag" type="hidden" value="1">
                    <div class="mb-3">
                      <label for="username" class="form-label">usernamae</label>
                      <input name="username" type="text" class="form-control" id="username" aria-describedby="emailHelp" required>
                    </div>
                    <div class="mb-3">
                      <label for="password" class="form-label">password</label>
                      <input name="password" type="text" class="form-control" id="password" required>
                    </div>
                    <div class="mb-3">
                      <label for="status" class="form-label">user type</label>
                      <select class="form-control" name="status" id="status" required>
                          <option value="">select</option>
                          <option value="1">staff</option>
                          <option value="2" >student</option>
                      </select>
                    </div>
                    <div class="mb-3">
                      <label for="mailid" class="form-label">mailid</label>
                      <input name="mailid" type="text" class="form-control" id="mailid" required>
                    </div> 
                    <div class="mb-3">
                      <label for="name" class="form-label">full name</label>
                      <input name="name" type="text" class="form-control" id="name" required>
                    </div>
                     <div class="mb-3">
                      <label for="deportment" class="form-label">deportment </label>
                      <select class="form-control" name="deportment" id="deportment" required>
                          <option value="">select</option>
                          <option>FSD</option>
                          <option>HTML/CSS</option>
                          <option>PHP/LARAVEL</option>
                          <option>JAVASRIPT</option>
                          <option>JQUERY</option>
                      </select>
                      
                    </div> 
                    <div class="mb-3">
                      <label for="phonenumber" class="form-label">phonenumber</label>
                      <input name="phonenumber" type="text" class="form-control" id="phonenumber" required>
                    </div>
                     <div class="mb-3">
                      <label for="handlertype" class="form-label">handler type</label>
                      <input name="handlertype" type="text" class="form-control" id="handlertype" required>
                    </div>
                   
                  
                    <button type="submit" name="create" class="btn btn-primary">Submit</button>
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                  </form>
                  </div>
                </div>
              </div>
            </div>
      </div>
      <table class="table table-striped">
        <?php
            $conn=mysqli_connect("localhost","root","","fabevy");
            $sel_query="select * from admin";
            $result=mysqli_query($conn,$sel_query);
            $msg="";
                if(isset($_GET['del']) && $_GET['del']=='succ'){
                    $msg="Your Record Has Been Deleted Successfully.";
                }
                if(isset($_GET['update']) && $_GET['update']=='succ'){
                    $msg="Your Record Has Been updated Successfully.";
                } 
                if(isset($_GET['adding']) && $_GET['adding']=='succ'){
                    $msg="Your Record Has Been created Successfully.";
                } 
                if(isset($_GET['user']) && $_GET['user']=='succ'){
                    $msg="User Has Been created Successfully.";
                } 
                if(isset($_GET['updateadmin']) && $_GET['updateadmin']=='succ'){
                      $msg="User data Has Been updated Successfully.";
                  } 
                if(isset($_GET['del-admin']) && $_GET['del-admin']=='succ'){
                      $msg="User data Has Been deleted Successfully.";
                  } 
               
        ?>
         <div class="text-center">
        <h4 class="animate__bounceout"> <?php echo $msg; ?></h4>
        </div>
       
        <thead>
          <tr>
            <th>USER NAME</th>
            <th>PASSWORD</th>
            <th>STATUS</th>
            <th>MAIL ID</th>        
            <th>FULL NAME</th>
            <th>DEPORTMENT</th>
            <th>PHONE NUMBER</th>
            <th>HANDLER TYPE</th>
            <th>ACTIONS</th>
          </tr>
        </thead>
        <tbody>
          <?php
          while($row = mysqli_fetch_array($result)){
          ?>
          <tr>
            <td><?php echo$row['username'];?></th>
            <td><?php echo$row['password'];?></td>
            <td><?php echo$row['status'];?></td>
            <td><?php echo$row['mailid'];?></td>
            <td><?php echo$row['name'];?></td>
            <td><?php echo$row['deportment'];?></td>
            <td><?php echo$row['phonenumber'];?></td>
            <td><?php echo$row['handlertype'];?></td>
            <td> <a href="admin-update.php ?id=<?php echo$row['id'];?>"><i class="fas fa-pencil-alt"></i></a>  <a href="delete-admin.php ?id=<?php echo$row['id'];?>" onclick="checkdelete(<?php echo $row['id'];?>);"><i class="fas fa-trash-alt"></i></a></td> 
          </tr>
          <?php } ?>  
        </tbody>
      </table>
    </div>
  </div>
</div>

    </div>
      
    </div>

<script>
    function checkdelete(studid){
        if(confirm('Are you sure you want to delete')){
            window.location.href="admin-page.php?id="+studid;
            return true;
        }
        else
        return false;
    }
</script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>
</body>
</html>