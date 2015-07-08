<aside>
    <div id="sidebar"  class="nav-collapse ">
        <!-- sidebar menu start-->
        <ul class="sidebar-menu">
            <li <?php if($pageVar == "ad_in"){echo "class='active'";} ?> >
                <a href="admin_index.php">
                    <i class="icon-dashboard"></i>
                    <span>Dashboard</span>
                </a>
            </li>
            <li class="sub-menu <?php if($pageVar == "ad_dept"){echo "active";} ?>">
                <a href="javascript:;" class="">
                    <i class="icon-sitemap"></i>
                    <span>Jabatan</span>
                    <span class="arrow"></span>
                </a>
                <ul class="sub">
                    <li class="active"><a class="" href="admin_department.php">Senarai Jabatan</a></li>
                </ul>
            </li>
            <li class="sub-menu <?php if($pageVar == "ad_deptLdr"){echo "active";} ?>">
                <a href="javascript:;" class="">
                    <i class="icon-male"></i>
                    <span>Ketua Jabatan</span>
                    <span class="arrow"></span>
                </a>
                <ul class="sub">
                    <li><a class="" href="admin_deptLdr.php">Senarai</a></li>
                </ul>
            </li>
            <li class="sub-menu <?php if($pageVar == "ad_pos"){echo "active";} ?>">
                <a href="javascript:;" class="">
                    <i class="icon-star-empty"></i>
                    <span>Jawatan</span>
                    <span class="arrow"></span>
                </a>
                <ul class="sub">
                    <li><a class="" href="admin_pos.php">Senarai</a></li>
                </ul>
            </li>
            <li class="sub-menu <?php if($pageVar == "ad_app"){echo "active";} ?>">
                <a href="javascript:;" class="">
                    <i class="icon-th"></i>
                    <span>Permohonan</span>
                    <span class="arrow"></span>
                </a>
                <ul class="sub">
                    <li><a class="" href="admin_application.php">Senarai Permohonan</a></li>
                    <li><a class="" href="admin_task_list.php">Senarai Kerja</a></li>
                </ul>
            </li>
            <li class="sub-menu <?php if($pageVar == "ad_ad"){echo "active";} ?>">
                <a href="javascript:;" class="">
                    <i class="icon-user"></i>
                    <span>Admin</span>
                    <span class="arrow"></span>
                </a>
                <ul class="sub">
                    <li><a class="" href="admin_view_AD.php">Senarai</a></li>
                </ul>
            </li>
            <li <?php if($pageVar == "ad_pan"){echo "class='active'";} ?>>
                <a class="" href="admin_panduan.php">
                    <i class="icon-book"></i>
                    <span>Panduan</span>
                </a>
            </li>
        </ul>
        <!-- sidebar menu end-->
    </div>
</aside>