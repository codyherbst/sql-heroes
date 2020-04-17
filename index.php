<!DOCTYPE html>
<html>

<head>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
</head>
<?php $test = 'hello' ?>

<body>
    <div class="text-center">
        <h1>Superhero Facebook<h1>
    </div>
</body>


<?php
$servername = "localhost";
$username = "root";
$password = "root";
$dbname = "sqlheroes";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

$sql = "SELECT id, name, about_me, image_url FROM heroes";
$result = $conn->query($sql);
?>

<div class="row">
    <?php
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $heroPage = "about.php?id=" . $row["id"];
            echo "
        <div class='m-5 col-3'>
            <div class='card' style='width: 18rem;'>
                <img class='card-img-top' style='height: 194px;' src=" . $row["image_url"] . " alt='Card image cap'>
                <div class='card-body'>
                    <h5 class='card-title'>" . $row["name"] . "</h5>
                    <p class='card-text'>" . $row["about_me"] . "</p>
                    <a href=" . $heroPage . " class='btn btn-primary'>Go somewhere</a>
                </div>
            </div>
        </div>";
        }
    } else {
        echo "0 results";
    }
    ?>
</div>
<?php
//What do I want to do with CRUD?

/*
    --Create--
    --Create a post on superheroes profile

    --Read--
    --Be able to see friends and enemies list

    --Update--
    --

    --Delete--
    --Delete a post on superheroes profile
*/

?>
<div class="row">
    <h3 class="ml-5">Add a new hero you've found!</h3><br>
    <form action="data.php" method="post">
        Name: <input type="text" name="heroName"><br>
        About: <input type="text" name="heroAbout"><br>
        Bio: <input type="text" name="heroBio"><br>
        <input type="submit">
        <input type="hidden" id="method" value="newHero" name="method">
    </form>
</div>

<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>

</html>