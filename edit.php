<!DOCTYPE html>
<html lang="en">
<?php
include 'db_function.php';
?>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>

    <form action="userPage.php" method="post" id="userEditForm">
        <input type="text" name="firstName" id="firstName" placeholder="FirstName" value="<?php echo $_GET['firstName']; ?>">
        <input type="text" name="lastName" id="lastName" placeholder="LastName" value="<?php
                                                                                        echo $_GET['lastName'];
                                                                                        ?>">
        <input type="number" name="age" id="age" placeholder="Age" value="<?php echo $_GET['age'] ?>">
        <select name="possition" id="possition">
            <option value="manager">Manager</option>
            <option value="staffer">Staffer</option>
        </select>
        <input type="submit" name="login" value="Add">
    </form>
    <script src="./js/edit.js"></script>
</body>

</html>
<?php

if ($_SERVER['REQUEST_METHOD'] == "POST") {
    if (!empty($_POST["firstName"]) && !empty($_POST["lastName"]) && !empty($_POST['age']) && !empty($_POST['possition'])) {
        $id = $_GET['id'];
        $firstName = $_POST["firstName"];
        $lastName = $_POST["lastName"];
        $age = $_POST['age'];
        $possition = $_POST['possition'];
        $userID = $_SESSION['user']['id'];
        deleteWorker($id, $firstName, $lastName, $age, $possition);

        header("Location: userPage.php");
    } else {
        echo "<h3>Fill Fields</h3>";
    }
}

?>