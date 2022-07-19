<?php include 'parts/header.php';



$servername = "localhost";
$username = "root";
$password = "password";
$dbName = 'admissions';

try {
    $conn = new PDO("mysql:host=$servername;dbname=" . $dbName, $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    echo "Connected successfully";
} catch (PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
}


$sql = 'SELECT * FROM subjects';
$rez = $conn->query($sql);
$subjects = $rez->fetchAll();


?>

<form action="save.php" method="post">
    <input name="name" type="text" placeholder="name"><br>
    <input name="surname" type="text" placeholder="surname"><br>
    <input name="email" type="email" placeholder="email"><br>
    <input name="phone" type="text" placeholder="phone"><br>
    <input name="sex" type="text" placeholder="sex"><br>
    <input name="age" type="text" placeholder="age"><br>
    <select name="subject_id">
        <?php foreach ($subjects as $subject) {
            echo '<option value="' . $subject['id'] . '">' . $subject['name'] . '</option>';
        } ?>
    </select>

    <br><input type="submit" value="create" name="Enroll now "></br>
</form>


