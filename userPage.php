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
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]) ?>" method="post" id="userAddForm">
            <input type="text" name="firstName" id="firstName" placeholder="FirstName">
            <input type="text" name="lastName" id="lastName" placeholder="LastName">
            <input type="number" name="age" id="age" placeholder="Age">
            <select name="possition" id="possition">
                <option value="manager">Manager</option>
                <option value="staffer">Staffer</option>
            </select>
            <input type="submit" name="login" value="Add">
        </form>
        <table border="2">
            <?php
            $user_arr = findWorker($_SESSION['user']['id']);
            foreach ($user_arr as $user) {
                echo
                "<tr>
                    <td>{$user['firstName']}</td>
                    <td>{$user['lastName']}</td>
                    <td>{$user['age']}</td>
                    <td>{$user['possition']}</td>
                    <td>{$user['addedDate']}</td>
                    <td><a href='edit.php?id={$user['id']}' >Edit</a></td>
                    <td><a href='delete.php?id={$user['id']}' >Delete</a></td>
                    
                </tr>";
            };
            ?>
        </table>
    </div>

    <?php
    if ($_SERVER['REQUEST_METHOD'] == "POST" && isset($_POST['login'])) {
        if (!empty($_POST["firstName"]) && !empty($_POST["lastName"]) && !empty($_POST['age']) && !empty($_POST['possition'])) {
            $firstName = $_POST["firstName"];
            $lastName = $_POST["lastName"];
            $age = $_POST['age'];
            $possition = $_POST['possition'];
            $userID = $_SESSION['user']['id'];
            addWorker($firstName, $lastName, $age, $possition, $userID);

            header("Location: $_SERVER[PHP_SELF]");
        } else {
            echo "<h3>Fill Fields</h3>";
        }
    } else {
        echo  "ok";
    }
    ?>
    <script src="./js/userPage.js"></script>
</body>

</html>