<header class="header white-bg">
    <div class="sidebar-toggle-box">
        <div data-original-title="Toggle Navigation" data-placement="right" class="icon-reorder tooltips"></div>
    </div>
    <!--logo start-->
    <a href="dl_index.php" class="logo">Permohonan<span> Emel</span></a>
    <!--logo end-->
    <div class="nav notify-row" id="top_menu">
        <!--  notification start -->

            <!-- settings start -->
            <!-- settings end -->

            <!-- inbox dropdown start-->
            <!-- inbox dropdown end -->

            <!-- notification dropdown start-->
        <!--  notification end -->
    </div>
    <div class="top-nav ">
        <!--search & user info start-->
        <ul class="nav pull-right top-menu">
            <!-- user login dropdown start-->
            <li class="dropdown">
                <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                    <span class="username"><i class="icon-male"></i> <?php echo $global_userName; ?></span>
                    <b class="caret"></b>
                </a>
                <ul class="dropdown-menu extended logout">
                    <div class="log-arrow-up"></div>
                    <li><a href="update_profile.php"><i class="icon-cog"></i> Kemaskini Profil</a></li>
                    <li><a href="logout.php"><i class="icon-key"></i> Log Keluar</a></li>
                </ul>
            </li>
            <!-- user login dropdown end -->
        </ul>
        <!--search & user info end-->
    </div>
</header>