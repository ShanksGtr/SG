<?php

    session_start();
        echo "<script>alert('You have just logged out successfully'); location.href='/index.php';</script>";
    session_destroy();

