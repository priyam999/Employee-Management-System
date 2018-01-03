<?php
include_once "header.php";
if($row['isHR'] != 1)
{
    header("Location: index.php");
}

$ide2 = $_SESSION['chID'];
$sqle2 = "SELECT * from emp WHERE id='$ide2';";
$resulte2 = mysqli_query($db,$sqle2);
$rowe2 = mysqli_fetch_array($resulte2);

if($_SERVER["REQUEST_METHOD"] == "POST")
{
    $address = mysqli_real_escape_string($db,$_POST['address']);
    $email = mysqli_real_escape_string($db,$_POST['email']);
    $isPM = mysqli_real_escape_string($db,$_POST['isPM']);
    $mobile = mysqli_real_escape_string($db,$_POST['mobile']);
    $name = mysqli_real_escape_string($db,$_POST['name']);
    $dept = mysqli_real_escape_string($db,$_POST['dept']);
    $project = mysqli_real_escape_string($db,$_POST['project']);
    $posting = mysqli_real_escape_string($db,$_POST['posting']);
    $manager = mysqli_real_escape_string($db,$_POST['manager']);
    $salary = mysqli_real_escape_string($db,$_POST['salary']);
    $bgroup = mysqli_real_escape_string($db,$_POST['bgroup']);
    $pass = mysqli_real_escape_string($db,$_POST['password']);
    $sqlAdd = "
    UPDATE emp
    SET name='$name', address='$address', dept='$dept', email='$email', mobile='$mobile', project='$project', posting='$posting', manager=$manager, salary=$salary, bgroup='$bgroup', isPM=$isPM
    Where id='$ide2';
    ";
    if (!mysqli_query($db, $sqlAdd))
    {
        die("Error: " . $sql . "<br>" . mysqli_error($db));
    }
    header("Location: edit_2.php");

}

?>
<body class="fixed-nav sticky-footer bg-dark" id="page-top">
<?php
include_once "body.php"
?>
<div class="content-wrapper">
    <div style="padding-right: 20%; padding-left: 25%; padding-bottom: 5%;">
        <form method="POST" action="edit_2.php">
            <div class="form-group row">
                <label for="id" class="col-sm-2 col-form-label">ID</label>
                <div class="col-sm-10">
                    <input type="text" readonly class="form-control-plaintext" name="id" value="<?php echo $ide2; ?>">
                </div>
            </div>
            <div class="form-group row">
                <label for="name" class="col-sm-2 col-form-label">Name</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" name="name" placeholder="Name" value="<?php echo $rowe2['name']; ?>">
                </div>
            </div>
            <div class="form-group row">
                <label for="name" class="col-sm-2 col-form-label">Password</label>
                <div class="col-sm-10">
                    <input type="password" class="form-control" name="password" placeholder="Password" value="<?php echo $rowe2['pass']; ?>">
                </div>
            </div>
            <div class="form-group row">
                <label for="address" class="col-sm-2 col-form-label">Address</label>
                <div class="col-sm-10">
                    <textarea rows="4" cols="52" name="address" class="form-control" placeholder="Address"><?php echo $rowe2['address']; ?></textarea>
                </div>
            </div>
            <div class="form-group row">
                <label for="bgroup" class="col-sm-2 col-form-label">Blood Group</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" name="bgroup" placeholder="Blood Group" value="<?php echo $rowe2['bgroup']; ?>">
                </div>
            </div>
            <div class="form-group row">
                <label for="mobile" class="col-sm-2 col-form-label">Contact</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" name="mobile" placeholder="Contact" value="<?php echo $rowe2['mobile']; ?>">
                </div>
            </div>
            <div class="form-group row">
                <label for="email" class="col-sm-2 col-form-label">Email</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" name="email" placeholder="Email"  value="<?php echo $rowe2['email']; ?>">
                </div>
            </div>
            <div class="form-group row">
                <label for="name" class="col-sm-2 col-form-label">Department</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" name="dept" placeholder="Department" value="<?php echo $rowe2['dept']; ?>">
                </div>
            </div>
            <div class="form-group row">
                <label for="name" class="col-sm-2 col-form-label">Is Manager? (0/1)</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" name="isPM" placeholder="Is Manager(0/1)" value="<?php echo $rowe2['isPM']; ?>">
                </div>
            </div>
            <div class="form-group row">
                <label for="name" class="col-sm-2 col-form-label">Project</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" name="project" placeholder="Project" value="<?php echo $rowe2['project']; ?>">
                </div>
            </div>
            <div class="form-group row">
                <label for="name" class="col-sm-2 col-form-label">Posting</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" name="posting" placeholder="Posting" value="<?php echo $rowe2['posting']; ?>">
                </div>
            </div>
            <div class="form-group row">
                <label for="name" class="col-sm-2 col-form-label">Manager</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" name="manager" placeholder="Manager's Employee ID" value="<?php echo $rowe2['manager']; ?>">
                </div>
            </div>
            <div class="form-group row">
                <label for="posting" class="col-sm-2 col-form-label">Salary</label>
                <div class="input-group col-sm-10">
                    <span class="input-group-addon" id="sizing-addon2">₹</span>
                    <input type="text" class="form-control" placeholder="Salary" aria-describedby="sizing-addon2" name="salary" value="<?php echo $rowe2['salary']; ?>">
                </div>
            </div>
            <button class="btn btn-lg btn-primary btn-block" type="submit" value="Submit">Confirm Edit</button>
        </form>
        <?php
        include_once "footer.php"
        ?>
</body>