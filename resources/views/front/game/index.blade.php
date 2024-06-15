@extends('front.layout')
@section('css')
    <link rel="stylesheet" href="{{ asset('css/bootstrap.css') }}">
    <link rel="stylesheet" href="{{ asset('css/custom.css') }}">
@endsection

@section('content')
    <div class="containter-fluid" id="container" style="margin-top: 70px;">
        <div class="row" id="operations" <?php echo session()->has('id_task') ? 'style="display:none;"' : ''; ?>>
            <div class="container">
                <div class="row">
                    <div class="col-sm-12 col-md-3">
                        <h3>Operación:</h3>
                    </div>
                    <div class="col-sm-12 col-md-4">
                        <select class="form-control" id="operationSelected">
                            <option id="sum" value="suma" <?php if (session()->has('id_task')) {
                                echo $o->operation == 'suma' ? 'selected' : '';
                            } ?>>Suma</option>
                            <option id="substraction" value="resta" <?php if (session()->has('id_task')) {
                                echo $o->operation == 'resta' ? 'selected' : '';
                            } ?>>Resta</option>
                            <option id="multiplication" value="multiplicacion" <?php if (session()->has('id_task')) {
                                echo $o->operation == 'multiplicacion' ? 'selected' : '';
                            } ?>>Multiplicación</option>
                            <option id="division" value="division" <?php if (session()->has('id_task')) {
                                echo $o->operation == 'division' ? 'selected' : '';
                            } ?>>División</option>
                            <option id="traditionalMultiplicacion" value="multiplicacionTradicional" <?php if (session()->has('id_task')) {
                                echo $o->operation == 'multiplicacionTradicional' ? 'selected' : '';
                            } ?>>
                                Multiplicación Tradicional</option>
                            <option id="traditionalDivision" value="divisionTradicional" <?php if (session()->has('id_task')) {
                                echo $o->operation == 'divisionTradicional' ? 'selected' : '';
                            } ?>>División
                                Tradicional</option>
                            <option id="variados" value="variados" <?php if (session()->has('id_task')) {
                                echo $o->operation == 'variados' ? 'selected' : '';
                            } ?>>Variados</option>
                        </select>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-12 col-md-3">
                        <h3 id="noPag">No de páginas:</h3>
                    </div>
                    <div class="col-sm-12 col-md-4">
                        <div class="form-group">
                            <input type="number" class="form-control" placeholder="Número de páginas"
                                value="<?php if (session()->has('id_task')) {
                                    echo $o->pages;
                                } ?>" id="pages" min="1" max="10" required>
                            <small id="alertPages" class="form-text text-danger"></small>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-12 col-md-3">
                        <h3 id="noFig">No de cifras:</h3>
                    </div>
                    <div class="col-sm-12 col-md-9 pl-0">
                        <div class="container" id="figures">
                            <div class="row">
                                <div class="col-3 pl-0">
                                    <select class="form-control" id="number1">
                                        <option <?php if (session()->has('id_task')) {
                                            echo $o->figure_1 == '0' ? 'selected' : '';
                                        } ?> value="0">0</option>
                                        <option <?php if (session()->has('id_task')) {
                                            echo $o->figure_1 == '1' ? 'selected' : '';
                                        } ?> value="1">1</option>
                                        <option <?php if (session()->has('id_task')) {
                                            echo $o->figure_1 == '2' ? 'selected' : '';
                                        } ?> value="2">2</option>
                                        <option <?php if (session()->has('id_task')) {
                                            echo $o->figure_1 == '3' ? 'selected' : '';
                                        } ?> value="3">3</option>
                                        <option <?php if (session()->has('id_task')) {
                                            echo $o->figure_1 == '4' ? 'selected' : '';
                                        } ?> value="4">4</option>
                                        <option <?php if (session()->has('id_task')) {
                                            echo $o->figure_1 == '5' ? 'selected' : '';
                                        } ?> value="5">5</option>
                                        <option <?php if (session()->has('id_task')) {
                                            echo $o->figure_1 == '6' ? 'selected' : '';
                                        } ?> value="6">6</option>
                                        <option <?php if (session()->has('id_task')) {
                                            echo $o->figure_1 == '7' ? 'selected' : '';
                                        } ?> value="7">7</option>
                                        <?php if (session()->has('id_task')) { ?>
                                        <?php if ($o->operation == 'multiplicacion') { ?>
                                        <option <?php if (session()->has('id_task')) {
                                            echo $o->figure_1 == '8' ? 'selected' : '';
                                        } ?> value="8">8</option>
                                        <option <?php if (session()->has('id_task')) {
                                            echo $o->figure_1 == '9' ? 'selected' : '';
                                        } ?> value="9">9</option>
                                        <?php } ?>
                                        <?php } ?>
                                    </select>
                                </div>
                                <div class="col-3 pl-0">
                                    <select class="form-control" id="number2">
                                        <option <?php if (session()->has('id_task')) {
                                            echo $o->figure_2 == '0' ? 'selected' : '';
                                        } ?> value="0">0</option>
                                        <option <?php if (session()->has('id_task')) {
                                            echo $o->figure_2 == '1' ? 'selected' : '';
                                        } ?> value="1">1</option>
                                        <option <?php if (session()->has('id_task')) {
                                            echo $o->figure_2 == '2' ? 'selected' : '';
                                        } ?> value="2">2</option>
                                        <option <?php if (session()->has('id_task')) {
                                            echo $o->figure_2 == '3' ? 'selected' : '';
                                        } ?> value="3">3</option>
                                        <option <?php if (session()->has('id_task')) {
                                            echo $o->figure_2 == '4' ? 'selected' : '';
                                        } ?> value="4">4</option>
                                        <option <?php if (session()->has('id_task')) {
                                            echo $o->figure_2 == '5' ? 'selected' : '';
                                        } ?> value="5">5</option>
                                        <option <?php if (session()->has('id_task')) {
                                            echo $o->figure_2 == '6' ? 'selected' : '';
                                        } ?> value="6">6</option>
                                        <option <?php if (session()->has('id_task')) {
                                            echo $o->figure_2 == '7' ? 'selected' : '';
                                        } ?> value="7">7</option>
                                    </select>

                                </div>
                                <div class="col-3 pl-0">
                                    <select class="form-control" id="number3">
                                        <option <?php if (session()->has('id_task')) {
                                            echo $o->figure_3 == '0' ? 'selected' : '';
                                        } ?> value="0">0</option>
                                        <option <?php if (session()->has('id_task')) {
                                            echo $o->figure_3 == '1' ? 'selected' : '';
                                        } ?> value="1">1</option>
                                        <option <?php if (session()->has('id_task')) {
                                            echo $o->figure_3 == '2' ? 'selected' : '';
                                        } ?> value="2">2</option>
                                        <option <?php if (session()->has('id_task')) {
                                            echo $o->figure_3 == '3' ? 'selected' : '';
                                        } ?> value="3">3</option>
                                        <option <?php if (session()->has('id_task')) {
                                            echo $o->figure_3 == '4' ? 'selected' : '';
                                        } ?> value="4">4</option>
                                        <option <?php if (session()->has('id_task')) {
                                            echo $o->figure_3 == '5' ? 'selected' : '';
                                        } ?> value="5">5</option>
                                        <option <?php if (session()->has('id_task')) {
                                            echo $o->figure_3 == '6' ? 'selected' : '';
                                        } ?> value="6">6</option>
                                        <option <?php if (session()->has('id_task')) {
                                            echo $o->figure_3 == '7' ? 'selected' : '';
                                        } ?> value="7">7</option>
                                    </select>
                                </div>
                                <div class="col-3 pl-0">
                                    <select class="form-control" id="number4">
                                        <option <?php if (session()->has('id_task')) {
                                            echo $o->figure_4 == '0' ? 'selected' : '';
                                        } ?> value="0">0</option>
                                        <option <?php if (session()->has('id_task')) {
                                            echo $o->figure_4 == '1' ? 'selected' : '';
                                        } ?> value="1">1</option>
                                        <option <?php if (session()->has('id_task')) {
                                            echo $o->figure_4 == '2' ? 'selected' : '';
                                        } ?> value="2">2</option>
                                        <option <?php if (session()->has('id_task')) {
                                            echo $o->figure_4 == '3' ? 'selected' : '';
                                        } ?> value="3">3</option>
                                        <option <?php if (session()->has('id_task')) {
                                            echo $o->figure_4 == '4' ? 'selected' : '';
                                        } ?> value="4">4</option>
                                        <option <?php if (session()->has('id_task')) {
                                            echo $o->figure_4 == '5' ? 'selected' : '';
                                        } ?> value="5">5</option>
                                        <option <?php if (session()->has('id_task')) {
                                            echo $o->figure_4 == '6' ? 'selected' : '';
                                        } ?> value="6">6</option>
                                        <option <?php if (session()->has('id_task')) {
                                            echo $o->figure_4 == '7' ? 'selected' : '';
                                        } ?> value="7">7</option>
                                    </select>
                                </div>
                                <div class="col-12">
                                    <small id="alertFigures" class="form-text text-danger">.</small>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row justify-content-center" style="margin-top: 30px;">
            <div class="col-auto ">
                <button type="button" class="btn btn-lg btn-warning button"
                    style="width: 250px; background-color: rgb(32, 7, 105);" id="create">Iniciar</button>
            </div>
        </div>
    </div>
@endsection



@push('js')
    <script src="{{ asset('js/jquery-3.5.1.js') }}"></script>
    <script src="{{ asset('js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('js/popper.min.js') }}"></script>
    <script src="{{ asset('js/jquery-ui.js') }}"></script>
    <script src="{{ asset('js/game.js') }}"></script>
    <script src="{{ asset('js/validate.js') }}"></script>
    <script src="{{ asset('js/substraction.js') }}"></script>
    <script src="{{ asset('js/multiplication.js') }}"></script>
    <script src="{{ asset('js/division.js') }}"></script>
    <script src="{{ asset('js/traditionalMultiplication.js') }}"></script>
    <script src="{{ asset('js/traditionalDivision.js') }}"></script>
    <script src="{{ asset('js/variado.js') }}"></script>
    <script>
        $(document).ready(function() {
            //-------------------Validacion-------------------------------------
            validate();
            if ($('#operationSelected').val() == 'resta') {
                $('#number3').attr('disabled', true);
                $('#number4').attr('disabled', true);
            } else if ($('#operationSelected').val() == 'multiplicacion') {
                $('#number2').attr('disabled', true);
                $('#number3').attr('disabled', true);
                $('#number4').attr('disabled', true);
            } else if ($('#operationSelected').val() == 'division') {
                $('#number2').attr('disabled', true);
                $('#number3').attr('disabled', true);
                $('#number4').attr('disabled', true);
            } else if ($('#operationSelected').val() == 'divisionTradicional') {
                $('#number3').attr('disabled', true);
                $('#number4').attr('disabled', true);
            } else if ($('#operationSelected').val() == 'multiplicacionTradicional') {
                $('#number3').attr('disabled', true);
                $('#number4').attr('disabled', true);
            }
            //-------------------Juego-------------------------------------
            game();

        });
    </script>
@endpush
