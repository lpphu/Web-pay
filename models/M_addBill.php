<?php
class AddBill{
    public function addBill($total){
        require("../api/connection.php");
        $sql = "SELECT * from bill";
        $stmt = $conn -> query($sql);
        $count = $stmt -> rowCount();
        $sql = "INSERT INTO bill(id,total,date) values($count+1,$total,Now());";
        $conn ->query($sql);
        $sql = "SELECT * from bill";
        $stmt = $conn -> query($sql);
        $count = $stmt -> rowCount();
        return $count;
    }
    public function addTotalBill($bill_id,$data){
        require("../api/connection.php");
        $sql = "SELECT * from bill_details";
        $stmt = $conn -> query($sql);
        $count = $stmt -> rowCount();
        foreach($data as $key=>$value){
            $sql = "INSERT INTO bill_details(id,product_id,quantity,bill_id) values($count+1,'$key','$value',$bill_id);";
            $conn ->query($sql);
            $count++;
        }

    }
}
?>