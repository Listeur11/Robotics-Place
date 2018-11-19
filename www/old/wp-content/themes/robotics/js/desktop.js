$( document ).ready(function() {
      var headerfixed = $('#masthead');
      if (headerfixed){
        $(window).scroll(function(){
          if (!headerfixed.offset())
            return true;
          var offsetTop = headerfixed.offset().top - $(window).scrollTop();
          if ($(window).scrollTop() >= 50){
            headerfixed.addClass('fixed');
          }
          else if ($(window).scrollTop() < 50){
              headerfixed.removeClass('fixed');
          }
        });
      }

        $('.content_liste_secteur').slick({
            slidesToShow: 1,
            slidesToScroll: 1,
            arrows: false,
            easing : 'linear',
            lazyLoad :'ondemand',
            asNavFor: '.nav_secteur'
        });
        $('.nav_secteur').slick({
            slidesToShow: 3,
            slidesToScroll: 1,
            asNavFor: '.content_liste_secteur',
            dots: true,
            centerMode: true,
            focusOnSelect: true
        });

        // ouverture de la popin membre
        $('.link-member').click(function(){
          $('#popin, #popin__member').addClass('popin_active').removeClass('popin_unactive');
          $('.home').addClass('noscroll');
        });
        // ouverture de la popin organisation du cluster
        $('.link-orga').click(function(){
          $('#popin, #popin__orga').addClass('popin_active').removeClass('popin_unactive');
          $('.home').addClass('noscroll');
        });
        // ouverture de la popin soumettre
        $('.btn-soumettre').click(function(){
          $('#popin, #popin__soumettre').addClass('popin_active').removeClass('popin_unactive');
          $('.home').addClass('noscroll');
        });
        // ouverture de la popin rejoindre
        $('.link-rejoindre, .btn-rejoindre').click(function(){
          $('#popin, #popin__rejoindre').addClass('popin_active').removeClass('popin_unactive');
          $('.home').addClass('noscroll');
        });
        // ouverture de la popin rejoindre
        $('.link-carte').click(function(){
          $('#popin, #popin__interclustering').addClass('popin_active').removeClass('popin_unactive');
          $('.home').addClass('noscroll');
        });
        // ouverture de la popin rejoindre
        $('.link-contact, .btn-contact').click(function(){
          $('#popin, #popin__contact').addClass('popin_active').removeClass('popin_unactive');
          $('.home').addClass('noscroll');
        });
        // ferme la popin
        $('.popin_click, .close').click(function(){
        var target = $(this).data('target');
        $(target).addClass('popin_unactive').removeClass('popin-active');
        $('.popin').addClass('popin_unactive').removeClass('popin-active');
        $('.home').removeClass('noscroll');
     });
});
