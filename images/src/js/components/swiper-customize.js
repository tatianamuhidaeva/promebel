window.addEventListener('load', function () {
  var indexPortfolioSlider = new Swiper('#portfolio-slider', {
    slidesPerView: 2,
    centeredSlides: true,
    initialSlide: 1,
    navigation: {
      nextEl: '.portfolio-arrow--next',
      prevEl: '.portfolio-arrow--prev',
    },
    breakpoints: {
      780: {
        slidesPerView: 3,
        centeredSlides: false,
        initialSlide: 0,
      },
      1241: {
        slidesPerView: 4,
        centeredSlides: false,
        initialSlide: 0,
      },
    }
  })
  var portfolioSliderHeight = $('.portfolio__item').css('height');
  $('.portfolio-slider-wrapper').css('height', portfolioSliderHeight);

  var indexOffersSlider = new Swiper('#offers-slider', {
    slidesPerView: 1,
    navigation: {
      nextEl: '.offers-arrow--next',
      prevEl: '.offers-arrow--prev',
    },
    pagination: {
      el: '.offers-pagination',
      clickable: true,
    },
    breakpoints: {

      578: {
        slidesPerView: 2,
      },
      993: {
        slidesPerView: 3,
      }
    }
  })
  var offersSliderHeight = $('.offers__item').css('height');
  $('.offers-slider-wrapper').css('height', offersSliderHeight);

  var indexPromoSlider = new Swiper('#promo-slider', {
    slidesPerView: 1,
    navigation: {
      nextEl: '.promo-arrow--next',
      prevEl: '.promo-arrow--prev',
    },
    pagination: {
      el: '.promo-pagination',
      clickable: true,
    },
    breakpoints: {

      780: {
        slidesPerView: 2,
      },
      993: {
        slidesPerView: 3,
      }
    }
  })

  var reviewItems = document.querySelectorAll('.reviews__item-slider');
  for (var i = 0; i < reviewItems.length; i++) {
    var pagin = "#" + reviewItems[i].id + ' ~ .reviews__item-pagination';
    var reviewsItemSlider = new Swiper("#" + reviewItems[i].id, {
      slidesPerView: 1,
      pagination: {
        el: pagin,
        clickable: true,
      }
    })
  }

  
  var reviewsItemHeight = $('.reviews__item').css('height');
  $('.reviews__item').css('height', reviewsItemHeight);

})