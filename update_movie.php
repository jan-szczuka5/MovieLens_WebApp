<?php
require_once 'functions.php';
require_once 'db_connection.php';
?>
<!doctype html>
<html lang="en">

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
        <?php
        global $conn;
        $id = mysqli_real_escape_string($conn, $_GET['id']);
        $sql = mysqli_query($conn, "SELECT * FROM movies WHERE movieId =  $id");

        $movie = mysqli_fetch_array($sql);

        ?>
        <!-- Tab panes -->
        <div class="tab-pane" id="add" role="tabpanel" aria-labelledby="add-tab">
            <div class="container">
                <div class="row justify-content-center align-items-center g-2">
                    <div class="col-8">
                        <form action="update_movie_final.php" method="post">
                            <div class="mb-3">
                                <label class="form-label">Title</label>
                                <input type="text" class="form-control" name="Title" id="input1"
                                    value="<?php echo $movie['title']; ?>">
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Genres</label>
                                <input type="text" class="form-control" name="Genres" id="input2"
                                    value="<?php echo $movie['genres']; ?>">
                            </div>
                            <input type="hidden" name="id" value="<?php echo $movie['movieId']; ?>">
                            <button type="submit" class="btn btn-primary">Update</button>
                        </form>

                    </div>
                </div>
            </div>
        </div>
        </div>
    </main>
    <?php include 'footer.php' ?>;