<!DOCTYPE html>
<html lang="en">
<?php
include 'db_function.php';
session_start();
?>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <?php
    echo  $_SESSION['user']['firstName']
    ?>

    <div>
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]) ?>" method="post">
            <input type="text" name="firstName" id="firstName" placeholder="FirstName">
            <input type="text" name="lastName" id="lastName" placeholder="LastName">
            <input type="number" name="age" id="age" placeholder="Age">
            <select name="possition" id="possition">
                <option value="manager">Manager</option>
                <option value="staffer">Staffer</option>
            </select>
            <input type="submit" value="Add">
        </form>
    </div>
    <?php
    if ($_SERVER['REQUEST_METHOD'] = "POST") {
        $firstName = $_POST["firstName"];
        $lastName = $_POST["lastName"];
        $age = $_POST['age'];
        $possition = $_POST['possition'];
        if (!empty($firstName) && !empty($lastName) && !empty($age) && !empty($possition)) {
            addWorker($firstName, $lastName, $age, $possition);
        }
    }
    ?>
</body>

</html>