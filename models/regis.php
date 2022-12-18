<?php
    require_once("../api/connection.php");
    $username = $_POST["username"];
    $password = $_POST["password"];
    $email = $_POST["email"];
    $sql = $conn->query("SELECT * FROM taikhoan where username = '" . $username . "' or email = '" . $email . "';");
    $res = $sql->rowCount();
    if ($res!=0){
        die('
        <h1>Tài khoản đã tồn tại</h1>
        <button><a href="../controllers/login.php" style="text-decoration: none;">Quay về trang login</a></button>
        ');
    } 
    $sql = $conn->query("INSERT INTO taikhoan(username, matkhau, email) values('$username', '$password', '$email');");
    echo '
    <h1>Đăng ký thành công</h1>
    <button><a href="../controllers/login.php" style="text-decoration: none;">Quay về trang login</a></button>
    ';
?>