$(document).ready(function() {
    $("#profileImage").click(function(e) {
        e.stopPropagation();
        $("#profileDropdown").slideToggle();
    });

    $(document).click(function() {
        $("#profileDropdown").slideUp();
    });

    $("#profileDropdown").click(function(e) {
        e.stopPropagation();
    });
});