<?php

namespace Controllers\Products;

use Controllers\PublicController;
use Dao\Productos\Producto;
use Views\Renderer;


class Products extends PublicController
{
    public function run(): void
    {
        $viewData = [];
        $viewData["productos"] = Producto::getAllProductos();
        Renderer::render("productos/products", $viewData);
    }
}