<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<?php
include 'db_function.php';
session_start();
?>

<body>
    <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']) ?>" method="post">
        <div>
            <input type="text" name="userName" id="userName">
            <label for="userName">User Name</label>
        </div>
        <br>
        <div>
            <input type="text" name="password" id="password">
            <label for="password">Password</label>
        </div>
        <br>
        <input type="submit" value="Log In">
    </form>
    <?php
    if ($_SERVER["REQUEST_METHOD"]  = "POST") {
        $userName = $_POST['userName'];
        $password = $_POST['password'];
        if (!empty($userName) && !empty($password)) {
            $user =   findUser($userName, $password);
            if ($user) {
                $_SESSION['user']= $user;
                header("Location: userPage.php");
            } else {
                echo "bye";
            }
        } else {
            echo "Fill in all fields.";
        }
    }
    ?>
</body>

</html>