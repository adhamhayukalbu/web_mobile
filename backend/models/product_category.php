<?php
    require 'configuration.php';

    class ProductCategory extends OpenAcademyConnection{

        public function __construct(){
			$this->connect();
        }

        public function create($name, $parent_id, $display_name){
			$stmt = $this->conn->prepare("INSERT INTO product_category (name, parent_id, display_name) VALUES (?, ?, ?)") or die($this->conn->error);
			$stmt->bind_param("sss", $name, $parent_id, $display_name);
			if($stmt->execute()){
				$stmt->close();
				$this->conn->close();
				return true;
            }
        }

        public function read(){
			$stmt = $this->conn->prepare("SELECT  * FROM product_category ORDER BY name ASC") or die($this->conn->error);
			if($stmt->execute()){
                $result = $stmt->get_result();
                $stmt->close();
                $this->conn->close();
				return $result;
			}
        }

        public function update($id, $name, $parent_id, $display_name){
            $stmt = $this->conn->prepare("UPDATE product_category SET name=?, parent_id=?, display_name=? WHERE id=?") or die($this->conn->error);
            $stmt->bind_param("ssss", $name, $parent_id, $display_name, $id);
			if($stmt->execute()){
				$stmt->close();
				$this->conn->close();
				return true;
            }
        }

        public function delete($id){
			$stmt = $this->conn->prepare("DELETE FROM product_category WHERE id=?") or die($this->conn->error);
			$stmt->bind_param("s", $id);
			if($stmt->execute()){
				$stmt->close();
				$this->conn->close();
				return true;
            }
        }
    } 
?>