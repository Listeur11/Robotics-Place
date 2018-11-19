<div id="video">
   <img id="purpleRectangle" src="<?php echo get_template_directory_uri(); ?>/images/paterns/purple-rectangle.svg" alt="">
    <div class="youtube-player">
        <!-- <img class="backgroundImageVideo" src="<?php //echo get_template_directory_uri(); ?>/images/img/video.jpg"> -->
        <div class="overVideo flex flex--center flex--justifyCenter">
          <?php $videoh = base64_encode(get_field('video_url'));?>
               <a id="ParentPlayBtn" class="link_video" href="#" data-urlvideo="<?=  $videoh ?>">
                  <svg width="70px" height="96px" viewBox="0 0 70 96" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                     <title>Video play button</title>
                     <g id="Produit" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd" transform="translate(-702.000000, -3446.000000)" fill-opacity="1">
                         <path class="playBtnStroke playBtnStroke--1"d="M703,3451.00031 L703,3537 C703,3539.20914 704.790861,3541 707,3541 C707.835844,3541 708.65069,3540.73816 709.330078,3540.25127 L769.329773,3497.25142 C771.125398,3495.96455 771.537828,3493.4657 770.250961,3491.67007 C769.996301,3491.31474 769.685112,3491.00355 769.329773,3490.74889 L709.330078,3447.74904 C707.534453,3446.46217 705.0356,3446.8746 703.748733,3448.67023 C703.261838,3449.34962 703,3450.16446 703,3451.00031 Z" stroke="#890000" fill="#202044"></path>

                         <path class="playBtnStroke playBtnStroke--2" d="M703,3451.00031 L703,3537 C703,3539.20914 704.790861,3541 707,3541 C707.835844,3541 708.65069,3540.73816 709.330078,3540.25127 L769.329773,3497.25142 C771.125398,3495.96455 771.537828,3493.4657 770.250961,3491.67007 C769.996301,3491.31474 769.685112,3491.00355 769.329773,3490.74889 L709.330078,3447.74904 C707.534453,3446.46217 705.0356,3446.8746 703.748733,3448.67023 C703.261838,3449.34962 703,3450.16446 703,3451.00031 Z"  stroke="#E50000" fill="#202044"></path>
                     </g>
                 </svg>
                  <div id="rond1"></div>
                 <div id="rond2"></div>
               </a>
        </div>
    </div>

</div>
