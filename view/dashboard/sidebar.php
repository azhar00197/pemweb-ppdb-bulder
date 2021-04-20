<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4" style="margin-top: 70px; position: fixed;">

    <!-- Sidebar -->
    <div class="sidebar">

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <li class="nav-item">
                    <a href="informasi.php?project=<?= $_GET['project'] ?>" class="nav-link" id="link-build">
                        <i class="nav-icon bi bi-info-circle-fill"></i>
                        <p>Data Informasi</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="build.php?project=<?= $_GET['project'] ?>" class="nav-link" id="link-build">
                        <i class="nav-icon bi bi-life-preserver"></i>
                        <p>Build</p>
                    </a>
                </li>
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>