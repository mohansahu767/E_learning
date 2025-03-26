<?php
if(isset($_SESSION['is_login'])){
  $stuEmail = $_SESSION['stuLogEmail'];
 }
if(isset($_GET['course_id'])){
  $course_id = $_GET['course_id'];
  $sql = "SELECT stu_email,course_id FROM courseorder WHERE course_id = '$course_id' AND stu_email='$stuEmail'";
  $result = $conn->query($sql);
      $row = $result->num_rows;
      
      if($row === 1){
        echo '
        <script>
        var enrollnow = document.getElementById("enrollnow");
        $("#enrollnow").attr("disabled", true);
</script>
        ';
      }
}
?>

<?php
          if(isset($_GET['course_id']) && isset($_GET['stuLogEmail'])){
           $course_id = $_GET['course_id'];
           $stuEmail = $_GET['stuLogEmail'];
           $sql = "SELECT stu_email,course_id FROM courseorder WHERE course_id = '$course_id' AND stu_email='$stuEmail'";
           $result = $conn->query($sql);
           $row = $result->num_rows;
          }
?>

<p class="card-text"><b>Dr.'.$row['course_author'].' </br>Assoc. Prof. BIT</b></p>


<?php
          if(isset($_GET['course_id']) ){
           $course_id = $_GET['course_id'];
           
           $sql = "SELECT stu_email,course_id FROM courseorder WHERE course_id = '$course_id' AND stu_email='$stuEmail'";
           $result = $conn->query($sql);
           $row = $result->num_rows;
           if($result->num_rows > 0){
            echo " <script> location.href='courses.php'; </script>  ";

           }
           else {



           }
          }           
?>