@extends('adminlte::page')

@section('title', 'Dashboard')

@section('plugins.Datatables', true)

@section('content_header')
    @yield("sub_header")
@stop

@section('content')
<br>
<nav style="background: linear-gradient(90deg, #019df4, #f4f6f9);padding: 1rem;" class="navbar navbar-danger">
    <div clas="container">
        <h3 class="text-light font-weight-bold">Solicitudes</h3>
    </div>
</nav>
<br>
<div class="row">
    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
        <div class="card">
            <div style="padding:2rem!important;">
                <table id="table-id" class="table">
                    <thead style="background-color:#019df4;color:white;">
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Nombre</th>
                            <th scope="col">Email</th>
                            <th scope="col">Asunto</th>
                            <th scope="col">Mensaje</th>
                            <th scope="col">Fecha</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if(!empty($pedidos))
                            @foreach($pedidos as $row)
                                <tr class="row-{{ $row->id }}">
                                    <td>{{ $row->id  }}</td>
                                    <td>{{ $row->nombre }}</td>
                                    <td>{{ $row->email }}</td>
                                    <td>{{ $row->asunto }}</td>
                                    <td>{{ $row->mensaje }}</td>
                                    <td>{{ $row->fecha_solicitud }}</td>
                                </tr>
                            @endforeach
                        @else
                            <tr>
                                <td colspan="6">
                                    <h4 class="text-center">No hay Solicitudes aún.</h4>
                                </td>
                            </tr>
                        @endif
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@stop

@section('css')
    <script src="https://kit.fontawesome.com/97f87ec59b.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"/>
@stop

@section('js')
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        $(document).ready(function() 
        {
            $('#table-id').DataTable();
        });
    </script>
@stop

