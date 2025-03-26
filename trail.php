<!-- Form Design -->

<form role="form" id="stuRegForm">
    <div class="form-group">
        <i class="fas fa-user"></i><label for="stuname" class="pl-2 font-weight-bold">Name</label>
        <small id="statusMsg1"></small>
        <input type="text" class="form-control" placeholder="Name" name="stuname" id="stuname">
    </div>
    <div class="form-group">
        <i class="fas fa-envelope"></i><label for="stuemail" class="pl-2 font-weight-bold">Email</label>
        <small id="statusMsg2"></small>
        <input type="email" class="form-control" placeholder="Email" name="stuemail" id="stuemail">
        <small class="form-text">We'll never share your email with anyone else.</small>
    </div>
    <div class="form-group">
        <i class="fas fa-key"></i><label for="stupass" class="pl-2 font-weight-bold">New Password</label>
        <small id="statusMsg3"></small>
        <input type="password" class="form-control" placeholder="Password" name="stupass" id="stupass">
    </div>

    <!-- add button with Onclick function -->
</form>







<!-- DB Connesction -->

<?php
$db_host = "localhost";
$db_user = "root";
$db_password = "";
$db_name = "";

// Create Connection
$conn = new mysqli($db_host, $db_user, $db_password, $db_name);

// Check Connection
if ($conn->connect_error) {
    die("connection failed");
}

?>

<!-- End DB Connection -->







<!-- PHP File -->

<?php
if (!isset($_SESSION)) {
    session_start();
}
include_once('../dbConnection.php');


// Inserting or Adding 
if (isset($_POST['stuname']) && isset($_POST['stuemail']) && isset($_POST['stupass'])) {
    $stuname = $_POST['stuname'];
    $stuemail = $_POST['stuemail'];
    $stupass = $_POST['stupass'];
    $sql = "INSERT INTO student(stu_name, stu_email, stu_pass) VALUES ('$stuname', '$stuemail', '$stupass')";
    if ($conn->query($sql) == TRUE) {
        echo json_encode("OK");
    } else {
        echo json_encode("Failed");
    }
}

?>










<!-- JS Validation File -->

<script>
    function name_() {
        var reg = /^[A-Z0-9._%+-]+@([A-Z0-9-]+\.)+[A-Z]{2,4}$/i;
        var stuname = $("#stuname").val();
        var stuemail = $("#stuemail").val();
        var stupass = $("#stupass").val();
        // checking fields on form submission
        if (stuname.trim() == "") {
            $("#statusMsg1").html(
                '<small style="color:red;"> Please Enter Name ! </small>'
            );
            $("#stuname").focus();
            return false;
        } else if (stuemail.trim() == "") {
            $("#statusMsg2").html(
                '<small style="color:red;"> Please Enter Email ! </small>'
            );
            $("#stuemail").focus();
            return false;
        } else if (stuemail.trim() != "" && !reg.test(stuemail)) {
            $("#statusMsg2").html(
                '<small style="color:red;"> Please Enter Valid Email e.g. example@mail.com </small>'
            );
            $("#stuemail").focus();
            return false;
        } else if (stupass.trim() == "") {
            $("#statusMsg3").html(
                '<small style="color:red;"> Please Enter Password ! </small>'
            );
            $("#stupass").focus();
            return false;
        } else {
            $.ajax({
                url: "",
                type: "post",
                data: {
                    // assigned stusignup value just to check all iz well
                    stuname: stuname,
                    stuemail: stuemail,
                    stupass: stupass
                },
                success: function(data) {
                    console.log(data);
                    if (data == "OK") {
                        $("#successMsg").html(
                            '<span class="alert alert-success"> Registration Successful ! </span>'
                        );
                        // making field empty after signup
                        $("#stuRegForm").trigger("reset");
                    } else if (data == "Failed") {
                        $("#successMsg").html(
                            '<span class="alert alert-danger"> Unable to Register ! </span>'
                        );
                    }
                }
            });
        }
    }
</script>


<!-- End   JS Validation File -->