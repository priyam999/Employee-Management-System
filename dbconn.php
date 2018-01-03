<?php
    define('DB_SERVER', 'HOSTNAME');
    define('DB_USERNAME', 'USERNAME');
    define('DB_PASSWORD', 'PASSWORD');
    define('DB_DATABASE', 'DATABASE-NAME');
    $db = mysqli_connect(DB_SERVER,DB_USERNAME,DB_PASSWORD,DB_DATABASE);
    if (!$db)
    {
        die("Database Error!");
    }
?>