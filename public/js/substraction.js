function substraction(figures, cont = '1') {
    let numbers = [];
    numbers.push(parseInt(number(figures[0]).join("")));
    numbers.push(parseInt(number(figures[1]).join("")));
    numbers.sort((a, b) => {
        return b - a;
    });
    for (let i = 0; i < numbers.length; i++) {
        if (i !== (numbers.length - 1)) {
            $("#operation .operation_" + cont).append(`<p class="text-right">${numbers[i]}</p>`);
        } else {
            $("#operation .operation_" + cont).append(`<p class="text-right" style="border-bottom-style:solid;border-bottom-color:gray;"><span>-</span>${numbers[i]}</p>`);
        }
    }
    let operation = numbers[0] - numbers[1];

    for (let i = 0; i < operation.toString().length; i++) {
        $("#operation .operation_" + cont).append(`<input class="form-control form-control-sm resulset input${i}" type="text" placeholder="">`);
    }
    return operation;
}