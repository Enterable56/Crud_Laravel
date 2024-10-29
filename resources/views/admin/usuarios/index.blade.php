@extends('layouts.admin')
@section('content')
    <div class="row">
        <h1 class="ml-4">Listado de Ususarios</h1>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="card card-outline card-primary">
                <div class="card-header">
                    <h3 class="card-title">Usuarios Registrados</h3>
                    <div class="card-tools">
                        <a href="{{url('/admin/usuarios/create')}}" class="btn btn-primary"><i class="bi bi-person-add"></i>Registrar Usuario</a>
                    </div>
                </div>
                <div class="card-body">
                    <table class="table table-bordered table-sm table-striped table-hover">
                        <thead>
                        <tr>
                            <th><center>Nro</center></th>
                            <th><center>Nombre</center></th>
                            <th><center>Correo</center></th>
                            <th><center>Acciones</center></th>
                        </tr>
                        </thead>
                        <tbody>
                        @php  $contador = 0; @endphp
                        @foreach($usuarios as $usuarios)
                            @php
                                $contador++;
                                $id = $usuarios->id
                            @endphp

                            <tr>
                                <td style="text-align: center">{{$contador}}</td>
                                <td style="text-align: center">{{$usuarios->name}}</td>
                                <td style="text-align: center">{{$usuarios->email}}</td>
                                <td style="text-align: center">
                                    <div class="btn-group" role="group" aria-label="Basic example">
                                        <a href="{{route('usuarios.show',$usuarios->id)}}" type="button" class="btn btn-info"><i class="bi bi-eye-fill"></i></a>
                                        <a href="{{route('usuarios.edit',$usuarios->id)}}" type="button" class="btn btn-success"><i class="bi bi-pencil"></i></a>
                                        <form action="{{route('usuarios.destroy',$usuarios->id)}}" onclick="preguntar<?=$id;?>(event)" id="miFormulario<?=$id;?>" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger" style="border-radius: 0px 5px 5px 0px"><i class="bi bi-trash"></i></button>
                                        </form>
                                        <script>
                                            function preguntar<?=$id;?>(event){
                                                event.preventDefault();
                                            swal.fire({
                                                title: "Eliminar Registro?",
                                                text: "Estas seguro de quere eliminar este registro ?",
                                                icon: "question",
                                                showCancelButton: true,
                                                confirmButtonText: "Eliminar",
                                                cancelButtonText: "No, Cancelar!",
                                                reverseButtons: true
                                            }).then((result) => {
                                                if (result.isConfirmed) {
                                                    var form = $('#miFormulario<?=$id;?>');
                                                    form.submit();
                                                }
                                            });
                                            }
                                        </script>
                                    </div>
                                </td>
                            </tr>
                        @endforeach

                        </tbody>
                    </table>
                </div>

            </div>

        </div>
    </div>



@endsection
