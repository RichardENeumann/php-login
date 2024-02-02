<?php
    session_start();
    session_unset();
    if (isset($_POST["un"]) && isset($_POST["pw"])) {
        // Generic Password check, to be replaced later
        if ($_POST["un"] == "Richard" && $_POST["pw"] == "Schnitzel") {
            $_SESSION["username"] = $_POST["un"];
        }
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
    <?php
    if (!isset($_SESSION["username"])) {
        require("./templates/login.php");
    } else {
        echo "Welcome " . $_SESSION["username"] . "!";
        require("./templates/admin.php");
    }
    
    ?>
</body>
</html>