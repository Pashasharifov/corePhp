<?php
session_start();
include("php/config.php");
if(!isset($_SESSION['email'])){
    header("Location:index.php");
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Home</title>
</head>
<body>
    <div class="nav">
        <div class="logo">
            <p><a href="home.php">Logo</a></p>
    </div>
        <div class="right-links">

            <?php
                    $id=$_SESSION['id'];
                    $query=mysqli_query($con, "select * from users where Id='$id'");
                    while($result=mysqli_fetch_assoc($query)){
                        $res_Uname=$result['Username'];
                        $res_Email=$result['Email'];
                        $res_Age=$result['Age'];
                        $res_id=$result['Id'];
                    }
                    echo "<a href='edit.php?Id=$res_id'>Change Profile</a>";

            ?>
           
            <a href="php/logout.php"><button class="btn">Log Out</button></a>
        </div> </div>
        <main>
            <div class="main-box top">
                <div class="top">
                    <div class="box">
                        <p>Hello <b><?php echo  $res_Uname; ?></b>, Welcome</p>
                    </div>
                    <div class="box">
                        <p>Your Email is <b><?php echo  $res_Email; ?></b>.</p>
                    </div>
                    <div class="bottom">
                        <div class="box">
                            <p>And you are <b><?php echo  $res_Age; ?></b> years old.</p>
                        </div>
                    </div>
                </div>
           
        </main>
</div>
</body>
</html>