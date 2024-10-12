<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Login</title>
</head>
<body>
    <div class="container">
        <div class="box form-box">

            <?php
                include("php/config.php");
               
                if(isset($_POST['submit'])){
                    $email=mysqli_real_escape_string($con,$_POST['email']);
                    $password=mysqli_real_escape_string($con,$_POST['password']);
                    $result=mysqli_query($con,"select * from users where Email='$email' and Password='$password'") or die("Select error");
                    $row=mysqli_fetch_assoc($result);

                    if(is_array($row) && !empty($row)){
                        $_SESSION['email']=$row['Email'];
                        $_SESSION['username']=$row['Username'];
                        $_SESSION['age']=$row['Age'];
                        $_SESSION['id']=$row['Id'];
                       
                    }
                    else{
                        echo "<div class='message'><p>Wrong username  or password! </p></div><br>";
                        echo "<a href='index.php'><button class='btn'>Go Back</button>";
                    }
                    if(isset($_SESSION['email'])){
                        header("Location:home.php");
                    }
                }else{
            ?>


            <header>Login</header>
            <form action="" method="post">
                <div class="field input">
                    <label for="email">Email</label>
                    <input type="text" name="email" id="email" autocomplete="off" required>
                </div>
                <div class="field input">
                    <label for="password">Password</label>
                    <input type="text" name="password" id="password" autocomplete="off" required>
                </div>
                <div class="field">
                    
                    <input type="submit" class="btn" name="submit" value="Login" >
                </div>
                <div class="links">
                    Dont have account? <a href="register.php">Sign Up Now</a>
                </div>
            </form>
        </div>
        <?php } ?>
    </div>
</body>
</html>