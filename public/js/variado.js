function randomOperation(figures, cont = '1') {
    let numbers = [];
    let o = oRannrom();
    let operation = 0;
    numbers.push(parseInt(number(figures[0]).join("")));
    numbers.push(parseInt(number(figures[1]).join("")));
    numbers.sort((a, b) => {
        return b - a;
    });
    if (o != "/") {
        numbers.sort((a, b) => {
            return b - a;
        });
        if (o == "+") {
            operation = numbers[1] + numbers[0];
        } else if (o == "-") {
            operation = numbers[0] - numbers[1];
        } else if (o == "*") {
            operation = numbers[0] * numbers[1];
        }
    } else {
        let obj = generateDivisionn(numbers[0], numbers[1]);
        numbers[0] = obj.generatedNumber1;
        numbers[1] = obj.generatedNumber2;
        operation = obj.response;
    }

    $("#operation .operation_" + cont).append(`<p class="float-left" style="font-size: 20px;">${numbers[0]} ${o} ${numbers[1]} = </p>`);
    $("#operation .operation_" + cont).append(`
     <input class="form-control
     float-left forDragg" type="text" 
    style="margin-left:15px;"
    placeholder="" id="resp"><br><br><br>`);

    $("#resp").attr("name", operation);
    let res = parseInt(Math.random() * 4);
    let v = ramdomNumber(operation);
    let counter = 0;
    for (let i = 0; i < 4; i++) {
        if (i == res) {
            $("#operation .operation_" + cont).append(`<p class="float-left drag" style="${i == 0 ? "font-size: 20px;" : "margin-left:15px;font-size: 20px;"}">${operation}</p>`);
        } else {
            $("#operation .operation_" + cont).append(`<p class="float-left drag" style="${i == 0 ? "font-size: 20px;" : "margin-left:15px;font-size: 20px;"}">${v[counter++]}</p>`);
        }

    }
    if (v[0].toString().length > 6 && v[0].toString().length < 8) {
        $(".forDragg").css("fontSize", "14px");
    } else if (v[0].toString().length >= 8) {
        $(".forDragg").css("fontSize", "10px");
    }
    $(".drag").draggable({
        appeandTo: "body"
    });
    $(".forDragg").droppable({
        activeClass: "bg-warning",
        hoverClass: "",
        drop: function (e, ui) {
            let text = ui.draggable.text();
            $(this).val(text);
            $(this).attr("disabled", "true").css("backgroundColor", "aqua");
            ui.draggable.hide();
        }
    });
    return operation;
}

function oRannrom() {
    let operations = ["+", "-", "*", "/"];
    return operations[parseInt(Math.random() * 4)];
}

function generateDivisionn(n, m) {
    let generatedNumber1 = 0;
    let generatedNumber2 = 0;
    let response = 1;
    do {
        generatedNumber1 = (n > 10 && m > 10) ? Math.floor(Math.random() * (n - m + 1)) + m : parseInt(Math.random() * 9) + 1;
        generatedNumber2 = (n > 10 && m > 10) ? Math.floor(Math.random() * (n - m + 1)) + m : parseInt(Math.random() * 9) + 1;
        response = generatedNumber1 / generatedNumber2;
    } while (generatedNumber1 % generatedNumber2 != 0);

    return {
        generatedNumber1: generatedNumber1,
        generatedNumber2: generatedNumber2,
        response: response
    }

}
function testV(cont = '1') {
    let resulset = $(`#operation .operation_${cont} .forDragg`).val();
    return parseInt(resulset);
}
//------------Metodo para guardar datos y mostrar preguntas---------------
function arrowsD(figures, pages, operation, fn) {
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
                    let question = getVal(pages, results);
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
        if (results[counter - 1] == testV(counter)) {
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


function getVal(pages, results) {
    let wrongAnswer = 0;
    let correctAnswer = 0;
    let table = "";
    for (let i = 1; i <= pages; i++) {
        if (results[i - 1] == testV(i)) {
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