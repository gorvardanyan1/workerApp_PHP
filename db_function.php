<?php
include 'database.php';
function findUser($userName, $password)
{
    global $connection;
    $sql = "SELECT * FROM users WHERE userName = '$userName'";
    $result = mysqli_query($connection, $sql);
    $result = mysqli_fetch_assoc($result);
    if ($result) {
        if (password_verify($password, $result['password'])) {
            $result['password'] = "";
            return $result;
        } else {
            return false;
        }
    } else {
        return false;
    }
};
function addWorker($firstName, $lastName, $age, $position)
{
    global $connection;
    $sql = "INSERT INTO workers (firstName, lastName, age, possition) VALUES ('$firstName', '$lastName', '$age', '$position')";

    // Execute the query
    $result = mysqli_query($connection, $sql);

    if ($result) {
        // Query executed successfully
        return true;
    } else {
        // Query failed
        return false;
    }
}
