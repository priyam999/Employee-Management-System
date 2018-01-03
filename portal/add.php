<?php
include_once "header.php";
if($row['isHR'] != 1)
{
    ?>
    <script>
        alert("Not Authorized");
        </script>
<?php
    header("Location: index.php");
}

$sql2 = "SELECT MAX(id) FROM emp";
$resultTemp = mysqli_query($db,$sql2);
$newRow = mysqli_fetch_array($resultTemp);
$maxID = $newRow['MAX(id)'];
$maxID = $maxID + 1;
if($_SERVER["REQUEST_METHOD"] == "POST")
{
    $address = mysqli_real_escape_string($db,$_POST['address']);
    $email = mysqli_real_escape_string($db,$_POST['email']);
    $mobile = mysqli_real_escape_string($db,$_POST['mobile']);
    $name = mysqli_real_escape_string($db,$_POST['name']);
    $dept = mysqli_real_escape_string($db,$_POST['dept']);
    $project = mysqli_real_escape_string($db,$_POST['project']);
    $posting = mysqli_real_escape_string($db,$_POST['posting']);
    $manager = mysqli_real_escape_string($db,$_POST['manager']);
    $salary = mysqli_real_escape_string($db,$_POST['salary']);
    $bgroup = mysqli_real_escape_string($db,$_POST['bgroup']);
    $pass = mysqli_real_escape_string($db,$_POST['password']);
    unset($_POST);
    $_POST = array();
    $sqlAdd = "INSERT INTO emp (id, pass, isHR, isPM, name, address, bgroup, mobile, email, dept, posting, project, manager, salary) VALUES ('$maxID', '$pass', '0', '0', '$name', '$address', '$bgroup', '$mobile', '$email', '$dept', '$posting', '$project', $manager, $manager);";
    if (!mysqli_query($db, $sqlAdd))
    {
        die("Database Error!");
    }
    header("Location: add.php");

}


?>
<body class="fixed-nav sticky-footer bg-dark" id="page-top">
<?php
include_once "body.php"
?>
<div class="content-wrapper">
    <div style="padding-right: 20%; padding-left: 25%; padding-bottom: 5%;">
        <form method="POST" action="">
            <div class="form-group row">
                <label for="id" class="col-sm-2 col-form-label">ID</label>
                <div class="col-sm-10">
                    <input type="text" readonly class="form-control-plaintext" value="<?php echo $maxID; ?>">
                </div>
            </div>
            <div class="form-group row">
                <label for="name" class="col-sm-2 col-form-label">Name</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" name="name" placeholder="Name" value="">
                </div>
            </div>
            <div class="form-group row">
                <label for="name" class="col-sm-2 col-form-label">Password</label>
                <div class="col-sm-10">
                    <input type="password" class="form-control" name="password" placeholder="Password" value="">
                </div>
            </div>
            <div class="form-group row">
                <label for="address" class="col-sm-2 col-form-label">Address</label>
                <div class="col-sm-10">
                    <textarea rows="4" cols="52" name="address" placeholder="Address" class="form-control"></textarea>
                </div>
            </div>
            <div class="form-group row">
                <label for="bgroup" class="col-sm-2 col-form-label">Blood Group</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" name="bgroup" placeholder="Blood Group">
                </div>
            </div>
            <div class="form-group row">
                <label for="mobile" class="col-sm-2 col-form-label">Contact</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" name="mobile" placeholder="Contact">
                </div>
            </div>
            <div class="form-group row">
                <label for="email" class="col-sm-2 col-form-label">Email</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" name="email" placeholder="Email" >
                </div>
            </div>
            <div class="form-group row">
                <label for="name" class="col-sm-2 col-form-label">Department</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" name="dept" placeholder="Department">
                </div>
            </div>
            <div class="form-group row">
                <label for="name" class="col-sm-2 col-form-label">Project</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" name="project" placeholder="Project">
                </div>
            </div>
            <div class="form-group row">
                <label for="name" class="col-sm-2 col-form-label">Posting</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" name="posting" placeholder="Posting">
                </div>
            </div>
            <div class="form-group row">
                <label for="name" class="col-sm-2 col-form-label">Manager</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" name="manager" placeholder="Manager's Employee ID">
                </div>
            </div>
            <div class="form-group row">
                <label for="name" class="col-sm-2 col-form-label">Project</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" name="project" placeholder="Project">
                </div>
            </div>
            <div class="form-group row">
                <label for="posting" class="col-sm-2 col-form-label">Salary</label>
                <div class="input-group col-sm-10">
                    <span class="input-group-addon" id="sizing-addon2">₹</span>
                    <input type="text" class="form-control" placeholder="Salary" aria-describedby="sizing-addon2" name="salary">
                </div>
            </div>
            <button class="btn btn-lg btn-primary btn-block" type="submit" value="Submit">Add New Employee</button>
        </form>
        <?php
        include_once "footer.php"
        ?>
</body>

</html>
