<?php
function connect() {
    $conn = mysqli_connect("localhost", "root", "JezuUfamTobie");

    // Check connection
    if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
    }
    echo "Connected successfully";
    return $conn;
}