@extends('front.layout')

@section('content')
    <div class="row pt-5 mt-5 px-5">
        <div class="col-12">
            @if(count($o_all)>0)
            <table class="table table-responsive table-lng">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Nombre</th>
                        <th>Grado</th>
                        <th>Descripci&oacute;n</th>
                        <th>Imagen</th>
                        <th>Opciones</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $modelDegree = new \App\Degree(); ?>
                    @foreach ($o_all as $key => $value)
                        <?php $degree = $modelDegree->find($value->id_degree); ?>
                        <tr>
                            <td>{{ ($key+1) }}</td>
                            <td>{{ $value->name }}</td>
                            <td>{{ $degree->name }}</td>
                            <td>{{ $value->description }}</td>
                            <td>
                                <img src="/storage/{{ $value->photo }}" style="height: 80px; width: 140px;">
                            </td>
                            <td>
                                <a href="{{ url('game/'.$value->id) }}" class="btn btn-primary btn-sm" data-toggle="tooltip" data-placement="top" title="Realizar"> Realizar </a>
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
@endsection