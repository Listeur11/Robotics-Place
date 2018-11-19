jQuery(document).ready(function($) {

  $('.btn_popin').click(function(){
    $('#popin_form').addClass('popin_active').removeClass('popin_unactive');
    $('.page-template-emploi').addClass('noscroll')
    $('.acf-field--post-title').find('label').html('Nom & Prénom <span class="acf-required">*</span>')
  });

  $('.popin_click').click(function(){
   var target = $(this).data('target')
   $(target).addClass('popin_unactive').removeClass('popin-active');
   $('.page-template-emploi').removeClass('noscroll')
 })

 $('.liste_cv').accordion({
   active : false,
   heightStyle: "content",
   collapsible : true
 })
})
