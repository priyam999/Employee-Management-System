<?php
include_once "header.php";
$_SESSION['runQ'] = FALSE;
if($row['isHR'] != 1)
{
    ?>
    <script>
        alert("Not Authorized");
    </script>
    <?php
    header("Location: index.php");
}
if($_SERVER["REQUEST_METHOD"] == "POST")
{

    $select = $_POST['select'];
    $columns = explode(",", $select, 17);
    $where = $_POST['where'];
    if($where== "")
    {
        $queryHR = "SELECT $select FROM emp";
    }
    else
    {
        $queryHR = "SELECT $select FROM emp WHERE $where";
    }

    $customResult = mysqli_query($db, $queryHR);
    $count_rows = mysqli_num_rows($customResult);
    $_SESSION['runQ'] = TRUE;

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
                <label for="mobile" class="col-sm-2 col-form-label">Columns</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" name="select" placeholder="Columns" value="<?php echo $select; ?>">
                </div>
            </div>
            <div class="form-group row">
                <label for="mobile" class="col-sm-2 col-form-label">Conditions</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" name="where" placeholder="Search Conditions" value="<?php echo $where; ?>">
                </div>
            </div>
            <a class="nav-link
             help-window" data-toggle="modal" data-target="#help">
                <i class="fa fa-question-circle" aria-hidden="true"></i>
                Examples<br></a>
            <button class="btn btn-lg btn-primary btn-block" type="submit" value="Submit">Run Query</button>
        </form>
        <!-- Table Will be Displayed Below!-->
        <?php
        if($_SESSION['runQ'] != FALSE)
        {
            ?>
            <div class="table-responsive">
                <table class="table">
                    <thead>
                    <tr>
                        <?php for($i = 0 ; $i < count($columns) ; $i++)
                        {?>
                            <th><?php echo trim($columns[$i]);?></th>
                            <?php
                        }?>
                    </tr>
                    </thead>
                    <tbody>
                    <?php for($i = 1 ; $i <= $count_rows ; $i++)
                    {
                        $currentResult = mysqli_fetch_assoc($customResult);
                    ?>
                    <tr>
                        <?php
                        for ($j = 0; $j <= count($currentResult); $j++)
                        {
                        ?>
                            <td>
                            <?php
                                $tr = trim($columns[$j]);
                                echo $currentResult[$tr];
                            ?>
                            </td>
                            <?php
                        }
                    }
                        ?>
                    </tr>
                    </tbody>
                </table>
            </div>
            <?php
        }
        ?>
        <?php
        include_once "footer.php"
        ?>
        <div class="modal fade" id="help" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">SQL Help</h5>
                        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <code style="font-size: 12px;">SELECT id, name, dept FROM Database where posting = 'Mumbai';</code><br>
                        <code style="font-size: 12px;">SELECT id, name, dept FROM Database where posting = 'Mumbai';</code>
                    </div>
                    
                </div>
            </div>
        </div>
</body>
</html>