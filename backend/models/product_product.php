<?php
    require 'configuration.php';

    class ProductProduct extends OpenAcademyConnection{

        public function __construct(){
			$this->connect();
        }

        public function create($name, $categ_id, $sale_price, $qty_available){
			$stmt = $this->conn->prepare("INSERT INTO product_product (name, categ_id, sale_price, qty_available) VALUES (?, ?, ?, ?)") or die($this->conn->error);
			$stmt->bind_param("ssss", $name, $categ_id, $sale_price, $qty_available);
			if($stmt->execute()){
				$stmt->close();
				$this->conn->close();
				return true;
            }
        }

        public function read(){
			$stmt = $this->conn->prepare("SELECT  * FROM product_product ORDER BY name ASC") or die($this->conn->error);
			if($stmt->execute()){
                $result = $stmt->get_result();
                $stmt->close();
                $this->conn->close();
				return $result;
			}
        }

        public function update($id, $name, $categ_id, $sale_price, $qty_available){
            $stmt = $this->conn->prepare("UPDATE product_product SET name=?, categ_id=?, sale_price=?, qty_available=? WHERE id=?") or die($this->conn->error);
            $stmt->bind_param("sssss", $name, $categ_id, $sale_price, $qty_available, $id);
			if($stmt->execute()){
				$stmt->close();
				$this->conn->close();
				return true;
            }
        }

        public function delete($id){
			$stmt = $this->conn->prepare("DELETE FROM product_product WHERE id=?") or die($this->conn->error);
			$stmt->bind_param("s", $id);
			if($stmt->execute()){
				$stmt->close();
				$this->conn->close();
				return true;
            }
        }
    } 
?>