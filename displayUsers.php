<?php  
include 'filehandler.php';
$users =  getAllUser();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>form</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="style.css"> 
</head>
<body>

<div class="container mt-4">
    <table class="table">
        <thead>
            <th>ID</th>
            <th>firstName</th>
            <th>lastName</th>
            <th>address</th>
            <th>userName</th>
            <th>password</th>
            <th>department</th>
        </thead>
        <tbody>
            <?php 
                foreach( $users as $user)
                {
                  echo "<tr>" ;
                  $userdata  = trim($user, "\n");
                  $userdata = explode(":", $userdata);
                  foreach($userdata as $field)
                  {
                    echo "<td>{$field}</td>";
                  }
                  echo "</tr>" ;
                }
            ?>
        </tbody>
    </table>
</div>

      <script src="js/bootstrap.bundle.min.js"></script>
</body>
</html>