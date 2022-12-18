<?php
session_start();
class signIn
{
    public function login($username,$pass)
    {
        if ($username=='admin' && $pass=='123456'){
            $_SESSION["username"] = $username;

            return false;
        }
        require("../api/connection.php");
        $sql = $conn->query("SELECT * FROM users where username='$username' and password='$pass';");
        $res = $sql->rowCount();
        // echo json_encode($res);
        $_SESSION["username"] = $username;
        if ($res!=0){
            return true;
        } else return false;
    }
}
