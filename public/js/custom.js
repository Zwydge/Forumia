$( document ).ready(function() {
    $( function() {

        var availableTags = [];

        /* Récupération de la liste des questions */
        $.ajax({
            url : '/api/questions_get',
            type : 'GET',
            dataType:'json',
            success : function(data) {
                $(data.questions).each(function(index, value) {
                    availableTags.push(value["content"]);
                });
            },
            error : function(request,error)
            {
                console.log("Récupération des questions impossible")
            }
        });

        $( ".search_bar" ).autocomplete({
            source: availableTags
        });

    });
});
