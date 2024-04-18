<h2>Listado de Productos</h2>
<section style="display: grid;
  grid-template-columns: repeat(4, 1fr); /* Crea 5 columnas de igual ancho */
  gap: 15px;">
    {{foreach productos}}
    <a href="index.php?page=Products_Product&idProducto={{idProducto}}"> 
    <div class="product-card" style="border: 1px solid #ccc;
  border-radius: 8px;
  overflow: hidden;
  width: 300px;
  box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
  margin: 10px;">
        <img src="https://naidevs.com/images/{{idProducto}}.webp" alt="{{idProducto}}" class="product-image" style="width: 100%;
  height: 400px;
  object-fit: cover;">
        <div class="product-details" style="padding: 20px;">
            <h3 class="product-name" style="font-size: 18px;
  margin-bottom: 10px;">{{nombreProducto}}</h3>
            <p class="product-price" style="font-size: 16px;
  color: #007bff; ">{{precioProducto}}</p>
        </div>
    </div>
    </a>
    {{endfor productos}}
</section>
