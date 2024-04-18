<?php

namespace Controllers\Carrito;

use Controllers\PublicController;

class Carritolist extends PublicController
{
    private $idProducto = "";

    public function run(): void
    {
        $this->idProducto = isset($_GET["idProducto"]) ? $_GET["idProducto"] : "";
        // Iniciar la sesión si no está iniciada
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }

        if (isset($_POST['removetoCart']) && $_POST['idProducto'] === $this->idProducto) {
            // Agregar el producto al carrito
            if ($this->removeFromCart($this->idProducto)) {
                // Si se agregó correctamente, mostrar la alerta con los productos en el carrito
                $productosEnCarrito = implode(", ", array_column($_SESSION, 'nombreProducto'));
                echo "<script>alert('Producto removido del carrito. Productos en el carrito: $productosEnCarrito');</script>";
            } else {
                // Si no se pudo agregar, mostrar un mensaje de error
                echo "<script>alert('Error: Producto no removido del carrito');</script>";
            }
        }

        // Array para almacenar los productos en el carrito
        $productsInCart = [];

        // Iterar sobre $_SESSION para buscar los productos en el carrito
        foreach ($_SESSION as $key => $value) {
            // Verificar si la clave corresponde a un producto en el carrito (las claves de los productos tienen el formato 'product_idProducto')
            if (strpos($key, 'product_') !== false) {
                // Extraer el ID del producto de la clave
                $idProducto = substr($key, strpos($key, '_') + 1);

                // Calcular el subtotal del producto
                $subtotalProducto = $value['precioProducto'] * ($value['cantidad']);

                // Agregar los detalles del producto al array de productos en el carrito
                $productsInCart[] = [
                    'idProducto' => $value['idProducto'],
                    'nombreProducto' => $value['nombreProducto'],
                    'precioProducto' => $value['precioProducto'],
                    'cantidad' => $value['cantidad'],
                    'subtotalProducto' => $subtotalProducto,
                ];
            }
        }

        // Calcular el subtotal, impuesto y total
        $subtotal = array_reduce($productsInCart, function ($carry, $product) {
            return $carry + $product['subtotalProducto'];
        }, 0);
        $impuesto = $subtotal * 0.15;
        $total = $subtotal + $impuesto;

        // Renderizar la vista del carrito y pasar los productos en el carrito, subtotal, impuesto y total como datos de la vista
        \Views\Renderer::render('carrito/carritolist', [
            'productsInCart' => $productsInCart,
            'subtotal' => $subtotal,
            'impuesto' => $impuesto,
            'total' => $total,
        ]);
    }

    private function removeFromCart($productId)
    {
        // Verificar si la sesión ya está activa
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }

        // Verificar si el producto está en el carrito
        if (isset($_SESSION["product_$productId"])) {
            // Eliminar el producto del carrito
            unset($_SESSION["product_$productId"]);
            // Producto eliminado con éxito
            return true;
        }

        // Si el producto no estaba en el carrito, retornar false
        return false;
    }
}
