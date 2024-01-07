<?php
$db_server = "localhost";
$db_userName = "root";
$db_password = "";
$db_name = "workerapp";
$connection  = "";

try {
    $connection =    mysqli_connect($db_server, $db_userName, $db_password, $db_name);
} catch (mysqli_sql_exception) {
    echo "Not Connected";
}
