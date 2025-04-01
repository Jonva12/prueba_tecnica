@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Mensajes') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    @if ($mensaje['valor'] && $mensaje['valor'] == true)
                    	<div class="alert alert-success" role="alert">
                            {{ $mensaje['texto'] }}
                        </div>
                    @else
                    	<div class="alert alert-danger" role="alert">
                            {{ $mensaje['texto'] }}
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection