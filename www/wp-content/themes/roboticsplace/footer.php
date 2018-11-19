 <footer class="relative zTop" id='roboticsfooter'>
        <div id="partners">
            <div class="container">
                <div class="pure-g gutters">
                    <div class="pure-u-1 pure-u-sm-1-3 flex flex--center">
                        <?php the_field('content','options') ?>
                    </div>
                     <div class="pure-u-1 pure-u-sm-2-3 flex--center">
                         <?php if ( have_rows('liste_partenaires','options') ):
                        ?>
                             <div class=" mobile-slider show-arrows" data-item-width="100%">
                              <ul class="list-1 flex--desktop flex--center" id="partnersPic">
                             <?php while ( have_rows('liste_partenaires','options') ) : the_row();?>
                               <li class="actu-list-item partenaire-item">
                                    <a target="_blank" href="<?php the_sub_field('url'); ?>" title="<?php the_sub_field('titre'); ?>">
                                        <img class="grayscale center" src="<?php echo the_sub_field('logo'); ?>" alt="<?php the_sub_field('titre'); ?>">
                                    </a>
                                </li>


                             <?php endwhile; ?>
                         </ul>
                         </div>
                         <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
        <div id="footer">
            <div class="container">
                <div class="pure-g gutters">
                    <div class="pure-u-1 pure-u-sm-1-2 pure-u-md-1-3">
                        <div class="flex" id="logoFooter">
                            <img class="flex Logo" src="<?php echo get_template_directory_uri(); ?>/images/logos/logo-simple.svg" alt="">
                        </div>
                    </div>
                    <div class="pure-u-1 pure-u-sm-1-2 pure-u-md-1-6">
                         <?php wp_nav_menu( array( 'theme_location' => 'footer1' ) ); ?>
                    </div>
                    <div class="pure-u-1 pure-u-sm-1-2 pure-u-md-1-6">
                         <?php wp_nav_menu( array( 'theme_location' => 'footer2' ) ); ?>
                    </div>
                    <div class="pure-u-1 pure-u-sm-1-2 pure-u-md-1-6">
                         <?php wp_nav_menu( array( 'theme_location' => 'footer3' ) ); ?>
                         <a href="https://twitter.com/share?ref_src=twsrc%5Etfw" class="twitter-share-button" data-show-count="false">Tweet</a><script async src="https://platform.twitter.com/widgets.js" charset="utf-8"></script>
                    </div>
                    <div class="pure-u-1 textCenter relative">
                        <p>©2018 Robotics Place</p>
                        <img id="logoDarman" class="flex flex--Center flex--justifyCenter"src="<?php echo get_template_directory_uri(); ?>/images/logos/studio-darman.svg" alt="Studio Darman, Studio de communication digital à Toulouse">
                    </div>
                </div>
            </div>
            <img id="paternFooter1" src="<?php echo get_template_directory_uri(); ?>/images/paterns/patern1.svg" alt="">
            <img id="paternFooter2" src="<?php echo get_template_directory_uri(); ?>/images/paterns/patern2.svg" alt="">
            <img id="paternFooter3" src="<?php echo get_template_directory_uri(); ?>/images/paterns/patern3.svg" alt="">
        </div>


    </footer>
    <?php wp_footer(); ?>
</body>

</html>
<!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-127614317-1"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'UA-127614317-1');
</script>
