<?php
$fname = $_POST['nam'];
$eml = $_POST['email'];
$phone = $_POST['phone'];
$country = $_POST['country'];
$adr = $_POST['address']; // Corrected key
$gen = $_POST["gender"];
$how = $_POST["hobbies"];

$comments = $_POST["comments"];

// Corrected connection error check
$conn = new mysqli( 'localhost', 'root', '', 'med');
if ($conn->connect_error) {
    die("Connection Failed: " . $conn->connect_error);
} else {
    $stmt = $conn->prepare("INSERT INTO Customer (fname, eml, phone, country, adr, gen, how, comments) VALUES (?, ?, ?, ?, ?, ?, ?,  ?)");
    $stmt->bind_param("ssisssss", $fname, $eml, $phone, $country, $adr, $gen, $how, $comments); // Corrected parameter types
    $stmt->execute();
    echo "Successfully Registered";
    $stmt->close();
    $conn->close();
}
?>
