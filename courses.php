<?php
include('./dbConnection.php');
// Header Include from mainInclude 
include('./mainInclude/header.php');
?>
<div class="container-fluid bg-dark"> <!-- Start Course Page Banner -->
  <div class="row">
    <img src="./image/Online_Le.jpg" alt="courses" style="height:500px; width:100%; object-fit:cover; box-shadow:10px;" />
  </div>
</div> <!-- End Course Page Banner -->

<div class="container mt-5"> <!-- Start All Course -->
  <h1 class="text-center">All Courses</h1>
  <div class="row mt-4"> <!-- Start All Course Row -->
    <?php
    $sql = "SELECT * FROM course";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
      while ($row = $result->fetch_assoc()) {
        $course_id = $row['course_id'];
        echo ' 
                <div class="col-sm-4 mb-4">
                  <a href="coursedetails.php?course_id=' . $course_id . '" class="btn" style="text-align: left; padding:0px;">
                  <div class="card">
                    <img src="' . str_replace('..', '.', $row['course_img']) . '" class="card-img-top" alt="Guitar" />
                    <div class="card-body" style="height: 180px;">
                      <h5 class="card-title">' . $row['course_name'] . '</h5>
                      <p class="card-text">' . $row['course_desc'] . '</p>
                    </div>
                    <div class="card-footer">
                      <p class="card-text"><b>Dr.' . $row['course_author'] . ' </br>Assoc. Prof. BIT</b></p>

                      <p class="card-text d-inline"> <a class="btn btn-primary text-white font-weight-bolder float-right" href="coursedetails.php?course_id=' . $course_id . '">Details</a>
                    </div>
                  </div> 
                  </a>
                </div>
              ';
      }
    }
    ?>
  </div><!-- End All Course Row -->
</div><!-- End All Course -->

<?php
// Contact Us
include('./contact.php');
?>

<?php
// Footer Include from mainInclude 
include('./mainInclude/footer.php');
?>