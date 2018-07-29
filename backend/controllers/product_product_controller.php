<?php
    require_once $_SERVER['DOCUMENT_ROOT'] . '/web_mobile/backend/models/product_product.php';
    // Action of _GET Queries
    if(ISSET($_GET['action'])){
        $action = $_GET['action'];
        if($action == 'read'){
            $object = new ProductProduct();
            $read = $object->read();
            $table = array();
            while($row = $read->fetch_assoc()){
                $table[]=$row;
            }
            echo json_encode($table);
        }
        else if($action == 'delete'){
            $id = $_GET['id'];
            $object = new ProductProduct();
            $result = $object->delete($id);
            if($result){
                echo "success";
            }else{
                echo "error";
            }
        }
    }

    // Action of _POST Queries
    if(ISSET($_POST['insert'])){
        $name = $_POST['name'];
        $categ_id = $_POST['categ_id'];
        $sale_price = $_POST['sale_price'];
        $qty_available = $_POST['qty_available'];

        $object = new ProductProduct();
        $result = $object->create($name, $categ_id, $sale_price, $qty_available);
        if($result){
            echo "success";
        }else{
            echo "error";
        }
    }
    if(ISSET($_POST['update'])){
        $id = $_POST['id'];
        $name = $_POST['name'];
        $categ_id = $_POST['categ_id'];
        $sale_price = $_POST['sale_price'];
        $qty_available = $_POST['qty_available'];

        $object = new ProductProduct();
        $result = $object->update($id, $name, $categ_id, $sale_price, $qty_available);
        if($result){
            echo "success";
        }else{
            echo "error";
        }
    }
?>