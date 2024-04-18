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
        $viewData = [];
        $viewData["productos"] = Producto::getProduct($this->idProducto);
        Renderer::render("productos/product", $viewData);
    }
}