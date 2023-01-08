$(document).ready(function () {

    function requestOpenAi(model, prompt, token) {

        var defObject = $.Deferred();

        let apikey = $('#api-key').val();

        console.log(apikey);

        if (apikey && apikey != "") {
            $.ajax({
                url: 'https://api.openai.com/v1/completions',
                type: 'POST',
                headers: {
                    'Authorization': 'Bearer ' + apikey,
                    'Content-Type': 'application/json'
                },
                data: JSON.stringify({
                    'model': model,
                    'prompt': prompt,
                    'max_tokens': token
                }),
                success: function (response) {
                    defObject.resolve(response.choices[0].text);
                },
                error: function(xhr, status, error) {
                    var err = eval("(" + xhr.responseText + ")");
                    $.notify(err.error.message, "error");
                  }
            });

            return defObject.promise();

        }
        else {
            $.notify("Veuillez renseigner une clée API", "infos");
        }
    }

    // GENERATE USER

    $('.create-user').click(function () {

        let answer = requestOpenAi('text-davinci-002', 'Génère un pseudo pour un forum. Rien d\'autre', 15);

        $.when(answer).done(function (response) {
            let tab = response.split("\n\n");
            let pseudo = tab[1];

            let email = "" + pseudo.replace(' ', '').toLowerCase() + "@email.com";

            let password = "" + 1 + Math.floor(Math.random() * 100) + pseudo;

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
                    $.notify("Nouvel utilisateur créé: " + pseudo, "success");
                }
            });
        });

    });

    // GENERATE QUESTION

    $('.create-question').click(function () {

        // get domains

        $.ajax({
            url: '/domains_js', type: 'GET', dataType: 'json',
            success: function (data) {
                var domains = data;
                var max = data.length + 1;
                var rndInt = (Math.floor(Math.random() * max) + 1) - 1;
                domain_selected = domains[rndInt];

                // get user

                $.ajax({
                    url: '/users_js', type: 'GET', dataType: 'json',
                    success: function (data) {
                        var users = data;
                        var max = data.length;
                        var rndInt = (Math.floor(Math.random() * max) + 1) - 1;
                        user_selected = users[rndInt];

                        // get api

                        let prompt = 'Invente une question que l\'utilisateur fictif "' + user_selected.name + '" pourrait poser concernant le sujet "' + domain_selected.label + '". Ecris uniquement sa question sans guillemets et en français.';
                        let answer = requestOpenAi('text-davinci-002', prompt, 500);
                        $.when(answer).done(function(response){
                            var tab = response.split("\n\n");
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
                                    $.notify("Nouvelle question créée", "success");
                                }
                            });
                        });
                        

                    }

                });

            }

        });
    });


    // GENERATE ANSWER

    $('.create-answer').click(function () {

        // get questions
        $.ajax({
            url: '/questions_js', type: 'GET', dataType: 'json',
            success: function (data) {
                var questions = data;
                var max = data.length + 1;
                var rndInt = (Math.floor(Math.random() * max) + 1) - 1;
                questions_selected = questions[rndInt];

                // get user

                $.ajax({
                    url: '/users_js', type: 'GET', dataType: 'json',
                    success: function (data) {
                        var users = data;
                        var max = data.length;
                        var rndInt = (Math.floor(Math.random() * max) + 1) - 1;
                        user_selected = users[rndInt];

                        // get api

                        let prompt = 'Invente une courte réponse de l\'utilisateur "' + user_selected.name + '" à l\'utilisateur fictif "' + questions_selected.name + '" concernant sa question "' + questions_selected.content + '". N\'écris que sa réponse sans guillemets. L\'utilisateur doit saluer l\'autre. En français. Sans guillemets.';
                        let answer = requestOpenAi('text-davinci-002', prompt, 500);

                        $.when(answer).done(function(response){
                            $.ajax({
                                url: '/create_answer_js',
                                type: 'POST',
                                headers: {
                                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                                },
                                data: {
                                    content: response,
                                    question_id: questions_selected.id,
                                    user_id: user_selected.id
                                },
                                dataType: 'json',
                                success: function (data) {
                                    $.notify("Nouvelle réponse créée", "success");
                                }
                            });
                        });

                    }
                });
            }
        });
    })

});