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
      <h1>Update Details.</h1>
      <?php
          $conn=mysqli_connect("localhost","root","","fabevy");
          if(isset($_POST['form_post_flag']) && $_POST['form_post_flag']==1){
          $update_query="update course set courseid= '".$_POST['course_courseid']."', coursename= '".$_POST['course_coursename']."', coursedescription = '".$_POST['course_coursedescription']."' where id=".$_GET['id'];
          $result=mysqli_query($conn,$update_query);
          header("Location:course-index.php?update=succ");
          }
          $sel_query="select * from course where id=".$_GET['id'];
          $result=mysqli_query($conn,$sel_query);
          $row=mysqli_fetch_array($result);
       ?>

        <form name="student_details" id="emp_details" method="post">
          <input type="hidden" name="form_post_flag" value="1" required>
          course id<input class="form-control" name="course_courseid" id="course_courseid" required type="text" value="<?php echo $row['courseid']; ?>"> <br>
          course name<select class="form-control" name="course_coursename" id="course_coursename" required><br>
          <option value="">select</option>
          <option value="FSD" <?php if($row['coursename']=='FSD') echo"selected" ?>>FSD</option>
          <option value="HTML/CSS" <?php if($row['coursename']=='HTML/CSS') echo"selected" ?>>HTML/CSS</option>
          <option value="PHP & LARAVEL" <?php if($row['coursename']=='PHP & LARAVEL') echo"selected" ?>>PHP & LARAVEL</option>
          <option value="JAVASRIPT" <?php if($row['coursename']=='JAVASRIPT') echo"selected" ?>>JAVASRIPT</option>
          <option value="jquery" <?php if($row['coursename']=='jquery') echo"selected" ?>>jquery</option>
          </select><br>
          course description<input class="form-control" name="course_coursedescription" id="course_coursedescription" type="text" required value="<?php echo $row['coursedescription']; ?>"><br>
           <div class="upt-btn">  <button style="background-color:#212529; color:white;" type="submit" onclick="return validate();" name="btn_submit" value="submit" class="btn  btn">Submit</button>
           <button  style="margin-left:10px; color:white;" type="cancel" onclick="return validate();" name="btn_submit" value="submit" class="btn btn-secondary ">cancel</button>
           </div>
           
          

        </form>




              </div>
            </div>
</div>

    </div>
      
    </div>
  
<script>
    function checkdelete(studid){
        if(confirm('Are you sure you want to delete')){
            window.location.href="course-index.php?id="+studid;
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