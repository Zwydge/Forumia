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

    // GENERATE USER

    $('.create-user').click(function () {
        $.ajax({
            url: 'https://api.openai.com/v1/completions',
            type: 'POST',
            headers: {
                'Authorization': 'Bearer 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',
                'Content-Type': 'application/json'
            },
            data: JSON.stringify({
                'model': 'text-davinci-002',
                'prompt': 'Génère un pseudo pour un forum. Rien d\'autre',
                'max_tokens': 15
            }),
            success: function (response) {
                var answer = response.choices[0].text;
                var tab = answer.split("\n\n");
                var pseudo = tab[1];

                var email = "" + pseudo.replace(' ', '').toLowerCase() + "@email.com";

                var password = "" + 1 + Math.floor(Math.random() * 100) + pseudo;
                console.log(pseudo);
                console.log(email);
                console.log(password);

                $.ajax({
                    url: '/create_user',
                    type: 'POST',
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    data: {
                        pseudo: pseudo,
                        email: email,
                        password: password
                    },
                    dataType: 'json',
                    success: function (data) {
                        console.log(response);
                        $.notify("Nouvel utilisateur créé: "+pseudo, "success");
                    },
                    error: function (request, error) {
                        console.log(error.message);
                        console.log("Impossible de mettre à jour les données")
                    }
                });

            }
        });
    })

    // GENERATE QUESTION

    $('.create-question').click(function () {

        // get domains

        $.ajax({
            url: '/domains_js', type: 'GET', dataType: 'json',
            success: function (data) {
                var domains = data;
                var max = data.length + 1;
                var rndInt = (Math.floor(Math.random() * max) + 1) - 1;
                console.log("Max: " + rndInt);
                domain_selected = domains[rndInt];

                // get user

                $.ajax({
                    url: '/users_js', type: 'GET', dataType: 'json',
                    success: function (data) {
                        var users = data;
                        var max = data.length;
                        var rndInt = (Math.floor(Math.random() * max) + 1) - 1;
                        console.log("Max: " + rndInt);
                        user_selected = users[rndInt];

                        console.log(domain_selected);
                        console.log(user_selected);

                        // get api

                        $.ajax({
                            url: 'https://api.openai.com/v1/completions',
                            type: 'POST',
                            headers: {
                                'Authorization': 'Bearer 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',
                                'Content-Type': 'application/json'
                            },
                            data: JSON.stringify({
                                'model': 'text-davinci-002',
                                'prompt': 'Invente une question que l\'utilisateur fictif "' + user_selected.name + '" pourrait poser concernant le sujet "' + domain_selected.label + '". Ecris uniquement sa question sans guillemets et en français.',
                                'max_tokens': 500
                            }),
                            success: function (response) {
                                console.log(response);
                                var answer = response.choices[0].text;
                                var tab = answer.split("\n\n");
                                var question = tab[1];

                                // create question

                                $.ajax({
                                    url: '/create_question',
                                    type: 'POST',
                                    headers: {
                                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                                    },
                                    data: {
                                        content: question,
                                        domain_id: domain_selected.id,
                                        user_id: user_selected.id
                                    },
                                    dataType: 'json',
                                    success: function (data) {
                                        console.log(response);
                                        $.notify("Nouvelle question créée", "success");
                                    }
                                });
                            }
                        });
                    }
                });
            }
        });

    })

    // GENERATE ANSWER



    $('.create-answer').click(function () {

        // get questions
        $.ajax({
            url: '/questions_js', type: 'GET', dataType: 'json',
            success: function (data) {
                var questions = data;
                var max = data.length + 1;
                var rndInt = (Math.floor(Math.random() * max) + 1) - 1;
                console.log("Max: " + rndInt);
                questions_selected = questions[rndInt];

                // get user

                $.ajax({
                    url: '/users_js', type: 'GET', dataType: 'json',
                    success: function (data) {
                        var users = data;
                        var max = data.length;
                        var rndInt = (Math.floor(Math.random() * max) + 1) - 1;
                        console.log("Max: " + rndInt);
                        user_selected = users[rndInt];

                        console.log(questions_selected);
                        console.log(user_selected);

                        // get api
                        $.ajax({
                            url: 'https://api.openai.com/v1/completions',
                            type: 'POST',
                            headers: {
                                'Authorization': 'Bearer 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',
                                'Content-Type': 'application/json'
                            },
                            data: JSON.stringify({
                                'model': 'text-davinci-002',
                                'prompt': 'Invente une courte réponse de l\'utilisateur "' + user_selected.name + '" à l\'utilisateur fictif "' + questions_selected.name + '" concernant sa question "' + questions_selected.content + '". N\'écris que sa réponse sans guillemets. L\'utilisateur doit saluer l\'autre. En français. Sans guillemets.',
                                'max_tokens': 500
                            }),
                            success: function (response) {
                                console.log(response);
                                var answer = response.choices[0].text;
                                // var tab = answer.split("\n\n");
                                // var answer = tab[1];

                                // create answer

                                $.ajax({
                                    url: '/create_answer_js',
                                    type: 'POST',
                                    headers: {
                                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                                    },
                                    data: {
                                        content: answer,
                                        question_id: questions_selected.id,
                                        user_id: user_selected.id
                                    },
                                    dataType: 'json',
                                    success: function (data) {
                                        console.log(response);
                                        $.notify("Nouvelle réponse créée", "success");
                                    }
                                });
                            }
                        });

                    }
                });
            }
        });
    })

});
