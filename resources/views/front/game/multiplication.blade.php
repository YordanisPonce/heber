<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Multiplicación</title>
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
            <div class="row" style="margin-top: 15px;" id="table">
                <div class="col-sm-12 col-md-5 offset-md-1 col-lg-4 offset-lg-2" id="range1">

                </div>
                <div class="col-sm-12 col-md-5 offset-md-1 col-lg-4 offset-lg-2" id="range2">

                </div>
            </div>
            <div class="row" style="margin-top: 25px;">
                <div class="col-sm-12 col-md-8 offset-md-1">
                    <button type="button" class="btn btn-secondary btn-sm float-right" data-toggle="modal"
                        data-target="#exampleModal" id="checkMultiplication">
                        Finalizar
                    </button>
                    <br>
                    <hr class="color">
                    <p class="text-center text-footer">Escribe los números que faltan...</p>
                </div>
            </div>
        </div>
        <div class="row justify-content-center" style="margin-top: 30px;">
            <div class="col-auto">
                <a class="btn btn-warning btn-sm button" href="{{ url('game') }}">Crear más
                    operaciones</a>
            </div>
        </div>
    </div>
</body>

</html>
