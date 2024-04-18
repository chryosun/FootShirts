<?php

namespace Controllers\Products;

use Controllers\PublicController;
use Dao\Productos\Producto;
use Views\Renderer;

class ProductsLeague extends PublicController
{
    private $ligaNombre = "";
    public function run(): void
    {
        $this->ligaNombre = isset($_GET["nombreLiga"]) ? $_GET["nombreLiga"] : "";
        $viewData = [];
        $viewData["productos"] = Producto::getProductLeague($this->ligaNombre);
        Renderer::render("productos/productsLeague", $viewData);
    }
}