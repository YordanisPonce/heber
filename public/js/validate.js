function validate() {
    $("#operationSelected").change(function (e) {
        e.preventDefault();
        if ($(this).val() !== "multiplication") {
            $(".optional").remove();
        }
        if ($(this).val() !== "suma") {
            if ($(this).val() === "resta" || $(this).val() === "multiplicacionTradicional" || $(this).val() === "divisionTradicional" ||  $(this).val() === "variados") {
                $("#number2").attr("disabled", false);
                $("#number3").attr("disabled", true);
                $("#number4").attr("disabled", true);
                $("#noPag").text("No de páginas:");
                $("#noFig").text("No de cifras:");
            } else if ($(this).val() === "multiplicacion" || $(this).val() === "division") {
                if ($(this).val() === "multiplicacion") {
                    $("#number1").append(`  <option value="8" class="optional">8</option>  <option value="9" class="optional">9</option>`);
                    $("#noFig").text("Eligir número");
                }else{
                    $("#noFig").text("No de cifras:");
                }
                $("#number2").attr("disabled", true);
                $("#number3").attr("disabled", true);
                $("#number4").attr("disabled", true);
                $("#noPag").text("No de páginas:");
                $("#noPag").text("No de cálculos");
                $("#alertFigures").text("");
            }
        } else {
            $("#figures select").each(function (index, element) {
                $(this).attr("disabled", false);
            });
            $("#noFig").text("No de cifras:");
            $("#noPag").text("No de páginas:");
        }

    });
}
