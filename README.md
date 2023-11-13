# TP3-UNICEN

## Endpoin

### Rutas de la API de Productos

#### 1. Obtener una lista de productos completa

   - **Método:** `GET`
   - **Ruta:** `/api/productos`
   - **Descripción:** Obtiene una lista completa de todos los productos disponibles.

#### 2. Obtener un producto por ID

   - **Método:** `GET`
   - **Ruta:** `/api/productos/{id}`
   - **Descripción:** Obtiene un producto específico mediante su identificador único (`id`).
   - **Ejemplo:** `/api/productos/111` Obtendremos un producto de la siguiente manera 
       
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
       


#### 3. Ordenar la lista de productos por nombre y orden

   - **Método:** `GET`
   - **Ruta:** `/api/productos?producto=name&order=desc`
   - **Parámetros:**
     - `producto`: Nombre de la columna por la cual se desea ordenar la lista.
     - `order`: Orden de clasificación.
   - **Descripción:** Permite ordenar la lista de productos por una columna específica (**id_product', 'name', 'description', 'price', 'category'**) y en un orden determinado
    (**'asc'** ordena ascendentemente y **'desc'** ordena descendientemente).
   - **Ejemplo:**
     - `/api/productos?producto=name&order=desc`  <--- Ordena por nombre descendientemente 
     - `/api/productos?producto=price&order=asc`  <--- Ordena por precio ascendentemente 
     - `/api/productos?producto=name` <--- Ordena por nombre y descendientemente por defecto
    
#### 4. Obtener todos los productos de una categoría

   - **Método:** `GET`
   - **Ruta:** `/api/productos/categoria/{categoria}`
   - **Parámetros:**
     - `categoria`: Nombre de la categoría para la cual se desean obtener los productos.
   - **Descripción:** Permite obtener todos los productos asociados a una categoría específica. Actualmente existen las siguientes categorias(**procesadores**)
   - **Ejemplo:**
       `/api/productos/categoria/procesadores`  Obtendremos todos los productos pertenecientes a la categoria procesadores. 
          
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
         
#### 5. Insertar un nuevo producto

   - **Método:** `POST`
   - **Ruta:** `/api/productos`
   - **Descripción:** Permite insertar un nuevo producto. Para insertar un producto debemos colar (**name**, **description**, **price**, **img**, **category**) obligatoriamente. Las 
     demas columnas son autoincrementables
   - **Ejemplo:**  Se puede insertar un producto de la siguiente manera 

     
          {  
          "name": "Intel Core I9",  
          "description": "Procesador de ultima generacion",  
          "price": 150000,  
          "img": "img/6551a6d3b90b4.png",      
          "category": "procesadores"}
         }
         

#### 6. Modificar un producto existente

   - **Método:** `PUT`
   - **Ruta:** `/api/productos/{id}`
   - **Parámetros:**
     - `id`: Identificador único del producto que se desea modificar.
   - **Descripción:** Permite modificar los detalles de un producto existente mediante su identificador único. Para modificar un producto debemos colar (**name**, **description**, 
     **price**, **img**, **category**) obligatoriamente. Las demas columnas son autoincrementables
   - **Ejemplo:** `/api/productos/111`  El producto con id 111 tiene como categoria procesadores, al cambiar podemos cambiar a categoria pc de la siguiente manera.

     
    {"name": "Intel Core I9", 
    "description": "Procesador de ultima generacion",
    "price": 150000,
    "img": "img/6551a6d3b90b4.png",
    "category": "pc"}

