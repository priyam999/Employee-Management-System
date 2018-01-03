<?php

session_start();
ob_start();
if(!isset($_SESSION['id']))
{
    header("Location: ../index.php");
}

include("../dbconn.php");
$id = $_SESSION['id'];
$sql = "SELECT * FROM emp WHERE id = $id";
$result = mysqli_query($db,$sql);
$row = mysqli_fetch_array($result);

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>EMS Portal</title>
    <link href="../css/bootstrap.min.css" rel="stylesheet">
    <link href="../css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link href="../css/portal.css" rel="stylesheet">
</head>
