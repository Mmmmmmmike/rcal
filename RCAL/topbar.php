<?php
include_once 'user_register_login.php';
?>
<html>
    <head>
        <meta charset="UTF-8" name="viewport" content="width=device-width, initial-scale=1.0"/>
        <link rel="stylesheet" type="text/css" href="styleBG.css"/>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"/>
        <title>Activity submit</title>
    </head>
    <script>
        /* Toggle between adding and removing the "responsive" class to topnav when the user clicks on the icon */
        function myFunction() {
            var x = document.getElementById("myTopnav");
            if (x.className === "topnav") {
                x.className += " responsive";
            } else {
                x.className = "topnav";
            }
        }
    </script>
    <body>
        <?php
        echo "<div class=\"topnav\" id=\"myTopnav\">";
        if (basename($_SERVER['PHP_SELF']) == "home.php")
            echo "<a class=\"active\" href=\"home.php\">Home</a>";
        else
            echo "<a href=\"home.php\">Home</a>";

        if (basename($_SERVER['PHP_SELF']) == "about.php")
            echo "<a class=\"active\" href=\"about.php\">About</a>";
        else
            echo "<a href=\"about.php\">About</a>";

        if (basename($_SERVER['PHP_SELF']) == "activity.php")
            echo "<a class=\"active\" href=\"activity.php\">Activity</a>";
        else
            echo "<a href=\"activity.php\">Activity</a>";

        if (basename($_SERVER['PHP_SELF']) == "submit.php")
            echo "<a class=\"active\" href=\"submit.php\">Submit Activity</a>";
        else
            echo "<a href=\"submit.php\">Submit Activity</a>";
        if (isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true) {
                echo "<a href=\"logout.php\" style=\"float:right; margin-left:10px;\">Logout</a>";
                echo "<p align=\"right\" style=\"font-size:15px; color:white\">Welcome, ". $_SESSION["username"]. "</p>";
        }
        else {
            if (basename($_SERVER['PHP_SELF']) == "login.php")
                echo "<a class=\"active\" href=\"login.php\">Login/Sign up</a>";
            else
                echo "<a href=\"login.php\">Login/Sign up</a>";
        }
        echo "<a href=\"javascript:void(0);\" class=\"icon\" onclick=\"myFunction()\">";
        echo "<i class=\"fa fa-bars\"></i>";
        echo "</a>";
        echo "</div>";
        ?>
    </body>
</html>


