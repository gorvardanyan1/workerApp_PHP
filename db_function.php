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
function addWorker($firstName, $lastName, $age, $position, $userID)
{
    global $connection;
    $sql = "INSERT INTO workers (firstName, lastName, age, possition,userID) VALUES ('$firstName', '$lastName', '$age', '$position', '$userID')";

    $result = mysqli_query($connection, $sql);

    if ($result) {
        return true;
    } else {
        return false;
    }
}
function findWorker($id, $count = false)
{
    global $connection;
    $sql = "SELECT * FROM workers WHERE userID = '$id'";
    $result = mysqli_query($connection, $sql);
    // $result = mysqli_fetch_assoc($result);
    if (!$count) {
        $users_arr = [];
        if ($result) {
            while ($row = mysqli_fetch_assoc($result)) {
                array_push($users_arr, $row);
            }
            return $users_arr;
        } else {
            return false;
        }
    } else {
        return mysqli_fetch_assoc($result);
    }
};
function deleteWorker($id)
{
    global $connection;
    $sql = "DELETE FROM workers WHERE id = '$id'";
    $result =   mysqli_query($connection, $sql);
    if ($result) {
        return true;
    } else {
        return false;
    }
}
function updateWorker($id, $firstName, $lastName, $age, $position)
{
    global $connection;
    $sql = "UPDATE workers SET firstName = $firstName, lastName = $lastName , age = $age ,position = $position WHERE id = $id";
    mysqli_query($connection, $sql);
}
