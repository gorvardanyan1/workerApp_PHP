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

    <form action="userPage.php" method="post" id="userAddForm">
        <input type="text" name="firstName" id="firstName" placeholder="FirstName">
        <input type="text" name="lastName" id="lastName" placeholder="LastName">
        <input type="number" name="age" id="age" placeholder="Age">
        <select name="possition" id="possition">
            <option value="manager">Manager</option>
            <option value="staffer">Staffer</option>
        </select>
        <input type="submit" name="login" value="Add">
    </form>
</body>

</html>
<?php
echo $_GET['id'];

$_POST['firstName'] = "HEllo Armenia"
?>