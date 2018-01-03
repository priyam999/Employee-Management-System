<?php
include_once "header.php";
if($row['isPM'] != 1)
{
    header("Location: index.php");
}
$error = "";

if($_SERVER["REQUEST_METHOD"] == "POST")
{
    $assignID = mysqli_real_escape_string($db,$_POST['id']);
    $assignSQL = "SELECT manager from emp WHERE id=$assignID";
    if (!mysqli_query($db, $assignSQL))
    {
        die("Error: " . $sqlAdd . "<br>" . mysqli_error($db));
    }
    $assignResult = mysqli_query($db, $assignSQL);
    $assignMan = mysqli_fetch_array($assignResult);
    if($assignMan['manager'] == $_SESSION['id'])
    {
        $_SESSION['asID'] = $assignID;
        header("Location: assign_2.php");
    }
    else
    {
        $error = "Error! Employee not Assigned to User or Employee ID Invalid";
    }

}

?>
<body class="fixed-nav bg-dark" id="page-top">
<?php
include_once "body.php";
?>
<div class="content-wrapper" style="min-height: calc(107.7vh - 56px - 56px);">
    <div style="padding-right: 20%; padding-left: 25%; padding-bottom: 5%;">
        <form method="POST" action="">
            <div class="form-group row">
                <div class="col-sm-12">
                    <input type="text" class="form-control" name=id placeholder="Employee ID" value="<?php echo $assignID;?>">
                </div>
            </div>
            <?php
                echo $error;
            ?>
            <button class="btn btn-lg btn-primary btn-block" type="submit" value="Submit">Next</button>
        </form>
        <?php
        include_once "footer.php"
        ?>
</body>

</html>