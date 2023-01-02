<?php
$firstName = $_Post['firstName'];
$lastName = $_Post['lastName'];
$Gender = $_Post['Gender'];
$Email = $_Post['Email'];
$Password = $_Post['Password'];
$number = $_Post['number'];

$conn = new mysqli('localhost', 'root', "", "", 'signup');
if($conn->connect_error){
    die('Connection Failed : ' . $conn->connect_error);
} else {
    $stmt = $conn->prepare("insert into registration(firstName, lastName, Gender, Email, Password ,number)
    values(?,?,?,?,?,?");
    $stmt->bind_param("sssssi", $firstName, $lastName, $Gender, $Email, $Password, $number);
    $stmt->execute();
    echo "Registration Succesfully...";
    $stmt->close();
    $conn->close();


}


?>