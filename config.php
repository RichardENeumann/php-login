<?php
    ini_set("session.use_only_cookies", 1);
    ini_set("session.use_strict_mode", 1);

    session_set_cookie_params([
        "lifetime" => 1800,
        "domain" => "vertell.net",
        "path" => "/",
        "secure" => true,
        "httponly" => true,
    ]);

    session_start();

    // Periodically regenerate the session id
    if (!isset($_SESSION["lastSessionRegen"])) {
        session_regenerate_id(true);
        $_SESSION["lastSessionRegen"] = time();
    } else {
        $interval = 60 * 30;
        if (time() - $_SESSION["lastSessionRegen"] >= $interval) {
            session_regenerate_id(true);
            $_SESSION["lastSessionRegen"] = time ();
        }
    }

    // When a logout request is posted, wipe and close the session
    if (isset($_POST["logout"])) {
        session_unset();
        session_destroy();
    }
    