<!doctype html>
<html lang="en">
<?php
require_once 'functions.php';
?>

<head>
    <title>movie-lens</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="robots" content="noindex">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Bootstrap CSS v5.2.1 -->
    <!-- Nav tabs -->


    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">

</head>

<body>
    <header>
        <!-- place navbar here -->
    </header>

    <main>

        <!-- Tab panes -->

        <div class="tab-pane" id="add" role="tabpanel" aria-labelledby="add-tab">
            <div class="container">
                <div class="row justify-content-center align-items-center g-2">
                    <div class="col-8">
                        <form action="insert_tag.php" method="post">
                            <div class="mb-3">
                                <label class="form-label">Name</label>
                                <input type="text" class="form-control" name="Name" id="input1">
                            </div>
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </main>
    <?php include 'footer.php'; ?>