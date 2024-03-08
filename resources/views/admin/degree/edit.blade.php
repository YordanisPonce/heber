@extends('admin.layout')

@section('content')
<div class="card">
    <div class="card-body">
        <div class="row">
            <div class="col-12">
                <form method="post" class="row" enctype="multipart/form-data">
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