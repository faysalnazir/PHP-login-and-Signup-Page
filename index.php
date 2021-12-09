
<? require('connection.php');
   session_start();
?>
 <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User - Login and Register</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <header>
        <b>Faisal Web Developer</b>
        <nav>
            <a href="#">HOME</a>
            <a href="#">BLOG</a>
            <a href="#">CONTACT US</a>
            <a href="#">ABOUT US</a>
        </nav>
        <?php
        if(isset($_SESSION['logged_in']) && $_SESSION['logged_in']==true)
        {
            echo"loggedin";
        }
        ?>
        <div class="sign-in-up">
            <button type="button" onclick="popup('login-popup')">LOGIN</button>
            <button type="button" onclick="popup('register-popup')">REGISTER</button>

        </div>
    </header>
 <!-- For Login -->
<div class="popup-container" id="login-popup">
    <div class="popup">
        <form action="login_register.php" method="POST">
            <h2>
                <span>USER LOGIN</span>
                <button type="reset" onclick="popup('login-popup')">X</button>
            </h2>
            <input type="text" placeholder="E-mail or Username" name="email_username">
            <input type="password" placeholder="Password" name="password">
            <button type="submit" class="login-btn" name="login">LOGIN</button>
        </form>
    </div>
</div>

<!-- For Sign up  -->
<div class="popup-container" id="register-popup">
    <div class="register popup">
        <form action="login_register.php" method="POST">
            <h2>
                <span>USER REGISTER</span>
                <button type="reset" onclick="popup('register-popup')">X</button>
            </h2>
            <input name="fullname" type="text" placeholder="FULL NAME">
            <input name="username" type="text" placeholder="Username">
            <input name="email" type="email" placeholder="E-mail">
            <input name="password" type="password" placeholder="Password">
            <button type="submit" class="register-btn" name="register">REGISTER</button>
        </form>
    </div>
</div>

<?php
 if(isset($_SESSION['logged_in']) && $_SESSION['logged_in']==true)
 {
     echo"<h1 style='text-align: center; margin-top: 200px'>WELCOME TO THIS WEBSITE - $_SESSION[username]</h1>";
 }
?>

<script>
    function popup(popup_name){
        get_popup=document.getElementById(popup_name);
        if(get_popup.style.display=="flex"){

            get_popup.style.display="none";
        }
        else{
            get_popup.style.display="flex";
            
        }


    }
</script>

</body>
</html>