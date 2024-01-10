<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./styles/signIn/signIn.style.css">
    <title>Document</title>
</head>
<?php
include 'db_function.php';
session_start();
$errorMessage = ""
?>
<?php
if ($_SERVER["REQUEST_METHOD"]  == "POST") {
    if (!empty($_POST['userName']) && !empty($_POST['password'])) {
        $userName = $_POST['userName'];
        $password = $_POST['password'];
        $user =  findUser($userName, $password);
        if ($user) {
            $_SESSION['user'] = $user;
            header("Location: userPage.php");
        } else {
            $errorMessage  = "Wrong Data";
        }
    } else {
        $errorMessage =  "Fill in all fields.";
    }
}
?>

<body>
    <div class="container">
        <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']) ?>" method="post">
            <fieldset>
                <legend>Sign In</legend>
                <div>
                    <input type="text" name="userName" id="userName" placeholder="User Name">
                </div>
                <div>
                    <input type="text" name="password" id="password" placeholder="Password">
                </div>
                <div>
                    <h2><?php echo $errorMessage ?></h2>
                </div>
                <input type="submit" value="Log In">
            </fieldset>

        </form>
    </div>


</body>

</html>