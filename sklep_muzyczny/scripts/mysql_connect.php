<?php
function connect() {
    $conn = mysqli_connect("localhost", "root", "", "semiquaver");

    // Check connection
    if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
    }
    return $conn;
}