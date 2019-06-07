$(document).ready(function () {

    $('.dataTables_empty').css({
        textAlign: 'center',
        color: '#e44949',
        fontSize: '18px',
        boxShadow: 'rgba(0, 0, 0, 0.33) 0px 1px 1px 0px'
    }).html('لا توجد بيانات في الوقت الحالي')

    // Login for admin
    $('#admin_login').click(function (e) {
        e.preventDefault();

        var email = $('#admin_email'),
            password = $('#admin_password');



        if (email.val() === ''){
            email.css({
                borderBottom: '1px solid #ff4f4f'
            });

            email.focus(function () {
                email.css({
                    borderBottom: '1px solid #d2d6de'
                });
            });
            return false;
        }

        var pattern = "^[a-z0-9._-]+@[a-z]+.[a-z]{3}$";

        if (!email.val().match(pattern)) {
            alert('Email syntax error');
            email.css({
                borderBottom: '1px solid #ff4f4f'
            });
            email.prev('span').css({
                color: '#ff4f4f'
            });

            email.focus(function () {
                email.css({
                    borderBottom: '1px solid #d2d6de'
                });
                email.prev('span').css({
                    color: '#777'
                });
            });
            return false;
        }

        if (password.val() === ''){
            password.css({
                borderBottom: '1px solid #ff4f4f'
            });

            password.focus(function () {
                password.css({
                    borderBottom: '1px solid #d2d6de'
                });
            });
            return false;
        }

        var form = $('form#admin_sign_in'),
            formData = new FormData(form[0]);

        $.ajax({
            url: form.attr('action'),
            type: 'post',
            data: formData,
            // cache: false,
            processData: false,
            contentType: false,
            dataType: 'JSON',
            crossDomain: true
        }).done(function (data) {
            if (data.status === 'success'){
                $('.success_msg').removeClass('hidden').slideDown();
                $('.success_msg .span_msg').html(data.msg);
                $('.error_msg').addClass('hidden').slideUp()
                $('.error_msg .span_msg').html(data.msg);

                formData.forEach(function (value, index) {
                    $('#'+index).val('');
                });

                var buffer = setInterval(function () {
                    window.location.reload();
                    clearInterval(buffer);
                }, 1000)

            } else {
                $('.error_msg').removeClass('hidden').slideDown()
                $('.error_msg .span_msg').html(data.msg);
                $('.success_msg').addClass('hidden').slideUp()
                $('.success_msg .span_msg').html(data.msg);
            }

        });


    });

    // Edit profile
    $('button#edit_admin').click(function (e) {
        e.preventDefault();

        var fullName = $('.admin_edit_modal #full_name'),
            adminEmail = $('.admin_edit_modal #admin_email'),
            confEmail = $('.admin_edit_modal #confirm_email'),
            adminPassword = $('.admin_edit_modal #admin_password'),
            confPassword = $('.admin_edit_modal #confirm_password');

        if (fullName.val() === ''){
            fullName.css({
                borderBottom: '1px solid #ff4f4f'
            });

            fullName.focus(function () {
                fullName.css({
                    borderBottom: '1px solid #d2d6de'
                });
            });
            return false;
        }

        if (adminEmail.val() === ''){
            adminEmail.css({
                borderBottom: '1px solid #ff4f4f'
            });

            adminEmail.focus(function () {
                adminEmail.css({
                    borderBottom: '1px solid #d2d6de'
                });
            });
            return false;
        }

        if (confEmail.val() === ''){
            confEmail.css({
                borderBottom: '1px solid #ff4f4f'
            });

            confEmail.focus(function () {
                confEmail.css({
                    borderBottom: '1px solid #d2d6de'
                });
            });
            return false;
        }

        var pattern = "^[a-z0-9._-]+@[a-z]+.[a-z]{3}$";

        if (!adminEmail.val().match(pattern)) {
            alert('Email syntax error');
            adminEmail.css({
                borderBottom: '1px solid #ff4f4f'
            });

            adminEmail.focus(function () {
                adminEmail.css({
                    borderBottom: '1px solid #d2d6de'
                });
            });
            return false;
        }

        if (!confEmail.val().match(pattern)) {
            alert('Email syntax error');
            confEmail.css({
                borderBottom: '1px solid #ff4f4f'
            });
            confEmail.prev('span').css({
                color: '#ff4f4f'
            });

            confEmail.focus(function () {
                confEmail.css({
                    borderBottom: '1px solid #d2d6de'
                });
                confEmail.prev('span').css({
                    color: '#777'
                });
            });
            return false;
        }

        if (adminEmail.val() !== confEmail.val()){

            alert('Emails not matches');

            adminEmail.css({
                borderBottom: '1px solid #ff4f4f'
            });

            adminEmail.focus(function () {
                adminPassword.css({
                    borderBottom: '1px solid #d2d6de'
                });
            });

            confEmail.css({
                borderBottom: '1px solid #ff4f4f'
            });

            confEmail.focus(function () {
                confEmail.css({
                    borderBottom: '1px solid #d2d6de'
                });


            });

            return false;
        }

        if (adminPassword.val() !== ''){

            if (confPassword.val() === ''){
                confPassword.css({
                    borderBottom: '1px solid #ff4f4f',
                });

                confPassword.focus(function () {
                    confPassword.css({
                        borderBottom: '1px solid #d2d6de',
                    });
                });
                return false;
            }


            if (adminPassword.val() !== confPassword.val()){

                alert('Passwords not matches');

                adminPassword.css({
                    borderBottom: '1px solid #ff4f4f',
                });

                adminPassword.focus(function () {
                    adminPassword.css({
                        borderBottom: '1px solid #d2d6de',
                    });
                });

                confPassword.css({
                    borderBottom: '1px solid #ff4f4f',
                });

                confPassword.focus(function () {
                    confPassword.css({
                        borderBottom: '1px solid #d2d6de',
                    });
                });

                return false;
            }

            if (adminPassword.val().length < 8 || confPassword.val().length < 8){
                alert('Passwords must be at least 8 characters');
                return false;
            }
        }

        if (confPassword.val() !== ''){

            if (adminPassword.val() === ''){
                adminPassword.css({
                    borderBottom: '1px solid #ff4f4f',
                    background: '#ffb9b9'
                });

                adminPassword.focus(function () {
                    adminPassword.css({
                        borderBottom: '1px solid #d2d6de',
                        background: '#fff'
                    });
                });

                return false;
            }

        }


        var form = $('.admin_edit_modal form#edit_admin_form'),
            formData = new FormData(form[0]);
        $.ajax({
            url: form.attr('action'),
            type: 'post',
            data: formData,
            // cache: false,
            processData: false,
            contentType: false,
            dataType: 'JSON',
            crossDomain: true
        }).done(function (data) {
            if (data.status === 'success'){
                $('.admin_edit_modal .success_msg').removeClass('hidden').slideDown();
                $('.admin_edit_modal .success_msg .span_msg').html(data.msg);
                $('.admin_edit_modal .error_msg').addClass('hidden').slideUp();
                $('.admin_edit_modal .error_msg .span_msg').html(data.msg);

                var bufferr = setInterval(function () {
                    window.location.reload();
                    clearInterval(bufferr);
                }, 1000)

            } else {
                $('.admin_edit_modal.error_msg').removeClass('hidden').slideDown();
                $('.admin_edit_modal .error_msg .span_msg').html(data.msg);
                $('.admin_edit_modal .success_msg').addClass('hidden').slideUp();
                $('.admin_edit_modal .success_msg .span_msg').html(data.msg);
            }

        });
    });

    // Active and non active
    $(document).on('click', 'button.approve_idea', function (e) {
        e.preventDefault();

        $(this).toggleClass('active non-active btn-success btn-warning');

        if ($(this).hasClass('active')){
            $(this).html('رفض') ;
            $.ajax({
                url: $(this).data('href'),
                type: 'post',
                data: {
                    id: $(this).data('idea-id'),
                    approve: 0
                }
            })
        }

        if ($(this).hasClass('non-active')){
            $(this).html('قبول');
            $.ajax({
                url: $(this).data('href'),
                type: 'post',
                data: {
                    id: $(this).data('idea-id'),
                    approve: 1
                }
            })
        }

    });

    // Delete idea
    $(document).on('click', 'button.delete_idea', function (e) {
        e.preventDefault();

        if (confirm('Are you sure to delete this student ?')){

            $.ajax({
            url: $(this).data('href'),
            type: 'post',
            dataType: 'JSON',
            crossDomain: true,
            data: {
                id: $(this).data('idea-id'),
            }
        }).done(function (data) {
            if (data.status === 'success'){
                $('.success_msg').removeClass('hidden').slideDown();
                $('.success_msg .span_msg').html(data.msg);
                $('.error_msg').addClass('hidden').slideUp();
                $('.error_msg .span_msg').html(data.msg);
            } else {
                $('.error_msg').removeClass('hidden').slideDown();
                $('.error_msg .span_msg').html(data.msg);
                $('.success_msg').addClass('hidden').slideUp();
                $('.success_msg .span_msg').html(data.msg);
            }

        });

            $(this).parents('tr.tr_'+$(this).data('idea-id')).remove();
        }

    });

    // Add News
    $('#addNew').click(function (e) {
        e.preventDefault();

        var news = $('#news_content'),
            title = $('#news_title');

        if (title.val() === ''){
            title.css({
                borderBottom: '3px solid #ff4f4f',
            });

            title.focus(function () {
                title.css({
                    borderBottom: '1px solid #d2d6de',
                });
            });
            return false;
        }

        if (news.val() === ''){
            news.css({
                borderBottom: '3px solid #ff4f4f',
            });

            news.focus(function () {
                news.css({
                    borderBottom: '1px solid #d2d6de',
                });
            });
            return false;
        }

        var form = $('form#add_new_form'),
            formData = new FormData(form[0]);

        $.ajax({
            url: form.attr('action'),
            type: 'post',
            data: formData,
            // cache: false,
            processData: false,
            contentType: false,
            dataType: 'JSON',
            crossDomain: true
        }).done(function (data) {
            if (data.status === 'success'){
                $('.success_msg').removeClass('hidden').slideDown();
                $('.success_msg .span_msg').html(data.msg);
                $('.error_msg').addClass('hidden').slideUp();
                $('.error_msg .span_msg').html(data.msg);

                formData.forEach(function (value, index) {
                    $('#'+index).val('');
                });

            } else {
                $('.error_msg').removeClass('hidden').slideDown();
                $('.error_msg .span_msg').html(data.msg);
                $('.success_msg').addClass('hidden').slideUp();
                $('.success_msg .span_msg').html(data.msg);
            }

        });


    });

    // Delete news
    $(document).on('click', 'button.delete_news', function (e) {
        e.preventDefault();

        if (confirm('Are you sure to delete this student ?')){

            $.ajax({
                url: $(this).data('href'),
                type: 'post',
                dataType: 'JSON',
                crossDomain: true,
                data: {
                    id: $(this).data('news-id'),
                }
            }).done(function (data) {
                if (data.status === 'success'){
                    $('.success_msg').removeClass('hidden').slideDown();
                    $('.success_msg .span_msg').html(data.msg);
                    $('.error_msg').addClass('hidden').slideUp();
                    $('.error_msg .span_msg').html(data.msg);
                } else {
                    $('.error_msg').removeClass('hidden').slideDown();
                    $('.error_msg .span_msg').html(data.msg);
                    $('.success_msg').addClass('hidden').slideUp();
                    $('.success_msg .span_msg').html(data.msg);
                }

            });

            $(this).parents('tr.tr_'+$(this).data('news-id')).remove();
        }

    });

    // Add knowledge
    $('#addKnowledge').click(function (e) {
        e.preventDefault();

        var knowledge = $('#content'),
            title = $('#title');

        if (title.val() === ''){
            title.css({
                borderBottom: '3px solid #ff4f4f',
            });

            title.focus(function () {
                title.css({
                    borderBottom: '1px solid #d2d6de',
                });
            });
            return false;
        }

        if (knowledge.val() === ''){
            knowledge.css({
                borderBottom: '3px solid #ff4f4f',
            });

            knowledge.focus(function () {
                knowledge.css({
                    borderBottom: '1px solid #d2d6de',
                });
            });
            return false;
        }


        var form = $('form#add_knowledge_form'),
            formData = new FormData(form[0]);

        $.ajax({
            url: form.attr('action'),
            type: 'post',
            data: formData,
            // cache: false,
            processData: false,
            contentType: false,
            dataType: 'JSON',
            crossDomain: true
        }).done(function (data) {
            if (data.status === 'success'){
                $('.success_msg').removeClass('hidden').slideDown();
                $('.success_msg .span_msg').html(data.msg);
                $('.error_msg').addClass('hidden').slideUp();
                $('.error_msg .span_msg').html(data.msg);

                formData.forEach(function (value, index) {
                    $('#'+index).val('');
                });

            } else {
                $('.error_msg').removeClass('hidden').slideDown();
                $('.error_msg .span_msg').html(data.msg);
                $('.success_msg').addClass('hidden').slideUp();
                $('.success_msg .span_msg').html(data.msg);
            }

        });


    });

    // Delete knowledge
    $(document).on('click', 'button.delete_knowledge', function (e) {
        e.preventDefault();

        if (confirm('Are you sure to delete this student ?')){

            $.ajax({
                url: $(this).data('href'),
                type: 'post',
                dataType: 'JSON',
                crossDomain: true,
                data: {
                    id: $(this).data('knowledge-id'),
                }
            }).done(function (data) {
                if (data.status === 'success'){
                    $('.success_msg').removeClass('hidden').slideDown();
                    $('.success_msg .span_msg').html(data.msg);
                    $('.error_msg').addClass('hidden').slideUp();
                    $('.error_msg .span_msg').html(data.msg);
                } else {
                    $('.error_msg').removeClass('hidden').slideDown();
                    $('.error_msg .span_msg').html(data.msg);
                    $('.success_msg').addClass('hidden').slideUp();
                    $('.success_msg .span_msg').html(data.msg);
                }

            });

            $(this).parents('tr.tr_'+$(this).data('knowledge-id')).remove();
        }

    });

    // Add training
    $('#addTraining').click(function (e) {
        e.preventDefault();

        var training = $('#content'),
            title = $('#title');

        if (title.val() === ''){
            title.css({
                borderBottom: '3px solid #ff4f4f',
            });

            title.focus(function () {
                title.css({
                    borderBottom: '1px solid #d2d6de',
                });
            });
            return false;
        }

        if (training.val() === ''){
            training.css({
                borderBottom: '3px solid #ff4f4f',
            });

            training.focus(function () {
                training.css({
                    borderBottom: '1px solid #d2d6de',
                });
            });
            return false;
        }


        var form = $('form#add_training_form'),
            formData = new FormData(form[0]);

        $.ajax({
            url: form.attr('action'),
            type: 'post',
            data: formData,
            // cache: false,
            processData: false,
            contentType: false,
            dataType: 'JSON',
            crossDomain: true
        }).done(function (data) {
            if (data.status === 'success'){
                $('.success_msg').removeClass('hidden').slideDown();
                $('.success_msg .span_msg').html(data.msg);
                $('.error_msg').addClass('hidden').slideUp();
                $('.error_msg .span_msg').html(data.msg);

                formData.forEach(function (value, index) {
                    $('#'+index).val('');
                });

            } else {
                $('.error_msg').removeClass('hidden').slideDown();
                $('.error_msg .span_msg').html(data.msg);
                $('.success_msg').addClass('hidden').slideUp();
                $('.success_msg .span_msg').html(data.msg);
            }

        });


    });

    // Delete training
    $(document).on('click', 'button.delete_training', function (e) {
        e.preventDefault();

        if (confirm('Are you sure to delete this student ?')){

            $.ajax({
                url: $(this).data('href'),
                type: 'post',
                dataType: 'JSON',
                crossDomain: true,
                data: {
                    id: $(this).data('training-id'),
                }
            }).done(function (data) {
                if (data.status === 'success'){
                    $('.success_msg').removeClass('hidden').slideDown();
                    $('.success_msg .span_msg').html(data.msg);
                    $('.error_msg').addClass('hidden').slideUp();
                    $('.error_msg .span_msg').html(data.msg);
                } else {
                    $('.error_msg').removeClass('hidden').slideDown();
                    $('.error_msg .span_msg').html(data.msg);
                    $('.success_msg').addClass('hidden').slideUp();
                    $('.success_msg .span_msg').html(data.msg);
                }

            });

            $(this).parents('tr.tr_'+$(this).data('training-id')).remove();
        }

    });


});
