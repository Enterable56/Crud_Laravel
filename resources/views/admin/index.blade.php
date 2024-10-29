@extends('layouts.admin')
@section('content')
    <div class="row">
        <h1>Principal</h1>
    </div>
    <hr>
    <div class="row">
        <div class="col-lg-4 col-6">
            <!-- small card -->
            <div class="small-box bg-warning">
                <div class="inner">
                    @php $contador_de_usuarios =0;@endphp
                    @foreach($usuarios as $usuario)
                        @php $contador_de_usuarios++; @endphp
                    @endforeach
                    <h3>{{$contador_de_usuarios}}</h3>

                    <p>Usuarios Registrados</p>
                </div>
                <div class="icon">
                    <i class="fas fa-user-plus"></i>
                </div>
                <a href="{{url('/admin/usuarios')}}" class="small-box-footer">
                    Mas Informacion <i class="fas fa-arrow-circle-right"></i>
                </a>
            </div>
        </div>
    </div>
@endsection
