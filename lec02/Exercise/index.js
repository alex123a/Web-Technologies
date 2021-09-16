$( document ).ready(function() {
    var counter = 1;
    var notFilled = false;

    $("#addTrack").click(function() {
        if (counter < 20) {
            counter++;
            let track = "track" + counter;
            let id = "#" + track;
            let div = "<div id='" + track + "'></div>";
            let input = "<input name='" + track + "'></input>";
            let button = "<button class=\"removeTrack\" id=\"remove" + track + "\" type=\"button\"" +
            ">X</button>";
            $("#tracks").append(div);
            $(id).append(input);
            $(id).append(button);
        }

        if (counter == 20) {
            $("#addTrack").prop("disabled", true);
        }
    })

    $("#tracks").on("click", "button", function() {
        if (counter > 1) {
            let butId = this.id;
            let parentId = $(this).parent().attr("id");
            console.log(parentId);
            // $("#" + butId).remove();
            $("#" + parentId).remove();
            counter--;
            $("#addTrack").prop("disabled", false);
        }
    })

    $("form").on("submit", function() {
        notFilled = false;
        resetSpans();
        if (!($("#nameID").first().val().length > 0)) {
            $("#nameSpan").text("Please enter your name!").show();
            notFilled = true;
        }

        if (!($("#releaseID").first().val() >= 1800 & $("#releaseID").first().val() <= 2021)) {
            $("#releaseSpan").text("Please enter valid release year!").show();
            notFilled = true;
        }

        if (notFilled) {
            event.preventDefault();
        }
    })

    function resetSpans() {
        $("#nameSpan").text("").show();
        $("#releaseSpan").text("").show();
    }
});