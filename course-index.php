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
          <a class="navbar-brand" href="#"> <img src="images/fabevy-logo.png" alt="logo"> </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
              <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
            <div><a style="text-decoration:none; color:#fff; padding-left:15px;   " href="admin-page.php"><i style="font-size:20px;" class="fas fa-users-cog"></i></a> <a style="text-decoration:none; color:#fff; padding-left:15px;   " href="logout.php"><i  style="font-size:20px;" class="fas fa-sign-out-alt"></i></a></div>
            
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
      <h1>course Details.</h1>
      <div class="text-start btn-add">
                           <!-- Button trigger modal -->
             <div class="btn-add">
                  <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal"><i class="fas fa-user-plus"></i>Add course</button>
               </div>

                                    <!-- Modal -->
             <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
              <div class="modal-dialog">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Course Details</h5>
                    <?php 
                        if(isset($_POST['from_post_flag'])&& $_POST['from_post_flag']==1){
                          $courseid = $_POST['courseid']; 
                          $coursename  =  $_POST['coursename']; 
                          $coursedescription = $_POST['coursedescription'];
                          header("Location:course-index.php?add=succ");
                         $connection=mysqli_connect('localhost','root','','fabevy');
                         $query ="INSERT INTO course(courseid,coursename,coursedescription) VALUES('$courseid',' $coursename','$coursedescription')";
                         mysqli_query($connection,$query);
                        }
                        ?>
                    
                  </div>  
                  <div class="modal-body ">
                  <form action="course-index.php" method="post">
                  <input name="from_post_flag" type="hidden" value="1">
                    <div class="mb-3">
                      <label for="courseid" class="form-label">course id</label>
                      <input name="courseid" type="text" class="form-control" id="courseid" aria-describedby="emailHelp" required>
                    </div>
             
                    <div class="mb-3">
                      <label for="coursename" class="form-label">course name </label>
                      <select class="form-control" name="coursename" id="coursename" required><br>
                          <option value="">select</option>
                          <option >FSD</option>
                          <option >HTML/CSS</option>
                          <option >PHP & LARAVEL</option>
                          <option >JAVASRIPT</option>
                          <option >jquery</option>
                          </select>            
                    </div>  
                     <div class="mb-3">
                      <label for="coursedescription" class="form-label">course description</label>
                      <input name="coursedescription" type="text" class="form-control" id="coursedescription" required>
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
            $sel_query="select * from course";
            $result=mysqli_query($conn,$sel_query);
            $msg="";
                if(isset($_GET['del']) && $_GET['del']=='succ'){
                    $msg="Your Record Has Been Deleted Successfully.";
                }
                if(isset($_GET['update']) && $_GET['update']=='succ'){
                    $msg="Your Record Has Been updated Successfully.";
                } 
                 if(isset($_GET['add']) && $_GET['add']=='succ'){
                    $msg="Your Record Has Been added Successfully.";
                }
               
                
        ?>
        <div class="text-center">
        <h4 class="animate__bounceout"> <?php echo $msg; ?></h4>
        </div>
       
        <thead>
          <tr>
            <th>COURSE ID</th>
            <th>COURSE NAME</th>
            <th>COURSE DESCRIPTION</th>
            <th>ACTIONS</th>
          </tr>
        </thead>
        <tbody>
          <?php
          while($row = mysqli_fetch_array($result)){
          ?>
          <tr>
            <td><?php echo$row['courseid'];?></th>
            <td><?php echo$row['coursename'];?></td>
            <td><?php echo$row['coursedescription'];?></td>
            <td> <a href="update-course.php ?id=<?php echo$row['id'];?>"><i class="fas fa-pencil-alt"></i></a>    <a href="delete-course.php ?id=<?php echo$row['id'];?>" onclick="checkdelete(<?php echo $row['id'];?>);"><i class="fas fa-trash-alt"></i></a></td> 
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
            window.location.href="index.php?id="+studid;
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