$(document).ready(function () {

    var bodyPadding = + $('.footer').innerHeight();

    $('.overlay').height($(document).height() + bodyPadding);

    $('.loading, .overlay').fadeOut();

    $('body').css({
        paddingBottom: bodyPadding
    })

    // set copy right year

    $('.footer .copyright span').html(new Date().getFullYear())

    // Fire owl carousal


    $('.owl-carousel').owlCarousel({
        loop:true,
        margin:10,
        autoplay:true,
        autoplayTimeout:4000,
        autoplayHoverPause:true,
        nav: true,
        dots: false,
        // responsiveClass:true,
        // responsive:{
        //     0:{
        //         items:1,
        //     },
        //     1000:{
        //         items:4,
        //         loop:false
        //     }
        // }
    });

    // align next and prev slider buttons

    $('.owl-carousel .owl-nav button.owl-prev').css({
        top: $('.owl-carousel').height() / 6,
        left: $('.owl-carousel').width() - $('.owl-carousel').width() - 100
    });

    $('.owl-carousel .owl-nav button.owl-next').css({
        top: $('.owl-carousel').height() / 6,
        right: $('.owl-carousel').width() - $('.owl-carousel').width() - 100
    });

    // Send idea

    $('.share_form form #send_idea').click(function (e) {
        e.preventDefault();

        var name = $('#name'),
            rec_num = $('#rec_num'),
            management = $('#management'),
            com_num = $('#com_num'),
            section = $('#section'),
            phone = $('#phone'),
            unit = $('#unit'),
            email = $('#email'),
            area = $('#area'),
            idea_title = $('#idea_title'),
            idea_content = $('#idea_content');

        if ($(name).val() === ''){
            $(name).css('background', 'rgba(206, 45, 45, 0.28)');
            $('.error_msg').removeClass('d-none').html('الرجاء ملىء الحقول الفارغة');
            $(name).focus(function () {
                $(name).css('background', 'white')
            });
            return false
        }

        if ($(rec_num).val() === ''){
            $(rec_num).css('background', 'rgba(206, 45, 45, 0.28)');
            $('.error_msg').removeClass('d-none').html('الرجاء ملىء الحقول الفارغة');
            $(rec_num).focus(function () {
                $(rec_num).css('background', 'white')
            });
            return false
        }

        if ($(management).val() === ''){
            $(management).css('background', 'rgba(206, 45, 45, 0.28)');
            $('.error_msg').removeClass('d-none').html('الرجاء ملىء الحقول الفارغة');
            $(management).focus(function () {
                $(management).css('background', 'white')
            });
            return false
        }

        if ($(com_num).val() === ''){
            $(com_num).css('background', 'rgba(206, 45, 45, 0.28)');
            $('.error_msg').removeClass('d-none').html('الرجاء ملىء الحقول الفارغة');
            $(com_num).focus(function () {
                $(com_num).css('background', 'white')
            });
            return false
        }

        if ($(section).val() === ''){
            $(section).css('background', 'rgba(206, 45, 45, 0.28)');
            $('.error_msg').removeClass('d-none').html('الرجاء ملىء الحقول الفارغة');
            $(section).focus(function () {
                $(section).css('background', 'white')
            });
            return false
        }

        if ($(phone).val() === ''){
            $(phone).css('background', 'rgba(206, 45, 45, 0.28)');
            $('.error_msg').removeClass('d-none').html('الرجاء ملىء الحقول الفارغة');
            $(phone).focus(function () {
                $(phone).css('background', 'white')
            });
            return false
        }

        if ($(unit).val() === ''){
            $(unit).css('background', 'rgba(206, 45, 45, 0.28)');
            $('.error_msg').removeClass('d-none').html('الرجاء ملىء الحقول الفارغة');
            $(unit).focus(function () {
                $(unit).css('background', 'white')
            });
            return false
        }

        if ($(email).val() === ''){
            $(email).css('background', 'rgba(206, 45, 45, 0.28)');
            $('.error_msg').removeClass('d-none').html('الرجاء ملىء الحقول الفارغة');
            $(email).focus(function () {
                $(email).css('background', 'white')
            });
            return false
        }

        if ($(area).val() === ''){
            $(area).css('background', 'rgba(206, 45, 45, 0.28)');
            $('.error_msg').removeClass('d-none').html('الرجاء ملىء الحقول الفارغة');
            $(area).focus(function () {
                $(area).css('background', 'white')
            });
            return false
        }
        if ($(idea_title).val() === ''){
            $(idea_title).css('background', 'rgba(206, 45, 45, 0.28)');
            $('.error_msg').removeClass('d-none').html('الرجاء ملىء الحقول الفارغة');
            $(idea_title).focus(function () {
                $(idea_title).css('background', 'white')
            });
            return false
        }

        if ($(idea_content).val() === ''){
            $(idea_content).css('background', 'rgba(206, 45, 45, 0.28)');
            $('.error_msg').removeClass('d-none').html('الرجاء ملىء الحقول الفارغة');
            $(idea_content).focus(function () {
                $(idea_content).css('background', 'white')
            });
            return false
        }


        var form = $('.share_form form'),
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
                $('.success_msg').removeClass('d-none').html(data.msg).show()
                $('.error_msg').addClass('d-none');

                formData.forEach(function (value, index) {
                    $('#'+index).val('');
                });

            } else {
                $('.error_msg').removeClass('d-none').html(data.msg).show();
                $('.success_msg').addClass('d-none');
            }
        });

    })

    // toggle news

    $('.news_container h6.new:first-child').addClass('active').siblings('h6').hide();

    (function autoSlider(){

        $('.news h6.active').each(function(){

            if (!$(this).is(':last-of-type')) {

                $(this).delay(5000).fadeOut(1000, function(){

                    $(this).removeClass('active').next().addClass('active').fadeIn();

                    autoSlider();
                })

            } else{

                $(this).delay(5000).fadeOut(1000, function(){

                    $(this).removeClass('active');

                    $('.news h6').eq(0).addClass('active').fadeIn();

                    autoSlider();

                });

            }
        })

    }());

    // animate share form label

    $('.share_form form input, .share_form form textarea').focus(function () {

        $(this).siblings('label').css({
            transform: 'translate(0, 0)',
            fontSize: '12px',
            fontWeight: 'bold',
            background: '#228b22',
            color: '#fff',
            padding: '4px'
        })
    }).blur(function () {
        if ($(this).val() !== ''){
            $(this).siblings('label').css({
                transform: 'translate(0, 0)',
                fontSize: '12px',
                fontWeight: 'bold',
                background: '#228b22',
                color: '#fff',
                padding: '4px'
            })
        } else {
            $(this).siblings('label').css({
                transform: 'translate(-12px, 37px)',
                fontSize: '12px',
                fontWeight: 'normal',
                background: '#fff',
                color: '#000',
                padding: '0'
            })
        }
    });

    $('.logo i').hover(function () {

    })

});