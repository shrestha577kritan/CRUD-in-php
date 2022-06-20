
<?php

require('db.php');

if(!isset($_SESSION['IS_LOGIN'])){
  header('loation:login.php');
  die();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Users</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
</head>
<body>
    <div class="container">
        <button class="btn btn-primary my-5"> <a href="user.php" class="text-light">Add Users</a>
        </button>
        <button class="btn btn-danger my-5"> <a href="login.php" class="text-light">Log out</a>
        </button>

  <table class="table">
  <thead>
    <tr>
      <th scope="col">S.N</th>
      <th scope="col">Name</th>
      <th scope="col">Email</th>
      <th scope="col">Mobile</th>
      <th scope="col">Password</th>
      <th scope="col">Operation</th>
    </tr>
  </thead>
  <tbody>
    <?php
    $sql = " SELECT * FROM `crud` ";
    $result = mysqli_query($con,$sql);
    if($result){
        while( $row = mysqli_fetch_assoc($result)){
            $id =  mysqli_real_escape_string($con,$row['id']);
            $name =  mysqli_real_escape_string($con,$row['name']);
            $email =  mysqli_real_escape_string($con,$row['email']);
            $mobile = mysqli_real_escape_string( $con,$row['mobile']);
            $password =  mysqli_real_escape_string($con,$row['password']);
            echo '
            <tr>
            <th scope="row">'.$id.'</th>
            <td>'.$name.'</td>
            <td>'.$email.'</td>
            <td>'.$mobile.'</td>
            <td>'.$password.'</td>
            <td>
            <button class= "btn btn-primary"><a href="update.php?updateid='.$id.'" class=" text-light">Update</a></button>
            <button class="btn btn-danger"><a href="delete.php?deleteid='.$id.'"  class=" text-light">Delete</a></button>
        </td>
          </tr>
            
            ';

        }
         
    }
    ?>
  


  </tbody>
</table>
    </div>


    
</body>
</html>