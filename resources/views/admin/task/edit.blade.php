@extends('admin.layout')

@section('content')
<div class="card">
    <div class="card-body">
        <div class="row">
            <div class="col-12">
                <form method="post" class="row" id="formTask" enctype="multipart/form-data">
                    @method('POST')
                    @csrf
                    <?php if(session()->has('form_errors')){ ?>
                        <div class="alert alert-danger alert-lng">
                            <?php echo session()->get('form_errors') ?>
                        </div>
                    <?php } ?>
                    <div class="form-group col-md-6">
                        <label for="name">Nombre</label>
                        <input type="text" name="name" id="name" class="form-control" placeholder="Nombre" value="{{ old('name', $o->name) }}" required>
                    </div>
                    <div class="form-group col-md-6">
                        <label for="id_degree">Grado</label>
                        <select name="id_degree" id="id_degree" class="form-control">
                            <?php
                                $modelDegree = new \App\Degree();
                                $degrees = $modelDegree->where('status', 'active')->get();
                            ?>
                            @foreach($degrees as $key => $value)
                                <option value="{{ $value->id }}" @if($value->id == old('id_degree', $o->id_degree)) selected @endif >{{ $value->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group col-md-6">
                        <label for="operation">Operaci&oacute;n</label>
                        <select name="operation" id="operation" class="form-control">
                            <option <?php echo (old('operation', $o->operation)=='suma')?'selected':''; ?> value="suma">Suma</option>
                            <option <?php echo (old('operation', $o->operation)=='resta')?'selected':''; ?> value="resta">Resta</option>
                            <option <?php echo (old('operation', $o->operation)=='multiplicacion')?'selected':''; ?> value="multiplicacion">Multiplicaci&oacute;n</option>
                            <option <?php echo (old('operation', $o->operation)=='division')?'selected':''; ?> value="division">Divisi&oacute;n</option>
                            <option <?php echo (old('operation', $o->operation)=='multiplicacionTradicional')?'selected':''; ?> value="multiplicacionTradicional">Multiplicaci&oacute;n Tradicional</option>
                            <option <?php echo (old('operation', $o->operation)=='divisionTradicional')?'selected':''; ?> value="divisionTradicional">Divisi&oacute;n Tradicional</option>
                            <option <?php echo (old('operation', $o->operation)=='variados')?'selected':''; ?> value="variados">Variados</option>
                        </select>
                    </div>
                    <div class="form-group col-md-6">
                        <label for="pages">N&uacute;mero de P&aacute;ginas</label>
                        <input type="number" name="pages" id="pages" class="form-control" placeholder="N&uacute;mero de P&aacute;ginas" value="{{ old('pages', $o->pages) }}" required>
                    </div>
                    <div class="form-group col-md-6">
                        <label for="figure_1">Cifras N&uacute;mero 1</label>
                        <select name="figure_1" id="figure_1" class="form-control">
                            <option value="0" <?php echo (old('figure_1', $o->figure_1)==0)?'selected':''; ?>>0</option>
                            <option value="1" <?php echo (old('figure_1', $o->figure_1)==1)?'selected':''; ?>>1</option>
                            <option value="2" <?php echo (old('figure_1', $o->figure_1)==2)?'selected':''; ?>>2</option>
                            <option value="3" <?php echo (old('figure_1', $o->figure_1)==3)?'selected':''; ?>>3</option>
                            <option value="4" <?php echo (old('figure_1', $o->figure_1)==4)?'selected':''; ?>>4</option>
                            <option value="5" <?php echo (old('figure_1', $o->figure_1)==5)?'selected':''; ?>>5</option>
                            <option value="6" <?php echo (old('figure_1', $o->figure_1)==6)?'selected':''; ?>>6</option>
                            <option value="7" <?php echo (old('figure_1', $o->figure_1)==7)?'selected':''; ?>>7</option>
                            <?php if($o->operation=='multiplicacion'){ ?>
                                <option value="8" <?php echo (old('figure_1', $o->figure_1)==8)?'selected':''; ?>>8</option>
                                <option value="9" <?php echo (old('figure_1', $o->figure_1)==9)?'selected':''; ?>>9</option>
                            <?php } ?>
                        </select>
                    </div>
                    <div class="form-group col-md-6">
                        <label for="figure_2">Cifras N&uacute;mero 2</label>
                        <select name="figure_2" id="figure_2" class="form-control">
                            <option value="0" <?php echo (old('figure_2', $o->figure_2)==0)?'selected':''; ?>>0</option>
                            <option value="1" <?php echo (old('figure_2', $o->figure_2)==1)?'selected':''; ?>>1</option>
                            <option value="2" <?php echo (old('figure_2', $o->figure_2)==2)?'selected':''; ?>>2</option>
                            <option value="3" <?php echo (old('figure_2', $o->figure_2)==3)?'selected':''; ?>>3</option>
                            <option value="4" <?php echo (old('figure_2', $o->figure_2)==4)?'selected':''; ?>>4</option>
                            <option value="5" <?php echo (old('figure_2', $o->figure_2)==5)?'selected':''; ?>>5</option>
                            <option value="6" <?php echo (old('figure_2', $o->figure_2)==6)?'selected':''; ?>>6</option>
                            <option value="7" <?php echo (old('figure_2', $o->figure_2)==7)?'selected':''; ?>>7</option>
                        </select>
                    </div>
                    <div class="form-group col-md-6">
                        <label for="figure_3">Cifras N&uacute;mero 3</label>
                        <select name="figure_3" id="figure_3" class="form-control">
                            <option value="0" <?php echo (old('figure_3', $o->figure_3)==0)?'selected':''; ?>>0</option>
                            <option value="1" <?php echo (old('figure_3', $o->figure_3)==1)?'selected':''; ?>>1</option>
                            <option value="2" <?php echo (old('figure_3', $o->figure_3)==2)?'selected':''; ?>>2</option>
                            <option value="3" <?php echo (old('figure_3', $o->figure_3)==3)?'selected':''; ?>>3</option>
                            <option value="4" <?php echo (old('figure_3', $o->figure_3)==4)?'selected':''; ?>>4</option>
                            <option value="5" <?php echo (old('figure_3', $o->figure_3)==5)?'selected':''; ?>>5</option>
                            <option value="6" <?php echo (old('figure_3', $o->figure_3)==6)?'selected':''; ?>>6</option>
                            <option value="7" <?php echo (old('figure_3', $o->figure_3)==7)?'selected':''; ?>>7</option>
                        </select>
                    </div>
                    <div class="form-group col-md-6">
                        <label for="figure_4">Cifras N&uacute;mero 4</label>
                        <select name="figure_4" id="figure_4" class="form-control">
                            <option value="0" <?php echo (old('figure_4', $o->figure_4)==0)?'selected':''; ?>>0</option>
                            <option value="1" <?php echo (old('figure_4', $o->figure_4)==1)?'selected':''; ?>>1</option>
                            <option value="2" <?php echo (old('figure_4', $o->figure_4)==2)?'selected':''; ?>>2</option>
                            <option value="3" <?php echo (old('figure_4', $o->figure_4)==3)?'selected':''; ?>>3</option>
                            <option value="4" <?php echo (old('figure_4', $o->figure_4)==4)?'selected':''; ?>>4</option>
                            <option value="5" <?php echo (old('figure_4', $o->figure_4)==5)?'selected':''; ?>>5</option>
                            <option value="6" <?php echo (old('figure_4', $o->figure_4)==6)?'selected':''; ?>>6</option>
                            <option value="7" <?php echo (old('figure_4', $o->figure_4)==7)?'selected':''; ?>>7</option>
                        </select>
                    </div>
                    <div class="form-group col-md-6">
                        <label for="description">Descripci&oacute;n</label>
                        <textarea name="description" id="description" class="form-control">{{ old('description', $o->description) }}</textarea>
                    </div>
                    <div class="form-group col-md-6">
                        <label for="photo">Imagen</label>
                        <input type="file" name="photo" id="photo" class="form-control" >
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-warning" >Actualizar</button>
                        <a href="{{ url($controller) }}" class="btn btn-secondary">Cancelar</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
