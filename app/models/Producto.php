<?php
/**
 * Created by PhpStorm.
 * User: olga
 * Date: 20/3/15
 * Time: 13:13
 */

class Producto extends Eloquent  {

    protected $table = 'producto';
    protected $fillable = array('descripcion', 'precio', 'vendedor_id');

    public static function agregarProducto($input){

        $respuesta = array();

        $reglas =  array(
            'vendedor_id'  => 'required',
            'descripcion'  => array('required', 'max:255'),
            'precio' => array('required', 'numeric'),
        );

        $validator = Validator::make($input, $reglas);

        if ($validator->fails()){
            $respuesta['mensaje'] = $validator;
            $respuesta['error']   = true;
        }else{

            $producto = static::create($input);

            $respuesta['mensaje'] = 'Producto creado!';
            $respuesta['error']   = false;
            $respuesta['data']    = $producto;
        }

        return $respuesta;
    }
}