<nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top" id="mainNav">
    <a class="navbar-brand" href="index.html">Employee Management System | Portal</a>
    <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarResponsive">
        <ul class="navbar-nav navbar-sidenav" id="exampleAccordion">

            <!-- Employee Profile -->
            <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Dashboard">
                <a class="nav-link" href="index.php">
                    <i class="fa fa-fw fa-id-badge "></i>
                    <span class="nav-link-text">Profile</span>
                </a>
            </li>

            <?php
            include_once("manager.php");
            ?>

            <?php
            include_once("hr.php");
            ?>
            <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Link">
                <a class="nav-link" href="logout.php">
                    <i class="fa fa-fw fa-sign-out"></i>
                    <span class="nav-link-text">Logout</span>
                </a>
            </li>
        </ul>
        <ul class="navbar-nav ml-auto">
            <li class="nav-item">
                <a class="nav-link" data-toggle="modal" data-target="#about">
                    <i class="fa fa-file" aria-hidden="true"></i> About</a>
            </li>
            <!--<li class="nav-item">
                <a class="nav-link" data-toggle="modal" data-target="#password">
                    <i class="fa fa-key" aria-hidden="true"></i>Change Password</a>
            </li>-->
        </ul>
    </div>
</nav>