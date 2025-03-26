<?php 
include "config.php";  if (isset($_POST['submit'])) 
{    $first_name = $_POST['firstname'];    $last_name = $_POST['lastname'];    $email = $_POST['email'];    $password = $_POST['password'];    $gender = $_POST['gender'];   
 $sql = "INSERT INTO `users`(`firstname`, `lastname`, `email`, `password`, `gender`) VALUES ('$first_name','$last_name','$email','$password','$gender')"; 
    $result = $conn->query($sql);  
      if ($result == TRUE) 
      {      echo "New record created successfully.";
        }
        else{      echo "Error:". $sql . "<br>". $conn->error;    }   
          $conn->close(); 
} ?>
<!DOCTYPE html>
<html>

<body>
    <h2>Signup Form</h2>
    <form action="" method="POST">
        <fieldset>
            <legend>Personal information:</legend> First name:<br> <input type="text" name="firstname"> <br> Last
            name:<br> <input type="text" name="lastname"> <br> Email:<br> <input type="email" name="email"> <br>
            Password:<br> <input type="password" name="password"> <br> Gender:<br> <input type="radio" name="gender"
                value="Male">Male <input type="radio" name="gender" value="Female">Female <br><br> <input type="submit"
                name="submit" value="submit">
        </fieldset>
    </form>
</body>

</html>





<?php include "config.php";$sql = "SELECT * FROM users";$result = $conn->query($sql);?>
<!DOCTYPE html>
<html>

<head>
    <title>View Page</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
</head>

<body>
    <div class="container">
        <h2>users</h2>
        <table class="table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>First Name</th>
                    <th>Last Name</th>
                    <th>Email</th>
                    <th>Gender</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php    
                if ($result->num_rows > 0) 
                  {    while ($row = $result->fetch_assoc()) 
                    {        ?>
                <tr>
                    <td>
                        <?php echo $row['id']; ?>
                    </td>
                    <td>
                        <?php echo $row['firstname']; ?>
                    </td>
                    <td>
                        <?php echo $row['lastname']; ?>
                    </td>
                    <td>
                        <?php echo $row['email']; ?>
                    </td>
                    <td>
                        <?php echo $row['gender']; ?>
                    </td>
                    <td><a class="btn btn-info" href="update.php?id=<?php echo $row['id']; ?>">Edit</a>&nbsp;<a
                            class="btn btn-danger" href="delete.php?id=<?php echo $row['id']; ?>">Delete</a></td>
                </tr>
                <?php       }            }        ?>
            </tbody>
        </table>
    </div>
</body>

</html>






<?php include "config.php";    
if (isset($_POST['update'])) 
{        $firstname = $_POST['firstname'];        
$user_id = $_POST['user_id'];        
$lastname = $_POST['lastname'];      
  $email = $_POST['email'];       
   $password = $_POST['password'];      
     $gender = $_POST['gender'];        
      $sql = "UPDATE `users` SET `firstname`='$firstname',`lastname`='$lastname',`email`='$email',`password`='$password',`gender`='$gender' WHERE `id`='$user_id'";      
         $result = $conn->query($sql);        
          if ($result == TRUE)
           {            echo "Record updated successfully.";      }
          else{            echo "Error:" . $sql . "<br>" . $conn->error;        }  
          } if (isset($_GET['id'])) 
          {    $user_id = $_GET['id'];  
             $sql = "SELECT * FROM `users` WHERE `id`='$user_id'";  
               $result = $conn->query($sql);   
                 if ($result->num_rows > 0) 
                 {                
                    while ($row = $result->fetch_assoc()) 
                    {            $first_name = $row['firstname'];  
    $lastname = $row['lastname']; 
    $email = $row['email'];  
    $password  = $row['password'];        
       $gender = $row['gender'];            
        $id = $row['id'];        
                                                   }     
                                                   ?>
<h2>User Update Form</h2>
<form action="" method="post">
    <fieldset>
        <legend>Personal information:</legend> First name:<br> <input type="text" name="firstname"
            value="<?php echo $first_name; ?>"> <input type="hidden" name="user_id" value="<?php echo $id; ?>"> <br>
        Last name:<br> <input type="text" name="lastname" value="<?php echo $lastname; ?>"> <br> Email:<br> <input
            type="email" name="email" value="<?php echo $email; ?>"> <br> Password:<br> <input type="password"
            name="password" value="<?php echo $password; ?>"> <br> Gender:<br> <input type="radio" name="gender"
            value="Male" <?php if($gender=='Male' ){ echo "checked" ;} ?> >Male <input type="radio" name="gender"
            value="Female" <?php if($gender=='Female' ){ echo "checked" ;} ?>>Female <br><br> <input type="submit"
            value="Update" name="update">
    </fieldset>
</form>

<br><a href="index.php"><b>Home</b></a>
</body>

</html>
<?php    } else{         header('Location: view.php');    } }?>