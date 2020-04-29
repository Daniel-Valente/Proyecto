@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Nuevas Ordenes</div>
                <div class="card-body">
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    @isset($orden)
                        {!! Form::model($orden, ['route' => ['orden.update', $orden->id], 'method' => 'PATCH']) !!}
                    @else
                        {!! Form::open(['route' => 'orden.store']) !!}
                    @endisset ()
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="categoria">Categoria</label>
                            {!! Form::select('categoria_id', $categorias ,null, ['class' => 'forn-control']) !!}
                        </div>
                        @if('categoria_id' == '6')
                        <div class="form-group col-md-6">
                            <label for="paquete">Paquete</label>
                            {!! Form::select('paquete_id', $paquetes ,null, ['class' => 'forn-control']) !!}
                        </div>
                        @endif
                    </div>
                    <div class="form-group">
                        <div class="form-group col-md-6">
                            <label for="fecha_Cita">Fecha Cita</label>
                            {!! Form::date('fecha_Cita', isset($orden) ? $orden->fecha_Cita->toDateString() : null, ['class' => 'form-control'])!!}
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="descripcion">Descripción</label>
                        {!! Form::textarea('descripcion', null, ['class' => 'form-control', 'row' => '3']) !!}
                    </div>
                    <button type="submit" class="btn btn-primary">Confirmar</button>
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
