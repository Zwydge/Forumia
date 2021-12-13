$( document ).ready(function() {
    $( function() {

        var availableTags = [];

        /*Récupération de la liste des questions*/
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

        $('.checkbox_domains input').change(function () {
            $('.checkbox_domains label').removeClass("label_selected");
            var id = $(this).attr('value');
            if (this.checked) {
                $('.label_' + id).addClass("label_selected");
            }
            else {
                $('.label_' + id).removeClass("label_selected");
            }
        })

        $('#check_question').click(function (e) {
            e.preventDefault();
            var question = $('.search_bar').val();
            console.log(question);
            var checked = $('#ask-form .checkbox_domains').find('input:checked').length;
            if(question.length <= 0) {
                $(".search_bar").notify(
                    "Veuillez écrire une question",
                    {
                        position: "left",
                        className : "error",
                    }
                );
            }
            else if (question.length < 10)
                $(".search_bar").notify(
                    "Votre question est trop courte",
                    {
                        position: "left",
                        className : "error"
                    }
                );
            else if(question.length >= 10){
                if(checked == 0)
                    $(".checkbox_domains").notify(
                        "Veuillez sélectionner un domaine",
                        {
                            position: "left",
                            className : "error"
                        }
                    );
                else{
                    $('#ask-form').submit();
                }
            }
        })

        var Shuffle = window.Shuffle;
        var element = document.querySelector('.actus_list');
        var sizer = element.querySelector('.actus_elem');

        var shuffleInstance = new Shuffle(element, {
            itemSelector: '.actus_elem',
        });

        var cat_arr = [];

        $('.domains_list.domain_css > div').click(function () {
            var text = $(this).text();
            var enable = $(this).attr("enable");
            if(enable == "enable"){
                $(this).attr("enable", "disable");
                cat_arr.splice(cat_arr.indexOf(text), 1);
            }else{
                $(this).attr("enable", "enable");
                cat_arr.push(text);
            }
            console.log(cat_arr);
            shuffleInstance.filter(cat_arr);
        })

    } );
});
