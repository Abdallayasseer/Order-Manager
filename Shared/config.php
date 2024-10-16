<?php
$host = 'localhost';
$user = 'root';
$password = '';
$db_name = 'project';

try {
    $conn = mysqli_connect($host, $user, $password, $db_name);
    // echo "Connected successfully";
} catch (Exception $e) {
    echo "Connection failed: " . $e->getMessage();
}
