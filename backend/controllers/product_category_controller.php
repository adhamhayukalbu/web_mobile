<?php
    require_once $_SERVER['DOCUMENT_ROOT'] . '/web_mobile/backend/models/product_category.php';
    // Action of _GET Queries
    if(ISSET($_GET['action'])){
        $action = $_GET['action'];
        if($action == 'read'){
            $object = new ProductCategory();
            $read = $object->read();
            $table = array();
            while($row = $read->fetch_assoc()){
                $table[]=$row;
            }
            echo json_encode($table);
        }
        else if($action == 'delete'){
            $id = $_GET['id'];
            $object = new ProductCategory();
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
        $parent_id = $_POST['parent_id'];
        $display_name = $parent_id." / ".$name;

        $object = new ProductCategory();
        $result = $object->create($name, $parent_id, $display_name);
        if($result){
            echo "success";
        }else{
            echo "error";
        }
    }
    if(ISSET($_POST['update'])){
        $id = $_POST['id'];
        $name = $_POST['name'];
        $parent_id = $_POST['parent_id'];
        $display_name = $parent_id." / ".$name;

        $object = new ProductCategory();
        $result = $object->update($id, $name, $parent_id, $display_name);
        if($result){
            echo "success";
        }else{
            echo "error";
        }
    }
?>