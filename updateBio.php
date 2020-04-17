<!DOCTYPE html>

<h1>Edit Bio</h1>

<?php
$servername = "localhost";
$username = "root";
$password = "root";
$dbname = "sqlheroes";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

$bio = str_replace("_", " ", $_POST["method"]);
$id = $_POST["id"];
?>

<form action="data.php" method="post">
    Bio: <textarea name="bio"><?php echo $bio ?></textarea>
    <input type="hidden" value="updateBio" name="method">
    <input type="hidden" value="<?php echo $id ?>" name="id">
    <input type="submit">
</form>