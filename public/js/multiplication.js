function multiplication(number, pages, cont = '1') {
    let multiplications = numb(pages);
    let values = [];
    for (let i = 0; i < pages; i++) {
        values.push(number * (multiplications[i] + 1));
        let col =
            `
    <div class="form-group row">
    <label for="inputPassword" class="col-sm-12 col-md-2 col-form-label fontType">${number}x${multiplications[i] + 1}=</label>
    <div class="col-sm-12 col-md-3 offset-md-2">
      <input type="text" class="form-control" id="value${i}" style="text-align:center;">
    </div>
    </div>
    `
            ;
        if (i < 5) {
            $("#range1").append(col);
        } else {
            $("#range2").append(col);
        }
    }
    return {
        values: values,
        mul: multiplications
    };
}
function checkMultiplication() {
    let values = [];
    $("#table input").each(function (index, element) {
        values.push($(this).val() !== "" ? parseInt($(this).val()) : 0);
    });

    return values;
}

function arrowsTwo(number, operation, maxNumbers, vals,mul) {
    let values = checkMultiplication();
    let correctAnswer = 0;
    let wrongAnswer = 0;
    let row = ""
    for (let i = 0; i < values.length; i++) {
        if (vals[i] !== values[i]) {
            wrongAnswer++;
            row += `<tr><td class="text-danger">${number}x${mul[i] + 1}</td><td  class="text-success">${number * (mul[i] + 1)}</td></tr>`;
        } else {
            correctAnswer++;
        }

    }
    localStorage.setItem("Operation", operation);
    localStorage.setItem("Pages", maxNumbers);
    localStorage.setItem("WrongAnswer", wrongAnswer);
    localStorage.setItem("CorrectAnswer", correctAnswer);
    localStorage.setItem("errors", row);
    location.href = "/finish";
}

function numb(pages) {
    let numbers = [];

    while (numbers.length < pages) {
        let n = parseInt(Math.random() * 10);
        let exist = false;
        for (let i = 0; i < numbers.length; i++) {
            if (numbers[i] == n) {
                exist = true;
                break;
            }
        }
        if (!exist) {
            numbers.push(n);
        }
    }

    return numbers;
}

