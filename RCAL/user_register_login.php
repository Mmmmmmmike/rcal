<?php

$username = "";
$Lusername = "";
$email = "";
$passwd = "";
$Lpasswd = "";
$repasswd = "";
$usernameErr = "";
$LusernameErr = "";
$emailErr = "";
$passwdErr = "";
$LpasswdErr = "";
$repasswdErr = "";
$allow_username_to_input = FALSE;
$allow_email_to_input = FALSE;
$allow_passwd_to_input = FALSE;
setini();
session_start();
if (isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true) {
    if (basename($_SERVER['PHP_SELF']) == "login.php") {
        header("location: home.php");
        exit;
    }
}
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['register_submit'])) {
    if (empty($_POST["username"])) {
        $usernameErr = "Username is required";
        $allow_username_to_input = FALSE;
    } else {
        $username = test_input($_POST["username"]);
        $allow_username_to_input = TRUE;
// check if name only contains letters and whitespace
        if (!preg_match("/^[a-zA-Z ]*$/", $username)) {
            $usernameErr = "Only letters and white space allowed";
            $allow_username_to_input = FALSE;
        }
    }

    if (empty($_POST["email"])) {
        $emailErr = "Email is required";
        $allow_email_to_input = FALSE;
    } else {
        $email = test_input($_POST["email"]);
        $allow_email_to_input = TRUE;
// check if email is valid
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $emailErr = "Invalid email format";
            $allow_email_to_input = FALSE;
        }
    }

    if (empty($_POST["passwd"])) {
        $passwdErr = "Password is required";
        $allow_passwd_to_input = FALSE;
    }
    if (empty($_POST["repasswd"])) {
        $repasswdErr = "Please re-input password";
    } else {
        $passwd = test_input($_POST["passwd"]);
        $repasswd = test_input($_POST["repasswd"]);
        $allow_passwd_to_input = TRUE;
// check if name only contains letters and whitespace
        if ($passwd != $repasswd) {
            $passwdErr = "Password mismatch";
            $repasswdErr = "Password mismatch";
            $allow_passwd_to_input = FALSE;
        }
    }

    if ($allow_username_to_input == TRUE && $allow_email_to_input == TRUE && $allow_passwd_to_input == TRUE) {
        if (include 'DBConnect.php') {
            $result = $conn->query("SELECT email FROM user_account WHERE email='$email'");
            if ($result === FALSE) {
                echo "Error: " . $sql . "<br>" . $conn->error;
            } else if ($result->num_rows == 0) {
                $sql = "INSERT INTO user_account (email, username, password, user_type)
                            VALUES ('$email', '$username', '$passwd', 'user')";
                if ($conn->query($sql) === FALSE) {
                    echo "Error: " . $sql . "<br>" . $conn->error;
                }
            } else {
                print "Email Used";
            }
            header("Location:login.php");
        }
        $conn->close();
    }
} else if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['login_submit'])) {
    if (empty($_POST["Lusername"])) {
        $LusernameErr = "Username is required";
        $allow_username_to_input = FALSE;
    } else {
        $Lusername = test_input($_POST["Lusername"]);
        $allow_username_to_input = TRUE;
    }
    if (empty($_POST["Lpasswd"])) {
        $LpasswdErr = "Password is required";
        $allow_passwd_to_input = FALSE;
    } else {
        $Lpasswd = test_input($_POST["Lpasswd"]);
        $allow_passwd_to_input = TRUE;
    }

    if ($allow_username_to_input == TRUE && $allow_passwd_to_input == TRUE) {
        if (include 'DBConnect.php') {
            $result = $conn->query("SELECT username FROM user_account WHERE username='$Lusername'");
            if ($result === FALSE) {
                echo "Error: " . $sql . "<br>" . $conn->error;
            } else if ($result->num_rows > 0) {
                $sql = "SELECT password FROM user_account WHERE password='$Lpasswd'";
                $result = $conn->query($sql);
                if ($result->num_rows == 0) {
                    $LpasswdErr = 'Password Incorrect';
                } else {
                    session_start();
                    // Password is correct, so start a new session
                    session_start();

                    // Store data in session variables
                    $_SESSION["loggedin"] = true;
                    $_SESSION["username"] = $Lusername;

                    // Redirect user to welcome page
                    header("location: home.php");
                }
                if ($conn->query($sql) === FALSE) {
                    echo "Error: " . $sql . "<br>" . $conn->error;
                }
            } else {
                $LusernameErr = "User not exists";
            }
        }

        $conn->close();
        setini();
    }
}

function setini() {
    $username = "";
    $Lusername = "";
    $email = "";
    $passwd = "";
    $Lpasswd = "";
    $repasswd = "";
    $usernameErr = "";
    $LusernameErr = "";
    $emailErr = "";
    $passwdErr = "";
    $LpasswdErr = "";
    $repasswdErr = "";
    $allowtoinput = TRUE;
    $allowtoinput = TRUE;
    return;
}

function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}
?>

