<?php

session_start();

include("dbconn.php");

$error = "";

if($_SERVER["REQUEST_METHOD"] == "POST")
{
    $empno = mysqli_real_escape_string($db,$_POST['empno']);
    $emppass = mysqli_real_escape_string($db,$_POST['emppass']);
    $sql = "SELECT id, isHR, isPM FROM emp WHERE id = '$empno' and pass = '$emppass'";
    $result = mysqli_query($db,$sql);
    $row = mysqli_fetch_array($result);
    $count = mysqli_num_rows($result);
    if($count == 1)
    {
        $_SESSION['id'] = $empno;
        header("Location: portal/index.php");
    }
    else
    {
        $error = "Invalid Employee ID/Password!";
    }
}
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Employee Management System - Login</title>
        <link rel='stylesheet prefetch' href='http://netdna.bootstrapcdn.com/bootstrap/3.0.2/css/bootstrap.min.css'>
        <link rel="stylesheet" href="css/style.css">
    </head>
    <body>
    <div class="wrapper">
        <form class="form-signin" method="POST" action="">
            <h2 class="form-signin-heading" style="margin-bottom: 15px">EMS Portal Login</h2>
            <?php echo "$error"; ?>
            <input type="text" class="form-control" name="empno" placeholder="Employee ID"/>
            <input type="password" class="form-control" name="emppass" placeholder="Password"/>
            <button class="btn btn-lg btn-primary btn-block" type="submit" value="Submit">Login</button>
        </form>
    </div>
    </body>
</html>