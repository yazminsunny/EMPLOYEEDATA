<?php include('home.php'); ?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Employee Data</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
  </head>
  <body>
    <h1 align=center>EMPLOYEE DATA</h1>
    <div class="container">
      <table class="table">
    <thead>
      <tr>
        <th scope="col">ID</th>
        <th scope="col">Name</th>
        <th scope="col">Email</th>
        <th scope="col">Username</th>
        <th scope="col">Password</th>
        <th scope="col">Age</th>
        <th scope="col">Gender</th>
        <th scope="col">Operations</th>
      </tr>
    </thead>
    <tbody>
      <?php
        $sql= "SELECT * FROM user";
        $queryresult=mysqli_query($db,$sql);
        if($queryresult){
          while ($row=mysqli_fetch_assoc($queryresult)) {
            $id=$row['user_id'];
            $name =$row['name'];
            $email =$row['email'];
            $username =$row['username'];
            $password =$row['password'];
            $age =$row['age'];
            $gender =$row['gender'];
            echo '<tr>
            <th scope="row">'.$id.'</th>
            <td>'.$name.'</td>
            <td>'.$email.'</td>
            <td>'.$username.'</td>
            <td>'.$password.'</td>
            <td>'.$age.'</td>
            <td>'.$gender.'</td>
            <td>
            <button class="btn btn-danger"> <a href="delete.php?delete_id='.$id.'" class="text-light">DELETE</a></button>
            </td>

            </tr>';
          }

        }


       ?>


    </tbody>
  </table>
  <button class="btn btn-danger"> <a href="registration.php" class="text-light">Logout</a></button>
    </div>

  </body>
</html>
