<?php

     class CategoriesModel{

          private $db;

          function __construct(){
               $this->db = connection();
          }

          public function getProductsByCategory($category) {
               $query = $this->db->prepare("SELECT * FROM product JOIN category ON product.id_category_fk = category.id_category WHERE category.category = (?)");
               $query->execute(array($category));
               $products = $query->fetchAll(PDO::FETCH_OBJ);
               return $products;
           }

          public function getCategory(){
               $query= $this->db->prepare( "SELECT * FROM category");
               $query->execute();
               $category = $query->fetchAll(PDO::FETCH_OBJ); 
               return $category;
          }
     }
?>