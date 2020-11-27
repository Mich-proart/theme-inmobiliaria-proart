/* Custom JS to initialize carousels and sliders */

jQuery(document).ready(function ($) {

  // Menu Interaction
  $('.navbar-toggler-right').on('click', function (e) {
    e.preventDefault();
    $("#navbar").fadeIn(500, 'swing');
    $(".close-menu").fadeIn(1500);
    $(".navbar-icon-menu").fadeOut(500);
  });

  $('.close-menu').on('click', function (e) {
    e.preventDefault();
    $("#navbar").fadeOut(500);
    $(".close-menu").fadeOut(500);
    $(".navbar-icon-menu").fadeIn(500);
    $('body').css('overflow', 'scroll');
  });



  /* Prevent Contact Form double submission */

  /* $('.wpcf7-submit').on('click', function (e) {
  	if ( $(this).siblings('.ajax-loader').hasClass('is-active') ) {
  		e.preventDefault();
    	return false;
  	}
  }); */

  /* Fix for scrolling modal Safari Mobile */

  $(function () {
    var $window = $(window),
      $body = $("body"),
      $modal = $(".modal"),
      scrollDistance = 0;

    $modal.on("show.bs.modal", function () {
      scrollDistance = $window.scrollTop();
      $body.css("top", scrollDistance * -1);
    });

    $modal.on("hidden.bs.modal", function () {
      $body.css("top", "");
      $window.scrollTop(scrollDistance);
    });
  });

  $('.slider-single-proyectos').slick({
    infinite: true,
    speed: 300,
    autoplaySpeed: 3500,
    autoplay: true,
    slidesToScroll: 1,
    slidesToShow: 1,
    arrows: false,
    fade: false,
    dots: true,
    responsive: [{
      breakpoint: 992,
      settings: {
        arrows: false,
        slidesToShow: 1,
        slidesToScroll: 1
      }
    }]
  });


  $('.slider-servicios-single').slick({
    infinite: true,
    speed: 300,
    autoplaySpeed: 3500,
    autoplay: true,
    slidesToScroll: 1,
    slidesToShow: 2,
    arrows: false,
    fade: false,
    dots: true,
    responsive: [{
      breakpoint: 992,
      settings: {
        arrows: false,
        slidesToShow: 1,
        slidesToScroll: 1
      }
    }]
  });

  $('.galeria-inversiones').slick({
    infinite: true,
    speed: 300,
    autoplaySpeed: 3500,
    autoplay: true,
    slidesToScroll: 1,
    slidesToShow: 1,
    arrows: true,
    fade: false,
    dots: false,
    responsive: [{
      breakpoint: 992,
      settings: {
        arrows: true,
        slidesToShow: 1,
        slidesToScroll: 1
      }
    }]
  });

  $('.galeria-resultados').slick({
    infinite: true,
    speed: 300,
    autoplaySpeed: 3500,
    autoplay: true,
    slidesToScroll: 1,
    slidesToShow: 1,
    arrows: true,
    fade: false,
    dots: false,
    responsive: [{
      breakpoint: 992,
      settings: {
        arrows: true,
        slidesToShow: 1,
        slidesToScroll: 1
      }
    }]
  });


  /* Header scroll effect */

  // Header scroll effect
  if ($(window).scrollTop() > 0) {
    $(".navbar-transition").addClass('scrolled');
    $(".scrolled-items").addClass('scrolled');
    $(".initial-header").addClass('scrolled');
  }

  $(window).scroll(function () {
    var $nav = $(".navbar-transition");
    var $nav1 = $(".scrolled-items");
    var $nav2 = $(".initial-header");
    $nav.toggleClass('scrolled', $(this).scrollTop() > $nav.height());
    $nav1.toggleClass('scrolled', $(this).scrollTop() > $nav.height());
    $nav2.toggleClass('scrolled', $(this).scrollTop() > $nav.height());
  });

  /* Smooth scrolling */
  $('.smooth-link').on('click', function (e) {
    e.preventDefault();

    $('html, body').animate({
      scrollTop: $($(this).attr('href')).offset().top
    }, 1000, 'swing');
  });


  //Formulario, select
  // Select2 Multiple step 2
  $('.FormControlSelect2').select2({});
  $('b[role="presentation"]').hide();
  $('.select2-selection__arrow').addClass('select2-selection__arrow2');
  $('ul li:first-child').attr('disabled');



  if ($(window).width() > 768) {

    $('#collapseOne').addClass('show');
  }

  if ($(window).width() < 768) {

    $('.add-id').attr('id', 'filtros');
  }


});

// páginas gracias

document.addEventListener('wpcf7mailsent', function (event) {
  if ('11' == event.detail.contactFormId) {
    location = 'https://aincasa.fcweb.es/gracias/';
  } else if ('445' == event.detail.contactFormId) {
    location = 'https://aincasa.fcweb.es/ca/gracies/';
  } else if ('253' == event.detail.contactFormId){
    location = 'https://aincasa.fcweb.es/gracias/';
  }
  else if ('477' == event.detail.contactFormId){
    location = 'https://aincasa.fcweb.es/ca/gracies/';
  }
}, false);