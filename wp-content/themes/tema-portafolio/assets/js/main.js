$ = jQuery;
let vh = window.innerHeight * 0.01;
document.documentElement.style.setProperty('--vh', `${vh}px`);
var isMobilTabled = (jQuery(window).width() < 1024) ? true : false;
var isMobil = window.matchMedia("only screen and (max-width: 760px)").matches;
let filtroProyecto = "";
gsap.registerPlugin(ScrollTrigger);

$(document).ready(function () {
    $('.target-animation-banner').addClass("is-view");
    getPaginationProyectos();
    const idContainer = $.urlParam('id');
    if(idContainer){
        scrollOrNavigate(idContainer);
    }
});

if ($('.target-text-animation').length > 0) {
    $('.target-text-animation').each(function (index, value) {
        var target = $(this);
        ScrollTrigger.create({
            trigger: value,
            pin: false,
            start: "top 80%",//creo el primero es donde esta indicador y el segundo desde se posicionara la pantalla que seria al principio
            end: "top 80%",
            markers: false,
            pinSpacing: false,
            onEnter: () => {
                target.addClass("is-view");
            }
        });
    });
}

$('.txtShow').click(function(e){
    e.preventDefault();
    $('#tgTexto').toggle();
});

$('.link-menu-scroll').click(function(e){
    e.preventDefault();
    var idBlock = $(this).attr("data-id");
    scrollOrNavigate(idBlock);
});

$('.link-movil-scroll').click(function(e){
    e.preventDefault();
    var idBlock = $(this).attr("data-id");
    scrollOrNavigateMenu(idBlock);
});

function scrollOrNavigate(idContainer){
    if(idPage == 8){
        $('html, body').animate({
            scrollTop: (isMobil) ? $('#'+idContainer).offset().top - 80 : $('#'+idContainer).offset().top
        }, 0);
    }else{
        location.href = linkHome + `?id=${idContainer}`;
    }
}

function scrollOrNavigateMenu(idContainer){
    if(idPage == 8){
        closeMenu();
        $('html, body').animate({
            scrollTop: $('#'+idContainer).offset().top - 80
        }, 0);
    }else{
        location.href = linkHome + `?id=${idContainer}`;
    }
}

$('.openMenu').click(function (e) {
    e.preventDefault();
    $('.hamburger').addClass("is-active");
    var tl = gsap.timeline();
    tl.set("html", { "overflow-y": "hidden" });
    tl.set(".modal-menu", { zIndex: 999 });
    tl.to(".modal-menu", { x: 0, duration: 1, ease: 'expo.inOut' });
    tl.to('.li-animation', { opacity: 1, y: 0, duration: 0.8, ease: 'expo.inOut', stagger: "0.02" }, "-=.5");
    tl.to('.opacityAnimation', { opacity: 1, duration: 0.6 });
});

$('.closeMenu').click(function (e) {
    e.preventDefault();
    closeMenu();
});

function closeMenu(){
    var tl = gsap.timeline();
    tl.to('.li-animation', { y: "16px", opacity: 0, stagger: "0.04", duration: 0.3 });
    tl.to('.opacityAnimation', { opacity: 0, duration: 0.3 });
    tl.to(".modal-menu", { x: "100%", duration: 0.5, ease: 'expo.inOut' });
    tl.set(".modal-menu", { zIndex: -1 });
    tl.set("html", { "overflow-y": "auto" });
    $('.hamburger').removeClass("is-active");
}

$('.link-category').click(function (e) {
    e.preventDefault();
    let slug = $(this).attr("data-slug");
    $('.link-category').removeClass("active");
    $(this).addClass("active");
    filtraProyectos(slug);
});

function addAnimationFilter(){
    if ($('.target-card-filter').length > 0) {
        $('.target-card-filter').each(function (index, value) {
            var target = $(this);
            ScrollTrigger.create({
                trigger: value,
                pin: false,
                start: "top 80%",//creo el primero es donde esta indicador y el segundo desde se posicionara la pantalla que seria al principio
                end: "top 80%",
                markers: false,
                pinSpacing: false,
                onEnter: () => {
                    target.addClass("is-view");
                }
            });
        });
    }
}

function filtraProyectos(filtro) {
    $('#proyectosContainer').empty();
    $('.loader-content').addClass("show-loader");
    $('.container-notResults').hide();
    $('.paginationProyectos').hide();
    filtroProyecto = filtro;
    gsap.delayedCall(1, ajaxProyectos);
}

function ajaxProyectos() {
    $.ajax({
        url: aj_ajax.ajaxurl,
        type: 'post',
        data: {
            'action': 'actionFiltraProyecto',
            'filtro': filtroProyecto,
        },
        success: function (resp) {
            $('.loader-content').removeClass("show-loader");
            $('#proyectosContainer').html(resp);
            getPaginationProyectos();
            addAnimationFilter();
        },
        error: function (jqXHR, estado, error) {
            $('.loader-content').removeClass("show-loader");
            $('.container-notResults').css("display", "flex");
        },
        complete: function (jqXHR, estado) {

        }
    });
}

function getPaginationProyectos() {
    if ($('.card-proyecto').length > 12) {
        $('.paginationProyectos').css("display", "flex");
        $(".paginationProyectos").jPages({
            containerID: "proyectosContainer",
            perPage: 12,
            startPage: 1,
            startRange: 1,
            midRange: 12,
            endRange: 1,
            minHeight: false
        });
        $('.jp-previous').empty();
        $('.jp-next').empty();
    }
}

var inputPhones = document.querySelectorAll('.phoneValidationMark');
if (inputPhones.length > 0) {
    for (let i = 0; i < inputPhones.length; i++) {
        inputPhones[i].addEventListener("input", function (e) {
            var a = e.target.value.replace(/\D/g, '').match(/(\d{0,3})(\d{0,3})(\d{0,4})/);
            e.target.value = !a[2] ? a[1] : '(' + a[1] + ') ' + a[2] + (a[3] ? '-' + a[3] : '');
        });
    }
}

$("#formularioContacto").validate({
    // Specify validation rules
    rules: {
        nombre: "required",
        // telefono: {
        //     required: true,
        //     minlength: 14,
        //     maxlength: 14
        // },
        correo: {
            required: true,
            email: true
        },
    },
    messages: {
        nombre: "Name is required",
        correo: {
            email: "Email format is invalid",
            required: 'Email is required'
        },
        // telefono: {
        //     required: "El teléfono es requerido",
        //     minlength: "El teléfono es incorrecto",
        //     maxlength: "El teléfono es incorrecto",
        // },
    },
    errorPlacement: function (error, element) {
        error.insertAfter(element.parent());
    },
    highlight: function (element) {
        $(element).parent().addClass('errorInput');
    },
    unhighlight: function (element) {
        $(element).parent().removeClass('errorInput');
    },
    // Make sure the form is submitted to the destination defined
    // in the "action" attribute of the form when valid
    submitHandler: function (form, event) {
        event.preventDefault();
        sendFormularioContacto();
    },
});

function sendFormularioContacto() {
    var isvalid = $("#formularioContacto").valid();
    var f = $('#formularioContacto');
    var data = getFormData(f);
    if (isvalid) {
        $("#btnContacto").addClass("disabled");
        $.ajax({
            url: aj_ajax.ajaxurl,
            type: 'post',
            data: {
                'action': 'actionSendCorreoContacto',
                formulario: data,
            },
            success: function (resp) {
                var resultado = JSON.parse(resp);
                if (resultado.code == "success") {
                    location.href = linkGracias;
                } else {
                    showMessageErrors();
                }
                $("#btnContacto").removeClass("disabled");
            },
            error: function (jqXHR, estado, error) {
                showMessageErrors();
                $("#btnContacto").removeClass("disabled");
            },
            complete: function (jqXHR, estado) {
            }
        });
    }
}

function showMessageErrors(){
    var tl = gsap.timeline();
    tl.to('.form-c-principal', { opacity: 0, duration: 1 });
    tl.set('.message-error-contact', { zIndex: 2, pointerEvents: "unset" });
    tl.set('.form-c-principal', { zIndex: -1, pointerEvents: "none" });
    tl.to('.message-error-contact', { opacity: 1, duration: 1 });
}

$('.hide-error-contact').click(function (e) {
    e.preventDefault();
    var tl = gsap.timeline();
    tl.to('.message-error-contact', { opacity: 0, duration: 1 });
    tl.set('.form-c-principal', { zIndex: 2, pointerEvents: "unset" });
    tl.set('.message-error-contact', { zIndex: -1, pointerEvents: "none" });
    tl.to('.form-c-principal', { opacity: 1, duration: 1 });
});

function getFormData($form) {
    var unindexed_array = $form.serializeArray();
    var indexed_array = {};

    $.map(unindexed_array, function (n, i) {
        indexed_array[n['name']] = n['value'];
    });

    return indexed_array;
}

//obtiene valores de la url
$.urlParam = function (name) {
    var results = new RegExp('[\?&]' + name + '=([^&#]*)').exec(window.location.href);
    if (results == null) {
        return null;
    }
    return decodeURI(results[1]) || 0;
}