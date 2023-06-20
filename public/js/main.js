$(document).ready(function () {

// $('.cart-header').on('click', function () {
//     $('.cart-header .shopping-bag-dropdown').toggle();

// });

    if( /Android|webOS|iPhone|iPad|Mac|Macintosh|iPod|BlackBerry|IEMobile|Opera Mini/i.test(navigator.userAgent) ) {
        $('.cart-header .shopping-bag-dropdown').css('display','none');
        if ($(window).width() < 766) {
            $('.navbar-toggler').on('click', function(){
                $('.cart-header .shopping-bag-dropdown').css('display','none');
            });
            $('.cart-header').on('click', function () {
                if($('.cart-header .shopping-bag-dropdown').css('display') == 'none') {
                    if( !$('.navbar-toggler').hasClass('collapsed') ) {
                        $('.navbar-toggler').addClass('collapsed');
                        $('#navbarCollapse').removeClass('show');
                    }
                    $('.cart-header .shopping-bag-dropdown').css('display','block');
                } else if($('.cart-header .shopping-bag-dropdown').css('display')){
                    $('.cart-header .shopping-bag-dropdown').css('display','none');
                }
            });
         }
    } else {
        // $('.cart-header .shopping-bag-dropdown').css('display','none');
    }

    $("#checkout-form").validate({
        rules: {
            shipping_method:{ required:true }
        },
        messages: {
            office_full_name: "Моля въведете име и фамилия",
            office_city: "Моля въведете Град",
            office_phone: "Моля въведете телефон за връзка",
            office_email: "Моля въведете валиден имайл ",
            office_office: "Моля въведете офис на Еконт",

            shipping_method: "Моля въведете метод за доставка",
            
            address_full_name: "Моля въведете име и фамилия",
            address_city: "Моля въведете Град",
            address_phone: "Моля въведете телефон за връзка",
            address_email: "Моля въведете валиден имайл ",
            address_address: "Моля въведете пълния ви адрес"
        },
        errorPlacement: function(error, element) {
            if (element.attr("office_full_name") == "office_city" )
                error.insertBefore(".diverror");
            else if  (element.attr("office_full_name") == "office_phone" )
                error.insertBefore(".diverror");
            else if  (element.attr("office_full_name") == "office_email" )
            error.insertBefore(".diverror");
            else if  (element.attr("office_full_name") == "office_office" )
            error.insertBefore(".diverror");
            
            if (element.attr("address_full_name") == "address_city" )
                error.insertBefore(".diverror");
            else if  (element.attr("address_full_name") == "address_phone" )
                error.insertBefore(".diverror");
            else if  (element.attr("address_full_name") == "address_email" )
            error.insertBefore(".diverror");
            else if  (element.attr("address_full_name") == "address_address" )
            error.insertBefore(".diverror");
            else
                error.insertBefore(element)
        },
        submitHandler: function (form) {
            if (grecaptcha.getResponse()) {
                    // 2) finally sending form data
                    form.submit();
            }else{
                    // 1) Before sending we must validate captcha
                grecaptcha.reset();
                grecaptcha.execute();
            }
        }
    });

    $("#custom-furniture").validate({
        messages: {
            username: "Моля въведете име и фамилия",
            email: "Моля въведете валиден емайл",
            subject: "Моля напишете относно каква тема",
            phone: "Моля въведете телефон за връзка ",
            msg: "Моля напишете съобщение"
        },
        errorPlacement: function(error, element) {
            if (element.attr("username") == "email" )
                error.insertBefore(".diverror");
            else if  (element.attr("username") == "subject" )
                error.insertBefore(".diverror");
            else if  (element.attr("username") == "msg" )
            error.insertBefore(".diverror");
            else if  (element.attr("username") == "phone" )
            error.insertBefore(".diverror");
            else
                error.insertBefore(element)
        },
        submitHandler: function (form) {
            if (grecaptcha.getResponse()) {
                    // 2) finally sending form data
                    form.submit();
            }else{
                    // 1) Before sending we must validate captcha
                grecaptcha.reset();
                grecaptcha.execute();
            }  
        }
    });

    $("#contact-form").validate({
        messages: {
            username: "Моля въведете име и фамилия",
            email: "Моля въведете валиден емайл",
            subject: "Моля напишете относно каква тема",
            msg: "Моля напишете съобщение"
        },
        errorPlacement: function(error, element) {
            if (element.attr("username") == "email" )
                error.insertBefore(".diverror");
            else if  (element.attr("username") == "subject" )
                error.insertBefore(".diverror");
            else if  (element.attr("username") == "msg" )
            error.insertBefore(".diverror");
            else
                error.insertBefore(element)
        },
        submitHandler: function (form) {
            if (grecaptcha.getResponse()) {
                    // 2) finally sending form data
                    form.submit();
            }else{
                    // 1) Before sending we must validate captcha
                grecaptcha.reset();
                grecaptcha.execute();
            }  
        }
    });

    // if (window.location.href.includes("/terms")) {
    //     $("html, body").addClass("ovx");
    // }
    $('.nav-terms li').on('click', function () {
        setTimeout(function () {
            window.scrollTo(0, window.scrollY - 70);
        }, 10);
    });

    // The function actually applying the offset
    function offsetAnchor() {
        if(location.hash.length !== 0) {
            window.scrollTo(window.scrollX, window.scrollY - 30);
        }
    }
    // This will capture hash changes while on the page
    window.addEventListener("hashchange", offsetAnchor);
    // This is here so that when you enter the page with a hash,
    // it can provide the offset in that case too. Having a timeout
    // seems necessary to allow the browser to jump to the anchor first.
    window.setTimeout(offsetAnchor, 1); // The delay of 1 is arbitrary and may not always work right (although it did in my testing).

    if(getCookie('cookielawinfo-checkbox-necessary') == null) {
        $('#zoomebeli_coockie_policy').show();
    } else {
        $('#zoomebeli_coockie_policy').hide();
    }

    $('#zoomebeli_coockie_policy button').on('click', function(){
            setCookie('cookielawinfo-checkbox-necessary', 'yes', 30 );
            $('#zoomebeli_coockie_policy').hide();
        }
    );

    $('#zoomebeli_coockie_policy .c-cancel').on('click', function(){
            eraseCookie('cookielawinfo-checkbox-necessary');
            $('#zoomebeli_coockie_policy').hide();
        }
    );

    
    $.ajaxSetup({
        headers: {
            "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
        }
    });
    
    /* FancyBox */
    $("[data-fancybox]").fancybox({
        loop: true,
        transitionDuration: 700,
        animationDuration: 600,
        animationEffect: "fade",
        clickContent : "next",
        // touch: false,
        buttons: [
            "fullScreen",
            "close",
        ],
        slideShow: {
            autoStart: false,
            speed: 1200,
        },
        // thumbs: {
        //     autoStart: true,
        // },
    });

    $(".imageGallery").lightSlider({
        // loop: true,  // Бъгва fancyboxa
        vertical: true,
        verticalHeight: 450,
        // vThumbWidth:300,
        vThumbHeight: 1000,
        gallery: true,
        item: 1,
        thumbItem: 1,
        slideMargin: 50,
        thumbItem: 5,
        thumbMargin: 10,
        // enableTouch:false,
        // zoom:false,
        // gallery:true,
        responsive : [
            {
                breakpoint:800,
                settings: {
                    enableTouch:false,
                    verticalHeight: 300,
                    vThumbHeight: 700
                  }
            }
        ]

    });

    $(".select2_test").select2({
        minimumResultsForSearch: -1,
    });
});

$(function () {


    $('.shipping_method').on('change', function (e) {
        $('#pricing_sidemenu').html('<img src="https://media1.giphy.com/media/3oEjI6SIIHBdRxXI40/giphy.gif"/>');
        $('#js-table-shipping-html').html('<img src="https://media1.giphy.com/media/3oEjI6SIIHBdRxXI40/giphy.gif"/>');
        $body = $("body");
        $body.addClass("loading");
        
        $.ajax({
            method: "get",
            url: "/checkout/getShippingMethodHtml",
            data: {
                shipping_method: $(this).val()
            },
        }).done(function (data) {
            $body.removeClass("loading");
            $('#pricing_sidemenu').html(data.pricing_sidemenu);
            $('#js-table-shipping-html').html(data.table);
            $('#final-price').html(data.table_final_price);
        });
    })


    // $(".quantity-form div").append(
    //     '<div class="inc button">+</div><div class="dec button">-</div>'
    // );
    // $(".button").on("click", function () {
    //     var $button = $(this);
    //     var oldValue = $button.parent().find("input").val();

    //     if ($button.text() == "+") {
    //         var newVal = parseFloat(oldValue) + 1;
    //     } else {
    //         // Don't allow decrementing below zero
    //         if (oldValue > 0) {
    //             var newVal = parseFloat(oldValue) - 1;
    //         } else {
    //             newVal = 0;
    //         }
    //     }
    //     $button.parent().find("input").val(newVal);
    // });
    // var id = $button.attr("id");

    // $.ajax({
    //     type: "POST",
    //     url: "dosomething.php?id=" + id + "&newvalue=" + newVal,
    //     success: function () {
    //         $button.parent().find("input").val(newVal);
    //     },
    // });

    /* https://css-tricks.com/number-increment-buttons/  */
});


function setCookie(name,value,days) {
    var expires = "";
    if (days) {
        var date = new Date();
        date.setTime(date.getTime() + (days*24*60*60*1000));
        expires = "; expires=" + date.toUTCString();
    }
    document.cookie = name + "=" + (value || "")  + expires + "; path=/";
}
function getCookie(name) {
    var nameEQ = name + "=";
    var ca = document.cookie.split(';');
    for(var i=0;i < ca.length;i++) {
        var c = ca[i];
        while (c.charAt(0)==' ') c = c.substring(1,c.length);
        if (c.indexOf(nameEQ) == 0) return c.substring(nameEQ.length,c.length);
    }
    return null;
}
function eraseCookie(name) {   
    document.cookie = name +'=; Path=/; Expires=Thu, 01 Jan 1970 00:00:01 GMT;';
}