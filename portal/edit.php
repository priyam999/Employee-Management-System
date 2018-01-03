<?php
include_once "header.php";
if($row['isHR'] != 1)
{
    header("Location: index.php");
}
if($_SERVER["REQUEST_METHOD"] == "POST")
{
    $changeID = mysqli_real_escape_string($db,$_POST['id']);
    $_SESSION['chID'] = $changeID;
    header("Location: edit_2.php");

}
?>
<body class="fixed-nav bg-dark" id="page-top">
<?php
include_once "body.php"
?>
<div class="content-wrapper" style="min-height: calc(107.7vh - 56px - 56px);">
    <div style="padding-right: 20%; padding-left: 25%; padding-bottom: 5%;">
        <form method="POST" action="">
            <div class="form-group row">
                <div class="col-sm-12">
                    <input type="text" class="form-control" name=id placeholder="Employee ID">
                </div>
            </div>
            <button class="btn btn-lg btn-primary btn-block" type="submit" value="Submit">Next</button>
        </form>
        <?php
        include_once "footer.php"
        ?>
</body>
</html>