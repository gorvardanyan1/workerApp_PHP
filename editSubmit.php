<?php
session_start();
include 'db_function.php';
if ($_SERVER['REQUEST_METHOD'] == "POST") {
    if (!empty($_POST["firstName"]) && !empty($_POST["lastName"]) && !empty($_POST['age']) && !empty($_POST['possition'])) {
        $id = $_GET['id'];
        $firstName = $_POST["firstName"];
        $lastName = $_POST["lastName"];
        $age = $_POST['age'];
        $possition = $_POST['possition'];
        $userID = $_SESSION['user']['id'];
        updateWorker($id, $firstName, $lastName, $age, $possition);
        header("Location: userPage.php");
        exit();
    } else {
        echo "<h3>Fill Fields</h3>";
    }
}
