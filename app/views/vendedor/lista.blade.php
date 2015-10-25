@extends('plantilla')
@section('contenido')
    <div class="row marketing">
        <h3>Crear Vendedor</h3>

        {{ Form::open(array('url' => 'vendedor')) }}
        <!-- El mensaje que se envía por el redirect en el controlador lo podemos obtener
        con la función get de la clase Session -->
        @if (Session::get('mensaje') )
            <!-- Si hay un mensaje, entonces lo imprimimos y le damos estilo con bootstrap -->
            <div class="alert alert-success">{{Session::get('mensaje')}}</div>
        @endif
        <div class="form-group">
            {{Form::label('nombre', 'Nombre')}}
            {{Form::text('nombre', Input::old('nombre'), array('class'=>'form-control', 'placeholder'=>'nombre vendedor', 'autocomplete'=>'off'))}}
        </div>
        <!-- Verificamos si hubo algún error en el campo -->
        @if( $errors->has('nombre') )
            <!-- En caso de que haya un error, entonces los imprimos y utilizamos algún estilo de bootstrap -->
            <div class="alert alert-danger">
                @foreach($errors->get('nombre') as $error )
                    * {{ $error }}<br>
                @endforeach
            </div>
        @endif
        <div class="form-group">
            {{Form::label('apellido', 'Apellido')}}
            {{Form::text('apellido', Input::old('apellido'), array('class'=>'form-control', 'placeholder'=>'apellido vendedor', 'autocomplete'=>'off'))}}
        </div>
        @if( $errors->has('apellido') )
            <div class="alert alert-danger">
                @foreach($errors->get('apellido') as $error )
                    * {{ $error }}<br>
                @endforeach
            </div>
        @endif
        {{Form::submit('Guardar', array('class'=>'btn btn-success'))}}
        {{Form::reset('Resetear', array('class'=>'btn btn-default'))}}

        {{ Form::close() }}
    </div>
    <h3>Vendedores</h3>
    <div class="list-group">
        @foreach($vendedores as $vendedor)
            <a href="#" class="list-group-item">{{$vendedor->nombre.' '.$vendedor->apellido}}</a>
        @endforeach
    </div>
@stop