<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Suma</title>
    <link rel="stylesheet" href="{{ asset('css/bootstrap.css') }}">
    <link rel="stylesheet" href="{{ asset('css/custom.css') }}">
</head>

<body>
    {{-- div para suma y resta --}}
    <div id="game">
        <div class="container" id="exercises">
            <div class="row">
                <div class="col-sm-12 col-lg-12 text-center">
                    <h1>Resuelve...</h1>
                </div>
            </div>
            <div class="row">
                <div class="col-auto col-lg-5 offset-lg-1" id="operation">

                </div>
                <div class="col-auto col-lg-1 offset-lg-5 " id="btns">
                    <p id="counter" class="text-dark text-center">1</p>
                    <button type="button" class="btn btn-secondary btn-sm" id="back" style="margin: 2px;">
                        <<< </button>
                            <button type="button" class="btn btn-secondary btn-sm" id="next"
                                style="margin: 2px;">>>></button>
                            <button type="button" class="btn btn-secondary btn-sm" id="finish"
                                style="margin: 2px;display: none;">Finalizar</button>
                </div>
            </div>
            <div class="row" style="margin-top: 25px;">
                <div class="col-sm-12 col-md-8 offset-1">
                    <button type="button" class="btn btn-secondary btn-sm float-right" data-toggle="modal"
                        data-target="#exampleModal" id="check">
                        Comprobar
                    </button>
                    <!-- Modal -->
                    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog"
                        aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">

                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Resultado</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body" id="text_modal">

                                </div>
                            </div>
                        </div>
                    </div>
                    <br>
                    <hr>
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
