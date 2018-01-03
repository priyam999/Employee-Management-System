<?php
include_once "header.php";
if($_SERVER["REQUEST_METHOD"] == "POST")
{
    $address = mysqli_real_escape_string($db,$_POST['address']);
    $email = mysqli_real_escape_string($db,$_POST['email']);
    $mobile = mysqli_real_escape_string($db,$_POST['mobile']);
    $sql = "UPDATE emp SET address = '$address', email = '$email', mobile='$mobile' ";
    $result = mysqli_query($db,$sql);
    $sql = "SELECT * FROM emp WHERE id = '$id'";
    $result = mysqli_query($db,$sql);
    $row = mysqli_fetch_array($result);
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
                    <input type="text" readonly class="form-control-plaintext" id="id" value="<?php echo $row['id']; ?>">
                </div>
            </div>
            <div class="form-group row">
                <label for="name" class="col-sm-2 col-form-label">Name</label>
                <div class="col-sm-10">
                    <input type="text" readonly class="form-control-plaintext" id="name" value="<?php echo $row['name']; ?>">
                </div>
            </div>
            <div class="form-group row">
                <label for="address" class="col-sm-2 col-form-label">Address</label>
                <div class="col-sm-10">
                    <textarea rows="4" cols="52" name="address" class="form-control"><?php echo $row['address'];?></textarea>
                </div>
            </div>
            <div class="form-group row">
                <label for="mobile" class="col-sm-2 col-form-label">Contact</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" name="mobile" placeholder="Contact" value="<?php echo $row['mobile']; ?>">
                </div>
            </div>
            <div class="form-group row">
                <label for="email" class="col-sm-2 col-form-label">Email</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" name="email" placeholder="Email" value="<?php echo $row['email']; ?>">
                </div>
            </div>
            <div class="form-group row">
                <label for="dept" class="col-sm-2 col-form-label">Department</label>
                <div class="col-sm-10">
                    <input type="text" readonly class="form-control-plaintext" id="dept" value="<?php echo $row['dept']; ?>">
                </div>
            </div><div class="form-group row">
                <label for="Project" class="col-sm-2 col-form-label">Project</label>
                <div class="col-sm-10">
                    <input type="text" readonly class="form-control-plaintext" id="Project" value="<?php echo $row['project']; ?>">
                </div>
            </div>
            <div class="form-group row">
                <label for="posting" class="col-sm-2 col-form-label">Posting</label>
                <div class="col-sm-10">
                    <input type="text" readonly class="form-control-plaintext" id="posting" value="<?php echo $row['posting']; ?>">
                </div>
            </div>
            <div class="form-group row">
                <label for="posting" class="col-sm-2 col-form-label">Manager</label>
                <div class="col-sm-10">
                    <input type="text" readonly class="form-control-plaintext" id="posting" value="<?php echo $row['manager']; ?>">
                </div>
            </div>
            <div class="form-group row">
                <label for="posting" class="col-sm-2 col-form-label">Salary</label>
                <div class="col-sm-10">
                    <input type="text" readonly class="form-control-plaintext" id="posting" value="<?php echo $row['salary']; ?>">
                </div>
            </div>
            <button class="btn btn-lg btn-primary btn-block" type="submit" value="Submit">Update</button>
        </form>
        <?php
        include_once "footer.php"
        ?>

</body>

</html>