<?php
/*
    Template Name: Page Partenariats
    Description: Page template Partenariats
*/
$imgEntete = get_field('image_haut');
get_header(); ?>

    <div class="vs-section">
        <div class="decort"><span><?php the_title();?></span></div>
        <div class="container">
            <div class="pure-g gutters">
                <div class="    pure-u-1 pure-u-sm-1-2 pure-u-md-3-5">
                    <h1 class="title"><?php the_field('titre') ?></h1>
                    <div class="decallage "><?php the_field('texte_introduction') ?></div>
                </div>
                <?php if( !empty($imgEntete) ):  ?>
                 <div class="pure-u-1 hidden-xs pure-u-sm-1-2 pure-u-md-2-5 flex flex--center vs-div">
                    <img class="mainPatern" src="<?php echo $imgEntete['url']; ?>" alt="<?php echo $imgEntete['alt']; ?>">
                </div>
            <?php else : ?>
                <div class="pure-u-1 pure-u-sm-1-2 pure-u-md-2-5 relative zTop" id="parentVideo">
                    <?php get_template_part('php/video'); ?>
                </div>
            <?php endif; ?>
            </div>
        </div>
        <div id="fedeRegroupant">
            <img class="barreVerticale center" src="<?php echo get_template_directory_uri(); ?>/images/icons/barreVerticale.svg" alt="">
            <div class="container"  data-scroll>
                <div class="pure-g gutters animFFC">
                    <h2 class="pure-u-1 left"><?php the_field('titre_ffc') ?></h2>
                    <div class="pure-u-1 pure-u-md-1-2">
                      <?php $logoFFC = get_field('logo_ffc');
                          if($logoFFC) : ?>
                            <a target="_blank" rel="nofollow" href="<?php the_field('url_site') ?>">
                              <img class="sideImg hidden-xs" src="<?php echo $logoFFC['url'];?>" alt="<?php echo $logoFFC['alt'];?>">
                            </a>
                      <?php endif; ?>
                        <?php the_field('texte_ffc') ?>
                    </div>
                    <?php $mapFFC = get_field('carte_ffc');
                    if($mapFFC) : ?>
                    <div class="pure-u-1 pure-u-md-1-2 marginTopXs2">
                        <img src="<?php echo $mapFFC['url'];?>" alt="<?php echo $mapFFC['alt'];?>">
                    </div>
                  <?php endif; ?>
                </div>
            </div>
        </div>

        <div class="container">
            <div class="pure-g gutters flex flex--justifyFlexEnd" id="fede">
              <img class="shape__membres_Pink" src="<?php echo get_template_directory_uri(); ?>/images/paterns/decoLA2.svg" alt="">
              <img class="shape__membres_Blue" src="<?php echo get_template_directory_uri(); ?>/images/paterns/decoLB5.svg" alt="">
                <div class="pure-u-1 pure-u-md-11-12 pure-u-lg-11-12 whiteBg whiteBg--paddingSides rightBloc">
                    <div class="pure-g gutters flex ">
                        <div class="pure-u-1">
                            <?php if ( have_rows('repeteur_membre_ffc') ): ?>
                            <div class="pure-g gutters">
                                    <?php while ( have_rows('repeteur_membre_ffc') ) : the_row();
                                    $nom = get_sub_field('nom_membre');
                                    $logo = get_sub_field('logo');
                                    $content = get_sub_field('texte_membre');
                                    $link = get_sub_field('url_site_web');
                                    ?>
                                        <div class="pure-u-1 pure-u-sm-1-2 inFede">
                                            <div class="pure-g">
                                                <div class="pure-u-1 pure-u-sm-2-5 flex flex--center">
                                                      <img class="grayscale" src="<?php echo $logo['url'];?>" alt="<?php echo $logo['alt'];?>">
                                                </div>
                                                <div class="pure-u-1 pure-u-sm-3-5">
                                                    <b class="titre3"><?php echo $nom; ?></b>
                                                    <p><?php echo $content; ?></p>
                                                    <a class="button button__voirFiche button--violet " target="_blank" rel="nofollow" href="<?php echo $link; ?>"><?php pll_e('Voir site');?></a>
                                                </div>
                                            </div>
                                        </div>
                                    <?php endwhile; ?>
                            </div>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            </div>
            <!--            END WHITE BLOC-->
        </div>
        <div class="container" id="tti">
            <div class="pure-g marginTop3">
                <div class="pure-u-1 pure-u-sm-1-2 flex flex--justifyCenter">
                    <img id="ttiSVG" src="<?php echo get_template_directory_uri(); ?>/images/img/tti.svg" alt="">
                </div>
                <div class="pure-u-1 pure-u-sm-1-2 ">
                    <div class="limitWidthText" id="ttiImg">
                        <div class="flexMobile flex--center">
                            <?php $imgTTI = get_field('logo_tti');
                                if( !empty($imgTTI) ): ?>
                                	<img class="hidden-xs" src="<?php echo $imgTTI['url']; ?>" alt="<?php echo $imgTTI['alt']; ?>" />
                                <?php endif; ?>
                            <h2 class="left marginTop pure-u-1 titre3"><?php the_field('titre_tti') ?></h2>
                        </div>
                        <?php the_field('texte_tti'); ?>
                        <?php
                            $file = get_field('dl');
                            if( $file ): ?>
                            	<a class="button button__voirFiche button--violet button_livre" href="<?php echo $file['dl_file']; ?>"><?php echo $file['dl_name']; ?></a>
                            <?php endif; ?>
                    </div>

                </div>
            </div>
        </div>
        <div class="container  marginTop3">
            <h2 class="left left--pushed marginTop" id="interclustingttiTitle"><?php the_field('titre_interclustering'); ?></h2>
            <div class="pure-g gutters flex flex--justifyFlexEnd" id="interclustingtti">
                <div class="pure-u-1 pure-u-md-11-12 pure-u-lg-11-12 whiteBg whiteBg--paddingSides rightBloc">
                    <div class="pure-g gutters flex flex--baseline">
                        <img class="barreVerticale" src="<?php echo get_template_directory_uri(); ?>/images/icons/barreVerticale.svg" alt="">
                        <?php if ( have_rows('repeteur_itti') ): ?>
                            <?php while ( have_rows('repeteur_itti') ) : the_row();
                            $nom = get_sub_field('nom_membre');
                            $logo = get_sub_field('logo');
                            $content = get_sub_field('texte_membre');
                            $link = get_sub_field('url');?>
                            <div class="pure-u-1 pure-u-sm-1-2 inFede">
                                <div class="pure-g">
                                    <div class="pure-u-1 pure-u-sm-2-5 flex flex--center">
                                        <img class="grayscale" src="<?php echo $logo['url'];?>" alt="<?php echo $logo['alt'];?>">
                                    </div>
                                    <div class="pure-u-1 pure-u-sm-3-5">
                                        <b class="titre3"><?php echo $nom;?></b>
                                        <p><?php echo $content;?></p>
                                        <a class="button button__voirFiche button--violet " target="_blank" rel="nofollow" href="<?php echo $link;?>"><?php pll_e('Voir site');?></a>
                                    </div>
                                </div>
                            </div>
                            <?php endwhile; ?>
                        <?php endif; ?>

                    </div>
                </div>

            </div>
        </div>
        <!-- END CONTAINER -->
        <div class="pushFooter"></div>

    </div>
    <?php get_footer() ?>
