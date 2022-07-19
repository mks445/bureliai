

<?php

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



if (isset($_POST['create'])) {
    $name = $_POST['name'];
    $surname = $_POST['surname'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $sex = $_POST['sex'];
    $age = $_POST['age'];
    $subject_id = $_POST['subject_id'];


    $sql = 'INSERT INTO kids (name, surname, email, phone, sex, age, subject_id) 
            VALUES ("' . $name . '", "' . $surname . '", "' . $email . '", "' . $phone . '", "' . $sex . '", "' . $age . '" , ' . $subject_id . ')';


    if ($conn->query($sql) === TRUE) {
        echo "New record created successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();
}