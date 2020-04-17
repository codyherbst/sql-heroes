<?php 
$servername = "localhost";
$username = "root";
$password = "root";
$dbname = "sqlheroes";

$conn = new mysqli($servername, $username, $password, $dbname);

$returnLocation = "/index.php";

if ($_GET["method"]) {
    $method = $_GET["method"];
} else {
    $method = $_POST["method"];
}

if ($method == "newHero") {
    $heroName = $_POST["heroName"];
    $heroAbout = $_POST["heroAbout"];
    $heroBio = $_POST["heroBio"];

    newHero($conn, $heroName, $heroAbout, $heroBio);
    
} else if ($method == "deleteHero") {
    $heroID = $_GET["id"];
    deleteHero($conn, $_GET["id"]);

} else if ($method == "updateBio") {
    updateBio($conn, $_POST["bio"], $_POST["id"]);
    $returnLocation = "/about.php?id=" . $_POST["id"];
}

function newHero($conn, $heroName, $heroAbout, $heroBio) {
    $sql = "INSERT INTO heroes (name, about_me, biography) VALUES ('$heroName', '$heroAbout', '$heroBio')";
    $conn->query($sql);
}

function deleteHero($conn, $id) {
    echo "hello";
    $sql = "DELETE FROM heroes WHERE id = '$id'";
    $conn->query($sql);
}

function updateBio($conn, $bio, $id) {
    $sql = "UPDATE heroes SET biography = '$bio' WHERE id = " . $id;
    $conn->query($sql);
}

$conn->close();
header("Location: " . $returnLocation);
?>
