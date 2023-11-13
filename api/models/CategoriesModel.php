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

           public function getCategoryByName($category) {
               $query = $this->db->prepare("SELECT id_category FROM category WHERE category = ?");
               $query->execute([$category]);
               $result = $query->fetch(PDO::FETCH_OBJ);
               if ($result !== false) {
                    return $result->id_category;
                } else {
                    return null;
                }
           }
           

          public function getCategory(){
               $query= $this->db->prepare( "SELECT * FROM category");
               $query->execute();
               $category = $query->fetchAll(PDO::FETCH_OBJ); 
               return $category;
          }
     }
?>