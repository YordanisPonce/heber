//--------------Cargando el juego----------------------------
function game() {
    $("#create").click(function (e) {

        let operation = $("#operationSelected").val();
        let pages = parseInt($("#pages").val() != "" ? $("#pages").val() : 0);
        let figures = [];
        //------------Rescatando cifras, páginas y operacion-------------
        $("#figures select").each(function (index, element) {
            if (operation == "suma" || operation == "resta" || operation === "multiplicacionTradicional" || operation === "divisionTradicional") {
                if (element.value != 0) {
                    figures.push(element.value);
                }
            } else {
                figures.push(element.value);
            }

        });
        if (pages < 1 || figures.length < 2 || figures[0] == 0) {
            if (pages <= 1) {
                $("#alertPages").text("El número debe ser mayor que 1");

            } else {
                $("#alertPages").text("");
            }

            if (operation === "suma" || operation === "resta" || operation === "multiplicacionTradicional" || operation === "divisionTradicional") {
                if (figures.length < 2) {
                    $("#alertFigures").text("Debe seleccionar al menos 2 números");
                }
            } else if (operation === "multiplicacion" || operation === "division") {
                if (figures[0] == 0) {
                    $("#alertFigures").text("El número seleccionado debe ser mayor que 0 ");
                }
            }

        } else if (pages > 10) {
            $("#alertPages").text("El número debe ser menor que 10");
        }
        else {
            $("#alertPages").text("");
            $("#alertFigures").text("");
            $("#container, #tittle").fadeOut(300);
            setTimeout(() => {
                if (operation === "suma" || operation === "resta") {
                    $("#container").load("/content #game", () => {
                        if (operation === "suma") {
                            arrows(figures, pages, operation, sum);
                        } else if (operation === "resta") {
                            arrows(figures, pages, operation, substraction);
                        }
                    }).hide().fadeIn(1000);
                } else {
                    if (operation === "multiplicacion") {
                        $("#container").load("/content2 #game", () => {
                            let number = parseInt(figures[0]);
                            let obj = multiplication(number, pages);
                            $("#checkMultiplication").click(() => {
                                arrowsTwo(number, operation, pages, obj.values, obj.mul);
                            });
                        }).hide().fadeIn(1000);
                    } else if (operation === "division") {
                        $("#container").load("/content3 #game", () => {
                            let number = parseInt(figures[0]);
                            division(number, pages, pages, operation, "", 0, 0, 1);
                        }).hide().fadeIn(1000);
                    } else if (operation === "multiplicacionTradicional") {
                        $("#container").load("/content4 #game", () => {
                            nextMultiplication(figures, pages, operation, traditionalMultiplication);
                        }).hide().fadeIn(1000);
                    } else if (operation === "divisionTradicional") {
                        $("#container").load("/content5 #game", () => {
                            nextDivision(figures, pages, operation, traditionalDivision);
                        }).hide().fadeIn(1000);
                    }else if(operation === "variados"){
                        $("#container").load("/content6 #game", () => {
                            arrowsD(figures, pages, operation, randomOperation);
                          /*   nextDivision(figures, pages, operation, traditionalDivision); */
                        }).hide().fadeIn(1000);
                    }

                }
                $("#tittle").remove();
            }, 500);

            //---------------Cargando contenido del juego-----------------

        }
    });
    //--------------------------------------------------------

}
//--------------metodo para pintar y retornar la suma------------
function sum(figures, cont = '1') {
    let operation = 0;
    for (let i = 0; i < figures.length; i++) {
        let element = number(figures[i]);
        operation += parseInt(element.join(""));
        if (i !== (figures.length - 1)) {
            $("#operation .operation_" + cont).append(`<p class="text-right">${element.join(" ")}</p>`);
        } else {
            $("#operation .operation_" + cont).append(`<p class="text-right" style="border-bottom-style:solid;border-bottom-color:gray;"><span>+</span>${element.join(" ")}</p>`);
        }
    }
    for (let i = 0; i < operation.toString().length; i++) {
        $("#operation .operation_" + cont).append(`<input class="form-control form-control-sm resulset input${i}" type="text" placeholder="">`);
    }
    return operation;
}
//------------Metodo para generar numeros aleatorios de n cifras--
function number(n) {
    let s = [];
    for (let i = 0; i < n; i++) {
        s.push(Math.ceil(Math.random() * 9));
    }
    return (s.length !== 0) ? s : 0;
}
//------------Comprobar el resultado(aún con errores)--------------
function test(cont = '1') {
    let resulset = [];
    for (let i = 0; i < operation.toString().length; i++) {
        resulset.unshift($(`#operation .operation_${cont} .input${i}`).val());
    }
    return parseInt(resulset.join(""));
}
//------------Metodo para guardar datos y mostrar preguntas---------------
function arrows(figures, pages, operation, fn) {
    let counter = 1;
    let results = [];
    $("#operation").append(`<div class="operation_${counter}"></div>`);
    let s = fn(figures);
    results[counter - 1] = s;
    $("#back").hide();
    $("#next").click(() => {
        $("#operation .operation_" + counter).css('display', 'none');
        counter++;

        if (counter > 1 && counter <= pages) {
            $("#back").show();
            if ($("#operation .operation_" + counter).length == 0) {
                $("#operation").append(`<div class="operation_${counter}"></div>`);
                s = fn(figures, counter);
                results[counter - 1] = s;
            } else {
                $("#operation .operation_" + counter).css('display', 'block');
            }

            if (counter === pages) {
                $("#finish").css("display", "block");
                $("#next").hide();
                $("#finish").click(() => {
                    $("#next").click();
                    let question = getV(pages, results);
                    localStorage.setItem("Operation", operation);
                    localStorage.setItem("Pages", pages);
                    localStorage.setItem("WrongAnswer", question.wrongAnswer);
                    localStorage.setItem("CorrectAnswer", question.correctAnswer);
                    localStorage.setItem("errors", question.table);
                    location.href = "/finish";
                });
            }
            $("#counter").text(counter);

        }


    });
    $("#back").click(() => {
        $("#operation .operation_" + counter).css('display', 'none');
        $("#finish").css("display", "none");
        counter--;
        if (counter < pages) {
            $("#operation .operation_" + counter).css('display', 'block');
            $("#next").show();
            if (counter === 1) {
                $("#back").hide();
            }
        }
        $("#counter").text(counter);
    });

    $("#check").click(function () {
        if (results[counter - 1] == test(counter)) {
            $("#text_modal").html(
                `
            <img src="/imgs/correcta.png" width="100" height="100"
            class="rounded mx-auto d-block">
            <br>
            <p class="text-center" >Bingo!! Te felicito</p>
            `);
        } else {
            $("#text_modal").html(
                `
                <img src="/imgs/incorrecta.png" width="100" height="100"
                class="rounded mx-auto d-block">
                <br>
                <p class="text-center" >Ñooo!!! has fallado, vuelve a intentarlo</p>
                `);
        }
    });
}


function getV(pages, results) {
    let wrongAnswer = 0;
    let correctAnswer = 0;
    let table = "";
    for (let i = 1; i <= pages; i++) {
        if (results[i - 1] == test(i)) {
            correctAnswer++;
        } else {
            wrongAnswer++;
            table += `<tr><td class="text-danger">Pregunta #${i}</td><td class="text-success">${results[i - 1]}</td></tr>`;
        }

    }
    return {
        wrongAnswer: wrongAnswer,
        correctAnswer: correctAnswer,
        table: table
    }
}