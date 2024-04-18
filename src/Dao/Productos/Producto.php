<?php

namespace Dao\Productos;

use Dao\Table;

class Producto extends Table
{
    public static function getAllProductos()
    {
        $sqlstr = "SELECT * FROM productos;";
        return self::obtenerRegistros($sqlstr, []);
    }

    public static function getProduct($idProducto)
    {
        $sqlstr = "SELECT p.idProducto, p.nombreProducto, p.precioProducto, e.nombreEquipo, l.nombreLiga 
        FROM productos p 
        INNER JOIN equipos e ON p.idEquipo = e.idEquipo 
        INNER JOIN ligas l ON e.idLiga = l.idLiga  WHERE idProducto = :idProducto;";
        return self::obtenerUnRegistro($sqlstr, ["idProducto" => $idProducto ]);
    }

    public static function getProductLeague($nombreLiga)
{

    $sqlstr = "SELECT p.idProducto, p.nombreProducto, p.precioProducto, e.nombreEquipo, l.nombreLiga 
               FROM productos p 
               INNER JOIN equipos e ON p.idEquipo = e.idEquipo 
               INNER JOIN ligas l ON e.idLiga = l.idLiga 
               WHERE l.nombreLiga = :nombreLiga";
    
    // Obtener todos los productos asociados a la liga
    return self::obtenerRegistros($sqlstr, ["nombreLiga" => $nombreLiga]);
}

    

    public static function getProductWithFilet($nombre)
    {
        $sqlstr = "SELECT * FROM productos WHERE nombre like :nombre;";
        return self::obtenerUnRegistro($sqlstr, ["nombre" => "%" . $nombre . "%"]);
    }

    public static function insertProduct(
        $sku,
        $nombre,
        $precio
    ) {
        $sqlstr = "INSERT INTO productos (sku, nombre, precio)
         VALUES (:sku, :nombre, :precio);";
        return self::executeNonQuery(
            $sqlstr,
            [
                "sku" => $sku,
                "nombre" => $nombre,
                "precio" => $precio
            ]
        );
    }

    public static function updateProduct(
        $sku,
        $nombre,
        $precio
    ) {
        $sqlstr = "UPDATE productos SET nombre = :nombre,
            precio = :precio WHERE sku = :sku;";
        return self::executeNonQuery(
            $sqlstr,
            [
                "sku" => $sku,
                "nombre" => $nombre,
                "precio" => $precio
            ]
        );
    }

    public static function deleteProduct($sku)
    {
        $sqlstr = "DELETE FROM productos WHERE sku = :sku;";
        return self::executeNonQuery($sqlstr, ["sku" => $sku]);
    }
}