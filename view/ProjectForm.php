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
    <link rel="stylesheet" href="/styles/project-form.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css">
</head>

<body>
    <?php include __DIR__ . '/navbar.php' ?>
    <main>
        <div class="titlebar">
            <a href="javascript:history.back()" class="back-btn">
                <i class="bi bi-arrow-left-short"></i>
            </a>
            <h2 class="title">BUAT PROJECT</h2>
        </div>
        <form action="store-project.php" method="POST">
            <div class="form-group">
                <label for="project-name">Nama Sekolah</label>
                <input type="text" name="name" id="project-name" placeholder="Contoh: SDN Malang 2" required maxlength="255">
            </div>
            <button type="submit">Buat</button>
        </form>
    </main>
</body>

</html>