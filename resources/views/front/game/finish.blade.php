<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Finalizar Ejercicio</title>
    <link rel="stylesheet" href="{{ asset('css/bootstrap.css') }}">
    <style>
        .row {
            margin-top: 30px;
        }

    </style>
</head>

<body class="bg-primary text-white">


    <div class="container" style="margin-top: 70px">
        <h1 class="text-center">Ya has terminado</h1>
        <div class="row">
            <div class="col-sm-12 col-md-6 offset-1" style="font-size: 20px">
                <p>
                    Resultado de las preguntas
                </p>
                <p id="correct">
                    Correctas:
                </p>
                <p id="wrong">
                    Incorrectas:
                </p>
            </div>
            <div class="col-sm-12 col-md-5" id="img">

                <p id="message" class="text-center" style="margin-top: 25px;"></p>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-12 col-md-6">
                <div id="btns">
                    <a class="btn btn-secondary btn-sm" href="{{ url('/') }}" role="button">Volver al Inicio</a>
                    <a class="btn btn-success btn-sm" href="{{ url('/game') }}" role="button">Volver a Prácticar</a>
                    <!-- Button trigger modal -->

                </div>
                <!-- Modal -->
                <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog"
                    aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-body">
                                <table class="table text-center" id="errors">
                                    <tr>
                                        <th scope="col">Intento Fallido</th>
                                        <th scope="col">Respuesta Correcta</th>
                                    </tr>
                                </table>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary btn-sm"
                                    data-dismiss="modal">Cerrar</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-12 col-md-6">
                <form action="/saveData" method="post" id="form">
                    @csrf
                    <input type="hidden" name="operation" id="operation">
                    <input type="hidden" name="pages" id="pages">
                    <input type="hidden" name="correctAnswer" id="correctAnswer">
                    <input type="hidden" name="wrongAnswer" id="wrongAnswer">
                    <?php if(session()->has('id_task')){ ?>
                        <input type="hidden" name="id_task" id="idTask" value="{{ session()->get('id_task') }}">
                    <?php } ?>
                </form>
            </div>
        </div>
    </div>
    <script src="{{ asset('js/jquery-3.5.1.js') }}"></script>
    <script src="{{ asset('js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('js/popper.min.js') }}"></script>
    <script src="{{ asset('js/finish.js') }}"></script>
    <script>
        $(document).ready(function() {
            finish();
        });

    </script>
</body>

</html>
