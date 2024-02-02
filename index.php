<?php
    session_start();
    // When a logout request is posted, wipe the session
    if (isset($_POST["logout"])) {
        session_unset();
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Generic Internet Service</title>
</head>
<body>
    <header></header>
    
    <main>
        <?php
        // Here we determine wether a user is logged in and display the corresponding content
        if (!isset($_SESSION["username"])) {

            if (isset($_POST["un"]) && isset($_POST["pw"])) {
                // Generic Password check, to be replaced later
                if ($_POST["un"] == "Richard" && $_POST["pw"] == "Schnitzel") {
                    session_unset();
                    $_SESSION["username"] = $_POST["un"];
                } else {
                    require("./templates/wrongpw.php");
                    require("./templates/login.php");
                } 
            } else {
                require("./templates/login.php");
            }
        } 
        if (isset($_SESSION["username"])) {
            echo "Welcome " . $_SESSION["username"] . "!";
            require("./templates/admin.php");
        }
        ?>
    </main>

    <footer></footer>

</body>
</html>