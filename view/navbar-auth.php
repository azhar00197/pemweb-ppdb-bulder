<nav class="nav-top">
    <a href="/" class="brand">PPDB <span>Builder</span></a>
    <div class="nav-user" id="nav-trigger">
        <div style="cursor: pointer; font-weight: bold;">
            <?= $_SESSION['auth_name'] ?> <span class="arrow"><i class="bi bi-caret-down-fill"></i></span>
        </div>
        <div class="dialog">
            <a href="logout.php">Logout</a>
        </div>
    </div>
    <script>
        document.getElementById("nav-trigger").addEventListener('click', () => {
            document.getElementById('nav-trigger').classList.toggle('active')
        })
    </script>
</nav>