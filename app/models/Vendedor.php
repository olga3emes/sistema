<?php
/**
 * Created by PhpStorm.
 * User: olga
 * Date: 20/3/15
 * Time: 13:12
 */

class Vendedor extends Eloquent  {

    protected $table = 'vendedor';
    // declaramos la tabla que usa el modelo
    protected $fillable = array('nombre', 'apellido');
    // declaramos los campos con los que se puede crear el objeto desde el form

    public function productos(){
        // creamos una relación con el modelo de Producto
        return $this->hasMany('Producto', 'vendedor_id');
    }

    public static function agregarVendedor($input){
        // función que recibe como parámetro la información del formulario para crear el Vendedor

        $respuesta = array();

        // Declaramos reglas para validar que el nombre y apellido sean obligatorios y de longitud maxima 100
        $reglas =  array(
            'nombre'  => array('required', 'max:100'),
            'apellido' => array('required', 'max:100'),
        );

        $validator = Validator::make($input, $reglas);

        // verificamos que los datos cumplan la validación
        if ($validator->fails()){

            // si no cumple las reglas se van a devolver los errores al controlador
            $respuesta['mensaje'] = $validator;
            $respuesta['error']   = true;
        }else{

            // en caso de cumplir las reglas se crea el objeto Vendedor
            $vendedor = static::create($input);

            // se retorna un mensaje de éxito al controlador
            $respuesta['mensaje'] = 'Vendedor creado!';
            $respuesta['error']   = false;
            $respuesta['data']    = $vendedor;
        }

        return $respuesta;
    }
}