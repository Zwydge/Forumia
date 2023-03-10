$(document).ready(function () {
    $(function () {

        var availableTags = [];

        /* Récupération de la liste des questions */
        $.ajax({
            url: '/api/questions_get',
            type: 'GET',
            dataType: 'json',
            success: function (data) {
                $(data.questions).each(function (index, value) {
                    availableTags.push(value["content"]);
                });
            },
            error: function (request, error) {
                console.log("Récupération des questions impossible")
            }
        });

        $(".search_bar").autocomplete({
            source: availableTags
        });
        $(".search_bar").on('input', function () {
            var question = $('.search_bar').val();
            if (question.length < 50) {
                $(".search_bar").css("fontSize", "30px");
            }
            else if (question.length > 50 && question.length < 75) {
                $(".search_bar").css("fontSize", "20px");
            }
            else if (question.length > 75 && question.length < 90) {
                $(".search_bar").css("fontSize", "15px");
            }
            else if (question.length > 90) {

            }
        });

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
        if (question.length <= 0) {
            $(".search_bar").notify(
                "Veuillez écrire une question",
                {
                    position: "left",
                    className: "error",
                }
            );
        }
        else if (question.length < 10)
            $(".search_bar").notify(
                "Votre question est trop courte",
                {
                    position: "left",
                    className: "error"
                }
            );
        else if (question.length >= 10) {
            if (checked == 0)
                $(".checkbox_domains").notify(
                    "Veuillez sélectionner un domaine",
                    {
                        position: "left",
                        className: "error"
                    }
                );
            else {
                $('#ask-form').submit();
            }
        }
    })

    if ($(".actus_elem").length > 0) {
        var Shuffle = window.Shuffle;
        var element = document.querySelector('.actus_list');

        var shuffleInstance = new Shuffle(element, {
            itemSelector: '.actus_elem',
        });
    }

    var cat_arr = [];

    $('.domains_list.domain_css > div').click(function () {
        var text = $(this).text();
        var enable = $(this).attr("enable");
        if (enable == "enable") {
            $(this).attr("enable", "disable");
            cat_arr.splice(cat_arr.indexOf(text), 1);
        } else {
            $(this).attr("enable", "enable");
            cat_arr.push(text);
        }
        console.log(cat_arr);
        shuffleInstance.filter(cat_arr);
    })

    /* SEARCH */

    $(".container_search_bar .search_bar").on("keyup change", function (e) {
        var word = $(".container_search_bar .search_bar").val().toLowerCase();
        console.log(word);

        shuffleInstance.filter((element, shuffle) => {
            const titleElement = element.querySelector('.right_question_ask .question');
            const titleText = titleElement.textContent.toLowerCase().trim();

            return titleText.indexOf(word) !== -1;
        });
    })

    //SCROLLING Event
    /*$(window).scroll(function() {
        var scrollTop = $(window).scrollTop();
        if ( scrollTop >  65) {
            $('.navbar').addClass("scrolled-nav");
        }
        else {
            $('.navbar').removeClass("scrolled-nav");
        }
    });*/

    var getUrlParameter = function getUrlParameter(sParam) {
        var sPageURL = window.location.search.substring(1),
            sURLVariables = sPageURL.split('&'),
            sParameterName,
            i;

        for (i = 0; i < sURLVariables.length; i++) {
            sParameterName = sURLVariables[i].split('=');

            if (sParameterName[0] === sParam) {
                return sParameterName[1] === undefined ? true : decodeURIComponent(sParameterName[1]);
            }
        }
        return false;
    };

    var domain = getUrlParameter('domain');
    if (domain) {
        $("[domain-id=" + domain + "]").attr("enable", "enable");
        cat_arr.push(domain);
        shuffleInstance.filter(cat_arr);
    }

    $('.vote-answer img').click(function () {
        var answer_id = $(this).parent().attr("answer-id");
        console.log(answer_id);
        $(this).parent().addClass("none-event");
        $.ajax({
            url: '/upvote_add',
            type: 'POST',
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            data: {
                id: answer_id,
            },
            dataType: 'json',
            success: function (data) {
                console.log(data);
                location.reload();
            },
            error: function (request, error) {
                console.log(error.message);
                console.log("Impossible de mettre à jour les données")
            }
        });
    })

    //DELETE QUESTION
    $('.link-to-delete').click(function () {
        var question_id = $(this).attr("question_id");
        $.ajax({
            url: '/delete_quest',
            type: 'DELETE',
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            data: {
                id: question_id,
            },
            dataType: 'json',
            success: function (data) {
                window.location.href = "/";
            },
            error: function (request, error) {
                console.log(error.message);
                console.log("Impossible de mettre à jour les données")
            }
        });
    })

});
