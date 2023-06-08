$ = jQuery;
let vh = window.innerHeight * 0.01;
document.documentElement.style.setProperty('--vh', `${vh}px`);
var isMobilTabled = (jQuery(window).width() < 1024) ? true : false;
var isMobil = window.matchMedia("only screen and (max-width: 760px)").matches;
let filtroProyecto = "";

$('.openMenu').click(function (e) {
    e.preventDefault();
    $('.hamburger').addClass("is-active");
});


$('.link-category').click(function (e) {
    e.preventDefault();
    let slug = $(this).attr("data-slug");
    $('.link-category').removeClass("active");
    $(this).addClass("active");
    filtraProyectos(slug);
});

function filtraProyectos(filtro) {
    $('#proyectosContainer').empty();
    $('.loader-content').addClass("show-loader");
    $('.container-notResults').hide();
    // $('.paginationViajes').hide();
    filtroProyecto = filtro;
    gsap.delayedCall(2, ajaxProyectos);
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
        },
        error: function (jqXHR, estado, error) {
            $('.loader-content').removeClass("show-loader");
            $('.container-notResults').css("display", "flex");
        },
        complete: function (jqXHR, estado) {

        }
    });
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
        telefono: {
            required: true,
            minlength: 14,
            maxlength: 14
        },
        correo: {
            required: true,
            email: true
        },
    },
    messages: {
        nombre: "El nombre es requerido",
        correo: {
            email: "El formato de correo no es válido",
            required: 'El correo es requerido'
        },
        telefono: {
            required: "El teléfono es requerido",
            minlength: "El teléfono es incorrecto",
            maxlength: "El teléfono es incorrecto",
        },
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