<?php

    session_start();
        echo "<script>alert('You have just logged out successfully'); location.href='/login.html';</script>";
    session_destroy();

