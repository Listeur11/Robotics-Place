if (jQuery(window).width() > 768 ){
document.addEventListener('DOMContentLoaded', function(){
  var trigger = new ScrollTrigger({
    toggle: {
      visible: 'jetevois',
      hidden: 'chuuuuut'
    },
    offset:{
      y:200
    },
    once: true
  }, document.body, window);
})
}
