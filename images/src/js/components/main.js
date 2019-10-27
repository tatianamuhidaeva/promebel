$(document).ready(function () {
  $('.header__catalog-toggle').click(function(){
    $('.header__catalog').toggleClass('open');
  })

  var inChild = true;
  $('.header__menu-item--parent>a').click(function(e){e.preventDefault()});
  $('.header__menu-item--parent a').hover(
    function(){
      $(this).closest('.header__menu-item--parent').find('.header__menu-child').show();
    },
    function(){
      if (!($(this).closest('.header__menu-item--parent').find('.header__menu-child').is(':hover'))){
        $(this).closest('.header__menu-item--parent').find('.header__menu-child').hide();
      }
    },
  )
  $('.header__menu-child').hover(
    function(){
    },
    function(){
      if (!($(this).closest('.header__menu-item--parent a').is('hover'))) {
        $(this).hide();
      }
    },
  )


  $('[data-fancybox="gallery"]').fancybox();
});
