<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css" integrity="sha384-DyZ88mC6Up2uqS4h/KRgHuoeGwBcD4Ng9SiP4dIRy0EXTlnuz47vAwmeGwVChigm" crossorigin="anonymous">
  <link rel="stylesheet" href="css/styles.css">
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
          5C2E91  <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
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
      <h1>Students Details.</h1>
      <div class="text-start btn-add">
                           <!-- Button trigger modal -->
             <div class="btn-add">
                  <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal"><i class="fas fa-user-plus"></i>Add Student</button>
               </div>

                                    <!-- Modal -->
             <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
              <div class="modal-dialog">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Student Details</h5>
                    <?php 
                        if(isset($_POST['from_post_flag'])&& $_POST['from_post_flag']==1){
                          $name = $_POST['name']; 
                          $batchid  =  $_POST['batchid']; 
                          $studentid = $_POST['studentid'];
                          $age = $_POST['age'];
                          $gender = $_POST['gender'];
                          $qualification = $_POST['qualification'];
                          $course = $_POST['course'];
                          $joindate = $_POST['joindate'];
                          $classmode = $_POST['classmode'];
                          $location = $_POST['location'];
                          $referby = $_POST['referby'];
                          $refercontact = $_POST['refercontact'];
                          header("Location:index.php?add=succ");
                         $connection=mysqli_connect('localhost','root','','fabevy');
                         $query ="INSERT INTO student(name,batchid,studentid,age,gender,qualification,course,joindate,classmode,location,referby,refercontact) VALUES('$name','$batchid','$studentid','$age','$gender','$qualification','$course','$joindate','$classmode','$location','$referby','$refercontact')";
                         mysqli_query($connection,$query);
                        }
                        ?>
                    
                  </div>  
                  <div class="modal-body ">
                  <form action="index.php" method="post">
                  <input name="from_post_flag" type="hidden" value="1">
                    <div class="mb-3">
                      <label for="name" class="form-label">Name</label>
                      <input name="name" type="text" class="form-control" id="name" aria-describedby="emailHelp">
                    </div>
                    <div class="mb-3">
                      <label for="batchid" class="form-label">batch id</label>
                      <input name="batchid" type="text" class="form-control" id="batchid">
                    </div>
                    <div class="mb-3">
                      <label for="studentid" class="form-label">student id</label>
                      <input name="studentid" type="text" class="form-control" id="studentid">
                    </div>
                    <div class="mb-3">
                      <label for="age" class="form-label">age</label>
                      <input name="age" type="text" class="form-control" id="age">
                    </div>
                    <div class="mb-3">
                      <label for="gender" class="form-label">gender </label>
                      <select class="form-control" name="gender" id="gender"><br>
                          <option value="">select</option>
                          <option >Male</option>
                          <option >Female</option>
                          <option >Others</option>
                          </select>
                    
                    </div>  
                    <div class="mb-3">
                      <label for="qualification" class="form-label">qualification</label>
                      <select class="form-control" name="qualification" id="qualification"><br>
                          <option value="">select</option>
                          <option >BE</option>
                          <option >CSC</option>
                          <option >BSc</option>
                          <option >BCOM</option>
                          <option >Others</option>
                          </select>
                    
                    </div>  
                    <div class="mb-3">
                      <label for="course" class="form-label">course</label>
                      <select class="form-control" name="course" id="course"><br>
                          <option value="">select</option>
                          <option >FSD</option>
                          <option >HTML/CSS</option>
                          <option >Javasript</option>
                          <option >PHP</option>
                          
                          </select>
                    </div> 
                     <div class="mb-3">
                      <label for="joindate" class="form-label">join date</label>
                      <input name="joindate" type="date" class="form-control" id="jaindate">
                    </div> 
                    <div class="mb-3">
                      <label for="classmode" class="form-label">class mode</label>
                      <select class="form-control" name="classmode" id="classmode">
                          <option value="">select</option>
                          <option >online</option>
                          <option >offline</option>
                          </select>
                    </div> 
                    <div class="mb-3">
                      <label for="location" class="form-label">location</label>
                      <select class="form-control" name="location" id="location">
                          <option value="">select</option>
                          <option >chennai</option>
                          <option >Pavoorchatram</option>
                          </select>
                    </div>
                     <div class="mb-3">
                      <label for="referby" class="form-label">refer by</label>
                      <input name="referby" type="text" class="form-control" id="referby">
                    </div> 
                    <div class="mb-3">
                      <label for="refercontact" class="form-label">refer contact</label>
                      <input name="refercontact" type="text" class="form-control" id="refercontact">
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
            $sel_query="select * from student";
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
            <th>NAME</th>
            <th>BACTH ID</th>
            <th>STUDENT ID</th>
            <th>AGE</th>
            <th>GENDER</th>
            <th>QUALIFICATION</th>
            <th>COURSE</th>
            <th>JOIN DATE</th>
            <th>CLASS MODE</th>
            <th>LOCATION</th>
            <th>REFER BY</th>
            <th>REFER CONTACT</th>
            <th>ACTIONS</th>
          </tr>
        </thead>
        <tbody>
          <?php
          while($row = mysqli_fetch_array($result)){
          ?>
          <tr>
            <td><?php echo$row['name'];?></th>
            <td><?php echo$row['batchid'];?></td>
            <td><?php echo$row['studentid'];?></td>
            <td><?php echo$row['age'];?></td>
            <td><?php echo$row['gender'];?></td>
            <td><?php echo$row['qualification'];?></td>
            <td><?php echo$row['course'];?></td>
            <td><?php echo$row['joindate'];?></td>
            <td><?php echo$row['classmode'];?></td>
            <td><?php echo$row['location'];?></td>
            <td><?php echo$row['referby'];?></td>
            <td><?php echo$row['refercontact'];?></td>
            <td> <a href="update-student.php ?id=<?php echo$row['id'];?>"><i class="fas fa-pencil-alt"></i></a>   <a href="view-student-data.php?id=<?php echo$row['id'];?>"><i class="fas fa-eye"></i></a>  <a href="delete-student.php ?id=<?php echo$row['id'];?>" onclick="checkdelete(<?php echo $row['id'];?>);"><i class="fas fa-trash-alt"></i></a></td> 
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