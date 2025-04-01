@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Listado de usuarios') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <div class="card-body">
                    	<div class="container text-center">
  							<table class="table-responsive">
  								<thead>
    								<tr>
      									<th scope="col">ID</th>
      									<th scope="col">Nombre</th>
      									<th scope="col">Email</th>
      									<th scope="col">DNI</th>
      									<th scope="col">Fecha Nacimiento</th>
      									<th scope="col">Rol</th>
      									<th scope="col">Acciones</th>
    								</tr>
  								</thead>
  								<tbody class="table-group-divider">
  									@foreach ($usuarios as $usuario)
    								<tr> 
      									<th scope="row">{{$usuario->id}}</th>
      									<td>{{$usuario->nombre}}</td>
      									<td>{{$usuario->email}}</td>
      									<td>{{$usuario->dni}}</td>
      									<td>{{$usuario->fecha_nacimiento}}</td>
      									<td>{{$usuario->rol->nombre}}</td>
      									<td class="d-grid gap-3 d-md-block"><button type="button" class="btn btn-primary"><a>Editar</button>
      									<button type="button" class="btn btn-danger">Eliminar</button></td>
    								</tr>
    								@endforeach
  								</tbody>
							</table>
						</div>
                    </div>
                </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection