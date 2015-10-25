@extends('plantilla')
@section('contenido')
    <div class="row marketing">
        <h3>Crear Producto</h3>
        {{ Form::open(array('url' => 'producto')) }}
        @if (Session::get('mensaje') )
            <div class="alert alert-success">{{Session::get('mensaje')}}</div>
        @endif
        <div class="form-group">
            {{Form::label('descripcion', 'Descripcion')}}
            {{Form::text('descripcion', Input::old('descripcion'), array('class'=>'form-control', 'placeholder'=>'descripcion del producto', 'autocomplete'=>'off'))}}
        </div>
        @if( $errors->has('descripcion') )
            <div class="alert alert-danger">
                @foreach($errors->get('descripcion') as $error )
                    * {{ $error }}<br>
                @endforeach
            </div>
        @endif
        <div class="form-group">
            {{Form::label('precio', 'Precio')}}
            {{Form::text('precio', Input::old('precio'), array('class'=>'form-control', 'placeholder'=>'precio del producto', 'autocomplete'=>'off'))}}
        </div>
        @if( $errors->has('precio') )
            <div class="alert alert-danger">
                @foreach($errors->get('precio') as $error )
                    * {{ $error }}<br>
                @endforeach
            </div>
        @endif
        <div class="form-group"><!-- Creamos un select para escoger cual vendedor es dueño del producto -->
            {{Form::label('vendedor_id', 'Vendedor')}}
            <select class="form-control" name="vendedor_id">
                @foreach($vendedores as $vendedor)
                    <option value="{{$vendedor->id}}">{{$vendedor->nombre.' '.$vendedor->apellido}}</option>
                @endforeach
            </select>
        </div>
        @if( $errors->has('vendedor_id') )
            <div class="alert alert-danger">
                @foreach($errors->get('vendedor_id') as $error )
                    * {{ $error }}<br>
                @endforeach
            </div>
        @endif
        {{Form::submit('Guardar', array('class'=>'btn btn-success'))}}
        {{Form::reset('Resetear', array('class'=>'btn btn-default'))}}
        {{ Form::close() }}
    </div>
    <h3>Productos</h3>
    <div class="list-group">
        @foreach($productos as $producto)
            <a href="#" class="list-group-item">{{$producto->descripcion.' '.$producto->precio}}</a>
        @endforeach
    </div>
@stop