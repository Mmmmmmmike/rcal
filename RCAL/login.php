<?php
include_once 'topbar.php';
include_once 'user_register_login.php';
?>
<div class="container">
    <div class="row">
        <h2 style="text-align:center">Register or login an existing account</h2>
        <div class="col">
            <form method="post" name="user_register_submit" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" autocomplete="off" id="user_register"> 
                <h1>Register</h1>
                <hr>
                <input type="text" value="<?php echo $username ?>" placeholder="Enter User name" name="username"><span class="error"><?php echo $usernameErr; ?></span>
                <input type="text" value="<?php echo $email ?>" placeholder="Enter Email" name="email"><span class="error"><?php echo $emailErr; ?></span>
                <input type="password" value="<?php echo $passwd ?>" placeholder="Enter Password" name="passwd"><span class="error"><?php echo $passwdErr; ?></span>
                <input type="password" value="<?php echo $repasswd ?>" placeholder="Repeat Password" name="repasswd"><span class="error"><?php echo $repasswdErr; ?></span><br>
                <hr>
                <input type="submit" form="user_register" value="Register" name="register_submit" class="registerbtn">
            </form>
        </div>
        <div class="vl">
            <span class="vl-innertext">or</span>
        </div>
        <div class="col">
            <form method="post" name="user_login_submit" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" autocomplete="off" id="user_login">
                <h1>Login</h1>
                <hr>
                <input type="text" value="<?php echo $Lusername ?>" name="Lusername" placeholder="Username"><span class="error"><?php echo $LusernameErr; ?></span>
                <input type="password" value="<?php echo $Lpasswd ?>" name="Lpasswd" placeholder="Password"><span class="error"><?php echo $LpasswdErr; ?></span>
                <hr>
                <input type="submit" form="user_login" value="Login" name="login_submit" class="loginbtn">
        
        </form>
        </div>
    </div>
</div>

<div class="bottom-container">
    <a href="resetpw.php" style="color:white" class="btn">Forgot password?</a>
</div>
</body>
</html>