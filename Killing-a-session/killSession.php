<?php
/*
    In all killing a SESSION is not recommended, but if you really need to do it, here are the steps.

    1. (Re)start the session with session_start().
    2. Set the $_SESSION array to an empty array.
    3. If using cookies, invalidate (time out) the session cookie.
    4. Destroy the PHP session by executing the session_destroy() function.
*/
echo "<pre>", ini_get("session.use_cookies"), "</pre>";

    function killSession() {
        unset($_SESSION);
        if (ini_get("session.use_cookies")) {
            $params = session_get_cookie_params();
            echo "<pre>", var_dump($params), "</pre>";
            setcookie(session_name(), '', time() - 42000
        );
        }

        session_destroy();
    }

    /*
    The function starts by setting $_SESSION to an empty array (step 2) and ends by calling session_destroy() (step 4). In between, the if statement imple- ments step 3 of the session-killing process: invalidating the session cookie. For this, we check whether cookies are in use, then change the cookie with the current session name to an empty string, also setting an expiring time that’s in the past (time() - 42000), effectively deleting the cookie.
    */