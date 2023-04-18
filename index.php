<?php include 'header.php';
require_once 'functions.php';
?>

<main>

    <!-- Tab panes -->
    <div class="tab-content">
        <div class="tab-pane active" id="display" role="tabpanel" aria-labelledby="display-tab">
            <div class="container">
                <div class="row justify-content-center align-items-center g-2">
                    <?php get_all_data() ?>
                </div>
            </div>
        </div>
        <div class="tab-pane" id="add_movie" role="tabpanel" aria-labelledby="add_movie-tab">
            <div class="container">
                <div class="row justify-content-center align-items-center g-2">
                    <div class="col-8">
                        <form action="insert_movie.php" method="post">
                            <div class="mb-3">
                                <label class="form-label">Title</label>
                                <input type="text" class="form-control" name="Title" id="input1">
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Genres</label>
                                <input type="text" class="form-control" name="Genres" id="input2">
                            </div>
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </form>

                    </div>
                </div>
            </div>
        </div>
        <div class="tab-pane" id="add" role="tabpanel" aria-labelledby="add-tab">
            <div class="container">
                <div class="row justify-content-center align-items-center g-2">
                    <div class="col-2">
                        <a name="" id="" class="btn btn-primary" href="insert_user.php" role="button">Add user</a>
                        <!-- <form action="insert_user.php" method="post">
                            <button type="submit" class="btn btn-primary">Add User</button>
                        </form> -->


                    </div>
                </div>
            </div>
        </div>
        <div class="tab-pane" id="display_tag" role="tabpanel" aria-labelledby="display_tag-tab">
            <div class="container">
                <div class="row justify-content-center align-items-center g-2">
                    <!-- <button type="button" class="btn btn-primary">Add tag</button> -->
                    <a name="" id="" class="btn btn-primary" href="insert_tag_form.php" role="button">Add tag</a>
                    <?php get_all_data_tagnames() ?>
                </div>
            </div>
        </div>
    </div>
</main>
<?php include 'footer.php'; ?>