$( document ).ready(function() {
    $( function() {
        var availableTags = [
            "Comment exemple 1",
            "Comment exemple 2",
            "Comment exemple 3",
            "Comment exemple 4",
            "Comment exemple 5",
            "Comment exemple 6",
            "Comment exemple 7"
        ];
        $( ".search_bar" ).autocomplete({
            source: availableTags
        });
    } );
});
