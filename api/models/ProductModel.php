<?php
    require_once './config.php';

    class ProductModel {

        private $db;

        function __construct(){
            $this->db = connection();
        }

        function getProducts(){
            $query = $this->db->prepare("SELECT product.*, category.* FROM product INNER JOIN category ON(product.id_category_fk = category.id_category) ORDER BY category");
            $query->execute();
            $products = $query->fetchAll(PDO::FETCH_OBJ); 
            return $products;  
        }
        
        function getProduct($id){
            $query = $this->db->prepare("SELECT * FROM product INNER JOIN category ON product.id_category_fk = category.id_category WHERE id_product = ?");
            $query->execute(array($id));
            $product = $query->fetch(PDO::FETCH_OBJ);
            return $product;
        }

        public function getProductsOrderBy($elementOrder, $order = 'DESC') {
            $order = strtoupper($order) === 'ASC' ? 'ASC' : 'DESC';
            $query = $this->db->prepare("SELECT product.*, category.* FROM product INNER JOIN category ON (product.id_category_fk = category.id_category) 
                        ORDER BY $elementOrder $order");
            $query->execute();
            $products = $query->fetchAll(PDO::FETCH_OBJ); 
            return $products; 
        }
    

        function insertProduct($name, $description, $price,$img, $id_category_fk){
            $query = $this->db->prepare('INSERT INTO product (name, description, price, img, id_category_fk) VALUES(?,?,?,?,?)');
            $query->execute(array($name,$description,$price,$img, $id_category_fk));
            return $this->db->lastInsertId();
        }

        function updateProduct($id, $name, $description, $price, $img, $id_category_fk){
            $query = $this->db->prepare('UPDATE product SET name = ?, description = ?, price = ?, img =?, id_category_fk=? WHERE product.id_product = ?');
            $query->execute(array($name, $description, $price, $img, $id_category_fk, $id));
        }
    }

?>