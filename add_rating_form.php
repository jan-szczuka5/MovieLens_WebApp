<!doctype html>
<html lang="en">
<?php
require_once 'functions.php';
require_once 'db_connection.php'
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
    <?php
global $conn;
$id = mysqli_real_escape_string($conn, $_GET['id']);

?>
    <main>

        <!-- Tab panes -->

        <div class="tab-pane" id="add" role="tabpanel" aria-labelledby="add-tab">
            <div class="container">
                <div class="row justify-content-center align-items-center g-2">
                    <div class="col-8">
                        <form action="add_rating.php" method="post">
                        <div class="mb-3">
                                <label class="form-label">Rating</label>
                                <input type="number" step="0.1" class="form-control" name="Rating" id="input1" min="0.5" max="5">
                                <select class="form-select" aria-label="Select User" name='User'>
                                    <option selected>Select User</option>

                                    <!-- <button class="btn btn-secondary dropdown-toggle" type="button"
                                        id="dropdownMenuButton" data-bs-toggle="dropdown" aria-expanded="false">
                                        Select Tag
                                    </button>
                                    <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton"> -->
                                    <?php
                                    global $conn;
                                    $sql = "SELECT userId FROM unique_users";
                                    $result = $conn->query($sql);

                                    // Create dropdown list items with tag values
                                    if ($result->num_rows > 0) {
                                        while ($row = $result->fetch_assoc()) {
                                            echo "<option value='" . $row["userId"] . "'>" . $row["userId"] . "</option>";
                                        }
                                    } else {
                                        echo "0 results";
                                    }

                                    ?>
                                </select>
                                <input type="hidden" name="id" value="<?php echo $id; ?>">
                            </div>
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </main>
    <?php include 'footer.php'; ?>