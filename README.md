# TP3-UNICEN

## Endpoin

- **Ruta:** `/api/productos`

Método  Ruta                    Descripción                     

 GET     /api/productos           Obtiene una lista de productos completa 
 GET     /api/productos/{id}        Obtiene un producto por id
 GET     /api/productos?producto=name&order=desc  Permite ordenar la lista de productos por una determinada columna y a demas en orden descendete o ascendete
 GET     /api/productos/categoria/{categoria} Permite obtener todos los productos de la categoria introducida
 POST    /api/productos Nos permite insertar un producto
 PUT     /api/productos/{id} Nos permite modificar un producto
 
          {
    "id_product": 111,
    "name": "Intel Core I9",
    "description": "Procesador de ultima generacion",
    "price": 150000,
    "img": "img/6551a6d3b90b4.png",
    "id_category_fk": 9,
    "id_category": 9,
    "category": "procesadores"
}
