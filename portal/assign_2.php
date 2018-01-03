<?php
include_once "header.php";
if($row['isPM'] != 1)
{
    header("Location: index.php");
}

$asID = $_SESSION['asID'];

if($_SERVER["REQUEST_METHOD"] == "POST")
{
    $assignProject = mysqli_real_escape_string($db,$_POST['project']);
    $assignSQL = "
    UPDATE emp
    SET project='$assignProject'
    WHERE id ='$asID';
    ";
    if (!mysqli_query($db, $assignSQL))
    {
        die("Error: " . $sqlAdd . "<br>" . mysqli_error($db));
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
                <label for="posting" class="col-sm-12 col-form-label">Assign New Project for Employee for <?php echo $asID;?></label>
                <div class="col-sm-12">
                    <input type="text" class="form-control" name=project placeholder="New Project" value="<?php echo $assignProject;?>">
                </div>
            </div>
            <button class="btn btn-lg btn-primary btn-block" type="submit" value="Submit">Next</button>
        </form>
        <?php
        include_once "footer.php"
        ?>
</body>

</html>