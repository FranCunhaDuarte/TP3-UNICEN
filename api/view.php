<?php

class View {
    public function mostrarProducts($products) {
        $html = "<ul>";
        foreach ($products as $product) {
            $html .= "<li>" . $product->name . "</li>";
        }
        $html .= "</ul>";
        echo $html;
    }
}