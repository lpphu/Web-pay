<?php

    require_once("../api/connection.php");
    $sql = "SELECT product_id,quantity FROM bill_details";
    $stmt = $conn -> query($sql);
    $data= [];
    while ($r = $stmt->fetch(PDO::FETCH_ASSOC))
    {
        $data[] = ["product_id"=>$r["product_id"],"quantity" => $r["quantity"]];
    }
    $res =[];
    for ($i=0;$i<count($data);$i++){
        $id =$data[$i]["product_id"];
        $sql = "SELECT * FROM product where id=$id";
        $stmt = $conn -> query($sql);
        while ($r = $stmt->fetch(PDO::FETCH_ASSOC))
        {
            $thanhtien = (int)$data[$i]["quantity"]*(int)$r["price"];
            $res[] = ["image"=>$r["image"],"name"=>$r["name"],"quantity"=>$data[$i]["quantity"],"price"=>$r["price"],"thanhtien"=>$thanhtien];
        }
    }
    echo json_encode($res);