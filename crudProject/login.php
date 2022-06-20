<?php
include('db.php');
if(isset($_POST['submit'])){
    $username = mysqli_real_escape_string($con,$_POST['username']);
    $password = mysqli_real_escape_string($con, $_POST['password']);
    $sql = "select * from `admin` where username='$username', password='$password'";
    $result =mysqli_query($con,$sql); 

    if(mysqli_num_rows($result) > 0){
     $_SESSION['IS_LOGIN'] = 'yes';
     header('location:displayUser.php');
     die();

    }else{
     echo '<div class="alert alert-danger" role="alert">
     Please Enter your valid data!!
     </div>';
    }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
</head>
<body>
    <div class="container my-5">
    <form method="post">
  <div class="mb-3">
    <label>Username</label>
    <input type="text" class="form-control" placeholder="Enter your Email"  name="username"  autocomplete="off" require>
  </div>
  <div class="mb-3">
    <label>Password</label>
    <input type="password" class="form-control" placeholder="Enter your Password" name="password" require  >
  </div>
  <button type="submit"  name="submit" class="btn btn-primary">Submit</button>
</form>


    </div>


    
</body>
</html>