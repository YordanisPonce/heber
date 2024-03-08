function division(n, pages, pages2, operation, errors, c, w, counter) {
    let correctAnswer = c;
    let wrongAnswer = w;
    let row = errors;
    $("#counter").text(counter < pages2 ? counter : pages2);
    if (pages < 1) {
        localStorage.setItem("Operation", operation);
        localStorage.setItem("Pages", pages2);
        localStorage.setItem("WrongAnswer", wrongAnswer);
        localStorage.setItem("CorrectAnswer", correctAnswer);
        localStorage.setItem("errors", row);
        $("#finish").click();
        $("#goFinish").click(() => {
            location.href = "/finish";
        });
        $("#exampleModal").on("hidden.bs.modal", () => {
            $("#finish").click();
        });
    } else {
        let resp = generateResp(n);
        let response = resp.response;
        $("#table").html(
            ` 
            <div class="row justify-content-center text-center custom" >
            <div class="col-12 col-md-6  bg-primary text-white" id="question">
                ${resp.generatedNumber}/${resp.randomNumber}
            </div>
        </div>
        <div class="row justify-content-center text-center custom">
            <div class="col-12 col-md-3 bg-warning text-white customCol" id="response1">
                
            </div>
            <div class="col-12 col-md-3 bg-warning text-white customCol" id="response2">
                
            </div>
        </div>
        <div class="row justify-content-center text-center custom">
            <div class="col-12 col-md-3 bg-warning text-white customCol" id="response3">
                
            </div>
            <div class="col-12 col-md-3 bg-warning text-white customCol" id="response4">
                
            </div>
        </div>
        `
        );
        let position = parseInt((Math.random() * 4) + 1);
        $(`#response${position}`).text(response);
        $(`#response${position}`).click(() => {
            pages--;
            c++;
            division(n, pages, pages2, operation, errors, c, w, ++counter);
        });
        let numbers = ramdomNumber(response);
        let cont = 0;
        for (let i = 1; i <= 4; i++) {
            if (i !== position) {
                $(`#response${i}`).text(numbers[cont]);
                cont++;
                $(`#response${i}`).click(() => {
                    pages--;
                    w++;
                    errors += `<tr><td class="text-danger">${resp.generatedNumber}/${resp.randomNumber}</td><td  class="text-success">${response}</td></tr>`
                    division(n, pages, pages2, operation, errors, c, w, ++counter);
                });
            }

        }

    }
}

function generateResp(n) {
    let generatedNumber = 0;
    let randomNumber = 0;
    let response = 1;
    do {
        generatedNumber = parseInt(number(n).join(""));
        randomNumber = parseInt((Math.random() * 9) + 1);
        response = (generatedNumber / randomNumber);
    } while (generatedNumber % randomNumber != 0);

    return {
        generatedNumber: generatedNumber,
        randomNumber: randomNumber,
        response: response
    }

}

function ramdomNumber(response) {
    let numbers = [];
    while (numbers.length < 3) {
        let n = response > 10 ? parseInt(Math.random() * response) : parseInt(Math.random() * 10);
        let exist = false;
        for (let i = 0; i < numbers.length; i++) {
            if (numbers[i] == n) {
                exist = true;
                break;
            }
        }
        if (!exist && response != n) {
            numbers.push(n);
        }
    }
    return numbers;
}