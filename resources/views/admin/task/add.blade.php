@extends('admin.layout')

@section('content')
<div class="card">
    <div class="card-body">
        <div class="row">
            <div class="col-12">
                <form method="post" class="row" id="formTask" enctype="multipart/form-data">
                    @method('post')
                    @csrf
                    <?php if(session()->has('form_errors')){ ?>
                        <div class="alert alert-danger alert-lng">
                            <?php echo session()->get('form_errors') ?>
                        </div>
                    <?php } ?>
                    <div class="form-group col-md-6">
                        <label for="name">Nombre</label>
                        <input type="text" name="name" id="name" class="form-control" placeholder="Nombre" value="{{ old('name') }}" required>
                    </div>
                    <div class="form-group col-md-6">
                        <label for="id_degree">Grado</label>
                        <select name="id_degree" id="id_degree" class="form-control">
                            <?php
                                $modelDegree = new \App\Degree();
                                $degrees = $modelDegree->where('status', 'active')->get();
                            ?>
                            @foreach($degrees as $key => $value)
                                <option value="{{ $value->id }}" @if($value->id == old('id_degree')) selected @endif >{{ $value->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group col-md-6">
                        <label for="operation">Operaci&oacute;n</label>
                        <select name="operation" id="operation" class="form-control">
                            <option value="suma">Suma</option>
                            <option value="resta">Resta</option>
                            <option value="multiplicacion">Multiplicaci&oacute;n</option>
                            <option value="division">Divisi&oacute;n</option>
                            <option value="multiplicacionTradicional">Multiplicaci&oacute;n Tradicional</option>
                            <option value="divisionTradicional">Divisi&oacute;n Tradicional</option>
                            <option value="variados">Variados</option>
                        </select>
                    </div>
                    <div class="form-group col-md-6">
                        <label for="pages">N&uacute;mero de P&aacute;ginas</label>
                        <input type="number" name="pages" id="pages" class="form-control" placeholder="N&uacute;mero de P&aacute;ginas" value="{{ old('pages') }}" required>
                    </div>
                    <div class="form-group col-md-6">
                        <label for="figure_1">Cifras N&uacute;mero 1</label>
                        <select name="figure_1" id="figure_1" class="form-control">
                            <option value="0">0</option>
                            <option value="1">1</option>
                            <option value="2">2</option>
                            <option value="3">3</option>
                            <option value="4">4</option>
                            <option value="5">5</option>
                            <option value="6">6</option>
                            <option value="7">7</option>
                        </select>
                    </div>
                    <div class="form-group col-md-6">
                        <label for="figure_2">Cifras N&uacute;mero 2</label>
                        <select name="figure_2" id="figure_2" class="form-control">
                            <option value="0">0</option>
                            <option value="1">1</option>
                            <option value="2">2</option>
                            <option value="3">3</option>
                            <option value="4">4</option>
                            <option value="5">5</option>
                            <option value="6">6</option>
                            <option value="7">7</option>
                        </select>
                    </div>
                    <div class="form-group col-md-6">
                        <label for="figure_3">Cifras N&uacute;mero 3</label>
                        <select name="figure_3" id="figure_3" class="form-control">
                            <option value="0">0</option>
                            <option value="1">1</option>
                            <option value="2">2</option>
                            <option value="3">3</option>
                            <option value="4">4</option>
                            <option value="5">5</option>
                            <option value="6">6</option>
                            <option value="7">7</option>
                        </select>
                    </div>
                    <div class="form-group col-md-6">
                        <label for="figure_4">Cifras N&uacute;mero 4</label>
                        <select name="figure_4" id="figure_4" class="form-control">
                            <option value="0">0</option>
                            <option value="1">1</option>
                            <option value="2">2</option>
                            <option value="3">3</option>
                            <option value="4">4</option>
                            <option value="5">5</option>
                            <option value="6">6</option>
                            <option value="7">7</option>
                        </select>
                    </div>
                    <div class="form-group col-md-6">
                        <label for="description">Descripci&oacute;n</label>
                        <textarea name="description" id="description" class="form-control">{{ old('description') }}</textarea>
                    </div>
                    <div class="form-group col-md-6">
                        <label for="photo">Imagen</label>
                        <input type="file" name="photo" id="photo" class="form-control" >
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-primary" >Agregar</button>
                        <a href="{{ url($controller) }}" class="btn btn-secondary">Cancelar</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
