<?php 
include('./dbConnection.php');
session_start();
if(!isset($_SESSION['stuLogEmail'])) {
 echo "<script> location.href='loginorsignup.php'; </script>";
} else { 
 date_default_timezone_set('Asia/Kolkata');
 $date = date("Y-m-d H:i:s");
 if(isset($_POST['ORDER_ID'])){
  $order_id = $_POST['ORDER_ID'];
  $stu_email = $_SESSION['stuLogEmail'];
  $course_id = $_SESSION['course_id'];
  $status = "Success";
  $respmsg = "Done";
  $date = $date;
  $sql = "INSERT INTO courseorder(order_id, stu_email, course_id, status, respmsg, order_date) VALUES ('$order_id', '$stu_email', '$course_id', '$status', '$respmsg', '$date')";
   if($conn->query($sql) == TRUE){
    echo "Redirecting to My Profile....";
    echo "<script> setTimeout(() => {
     window.location.href = './Student/myCourse.php';
   }, 1500); </script>";
   };
 } else {
 echo "<b>Transaction status is failure</b>" . "<br/>";
 }
}
?>