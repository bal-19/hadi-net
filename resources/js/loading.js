import $ from "jquery";

// loading effect
$(document).ready(function () {
    $(window).on("beforeunload", function () {
        $("#loading").removeClass("hidden");
    });

    // when submit form
    $("form").on("submit", function () {
        $("#loading").removeClass("hidden");
    });

    // when a element clicked
    $("a").on("click", function (event) {
        if (
            $(this).attr("target") !== "_blank" &&
            $(this).attr("href") !== "#"
        ) {
            $("#loading").removeClass("hidden");
        }
    });

    // when ajax request running
    $(document)
        .ajaxStart(function () {
            $("#loading").removeClass("hidden");
        })
        .ajaxStop(function () {
            $("#loading").addClass("hidden");
        });

    // when page loaded
    $(window).on("load", function () {
        $("#loading").addClass("hidden");
    });
});
