$( document ).ready(function() {
  $('.hamburger, .close-nav, .menu-item a').click(function(){
    $('.main-navigation').toggleClass('navigation-open');
  });
  $('.close-nav, .menu-item a').click(function(){
    $('.hamburger').removeClass('is-active');
  });
  $( ".accordion-secteurs" ).accordion();
  // ouverture de la popin membre
  $('.link-member').click(function(){
    $('#popin, #popin__member').addClass('popin_active').removeClass('popin_unactive');
    $('.site, .site-footer').addClass('no-disp');
    $("body").scrollTop(0);
  });
  // ouverture de la popin organisation du cluster
  $('.link-orga').click(function(){
    $('#popin, #popin__orga').addClass('popin_active').removeClass('popin_unactive');
    $('.site, .site-footer').addClass('no-disp');
    $("body").scrollTop(0);
  });
  // ouverture de la popin soumettre
  $('.btn-soumettre').click(function(){
    $('#popin, #popin__soumettre').addClass('popin_active').removeClass('popin_unactive');
    $('.site, .site-footer').addClass('no-disp');
    $("body").scrollTop(0);
  });
  // ouverture de la popin rejoindre
  $('.link-rejoindre, .btn-rejoindre').click(function(){
    $('#popin, #popin__rejoindre').addClass('popin_active').removeClass('popin_unactive');
    $('.site, .site-footer').addClass('no-disp');
    $("body").scrollTop(0);
  });
  // ouverture de la popin rejoindre
  $('.link-carte').click(function(){
    $('#popin, #popin__interclustering').addClass('popin_active').removeClass('popin_unactive');
    $('.site, .site-footer').addClass('no-disp');
    $("body").scrollTop(0);
  });
  // ouverture de la popin rejoindre
  $('.link-contact, .btn-contact').click(function(){
    $('#popin, #popin__contact').addClass('popin_active').removeClass('popin_unactive');
    $('.site, .site-footer').addClass('no-disp');
    $("body").scrollTop(0);
  });
  // ferme la popin
  $('.popin_click, .close').click(function(){
    var target = $(this).data('target');
    $(target).addClass('popin_unactive').removeClass('popin-active');
    $('.popin').addClass('popin_unactive').removeClass('popin-active');
    $('.site, .site-footer').removeClass('no-disp');
  });
});

var forEach=function(t,o,r){if("[object Object]"===Object.prototype.toString.call(t))for(var c in t)Object.prototype.hasOwnProperty.call(t,c)&&o.call(r,t[c],c,t);else for(var e=0,l=t.length;l>e;e++)o.call(r,t[e],e,t)};

    var hamburgers = document.querySelectorAll(".hamburger");
    if (hamburgers.length > 0) {
      forEach(hamburgers, function(hamburger) {
        hamburger.addEventListener("click", function() {
          this.classList.toggle("is-active");
        }, false);
      });
    }
