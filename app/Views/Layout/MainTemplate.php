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

    <style>
        .size-small {
            width: 20px;
            height: 20px;
        }
    </style>
</head>

<body>
    <!-- Main -->
    <?= $this->include('Layout/MainHeader') ?>

    <!-- Modal -->
    <div class="modal fade" id="modal_message" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modal_message_title">Modal title</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body" id="modal_message_body">
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <form action="" method="post" id="modal_message_form">
                        <button type="submit" class="btn btn-primary">Save changes</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Main -->
    <div class="container-lg mt-4">
        <?= $this->renderSection('content') ?>
    </div>

    <!-- Footer -->
    <!-- <footer class="bg-light text-center text-lg-start mt-5">
        <div class="text-center p-3" style="background-color: rgba(0, 0, 0, 0.01);">
            © 2022 Copyright:
            <a class="text-dark" href="https://sman1-bna.sch.id/">SMAN 1 BANJARNEGARA</a>
        </div>
    </footer> -->

    <?php
    if (isProduction()) {
    ?>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
        <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.12.0/dist/cdn.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/4.3.0/chart.min.js" integrity="sha512-mlz/Fs1VtBou2TrUkGzX4VoGvybkD9nkeXWJm3rle0DPHssYYx4j+8kIS15T78ttGfmOjH0lLaBXGcShaVkdkg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
        <script src="https://unpkg.com/feather-icons"></script>
    <?php
    } else {
    ?>
        <script src="/assets/js/bootstrap.bundle.min.js"></script>
        <script src="/assets/js/alpine.min.js"></script>
        <script src="/assets/js/feather-icons.js"></script>
        <script src="/assets/js/chart.js"></script>
    <?php
    }
    ?>

    <?= $this->renderSection('script') ?>

    <script>
        var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'));
        var tooltipList = tooltipTriggerList.map(function(tooltipTriggerEl) {
            return new bootstrap.Tooltip(tooltipTriggerEl);
        });

        feather.replace();

        function showMessage(message, action) {
            document.getElementById('modal_message_title').innerHTML = message.title;
            document.getElementById('modal_message_body').innerHTML = message.body;
            document.getElementById('modal_message_form').action = action;
        }
    </script>
</body>

</html>