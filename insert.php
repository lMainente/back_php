<?php

// header('Access-Control-Allow-Origin: localhost' ) ;

// header('Access-Control-Allow-Headers:  Content-Type, X-Auth-Token, Authorization, Origin');

// header('Access-Control-Allow-Methods: GET, POST');

// header("Access-Control-Allow-Headers: X-Requested-With");

// header (' Acces-Control-Allow-Credentials: true');



$imageBase64 = $_POST['fotoassistida'];
$imageBase64Array = explode(",", $imageBase64);
$firstItem = $imageBase64Array[0]; 

echo $imageBase64[0];

if (!empty($imageBase64)) {
    $image = imagecreatefromstring(base64_decode($imageBase64));
} else {
    echo ('front n esta enviando a requisição');
}

$image = imagecreatefromstring(base64_decode($imageBase64));


$servername = "localhost:3306";
$username = "protecaodigitala_root";
$password = "senai119.";
$dbname = "protecaodigitala_sqlbanco";

$conn = mysqli_connect($servername, $username, $password, $dbname);


if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}


$sql = "INSERT INTO base64 (base64) VALUES ('$image')";

if (mysqli_query($conn, $sql)) {
    echo "New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}


mysqli_close($conn);

?>
