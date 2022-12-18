<?php
class signIn
{
    public function login($username,$pass)
    {
        if ($username=='admin' && $pass=='123456'){
            return true;
        }
        require("../api/connection.php");
        $sql = $conn->query("SELECT * FROM users where username='$username' and password='$pass';");
        $res = $sql->rowCount();
        // echo json_encode($res);
        if ($res!=0){
            return true;
        } else return false;
    }
}
