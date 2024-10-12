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
            <?php include("php/config.php");
            if(isset($_POST['submit'])){
                $username=$_POST['username'];
                $email=$_POST['email'];
                $age=$_POST['age'];
                $password=$_POST['password'];

                //verifiying the unique email

                $verify_query=mysqli_query($con,"select Email from users where Email='$email'");
                if(mysqli_num_rows($verify_query)!=0){
                    echo "<div class='message'><p> This email is used , Try Another One Please! </p></div><br>";
                    echo "<a href='javascript:self.history.back()'><button class='btn'>Go Back</button>";
                }
                else{
                    mysqli_query($con,"insert into users(Username, Email, Age, Password) values ('$username', '$email', '$age', '$password')") or die("Error Occured");
                    echo "<div class='message'><p> Registration succesfully! </p></div><br>";
                    echo "<a href='index.php'><button class='btn'>Login now</button>";
                }
            }else{

            
            ?>
            <header>Login</header>
            <form action="" method="post">
                <div class="field input">
                    <label for="username">Username</label>
                    <input type="text" name="username" id="username" autocomplete="off" required>
                </div>
                <div class="field input">
                    <label for="email">Email</label>
                    <input type="text" name="email" id="email" autocomplete="off" required>
                </div>
                <div class="field input">
                    <label for="age">Age</label>
                    <input type="number" name="age" id="age" autocomplete="off" required>
                </div>
                <div class="field input">
                    <label for="password">Password</label>
                    <input type="text" name="password" id="password" autocomplete="off" required>
                </div>
                <div class="field">
                   
                    <input type="submit" class="btn" name="submit" value="Register" >
                </div>
                <div class="links">
                    Already a member? <a href="index.php">Sign In</a>
                </div>
            </form>
        </div>
        <?php } ?>
    </div>
</body>
</html>