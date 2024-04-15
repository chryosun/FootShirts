<h1>Carrito de compras</h1>
<style>
    table tbody tr td {
        text-align: center;
    }

    table thead th {
        background-color: black;
    }

    section h3 {
        text-align: center;
    }

    .box {
        width: 50%;
        border-width: 1px;
        border-style: double;
        border-color: black;
        padding: 20px;
        border-radius: 1%;
    }

    section div label {
        margin: 15px;
    }

    section div button{
        background-color: black;
        border-radius: 20px;
        margin: 10px;
    }
</style>

<section class="WWList">
<table>
    <thead>
    <tr>
    <th>Artículo</th>
    <th>Descripción</th>
    <th>Precio</th>
    <th>Cant.</th>
    <th>Opciones</th>
    </tr>
    </thead>
    <tbody>
        <tr>
        <td>Imagen</td>
        <td>Camisa del Olimpia</td>
        <td>500</td>
        <td><input type="number" name="cantidad" id="" value="5"></td>
        <td><a href="#">Eliminar</a>&nbsp;</td>
        </tr>
    </tbody>
</table>
</section>

<section class="fullCenter">
    <form class="resumen" action="" id=""></form>
    <section class="box">
     <h3>Resumen del pedido</h3>
    </section>

    <section class="box">
    <div class="row">
    <label class="col-12">Subtotal:</label>
    <label class="col-12" for="">Total:</label>
    <button class="col-12" type="submit">Realizar compra</button>
    <button class="col-12" type="submit">Elegir más productos</button>
    </div>
    </form>
    </section>

</section>
