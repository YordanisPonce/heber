function traditionalDivision(figures, cont = '1') {
    let numbers = [];
    numbers.push(parseInt(number(figures[0]).join("")));
    numbers.push(parseInt(number(figures[1]).join("")));
    numbers.sort((a, b) => {
        return b - a;
    });
    let operation = parseInt(numbers[0] / numbers[1]);
    //pintando mi operacion------------
    $("#operation .operation_" + cont).append(` 
    <div id="showOperation"> 
    <div class="float-left" style="width:50%">
    <br><br>
    <p class="text-right" style="padding-right:15px;">
    ${numbers[1]}
    </p>
    </div>
    <div class="float-left" style="width:50%" id="answer">
    <div class="answer  float-left ">
    </div>
    <br><br>
    <p
    style="
    border-bottom-width:min-content;
    border-top-style:solid;
    border-left-style:solid;
    border-top-color:gray;
    border-left-color:gray;
    padding-left:5px;"
    >${numbers[0]}</p>
    <div id="divAnswers"></div> 
    </div>

    </div>`);
    //Resolviendo el calculo
    let bigNumber = numbers[0].toString();
    let values = [];
    let res = ``;
    do {
        let n = ``;
        for (let i = 0; i < bigNumber.length; i++) {
            n += bigNumber[i];
            if (i === 0) {
                if (parseInt(n) >= numbers[1]) {
                    break;
                }
            } else {
                if (parseInt(n) >= numbers[1]) {
                    break;
                }
            }
        }
        let lastNumber = parseInt(n);
        let clNumber = closeNumber(lastNumber, numbers[1]).generatedNumber;
        res += closeNumber(lastNumber, numbers[1]).position;
        let rest = lastNumber - clNumber;
        values.push(clNumber);
        bigNumber = rest.toString() + bigNumber.substring(n.length);
        rest = generatedRest(bigNumber, numbers[1]);
        values.push(rest);
    } while (parseInt(bigNumber) > numbers[1]);

    for (let i = 0; i < operation.toString().length; i++) {
        $(`#operation .operation_${cont} #answer .answer`).append(`
        <input class="form-control form-control-sm  resulset2 input${i}" 
        ${operation.toString().length > 6 ? `style="width:13%;"` : ""}
        type="text" placeholder="">`);

    }
    for (let i = 0; i < values.length; i++) {
        $("#operation .operation_" + cont + " #divAnswers").append(`<div class="input_group${i} float-left"></div>`);
        for (let j = 0; j < values[i].toString().length; j++) {
            $(`#operation .operation_${cont} .input_group${i}`).append(`
            <input class="form-control form-control-sm  resulset2 input${i}" 
            type="text" placeholder="">`);
        }
        $("#operation .operation_" + cont + " #divAnswers").append(`<br>`);
        let l = 10 * i;
        $(`.input_group${i}`).css("marginLeft", l + "px");
    }
    console.log("Valores mios" + values);
    console.log("REsultado mios" + operation);
    return {
        resulset: operation,
        val: values
    }
}


function generatedRest(bigNumber, divisor) {
    let r = [];
    for (let i = 0; i < bigNumber.length; i++) {
        if (r.length < 1) {
            r.push(bigNumber[i]);
        } else {
            if (parseInt(r.join("")) < divisor) {
                r.push(bigNumber[i]);
            } else {
                break;
            }
        }
    }
    return r.join("");

}

function closeNumber(lastNumber, divisor) {
    let generatedNumber = 1;
    let position = 0;
    for (let i = 0; i <= 9; i++) {
        if ((i * divisor) <= lastNumber) {
            generatedNumber = (i * divisor);
            position = i;
        }
    }
    return {
        generatedNumber: generatedNumber,
        position: position
    };


}

function checkTraditionalDivision(cont = '0') {
    let resulset = [];
    let values = [];
    let min = $(`#operation .operation_${cont} #showOperation #divAnswers`).find("div").length;
    for (let i = 0; i < min; i++) {
        $(`#operation .operation_${cont} #showOperation #divAnswers .input_group${i} input`).each(function (index, element) {
            resulset.push(element.value != "" ? element.value : 0);
        });
        values.push(resulset.join(""));
        resulset = [];
    }
    $(`#operation .operation_${cont} #answer .answer input`).each(function (index, element) {
        resulset.push($(this).val() != "" ? $(this).val() : 0);
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
function nextDivision(figures, pages, operation, fn) {
    let counter = 1;
    let results = [];
    $("#operation").append(`<div class="operation_${counter}"></div>`);
    let s = fn(figures);
    results[counter - 1] = s;
    $("#back").hide();
    let count = $(`#operation .operation_${counter}`).find("div").length;
    $("#next").click(() => {
        $("#operation .operation_" + counter).css('display', 'none');
        counter++;
        if (counter > 1 && counter <= pages) {
            $("#back").show();
            if ($("#operation .operation_" + counter).length == 0) {
                $("#operation").append(`<div class="operation_${counter}"></div>`);
                s = fn(figures, counter);
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
                    let questions = getValues2(count, results, pages);
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
        let val = checkTraditionalDivision(counter)
        if (results[counter - 1].resulset == val.resulset) {
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

function getValues2(count, results, pages) {
    let table = ``;
    let correctAnswers = 0;
    let wrongAnswer = 0;
    if (count === 1) {
        for (let i = 1; i <= pages; i++) {
            let userAnswers = checkTraditionalDivision(i);
            if (userAnswers.resulset === results[i - 1].resulset) {
                correctAnswers++;
            } else {
                wrongAnswer++;
                table += `<tr><td class="text-danger">Pregunta #${i}</td><td class="text-success">${results[i - 1].resulset}</td></tr>`;
            }
        }
    } else {
        for (let i = 1; i <= pages; i++) {
            let myAnswer = results[i - 1];
            let userAnswers = checkTraditionalDivision(i);
            if (userAnswers.resulset == myAnswer.resulset) {
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