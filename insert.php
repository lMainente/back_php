<?php

header('Access-Control-Allow-Origin: http://localhost:4200' );

header('Access-Control-Allow-Headers:  Content-Type, X-Auth-Token, Authorization, Origin');

header('Access-Control-Allow-Methods: GET, POST');

header("Access-Control-Allow-Headers: X-Requested-With");

$imageBase64 = $_POST['image'];

$image = imagecreatefromstring(base64_decode($imageBase64));


$servername = "localhost:3306";
$username = "root";
$password = "admin";
$dbname = "fotos";

$conn = mysqli_connect($servername, $username, $password, $dbname);


if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}


$sql = "INSERT INTO base64 (base64) VALUES ('$imageBase64')";

if (mysqli_query($conn, $sql)) {
    echo "New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}


mysqli_close($conn);

?>
