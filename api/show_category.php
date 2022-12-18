<?php

    require_once("connection.php");
    $response = "";
    if(!isset($_POST["type"])){
        $sql = "SELECT name from category;";
        try{
            $stmt = $conn->prepare($sql);
            $stmt->execute();
        }
        catch(PDOException $ex){
            die(json_encode(array('status' => false, 'data' => $ex->getMessage())));
        }
        $data = array();
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC))
        {
            $data[] = $row;
        }
        foreach($data as $key => $i){
            foreach($i as $j){
                $response .= "<a href='#product' class='list-group-item'><button onclick='get_product($key)' style='height:100%;background-color:#fff;border:none;'>$j</button></a>";
            }
        }
        unset($data);
        echo $response;
    } else{
        $type = $_POST["type"]+1;
        $sql = "SELECT * from product where type='$type'";
        try{
            $stmt = $conn->prepare($sql);
            $stmt->execute();
        }
        catch(PDOException $ex){
            die(json_encode(array('status' => false, 'data' => $ex->getMessage())));
        }
        $data = array();
        while ($r = $stmt->fetch(PDO::FETCH_ASSOC))
        {
            $data[] = ["id"=>$r["id"],"name" => $r["name"], "price" => $r["price"], "description" => $r["description"], "vote" => $r["vote"],"image"=>$r["image"]];
        }
        echo json_encode($data);
    }