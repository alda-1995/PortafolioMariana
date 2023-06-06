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


$('.link-category').click(function(e){
    e.preventDefault();
    let slug = $(this).attr("data-slug");
    $('.link-category').removeClass("active");
    $(this).addClass("active");
    filtraProyectos(slug);
});

function filtraProyectos(filtro) {
    $('#proyectosContainer').empty();
    // $('.container-loader').css("display", "flex");
    // $('.container-notResults').hide();
    // $('.paginationViajes').hide();
    filtroProyecto = filtro;
    gsap.delayedCall(2, ajaxProyectos);
}

function ajaxProyectos(){
    $.ajax({
        url: aj_ajax.ajaxurl,
        type: 'post',
        data: {
            'action': 'actionFiltraProyecto',
            'filtro': filtroProyecto,
        },
        success: function (resp) {
            // $('.container-loader').hide();
            $('#proyectosContainer').html(resp);
        },
        error: function (jqXHR, estado, error) {
            // $('.container-loader').hide();
            // $('.container-notResults').css("display", "flex");
        },
        complete: function (jqXHR, estado) {

        }
    });
}