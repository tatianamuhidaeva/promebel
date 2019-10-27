$(document).ready(function () {
    //POPUP
    function popupControl() {
      function closeModal() {
        $('.popup').remove();
      }
      
      $('.popup__close').on('click', closeModal);
      
      $(document).on('click', function (e) {
          if (($(e.target).hasClass('popup')) &&
          !($(e.target).parents('.popup-wrap').length)) {
            closeModal();
          }
      });
  
      validateForm();
    }
  
    $('.reviews-add__btn').on('click', function (event) {
      event.preventDefault();
      if ($('.content>.popup').length == 0) {
        $.ajax({
          type: 'GET',
          url: $(this).attr('href')
        }).done(function (res) {
          $('.content').append(res);
          popupControl();
        }).fail(function () {
          console.log('fail');
        });
      }
    });
  
    function validateForm(){
      $('form .error').css('visibility', 'hidden');
    };
})