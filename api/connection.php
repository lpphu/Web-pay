<?php
    header('Access-Control-Allow-Origin: *');
    $host = 'localhost';
    $user = 'root';
    $pass = '';
    $db = 'dangtan'; // tên databse

    try {
        $conn = new PDO("mysql:host=" . $host . ";dbname=" . $db, $user, $pass, array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
    } catch (PDOException $ex) {
        die(json_encode(array('status' => false, 'data' => 'Unable to connect: ' . $ex->getMessage())));
    }
?>