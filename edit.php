<!DOCTYPE html>
<html lang="en">
<?php
include 'db_function.php';
?>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./styles/edit/edit.style.css">
    <title>Document</title>
</head>

<body>
    <div class="container">
        <form action="editSubmit.php?id=<?php echo $_GET['id'] ?>" method="post" id="userEditForm">
            <div>
                <input type="text" name="firstName" id="firstName" placeholder="FirstName" value="<?php echo $_GET['firstName']; ?>">
            </div>
            <div>
                <input type="text" name="lastName" id="lastName" placeholder="LastName" value="<?php
                                                                                                echo $_GET['lastName'];
                                                                                                ?>">
            </div>
            <div>
                <input type="number" name="age" id="age" placeholder="Age" value="<?php echo $_GET['age'] ?>">
            </div>
            <div>
                <select name="possition" id="possition">
                    <option value="manager">Manager</option>
                    <option value="staffer">Staffer</option>
                </select>
            </div>

            <input type="submit" name="login" value="Add">
        </form>
    </div>


    <script src="./js/edit.js"></script>
</body>

</html>
<?php

// if ($_SERVER['REQUEST_METHOD'] == "POST") {
//     if (!empty($_POST["firstName"]) && !empty($_POST["lastName"]) && !empty($_POST['age']) && !empty($_POST['possition'])) {
//         $id = $_GET['id'];
//         $firstName = $_POST["firstName"];
//         $lastName = $_POST["lastName"];
//         $age = $_POST['age'];
//         $possition = $_POST['possition'];
//         $userID = $_SESSION['user']['id'];
//         updateWorker($id, $firstName, $lastName, $age, $possition);
//         // echo "hi";
//         header("Location: userPage.php");
//         // exit();
//     } else {
//         echo "<h3>Fill Fields</h3>";
//     }
// }

?>