<style type="text/css">
    .topbar {
        left: 180px;
    }

    .navbar-custom {
        background-color: #2C2F33;
    }

    .form-control {
        background-color: #f5f5f5;
    }

    .btn {
        color: #707070;
        font-size: 1.5rem;
        padding: 0;
        line-height: 0;

    }

    .notification-list .noti-icon-badge {
        display: inline-block;
        position: absolute;
        top: 15px;
        right: 8px;
        border: 1px;
        border-radius: 50%;
        width: 8px;
        height: 11px;
    }

    .button-menu-mobile {
        background-color: #f5f5f5;
        font-size: 20px;
        width: 32px;
        border-radius: 1px;
        line-height: 30px;
    }

    .navbar-custom .dropdown.show .nav-link {
        background-color: #2C2F33;
    }

    .notification-list .nav-link {
        line-height: 20px;
    }

    dl,
    ol,
    ul {
        margin-bottom: 0;
    }


    .form-control {
        height: calc(1em + .9rem + 2px);
        padding: .375rem .75rem;
        font-size: 1rem;
        font-weight: 100;
        line-height: 1.5;
        color: #707070;
        background-color: #2C2F33;
        border: 0.5px solid #707070;
    }

    .ml-5 {
        margin-left: 1rem !important;
    }
</style>




<!-- Top Bar Start -->
<div class="topbar">


    <nav class="navbar-custom">


        <!-- Page title -->
        <ul class="list-inline menu-left mb-0">
            <li class="list-inline-item">
                <button type="button" class="button-menu-mobile open-left">
                    <i class="ion-navicon"></i>
                </button>
            </li>

        </ul>




        <!-- Search -->


        <ul class="list-inline float-left ml-5">
            <li class="list-inline-item">
                <input type="text" class="form-control  float-left" placeholder="Search...">
            </li>
            <li class="list-inline-item">
                <button class="input-group-btn btn btn-default mb-4" type="button" aria-label="Search">
                    <i class="mdi mdi-magnify" aria-hidden="true"></i>
                </button>
            </li>
            <li class="hide-phone list-inline-item app-search">

        </ul>





        <ul class="list-inline float-right mb-0">

            <!-- notification-->
            <li class="list-inline-item dropdown notification-list">
                <a class="nav-link dropdown-toggle arrow-none" data-toggle="dropdown" href="#" role="button" aria-haspopup="false" aria-expanded="false">
                    <i class="ion-ios7-bell noti-icon"></i>
                    <span class="badge badge-warning noti-icon-badge"></span>
                </a>

                <div class="dropdown-menu dropdown-menu-right dropdown-arrow dropdown-menu-lg">

                    <!-- item-->
                    <div class="dropdown-item noti-title">
                        <h5>Notification (3)</h5>
                    </div>

                    <!-- item-->
                    <a href="javascript:void(0);" class="dropdown-item notify-item active">
                        <div class="notify-icon bg-success"><i class="mdi mdi-"></i></div>
                        <p class="notify-details"><b>xxx</b><small class="text-muted">xxxxxxxxxx</small></p>
                    </a>

                    <!-- item-->
                    <a href="javascript:void(0);" class="dropdown-item notify-item">
                        <div class="notify-icon bg-warning"><i class="mdi mdi-"></i></div>
                        <p class="notify-details"><b>yyy</b><small class="text-muted">yyyyyyyyyyyy</small></p>
                    </a>

                    <!-- item-->
                    <a href="javascript:void(0);" class="dropdown-item notify-item">
                        <div class="notify-icon bg-info"><i class="mdi mdi-"></i></div>
                        <p class="notify-details"><b>zzz</b><small class="text-muted">zzzzzzzzzzzz</small></p>
                    </a>

                    <div class="dropdown-divider"></div>

                    <a href="javascript:void(0);" class="dropdown-item float-left"> Delete </a>
                    <a href="javascript:void(0);" class="dropdown-item float-right"> Select All </a>

                </div>
            </li>


            <!-- Profile-->
            <li class="list-inline-item">
                <a class="nav-link dropdown-toggle arrow-none nav-user" href="profile.php"><img src="public/assets/images/users/avatar-1.jpg" alt="user" class="rounded-circle">
                    <span class="text-muted"><?php echo htmlspecialchars($_SESSION["username"]); ?> </span></a>
            </li>



            <!-- End dropdown-->
            <li class="list-inline-item dropdown ">
                <a class="nav-link dropdown-toggle arrow-none nav-user" data-toggle="dropdown" href="#" role="button" aria-haspopup="false" aria-expanded="false">
                    <i class="ion-chevron-down text-muted"></i>
                </a>
                <div class="dropdown-menu profile-dropdown ">
                    <a href="reset-password.php" class="dropdown-item"><i class="dripicons-lock text-muted"></i> Password Reset</a>
                    <div class="dropdown-divider"></div>
                    <a href="logout.php" class="dropdown-item"><i class="dripicons-exit text-muted"></i> Logout</a>
                </div>
            </li>
        </ul>



        <div class="clearfix"></div>
    </nav>




</div>
<!-- Top Bar End -->