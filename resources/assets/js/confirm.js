(function () {
    $(".delete-form").on("submit", function () {
        return confirm("Voulez-vous vraiment effectuer cette suppression ?");
    });
})($);
