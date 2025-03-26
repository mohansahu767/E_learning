<?php 
include('./dbConnection.php');
session_start();
 if(!isset($_SESSION['stuLogEmail'])) {
  echo "<script> location.href='loginorsignup.php'; </script>";
 } else {
  $stuEmail = $_SESSION['stuLogEmail'];
  $course_id = $_SESSION['course_id'];
  ?>

  <!-- Check if course is already Enroll -->
<?php

$sql = "SELECT stu_email,course_id FROM courseorder WHERE course_id = '$course_id' AND stu_email='$stuEmail'";
    $result = $conn->query($sql);
    $row = $result->num_rows;
    if($result->num_rows > 0){
    echo "<b> <br> <br> <br> Already Enrolled <br><br> <br>   Redirecting to All Courses....</b>";
    echo "<script> setTimeout(() => {
      window.location.href = 'courses.php';
    }, 2000); </script>";
   }
   else {
?>

<!-- Checkout Page  -->
  <!DOCTYPE html>
  <html lang="en">
  <head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">

    <!-- Font Awesome CSS -->
    <link rel="stylesheet" type="text/css" href="css/all.min.css">

    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css?family=Ubuntu" rel="stylesheet">

    <!-- Custom Style CSS -->
    <link rel="stylesheet" type="text/css" href="./css/style.css" />
    
   <title>Checkout</title>
  </head>
  <body>
  <div class="container mt-5">
    <div class="row">
    <div class="col-sm-6 offset-sm-3 jumbotron">
    <h3 class="mb-5">Welcome to E-Learning Payment Page</h3>
    <form method="post" action="./enrollmentdone.php">
      <div class="form-group row">
       <label for="ORDER_ID" class="col-sm-4 col-form-label">Order ID</label>
       <div class="col-sm-8">
         <input id="ORDER_ID" class="form-control" tabindex="1" maxlength="20" size="20" name="ORDER_ID" autocomplete="off"
          value="<?php echo  "ENROLL" . rand(10000,99999999)?>" readonly>
       </div>
      </div>
      <div class="form-group row">
       <label for="CUST_ID" class="col-sm-4 col-form-label">Student Email</label>
       <div class="col-sm-8">
         <input id="CUST_ID" class="form-control" tabindex="2" maxlength="12" size="12" name="CUST_ID" autocomplete="off" value="<?php if(isset($stuEmail)){echo $stuEmail; }?>" readonly>
       </div>
      </div>
      
      <div class="text-center">
       <input value="Enroll" type="submit"	class="btn btn-primary" onclick="">
       <a href="./courses.php" class="btn btn-secondary">Cancel</a>
      </div>
     </form>
     <small class="form-text text-muted">Note: Complete Enrollment by Clicking Enroll Button</small>
     </div>
    </div>
  </div>

    <!-- Jquery and Boostrap JavaScript -->
    <script type="text/javascript" src="js/jquery.min.js"></script>
    <script type="text/javascript" src="js/popper.min.js"></script>
    <script type="text/javascript" src="js/bootstrap.min.js"></script>

    <!-- Font Awesome JS -->
    <script type="text/javascript" src="js/all.min.js"></script>

    <!-- Custom JavaScript -->
    <script type="text/javascript" src="js/custom.js"></script>

  </body>
  </html>
 <?php    }}
           ?>

