$( document ).ready(function() {
    var counter = 2;
    $("#addTrack").click(function() {
        if (counter < 20) {
            let track = "track" + counter;
            let id = "#" + track;
            let div = "<div id='" + track + "'></div>";
            let input = "<input name='" + track + "'></input>";
            let button = "<button class=\"removeTrack\" id=\"remove" + track + "\" type=\"button\"" +
            ">X</button>";
            $("#tracks").append(div);
            $(id).append(input);
            $(id).append(button);
            counter++;
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
        }
    })
});