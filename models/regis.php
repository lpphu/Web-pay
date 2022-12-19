<?php
    require_once("../api/connection.php");
    $username = $_POST["username"];
    $password = $_POST["password"];
    $fullname = $_POST["fullname"];
    $phone = $_POST["phone"];
    $bdate = $_POST["bdate"];
    $address = $_POST["address"];
    $gender = $_POST["gender"];
    $sql = $conn->query("SELECT * FROM users where username like $username");
    $res = $sql->rowCount();
    if ($res!=0){
        die('
        <h1>Tài khoản đã tồn tại</h1>
        <button><a href="./controllers/login.php" style="text-decoration: none;">Quay về trang login</a></button>
        ');
    } 
    $sql = $conn->query("INSERT INTO users(username, password, fullName, phone, BDate, Address, Gender) values('$username', '$password', '$fullname', '$phone', '$bdate', '$address', '$gender');");
    echo '
    <h1>Đăng ký thành công</h1>
    <button><a href="../controllers/login.php" style="text-decoration: none;">Quay về trang login</a></button>
    ';
?>