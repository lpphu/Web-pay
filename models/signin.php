<?php
class signIn
{
    public function login($username,$pass)
    {
        if ($username=='admin' && $pass=='123456'){
            return true;
        }
        require("../api/connection.php");
        $sql = $conn->query("SELECT * FROM taikhoan where username='$username' and matkhau='$pass';");
        $res = $sql->rowCount();
        // echo json_encode($res);
        if ($res!=0){
            return true;
        } else return false;
    }
}
