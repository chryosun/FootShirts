<?php

namespace Controllers\Products;

use Controllers\PublicController;
use Dao\Productos\Producto;
use Views\Renderer;

class Product extends PublicController
{
    private $idProducto = "";
    private $cantidad = 0;

    public function run(): void
    {
        $this->idProducto = isset($_GET["idProducto"]) ? $_GET["idProducto"] : "";
        $this->cantidad = isset($_POST['cantidad']) ? $_POST['cantidad'] : 1;

        // Obtener los datos del producto
        $producto = Producto::getProduct($this->idProducto);

        // Verificar si se ha enviado el formulario para agregar al carrito
        if (isset($_POST['addToCart']) && $_POST['idProducto'] === $this->idProducto) {
            // Agregar el producto al carrito
            if ($this->addToCart($this->idProducto, $this->cantidad)) {
                // Si se agregó correctamente, mostrar la alerta con los productos en el carrito
                $productosEnCarrito = implode(", ", array_column($_SESSION, 'nombreProducto'));
                echo "<script>alert('Producto agregado al carrito. Productos en el carrito: $productosEnCarrito');</script>";
            } else {
                // Si no se pudo agregar, mostrar un mensaje de error
                echo "<script>alert('Error: Producto no agregado al carrito');</script>";
            }
        }

        // Asignar datos a la vista
        $viewData = [
            "nombreProducto" => $producto["nombreProducto"],
            "precioProducto" => $producto["precioProducto"],
            "nombreLiga" => $producto["nombreLiga"],
            "existenciasProducto" => $producto["existenciasProducto"],
        ];

        // Renderizar la vista
        Renderer::render("productos/product", $viewData);
    }

    private function addToCart($productId, $cantidad)
    {
        // Verificar si la sesión ya está activa
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }

        // Obtener la información del producto
        $producto = Producto::getProduct($productId);

        // Verificar si se obtuvo correctamente la información del producto
        if (!$producto) {
            // Si no se pudo obtener la información del producto, retornar false y mostrar un mensaje de error
            return false;
        }

        // Verificar si el producto ya está en el carrito
        if (isset($_SESSION["product_$productId"])) {
            // Si el producto ya está en el carrito, no lo agregamos de nuevo
            return false;
        }

        // Almacenar el producto en la sesión de PHP
        $_SESSION["product_$productId"] = [
            'idProducto' => $producto["idProducto"],
            'cantidad' => $cantidad,
            'nombreProducto' => $producto["nombreProducto"],
            'precioProducto' => $producto["precioProducto"],
        ];

        // Producto agregado con éxito
        return true;
    }
}
