<style>
section {
  display: flex;
  justify-content: center;
  gap: 50px;
}
img {
  width: 300px;
}
.info {
  padding: 20px;
}
button {
  border: none;
  padding: 10px 15px;
  border-radius: 10px;
  font-size: 16px;
  background-color: rgb(6, 3, 84);
  color: #fff;
  cursor: pointer;
}
form {
  display: flex;
  gap: 20px
}
</style>
<section>
  <div class="image">
    <img src="https://naidevs.com/images/{{idProducto}}.webp" alt="{{idProducto}}" class="product-image">
  </div>
  <div class="info">
    <h2>{{nombreProducto}}</h2>
    <p>L. {{precioProducto}}.00</p>
    <p>Categoria: {{nombreLiga}}</p>
    <p>Existencias en Stock: {{existenciasProducto}}</p>
    <form action="index.php?page=Products_Product&idProducto={{idProducto}}" method="post">
      <input type="hidden" name="idProducto" value="{{idProducto}}">
      <label>Cantidad deseada: </label>
      <input type="number" name="cantidad" value="1" max="{{existenciasProducto}}" style="width:70px">
      <button type="submit" name="addToCart">Agregar al Carrito</button>
    </form>
  </div>
</section>
