<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>División</title>
    <link rel="stylesheet" href="{{ asset('css/bootstrap.css') }}">
    <link rel="stylesheet" href="{{ asset('css/custom.css') }}">
</head>

<body>
    {{-- div para suma y resta --}}
    <div id="game">
        <div class="container multiplication">
            <div class="row ">
                <div class="col-sm-12 text-center">
                    <h1>Resuelve...</h1>
                </div>
            </div>
            <div id="table" style="margin-top:25px;">

            </div>
            <div class="row" style="margin-top: 35px;">
                <div class="col-12">
                    <p class="text-center lead" id="counter"></p>
                </div>
            </div>
            <div class="row" style="margin-top: 5px;">
                <div class="col-sm-8 offset-sm-2">
                    {{-- tiene que estar oculto --}}
                    {{-- <button type="button" class="btn btn-secondary btn-sm float-right" data-toggle="modal"
                        data-target="#exampleModal" id="checkMultiplication">
                        Finalizar
                    </button> --}}
                    <br>
                    <hr class="color">
                    <p class="text-center text-footer">Elija el número correcto...</p>
                </div>
            </div>
        </div>
        <div class="row justify-content-center" style="margin-top: 30px;">
            <div class="col-auto">
                <a class="btn btn-warning btn-sm button" href="{{ url('game') }}">Crear más
                    operaciones</a>
            </div>
        </div>
        <!-- modal -->

        <div class="row">
            <div class="col-sm-12">
                <!-- Button trigger modal -->
                <button type="button" style="display: none;" class="btn btn-primary btn-sm" data-toggle="modal"
                    data-target="#exampleModal" id="finish">

                </button>

                <!-- Modal -->
                <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog"
                    aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-body">
                                <img src="/imgs/correcta.png" width="100" height="100" class="rounded mx-auto d-block">
                                <br>
                                <p class="text-center">Felicidades, has conluido el cuestionario</p>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-primary btn-sm" id="goFinish">Finalizar y
                                    enviar</button>
                            </div>
                        </div>
                    </div>
                </div>


            </div>
        </div>
    </div>
</body>

</html>
