<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Violations Dashboard</title>

    <?php
    if (isProduction()) {
    ?>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <?php
    } else {
    ?>
        <link rel="stylesheet" href="/assets/css/bootstrap.min.css">
    <?php
    }
    ?>

</head>

<body>
    <!-- Main -->
    <div class="container-lg mt-4">
        <?= $this->renderSection('content') ?>
    </div>
    <footer class="bg-light text-center text-lg-start mt-5">
        <!-- Copyright -->
        <div class="text-center p-3" style="background-color: rgba(0, 0, 0, 0.01);">
            © 2022 Copyright:
            <a class="text-dark" href="https://sman1-bna.sch.id/">SMAN 1 BANJARNEGARA</a>
        </div>
        <!-- Copyright -->
    </footer>

    <?php
    if (isProduction()) {
    ?>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.min.js" integrity="sha384-Y4oOpwW3duJdCWv5ly8SCFYWqFDsfob/3GkgExXKV4idmbt98QcxXYs9UoXAB7BZ" crossorigin="anonymous"></script>
    <?php
    } else {
    ?>
        <script src="/assets/js/bootstrap.min.js"></script>
    <?php
    }
    ?>

</body>

</html>