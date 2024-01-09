<?php
include "db_function.php";
$id = $_GET['id'];
$id = (string)$id;

deleteWorker($id);
header("Location: userPage.php");
exit();
