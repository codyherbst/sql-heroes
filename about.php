<!DOCTYPE html>

<a href="index.php">Back</a>

<br>

<?php
$servername = "localhost";
$username = "root";
$password = "root";
$dbname = "sqlheroes";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

$id = $_GET["id"];

$sql = "SELECT * FROM heroes WHERE id = " . $id;
$result = $conn->query($sql);
$info = $result->fetch_assoc();
$GLOBALS["bio"] = $info["biography"];

$sql = "SELECT heroes.id, heroes.name, abilities.ability FROM abilities JOIN ability_hero ON abilities.id=ability_hero.ability_id JOIN heroes ON heroes.id=ability_hero.hero_id WHERE heroes.id = " . $id;
$result = $conn->query($sql);
$ability = $result->fetch_assoc()["ability"];

$deletePage = "data.php?method=deleteHero&id=" . $id;
?>

<div class="container">
    <h2><?php echo $info["name"] ?></h2>
    <h3>Ability: <?php echo $ability ?></h3>
    <h3><?php echo $info["about_me"] ?></h3>
    <p><?php echo $info["biography"] ?></p>
    <form action="updateBio.php" method="post">
        <input type="submit" value="Edit Bio">
        <input type="hidden" value=<?php echo str_replace(" ", "_", $info["biography"]) ?> name="method">
        <input type="hidden" value="<?php echo $id ?>" name="id">
    </form>
</div>

<?php
//Friends and Enemies section

//Getting friends list
echo "<h3>Friends</h3>";
$sql = "SELECT * FROM relationships JOIN heroes ON relationships.hero2_id=heroes.id WHERE hero1_id=" . $info["id"] . " AND type_id = 1";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        echo $row["name"], "<br>";
    }
} else {
    echo $info["name"] . " has no Friends!";
}

echo "<h3>Enemies</h3>";
//Getting emenies list
$sql = "SELECT * FROM relationships JOIN heroes ON relationships.hero2_id=heroes.id WHERE hero1_id=" . $info["id"] . " AND type_id = 2";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        echo $row["name"], "<br>";
    }
} else {
    echo $info["name"] . " has no Enemies! <br><br>";
}
?>
<a href=<?php echo $deletePage ?> class="btn" method="deleteHero">Delete Profile</a>