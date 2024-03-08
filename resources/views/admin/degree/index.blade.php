@extends('admin.layout')

@section('content')
<div class="card">
    <div class="card-body">
        <div class="row">
            <div class="col-12">
                <a href="{{ url($controller.'/add') }}" class="btn btn-primary">Agregar</a>
                <?php if(session()->has('form_success')){ ?>
                    <div class="alert alert-success alert-lng">
                        <?= session()->get('form_success'); ?>
                    </div>
                <?php } ?>
                @if(count($o_all)>0)
                <table class="table table-responsive table-lng">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Name</th>
                            <th>Imagen</th>
                            <th>Estado</th>
                            <th>Opciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($o_all as $key => $value)
                            <tr>
                                <td>{{ ($key+1) }}</td>
                                <td>{{ $value->name }}</td>
                                <td>
                                    <img src="/storage/{{ $value->photo }}" style="height: 100px; width: 140px;">
                                </td>
                                <td>{{ $value->status }}</td>
                                <td>
                                    <a href="{{ url($controller.'/edit/'.$value->id) }}" class="btn btn-warning btn-sm" data-toggle="tooltip" data-placement="top" title="Editar"> <i class="la la-pencil"></i> </a>
                                    <a href="{{ url($controller.'/delete/'.$value->id) }}" class="btn btn-danger btn-sm" onclick="return confirm('Desea eliminar este {{ $objName }}?')" data-toggle="tooltip" data-placement="top" title="Eliminar"> <i class="la la-trash"></i> </a>
                                    <a href="{{ url($controller.'/change/'.$value->id) }}" class="btn btn-secondary btn-sm" data-toggle="tooltip" data-placement="top" title="<?php echo ($value->status=='active')?'Inactivar':'Activar'; ?>" > <i class="la la-<?php echo ($value->status=='active')?'lock':'unlock'; ?>"></i> </a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                @else
                    <div class="alert alert-danger alert-lng">
                        Lo sentimos, no hay {{ $objNames }} en la plataforma
                    </div>
                @endif
            </div>
        </div>    
    </div>    
</div>    
@endsection