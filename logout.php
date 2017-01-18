<?php
    if (isset($_COOKIE['type'])) {
        unset($_COOKIE['type']);
        unset($_COOKIE['userid']);
        unset($_COOKIE['password']);
        setcookie('type', null, -1, '/');
        setcookie('userid', null, -1, '/');
        setcookie('password', null, -1, '/');
    }
    header("Location: index.html");
?>
