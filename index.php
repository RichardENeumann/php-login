<?php
    session_start();
    $_SESSION["username"] = "Jim";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Test</title>
</head>
<body>
    <?php
    var_dump($_SESSION);
    ?>
</body>
</html>