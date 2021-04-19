<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Project</title>
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Nunito&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poppins&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="/styles/navbar.css">
    <link rel="stylesheet" href="/styles/project-list-view.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css">
</head>

<body>
    <?php include __DIR__ . '/navbar-auth.php' ?>
    <main>
        <div class="titlebar">
            <h1 class="title">PROJECT</h1>
            <a href="create-project.php" class="btn-add">
                <span>+</span>
                Buat Project
            </a>
        </div>
        <div class="line"></div>

        <?php if (count($projects) < 1) { ?>
            <div class="content-empty">
                BELUM ADA PROJECT
            </div>
        <?php
        } else {
        ?>
            <div class="content">
                <?php
                foreach ($projects as $project) {
                ?>
                    <div class="item">
                        <?= $project->name ?>
                    </div>
                <?php } ?>
            </div>
        <?php } ?>
    </main>
</body>

</html>