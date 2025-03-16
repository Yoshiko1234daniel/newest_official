<?php 
include "conn.php";
session_start();

$msg = "";
if(isset($_POST["submit"])){
    $username = $_POST["username"];
    $password = $_POST["password"];

    $sql = "SELECT * FROM users WHERE username = '$username'";
    $result = mysqli_query($conn, $sql);

    if($result){
        if(mysqli_num_rows($result) == 1){
            $user = $result->fetch_assoc();

            if($password == $user["password"]){
                $user_id = $user["user_id"];
                $msg = "login successfully";
                header("location: Appointment.html");
                exit;
                
            } else {
                $msg = "username and password do not match";
            }
        } else {
            $msg = "account doesn't exist";
        }

    }
}
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible"
        content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title> Login</title>
        <link rel="stylesheet" href="style.css">
        <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    </head>

    <body>
        <header class="header">
            <nav class="navbar">
                <a href="HOME.html">HOME</a>
                <a href="ABOUT.html">ABOUT</a>
                <a href="contact.html">CONTACT</a>
                <a href="DASHBOARDlogin.html">LOGIN</a>
            </nav>
            <form action="#" class="search-bar">
                <input type="text" placeholder="Search...">
                <button type="submit"><i class='bx bx-search'></i></button>
            </form>
        </header>

        <div class="background"></div>
        <div class="container">
            <div class="content">
                <h2 class="logo"><i class='bx bxl-firebase'></i>As-salaam alaikum</h2>
            <div class="text-sci">
                <h2>Welcome<br><span>To Our Community. Welcome Brother</span></h2>

            <p>Islam is not just a religion, but a way of life. It teaches us patience in the face of adversity, humility in times of success, and gratitude for the countless blessings we have. 
                A true Muslim is one who embodies peace, kindness, and compassion toward all of creation.</p>
               
            <div class="social-icons">
                <a href="#"><i class='bx bxl-linkedin'></i></a>
                <a href="#"><i class='bx bxl-facebook'></i></a>
                <a href="#"><i class= 'bx bxl-instagram'></i></a>
                <a href="#"><i class='bx bxl-twitter'></i></a>

            </div>
            </div>
            </div>

                <div class="logreg-box">
                    <div class="form-box login">
                        <form action="#" method="POST">
                            <h2>Sign In</h2>
                            <div class="input-box">
                                <span class="icon"><i class='bx bxs-envelope'></i></span>
                                <input type="username" name="username" required>
                                <label>Username</label>
                            </div>
                            <div class="input-box">
                                <span class="icon"><i class='bx bxs-lock-alt'></i></span>
                                <input type="password" name="password" required>
                                <label>Password</label>
                            </div>
                            <div class="remember-forgot">
                                <label><input type="checkbox">Remember me</label>
                                <a href="#">Forgot password?</a>
                            </div>
                            <button type="submit" name="submit" class="btn">Sign In</button>
                            <p style="margin: 5px"><?php echo $msg; ?></p>
                        </form>
                    </div>
                </div>

                </div>

        </div>
    </body>
</html>