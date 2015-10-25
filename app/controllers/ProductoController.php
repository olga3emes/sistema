<?php
/**
 * Created by PhpStorm.
 * User: olga
 * Date: 20/3/15
 * Time: 13:15
 */

class ProductoController extends BaseController {

    public function mostrarProductos(){

        $productos = Producto::all();
        $vendedores = Vendedor::all();
        // buscamos todos los productos y todos los vendedores y los pasamos a la vista
        return View::make('producto.lista', array('productos' => $productos, 'vendedores'=> $vendedores));
    }

    public function crearProducto(){

        $respuesta = Producto::agregarProducto(Input::all());

        if ($respuesta['error'] == true){
            return Redirect::to('producto')->withErrors($respuesta['mensaje'] )->withInput();
        }else{
            return Redirect::to('producto')->with('mensaje', $respuesta['mensaje']);
        }
    }
}