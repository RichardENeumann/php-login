<?php
    // Disable session ID via GET/POST
    ini_set("session.use_only_cookies", 1);
    // Refuse externally provided session IDs
    ini_set("session.use_strict_mode", 1);

    session_set_cookie_params([
        "lifetime" => 86400,
        "path" => "/",
        "domain" => "localhost",
        "secure" => true,
        "httponly" => true,
        "samesite" => true,
    ]);

    session_start();
    // Periodically regenerate the session ID
    if (!isset($_SESSION["lastSessionRegen"])) {
        session_regenerate_id(true);
        $_SESSION["lastSessionRegen"] = time();
    } else {
        // Regenerate every x minutes
        $regenInterval = 30;
        if (time() - $_SESSION["lastSessionRegen"] >= $regenInterval * 60) {
            session_regenerate_id(true);
            $_SESSION["lastSessionRegen"] = time();
        }
    }
    // When a logout request is posted, wipe and close the session
    if (isset($_POST["logout"])) {
        session_unset();
        session_destroy();
    }

