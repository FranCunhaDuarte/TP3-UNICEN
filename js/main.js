
const URL = "api/productos";

async function obtenerProductos(){

    try{
        let response = await fetch(URL);
        let products = await response.json();
        let content = document.querySelector("#products");
        content.innerHTML = "";
        for(let product of products) {
            content.innerHTML += createProduct(product);
        }

    }catch{

    }
}

function createProduct(product){
    let element = `${product.name}: ${product.description} : ${product.price} : ${product.img} : ${product.id_category_fk}`;
        element += `<a href="api/productos/${product.id_product}">Ver</a> `;
        element += `<a href="productos/${product.id_product}">Modificar</a> `;
        element = `<li>${element}</li>`;
        return element;  
}

document.querySelector("#form").addEventListener('submit', insertProducto);

async function insertProducto(e){
    e.preventDefault();
    try{
    let data = {
        name:  document.querySelector("input[name=name]").value,
        description:  document.querySelector("input[name=description]").value,
        price:  document.querySelector("input[name=price]").value,
        img:  document.querySelector("input[name=img]").value,
        id_category_fk:  document.querySelector("input[name=category]").value
    }

    let response = await fetch(URL, {
        method: 'POST',
        headers: {'Content-Type': 'application/json'},       
        body: JSON.stringify(data) 
     })
    let product = await response.json();
    console.log(product);

    }catch(error){
        console.log(error);
    }
}



obtenerProductos();