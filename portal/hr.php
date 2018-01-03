<?php
if($row['isHR'] == 1)
{
    ?>
    <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Dashboard">
        <a class="nav-link" href="add.php">
            <i class="fa fa-plus" aria-hidden="true"></i>
            <span class="nav-link-text">Add New Employee</span>
        </a>
    </li>
    <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Edit">
        <a class="nav-link" href="edit.php">
            <i class="fa fa-pencil" aria-hidden="true"></i>
            <span class="nav-link-text">Edit</span>
        </a>
    </li>
    <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Dashboard">
        <a class="nav-link" href="query.php">
            <i class="fa fa-location-arrow" aria-hidden="true"></i>
            <span class="nav-link-text">Run Query</span>
        </a>
    </li>
    <?php
}

?>