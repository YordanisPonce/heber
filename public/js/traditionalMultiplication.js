function traditionalMultiplication(figures, cont = '1') {
    let numbers = [];
    let values = [];
    let operation = 0;
    numbers.push(parseInt(number(figures[0]).join("")));
    numbers.push(parseInt(number(figures[1]).join("")));
    numbers.sort((a, b) => {
        return b - a;
    });
    for (let i = 0; i < numbers.length; i++) {
        if (i !== (numbers.length - 1)) {
            $("#operation .operation_" + cont).append(`<p class="text-right">${numbers[i]}</p>`);
        } else {
            $("#operation .operation_" + cont).append(`<p class="text-right" style="border-bottom-style:solid;border-bottom-color:gray;"><span>x</span>${numbers[i]}</p>`);
        }
    }
    let min = numbers[1].toString();
    let spaces = generatedZeros(min);
    for (let i = 0; i < min.length; i++) {
        if (min.length > 1) {
            let figure = (numbers[0] * parseInt(min[i]));
            values.push(figure);
            figure *= spaces;
            operation += figure;
            spaces /= 10;
        } else {
            operation = numbers[0] * numbers[1];
        }
    }
    if (values.length > 1) {
        for (let i = 0; i < values.length; i++) {
            $("#operation .operation_" + cont).append(`<div class="input_group${i}"></div>`);
            for (let j = 0; j < values[i].toString().length; j++) {
                $(`#operation .operation_${cont} .input_group${i}`).append(`<input class="form-control form-control-sm resulset input${j}" ${j === 0 ? `id="input${i}"` : ""}type="text" placeholder="">`);
            }
            $("#operation .operation_" + cont).append(`<br><br>`);
            let m = 20 * i;
            $(`.input_group${i}`).css("marginRight", m + "px");
            if (i === values.length - 1) {
                $("#operation .operation_" + cont).css("borderBottomStyle", "solid").css("borderBottomColor", "gray");
                $("#operation .operation_" + cont).append(`<div class="answer"></div>`);
            }
        }
        for (let i = 0; i < operation.toString().length; i++) {
            $(`#operation .operation_${cont} .answer`).append(`
           <input class="form-control form-control-sm resulset input${i}" type="text" placeholder="" 
           ${operation.toString().length > 11 ? `style="width:5.50%;"` : ""}>`);
        }
    } else {
        $("#operation .operation_" + cont).append(`<div class="answer"></div>`);
        for (let i = 0; i < operation.toString().length; i++) {
            $(`#operation .operation_${cont} .answer`).append(`<input class="form-control form-control-sm resulset input${i}" type="text" placeholder="">`);
        }
    }

    return {

        resulset: operation,
        val: values
    };
}

function generatedZeros(num) {
    let mul = 1;

    for (let i = 0; i < num.length - 1; i++) {
        mul *= 10
    }
    return mul;
}

function checkTraditionalMultiplication(cont = '0') {
    let resulset = [];
    let values = [];
    let min = $(`#operation .operation_${cont}`).find("div").length - 1;
    for (let i = 0; i < min; i++) {
        $(`#operation .operation_${cont} .input_group${i} input`).each(function (index, element) {
            resulset.unshift(element.value != "" ? element.value : 0);
        });
        values.push(parseInt(resulset.join("")));
        resulset = [];
    }
    $(`#operation .operation_${cont} .answer input`).each(function (index, element) {
        resulset.unshift($(this).val() != "" ? $(this).val() : 0);
    });
    let operation = parseInt(resulset.join(""));
    console.log("Valores" + values);
    console.log("REsultado" + operation);
    return {
        resulset: operation,
        val: values
    };
}


//------------Metodo para guardar datos y mostrar preguntas---------------
function nextMultiplication(figures, pages, operation, fn) {
    let counter = 1;
    let results = [];
    let table = "";
    $("#operation").append(`<div class="operation_${counter}"></div>`);
    let s = fn(figures);
    results[counter - 1] = s;
    $("#back").hide();
    let control = false;
    let count = $(`#operation .operation_${counter}`).find("div").length;
    $("#next").click(() => {
        $("#operation .operation_" + counter).css('display', 'none');
        counter++;
        if (counter > 1 && counter <= pages) {
            $("#back").show();
            if ($("#operation .operation_" + counter).length == 0) {
                $("#operation").append(`<div class="operation_${counter}"></div>`);
                s = fn(figures, counter);
                control = false;
                checkAnswers = false;
                results[counter - 1] = s;
            } else {
                $("#operation .operation_" + counter).css('display', 'block');
            }

            if (counter === pages) {
                $("#finish").css("display", "block");
                $("#next").hide();
                $("#finish").click(() => {
                    $("#next").click();
                    let questions = getValues(count, results, pages);
                    localStorage.setItem("Operation", operation);
                    localStorage.setItem("Pages", pages);
                    localStorage.setItem("WrongAnswer", questions.wrongAnswer);
                    localStorage.setItem("CorrectAnswer", questions.correctAnswers);
                    localStorage.setItem("errors", questions.table);
                    location.href = "/finish";
                });
            }
            $("#counter").text(counter);
        }
    });

    $("#back").click(() => {
        control = true;
        //Guardando mis resuestas
        checkAnswers = false;
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


    //listo
    $("#check").click(function () {
        if (results[counter - 1].resulset == checkTraditionalMultiplication(counter).resulset) {
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

function getValues(count, results, pages) {
    let table = ``;
    let correctAnswers = 0;
    let wrongAnswer = 0;
    if (count === 1) {
        for (let i = 1; i <= pages; i++) {
            let r = [];
            $(`#operation .operation_${i} .answer input`).each((index, element) => {
                r.unshift(element.value);
            });
            if (parseInt(r.join("")) === results[i - 1].resulset) {
                correctAnswers++;
            } else {
                wrongAnswer++;
                table += `<tr><td class="text-danger">Pregunta #${i}</td><td class="text-success">${results[i - 1].resulset}</td></tr>`;
            }
            r = [];
        }
    } else {
        for (let i = 1; i <= pages; i++) {
            let myAnswer = results[i - 1];
            if (checkTraditionalMultiplication(i).resulset == myAnswer.resulset) {
                correctAnswers++;
            } else {
                wrongAnswer++;
                table += `<tr><td class="text-danger">Pregunta #${i}</td><td class="text-success">${myAnswer.resulset}</td></tr>`;
            }
        }

    }

    return {
        table: table,
        correctAnswers: correctAnswers,
        wrongAnswer: wrongAnswer
    }

}