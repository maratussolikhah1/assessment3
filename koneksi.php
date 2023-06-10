<?php

    define('HOST', 'localhost');
    define('USER', 'root');
    define('PASS', '');
    define('DB', 'tubes_api');

    $db_connect = mysqli_connect( HOST, USER, PASS, DB ) or die ('Tidak dapat tersambung');

?>
