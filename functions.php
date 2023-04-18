<?php


require_once 'db_connection.php';

function get_all_data()
{
  global $conn;
  if ($result = $conn->query("SELECT * FROM movies")) {
    // echo "Returned rows are: " . $result -> num_rows;
    // Free result set
  }
  while ($row = mysqli_fetch_assoc($result)) {
    ?>
    <div class="col-6 text-center      ">
      <div class="card border-primary">
        <div class="card-body">
          <h4 class="card-title">Title and date:
            <?php echo ($row["title"]) ?>
          </h4>
          <p class="card-text">Genres:
            <?php echo str_replace('|', ', ', $row["genres"]) ?>
          </p>
          <a name="" id="" class="btn btn-primary" href="update_movie.php?id=<?php echo ($row["movieId"]) ?>"
            role="button">Update</a>
          <a name="" id="" class="btn btn-primary" href="tags.php?id=<?php echo ($row["movieId"]) ?>" role="button">Tags</a>
          <a name="" id="" class="btn btn-primary" href="ratings.php?id=<?php echo ($row["movieId"]) ?>"
            role="button">Ratings</a>
          <a name="" id="" class="btn btn-danger" href="delete_movie.php?id=<?php echo ($row["movieId"]) ?>"
            role="button">Delete</a>

        </div>
      </div>
    </div>
    <?php
  }
}

function insert_user()
{
  global $conn;

  $id = $conn->query("SELECT MAX(userId)+1 AS next_id FROM unique_users");
  $rowData = mysqli_fetch_array($id);
  $next_id = $rowData['next_id'];

  if (
    $conn->query("INSERT INTO unique_users(userId)
    VALUES ('$next_id')") === TRUE
  ) {
    echo "New record created successfully";
  } else {
    echo "cos sie zjebalo";
  }
}
function get_all_data_tags($movieId)
{
  global $conn;
  if ($result = $conn->query("SELECT * FROM tags WHERE movieId = $movieId")) {
    // echo "Returned rows are: " . $result -> num_rows;
    // Free result set
  }
  while ($row = mysqli_fetch_assoc($result)) {
    ?>

    <div class="col-4      ">
      <div class="card border-primary">
        <div class="card-body">
          <h4 class="card-title">user ID:
            <?php echo ($row["userId"]) ?>
          </h4>
          <p class="card-text">Tag:
            <?php echo ($row["tag"]) ?>
          </p>
          <p class="card-text">Timestamp:
            <?php echo ($row["timestamp"]) ?>
          </p>
          <a name="" id="" class="btn btn-danger"
            href="delete_tag.php?id=<?php echo ($row["movieId"]) ?>&user=<?php echo ($row["userId"]) ?>&tag=<?php echo ($row["tag"]) ?>"
            role="button">Delete</a>

        </div>
      </div>
    </div>
    <?php
  }
}

function get_all_data_ratings($movieId)
{
  global $conn;
  if ($result = $conn->query("SELECT * FROM ratings WHERE movieId = $movieId")) {
    // echo "Returned rows are: " . $result -> num_rows;
    // Free result set
  }
  while ($row = mysqli_fetch_assoc($result)) {
    ?>

    <div class="col-3      ">
      <div class="card border-primary">
        <div class="card-body">
          <h4 class="card-title">user ID:
            <?php echo ($row["userId"]) ?>
          </h4>
          <p class="card-text">Rating:
            <?php echo ($row["rating"]) ?>
          </p>
          <p class="card-text">Timestamp:
            <?php echo ($row["timestamp"]) ?>
          </p>

        </div>
      </div>
    </div>
    <?php
  }
}

function delete_movie($id)
{
  global $conn;
  if (mysqli_query($conn, "DELETE FROM movies WHERE movieId='$id'")) {
    mysqli_query($conn, "DELETE FROM ratings WHERE movieId='$id'");
    mysqli_query($conn, "DELETE FROM tags WHERE movieId='$id'");
    mysqli_query($conn, "DELETE FROM links WHERE movieId='$id'");
    echo "Movie deleted";
  } else {
    echo "Movie not deleted";
  }
}


function delete_tag($user_id, $movie_id, $tag)
{
  global $conn;
  if (mysqli_query($conn, "DELETE FROM tags WHERE movieId='$movie_id' and userId = '$user_id' and tag = '$tag'")) {
    echo "Tag deleted";
  } else {
    echo "Tag not deleted";
  }
}

// function delete_rating($user_id, $movie_id, $rating)
// {
//   global $conn;
//   echo "User ID: $user_id, Movie ID: $movie_id, Rating: $rating";
//   if (mysqli_query($conn, "DELETE FROM ratings WHERE movieId='$movie_id' and userId = '$user_id' and rating = '$rating'")) {
//     echo "rating deleted";
//   } else {
//     echo "rating not deleted";
//   }
// }

// function delete_rating($user_id, $movie_id, $rating)
// {
//   global $conn;
//   $stmt = $conn->prepare("DELETE FROM ratings WHERE movieId=? AND userId=? AND rating=?");
//   $stmt->bind_param("iii", $movie_id, $user_id, $rating);
//   if ($stmt->execute()) {
//     echo "Tag deleted";
//   } else {
//     echo "Tag not deleted";
//   }
//   $stmt->close();
// }



function insert_movie($title, $genres)
{
  global $conn;

  // $id = mysqli_query($conn, "SELECT MAX(movieId)+1 FROM movies");
  $id = $conn->query("SELECT MAX(movieId)+1 FROM movies");
  $rowData = mysqli_fetch_array($id);
  if (mysqli_query($conn, "INSERT INTO movies (movieId, title, genres) VALUES ('$rowData', '$title', '$genres') ") == TRUE) {
    echo "New record created successfully";
  } else {
    echo "record not created";
  }

}

function get_all_data_tagnames()
{
  global $conn;
  if ($result = $conn->query("SELECT * FROM unique_tags ORDER BY tag")) {
    // echo "Returned rows are: " . $result -> num_rows;
    // Free result set
  }
  while ($row = mysqli_fetch_assoc($result)) {
    ?>

    <div class="col-4 text-center      ">
      <div class="card border-primary">
        <div class="card-body">
          <h4 class="card-title">Tag:
            <?php echo ($row["tag"]) ?>
          </h4>

        </div>
      </div>
    </div>
    <?php
  }
}

function insert_tag($name)
{
  global $conn;

  if (
    $conn->query("INSERT INTO unique_tags(tag)
  VALUES ('$name')") === TRUE
  ) {
    echo "New record created successfully";
  } else {
    // echo "Error: " . $sql . "<br>" . $conn->error;
    echo "cos sie zjebalo";
  }
}
function update_movie($title, $genres, $id)
{
  global $conn;
  if ($conn->query("UPDATE movies SET title='$title', genres='$genres' WHERE movieId='$id'") === TRUE) {
    echo "Record updated successfully";
  } else {
    echo "cos sie zjebalo";

  }
}

function add_tag($name, $id, $userId)
{
  global $conn;

  if (
    $conn->query("INSERT INTO tags(userId, movieId, tag, timestamp)
  VALUES ('$userId', '$id', '$name', '1445714991')") === TRUE
  ) {
    echo "New record created successfully";
  } else {
    // echo "Error: " . $sql . "<br>" . $conn->error;
    echo "cos sie zjebalo";
  }
}

function add_rating($value, $id, $userId)
{
  global $conn;

  if (
    $conn->query("INSERT INTO ratings(userId, movieId, rating, timestamp)
  VALUES ('$userId', '$id', '$value', '1445714991')") === TRUE
  ) {
    echo "New record created successfully";
  } else {
    // echo "Error: " . $sql . "<br>" . $conn->error;
    echo "cos sie zjebalo";
  }
}
?>