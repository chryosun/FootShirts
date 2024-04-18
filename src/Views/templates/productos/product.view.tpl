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
</style>
<section>
  <div class="image">
    <img src="https://naidevs.com/images/{{idProducto}}.webp" alt="{{idProducto}}" class="product-image">
  </div>
  <div class="info">
    <h2>{{nombreProducto}}</h2>
    <p>L. {{precioProducto}}.00</p>
    <p>Categoria: {{nombreLiga}}</p>
    <button>Agregar al Carrito</button>
  </div>
</section>