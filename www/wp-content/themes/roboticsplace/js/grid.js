
$(document).ready(function () {
    $(this).keydown(function (e) {
        e.preventDefault();
        if (e.keyCode == 76) {
            if(gridOn == false){
                gridOn = true;
                $(".containerGrid").show();
            } else{
               gridOn = false; 
                 $(".containerGrid").hide();
            }
           
        }
    });
});
