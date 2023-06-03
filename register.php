<?php  
   $firatNameerror= $lastNameError=$addressError=$userNameError=$passwordError="";
   $oldfiratName= $oldlastName=$oldaddress=$olduserName="";
   if(isset($_GET) and !empty($_GET))
   {
    $errors = json_decode($_GET["errors"],associative:1);
    if(array_key_exists("firstName",$errors))
    {
        $firatNameerror = $errors["firstName"];
    }
    if(array_key_exists("lastName",$errors))
    {
        $lastNameError = $errors["lastName"];
    }
    if(array_key_exists("address",$errors))
    {
        $addressError = $errors["address"];
    }
    if(array_key_exists("username",$errors))
    {
        $userNameError = $errors["username"];
    }
    if(array_key_exists("password",$errors))
    {
        $passwordError = $errors["password"];
    }
    if(isset($_GET["oldData"]))
    {
        $old_data= json_decode($_GET["oldData"],associative:1);
        if(isset($old_data["firstName"]))
        {
            $oldfiratName = $old_data["firstName"];
        }
    }
    if(isset($_GET["oldData"]))
    {
        $old_data= json_decode($_GET["oldData"],associative:1);
        if(isset($old_data["lastName"]))
        {
            $oldlastName = $old_data["lastName"];
        }
    }
    if(isset($_GET["oldData"]))
    {
        $old_data= json_decode($_GET["oldData"],associative:1);
        if(isset($old_data["address"]))
        {
            $oldaddress = $old_data["address"];
        }
    }
    if(isset($_GET["oldData"]))
    {
        $old_data= json_decode($_GET["oldData"],associative:1);
        if(isset($old_data["username"]))
        {
            $oldlastName = $old_data["username"];
        }
    }
   } 
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

    <form class="parent" action="index.php" method="POST">
        <div class="child">
            <h1>Register Form</h1>
            <form class="form" action="home.html" method="post">
                <div id="input1">
                    <input type="text" name="<?php echo "$oldfiratName" ?>" id="userName" placeholder="Enter First Name">
                    <div class="text-danger mt-2">
                        <?php echo "$firatNameerror"; ?>
                    </div>
                </div>
                <br>
                <div id="input1">
                    <input type="text" name="lastName" id="userName" placeholder="Enter Last Name">
                    <div class="text-danger mt-2">
                        <?php echo "$lastNameError"; ?>
                    </div>
                </div>
                <br>
                <textarea name="address" id="" cols="30" rows="7" placeholder="Enter your address"></textarea>
                <div class="text-danger mt-2">
                        <?php echo "$addressError"; ?>
                    </div>
                <br>

                <br>

               <div id="input3">
                    <label for="">Enter Your language : </label>
                    <span>Php </span>
                    <input type="checkbox" name="userLanguage[]" value="php" >
                    <span>Html </span>
                    <input type="checkbox" name="userLanguage[]" value="html">
                    <span>MySql </span>
                    <input type="checkbox" name="userLanguage[]" value="mysql">
                    <span>JavaScript</span>
                    <input type="checkbox" name="userLanguage[]" value="javascript">
               </div>

                <br>

                <div id="input4">
                    <label for="">Enter Your Gender : </label>
                <span>Male</span>
                <input type="radio" name="gender" vlaue="male">
                <span>Female</span>
                <input type="radio" name="gender" value="female">
                </div>
                
                <br>

                <div id="input1">
                    <input type="text" name="username" id="userName" placeholder="Enter user name">
                    <div class="text-danger mt-2">
                        <?php echo "$userNameError"; ?>
                    </div>
                </div>
                <br>
                <div id="input1">
                    <input type="password" name="password" id="userName" placeholder="Enter your password">
                    <div class="text-danger mt-2">
                        <?php echo "$passwordError"; ?>
                    </div>
                </div>
                <br>
                <select name="department" id="">
                    <option value="opensource">Open source</option>
                    <option value="embeded">Embeded</option>
                    <option value="php">php</option>
                </select>
                <br>
                <br>
                <div>
                    <input type="submit" value="Submit" id="buttonSubmit">
                </div>


            </form>
        </div>
    </form>

      <script src="js/bootstrap.bundle.min.js"></script>
</body>
</html>