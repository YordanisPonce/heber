function finish() {
    let correctAnswer = localStorage.getItem("CorrectAnswer")
    let wrongAnswer = localStorage.getItem("WrongAnswer");
    let operation = localStorage.getItem("Operation");
    let pages = localStorage.getItem("Pages");
    $("#correct").text(`Correctas: ${correctAnswer}`);
    $("#wrong").text(`Incorrectas: ${wrongAnswer}`);
    $("#errors").append(localStorage.getItem("errors"));
    if (wrongAnswer != 0) {
        $("#btns").append(`
        <button type="button" class="btn btn-warning btn-sm" data-toggle="modal"
        data-target="#exampleModal">
        Mirar los errores
        </button>`);
        $("#message").text("Que pena, no has conseguido el diploma");
        $("#img").prepend(`<img src="/imgs/incorrecta.png" width="100" height="100"
        class="rounded mx-auto d-block">`);
    } else {
        $("#message").text("Felicidades, has conseguido el diploma");
        $("#img").prepend(`<img src="/imgs/correcta.png" width="100" height="100"
        class="rounded mx-auto d-block">`);
    }
    $("#operation").val(operation);
    $("#pages").val(pages);
    $("#correctAnswer").val(correctAnswer);
    $("#wrongAnswer").val(wrongAnswer);
    $("#form").submit(function (e) {
        let data = $("#form").serialize();
        $.ajax({
            type: "post",
            url: "/saveData",
            data: data,
            dataType: "json",
            success: function (response) {
            }
        });
        return false;
    });
    $("#form").submit();

}
