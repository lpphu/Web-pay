<?php
    if (isset($_POST['send'])){
        require_once("../models/M_addBill.php");
        $data = (object)$_POST["send"];
        $total = $_POST["total"];
        $bill = new AddBill();
        $res = $bill -> addBill($total);
        $bill -> addTotalBill($res,$data);
    } echo json_encode("khong co du lieu de them");
?>
