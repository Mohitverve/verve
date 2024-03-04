
<?php
session_start();
if (isset($_SESSION["signup"])) {
    header("Location: index.php");
}  

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel = "stylesheet" href="styles.css">
</head>
<body>
    
<div class= "container">

<?php

if (isset($_POST["Login"])) {
   $email = $_POST["email"];
   $password = $_POST["password"];
   require_once  "Database.php";
   $sql = "SELECT * FROM  signup WHERE email = '$email'  ";
   $result = mysqli_query($conn, $sql);
   $signup = mysqli_fetch_array( $result, MYSQLI_ASSOC);
   if ($signup) {
      
     if (password_verify($password, $signup["password"])) {
            session_start();
            $_SESSION["signup"]= "yes";
            header("location: index.php");
            die();
     }else {
        echo "<div class= 'alert alert-danger'>Password Does not match</div>";
     }


   } else {
    echo "<div class= 'alert alert-danger'> Email Does not match</div>";
   }
}

?>

<form action="login.php" method="post">
        <div class="form-group">
            <input type="email" class="form-control" name="email" placeholder="Email:">
</div>
  
    <div class="form-group">
        <input type="password" class="form-control" name="password" placeholder="Password:">
   </div>

   
   <div class="form-btn">
        <input type="submit" class="btn btn-primary" value="Login" name="Login" >
   </div>
</form>

<div><p>Not Registered?  <a href="signup.php">Signup Here</a>  </div>

</div>



</body>
</html>
