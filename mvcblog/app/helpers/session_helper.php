<?php
    session_start();

    function isLoggedIn() {
        if (isset($_SESSION['dni'])) {
            return true;
        } else {
            return false;
        }
    }
