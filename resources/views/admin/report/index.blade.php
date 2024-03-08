@extends('admin.layout')

@section('content')
    <div class="card">
        <div class="card-header">
            <h2>Filtrar</h2>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-12">
                <form method="post" class="row" enctype="multipart/form-data" id="report">
                        @method('post')
                        @csrf
                        <?php if(session()->has('form_errors')){ ?>
                            <div class="alert alert-danger alert-lng">
                                <?php echo session()->get('form_errors') ?>
                            </div>
                        <?php } ?>
                        <?php $modelResult = new \App\Result(); ?>
                        <div class="form-group col-sm-4">
                            <label for="id_task">Tareas</label>
                            <select name="id_task" id="id_task" class="form-control">
                                <option value=""> - Seleccionar - </option>
                                <?php 
                                    $results = $modelResult->where('status', 'active')->get(); 
                                    $modelTask = new \App\Task();
                                    $ids_task = [];
                                ?>
                                @foreach($results as $key => $value)
                                    <?php 
                                        if(!empty($value->id_task) && !in_array($value->id_task, $ids_task)){
                                            $ids_task[] = $value->id_task;
                                            $task = $modelTask->find($value->id_task); 
                                    ?>
                                    <option value="{{ $task->id }}">{{ $task->name }}</option>
                                    <?php } ?>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group col-sm-4">
                            <label for="id_user">Usuario</label>
                            <select name="id_user" id="id_user" class="form-control">
                            <option value=""> - Seleccionar - </option>
                                <?php 
                                    $modelUser = new \App\User(); 
                                    $ids_user = [];
                                ?>
                                @foreach($results as $key => $value)
                                    <?php 
                                        if(!in_array($value->id_user, $ids_user)){
                                            $ids_user[] = $value->id_user;
                                            $user = $modelUser->find($value->id_user); 
                                    ?>
                                    <option value="{{ $user->id }}">{{ $user->name }}</option>
                                    <?php } ?>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group col-sm-4">
                            <label for="id_degree">Grado</label>
                            <select name="id_degree" id="id_degree" class="form-control">
                            <option value=""> - Seleccionar - </option>
                                <?php 
                                    $modelDegree = new \App\Degree(); 
                                    $degrees = $modelDegree->where('status', 'active')->get();
                                ?>
                                @foreach($degrees as $key => $value)
                                    <option value="{{ $value->id }}">{{ $value->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-success" > <i class="la la-search"></i> Buscar</button>
                            <a href="{{ url($controller) }}" class="btn btn-secondary">Cancelar</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <div class="card">
        <div class="card-header">
            <h2>Resultados</h2>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-12">
                    <?php if(session()->has('form_success')){ ?>
                        <div class="alert alert-success alert-lng">
                            <?= session()->get('form_success'); ?>
                        </div>
                    <?php } ?>
                    @if(count($o_all)>0)
                    <button class="btn btn-success" id="btn-export">Exportar PDF</button>
                    <table class="table table-responsive table-lng" id="table-export">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Usuario</th>
                                <th>Tarea</th>
                                <th>Grado</th>
                                <th>Operaci&oacute;n</th>
                                <th>Intentos</th>
                                <th>Correctas</th>
                                <th>Incorrectas</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $modelTask = new \App\Task(); ?>
                            <?php 
                                $modelUser = new \App\User(); 
                                $modelDegree = new \App\Degree(); 
                            ?>
                            @foreach ($o_all as $key => $value)
                            <?php 
                                $task = null;
                                if(!empty($value->id_task)){
                                    $task = $modelTask->find($value->id_task); 
                                }
                                $user = $modelUser->find($value->id_user);
                                $degree = $modelDegree->find($user->id_degree);
                            ?>
                                <tr>
                                    <td>{{ ($key+1) }}</td>
                                    <td>{{ $user->name }}</td>
                                    <td><?php echo (!empty($task))?$task->name:'No Tiene'; ?></td>
                                    <td><?php echo (!empty($degree->name))?$degree->name:'No Tiene'; ?></td>
                                    <td>{{ $value->operation }}</td>
                                    <td>{{ $value->pages }}</td>
                                    <td>{{ $value->correctAnswer }}</td>
                                    <td>{{ $value->wrongAnswer }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    @else
                        <div class="alert alert-danger alert-lng">
                            Lo sentimos, no hay resultados en la plataforma
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div> 
@endsection