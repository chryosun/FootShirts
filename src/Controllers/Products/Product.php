<?php

namespace Controllers\Products;

use Controllers\PublicController;
use Dao\Productos\Producto;
use Views\Renderer;

class Product extends PublicController
{
    private $idProducto = "";

    public function run(): void
    {
        $this->idProducto = isset($_GET["idProducto"]) ? $_GET["idProducto"] : "";

        // Obtener los datos del producto
        $producto = Producto::getProduct($this->idProducto);

        // Asignar datos a la vista
        $viewData = [
            "nombreProducto" => $producto["nombreProducto"],
            "precioProducto" => $producto["precioProducto"],
            "nombreLiga" => $producto["nombreLiga"]
        ];

        // Renderizar la vista
        Renderer::render("productos/product", $viewData);
    }
}
