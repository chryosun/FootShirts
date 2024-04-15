<?php

namespace Controllers\Carrito;

use Controllers\PublicController;

class Carritolist extends PublicController
{

    public function run(): void
    {
        $viewData = [];

        \Views\Renderer::render('carrito/carritolist', $viewData);
    }
}
