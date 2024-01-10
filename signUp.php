<!DOCTYPE html>
<html lang="en">
<?php
include 'db_function.php';
$errorMessage = ""
?>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./styles/signUp/signUp.style.css">
    <title>Document</title>
</head>

<body>
<?php
    if ($_SERVER['REQUEST_METHOD'] == "POST") {
        if (!empty($_POST["firstName"]) && !empty($_POST["lastName"]) && !empty($_POST['userName']) && !empty($_POST['password'])) {
            $userName = $_POST['userName'];
            $firstName = $_POST['firstName'];
            $lastName = $_POST['lastName'];
            $password = $_POST['password'];
            $hashed_pwd = password_hash($password, PASSWORD_DEFAULT);
            $result =   addUser($firstName, $lastName, $userName, $hashed_pwd);
            if ($result) {
                header('Location: index.php');
            } else {
                $errorMessage = "Wrong Data";
            }
        } else {
            $errorMessage =  "Fill all Field";
        }
    }
    ?>
    <div class="container">
        <form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="post">
            <div>
                <input type="text" name="userName" placeholder="User Name">
            </div>
            <div>
                <input type="text" name="firstName" placeholder="First Name">
            </div>
            <div>
                <input type="text" name="lastName" placeholder="Last Name">
            </div>
            <div>
                <input type="password" name="password" placeholder="Password">
            </div>
            <div>
                <h2><?php echo $errorMessage ?></h2>
            </div>
            <input type="submit" value="Sign Up">
        </form>
    </div>
  
</body>

</html>