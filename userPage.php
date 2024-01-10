<!DOCTYPE html>
<html lang="en">
<?php
include 'db_function.php';
session_start();
if (!$_SESSION['user']) {
    header('Location: index.php');
};
?>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./styles/userPage/userPage.style.css">
    <title>Document</title>
</head>

<body>
    <div class="container">
        <?php

        $userData =  "<h4> {$_SESSION['user']['firstName']}  {$_SESSION['user']['lastName']}</h4> "
        ?>
        <div class="header">
            <?php echo $userData ?>
            <a href="logOut.php">Log Out</a>
        </div>
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
            <table>
                <thead>
                    <tr>
                        <th>First Name</th>
                        <th>Last Name</th>
                        <th>Age</th>
                        <th>Position</th>
                        <th>Addedd Date</th>
                        <th colspan="2">Action</th>
                    </tr>
                </thead>
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
                    <td><a href='edit.php?id={$user['id']}&firstName={$user['firstName']}&lastName={$user['lastName']}&age={$user['age']}&position={$user['possition']}' >
                    <img src='./images/pen.png'>
                    </a></td>
                    <td>

                    <a href='delete.php?id={$user['id']}' >
                    <img src='./images/remove.png'>
                    </a>
                    </td>
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
                header("Location: userPage.php");
                exit();
            } else {
                echo "<h3>Fill Fields</h3>";
            }
        }
        ?>
    </div>

    <script src="./js/userPage.js"></script>
</body>

</html>